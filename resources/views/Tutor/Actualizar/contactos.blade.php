
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
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 0.75rem;
    }

    .edit-btn {
        font-size: 1.2rem;
    }
</style>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                {{$sede->nombreMatutino}} | CLAVE {{$sede->clavebdt}}
            </div>
            <div class="card-body">
                <form id="contact-form" action="{{route('contactos.update',$sede->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($sede->dependencias as $dependencia )
                        <h5>Responsable de Aula:</h5>
                        <div class="form-group row">
                            <label for="name1" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="name1" name="nombre_responsable" value="{{$dependencia->nombre_responsable}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#name1"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone1" class="col-sm-2 col-form-label">Teléfono:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="phone1" name="telefono_responsable" value="{{$dependencia->telefono_responsable}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#phone1"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-2 col-form-label">Correo:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control-plaintext" name="correo_responsable" id="email1" value="{{$dependencia->correo_responsable}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#email1"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position1" class="col-sm-2 col-form-label">Cargo:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="position1" name="cargo_responsable" value="{{$dependencia->cargo_responsable}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#position1"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cell1" class="col-sm-2 col-form-label">Celular:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="cell1" name="celular_responsable" value="{{$dependencia->celular_responsable}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#cell1"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <h5>Contacto Municipal / Director:</h5>
                        <div class="form-group row">
                            <label for="name2" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="name2" name="nombre_encargado" value="{{$dependencia->nombre_encargado}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#name2"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone2" class="col-sm-2 col-form-label">Teléfono:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="phone2" name="telefono_encargado" value="{{$dependencia->telefono_encargado}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#phone2"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email2" class="col-sm-2 col-form-label">Correo:</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control-plaintext" id="email2" name="correo_encargado" value="{{$dependencia->correo_encargado}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#email2"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position2" class="col-sm-2 col-form-label">Cargo:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="position2"  name="cargo_encargado" value="{{$dependencia->cargo_encargado}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#position2"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cell2" class="col-sm-2 col-form-label">Celular:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext" id="cell2" name="celular_encargado" value="{{$dependencia->celular_encargado}}" readonly>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-link edit-btn" data-target="#cell2"><i class="fa fa-pencil"></i></button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">

                                <button type="button" class="btn btn-primary" id="saveChangesBtn" data-toggle="modal" data-target="#confirmModal">Guardar</button>
                                <button type="button" class="btn btn-secondary">Cancelar</button>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmación de Cambios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Por favor, revise los cambios que ha realizado:</p>
                    <ul id="changesList"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Confirmar</button>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const contactForm = document.getElementById('contact-form');
        const confirmSaveButton = document.getElementById('confirmSave');

        // Enable editing of form fields
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = button.getAttribute('data-target');
                const targetElement = document.querySelector(targetId);
                targetElement.removeAttribute('readonly');
                targetElement.classList.remove('form-control-plaintext');
                targetElement.classList.add('form-control');
            });
        });

        // Capture original values
        const originalValues = {};
        document.querySelectorAll('input').forEach(input => {
            originalValues[input.id] = input.value;
        });

        // Show changes in the modal
        document.getElementById('saveChangesBtn').addEventListener('click', function () {
            const changesList = document.getElementById('changesList');
            changesList.innerHTML = ''; // Clear previous changes

            // Compare new values with original values
            document.querySelectorAll('input').forEach(input => {
                const originalValue = originalValues[input.id];
                const currentValue = input.value;
                if (originalValue !== currentValue) {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${input.previousElementSibling.textContent.trim()} de "${originalValue}" a "${currentValue}"`;
                    changesList.appendChild(listItem);
                }
            });

            // If no changes were made
            if (changesList.children.length === 0) {
                const listItem = document.createElement('li');
                listItem.textContent = 'No se han realizado cambios.';
                changesList.appendChild(listItem);
            }
        });

        // Confirm save changes
        document.getElementById('confirmSave').addEventListener('click', function () {
            // Close modal
                // Enviar el formulario
                contactForm.submit();

        });

        confirmSaveButton.addEventListener('click', function () {
        // Cerrar el modal (esto asume que estás usando Bootstrap 4 o 5)
        $('#saveChangesModal').modal('hide');

        // Enviar el formulario
        contactForm.submit();
    });

    });
</script>


