<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteControlPresion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_control_presion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->string('sistolica');
            $table->string('diastólica');
            $table->string('pulso');
            $table->string('coment')->nullable();
            $table->dateTime('fecha');
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('paciente_control_presion');
    }
}
