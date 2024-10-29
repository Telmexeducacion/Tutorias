<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    //
        // Nombre de la tabla en la base de datos
        protected $table = 'lineas';

        // Campos que pueden ser asignados de forma masiva
        protected $fillable = [

            'id_biblioteca',
            'numero',
            'anchoBanda',
            'tecnologia',
            'costo'
        ];

        // Relación con la tabla 'bibliotecas'
        public function biblioteca()
        {
            return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
        }

}
