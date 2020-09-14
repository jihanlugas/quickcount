<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PilkadaController extends AdminController
{
    protected function pilkadavalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'start' => ['required', 'numeric'],
            'end' => ['required', 'numeric'],
            'position' => ['required'],
        ]);
    }

    public function index()
    {
        $mElections = Election::all();
        return view('admin.pilkada.index', ['mElections' => $mElections]);
    }

    public function create(){
        return view('admin.pilkada.create');
    }

    public function store(Request $request){
        $mElections = new Election();
        $this->pilkadavalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mElections->name = $request->name;
            $mElections->start = $request->start;
            $mElections->end = $request->end;
            $mElections->position = $request->position;
            $mElections->save();
            DB::commit();

            return redirect()->route('pilkada.index')->with('success', 'Berhasil Menambahkan Pilkada');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function show($id)
    {
        $mElection = Election::findOrFail($id);


        return view('admin.pilkada.show', ['mElection' => $mElection]);
    }
}
