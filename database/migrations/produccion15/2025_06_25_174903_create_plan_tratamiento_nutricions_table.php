<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTratamientoNutricionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento')->nullable();
            $table->integer('numero_sesiones')->nullable();
            $table->text('objetivos')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            // Clave foránea (opcional, si tienes la tabla fichas_atenciones)
            $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atenciones')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_tratamiento_nutricion');
    }
}

