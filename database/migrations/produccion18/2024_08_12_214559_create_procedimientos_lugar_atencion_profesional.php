<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosLugarAtencionProfesional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_lugar_atencion_profesional', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_procedimiento_centro');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('minutos_bloque');
            $table->string('cantidad_bloques');
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('procedimientos_lugar_atencion_profesional');
    }
}
