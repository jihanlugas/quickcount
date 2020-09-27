<?php

namespace App\Http\Controllers;

use App\Subdistrict;
use App\Tps;
use App\Election;
use App\Peroid;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TpsController extends AdminController
{
    protected function tpsvalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'address' => ['required'],
        ]);
    }

    public function index()
    {
        $mTpss = Tps::simplePaginate(10);
//        dd($mTpss);
        return view('admin.tps.index', ['mTpss' => $mTpss]);
    }

//    public function create(){
//        $mSubdistricts = Subdistrict::all();
//        return view('admin.tps.create', ['mSubdistricts' => $mSubdistricts]);
//    }

//    public function store(Request $request){
//        $this->tpsvalidator($request->all())->validate();
//        DB::beginTransaction();
//        try {
//            $mTps = new Tps();
//            $mTps->name = $request->name;
//            $mTps->subdistrict_id = $request->subdistrict_id;
//            $mTps->village_id = $request->village_id;
//            $mTps->address = $request->address;
//            $mTps->save();
//            DB::commit();
//
//            return redirect()->route('tps.index')->with('success', 'Berhasil Menambahkan Tps');
//        } catch (Throwable $e) {
//            DB::rollBack();
//            dd($e);
//        }
//    }

    public function edit($id)
    {
        $mTps = Tps::findOrFail($id);
        return view('admin.tps.edit', [
            'mTps' => $mTps,
        ]);
    }

    public function update(Request $request, $id){
        $this->tpsvalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mTps = Tps::findOrFail($id);
            $mTps->name = $request->name;
            $mTps->address = $request->address;
            $mTps->save();
            DB::commit();

            return redirect()->route('tps.index')->with('success', 'Berhasil Edit Tps');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function destroy($id)
    {
        $mTps = Tps::findOrFail($id);

        DB::beginTransaction();
        try {
            $mTps->delete();
            DB::commit();

            return redirect()->route('tps.index')->with('success', 'Berhasil Hapus Tps');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }


}
