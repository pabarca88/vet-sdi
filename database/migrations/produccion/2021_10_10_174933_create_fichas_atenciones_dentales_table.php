<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasAtencionesDentalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_atenciones_dentales', function (Blueprint $table) {
            $table->id();

            //infantil
            $table->string('rut_acompañante')->nullable();
            $table->string('nombre_acompañante')->nullable();
            $table->string('relacion_acompañante')->nullable();
            $table->string('nombre_acompañante_pago')->nullable();
            $table->string('rut_responsable_pago')->nullable();
            $table->string('email_acompañante')->nullable();
            $table->tinyInteger('ficha_infantil')->nullable()->default(0);

            $table->string('motivo')->nullable();
            $table->string('antecedentes')->nullable();
            // $table->string('examen_fisico')->nullable();
            $table->string('hipotesis_diagnostico')->nullable();
            $table->string('diagnostico_ce10')->nullable();
            $table->boolean('cronico')->default(false);
            $table->boolean('ges')->default(false);
            $table->boolean('confidencial')->default(false);
            $table->boolean('profesional_visible')->default(true);
            $table->string('tempeatura')->nullable();
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
            $table->boolean('finalizada')->default(false);

            //dental
            $table->boolean('anestesia_local')->default(false);
            $table->boolean('hemorragias')->default(false);
            $table->boolean('fracturas')->default(false);

            //Relaciones
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');

            //Fecha creacion y actualizacion
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
        Schema::dropIfExists('fichas_atenciones_dentales');
    }
}