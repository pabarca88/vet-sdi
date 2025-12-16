<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGineObstControlPuerpCirugia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gineco_cont_puerp_cir', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->integer('id_ficha_cont_emb')->nullable();
            $table->integer('id_ficha_gine')->nullable();
            $table->integer('id_ant_go')->nullable();
            $table->integer('id_protocolo')->nullable();
            $table->integer('id_carne_alta')->nullable();
            $table->string(' e_general')->nullable();
            $table->integer('parto_cesarea')->nullable();
            $table->integer('parto_normal')->nullable();
            $table->integer('cirugia_gine_obst')->nullable();
            $table->string('hda_operatoria')->nullable();
            $table->string('retiro_ptos')->nullable();
            $table->string('insp_abd')->nullable();
            $table->string('tacto')->nullable();
            $table->string('mamas')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('ficha_gin_cont_puerp_cir');
    }
}
