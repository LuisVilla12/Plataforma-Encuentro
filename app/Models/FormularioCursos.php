<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioCursos extends Model
{
    protected $fillable = [
        'nombre',
        'institucion',
        'curso',
    ];
}
