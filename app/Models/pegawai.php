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
        return $this->belongsTo(pegawai::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }

    public function berita()
    {
        return $this->hasMany(berita::class);
    }

    public function akademik()
    {
        return $this->hasMany(akademik::class);
    }

    public function perpustakaan()
    {
        return $this->hasMany(perpustakaan::class);
    }

    public function keuangan()
    {
        return $this->hasMany(keuangan::class);
    }

    public function tugas_akhir()
    {
        return $this->hasMany(tugas_akhir::class);
    }
}
