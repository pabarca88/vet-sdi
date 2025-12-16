<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaAtencionRayo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_atencion_rayo', function (Blueprint $table) {
            $table->id();

            $table->string('token');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('id_procedimiento');

            $table->integer('estado_informe')->default(0);
            $table->longText('informe')->nullable();
            $table->bigInteger('id_usuario_informe')->nullable();
            $table->integer('estado_archivo')->default(0);
            $table->text('archivo')->nullable();

            $table->integer('revisado')->default(0);

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
        Schema::dropIfExists('ficha_atencion_rayo');
    }
}
