<?php

namespace App\Http\Controllers;

use App\Models\Depto;
use Illuminate\Http\Request;

class DeptoController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'iddepto' => ['required', 'string', 'max:2'],
            'nombredepto' => ['required', 'string', 'max:100'],
            'nombremediano' => ['required', 'string', 'max:15'],
            'nombrecorto' => ['required', 'string', 'max:5'],
        ];
    }

    public function index()
    {
        $deptos = Depto::paginate(8);
        return view("deptos.index", compact("deptos"));
    }

    public function create()
    {
        $depto = new Depto;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";
        return view("deptos.frm", compact("depto", "accion", "txtbtn", "des"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Depto::create($val);
        return redirect()->route("deptos.index")->with("mensaje", "Departamento registrado correctamente.");
    }

    public function show(Depto $depto)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";
        return view("deptos.frm", compact("depto", "accion", "txtbtn", "des"));
    }

    public function edit(Depto $depto)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";
        return view("deptos.frm", compact("depto", "accion", "txtbtn", "des"));
    }

    public function update(Request $request, Depto $depto)
    {
        $val = $request->validate($this->val);
        $depto->update($val);
        return redirect()->route("deptos.index")->with("mensaje", "Departamento actualizado correctamente.");
    }

    public function destroy(Depto $depto)
    {
        $depto->delete();
        return redirect()->route("deptos.index")->with("mensaje", "Departamento eliminado correctamente.");
    }
}
