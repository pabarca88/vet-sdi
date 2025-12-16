<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtrosProfesionalesV250305 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otros_profesionales', function (Blueprint $table)
        {
            $table->integer('estado_archivo')->nullable()->default(0)->after('finalizada');
            $table->text('archivo')->nullable()->after('estado_archivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_otros_profesionales', function (Blueprint $table) {
            $table->drop('estado_archivo');
            $table->drop('archivo');
        });
    }
}
