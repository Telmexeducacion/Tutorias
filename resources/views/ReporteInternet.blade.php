<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluyendo los estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Reporte Internet</h1>

        <table id="reporteTabla" class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">NOMBRE DE LA BDT MATUTINO</th>
                    <th scope="col">ESTADO</th>

                    <th scope="col">Recibidos Ene-Ago</th>
                    <th scope="col">Semáforo de Uso</th>
                    <th scope="col">Recibidos Agosto</th>
                    <th scope="col">Enviados Agosto</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes agregar las filas dinámicamente -->
                @foreach ($sitio as $biblioteca )
                <tr>

                    <td>{{$biblioteca->biblioteca->nombreMatutino}}</td>
                   <td>{{$biblioteca->biblioteca->estado}}</td>
                    <!-- <td>{{$biblioteca->biblioteca->municipio}}</td> -->

                    <td>{{$biblioteca->recibidos}}</td>
                    <td>{{$biblioteca->semaforo->estatus}}</td>
                    <td>{{$biblioteca->enviados($biblioteca->biblioteca->id)}}</td>
                    <td>{{$biblioteca->recibidos($biblioteca->biblioteca->id)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Scripts necesarios -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Inicialización de DataTables con idioma español -->
    <script>
        $(document).ready(function() {
            $('#reporteTabla').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"
                }
            });
        });
    </script>
</body>
</html>
