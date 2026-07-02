<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Event;
use App\Models\Blog;
use App\Models\GalleryItem;
use App\Models\Project;
use App\Models\Review;
use App\Models\ContactMessage;
use App\Models\EventBooking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\EventBookingMail;

class FrontController extends Controller
{
    public function home()
    {
        $reviews = Review::where('status', 'accepted')->latest()->get();
        $services = Service::where('status', 'Active')->take(6)->get();
        $blogs = Blog::where('status', 'Published')->latest()->take(3)->get();
        
        // Nearest upcoming event
        $featuredEvent = Event::where('is_featured', true)
            ->where('event_date', '>=', now())
            ->first() ?? Event::upcoming()->orderBy('event_date', 'asc')->first();

        return view('welcome', compact('reviews', 'services', 'blogs', 'featuredEvent'));
    }

    public function about()
    {
        return view('Front.pages.about');
    }

    public function services()
    {
        $services = Service::where('status', 'Active')->get();
        return view('Front.pages.services', compact('services'));
    }

    public function projects()
    {
        return view('Front.pages.projects');
    }

    public function projectDetail(string $slug)
    {
        return view('Front.pages.project_detail', compact('slug'));
    }

    public function events(Request $request)
    {
        $category = $request->query('category');

        // Featured event
        $featured = Event::where('is_featured', true)
            ->where('event_date', '>=', now())
            ->first() ?? Event::upcoming()->orderBy('event_date', 'asc')->first();

        $featuredId = $featured ? $featured->id : null;

        // Upcoming events excluding featured
        $upcomingQuery = Event::upcoming();
        if ($featuredId) {
            $upcomingQuery->where('id', '!=', $featuredId);
        }
        if ($category) {
            $upcomingQuery->where('category', $category);
        }
        $upcomingEvents = $upcomingQuery->orderBy('event_date', 'asc')->paginate(6, ['*'], 'upcoming_page');

        // Past events
        $pastQuery = Event::past();
        if ($category) {
            $pastQuery->where('category', $category);
        }
        $pastEvents = $pastQuery->orderBy('event_date', 'desc')->paginate(6, ['*'], 'past_page');

        // All active categories
        $categories = Event::pluck('category')->unique()->filter()->values();

        return view('Front.pages.events', compact('featured', 'upcomingEvents', 'pastEvents', 'categories', 'category'));
    }

    public function eventDetail(string $slug)
    {
        $event = Event::with('images')->where('slug', $slug)->firstOrFail();
        
        // Similar upcoming events
        $similarEvents = Event::upcoming()
            ->where('id', '!=', $event->id)
            ->where('category', $event->category)
            ->take(3)
            ->get();

        return view('Front.pages.event_detail', compact('event', 'similarEvents'));
    }

    public function gallery(Request $request)
    {
        $category = $request->query('category');

        $featuredVideo = GalleryItem::where('is_featured', true)->where('type', 'video')->first();
        $featuredImage = GalleryItem::where('is_featured', true)->where('type', 'image')->first();

        $videoQuery = GalleryItem::where('type', 'video');
        $imageQuery = GalleryItem::where('type', 'image');

        if ($featuredVideo) $videoQuery->where('id', '!=', $featuredVideo->id);
        if ($featuredImage) $imageQuery->where('id', '!=', $featuredImage->id);

        if ($category) {
            $videoQuery->where('category', $category);
            $imageQuery->where('category', $category);
        }

        $videos = $videoQuery->latest()->paginate(6, ['*'], 'video_page');
        $images = $imageQuery->latest()->paginate(9, ['*'], 'image_page');

        $categories = GalleryItem::pluck('category')->unique()->filter()->values();

        return view('Front.pages.gallery', compact('featuredVideo', 'featuredImage', 'videos', 'images', 'categories', 'category'));
    }

    public function gallerySection(Request $request)
    {
        $section  = $request->query('section', 'images');
        $page     = (int) $request->query('page', 1);
        $category = $request->query('category');
        $type     = $section === 'videos' ? 'video' : 'image';
        $perPage  = $section === 'videos' ? 6 : 9;
        $pageKey  = $section === 'videos' ? 'video_page' : 'image_page';

        $featured = GalleryItem::where('is_featured', true)->where('type', $type)->first();
        $query = GalleryItem::where('type', $type);
        if ($featured) $query->where('id', '!=', $featured->id);
        if ($category) $query->where('category', $category);

        $items = $query->latest()->paginate($perPage, ['*'], $pageKey, $page);

        return view('Front.pages.gallery-section', compact('section', 'items', 'category'));
    }

    public function blogs(Request $request)
    {
        $category = $request->query('category');
        $tag = $request->query('tag');
        $search = $request->query('search');

        $query = Blog::where('status', 'Published');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('categories', 'like', "%\"{$category}\"%");
        }

        if ($tag) {
            $query->where('tags', 'like', "%\"{$tag}\"%");
        }

        $blogs = $query->latest()->paginate(6);

        // Get all categories/tags for filter sidebars
        $allBlogs = Blog::where('status', 'Published')->get();
        
        $categories = $allBlogs->flatMap(function($b) {
            return (array) $b->categories;
        })->unique()->filter()->values();

        $tags = $allBlogs->flatMap(function($b) {
            return (array) $b->tags;
        })->unique()->filter()->values();

        return view('Front.pages.blogs', compact('blogs', 'categories', 'tags', 'category', 'tag', 'search'));
    }

    public function blogDetail(string $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        // Latest 3 active projects
        $relevantProjects = Project::where('status', 'Active')->latest()->take(3)->get();

        // Latest 3 recent articles excluding current one
        $recentArticles = Blog::where('id', '!=', $blog->id)->where('status', 'Published')->latest()->take(3)->get();

        // Similar blogs (same first category)
        $similarBlogs = collect();
        if (is_array($blog->categories) && count($blog->categories) > 0) {
            $firstCategory = $blog->categories[0];
            $similarBlogs = Blog::where('id', '!=', $blog->id)
                ->where('status', 'Published')
                ->where('categories', 'like', "%\"{$firstCategory}\"%")
                ->take(3)
                ->get();
        }

        return view('Front.pages.blog_detail', compact('blog', 'relevantProjects', 'recentArticles', 'similarBlogs'));
    }

    public function contact()
    {
        return view('Front.pages.contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|string|max:255',
            'message' => 'required|string',
        ], [
            'first_name.regex' => 'The first name cannot contain numbers or special characters.',
            'last_name.regex' => 'The last name cannot contain numbers or special characters.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        // Manually block common dummy/fake mail generators
        $disposableDomains = ['mailinator.com', 'guerrillamail.com', '10minutemail.com', 'tempmail.com', 'yopmail.com'];
        $domain = substr(strrchr($validated['email'], "@"), 1);
        
        if (in_array(strtolower($domain), $disposableDomains)) {
            return redirect()->back()->with('error', 'Disposable or fake email addresses are not allowed. Please provide a valid email.');
        }

        if (!checkdnsrr($domain, 'MX')) {
            return redirect()->back()->with('error', "The email domain '$domain' does not exist or cannot receive emails.");
        }

        try {
            // 1. ATTEMPT TO SEND EMAIL FIRST
            // If the system fails to send the email, it will throw an error and instantly jump to the catch block below.
            Mail::to($validated['email'])->send(new ContactFormMail($validated));

            // 2. STORE DATA
            // This line will ONLY execute if the email above was successfully sent without errors.
            ContactMessage::create($validated);

            // 3. SHOW SUCCESS MESSAGE
            return redirect()->back()->with('success', 'Thank you! Your inquiry has been submitted and a confirmation email has been sent.');
            
        } catch (\Exception $e) {
            // 4. ABORT AND SHOW ERROR MESSAGE
            // If the email fails, the process lands here. Data is NOT saved.
            \Log::error('Contact form email failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'We encountered an issue sending a confirmation email to the address provided. Please ensure your email is correct and try again.');
        }
    }

    public function bookEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($event->event_date->isPast()) {
            return redirect()->back()->with('error', 'Sorry, registration for this event is closed as it has already taken place.');
        }

        $validated = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'seats' => 'required|integer|min:1|max:10',
            'message' => 'nullable|string',
        ], [
            'name.regex' => 'The name cannot contain numbers or special characters.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        // Manually block common dummy/fake mail generators
        $disposableDomains = ['mailinator.com', 'guerrillamail.com', '10minutemail.com', 'tempmail.com', 'yopmail.com'];
        $domain = substr(strrchr($validated['email'], "@"), 1);
        
        if (in_array(strtolower($domain), $disposableDomains)) {
            return redirect()->back()->with('error', 'Disposable or fake email addresses are not allowed. Please provide a valid email.');
        }

        if (!checkdnsrr($domain, 'MX')) {
            return redirect()->back()->with('error', "The email domain '$domain' does not exist or cannot receive emails.");
        }

        try {
            // 1. ATTEMPT TO SEND EMAIL FIRST
            Mail::to($validated['email'])->send(new EventBookingMail($validated, $event));

            // 2. STORE DATA (Only executes if email succeeds)
            $validated['event_id'] = $event->id;
            EventBooking::create($validated);

            // 3. SHOW SUCCESS MESSAGE
            return redirect()->back()->with('success', 'Congratulations! Your seat is booked successfully, and a confirmation email has been sent.');

        } catch (\Exception $e) {
            // 4. ABORT AND SHOW ERROR MESSAGE
            \Log::error('Event booking email failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Booking failed. We encountered an issue sending a confirmation email to the address provided. Please ensure your email is correct and try again.');
        }
    }
}
