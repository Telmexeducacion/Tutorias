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
    <div class="container mt-4">
        <!-- Additional content here -->
    </div>

    <div class="container mt-4">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Estatus</th>
                    <th>Contactar</th>
                    <th>Actualizar</th>
                    <th>Ficha</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($bibliotecas as $sede)
                <tr>
                    <td>{{$sede->clavebdt}}</td>
                    <td>{{$sede->nombreMatutino}}</td>
                    <td><a class="contacto" href="#" data-id="{{$sede->id}}" data-toggle="modal" data-target="#contactoModal"> {{$sede->UltimoContacto($sede->id)}} </a></td>
                    <td>{{$sede->estatus}}</td>
                    <td><a class="btn btn-primary llamar-btn" href="#" data-id="{{$sede->id}}" data-toggle="modal" data-target="#contactModal">Llamar</a></td>
                    <td><a class="btn btn-warning" href="{{route('contactos.form.update',$sede->clavebdt)}}">Actualizar</a></td>
                    <td> <a class="btn" href="{{route('ficha.externa',$sede->clavebdt)}}" target="_blank" >Descargar</a></td>

                </tr>
            @endforeach

                <!-- Más filas aquí -->
            </tbody>
        </table>
    </div>





    <!-- Modal  LLAMAR-->
                <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactModalLabel"><span id="nombre"></span> | CLAVE <span id="claveSitio"></span> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <table id="contacto" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Cargo</th>
                                            <th>Telefono</th>
                                            <th>Celular</th>
                                            <th>Correo</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td><span id="nombreResponsable"></span></td>
                                            <td><span id="cargoResponsable"></span></td>
                                            <td><span id="celularResponsable"></td>
                                            <td><span id="telefonoResponsable"></td>
                                            <td><span id="correoResponsable"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span id="nombreEncargado"></span></td>
                                            <td><span id="cargoEncargado"></span></td>
                                            <td><span id="celularEncargado"></td>
                                            <td><span id="cargoEncargado"></span></td>
                                            <td> <span id="correoEncargado"></span></td>
                                        </tr>


                                        <!-- Más filas aquí -->
                                    </tbody>
                                </table>

                                <!-- Aquí se cargarán los datos del contacto -->




                            </div>
                            <div class="modal-footer">
                                <h3>¿Respondio la llamada?</h3> <br>



                                <button type="button" class="btn btn-secondary" id="confirmNoButton" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-success" id="confirmYesButton" data-dismiss="modal">Si</button>


                            </div>
                        </div>
                    </div>
                </div>






      <!-- Modal Contactos -->
      <div class="modal fade" id="contactoModal" tabindex="-1" role="dialog" aria-labelledby="contactoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactoModalLabel">Últimos mensajes de sitio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="exampleTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tutor</th>
                                <th>Estatus</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span id="fecha"></span></td>
                                <td><span id="tutor"></span></td>
                                <td><span id="estado"></span></td>
                                <td><span id="comentarios"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>






    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <!-- Include Bootstrap Bundle JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        var clave = "";
        var llamadaEfectiva = 0;
        var llamadaNoEfectiva = 0;
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": true,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false
                        });
                    });


     document.getElementById('confirmYesButton').addEventListener('click', function() {
        // Obtener el valor de claveSitio
        var claveSitio = document.getElementById('claveSitio').innerText.trim();

        // Redirigir a la ruta con la claveSitio
        var url = "{{ route('panel.tutoria', ['claveSitio' => ':claveSitio']) }}";
        url = url.replace(':claveSitio', claveSitio);

        window.location.href = url;
    });


    document.getElementById('confirmNoButton').addEventListener('click', function() {
        // Obtener el valor de claveSitio
        var claveSitio = document.getElementById('claveSitio').innerText.trim();

        // Redirigir a la ruta con la claveSitio
        var url = "{{ route('llamada.buzon', ['claveSitio' => ':claveSitio']) }}";
        url = url.replace(':claveSitio', claveSitio);

        window.location.href = url;
    });



                    $('.llamar-btn').on('click', function() {
                    var bibliotecaId = $(this).data('id');
                    var url = '{{route('getContactos', ['clave' => ''])}}' + bibliotecaId;


                // Llamar a la función de AJAX para obtener los datos
                $.ajax({
                    url: '{{route('getContactos', ['clave' => ''])}}' + bibliotecaId,
                    method: 'GET',

                    success: function(data) {
                                    // Llenar los campos del modal con los datos recibidos


                        $('#nombreResponsable').text(data.nombre_responsable || 'N/A');
                        $('#cargoResponsable').text(data.cargo_responsable || 'N/A');
                        $('#telefonoResponsable').text(data.telefono_responsable || 'N/A');
                        $('#celularResponsable').text(data.celular_responsable || 'N/A');
                        $('#correoResponsable').text(data.correo_responsable || 'N/A');

                        $('#nombreEncargado').text(data.nombre_encargado || 'N/A');
                        $('#cargoEncargado').text(data.cargo_encargado || 'N/A');
                        $('#telefonoEncargado').text(data.telefono_encargado || 'N/A');
                        $('#celularEncargado').text(data.celular_encargado || 'N/A');
                        $('#correoEncargado').text(data.correo_encargado || 'N/A');
                        $('#nombre').text(data.nombre || 'Sin comentarios');
                        $('#claveSitio').text(data.claveSitio || 'Sin comentarios');
                        clave = text(data.claveSitio);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al obtener los datos de contacto:", error);
                        alert("Hubo un error al cargar los datos de contacto. Por favor, intenta de nuevo.", error);
                    }
                });
            });





    </script>

    <script>


                $('.contacto').on('click', function() {
                        var bibliotecaId = $(this).data('id');
                        var url = '{{route('getHistorico', ['clave' => ''])}}' + bibliotecaId;



                            $.ajax({
                        url: '{{route('getHistorico', ['clave' => ''])}}' + bibliotecaId,
                        method: 'GET',

                        success: function(data) {
                                        // Llenar los campos del modal con los datos recibidos


                           $('#fecha').text(data.fecha || 'N/A');
                           $('#tutor').text(data.tutor || 'N/A');
                           $('#estado').text(data.estado || 'N/A');
                           $('#comentarios').text(data.comentarios || 'N/A');

                        },
                        error: function(xhr, status, error) {
                            console.error("Error al obtener los datos de contacto:", error);
                            alert( error);
                        }
                    });



                });

                    // Llamar a la función de AJAX para obtener los datos



    </script>






 </body>
 </html>



