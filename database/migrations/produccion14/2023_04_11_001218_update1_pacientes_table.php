<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1PacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->integer('bienvenida')->after('rompeclave')->default('0');
        });
    }

    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->drop('bienvenida');

        });
    }
}
