<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonos', function (Blueprint $table) {
            $table->id();
            $table->string('convenio');
            $table->integer('numero_bono');
            $table->dateTime('fecha_atencion');
            $table->double('valor_atencion');
            $table->string('glosa');
            $table->boolean('rendido')->default(false);
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_paciente');

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
        Schema::dropIfExists('bonos');
    }
}