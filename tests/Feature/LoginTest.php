<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Egresado;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_un_egresado_puede_iniciar_sesion()
    {
        // Crear un egresado con los campos correctos
        $egresado = Egresado::factory()->create([
            'nombres' => 'Felix Metz',  // Asegúrate de usar 'nombres'
            'apellidos' => 'Metz',
            'identificación' => '123456',
            'año_graduacion_Xciclo' => '2022',
            'está_laborando' => 'Sí',
            'lugar_de_trabajo' => 'XYZ Company',
            'correo' => 'egresado@prueba.com',  // Cambiado de 'email' a 'correo'
            'contraseña' => bcrypt('password123'),
        ]);

        // Simula el inicio de sesión
        $response = $this->post('/login', [
            'correo' => 'egresado@prueba.com',  // Cambiado de 'email' a 'correo'
            'password' => 'password123',
        ]);

        // Verifica que el redireccionamiento sea correcto y que el usuario esté autenticado
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($egresado);
    }
}
