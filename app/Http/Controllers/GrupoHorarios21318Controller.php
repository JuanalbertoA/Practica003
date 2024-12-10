<?php

namespace App\Http\Controllers;

use App\Models\GrupoHorarios21318;
use App\Models\Grupo21318;
use App\Models\Lugares;
use Illuminate\Http\Request;

class GrupoHorarios21318Controller extends Controller
{
    public function index()
    {
        $grupo_horarios = GrupoHorarios21318::with(['grupo', 'lugar'])->paginate(10);
        return view('grupohorarios21318.index', compact('grupo_horarios'));
    }

    public function create(Request $request)
    {
        $grupo_horario = new GrupoHorarios21318;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";

        // Recibir el grupo_id desde la URL
        $grupo_id = $request->query('grupo_id');
        $grupos = Grupo21318::all();
        $lugares = Lugares::all();

        return view('grupos21318.frm', compact('grupo_horario', 'accion', 'txtbtn', 'des', 'grupos', 'lugares', 'grupo_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grupo_id' => 'required|exists:grupo21318s,id',
            'lugar_id' => 'required|exists:lugares,id',
            'dia' => 'required|integer|min:0|max:6', // 0 = Domingo, 6 = Sábado
            'hora' => 'required',
        ]);

        GrupoHorarios21318::create($request->all());
        return redirect()->route('grupohorarios21318.index')->with('mensaje', 'Horario registrado correctamente.');
    }

    public function edit($id)
    {
        $grupo_horario = GrupoHorarios21318::findOrFail($id);
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener el grupo y los lugares
        $grupos = Grupo21318::all();
        $lugares = Lugares::all();

        return view('grupos21318.frm', compact('grupo_horario', 'accion', 'txtbtn', 'des', 'grupos', 'lugares'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'grupo_id' => 'required|exists:grupo21318s,id',
            'lugar_id' => 'required|exists:lugares,id',
            'dia' => 'required|integer|min:0|max:6', // 0 = Domingo, 6 = Sábado
            'hora' => 'required',
        ]);

        $grupo_horario = GrupoHorarios21318::findOrFail($id);
        $grupo_horario->update($request->all());
        return redirect()->route('grupohorarios21318.index')->with('mensaje', 'Horario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $grupo_horario = GrupoHorarios21318::findOrFail($id);
        $grupo_horario->delete();
        return redirect()->route('grupohorarios21318.index')->with('mensaje', 'Horario eliminado correctamente.');
    }
}
