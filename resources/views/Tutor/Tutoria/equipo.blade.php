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

    <div class="container mt-4">
        <h2>Estatus Equipos</h2>
        <table class="table table-bordered" id="equiposTable">
            <thead>
                <tr>
                    <th>Dispositivo</th>
                    <th>Inicial</th>
                    <th>Funcional</th>
                    <th>Dañado</th>
                    <th>Robado</th>
                    <th>Observaciones</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PC</td>
                    <td>10</td>
                    <td>8</td>
                    <td>1</td>
                    <td>1</td>
                    <td>Equipos lentos pero navegan en Internet</td>
                    <td><button class="btn btn-primary comentario-btn" data-id="1">Comentario</button></td>
                </tr>
                <tr>
                    <td>Laptop</td>
                    <td>10</td>
                    <td>9</td>
                    <td>1</td>
                    <td>0</td>
                    <td>Solo funcionan conectadas por cable</td>
                    <td><button class="btn btn-primary comentario-btn" data-id="2">Comentario</button></td>
                </tr>
                <tr>
                    <td>Netbook</td>
                    <td>15</td>
                    <td>9</td>
                    <td>3</td>
                    <td>3</td>
                    <td>Se encuentran un poco lentas</td>
                    <td><button class="btn btn-primary comentario-btn" data-id="3">Comentario</button></td>
                </tr>
                <tr>
                    <td>XO</td>
                    <td>30</td>
                    <td>0</td>
                    <td>30</td>
                    <td>0</td>
                    <td>Fuera de servicio</td>
                    <td><button class="btn btn-primary comentario-btn" data-id="4">Comentario</button></td>
                </tr>
                <tr>
                    <td>Classmate</td>
                    <td>10</td>
                    <td>0</td>
                    <td>10</td>
                    <td>0</td>
                    <td>Fuera de servicio</td>
                    <td><button class="btn btn-primary comentario-btn" data-id="5">Comentario</button></td>
                </tr>
            </tbody>
        </table>

        <h3>Detalle del Equipo</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Equipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                    <th>Resa</th>
                    <th>Estatus</th>
                    <th>Histórico</th>
                    <th>Comentarios</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PC</td>
                    <td>LANIX</td>
                    <td>TITAN</td>
                    <td>4040</td>
                    <td>1005849988</td>
                    <td>Funcional</td>
                    <td><button class="btn btn-info ver-btn" data-id="2">Ver</button></td>
                    <td><button class="btn btn-success agregar-btn" data-id="1">Agregar</button></td>
                </tr>
                <!-- Agregar más filas según sea necesario -->
            </tbody>
        </table>
    </div>

    <!-- Modal Comentario -->
    <div class="modal fade" id="comentarioModal" tabindex="-1" role="dialog" aria-labelledby="comentarioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comentarioModalLabel">Agregar Comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="comentarioForm">
                        <div class="form-group">
                            <label for="comentario">Comentario:</label>
                            <textarea class="form-control" id="comentario" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="comentarioId">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ver -->
    <div class="modal fade" id="verModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verModalLabel">Detalle del Equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes mostrar los detalles del equipo -->
                    <p>Detalles del equipo seleccionado con ID: <span id="verId"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarModalLabel">Agregar Detalle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="agregarForm">
                        <div class="form-group">
                            <label for="detalle">Detalle:</label>
                            <textarea class="form-control" id="detalle" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="agregarId">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </form>
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
        $(document).ready(function() {
            $('#equiposTable').DataTable();

            // Evento para mostrar el modal de Comentario
            $('.comentario-btn').on('click', function() {
                const id = $(this).data('id');
                $('#comentarioId').val(id);
                $('#comentarioModal').modal('show');
            });

            // Evento para mostrar el modal Ver
            $('.ver-btn').on('click', function() {
                const id = $(this).data('id');
                $('#verId').text(id);
                $('#verModal').modal('show');
            });

            // Evento para mostrar el modal de Agregar
            $('.agregar-btn').on('click', function() {
                const id = $(this).data('id');
                $('#agregarId').val(id);
                $('#agregarModal').modal('show');
            });

            // Manejo de envío de formularios (puedes ajustar esto según sea necesario)
            $('#comentarioForm').submit(function(event) {
                event.preventDefault();
                const comentario = $('#comentario').val();
                const id = $('#comentarioId').val();
                // Aquí iría la lógica para guardar el comentario
                alert('Comentario guardado para el ID ' + id + ': ' + comentario);
                $('#comentarioModal').modal('hide');
            });

            $('#agregarForm').submit(function(event) {
                event.preventDefault();
                const detalle = $('#detalle').val();
                const id = $('#agregarId').val();
                // Aquí iría la lógica para agregar el detalle
                alert('Detalle agregado para el ID ' + id + ': ' + detalle);
                $('#agregarModal').modal('hide');
            });
        });
    </script>
</body>
</html>
