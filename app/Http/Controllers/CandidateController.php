<?php

namespace App\Http\Controllers;

use App\Election;
use App\Candidate;
use App\Peroid;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CandidateController extends AdminController
{
    protected function candidatevalidator(array $data)
    {
        return Validator::make($data, [
            'election_id' => ['required', 'numeric'],
            'ketua' => ['required'],
            'wakil' => ['required'],
            'nourut' => ['required', 'numeric'],
        ]);
    }

    public function create($id){
        $mElection = Election::findOrFail($id);
        return view('admin.candidate.create', [
            'mElection' => $mElection,
        ]);
    }

    public function store(Request $request, $id){
        Election::findOrFail($id);
        if ($id == $request->election_id ){
            $this->candidatevalidator($request->all())->validate();
            DB::beginTransaction();
            try {
                $mCandidate = new Candidate();
                $mCandidate->election_id = $request->election_id;
                $mCandidate->ketua = $request->ketua;
                $mCandidate->wakil = $request->wakil;
                $mCandidate->nourut = $request->nourut;
                $mCandidate->save();
                DB::commit();

                return redirect()->route('pemilu.show', ['pemilu' => $id])->with('success', 'Berhasil Menambahkan Kandidat');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        }else{
            return redirect()->route('pemilu.show', ['pemilu' => $id])->with('danger', 'Terjadi Kesalahan');
        }
    }

    public function edit($election_id, $id)
    {
        $mElection = Election::findOrFail($election_id);
        $mCandidate = Candidate::findOrFail($id);
        return view('admin.candidate.edit', [
            'mElection' => $mElection,
            'mCandidate' => $mCandidate,
        ]);
    }

    public function update(Request $request, $election_id, $id){
        $this->candidatevalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mElection = Election::findOrFail($election_id);
            $mCandidate = Candidate::findOrFail($id);
            $mCandidate->ketua = $request->ketua;
            $mCandidate->wakil = $request->wakil;
            $mCandidate->nourut = $request->nourut;
            $mCandidate->save();
            DB::commit();

            return redirect()->route('pemilu.show', ['pemilu' => $election_id])->with('success', 'Berhasil Edit Kandidat');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function destroy($election_id, $id)
    {
        $mElection = Election::findOrFail($election_id);
        $mCandidate = Candidate::findOrFail($id);

        DB::beginTransaction();
        try {
            $mCandidate->delete();
            DB::commit();

            return redirect()->route('pemilu.show', ['pemilu' => $election_id])->with('success', 'Berhasil Hapus Kandidat');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
