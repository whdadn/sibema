<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pegawai' => fake()->bothify('????-#####'),
            'username' => fake()->bothify('????-#####'),
            'nama_pegawai' => fake()->name(),
            'no_telepon_pegawai' => fake()->randomNumber(9),
            'alamat_pegawai' => fake()->address()
        ];
    }
}
