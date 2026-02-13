<?php

namespace App\Http\Controllers;

use App\Models\FormularioCursos;
use Illuminate\Http\Request;

class FormularioCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos=FormularioCursos::all();
        return view('form_cursos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form_cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255|min:5',
            'institucion' => 'required|max:255|min:5',
            'curso' => 'required',
        ]);
        FormularioCursos::create($request->all());
        return redirect()->route('formulario_cursos.create')->with('success', 'Registro guardado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormularioCursos $formularioCursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormularioCursos $dato)
    {
        //
        return view('form_cursos.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioCursos $formularioCursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioCursos $dato)
    {
        $dato->delete();
        $datos=FormularioCursos::all();
        return redirect()
            ->route('formulario_cursos.index', compact('datos'))
            ->with(
                'success', 'El registro se ha eliminado correctamente.'
        );
    }
}
