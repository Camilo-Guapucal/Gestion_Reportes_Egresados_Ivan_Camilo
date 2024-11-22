<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExportacionReportesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function exporta_reporte_en_formato_pdf()
    {
        // Llama a la ruta de exportación en formato PDF utilizando el nombre de la ruta
        $response = $this->get(route('exportar.pdf'));

        // Verifica que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verifica que el encabezado Content-Type sea el esperado para PDF
        $response->assertHeader('Content-Type', 'application/pdf');
    }

    /** @test */
    // public function exporta_reporte_en_formato_excel()
    // {
    //     // Llama a la ruta de exportación en formato Excel utilizando el nombre de la ruta
    //     $response = $this->get(route('exportar.excel'));

    //     // Verifica que la respuesta sea exitosa
    //     $response->assertStatus(200);

    //     // Verifica que el encabezado Content-Type sea el esperado para Excel
    //     $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // }

    /** @test */
    public function exporta_reporte_en_formato_word()
    {
        // Llama a la ruta de exportación en formato Word utilizando el nombre de la ruta
        $response = $this->get(route('exportar.word'));

        // Verifica que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verifica que el encabezado Content-Type sea el esperado para Word
        $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    }
}
