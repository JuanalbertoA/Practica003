<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('inicio2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/catalagos', function () {
    return view('catalogos');
})->middleware("auth")->name("catalogos");

Route::get('/catalogos1', function () {
    return view('catalogos1');
})->middleware("auth")->name("catalogos1");

Route::get('/catalogos2', function () {
    return view('catalogos2');
})->middleware("auth")->name("catalogos2");

Route::get('/catalogos3', function () {
    return view('catalogos3');
})->middleware("auth")->name("catalogos3");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
