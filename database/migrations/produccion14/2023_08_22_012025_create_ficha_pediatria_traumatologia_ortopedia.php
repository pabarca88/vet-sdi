<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPediatriaTraumatologiaOrtopedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_pediatria_traumatologia_ortopedia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_pediatria')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional');

            $table->integer('sintoma_cons_ped_trau')->nullable();
            $table->string('obs_sintoma_cons_ped_trau')->nullable();
            $table->string('motivo_ped_trau')->nullable();
            $table->string('antec_especialidad_ped_trau')->nullable();
            $table->string('antec_especialidad_gen_trau')->nullable();

            $table->integer('id_cns_tipo')->nullable();
            $table->longtext('cuerpo')->nullable();

            /// examen fisico
            $table->integer('exfis_cabcuello')->nullable();
            $table->string('obs_exfis_cabcuello')->nullable();
            $table->integer('e_columna')->nullable();
            $table->string('obs_e_columna')->nullable();
            $table->integer('e_parrilla')->nullable();
            $table->string('obs_e_parrilla')->nullable();
            $table->integer('e_ext_sup')->nullable();
            $table->string('obs_e_ext_sup')->nullable();
            $table->integer('e_pelvis')->nullable();
            $table->string('obs_e_pelvis')->nullable();
            $table->integer('e_extinfer')->nullable();
            $table->string('obs_e_extinfer')->nullable();
            $table->integer('e_tend_lig')->nullable();
            $table->string('obs_e_tend_lig')->nullable();
            $table->string('obs_ex_tra_fisico')->nullable();

            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('ficha_pediatria_traumatologia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_pediatria')->nullable();
            $table->bigInteger('id_ficha_traumatologia_ortopedia');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional');

            /// lesiones traumaticas  y tumores
            //ESGUINCES
            $table->integer('t_causa_acc_esg')->nullable();
            $table->string('obs_t_causa_acc_esg')->nullable();
            $table->integer('tipo_lesion_esg')->nullable();
            $table->string('obs_tipo_lesion_esg')->nullable();
            $table->integer('signos_sintomas_esg')->nullable();
            $table->string('obs_signos_sintomas_esg')->nullable();
            $table->integer('complic_esg')->nullable();
            $table->string('obs_complic_esg')->nullable();
            $table->string('localizacion_esguince')->nullable();
            $table->integer('plan_tto_esg')->nullable();
            $table->string('obs_plan_tto_esg')->nullable();
            $table->string('obs_esguince')->nullable();
            //FRACTURAS
            $table->integer('t_causa_acc_fx')->nullable();
            $table->string('obs_t_causa_acc_fx')->nullable();
            $table->integer('tipo_lesion_fx')->nullable();
            $table->string('obs_tipo_lesion_fx')->nullable();
            $table->integer('signos_sintomas_fx')->nullable();
            $table->string('obs_signos_sintomas_fx')->nullable();
            $table->integer('complic_fx')->nullable();
            $table->string('obs_complic_fx')->nullable();
            $table->string('local_fx')->nullable();
            $table->integer('plan_tto_fx')->nullable();
            $table->string('obs_plan_tto_fx')->nullable();
            $table->string('obs_fracturas')->nullable();
            //MASAS Y TUMORES
            $table->integer('ex_loc_tumo')->nullable();
            $table->string('obs_ex_loc_tumo')->nullable();
            $table->integer('e_signos_sint_tu')->nullable();
            $table->string('obs_e_signos_sint_tu')->nullable();
            $table->integer('e_crec_tu')->nullable();
            $table->string('obs_e_crec_tu')->nullable();
            $table->integer('plan_tto_tu')->nullable();
            $table->string('obs_plan_tto_tu')->nullable();
            $table->string('obs_ex_masas_tu')->nullable();
            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('ficha_pediatria_ortopedia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_pediatria')->nullable();
            $table->bigInteger('id_ficha_traumatologia_ortopedia');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional');

            ///ortopedia
            $table->string('tipo_ortopedia')->nullable();

            // lactancia
            $table->string('orto_peso_lac')->nullable();
            $table->string('orto_talla_lac')->nullable();
            $table->integer('e_orto_lact_mov')->nullable();
            $table->string('obs_e_orto_lact_mov')->nullable();
            $table->string('mov_cerv_ortolact')->nullable();
            $table->string('ecm_ortolact')->nullable();
            $table->string('test_adams_ortolact')->nullable();
            $table->string('angvellos_ortolact')->nullable();
            $table->string('cifosis_lumbar_ortolact')->nullable();
            $table->string('flexoext_codo_ortolact')->nullable();
            $table->string('dedo_resorte_ortolact')->nullable();
            $table->string('rigidez_ortolact')->nullable();
            $table->string('caderas_ortolact')->nullable();
            $table->string('abd_ortolact')->nullable();
            $table->string('pliegues_ortolacr')->nullable();
            $table->string('rodillas_ortolact')->nullable();
            $table->string('pie_flexdors_ortolact')->nullable();
            $table->string('plantar_ortolact')->nullable();
            $table->string('pie_valvaro_retro_ortolact')->nullable();
            $table->string('obs_ex_ortopedia_ortolact')->nullable();

            //infantil
            $table->string('peso_ortoinf')->nullable();
            $table->string('talla_ortoinf')->nullable();
            $table->integer('e_orto_inf_manip')->nullable();
            $table->string('obs_e_orto_inf_manip')->nullable();
            $table->string('mov_vert_ortoinf')->nullable();
            $table->string('ritmo_lumbosac_ortoinf')->nullable();
            $table->string('indicecif_ortoinf')->nullable();
            $table->string('irrit_radicular_ortoinf')->nullable();
            $table->string('ex_neuro_bas_ortoinf')->nullable();
            $table->string('balance_art_ortoinf')->nullable();
            $table->string('balance_musc_ortoinf')->nullable();
            $table->string('hiperlaxart_ortoinf')->nullable();
            $table->string('dismetriamsup_ortoinf')->nullable();
            $table->string('sig_inf_ortoinf')->nullable();
            $table->string('test_clin_ortoinf')->nullable();
            $table->string('obs_ex_ortoinf')->nullable();

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
        Schema::dropIfExists('ficha_pediatria_traumatologia_ortopedia');
        Schema::dropIfExists('ficha_pediatria_traumatologia');
        Schema::dropIfExists('ficha_pediatria_ortopedia');
    }
}
