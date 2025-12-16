<?php

namespace Database\Factories;

use App\Models\Alergias_pacientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class Alergias_pacientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alergias_pacientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_paciente' => mt_Rand(1, 10),
            'id_alergia' => mt_Rand(1, 10),
            'created_at' => now()
        ];
    }
}
