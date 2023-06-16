<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }

    public function akun()
    {
        return $this->hasOne(akun::class);
    }

    public function tugas_akhir()
    {
        return $this->HasMany(tugas_akhir::class);
    }

    public function keuangan()
    {
        return $this->hasMany(keuangan::class);
    }

    public function perpustakaan()
    {
        return $this->hasMany(perpustakaan::class);
    }

    public function akademik()
    {
        return $this->hasMany(akademik::class);
    }
}
