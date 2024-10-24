<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'idperiodo' => ['required', 'string', 'max:5', 'unique:periodos,idperiodo'],
            'periodo' => ['required', 'string', 'max:100'],
            'desccorta' => ['required', 'string', 'max:10'],
            'fechaini' => ['required', 'date'],
            'fechafin' => ['required', 'date'],
        ];
    }

    public function index()
    {
        $periodos = Periodo::paginate(8); // Paginación
        return view("periodos.index", compact("periodos"));
    }

    public function create()
    {
        $periodo = new Periodo;
        $accion = "C"; // Acción: Crear
        $txtbtn = "Guardar";
        $des = ""; // Sin deshabilitar
        return view("periodos.frm", compact("periodo", "accion", "txtbtn", "des"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Periodo::create($val);
        return redirect()->route("periodos.index")->with("mensaje", "Periodo registrado correctamente.");
    }

    public function show(Periodo $periodo)
    {
        $accion = "D"; // Acción: Detalle
        $txtbtn = ""; // No mostrar botón
        $des = "disabled"; // Deshabilitar campos
        return view("periodos.frm", compact("periodo", "accion", "txtbtn", "des"));
    }

    public function edit(Periodo $periodo)
    {
        $accion = "E"; // Acción: Editar
        $txtbtn = "Actualizar";
        $des = ""; // Habilitar campos
        return view("periodos.frm", compact("periodo", "accion", "txtbtn", "des"));
    }

    public function update(Request $request, Periodo $periodo)
    {
        $this->val['idperiodo'] = ['required', 'string', 'max:5', 'unique:periodos,idperiodo,' . $periodo->id];
        $val = $request->validate($this->val);
        $periodo->update($val);
        return redirect()->route("periodos.index")->with("mensaje", "Periodo actualizado correctamente.");
    }

    public function destroy(Periodo $periodo)
    {
        $periodo->delete();
        return redirect()->route("periodos.index")->with("mensaje", "Periodo eliminado correctamente.");
    }
}
