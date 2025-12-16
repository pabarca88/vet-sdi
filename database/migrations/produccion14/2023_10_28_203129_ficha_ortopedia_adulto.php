<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaOrtopediaAdulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_ortopedia_adulto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_trauma')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->string('orto_peso_ad')->nullable();
            $table->string('orto_talla_ad')->nullable();
            $table->string('orto_manip_ad')->nullable();
            $table->string('orto_dolor_ad')->nullable();
            $table->string('orto_marpos_ad')->nullable();
            $table->string('orto_ea_mv_ad')->nullable();
            $table->string('orto_ea_rlp_ad')->nullable();
            $table->string('orto_ea_icls_ad')->nullable();
            $table->string('orto_ea_ir_ad')->nullable();
            $table->string('orto_ea_nb_ad')->nullable();
            $table->string('obs_e_ext_sup')->nullable();
            $table->string('orto_ep_bmm_ad')->nullable();
            $table->string('orto_ep_hlart_ad')->nullable();
            $table->string('orto_ep_dism_minf_ad')->nullable();
            $table->string('orto_ep_si_ad')->nullable();
            $table->string('orto_ep_tc_ad')->nullable();
            $table->string('orto_ep_com_ad')->nullable();
            $table->string('orto_ep_obgen_ad')->nullable();

            // $table->string('peso_ped');
            // $table->string('talla_ped');
            // $table->string('mov_espont');
            // $table->string('obs_gen_ex_esp');
            // $table->string('exp_ax_mov_cerv');
            // $table->string('exp_ax_mus_ecm');
            // $table->string('exp_ax_t_adms');
            // $table->string('exp_ax_angiom');
            // $table->string('exp_ax_cif_lumb');
            // $table->string('fe_ext_msup');
            // $table->string('dedo_res_ext_msup');
            // $table->string('rig_ext_msup');
            // $table->string('ex_msup_com');
            // $table->string('ex_minf_cad_orland');
            // $table->string('ex_minf_abd');
            // $table->string('ex_minf_pp');
            // $table->string('ex_minf_rfr');
            // $table->string('ex_minf_p_fd');
            // $table->string('ex_minf_p_vvrp');
            // $table->string('ex_minf_aspl');
            // $table->string('obs_ex_oij');

            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();

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
        Schema::dropIfExists('ficha_ortopedia_adulto');
    }
}
