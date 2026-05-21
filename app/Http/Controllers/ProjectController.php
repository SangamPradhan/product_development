<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Projects';
        $route = 'admin.projects.';
        $items = Project::orderBy('created_at', 'desc')->get();
        return view('Admin.projects.index', compact('title', 'route', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Project';
        $route = 'admin.projects.';
        return view('Admin.projects.create', compact('title', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'subtitle' => 'required|string|max:500',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'status' => 'required|string|max:50',
            'is_featured' => 'nullable',
            'client' => 'nullable|string',
            'duration' => 'nullable|string',
            'technologies' => 'nullable|string',
            'overview' => 'nullable|string',
            'result_1_value' => 'nullable|string',
            'result_1_title' => 'nullable|string',
            'result_1_description' => 'nullable|string',
            'result_2_value' => 'nullable|string',
            'result_2_label' => 'nullable|string',
            'result_3_title' => 'nullable|string',
            'result_3_description' => 'nullable|string',
            'impl_1_title' => 'nullable|string',
            'impl_1_description' => 'nullable|string',
            'impl_2_title' => 'nullable|string',
            'impl_2_description' => 'nullable|string',
            'impl_3_title' => 'nullable|string',
            'impl_3_description' => 'nullable|string',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $imageName = time() . '.' . $request->featured_image->extension();
            $request->featured_image->storeAs('projects', $imageName, 'public');
            $validated['featured_image'] = $imageName;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $title = 'Project';
        $route = 'admin.projects.';
        return view('Admin.projects.edit', compact('title', 'route', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'nullable|string|max:100',
            'subtitle' => 'required|string|max:500',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'status' => 'required|string|max:50',
            'is_featured' => 'nullable',
            'client' => 'nullable|string',
            'duration' => 'nullable|string',
            'technologies' => 'nullable|string',
            'overview' => 'nullable|string',
            'result_1_value' => 'nullable|string',
            'result_1_title' => 'nullable|string',
            'result_1_description' => 'nullable|string',
            'result_2_value' => 'nullable|string',
            'result_2_label' => 'nullable|string',
            'result_3_title' => 'nullable|string',
            'result_3_description' => 'nullable|string',
            'impl_1_title' => 'nullable|string',
            'impl_1_description' => 'nullable|string',
            'impl_2_title' => 'nullable|string',
            'impl_2_description' => 'nullable|string',
            'impl_3_title' => 'nullable|string',
            'impl_3_description' => 'nullable|string',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image && !str_starts_with($project->featured_image, 'http')) {
                Storage::disk('public')->delete('projects/' . $project->featured_image);
            }
            $imageName = time() . '.' . $request->featured_image->extension();
            $request->featured_image->storeAs('projects', $imageName, 'public');
            $validated['featured_image'] = $imageName;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->featured_image && !str_starts_with($project->featured_image, 'http')) {
            Storage::disk('public')->delete('projects/' . $project->featured_image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
