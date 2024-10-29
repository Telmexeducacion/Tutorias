<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    //
     // Nombre de la tabla en la base de datos
     protected $table = 'medicions';

     // Campos que pueden ser asignados de forma masiva
     protected $fillable = [
         'id_linea',
         'subida',
         'bajada',
         'semaforo',
         'anio',
         'mes'
     ];

     // Relación con la tabla 'lineas'
     public function linea()
     {
         return $this->belongsTo(Linea::class, 'id_linea');
     }


}
