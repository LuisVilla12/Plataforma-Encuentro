<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioAsistencia;

class ConstanciasController extends Controller
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
        ->orderBy('nombre', 'asc')->get();
        // ->paginate(10)
        // ->withQueryString(); // ← mantiene el search en la paginación
        // $datos = FormularioAsistencia::all();
        return view('constancias.index', compact('datos'));
    }
    public function descargar($dato,$tipo){
    $dato = FormularioAsistencia::findOrFail($dato);
    if($tipo == 'asistente'){
        $nombrePersonalizado =  $dato->folio .'_E3CA_'  . $dato->institucion .'.pdf';
        $ruta = storage_path('app/constancias/asistentes/' . $dato->folio . '.pdf');
    }elseif($tipo == 'cartel'){
        $ruta = storage_path('app/constancias/' . $dato->url_resumen);
        $nombrePersonalizado = $dato->id .'_3ECA_Resumen_' . $dato->institucion . '.pdf';
    }else{
        return redirect()->back()->with('error', 'Tipo de archivo no válido');
    }

    return response()->download($ruta, $nombrePersonalizado);
}
}
