<?php

namespace App\Http\Controllers;
use App\Biblioteca;
use App\Dependencia;
use App\Contacto;
use App\User;


use Illuminate\Http\Request;

// Adiciones
use Carbon\Carbon;

class tutoresController extends Controller
{
    public function index(){
        $user = \Auth::user()->id;
        $bibliotecas = Biblioteca::get()->where('tutor_id',$user);
        return view('Tutor.index',compact('bibliotecas'));

    }

    public function actualizarDatos(Request $request, $id)
    {


        // Guardar los datos en la base de datos
        $data = $request->only(['nombre_responsable', 'cargo_responsable', 'telefono_responsable','celular_responsable','correo_responsable',
        'nombre_encargado','cargo_encargado','telefono_encargado','celular_encargado','correo_encargado']);

        Dependencia::where('id_biblioteca',$id)->update($data);

        return redirect()->route('tutor.index')->with('succes','Datos Actualizados Correctamente');
    }


    public function TutoriaNoefectiva($id){
        $biblioteca = Biblioteca::where('clavebdt',$id)->first();

        return view('Tutor.nolocalizado',compact('biblioteca'));

    }

    public function GuardarNoEfectiva( Request $request){
        $user = \Auth::user()->id;

        $datos = new Contacto ();
        $datos->id_biblioteca = $request->id_biblioteca;
        $datos->id_tutor = $user;
        $datos->estado = $request->estado;
        $datos->comentarios = $request->comentarios;
        $datos->save();

        return redirect()->route('tutor.index')->with('mensaje',"Biblioteca actualizada");

    }



    public function ContactoEfectivo($id){
        $biblioteca = Biblioteca::where('clavebdt',$id)->first();
        return $biblioteca;

    }

    public function FormularioActualizarContacto($id){
        $sede = Biblioteca::get()->where('clavebdt',$id)->first();;
        $tutor = \Auth::user()->id;

        if($sede->tutor_id==$tutor){
            return view('Tutor.Actualizar.contactos',compact('sede'));
        }else{
            return "Sin Permiso de Editar datos";
        }


    }


    public function getContactos($id){


        $dependencia = Dependencia::where('id_biblioteca', $id)->first();
        $clave = Biblioteca::where('id',$id)->first();
        $sitio = $clave->clavebdt;
        $nombre = $clave->nombreMatutino;
        $dependencia['claveSitio'] = $sitio;
        $dependencia['nombre'] = $nombre;




        if ($dependencia) {
            // Retornar los datos de la dependencia como respuesta JSON
            return response()->json($dependencia);
        } else {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }


    }

    public function getHistorico($id){
 ///Mejorar para que no se vea solo uno si no todos los contactos en forma de tabla

        $dependencia = Contacto::where('id_biblioteca', $id)->first();

        $tutor = User::where('id',$dependencia->id_tutor)->first();
        $dato = [
            'tutor'=>$tutor->name,
            'fecha'=>$dependencia->created_at->format('d-m-Y'),
            'estado' => $dependencia->estado,
            'comentarios' =>$dependencia->comentarios,
        ];


        if ($dato) {
            // Retornar los datos de la dependencia como respuesta JSON
            return response()->json($dato);
        } else {
            return response()->json(['message' => 'Datos no encontrados'], 404);
        }


    }
}