<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterconsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interconsultas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_solicitud');
            $table->string('nombre_esp');
            $table->string('hipotesis');
            $table->string('comentarios')->nullable();

            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_recuperacion')->nullable();
            $table->unsignedBigInteger('id_sala')->nullable();

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
        Schema::dropIfExists('interconsultas');
    }
}