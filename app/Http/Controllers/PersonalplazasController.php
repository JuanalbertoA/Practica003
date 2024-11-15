<?php

namespace App\Http\Controllers;

use App\Models\PersonalPlaza;
use App\Models\Plaza;
use App\Models\Personal;
use App\Models\PersonalPlazas;
use Illuminate\Http\Request;

class PersonalplazasController extends Controller
{
    // Muestra el formulario para crear un nuevo PersonalPlaza
    public function create()
    {
        $plazas = Plaza::all();
        $personals = Personal::all();
        
        return view('personalplazas.frm', [
            'accion' => 'C',
            'plazas' => $plazas,
            'personals' => $personals,
            'des' => ''
        ]);
    }

    // Guarda un nuevo PersonalPlaza en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'tiponombramiento' => 'required|integer',
            'plaza_id' => 'required|exists:plazas,id',
            'personal_id' => 'required|exists:personals,id',
        ]);

        PersonalPlazas::create([
            'tiponombramiento' => $request->tiponombramiento,
            'plaza_id' => $request->plaza_id,
            'personal_id' => $request->personal_id,
        ]);

        return redirect()->route('personalplazas.index')->with('success', 'Personal Plaza creado correctamente.');
    }

    // Muestra el formulario para editar un PersonalPlaza existente
    public function edit($id)
    {
    $personalplaza = PersonalPlazas::findOrFail($id);
    $plazas = Plaza::all();
    $personals = Personal::all();
    
    return view('personalplazas.frm', [
        'accion' => 'E',
        'personalplaza' => $personalplaza,
        'plazas' => $plazas,
        'personals' => $personals,
        'des' => ''
    ]);
    }

    // Actualiza un PersonalPlaza existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'tiponombramiento' => 'required|integer',
            'plaza_id' => 'required|exists:plazas,id',
            'personal_id' => 'required|exists:personals,id',
        ]);

        $personalplaza = PersonalPlazas::findOrFail($id);
        $personalplaza->update([
            'tiponombramiento' => $request->tiponombramiento,
            'plaza_id' => $request->plaza_id,
            'personal_id' => $request->personal_id,
        ]);

        return redirect()->route('personalplazas.index')->with('success', 'Personal Plaza actualizado correctamente.');
    }

    // Muestra el formulario para eliminar un PersonalPlaza
    public function destroy($id)
    {
        $personalplaza = PersonalPlazas::findOrFail($id);
        $personalplaza->delete();

        return redirect()->route('personalplazas.index')->with('success', 'Personal Plaza eliminado correctamente.');
    }

    public function show($id)
    {
        $personalplaza = PersonalPlazas::findOrFail($id);
        $plazas = Plaza::all();
        $personals = Personal::all();
    
        return view('personalplazas.frm', [
            'accion' => 'D',
            'personalplaza' => $personalplaza,
            'plazas' => $plazas,
            'personals' => $personals,
            'des' => 'disabled'  // Esto puede ser utilizado para deshabilitar los campos
        ]);
    }
    
    
    public function index()
    {
        $personalplazas = PersonalPlazas::all();  // Asegúrate de que esta variable contiene todos los registros
        return view('personalplazas.index', compact('personalplazas'));
    }
    
}
