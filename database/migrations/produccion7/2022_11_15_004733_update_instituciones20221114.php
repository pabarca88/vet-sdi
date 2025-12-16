<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstituciones20221114 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->string('id_lugar_atencion')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->drop('id_lugar_atencion');
        });
    }
}
