<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idperiodo' => fake()->unique()->bothify('#####'), 
            'periodo' => fake()->sentence(2), 
            'desccorta' => fake()->bothify('##########'), 
            'fechaini' => fake()->date(), 
            'fechafin' => fake()->date(), 
        ];
    }
}
