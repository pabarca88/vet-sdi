<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenEspecialidadImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_especialidad_img', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_examen');
            $table->text('url')->nullable();
            $table->string('nombre')->nullable();
            $table->string('otro')->nullable();
            $table->string('estado')->nullable()->default('0');
            $table->timestamps();
        });

        Schema::create('examen_laboratorio_img', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_examen');
            $table->text('url')->nullable();
            $table->string('nombre')->nullable();
            $table->string('otro')->nullable();
            $table->string('estado')->nullable()->default('0');
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
        Schema::dropIfExists('examen_especialidad_img');
        Schema::dropIfExists('examen_laboratorio_img');
    }
}
