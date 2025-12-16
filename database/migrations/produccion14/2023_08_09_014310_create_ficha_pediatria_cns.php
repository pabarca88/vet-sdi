<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPediatriaCns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_pediatria_cns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cns_tipo');
            $table->bigInteger('id_cns_template');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_responsable');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->longText('cuerpo');
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
        Schema::dropIfExists('ficha_pediatria_cns');
    }
}
