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
            'id_berita' => fake()->bothify('????-#####'),
            'judul_berita' => fake()->sentence(2),
            'isi_berita' => collect(fake()->paragraphs(5, false)),
            'excerpt' => fake()->paragraph(2),
            'gambar' => fake()->image()
        ];
    }
}
