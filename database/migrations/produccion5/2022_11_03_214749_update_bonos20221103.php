<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBonos20221103 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->string('numero_bono',20)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('bonos', function (Blueprint $table) {
            $table->string('numero_bono',20)->nullable(false)->change();
        });
    }
}
