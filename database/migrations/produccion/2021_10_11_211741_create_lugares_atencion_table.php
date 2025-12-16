<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugaresAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares_atencion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rut');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->unsignedBigInteger('id_direccion');
            $table->integer('tipo')->nullable();
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
        Schema::dropIfExists('lugares_atencion');
    }
}