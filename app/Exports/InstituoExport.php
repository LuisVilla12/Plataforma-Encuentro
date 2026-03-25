<?php

namespace App\Exports;

use App\Models\Instituto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class InstituoExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Instituto::all()->map(function ($instituto) {
            return [
                'id' => $instituto->id,
                'nombre' => $instituto->nombre,
            ];
        });
    }
     public function headings(): array
    {
        return [
            'Id',
            'Nombre',
        ];
    }
}
