<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableLogUsersDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_users_devices', function (Blueprint $table)
        {
            $table->text('token')->nullable()->after('tipo');
            $table->dateTime('fecha_exp')->nullable()->after('fecha_termino');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_users_devices', function (Blueprint $table) {
            $table->drop('token');
            $table->drop('fecha_exp');
        });

      
    }
}
