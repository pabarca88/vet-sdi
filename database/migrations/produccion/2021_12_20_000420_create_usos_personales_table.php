<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos_personales', function (Blueprint $table) {
            $table->id();

            $table->string('dirigido');
            $table->string('cargo');
            $table->string('mensaje');

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion');
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
        Schema::dropIfExists('usos_personales');
    }
}