<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosGruposPostImplantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_grupos_post_implantes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->integer('id_especialidad');
            $table->json('grupo_piezas');
            $table->date('fecha');
            $table->integer('id_estabilidad');
            $table->string('estabilidad');
            $table->integer('id_posicion');
            $table->string('posicion');
            $table->integer('altura');
            $table->integer('dpa');
            $table->integer('id_desgaste');
            $table->string('desgaste');
            $table->integer('id_estado_encia');
            $table->string('estado_encia');
            $table->integer('id_hueso_circundante');
            $table->string('hueso_circundante');
            $table->integer('id_eva_cp');
            $table->string('eva_cp');
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
        Schema::dropIfExists('procedimientos_grupos_post_implantes');
    }
}
