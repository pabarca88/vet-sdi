<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_rehab_implantologia', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('cantidad_bloques')->nullable();
            $table->decimal('valor', 12, 2)->nullable();
            $table->string('uco')->nullable();
            $table->string('tipo_examen')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_responsable')->nullable();
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
        Schema::dropIfExists('tratamientos_rehab_implantologia');
    }
};
