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

class GrupoController extends Controller
{
    public function index(Request $request)
    {
        $personal = Personal::all();
        $periodos = Periodo::all();
        $carreras = Carrera::all();
        $departamentos = Depto::all();
        $grupoExistente = null;

        // Variables dinámicas
        $semestres = collect();
        $materiasAbiertas = collect();
        $personalFiltrado = collect();

        // Filtros seleccionados
        $selectedPeriodo = $request->periodo;
        $selectedCarrera = $request->carrera;
        $selectedSemestre = $request->semestre;
        $selectedDepto = $request->departamento;
        
        // Si se proporciona un grupo, buscar si existe
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
            'selectedPeriodo', 'selectedCarrera', 'selectedSemestre', 'selectedDepto',
            'grupoExistente'
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
            'personal' => 'nullable|array', // Personal es opcional ahora
            'personal.*' => 'exists:personals,id',
        ]);

        try {
            // Iniciar transacción

            // Verificar si el grupo existe
            $grupo = Grupo::where('grupo', $request->grupo)->first();
            
            // Obtener la primera materia abierta
            $materiaAbierta = MateriaAbierta::where('materia_id', $request->materias[0])
                ->where('periodo_id', $request->periodo)
                ->firstOrFail();

            if ($grupo) {
                // Actualizar grupo existente
                $grupo->update([
                    'descripcion' => $request->descripcion,
                    'max_alumnos' => $request->max_alumnos,
                    'periodo_id' => $request->periodo,
                    'materia_abierta_id' => $materiaAbierta->id,
                    'personal_id' => $request->personal[0] ?? $grupo->personal_id, // Mantener el maestro actual si no se proporciona uno nuevo
                ]);
            } else {
                // Crear nuevo grupo
                $grupo = Grupo::create([
                    'grupo' => $request->grupo,
                    'descripcion' => $request->descripcion,
                    'max_alumnos' => $request->max_alumnos,
                    'periodo_id' => $request->periodo,
                    'materia_abierta_id' => $materiaAbierta->id,
                    'personal_id' => $request->personal[0] ?? null, // Personal opcional
                ]);
            }

            // Aquí puedes agregar la lógica para manejar materias adicionales
            // según tu estructura de base de datos

            
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