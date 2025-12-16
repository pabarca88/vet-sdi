<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaOrlRinofibro20221022 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_otorrino', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_fichas_atenciones');
            $table->bigInteger('id_paciente');
            $table->integer('id_id_usa_audifono')->nullable();
            $table->string('audifono',40)->nullable();
            $table->integer('apreciacion_auditiva')->nullable();
            $table->string('aprec_auditiva_def', 50)->nullable();
            $table->integer('examen_oi')->nullable();
            $table->string('ex_oi_anormal', 100)->nullable();
            $table->integer('examen_od')->nullable();
            $table->string('ex_od_anormal',100)->nullable();
            $table->string('obs_ex_oidos')->nullable();
            $table->integer('examen_bio_oi')->nullable();
            $table->string('obs_examen_bio_oi')->nullable();
            $table->integer('examen_bio_od')->nullable();
            $table->string('obs_examen_bio_od',100)->nullable();
            $table->string('obs_ex_biom',255)->nullable();
            $table->integer('nariz_general')->nullable();
            $table->string('det_nariz_general',100)->nullable();
            $table->string('apreciacion_resp',100)->nullable();
            $table->string('aprec_resp_def',250)->nullable();
            $table->integer('examen_fni')->nullable();
            $table->string('ex_fni_anormal',100)->nullable();
            $table->integer('examen_fnd')->nullable();
            $table->string('ex_fnd_anormal',100)->nullable();
            $table->string('obs_ex_nasal',250)->nullable();
            $table->integer('disfonia')->nullable();
            $table->string('det_disfonia',100)->nullable();
            $table->integer('ex_boca')->nullable();
            $table->string('detalle_ex_boca',100)->nullable();
            $table->integer('examen_faringe')->nullable();
            $table->string('ex_farige_anormal',100)->nullable();
            $table->integer('examen_laringe')->nullable();
            $table->string('ex_larige_anormal',100)->nullable();
            $table->string('obs_ex_orl',255)->nullable();
            $table->string('hip-diag_orl',100)->nullable();
            $table->string('ind_orl',100)->nullable();
            $table->tinyInteger('estado')->defaul('1');
            $table->timestamps();
        });

        /**RINOFIBROSCOPIA */
        Schema::create('ficha_otorrino_rinof', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_fichas_atenciones');
            $table->bigInteger('id_ficha_otorrino');
            $table->bigInteger('id_paciente');
            $table->string('muc_nasal_permeab',200)->nullable();
            $table->string('cornetes',200)->nullable();
            $table->string('tabique',200)->nullable();
            $table->string('tumor',200)->nullable();
            $table->string('rinofaringe',200)->nullable();
            $table->string('orofaringe',200)->nullable();
            $table->string('laringe',200)->nullable();
            $table->string('cuerdas',200)->nullable();
            $table->string('movilidad',200)->nullable();
            $table->string('cierre_glotico',200)->nullable();
            $table->string('img_1',100)->nullable();
            $table->string('img_2',100)->nullable();
            $table->string('img_3',100)->nullable();
            $table->string('img_4',100)->nullable();
            $table->string('img_5',100)->nullable();
            $table->string('img_6',100)->nullable();
            $table->string('diag_endos',200)->nullable();
            $table->string('observaciones_endos',200)->nullable();
            $table->tinyInteger('estado')->defaul('1');
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
        Schema::dropIfExists('ficha_otorrino');
        Schema::dropIfExists('ficha_otorrino_rinof');
    }
}
