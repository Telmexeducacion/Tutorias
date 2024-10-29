<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use Illuminate\Http\Request;
use App\mobiliario;
use App\Edificio;
use App\Auditoria;
use App\Actividad;

class tutoriaController extends Controller
{

        //Inicio de tutoria, recive el id y retorna la informacion para su trabajo en esta ventana
        public function panelInicio($id){

            $sede= Biblioteca::get()->where('clavebdt',$id)->first();
            $ruta = route('panel.tutoria',$sede->clavebdt);
            $this->Registro("INICIO DE TUTORIA CON LA SEDE ".$sede->nombreMatutino,$ruta);
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


        public function UpdateMobiliario(Request $request){
            $id= $request->id;
            $mobiliario = mobiliario::where('id',$id)->first();
            $cantidad= $mobiliario->cantidad;
            $funcional = $request->funcional;
            $dañado = $request->dañado;
            $faltante = $request->faltante;

            if ($funcional + $dañado + $faltante > $cantidad) {
                return back()->with('error', 'Los datos ingresados no coinciden');
            }else if($funcional + $dañado + $faltante < $cantidad){
                return back()->with('error', 'Falta Equipo');
            }else{
                $actualizar = mobiliario::where('id',$id)->first();
                $actualizar->funcional = $funcional;
                $actualizar->dañado = $dañado;
                $actualizar->faltante =$faltante;
                $actualizar->save();
                $sede= $actualizar->biblioteca->clavebdt;
                $nombre = $actualizar->biblioteca->nombreMatutino;
                $ruta = route('tutoria.edificio',$sede);
                $this->Registro("ACTUALIZACION DE MOBILIARIO EN SEDE: ".$nombre,$ruta);

                return back()->with('success', 'Actualizacion realizada de manera correcta');
            }


        }


        public function estadoEdificio(Request $request)
        {
            $edificio = Edificio::find($request->id);
            $nombre=$edificio->biblioteca->nombreMatutino;
            $sede= $edificio->biblioteca->clavebdt;
            $ruta= route('tutoria.edificio',$sede);


            if ($edificio) {
                $field = $request->field;
                $value = $request->value;

                $edificio->$field = $value;
                $edificio->save();

                $this->Registro("ACTUALIZACION DE INFRAESTRUCTURA EN SEDE: ".$nombre,$ruta);

                return response()->json(['success' => true]);
            }

            return response()->json(['success' => false], 404);
        }


        public function Registro($nombre,$ruta){

            $accion = new Actividad( );
            $accion->id_usuario = \Auth::user()->id;
            $accion->actividad = "REALIZO ".$nombre;
            $accion->ruta= $ruta;
            $accion->save();

        }



    }


