<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionNutricionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('atencion_nutricion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_paciente');
            $table->date('fecha');
            $table->boolean('estado')->default(1);
            $table->text('observaciones')->nullable();
            $table->json('datos_nutri');
            $table->timestamps();

            // Claves foráneas (opcionales si las tablas existen)
            // $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atencion_nutricion');
    }
}
