<?php

namespace App\Http\Controllers;

use App\Election;
use App\Candidate;
use App\Peroid;
use App\Position;
use App\Photoupload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CandidateController extends AdminController
{
    protected function candidatevalidator(array $data)
    {
        return Validator::make($data, [
            "election_id" => ["required", "numeric"],
            "ketua" => ["required"],
            "wakil" => ["required"],
            "nourut" => ["required", "numeric"],
            "photo_id" => ["image", "mimes:jpeg,png,jpg", "max:" . Photoupload::FILE_SIZE_MAX],
        ]);
    }

    public function index($id)
    {
        $mElection = Election::findOrFail($id);
        $mCandidates = Candidate::all()->where('election_id', $mElection->id)->sortBy('nourut');

        return view('admin.candidate.index', [
            'mElection' => $mElection,
            'mCandidates' => $mCandidates,
        ]);
    }

    public function create($id)
    {
        $mElection = Election::findOrFail($id);
        return view('admin.candidate.create', [
            'mElection' => $mElection,
        ]);
    }

    public function store(Request $request, $id)
    {
        Election::findOrFail($id);
        if ($id == $request->election_id) {
            $this->candidatevalidator($request->all())->validate();
            DB::beginTransaction();
            try {
                $mCandidate = new Candidate();
                $mCandidate->election_id = $request->election_id;
                $mCandidate->ketua = $request->ketua;
                $mCandidate->wakil = $request->wakil;
                $mCandidate->nourut = $request->nourut;
                $mCandidate->save();

                if ($request->photo_id){
                    $photo_id = Photoupload::uploadPhoto($request->photo_id, $mCandidate->id, Photoupload::REF_TYPE_TABLE_CANDIDATES, $mCandidate->id);
                    $mCandidate->photo_id = $photo_id;
                    $mCandidate->save();
                }

                DB::commit();

                return redirect()->route('candidate.index', ['pemilu' => $id])->with('success', 'Berhasil Menambahkan Kandidat');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        } else {
            return redirect()->route('candidate.index', ['pemilu' => $id])->with('danger', 'Terjadi Kesalahan');
        }
    }

    public function edit($election_id, $id)
    {
        $mElection = Election::findOrFail($election_id);
        $mCandidate = Candidate::findOrFail($id);
        $mCandidate->photo = Photoupload::getFilepathOrigin($mCandidate->photo_id);
        return view('admin.candidate.edit', [
            'mElection' => $mElection,
            'mCandidate' => $mCandidate,
        ]);
    }

    public function update(Request $request, $election_id, $id)
    {
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

            if ($request->photo_id){
                if ($mCandidate->photo_id){
                    Photoupload::deletePhoto($mCandidate->photo_id);
                }
                $photo_id = Photoupload::uploadPhoto($request->photo_id, $mCandidate->id, Photoupload::REF_TYPE_TABLE_CANDIDATES, $mCandidate->id);
                $mCandidate->photo_id = $photo_id;
                $mCandidate->save();
            }

            return redirect()->route('candidate.index', ['pemilu' => $election_id])->with('success', 'Berhasil Edit Kandidat');
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

            return redirect()->route('candidate.index', ['pemilu' => $election_id])->with('success', 'Berhasil Hapus Kandidat');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
