<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteControlPeso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_control_peso', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->string('inicial');
            $table->string('actual');
            $table->string('estatura');
            $table->string('imc');
            $table->string('variacion');
            $table->string('ideal');
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
        Schema::dropIfExists('paciente_control_peso');
    }
}
