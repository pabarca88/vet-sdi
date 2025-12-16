<?php

namespace Database\Seeders;

use App\Models\Direccion;
use Illuminate\Database\Seeder;

class direccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direccion::create([
            'direccion'=>'uruguay',
            'numero_dir'=>810,
            'id_ciudad'=>5
        ]);
        Direccion::create([
            'direccion'=>'viana',
            'numero_dir'=>1111,
            'id_ciudad'=>6
        ]);
        Direccion::create([
            'direccion'=>'alvarez',
            'numero_dir'=>1125,
            'id_ciudad'=>1
        ]);
        
        Direccion::create([
            'direccion'=>'colon',
            'numero_dir'=>1515,
            'id_ciudad'=>9
        ]);

        Direccion::create([
            'direccion'=>'gran avenida',
            'numero_dir'=>1512,
            'id_ciudad'=>13
        ]);

        Direccion::create([
            'direccion'=>'avenida ecuador',
            'numero_dir'=>162,
            'id_ciudad'=>14
        ]);

        Direccion::create([
            'direccion'=>'uno norte',
            'numero_dir'=>1557,
            'id_ciudad'=>19
        ]);

        Direccion::create([
            'direccion'=>'Baquedano',
            'numero_dir'=>854,
            'id_ciudad'=>12
        ]);

        Direccion::create([
            'direccion'=>'pasaje huemul',
            'numero_dir'=>11,
            'id_ciudad'=>3
        ]);

        Direccion::create([
            'direccion'=>'pedro montt',
            'numero_dir'=>2354,
            'id_ciudad'=>11
        ]);

        Direccion::create([
            'direccion'=>'avenida españa',
            'numero_dir'=>111,
            'id_ciudad'=>6
        ]);

        Direccion::create([
            'direccion'=>'San martin',
            'numero_dir'=>16,
            'id_ciudad'=>5
        ]);
    }
}
