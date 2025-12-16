<?php

namespace Database\Seeders;

use App\Models\ProductoPresentacion;
use Illuminate\Database\Seeder;

class producto_presentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductoPresentacion::create([
            'id_producto'=>1,
            'id_presentacion'=>2
        ]);

        ProductoPresentacion::create([
            'id_producto'=>5,
            'id_presentacion'=>2
        ]);
        ProductoPresentacion::create([
            'id_producto'=>5,
            'id_presentacion'=>3
        ]);
        ProductoPresentacion::create([
            'id_producto'=>2,
            'id_presentacion'=>2
        ]);
        ProductoPresentacion::create([
            'id_producto'=>1,
            'id_presentacion'=>2
        ]);
        ProductoPresentacion::create([
            'id_producto'=>1,
            'id_presentacion'=>3
        ]);
        ProductoPresentacion::create([
            'id_producto'=>1,
            'id_presentacion'=>5
        ]);
    }
}
