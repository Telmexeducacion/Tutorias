<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;

use App\Biblioteca;
use Carbon\Carbon;
use App\Dependencia;
use App\User;
use App\Contacto;
use App\mobiliario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DatosController extends Controller
{
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

                    return new mobiliario([
                    'id_biblioteca' => $row['id_biblioteca'] ??'',
                    'tipo' => $row['tipo'] ?? '',
                    'cantidad' => $row['cantidad'] ?? '',
                    'funcional' => $row['funcional'] ?? '',
                    'dañado' => $row['dañado'] ?? '',
                    'faltante' => $row['faltante'] ?? '',
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




}

