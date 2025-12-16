<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesionales', function (Blueprint $table) {
            $table->integer('bienvenida')->after('email')->default('0');
        });
    }

    public function down()
    {
        Schema::table('profesionales', function (Blueprint $table) {
            $table->drop('bienvenida');

        });
    }
}
