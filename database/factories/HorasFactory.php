<?php

namespace Database\Factories;

use App\Models\Horas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class HorasFactory extends Factory
{
    protected $model = Horas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generamos una hora de inicio aleatoria
        $horaInicio = $this->faker->time($format = 'H:i:s');

        // Calculamos la hora de fin sumando entre 1 y 3 horas a la hora de inicio
        $horaFin = Carbon::createFromFormat('H:i:s', $horaInicio)->addHours(rand(1, 3))->format('H:i:s');

        return [
            'hora_ini' => $horaInicio,
            'hora_fin' => $horaFin,
        ];
    }
}
