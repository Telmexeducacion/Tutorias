<?php

namespace App\Http\Controllers;
Use App\Biblioteca;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use Carbon\Carbon;
use App\Exports\EstatusBDTExport;
use Maatwebsite\Excel\Facades\Excel;

setlocale(LC_TIME, 'es_ES.UTF-8');
class ReporteController extends Controller{

    public function panel(){
        return view('Reportes.panel');
    }

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


    public function ReporteData(){
        $data = '{
    "BDT Externas": {
        "Resumen": {
            "BDT Externas": 775,
            "Casas Telmex": 11
        },
        "Activas": {
            "Total": 106,
            "Externas": {
                "Centros comunitarios, Bibliotecas públicas y municipales, museos, escuelas": 103
            },
            "Internas": {
                "Casas TELMEX": 3
            }
        },
        "Cerradas": {
            "Total": 680,
            "Externas": {
                "Centros comunitarios, Bibliotecas públicas y municipales, museos, escuelas": 672
            },
            "Internas": {
                "Casas TELMEX": 8
            }
        },
        "Internet": {
            "Activas": {
                "Promedio": "191.30 GB",
                "BDT con líneas y enlace pagado por la entidad": {
                    "BDT": 92,
                    "Líneas": 102,
                    "Enlace": 1
                },
                "BDT con líneas y enlace pagado por Telmex": {
                    "BDT": 14,
                    "Líneas": 24,
                    "Enlace": 1
                },
                "Consumo": {
                    "Sin consumo": 3,
                    "Bajo": 53,
                    "Medio": 29,
                    "Alto": 10,
                    "Heavy": 11
                },
                "Costos": {
                    "Sin consumo": 51289,
                    "Bajo consumo": 63514,
                    "Medio consumo": 150920.06,
                    "Alto consumo": 26243.24
                }
            },
            "Cerradas": {
                "Promedio": "48.23 GB",
                "BDT con líneas pagadas por la entidad": {
                    "BDT": 569,
                    "Líneas": 346
                },
                "BDT con líneas pagadas por Telmex": {
                    "BDT": 8,
                    "Líneas": 51
                },
                "Consumo": {
                    "Sin consumo": 378,
                    "Bajo": 131,
                    "Medio": 53,
                    "Alto": 10,
                    "Heavy": 5
                },
                "Costos": {
                    "Sin consumo": 150920.06,
                    "Bajo consumo": 26243.24
                }
            }
        },
        "Equipamiento": {
            "Activas": {
                "Inventario Inicial": 3020,
                "Funcional": 1913,
                "Faltante": 78,
                "Dañado u obsoleto": 1029
            },
            "Cerradas": {
                "Inventario Inicial": 17834,
                "Funcional": 8585,
                "Faltante": 2696,
                "Dañado u obsoleto": 6553
            }
        },
        "Mobiliario": {
            "Activas": {
                "Inventario Inicial": 4123,
                "Inventario Actual": 4123
            },
            "Cerradas": {
                "Inventario Inicial": 13986,
                "Inventario Actual": 6076
            }
        },
        "Convenios": {
            "Activas": {
                "Indeterminado": 102,
                "Vencido": 3,
                "Vigente": 1
            },
            "Cerradas": {
                "Indeterminado": 528,
                "Vencido": 43,
                "Sin Convenio": 6
            }
        },
        "Motivos de Cierre": {
            "Equipos Obsoletos": 157,
            "Equipos Extraviados o Dañados": 185,
            "Daño a Infraestructura por Sinestro": 22,
            "Reubicación": 2,
            "Otro": {
                "Casos": 211,
                "Notas": "Baja del internet, cambio de administración, desmantelada, equipos dañados, reubicación, etc."
            }
        },
        "Acciones": {
            "Agregadas": [
                "Talleres en Línea y Presenciales",
                "Oferta Educativa"
            ],
            "Solicitudes Recibidas": {
                "Nuevas Instalaciones": "Instalar nuevas BDT o Donaciones",
                "Retiro": "Solicitudes de Retiro de Equipos",
                "Boletos PE": "Solicitudes de Boletos"
            },
            "Acciones Externas": [
                "Verificación mensual por videollamada",
                "Visitas presenciales a BDT sin contacto",
                "Monitoreo periódico de conectividad",
                "Actualización mensual de oferta educativa",
                "Actualización tecnológica: 74 BDT, $5,051,689"
            ],
            "Criterios de Cierre": [
                "Internet con otro proveedor",
                "Sedes sin equipos funcionales",
                "Menos de 5 equipos"
            ]
        },
        "Costo de Desmontaje": 6143.09
    },
    "Uso/Registros 2024": {
        "De Enero a Mayo": {
            "Centros Telmex": 3,
            "BDT Externas": 39,
            "Total": 42,
            "Registros en Sistema": {
                "Centros Telmex": 127385,
                "BDT Externas": 88073
            }
        }
    }
}';

$reporte = json_decode($data);


        return response()->json($data);




    }







	public function semana(){


		 $mes = $this->traducirMes(Carbon::now()->month);
        $anio = Carbon::now()->year;

		 $data = [

            'mes' =>$mes,
            'anio'=>$anio
        ];


        // Renderiza la vista con los datos y convierte a HTML
        $html = view('semana', $data)->render();

        // Configura y genera el PDF
        $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8',array(3,2,3,2));
        $html2pdf->writeHTML($html);
         // Obtener el contenido del PDF
        return $html2pdf->output('Semana.pdf');



    }


    public function quincena(){


		 $mes = $this->traducirMes(Carbon::now()->month);
         $anio = Carbon::now()->year;

          $data = [

             'mes' =>$mes,
             'anio'=>$anio
         ];


         // Renderiza la vista con los datos y convierte a HTML
         $html = view('quincena', $data)->render();

         // Configura y genera el PDF
         $html2pdf = new Html2Pdf('L', array(279, 432), 'es', true, 'UTF-8', array(1, 2, 1, 2));
         $html2pdf->writeHTML($html);
          // Obtener el contenido del PDF
         return $html2pdf->output('quincena.pdf');



    }


    public function quincena2(){


		 $mes = $this->traducirMes(Carbon::now()->month);
         $anio = Carbon::now()->year;

          $data = [

             'mes' =>$mes,
             'anio'=>$anio
         ];


         // Renderiza la vista con los datos y convierte a HTML
         $html = view('quincena1', $data)->render();

         // Configura y genera el PDF
         $html2pdf = new Html2Pdf('L', array(279, 432), 'es', true, 'UTF-8', array(1, 2, 1, 2));
         $html2pdf->writeHTML($html);
          // Obtener el contenido del PDF
         return $html2pdf->output('quincena.pdf');



    }



    public function export()
    {
        return Excel::download(new EstatusBDTExport, 'Estatus_BDT_Telmex_Julio_2024.xlsx');
    }


}

