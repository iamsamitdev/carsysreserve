<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }

    public function login(){
        return view('backend.pages.login');
    }

    public function register(){
        return view('backend.pages.register');
    }
}
