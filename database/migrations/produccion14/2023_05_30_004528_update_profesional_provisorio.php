<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfesionalProvisorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesional_provisorio', function (Blueprint $table) {

            /** agregar columnas */
            $table->string('token')->nullable()->after('otro');
            $table->integer('id_usuario_genera')->nullable()->after('token');
            $table->integer('estado_token')->nullable()->after('id_usuario_genera');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesional_provisorio', function (Blueprint $table) {
            $table->drop('token');
            $table->drop('id_usuario_genera');
            $table->drop('estado_token');
        });
    }
}
