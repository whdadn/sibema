<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id_jurusan';

    public function prodi()
    {
        return $this->hasMany(prodi::class, 'id_jurusan', 'id_jurusan');
    }
}
