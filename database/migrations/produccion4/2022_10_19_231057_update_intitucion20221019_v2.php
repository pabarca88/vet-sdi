<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIntitucion20221019V2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->bigInteger('id_responsable')->after('rut_responsable');
        });
    }

    public function down()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->drop('id_responsable');
        });
    }
}