<?php

namespace Database\Factories;

use App\Models\tugas_akhir;
use App\Models\pegawai;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tugas_akhir>
 */
class tugas_akhirFactory extends Factory
{
    protected $model = tugas_akhir::class;
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
            'lembar_persetujuan' => fake()->fileExtension(),
            'lembar_pengesahan' => fake()->fileExtension(),
            'lembar_konsul_pemb_1' => fake()->fileExtension(),
            'lembar_konsul_pemb_2' => fake()->fileExtension(),
            'lembar_revisi' => fake()->fileExtension(),
            'status_ta' => fake()->word(),
            'rincian_ta' => fake()->paragraphs(6, true)
        ];
    }
}
