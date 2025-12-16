<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMedicamentoUsoCronicoGeneral20220913 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamentousocronicogeneral', function (Blueprint $table) {
            $table->string('cantidad')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamentousocronicogeneral', function (Blueprint $table) {
            $table->interger('cantidad')->change();
        });
    }
}
