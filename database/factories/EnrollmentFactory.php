<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['inscrito', 'retirado', 'finalizado'];

        return [
            'enrollment_date' => $this->faker->date(),

            'status' => $this->faker->randomElement($statuses),

            'final_average' => $this->faker->optional()->randomFloat(2, 60, 100),

            'student_id' => Student::factory(),

            'course_id' => Course::factory(),
        ];
    }
}
