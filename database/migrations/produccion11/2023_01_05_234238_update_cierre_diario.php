<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCierreDiario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cierre_diario', function (Blueprint $table) {
            $table->string('total_rendiciones')->nullable()->after('fecha_rendicion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cierre_diario', function (Blueprint $table) {
            $table->drop('total_rendiciones');
        });
    }
}
