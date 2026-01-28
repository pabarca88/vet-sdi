<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsoToArticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos', function (Blueprint $table) {
            if (!Schema::hasColumn('articulos', 'uso')) {
                $table->string('uso', 255)->nullable()->after('tipo_cont');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulos', function (Blueprint $table) {
            if (Schema::hasColumn('articulos', 'uso')) {
                $table->dropColumn('uso');
            }
        });
    }
}
