<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Egresado;
use App\Models\User; // Asegúrate de tener este modelo

class reporteEmpleabilidadegresadoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function genera_reporte_de_empleabilidad()
    {
        // Crea egresados con y sin empleo
        $egresado1 = Egresado::factory()->create(['está_laborando' => true]);
        $egresado2 = Egresado::factory()->create(['está_laborando' => false]);

        // Verificar que los egresados fueron correctamente almacenados en la base de datos
        $this->assertDatabaseHas('egresados', [
            'id' => $egresado1->id,
            'nombres' => $egresado1->nombres,
            'está_laborando' => true,
        ]);

        $this->assertDatabaseHas('egresados', [
            'id' => $egresado2->id,
            'nombres' => $egresado2->nombres,
            'está_laborando' => false,
        ]);

        // Crear un usuario autenticado
        $user = User::factory()->create();  // Asegúrate de tener un modelo User o el modelo correspondiente
        $this->actingAs($user);  // Esto simula que el usuario está autenticado

        // Llama a la ruta del reporte de empleabilidad
        $response = $this->get(route('empleabilidad')); // Usamos sin 'withoutMiddleware' porque 'actingAs' maneja la autenticación
        $response->assertStatus(200); // Verifica que la respuesta sea exitosa (200)

        // Verifica que la respuesta contenga los textos esperados en la vista
        $response->assertSee('Reporte de Empleabilidad');
        $response->assertSee('Total Egresados');
        $response->assertSee('Empleados');
        $response->assertSee('Buscando Empleo');

        // Verifica que las estadísticas de porcentaje sean correctas
        $empleados = Egresado::where('está_laborando', true)->count(); // Usar 'está_laborando' en lugar de 'Empleado'
        $totalEgresados = Egresado::count();
        $porcentajeEmpleados = ($empleados / $totalEgresados) * 100;

        // Verifica que el porcentaje de empleados aparece correctamente
        $response->assertSee(number_format($porcentajeEmpleados, 2));

        // Verifica que la tabla de egresados se muestra con los datos correctos
        $response->assertSee($egresado1->nombres);
        $response->assertSee($egresado2->nombres);
        $response->assertSee($egresado1->está_laborando ? 'Empleado' : 'Buscando Empleo'); // Usar 'está_laborando'
        $response->assertSee($egresado2->está_laborando ? 'Empleado' : 'Buscando Empleo'); // Usar 'está_laborando'
    }
}
