<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativosLugarAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos_lugar_atencion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_admin');
            $table->integer('id_lugar_atencion');
            $table->string('token', 100);
            $table->integer('id_profesional')->nullable();
            $table->integer('id_institucion');
            $table->integer('examen')->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('administrativos_lugar_atencion');
    }
}
