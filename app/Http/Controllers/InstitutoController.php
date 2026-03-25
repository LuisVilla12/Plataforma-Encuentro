<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituto;

class InstitutoController extends Controller
{
    //
    public function index()
    {
        $datos = Instituto::orderBy('nombre', 'asc')->get();
        return view('instituto.index', compact('datos'));
    }

    public function create()
    {
        return view('instituto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',        ]);

        Instituto::create($request->all());

        return redirect()->route('instituto.index')->with('success', 'Instituto creado exitosamente.');
    }
    public function edit(Instituto $instituto){
        return view('instituto.edit', compact('instituto'));
    }
    public function update(Request $request, Instituto $instituto){
        $request->validate([
            'nombre' => 'required|string|max:255',        ]);

        $instituto->update($request->all());

        return redirect()->route('instituto.index')->with('success', 'Instituto actualizado exitosamente.');
    }
    public function destroy(Instituto $instituto){
        $instituto->delete();
        return redirect()->route('instituto.index')->with('success', 'Instituto eliminado exitosamente.');
    }
}
