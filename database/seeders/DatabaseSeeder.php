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

        jurusan::factory(count: 5)
            ->has(prodi::factory(count: 3)
                ->has(mahasiswa::factory(count: 3)
                    ->has(User::factory(count: 3))))
            ->create();
    }
}
