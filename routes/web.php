<?php

use App\Http\Controllers\AsignacionRevisionController;
use App\Http\Controllers\FormularioAsistenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioCapituloController;
use App\Http\Controllers\FormularioCartelController;
use App\Http\Controllers\FormularioCursosController;
use App\Http\Controllers\FormularioPrototipoController;
use App\Http\Controllers\ObservacionesDocumentoController;
use App\Http\Controllers\InstitutoController;
use App\Http\Controllers\PaseListaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevisoresController;
;

Route::get('/', function () {
    return view(view: 'welcome');
})->name('index');

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
    Route::get('/prototipos/excel', [FormularioPrototipoController::class, 'exportExcel'])->name('formulario_prototipo.excel');

    Route::get('/prototipo/{dato}', [FormularioPrototipoController::class, 'show'])->name('formulario_prototipo.show');
    Route::get('/prototipo/{dato}/edit', [FormularioPrototipoController::class, 'edit'])->name('formulario_prototipo.edit');
    Route::put('/prototipo/{dato}', [FormularioPrototipoController::class, 'update'])->name('formulario_prototipo.update');
    Route::delete('/prototipos-registrados/{dato}', [FormularioPrototipoController::class, 'destroy'])->name('formulario_prototipo.destroy');

    //Carteles
    Route::get('/carteles-registrados', [FormularioCartelController::class, 'index'])->name('formulario_cartel.index');

    //Institutos
    Route::get('/institutos', [InstitutoController::class, 'index'])->name('instituto.index');
    Route::get('/institutos/create', [InstitutoController::class, 'create'])->name('instituto.create');
    Route::post('/institutos', [InstitutoController::class, 'store'])->name('instituto.store');
    Route::get('/institutos/{instituto}/edit', [InstitutoController::class, 'edit'])->name('instituto.edit');
    Route::put('/institutos/{instituto}', [InstitutoController::class, 'update'])->name('instituto.update');
    Route::delete('/institutos/{instituto}', [InstitutoController::class, 'destroy'])->name('instituto.destroy');
    Route::get('/institutos/excel', [InstitutoController::class, 'exportExcel'])->name('instituto.excel');


    //EXCEL
    Route::get('/carteles/excel', [FormularioCartelController::class, 'exportExcel'])->name('formulario_cartel.excel');
    Route::get('/asistentes/{dato}', [FormularioAsistenciaController::class, 'show'])->name('formulario_asistencia.show');
    Route::get('/cartel/{dato}/edit', [FormularioCartelController::class, 'edit'])->name('formulario_cartel.edit');
    Route::put('/cartel/{dato}', [FormularioCartelController::class, 'update'])->name('formulario_cartel.update');
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
    Route::get('/asistente/excel', [FormularioAsistenciaController::class, 'exportExcel'])->name('formulario_asistencia.excel');
    //EXCEL
    Route::get('/asistentes/{dato}', [FormularioAsistenciaController::class, 'show'])->name('formulario_asistencia.show');
    Route::delete('/asistentes/{dato}', [FormularioAsistenciaController::class, 'destroy'])->name('formulario_asistencia.destroy');

    Route::get('/asistentes/{dato}/edit', [FormularioAsistenciaController::class, 'edit'])->name('formulario_asistencia.edit');
    Route::put('/asistentes/{dato}', [FormularioAsistenciaController::class, 'update'])->name('formulario_asistencia.update');

    //Confirmar asistencia
    Route::get('/lista-confirmacion', [PaseListaController::class, 'index'])->name('lista.index');
    Route::put('/lista-confirmacion/{dato}/confirmar', [PaseListaController::class, 'update'])->name('lista.update');
    Route::put('/lista-confirmacion/{dato}/desconfirmar', [PaseListaController::class, 'update1'])->name('lista.desconfirmar');

    //Formulario para registro de carteles
    Route::get('/registrar-cartel', [FormularioCartelController::class, 'create'])->name('formulario_cartel.create');
    Route::post('/registrar-cartel', [FormularioCartelController::class, 'store'])->name('formulario_cartel.store');
    });

// Rutas para formulario de capitulos
Route::get('/registrar-capitulo', [FormularioCapituloController::class, 'create'])->name('formulario_capitulo.create');
Route::post('/registrar-capitulo', [FormularioCapituloController::class, 'store'])->name('formulario_capitulo.store');
//Formulario para registro de prototipo de investigación
Route::get('/registrar-prototipo', [FormularioPrototipoController::class, 'create'])->name('formulario_prototipo.create');
Route::post('/registrar-prototipo', [FormularioPrototipoController::class, 'store'])->name('formulario_prototipo.store');


//Formulario para registro de cursos
Route::get('/registrar-cursos', [FormularioCursosController::class, 'create'])->name('formulario_cursos.create');
Route::post('/registrar-cursos', [FormularioCursosController::class, 'store'])->name('formulario_cursos.store');
//Formulario para registro de asistencia al evento
Route::get('/registrar-asistencia', [FormularioAsistenciaController::class, 'create'])->name('formulario_asistencia.create');
Route::post('registrar-asistencia', [FormularioAsistenciaController::class, 'store'])->name('formulario_asistencia.store');

Route::get('/cartel/{dato}/{tipo}', [FormularioCartelController::class, 'descargar'])->name('formulario_cartel.descargar');
Route::get('/prototipo/{dato}/{tipo}', [FormularioPrototipoController::class, 'descargar'])->name('formulario_prototipo.descargar');
require __DIR__ . '/auth.php';
