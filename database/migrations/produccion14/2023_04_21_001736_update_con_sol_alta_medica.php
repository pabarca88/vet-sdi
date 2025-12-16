<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConSolAltaMedica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('con_sol_alta_medica', function (Blueprint $table)
        {
            $table->string('diagnostico')->after('fecha_hospit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('con_sol_alta_medica', function (Blueprint $table) {
            $table->drop('diagnostico');
        });
    }
}
