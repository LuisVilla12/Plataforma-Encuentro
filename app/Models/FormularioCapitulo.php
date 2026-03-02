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
    protected $casts = [
        'autores' => 'array',
    ];
    public function asignacionesRevision()
    {
        return $this->hasMany(AsignacionRevision::class, 'capitulo_id');
    }
    public function observaciones()
    {
        return $this->hasMany(ObservacionesDocumento::class, 'capitulo_id');
    }
}
