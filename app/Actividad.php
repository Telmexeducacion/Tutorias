<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //

    protected $fillable = [
        'id_usuario',
        'actividad',
        'ruta',


    ];
}
