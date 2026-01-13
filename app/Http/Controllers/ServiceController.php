<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services for the public.
     */
    public function index()
    {
        // Restore previous homepage controller logic: featuredServices, services, recentReviews only
        $featuredServices = Service::latest()->take(5)->get();
        $services = Service::latest()->paginate(12);
        $recentReviews = \App\Models\Review::with('service')->approved()->latest()->take(6)->get();
        $partners = \App\Models\Partner::latest()->get();
        $topProviders = \App\Models\User::where('role', 'provider')->withCount('services')->take(5)->get();
        return view('services.index', compact('services', 'featuredServices', 'recentReviews', 'partners', 'topProviders'));
    }

    /**
     * Display the specified service and its reviews.
     */
    public function show(Service $service)
    {
        $service->load(['approvedReviews' => function ($query) {
            $query->latest();
        }, 'provider']);

        return view('services.show', compact('service'));
    }
}
