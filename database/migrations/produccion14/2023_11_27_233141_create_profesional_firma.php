<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalFirma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_firma', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profesional');
            $table->text('id_autorizacion');
            $table->bigInteger('id_log');
            $table->bigInteger('id_tipo');
            $table->bigInteger('id_documento');
            $table->bigInteger('estado')->default(1);
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
        Schema::dropIfExists('profesional_firma');
    }
}
