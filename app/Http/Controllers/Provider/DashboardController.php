<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = auth()->user()->services()->count();
        
        return view('provider.dashboard', compact('servicesCount'));
    }
}
