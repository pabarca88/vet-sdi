<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Intentar obtener TipoAdministrador
try {
    echo "=== TIPOS DE ADMINISTRADOR ===\n";
    $tipos = DB::table('tipo_administrador')->where('estado', 1)->get();
    foreach($tipos as $tipo) {
        echo "ID: {$tipo->id} - Nombre: '{$tipo->nombres}'\n";
    }
} catch (Exception $e) {
    echo "Error obteniendo tipos de administrador: " . $e->getMessage() . "\n";
}

// Intentar obtener AsistenteTipo
try {
    echo "\n=== TIPOS DE ASISTENTE ===\n";
    $tipos = DB::table('asistente_tipo')->where('estado', 1)->get();
    foreach($tipos as $tipo) {
        echo "ID: {$tipo->id} - Nombre: '{$tipo->nombre}'\n";
    }
} catch (Exception $e) {
    echo "Error obteniendo tipos de asistente: " . $e->getMessage() . "\n";
}
