<?php

namespace Database\Factories;

use App\Models\AcademicPeriod;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courseName = $this->faker->randomElement([
            'Programación',
            'Base de Datos',
            'Matemática Discreta',
            'Estructuras de Datos',
            'Ingeniería de Software',
            'Redes de Computadoras',
            'Sistemas Operativos',
            'Desarrollo Web'
        ]);

        return [
            'name' => $courseName,

            //'code' => strtoupper(Str::random(6)),
            'code' => 'ICC-' . $this->faker->unique()->numberBetween(1000, 9999),

            'description' => $this->faker->sentence(),

            'credits' => $this->faker->numberBetween(2,5),

            'teacher_id' => Teacher::inRandomOrder()->first()?->id ?? Teacher::factory(),

            'academic_period_id' => AcademicPeriod::inRandomOrder()->first()?->id ?? AcademicPeriod::factory(),

            'capacity' => $this->faker->numberBetween(20,40),

            'status' => $this->faker->randomElement(['active','inactive']),
        ];
    }
}
