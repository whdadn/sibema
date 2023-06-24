<?php

namespace Database\Factories;

use App\Models\keuangan;
use App\Models\pegawai;
use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\keuangan>
 */
class KeuanganFactory extends Factory
{
    protected $model = keuangan::class;
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
            'dokumen_keuangan' => fake()->fileExtension(),
            'status_keuangan' => fake()->word(),
            'rincian_keuangan' => fake()->paragraphs(6, true)
        ];
    }
}
