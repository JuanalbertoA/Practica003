<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idreticula' => $this->faker->unique()->regexify('[A-Z0-9]{8}'), // ID único de retícula
            'descripcion' => $this->faker->sentence(5), // Descripción de la retícula
            'fechaenvigor' => $this->faker->date(), // Fecha en vigor
            'carrera_id' => Carrera::factory(), // Relación con el modelo Carrera
        ];
    }
}
