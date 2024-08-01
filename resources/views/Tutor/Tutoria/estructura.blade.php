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
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .container {
        margin-top: 20px;
    }

    .card {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-inline .form-group {
        margin-right: 20px;
    }

    .table thead th {
        vertical-align: middle;
    }

    .edit-icon {
        cursor: pointer;
    }

    .editable-input {
        border: none;
        background-color: transparent;
        pointer-events: none;
    }

    .editable-input:focus {
        outline: none;
        border-bottom: 1px solid black;
        background-color: white;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Infraestructura y Señalética</h5>
            <div class="form-group">
                <label> {{$sede->nombreMatutino}} | Clave {{$sede->clavebdt}}</label>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kit-senalizacion">Kit Señalización</label>
                        <select id="kit-senalizacion" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Completo">Completo</option>
                            <option value="Incompleto">Incompleto</option>
                            <option value="Sin Kit">Sin Kit</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="estatus-edificio">Estatus Edificio</label>
                        <select id="estatus-edificio" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Dañado">Dañado</option>
                            <option value="Funcional">Funcional</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pintura-interior">Pintura Interior</label>
                        <select id="pintura-interior" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Buen estado">Buen estado</option>
                            <option value="Desgastado">Desgastado</option>
                            <option value="Sin imagen Institucional">Sin imagen Institucional</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pintura-exterior">Pintura Exterior</label>
                        <select id="pintura-exterior" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Buen estado">Buen estado</option>
                            <option value="Desgastado">Desgastado</option>
                            <option value="Sin imagen Institucional">Sin imagen Institucional</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="electricidad">Electricidad</label>
                        <select id="electricidad" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Funcional">Funcional</option>
                            <option value="Dañado">Dañado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobiliario">Mobiliario</label>
                        <select id="mobiliario" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                            <option value="Funcional">Funcional</option>
                            <option value="Dañado">Dañado</option>
                            <option value="En Mantenimiento">En Mantenimiento</option>
                        </select>
                    </div>
                </div>
            </form>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Funcional</th>
                        <th>Dañado</th>
                        <th>Faltante</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sede->mobiliarios as $equipo )
                        <tr>
                            <td>{{$equipo->tipo}}</td>
                            <td>{{$equipo->cantidad}}</td>
                            <td>{{$equipo->funcional}}</td>
                            <td>{{$equipo->dañado}}</td>
                            <td>{{$equipo->faltante}}</td>
                            <td><button class="btn btn-primary btn-sm">Actualizar</button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Actualizar -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Valores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control" id="tipo" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" disabled id="cantidad">
                    </div>
                    <div class="form-group">
                        <label for="funcional">Funcional</label>
                        <input type="number" class="form-control" id="funcional">
                    </div>
                    <div class="form-group">
                        <label for="danado">Dañado</label>
                        <input type="number" class="form-control" id="danado">
                    </div>
                    <div class="form-group">
                        <label for="faltante">Faltante</label>
                        <input type="number" class="form-control" id="faltante">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Guardar Cambios</button>
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

<script>
    $(document).ready(function() {
        // Inicializar DataTable
        $('.table').DataTable();

        // Evento de clic en el botón "Actualizar"
        $('.btn-primary').on('click', function() {
            // Obtener la fila
            var $row = $(this).closest('tr');
            var tipo = $row.find('td').eq(0).text();
            var cantidad = $row.find('td').eq(1).text();
            var funcional = $row.find('td').eq(2).text();
            var danado = $row.find('td').eq(3).text();
            var faltante = $row.find('td').eq(4).text();

            // Llenar el modal con los valores actuales
            $('#tipo').val(tipo);
            $('#cantidad').val(cantidad);
            $('#funcional').val(funcional);
            $('#danado').val(danado);
            $('#faltante').val(faltante);

            // Mostrar el modal
            $('#updateModal').modal('show');
        });

        // Guardar los cambios
        $('#saveChanges').on('click', function() {
            // Obtener los valores del formulario
            var tipo = $('#tipo').val();
            var cantidad = $('#cantidad').val();
            var funcional = $('#funcional').val();
            var danado = $('#danado').val();
            var faltante = $('#faltante').val();

            // Encontrar la fila correspondiente y actualizar los valores
            var $row = $('.table').find('tr:contains("' + tipo + '")');
            $row.find('td').eq(1).text(cantidad);
            $row.find('td').eq(2).text(funcional);
            $row.find('td').eq(3).text(danado);
            $row.find('td').eq(4).text(faltante);

            // Cerrar el modal
            $('#updateModal').modal('hide');
        });
    });
</script>
</body>
</html>
