<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Depto;

class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $carreras = [
            ["Ingeniería en Sistemas Computacionales", "Ing. Sistemas", "ISC"],
            ["Ingeniería Industrial", "Ing. Industrial", "II"],
            ["Ingeniería Electrónica", "Ing. Electrónica", "IE"],
            ["Ingeniería Mecánica", "Ing. Mecánica", "IM"],
            ["Ingeniería Mecatrónica", "Ing. Mecatrónica", "IME"],
            ["Contaduría Pública", "Cont. Pública", "CP"],
            ["Ingeniería en Gestión Empresarial", "Ing. Gestión", "IGE"]
        ];

        // Índice cíclico para evitar duplicación de datos en la lista
        static $indice = 0;
        $carrera = $carreras[$indice % count($carreras)];
        $indice++;

        return [
            'idcarrera' => fake()->unique()->bothify("????####"),  // ID único para cada carrera
            'nombrecarrera' => $carrera[0],                        // Nombre completo de la carrera
            'nombremediano' => $carrera[1],                        // Nombre mediano coherente
            'nombrecorto' => $carrera[2],                          // Abreviatura de la carrera
            'depto_id' => Depto::factory(),                        // Relación con un departamento existente o nuevo
        ];
    }
}
