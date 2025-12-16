<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBienvenidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_inst_serv', function (Blueprint $table)
        {
            $table->string('bienvenido')->default(1)->nullable()->after('email');
        });
        Schema::table('asistentes', function (Blueprint $table)
        {
            $table->string('bienvenido')->default(1)->nullable()->after('email');
        });
        Schema::table('instituciones', function (Blueprint $table)
        {
            $table->string('bienvenido')->default(1)->nullable()->after('email');
        });
        Schema::table('servicios', function (Blueprint $table)
        {
            $table->string('bienvenido')->default(1)->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asistentes', function (Blueprint $table) {
            $table->drop('admin_inst_serv');
            $table->drop('asistentes');
            $table->drop('instituciones');
            $table->drop('servicios');
        });
    }
}
