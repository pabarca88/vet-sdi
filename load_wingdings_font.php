<?php
/**
 * Script para cargar la fuente Wingdings 3 en DomPDF
 * 
 * Ejecutar desde la línea de comandos:
 * php load_wingdings_font.php
 */

require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\FontMetrics;

// Configurar DomPDF
$dompdf = new Dompdf();
$fontMetrics = $dompdf->getFontMetrics();

// Rutas de archivos
$fontDir = storage_path('fonts');
$fontPath = $fontDir . '/wingdings3.ttf';  // Coloca aquí tu archivo Wingdings 3

// Verificar que la fuente existe
if (!file_exists($fontPath)) {
    echo "❌ Error: El archivo de fuente no existe en: $fontPath\n";
    echo "💡 Por favor, copia el archivo wingdings3.ttf a la carpeta storage/fonts/\n";
    echo "   Puedes encontrarlo en C:\\Windows\\Fonts\\wingding3.ttf (Windows)\n";
    exit(1);
}

try {
    // Registrar la fuente
    echo "🔄 Cargando fuente Wingdings 3...\n";
    
    // Usar el load_font de DomPDF
    $fontMetrics->registerFont(
        array(
            'family' => 'Wingdings 3',
            'style' => 'normal',
            'weight' => 'normal'
        ),
        $fontPath
    );
    
    echo "✅ Fuente Wingdings 3 cargada exitosamente!\n";
    echo "📁 Archivos generados en: $fontDir\n";
    
    // Verificar que se generaron los archivos necesarios
    $requiredFiles = [
        'wingdings3.ufm',
        'wingdings3.afm'
    ];
    
    foreach ($requiredFiles as $file) {
        $filePath = $fontDir . '/' . $file;
        if (file_exists($filePath)) {
            echo "✅ $file - OK\n";
        } else {
            echo "⚠️ $file - No encontrado\n";
        }
    }
    
    echo "\n🎯 Ahora puedes usar la fuente en tu CSS:\n";
    echo "   font-family: 'Wingdings 3', monospace;\n";
    
} catch (Exception $e) {
    echo "❌ Error al cargar la fuente: " . $e->getMessage() . "\n";
    exit(1);
}