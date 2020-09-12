<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    protected function pilkadavalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'start' => ['required', 'numeric'],
            'end' => ['required', 'numeric'],
        ]);
    }

    public function pilkada()
    {
        $mElections = Election::all();
        return view('admin.pilkada', ['mElections' => $mElections]);
    }

    public function create(){
        return view('admin.createpilkada');
    }

    public function postpilkada(Request $request){
        $mElections = new Election();
        $this->pilkadavalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mElections->name = $request->name;
            $mElections->start = $request->start;
            $mElections->end = $request->end;
            $mElections->save();
            DB::commit();

            return redirect(route('pilkada'));
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
