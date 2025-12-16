<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioDependiente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_dependiente', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_lugar_atencion');
            $table->datetime('hora_entrada');
            $table->datetime('hora_salida');
            $table->datetime('hora_entrada_colacion');
            $table->datetime('hora_salida_colacion');
            $table->bigInteger('id_user_configuracion');
            $table->datetime('fecha__configuracion');
            $table->string('otro')->nullable();
            $table->tinyInteger('estado');
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
        Schema::dropIfExists('horario_dependiente');
    }
}
