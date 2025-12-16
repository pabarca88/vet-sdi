<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenEspecialidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->string('id_asistente')->nullable()->after('id_profesional');
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
            $table->dropColumn('id_asistente');
        });
    }
}
