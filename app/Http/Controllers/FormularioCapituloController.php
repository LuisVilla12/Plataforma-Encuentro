<?php

namespace App\Http\Controllers;

use App\Models\FormularioCapitulo;
use Illuminate\Http\Request;

class FormularioCapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos=FormularioCapitulo::all();
        return view('form_capitulo.index',[
            'datos'=>$datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('form_capitulo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'autores' => 'required|string|max:255|min:5',
            'institucion' => 'required|string|max:255|min:5',
            'url_capitulo' => 'required|file|mimes:docx|max:2048',
            'url_resumen' => 'required|file|mimes:docx|max:2048',
        ]);
        $ruta_capitulo = $request->file('url_capitulo')->store('documentos', 'capitulos');
        $ruta_resumen = $request->file('url_resumen')->store('documentos', 'capitulos');
        FormularioCapitulo::create([
            'autores' => $request->autores,
            'institucion' => $request->institucion,
            'url_capitulo' => $ruta_capitulo,
            'url_resumen' => $ruta_resumen,
        ]);
            return redirect()->back()->with('success', 'Registro guardado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(FormularioCapitulo $dato)
    {
        //
        return view('form_capitulo.show', compact('dato'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormularioCapitulo $dato)
    {
        return view('form_capitulo.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioCapitulo $formularioCapitulo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioCapitulo $formularioCapitulo)
    {
        //
    }
}
