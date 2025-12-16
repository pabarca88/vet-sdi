<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosPostImplantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_post_implantes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->integer('id_especialidad');
            $table->double('numero_pieza');
            $table->date('fecha');
            $table->integer('id_movil');
            $table->string('movil');
            $table->integer('id_posicion');
            $table->string('posicion');
            $table->integer('id_exp_esp');
            $table->string('exp_esp');
            $table->integer('id_sup');
            $table->string('supuracion');
            $table->integer('id_est_encia');
            $table->string('estado_encia');
            $table->string('perdida_osea_marginal');
            $table->string('observaciones');
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
        Schema::dropIfExists('procedimientos_post_implantes');
    }
}
