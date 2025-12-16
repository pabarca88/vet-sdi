<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGineObstAntecedentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gin_obst_antec', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->integer('abort')->nullable();
            $table->string('abort_obs')->nullable();
            $table->integer('ab_num')->nullable();
            $table->string('ab_n_obs')->nullable();
            $table->string('abort_obs_gl')->nullable();
            $table->integer('id_modal_abort')->nullable();
            $table->integer('emb_prev')->nullable();
            $table->string('emb_prev_obs')->nullable();
            $table->integer('pat_emb_prev')->nullable();
            $table->string('pat_emb_prev_obs')->nullable();
            $table->string('emb_prev_obs_grl')->nullable();
            $table->integer('emb_mult')->nullable();
            $table->string('emb_mult_obs')->nullable();
            $table->integer('nac_vivos')->nullable();
            $table->string('nac_vivos_obs')->nullable();
            $table->integer('nac_vivos_sal')->nullable();
            $table->string('nac_vivos_sal_obs')->nullable();
            $table->string('nac_vivos__obs_gls')->nullable();
            $table->integer('id_modal_emb')->nullable();
            $table->integer('id_modal_mamas')->nullable();
            $table->integer('id_ex_horm')->nullable();
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
        Schema::dropIfExists('ficha_gin_obst_antec');
    }
}
