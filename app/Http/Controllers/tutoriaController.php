<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use Illuminate\Http\Request;

class tutoriaController extends Controller
{
    //Inicio de tutoria, recive el id y retorna la informacion para su trabajo en esta ventana
    public function panelInicio($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();
        return view('Tutor.Tutoria.index',compact('sede'));
    }

    public function panelConectividad($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();
        return view('Tutor.Tutoria.internet',compact('sede'));
    }

    public function panelIncidencia(){
        return view('Tutor.Tutoria.indicencias');
    }

    public function usobdt($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();
        return view('Tutor.Tutoria.usobdt',compact('sede'));
    }

    public function equipos($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();
        return view('Tutor.Tutoria.equipo',compact('sede'));
    }

    public function edificio($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();

        return view('Tutor.Tutoria.estructura',compact('sede'));
    }

    public function ficha($id){
        $sede= Biblioteca::get()->where('clavebdt',$id)->first();

        return redirect()->back()->with('error','Datos Imcompletos para descargar la ficha');
    }
}
