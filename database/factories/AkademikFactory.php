<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\akademik>
 */
class AkademikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_akademik' => fake()->bothify('????-#####'),
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
