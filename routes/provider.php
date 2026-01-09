<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Provider\DashboardController;
use App\Http\Controllers\Provider\ServiceController;

Route::middleware(['auth', 'provider'])
    ->prefix('provider')
    ->name('provider.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('services', ServiceController::class);
    });
