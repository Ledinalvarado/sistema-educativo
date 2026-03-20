<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'employee_code' => 'EMP-' . strtoupper(Str::random(5)),

            'specialty' => $this->faker->randomElement([
                'Programación Movil',
                'Base de Datos',
                'Redes',
                'Inteligencia Artificial',
                'Seguridad Informática',
                'Ingeniería de Software',
                'Desarrollo Web',
                'Sistemas Operativos'
            ]),

            'hire_date' => $this->faker->date(),

            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
