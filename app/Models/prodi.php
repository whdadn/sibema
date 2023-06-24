<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class, 'id_prodi', 'id_prodi');
    }
}
