<?php

namespace Database\Factories;

use App\Models\Edificios;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lugares>
 */
class LugaresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Definimos un conjunto de aulas y laboratorios basados en la imagen que compartiste.
         $lugares = [
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IA'],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IB'],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'ID'],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IE'],
            ['nombrelugar' => 'Edificio D', 'nombrecorto' => '2D'],
            ['nombrelugar' => 'Edificio D', 'nombrecorto' => '3D'],
            ['nombrelugar' => 'Edificio D', 'nombrecorto' => '4D'],
            ['nombrelugar' => 'Edificio D', 'nombrecorto' => '5D'],
            ['nombrelugar' => 'Laboratorio Económico', 'nombrecorto' => 'LCEA'],
            ['nombrelugar' => 'Laboratorio Cómputo C', 'nombrecorto' => 'LCC'],
            // Agrega aquí más registros basados en la imagen...
        ];

        // Seleccionamos un lugar aleatoriamente
        $lugar = $this->faker->unique()->randomElement($lugares);

        return [
            'nombrelugar' => $lugar['nombrelugar'],
            'nombrecorto' => $lugar['nombrecorto'],
            // Generamos un edificio_id usando un ID de un registro existente en la tabla 'edificios'
            'edificio_id' => Edificios::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
