<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Prefix Admin
Route::prefix('admin')->name('admin.')->group(function () {
  // Authentication
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

  // Middleware Auth
  Route::middleware(['auth', 'role:super admin|admin'])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Product
    Route::resource('products', ProductController::class);

    // Users
    Route::resource('users', UserController::class);
  });
});
