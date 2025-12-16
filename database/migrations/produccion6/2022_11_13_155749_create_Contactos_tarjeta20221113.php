<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTarjeta20221113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contactos_tarjeta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_contacto');
            $table->string('rut',100);
			$table->string('nombre',100);
			$table->string('direccion',100);
			$table->string('ciudad',100);
			$table->string('telefono',100);
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
        Schema::dropIfExists('Contactos_tarjeta');
    }
}