@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-green-50 via-teal-50 to-blue-50 min-h-screen flex flex-col">
    <nav class="bg-white shadow-md border-b border-teal-100">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-teal-600 to-blue-600 bg-clip-text text-transparent">
                    Portal de Egresados ESTUDIANTE
                </h1>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-teal-100 hover:text-teal-700 transition-colors duration-200 flex items-center space-x-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="font-medium">Cerrar sesión</span>
                </button>
            </form>
        </div>
    </nav>

    <div class="flex-1 flex flex-col items-center justify-center py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-4">
                <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-blue-600 mb-2">
                    Portal de Reportes de egresados
                </h1>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">INGENIERÍA DE SISTEMAS</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Sistema de gestión para acceder a reportes de egresados.
                </p>
            </div>

            <!-- Aquí puedes agregar secciones específicas para los estudiantes -->
            <!-- Ejemplo de sección -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Reporte de egresados -->
                <div class="bg-gradient-to-br from-white to-teal-50 shadow-lg rounded-xl p-6 text-center transform hover:scale-105 transition-transform duration-200 border border-teal-100 flex flex-col items-center">
                    <h2 class="text-xl font-bold text-teal-700">Mis Reportes</h2>
                    <a href="{{ route('student.reports') }}" class="text-teal-600 hover:underline">
                        <p class="text-gray-700 mt-2 font-medium">Accede a tus reportes</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection