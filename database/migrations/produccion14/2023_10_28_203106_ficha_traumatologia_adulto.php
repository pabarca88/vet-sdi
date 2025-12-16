<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaTraumatologiaAdulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_traumatologia_adulto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('e_causa_traum');
            $table->string('obs_e_causa_traum');
            $table->string('mc_ex_fisico_cons');
            $table->string('obs_egp_tr');
            $table->string('mc_masas_tu');
            $table->string('egp_trauma_mt');
            $table->integer('tto_trauma');
            $table->string('rec_tto_trauma');
            $table->integer('pr_trauma');
            $table->string('tipo_proc_trauma');
            $table->string('plan_proc_trauma');
            $table->integer('tr_gen_cir');
            $table->string('obs_gen_plan_tto');
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
        Schema::dropIfExists('ficha_traumatologia_adulto');
    }
}
