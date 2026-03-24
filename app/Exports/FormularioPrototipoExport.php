<?php

namespace App\Exports;

use App\Models\FormularioPrototipo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormularioPrototipoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    return FormularioPrototipo::all()->map(function ($asistente) {

    // Decodificar JSON
    // $autores = json_decode($asistente->autores, true);

    // Seguridad
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
    ];
});
    }
    public function headings(): array
    {
        return [
            'Id',
            'Autores',
            'Institución',
        ];
    }
}
