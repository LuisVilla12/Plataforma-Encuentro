<?php

namespace App\Http\Controllers;

use App\Models\FormularioCartel;
use App\Models\Instituto;
use Illuminate\Http\Request;

class FormularioCartelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = FormularioCartel::all();
        return view('form_cartel.index', [
            'datos' =>$datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $instituciones=Instituto::all();
        return view('form_cartel.create', compact('instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'autores' => 'required',
            'institucion' => 'required|string|max:255',
            'url_cartel' => 'required|file',
            'url_resumen' => 'required|file',
            'url_zip' => 'required',
            'confirmacion' => 'accepted',
        ]);

        $ruta_cartel = $request->file('url_cartel')->store('carteles', 'public');
        $ruta_resumen = $request->file('url_resumen')->store('carteles', 'public');
        $ruta_zip = $request->file('url_zip')->store('carteles', 'public');
        if($request->institucion=='Otra')
        Instituto::create(attributes: [
            'nombre' => $request->otra_institucion,
        ]);
        if($request->institucion === "Otra"){
            $request->merge(['institucion' => $request->otra_institucion]);
        }
        FormularioCartel::create([
            'autores' => $request->autores,
            'institucion' => $request->institucion,
            'url_cartel' => $ruta_cartel,
            'url_resumen' => $ruta_resumen,
            'url_zip'=>$ruta_zip,
        ]);
        return redirect()->back()->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormularioCartel $dato)
    {
        //
        return view('form_cartel.show', compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormularioCartel $formularioCartel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioCartel $formularioCartel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioCartel $dato)
    {
        $dato->delete();
        $datos=FormularioCartel::all();
        return redirect()
            ->route('formulario_cartel.index', compact('datos'))
            ->with(
                'success', 'El registro se ha eliminado correctamente.'
        );
        }
}
