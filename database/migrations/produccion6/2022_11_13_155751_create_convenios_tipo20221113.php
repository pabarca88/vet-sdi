<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTipo20221113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_convenio');
			$table->string('nombre',100);
			$table->string('glosa',300);
			$table->string('otro',100);
			
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
        Schema::dropIfExists('convenios_tipo');
    }
}