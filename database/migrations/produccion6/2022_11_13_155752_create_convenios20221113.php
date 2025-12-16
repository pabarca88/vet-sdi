<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenios20221113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_usuario');
            $table->bigInteger('id_convenio');
            $table->string('tipo',100);
			$table->string('duracion',100);
			$table->string('adicional_1',100);
			$table->string('Adicional2',100);
			$table->string('vigencia',100);
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
        Schema::dropIfExists('convenios');
    }
}