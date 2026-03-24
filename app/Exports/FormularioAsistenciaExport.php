<?php

namespace App\Exports;

use App\Models\FormularioAsistencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FormularioAsistenciaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FormularioAsistencia::all()->map(function ($asistente) {
            return [
                $asistente->id,
                $asistente->apellidoP,
                $asistente->apellidoM,
                $asistente->nombre,
                $asistente->correo,
                $asistente->institucion,
                $asistente->celular,
                $asistente->nombre_ca,
                $asistente->clave_ca,
                $asistente->modalidad_participacion,
                $asistente->requiere_oficio,
                $asistente->nombre_oficio,
                        ];
        });
    }
     public function headings(): array
    {
        return [
            'Id',
            'Apellido Paterno',
            'Apellido Materno',
            'Nombre',
            'Correo',
            'Teléfono',
            'Institución',
            'Celular',
            'Nombre CA',
            'Clave CA',
            'Modalidad de Participación',
            'Modalidad de Participación',
            'Requiere Oficio',
            'Nombre de Oficio'
        ];
    }
}
