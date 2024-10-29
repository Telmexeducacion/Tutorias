<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promediointernet extends Model
{
    protected $table = 'promediointernets';

    // Definimos los campos que se pueden llenar
    protected $fillable = ['id_biblioteca', 'id_semaforo', 'enviado', 'recibidos', 'anio'];

    // Relación con la tabla biblioteca
    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'id_biblioteca');
    }

    // Relación con la tabla semaforos
    public function semaforo()
    {
        return $this->belongsTo(Semaforo::class, 'id_semaforo');
    }

    public function tecnologias($id)
    {
        // Obtener las tecnologías asociadas a las líneas de la biblioteca con el ID dado
        $tecnologias = Linea::where('id_biblioteca', $id)
                    ->with('tecnologia') // Cargar la relación con el modelo Tecnologia
                    ->get()
                    ->pluck('tecnologia.nombre') // Obtener solo los nombres de las tecnologías
                    ->toArray(); // Convertir la colección en un arreglo

        // Eliminar valores duplicados
        $data = array_unique($tecnologias);

        return $data;
    }


     public function recibidos($id){
       $id_lineas = Linea::where('id_biblioteca', $id)->pluck('id');
        $totalEnviados = Medicion::whereIn('id_linea', $id_lineas)->sum('enviados');
        return $totalEnviados ;
     }

     public function enviados($id){
        $id_lineas = Linea::where('id_biblioteca', $id)->pluck('id');
         $totalEnviados = Medicion::whereIn('id_linea', $id_lineas)->sum('recibidos');
         return $totalEnviados ;
      }

      public function tecnologia($id){
        $id_lineas = Linea::where('id_biblioteca', $id)->first();
        $tecno = $id_lineas->tecnologia->nombre;
         return $tecno;
      }









}
