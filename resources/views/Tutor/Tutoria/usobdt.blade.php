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
        .edit-icon {
            cursor: pointer;
            margin-left: 10px;
        }

        .editable-input {
            border: none;
            background-color: transparent;
            pointer-events: none;
            width: auto;
            display: inline-block;
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
            margin-bottom: 15px;
        }

        .editable-div {
            display: inline-flex;
            align-items: center;
        }

        .inline-label {
            margin-right: 10px;
        }
    </style>



    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Utilización de la BDT</h5>
                <div class="form-group">
                    <label> {{$sede->nombreMatutino}} | Clave {{$sede->clavebdt}}</label>
                </div>
                <div class="form-group editable-div">
                    <label for="horario" class="inline-label">Horario de atención:</label>
                    <input type="text" class="editable-input" id="horario" value="8:00 a 13:00 hrs." readonly>
                    <span class="edit-icon" onclick="toggleEdit('horario')">&#9998;</span>
                </div>
                <div class="form-group editable-div">
                    <label for="poblacion" class="inline-label">Población de la escuela:</label>
                    <input type="text" class="editable-input" id="poblacion" value="270 entre alumnos, docentes y personal administrativo." readonly>
                    <span class="edit-icon" onclick="toggleEdit('poblacion')">&#9998;</span>
                </div>
                <div class="form-group">
                    <label>son hombres: 40%</label>
                </div>
                <div class="form-group">
                    <label>son mujeres: 60%</label>
                </div>
                <div class="form-group">
                    <label>Promedio de atención mensual: 500 usuarios</label>
                </div>
                <div class="form-group">
                    <label>Actualmente utilizan el sistema de registro.</label>
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones:</label>
                    <textarea class="form-control" id="observaciones" rows="3"></textarea>
                </div>
                <a class="btn btn-primary btn-block" href="{{route('tutoria.edificio',$sede->clavebdt )}}">Guardar y Continuar</a>
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
        function setLine(line) {
            document.getElementById('lineaInfinium').value = line;
        }

        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
</body>
</html>
