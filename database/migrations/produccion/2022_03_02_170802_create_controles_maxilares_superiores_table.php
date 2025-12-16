<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesMaxilaresSuperioresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_maxilares_superiores', function (Blueprint $table) {
            $table->id();
            $table->string('procedimiento')->nullable();
            $table->string('comentario')->nullable();
            $table->tinyInteger('terminado')->nullable()->default(0);
            //$table->string('nueva_cita_fecha')->nullable();

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
        Schema::dropIfExists('controles_maxilares_superiores');
    }
}