<?php

namespace Database\Factories;

use App\Models\akademik;
use App\Models\mahasiswa;
use App\Models\pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\akademik>
 */
class AkademikFactory extends Factory
{
    protected $model = akademik::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_mahasiswa' => mahasiswa::factory(),
            'id_pegawai' => pegawai::factory(),
            'khs_semester_1' => fake()->fileExtension(),
            'khs_semester_2' => fake()->fileExtension(),
            'khs_semester_3' => fake()->fileExtension(),
            'khs_semester_4' => fake()->fileExtension(),
            'khs_semester_5' => fake()->fileExtension(),
            'khs_semester_6' => fake()->fileExtension(),
            'lembar_sp' => fake()->fileExtension(),
            'status_akademik' => fake()->word(),
            'rincian_akademik' => fake()->paragraphs(6, true)
        ];
    }
}
