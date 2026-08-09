<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
    Route::resource('projects', ProjectController::class)->names('projects');
    Route::resource('users', UserController::class)->names('users');
});

require __DIR__.'/settings.php';
require __DIR__.'/admin.php';
