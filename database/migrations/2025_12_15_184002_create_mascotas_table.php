<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_responsable');
            $table->string('chip')->nullable();
            $table->string('nombre');
            $table->unsignedTinyInteger('especie')->nullable();
            $table->string('otra_especie')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo', 1)->nullable();
            $table->string('foto_perfil')->nullable();
            $table->text('galeria')->nullable();
            $table->text('observaciones_fotos')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();

            $table->foreign('id_responsable')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
