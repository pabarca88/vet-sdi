<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->id();
            $table->string('rut', 12)->unique();
            $table->string('nombres', 100);
            $table->string('apellido_uno', 50);
            $table->string('apellido_dos', 50);
            $table->string('telefono_uno', 20);
            $table->string('telefono_dos', 20)->nullable();
            $table->char('sexo', 1)->nullable();
            $table->string('email', 200)->unique();
            $table->date('fecha_nac')->nullable();
            $table->unsignedBigInteger('id_premium')->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();

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
        Schema::dropIfExists('asistentes');
    }
}