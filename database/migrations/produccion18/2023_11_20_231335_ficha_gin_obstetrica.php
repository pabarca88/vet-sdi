<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGinObstetrica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gineco_obstetrica', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ficha_gine_obt');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->integer('id_ant_go')->nullable();
            $table->integer('m_cons')->nullable();
            $table->string('obs_m_cons')->nullable();
            $table->integer('menst')->nullable();
            $table->string('obs_menst')->nullable();
            $table->date('fur')->nullable();
            $table->integer('tipo_mens')->nullable();
            $table->string('obs_tipo_mens')->nullable();
            $table->string('anam')->nullable();
            $table->string('examen_fisico')->nullable();
            $table->string('hipotesis_diagnostico')->nullable();
            $table->string('diagnostico_ce10')->nullable();
            $table->boolean('cronico')->nullable();
            $table->boolean('ges')->nullable();
            $table->boolean('confidencial')->nullable();
            $table->boolean('profesional_visible')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('pulso')->nullable();
            $table->string('frecuencia_reposo')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('estado_nutricional')->nullable();
            $table->string('presion_bi')->nullable();
            $table->string('presion_bd')->nullable();
            $table->string('presion_de_pie')->nullable();
            $table->string('presion_sentado')->nullable();
            $table->string('ct_estado_conciencia')->nullable();
            $table->string('ct_lenguaje')->nullable();
            $table->string('ct_traslado')->nullable();
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
        Schema::dropIfExists('ficha_gineco_obstetrica');
    }
}
