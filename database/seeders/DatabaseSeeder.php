<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\BeritaFactory;
use Illuminate\Database\Seeder;
use App\Models\berita;
use App\Models\akademik;
use App\Models\jurusan;
use App\Models\keuangan;
use App\Models\pegawai;
use App\Models\mahasiswa;
use App\Models\perpustakaan;
use App\Models\tugas_akhir;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)
            ->create();

        jurusan::factory(5)
            ->create();

        pegawai::factory(5)
            ->create();

        mahasiswa::factory(5)
            ->create();

        berita::factory(5)
            ->create();

        akademik::factory(10)
            ->create();

        perpustakaan::factory(10)
            ->create();

        keuangan::factory(10)
            ->create();

        tugas_akhir::factory(10)
            ->create();
    }
}
