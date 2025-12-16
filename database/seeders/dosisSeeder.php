<?php

namespace Database\Seeders;

use App\Models\Dosis;
use Illuminate\Database\Seeder;

class dosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosis::create([
            'nombre_dosis'=> '30 dosis'
        ]);

        Dosis::create([
            'nombre_dosis'=> '60 dosis'
        ]);
        Dosis::create([
            'nombre_dosis'=> '90 dosis'
        ]);
        Dosis::create([
            'nombre_dosis'=> '120 dosis'
        ]);
        Dosis::create([
            'nombre_dosis'=> '35 dosis'
        ]);
        Dosis::create([
            'nombre_dosis'=> '1 dosis'
        ]);
        Dosis::create([
            'nombre_dosis'=> '100 dosis'
        ]);
    }
}
