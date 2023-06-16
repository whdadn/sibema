<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_berita' => fake()->regexify(),
            'id_pegawai' => fake()->regexify(),
            'judul_berita' => fake()->sentence(2),
            'isi_berita' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'excerpt' => fake()->paragraph(),
            'gambar' => fake()->image()
        ];
    }
}
