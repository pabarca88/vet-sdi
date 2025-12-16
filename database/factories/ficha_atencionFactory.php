<?php

namespace Database\Factories;

use App\Models\ficha_atencion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ficha_atencionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ficha_atencion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motivo' => 'consulta prueba',
            'id_paciente' => mt_Rand(1, 10),
            'id_profesional' => mt_Rand(1, 10)


        ];
    }
}
