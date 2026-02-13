<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormularioCapitulo extends Model
{
     protected $fillable = [
        'autores',
        'institucion',
        'url_capitulo',
        'url_resumen',
    ];
}
