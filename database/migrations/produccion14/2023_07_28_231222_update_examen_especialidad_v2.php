<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenEspecialidadV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->string('revisado')->default(0)->after('cuerpo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->dropColumn('revisado');
        });
    }
}
