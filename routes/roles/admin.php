<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderControler;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TaskReviewerController;
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
    Route::get('product/get-data', [ProductController::class, 'getProduct'])->name('products.get-data');

    // Users
    Route::resource('users', UserController::class);
    Route::get('/user/get-data/select', [UserController::class, 'getUserForSelect'])->name('users.get-data.select');

    // Orders
    Route::resource('orders', OrderControler::class);
    Route::get('/order/get-data/select', [OrderControler::class, 'getOrderForSelect'])->name('orders.get-data.select');

    // Tasks
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/{taskId}/reviewers', [TaskReviewerController::class, 'index'])->name('tasks.reviewers.index');
  });
});
