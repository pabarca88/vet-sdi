<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaSiquiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_siqui', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_fichas_atenciones');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->json('datos');
            $table->boolean('estado')->default(1);
            $table->timestamps();

            // Relaciones (opcional)
            $table->foreign('id_fichas_atenciones')->references('id')->on('fichas_atenciones')->onDelete('cascade');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_siqui');
    }
}
