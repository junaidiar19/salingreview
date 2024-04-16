<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// include roles.admin
require_once __DIR__ . '/roles/admin.php';
