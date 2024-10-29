<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Sedes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }
        .sede {
            margin-bottom: 30px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reporte de Sedes</h1>
        <div id="sedes-container">
            <!-- Aquí se renderizarán los datos dinámicamente -->
        </div>
    </div>

    <script>
        // Función para obtener los datos desde la URL
        async function obtenerSedes() {
            try {
                const response = await fetch('http://localhost:8000/sedes');
                const sedes = await response.json();

                // Llamamos a la función para renderizar los datos
                renderizarSedes(sedes);
            } catch (error) {
                console.error("Error al obtener los datos:", error);
            }
        }

        // Función para renderizar los datos en el DOM
        function renderizarSedes(sedes) {
            const container = document.getElementById('sedes-container');

            sedes.forEach(sede => {
                const sedeDiv = document.createElement('div');
                sedeDiv.classList.add('sede');

                sedeDiv.innerHTML = `
                    <h2>${sede.nombreMatutino} - ${sede.Mes}</h2>
                    <p><strong>Clave:</strong> ${sede.clavebdt}</p>
                    <p><strong>PCC:</strong> ${sede.Pcc}</p>
                    <p><strong>Visitas:</strong> ${sede.Visitas}</p>
                    <p><strong>Usuarios Hombres:</strong> ${sede["Usuarios Hombres"]}</p>
                    <p><strong>Mujeres:</strong> ${sede.Mujeres}</p>
                    <h3>Talleres</h3>
                    <table>
                        <thead>
                            <tr>

                                <th>Nombre del Taller</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${Object.entries(sede.Talleres).map(([id, nombre]) => `
                                <tr>

                                    <td>${nombre}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                `;

                container.appendChild(sedeDiv);
            });
        }

        // Llamamos a la función para obtener los datos al cargar la página
        obtenerSedes();
    </script>

</body>
</html>
