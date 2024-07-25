<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kondisi',
        'keterangan',
        'jumlah',
        'tgl_register',
        'ruang_id'
    ];

    public function ruang()
    {
        return $this->hasMany(Ruang::class);
    }

    public function detailPinjam(){
        return $this->belongsTo(DetailPinjam::class);
    }
}
