<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaCirDigestivaGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_cir_digestiva_general', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_cirugia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('cda_mc');
            $table->string('cda_ex_fis');
            $table->integer('urgencia_cdga');
            $table->string('obs_egp_cda');
            $table->integer('tto_med_cda');
            $table->string('rec_tto_cda');
            $table->integer('pr_cda');
            $table->string('tipo_proc_cda');
            $table->string('plan_proc_cda');
            $table->integer('cirug_cda');
            $table->string('obs_plan_trat_cda');
            $table->string('cdb_ex_fisico_ab');
            $table->string('cdb_ex_tr');
            $table->integer('urgencia_cdb');
            $table->string('obs_egp_cdb');
            $table->integer('tto_med_cdb');
            $table->string('rec_tto_cdb');
            $table->integer('pr_cdb');
            $table->string('tipo_proc_cdb');
            $table->string('plan_proc_cdb');
            $table->integer('cirug_cdb');
            $table->string('obs_plan_trat_cdb');
            $table->string('cdg_mc');
            $table->string('cdg_ex_fis');
            $table->integer('urgencia_cdg');
            $table->string('obs_egp_cdg');
            $table->integer('tto_med_cdg');
            $table->string('rec_tto_cdg');
            $table->integer('pr_cdg');
            $table->string('tipo_proc_cdg');
            $table->string('plan_proc_cdg');
            $table->integer('cirug_cgd');
            $table->string('obs_plan_trat_cdg');
            $table->string('otro');
            $table->string('otro1');
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
        Schema::dropIfExists('ficha_cir_digestiva_general');
    }
}
