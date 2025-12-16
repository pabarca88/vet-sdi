<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicasV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->string('alias_examen')->default('Consulta')->after('tipo_hora_medica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->dropColumn('alias_examen');
        });
    }
}
