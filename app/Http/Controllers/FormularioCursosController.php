<?php

namespace App\Http\Controllers;

use App\Models\FormularioCapitulo;
use App\Models\FormularioCartel;
use App\Models\FormularioCursos;
use App\Models\FormularioPrototipo;
use App\Models\Institucion;
use App\Models\Instituto;
use Illuminate\Http\Request;

class FormularioCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = FormularioCursos::all();
        return view('form_cursos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituciones = Instituto::all();
        $prototipos = FormularioPrototipo::all();
        $carteles = FormularioCartel::all();
        $capitulos = FormularioCapitulo::all();
        $autoresUnicos = collect()
            ->merge($prototipos->pluck('autores'))
            ->merge($carteles->pluck('autores'))
            ->merge($capitulos->pluck('autores'))
            ->flatten()   // convierte todos los arrays en uno solo
            ->filter()    // elimina null o vacíos
            ->unique()    // elimina repetidos
            ->values();   // reindexa

        return view('form_cursos.create', ['instituciones' => $instituciones, 'autoresUnicos' => $autoresUnicos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Obtener lugares restantes
        $lugaresRestantesCurso1 = FormularioCursos::where('curso', '1')->count();
        $lugaresRestantesCurso2 = FormularioCursos::where('curso', '2')->count();

        if ($request->curso == 1 && $lugaresRestantesCurso1 >= 25) {
            return redirect()->back()->with('error', 'No hay lugares disponibles para este curso.');
        }
        if ($request->curso == 2 && $lugaresRestantesCurso2 >= 45) {
            return redirect()->back()->with('error', 'No hay lugares disponibles para este curso.');
        }

        $request->validate([
            'nombre' => 'required|max:255|min:5|unique:formulario_cursos,nombre',
            'institucion' => 'required|max:255',
            'correo' => 'required|email|unique:formulario_cursos,correo',
            'curso' => 'required',
            'confirmacion' => 'accepted',
        ]);

        if ($request->institucion == 'Otra')
            Instituto::create(attributes: [
                'nombre' => $request->otra_institucion,
            ]);
        if ($request->institucion === "Otra") {
            $request->merge(['institucion' => $request->otra_institucion]);
        }
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
    public function update(Request $request, FormularioCursos $dato)
    {
        //
        $request->validate([
            'nombre' => 'required|max:255|min:5|unique:formulario_cursos,nombre,' . $dato->id,
            'institucion' => 'required|max:255|min:5',
            'correo' => 'required|email|unique:formulario_cursos,correo,' . $dato->id,
            'curso' => 'required',
        ]);
        $dato->update($request->all());
        return redirect()->route('formulario_cursos.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioCursos $dato)
    {
        $dato->delete();
        $datos = FormularioCursos::all();
        return redirect()
            ->route('formulario_cursos.index', compact('datos'))
            ->with(
                'success',
                'El registro se ha eliminado correctamente.'
            );
    }
}
