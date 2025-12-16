<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpicrisisCarnetsCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epicrisis_carnets_cirugias', function (Blueprint $table) {
            $table->id();

            $table->date('inicio_hospitalizacion')->nullable();
            $table->date('fin_hospitalizacion')->nullable();
            $table->string('diagnostico_ingreso')->nullable();
            $table->string('diagnostico_alta')->nullable();
            $table->string('tratamientos_cirugias')->nullable();
            $table->string('procedimientos_quirurgicos_cirugia')->nullable();
            $table->string('otros_tratamientos_procedimientos')->nullable();

            //Cirugia Quirurgica
            $table->string('tratamientos_controles')->nullable();
            $table->string('procedimientos_quirurgicos_controles')->nullable();

            //Parto Normal

            $table->string('herida_operatoria')->nullable();
            $table->string('pezones')->nullable();
            $table->string('lactancia')->nullable();
            $table->dateTime('fecha_alta')->nullable();
            $table->string('condicion_salud')->nullable();

            $table->date('fecha_control')->nullable();
            $table->string('indicaciones_alta')->nullable();

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
        Schema::dropIfExists('epicrisis_carnets_cirugias');
    }
}