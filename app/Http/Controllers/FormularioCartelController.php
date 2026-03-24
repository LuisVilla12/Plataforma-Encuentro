<?php

namespace App\Http\Controllers;

use App\Models\FormularioCartel;
use App\Exports\FormularioCartelExport;
use App\Models\Instituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class FormularioCartelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $search = $request->get('search');
    $datos = FormularioCartel::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('autores', 'like', "%{$search}%")
                ->orWhere('institucion', 'like', "%{$search}%");
            });
        })
        ->orderBy('id', 'desc')
        ->paginate(70)
        ->withQueryString(); // ← mantiene el search en la paginación

        return view('form_cartel.index', [
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
        return view('form_cartel.create', compact('instituciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'autores' => 'required|array|min:1',
            'autores.*' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'url_resumen' => 'required|file|mimes:docx',
            'url_cartel' => 'required|file|mimes:pptx',
            'url_zip' => 'required|file|mimes:zip',
            'url_cesion_derechos' => 'required|file|mimes:pdf',
            'url_ine' => 'required|file|mimes:pdf',
            'confirmacion' => 'accepted',
        ]);
        $ruta_cartel = $request->file('url_cartel')->store('carteles', 'public');
        $ruta_resumen = $request->file('url_resumen')->store('carteles', 'public');
        $ruta_zip = $request->file('url_zip')->store('carteles', 'public');
        $ruta_cesion_derechos = $request->file('url_cesion_derechos')->store('carteles', 'public');
        $ruta_ine = $request->file('url_ine')->store('carteles', 'public');

        if ($request->institucion == 'Otra')
            Instituto::create(attributes: [
                'nombre' => $request->otra_institucion,
            ]);
        if ($request->institucion === "Otra") {
            $request->merge(['institucion' => $request->otra_institucion]);
        }
        FormularioCartel::create([
            'autores' => $request->autores,
            'institucion' => $request->institucion,
            'url_cartel' => $ruta_cartel,
            'url_resumen' => $ruta_resumen,
            'url_zip' => $ruta_zip,
            'url_cesion_derechos' => $ruta_cesion_derechos,
            'url_ine' => $ruta_ine,
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
    public function edit(FormularioCartel $dato)
    {
        //
        return view('form_cartel.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormularioCartel $dato)
    {
        // dd($request->all());
        $request->validate([
            'autores' => 'required|array|min:1',
            'autores.*' => 'required|string|max:255',
            'institucion' => 'required|string|max:255',
            'url_resumen' => 'nullable|file|mimes:docx',
            'url_cartel' => 'nullable|file|mimes:pptx',
            'url_zip' => 'nullable|file|mimes:zip',
            'url_cesion_derechos' => 'nullable|file|mimes:pdf',
            'url_ine' => 'nullable|file|mimes:pdf',
            'correo' => 'nullable|string|max:255',
            'tematica' => 'nullable|string|max:255',
        ]);

        if ($request->eliminar_resumen) {
            Storage::disk('public')->delete($dato->url_resumen);
            $ruta_resumen = $request->file('url_resumen')->store('carteles', 'public');
        }
        if ($request->hasFile('url_resumen')) {
            if ($dato->url_resumen) {
                Storage::disk('public')->delete($dato->url_resumen);
            }
            $dato->url_resumen = $request->file('url_resumen')->store('carteles', 'public');
        }
        if ($request->eliminar_cartel) {
            Storage::disk('public')->delete($dato->url_cartel);
            $dato->url_cartel = null;
        }
        if ($request->hasFile('url_cartel')) {
            if ($dato->url_cartel) {
                Storage::disk('public')->delete($dato->url_cartel);
            }

            $dato->url_cartel = $request->file('url_cartel')->store('carteles', 'public');
        }
        if ($request->eliminar_zip) {
            Storage::disk('public')->delete($dato->url_zip);
            $dato->url_zip = null;
        }

        if ($request->hasFile('url_zip')) {

            if ($dato->url_zip) {
                Storage::disk('public')->delete($dato->url_zip);
            }

            $dato->url_zip = $request->file('url_zip')->store('carteles', 'public');
        }

        if ($request->eliminar_cesion) {
            Storage::disk('public')->delete($dato->url_cesion_derechos);
            $dato->url_cesion_derechos = null;
        }

        if ($request->hasFile('url_cesion_derechos')) {

            if ($dato->url_cesion_derechos) {
                Storage::disk('public')->delete($dato->url_cesion_derechos);
            }

            $dato->url_cesion_derechos = $request->file('url_cesion_derechos')->store('carteles', 'public');
        }

        if ($request->eliminar_ine) {
            Storage::disk('public')->delete($dato->url_ine);
            $dato->url_ine = null;
        }

        if ($request->hasFile('url_ine')) {

            if ($dato->url_ine) {
                Storage::disk('public')->delete($dato->url_ine);
            }

            $dato->url_ine = $request->file('url_ine')->store('carteles', 'public');
        }

        $dato->autores = $request->autores;
        $dato->institucion = $request->institucion;
        $dato->correo = $request->correo;
        $dato->tematica = $request->tematica;
        $dato->save();
        // return redirect()->back()->with('success', 'Registro actualizado correctamente');
        return redirect()
            ->route('formulario_cartel.index')
            ->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormularioCartel $dato)
    {
        $dato->delete();
        $datos = FormularioCartel::all();
        return redirect()
            ->route('formulario_cartel.index', compact('datos'))
            ->with(
                'success',
                'El registro se ha eliminado correctamente.'
            );
    }
    public function exportExcel()
    {
    return Excel::download(new FormularioCartelExport(), 'carteles.xlsx');
    }
}
