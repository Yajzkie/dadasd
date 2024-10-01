<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index'); // Ensure this is present
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy'); // Add this line
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');


Auth::routes();

Route::get('/admin/index', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('admin.index');
Route::post('/save-location', [App\Http\Controllers\LocationController::class, 'store'])->name('save-location');
Route::get('/locations', [App\Http\Controllers\LocationController::class, 'index'])->name('admin.location');
Route::delete('/locations/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('locations.destroy');



