<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaUrologiaAdulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_urologia_adulto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('mc_ex_fisico_cons');
            $table->string('uro_gen_ext');
            $table->string('uro_gen_int');
            $table->string('urgencia_uro');
            $table->string('obs_egp_uro');
            $table->string('uro_res_exam');
            $table->string('imagen_uro_pre')->nullable();
            $table->string('imagen_uro_post')->nullable();
            $table->string('obs_fotos_uro');
            $table->integer('tto_uro');
            $table->string('rec_tto_uro');
            $table->integer('pr_uro');
            $table->string('tipo_proc_uro');
            $table->string('plan_proc_uro');
            $table->integer('urogen_cir');
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
        Schema::dropIfExists('ficha_urologia_adulto');
    }
}
