<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetaAudifono20221103 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receta_audifono', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->dateTime('fecha');

            $table->integer('tipo')->nullable();

            $table->integer('od')->nullable()->default(0);
            $table->string('especificacion_od')->nullable();

            $table->integer('oi')->nullable()->default(0);
            $table->string('especificacion_oi')->nullable();

            $table->integer('bi')->nullable()->default(0);
            $table->string('especificacion_bi')->nullable();

            $table->string('especificacion_general')->nullable();

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
        Schema::dropIfExists('receta_audifono');
    }
}
