<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResultadoExamenV20241202 extends Migration
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
            $table->string('nombre_examen')->nullable()->after('tipo_examen');
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
            $table->drop('nombre_examen');
        });
    }
}
