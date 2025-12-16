<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExamenesPpfV20240126 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_ppf', function (Blueprint $table)
        {
            $table->string('sospecha')->nullable()->after('archivo');
            $table->string('observacion')->nullable()->after('sospecha');
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
            $table->drop('sospecha');
            $table->drop('observacion');
        });
    }
}
