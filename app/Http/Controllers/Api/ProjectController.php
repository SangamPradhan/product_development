<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Project::query()->orderByDesc('created_at');

        if ($request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('exclude')) {
            $query->where('id', '!=', $request->integer('exclude'));
        }

        if ($request->filled('limit')) {
            $query->limit($request->integer('limit'));
        }

        return ProjectResource::collection($query->get());
    }

    public function show(string $project): ProjectResource
    {
        $model = Project::query()
            ->where('slug', $project)
            ->orWhere('id', $project)
            ->firstOrFail();

        return new ProjectResource($model);
    }

    public function store(StoreProjectRequest $request): JsonResponse
    {
        $data = $this->prepareAttributes($request->validated());
        $data['slug'] = $this->uniqueSlug($data['title']);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->storeFeaturedImage($request->file('featured_image'));
        }

        $project = Project::create($data);

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProjectRequest $request, Project $project): ProjectResource
    {
        $data = $this->prepareAttributes($request->validated());

        if (isset($data['title'])) {
            $data['slug'] = $this->uniqueSlug($data['title'], $project->id);
        }

        if ($request->hasFile('featured_image')) {
            $this->deleteFeaturedImage($project);
            $data['featured_image'] = $this->storeFeaturedImage($request->file('featured_image'));
        }

        $project->update($data);

        return new ProjectResource($project->fresh());
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->deleteFeaturedImage($project);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully.']);
    }

    /**
     * @param  array<string, mixed>  $validated
     * @return array<string, mixed>
     */
    private function prepareAttributes(array $validated): array
    {
        if (array_key_exists('is_featured', $validated)) {
            $validated['is_featured'] = (bool) $validated['is_featured'];
        }

        return $validated;
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (
            Project::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function storeFeaturedImage(UploadedFile $file): string
    {
        $imageName = time().'.'.$file->extension();
        $file->storeAs('projects', $imageName, 'public');

        return $imageName;
    }

    private function deleteFeaturedImage(Project $project): void
    {
        if ($project->featured_image && ! str_starts_with($project->featured_image, 'http')) {
            Storage::disk('public')->delete('projects/'.$project->featured_image);
        }
    }
}
