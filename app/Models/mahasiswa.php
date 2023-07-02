<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id_mahasiswa';

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function tugas_akhir()
    {
        return $this->hasMany(tugas_akhir::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function keuangan()
    {
        return $this->hasMany(keuangan::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function perpustakaan()
    {
        return $this->hasMany(perpustakaan::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function akademik()
    {
        return $this->hasMany(akademik::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
