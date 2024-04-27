<?php

use Illuminate\Support\Facades\Route;

Route::get('/user/dasboard', function () {
    return view('pages.user.dashboard.index');
})->name('user.dashboard');

Route::get('/user/tasks', function () {
    return view('pages.user.tasks.index');
})->name('user.tasks.index');

Route::get('/user/tasks/detail', function () {
    return view('pages.user.tasks.show');
})->name('user.tasks.show');

Route::get('/user/profile', function () {
    return view('pages.user.profile');
})->name('user.profile');