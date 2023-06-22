<?php

namespace Database\Factories;

use App\Models\mahasiswa;
use App\Models\pegawai;
use App\Models\prodi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    protected $model = mahasiswa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->bothify('????-#####'),
            'id_pegawai' => pegawai::factory(),
            'id_prodi' => prodi::factory(),
            'id_user' => User::factory(),
            'nama_mhs' => fake()->name(),
            'no_telpon_mhs' => fake()->randomNumber(9),
            'alamat_mhs' => fake()->address(),
            'tahun_lulus' => fake()->year(),
            'status_umum' => fake()->word()
        ];
    }
}
