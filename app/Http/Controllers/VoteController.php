<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use App\Electionvote;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VoteController extends MemberController
{
    protected function votevalidator(array $data)
    {
        return Validator::make($data, [
            'election_id' => ['required', 'numeric'],
            'province_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'subdistrict_id' => ['required', 'numeric'],
            'village_id' => ['required', 'numeric'],
            'tps_id' => ['required', 'numeric'],
        ]);
    }

    protected function electionvotevalidator(array $data)
    {
        return Validator::make($data, [
            'suara_sah' => ['required', 'numeric'],
            'suara_tidak_sah' => ['required', 'numeric'],
            'candidate' => ['required', 'array'],
        ]);
    }
//    protected function votevalidatorupdate(array $data)
//    {
//        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'phone' => ['required', 'numeric'],
//            'address' => ['required'],
//        ]);
//    }

    public function index()
    {
        $mUser = User::where('id', Auth::user()->id)->first();
        $mVotes = Vote::where('user_id', $mUser->id)->get();
        return view('member.vote.index', [
            'mUser' => $mUser,
            'mVotes' => $mVotes,
        ]);
    }

    public function create(){
        return view('member.vote.create');
    }

    public function store(Request $request){
        $this->votevalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mVote = new Vote();
            $mVote->election_id = $request->election_id;
            $mVote->province_id = $request->province_id;
            $mVote->district_id = $request->district_id;
            $mVote->subdistrict_id = $request->subdistrict_id;
            $mVote->village_id = $request->village_id;
            $mVote->tps_id = $request->tps_id;
            $mVote->user_id = Auth::user()->id;
            $mVote->status = Vote::VOTE_STATUS_WAITING_ID;
            $mVote->save();
            DB::commit();

            return redirect()->route('vote.index')->with('success', 'Berhasil Input Suara');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function voting($id){
        $mUser = User::where('id', Auth::user()->id)->first();
        $mVote = Vote::findOrFail($id);
        if ($mVote->status != Vote::VOTE_STATUS_APPROVE_ID){
            return redirect()->route('vote.index')->with('danger', 'Status Input Suara Harus Diterima');
        }

        if ($mVote->user_id != $mUser->id){
            return redirect()->route('vote.index')->with('danger', 'Pemmision Denied');
        }

        $mElection = Election::findOrFail($mVote->election_id);
        $mCandidates = Candidate::where('election_id', $mElection->id)
                        ->orderBy('nourut', 'asc')->get();

        return view('member.vote.voting', [
            'mVote' => $mVote,
            'mElection' => $mElection,
            'mCandidates' => $mCandidates,
        ]);
    }

    public function votingstore(Request $request, $id){
        $mUser = User::where('id', Auth::user()->id)->first();
        $mVote = Vote::findOrFail($id);
        if ($mVote->status != Vote::VOTE_STATUS_APPROVE_ID){
            return redirect()->route('vote.index')->with('danger', 'Status Input Suara Harus Diterima');
        }

        if ($mVote->user_id != $mUser->id){
            return redirect()->route('vote.index')->with('danger', 'Pemmision Denied');
        }

        $this->electionvotevalidator($request->all());

        DB::beginTransaction();
        try {
            $mVote->has_vote = 1;
            $mVote->suara_sah = $request->suara_sah;
            $mVote->suara_tidak_sah = $request->suara_tidak_sah;
            $mVote->total_suara = $request->suara_sah + $request->suara_tidak_sah;
            $mVote->save();
            foreach ($request->candidates as $candidate => $vote){
                $mCandidate = Candidate::findOrFail($candidate);
                $mElectionvote = new Electionvote();
                $mElectionvote->election_id = $mVote->election_id;
                $mElectionvote->province_id = $mVote->province_id;
                $mElectionvote->district_id = $mVote->district_id;
                $mElectionvote->subdistrict_id = $mVote->subdistrict_id;
                $mElectionvote->village_id = $mVote->village_id;
                $mElectionvote->tps_id = $mVote->tps_id;
                $mElectionvote->candidate_id = $mCandidate->id;
                $mElectionvote->user_id = $mUser->id;
                $mElectionvote->vote_id = $mVote->id;
                $mElectionvote->vote = $vote;
                $mElectionvote->save();
            }
            DB::commit();

            return redirect()->route('vote.index')->with('success', 'Berhasil Input Suara');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
