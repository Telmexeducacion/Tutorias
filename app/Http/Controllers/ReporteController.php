<?php

namespace App\Http\Controllers;
Use App\Biblioteca;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use Carbon\Carbon;

setlocale(LC_TIME, 'es_ES.UTF-8');
class ReporteController extends Controller{



    public function inicio($clave){

        $sede = Biblioteca::where('clavebdt',$clave)->get()->first();


        $mes = $this->traducirMes(Carbon::now()->month);
        $anio = Carbon::now()->year;
        $nombrePDF= $sede->clavebdt."_".$sede->nombreMatutino."_".$mes."_".$anio;


        $data = [
            'nombre' => $sede->nombreMatutino,
            'clave' => $sede->clavebdt,
            'mes' =>$mes,
            'anio'=>$anio
        ];


        // Renderiza la vista con los datos y convierte a HTML
        $html = view('pdf', $data)->render();

        // Configura y genera el PDF
        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8',array(3,2,3,2));
        $html2pdf->writeHTML($html);
         // Obtener el contenido del PDF
        return $html2pdf->output($nombrePDF.'.pdf');



    }



    function traducirMes($mesIngles) {
        // Convertimos el nombre del mes a minúsculas para facilitar la búsqueda
        $mesIngles = strtolower($mesIngles);

        // Mapeo de nombres de meses en inglés a español
        $meses = [
            '1' => 'Enero',
            '2' => 'Febrero',
            '3' => 'Marzo',
            '4' => 'Abril',
            '5' => 'Mayo',
            '6' => 'Junio',
            '7' => 'Julio',
            '8' => 'Agosto',
            '9' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        ];

        // Verificamos si el mes está en el mapeo
        if (array_key_exists($mesIngles, $meses)) {
            return $meses[$mesIngles];
        } else {
            return "Mes no válido"; // En caso de que no se encuentre el mes
        }
    }


}

