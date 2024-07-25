<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PegawaiResource;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    //
    public $jumlah;
    public function __construct(){
        $this->jumlah = Pegawai::count();
    }
    public function index(){
        $pegawai = Pegawai::latest()->paginate(5);
        return new PegawaiResource(true, 'List Data Pegawai',$this->jumlah, $pegawai);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),
        [
            'nama'    => 'required',
            'nip'     => 'required',
            'alamat'  => 'required',
            'status'  => 'required',
        ]);

        if($validasi->fails()){
            return response()->json($validasi->errors(), 422);
        }

        $pegawai = Pegawai::create([
            'nama'  => $request->nama,
            'nip'   => $request->nip,
            'alamat'=> $request->alamat,
            'status'=> $request->status,
            'user_id' => $request->user_id
        ]);
        return new PegawaiResource(true,'Data Pegawai Berhasil Di Tambahkan',$this->jumlah, $pegawai);
    }

    public function show($id){
        $pegawai = Pegawai::find($id);
        return new PegawaiResource(true,'Detail Data Pegawai',$this->jumlah, $pegawai);
    }

    public function update(Request $request, $id){
        $validasi = Validator::make($request->all(),[
            'nama'    => 'required',
            'nip'     => 'required',
            'alamat'  => 'required',
            'status'  => 'required',
            'user_id' => 'required'
        ]);

        if($validasi->fails()){
            return response()->json($validasi->errors(), 422);
        }

        $pegawai = Pegawai::find($id);
        $pegawai->update([
            'nama'  => $request->nama,
            'nip'   => $request->nip,
            'alamat'=> $request->alamat,
            'status'=> $request->status,
            'user_id'=> $request->user_id
        ]);
        return new PegawaiResource(true, 'Data Pegawai Berhasil di Update',$this->jumlah, $pegawai);
    }

    public function destroy($id){
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return new PegawaiResource(true,'Data Pegawai Behasil Di Hapus',$this->jumlah, null);
    }
}
