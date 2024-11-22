<?php

namespace Database\Factories;

use App\Models\Egresado;
use Illuminate\Database\Eloquent\Factories\Factory;

class EgresadoFactory extends Factory
{
    /**
     * El modelo que está asociado a esta fábrica.
     *
     * @var string
     */
    protected $model = Egresado::class;

    /**
     * Definir los atributos del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->firstName,  // Asegúrate de usar 'nombres'
            'apellidos' => $this->faker->lastName,
            'identificación' => $this->faker->unique()->numerify('########'),
            'año_graduacion_Xciclo' => $this->faker->year,
            'está_laborando' => $this->faker->randomElement(['Sí', 'No']),
            'lugar_de_trabajo' => $this->faker->company,
            'correo' => $this->faker->unique()->safeEmail,  // Usar 'correo' y no 'email'
            'contraseña' => bcrypt('password123'),
        ];
    }
}
