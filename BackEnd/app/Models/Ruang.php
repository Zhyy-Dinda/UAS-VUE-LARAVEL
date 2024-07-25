<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_ruang',
        'keterangan'
    ];

    public function Inventaris()
    {
        return $this->belongsTo(Ruang::class);
    }
}
