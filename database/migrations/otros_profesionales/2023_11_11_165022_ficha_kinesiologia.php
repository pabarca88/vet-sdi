<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaKinesiologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_kinesiologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion_otros');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('postura')->nullable();
            $table->integer('alineacion_post')->nullable();
            $table->string('post_descripcion')->nullable();
            $table->integer('exp_post')->nullable();
            $table->string('obs_post')->nullable();
            $table->integer('expl_lateral')->nullable();
            $table->string('aprec_expl_lateral')->nullable();
            $table->string('obs_exp_columna_total')->nullable();
            $table->string('resultado_examenes_ct')->nullable();
            $table->integer('cerv_insp')->nullable();
            $table->string('ex_cerv_insp')->nullable();
            $table->integer('cerv_palp')->nullable();
            $table->string('ex_cerv_palp')->nullable();
            $table->string('obs_ex_col_cerv')->nullable();
            $table->string('resultado_examenes_cc')->nullable();
            $table->integer('dorso_lum_insp')->nullable();
            $table->string('ex_dorso_lum_insp')->nullable();
            $table->integer('dors_lumb_palp')->nullable();
            $table->string('ex_dors_lumb_palp')->nullable();
            $table->string('obs_ex_col_dors_lumb')->nullable();
            $table->string('resultado_examenes_dl')->nullable();
            $table->integer('sacro_dol')->nullable();
            $table->string('detalle_sacro_dol')->nullable();
            $table->integer('sacro_palp')->nullable();
            $table->string('detalle_sacro_palp')->nullable();
            $table->string('obs_sacro_palp')->nullable();
            $table->string('obs_ex_sacrocoxis')->nullable();
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
        Schema::dropIfExists('ficha_kinesiologia');
    }
}
