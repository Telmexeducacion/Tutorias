<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Digital Telmex</title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo para la barra de navegación */
        .navbar-telmex {
            background-color: #0075c9; /* Azul Telmex */
        }

        .navbar-brand, .nav-link {
            color: white !important; /* Texto blanco en la barra de navegación */
        }

        .dropdown-menu {
            background-color: white; /* Fondo blanco para el menú desplegable */
            border: 1px solid #cccccc; /* Borde gris claro */
        }

        .dropdown-item {
            color: black !important; /* Texto negro para las opciones del menú */
        }

        .dropdown-item:hover {
            background-color: #f1f1f1; /* Fondo gris claro al pasar el ratón */
            color: black !important; /* Asegura que el texto siga siendo visible */
        }

        body {
            font-family: Arial, sans-serif;
        }

        h3, h4 {
            margin-bottom: 20px;
        }

        .table {
            text-align: center;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .text-right .btn-link {
            font-size: 18px;
            margin-left: 10px;
        }

        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-telmex">
        <div class="container">
            <a class="navbar-brand" href="#">Biblioteca Digital Telmex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://pluspng.com/img-png/user-png-icon-big-image-png-2240.png" width="50" height="50" alt="User Icon" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Perfil de usuario</a>
                            <a class="dropdown-item" href="#">Configuración</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Salir</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Resto del contenido de la página -->
    <div class="container mt-5">
        <div class="text-right mb-3">
            <!-- Additional navigation links can go here -->
        </div>
        <h3 class="text-center">{{$sede->nombreMatutino}} | Clave {{$sede->clavebdt}}</h3>
        <h4 class="text-center">Seguimiento de Internet</h4>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Línea</th>
                    <th>Ancho banda</th>
                    <th>Tecnología</th>
                    <th>GB Recibidos</th>
                    <th>GB Enviados</th>
                    <th>Semáforo</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sede->lineas as $linea)


              <tr>
                    <td> {{$linea->numero}}</td>
                    <td>{{$linea->anchobanda}} MB</td>

                    <td>{{$linea->tecnologia->nombre}}</td>


                    <td>{{$linea->recibidos($linea->id,'AGOSTO','2024')}}</td>
                    <td>{{$linea->enviados($linea->id,'AGOSTO','2024')}}</td>
                    <td>{{$linea->semaforo($linea->id,'AGOSTO','2024')}}</td>
                    <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reportModal" onclick="setLine('{{$linea->numero}}')">Reportar</button></td>
                </tr>

            -->
            @endforeach
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="aportaConectividad">Aporta Conectividad:</label>
                    <input type="text" class="form-control" id="aportaConectividad"  readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pagaConectividad">Paga Conectividad:</label>
                    <input type="text" class="form-control" id="pagaConectividad"  readonly>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gbRecibidos">Promedio Mensual GB recibidos:</label>
                    <input type="text" class="form-control" id="gbRecibidos" value="{{$sede->recibidos($sede->id)}}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gbEnviados">Promedio Mensual GB Enviados:</label>
                    <input type="text" class="form-control" id="gbEnviados" value="{{$sede->enviados($sede->id)}}" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="semaforoUso">Semáforo de uso:</label>
                    <input type="text" class="form-control" id="semaforoUso" value="{{$sede->semaforo($sede->id)}}"   readonly>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-block btn-secondary" data-toggle="modal" data-target="#FinalizarInternet" onclick="setLine('4865785474','4587584854')">Sin novedad</button>
        </div>
    </div>

    <!-- Modal Report -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Reportar Línea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="lineaInfinium">Línea Infinium</label>
                            <input type="text" class="form-control" id="lineaInfinium" readonly>
                        </div>
                        <div class="form-group">
                            <label for="motivo">Motivo</label>
                            <select class="form-control" id="motivo">
                                <option>Seleccione</option>
                                <option>Falla Internet</option>
                                <option>Falla Eléctrica</option>
                                <option>Módem Apagado</option>
                                <option>Sin Utilizar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comentarios">Comentarios</label>
                            <textarea class="form-control" id="comentarios" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Finalizar Internet -->
    <div class="modal fade" id="FinalizarInternet" tabindex="-1" aria-labelledby="FinalizarInternetLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="FinalizarInternetLabel">¡IMPORTANTE!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p><center><h3>¿Valido con el responsable de sitio que las líneas, tecnología y usabilidad sean correctas?</h3></center></p>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Línea</th>
                                    <th>Ancho banda</th>
                                    <th>Tecnología</th>
                                    <th>GB Recibidos</th>
                                    <th>GB Enviados</th>
                                    <th>Semáforo</th>
                                </tr>
                            </thead>
                            <tbody>


                                <!--
                                <tr>
                                    <td>78459875474</td>
                                    <td>12</td>
                                    <td>FTTH</td>
                                    <td>120.12</td>
                                    <td>56.45</td>
                                    <td>BAJO</td>
                                </tr>
                                <tr>
                                    <td>4865785474</td>
                                    <td>20</td>
                                    <td>FTTH</td>
                                    <td>220.12</td>
                                    <td>89.2</td>
                                    <td>BAJO</td>
                                </tr>
                            -->
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label for="comentarios">Comentarios</label>
                            <textarea class="form-control" id="comentarios" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a type="button" href="{{route('tutoria.uso',$sede->clavebdt)}}" class="btn btn-primary" >Guardar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        function setLine(line) {
            document.getElementById('lineaInfinium').value = line;
        }

        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
</body>
</html>
