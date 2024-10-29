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
        .navbar-telmex {
            background-color: #0075c9;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .dropdown-menu {
            background-color: white;
            border: 1px solid #cccccc;
        }

        .dropdown-item {
            color: black !important;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
            color: black !important;
        }

        .is-invalid {
            border-color: red;
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
                <form id="edificios-form">
                    @foreach ($sede->edificios as $edificio)
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="señalizacion-{{ $edificio->id }}">Kit Señalización</label>
                                <select id="señalizacion-{{ $edificio->id }}" class="form-control" name="señalizacion[{{ $edificio->id }}]">

                                    <option value="COMPLETO" {{ $edificio->señalizacion == 'COMPLETO' ? 'selected' : '' }}>COMPLETO</option>
                                    <option value="INCOMPLETO" {{ $edificio->señalizacion == 'INCOMPLETO' ? 'selected' : '' }}>INCOMPLETO</option>
                                    <option value="SIN SEÑALIZACIÓN" {{ $edificio->señalizacion == 'SIN SEÑALIZACIÓN' ? 'selected' : '' }}>SIN SEÑALIZACIÓN</option>
                                    <option value="SIN INFORMACION" {{ $edificio->señalizacion == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edificio-{{ $edificio->id }}">Estatus Edificio</label>
                                <select id="edificio-{{ $edificio->id }}" class="form-control" name="edificio[{{ $edificio->id }}]">

                                    <option value="DAÑADA" {{ $edificio->edificio == 'DAÑADA' ? 'selected' : '' }}>DAÑADA</option>
                                    <option value="DESGASTADA" {{ $edificio->edificio == 'DESGASTADA' ? 'selected' : '' }}>DESGASTADA</option>
                                    <option value="FUNCIONAL" {{ $edificio->edificio == 'FUNCIONAL' ? 'selected' : '' }}>FUNCIONAL</option>
                                    <option value="REMODELACION" {{ $edificio->edificio == 'REMODELACION' ? 'selected' : '' }}>REMODELACION</option>
                                    <option value="SIN INFORMACION" {{ $edificio->edificio == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pintura-interior-{{ $edificio->id }}">Pintura Interior</label>
                                <select id="pintura-interior-{{ $edificio->id }}" class="form-control" name="pintura_interior[{{ $edificio->id }}]">

                                    <option value="BUEN ESTADO" {{ $edificio->pintura_interior == 'BUEN ESTADO' ? 'selected' : '' }}>BUEN ESTADO</option>
                                    <option value="DESGASTADO" {{ $edificio->pintura_interior == 'DESGASTADO' ? 'selected' : '' }}>DESGASTADO</option>
                                    <option value="SIN IMAGEN INSTITUCIONAL" {{ $edificio->pintura_interior == 'SIN IMAGEN INSTITUCIONAL' ? 'selected' : '' }}>SIN IMAGEN INSTITUCIONAL</option>
                                    <option value="SIN INFORMACION" {{ $edificio->pintura_interior == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pintura-exterior-{{ $edificio->id }}">Pintura Exterior</label>
                                <select id="pintura-exterior-{{ $edificio->id }}" class="form-control" name="pintura_exterior[{{ $edificio->id }}]">

                                    <option value="BUEN ESTADO" {{ $edificio->pintura_exterior == 'BUEN ESTADO' ? 'selected' : '' }}>BUEN ESTADO</option>
                                    <option value="DESGASTADO" {{ $edificio->pintura_exterior == 'DESGASTADO' ? 'selected' : '' }}>DESGASTADO</option>
                                    <option value="SIN IMAGEN INSTITUCIONAL" {{ $edificio->pintura_exterior == 'SIN IMAGEN INSTITUCIONAL' ? 'selected' : '' }}>SIN IMAGEN INSTITUCIONAL</option>
                                    <option value="SIN INFORMACION" {{ $edificio->pintura_exterior == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="electricidad-{{ $edificio->id }}">Electricidad</label>
                                <select id="electricidad-{{ $edificio->id }}" class="form-control" name="electricidad[{{ $edificio->id }}]">

                                    <option value="FUNCIONAL" {{ $edificio->electricidad == 'FUNCIONAL' ? 'selected' : '' }}>FUNCIONAL</option>
                                    <option value="DAÑADO" {{ $edificio->electricidad == 'DAÑADO' ? 'selected' : '' }}>DAÑADO</option>
                                    <option value="SIN INFORMACION" {{ $edificio->electricidad == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobiliario-{{ $edificio->id }}">Mobiliario</label>
                                <select id="mobiliario-{{ $edificio->id }}" class="form-control" name="mobiliario[{{ $edificio->id }}]">

                                    <option value="FUNCIONAL" {{ $edificio->mobiliario == 'FUNCIONAL' ? 'selected' : '' }}>FUNCIONAL</option>
                                    <option value="DAÑADO" {{ $edificio->mobiliario == 'DAÑADO' ? 'selected' : '' }}>DAÑADO</option>
                                    <option value="EN MANTENIMIENTO" {{ $edificio->mobiliario == 'EN MANTENIMIENTO' ? 'selected' : '' }}>EN MANTENIMIENTO</option>
                                    <option value="SIN INFORMACION" {{ $edificio->mobiliario == 'SIN INFORMACION' ? 'selected' : '' }}>SIN INFORMACION</option>
                                </select>
                            </div>
                        </div>
                    @endforeach
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
                            @if ($equipo->cantidad != 0)
                                <tr>

                                    <td>{{$equipo->tipo}}</td>
                                    <td>{{$equipo->cantidad}}</td>
                                    <td>{{$equipo->funcional}}</td>
                                    <td>{{$equipo->dañado}}</td>
                                    <td>{{$equipo->faltante}}</td>
                                    <td><button class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#updateModal" onclick="SetID('{{$equipo->id}}')">Actualizar</button></td>
                                </tr>
                            @endif
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
                    <form id="updateForm" action="{{route('actualizar.mobiliario')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" id="bandera" name="id" readonly hidden>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" readonly>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" readonly>
                        </div>
                        <div class="form-group">
                            <label for="funcional">Funcional</label>
                            <input type="number" class="form-control" id="funcional" name="funcional" >
                        </div>
                        <div class="form-group">
                            <label for="dañado">Dañado</label>
                            <input type="number" class="form-control" id="dañado" name="dañado" >
                        </div>
                        <div class="form-group">
                            <label for="faltante">Faltante</label>
                            <input type="number" class="form-control" id="faltante" name="faltante">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery, DataTables, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        function SetID(line) {
            document.getElementById('bandera').value = line;
        }

        $(document).ready(function() {
            // Initialize DataTable
          //  $('table').DataTable();

            // Populate modal with row data
            $('button[data-target="#updateModal"]').on('click', function() {
                var row = $(this).closest('tr');
                var tipo = row.find('td').eq(0).text();
                var cantidad = row.find('td').eq(1).text();
                var funcional = row.find('td').eq(2).text();
                var danado = row.find('td').eq(3).text();
                var faltante = row.find('td').eq(4).text();


                $('#tipo').val(tipo);
                $('#cantidad').val(cantidad);
                $('#funcional').val(funcional);
                $('#dañado').val(danado);
                $('#faltante').val(faltante);
            });

            // Validate and save changes
            $('#saveChanges').on('click', function() {
                var cantidad = parseInt($('#cantidad').val());
                var funcional = parseInt($('#funcional').val());
                var danado = parseInt($('#dañado').val());
                var faltante = parseInt($('#faltante').val());

                // Ensure values are non-negative integers
                if (isNaN(funcional) || isNaN(danado) || isNaN(faltante) || funcional < 0 || danado < 0 || faltante < 0) {
                    alert('Por favor, ingrese valores válidos para Funcional, Dañado y Faltante.');
                    return;
                }

                // Ensure total does not exceed cantidad
                if (funcional + danado + faltante > cantidad) {
                    alert('La suma de Funcional, Dañado y Faltante no puede exceder la Cantidad total.');
                    $('#funcional, #dañado, #faltante').addClass('is-invalid');
                }else if( funcional + danado + faltante < cantidad){
                    alert('Falta Mobiliario.');
                    $('#funcional, #dañado, #faltante').addClass('is-invalid');
                } else {
                    $('#funcional, #dañado, #faltante').removeClass('is-invalid');

                    document.getElementById('updateForm').submit();
                    alert('Mobiliario actualizado');





                    // Close modal
                    $('#updateModal').modal('hide');
                }
            });
        });
    </script>


<script>
        $(document).ready(function() {
            $('#edificios-form select').change(function() {
                var select = $(this);
                var edificioId = select.attr('id').split('-').pop();  // Extract the edificio ID from the select ID
                var field = select.attr('name').split('[')[0];  // Extract the field name

                var data = {
                    _token: '{{ csrf_token() }}',
                    id: edificioId,
                    field: field,
                    value: select.val()
                };

                $.ajax({
                    url: '{{ route('actualizar.edificio') }}',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        alert('El edificio ha sido actualizado correctamente.');
                       // console.log(response);
                    },
                    error: function(response) {
                        alert('Ocurrió un error al actualizar el edificio.');
                        //console.log(response);
                    }
                });
            });
        });
</script>

</body>
</html>
