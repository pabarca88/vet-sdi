<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PresentacionDosis;

class presentacion_dosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PresentacionDosis::create([
            'id_presentacion'=> 2,
            'id_dosis'=> 1
        ]);

        PresentacionDosis::create([
            'id_presentacion'=> 5,
            'id_dosis'=> 1
        ]);
        PresentacionDosis::create([
            'id_presentacion'=> 2,
            'id_dosis'=> 3
        ]);
        PresentacionDosis::create([
            'id_presentacion'=> 2,
            'id_dosis'=> 7
        ]);
        PresentacionDosis::create([
            'id_presentacion'=> 5,
            'id_dosis'=> 2
        ]);
        PresentacionDosis::create([
            'id_presentacion'=> 4,
            'id_dosis'=> 1
        ]);
        PresentacionDosis::create([
            'id_presentacion'=> 1,
            'id_dosis'=> 1
        ]);
    }
}
