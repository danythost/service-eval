<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $providersCount = User::where('role', RoleEnum::PROVIDER)->count();
        $servicesCount = Service::count();
        $reviewsCount = 0; // Placeholder for future reviews feature

        return view('admin.dashboard', compact('providersCount', 'servicesCount', 'reviewsCount'));
    }
}

