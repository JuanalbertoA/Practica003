<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Depto; // Asegúrate de importar el modelo Depto
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'idcarrera' => ['required', 'string', 'max:15'],
            'nombrecarrera' => ['required', 'string', 'max:200'],
            'nombremediano' => ['required', 'string', 'max:50'],
            'nombrecorto' => ['required', 'string', 'max:5'],
            'depto_id' => ['required', 'exists:deptos,id'],
        ];
    }

    public function index()
    {
        $carreras = Carrera::paginate(8);
        return view("carreras.index", compact("carreras"));
    }

    public function create()
    {
        $carrera = new Carrera;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";

        // Obtener todos los departamentos
        $deptos = Depto::all();

        return view("carreras.frm", compact("carrera", "accion", "txtbtn", "des", "deptos"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Carrera::create($val);
        return redirect()->route("carreras.index")->with("mensaje", "Carrera registrada correctamente.");
    }

    public function show(Carrera $carrera)
    {
    $accion = "D";
    $txtbtn = "";
    $des = "disabled";

    // Obtener todos los departamentos
    $deptos = Depto::all();

    return view("carreras.frm", compact("carrera", "accion", "txtbtn", "des", "deptos"));
    }

    public function edit(Carrera $carrera)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener todos los departamentos
        $deptos = Depto::all();

        return view("carreras.frm", compact("carrera", "accion", "txtbtn", "des", "deptos"));
    }

    public function update(Request $request, Carrera $carrera)
    {
        $val = $request->validate($this->val);
        $carrera->update($val);
        return redirect()->route("carreras.index")->with("mensaje", "Carrera actualizada correctamente.");
    }

    public function destroy(Carrera $carrera)
    {
    $accion = "D";
    $txtbtn = "Eliminar";
    $des = "disabled";

    // Obtener todos los departamentos
    $deptos = Depto::all();

    return view("carreras.frm", compact("carrera", "accion", "txtbtn", "des", "deptos"));
    }
}

