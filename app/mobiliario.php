<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobiliario extends Model
{
    //
    protected $fillable = [
        'id_biblioteca',
        'tipo',
        'cantidad',
        'funcional',
        'dañado',
        'faltante',
        'observaciones'
    ];


    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
    }

}
