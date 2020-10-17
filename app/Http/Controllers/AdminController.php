<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except(['changepass', 'changepassstore']);
        $this->middleware('license');
    }
}
