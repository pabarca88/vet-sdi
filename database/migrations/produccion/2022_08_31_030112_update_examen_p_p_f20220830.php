<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenPPF20220830 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->tinyInteger('con_contraste')->nullable()->after('tipo_ficha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
			Schema::drop('con_contraste');
        });
    }
}
