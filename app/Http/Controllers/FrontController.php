<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        return view('welcome');
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
        return view('front.pages.projects');
    }

    public function projectDetail()
    {
        return view('front.pages.project_detail');
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
