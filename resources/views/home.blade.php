@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen flex flex-col">
    <!-- Barra de navegación con fondo más definido -->
    <nav class="bg-white shadow-md border-b border-indigo-100">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-3 relative">
            <div class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    Portal de Egresados ADMINISTRADOR
                </h1>
            </div>
            <!-- Menú de perfil -->
            <div class="relative">
                <button onclick="toggleMenu()" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-200 flex items-center space-x-2 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="font-medium">Gestión perfil</span>
                </button>

                <!-- Menú desplegable -->
                <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                    <a href="{{ route('profile.edit', ['field' => 'username']) }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Cambiar nombre de usuario</a>
                    <a href="{{ route('profile.edit', ['field' => 'email']) }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Cambiar correo</a>
                    <a href="{{ route('profile.edit', ['field' => 'password']) }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-100">Cambiar contraseña</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-indigo-100">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex=1 flex flex-col items-center justify-center py=12">
        <div class="max-w=7xl mx-auto px=4 sm:px=6 lg:px=8">
            <!-- Mensaje de bienvenida -->
            @if(Auth::check())
            <div class="mb-6 text-xl text-gray-800">
            Bienvenido(a) {{ Auth::user()->nombre }}!
            </div>
            @endif
            
    <div class="flex-1 flex flex-col items-center justify-center py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado con mejor contraste -->
            <div class="text-center space-y-4">
                <h1 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">
                    Portal de Reportes de egresados
                </h1>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">INGENIERÍA DE SISTEMAS</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Sistema de gestión para generar, modificar y exportar reportes de egresados.
                </p>
            </div>

            <!-- Estadísticas con fondos contrastantes -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
                <!-- Reporte de egresados por año -->
                <div class="bg-gradient-to-br from-white to-indigo-50 shadow-lg rounded-xl p-6 text-center transform hover:scale-105 transition-transform duration-200 border border-indigo-100 flex flex-col items-center">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-indigo-700">Egresados por año</h2>
                    <a href="{{ route('reports.graduates') }}" class="text-indigo-600 hover:underline">
                        <p class="text-gray-700 mt-2 font-medium">Reporte de egresados por año</p>
                    </a>
                </div>

                <!-- Reporte de empleabilidad -->
                <div class="bg-gradient-to-br from-white to-purple-50 shadow-lg rounded-xl p-6 text-center transform hover:scale-105 transition-transform duration-200 border border-purple-100 flex flex-col items-center">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-purple-700">Reporte empleabilidad</h2>
                    <a href="{{ route('empleabilidad') }}" class="text-indigo-600 hover:underline">
                        <p class="text-gray-700 mt-2 font-medium">Reporte de los egresados con su lugar de empleo</p>
                    </a>
                </div>


                <!-- Exportación de reportes -->
                <div class="bg-gradient-to-br from-white to-blue-50 shadow-lg rounded-xl p-6 text-center transform hover:scale-105 transition-transform duration-200 border border-blue-100 flex flex-col items-center">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-indigo-700">Exportación de reportes</h2>
                    <a href="{{ route('exportar') }}" class="text-indigo-600 hover:underline">
                        <p class="text-gray-700 mt-2 font-medium">Generar reportes en diferentes formatos</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Función para mostrar/ocultar el menú
    function toggleMenu() {
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('hidden');
    }
    </script>
@endsection
