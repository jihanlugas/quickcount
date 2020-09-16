<?php

namespace App\Http\Controllers;

use App\Tps;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mUsers = User::where('role_id', '!=', 1)->get();
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

            return redirect()->route('user.index')->with('success', 'Berhasil Menambahkan Anggota');
        } catch (Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }

}
