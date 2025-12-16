<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenPraxias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_praxias', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_ficha_fono')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->integer('prax_dg')->nullable(); // - select-one
            $table->string('prax_dg_obs')->nullable(); // - textarea
            $table->integer('prax_suc')->nullable(); // - select-one
            $table->string('prax_suc_obs')->nullable(); // - textarea
            $table->integer('prax_mast')->nullable(); // - select-one
            $table->string('prax_mast_obs')->nullable(); // - textarea
            $table->integer('prax_sop')->nullable(); // - select-one
            $table->string('prax_sop_obs')->nullable(); // - textarea
            $table->string('prax_gen_obs')->nullable(); // - textarea
            $table->integer('prax_re_m')->nullable(); // - select-one
            $table->string('prax_re_m_obs')->nullable(); // - textarea
            $table->integer('prax_re_t')->nullable(); // - select-one
            $table->string('prax_re_t_obs')->nullable(); // - textarea
            $table->integer('prax_re_cfr')->nullable(); // - select-one
            $table->string('prax_re_cfr_obs')->nullable(); // - textarea
            $table->string('praxias_tiempo_maximo')->nullable(); // - text
            $table->integer('prax_re_f')->nullable(); // - select-one
            $table->string('prax_re_f_obs')->nullable(); // - textarea
            $table->string('prax_re_obs')->nullable(); // - textarea
            $table->integer('prax_fon_t')->nullable(); // - select-one
            $table->string('prax_fon_t_obs')->nullable(); // - textarea
            $table->integer('prax_fon_i')->nullable(); // - select-one
            $table->string('prax_fon_i_obs')->nullable(); // - textarea
            $table->integer('prax_fon_e')->nullable(); // - select-one
            $table->string('prax_fon_e_obs')->nullable(); // - textarea
            $table->integer('prax_fon_av')->nullable(); // - select-one
            $table->string('prax_fon_av_obs')->nullable(); // - textarea
            $table->integer('prax_fon_r')->nullable(); // - select-one
            $table->string('prax_fon_r_obs')->nullable(); // - textarea
            $table->string('prax_fon_ex_obs')->nullable(); // - textarea
            $table->string('difon_c_pl')->nullable(); // - text
            $table->string('difon_c_bl')->nullable(); // - text
            $table->string('difon_c_fl')->nullable(); // - text
            $table->string('difon_c_kl')->nullable(); // - text
            $table->string('difon_c_gl')->nullable(); // - text
            $table->string('difon_c_tl')->nullable(); // - text
            $table->string('difon_c_pr')->nullable(); // - text
            $table->string('difon_c_br')->nullable(); // - text
            $table->string('difon_c_fr')->nullable(); // - text
            $table->string('difon_c_tr')->nullable(); // - text
            $table->string('difon_c_kr')->nullable(); // - text
            $table->string('difon_c_gr')->nullable(); // - text
            $table->string('difon_c_dr')->nullable(); // - text
            $table->string('difon_c_ot')->nullable(); // - text
            $table->string('obs_difon_c')->nullable(); // - textarea
            $table->string('ofa_lab_obs')->nullable(); // - textarea

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
        Schema::dropIfExists('examen_praxias');
    }
}
