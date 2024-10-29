<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;

use App\Biblioteca;
use Carbon\Carbon;
use App\Dependencia;
use App\User;
use App\Contacto;
use App\mobiliario;
use App\Edificio;
use App\Linea;
use App\tecnologia;
use App\semaforo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class DatosController extends Controller
{
    public function Registros($data){
        $registros = $data;

    }
    public function FormularioBiblioteca(){
        return view('Administrador.Carga.biblioteca');
    }


    public function FormularioContactos(){
        return view('Administrador.Carga.contactos');
    }

    public function Formulariousuarios(){
        return view('Administrador.Carga.usuarios');
    }

    public function FormularioInfo(){
        return view('Administrador.Carga.info');
    }

    public function FormularioMobiliario(){
        return view('Administrador.Carga.mobiliario');
    }

    public function FormularioEdificio(){
        return view('Administrador.Carga.edificio');
    }

    public function FormularioTecnologia(){
        return view('Administrador.Carga.tecnologias');
    }

    public function FomularioLinea(){
        return view('Administrador.Carga.lineas');
    }


    public function FormSemaforo(){
        return view('Administrador.Carga.semaforo');
    }


    public function FormularioMilitar(){
        return view('Administrador.Carga.militar');
    }



    public function ImportarBiblioteca(Request $request)
    {
        {
            $file = $request->file('file');
            $path = $file->getRealPath();

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

                    return new Biblioteca([
                        'numero' => $row['numero'] ??'',
                   'clavebdt' => $row['clavebdt'] ?? '',
                    'iniciativa' => $row['iniciativa'] ?? '',
                    'pertenencia' => $row['pertenencia'] ?? '',
                    'escolarizado' => $row['escolarizado'] ?? '',
                    'actividadPublica' => $row['actividadpublica'] ?? '',
                    'servicio' => $row['servicio'] ?? '',
                    'claveMatutino' => $row['clavematutino'] ?? '',
                    'nombreMatutino' => $row['nombrematutino'] ?? '',
                    'claveVespertino' => $row['clavevespertino'] ?? '',
                    'nombreVespertino' => $row['nombrevespertino'] ?? '',
                    'estado' => $row['estado'] ?? '',
                    'municipio' => $row['municipio'] ?? '',
                    'localidad' => $row['localidad'] ?? '',
                    'domicilio' => $row['domicilio'] ?? '',
                    'codPostal' => $row['codpostal'] ?? '',  // Ensure codPostal is not null
                    'lat' => $row['lat'] ?? 0,
                    'long' => $row['long'] ?? 0,
                    'personal' => $row['personal'] ?? '',
                    'nomina' => $row['nomina'] ?? '',
                    'maxParticipantes' => $row['maxparticipantes'] ?? 0,
                    'costoHabilitación' => $row['costohabilitacion'] ?? 0,
                    'fechaEntrega' => $row['fechaentrega'],
                    'fechaInicioConvenio' => $row['fechainicioconvenio'],
                    'fechaTerminoConvenio' => $row['fechaterminoconvenio'],
                    'convenioColaboracion' => $row['conveniocolaboracion'] ?? '',
                    'convenioVencido' => $row['conveniovencido'] ?? '',
                    'sitiacionEquipo' => $row['sitiacionequipo'] ?? '',
                    'dependencia' => $row['dependencia'] ?? '',
                    'estatus' => $row['estatus'] ?? '',
                    'estatus_temporal' => $row['estatus_temporal'] ?? '',
                    'tutor_id' => $row['tutor_id'] ?? 1,
                    ]);
                }

                public function chunkSize(): int
                {
                    return 1000;
                }
            }, $path);

            return back()->with('success', 'All good!');
        }
}



public function ImportarContactos(Request $request)
{
    {
        $file = $request->file('file');
        $path = $file->getRealPath();

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

                return new Dependencia([
                'id_biblioteca' => $row['id_biblioteca'] ??'',
               'nombre_responsable' => $row['nombre_responsable'] ?? '',
                'cargo_responsable' => $row['cargo_responsable'] ?? '',
                'telefono_responsable' => $row['telefono_responsable'] ?? '',
                'celular_responsable' => $row['celular_responsable'] ?? '',
                'correo_responsable' => $row['correo_responsable'] ?? '',
                'nombre_encargado' => $row['nombre_encargado'] ?? '',
                'cargo_encargado' => $row['cargo_encargado'] ?? '',
                'telefono_encargado' => $row['telefono_encargado'] ?? '',
                'celular_encargado' => $row['celular_encargado'] ?? '',
                'correo_encargado' => $row['correo_encargado'] ?? '',
                'comentarios' => $row['comentarios'] ?? '',
                'created_at' => $row['created_at'] ?? '',
                'updated_at' => $row['updated_at'] ?? '',

                ]);
            }

            public function chunkSize(): int
            {
                return 1000;
            }
        }, $path);

        return back()->with('success', 'All good!');
    }
}






    public function ImportarUsuarios(Request $request)
    {
        {
            $file = $request->file('file');
            $path = $file->getRealPath();

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

                    return new User([
                    'name' => $row['name'] ??'',
                    'email' => $row['email'] ?? '',
                    'telefono' => $row['telefono'] ?? '',
                    'celular' => $row['celular'] ?? '',
                    'password' =>  Hash::make($row['password'] ?? ''),
                    'casaTutora' => $row['casaTutora'] ?? '',
                    'nivel' => $row['nivel'] ?? '',
                    'created_at' => $row['created_at'] ?? '',
                    'updated_at' => $row['updated_at'] ?? '',


                    ]);
                }

                public function chunkSize(): int
                {
                    return 1000;
                }
            }, $path);

            return back()->with('success', 'All good!');
        }
    }

    public function ImportarInfo(Request $request)
    {
        {
            $file = $request->file('file');
            $path = $file->getRealPath();

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

                    return new Contacto([
                    'id_biblioteca' => $row['id_biblioteca'] ??'',
                    'id_tutor' => $row['id_tutor'] ?? '',
                    'estado' => $row['estado'] ?? '',
                    'comentarios' => $row['comentarios'] ?? '',
                    'created_at' => $row['created_at'] ?? '',
                    'updated_at' => $row['updated_at'] ?? '',


                    ]);
                }

                public function chunkSize(): int
                {
                    return 1000;
                }
            }, $path);

            return back()->with('success', 'All good!');
        }
    }








    public function ImportarMobiliario(Request $request)
    {
        $file = $request->file('file');
        $path = $file->getRealPath();

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

                return new Mobiliario([
                    'id_biblioteca' => $row['id_biblioteca'] ?? null,
                    'tipo' => $row['tipo'] ?? '',
                    'cantidad' => isset($row['cantidad']) ? intval($row['cantidad']) : 0,
                    'funcional' => isset($row['funcional']) ? intval($row['funcional']) : 0,
                    'dañado' => isset($row['dañado']) ? intval($row['dañado']) : 0,
                    'faltante' => isset($row['faltante']) ? intval($row['faltante']) : 0,
                    'observaciones' => $row['observaciones'] ?? '',
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



    public function ImportarEdificio(Request $request)
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

                return new Edificio([
                    'id_biblioteca' => $row['id_biblioteca'] ??'',
                    'señalizacion' => $row['señalizacion'] ?? '',
                    'edificio' => $row['edificio'] ?? '',
                    'pintura_interior' => $row['pintura_interior'] ?? '',
                    'pintura_exterior' => $row['pintura_exterior'] ?? '',
                    'electricidad' => $row['electricidad'] ?? '',
                    'mobiliario' => $row['mobiliario'] ?? '',
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

                return new Linea([
                    'id_biblioteca' => $row['id_biblioteca'] ??'',
                    'id_tecnologia' => $row['id_tecnologia'] ?? '',
                    'numero' => $row['numero'] ?? '',
                    'anchobanda' => $row['anchobanda'] ?? '',
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





    public function ImportarMilitar(Request $request)
    {

        $file = $request->file('file');
        $path = $file->getRealPath();

         // Ensure the file is read with the correct encoding
          \Config::set('excel.imports.heading', 'utf-8');


            // Initialize an array to store the processed data


    try {

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

               //Codigo para excel lectura
               $data = [];
               $registros = [];
               foreach ($data as $row) {
                   $fecha = $row['Fecha'];
                   $region_militar = $row['Región Militar'];
                   $zona_militar = $row['Zona Militar'];
                   $correo_electronico = $row['Correo Electrónico'];

                   $key = $region_militar . '-' . $zona_militar . '-' . $fecha;
                   if (!isset($registros[$key])) {
                       $registros[$key] = [
                           'Región Militar' => $region_militar,
                           'Zona Militar' => $zona_militar,
                           'Fecha' => $fecha,
                           'count' => 0
                       ];
                   }
                   $registros[$key]['count']++;
               }


                 // Convert the associative array to a collection
            $registros = collect(array_values($registros));










            }

            public function chunkSize(): int
            {
                return 1000;
            }
        }, $path);

        return view('Administrador.Carga.dinamica',compact('registros'));

    } catch (Exception $e) {
        return back()->with('error', 'Error al leer el archivo de Excel: ' . $e->getMessage());
    }

    }






    public function ImportarTecnologia(Request $request)
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

                return new tecnologia([
                    'nombre' => $row['nombre'] ??'',
                    'detalle' => $row['detalle'] ??'',
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



    public function importSemaforo(Request $request)
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

                return new semaforo([
                    'estatus' => $row['estatus'] ??'',
                    'lim_bajo' => $row['lim_bajo'] ??'',
                    'lim_alto' => $row['lim_alto'] ??'',
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














}

