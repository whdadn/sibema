<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\perpustakaan>
 */
class PerpustakaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_perpus' => fake()->bothify('????-#####'),
            'dokumen_perpus' => fake()->fileExtension(),
            'keterangan' => fake()->word(),
            'status_perpus' => fake()->word(),
            'rincian_perpus' => fake()->paragraphs(6, true)
        ];
    }
}
