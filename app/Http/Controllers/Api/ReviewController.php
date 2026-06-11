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
            'reviewer_name' => 'required|string|max:255',
            'reviewer_email' => 'required|email|max:255',
            'reviewer_title' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $validated['project_id'] = $projectModel->id;
        $validated['status'] = 'pending'; // Default status is pending

        $review = Review::create($validated);

        $mailError = null;
        try {
            Mail::send('emails.review_thanks', [
                'name' => $review->reviewer_name,
                'projectTitle' => $projectModel->title,
                'comment' => $review->comment,
                'rating' => $review->rating,
            ], function ($mail) use ($review, $projectModel) {
                $mail->to($review->reviewer_email, $review->reviewer_name)
                    ->subject('Thank you for your review: '.$projectModel->title);
            });
        } catch (\Throwable $e) {
            $mailError = $e->getMessage();
        }

        $message = 'Thank you! Your review has been submitted and is pending admin approval.';
        if ($mailError) {
            $message .= ' Note: We could not send a confirmation email due to: '.$mailError.'. Please make sure your email address is correct.';
        }

        return response()->json([
            'message' => $message,
            'data' => $review,
            'mail_error' => $mailError,
        ], 201);
    }
}
