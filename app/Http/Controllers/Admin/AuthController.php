<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.admin.auth.login');
    }

    public function authenticate(Request $request)
    {

        return to_route('admin.dashboard');
    }

    public function logout()
    {
    }
}
