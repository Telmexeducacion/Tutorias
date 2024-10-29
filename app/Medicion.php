<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    //
     // Nombre de la tabla en la base de datos
     protected $table = 'mediciones';

     // Campos que pueden ser asignados de forma masiva
     protected $fillable = [
         'id_linea',
         'id_semaforo',
         'enviados',
         'recibidos',
         'anio',
         'mes'
     ];

     // Relación con la tabla 'lineas'
     public function linea()
     {
         return $this->belongsTo(Linea::class, 'id_linea');
     }

      // Relación con el modelo Semaforo
    public function semaforo()
    {
        return $this->belongsTo(Semaforo::class, 'id_semaforo');
    }






}
