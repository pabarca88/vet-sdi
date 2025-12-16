<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesDentalOralRxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_dental_oral_rx', function (Blueprint $table) {
            $table->id();
            $table->double('numero_pieza');
            $table->integer('espacio_periodontal');
            $table->integer('hueso_alveolal');
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
        Schema::dropIfExists('examenes_dental_oral_rx');
    }
}
