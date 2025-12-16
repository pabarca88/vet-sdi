<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasBanc20221113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_banc', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->string('rut',100);
			$table->string('nombre',100);
			$table->string('banco',100);
			$table->string('cuenta',100);
			$table->string('email',100);
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
        Schema::dropIfExists('cuentas_banc');
    }
}