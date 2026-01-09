<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enums\RoleEnum;

class DashboardRedirectController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return match ($user->role) {
            RoleEnum::ADMIN    => redirect()->route('admin.dashboard'),
            RoleEnum::PROVIDER => redirect()->route('provider.dashboard'),
            default            => redirect()->route('profile.edit')
                ->with('error', 'Your account role is not properly configured. Please contact support.'),
        };
    }
}
