<?php

namespace Database\Factories;

use App\Models\especialidades;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class especialidadesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = especialidades::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cod_parent' => mt_Rand(1000000, 9999999),
            'txt_esp' => Str::random(20),
            'ordinal' => mt_Rand(1000000, 9999999),
            'status' => mt_Rand(1000000, 9999999),
            'type' => mt_Rand(1000000, 9999999),
            'buscador' => mt_Rand(1000000, 9999999),
            'orden_buscador' => mt_Rand(1000000, 9999999),
             'created_at' => now(),

        ];

        //
    }
}