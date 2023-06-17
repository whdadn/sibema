<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\BeritaFactory;
use Illuminate\Database\Seeder;
use App\Models\berita;
use App\Models\akademik;
use App\Models\akun;
use App\Models\jurusan;
use App\Models\keuangan;
use App\Models\pegawai;
use App\Models\mahasiswa;
use App\Models\perpustakaan;
use App\Models\prodi;
use App\Models\tugas_akhir;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        akademik::factory(5)->create();
        akun::factory(5)->create();
        berita::factory(5)->create();
        jurusan::factory(5)->create();
        keuangan::factory(5)->create();
        mahasiswa::factory(5)->create();
        pegawai::factory(5)->create();
        perpustakaan::factory(5)->create();
        prodi::factory(5)->create();
        tugas_akhir::factory(5)->create();
    }
}
