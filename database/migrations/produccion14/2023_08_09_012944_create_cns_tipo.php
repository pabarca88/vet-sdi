<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCnsTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cns_tipo_template', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cuerpo');
            $table->string('pdf')->nullable();
            $table->string('estructura');
            $table->string('alias');
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('cns_tipo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cns_template');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('cns_tipo_template');
        Schema::dropIfExists('cns_tipo');
    }
}
