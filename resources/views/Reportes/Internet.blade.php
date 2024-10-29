<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Medición de Internet</title>
</head>
<body>
    <div style="margin: 20px;">
        <h3 style="text-align: center; font-size: 14px;">MEDICIONES DE INTERNET <br>
            PROMEDIO DE USO 2024</h3>
        <table style="width: 100%; border-collapse: collapse; font-size: 10px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 50px;">NÚMERO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 150px; word-wrap: break-word; white-space: normal;">NOMBRE DE LA BDT MATUTINO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 80px;">ESTADO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 80px;">MUNICIPIO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 100px; text-align: center;">TECNOLOGÍA</th>
                    <th style="border: 1px solid #ccc; padding: 5px; max-width: 100px; text-align: center;">EQUIPO <br> FUNCIONAL </th>
                    <th style="border: 1px solid #ccc; padding: 5px; background-color: #4CAF50; color: white; max-width: 100px; text-align: center;">GB RECIBIDOS <br> ENE-JUN</th>

                    <th style="border: 1px solid #ccc; padding: 5px; background-color: #4CAF50; color: white; max-width: 100px; text-align: center;">SEMÁFORO <br> DE USO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; background-color: #4CAF50; color: white; max-width: 100px; text-align: center;">GB RECIBIDOS <br> JUNIO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; background-color: #4CAF50; color: white; max-width: 100px; text-align: center;">GB ENVIADOS<br> JUNIO</th>
                    <th style="border: 1px solid #ccc; padding: 5px; background-color: #A52A2A; color: white; max-width: 150px; text-align: center;">OBSERVACIONES</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($sitio as $biblioteca)

                <tr>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;"> {{$biblioteca->biblioteca->id}}</td>
                    <td style="border: 1px solid #ccc; padding: 5px; word-wrap: break-word; white-space: normal;"></td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;"> {{$biblioteca->biblioteca->estado}}</td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">{{$biblioteca->biblioteca->municipio}} </td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">{{ implode(', ', $biblioteca->tecnologias($biblioteca->biblioteca->id)) }}</td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">  </td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">{{$biblioteca->recibidos}}  </td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;"> {{$biblioteca->semaforo->estatus}}</td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">{{$biblioteca->enviados($biblioteca->biblioteca->id)}} </td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;">{{$biblioteca->recibidos($biblioteca->biblioteca->id)}}</td>
                    <td style="border: 1px solid #ccc; padding: 5px; text-align: center;"></td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
