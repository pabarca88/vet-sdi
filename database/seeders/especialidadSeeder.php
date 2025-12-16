<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Especialidad;
use App\Models\SubTipoEspecialidad;
use App\Models\TipoEspecialidad;

class especialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {


        $esp = Especialidad::create([
            'nombre' => 'MÉDICOS',
            'estado' => '1'
        ]);

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'CIRUGIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Abdominal General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Bariátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugia Broncopulmonar',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Cardiovascular',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Cardiovascular Adultos',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Cardiovascular Niños',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Coloproctológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía de Cabeza y Cuello',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía de la mama',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía del Tórax',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía digestiva',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Gástrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía maxilofacial',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Nefrourológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Oncológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Pancreas',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Plástica y Reparadora',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía Vascular Periférica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        // ---------------------------------------------
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ESPECIALIDADES MÉDICAS(der,oft,oto,uro)',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Dermatología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Oftalmología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Otorrinolaringología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Urología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -----------------------

        $tipo_esp =  TipoEspecialidad::create([
            'nombre' =>
            'GINECO-OBSTETRÍCIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecología endocrinológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecología  Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecología Infertilidad',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecología Oncológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecologia y Obtetricia General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina Materno Fetal',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // ---------------------------------------------

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA DE ALTURA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina de Altura',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -------------------------------------------

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA DEL TRABAJO',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina del Trabajo',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -------------------------------------------
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA DEPORTIVA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina deportiva General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina deportiva Alto Rendimiento',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // ---------------------------------------------------
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA FISICA Y REHABILITACIÓN',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Mdicina física y Rehabilitación General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Mdicina física y Rehabilitación Neurológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Mdicina física y Rehabilitación Respiratoria',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // ---------------------------------------------------

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina Familiar',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina general adultos y niños',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina general a Domicilio',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        // ---------------------------------------------------
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'MEDICINA INTERNA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Alimentación y Nutrición',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Broncopulmonar',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Diabetología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Endocrinología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Endoscopía Digestiva',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Gastroenterología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Geriatría',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Hematología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Hepatología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Infectología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Inmunología y Alérgias',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Medicina Nuclear',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Nefrología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Nefrourología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Oncología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Parasitología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Quimioterapia',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Radioterapia',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Reumatología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        // -----------------------------------
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'NEUROLOGÍA Y NEUROCIRUGÍA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neurología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neurocirugía',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neuropsiquiatría',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neuroradiología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -----------------------------------


        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'PEDIATRÍA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Alergología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Alimentación y Nutrición  Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Broncopulmonar Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cardiología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cirugía y Traumatología Pediatrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Dermatología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Endocrinología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Gastroenterología  Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Ginecología  Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Nefrología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neonatología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neurología Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Neurosiquiatría Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Oftalmología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Oncología y Radioterapia  Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Otorrinolaringología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Pediatría General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Urología Pediátrica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);


        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'SIQUIATRÍA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Psiquiatría General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Adicciones',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -----------------------------------

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'TRAUMATOLOGIA Y ORTOPEDIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología Cadera',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología Codo',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología Columna',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología General',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología Hombro',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Traumatología Rodilla',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        $esp = Especialidad::create([
            'nombre' =>
            'ODONTÓLOGOS',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'CIRUGÍA MAXILOFACIAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ENDODÓNCIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'IMPLANTOLOGÍA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ODONTOLOGÍA COSMÉTICA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ODONTOLOGÍA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ODONTOPEDIATRÍA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ORTODÓNCIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'PERIODÓNCIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ODONTOPROTESISTA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'RADIOLOGÍA DENTAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'REHABILITACIÓN ORAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        // -------------------------------
        $esp = Especialidad::create([
            'nombre' =>
            'KINESIOLOGIA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'KINESIOLOGIA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Respiratoria',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Traumatológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Neurológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Tercera Edad',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Infantil',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Kinesiología Del Desarrollo',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // -------------------------------

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'KINESIOLOGIA ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'KINESIOLOGIA DOMICILIARIA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        // -------------------------------

        $esp = Especialidad::create([
            'nombre' =>
            'FONOAUDIOLOGÍA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'FONOAUDIOLOGIA CLÍNICA ADULTOS Y NIÑOS',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'FONOAUDIOLOGIA EDUCACIONAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'FONOAUDIOLOGIA ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Fonoaudiología Habla y Lenguaje',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Fonoaudiología Neurológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Fonoaudiología de la Audición',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Fonoaudiología del Canto',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // ---------------------------------

        $esp = Especialidad::create([
            'nombre' =>
            'NUTRICIÓN Y DIETÉTICAo',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'NUTRICIONISTA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'NUTRICIONISTA PEDIÁTRICA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'NUTRICIONISTA ESPECIALIDAD',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Obesidad',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Diabetes',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Dietología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Transtornos Metabólicos',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Tercera Edad',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        $esp = Especialidad::create([
            'nombre' =>
            'SICOLOGÍA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'SICOLOGÍA GENERAL ADULTOS',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'SICOLOGÍA GENERAL INFANTIL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'SICOLOGÍA LABORAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'SICOLOGÍA ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Sicología Adicciones',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Sicología de la Obesidad',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Sicología Oncológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        // ---------------------------------

        $esp = Especialidad::create([
            'nombre' => 'MATRÓN/A',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ATENCIÓN EMBARAZO',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ANTICONCEPCIÓN',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ATENCIÓN PUERPERIO',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        // ----------------------------

        $esp = Especialidad::create([
            'nombre' => 'ENFERMERA UNIVERSITARIA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ENFERMERÍA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Cuidado de enfermos',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Curaciones tratamientos',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        SubTipoEspecialidad::create([
            'nombre' =>
            'Control de niño sano',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);

        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ENFERMERÍA ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        // ---------------------------------

        $esp = Especialidad::create([
            'nombre' => 'TERÁPIA OCUPACIONAL',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'TERÁPIA OCUPACIONAL ADULTOS',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'TERÁPIA OCUPACIONAL NIÑOS',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);


        $esp = Especialidad::create([
            'nombre' => 'TÉCNICO ENFERMERÍA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ATENCIÓN TENS EN GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ATENCIÓN TENS ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);

        Especialidad::create([
            'nombre' => 'TECNÓLOGO MÉDICO',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'TECNOLOGÍA MÉDICA GENERAL',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'TECNOLOGÍA MÉDICA ESPECIALIZADA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Radiología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio clínico',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Anatomía Patológica',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Otorrinolaringología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Oftalmología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Cardiología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Neurología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Dental',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Citopatología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);
        SubTipoEspecialidad::create([
            'nombre' =>
            'Laboratorio Inmunología',
            'estado' => '1',
            'id_tipo_especialidad' => $tipo_esp->id
        ]);


        $esp =  Especialidad::create([
            'nombre' => 'ARSENALERÍA',
            'estado' => '1'
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ARSENALERÍA QUIRÚRGICA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);
        $tipo_esp = TipoEspecialidad::create([
            'nombre' =>
            'ARSENALERÍA OBSTÉTRICA',
            'estado' => '1',
            'id_especialidad' => $esp->id
        ]);





        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'TECNÓLOGO MÉDICO',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía digestiva',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía de Cabeza y Cuello',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía Cardiovascular',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Coloproctología',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Endoscopia Digestiva',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía de la mama',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía Plástica y Reparadora',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía del Tórax',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);
        // TipoEspecialidad::create([
        //     'nombre' =>
        //     'Cirugía Vascular Periférica',
        //     'estado' => '1',
        //     'id_especialidad' => $esp_cirugia->id
        // ]);

        // Especialidad::create([
        //     'nombre' =>
        //     'Ginecologia y Obtetricia',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Traumatología y ortopedia',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Especialidades Medicas',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Otros',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Medicina física y rehabilitación',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Psiquiatría',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Especialidades Neurologicas',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Servicios',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Medicina Interna',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Seleccione Especialidad',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Anestesiologia',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Genética y desarrollo',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Clínicas Hospitales Centros médicos',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'ADMINISTRACION',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL DE ALERGIAS',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL DIABETES',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL BRONCOPULMONAR',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL DISLIPIDEMIAS',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL CARDIOVASCULAR',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL ENDOCRINOLOGIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL ESPECIALIDADES',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL NEFROLOGIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL NEUROLOGIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL OBESIDAD',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL ONCOLOGIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL REUMATOLOGIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL SIQUIATRIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL TERCERA EDAD',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'HOSPITALES INSTITUCIONALES',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'ENFERMEDADES PROFESIONALES',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'REDMEDICHILE',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'ISAPRES CAJAS',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL CRÓNICO GENERAL',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'PORTAL FARMACIA',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Direccion de salud',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'Casas de Reposo',
        //     'estado' => '1'
        // ]);
        // Especialidad::create([
        //     'nombre' =>
        //     'unidades de Diálisis',
        //     'estado' => '1'
        // ]);
    }
}