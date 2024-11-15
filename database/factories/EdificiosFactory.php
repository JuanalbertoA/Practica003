<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edificios>
 */
class EdificiosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombreedificio' => $this->faker->unique()->randomElement([
                'Edificio Industrial',
                'Edificio D',
                'Edificio H',
                'Edificio K',
                'Edificio E',
                'Edificio L',
                'Edificio A',
                'Edificio J'
            ]),
            'nombrecorto' => $this->faker->unique()->randomElement([
                '13', '17', '16', '9', '10', '11', '7', '8'
            ]),
        ];
    }
}
