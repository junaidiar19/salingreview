<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.home.about');
})->name('about');

Route::get('/how-it-works', function () {
    return view('pages.home.how_it_works');
})->name('how-it-works');

Route::get('/service', function () {
    return view('pages.home.service');
})->name('service');

Route::get('/contact', function () {
    return view('pages.home.contact');
})->name('contact');

// include roles.admin
require_once __DIR__ . '/roles/admin.php';
