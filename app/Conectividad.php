<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conectividad extends Model
{
    //
     // Nombre de la tabla en la base de datos
     protected $table = 'conectividads';

     // Campos que pueden ser asignados de forma masiva
     protected $fillable = [
         'id_biblioteca',
         'nombreFacturacion',
         'pagoConvenio',
         'pago',
         'vigenciaServicio',
         'cuentaMaestra',
         'Paquete'
     ];

     // Relación con la tabla 'bibliotecas'
     public function biblioteca()
     {
         return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
     }

}
