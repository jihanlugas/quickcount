<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        $mElections = Election::all();
        return view('perhitungan.index', [
            'mElections' => $mElections,
        ]);
    }


    public function detail($id)
    {
        $mElection = Election::findOrFail($id);
        $mCandidates = Candidate::where('election_id', $mElection->id)
            ->orderBy('nourut', 'ASC')
            ->get();


        return view('perhitungan.detail', [
            'mElection' => $mElection,
            'mCandidates' => $mCandidates,
        ]);
    }
}
