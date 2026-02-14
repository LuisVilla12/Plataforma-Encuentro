<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionRevision extends Model
{
    //
    protected $fillable = [
        'capitulo_id',
        'user_id',
    ];


    public function capitulo()
    {
        return $this->belongsTo(FormularioCapitulo::class, 'capitulo_id');
    }

    public function revisor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
