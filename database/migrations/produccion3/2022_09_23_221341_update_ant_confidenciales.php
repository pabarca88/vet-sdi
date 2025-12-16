<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAntConfidenciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ant_confidenciales', function (Blueprint $table) {
            $table->bigInteger('id_paciente')->after('otros_antecedentes');
        });
    }

    public function down()
    {
        Schema::table('ant_confidenciales', function (Blueprint $table) {
            $table->drop('id_paciente');
        });
    }
}
