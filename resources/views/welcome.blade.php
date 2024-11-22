@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500">
    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-sm border-b border-white/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo y Título -->
                <div class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    <span class="text-xl font-bold text-gray-800">
                        Portal Egresados
                    </span>
                </div>

                <!-- Botones de Auth -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section con Imagen -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Texto Hero -->
            <div class="text-white space-y-6">
                <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
                    Portal de Egresados
                    <span class="block mt-2">Ingeniería de Sistemas</span>
                </h1>
                <p class="text-xl text-white/90">
                    Conectando profesionales, construyendo futuro.
                </p>
                <div class="flex space-x-4">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-blue-600 bg-white hover:bg-blue-50 transition-colors duration-200">
                        Únete ahora
                    </a>
                </div>
            </div>

            <!-- Imagen Hero -->
            <div class="flex justify-center lg:justify-end">
                <img src="/api/placeholder/600/400" alt="Estudiantes graduados" 
                     class="rounded-lg shadow-xl max-w-full h-auto" />
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection