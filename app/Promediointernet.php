<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promediointernet extends Model
{
    //
    // Nombre de la tabla en la base de datos
    protected $table = 'promediointernets';

    // Campos que pueden ser asignados de forma masiva
    protected $fillable = [
        'id_biblioteca',
        'subida',
        'bajada',
        'semaforo',
        'anio',
        'mes'
    ];

    // Relación con la tabla 'bibliotecas'
    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
    }

}
