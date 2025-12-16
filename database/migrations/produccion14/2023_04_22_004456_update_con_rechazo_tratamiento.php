<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConRechazoTratamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('con_rechazo_tratamiento', function (Blueprint $table)
        {
            $table->string('diagnostico')->after('fecha_sol');
            $table->string('tratamiento')->after('diagnostico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('con_rechazo_tratamiento', function (Blueprint $table) {
            $table->drop('diagnostico');
            $table->drop('tratamiento');
        });
    }
}
