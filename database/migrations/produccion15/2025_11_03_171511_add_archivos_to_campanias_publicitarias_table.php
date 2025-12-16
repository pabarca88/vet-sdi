<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArchivosToCampaniasPublicitariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campanias_publicitarias', function (Blueprint $table) {
            $table->json('archivos')->nullable()->after('log_envio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campanias_publicitarias', function (Blueprint $table) {
            $table->dropColumn('archivos');
        });
    }
}
