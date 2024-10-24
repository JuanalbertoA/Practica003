<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeptoController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReticulaController;

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

Route::get('/periodos', [PeriodoController::class, 'index'])->name('periodos.index');
Route::get('/periodos/create', [PeriodoController::class, 'create'])->name('periodos.create');
Route::get('/periodos/edit/{periodo}', [PeriodoController::class, 'edit'])->name('periodos.edit');
Route::get('/periodos/show/{periodo}', [PeriodoController::class, 'show'])->name('periodos.show');
Route::delete('/periodos/destroy/{periodo}', [PeriodoController::class, 'destroy'])->name('periodos.destroy');
Route::post('/periodos/update/{periodo}', [PeriodoController::class, 'update'])->name('periodos.update');
Route::post('/periodos/store', [PeriodoController::class, 'store'])->name('periodos.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
