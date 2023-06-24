<?php

namespace Database\Factories;

use App\Models\perpustakaan;
use App\Models\pegawai;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\perpustakaan>
 */
class PerpustakaanFactory extends Factory
{
    protected $model = perpustakaan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_mahasiswa' => mahasiswa::factory(),
            'id_pegawai' => pegawai::factory(),
            'dokumen_perpus' => fake()->fileExtension(),
            'keterangan' => fake()->word(),
            'status_perpus' => fake()->word(),
            'rincian_perpus' => fake()->paragraphs(6, true)
        ];
    }
}
