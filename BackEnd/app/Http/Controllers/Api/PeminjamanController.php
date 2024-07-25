<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PeminjamanResource;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    //
    public $jumlah;
    public function __construct()
    {
        $this->jumlah = Peminjaman::count();
    }
    public function index(){
        $peminjaman = Peminjaman::latest()->paginate(5);
        return new PeminjamanResource(true,'Lis Data Peminjaman', $this->jumlah, $peminjaman);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'tanggal_pinjam'    => 'required',
            'tanggal_kembali'   => 'required',
            'status_peminjaman' => 'required'
        ]);

        if($validasi->fails()){
            return response()->json($validasi->errors(),422);

        }
        $peminjaman = Peminjaman::create([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali'=> $request->tanggal_kembali,
            'status_peminjaman'         => $request->status_peminjaman,
            'pegawai_id'     => $request->pegawai_id
        ]);
        return new PeminjamanResource(true, 'Data Peminjaman Berhasil Di Tambahkan' ,$this->jumlah,$peminjaman);
    }
    public function show($id){
        $peminjaman = Peminjaman::find($id);
        return new PeminjamanResource(true,'Detail Data peminjaman',$this->jumlah, $peminjaman);
    }
}
