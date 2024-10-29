<!DOCTYPE html>
<html>
<head>
    <title>Registros</title>
</head>
<body>
    <h1>Registros</h1>
    <table border="1">
        <tr>
            <th>Región Militar</th>
            <th>Zona Militar</th>
            <th>Fecha</th>
            <th>Conteo de Correos</th>
        </tr>
        @foreach($registros as $registro)
            <tr>
                <td>{{ $registro['region_militar'] }}</td>
                <td>{{ $registro['zona_militar'] }}</td>
                <td>{{ $registro['fecha'] }}</td>
                <td>{{ $registro['count'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
