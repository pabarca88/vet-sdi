<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenesPpf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->string('id_examen')->nullable()->after('id_ficha_atencion');
            $table->string('examen_especialidad')->nullable()->after('examen');
            $table->string('otro')->nullable()->after('archivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->drop('id_examen');
            $table->drop('examen_especialidad');
            $table->drop('otro');
        });
    }
}
