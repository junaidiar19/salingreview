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

// include roles.admin
require_once __DIR__ . '/roles/admin.php';

// include roles.user
require_once __DIR__ . '/roles/user.php';

// Upload media for CKEditor
Route::post('/ckeditor-upload-media', UploadFileCkeditorController::class)->name('ckeditor.upload');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
