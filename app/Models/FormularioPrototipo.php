<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioPrototipo extends Model
{
    //
    protected $fillable = [
        'autores',
        'institucion',
        'url_prototipo',
        'observaciones',
        'url_resumen',
    ];
      protected $casts = [
    'autores' => 'array',
];
}
