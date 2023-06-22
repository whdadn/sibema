<?php

namespace Database\Factories;

use App\Models\jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\jurusan>
 */
class JurusanFactory extends Factory
{
    protected $model = jurusan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_jurusan' => fake()->text()
        ];
    }
}
