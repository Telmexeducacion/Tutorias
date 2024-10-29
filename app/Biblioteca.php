<?php

namespace App;
use App\contactoefectivo;
use App\sincontacto;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $fillable = [
        'numero',
        'clavebdt',
        'iniciativa',
        'pertenencia',
        'escolarizado',
        'actividadPublica',
        'servicio',
        'claveMatutino',
        'nombreMatutino',
        'claveVespertino',
        'nombreVespertino',
        'estado',
        'municipio',
        'localidad',
        'domicilio',
        'codPostal',
        'lat',
        'long',
        'personal',
        'nomina',
        'maxParticipantes',
        'costoHabilitación',
        'fechaEntrega',
        'fechaInicioConvenio',
        'fechaTerminoConvenio',
        'convenioColaboracion',
        'convenioVencido',
        'sitiacionEquipo',
        'dependencia',
        'estatus',
        'estatus_temporal',
        'tutor_id'
    ];


    public function dependencias()
    {
        return $this->hasMany('App\Dependencia', 'id_biblioteca');
    }

    public function tutor()
    {
        return $this->belongsTo('App\User', 'tutor_id');
    }



    public function UltimoContacto($id){

        $fecha = Contacto::where('id_biblioteca', $id)
        ->orderBy('updated_at', 'desc')
        ->first();
        $dato = $fecha->created_at->format('d-m-Y');
        return $dato;
    }

    public function dependenciasContacto($id){
        $dependencia = Dependencia::where('id_biblioteca', $id)->get()->first();
        return $dependencia;
    }


    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'id_biblioteca');
    }

    public function mobiliarios()
    {
        return $this->hasMany(Mobiliario::class, 'id_biblioteca');
    }



    public function edificios()
    {
        return $this->hasMany(Edificio::class, 'id_biblioteca');
    }

        /**
     * Relación con el modelo Linea.
     * Una biblioteca puede tener varias líneas.
     */
    public function lineas()
    {
        return $this->hasMany(Linea::class, 'id_biblioteca');
    }


    // Relación con la tabla promediointernets
    public function promedioInternet()
    {
        return $this->hasMany(PromedioInternet::class, 'id_biblioteca');
    }

    public function recibidos($id){
        $dato = PromedioInternet::where('id_biblioteca',$id)->first();
        return $dato->recibidos;
    }
    public function enviados($id){
        $dato = PromedioInternet::where('id_biblioteca',$id)->first();
        return $dato->enviado;
    }
    public function semaforo($id){
        $dato = PromedioInternet::where('id_biblioteca',$id)->first();
        return $dato->semaforo->estatus;
    }




}
