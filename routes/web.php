<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserLocationController;

// Redirect root to login page
Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'index'])->name('login.form');
Route::post('/login', [LoginController::class, 'customLogin'])->name('login');
Route::post('/logout', [LoginController::class, 'signOut'])->name('logout');

// User management routes
Route::resource('users', UserController::class);

// Explicitly define user creation and editing routes (optional)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/admin/index', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::post('/save-location', [LocationController::class, 'store'])->name('save-location');
    Route::get('/admin/locations', [LocationController::class, 'index'])->name('admin.location');
    Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
    Route::get('/admin/index', [LocationController::class, 'dashboard'])->name('admin.index');
    Route::get('/admin/index', [LocationController::class, 'dashboard'])->name('admin.index');
});

// User dashboard routes
Route::middleware('user')->group(function () {
    Route::get('/user/index', [UserDashboardController::class, 'index'])->name('user.index');
    Route::get('/locations/create', [UserLocationController::class, 'create'])->name('locations.create');
    Route::post('user/locations', [UserLocationController::class, 'store'])->name('user-save-location');
    Route::get('user/index', [UserLocationController::class, 'index'])->name('user.index');
});
