<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class, 'id_pegawai', 'id_pegawai');
    }

    public function berita()
    {
        return $this->hasMany(berita::class, 'id_pegawai', 'id_pegawai');
    }

    public function akademik()
    {
        return $this->hasMany(akademik::class, 'id_pegawai', 'id_pegawai');
    }

    public function perpustakaan()
    {
        return $this->hasMany(perpustakaan::class, 'id_pegawai', 'id_pegawai');
    }

    public function keuangan()
    {
        return $this->hasMany(keuangan::class, 'id_pegawai', 'id_pegawai');
    }

    public function tugas_akhir()
    {
        return $this->hasMany(tugas_akhir::class, 'id_pegawai', 'id_pegawai');
    }
}
