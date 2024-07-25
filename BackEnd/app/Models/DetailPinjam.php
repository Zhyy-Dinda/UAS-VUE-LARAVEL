<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah',
        'peminjaman_id',
        'inventaris_id',
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
    public function inventaris(){
        return $this->hasMany(Inventaris::class);
    }
}
