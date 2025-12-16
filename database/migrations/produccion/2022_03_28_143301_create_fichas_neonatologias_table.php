<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasNeonatologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_neonatologias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_nacimiento');
            $table->time('hora_nacimiento');
            $table->double('peso_nacimiento');
            $table->double('talla_nacimiento');
            $table->string('perimetro_cefalico')->nullable();
            $table->string('apgar')->nullable();
            $table->string('apgar_cinco')->nullable();
            $table->string('edad_gestacional')->nullable();
            $table->string('reanimacion')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('bcg')->nullable();
            $table->string('hepatitis_b')->nullable();
            $table->string('otras_vacunas')->nullable();

            $table->unsignedBigInteger('id_solicitud_pabellon')->nullable();
            $table->unsignedBigInteger('id_protocolo')->nullable();

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
        Schema::dropIfExists('fichas_neonatologias');
    }
}