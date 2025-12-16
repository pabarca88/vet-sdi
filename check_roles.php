<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Spatie\Permission\Models\Role;
use App\Models\TipoAdministrador;

echo "=== ROLES DISPONIBLES EN SPATIE ===\n";
$roles = Role::all();
foreach($roles as $role) {
    echo "ID: {$role->id} - Nombre: '{$role->name}'\n";
}

echo "\n=== TIPOS DE ADMINISTRADOR ===\n";
$tiposAdmin = TipoAdministrador::where('estado', 1)->get();
foreach($tiposAdmin as $tipo) {
    echo "ID: {$tipo->id} - Nombre: '{$tipo->nombres}'\n";
}

echo "\n=== VERIFICAR CORRESPONDENCIA ===\n";
echo "Los roles de Spatie deben corresponder con los IDs de TipoAdministrador\n";
echo "Por ejemplo, si TipoAdministrador ID 1 = 'Administrador de CM', entonces debe existir Role con name = '1'\n";
