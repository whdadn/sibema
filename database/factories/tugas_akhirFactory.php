<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tugas_akhir>
 */
class tugas_akhirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_ta' => fake()->bothify('????-#####'),
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
