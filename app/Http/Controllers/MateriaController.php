<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Reticula; // Importar el modelo Reticula
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'idmateria' => ['required', 'string', 'max:10', 'unique:materias,idmateria'],
            'nombremateria' => ['required', 'string', 'max:200'],
            'nivel' => ['required', 'string', 'size:1'],
            'nombremediano' => ['required', 'string', 'max:25'],
            'nombrecorto' => ['required', 'string', 'max:10'],
            'modalidad' => ['required', 'string', 'size:1'],
            'reticula_id' => ['required', 'exists:reticulas,id'],
        ];
    }

    public function index()
    {
        $materias = Materia::paginate(8);
        return view("materias.index", compact("materias"));
    }

    public function create()
    {
        $materia = new Materia;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";

        // Obtener todas las retículas para el formulario
        $reticulas = Reticula::all();

        return view("materias.frm", compact("materia", "accion", "txtbtn", "des", "reticulas"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Materia::create($val);
        return redirect()->route("materias.index")->with("mensaje", "Materia registrada correctamente.");
    }

    public function show(Materia $materia)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";

        // Obtener todas las retículas para la vista (si es necesario)
        $reticulas = Reticula::all();

        return view("materias.frm", compact("materia", "accion", "txtbtn", "des", "reticulas"));
    }

    public function edit(Materia $materia)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener todas las retículas para el formulario
        $reticulas = Reticula::all();

        return view("materias.frm", compact("materia", "accion", "txtbtn", "des", "reticulas"));
    }

    public function update(Request $request, Materia $materia)
    {
        $val = $request->validate($this->val);
        $materia->update($val);
        return redirect()->route("materias.index")->with("mensaje", "Materia actualizada correctamente.");
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route("materias.index")->with("mensaje", "Materia eliminada correctamente.");
    }
}

