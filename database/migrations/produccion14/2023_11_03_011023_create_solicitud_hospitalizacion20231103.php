<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudHospitalizacion20231103 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_hospitalizacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('tipo');// 1-urgencia 2-electivo
            $table->integer('hospen');
            $table->string('obs_hospen');
            $table->string('nom_inst');
            $table->integer('hosp_enserv');
            $table->string('obs_hosp_enserv');
            $table->integer('motivo_hosp');
            $table->string('obs_motivo_hosp');
            $table->string('obs_hospitalizar');
            $table->integer('estado');
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
        Schema::dropIfExists('solicitud_hospitalizacion');
    }
}
