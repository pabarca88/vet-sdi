<?php

namespace Database\Seeders;

use App\Models\ProfesionalEspecialidad;
use App\Models\TipoEspecialidad;
use Illuminate\Database\Seeder;

class especialidad_profesionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfesionalEspecialidad::create([
            'id_profesional'=>1,
            'id_tipo_especialidad'=>1
        ]);

        ProfesionalEspecialidad::create([
            'id_profesional'=>2,
            'id_tipo_especialidad'=>4
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>3,
            'id_tipo_especialidad'=>9
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>4,
            'id_tipo_especialidad'=>14
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>5,
            'id_tipo_especialidad'=>9
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>6,
            'id_tipo_especialidad'=>6
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>7,
            'id_tipo_especialidad'=>5
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>8,
            'id_tipo_especialidad'=>18
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>9,
            'id_tipo_especialidad'=>12
        ]);
        ProfesionalEspecialidad::create([
            'id_profesional'=>10,
            'id_tipo_especialidad'=>10
        ]);
    }
}