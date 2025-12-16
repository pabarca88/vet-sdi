<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosPacientesCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_pacientes_cirugias', function (Blueprint $table) {
            $table->id();


            $table->string('anamnesis')->nullable();
            $table->string('antecedentes_examenes_fisicos')->nullable();
            $table->string('hipotesis_diagnostica')->nullable();
            $table->string('diagnostico_cie10')->nullable();
            $table->string('indicaciones_ingreso')->nullable();
            $table->time('hora_operacion')->nullable();
            $table->string('hospitalizar_en')->nullable();
            $table->string('tipo_sala')->nullable();

            //Parto Normal
            $table->string('patologia_embarazo')->nullable();
            $table->string('patologia_cronica')->nullable();
            $table->string('otros_antecedentes')->nullable();
            $table->string('patologia')->nullable();
            $table->string('semanas_gestacion')->nullable();
            $table->string('otros_antecedentes_fetal')->nullable();
            $table->string('indidaciones_induccion')->nullable();
            $table->time('hora_comienzo_induccion')->nullable();
            $table->string('dilatacion')->nullable();
            $table->string('hora_parto')->nullable();
            $table->string('indicacion_control_fetal')->nullable();

            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_solicitud_pabellon')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_pacientes_cirugias');
    }
}