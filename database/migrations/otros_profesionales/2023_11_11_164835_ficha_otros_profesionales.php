<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaOtrosProfesionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_otros_profesionales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('tipo_consulta_d')->nullable();
            $table->string('der_por')->nullable();
            $table->string('cond_fis_ingreso')->nullable();
            $table->integer('num_sesiones')->nullable();
            $table->string('dg_ingreso')->nullable();
            $table->string('solicitud_prof')->nullable();
            $table->string('espect_pcte')->nullable();
            $table->string('hipotesis')->nullable();
            $table->string('indicaciones')->nullable();
            $table->string('espect_pcte')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();

        });

        Schema::create('otros_prof_seccion_antecedentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->string('pat_pat')->nullable();
            $table->string('pat_mat')->nullable();
            $table->string('pat_fam')->nullable();
            $table->string('pat_prop')->nullable();
            $table->string('sint_act')->nullable();
            $table->string('gin_obt')->nullable();
            $table->string('ot_pat_act')->nullable();
            $table->string('ot_sint_act')->nullable();
            $table->string('ot_ant_gine')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('otros_prof_seccion_eval_psico_neuro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->integer('eval_con')->nullable();
            $table->string('eval_con_obs')->nullable();
            $table->integer('eval_ori')->nullable();
            $table->string('eval_ori_obs')->nullable();
            $table->integer('eval_comp')->nullable();
            $table->string('eval_comp_obs')->nullable();
            $table->integer('eval_colab')->nullable();
            $table->string('eval_colab_obs')->nullable();
            $table->string('eval_com_coment')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('otros_prof_seccion_evolucion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->string('dg_ingreso')->nullable();
            $table->string('evaluacion_control')->nullable();
            $table->string('plan_prop_evol')->nullable();
            $table->string('sesion_n_dex')->nullable();
            $table->string('evol_result')->nullable();
            $table->string('prox_control')->nullable();
            $table->string('evol_indicaciones')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('otros_prof_seccion_controles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->string('cont_n_sesion')->nullable();
            $table->string('cont_trabajo_en')->nullable();
            $table->string('cont_colaboracion')->nullable();
            $table->integer('cont_obj')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('otros_prof_seccion_comunicacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->integer('tipo_conc')->nullable();
            $table->integer('tipo_orient')->nullable();
            $table->integer('tipo_comport')->nullable();
            $table->integer('tipo_colab')->nullable();
            $table->string('coment_comunic')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('otros_prof_seccion_plan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_especialidad');
            $table->integer('fec_inicio_tto')->nullable();
            $table->integer('dg_ingreso')->nullable();
            $table->integer('n_sesiones')->nullable();
            $table->integer('obj')->nullable();
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
        Schema::dropIfExists('ficha_otros_profesionales');
        Schema::dropIfExists('otros_prof_seccion_plan');
        Schema::dropIfExists('otros_prof_seccion_antecedentes');
        Schema::dropIfExists('otros_prof_seccion_eval_psico_neuro');
        Schema::dropIfExists('otros_prof_seccion_evolucion');
        Schema::dropIfExists('otros_prof_seccion_controles');
        Schema::dropIfExists('otros_prof_seccion_comunicacion');
    }
}
