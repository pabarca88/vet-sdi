<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivoConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_consulta', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad')->nullable();
            $table->string('motivo');
            $table->string('antecedentes');
            $table->string('examen_fisico');
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
        Schema::dropIfExists('motivo_consulta');
    }
}
