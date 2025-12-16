<?php

namespace Database\Seeders;

use App\Models\Examen;
use App\Models\ExamenPPF;
use App\Models\TipoExamen;
use Illuminate\Database\Seeder;

class examen_ppfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);

        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);

        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);

        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);

        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);

        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
        ExamenPPF::create([
            'id_prioridad'=> mt_Rand(1, 5),
            'id_paciente'=> mt_Rand(1, 10),
            'id_profesional'=>mt_Rand(1, 10),
            'id_ficha_atencion'=> mt_Rand(1, 30),
            'examen' => Examen::where('id', mt_Rand(1, 11))->first()->nombre,
            'tipo_examen' => TipoExamen::where('id', mt_rand(1, 7))->first()->nombre


        ]);
    }
}