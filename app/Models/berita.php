<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $fillable = ['judul_berita', 'isi_berita', 'gambar'];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class);
    }
}
