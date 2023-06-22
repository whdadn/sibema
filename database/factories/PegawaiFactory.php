<?php

namespace Database\Factories;

use App\Models\pegawai;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pegawai>
 */
class PegawaiFactory extends Factory
{
    protected $model = pegawai::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::factory(),
            'nama_pegawai' => fake()->name(),
            'no_telepon_pegawai' => fake()->randomNumber(9),
            'alamat_pegawai' => fake()->address()
        ];
    }
}
