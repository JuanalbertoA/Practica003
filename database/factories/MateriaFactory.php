<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idmateria' => $this->faker->unique()->regexify('[A-Z0-9]{10}'), // ID único de materia
            'nombremateria' => $this->faker->sentence(3), // Nombre de la materia
            'nivel' => $this->faker->randomElement(['A', 'B', 'C']), // Nivel puede ser cualquier caracter
            'nombremediano' => $this->faker->word(), // Nombre mediano de la materia
            'nombrecorto' => $this->faker->lexify('??????'), // Nombre corto de la materia
            'modalidad' => $this->faker->randomElement(['P', 'V', 'H']), // Ejemplo de modalidad (Presencial, Virtual, Híbrido)
            'reticula_id' => \App\Models\Reticula::factory(), // Relación con el modelo Reticula
        ];
    }
}
