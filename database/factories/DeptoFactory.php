<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Lista de nombres completos, nombres medianos y abreviaturas
        $departamentos = [
            ["Ingeniería en Sistemas Computacionales", "Ing.Sistemas", "ISC"],
            ["Ingeniería Electrónica", "Ing.Electrónica", "IE"],
            ["Ingeniería Mecánica", "Ing.Mecánica", "IM"],
            ["Ingeniería Mecatrónica", "Ing.Mecatrónica", "IME"],
            ["Contaduría Pública", "Cont.Pública", "CP"],
            ["Ingeniería en Gestión Empresarial", "Ing. Gestión", "IGE"],
            ["Ingeniería Industrial", "Ing.Industrial", "II"],
            ["Ciencias Básicas", "CienciasB", "CB"],
            ["Dirección", "Direc", "DIR"],
            ["Subdirección", "Subdirec", "SUB"]
        ];

        // Selecciona un departamento y asegura el incremento de índice sin duplicar valores
        static $indice = 0;
        $departamento = $departamentos[$indice % count($departamentos)];
        $indice++;

        return [
            'iddepto' => fake()->unique()->bothify("?#"),   // Genera un ID único
            'nombredepto' => $departamento[0],               // Nombre completo del departamento
            'nombremediano' => $departamento[1],             // Nombre mediano
            'nombrecorto' => $departamento[2],               // Abreviatura
        ];
    }
}
