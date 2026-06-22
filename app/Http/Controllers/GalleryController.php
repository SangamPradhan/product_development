<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::paginate(10);
        return view('Admin.gallery.index', [
            'title' => 'Gallery',
            'route' => 'admin.gallery.',
            'items' => $items,
        ]);
    }

    public function show(GalleryItem $gallery)
    {
        return view('Admin.gallery.show', [
            'title' => 'Gallery Item Details',
            'route' => 'admin.gallery.',
            'item' => $gallery,
        ]);
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'image');
        return view('Admin.gallery.create', [
            'title' => 'Gallery ' . ucfirst($type),
            'route' => 'admin.gallery.',
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:image,video',
            'source' => 'required|string|in:upload,youtube',
            'file_path' => 'nullable|file|max:10240',
            'embed_url' => 'nullable|url|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        if ($request->has('is_featured')) {
            GalleryItem::where('type', $validated['type'])->update(['is_featured' => false]);
        }

        $itemData = [
            'title' => $validated['title'],
            'type' => $validated['type'],
            'source' => $validated['source'],
            'embed_url' => $validated['embed_url'] ?? null,
            'category' => $validated['category'],
            'tags' => $validated['tags'] ?? null,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($validated['source'] === 'upload' && $request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('gallery', 'public');
            $itemData['file_path'] = basename($path);
        }

        GalleryItem::create($itemData);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item added successfully!');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('Admin.gallery.edit', [
            'title' => 'Gallery ' . ucfirst($gallery->type),
            'route' => 'admin.gallery.',
            'item' => $gallery,
            'project' => $gallery, // Map to project for templates.edit compatibility
            'type' => $gallery->type,
        ]);
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:image,video',
            'source' => 'required|string|in:upload,youtube',
            'file_path' => 'nullable|file|max:10240',
            'embed_url' => 'nullable|url|max:255',
            'category' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        if ($request->has('is_featured')) {
            GalleryItem::where('type', $validated['type'])->where('id', '!=', $gallery->id)->update(['is_featured' => false]);
        }

        $itemData = [
            'title' => $validated['title'],
            'type' => $validated['type'],
            'source' => $validated['source'],
            'embed_url' => $validated['embed_url'] ?? null,
            'category' => $validated['category'],
            'tags' => $validated['tags'] ?? null,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($validated['source'] === 'upload' && $request->hasFile('file_path')) {
            if ($gallery->file_path) {
                Storage::disk('public')->delete('gallery/' . $gallery->file_path);
            }
            $path = $request->file('file_path')->store('gallery', 'public');
            $itemData['file_path'] = basename($path);
        } else {
            $itemData['file_path'] = $gallery->file_path;
        }

        $gallery->update($itemData);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item updated successfully!');
    }

    public function destroy(GalleryItem $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete('gallery/' . $gallery->file_path);
        }
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item deleted successfully!');
    }
}
