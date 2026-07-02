<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReviewController extends Controller
{
    /**
     * Display a listing of accepted reviews for a specific project.
     */
    public function index(string $project): JsonResponse
    {
        $projectModel = Project::query()
            ->where('slug', $project)
            ->orWhere('id', $project)
            ->firstOrFail();

        $reviews = $projectModel->reviews()
            ->where('status', 'accepted')
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'data' => $reviews,
        ]);
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, string $project): JsonResponse
    {
        $projectModel = Project::query()
            ->where('slug', $project)
            ->orWhere('id', $project)
            ->firstOrFail();

        $validated = $request->validate([
            'reviewer_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'reviewer_email' => 'required|email|max:255',
            'reviewer_title' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ], [
            'reviewer_name.regex' => 'The name cannot contain numbers or special characters.',
            'reviewer_email.email' => 'Please enter a valid email address.',
        ]);

        // Manually block common dummy/fake mail generators
        $disposableDomains = ['mailinator.com', 'guerrillamail.com', '10minutemail.com', 'tempmail.com', 'yopmail.com'];
        $domain = substr(strrchr($validated['reviewer_email'], "@"), 1);
        
        if (in_array(strtolower($domain), $disposableDomains)) {
            return response()->json([
                'message' => 'Disposable or fake email addresses are not allowed. Please provide a valid email.',
                'data' => null,
                'mail_error' => 'Fake email blocked',
            ], 422);
        }

        if (!checkdnsrr($domain, 'MX')) {
            return response()->json([
                'message' => "The email domain '$domain' does not exist or cannot receive emails.",
                'data' => null,
                'mail_error' => 'Invalid domain',
            ], 422);
        }

        try {
            // 1. ATTEMPT TO SEND EMAIL FIRST
            \Illuminate\Support\Facades\Mail::to($validated['reviewer_email'])->send(new \App\Mail\ReviewThanksMail($validated, $projectModel->title));

            // 2. STORE DATA (Only executes if email succeeds)
            $validated['project_id'] = $projectModel->id;
            $validated['status'] = 'pending';
            $review = Review::create($validated);

            // 3. SHOW SUCCESS MESSAGE
            return response()->json([
                'message' => 'Thank you! Your review has been submitted and is pending admin approval. A confirmation email has been sent.',
                'data' => $review,
                'mail_error' => null,
            ], 201);

        } catch (\Exception $e) {
            // 4. ABORT AND SHOW ERROR MESSAGE
            \Log::error('Review email failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Review submission failed. We encountered an issue sending a confirmation email to the address provided. Please ensure your email is correct and try again.',
                'data' => null,
                'mail_error' => 'Email failed to send',
            ], 422);
        }
    }
}
