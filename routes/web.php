<?php

use App\Http\Controllers\AsignacionRevisionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioCapituloController;
use App\Http\Controllers\FormularioCursosController;
use App\Http\Controllers\ObservacionesDocumentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevisoresController;
use App\Models\AsignacionRevision;

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

    //Asignar revisiones
    Route::get('/revisiones-asignadas', action: [AsignacionRevisionController::class, 'index'])->name('asignar.index');
    Route::get('/capitulo/{dato}', [FormularioCapituloController::class, 'show'])->name(name: 'formulario_capitulo.show');
    Route::post('/capitulo/{dato}/observaciones', [ObservacionesDocumentoController::class, 'store'])->name(name: 'observaciones.create');


});

//Logueado y admin
Route::middleware(['auth', 'admin'])->group(function () {
     //Rutas para formulario de capitulos
    Route::get('/capitulos-registrados', [FormularioCapituloController::class, 'index'])->name('formulario_capitulo.index');
    Route::get('/capitulo/{dato}/edit', [FormularioCapituloController::class, 'edit'])->name('formulario_capitulo.edit');
    Route::put('/capitulo', [FormularioCapituloController::class, 'update'])->name('formulario_capitulo.update');
    //Rutas para cursos
    Route::get('/cursos', action: [FormularioCursosController::class, 'index'])->name('formulario_cursos.index');
    Route::get('/cursos/{dato}/edit', [FormularioCursosController::class, 'edit'])->name('formulario_cursos.edit');
    Route::put('/cursos/{dato}', [FormularioCursosController::class, 'update'])->name('formulario_cursos.update');
    Route::delete('/cursos/{dato}', [FormularioCursosController::class, 'destroy'])->name('formulario_cursos.destroy');
    //Rutas para revisores
    Route::get('/revisores', action: [RevisoresController::class, 'index'])->name('revisores.index');
    Route::get('/revisores/{dato}', action: [RevisoresController::class, 'show'])->name('revisores.show');
    //Asignar capitulo a revisor
    Route::post('/asignar-revisor', [AsignacionRevisionController::class, 'store'])->name('asignar.create');
});

// Rutas para formulario de capitulos
Route::get('/registrar-capitulo/create', [FormularioCapituloController::class, 'create'])->name('formulario_capitulo.create');
Route::post('/registrar-capitulo/create', [FormularioCapituloController::class, 'store'])->name('formulario_capitulo.store');
//Formulario para registro de cursos
Route::get('/formulario-cursos/create', [FormularioCursosController::class, 'create'])->name('formulario_cursos.create');
Route::post('/formulario-cursos/create', [FormularioCursosController::class, 'store'])->name('formulario_cursos.store');


require __DIR__ . '/auth.php';
