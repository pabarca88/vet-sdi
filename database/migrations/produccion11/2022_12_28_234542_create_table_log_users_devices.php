<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLogUsersDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_users_devices', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_user_create');
            $table->bigInteger('id_user_recept');
            $table->longText('msg');
            $table->integer('tipo');
            $table->integer('estado');

            $table->dateTime('fecha_ingreso')->nullable();
            $table->dateTime('fecha_termino')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_users_devices');
    }
}
