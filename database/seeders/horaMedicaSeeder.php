<?php

namespace Database\Seeders;

use App\Models\HoraMedica;
use Illuminate\Database\Seeder;

class horaMedicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HoraMedica::create([
            'fecha_consulta'=> '2021-11-12',
            'descripcion' => 'Evento prueba 1',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-15',
            'descripcion' => 'Evento prueba 2',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-12',
            'descripcion' => 'Evento prueba 3',
            'hora_inicio'=> '08:15:01',
            'hora_termino'=>'08:30:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-12',
            'descripcion' => 'Evento prueba 4',
            'hora_inicio'=> '12:01:00',
            'hora_termino'=>'12:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-19',
            'descripcion' => 'Evento prueba 5',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);
        HoraMedica::create([
            'fecha_consulta'=> '2021-11-15',
            'descripcion' => 'Evento prueba 6',
            'hora_inicio'=> '09:01:00',
            'hora_termino'=>'09:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-18',
            'descripcion' => 'Evento prueba 7',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);


        HoraMedica::create([
            'fecha_consulta'=> '2021-11-23',
            'descripcion' => 'Evento prueba 8',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);


        HoraMedica::create([
            'fecha_consulta'=> '2021-11-24',
            'descripcion' => 'Evento prueba 9',
            'hora_inicio'=> '08:01:00',
            'hora_termino'=>'08:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);

        HoraMedica::create([
            'fecha_consulta'=> '2021-11-24',
            'descripcion' => 'Evento prueba 10',
            'hora_inicio'=> '10:01:00',
            'hora_termino'=>'10:15:00',
            'id_profesional'=>mt_Rand(1, 10),
            //'id_lugar_atencion'=>mt_Rand(1, 10),
            //'id_asistente'=>mt_Rand(1, 10),
            'id_paciente'=>mt_Rand(1, 10),
            'id_estado'=>mt_Rand(1, 5)

        ]);
    }
}