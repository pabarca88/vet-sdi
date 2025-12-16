<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntConfidenciales20220914 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ant_confidenciales', function (Blueprint $table) {
            $table->id();
            $table->integer('rompeclave');
            $table->text('antecedentes');
            $table->text('otros_antecedentes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ant_confidenciales');
    }
}
