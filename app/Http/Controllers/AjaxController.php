<?php

namespace App\Http\Controllers;

use App\Tps;
use App\Election;
use App\Peroid;
use App\Position;
use App\Province;
use App\District;
use App\Subdistrict;
use App\User;
use App\Village;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function getelections(Request $request)
    {
        $mElections = Election::all();

        return response()->json($mElections);
    }

    public function getprovinces(Request $request)
    {
        $mProvinces = Province::all();

        return response()->json($mProvinces);
    }

    public function getdistricts(Request $request)
    {
        $mDistricts = District::where('province_id', $request->province_id)->get();

        return response()->json($mDistricts);
    }

    public function getsubdistricts(Request $request)
    {
        $mSubdistricts = Subdistrict::where('district_id', $request->district_id)->get();

        return response()->json($mSubdistricts);
    }

    public function getvillages(Request $request)
    {
        $mVillages = Village::where('subdistrict_id', $request->subdistrict_id)->get();

        return response()->json($mVillages);
    }

    public function getvillagetpss(Request $request)
    {
        $mVillages = Village::with('tpss')->where('subdistrict_id', $request->subdistrict_id)->get();
//        $mVillages = Village::where('subdistrict_id', $request->subdistrict_id)->get();
//        dd($mVillages);
//        foreach ($mVillages as $mVillage){
//            dd($mVillage->tpss);
//        }
        return response()->json($mVillages);
    }

    public function gettpss(Request $request)
    {
        $mTpss = Tps::where('election_id', $request->election_id)
            ->where('village_id', $request->village_id)->get();

        return response()->json($mTpss);
    }

    public function getavailabletpss(Request $request)
    {
//        $mTpss = Tps::select('tps.id as tpsid')
//                    ->select('votes.id')
//                    ->select('tps.name')
//                    ->leftJoin('votes', function ($join){
//                        $join->on('votes.tps_id', '=', 'tps.id');
//                            ->where('votes.status', '<=', Vote::VOTE_STATUS_APPROVE_ID);
//                    })
//                    ->whereNull('votes.deleted_at')
//                    ->whereNull('votes.id')
//                    ->where('tps.election_id', $request->election_id)
//                    ->where('tps.village_id', $request->village_id)
//                    ->get();

        $qTpss = DB::select("SELECT tps.id , tps.name
                                    FROM tps
                                    LEFT JOIN votes ON votes.tps_id = tps.id
                                        AND votes.status <= :vsa
                                        AND votes.deleted_at IS NULL
                                    WHERE tps.election_id = :eid
                                    AND votes.id IS NULL
                                    AND tps.deleted_at IS NULL
                                    AND tps.village_id = :vid", [
            'vsa' => Vote::VOTE_STATUS_APPROVE_ID,
            'eid' => $request->election_id,
            'vid' => $request->village_id,
        ]);

        return response()->json($qTpss);
    }

    public function getperhitungandata(Request $request)
    {
        $mElection = Election::findOrFail($request->election_id);
        $data = [];
        $colors = ['red', 'blue', 'green', 'yellow', 'pink'];
        $data['vote'] = DB::selectOne("SELECT SUM(votes.suara_sah) as suara_sah
                                                , SUM(votes.suara_tidak_sah) as suara_tidak_sah
                                                , SUM(votes.total_suara) as total_suara
                                                , COUNT(votes.id) as total_tps
                                                , SUM(votes.has_vote) as has_vote
                                                FROM votes
                                                WHERE votes.deleted_at IS NULL
                                                AND votes.election_id = :eid
                                                AND votes.status = :apr
                                                GROUP BY votes.election_id",
            [
                'eid' => $mElection->id,
                'apr' => Vote::VOTE_STATUS_APPROVE_ID,
            ]);


        $data['candidates'] = DB::select("SELECT candidates.nourut
                                                , candidates.id
                                                , candidates.ketua
                                                , candidates.wakil
                                                , SUM(electionvotes.vote) as vote
                                                FROM candidates
                                                LEFT JOIN electionvotes ON electionvotes.election_id = candidates.election_id
                                                    AND electionvotes.candidate_id = candidates.id
                                                WHERE candidates.deleted_at IS NULL
                                                AND candidates.election_id = :eid
                                                GROUP BY candidates.id, candidates.nourut, candidates.ketua, candidates.wakil
                                                ORDER BY candidates.nourut ASC",
            [
                'eid' => $mElection->id,
            ]);

        foreach ($data['candidates'] as $index => $candidate){
            $data['candidates'][$index]->color = $colors[$index];
            $data['candidates'][$index]->vote = $data['candidates'][$index]->vote ? $data['candidates'][$index]->vote : 0;
        }

        return response()->json($data);
    }

    public function getusertps(Request $request)
    {
        $mUser = User::findOrFail(Auth::user()->id)->first();
        if($mUser){
            $qTpss = DB::select("SELECT tps.id
                                        , tps.name
                                        , tps.address
                                        FROM tps
                                        JOIN votes on tps.id = votes.tps_id
                                            AND votes.deleted_at IS NULL
                                            AND votes.user_id = :uid
                                        WHERE tps.deleted_at IS NULL
                                        AND votes.election_id = :eid
                                        AND votes.village_id = :vid");

            if (count($qTpss) > 0){
                return response()->json($qTpss);
            }else{
                return false;
            }
        }else{
            return false;
        }
//        $qTpss = DB::select("SELECT tps.id , tps.name
//                                    FROM tps
//                                    LEFT JOIN votes ON votes.tps_id = tps.id
//                                        AND votes.status <= :vsa
//                                        AND votes.deleted_at IS NULL
//                                    WHERE tps.election_id = :eid
//                                    AND votes.id IS NULL
//                                    AND tps.deleted_at IS NULL
//                                    AND tps.village_id = :vid", [
//            'vsa' => Vote::VOTE_STATUS_APPROVE_ID,
//            'eid' => $request->election_id,
//            'vid' => $request->village_id,
//        ]);
//
//        return response()->json($qTpss);
    }

}
