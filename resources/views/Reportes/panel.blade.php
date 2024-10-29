<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control de Reportes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .navbar {
            margin-bottom: 20px;
        }
        .container {
            margin-top: 20px;
        }
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
        .table td, .table th {
            text-align: center;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Panel de Control</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reporte.semana')}}">Semanal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reporte.quincena')}}">Quincena</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reporte.quincena1')}}">quincena construcción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reporte.excel')}}">Exportar excel construcción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configuración</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container">
        <h1 class="text-center">Resumen de Reportes</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Distribución de Consumo</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="consumoChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Resumen de Datos</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sin consumo</th>
                                    <th>Bajo</th>
                                    <th>Medio</th>
                                    <th>Alto</th>
                                    <th>Heavy</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>378</td>
                                    <td>131</td>
                                    <td>46</td>
                                    <td>14</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tendencias de Consumo</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="tendenciasChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Gráfico de distribución de consumo
        const ctx1 = document.getElementById('consumoChart').getContext('2d');
        const consumoChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Sin consumo', 'Bajo', 'Medio', 'Alto', 'Heavy'],
                datasets: [{
                    label: 'Número de Reportes',
                    data: [378, 131, 46, 14, 5],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de tendencias de consumo (ejemplo)
        const ctx2 = document.getElementById('tendenciasChart').getContext('2d');
        const tendenciasChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Tendencias de Consumo',
                    data: [300, 250, 400, 450, 350, 500],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
