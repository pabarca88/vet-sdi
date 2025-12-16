<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaCirGeneralAdulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_cir_general_adulto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('est_grl');
            $table->string('ex_seg');
            $table->string('cir_grl_urgencia');
            $table->string('obs_est_grl');
            $table->integer('tto_med_cg');
            $table->string('rec_tto_cg');
            $table->integer('pr_cg');
            $table->string('tipo_proc_cg');
            $table->string('plan_proc_cg');
            $table->integer('plan_cirugia');
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
        Schema::dropIfExists('ficha_cir_general_adulto');
    }
}
