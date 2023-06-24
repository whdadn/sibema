<?php

namespace Database\Factories;

use App\Models\berita;
use App\Models\pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    protected $model = berita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pegawai' => pegawai::factory(),
            'judul_berita' => fake()->sentence(2),
            'isi_berita' => collect(fake()->paragraphs(5, false)),
            'excerpt' => fake()->paragraph(2),
            'gambar' => fake()->image()
        ];
    }
}
