<?php

namespace Database\Factories;

use App\Models\ProfesionalesLugaresAtencion;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesionalesLugaresAtencionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfesionalesLugaresAtencion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_profesional' => mt_Rand(1, 10),
            'id_lugar_atencion' => mt_Rand(1, 10)
        ];
    }
}