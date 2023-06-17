<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'id_pegawai' => fake()->bothify('????-#####'),
            'nim' => fake()->bothify('????-#####'),
            'email' => fake()->email(),
            'password' => fake()->password(),
            'role' => fake()->title()
        ];
    }
}
