<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puesto>
 */
class PuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = ['Administrativo', 
        'Operativo', 
        'Ejecutivo', 
        'Técnico', 
        'Gerencial', 
        'Asistente', 
        'Supervisor', 
        'Coordinador', 
        'Director',
        'Analista'];
        
        return [
        'idpuesto' => $this->faker->bothify('???###'),
        'nombre' => $this->faker->jobTitle(),
        'tipo' => $this->faker->unique()->randomElement($tipos),
        ];
    }
}
