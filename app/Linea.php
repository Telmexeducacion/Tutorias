<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    //
        // Nombre de la tabla en la base de datos
        protected $table = 'lineas';

        // Campos que pueden ser asignados de forma masiva

    // Definir los campos que se pueden rellenar
    protected $fillable = [
        'id_biblioteca',
        'id_tecnologia',
        'numero',
        'anchobanda',
    ];

        // Relación con la tabla 'bibliotecas'
        public function biblioteca()
        {
            return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
        }



          /**
     * Relación con el modelo Tecnologia.
     * Un número de línea pertenece a una tecnología.
     */
    public function tecnologia()
    {
        return $this->belongsTo(Tecnologia::class, 'id_tecnologia');
    }

    public function mediciones()
    {
        return $this->hasMany(Medicion::class, 'id_linea');
    }

    public function recibidos($id,$mes,$anio){
       $dato=  Medicion::where('id_linea',$id)->where('mes',$mes)->where('anio',$anio)->first();
       return $dato->recibidos;
    }
    public function enviados($id,$mes,$anio){
        $dato=  Medicion::where('id_linea',$id)->where('mes',$mes)->where('anio',$anio)->first();
        return $dato->enviados;
     }

     public function semaforo($id,$mes,$anio){
        $dato=  Medicion::where('id_linea',$id)->where('mes',$mes)->where('anio',$anio)->first();
        return $dato->semaforo->estatus;
     }

}
