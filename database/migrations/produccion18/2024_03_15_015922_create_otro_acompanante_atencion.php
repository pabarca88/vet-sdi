<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtroAcompananteAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otro_acompanante_atencion', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_ficha_gineco_obstetrica')->nullable();
            $table->string('nombre');
            $table->string('apellido_uno');
            $table->string('apellido_dos');
            $table->string('rut');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('relacion')->nullable();
            $table->integer('procesado')->default(0);
            $table->integer('estado')->default(1); // 1=Activo,  0=Inactivo

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
        Schema::dropIfExists('otro_acompanante_atencion');
    }
}
