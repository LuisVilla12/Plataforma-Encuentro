<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioAsistencia;
use App\Models\Instituto;

class PaseListaController extends Controller
{
    //
    public function index(Request $request){
    $search = $request->get('search');
    $datos = FormularioAsistencia::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('apellidoP', 'like', "%{$search}%")
                ->orWhere('apellidoM', 'like', "%{$search}%")
                ->orWhere('institucion', 'like', "%{$search}%");
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString(); // ← mantiene el search en la paginación

        // $datos = FormularioAsistencia::all();
        return view('lista.index', compact('datos'));
    }
    public function update(FormularioAsistencia $dato){
        $dato->confirmacion = 2;
        $dato->save();
        return redirect()->route('lista.index')->with('success', 'Asistencia confirmada exitosamente.');
    }
    public function update1(FormularioAsistencia $dato){
        $dato->confirmacion = 1;
        $dato->save();
        return redirect()->route('lista.index')->with('success', 'Asistencia deshabilitada exitosamente.');
    }
}

