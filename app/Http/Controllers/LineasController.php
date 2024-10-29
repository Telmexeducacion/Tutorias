<?php

namespace App\Http\Controllers;
use App\Medicion ;
use App\semaforo;
use App\Linea;
use App\Promediointernet;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;
use Carbon\Carbon;
use League\Csv\Writer;
use Illuminate\Support\Facades\Storage;



class LineasController extends Controller
{

    public function FormularioLineas(){
        return view('Administrador.Lineas.carga');
    }

    public function FormularioPromedio(){
        return view('Administrador.Lineas.promedio');
    }

    public function Reporte(){
        $sitio = Promediointernet::orderByRaw('CAST(recibidos AS DECIMAL) desc')->get();

        return view('ReporteInternet',compact('sitio'));
    }

    public function PdfInternet() {
        $sitio = Promediointernet::orderByRaw('CAST(recibidos AS DECIMAL) desc')->get();

        // Renderiza la vista con los datos y convierte a HTML
        $html = view('Reportes.Internet', compact('sitio'))->render(); // Asegúrate de usar 'compact' para pasar el array correctamente

        // Configura y genera el PDF en orientación Landscape (horizontal)
        $html2pdf = new Html2Pdf('L', 'A4', 'es', true, 'UTF-8', array(3, 2, 3, 2)); // Cambiado 'P' por 'L'
        $html2pdf->writeHTML($html);

        // Obtener el contenido del PDF
        return $html2pdf->output('Internet.pdf');
    }



    public function ImportarLinea(Request $request)
    {
        $file = $request->file('file');
        $path = $file->getRealPath();

         // Ensure the file is read with the correct encoding
          \Config::set('excel.imports.heading', 'utf-8');

        // Read the file and process it in chunks
        Excel::import(new class implements \Maatwebsite\Excel\Concerns\ToModel, \Maatwebsite\Excel\Concerns\WithHeadingRow, \Maatwebsite\Excel\Concerns\WithChunkReading {
            public function model(array $row)
            {
                // Helper function to parse date or return null if not valid
                $parseDate = function ($date) {
                    try {
                        return Carbon::parse($date);
                    } catch (\Exception $e) {
                        return null;  // or return a default date: return Carbon::now();
                    }
                };

                $linea =  function ($data){
                    try{
                        $numero = Linea::where('numero',$data)->first();
                        return $numero->id;
                    }catch (\Exception $e) {
                        return null;
                    }
                };

                $semaforo = function ($data){
                    try{
                        $semaforo = semaforo::where('estatus',$data)->first();
                        return $semaforo->id;
                    }catch(\Exception $e){
                        $id =7;
                        return $id;
                    }
                };

                return new Medicion([
                    'id_linea' => $row['id_linea'] ??'',
                    'id_semaforo' => $row['id_semaforo']??'',
                    'enviados' => $row['enviados'] ??'',
                    'recibidos' => $row['recibidos'] ??'',
                    'anio' => '2024',
                    'mes' => 'AGOSTO',
                    'created_at' => $parseDate($row['created_at']) ?? now(),
                    'updated_at' => $parseDate($row['updated_at']) ?? now(),
                ]);
            }

            public function chunkSize(): int
            {
                return 1000;
            }
        }, $path);

        return back()->with('success', 'All good!');
    }



    public function ImportarPromedio(Request $request)
    {
        $file = $request->file('file');
        $path = $file->getRealPath();

         // Ensure the file is read with the correct encoding
          \Config::set('excel.imports.heading', 'utf-8');

        // Read the file and process it in chunks
        Excel::import(new class implements \Maatwebsite\Excel\Concerns\ToModel, \Maatwebsite\Excel\Concerns\WithHeadingRow, \Maatwebsite\Excel\Concerns\WithChunkReading {
            public function model(array $row)
            {
                // Helper function to parse date or return null if not valid
                $parseDate = function ($date) {
                    try {
                        return Carbon::parse($date);
                    } catch (\Exception $e) {
                        return null;  // or return a default date: return Carbon::now();
                    }
                };

                $linea =  function ($data){
                    try{
                        $numero = Linea::where('numero',$data)->first();
                        return $numero->id;
                    }catch (\Exception $e) {
                        return null;
                    }
                };

                $semaforo = function ($data){
                    try{
                        $semaforo = semaforo::where('estatus',$data)->first();
                        return $semaforo->id;
                    }catch(\Exception $e){
                        $id =7;
                        return $id;
                    }
                };

                return new Promediointernet([
                    'id_biblioteca' => $row['id_biblioteca'] ??'',
                    'id_semaforo' => $row['id_semaforo']??'',
                    'enviado' => $row['enviado'] ??'',
                    'recibidos' => $row['recibidos'] ??'',
                    'anio' => '2024',
                    'created_at' => $parseDate($row['created_at']) ?? now(),
                    'updated_at' => $parseDate($row['updated_at']) ?? now(),
                ]);
            }

            public function chunkSize(): int
            {
                return 1000;
            }
        }, $path);

        return back()->with('success', 'All good!');
    }





public function ImportarLineas(Request $request)
{
    $file = $request->file('file');
    $path = $file->getRealPath();

    // Preparar el archivo CSV para escribir los datos
    $csv = Writer::createFromString(''); // Iniciar el CSV en memoria
    $csv->insertOne(['id_linea', 'id_semaforo', 'recibidos', 'enviados', 'anio', 'mes']); // Encabezados

    // Proceso de importación usando la clase anónima
    Excel::import(new class($csv) implements \Maatwebsite\Excel\Concerns\ToModel,
                                 \Maatwebsite\Excel\Concerns\WithHeadingRow,
                                 \Maatwebsite\Excel\Concerns\WithChunkReading {

        protected $csv;

        public function __construct($csv)
        {
            $this->csv = $csv;
        }

        public function model(array $row)
        {
            // Obtener los datos formateados
            $idLinea = $this->getLineaId($row['línea infinitum']);
            $idSemaforo = $this->getSemaforoId($row['consumo_dn_categoria']);
            $recibidos = $row['consumo_dn_4s'] ?? 0;
            $enviados = $row['consumo_up_4s_dwh'] ?? 0;
            $anio = '2024';
            $mes = 'SEPTIEMBRE';

            // Insertar los datos en el archivo CSV
            $this->csv->insertOne([
                $idLinea,
                $idSemaforo,
                $recibidos,
                $enviados,
                $anio,
                $mes
            ]);
        }

        protected function getLineaId($lineaInfinitum)
        {
            $linea = Linea::where('numero', $lineaInfinitum)->first();
            return $linea ? $linea->id : null;
        }

        protected function getSemaforoId($categoria)
        {
            if (!$categoria) {
                return 7;
            }
            $semaforo = Semaforo::where('estatus', $categoria)->first();
            return $semaforo ? $semaforo->id : 7;
        }

        public function chunkSize(): int
        {
            return 1000;
        }

        public function headingRow(): int
        {
            return 1;
        }
    }, $path);

    // Nombre del archivo CSV
    $filename = 'mediciones_' . now()->format('Ymd_His') . '.csv';

    // Guardar el CSV en el almacenamiento temporal de Laravel
    Storage::put('public/' . $filename, $csv->getContent());

    // Descargar el archivo CSV
    return response()->download(storage_path('app/public/' . $filename))->deleteFileAfterSend(true);
}










}









