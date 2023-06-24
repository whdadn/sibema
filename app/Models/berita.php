<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
