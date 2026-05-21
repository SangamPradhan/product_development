<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class FrontController extends Controller
{
    public function home()
    {
        $featuredProject = Project::where('is_featured', true)->where('status', 'Active')->orderBy('created_at', 'desc')->first();
        return view('welcome', compact('featuredProject'));
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function services()
    {
        return view('front.pages.services');
    }

    public function projects()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('front.pages.projects', compact('projects'));
    }

    public function projectDetail($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        
        // Also fetch related projects (e.g. latest 3 other projects)
        $relatedProjects = Project::where('id', '!=', $project->id)
                                  ->orderBy('created_at', 'desc')
                                  ->take(3)
                                  ->get();
                                  
        return view('front.pages.project_detail', compact('project', 'relatedProjects'));
    }

    public function events()
    {
        return view('front.pages.events');
    }

    public function eventDetail()
    {
        return view('front.pages.event_detail');
    }

    public function gallery()
    {
        return view('front.pages.gallery');
    }

    public function blogs()
    {
        return view('front.pages.blogs');
    }

    public function blogDetail()
    {
        return view('front.pages.blog_detail');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }
}
