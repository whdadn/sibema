<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(prodi::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }

    public function user()
    {
        return $this->belongsTo(akun::class);
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
