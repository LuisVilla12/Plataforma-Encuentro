<?php

namespace App\Http\Controllers;

use App\Models\FormularioAsistencia;
use App\Models\Instituto;
use Illuminate\Http\Request;

class FormularioAsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
        return view('form_asistencia.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instituciones = Instituto::all();
        return view('form_asistencia.create', compact('instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidoP' => 'required|string|max:255',
            'apellidoM' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'celular' => 'required|string|max:20',
            'nombre_ca' => 'required|string|max:255',
            'clave_ca' => 'required|string|max:255',
            'interes' => 'required|string|max:255',
            'modalidad_participacion' => 'required|array|min:1',
            'requiere_oficio' => 'required|string|max:3',
            'confirmacion' => 'accepted',
        ]);
        if($request->institucion=='Otra')
        Instituto::create(attributes: [
            'nombre' => $request->otra_institucion,
        ]);
        if($request->institucion === "Otra"){
            $request->merge(['institucion' => $request->otra_institucion]);
        }

        FormularioAsistencia::create($request->all());
        return redirect()->route('formulario_asistencia.create')->with('success', 'Formulario de asistencia registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormularioAsistencia $dato)
    {
        //
        return view('form_asistencia.show', compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormularioAsistencia $dato)
    {
        //
        return view('form_asistencia.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioAsistencia $dato)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'celular' => 'required|string|max:20',
            'nombre_ca' => 'required|string|max:255',
            'clave_ca' => 'required|string|max:255',
            'interes' => 'required|string|max:255',
        ]);

        $dato->update($request->all());
        return redirect()->route('formulario_asistencia.index')->with('success', 'Formulario de asistencia actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioAsistencia $dato)
    {
        $dato->delete();
        $datos=FormularioAsistencia::all();
        return redirect()
            ->route('formulario_asistencia.index', compact('datos'))
            ->with(
                'success', 'El registro se ha eliminado correctamente.'
        );
    }
}
