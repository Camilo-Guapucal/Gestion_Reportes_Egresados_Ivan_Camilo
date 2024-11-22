<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Egresado extends Authenticatable // Hereda de Authenticatable si este modelo se usará para autenticación
{
    use HasFactory, Notifiable;

    // Define el nombre de la tabla asociada
    protected $table = 'egresados';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombres',
        'apellidos',
        'identificación',
        'año_graduacion_Xciclo',
        'está_laborando',
        'lugar_de_trabajo',
        'correo',
        'contraseña',
    ];

    // Campos que deben ocultarse al serializar el modelo, como contraseñas
    protected $hidden = [
        'contraseña', 'remember_token',
    ];

    // Renombra el atributo `contraseña` para que funcione con los métodos de autenticación de Laravel
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
    public function getAuthIdentifierName()
{
    return 'correo';
}

}
