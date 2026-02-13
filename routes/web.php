<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormularioCapituloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/capitulos-registrados', [FormularioCapituloController::class, 'index'])->name('formulario_capitulo.index');
Route::get('/formulario-capitulo/create', [FormularioCapituloController::class, 'create'])->name('formulario_capitulo.create');
Route::post('/formulario-capitulo/create', [FormularioCapituloController::class, 'store'])->name('formulario_capitulo.store');
Route::get('/capitulo/{dato}', [FormularioCapituloController::class, 'show'])->name('formulario_capitulo.show');
require __DIR__.'/auth.php';
