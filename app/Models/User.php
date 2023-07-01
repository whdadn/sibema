<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $primaryKey = 'id_user';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(mahasiswa::class, 'id_user', 'id_user');
    }

    public function pegawai()
    {
        return $this->hasOne(pegawai::class, 'id_user', 'id_user');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            if ($user->role === 'Mahasiswa') {
                $user->mahasiswa()->create();
            } elseif ($user->role === 'Admin Prodi') {
                $user->pegawai()->create();
            } elseif ($user->role === 'Panitia Tugas Akhir') {
                $user->pegawai()->create();
            } elseif ($user->role === 'Panitia Keuangan') {
                $user->pegawai()->create();
            } elseif ($user->role === 'Panitia Perpustakaan') {
                $user->pegawai()->create();
            } elseif ($user->role === 'Ketua Jurusan') {
                $user->pegawai()->create();
            }
        });
    }
}
