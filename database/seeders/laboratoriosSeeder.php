<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use Illuminate\Database\Seeder;

class laboratoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laboratorio::create([
            'nombre' => 'bioclin SA',
            'id_direccion' => 2,
            'rut' => '75125854-k',
            'email' => 'bioclin@bioclin.cl',
            'telefono' => '958452658',
        ]);
        Laboratorio::create([
            'nombre' => 'Medipass',
            'id_direccion' => 4,
            'rut' => '78125856-k',
            'email' => 'medipass@medipass.cl',
            'telefono' => '948452658',

        ]);
        Laboratorio::create([
            'nombre' => 'salud SA',
            'id_direccion' => 1,
            'rut' => '73125854-k',
            'email' => 'salud@salud.cl',
            'telefono' => '958477658',

        ]);
        Laboratorio::create([
            'nombre' => 'oncologico SA',
            'id_direccion' => 3,
            'rut' => '86125854-2',
            'email' => 'oncologico@oncologico.cl',
            'telefono' => '978452658',

        ]);
    }
}