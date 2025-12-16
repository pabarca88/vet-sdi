<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaDermo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_dermo', function (Blueprint $table) {
            $table->string('mot_zona_bp')->nullable()->after('biopsia_dermat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_dermo', function (Blueprint $table) {
            $table->dropColumn('mot_zona_bp');
        });
    }
}

