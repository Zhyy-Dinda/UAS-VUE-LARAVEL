<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RuangResource;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RuangController extends Controller
{
    public $jumlah;
    public function __construct(){
        $this->jumlah = Ruang::count();
    }
    public function index()
    {
        $ruang = Ruang::latest()->paginate(5);
        return new RuangResource(true,'List Data Ruang' ,$this->jumlah , $ruang);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),
        [
            'nama_ruang'    => 'required',
            'keterangan'    => 'required'
        ]);

        // cek validasi
        if ($validasi->fails()){
            return response()->json($validasi->errors(), 422);
        }

        $ruang = Ruang::create([
            'nama_ruang'    => $request->nama_ruang,
            'keterangan'    => $request->keterangan,
        ]);

        return new RuangResource(true, 'Data Ruang berhasil di tambah',$this->jumlah, $ruang);
    }

    public function show($id)
    {
        $ruang = Ruang::find($id);
        return new RuangResource(true, 'Detail Data Ruang' ,$this->jumlah , $ruang);
    }

    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(),[
            'nama_ruang' => 'required',
            'keterangan'    => 'required',
        ]);

        // cek validasi
        if($validasi->fails()){
            return response()->json($validasi->errors(), 422);
        }

        $ruang = Ruang::find($id);
        $ruang->update([
            'nama_ruang' => $request->nama_ruang,
            'keterangan' => $request->keterangan
        ]);

        return new RuangResource(true, 'Data Ruang Berhasil Di Ubah' ,$this->jumlah , $ruang);
    }


    public function destroy($id)
    {
        $ruang = Ruang::find($id);
        $ruang->delete();
        return new RuangResource(true, 'Data Ruang Berhasil Di Haspus',$this->jumlah, null);
    }

}
