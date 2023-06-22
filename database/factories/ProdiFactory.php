<?php

namespace Database\Factories;

use App\Models\jurusan;
use App\Models\prodi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prodi>
 */
class ProdiFactory extends Factory
{
    protected $model = prodi::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_jurusan' => jurusan::factory(),
            'nama_prodi' => fake()->word()
        ];
    }
}
