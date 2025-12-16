<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearMedicamentoUsoCronicoGeneral20220815 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MedicamentoUsoCronicoGeneral', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion')->nullable();

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');

            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');

            $table->string('nombre_medicamento');
            $table->integer('cantidad');

            $table->tinyInteger('cliente')->default(0)->nullable();

            $table->string('tipo_enfermedad',50)->nullable();

            $table->tinyInteger('estado')->default(1)->nullable();

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
        Schema::dropIfExists('MedicamentoUsoCronicoGeneral');
    }
}
