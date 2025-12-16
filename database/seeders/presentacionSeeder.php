<?php

namespace Database\Seeders;

use App\Models\Presentacion;
use Illuminate\Database\Seeder;

class presentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentacion::create([
            'descripcion_presentacion'=> '30 comprimidos'
        ]);

        Presentacion::create([
            'descripcion_presentacion'=> '60 comprimidos'
        ]);
        Presentacion::create([
            'descripcion_presentacion'=> '90 comprimidos'
        ]);
        Presentacion::create([
            'descripcion_presentacion'=> '120 ml'
        ]);
        Presentacion::create([
            'descripcion_presentacion'=> '35 gr'
        ]);
        Presentacion::create([
            'descripcion_presentacion'=> '60 gr'
        ]);
        Presentacion::create([
            'descripcion_presentacion'=> '100 gr'
        ]);
    }
}
