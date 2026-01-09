<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of all services.
     */
    public function index(): View
    {
        $services = Service::with(['provider', 'approvedReviews'])
            ->withCount('approvedReviews')
            ->withAvg('approvedReviews', 'rating')
            ->latest()
            ->paginate(20);

        // Get statistics
        $totalServices = Service::count();
        $totalValue = Service::whereNotNull('price')->sum('price');
        $avgPrice = Service::whereNotNull('price')->avg('price');
        $totalReviews = \App\Models\Review::where('status', 'approved')->count();
        $avgRating = \App\Models\Review::where('status', 'approved')->avg('rating');
        $categories = Service::whereNotNull('category')
            ->selectRaw('category, COUNT(*) as count')
            ->groupBy('category')
            ->orderByDesc('count')
            ->get();

        return view('admin.services.index', compact(
            'services',
            'totalServices',
            'totalValue',
            'avgPrice',
            'totalReviews',
            'avgRating',
            'categories'
        ));
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service): View
    {
        $service->load(['provider', 'reviews.user']);

        // Get review statistics
        $reviews = $service->reviews()->with('user')->latest()->paginate(10);
        $ratingBreakdown = $service->rating_breakdown;
        $totalReviews = $service->total_reviews;
        $averageRating = $service->average_rating;

        return view('admin.services.show', compact(
            'service',
            'reviews',
            'ratingBreakdown',
            'totalReviews',
            'averageRating'
        ));
    }
}

