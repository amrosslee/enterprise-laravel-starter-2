<?php

use Illuminate\Support\Facades\Route;
Route::group(["prefix"=> "admin"], function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    })->name('admin.dashboard');
});
