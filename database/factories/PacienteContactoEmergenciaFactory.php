<?php

namespace Database\Factories;

use App\Models\PacienteContactoEmergencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteContactoEmergenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PacienteContactoEmergencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_paciente' => mt_Rand(1, 10),
            'id_contacto' => mt_Rand(1, 10),
            'created_at' => now()
        ];
    }
}
