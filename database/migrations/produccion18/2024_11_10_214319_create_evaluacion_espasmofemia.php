<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionEspasmofemia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_espasmofemia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_ficha_fono')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->integer('modo_resp')->nullable(); // - select-one
            $table->string('cond_aparicion')->nullable(); // - textarea
            $table->string('evol')->nullable(); // - textarea
            $table->string('trat_ant')->nullable(); // - textarea
            $table->string('perso')->nullable(); // - textarea
            $table->string('con_prob')->nullable(); // - textarea
            $table->string('fen_em')->nullable(); // - textarea
            $table->string('fact_her')->nullable(); // - textarea
            $table->string('rel_fam')->nullable(); // - textarea
            $table->string('obs_coment_ag')->nullable(); // - textarea
            $table->string('ev_ofa')->nullable(); // - select-one
            $table->string('obs_ofa')->nullable(); // - textarea
            $table->string('praxias')->nullable(); // - select-one
            $table->string('obs_praxias')->nullable(); // - textarea
            $table->string('resp')->nullable(); // - select-one
            $table->string('obs_resp')->nullable(); // - textarea
            $table->string('musc')->nullable(); // - textarea
            $table->string('obs_coment_eval')->nullable(); // - textarea
            $table->string('fluidez')->nullable(); // - textarea
            $table->string('ritmo')->nullable(); // - textarea
            $table->string('prosodia')->nullable(); // - textarea
            $table->string('cond_verb')->nullable(); // - textarea
            $table->string('condmot')->nullable(); // - textarea
            $table->string('enunc')->nullable(); // - textarea
            $table->string('emocional')->nullable(); // - textarea
            $table->string('obs_coment_hab')->nullable(); // - textarea
            $table->string('lectsin_verb')->nullable(); // - textarea
            $table->string('lectsin_mot')->nullable(); // - textarea
            $table->string('lectsin_enun')->nullable(); // - textarea
            $table->string('lectsin_emoc')->nullable(); // - textarea
            $table->string('lectcon_verb')->nullable(); // - textarea
            $table->string('lectcon_mot')->nullable(); // - textarea
            $table->string('lectcon_enun')->nullable(); // - textarea
            $table->string('lectcon_emoc')->nullable(); // - textarea
            $table->string('obs_coment_lect')->nullable(); // - textarea
            $table->string('con_verb_pal_or')->nullable(); // - textarea
            $table->string('con_mot_pal_or')->nullable(); // - textarea
            $table->string('caract_enunc_pal_or')->nullable(); // - textarea
            $table->string('fen_asoc_pal_or')->nullable(); // - textarea
            $table->string('con_verb_pal_ser')->nullable(); // - textarea
            $table->string('con_mot_pal_ser')->nullable(); // - textarea
            $table->string('caract_enunc_pal_ser')->nullable(); // - textarea
            $table->string('fen_asoc_pal_ser')->nullable(); // - textarea
            $table->string('obs_coment_rep')->nullable(); // - textarea
            $table->string('dg_espasm')->nullable(); // - select-one
            $table->string('grav_espasm')->nullable(); // - select-one
            $table->string('plan')->nullable(); // - textarea

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
        Schema::dropIfExists('evaluacion_espasmofemia');
    }
}
