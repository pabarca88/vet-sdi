<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesDentalDolorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_dental_dolor', function (Blueprint $table) {
            $table->id();
            $table->string('derivado_por');
            $table->string('zona_dolor');
            $table->string('historia_anterior');
            $table->integer('numero_pieza');
            $table->integer('tipo_dolor');
            $table->integer('intensidad');
            $table->integer('modo_dolor');
            $table->integer('localizacion');
            $table->integer('provocacion_dolor');
            $table->integer('momento_dolor');
            $table->integer('tipo_evolucion');
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
        Schema::dropIfExists('examenes_dental_dolor');
    }
}
