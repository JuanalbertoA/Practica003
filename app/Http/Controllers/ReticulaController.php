<?php

namespace App\Http\Controllers;

use App\Models\Reticula;
use App\Models\Carrera; // Importar el modelo Carrera
use Illuminate\Http\Request;

class ReticulaController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'idreticula' => ['required', 'string', 'max:15'],
            'descripcion' => ['required', 'string', 'max:200'],
            'fechaenvigor' => ['required', 'date'],
'carrera_id' => ['required', 'exists:carreras,id'], // Cambia 'carrera_id' por 'id'
        ];
    }

    public function index()
    {
        $reticulas = Reticula::paginate(8); // Paginación de retículas
        return view("reticulas.index", compact("reticulas"));
    }

    public function create()
    {
        $reticula = new Reticula;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";

        // Obtener todas las carreras para el formulario
        $carreras = Carrera::all();

        return view("reticulas.frm", compact("reticula", "accion", "txtbtn", "des", "carreras"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Reticula::create($val);
        return redirect()->route("reticulas.index")->with("mensaje", "Retícula registrada correctamente.");
    }

    public function show(Reticula $reticula)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";

        // Obtener todas las carreras para la vista (si es necesario)
        $carreras = Carrera::all();

        return view("reticulas.frm", compact("reticula", "accion", "txtbtn", "des", "carreras"));
    }

    public function edit(Reticula $reticula)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener todas las carreras para el formulario
        $carreras = Carrera::all();

        return view("reticulas.frm", compact("reticula", "accion", "txtbtn", "des", "carreras"));
    }

    public function update(Request $request, Reticula $reticula)
    {
        $val = $request->validate($this->val);
        $reticula->update($val);
        return redirect()->route("reticulas.index")->with("mensaje", "Retícula actualizada correctamente.");
    }

    public function destroy(Reticula $reticula)
    {
        $reticula->delete();
        return redirect()->route("reticulas.index")->with("mensaje", "Retícula eliminada correctamente.");
    }
}
