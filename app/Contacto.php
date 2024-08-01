<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'id_biblioteca',
        'id_tutor',
        'estado',
        'comentarios',


    ];


    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'id_tutor');
    }

}
