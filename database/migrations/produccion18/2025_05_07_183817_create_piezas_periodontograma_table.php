<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasPeriodontogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas_periodontograma', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('pieza'); // Número de la pieza dental

            // Vestibular
            $table->string('movilidad')->nullable();
            $table->string('pronostico')->nullable();
            $table->string('furca')->nullable();

            $table->string('vest_altura_mg_a')->nullable();
            $table->string('vest_altura_mg_b')->nullable();
            $table->string('vest_altura_mg_c')->nullable();
            $table->string('vest_psondaje_a')->nullable();
            $table->string('vest_psondaje_b')->nullable();
            $table->string('vest_psondaje_c')->nullable();

            // Palatino / Lingual
            $table->string('pala_altura_mg_a')->nullable();
            $table->string('pala_altura_mg_b')->nullable();
            $table->string('pala_altura_mg_c')->nullable();
            $table->string('pala_psondaje_a')->nullable();
            $table->string('pala_psondaje_b')->nullable();
            $table->string('pala_psondaje_c')->nullable();

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
        Schema::dropIfExists('piezas_periodontograma');
    }
}
