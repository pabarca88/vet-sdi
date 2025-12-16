<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAtencioNutricionToAtencionProfesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::rename('atencion_nutricion', 'atencion_profesion');
    }

    public function down(): void
    {
        Schema::rename('atencion_profesion', 'atencion_nutricion');
    }
}
