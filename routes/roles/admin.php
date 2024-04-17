<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Prefix Admin
Route::prefix('admin')->name('admin.')->group(function () {
  // Authentication
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
