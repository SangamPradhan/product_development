<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            'data' => $reviews
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

        return response()->json([
            'message' => 'Thank you! Your review has been submitted and is pending admin approval.',
            'data' => $review
        ], 201);
    }
}
