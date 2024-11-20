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
        // Mapear edificios por nombre corto para asignar el ID correcto
        $edificios = Edificios::all()->keyBy('nombrecorto'); // Asegúrate de que los edificios ya existen en la base de datos.

        // Lugares con asociación explícita a edificios
        $lugares = [
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IA', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IB', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'ID', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Aula Edificio Industrial', 'nombrecorto' => 'IE', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Laboratorio Computo C Sistemas', 'nombrecorto' => 'LCC', 'edificio_id' => $edificios['10']->id],
            ['nombrelugar' => 'Laboratorio Computo D Sistemas', 'nombrecorto' => 'LCD', 'edificio_id' => $edificios['17']->id],
            ['nombrelugar' => 'Laboratorio Computo E Sistemas', 'nombrecorto' => 'LCE', 'edificio_id' => $edificios['10']->id],
            ['nombrelugar' => 'Laboratorio Computo Industrial', 'nombrecorto' => 'LCI', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Laboratorio Computo R Sistemas', 'nombrecorto' => 'LCR', 'edificio_id' => $edificios['13']->id],
            ['nombrelugar' => 'Laboratorio Sala Valerdi Sistemas', 'nombrecorto' => 'LCV', 'edificio_id' => $edificios['10']->id],
            ['nombrelugar' => 'Aula D', 'nombrecorto' => '2D', 'edificio_id' => $edificios['17']->id],
            ['nombrelugar' => 'Aula D', 'nombrecorto' => '3D', 'edificio_id' => $edificios['17']->id],
            ['nombrelugar' => 'Aula D', 'nombrecorto' => '4D', 'edificio_id' => $edificios['17']->id],
            ['nombrelugar' => 'Aula D', 'nombrecorto' => '5D', 'edificio_id' => $edificios['17']->id],
            ['nombrelugar' => 'Aula K', 'nombrecorto' => '1K', 'edificio_id' => $edificios['9']->id],
            ['nombrelugar' => 'Aula H', 'nombrecorto' => '5H', 'edificio_id' => $edificios['16']->id],
            ['nombrelugar' => 'Laboratorio Económico', 'nombrecorto' => 'LCEA', 'edificio_id' => $edificios['11']->id],
        ];

        // Seleccionamos un lugar y lo devolvemos
        $lugar = $this->faker->unique()->randomElement($lugares);

        return [
            'nombrelugar' => substr($lugar['nombrelugar'], 0, 25), // Truncar a 25 caracteres
            'nombrecorto' => $lugar['nombrecorto'],
            'edificio_id' => $lugar['edificio_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
