<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\Peroid;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemiluController extends AdminController
{
    protected function pemiluvalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'start' => ['required', 'numeric'],
            'end' => ['required', 'numeric'],
            'position_id' => ['required', 'numeric'],
        ]);
    }

    public function index()
    {
        $mElections = Election::all();
        return view('admin.pemilu.index', ['mElections' => $mElections]);
    }

    public function create(){
        $mPeroids = Peroid::all();
        $mPositions = Position::all();
        return view('admin.pemilu.create', [
            'mPeroids' => $mPeroids,
            'mPositions' => $mPositions,
        ]);
    }

    public function store(Request $request){
        $this->pemiluvalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mElection = new Election();
            $mElection->name = $request->name;
            $mElection->start = $request->start;
            $mElection->end = $request->end;
            $mElection->position_id = $request->position_id;
            $mElection->save();
            DB::commit();

            return redirect()->route('pemilu.index')->with('success', 'Berhasil Menambahkan Pemilu');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function show($id)
    {
        $mElection = Election::findOrFail($id);
        $mCandidates = Candidate::all()->where('election_id', $mElection->id)->sortBy('nourut');

        return view('admin.pemilu.show', [
            'mElection' => $mElection,
            'mCandidates' => $mCandidates,
        ]);
    }

    public function edit($id)
    {
        $mPeroids = Peroid::all();
        $mPositions = Position::all();
        $mElection = Election::findOrFail($id);
        return view('admin.pemilu.edit', [
            'mElection' => $mElection,
            'mPeroids' => $mPeroids,
            'mPositions' => $mPositions,
        ]);
    }

    public function update(Request $request, $id){
        $this->pemiluvalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mElection = Election::findOrFail($id);
            $mElection->name = $request->name;
            $mElection->start = $request->start;
            $mElection->end = $request->end;
            $mElection->position_id = $request->position_id;
            $mElection->save();
            DB::commit();

            return redirect()->route('pemilu.index')->with('success', 'Berhasil Edit Pemilu');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function destroy($id)
    {
        $mElection = Election::findOrFail($id);

        DB::beginTransaction();
        try {
            $mElection->delete();
            DB::commit();

            return redirect()->route('pemilu.index')->with('success', 'Berhasil Hapus Pemilu');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
