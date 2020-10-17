<?php

namespace App\Http\Controllers;

use App\User;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends AdminController
{
    protected function uservalidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ]);
    }

    protected function uservalidatorupdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ]);
    }

    protected function changepassvalidator(array $data)
    {
        return Validator::make($data, [
            'old_password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'different:old_password'],
        ]);
    }

    public function index()
    {
        $mUsers = User::where('role_id', '!=', 1)->paginate(10);
        return view('admin.user.index', ['mUsers' => $mUsers]);
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->uservalidator($request->all())->validate();
        DB::beginTransaction();
        try {
            $mUser = new User();
            $mUser->name = $request->name;
            $mUser->email = $request->email;
            $mUser->password = Hash::make($request->password);
            $mUser->phone = $request->phone;
            $mUser->address = $request->address;
            $mUser->role_id = 2;
            $mUser->save();
            DB::commit();

            return redirect()->route('user.index')->with('success', 'Berhasil Menambahkan Relawan');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function edit($id)
    {
        $mUser = User::findOrFail($id);
        return view('admin.user.edit', [
            'mUser' => $mUser,
        ]);
    }

    public function update(Request $request, $id){
        $this->uservalidatorupdate($request->all())->validate();
        DB::beginTransaction();
        try {
            $mUser = User::findOrFail($id);
            $mUser->name = $request->name;
            $mUser->email = $request->email;
            $mUser->phone = $request->phone;
            $mUser->address = $request->address;
            $mUser->save();
            DB::commit();

            return redirect()->route('user.index')->with('success', 'Berhasil Edit User');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function destroy($id)
    {
        $mUser = User::findOrFail($id);
        if ($mUser->role_id == 1){
            return redirect()->route('user.index')->with('danger', 'Terjadi Kesalahan');
        }else{
            DB::beginTransaction();
            try {
                $mUser->delete();
                DB::commit();

                return redirect()->route('user.index')->with('success', 'Berhasil Hapus User');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        }
    }

    public function tps($id){
        $mUser = User::findOrFail($id);
        $mVotes = Vote::where('user_id', $id)->get();
        return view('admin.user.tps', [
            'mVotes' => $mVotes,
            'mUser' => $mUser,
        ]);
    }

    public function approve(Request $request, $id){
        $mUser = User::findOrFail($id);
        $mVote = Vote::findOrFail($request->vote_id);
        if ($mVote->user_id == $mUser->id){
            DB::beginTransaction();
            try {
                $mVote->status = Vote::VOTE_STATUS_APPROVE_ID;
                $mVote->save();
                DB::commit();

                return redirect()->route('user.tps', ['user' => $mUser->id])->with('success', 'Berhasil Menerima TPS');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        }else{
            return redirect()->route('user.tps', ['user' => $mUser->id])->with('danger', 'Relawan Tidak Memilih TPS tersebut');
        }
    }

    public function reject(Request $request, $id){
        $mUser = User::findOrFail($id);
        $mVote = Vote::findOrFail($request->vote_id);
        if ($mVote->user_id == $mUser->id){
            DB::beginTransaction();
            try {
                $mVote->status = Vote::VOTE_STATUS_REJECT_ID;
                $mVote->save();
                DB::commit();
                return redirect()->route('user.tps', ['user' => $mUser->id])->with('success', 'Berhasil Menolak TPS');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        }else{
            return redirect()->route('user.tps', ['user' => $mUser->id])->with('danger', 'Relawan Tidak Memilih TPS tersebut');
        }
    }

    public function changepass(){
        $mUser = User::findOrFail(Auth::user()->id);
        return view('admin.user.changepass', [
            'mUser' => $mUser,
        ]);

    }

    public function changepassstore(Request $request){
        $mUser = User::findOrFail(Auth::user()->id);
        $this->changepassvalidator($request->all())->validate();

        if (Hash::check($request->old_password, $mUser->password)){
            DB::beginTransaction();
            try {
                $mUser->fill([
                    'password' => Hash::make($request->password)
                ])->save();
                DB::commit();

                return redirect()->route('user.changepass')->with('success', 'Berhasil Ganti Password');
            } catch (Throwable $e) {
                DB::rollBack();
                dd($e);
            }
        }else{
            return redirect()->route('user.changepass')->with('danger', 'Password Lama Salah');
        }
    }

}
