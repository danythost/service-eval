<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'reviewer_email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $status = 'approved'; // Production-ready default (or 'pending' for moderation)
        
        $review = new Review($validated);
        $review->service_id = $service->id;
        $review->user_id = auth()->id();
        $review->status = $status;
        $review->save();

        return back()->with('success', 'Thank you for your review!');
    }
}
