<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'status_peminjaman',
        'pegawai_id'
    ];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
    public function detailPinjam(){
        return $this->belongsTo(DetailPinjam::class);
    }
}
