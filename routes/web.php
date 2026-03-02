<?php

use App\Http\Controllers\AsignacionRevisionController;
use App\Http\Controllers\FormularioAsistenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioCapituloController;
use App\Http\Controllers\FormularioCartelController;
use App\Http\Controllers\FormularioCursosController;
use App\Http\Controllers\FormularioPrototipoController;
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
    //Prototipos de investigación
    Route::get('/prototipos-registrados', [FormularioPrototipoController::class, 'index'])->name('formulario_prototipo.index');
    Route::get('/prototipo/{dato}', [FormularioPrototipoController::class, 'show'])->name('formulario_prototipo.show');
    Route::delete('/prototipos-registrados/{dato}', [FormularioPrototipoController::class, 'destroy'])->name('formulario_prototipo.destroy');

    //Carteles
    Route::get('/carteles-registrados', [FormularioCartelController::class, 'index'])->name('formulario_cartel.index');
    Route::get('/cartel/{dato}', [FormularioCartelController::class, 'show'])->name('formulario_cartel.show');
    Route::delete('/carteles/{dato}', [FormularioCartelController::class, 'destroy'])->name('formulario_cartel.destroy');

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
    //Litado de asistentes
    Route::get('/asistentes', [FormularioAsistenciaController::class, 'index'])->name('formulario_asistencia.index');
    Route::get('/asistentes/{dato}', [FormularioAsistenciaController::class, 'show'])->name('formulario_asistencia.show');
    Route::delete('/asistentes/{dato}', [FormularioAsistenciaController::class, 'destroy'])->name('formulario_asistencia.destroy');
    Route::get('/asistentes/{dato}/edit', [FormularioAsistenciaController::class, 'edit'])->name('formulario_asistencia.edit');
    Route::put('/asistentes/{dato}', [FormularioAsistenciaController::class, 'update'])->name('formulario_asistencia.update');
    });

// Rutas para formulario de capitulos
Route::get('/registrar-capitulo', [FormularioCapituloController::class, 'create'])->name('formulario_capitulo.create');
Route::post('/registrar-capitulo', [FormularioCapituloController::class, 'store'])->name('formulario_capitulo.store');
//Formulario para registro de prototipo de investigación
Route::get('/registrar-prototipo', [FormularioPrototipoController::class, 'create'])->name('formulario_prototipo.create');
Route::post('/registrar-prototipo', [FormularioPrototipoController::class, 'store'])->name('formulario_prototipo.store');
//Formulario para registro de carteles
Route::get('/registrar-cartel', [FormularioCartelController::class, 'create'])->name('formulario_cartel.create');
Route::post('/registrar-cartel', [FormularioCartelController::class, 'store'])->name('formulario_cartel.store');


//Formulario para registro de cursos
Route::get('/registrar-cursos', [FormularioCursosController::class, 'create'])->name('formulario_cursos.create');
Route::post('/registrar-cursos', [FormularioCursosController::class, 'store'])->name('formulario_cursos.store');
//Formulario para registro de asistencia al evento
Route::get('/registrar-asistencia', [FormularioAsistenciaController::class, 'create'])->name('formulario_asistencia.create');
Route::post('registrar-asistencia', [FormularioAsistenciaController::class, 'store'])->name('formulario_asistencia.store');


require __DIR__ . '/auth.php';
