<?php

namespace Database\Seeders;

use App\Models\ProfesionalesLugaresAtencion;
use Illuminate\Database\Seeder;

class profesional_lugares_atencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfesionalesLugaresAtencion::factory(10)->create();
    }
}
