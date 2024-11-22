<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar Reporte de Egresados</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!--BOTON PARA REGRESAR A MENU PRINCIPAL-->
    <div class="mt-6 text-center">
        <a href="{{ route('home') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Regresar al Menú Principal
        </a>
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Exportar Reporte de Egresados</h1>
        <p class="text-center mb-6 text-gray-600">Por favor elija el formato en el cual quiere exportar su reporte</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Opción para Exportar a PDF -->
            <div class="flex flex-col items-center justify-center p-6 bg-red-500 rounded-lg shadow-md hover:bg-red-600 transition-colors duration-300">
                <i class="fas fa-file-pdf text-6xl text-white mb-4"></i>
                <h2 class="text-2xl font-bold text-white mb-2">Exportar a PDF</h2>
                <p class="text-white mb-4">Descarga el reporte en formato PDF.</p>
                <!-- Botón para abrir el modal -->
                <button onclick="openPdfModal()" class="bg-white text-red-500 font-bold py-2 px-4 rounded hover:bg-red-200 transition-colors duration-300">
                    <i class="fas fa-download mr-2"></i>Seleccionar Opción
                </button>
            </div>

           <!-- Opción para Exportar a Word -->
           <div class="flex flex-col items-center justify-center p-6 bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 transition-colors duration-300">
                <i class="fas fa-file-word text-6xl text-white mb-4"></i>
                <h2 class="text-2xl font-bold text-white mb-2">Exportar a Word</h2>
                <p class="text-white mb-4">Descarga el reporte en formato Word.</p>
                <!-- Botón para abrir el modal de Word -->
                <button onclick="openWordModal()" class="bg-white text-blue-500 font-bold py-2 px-4 rounded hover:bg-blue-200 transition-colors duration-300">
                    <i class="fas fa-download mr-2"></i>Seleccionar Opción
                </button>
            </div>

            <!-- Opción para Exportar a Excel -->
            <div class="flex flex-col items-center justify-center p-6 bg-green-500 rounded-lg shadow-md hover:bg-green-600 transition-colors duration-300">
                <i class="fas fa-file-excel text-6xl text-white mb-4"></i>
                <h2 class="text-2xl font-bold text-white mb-2">Exportar a Excel</h2>
                <p class="text-white mb-4">Descarga el reporte en formato Excel.</p>
                <button onclick="openExcelModal()" class="bg-white text-blue-500 font-bold py-2 px-4 rounded hover:bg-blue-200 transition-colors duration-300">
                    <a href="{{ route('exportar.excel') }}" class="bg-white text-green-500 font-bold py-2 px-4 rounded hover:bg-green-200 transition-colors duration=300">
                        <i class="fas fa-download mr=2"></i> Seleccionar Opción
                    </a>
                </button>
            </div>
        </div>
        </div>
    </div>

     <!-- Modal para seleccionar opciones de PDF -->
<div id="pdfModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-bold mb-4">Selecciona un Reporte</h3>
        <p>Por favor selecciona el tipo de reporte que deseas exportar:</p>
        <div class="mt-4">
            <a href="{{ route('export.egresados') }}" class="block bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-600 transition-colors duration-300 mb-2">Reporte de Egresados por Año</a>
            <a href="{{ route('export.empleabilidad') }}" class="block bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-600 transition-colors duration-300">Reporte de Empleabilidad</a>
        </div>
        <button onclick="closePdfModal()" class="mt-4 bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 transition-colors duration-300">Cancelar</button>
    </div>
</div>

<!-- Modal para seleccionar opciones de Word -->
<div id="wordModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-bold mb-4">Selecciona un Reporte</h3>
        <p>Por favor selecciona el tipo de reporte que deseas exportar:</p>
        <div class="mt-4">
            <a href="{{ route('export.egresados.word') }}" class="block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition-colors duration=300 mb-2">Reporte de Egresados por Año</a>
            <a href="{{ route('export.empleabilidad.word') }}" class="block bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition-colors duration=300">Reporte de Empleabilidad</a>
        </div>
        <button onclick="closeWordModal()" class="mt-4 bg-gray-500 text-white font-bold py-2 px=4 rounded hover:bg-gray=600 transition-colors duration=300">Cancelar</button>
    </div>
</div>

<!-- Modal para seleccionar opciones de Excel -->
<div id="excelModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-bold mb-4">Selecciona un Reporte</h3>
        <p>Por favor selecciona el tipo de reporte que deseas exportar:</p>
        <div class="mt-4">
            <!--<a href="{{ route('export.egresados.excel') }}" class="block bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition-colors duration-300 mb-2">Reporte de Egresados por Año</a>-->
            <a href="{{ route('export.empleabilidad.excel') }}" class="block bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition-colors duration-300">Reporte de Empleabilidad</a>
        </div>
        <button onclick="closeExcelModal()" class="mt-4 bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600 transition-colors duration-300">Cancelar</button>
    </div>
</div>

<!-- Scripts para manejar los modales -->
<script>
    function openPdfModal() {
        document.getElementById('pdfModal').classList.remove('hidden');
    }

    function closePdfModal() {
        document.getElementById('pdfModal').classList.add('hidden');
    }

    function openWordModal() {
        document.getElementById('wordModal').classList.remove('hidden');
    }

    function closeWordModal() {
        document.getElementById('wordModal').classList.add('hidden');
    }
    function openExcelModal() {
        document.getElementById('excelModal').classList.remove('hidden');
    }

    function closeExcelModal() {
        document.getElementById('excelModal').classList.add('hidden');
    }
</script>

</body>
</html>