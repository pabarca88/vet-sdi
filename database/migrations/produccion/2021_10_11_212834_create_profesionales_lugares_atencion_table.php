<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalesLugaresAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales_lugares_atencion', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->boolean('estado')->default(1);

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
        Schema::dropIfExists('profesionales_lugares_atencion');
    }
}