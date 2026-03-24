<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioCartel extends Model
{
    //
    protected $fillable = [
        'autores',
        'carteles',
        'correo',
        'tematica',
        'institucion',
        'url_cartel',
        'url_resumen',
        'url_zip',
        'url_cesion_derechos',
        'url_ine'
    ];
        protected $casts = [
    'autores' => 'array',
];
}


