<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class proveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'nombre' => 'bioclin SA',
            'direccion' => 'Tupungato 2544, placilla',
            'rut' => '75125854-k',
            'email' => 'bioclin@bioclin.cl',
            'telefono' => '958452658',
            'rol_tributario' => 'insumos medicos',
        ]);
        Proveedor::create([
            'nombre' => 'Medipass',
            'direccion' => 'san bernardo 15751, Region matropolitana',
            'rut' => '78125856-k',
            'email' => 'medipass@medipass.cl',
            'telefono' => '948452658',
            'rol_tributario' => 'insumos medicos',
        ]);
        Proveedor::create([
            'nombre' => 'salud SA',
            'direccion' => 'salud 2544, placilla',
            'rut' => '73125854-k',
            'email' => 'salud@salud.cl',
            'telefono' => '958477658',
            'rol_tributario' => 'insumos medicos',
        ]);
        Proveedor::create([
            'nombre' => 'oncologico SA',
            'direccion' => 'brasil 144, Valparaíso',
            'rut' => '86125854-2',
            'email' => 'oncologico@oncologico.cl',
            'telefono' => '978452658',
            'rol_tributario' => 'insumos medicos',
        ]);
    }
}