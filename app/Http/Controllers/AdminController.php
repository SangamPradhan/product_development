<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\EventBooking;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    /**
     * Show the custom Lumina AI secure login page.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('Admin.login');
    }

    /**
     * Authenticate the admin credentials securely.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Authenticated successfully. Welcome back to Lumina Admin!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the admin user out securely.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Logged out safely.');
    }

    /**
     * Render the Lumina AI Bento Analytics Dashboard.
     */
    public function dashboard()
    {
        return view('Admin.pages.dashboard');
    }

    /**
     * Mock CRUD Index for Blogs/News.
     */
    public function newsIndex()
    {
        $title = 'Blogs';
        $route = 'admin.news.';
        $items = [
            (object)[
                'id' => 1,
                'title' => 'NeuralCore Alpha: AI Clusters',
                'description' => 'Deep learning optimization cluster metrics and trends',
                'status' => 'Active',
                'health' => 92,
                'timeline' => '24 Oct - 12 Jan'
            ],
            (object)[
                'id' => 2,
                'title' => 'Future of Neural Networks in 2026',
                'description' => 'A comprehensive review of upcoming generative architectures',
                'status' => 'In Progress',
                'health' => 78,
                'timeline' => '01 Dec - Ongoing'
            ],
            (object)[
                'id' => 3,
                'title' => 'Shield AI Threat Mitigation Protocol',
                'description' => 'Security nodes and automated protection systems',
                'status' => 'Active',
                'health' => 98,
                'timeline' => '10 Jan - 30 Jun'
            ],
        ];

        return view('Admin.news.index', compact('title', 'route', 'items'));
    }

    /**
     * Mock CRUD Create Form for Blogs/News.
     */
    public function newsCreate()
    {
        $title = 'Blog';
        $route = 'admin.news.';
        return view('Admin.news.create', compact('title', 'route'));
    }

    /**
     * Mock CRUD Store Method for Blogs/News.
     */
    public function newsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Blog created successfully (Mock Database Entry)!');
    }

    /**
     * Mock CRUD Edit Form for Blogs/News.
     */
    public function newsEdit($id)
    {
        $title = 'Blog';
        $route = 'admin.news.';
        $blog = (object)[
            'id' => $id,
            'title' => 'Future of Neural Networks in 2026',
            'description' => 'A comprehensive review of upcoming generative architectures',
            'author' => 'Dr. Elizabeth Shaw',
            'content' => 'Deep neural models continue to accelerate...',
            'status' => 'In Progress'
        ];

        return view('Admin.news.edit', compact('title', 'route', 'blog'));
    }

    /**
     * Mock CRUD Update Method for Blogs/News.
     */
    public function newsUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Blog updated successfully (Mock Database Update)!');
    }

    /**
     * Mock CRUD Delete Method for Blogs/News.
     */
    public function newsDelete($id)
    {
        return redirect()->route('admin.news.index')->with('success', 'Blog deleted successfully (Mock Database Removal)!');
    }

    /**
     * Display a listing of all event bookings.
     */
    public function bookingsIndex()
    {
        $bookings = EventBooking::with('event')->latest()->get();

        return view('Admin.bookings.index', [
            'title' => 'Event Bookings',
            'bookings' => $bookings,
        ]);
    }

    /**
     * Delete an event booking.
     */
    public function bookingDelete(EventBooking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Event booking record deleted successfully.');
    }

    /**
     * Display a listing of all contact inquiries.
     */
    public function contactsIndex()
    {
        $contacts = ContactMessage::latest()->get();

        return view('Admin.contacts.index', [
            'title' => 'Contact Inquiries',
            'contacts' => $contacts,
        ]);
    }

    /**
     * Delete a contact inquiry message.
     */
    public function contactDelete(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact inquiry record deleted successfully.');
    }
}
