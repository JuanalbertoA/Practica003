<?php

namespace App\Http\Controllers;

use App\Models\Grupo21318;
use App\Models\GrupoHorarios21318;
use App\Models\Lugar;
use App\Models\Lugares;
use App\Models\Materia;
use App\Models\MateriaAbierta;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Http\Request;

class Grupo21318Controller extends Controller
{
    public function index()
    {
        $grupos = Grupo21318::paginate(10);
        return view('grupos21318.index', compact('grupos'));
    }

    public function create()
    {
        $grupo = new Grupo21318;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";
        $grupos = Grupo21318::all();

        // Obtener los datos necesarios
        $personals = \App\Models\Personal::all();
        $materias_abiertas = \App\Models\MateriaAbierta::with('materia')->get();
        $periodos = \App\Models\Periodo::all();
        $lugares = Lugares::all(); // Obtener todos los lugares
        $materia = Materia::all();

        // Enviar la vista con los datos
        return view('grupos21318.frm', compact('grupo', 'accion', 'txtbtn', 'des', 'personals', 'materias_abiertas', 'periodos', 'lugares','materia', 'grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:255',
        ]);

        // Crear el grupo
        $grupo = Grupo21318::create($request->all());

        // Redirigir al formulario de edición después de crear
        return redirect()->route('grupos21318.edit', $grupo->id)->with('mensaje', 'Grupo creado correctamente.');
    }

    public function edit($id)
    {
        // Obtener el grupo y los horarios relacionados
        $grupo = Grupo21318::findOrFail($id);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        
        // Obtener los datos para el formulario de edición
        $personals = \App\Models\Personal::all();
        $materias_abiertas = \App\Models\MateriaAbierta::with('materia')->get();
        $periodos = \App\Models\Periodo::all();
        $lugares = Lugares::all(); // Obtener todos los lugares
        $grupo_horarios = GrupoHorarios21318::where('grupo_id', $id)->get(); // Obtener los horarios del grupo

        // Enviar la vista con todos los datos
        return view('grupos21318.frm', compact('grupo', 'accion', 'txtbtn', 'des', 'personals', 'materias_abiertas', 'periodos', 'lugares', 'grupo_horarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo' => 'required|string|max:50',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $grupo = Grupo21318::findOrFail($id);
        $grupo->update($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('grupos21318.edit', $grupo->id)
            ->with('mensaje', 'Grupo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $grupo = Grupo21318::findOrFail($id);
        $grupo->delete();

        // Redirigir al listado de grupos con un mensaje de éxito
        return redirect()->route('grupos21318.index')->with('mensaje', 'Grupo eliminado correctamente.');
    }
}
