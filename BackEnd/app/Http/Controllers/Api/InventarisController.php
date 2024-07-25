<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InventarisResource;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    //
    public $jumlah;
    public function __construct(){
        $this->jumlah = Inventaris::count();
    }
    public function index()
    {
        $data = Inventaris::latest()->paginate(5);
        return new InventarisResource(true, 'List Data Inventaris', $this->jumlah, $data);
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'nama'          => 'required',
            'kondisi'       => 'required',
            'keterangan'    => 'required',
            'jumlah'        => 'required',
            'tgl_register'  => 'required',
            'ruang_id'      => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors(), 422);
        }

        $inven = Inventaris::create([
            'nama'    => $request->nama,
            'kondisi'    => $request->kondisi,
            'keterangan'    => $request->keterangan,
            'jumlah'    => $request->jumlah,
            'tgl_register'    => $request->tgl_register,
            'ruang_id'    => $request->ruang_id,
        ]);
        return new InventarisResource(true, 'Data Inventaris Berhasil di Tambahkan', $this->jumlah, $inven);
    }

    public function show($id)
    {
        $inven = Inventaris::find($id);
        return new InventarisResource(true, 'Detail Data Inventaris',$this->jumlah , $inven);
    }

    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(), [
            'nama'          => 'required',
            'kondisi'       => 'required',
            'keterangan'    => 'required',
            'jumlah'        => 'required',
            'tgl_register'  => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json($valid->errors(), 422);
        }
        $inven = Inventaris::find($id);
        $inven->update([
            'nama'    => $request->nama,
            'kondisi'    => $request->kondisi,
            'keterangan'    => $request->keterangan,
            'jumlah'    => $request->jumlah,
            'tgl_register'    => $request->tgl_register,
            'ruang_id'    => $request->ruang_id
        ]);

        return new InventarisResource(true,'Data Inventaris Berhasil Di ubah',$this->jumlah, $inven);
    }

    public function destroy($id){
        $data = Inventaris::find($id);
        $data->delete();
        return new InventarisResource(true,'Data Inventaris berhasil di Hapus',$this->jumlah, null );
    }
}
