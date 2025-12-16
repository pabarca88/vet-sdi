<?php

namespace Database\Factories;

use App\Models\alergias;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class alergiasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = alergias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_alergia'=>Str::random(5),
            'descripcion_alergia'=> Str::random(10),
            'created_at'=> now()
        ];
    }
}
