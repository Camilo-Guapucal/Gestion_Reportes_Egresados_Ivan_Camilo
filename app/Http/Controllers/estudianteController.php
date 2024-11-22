<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class estudianteController extends Controller
{
    /**
     * Muestra la vista principal para estudiantes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('students'); // Asegúrate de tener esta vista creada en resources/views/students.blade.php
    }

    /**
     * Muestra los reportes del estudiante.
     *
     * @return \Illuminate\View\View
     */
    public function reports()
    {
        return view('reporte_estudiante'); // Asegúrate de crear esta vista en resources/views/reporte_estudiante.blade.php
    }
}