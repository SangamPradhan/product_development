<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('images')->paginate(10);
        return view('Admin.events.index', [
            'title' => 'Events',
            'route' => 'admin.events.',
            'items' => $events,
        ]);
    }

    public function create()
    {
        return view('Admin.events.create', [
            'title' => 'Event',
            'route' => 'admin.events.',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'main_image' => 'nullable|image|max:4096',
            'is_featured' => 'boolean',
            'additional_images' => 'array|max:2',
            'additional_images.*' => 'image|max:4096',
        ]);

        $eventData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('events', 'public');
            $eventData['main_image'] = basename($path);
        }

        $event = Event::create($eventData);

        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $imageFile) {
                $path = $imageFile->store('events', 'public');
                $event->images()->create([
                    'image_path' => basename($path),
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('Admin.events.edit', [
            'title' => 'Event',
            'route' => 'admin.events.',
            'event' => $event,
            'project' => $event, // Map to project for templates.edit compatibility
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'main_image' => 'nullable|image|max:4096',
            'is_featured' => 'boolean',
            'additional_images' => 'array|max:2',
            'additional_images.*' => 'image|max:4096',
        ]);

        $eventData = [
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->hasFile('main_image')) {
            if ($event->main_image) {
                Storage::disk('public')->delete('events/' . $event->main_image);
            }
            $path = $request->file('main_image')->store('events', 'public');
            $eventData['main_image'] = basename($path);
        }

        $event->update($eventData);

        if ($request->hasFile('additional_images')) {
            foreach ($event->images as $img) {
                Storage::disk('public')->delete('events/' . $img->image_path);
                $img->delete();
            }
            foreach ($request->file('additional_images') as $imageFile) {
                $path = $imageFile->store('events', 'public');
                $event->images()->create([
                    'image_path' => basename($path),
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->main_image) {
            Storage::disk('public')->delete('events/' . $event->main_image);
        }
        foreach ($event->images as $img) {
            Storage::disk('public')->delete('events/' . $img->image_path);
            $img->delete();
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}
