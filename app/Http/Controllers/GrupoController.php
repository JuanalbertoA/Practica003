<?php
// GrupoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Personal;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Carrera;
use App\Models\Depto;
use App\Models\MateriaAbierta;
use App\Models\Lugares;

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $personal = Personal::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $departamentos = Depto::all();

        // Variables dinámicas
        $semestres = collect();
        $materiasAbiertas = collect();
        $personalFiltrado = collect();

        // Filtros seleccionados
        $selectedPeriodo = $request->periodo;
        $selectedCarrera = $request->carrera;
        $selectedSemestre = $request->semestre;
        $selectedDepto = $request->departamento;

        // Obtener semestres si se selecciona periodo y carrera
        if ($selectedPeriodo && $selectedCarrera) {
            $semestres = Materia::whereHas('reticula', function ($query) use ($selectedCarrera) {
                $query->where('carrera_id', $selectedCarrera);
            })->pluck('semestre')->unique()->sort();
        }

        // Obtener materias abiertas
        if ($selectedPeriodo && $selectedCarrera && $selectedSemestre) {
            $materiasAbiertas = MateriaAbierta::where('periodo_id', $selectedPeriodo)
                ->whereHas('materia', function ($query) use ($selectedCarrera, $selectedSemestre) {
                    $query->where('semestre', $selectedSemestre)
                          ->whereHas('reticula', function ($q) use ($selectedCarrera) {
                              $q->where('carrera_id', $selectedCarrera);
                          });
                })->with('materia')->get();
        }

        // Filtrar personal por departamento
        if ($selectedDepto) {
            $personalFiltrado = Personal::where('depto_id', $selectedDepto)->get();
        }

        return view('grupos.index', compact(
            'personal', 'periodos', 'carreras', 'departamentos',
            'semestres', 'materiasAbiertas', 'personalFiltrado',
            'selectedPeriodo', 'selectedCarrera', 'selectedSemestre', 'selectedDepto'
        ));
    }

    public function store(Request $request)
    {
        // Validaciones básicas
        $validated = $request->validate([
            'grupo' => 'required|string|max:5',
            'descripcion' => 'nullable|string|max:200',
            'max_alumnos' => 'required|integer|min:1',
            'periodo' => 'required|exists:periodos,id',
            'carrera' => 'required|exists:carreras,id',
            'semestre' => 'required|integer|min:1|max:9',
            'materias' => 'required|array|min:1',
            'materias.*' => 'exists:materias,id',
            'personal' => 'required|array|min:1',
            'personal.*' => 'exists:personals,id',
        ]);

        // Validar grupo único por combinación
        $existingGrupo = Grupo::whereHas('materiaAbierta', function ($query) use ($request) {
            $query->where('periodo_id', $request->periodo)
                  ->whereHas('materia.reticula', function ($q) use ($request) {
                      $q->where('carrera_id', $request->carrera);
                  })
                  ->whereHas('materia', function ($q) use ($request) {
                      $q->where('semestre', $request->semestre);
                  });
        })->where('grupo', $request->grupo)->first();

        if ($existingGrupo) {
            return redirect()->back()
                ->withErrors(['grupo' => 'Ya existe un grupo con estas características para el periodo, carrera y semestre seleccionados.'])
                ->withInput();
        }

        try {
            // Iniciar transacción
            

            // Crear el grupo
            $grupo = new Grupo();
            $grupo->grupo = $request->grupo;
            $grupo->descripcion = $request->descripcion;
            $grupo->max_alumnos = $request->max_alumnos;
            $grupo->periodo_id = $request->periodo;
            
            // Obtener la primera materia abierta
            $materiaAbierta = MateriaAbierta::where('materia_id', $request->materias[0])
                ->where('periodo_id', $request->periodo)
                ->firstOrFail();
            
            $grupo->materia_abierta_id = $materiaAbierta->id;
            $grupo->personal_id = $request->personal[0];
            $grupo->save();

            // Asociar materias adicionales si existen
            if (count($request->materias) > 1) {
                foreach (array_slice($request->materias, 1) as $materiaId) {
                    $materiaAbierta = MateriaAbierta::where('materia_id', $materiaId)
                        ->where('periodo_id', $request->periodo)
                        ->first();
                    
                    if ($materiaAbierta) {
                        // Aquí puedes crear la relación con las materias adicionales
                        // según tu estructura de base de datos
                    }
                }
            }

            
            return redirect()->route('grupos.index')
                ->with('success', 'Grupo creado exitosamente');

        } catch (\Exception $e) {
            
            return redirect()->back()
                ->withErrors(['error' => 'Error al crear el grupo: ' . $e->getMessage()])
                ->withInput();
        }
    }
}

