<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('customer.auth.login');
    }
    public function register()
    {
        return view('customer.auth.register');
    }
}
