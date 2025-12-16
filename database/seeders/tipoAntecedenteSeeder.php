<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoAntecedente;

class tipoAntecedenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (1,'Antecedentes Anestesias Pacientes','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (2,'Antecedentes Cirugias','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (3,'Antecedentes Fracturas Pacientes','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (4,'Antecedentes Hemorragias Pacientes','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (5,'Antecedentes Alergias','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (6,'Antecedentes Enfermedades Cronicas','',1);
        INSERT INTO `tipo_antecedente`(`id`, `nombre`, `html`, `estado`) VALUES (7,'Antecedentes Medicamentos Cronicos','',1);
        */
        TipoAntecedente::create(['id'=> 1,'nombre'=> 'Antecedentes Anestesias Pacientes','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 2,'nombre'=> 'Antecedentes Cirugias','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 3,'nombre'=> 'Antecedentes Fracturas Pacientes','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 4,'nombre'=> 'Antecedentes Hemorragias Pacientes','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 5,'nombre'=> 'Antecedentes Alergias','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 6,'nombre'=> 'Antecedentes Enfermedades Cronicas','html'=> '','estado'=> 1]);
        TipoAntecedente::create(['id'=> 7,'nombre'=> 'Antecedentes Medicamentos Cronicos','html'=> '','estado'=> 1]);
    }
}
