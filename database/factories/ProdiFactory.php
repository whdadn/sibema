<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prodi>
 */
class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_prodi' => fake()->bothify('????-#####'),
            'id_jurusan' => fake()->bothify('????-#####'),
            'nama_prodi' => fake()->word()
        ];
    }
}
