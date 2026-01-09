<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = auth()->user()->services()->latest()->get();
        return view('provider.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preferred_colors' => 'nullable|string',
            'executives' => 'nullable|string',
            'portfolio_link' => 'nullable|url|max:255',
            'social_media_links' => 'nullable|string',
            'history' => 'nullable|string',
            'achievements' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'provider_name' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'street_address' => 'nullable|string|max:255',
            'google_maps_link' => 'nullable|string',
            'operating_hours' => 'nullable|string|max:255',
            'customer_categories' => 'nullable|string',
        ]);

        $data = $validated;
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image$i")) {
                $data["image$i"] = $request->file("image$i")->store('services', 'public');
            }
        }

        auth()->user()->services()->create($data);

        return redirect()->route('provider.services.index')
            ->with('status', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $this->authorize('view', $service);
        return view('provider.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);
        return view('provider.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'preferred_colors' => 'nullable|string',
            'executives' => 'nullable|string',
            'portfolio_link' => 'nullable|url|max:255',
            'social_media_links' => 'nullable|string',
            'history' => 'nullable|string',
            'achievements' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'provider_name' => 'nullable|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'street_address' => 'nullable|string|max:255',
            'google_maps_link' => 'nullable|string',
            'operating_hours' => 'nullable|string|max:255',
            'customer_categories' => 'nullable|string',
        ]);

        $data = $validated;
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image$i")) {
                // Delete old image if it exists
                if ($service->{"image$i"}) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($service->{"image$i"});
                }
                $data["image$i"] = $request->file("image$i")->store('services', 'public');
            }
        }

        $service->update($data);

        return redirect()->route('provider.services.index')
            ->with('status', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);
        $service->delete();

        return redirect()->route('provider.services.index')
            ->with('status', 'Service deleted successfully!');
    }
}
