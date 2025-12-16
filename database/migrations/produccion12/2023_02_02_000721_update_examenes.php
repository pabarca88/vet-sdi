<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examen_especialidad_tipo', function (Blueprint $table) {
            $table->bigInteger('id_sub_tipo_especialidad')->nullable()->after('id_template');
        });

        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->bigInteger('id_examen_tipo')->nullable()->after('id_template');
            $table->bigInteger('id_sub_tipo_especialidad')->nullable()->after('id_examen_tipo');
            $table->bigInteger('id_ficha_atencion')->nullable()->after('id_sub_tipo_especialidad');
            $table->bigInteger('id_ficha_especialidad')->nullable()->after('id_ficha_atencion');
            $table->bigInteger('id_paciente')->nullable()->after('id_ficha_especialidad');
            $table->bigInteger('id_profesional')->nullable()->after('id_paciente');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examen_especialidad_tipo', function (Blueprint $table) {
            $table->drop('id_sub_tipo_especialidad');
        });

        Schema::table('examen_especialidad', function (Blueprint $table) {
            $table->drop('id_examen_tipo');
            $table->drop('id_sub_tipo_especialidad');
            $table->drop('id_ficha_atencion');
            $table->drop('id_ficha_especialidad');
            $table->drop('id_paciente');
            $table->drop('id_profesional');
        });
    }
}
