<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Reporte_EmpleoController extends Controller
{
    public function index()
    {
        // Obtener los datos de los egresados
        $totalEgresados = DB::table('egresados')->count();
        $empleados = DB::table('egresados')->where('está_laborando', 1)->count();
        $buscandoEmpleo = DB::table('egresados')->where('está_laborando', 0)->count();

        // Calcular porcentajes
        $porcentajeEmpleados = $totalEgresados > 0 ? ($empleados / $totalEgresados) * 100 : 0;
        $porcentajeBuscandoEmpleo = $totalEgresados > 0 ? ($buscandoEmpleo / $totalEgresados) * 100 : 0;

        // Obtener lista de egresados para mostrar en la tabla
        $egresados = DB::table('egresados')->get();

        return view('reports.empleabilidad', compact('totalEgresados', 'porcentajeEmpleados', 'porcentajeBuscandoEmpleo', 'egresados'));
    }
}
    