<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public $jumlah;
    public function __construct(){
        $this->jumlah = User::count();
        
    }
    public function index()
    {
        $User = User::latest()->paginate(5);
        return new UserResource(true, 'List Data User',$this->jumlah, $User);
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
        if ($valid->fails()) {
            return response()->json($valid->errors(), 422);
        }
        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->newPassword)
        ]);

        return new UserResource(true, 'Data Berhasil Di Tambah',$this->jumlah, $user);
    }

    public function show($id)
    {
        $data = User::find($id);
        return new UserResource(true, 'Deail Data User',$this->jumlah , $data);
    }

    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(),[
            'username'  => 'required',
            'email'     => 'required',
            'password'     => 'required',
        ]);
        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }
        $user = User::find($id);
        $user->update([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return new UserResource(true , 'Data User Berhasi Du Ubah',$this->jumlah , $user);
    }

    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        return new UserResource(true,'Data User Berhasil di Hapus', $this->jumlah ,$data);
    }

}
