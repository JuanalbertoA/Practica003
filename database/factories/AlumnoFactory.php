<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'noctrl' => $this->faker->unique()->bothify("########"),
            'nombre' => $this->faker->name(),
            'apellidop' => $this->faker->lastName(),
            'apellidom' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['M','F']),
            'email' => $this->faker->email(),
            // Asigna un carrera_id aleatorio de las carreras existentes
            'carrera_id' => Carrera::inRandomOrder()->first()->id,
        ];
    }
}
