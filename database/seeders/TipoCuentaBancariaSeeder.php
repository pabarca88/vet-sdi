<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCuentaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_cuenta_bancaria')->insert([
            ['descripcion' => 'Cuenta Corriente', 'estado' => 1],
            ['descripcion' => 'Cuenta de Ahorro', 'estado' => 1],
            ['descripcion' => 'Cuenta Vista', 'estado' => 1],
        ]);
    }
}
