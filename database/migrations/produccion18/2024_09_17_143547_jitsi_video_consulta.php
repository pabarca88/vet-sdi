<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JitsiVideoConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jitsi_video_consulta', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->string('nombre_grupo');

            $table->longText('token_moderator')->nullable();
            $table->longText('token_invitado')->nullable();

            $table->dateTime('hora_inicio')->nullable();
            $table->dateTime('hora_termino')->nullable();

            $table->dateTime('llamada_inicio')->nullable();
            $table->dateTime('llamada_termino')->nullable();

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
        Schema::dropIfExists('jitsi_video_consulta');
    }
}
