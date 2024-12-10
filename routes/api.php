<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/periodos', [JsonController::class, 'periodos']);
Route::get('/carreras', [JsonController::class, 'carreras']);
Route::get('/semestres', [JsonController::class, 'semestres']);
Route::get('/materias', [JsonController::class, 'materias']);
Route::get('/deptos', [JsonController::class, 'deptos']);
Route::get('/personals', [JsonController::class, 'personals']);
Route::get('/edificios', [JsonController::class, 'edificios']);
Route::get('/lugar', [JsonController::class, 'lugar']);
Route::get('/grupos', [JsonController::class, 'grupos']);

Route::post('/grupos', [JsonController::class, 'insertarGrupo']);
Route::post('/insertar-grupo-horario', [JsonController::class, 'insertarGrupoHorario']);

Route::post('/obtener-horarios', [JsonController::class, 'obtenerHorariosPorGrupoYLugar']);
Route::post('/actualizar-horarios', [JsonController::class, 'actualizarHorarios']);

Route::get('/horarios', [JsonController::class, 'horarios']);
Route::post('/eliminar-grupo-horario', [JsonController::class, 'eliminarGrupoHorario']);


