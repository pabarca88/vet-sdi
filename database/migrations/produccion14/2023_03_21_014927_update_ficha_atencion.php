<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table)
        {
            $table->integer('desvincular')->default(0)->after('finalizada');
            
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->drop('desvincular');            
        });

      
    }
}
