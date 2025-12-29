<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosMascotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_mascota', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente')->nullable();
            $table->integer('id_profesional')->nullable();
            $table->integer('id_ficha_atencion')->nullable();
            $table->integer('id_lugar_atencion')->nullable();
            $table->integer('id_tipo_tratamiento')->nullable();
            $table->json('datos_atencion');
            $table->integer('estado')->nullable();
            $table->integer('aprobado')->nullable();
            $table->date('fecha_control')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('boca')->nullable();
            $table->string('otros')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('presupuestos_mascota');
    }
}
