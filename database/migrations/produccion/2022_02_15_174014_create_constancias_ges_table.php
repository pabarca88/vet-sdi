<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstanciasGesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constancias_ges', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_institucion')->nullable();
            $table->string('rut')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_responsable')->nullable();
            $table->string('confirmacion_ges');
            $table->string('confirmacion_diagnostico');
            $table->string('paciente_tratamiento');
            $table->date('fecha_notificacion');
            $table->time('hora_notificacion');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
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
        Schema::dropIfExists('constancias_ges');
    }
}