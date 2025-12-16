<?php

namespace Database\Seeders;

use App\Models\ProfesionalEspecialidad;
use Illuminate\Database\Seeder;

class profesional_especialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contador = 10;
        for ($i=0; $i <$contador ; $i++) {
            ProfesionalEspecialidad::create([
                'id_profesional' => $i+1,
                'id_tipo_especialidad' => mt_Rand(1, 10),
                'created_at' => now()
            ]);
        }
    }
}