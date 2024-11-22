<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Reporte_EmpleoController;
use App\Http\Controllers\reporte_EgresadosxAnioController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\exportar_reportes_egresadosController;
use App\Http\Controllers\ExportController;


//ruta para students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');


// Ruta para la página principal (bienvenida)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas de autenticación (Login, Register, Logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para la página de inicio después del login
Route::get('/home', function () {return view('home');  })->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rutas protegidas por autenticación
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/alumni/directory', [AlumniController::class, 'directory'])->name('alumni.directory');
    
    // Ruta de reporte de egresados por año
    Route::get('/reporte', [reporte_EgresadosxAnioController::class, 'index'])->name('reports.graduates');

    // Ruta de reporte de empleabilidad de egresados
    Route::get('/reports/empleabilidad', [Reporte_EmpleoController::class, 'index'])->name('empleabilidad');

    // Rutas para estudiantes
    Route::middleware(['role:student'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
        Route::get('/student/reports', [StudentController::class, 'reports'])->name('student.reports');
    });

    // Ruta de archivos
    Route::get('/files', [FilesController::class, 'index']);
});

    //rutas para la exportacion de reportes en 3 formatos 
    Route::get('/exportar/pdf', [exportar_reportes_egresadosController::class, 'exportarPDF'])->name('exportar.pdf');
    Route::get('/exportar/word', [exportar_reportes_egresadosController::class, 'exportarWord'])->name('exportar.word');
    Route::get('/exportar/excel', [exportar_reportes_egresadosController::class, 'exportarExcel'])->name('exportar.excel');
    Route::get('/exportar', [exportar_reportes_egresadosController::class, 'exportar'])->name('exportar');

    //rutas para escoger los tipos de reporte : reporte de egresados por año , reporte de empleabilidad de egresados
    
    // Ruta para la página de exportación PDF 
    Route::get('/export/egresados', [ExportController::class, 'exportEgresados'])->name('export.egresados');
    Route::get('/export/empleabilidad', [ExportController::class, 'exportEmpleabilidad'])->name('export.empleabilidad');

    // Nuevas rutas para exportar a Word
    Route::get('/export/egresados/word', [ExportController::class, 'exportEgresadosWord'])->name('export.egresados.word');
    Route::get('/export/empleabilidad/word', [ExportController::class, 'exportEmpleabilidadWord'])->name('export.empleabilidad.word');

    //rutas para exportar a Excel 
    Route::get('/export/empleabilidad/excel', [ExportController::class, 'exportEmpleabilidadExcel'])->name('export.empleabilidad.excel');
    Route::get('/export/egresados/excel', [ExportController::class, 'exportEgresadosExcel'])->name('export.egresados.excel');

