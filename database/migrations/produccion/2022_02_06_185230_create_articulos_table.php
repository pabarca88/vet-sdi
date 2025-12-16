<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('cod_parent');
            $table->string('nombre');
            $table->string('present')->nullable();
            $table->string('cont-rec')->nullable();
            $table->string('tipo_cont');
            $table->string('dosis');
            $table->string('cant_comp');
            $table->string('cod_isp');
            $table->string('vigencia');
            $table->string('droga', 5000);
            $table->string('grupo')->nullable();
            $table->string('temperatura')->nullable();



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
        Schema::dropIfExists('articulos');
    }
}