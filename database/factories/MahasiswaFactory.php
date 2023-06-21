<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->bothify('????-#####'),
            'nama_mhs' => fake()->name(),
            'no_telpon_mhs' => fake()->randomNumber(9),
            'alamat_mhs' => fake()->address(),
            'tahun_lulus' => fake()->year(),
            'status_umum' => fake()->word()
        ];
    }
}
