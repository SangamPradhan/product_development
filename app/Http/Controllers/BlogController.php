<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('Admin.blogs.index', [
            'title' => 'Blogs',
            'route' => 'admin.blogs.',
            'items' => $blogs,
        ]);
    }

    public function create()
    {
        return view('Admin.blogs.create', [
            'title' => 'Blog',
            'route' => 'admin.blogs.',
        ]);
    }

    public function store(Request $request)
    {
        // Preprocess comma-separated strings into arrays
        if ($request->has('categories_string')) {
            $request->merge([
                'categories' => array_filter(array_map('trim', explode(',', $request->categories_string)))
            ]);
        }
        if ($request->has('tags_string')) {
            $request->merge([
                'tags' => array_filter(array_map('trim', explode(',', $request->tags_string)))
            ]);
        }
        if ($request->has('callout_items')) {
            $request->merge([
                'callout_items' => json_decode($request->callout_items, true)
            ]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|max:4096',
            'categories' => 'required|array|min:1',
            'categories.*' => 'string|max:100',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:100',
            'status' => 'required|string|in:Published,Draft',
            'callout_title' => 'nullable|string|max:255',
            'callout_items' => 'nullable|array',
        ]);

        $blogData = [
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'content' => $validated['content'],
            'author' => $validated['author'] ?? 'Lumina Administrator',
            'categories' => $validated['categories'],
            'tags' => $validated['tags'] ?? [],
            'status' => $validated['status'],
            'callout_title' => $validated['callout_title'] ?? null,
            'callout_items' => $validated['callout_items'] ?? [],
        ];

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('blogs', 'public');
            $blogData['main_image'] = basename($path);
        }

        Blog::create($blogData);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        return view('Admin.blogs.edit', [
            'title' => 'Blog',
            'route' => 'admin.blogs.',
            'blog' => $blog,
            'project' => $blog, // Map to project for templates.edit compatibility
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        // Preprocess comma-separated strings into arrays
        if ($request->has('categories_string')) {
            $request->merge([
                'categories' => array_filter(array_map('trim', explode(',', $request->categories_string)))
            ]);
        }
        if ($request->has('tags_string')) {
            $request->merge([
                'tags' => array_filter(array_map('trim', explode(',', $request->tags_string)))
            ]);
        }
        if ($request->has('callout_items')) {
            $request->merge([
                'callout_items' => json_decode($request->callout_items, true)
            ]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|max:4096',
            'categories' => 'required|array|min:1',
            'categories.*' => 'string|max:100',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:100',
            'status' => 'required|string|in:Published,Draft',
            'callout_title' => 'nullable|string|max:255',
            'callout_items' => 'nullable|array',
        ]);

        $blogData = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'summary' => $validated['summary'],
            'content' => $validated['content'],
            'author' => $validated['author'] ?? 'Lumina Administrator',
            'categories' => $validated['categories'],
            'tags' => $validated['tags'] ?? [],
            'status' => $validated['status'],
            'callout_title' => $validated['callout_title'] ?? null,
            'callout_items' => $validated['callout_items'] ?? [],
        ];

        if ($request->hasFile('main_image')) {
            if ($blog->main_image) {
                Storage::disk('public')->delete('blogs/' . $blog->main_image);
            }
            $path = $request->file('main_image')->store('blogs', 'public');
            $blogData['main_image'] = basename($path);
        }

        $blog->update($blogData);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->main_image) {
            Storage::disk('public')->delete('blogs/' . $blog->main_image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
