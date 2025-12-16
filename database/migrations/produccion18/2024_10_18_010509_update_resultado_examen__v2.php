<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResultadoExamenV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultado_examen', function (Blueprint $table)
        {
            $table->bigInteger('id_profesional')->nullable()->after('email');
            $table->string('profesiona_rut')->nullable()->after('id_profesional');
            $table->string('profesional_nombre')->nullable()->after('profesiona_rut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultado_examen', function (Blueprint $table) {
            $table->drop('id_profesional');
            $table->drop('profesional_rut');
            $table->drop('profesional_nombre');
        });
    }
}
