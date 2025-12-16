<?php

namespace Database\Seeders;

use App\Models\TipoEspecialidad;
use Illuminate\Database\Seeder;

class tipo_especialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEspecialidad::create([
            'nombre'=>'Medicina General',
            'id_especialidad'=>'1',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Medicina Familiar',
            'id_especialidad'=>'1',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Alimentación y Nutrición  Infantil',
            'id_especialidad'=>'2',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Alergología Pediátrica',
            'id_especialidad'=>'2',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'Endodoncia',
            'id_especialidad'=>'3',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Odontología General',
            'id_especialidad'=>'3',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Kinesiología',
            'id_especialidad'=>'4',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Matronas',
            'id_especialidad'=>'4',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'Laboratorio clínico',
            'id_especialidad'=>'5',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Laboratorio Cardiología',
            'id_especialidad'=>'5',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'servicios de urgencia',
            'id_especialidad'=>'6',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'ambulancias',
            'id_especialidad'=>'6',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'director administrativo',
            'id_especialidad'=>'7',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'farmacias de turno',
            'id_especialidad'=>'8',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'farmacia cronicos',
            'id_especialidad'=>'8',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'recetas lentes',
            'id_especialidad'=>'9',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'audifonos digitales',
            'id_especialidad'=>'10',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'Cirugía General',
            'id_especialidad'=>'11',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Cirugía Cardiovascular',
            'id_especialidad'=>'11',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Fonoaudiología de la audición',
            'id_especialidad'=>'12',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Fonoaudiología General',
            'id_especialidad'=>'12',
            'estado'=>'1'
        ]);


        TipoEspecialidad::create([
            'nombre'=>'Kinesiología general',
            'id_especialidad'=>'13',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Sicologia laboral',
            'id_especialidad'=>'14',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Sicología Adicciones',
            'id_especialidad'=>'14',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'unidades de Diálisis',
            'id_especialidad'=>'15',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'Terrestre',
            'id_especialidad'=>'15',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'Aéreo',
            'id_especialidad'=>'16',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'Nocturnas',
            'id_especialidad'=>'16',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Internado Permanente',
            'id_especialidad'=>'17',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'Diurnas',
            'id_especialidad'=>'17',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'Casas de Reposo',
            'id_especialidad'=>'18',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'dir salud regional',
            'id_especialidad'=>'18',
            'estado'=>'1'
        ]);

        TipoEspecialidad::create([
            'nombre'=>'direccion regional',
            'id_especialidad'=>'19',
            'estado'=>'1'
        ]);
        TipoEspecialidad::create([
            'nombre'=>'Direccion de salud',
            'id_especialidad'=>'19',
            'estado'=>'1'
        ]);
    }
}