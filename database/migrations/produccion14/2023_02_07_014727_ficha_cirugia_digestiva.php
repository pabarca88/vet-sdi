<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaCirugiaDigestiva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_cirugia_general', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ind_esp_cirugia')->nullable();
            $table->integer('organo_cg')->nullable()->default('1');
            $table->string('obs_organo_cg')->nullable();
            $table->integer('ceg_cg')->nullable()->default('1');
            $table->string('obs_ceg_cg')->nullable();
            $table->integer('masa_cg')->nullable()->default('1');
            $table->string('obs_masas_cg')->nullable();
            $table->integer('urgencia_cg')->nullable()->default('1');
            $table->string('obs_urgencia_cg')->nullable();
            $table->integer('so_cg')->nullable()->default('1');
            $table->string('obs_so_cg')->nullable();
            $table->string('obs_egp_cg')->nullable();
            $table->string('obs_gen_ex_esp_cg')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('1');
            $table->timestamps();
        });

        Schema::create('control_post_qx', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_cirugia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('eg_cpq_cg')->nullable();
            $table->string('hoc_cpa_cg')->nullable();
            $table->string('masas_cpq_cg')->nullable();
            $table->string('obs_egp_cpq_cg')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('1');
            $table->timestamps();
        });

        Schema::create('ficha_cirugia_digestiva', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_cirugia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ind_esp_cirugia')->nullable();
            $table->integer('dolor_cdg')->nullable();
            $table->string('obs_dolor_cdg')->nullable();
            $table->integer('otros_sintomas_cdg')->nullable();
            $table->string('obs_otros_sintomas_cdg')->nullable();
            $table->integer('ceg_cdg')->nullable();
            $table->string('obs_ceg_cdg')->nullable();
            $table->integer('masa_cdg')->nullable();
            $table->string('obs_masa_cdg')->nullable();
            $table->integer('urgencia_cdg')->nullable();
            $table->string('obs_urgencia_cdg')->nullable();
            $table->integer('so_cdg')->nullable();
            $table->string('obs_so_cdg')->nullable();
            $table->string('obs_egp_cdg')->nullable();
            $table->string('obs_gen_ex_esp_cdg')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('1');
            $table->timestamps();
        });

        Schema::create('ficha_cirugia_general_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profesional');
            $table->string('ind_esp_cirugia')->nullable();
            $table->integer('organo_cg')->nullable()->default('1');
            $table->string('obs_organo_cg')->nullable();
            $table->integer('ceg_cg')->nullable()->default('1');
            $table->string('obs_ceg_cg')->nullable();
            $table->integer('masa_cg')->nullable()->default('1');
            $table->string('obs_masas_cg')->nullable();
            $table->integer('urgencia_cg')->nullable()->default('1');
            $table->string('obs_urgencia_cg')->nullable();
            $table->integer('so_cg')->nullable()->default('1');
            $table->string('obs_so_cg')->nullable();
            $table->string('obs_egp_cg')->nullable();
            $table->string('obs_gen_ex_esp_cg')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('1');
            $table->timestamps();
        });

        Schema::create('ficha_cirugia_digestiva_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profesional');
            $table->string('ind_esp_cirugia')->nullable();
            $table->integer('dolor_cdg')->nullable();
            $table->string('obs_dolor_cdg')->nullable();
            $table->integer('otros_sintomas_cdg')->nullable();
            $table->string('obs_otros_sintomas_cdg')->nullable();
            $table->integer('ceg_cdg')->nullable();
            $table->string('obs_ceg_cdg')->nullable();
            $table->integer('masa_cdg')->nullable();
            $table->string('obs_masa_cdg')->nullable();
            $table->integer('urgencia_cdg')->nullable();
            $table->string('obs_urgencia_cdg')->nullable();
            $table->integer('so_cdg')->nullable();
            $table->string('obs_so_cdg')->nullable();
            $table->string('obs_egp_cdg')->nullable();
            $table->string('obs_gen_ex_esp_cdg')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('1');
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
        Schema::dropIfExists('ficha_cirugia_general');
        Schema::dropIfExists('control_post_qx');
        Schema::dropIfExists('ficha_cirugia_digestiva');
        Schema::dropIfExists('ficha_cirugia_general_tipo');
        Schema::dropIfExists('ficha_cirugia_digestiva_tipo');
    }
}
