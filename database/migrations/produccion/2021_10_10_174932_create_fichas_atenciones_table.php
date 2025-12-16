<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_atenciones', function (Blueprint $table) {
            $table->id();
            $table->string('motivo')->nullable();
            $table->string('antecedentes')->nullable();
            $table->string('examen_fisico')->nullable();
            $table->string('hipotesis_diagnostico')->nullable();
            $table->string('diagnostico_ce10')->nullable();
            $table->boolean('cronico')->default(false);
            $table->boolean('ges')->default(false);
            $table->boolean('confidencial')->default(false);
            $table->boolean('profesional_visible')->default(true);
            $table->string('temperatura')->nullable();
            $table->string('pulso')->nullable();
            $table->string('frecuencia_reposo')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('estado_nutricional')->nullable();
            $table->string('presion_bi')->nullable();
            $table->string('presion_bd')->nullable();
            $table->string('presion_de_pie')->nullable();
            $table->string('presion_sentado')->nullable();
            $table->string('ct_estado_conciencia')->nullable();
            $table->string('ct_lenguaje')->nullable();
            $table->string('ct_traslado')->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->boolean('finalizada')->default(false);
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
        Schema::dropIfExists('fichas_atenciones');
    }
}