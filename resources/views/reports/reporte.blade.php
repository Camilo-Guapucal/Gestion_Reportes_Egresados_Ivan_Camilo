@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md">
        <div class="px-6 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Reporte de Egresados</h1>

            <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md mb-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Regresar a Menú Principal
            </a>

            <form method="GET" action="{{ route('reports.graduates') }}" class="mb-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <label for="anio_graduacion" class="block text-gray-700 font-medium mb-2">Año de Graduación:</label>
                        <select name="anio_graduacion" id="anio_graduacion" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Todos</option>
                            @foreach($anios as $anio)
                                <option value="{{ $anio->año_graduacion_Xciclo }}" {{ isset($anioGraduacion) && $anioGraduacion == $anio->año_graduacion_Xciclo ? 'selected' : '' }}>
                                    {{ $anio->año_graduacion_Xciclo }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Filtrar por año
                    </button>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left font-medium text-gray-700">Total Egresados: {{ $totalEgresados }}</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-3 text-left font-medium text-gray-700">Año de Graduación</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700">Nombres</th>
                            <th class="px-4 py-3 text-left font-medium text-gray-700">Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($egresados->isEmpty())
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center text-gray-800">No hay egresados para el año seleccionado</td>
                            </tr>
                        @else
                            @foreach($egresados as $egresado)
                                <tr class="border-b">
                                    <td class="px-4 py-3 text-gray-800">{{ $egresado->año_graduacion_Xciclo }}</td>
                                    <td class="px-4 py-3 text-gray-800">{{ $egresado->nombres }}</td>
                                    <td class="px-4 py-3 text-gray-800">{{ $egresado->apellidos }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
