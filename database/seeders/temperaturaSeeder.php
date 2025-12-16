<?php

namespace Database\Seeders;

use App\Models\Temperatura;
use Illuminate\Database\Seeder;

class temperaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Temperatura::create([
            'descripcion' => 'No Mayor de 25°',
            'comentario' => ''
        ]);

        Temperatura::create([
            'descripcion' => 'No Mayor de 30°',
            'comentario' => ''
        ]);

        Temperatura::create([
            'descripcion' => 'No Mayor de 25° Protegido de la luz',
            'comentario' => ''
        ]);

        Temperatura::create([
            'descripcion' => 'entre 2° y 8° Protegido de la luz',
            'comentario' => ''
        ]);

        Temperatura::create([
            'descripcion' => 'entre 2° y 8° S/Protección de luz',
            'comentario' => ''
        ]);

        Temperatura::create([
            'descripcion' => 'Temperatura ambiente',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Entre 15° y 30°',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'No Mayor de 30° Protegido de la luz',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Sin Información',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Entre 15° y 25°',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Bajo los  -10°',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'entre 4° y 25°',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'entre  -25° y -15° posición vertical',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Entre +2° y -8°',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Entre 15° y 25° Protegido de la luz',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Temp ambiente Protegido de la luz',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'Entre +2° y +25° protegido de la luz',
            'descripcion' => ''
        ]);
        Temperatura::create([
            'descripcion' => 'entre  -10° y -20°',
            'descripcion' => ''
        ]);
    }
}