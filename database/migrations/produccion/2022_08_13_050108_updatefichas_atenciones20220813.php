<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatefichasAtenciones20220813 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->bigInteger('id_lugar_atencion')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
			Schema::drop('id_lugar_atencion');
        });
    }
}
