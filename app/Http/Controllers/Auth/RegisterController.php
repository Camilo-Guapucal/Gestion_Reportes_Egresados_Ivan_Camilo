<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Egresado;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class RegisterController extends Controller
{
    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');  // Asegúrate de que tienes una vista 'auth.register'
    }

    // Método para registrar un nuevo egresado
    public function register(Request $request)
{
    // Validación de datos
    $validated = $this->validator($request->all())->validate();

    // Crear el egresado en la base de datos
    try {
        Egresado::create([
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'identificación' => $validated['identificación'],
            'año_graduacion_Xciclo' => $validated['año_graduacion_Xciclo'],
            'está_laborando' => $validated['está_laborando'],
            'lugar_de_trabajo' => $validated['lugar_de_trabajo'] ?? null,
            'correo' => $validated['correo'],
            'contraseña' => Hash::make($validated['contraseña']),
        ]);

        // Redirigir al inicio de sesión
        return redirect()->route('login')->with('status', 'Registro exitoso. Por favor, inicie sesión.');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withErrors(['error' => 'No se pudo registrar el usuario: ' . $e->getMessage()])
            ->withInput();
    }    
}


    // Método de validación
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'identificación' => ['required', 'string', 'max:15'],
            'año_graduacion_Xciclo' => ['required', 'string', 'max:10'],
            'está_laborando' => ['required', 'string', 'in:sí,no'], // Cambia según tus opciones
            'lugar_de_trabajo' => ['nullable', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:egresados'], // Asegúrate que sea único en la tabla egresados
            'contraseña' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}