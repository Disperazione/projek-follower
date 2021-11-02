<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingularController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function index()
    {
        return view('admin.dashboard', compact('pesanan'));
    }
}
