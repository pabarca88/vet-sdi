<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsumosTratamientosDentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos_tratamientos_dental', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tratamiento');
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion')->nullable();
            $table->integer('id_institucion')->nullable();
            $table->integer('id_lugar_atencion')->nullable();
            $table->integer('id_especialidad')->nullable();
            $table->string('tipo')->nullable();
            $table->string('insumos');
            $table->integer('cantidad');
            $table->string('observaciones')->nullable();;
            $table->double('valor');
            $table->integer('estado');
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('insumos_tratamientos_dental');
    }
}
