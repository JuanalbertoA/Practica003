<?php

namespace Database\Factories;

use App\Models\Plaza;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalplazasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tiponombramiento' => $this->faker->numberBetween(1, 3), // Aleatorio entre 1 y 3 para tiponombramiento
            'plaza_id' => Plaza::all()->random()->id, // Obtiene un ID aleatorio de la tabla plazas
            'personal_id' => Personal::all()->random()->id, // Obtiene un ID aleatorio de la tabla personal
        ];
    }
}

