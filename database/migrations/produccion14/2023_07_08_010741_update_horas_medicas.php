<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHorasMedicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_medicas', function (Blueprint $table) {
            $table->string('tipo_hora_medica')->default('C')->after('hora_termino');
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
            $table->dropColumn('tipo_hora_medica');
        });
    }
}
