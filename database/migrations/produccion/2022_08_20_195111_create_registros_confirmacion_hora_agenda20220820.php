<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosConfirmacionHoraAgenda20220820 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_confirmacion_hora_agenda', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('descripcion');
            $table->integer('estado')->default(1)->nullable();
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
        Schema::dropIfExists('registros_confirmacion_hora_agenda20220820');
    }
}
