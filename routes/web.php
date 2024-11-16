<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserLocationController;
use App\Exports\LocationsReportExport;
use Maatwebsite\Excel\Facades\Excel;

// Redirect root to login page
Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'customLogin'])->name('login');
Route::post('/logout', [LoginController::class, 'signOut'])->name('logout');

// Admin routes
Route::middleware('admin')->group(function () {
    // Dashboard and Location Routes
    Route::get('/admin/index', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::post('/save-location', [LocationController::class, 'store'])->name('save-location');
    Route::get('/admin/locations', [LocationController::class, 'index'])->name('admin.location');
    Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
    Route::get('/admin/index', [LocationController::class, 'dashboard'])->name('admin.index');
    Route::get('/admin/report', [LocationController::class, 'report'])->name('admin.report');

    // User Management Routes
    Route::get('/admin/adduser/create', [UserController::class, 'create'])->name('admin.adduser'); // Route for creating user
    Route::post('/admin/adduser/users', [UserController::class, 'store'])->name('users.store'); // Route for storing user
    Route::get('/admin/adduser/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Route for editing user
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.adduser');


    // Optional: User resource routes
    Route::resource('users', UserController::class);
});

// User dashboard routes
Route::middleware('user')->group(function () {
    Route::get('/user/index', [UserDashboardController::class, 'index'])->name('user.index');
    Route::get('/locations/create', [UserLocationController::class, 'create'])->name('locations.create');
    Route::post('user/locations', [UserLocationController::class, 'store'])->name('user-save-location');
    Route::get('user/index', [UserLocationController::class, 'index'])->name('user.index');
});



Route::get('/admin/report/export', function () {
    return Excel::download(new LocationsReportExport, 'location_report.xlsx');
})->name('admin.report.export');
