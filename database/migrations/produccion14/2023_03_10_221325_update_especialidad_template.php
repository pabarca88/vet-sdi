<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEspecialidadTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_especialidad_template', function (Blueprint $table)
        {
            $table->longText('pdf')->nullable()->after('cuerpo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen_especialidad_template', function (Blueprint $table) {
            $table->drop('pdf');
        });
    }
}
