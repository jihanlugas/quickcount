<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class ExpiredController extends BaseController
{
    public function expired(){
        return view('expired');
    }
}
