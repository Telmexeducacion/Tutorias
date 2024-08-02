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


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <header class="bg-dark text-white p-3 rounded mb-4 d-flex justify-content-between align-items-center">
        <h1 class="h5 m-0">{{$sede->nombreMatutino}}| Clave {{$sede->clavebdt}}</h1>
        <div class="welcome"></div>
    </header>
    <main>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('tutoria.internet',$sede->clavebdt)}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#128640;</div>
                            <p class="card-text">Conectividad</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('tutoria.uso',$sede->clavebdt)}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#128196;</div>
                            <p class="card-text">Uso BDT</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('tutoria.edificio',$sede->clavebdt)}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#128295;</div>
                            <p class="card-text">Infraestructura y señalética</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('tutoria.equipos',$sede->clavebdt)}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#128187;</div>
                            <p class="card-text">Equipos</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('tutoria.insidencia',$sede->clavebdt)}}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#9888;</div>
                            <p class="card-text">Incidencias</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="icon">&#128203;</div>
                            <p class="card-text">Expediente</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center h-100">
                    <a href="{{route('ficha.externa',$sede->clavebdt)}}" class="text-decoration-none text-dark"  target="_blank">
                        <div class="card-body">
                            <div class="icon">&#128229;</div>
                            <p class="card-text">Descargar Ficha</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block mt-3">Finalizar</button>
    </main>

    <Style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #00274d;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .header h1 {
        margin: 0;
        font-size: 1.5em;
    }

    .welcome {
        font-size: 1em;
    }

    .icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .footer {
        text-align: center;
        margin-top: 20px;
        font-size: 0.9em;
        color: #555;
    }

    .footer a {
        color: #007bff;
        text-decoration: none;
        margin: 0 10px;
        transition: color 0.2s;
    }

    .footer a:hover {
        color: #0056b3;
    }


    </Style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</div>
</body>
</html>
