<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;

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
        // Define un listado de descripciones para retículas que podrían ser comunes en un sistema académico
        $descripciones = [
            'Plan de estudios 2024',
            'Retícula 2023-B Actualizada',
            'Plan General de Carrera',
            'Retícula de Ingeniería 2022',
            'Plan Académico 2025',
            'Retícula Avanzada 2024-A',
            'Programa Académico 2023'
        ];

        // Selecciona una descripción aleatoria y una fecha en vigor reciente
        return [
            'idreticula' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),  // Genera un ID único
            'descripcion' => $this->faker->randomElement($descripciones),     // Descripción de la retícula
            'fechaenvigor' => $this->faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'), // Fecha en vigor reciente
            'carrera_id' => Carrera::factory(),                               // Relación con Carrera
        ];
    }
}
