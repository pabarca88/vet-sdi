<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesPpfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_ppf', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prioridad');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->string('examen');
            $table->string('tipo_examen');
            $table->tinyInteger('tipo_ficha')->nullable();

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
        Schema::dropIfExists('examenes_ppf');
    }
}