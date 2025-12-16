<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaciente300524 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table)
        {
            $table->integer('auto_fmu')->default('0')->after('codigo_autorizacion');
            $table->integer('auto_inf_turno')->default('0')->after('auto_fmu');
            $table->integer('auto_inf_confd')->default('0')->after('auto_inf_turno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->drop('auto_fmu');
            $table->drop('auto_inf_turno');
            $table->drop('auto_inf_confd');
        });
    }
}
