<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
    }

    public function index()
    {
        return view('home');
    }

    public function beranda()
    {
        return view('beranda');
    }

    public function success()
    {
        return view('success');
    }

    public function tentang()
    {
        return view('tentang');
    }

    public function petunjuk()
    {
        return view('petunjuk');
    }

    public function kegiatansosial()
    {
        return view('kegiatansosial');
    }


}
