<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semaforo extends Model
{
    //
    protected $fillable = [
        'estatus',
        'lim_bajo',
        'lim_alto'
    ];


     // Relación con el modelo Medicion (Un Semaforo tiene muchas Mediciones)
     public function mediciones()
     {
         return $this->hasMany(Medicion::class, 'id_semaforo');
     }

    // Relación con la tabla promediointernets

     public function promedioInternets()
    {
        return $this->hasMany(PromedioInternet::class, 'id_semaforo');
    }



}
