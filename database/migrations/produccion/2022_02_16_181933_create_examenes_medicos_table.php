<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_medicos', function (Blueprint $table) {
            $table->id();
            $table->integer('cod_examen');
            $table->integer('cod_parent');
            $table->string('nombre_examen');
            $table->integer('tipo_examen')->nullable();
            $table->integer('habilitado')->nullable();
            $table->integer('sub_tipo');
            $table->string('codigo');
            $table->string('algo')->nullable();

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
        Schema::dropIfExists('examenes_medicos');
    }
}