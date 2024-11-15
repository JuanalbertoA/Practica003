<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Depto;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    protected $val;

    public function __construct()
    {
        $this->val = [
            'RFC' => ['required', 'string', 'max:100'],
            'nombres' => ['required', 'string', 'max:50'],
            'apellidop' => ['required', 'string', 'max:50'],
            'apellidom' => ['required', 'string', 'max:50'],
            'licenciatura' => ['required', 'string', 'max:200'],
            'lictit' => ['required', 'boolean'],
            'especializacion' => ['required', 'string', 'max:200'],
            'esptit' => ['required', 'boolean'],
            'maestria' => ['required', 'string', 'max:200'],
            'maetit' => ['required', 'boolean'],
            'doctorado' => ['required', 'string', 'max:200'],
            'doctit' => ['required', 'boolean'],
            'fechaingsep' => ['required', 'date'],
            'fechaingins' => ['required', 'date'],
            'depto_id' => ['required', 'exists:deptos,id'],
            'puesto_id' => ['required', 'exists:puestos,id'],
        ];
    }

    public function index()
    {
        $personals = Personal::with(['depto', 'puesto'])->paginate(8);
        return view("personals.index", compact("personals"));
    }

    public function create()
    {
        $personal = new Personal;
        $accion = "C";
        $txtbtn = "Guardar";
        $des = "";

        $deptos = Depto::all();
        $puestos = Puesto::all();

        return view("personals.frm", compact("personal", "accion", "txtbtn", "des", "deptos", "puestos"));
    }

    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        Personal::create($val);
        return redirect()->route("personals.index")->with("mensaje", "Personal registrado correctamente.");
    }

    public function show(Personal $personal)
    {
        $accion = "D";
        $txtbtn = "";
        $des = "disabled";

        $deptos = Depto::all();
        $puestos = Puesto::all();

        return view("personals.frm", compact("personal", "accion", "txtbtn", "des", "deptos", "puestos"));
    }

    public function edit(Personal $personal)
    {
        $accion = "E";
        $txtbtn = "Actualizar";
        $des = "";

        $deptos = Depto::all();
        $puestos = Puesto::all();

        return view("personals.frm", compact("personal", "accion", "txtbtn", "des", "deptos", "puestos"));
    }

    public function update(Request $request, Personal $personal)
    {
        $val = $request->validate($this->val);
        $personal->update($val);
        return redirect()->route("personals.index")->with("mensaje", "Personal actualizado correctamente.");
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();
        return redirect()->route("personals.index")->with("mensaje", "Personal eliminado correctamente.");
    }
}
