<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GinemodalAro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gine_modal_aro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine');
            $table->date('fecha')->nullable();
            $table->string('Edad')->nullable();
            $table->integer('escolaridad')->nullable();
            $table->integer('grupo')->nullable();
            $table->integer('ant_pers')->nullable();
            $table->string('otros_ant_mat')->nullable();
            $table->integer('ant_padre')->nullable();
            $table->integer('ant_familiares_madre')->nullable();
            $table->integer('ant_familiares_padre')->nullable();
            $table->string('ant_otros')->nullable();
            $table->string('habitos_mat')->nullable();
            $table->date('f_ult_parto')->nullable();
            $table->string('num_gest')->nullable();
            $table->string('num_abortos')->nullable();
            $table->string('num_ect')->nullable();
            $table->string('num_part')->nullable();

            $table->string('num_part_espon')->nullable();
            $table->string('n_forcep')->nullable();
            $table->string('n_cesareas')->nullable();
            $table->string('obs_partos_ant')->nullable();
            $table->string('nac_vivos')->nullable();
            $table->string('viven')->nullable();
            $table->string('muert_semana')->nullable();
            $table->string('n_mortinato')->nullable();

            $table->string('peso_menor_dosquin')->nullable();
            $table->string('peso_may_cuatro')->nullable();
            $table->string('obs_ant')->nullable();
            $table->integer('fact_riesgo_obst')->nullable();
            $table->string('ot_fact_riesgo')->nullable();
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
         Schema::dropIfExists('gine_modal_aro');
    }
}
