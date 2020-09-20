<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
