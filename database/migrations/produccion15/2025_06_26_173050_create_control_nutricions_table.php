<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlNutricionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_nutricion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_paciente');
            $table->date('fecha');
            $table->boolean('estado')->default(1);
            $table->text('observaciones')->nullable();
            $table->json('datos_control');
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
        Schema::dropIfExists('control_nutricion');
    }
}
