<?php

namespace Database\Factories;

use App\Models\ContactoEmergencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoEmergenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactoEmergencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'apellido_uno'=> $this->faker->lastName(),
            'apellido_dos'=> $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'rut' => mt_Rand(01, 25).'.'.mt_Rand(100, 999).'.'.mt_Rand(100, 999).'-'.$this->faker->randomElement([mt_Rand(0, 9), 'k']),
            'fecha_nac'=> $this->faker->DateTime(),
            'id_direccion'=>mt_Rand(1, 12),
            'telefono'=> $this->faker->phoneNumber()
        ];
    }
}
