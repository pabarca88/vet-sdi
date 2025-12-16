<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id, id_user, alias, uuid, estado, fecha_ingreso, fecha_termino
        Schema::create('users_devices', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_user');
            $table->string('alias');
            $table->string('uuid');
            $table->string('code',16)->nullable();
            $table->string('password');
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
        Schema::drop('users_devices');
    }
}
