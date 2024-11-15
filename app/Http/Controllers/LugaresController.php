<?php

namespace App\Http\Controllers;

use App\Models\Edificio; // Importar el modelo Edificio
use App\Models\Edificios;
use App\Models\Lugares;
use Illuminate\Http\Request;

class LugaresController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'nombrelugar' => ['required', 'string', 'max:25'],
            'nombrecorto' => ['required', 'string', 'max:5'],
            'edificio_id' => ['required', 'exists:edificios,id'],
        ];
    }

    public function index()
    {
        $lugares = Lugares::with('edificio')->paginate(8); // Cargar también los edificios relacionados
        return view("lugares.index", compact("lugares"));
    }

    public function create()
    {
        $lugar = new Lugares;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";
        
        // Obtener todos los edificios para el formulario
        $edificios = Edificios::all();

        return view("lugares.frm", compact("lugar", "accion", "txtbtn", "des", "edificios"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Lugares::create($val);
        return redirect()->route("lugares.index")->with("mensaje", "Lugar registrado correctamente.");
    }

    public function show(Lugares $lugar)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";

        // Obtener todos los edificios para la vista
        $edificios = Edificios::all();

        return view("lugares.frm", compact("lugar", "accion", "txtbtn", "des", "edificios"));
    }

    public function edit(Lugares $lugar)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        // Obtener todos los edificios para el formulario
        $edificios = Edificios::all();

        return view("lugares.frm", compact("lugar", "accion", "txtbtn", "des", "edificios"));
    }

    public function update(Request $request, Lugares $lugar)
    {
        $val = $request->validate($this->val);
        $lugar->update($val);
        return redirect()->route("lugares.index")->with("mensaje", "Lugar actualizado correctamente.");
    }

    public function destroy(Lugares $lugar)
    {
        $lugar->delete();
        return redirect()->route("lugares.index")->with("mensaje", "Lugar eliminado correctamente.");
    }
}
