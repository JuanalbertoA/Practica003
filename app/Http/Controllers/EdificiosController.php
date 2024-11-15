<?php

namespace App\Http\Controllers;

use App\Models\Edificios;
use Illuminate\Http\Request;

class EdificiosController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'nombreedificio' => ['required', 'string', 'max:30'],
            'nombrecorto' => ['required', 'string', 'max:5'],
        ];
    }

    public function index()
    {
        $edificios = Edificios::paginate(8); // Paginación
        return view("edificios.index", compact("edificios"));
    }

    public function create()
    {
        $edificio = new Edificios;
        $accion = "C"; // Acción: Crear
        $txtbtn = "Guardar";
        $des = ""; // Sin deshabilitar
        return view("edificios.frm", compact("edificio", "accion", "txtbtn", "des"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Edificios::create($val);
        return redirect()->route("edificios.index")->with("mensaje", "Edificio registrado correctamente.");
    }

    public function show(Edificios $edificio)
    {
        $accion = "D"; // Acción: Detalle
        $txtbtn = ""; // No mostrar botón
        $des = "disabled"; // Deshabilitar campos
        return view("edificios.frm", compact("edificio", "accion", "txtbtn", "des"));
    }

    public function edit(Edificios $edificio)
    {
        $accion = "E"; // Acción: Editar
        $txtbtn = "Actualizar";
        $des = ""; // Habilitar campos
        return view("edificios.frm", compact("edificio", "accion", "txtbtn", "des"));
    }

    public function update(Request $request, Edificios $edificio)
    {
        $val = $request->validate($this->val);
        $edificio->update($val);
        return redirect()->route("edificios.index")->with("mensaje", "Edificio actualizado correctamente.");
    }

    public function destroy(Edificios $edificio)
    {
        $edificio->delete();
        return redirect()->route("edificios.index")->with("mensaje", "Edificio eliminado correctamente.");
    }
}
