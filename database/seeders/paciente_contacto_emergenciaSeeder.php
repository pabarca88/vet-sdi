<?php

namespace Database\Seeders;
use App\Models\PacienteContactoEmergencia;
use Illuminate\Database\Seeder;

class paciente_contacto_emergenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PacienteContactoEmergencia::factory(10)->create();
    }
}
