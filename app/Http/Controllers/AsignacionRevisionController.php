<?php

namespace App\Http\Controllers;

use App\Models\AsignacionRevision;
use Illuminate\Http\Request;

class AsignacionRevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // $asignaciones = AsignacionRevision::with('revisor', 'capitulo')->get();
     $asignaciones = AsignacionRevision::with('revisor', 'capitulo')
        ->where('user_id', auth()->id())
        ->get();
        // dd($asignaciones);
        return view('revisiones.index', [
            'asignaciones' => $asignaciones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'capitulo_id' => 'required|exists:formulario_capitulos,id',
        ]);
        AsignacionRevision::create([
            'user_id' => $request->user_id,
            'capitulo_id' => $request->capitulo_id,
        ]);
        return redirect()->back()->with('success', 'Revisor asignado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsignacionRevision $asignacionRevision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignacionRevision $asignacionRevision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsignacionRevision $asignacionRevision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsignacionRevision $asignacionRevision)
    {
        //
    }
}
