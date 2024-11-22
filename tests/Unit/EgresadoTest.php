<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Egresado;

class EgresadoTest extends TestCase
{
    use RefreshDatabase;

    public function test_se_crea_un_usuario_correctamente()
    {
        // Crear un egresado
        $egresado = Egresado::create([
            'nombres' => 'Felix Metz', 
            'apellidos' => 'Metz',
            'identificación' => '123456',
            'año_graduacion_Xciclo' => '2022',
            'está_laborando' => 'Sí',
            'lugar_de_trabajo' => 'XYZ Company',
            'correo' => 'egresado@prueba.com',
            'contraseña' => bcrypt('password123')
        ]);
    
        // Verificar que el egresado fue creado en la base de datos
        $this->assertDatabaseHas('egresados', [
            'nombres' => 'Felix Metz',
            'correo' => 'egresado@prueba.com'
        ]);
    }
}
