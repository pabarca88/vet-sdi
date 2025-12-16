<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableExamenPPF20221105 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->integer('codigo_fonasa')->nullable()->after('con_contraste');
        });
    }

    public function down()
    {
        Schema::table('examenes_ppf', function (Blueprint $table) {
            $table->drop('codigo_fonasa');
        });
    }
}
