<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenesMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_medicos', function (Blueprint $table)
        {
            // $table->dropColumn('sub_tipo');
            // $table->dropColumn('codigo');
            $table->integer('cod_dep')->nullable()->after('cod_parent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examenes_medicos', function (Blueprint $table) {
            $table->drop('cod_dep');
        });
    }
}
