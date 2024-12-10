<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Personal;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Carrera;
use App\Models\Depto;
use App\Models\MateriaAbierta;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $personal = Personal::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $departamentos = Depto::all();
        $grupoExistente = null;

        $semestres = collect();
        $materiasAbiertas = collect();
        $personalFiltrado = collect();

        $selectedPeriodo = $request->periodo;
        $selectedCarrera = $request->carrera;
        $selectedSemestre = $request->semestre;
        $selectedDepto = $request->departamento;

        if ($request->filled('grupo')) {
            $grupoExistente = Grupo::with(['materiaAbierta.materia', 'personal'])
                                  ->where('grupo', $request->grupo)
                                  ->first();

            if ($grupoExistente) {
                $selectedPeriodo = $grupoExistente->periodo_id;
                $selectedCarrera = $grupoExistente->materiaAbierta->materia->reticula->carrera_id;
                $selectedSemestre = $grupoExistente->materiaAbierta->materia->semestre;
                $selectedDepto = $grupoExistente->personal->depto_id ?? null;
            }
        }

        if ($selectedPeriodo && $selectedCarrera) {
            $semestres = Materia::whereHas('reticula', function ($query) use ($selectedCarrera) {
                $query->where('carrera_id', $selectedCarrera);
            })->pluck('semestre')->unique()->sort();
        }

        if ($selectedPeriodo && $selectedCarrera && $selectedSemestre) {
            $materiasAbiertas = MateriaAbierta::where('periodo_id', $selectedPeriodo)
                ->whereHas('materia', function ($query) use ($selectedCarrera, $selectedSemestre) {
                    $query->where('semestre', $selectedSemestre)
                          ->whereHas('reticula', function ($q) use ($selectedCarrera) {
                              $q->where('carrera_id', $selectedCarrera);
                          });
                })->with('materia')->get();
        }

        if ($selectedDepto) {
            $personalFiltrado = Personal::where('depto_id', $selectedDepto)->get();
        }

        return view('grupos.index', compact(
            'personal', 'periodos', 'carreras', 'departamentos',
            'semestres', 'materiasAbiertas', 'personalFiltrado',
            'selectedPeriodo', 'selectedCarrera', 'selectedSemestre', 'selectedDepto',
            'grupoExistente'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grupo' => 'required|string|max:5',
            'descripcion' => 'nullable|string|max:200',
            'max_alumnos' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'periodo' => 'required|exists:periodos,id',
            'materia' => 'required|exists:materias,id',
            'personal' => 'nullable|exists:personals,id',
        ]);

        try {
            $materiaAbierta = MateriaAbierta::where('materia_id', $request->materia)
                ->where('periodo_id', $request->periodo)
                ->firstOrFail();

            $grupo = Grupo::updateOrCreate(
                ['grupo' => $request->grupo],
                [
                    'descripcion' => $request->descripcion,
                    'max_alumnos' => $request->max_alumnos,
                    'fecha' => $request->fecha,
                    'periodo_id' => $request->periodo,
                    'materia_abierta_id' => $materiaAbierta->id,
                    'personal_id' => $request->personal ?: null,
                ]
            );

            $message = $grupo->wasRecentlyCreated 
                ? 'Grupo creado exitosamente' 
                : 'Grupo actualizado exitosamente';

            return redirect()->route('grupos.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Error al procesar el grupo: ' . $e->getMessage()])
                ->withInput();
        }
    }
}
