<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programacion>
 */
class ProgramacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'titulo' => fake()->text(25),
            'hora' => fake()->time('h:s'),
            'horario' => fake()->randomElement(['A', 'B', 'C']),
        ];
    }
}
