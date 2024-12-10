<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\DocumentacionController;
use App\Http\Controllers\EdificiosController;
use App\Http\Controllers\Grupo21318Controller;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\GrupoHorarioController;
use App\Http\Controllers\GrupoHorarios21318Controller;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\HorasController;
use App\Http\Controllers\MateriaAbiertaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PersonalplazasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReticulaController;
use App\Http\Controllers\TipoinscController;
use App\Models\Grupo;
use App\Models\GrupoHorario;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/login', function () {
    return view('login');
})->middleware(['auth'])->name('login');

Route::get('/register', function () {
    return view('register');
})->middleware(['auth'])->name('register');

Route::get('/dashboard', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/plazas.index', [PlazaController::class, 'index'])->name('plazas.index');
Route::get('/plazas.create', [PlazaController::class, 'create'])->name('plazas.create');
Route::get('/plazas.edit/{plaza}', [PlazaController::class, 'edit'])->name('plazas.edit');
Route::get('/plazas.show/{plaza}', [PlazaController::class, 'show'])->name('plazas.show');
Route::delete('/plazas.destroy/{plaza}', [PlazaController::class, 'destroy'])->name('plazas.destroy');
Route::post('/plazas.update/{plaza}', [PlazaController::class, 'update'])->name('plazas.update');
Route::post('/plazas.store', [PlazaController::class, 'store'])->name('plazas.store');

Route::get('/puestos.index', [PuestoController::class, 'index'])->name('puestos.index');
Route::get('/puestos.create', [PuestoController::class, 'create'])->name('puestos.create');
Route::get('/puestos.edit/{puesto}', [PuestoController::class, 'edit'])->name('puestos.edit');
Route::get('/puestos.show/{puesto}', [PuestoController::class, 'show'])->name('puestos.show');
Route::delete('/puestos.destroy/{puesto}', [PuestoController::class, 'destroy'])->name('puestos.destroy');
Route::post('/puestos.update/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');
Route::post('/puestos.store', [PuestoController::class, 'store'])->name('puestos.store');

Route::get('/deptos.index', [DeptoController::class, 'index'])->name('deptos.index');
Route::get('/deptos.create', [DeptoController::class, 'create'])->name('deptos.create');
Route::get('/deptos.edit/{depto}', [DeptoController::class, 'edit'])->name('deptos.edit');
Route::get('/deptos.show/{depto}', [DeptoController::class, 'show'])->name('deptos.show');
Route::delete('/deptos.destroy/{depto}', [DeptoController::class, 'destroy'])->name('deptos.destroy');
Route::post('/deptos.update/{depto}', [DeptoController::class, 'update'])->name('deptos.update');
Route::post('/deptos.store', [DeptoController::class, 'store'])->name('deptos.store');

Route::get('/carreras.index', [CarreraController::class, 'index'])->name('carreras.index');
Route::get('/carreras.create', [CarreraController::class, 'create'])->name('carreras.create');
Route::get('/carreras.edit/{carrera}', [CarreraController::class, 'edit'])->name('carreras.edit');
Route::get('/carreras.show/{carrera}', [CarreraController::class, 'show'])->name('carreras.show');
Route::delete('/carreras.destroy/{carrera}', [CarreraController::class, 'destroy'])->name('carreras.destroy');
Route::post('/carreras.update/{carrera}', [CarreraController::class, 'update'])->name('carreras.update');
Route::post('/carreras.store', [CarreraController::class, 'store'])->name('carreras.store');

Route::get('/alumnos.index', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/alumnos.create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::get('/alumnos.edit/{alumno}', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::get('/alumnos.show/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::delete('/alumnos.destroy/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
Route::post('/alumnos.update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::post('/alumnos.store', [AlumnoController::class, 'store'])->name('alumnos.store');

Route::get('/reticulas.index', [ReticulaController::class, 'index'])->name('reticulas.index');
Route::get('/reticulas.create', [ReticulaController::class, 'create'])->name('reticulas.create');
Route::get('/reticulas.edit/{reticula}', [ReticulaController::class, 'edit'])->name('reticulas.edit');
Route::get('/reticulas.show/{reticula}', [ReticulaController::class, 'show'])->name('reticulas.show');
Route::delete('/reticulas.destroy/{reticula}', [ReticulaController::class, 'destroy'])->name('reticulas.destroy');
Route::post('/reticulas.update/{reticula}', [ReticulaController::class, 'update'])->name('reticulas.update');
Route::post('/reticulas.store', [ReticulaController::class, 'store'])->name('reticulas.store');

Route::get('/materias.index', [MateriaController::class, 'index'])->name('materias.index');
Route::get('/materias.create', [MateriaController::class, 'create'])->name('materias.create');
Route::get('/materias.edit/{materia}', [MateriaController::class, 'edit'])->name('materias.edit');
Route::get('/materias.show/{materia}', [MateriaController::class, 'show'])->name('materias.show');
Route::delete('/materias.destroy/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');
Route::post('/materias.update/{materia}', [MateriaController::class, 'update'])->name('materias.update');
Route::post('/materias.store', [MateriaController::class, 'store'])->name('materias.store');

Route::get('/periodos.index', [PeriodoController::class, 'index'])->name('periodos.index');
Route::get('/periodos/create', [PeriodoController::class, 'create'])->name('periodos.create');
Route::get('/periodos/edit/{periodo}', [PeriodoController::class, 'edit'])->name('periodos.edit');
Route::get('/periodos/show/{periodo}', [PeriodoController::class, 'show'])->name('periodos.show');
Route::delete('/periodos/destroy/{periodo}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');
Route::post('/periodos/update/{periodo}', [PeriodoController::class, 'update'])->name('periodos.update');
Route::post('/periodos/store', [PeriodoController::class, 'store'])->name('periodos.store');

Route::get('/materiasa.index', [MateriaAbiertaController::class, 'index'])->name('materiasa.index');
Route::post('/materiasa/store', [MateriaAbiertaController::class, 'store'])->name('materiasa.store');

Route::get('/edificios', [EdificiosController::class, 'index'])->name('edificios.index');
Route::get('/edificios/create', [EdificiosController::class, 'create'])->name('edificios.create');
Route::get('/edificios/edit/{edificio}', [EdificiosController::class, 'edit'])->name('edificios.edit');
Route::get('/edificios/show/{edificio}', [EdificiosController::class, 'show'])->name('edificios.show');
Route::delete('/edificios/destroy/{edificio}', [EdificiosController::class, 'destroy'])->name('edificios.destroy');
Route::post('/edificios/update/{edificio}', [EdificiosController::class, 'update'])->name('edificios.update');
Route::post('/edificios/store', [EdificiosController::class, 'store'])->name('edificios.store');

Route::get('/horas', [HorasController::class, 'index'])->name('horas.index');
Route::get('/horas/create', [HorasController::class, 'create'])->name('horas.create');
Route::get('/horas/edit/{hora}', [HorasController::class, 'edit'])->name('horas.edit');
Route::get('/horas/show/{hora}', [HorasController::class, 'show'])->name('horas.show');
Route::delete('/horas/destroy/{hora}', [HorasController::class, 'destroy'])->name('horas.destroy');
Route::post('/horas/update/{hora}', [HorasController::class, 'update'])->name('horas.update');
Route::post('/horas/store', [HorasController::class, 'store'])->name('horas.store');

Route::get('/lugares', [LugaresController::class, 'index'])->name('lugares.index');
Route::get('/lugares/create', [LugaresController::class, 'create'])->name('lugares.create');
Route::get('/lugares/edit/{lugar}', [LugaresController::class, 'edit'])->name('lugares.edit');
Route::get('/lugares/show/{lugar}', [LugaresController::class, 'show'])->name('lugares.show');
Route::delete('/lugares/destroy/{lugar}', [LugaresController::class, 'destroy'])->name('lugares.destroy');
Route::post('/lugares/update/{lugar}', [LugaresController::class, 'update'])->name('lugares.update');
Route::post('/lugares/store', [LugaresController::class, 'store'])->name('lugares.store');

Route::get('/personals', [PersonalController::class, 'index'])->name('personals.index');
Route::get('/personals/create', [PersonalController::class, 'create'])->name('personals.create');
Route::get('/personals/edit/{personal}', [PersonalController::class, 'edit'])->name('personals.edit');
Route::get('/personals/show/{personal}', [PersonalController::class, 'show'])->name('personals.show');
Route::delete('/personals/destroy/{personal}', [PersonalController::class, 'destroy'])->name('personals.destroy');
Route::post('/personals/update/{personal}', [PersonalController::class, 'update'])->name('personals.update');
Route::post('/personals/store', [PersonalController::class, 'store'])->name('personals.store');

Route::get('/personalplazas', [PersonalplazasController::class, 'index'])->name('personalplazas.index');
Route::get('/personalplazas/create', [PersonalplazasController::class, 'create'])->name('personalplazas.create');
Route::get('/personalplazas/edit/{id}', [PersonalplazasController::class, 'edit'])->name('personalplazas.edit');
Route::get('personalplazas/show/{personalplaza}', [PersonalPlazasController::class, 'show'])->name('personalplazas.show');
Route::delete('/personalplazas/destroy/{id}', [PersonalplazasController::class, 'destroy'])->name('personalplazas.destroy');
Route::put('/personalplazas/update/{id}', [PersonalplazasController::class, 'update'])->name('personalplazas.update');
Route::post('/personalplazas/store', [PersonalplazasController::class, 'store'])->name('personalplazas.store');

Route::get('/tipoinscs', [TipoinscController::class, 'index'])->name('tipoinscs.index');
Route::get('/tipoinscs/create', [TipoinscController::class, 'create'])->name('tipoinscs.create');
Route::get('/tipoinscs/edit/{tipoinsc}', [TipoinscController::class, 'edit'])->name('tipoinscs.edit');
Route::get('/tipoinscs/show/{tipoinsc}', [TipoinscController::class, 'show'])->name('tipoinscs.show');
Route::delete('/tipoinscs/destroy/{tipoinsc}', [TipoinscController::class, 'destroy'])->name('tipoinscs.destroy');
Route::put('/tipoinscs/update/{tipoinsc}', [TipoinscController::class, 'update'])->name('tipoinscs.update');
Route::post('/tipoinscs/store', [TipoinscController::class, 'store'])->name('tipoinscs.store');

Route::get('/documentacions', [DocumentacionController::class, 'index'])->name('documentacions.index');
Route::get('/documentacions/create', [DocumentacionController::class, 'create'])->name('documentacions.create');
Route::get('/documentacions/edit/{documentacion}', [DocumentacionController::class, 'edit'])->name('documentacions.edit');
Route::get('/documentacions/show/{documentacion}', [DocumentacionController::class, 'show'])->name('documentacions.show');
Route::delete('/documentacions/destroy/{documentacion}', [DocumentacionController::class, 'destroy'])->name('documentacions.destroy');
Route::put('/documentacions/update/{documentacion}', [DocumentacionController::class, 'update'])->name('documentacions.update');
Route::post('/documentacions/store', [DocumentacionController::class, 'store'])->name('documentacions.store');

Route::get('/grupos21318', [Grupo21318Controller::class, 'index'])->name('grupos21318.index');
Route::get('/grupos21318/create', [Grupo21318Controller::class, 'create'])->name('grupos21318.create');
Route::get('/grupos21318/edit/{grupo}', [Grupo21318Controller::class, 'edit'])->name('grupos21318.edit');
Route::get('/grupos21318/show/{grupo}', [Grupo21318Controller::class, 'show'])->name('grupos21318.show');
Route::delete('/grupos21318/destroy/{grupo}', [Grupo21318Controller::class, 'destroy'])->name('grupos21318.destroy');
Route::put('/grupos21318/update/{grupo}', [Grupo21318Controller::class, 'update'])->name('grupos21318.update');
Route::post('/grupos21318/store', [Grupo21318Controller::class, 'store'])->name('grupos21318.store');

// Rutas para GrupoHorarios21318
Route::get('/grupohorarios21318', [GrupoHorarios21318Controller::class, 'index'])->name('grupohorarios21318.index');
Route::get('/grupohorarios21318/create', [GrupoHorarios21318Controller::class, 'create'])->name('grupohorarios21318.create');
Route::get('/grupohorarios21318/edit/{id}', [GrupoHorarios21318Controller::class, 'edit'])->name('grupohorarios21318.edit');
Route::delete('/grupohorarios21318/destroy/{id}', [GrupoHorarios21318Controller::class, 'destroy'])->name('grupohorarios21318.destroy');
Route::put('/grupohorarios21318/update/{id}', [GrupoHorarios21318Controller::class, 'update'])->name('grupohorarios21318.update');
Route::post('/grupohorarios21318/store', [GrupoHorarios21318Controller::class, 'store'])->name('grupohorarios21318.store');


Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
Route::post('/grupos/store', [GrupoController::class, 'store'])->name('grupos.store');
Route::post('/grupo_horarios/store', [GrupoHorarioController::class, 'store'])->name('grupo_horario.store');
Route::get('/grupo_horarios/create', [GrupoHorarioController::class, 'create'])->name('grupo_horarios.create');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
