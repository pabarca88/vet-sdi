<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaniasPublicitariasTable extends Migration
{
    public function up()
    {
        Schema::create('campanias_publicitarias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_institucion')->nullable();
            $table->string('titulo', 100);
            $table->string('remitente', 150);
            $table->text('mensaje');
            $table->enum('destinatarios', ['pacientes', 'profesionales', 'personal', 'custom']);
            $table->text('destinatarios_custom')->nullable();
            $table->timestamp('fecha_envio')->nullable();
            $table->string('estado', 30)->default('pendiente'); // pendiente, enviado, error
            $table->integer('total_enviados')->default(0);
            $table->integer('total_errores')->default(0);
            $table->json('log_envio')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campanias_publicitarias');
    }
}
