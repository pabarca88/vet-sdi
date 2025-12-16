<?php

namespace Database\Factories;

use App\Models\Operaciones;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperacionesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operaciones::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_operacion'=>Str::random(5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=> mt_Rand(1, 10),
            'fecha_operacion' => $this->faker->DateTime(),
            'created_at'=> now()
        ];
    }
}
