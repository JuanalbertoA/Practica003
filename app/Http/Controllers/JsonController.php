<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Grupo;
use App\Models\Lugar;
use App\Models\Edificio;
use App\Models\Edificios;
use App\Models\Personal;
use App\Models\GrupoHorario;
use App\Models\Lugares;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use Illuminate\Support\Facades\Log;

class JsonController extends Controller
{
    
    public function periodos()
    {
        $periodos = MateriaAbierta::with(['periodo:id,periodo'])
        ->get(['id', 'materia_id', 'periodo_id', 'carrera_id'])
        ->unique('periodos.periodo');
        return $periodos;
    }

    public function carreras()
    {
        $carreras = MateriaAbierta::with(['carrera:id,nombrecarrera'])
        ->get(['id', 'materia_id', 'periodo_id', 'carrera_id'])
        ->unique('carrera.nombrecarrera');
        return $carreras;
    }


    public function semestres()
    {
        $semestres = MateriaAbierta::with(['materia:id,semestre'])
        ->get(['id', 'materia_id', 'periodo_id', 'carrera_id'])
        ->unique('materia.semestre');
        return $semestres;
    }
    

    public function materias()
    {
        $materias = MateriaAbierta::with(['materia:id,nombremateria'])
        ->get(['id', 'materia_id', 'periodo_id', 'carrera_id'])
        ->unique('materia.nombremateria');
        return $materias;
    }



    public function deptos() {
        $deptos = Depto::get();
        return $deptos;
    }


    public function personals() {
        $personals = Personal::get();
        return $personals;
    }


    public function edificios() {
        $edificios = Edificios::get();
        return $edificios;
    }

    public function lugar() {
        $lugar = Lugares::get();
        return $lugar;
    }

    public function grupos() {
        $grupos = Grupo::get();
        return $grupos;
    }

    public function insertarGrupo(Request $request)
{
    try {
        // Validación de datos
        $validatedData = $request->validate([
            'grupo' => 'required|string|max:5|unique:grupos',
            'descripcion' => 'required|string|max:200',
            'max_alumnos' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'periodo_id' => 'required|exists:periodos,id',
            'materia_abierta_id' => 'required|exists:materia_abiertas,id',
            'personal_id' => 'nullable|exists:personals,id', // Permitir valores nulos
        ]);

        // Inserta el grupo en la base de datos
        $grupo = Grupo::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Grupo creado exitosamente',
            'grupo' => $grupo,
        ], 201);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}

    
public function insertarGrupoHorario(Request $request)
{
    Log::info('Datos recibidos en la solicitud:', $request->all());

    $validated = $request->validate([
        '*.grupo_id' => 'required|exists:grupos,id',
        '*.lugar_id' => 'required|exists:lugares,id',
        '*.dia' => 'required|string|max:15',
        '*.hora' => 'required|string|max:10',
    ]);

    try {
        foreach ($validated as $horario) {
            GrupoHorario::create($horario);
        }

        return response()->json(['message' => 'Horarios insertados correctamente.'], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al insertar los horarios.', 'error' => $e->getMessage()], 500);
    }
}

public function horarios(Request $request)
{
    $validated = $request->validate([
        'grupo_id' => 'required|exists:grupos,id',
        'lugar_id' => 'required|exists:lugares,id',
    ]);

    $horarios = GrupoHorario::where('grupo_id', $validated['grupo_id'])
        ->where('lugar_id', $validated['lugar_id'])
        ->get()
        ->map(function ($horario) {
            return [
                'dia' => $horario->dia,
                'hora' => substr($horario->hora, 0, 5), // Devuelve hora en formato HH:mm
            ];
        });

    return response()->json($horarios);
}

public function eliminarGrupoHorario(Request $request)
{
    $validated = $request->validate([
        'grupo_id' => 'required|exists:grupos,id',
        'lugar_id' => 'required|exists:lugares,id',
        'dia' => 'required|string|max:15',
        'hora' => 'required|string|max:8',
    ]);

    try {
        $deleted = GrupoHorario::where('grupo_id', $validated['grupo_id'])
            ->where('lugar_id', $validated['lugar_id'])
            ->where('dia', $validated['dia'])
            ->where('hora', $validated['hora'])
            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Horario eliminado correctamente.'], 200);
        } else {
            return response()->json(['message' => 'Horario no encontrado.'], 404);
        }
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error al eliminar el horario: ' . $e->getMessage()], 500);
    }
}






    }
