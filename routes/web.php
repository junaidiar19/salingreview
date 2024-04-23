<?php

use App\Http\Controllers\UploadFileCkeditorController;
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

Route::get('/login', function () {
    return view('pages.user.auth.login');
})->name('login');

Route::get('/register', function () {
    return view('pages.user.auth.register');
})->name('register');

// include roles.admin
require_once __DIR__ . '/roles/admin.php';

// include roles.user
Route::get('/user/dasboard', function () {
    return view('pages.user.dashboard.index');
})->name('user.dashboard');

// Upload media for CKEditor
Route::post('/ckeditor-upload-media', UploadFileCkeditorController::class)->name('ckeditor.upload');
