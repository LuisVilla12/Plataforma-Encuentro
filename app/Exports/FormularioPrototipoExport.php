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
            return [
                $asistente->id,
                $asistente->autores,
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
