<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egresado;
use PDF;
use PhpOffice\PhpWord\PhpWord;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EgresadosExport;

class exportar_reportes_egresadosController extends Controller
{
    public function exportar()
    {
        return view('reports.exportar');
    }

    public function exportarPDF()
    {
        $egresados = Egresado::all();
        $pdf = PDF::loadView('reports.pdf', compact('egresados'));
        return $pdf->download('reporte_egresados.pdf');
    }

    public function exportarWord()
    {
        $egresados = Egresado::all();
        $phpWord = new PhpWord();

        $section = $phpWord->addSection();
        foreach ($egresados as $egresado) {
            $section->addText($egresado->nombres . ' ' . $egresado->apellidos);
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'Word');
        $phpWord->save($tempFile, 'Word2007');

        return response()->download($tempFile, 'reporte_egresados.docx')->deleteFileAfterSend(true);
    }

    public function exportarExcel()
    {
        return Excel::download(new EgresadosExport, 'reporte_egresados.xlsx');
    }
}
