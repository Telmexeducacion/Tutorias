<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    //

    protected $fillable = [
        'id_usuario',
        'accion',
        'detalle',
        'tabla',
        'id_cambios',
    ];

}
