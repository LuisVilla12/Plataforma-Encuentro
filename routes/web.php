<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioCapituloController;
use App\Http\Controllers\FormularioCursosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Logueado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Logueado y admin
Route::middleware(['auth', 'admin'])->group(function () {
     //Rutas para formulario de capitulos
    Route::get('/capitulos-registrados', [FormularioCapituloController::class, 'index'])->name('formulario_capitulo.index');
    Route::get('/capitulo/{dato}', [FormularioCapituloController::class, 'show'])->name('formulario_capitulo.show');
    Route::get('/capitulo/{dato}/edit', [FormularioCapituloController::class, 'edit'])->name('formulario_capitulo.edit');
    Route::put('/capitulo', [FormularioCapituloController::class, 'update'])->name('formulario_capitulo.update');
    //Rutas para cursos
    Route::get('/cursos', action: [FormularioCursosController::class, 'index'])->name('formulario_cursos.index');
    Route::get('/cursos/{dato}/edit', [FormularioCursosController::class, 'edit'])->name('formulario_cursos.edit');
    Route::put('/cursos/{dato}', [FormularioCursosController::class, 'update'])->name('formulario_cursos.update');
    Route::delete('/cursos/{dato}', [FormularioCursosController::class, 'destroy'])->name('formulario_cursos.destroy');
    //Rutas para revisores
    Route::get('/revisores', [App\Http\Controllers\RevisoresController::class, 'index'])->name('revisores.index');
});

// Rutas para formulario de capitulos
Route::get('/formulario-capitulo/create', [FormularioCapituloController::class, 'create'])->name('formulario_capitulo.create');
Route::post('/formulario-capitulo/create', [FormularioCapituloController::class, 'store'])->name('formulario_capitulo.store');
//Formulario para registro de cursos
Route::get('/formulario-cursos/create', [FormularioCursosController::class, 'create'])->name('formulario_cursos.create');
Route::post('/formulario-cursos/create', [FormularioCursosController::class, 'store'])->name('formulario_cursos.store');


require __DIR__ . '/auth.php';
