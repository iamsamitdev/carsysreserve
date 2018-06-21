<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index()
    {
        return redirect('backend/dashboard');
    }

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

    public function nopermission()
    {
        return view('backend.pages.nopermission');
    }

    public function department()
    {
        return "This is admin area only";
    }

    public function calendars()
    {
        return view('backend.pages.calendars');
    }

    public function bookings()
    {
        return view('backend.pages.bookings');
    }

    public function cardetails()
    {
        return view('backend.pages.cardetails');
    }
}
