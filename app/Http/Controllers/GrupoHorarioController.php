<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{
    /**
     * Mostrar la vista principal con ambos formularios.
     */
    public function index()
    {
        // Obtener todos los grupos disponibles
        $grupos = Grupo::all();

        // Retornar la vista principal con los grupos
        return view('grupo_horarios.index', compact('grupos'));
    }

    /**
     * Mostrar la vista de creación de horarios.
     */
    public function create()
    {
        // Obtener todos los grupos disponibles
        $grupos = Grupo::all();

        // Pasar los grupos a la vista
        return view('grupo_horarios.create', compact('grupos'));
    }

    /**
     * Guardar los horarios asignados a un grupo.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugars,id',
            'horarios' => 'required|array',
            'horarios.*' => 'regex:/^\d-\d{2}:\d{2}$/',
        ]);

        // Guardar los horarios
        foreach ($validatedData['horarios'] as $horario) {
            [$dia, $hora] = explode('-', $horario);

            GrupoHorario::create([
                'grupo_id' => $validatedData['grupo_id'],
                'lugar_id' => $validatedData['lugar_id'],
                'dia' => $dia,
                'hora' => $hora,
            ]);
        }

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Horarios registrados con éxito.');
    }
}
