<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudifonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audifonos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->enum('lado', ['izquierdo', 'derecho']);
            $table->string('numero_serie')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->tinyInteger('nivel_satisfaccion')->nullable(); // Escala de satisfacción (1-10)
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Índices
            $table->foreign('id_ficha_atencion')->references('id')->on('ficha_otros_profesionales')
                  ->onDelete('cascade');

            // Índice compuesto para asegurar que solo haya un audífono por lado por ficha
            $table->unique(['id_ficha_atencion', 'lado']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audifonos');
    }
}
