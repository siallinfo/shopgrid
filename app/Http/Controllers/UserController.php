<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        return $request;
    }
    public function edit($id)
    {
        return view('auth.edit');
    }
    public function update(Request $request, $id)
    {
        return $request;
    }
    public function delete($id)
    {
        return $id;
    }
}
