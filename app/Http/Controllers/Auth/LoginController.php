<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Asegúrate de importar la clase Request
use Illuminate\Support\Facades\Auth; // Asegúrate de importar la clase Auth

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Ruta a la que se redirigirá después de iniciar sesión.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // Cambia esto según la ruta a donde deseas redirigir

    /**
     * Define el campo usado para autenticarse.
     *
     * @return string
     */
    protected function username()
    {
        return 'correo'; 
    }

    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    /**
     * Maneja una solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo' => 'required|email',  
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['correo' => $request->correo, 'password' => $request->password])) {  // Usamos 'correo'
            $request->session()->regenerate();
            return redirect()->intended($this->redirectTo); // Redirige a la página deseada
        }

        // Si la autenticación falla, redirigir con un mensaje de error
        return redirect()->back()->withErrors(['correo' => 'Las credenciales son incorrectas.']);
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Cambia esto a la ruta que desees para redirigir después del logout
    }
}
