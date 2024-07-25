<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nip',
        'alamat',
        'status',
        'user_id'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }
}
