<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_convenios', function (Blueprint $table) {
            $table->id();
            $table->string('convenios');
            $table->double('porcentaje', 10, 2)->nullable();
            $table->string('tipo_atencion');
            $table->decimal('valor', 8, 2);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->double('valor_garantia', 8, 2)->nullable();
            $table->double('valor_copago_fonasa', 8, 2)->nullable();
            $table->double('valor_bon_fonasa', 8, 2)->nullable();
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');
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
        Schema::dropIfExists('usuarios_convenios');
    }
}
