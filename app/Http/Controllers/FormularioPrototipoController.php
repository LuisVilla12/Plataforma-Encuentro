<?php

namespace App\Http\Controllers;

use App\Models\FormularioPrototipo;
use App\Models\Instituto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormularioPrototipoExport;


class FormularioPrototipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $datos = FormularioPrototipo::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('autores', 'like', "%{$search}%")
                ->orWhere('institucion', 'like', "%{$search}%");
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString(); // ← mantiene el search en la paginación

        return view('form_prototipo.index', [
            'datos' => $datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $instituciones = Instituto::all();
        return view('form_prototipo.create', compact('instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'autores' => 'required|array|min:1',
            'autores.*' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'url_prototipo' => 'required|file|mimes:docx',
            'url_resumen' => 'required|file|mimes:docx',
            'observaciones' => 'nullable|string|max:255',
            'confirmacion' => 'accepted',
        ]);
        $ruta_prototipo = $request->file('url_prototipo')->store('prototipos', 'public');
        $ruta_resumen = $request->file('url_resumen')->store('prototipos', 'public');
        if ($request->institucion == 'Otra')
            Instituto::create(attributes: [
                'nombre' => $request->otra_institucion,
            ]);
        if ($request->institucion === "Otra") {
            $request->merge(['institucion' => $request->otra_institucion]);
        }
        FormularioPrototipo::create([
            'autores' => $request->autores,
            'institucion' => $request->institucion,
            'url_prototipo' => $ruta_prototipo,
            'observaciones' => $request->observaciones,
            'url_resumen' => $ruta_resumen,
        ]);
        return redirect()->back()->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormularioPrototipo $dato)
    {
        return view('form_prototipo.show', compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormularioPrototipo $dato)
    {
        //
        $instituciones = Instituto::all();
        return view('form_prototipo.edit', compact('dato', 'instituciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioPrototipo $formularioPrototipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioPrototipo $dato)
    {
        $dato->delete();
        $datos = FormularioPrototipo::all();
        return redirect()
            ->route('formulario_prototipo.index', compact('datos'))
            ->with(
                'success',
                'El registro se ha eliminado correctamente.'
            );

    }
 public function exportExcel()
    {
    return Excel::download(new FormularioPrototipoExport(), 'prototipos.xlsx');
    }
}
