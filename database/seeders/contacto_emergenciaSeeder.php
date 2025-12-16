<?php

namespace Database\Seeders;
use App\Models\ContactoEmergencia;
use Illuminate\Database\Seeder;

class contacto_emergenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ContactoEmergencia::factory(10)->create();
    }
}
