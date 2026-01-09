<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('providers', ProviderController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class);
        Route::resource('reviews', ReviewController::class)->only(['index', 'show', 'update', 'destroy']);

    });

