<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Carrera; // Importar el modelo Carrera
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'noctrl' => ['required', 'string', 'max:8'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellidop' => ['required', 'string', 'max:50'],
            'apellidom' => ['nullable', 'string', 'max:50'],
            'sexo' => ['required', 'string', 'size:1'],
            'email' => ['required', 'string', 'email', 'max:200'],
            'carrera_id' => ['required', 'exists:carreras,id'],
        ];
    }

    public function index()
    {
        $alumnos = Alumno::paginate(8);
        return view("alumnos.index", compact("alumnos"));
    }

    public function create()
    {
        $alumno = new Alumno;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";
        
        // Obtener todas las carreras para el formulario
        $carreras = Carrera::all();

        return view("alumnos.frm", compact("alumno", "accion", "txtbtn", "des", "carreras"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Alumno::create($val);
        return redirect()->route("alumnos.index")->with("mensaje", "Alumno registrado correctamente.");
    }

    public function show(Alumno $alumno)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";

        // Obtener todas las carreras para la vista (si es necesario)
        $carreras = Carrera::all();

        return view("alumnos.frm", compact("alumno", "accion", "txtbtn", "des", "carreras"));
    }

    public function edit(Alumno $alumno)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener todas las carreras para el formulario
        $carreras = Carrera::all();

        return view("alumnos.frm", compact("alumno", "accion", "txtbtn", "des", "carreras"));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $val = $request->validate($this->val);
        $alumno->update($val);
        return redirect()->route("alumnos.index")->with("mensaje", "Alumno actualizado correctamente.");
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route("alumnos.index")->with("mensaje", "Alumno eliminado correctamente.");
    }
}

