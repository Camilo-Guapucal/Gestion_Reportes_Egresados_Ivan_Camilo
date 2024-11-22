<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Egresados</title>
    <style>
        /* Añadir estilos aquí para tu PDF */
    </style>
</head>
<body>
    <h1>Reporte de Egresados</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empleo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($egresados as $egresado)
            <tr>
                <td>{{ $egresado->nombres }}</td>
                <td>{{ $egresado->apellidos }}</td>
                <td>{{ $egresado->está_laborando ? 'Empleado' : 'Buscando Empleo' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
