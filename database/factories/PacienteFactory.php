<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'rut' => mt_Rand(01, 25).'.'.mt_Rand(100, 999).'.'.mt_Rand(100, 999).'-'.$this->faker->randomElement([mt_Rand(0, 9), 'k']),
            'nombres' => $this->faker->name(),
            'apellido_uno' => $this->faker->lastName(),
            'apellido_dos' => $this->faker->lastName(),
            'telefono_uno' => $this->faker->phoneNumber(),
            'telefono_dos' => $this->faker->phoneNumber(),
            'profesion' => $this->faker->sentence(2),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'email' => $this->faker->unique()->safeEmail(),
            'fecha_nac' => $this->faker->DateTime(),
            'id_prevision' => mt_Rand(1, 10),
            'id_direccion' => mt_Rand(1, 12),
            'created_at' => now()
            /*'direccion' => $this->faker->state(),
            'antecendentes' => Str::random(5),


            'acepta_transfusion' => mt_Rand(0, 1),
            'donante' => Str::random(20),
            'otras_patologias' => Str::random(20),
            'datos_confidenciales' => Str::random(20),
            'premium' => mt_Rand(1000000, 9999999),

            'dona_sangre' => mt_Rand(0, 1),
            'patologias_cronicas' => Str::random(1),
            'antecedentes_medicos' => Str::random(10),
             'fecha_premium' => now(),
             'cod_exe' => mt_Rand(1000000, 9999999),
             'rut_medico' => Str::random(1),
            'nombre_medico_cert' => Str::random(10),
            'cronico' => mt_Rand(1000000, 9999999),
            'cod_far' => mt_Rand(1000000, 9999999),
            'rut_asistente' => Str::random(10),
            'rut_vendedor' => Str::random(10),
            'sangre_otros' => Str::random(20),
            'rompeclave' => mt_Rand(1000000, 9999999),
            'ciudad' => Str::random(20),
            'region' => Str::random(20),
            'dona_organos' => mt_Rand(0, 2),

            'fmuce' => mt_Rand(1000000, 9999999),
            'fmucns' => mt_Rand(1000000, 9999999),
            'cod_agr' => mt_Rand(1000000, 9999999),
            'recordatorio_premium' => now(),
            */

        ];
    }
}