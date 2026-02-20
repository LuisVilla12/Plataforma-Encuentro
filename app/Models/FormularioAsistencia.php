<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioAsistencia extends Model
{
    //
     protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'institucion',
        'correo',
        'celular',
        'nombre_ca',
        'clave_ca',
        'interes',
    ];
}

