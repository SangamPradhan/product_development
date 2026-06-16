<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('Admin.projects.index', [
            'title' => 'Projects',
            'route' => 'admin.projects.',
        ]);
    }

    public function create()
    {
        return view('Admin.projects.create', [
            'title' => 'Project',
            'route' => 'admin.projects.',
        ]);
    }

    public function edit(Project $project)
    {
        return view('Admin.projects.edit', [
            'title' => 'Project',
            'route' => 'admin.projects.',
            'project' => $project,
        ]);
    }

    public function show(Project $project)
    {
        return view('Admin.projects.show', [
            'title' => 'Project Details',
            'route' => 'admin.projects.',
            'project' => $project,
        ]);
    }
}
