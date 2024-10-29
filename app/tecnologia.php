<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tecnologia extends Model
{
    protected $fillable = [
        'nombre',
        'detalle'
    ];


    //modelo lineas
    public function lineas()
    {
        return $this->hasMany(Linea::class, 'id_tecnologia');
    }


}

