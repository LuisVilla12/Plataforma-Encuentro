<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioCartel extends Model
{
    //
    protected $fillable = [
        'autores',
        'institucion',
        'url_cartel',
        'url_resumen',
        'url_zip'
    ];
}
