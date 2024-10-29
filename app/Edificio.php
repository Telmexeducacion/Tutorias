<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    //
    protected $fillable = [
        'id_biblioteca',
        'señalizacion',
        'edificio',
        'pintura_interior',
        'pintura_exterior',
        'electricidad',
        'mobiliario'
    ];

    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
    }
}
