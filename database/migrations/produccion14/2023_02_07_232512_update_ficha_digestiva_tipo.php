<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaDigestivaTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general_tipo', function (Blueprint $table)
        {
            $table->string('nombre')->nullable()->after('id');
            $table->string('descripcion')->nullable()->after('nombre');
        });

        Schema::table('ficha_cirugia_digestiva_tipo', function (Blueprint $table)
        {
            $table->string('nombre')->nullable()->after('id');
            $table->string('descripcion')->nullable()->after('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_cirugia_general_tipo', function (Blueprint $table) {
            $table->drop('nombre');
            $table->drop('descripcion');
        });

        Schema::table('ficha_cirugia_digestiva_tipo', function (Blueprint $table) {
            $table->drop('nombre');
            $table->drop('descripcion');
        });
    }
}
