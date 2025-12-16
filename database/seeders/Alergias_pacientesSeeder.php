<?php

namespace Database\Seeders;

use App\Models\Alergias_pacientes;
use Illuminate\Database\Seeder;

class Alergias_pacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alergias_pacientes::factory(10)->create();
    }
}
