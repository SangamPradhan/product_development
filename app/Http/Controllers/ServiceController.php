<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('Admin.services.index', [
            'title' => 'Services',
            'route' => 'admin.services.',
            'items' => $services,
        ]);
    }

    public function create()
    {
        return view('Admin.services.create', [
            'title' => 'Service',
            'route' => 'admin.services.',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'features' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        Service::create(array_merge($validated, [
            'slug' => Str::slug($validated['title']),
        ]));

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('Admin.services.edit', [
            'title' => 'Service',
            'route' => 'admin.services.',
            'service' => $service,
            'project' => $service, // Map to project for templates.edit compatibility
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'features' => 'nullable|string',
            'status' => 'required|string|in:Active,Inactive',
        ]);

        $service->update(array_merge($validated, [
            'slug' => Str::slug($validated['title']),
        ]));

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
