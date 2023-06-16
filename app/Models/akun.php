<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class);
    }

    public function pegawai()
    {
        return $this->hasOne(pegawai::class);
    }
}
