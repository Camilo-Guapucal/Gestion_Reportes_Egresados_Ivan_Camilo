<?php

namespace App\Http\Controllers;

use App\Models\Egresado; // Asegúrate de que este modelo exista
use PDF; // Asegúrate de que el alias PDF esté configurado correctamente
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportEgresados()
{
    // Obtener todos los egresados con los datos necesarios
    $egresados = Egresado::select('nombres', 'apellidos', 'año_graduacion_Xciclo', 'correo')->get(); // Asegúrate que los campos existan

    // Verifica si se están obteniendo datos
    if ($egresados->isEmpty()) {
        return redirect()->back()->with('error', 'No hay egresados disponibles para exportar.');
    }

    // Cargar la vista y pasar los datos
    $pdf = PDF::loadView('pdf.egresados', compact('egresados'));

    return $pdf->download('egresados_por_año.pdf');
}

public function exportEmpleabilidad()
{
    // Obtener datos de empleabilidad
    $empleabilidad = Egresado::select('nombres', 'apellidos', 'está_laborando', 'año_graduacion_Xciclo')->get();

    // Verifica si se están obteniendo datos
    if ($empleabilidad->isEmpty()) {
        return redirect()->back()->with('error', 'No hay datos de empleabilidad disponibles para exportar.');
    }

    // Cargar la vista y pasar los datos
    $pdf = PDF::loadView('pdf.empleabilidad', compact('empleabilidad'));

    return $pdf->download('reporte_empleabilidad.pdf');
}
public function exportEgresadosWord()
{
    // Obtener todos los egresados
    $egresados = Egresado::select('nombres', 'apellidos', 'año_graduacion_Xciclo', 'correo')->get();

    // Verifica si se están obteniendo datos
    if ($egresados->isEmpty()) {
        return redirect()->back()->with('error', 'No hay egresados disponibles para exportar.');
    }

    // Crear un nuevo objeto de PHPWord
    $phpWord = new \PhpOffice\PhpWord\PhpWord();

    // Agregar una sección al documento
    $section = $phpWord->addSection();

    // Agregar un título
    $section->addTitle('Reporte de Egresados por Año', 1);

    // Agregar una tabla
    $table = $section->addTable();

    // Agregar encabezados de la tabla
    $table->addRow();
    $table->addCell(2000)->addText('Nombres');
    $table->addCell(2000)->addText('Apellidos');
    $table->addCell(2000)->addText('Año de Graduación');
    $table->addCell(2000)->addText('Correo');

    // Agregar los datos de los egresados a la tabla
    foreach ($egresados as $egresado) {
        $table->addRow();
        $table->addCell(2000)->addText($egresado->nombres);
        $table->addCell(2000)->addText($egresado->apellidos);
        $table->addCell(2000)->addText($egresado->año_graduacion_Xciclo);
        $table->addCell(2000)->addText($egresado->correo);
    }

    // Guardar el documento como un archivo .docx
    $fileName = 'egresados_por_año.docx';
    $filePath = storage_path("app/public/{$fileName}");
    
    $phpWord->save($filePath, 'Word2007');

    return response()->download($filePath)->deleteFileAfterSend(true);
}
public function exportEmpleabilidadWord()
    {
        // Obtener los datos de empleabilidad desde la base de datos
        $empleabilidad = Egresado::all(); // Obtiene todos los registros de la tabla egresados

        // Crear un nuevo objeto PhpWord
        $phpWord = new PhpWord();
        
        // Agregar una nueva sección
        $section = $phpWord->addSection();
        
        // Agregar un título
        $section->addTitle('Reporte de Empleabilidad de Egresados', 1);
        
        // Agregar una tabla
        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '999999']);
        
        // Agregar encabezados de la tabla
        $table->addRow();
        $table->addCell(2000)->addText('Nombres');
        $table->addCell(2000)->addText('Apellidos');
        $table->addCell(2000)->addText('Estado Laboral Actual');
        $table->addCell(2000)->addText('Año de Graduación');
        
        // Agregar los datos de cada egresado
        foreach ($empleabilidad as $egresado) {
            $table->addRow();
            $table->addCell(2000)->addText($egresado->nombres);
            $table->addCell(2000)->addText($egresado->apellidos);
            $table->addCell(2000)->addText($egresado->está_laborando ? 'EMPLEADO' : 'BUSCANDO EMPLEO');
            $table->addCell(2000)->addText($egresado->año_graduacion_Xciclo);
        }

        // Guardar el archivo Word en la salida
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="reporte_empleabilidad.docx"');
        
        // Guardar el documento en la salida estándar
        $phpWord->save('php://output');
        
        exit;
    }
    public function exportEmpleabilidadExcel()
    {
        // Obtener los datos de empleabilidad desde la base de datos
        $empleabilidad = Egresado::all(); // Obtiene todos los registros de la tabla egresados

        // Crear un nuevo objeto Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Agregar un título
        $sheet->setTitle('Reporte de Empleabilidad');
        $sheet->setCellValue('A1', 'Reporte de Empleabilidad de Egresados');
        
        // Agregar encabezados de la tabla
        $sheet->setCellValue('A3', 'Nombres');
        $sheet->setCellValue('B3', 'Apellidos');
        $sheet->setCellValue('C3', 'Estado Laboral Actual');
        $sheet->setCellValue('D3', 'Año de Graduación');

        // Agregar los datos de cada egresado
        $row = 4; // Comenzar a agregar datos desde la fila 4
        foreach ($empleabilidad as $egresado) {
            $sheet->setCellValue('A' . $row, $egresado->nombres);
            $sheet->setCellValue('B' . $row, $egresado->apellidos);
            $sheet->setCellValue('C' . $row, $egresado->está_laborando ? 'EMPLEADO' : 'BUSCANDO EMPLEO');
            $sheet->setCellValue('D' . $row, $egresado->año_graduacion_Xciclo);
            $row++;
        }

        // Establecer las cabeceras para la descarga del archivo Excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="reporte_empleabilidad.xlsx"');
        
        // Crear el escritor y guardar el archivo en la salida estándar
        $writer = new Xlsx($spreadsheet); 
        $writer->save('php://output');
        
        exit;
    }

    public function exportEgresadosExcel()
    {
        // Obtener todos los egresados
$egresados = Egresado::select('nombres', 'apellidos', 'año_graduacion_Xciclo', 'correo')->get();

// Verifica si se están obteniendo datos
if ($egresados->isEmpty()) {
    return redirect()->back()->with('error', 'No hay egresados disponibles para exportar.');
}

    // Crear un nuevo objeto de Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar un título
    $sheet->setCellValue('A1', 'Reporte de Egresados por Año');
    $sheet->mergeCells('A1:D1');
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
    $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

    // Agregar encabezados de la tabla
    $sheet->setCellValue('A2', 'Nombres');
    $sheet->setCellValue('B2', 'Apellidos');
    $sheet->setCellValue('C2', 'Año de Graduación');
    $sheet->setCellValue('D2', 'Correo');

    // Estilizar encabezados
    $sheet->getStyle('A2:D2')->getFont()->setBold(true);
    $sheet->getStyle('A2:D2')->getAlignment()->setHorizontal('center');

    // Agregar los datos de los egresados a la hoja
    $row = 3; // Inicia en la fila 3
    foreach ($egresados as $egresado) {
        $sheet->setCellValue("A{$row}", $egresado->nombres);
        $sheet->setCellValue("B{$row}", $egresado->apellidos);
        $sheet->setCellValue("C{$row}", $egresado->año_graduacion_Xciclo);
        $sheet->setCellValue("D{$row}", $egresado->correo);
        $row++;
    }

    // Ajustar ancho de columnas automáticamente
    foreach (range('A', 'D') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Guardar el archivo como Excel
    $fileName = 'egresados_por_año.xlsx';
    $filePath = storage_path("app/public/{$fileName}");

    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);

    // Descargar el archivo y eliminarlo después de enviarlo
    return response()->download($filePath)->deleteFileAfterSend(true);
    }
}