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


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .edit-icon {
        cursor: pointer;
        margin-left: 10px;
    }

    .editable-input {
        border: none;
        background-color: transparent;
        pointer-events: none;
        width: 100px;
    }

    .editable-input:focus {
        outline: none;
        border-bottom: 1px solid black;
        background-color: white;
    }

    .card {
        padding: 20px;
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .editable-div {
        display: inline-flex;
        align-items: center;
    }

    .inline-label {
        margin-right: 10px;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Estatus Equipos</h5>
            <div class="form-group">
              <center>  <label>{{$sede->nombreMatutino}} | Clave {{$sede->clavebdt}}</label></center>
            </div>

            <!-- Equipo Entregado -->
            <div class="form-group">
                <h6>Equipo Entregado</h6>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="entregado-pc" class="inline-label">PC:</label>
                            <input type="text" class="editable-input" id="entregado-pc" value="0" readonly>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="entregado-laptop" class="inline-label">Laptop:</label>
                            <input type="text" class="editable-input" id="entregado-laptop" value="0" readonly>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="entregado-netbook" class="inline-label">Netbook:</label>
                            <input type="text" class="editable-input" id="entregado-netbook" value="0" readonly>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipo Funcional -->
            <div class="form-group">
                <h6>Equipo Funcional</h6>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="funcional-pc" class="inline-label">PC:</label>
                            <input type="text" class="editable-input" id="funcional-pc" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('funcional-pc')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="funcional-laptop" class="inline-label">Laptop:</label>
                            <input type="text" class="editable-input" id="funcional-laptop" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('funcional-laptop')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="funcional-netbook" class="inline-label">Netbook:</label>
                            <input type="text" class="editable-input" id="funcional-netbook" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('funcional-netbook')">&#9998;</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipo Dañado -->
            <div class="form-group">
                <h6>Equipo Dañado</h6>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="danado-pc" class="inline-label">PC:</label>
                            <input type="text" class="editable-input" id="danado-pc" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('danado-pc')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="danado-laptop" class="inline-label">Laptop:</label>
                            <input type="text" class="editable-input" id="danado-laptop" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('danado-laptop')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="danado-netbook" class="inline-label">Netbook:</label>
                            <input type="text" class="editable-input" id="danado-netbook" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('danado-netbook')">&#9998;</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Equipo Faltante -->
            <div class="form-group">
                <h6>Equipo Faltante</h6>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="faltante-pc" class="inline-label">PC:</label>
                            <input type="text" class="editable-input" id="faltante-pc" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('faltante-pc')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="faltante-laptop" class="inline-label">Laptop:</label>
                            <input type="text" class="editable-input" id="faltante-laptop" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('faltante-laptop')">&#9998;</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="editable-div">
                            <label for="faltante-netbook" class="inline-label">Netbook:</label>
                            <input type="text" class="editable-input" id="faltante-netbook" value="0" readonly>
                            <span class="edit-icon" onclick="toggleEdit('faltante-netbook')">&#9998;</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-group btn-container">
                <button class="btn btn-primary">Guardar Cambios</button>
                <button class="btn btn-secondary">Continuar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleEdit(elementId) {
        var element = document.getElementById(elementId);
        if (element) {
            if (element.hasAttribute('readonly')) {
                element.removeAttribute('readonly');
                element.classList.remove('editable-input');
                element.focus();
            } else {
                element.setAttribute('readonly', 'readonly');
                element.classList.add('editable-input');
            }
        }
    }
</script>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>


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


    });
</script>
</body>
</html>
