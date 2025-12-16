<?php

namespace Database\Factories;

use App\Models\LugarAtencion;
use Illuminate\Database\Eloquent\Factories\Factory;

class LugarAtencionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LugarAtencion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => 'lugar atencion '.$this->faker->name(),
            'rut' => mt_Rand(01, 25).'.'.mt_Rand(100, 999).'.'.mt_Rand(100, 999).'-'.$this->faker->randomElement([mt_Rand(0, 9), 'k']),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'id_direccion' => mt_Rand(1, 10),

        ];
    }
}