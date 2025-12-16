<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichasNeonatologiasv2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_neonatologias', function (Blueprint $table)
        {
            $table->string('diag')->nullable()->after('reanimacion');
            $table->string('pronostico')->nullable()->after('diag');
            $table->string('obs')->nullable()->after('medicamentos');
            $table->string('tsh')->nullable()->after('otras_vacunas');
            $table->string('eval_audit')->nullable()->after('tsh');
            $table->string('pku')->nullable()->after('eval_audit');
            $table->string('otros_ex')->nullable()->after('pku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_neonatologias', function (Blueprint $table) {
            $table->drop('diag');
            $table->drop('pronostico');
            $table->drop('obs');
            $table->drop('tsh');
            $table->drop('eval_audit');
            $table->drop('pku');
            $table->drop('otros_ex');
        });
    }
}
