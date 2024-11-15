<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plaza;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plaza>
 */
class PlazaFactory extends Factory
{
    /**
     * Define el modelo de fábrica.
     *
     * @return string
     */
    protected $model = Plaza::class;

    /**
     * Lista de plazas específicas.
     *
     * @var array
     */
    private static $plazas = [
        ["id" => "E3817", "nombre" => "Plaza E3817"],
        ["id" => "E3815", "nombre" => "Plaza E3815"],
        ["id" => "E3717", "nombre" => "Plaza E3717"],
        ["id" => "E3617", "nombre" => "Plaza E3617"],
        ["id" => "E3520", "nombre" => "Plaza E3520"],
    ];

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $plaza = array_shift(self::$plazas);

        return [
            'idplaza' => $plaza['id'],
            'nombrePlaza' => $plaza['nombre'],
        ];
    }
}
