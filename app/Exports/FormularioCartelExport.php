<?php

namespace App\Exports;

use App\Models\FormularioCartel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FormularioCartelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioCartel::all()->map(function ($asistente) {

    // Decodificar JSON a array
    // $autores = json_decode($asistente->autores, true);

    // Seguridad por si viene null o mal formato
    // if (!is_array($autores)) {
    //     $autores = [$asistente->autores];
    // }

    // Formatear autores
    $autoresFormateados = collect($asistente->autores)
        ->map(function ($autor, $index) {
            return ($index + 1) . '. ' . $autor;
        })
        ->implode("\n");

    return [
        $asistente->id,
        $autoresFormateados,
        $asistente->institucion,
        $asistente->correo,
        $asistente->tematica,
    ];
});
    }
     public function headings(): array
    {
        return [
            'Id',
            'Autores',
            'Institución',
            'Correo',
            'Tematica',
        ];
    }

}
