<?php

namespace App\Http\Controllers;

use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of all reviews.
     */
    public function index()
    {
        $reviews = Review::with('project')->latest()->get();

        return view('Admin.reviews.index', [
            'title' => 'Reviews',
            'reviews' => $reviews,
        ]);
    }

    /**
     * Display details of a specific review.
     */
    public function show(Review $review)
    {
        $review->load('project');

        return view('Admin.reviews.show', [
            'title' => 'Review Details',
            'review' => $review,
        ]);
    }

    /**
     * Accept/Approve a review.
     */
    public function accept(Review $review)
    {
        $review->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Review approved successfully. It is now visible on the project details page.');
    }

    /**
     * Reject/Disapprove a review.
     */
    public function reject(Review $review)
    {
        $review->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Review marked as rejected.');
    }

    /**
     * Delete a review completely.
     */
    public function delete(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
