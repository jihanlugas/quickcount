<?php

namespace App\Http\Controllers;

use App\Electiontps;
use App\Province;
use App\District;
use App\Subdistrict;
use App\Election;
use App\Peroid;
use App\Position;
use App\Tps;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PemiluController extends AdminController
{
    protected function pemiluvalidator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'position_id' => ['required'],
        ]);

        $validator->sometimes('province_id', 'required|numeric', function ($input) {
            return $input->position_id >= Position::POSSITION_GUBERNUR_ID;
        });

        $validator->sometimes('district_id', 'required|numeric', function ($input) {
            return $input->position_id >= Position::POSSITION_BUPATI_ID;
        });

        return $validator;
    }

    protected function storetpsvalidator(array $data)
    {
        $validator = Validator::make($data, [
            'election_id' => ['required'],
            'position_id' => ['required'],
            'province_id' => ['required'],
            'district_id' => ['required'],
            'subdistrict_id' => ['required'],
            'villages' => ['required', 'array'],
        ]);

        return $validator;
    }

    public function index()
    {
        $mElections = Election::all();
        return view('admin.pemilu.index', ['mElections' => $mElections]);
    }

    public function create()
    {
        $mPeroids = Peroid::all();
        $mPositions = Position::all();
        $mProvinces = Province::all();
        $mDistricts = District::all();
        $mSubdistricts = Subdistrict::all();
        return view('admin.pemilu.create', [
            'mPeroids' => $mPeroids,
            'mPositions' => $mPositions,
            'mProvinces' => $mProvinces,
            'mDistricts' => $mDistricts,
            'mSubdistricts' => $mSubdistricts,
        ]);
    }

    public function store(Request $request)
    {
        $this->pemiluvalidator($request->all())->validate();
        $mElection = new Election();
        DB::beginTransaction();
        try {
            $this->save($mElection, $request);
            DB::commit();

            return redirect()->route('pemilu.index')->with('success', 'Berhasil Menambahkan Pemilu');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
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

    public function update(Request $request, $id)
    {
        $this->pemiluvalidator($request->all())->validate();
        $mElection = Election::findOrFail($id);
        DB::beginTransaction();
        try {
            $this->save($mElection, $request);
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

    public function settps($id)
    {
        $mElection = Election::findOrFail($id);
        $mProvinces = Province::all();
        $mDistricts = District::all();
        $mSubdistricts = Subdistrict::all();
        $mVilages = Village::all();

        return view('admin.pemilu.settps', [
            'mElection' => $mElection,
        ]);
    }

    public function storetps(Request $request, $id)
    {
        $mElection = Election::findOrFail($id);
        $request->request->add(['position_id' => $mElection->position_id]);
        if (!isset($request->election_id)) {
            $request->request->add(['election_id' => $mElection->id]);
            $request->election_id = $mElection->id;
        }
        if (!isset($request->province_id)) {
            $request->request->add(['province_id' => $mElection->province_id]);
            $request->province_id = $request->province_id;
        }
        if (!isset($request->district_id)) {
            $request->request->add(['district_id' => $mElection->district_id]);
            $request->district_id = $mElection->district_id;
        }
        if (!isset($request->subdistrict_id)) {
            $request->request->add(['subdistrict_id' => $mElection->subdistrict_id]);
            $request->subdistrict_id = $mElection->subdistrict_id;
        }

        $this->storetpsvalidator($request->all());

        DB::beginTransaction();
        try {
            Tps::where('election_id', $request->election_id)
                ->where('province_id', $request->province_id)
                ->where('district_id', $request->district_id)
                ->where('subdistrict_id', $request->subdistrict_id)
                ->delete();
            foreach ($request->villages as $village_id => $jumlah_tps) {
                $mTpss = Tps::withTrashed()
                    ->where('election_id', $request->election_id)
                    ->where('province_id', $request->province_id)
                    ->where('district_id', $request->district_id)
                    ->where('subdistrict_id', $request->subdistrict_id)
                    ->where('village_id', $village_id)
                    ->get();
                for ($i = 0; $i < $jumlah_tps; $i++) {
                    if (isset($mTpss[$i])) {
                        $mTps = $mTpss[$i];
                        $mTps->restore();
                    } else {
                        $mTps = new Tps();
                    }

                    $mTps->election_id = $request->election_id;
                    $mTps->province_id = $request->province_id;
                    $mTps->district_id = $request->district_id;
                    $mTps->subdistrict_id = $request->subdistrict_id;
                    $mTps->village_id = $village_id;
                    $mTps->name = 'TPS ' . ($i + 1);
                    $mTps->address = '';
                    $mTps->save();
                }
            }
            DB::commit();
            return redirect()->route('pemilu.settps', ['pemilu' => $id])->with('success', 'Berhasil Simpan TPS');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    private function save(Election $mElection, Request $request)
    {
        $mElection->name = $request->name;
        $mElection->start = $request->start;
        $mElection->end = $request->end;
        $mElection->position_id = $request->position_id;
        $mElection->province_id = $request->province_id;
        $mElection->district_id = $request->district_id;
        $mElection->save();
    }
}
