<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
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

//    public function tes()
//    {
//        DB::insert("INSERT INTO provinces (name, code)
//                        SELECT wilayahs.name, wilayahs.code
//                        FROM wilayahs
//                        WHERE LENGTH(wilayahs.code) < 5");
//    }




}
