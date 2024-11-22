<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reporte_EgresadosxAnioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el año de graduación filtrado
        $anioGraduacion = $request->get('anio_graduacion');

        // Obtener todos los años de graduación únicos para el dropdown
        $anios = DB::table('egresados')
            ->select('año_graduacion_Xciclo')
            ->groupBy('año_graduacion_Xciclo')
            ->orderBy('año_graduacion_Xciclo', 'asc')
            ->get();

        // Obtener los egresados según el año de graduación filtrado
        $query = DB::table('egresados')
            ->select('nombres', 'apellidos', 'año_graduacion_Xciclo');

        if ($anioGraduacion) {
            $query->where('año_graduacion_Xciclo', $anioGraduacion);
        }

        $egresados = $query->get();

        // Calcular el total de egresados del año seleccionado
        $totalEgresados = $egresados->count();

        // Retornar la vista con los datos
        return view('reports.reporte', compact('egresados', 'anios', 'anioGraduacion', 'totalEgresados'));
    }
}
