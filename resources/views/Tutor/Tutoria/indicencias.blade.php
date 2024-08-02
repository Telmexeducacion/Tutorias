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

<style>
    .container {
      margin-top: 20px;
    }
    .btn-ingresar {
      padding: 0;
    }
  </style>


<div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Incidencias </h1>
        <div class="form-group">
          <label for="libraryName"> </label>
          <input type="text" id="libraryName" class="form-control" value="" >
        </div>
        <button id="buscarBtn" class="btn btn-primary">Buscar</button>
        <table class="table table-striped mt-3">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Detalle</th>

              <th>Folio reporte</th>
              <th>Tipo</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>27/08/2023</td>
              <td>SIN INTERNET EN LA ZONA POR CAIDA DE ARBOL</td>

              <td>54859</td>
              <td>INTERNET</td>
              <td>EN PROCESO</td>
            </tr>
            <tr>
              <td>28/08/2023</td>
              <td>NO CARGA EL SISTEMA OPERATIVO</td>

              <td>78954</td>
              <td>SISTEMA</td>
              <td>FINALIZADO</td>
            </tr>
            <tr>
              <td>28/04/2022</td>
              <td>NO ENCIENDE EL EQUIPO</td>

              <td><button class="btn btn-link btn-ingresar" data-toggle="modal" data-target="#folioModal" data-clave="15EMADT063">Ingresar</button></td>
              <td>SISTEMA</td>
              <td>PENDIENTE DE FOLIO</td>
            </tr>
            <tr>
              <td>28/07/2023</td>
              <td>SIN INTERNET </td>

              <td><button class="btn btn-link btn-ingresar" data-toggle="modal" data-target="#folioModal" data-clave="25SIADT026">Ingresar</button></td>
              <td>INTERNET</td>
              <td>PENDIENTE DE FOLIO</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="folioModal" tabindex="-1" role="dialog" aria-labelledby="folioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="folioModalLabel">Ingresar Folio de Reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="folioForm">
            <div class="form-group">
              <label for="lineaInfinium">Línea Infinium</label>
              <input type="text" class="form-control" id="lineaInfinium" value="9373227991" disabled>
            </div>
            <div class="form-group">
              <label for="folio">Folio</label>
              <input type="text" class="form-control" id="folio" value="">
            </div>
            <div class="form-group">
              <label for="comentarios">Comentarios:</label>
              <textarea class="form-control" id="comentarios"></textarea>
            </div>
            <input type="hidden" id="claveHidden" name="clave">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="guardarBtn">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#folioModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var clave = button.data('clave'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-body #claveHidden').val(clave);
      });

      $('#guardarBtn').click(function() {
        // Aquí puedes manejar la lógica para guardar el formulario
        // Por ahora solo cerraremos el modal
        $('#folioModal').modal('hide');
      });
    });
  </script>
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


