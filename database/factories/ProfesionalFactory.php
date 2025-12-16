<?php

namespace Database\Factories;

use App\Models\Profesional;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesionalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profesional::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nombre' => $this->faker->name(),
            'apellido_uno' => $this->faker->lastName(),
            'apellido_dos' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['m', 'f']),
            'rut' => mt_Rand(01, 25).'.'.mt_Rand(100, 999).'.'.mt_Rand(100, 999).'-'.$this->faker->randomElement([mt_Rand(0, 9), 'k']),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono_uno' => $this->faker->phoneNumber(),
            'telefono_dos' => $this->faker->phoneNumber(),
            'certificado' => mt_Rand(1, 10),
            'id_direccion' => mt_Rand(1, 12),
            'id_especialidad' => mt_Rand(1, 19),

          /*  'cod_espe1' => mt_Rand(1, 10),
            'cod_espe2' => mt_Rand(1, 10),


            'fecha_ingreso' => now(),
            'fecha_certificado' => now(),
            'cod_plan' => mt_Rand(1, 10),

            'numero_certificado' => Str::random(20),
            'dv_certiicado' => Str::random(1),
            'direccion' => $this->faker->state(),
            'ciudad' => mt_Rand(0, 100),
            'region' => mt_Rand(0, 14),
            'medio_turno' => mt_Rand(1, 2),
            'especialidad' => mt_Rand(1, 2),
            */

        ];
    }
}