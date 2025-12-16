<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('correlativos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_profesional');
            $table->string('tipo')->nullable()->comment('Tipo de correlativo, e.g., "odontologia", "lab", etc.');
            $table->bigInteger('contador')->default(0)->comment('Contador secuencial');
            $table->string('prefijo')->nullable();
            $table->string('sufijo')->nullable();
            $table->integer('padded_length')->default(6)->comment('Longitud del número rellenado con ceros');
            $table->timestamps();

            $table->foreign('id_profesional')
                ->references('id')
                ->on('profesionales')
                ->onDelete('cascade');

            $table->unique(['id_profesional', 'tipo']);
        });
    }

    public function down()
    {
        Schema::table('correlativos', function (Blueprint $table) {
            $table->dropForeign(['id_profesional']);
        });
        Schema::dropIfExists('correlativos');
    }
};
