<?php

namespace App\Http\Controllers;

use App\Models\Horas;
use Illuminate\Http\Request;

class HorasController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'hora_ini' => ['required', 'date_format:H:i'],
            'hora_fin' => ['required', 'date_format:H:i'],
        ];
    }

    public function index()
    {
        $horas = Horas::paginate(8); // Paginación
        return view("horas.index", compact("horas"));
    }

    public function create()
    {
        $hora = new Horas;
        $accion = "C"; // Acción: Crear
        $txtbtn = "Guardar";
        $des = ""; // Sin deshabilitar
        return view("horas.frm", compact("hora", "accion", "txtbtn", "des"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Horas::create($val);
        return redirect()->route("horas.index")->with("mensaje", "Hora registrada correctamente.");
    }

    public function show(Horas $hora)
    {
        $accion = "D"; // Acción: Detalle
        $txtbtn = ""; // No mostrar botón
        $des = "disabled"; // Deshabilitar campos
        return view("horas.frm", compact("hora", "accion", "txtbtn", "des"));
    }

    public function edit(Horas $hora)
    {
        $accion = "E"; // Acción: Editar
        $txtbtn = "Actualizar";
        $des = ""; // Habilitar campos
        return view("horas.frm", compact("hora", "accion", "txtbtn", "des"));
    }

    public function update(Request $request, Horas $hora)
    {
        $val = $request->validate($this->val);
        $hora->update($val);
        return redirect()->route("horas.index")->with("mensaje", "Hora actualizada correctamente.");
    }

    public function destroy(Horas $hora)
    {
        $hora->delete();
        return redirect()->route("horas.index")->with("mensaje", "Hora eliminada correctamente.");
    }
}
