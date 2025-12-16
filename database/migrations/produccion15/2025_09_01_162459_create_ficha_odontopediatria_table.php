<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaOdontopediatriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_odontopediatria', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ficha_atencion');
            $table->integer('id_lugar_atencion');
            $table->integer('id_profesional');
            $table->integer('id_responsable');
            $table->string('descripcion_consulta')->nullable();
            $table->integer('op_bruxismo')->nullable();
            $table->integer('op_sueno')->nullable();
            $table->integer('op_resp')->nullable();
            $table->integer('op_interpling')->nullable();
            $table->integer('op_atm')->nullable();
            $table->integer('op_asim_atm')->nullable();
            $table->integer('op_resalte_atm')->nullable();
            $table->integer('op_dolor_atm')->nullable();
            $table->text('obs_ex_op_morfologico')->nullable();
            $table->integer('tpo_oclusion_dent_temp')->nullable();
            $table->integer('tpo_oclusion_dent_permanente')->nullable();
            $table->integer('tpo_mord')->nullable();
            $table->integer('supernum')->nullable();
            $table->integer('ot_anomalias')->nullable();
            $table->string('obs_ex_oral')->nullable();
            $table->integer('tipo_radio')->nullable();
            $table->integer('result_radio')->nullable();
            $table->timestamps();

            // Índices para mejorar el rendimiento
            $table->index('id_ficha_atencion');
            $table->index('id_lugar_atencion');
            $table->index('id_profesional');
            $table->index('id_responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_odontopediatria');
    }
}
