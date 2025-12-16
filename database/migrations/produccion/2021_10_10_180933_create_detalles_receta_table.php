<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesRecetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_receta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha')->nullable()->default(0);

            $table->unsignedBigInteger('id_ingreso_paciente')->nullable()->default(0);
            $table->unsignedBigInteger('id_recuperacion')->nullable()->default(0);
            $table->unsignedBigInteger('id_sala')->nullable()->default(0);

            $table->unsignedBigInteger('id_articulo');
            $table->string('producto');
            $table->string('presentacion');
            $table->string('posologia');
            $table->string('via_administracion');
            $table->string('periodo');
            $table->tinyInteger('uso_cronico')->nullable()->default(0);
            $table->string('cantidad_compra');
            $table->string('cantidad_vendida')->nullable()->default(0);

            $table->string('comentario')->nullable();

            $table->text('receta_token');

            $table->boolean('estado')->nullable()->default(1);

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
        Schema::dropIfExists('detalles_receta');
    }
}
