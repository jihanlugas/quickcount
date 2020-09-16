<?php

namespace App\Http\Controllers;

use App\Village;
use App\Tps;
use App\Election;
use App\Peroid;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AjaxController extends AdminController
{
    public function getvillages(Request $request){
        $mVillages = Village::where('subdistrict_id', $request->subdistrict_id)->get();

        return response()->json($mVillages);
    }
}
