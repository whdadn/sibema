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
        return $this->belongsTo(prodi::class, 'id_prodi', 'id_prodi');
    }

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'username');
    }

    public function tugas_akhir()
    {
        return $this->HasMany(tugas_akhir::class, 'nim', 'nim');
    }

    public function keuangan()
    {
        return $this->hasMany(keuangan::class, 'nim', 'nim');
    }

    public function perpustakaan()
    {
        return $this->hasMany(perpustakaan::class, 'nim', 'nim');
    }

    public function akademik()
    {
        return $this->hasMany(akademik::class, 'nim', 'nim');
    }
}
