<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DetailPinjamResource;
use App\Models\DetailPinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailController extends Controller
{
    public $jumlah;
    public function __construct(){
        $this->jumlah = DetailPinjam::count();
    }
    public function index(){
        $detail = DetailPinjam::latest()->paginate(5);
        return new DetailPinjamResource(true,'List Data Detail Pinjam', $this->jumlah ,$detail);
    }

    public function show($id){
        $detail = DetailPinjam::find($id);
        return new DetailPinjamResource(true,'Show Data Detail Pinjam', $this->jumlah ,$detail);
    }

    public function store(Request $request){
        $valid = Validator::make($request->all(),[
            'jumlah'        => 'required',
        ]);

        if($valid->fails()){
            return response()->json($valid->errors(),422);
        }

        $detail = DetailPinjam::create([
            'jumlah'        =>  $request->jumlah,
            'peminjaman_id' =>  $request->peminjaman_id,
            'inventaris_id' =>  $request->inventaris_id,
        ]);

        return new DetailPinjamResource(true,'Data Detail inventaris Berhasil Di Tambahkan',$this->jumlah, $detail);
    }
}
