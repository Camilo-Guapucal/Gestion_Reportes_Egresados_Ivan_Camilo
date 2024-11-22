<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Empleabilidad</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Empleabilidad de Egresados</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Estado Laboral Actual</th> 
                <th>Año de Graduación</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($empleabilidad as $egresado)
                <tr>
                    <td>{{ $egresado->nombres }}</td>
                    <td>{{ $egresado->apellidos }}</td>

                    
                    <td>{{ $egresado->está_laborando ? 'EMPLEADO' : 'BUSCANDO EMPLEO' }}</td>

                    <td>{{ $egresado->año_graduacion_Xciclo }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>