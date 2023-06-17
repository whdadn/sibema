<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\keuangan>
 */
class KeuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_keuangan' => fake()->bothify('????-#####'),
            'nim' => fake()->bothify('????-#####'),
            'id_pegawai' => fake()->bothify('????-#####'),
            'dokumen_keuangan' => fake()->fileExtension(),
            'status_keuangan' => fake()->word(),
            'rincian_keuangan' => fake()->paragraphs(6, true)
        ];
    }
}
