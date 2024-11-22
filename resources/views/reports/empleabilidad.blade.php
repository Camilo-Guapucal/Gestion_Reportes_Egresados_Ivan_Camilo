@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <!-- Botón de regreso al inicio -->
    <div class="max-w-4xl mx-auto mb-4">
        <a href="{{ route('home') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition duration-200 shadow-sm">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Regresar al Menú Principal
        </a>
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Header Section with Gradient Background -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-8">
                <div class="flex items-center space-x-4">
                    <!-- Icono decorativo -->
                    <div class="bg-white p-3 rounded-lg shadow-md">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">Reporte de Empleabilidad</h2>
                        <p class="text-purple-100">Reporte detallado de los egresados y su situación laboral actual</p>
                    </div>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="p-8">
                <!-- Estadísticas Resumidas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow border border-purple-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Total Egresados</h3>
                        <p class="text-3xl font-bold text-purple-600">{{ $totalEgresados }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border border-purple-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Empleados</h3>
                        <p class="text-3xl font-bold text-green-600">{{ number_format($porcentajeEmpleados, 2) }}%</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow border border-purple-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Buscando Empleo</h3>
                        <p class="text-3xl font-bold text-blue-600">{{ number_format($porcentajeBuscandoEmpleo, 2) }}%</p>
                    </div>
                </div>

                <!-- Área para el contenido dinámico -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-purple-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">Listado de Egresados</h3>
                    </div>
                    
                    <!-- Tabla de egresados -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Nombres</th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Apellidos</th>
                                    <th class="py-2 px-4 border-b border-gray-200 text-left text-gray-600">Situación Laboral</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($egresados as $egresado)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $egresado->nombres }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $egresado->apellidos }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $egresado->está_laborando ? 'Empleado' : 'Buscando Empleo' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
