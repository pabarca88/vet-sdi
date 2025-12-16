<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Updateinstituciones20221910 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->bigInteger('id_tipo_institucion')->after('id_servicio');
        });
    }

    public function down()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->drop('id_tipo_institucion');
        });
    }
}
