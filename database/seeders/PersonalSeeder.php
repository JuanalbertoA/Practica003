<?php
namespace Database\Seeders;

use App\Models\Personal;
use App\Models\Depto;
use App\Models\Puesto;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    public function run()
    {
        // Obtener el ID del departamento de ISC y los puestos necesarios
        $deptoISC = Depto::where('nombrecorto', 'ISC')->first()->id;
        $puestoMaestro = Puesto::where('nombre', 'Maestro')->first()->id;
        $puestoSubdirector = Puesto::where('nombre', 'Subdirector')->first()->id;

        // Crear subdirectores con nombres específicos
        $subdirectores = [
            ['nombres' => 'AÍDA', 'apellidop' => 'HERNÁNDEZ', 'apellidom' => 'ÁVILA', 'puesto_id' => $puestoSubdirector],
            ['nombres' => 'CARLOS', 'apellidop' => 'PATIÑO', 'apellidom' => 'CHÁVEZ', 'puesto_id' => $puestoSubdirector],
            ['nombres' => 'ULISES', 'apellidop' => 'VALDEZ', 'apellidom' => 'RODRIGUEZ', 'puesto_id' => $puestoSubdirector],
        ];

        foreach ($subdirectores as $subdirector) {
            Personal::create(array_merge($subdirector, [
                'RFC' => strtoupper(fake()->bothify('????######')),
                'licenciatura' => 'Licenciatura en Educación',
                'lictit' => true,
                'especializacion' => 'Educación',
                'esptit' => true,
                'maestria' => 'Maestría en Educación',
                'maetit' => true,
                'doctorado' => '',
                'doctit' => false,
                'fechaingsep' => fake()->date(),
                'fechaingins' => fake()->date(),
                'depto_id' => $deptoISC,
            ]));
        }

        // Crear 10 maestros con nombres específicos
        $maestros = [
            ['nombres' => 'FLOR DE MARIA', 'apellidop' => 'RIVERA', 'apellidom' => 'SANCHEZ'],
            ['nombres' => 'ANTONIO', 'apellidop' => 'CHAVEZ', 'apellidom' => 'SOTO'],
            ['nombres' => 'WILBER ELIUD', 'apellidop' => 'GARCIA', 'apellidom' => 'VILLARREAL'],
            ['nombres' => 'ROBERTO', 'apellidop' => 'SPINOZA', 'apellidom' => 'TORRES'],
            ['nombres' => 'MIGUEL ARTURO', 'apellidop' => 'VELEZ', 'apellidom' => 'RIOJAS'],
            ['nombres' => 'HÉCTOR CARLOS', 'apellidop' => 'VALADEZ', 'apellidom' => 'MOYEDA'],
            ['nombres' => 'HILDA PATRICIA', 'apellidop' => 'BELTRÁN', 'apellidom' => 'HERNÁNDEZ'],
            ['nombres' => 'DAVID SERGIO', 'apellidop' => 'CASTILLÓN', 'apellidom' => 'DOMÍNGUEZ'],
            ['nombres' => 'LOURDES ARLIN', 'apellidop' => 'CAMPOY', 'apellidom' => 'MEDRANO'],
            ['nombres' => 'FLORA ELIDA', 'apellidop' => 'GONZÁLEZ', 'apellidom' => 'TAMEZ'],
        ];

        foreach ($maestros as $maestro) {
            // Verificar si es Roberto para asignarle Doctorado
            $isRoberto = $maestro['nombres'] === 'ROBERTO';

            Personal::create(array_merge($maestro, [
                'RFC' => strtoupper(fake()->bothify('????######')),
                'licenciatura' => 'Licenciatura en Sistemas Computacionales',
                'lictit' => true,
                'especializacion' => 'Sistemas Computacionales',
                'esptit' => true,
                'maestria' => $isRoberto ? '' : 'Maestría en Educación',
                'maetit' => !$isRoberto, // Solo maestros que no son Roberto tienen maestría
                'doctorado' => $isRoberto ? 'Doctorado en Ciencias Computacionales' : '',
                'doctit' => $isRoberto, // Solo Roberto tiene doctorado
                'fechaingsep' => fake()->date(),
                'fechaingins' => fake()->date(),
                'depto_id' => $deptoISC,
                'puesto_id' => $puestoMaestro,
            ]));
        }
    }
}

