<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProviderRequest;
use App\Http\Requests\Admin\UpdateProviderRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProviderController extends Controller
{
    /**
     * Display a listing of providers.
     */
    public function index(): View
    {
        $providers = User::where('role', RoleEnum::PROVIDER)
            ->withCount('services')
            ->latest()
            ->paginate(15);

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new provider.
     */
    public function create(): View
    {
        return view('admin.providers.create');
    }

    /**
     * Store a newly created provider.
     */
    public function store(StoreProviderRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => RoleEnum::PROVIDER,
        ]);

        return redirect()->route('admin.providers.index')
            ->with('status', 'Provider created successfully!');
    }

    /**
     * Display the specified provider.
     */
    public function show(User $provider): View
    {
        $this->ensureProvider($provider);

        $provider->load('services');

        return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified provider.
     */
    public function edit(User $provider): View
    {
        $this->ensureProvider($provider);

        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update the specified provider.
     */
    public function update(UpdateProviderRequest $request, User $provider): RedirectResponse
    {
        $this->ensureProvider($provider);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $provider->update($data);

        return redirect()->route('admin.providers.index')
            ->with('status', 'Provider updated successfully!');
    }

    /**
     * Remove the specified provider.
     */
    public function destroy(User $provider): RedirectResponse
    {
        $this->ensureProvider($provider);

        $provider->delete();

        return redirect()->route('admin.providers.index')
            ->with('status', 'Provider deleted successfully!');
    }

    /**
     * Ensure the user is a provider.
     */
    private function ensureProvider(User $user): void
    {
        if ($user->role !== RoleEnum::PROVIDER) {
            abort(404);
        }
    }
}

