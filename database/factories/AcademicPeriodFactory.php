<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicPeriod>
 */
class AcademicPeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = fake()->numberBetween(2022, 2027);
        $semester = fake()->randomElement(['I', 'II']);

        $startDate = fake()->dateTimeBetween("$year-01-01", "$year-06-30");

        $endDate = (clone $startDate)->modify('+4 months');

        return [
            'name' => $year . '-' . $semester,

            'start_date' => $startDate->format('Y-m-d'),

            'end_date' => $endDate->format('Y-m-d'),

            'status' => fake()->randomElement(['active', 'closed']),
        ];
    }
}
