<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Egresados</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Egresados por Año</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Año de Graduación</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($egresados as $egresado)
                <tr>
                    <td>{{ $egresado->nombres }}</td>
                    <td>{{ $egresado->apellidos }}</td>
                    <td>{{ $egresado->año_graduacion_Xciclo }}</td>
                    <td>{{ $egresado->correo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>