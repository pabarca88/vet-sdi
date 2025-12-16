<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePaswordEmpleadoLugarAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asistentes_lugar_atencion', function (Blueprint $table) {
            $table->string('token')->nullable()->after('id_lugar_atencion');
        });

        Schema::table('profesionales_lugares_atencion', function (Blueprint $table) {
            $table->string('token')->nullable()->after('id_lugar_atencion');
            $table->bigInteger('id_institucion')->nullable()->after('token');
        });
    }

    public function down()
    {
        Schema::table('asistentes_lugar_atencion', function (Blueprint $table) {
            $table->drop('token');
        });

        Schema::table('profesionales_lugares_atencion', function (Blueprint $table) {
            $table->drop('token');
            $table->drop('id_institucion');
        });
    }
}
