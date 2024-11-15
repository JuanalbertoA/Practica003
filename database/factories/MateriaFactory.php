<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idmateria' => $this->faker->unique()->regexify('[A-Z0-9]{10}'), // ID único de materia
            'nombremateria' => $this->faker->unique()->randomElement([
                'Fundamentos de programacion',
                'Matematicas discretas',
                'Calculo diferencial',
                'Programacion Orientada a Objetos',
                'Contabilidad financiera',
                'Calculo integral',
                'Estructura de datos',
                'Sistemas operativos',
                'Calculo vectorial',
                'Estadistica aplicada',
                'Programacion web',
                'Base de datos I',
                'Redes de computadoras',
                'Administracion de proyectos',
                'Desarrollo de aplicaciones moviles',
                'Inteligencia artificial',
                'Sistemas embebidos',
                'Seguridad informatica',
                'Ingenieria de software',
                'Tecnologias emergentes',
                'Etica profesional',
                'Desarrollo web',
                'Computacion en la nube',
                'Lenguajes de programacion',
                'Arquitectura de computadoras',
                'Sistemas distribuidos',
                'Sistemas inteligentes',
                'Programacion concurrente',
                'Ciberseguridad',
                'Sistemas de informacion',
                'Teoria de la computacion',
                'Metodos numericos',
            ]),
            'nivel' => $this->faker->randomElement([1, 2, 3]), // Nivel aleatorio entre 1 y 3
            'nombremediano' => $this->faker->randomElement([
                'Fund de prog.',
                'Mate. discr.',
                'Calc Dif',
                'Prog. Or. Obj.',
                'Cont Financ.',
                'Calc Int.',
                'Estruc. datos',
                'Sist Op',
                'Calc Vect.',
                'Estad. Apli.',
                'Prog Web',
                'Base de datos',
                'Redes comput.',
                'Adm. proyectos',
                'Dev. apps mov.',
                'Inteligencia art.',
                'Sistemas emb.',
                'Seguridad info.',
                'Ing. software',
                'Tecnol. emerg.',
                'Etica prof.',
                'Des. web',
                'Comput. nube',
                'Leng. prog.',
                'Arq. comput.',
                'Sis. distrib.',
                'Sis. intel.',
                'Prog. conc.',
                'Cibersegur.',
                'Sist info.',
                'Teor. comput.',
                'Met. numér.',
            ]),
            'nombrecorto' => $this->faker->randomElement([
                'FDP', 'MAT D', 'CD', 'POO', 'CF', 'CI', 'ED', 'SO', 'CV',
                'EA', 'PW', 'DB', 'RC', 'AP', 'DAM', 'IA', 'SE', 'SI', 'SM',
                'CC', 'CS', 'WDEV', 'CN', 'LP', 'AC', 'DS', 'IS', 'PC', 'CS', 
                'SI', 'TC', 'MN',
            ]), // Nombre corto aleatorio
            'modalidad' => $this->faker->randomElement(['P', 'V', 'H']), // Ejemplo de modalidad (Presencial, Virtual, Híbrido)
            'reticula_id' => \App\Models\Reticula::factory(), // Relación con el modelo Reticula
        ];
    }
}
