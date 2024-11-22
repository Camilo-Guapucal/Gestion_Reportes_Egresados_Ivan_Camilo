<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Egresado;


class reporteEgresadoXanioTest extends TestCase
{
    use RefreshDatabase;

    public function test_genera_reporte_de_egresados_por_anio()
{
    // Crear un usuario autenticado
    $user = \App\Models\User::factory()->create();  // Asegúrate de que tengas un modelo User o el modelo correspondiente
    $this->actingAs($user);  // Esto simula que el usuario está autenticado

    // Crear egresados con el año de graduación '2020-1'
    $egresados = \App\Models\Egresado::factory()->count(5)->create([
        'año_graduacion_Xciclo' => '2020-1',
    ]);

    // Llama a la ruta del reporte con el parámetro 'anio_graduacion' en el query string
    $response = $this->get('/reporte?anio_graduacion=2020-1');

    // Verifica que la respuesta sea exitosa (200)
    $response->assertStatus(200);

    // Verifica que la respuesta contenga los datos esperados
    $response->assertSee('Total Egresados: 5');
}


}
