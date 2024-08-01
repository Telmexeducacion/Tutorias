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


<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 2rem;
        border: 1px solid #000;
        border-radius: 5px;
    }
    .btn-custom {
        width: 100%;
        padding: 0.75rem;
    }
</style>

<div class="container mt-5">
    <div class="form-container">
        <h4 class="text-center mb-4">Llamada no efectiva</h4>
        <p><strong>{{$biblioteca->clavebdt}} {{$biblioteca->nombreMatutino}}</strong></p>
        <!-- Formulario -->
        <form action="{{route('guardar.buzon')}}" method="POST">
            @csrf <!-- Laravel CSRF Token -->
            <!-- Campo de selección de motivo -->
            <div class="form-group">
                <label for="motivo">Motivo</label>
                <select class="form-control" id="motivo" name="estado" required>
                    <option value="" selected disabled>Seleccione</option>
                    <option value="No responde">No responde</option>
                    <option value="No localizado">No localizado</option>
                    <option value="Encargado ausente">Encargado ausente</option>
                </select>
            </div>
            <!-- Campo de observaciones -->
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="comentarios" rows="4"></textarea>
            </div>
            <input type="hidden" name="id_biblioteca" value="{{$biblioteca->id}}">




            <!-- Botón de guardar -->
            <button type="submit" class="btn btn-primary btn-custom">Guardar</button>
        </form>
    </div>
</div>



    <!-- Resto del contenido de la página -->

</body>
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- Include DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  <!-- Include Bootstrap Bundle JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


</html>
