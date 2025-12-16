<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenesDentalPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_dental_paciente_table', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad');
            $table->integer('id_profesional');
            $table->json('paths_imagenes');
            $table->integer('estado');
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
        Schema::dropIfExists('imagenes_dental_paciente_table');
    }
}
