# Instalación de Fuente Wingdings 3 para DomPDF

## Pasos para instalar la fuente Wingdings 3

### 1. Obtener el archivo de fuente

**Opción A: Desde Windows**
```bash
# Copiar desde la carpeta de fuentes de Windows
copy "C:\Windows\Fonts\wingding3.ttf" "storage\fonts\wingdings3.ttf"
```

**Opción B: Descargar online**
- Visita Font Squirrel, Google Fonts o similar
- Descarga el archivo `wingdings3.ttf`
- Colócalo en `storage/fonts/wingdings3.ttf`

### 2. Ejecutar el script de carga

```bash
# Desde la raíz del proyecto Laravel
php load_wingdings_font.php
```

### 3. Verificar instalación

Después de ejecutar el script, deberías ver estos archivos en `storage/fonts/`:
```
storage/fonts/
├── wingdings3.ttf
├── wingdings3.ufm
├── wingdings3.afm
└── (otros archivos de cache de DomPDF)
```

### 4. Actualizar CSS en plantilla PDF

Cambiar en `resources/views/app/laboratorio/pdf/audiometria.blade.php`:

```css
/* ANTES */
.nistagmo-direction {
    font-family: "Courier New", monospace;
}

/* DESPUÉS */
.nistagmo-direction {
    font-family: "Wingdings 3", "Courier New", monospace;
}
```

### 5. Actualizar función PHP para usar caracteres Unicode

En `OctavoParController.php`, cambiar la función:

```php
private static function convertirValorAWingdings($valor)
{
    $mapeo = [
        '0' => '',              // Vacío
        '1' => '0',             // Sin dirección
        '2' => chr(0xE8),       // Derecha (Wingdings 3: 232)
        '3' => chr(0xE7),       // Izquierda (Wingdings 3: 231)
        '4' => chr(0xE5),       // Arriba (Wingdings 3: 229)
        '5' => chr(0xE6),       // Abajo (Wingdings 3: 230)
        // ... más mapeos según necesidades
    ];

    return $mapeo[$valor] ?? '';
}
```

## Troubleshooting

### Error: Fuente no encontrada
1. Verificar que `wingdings3.ttf` existe en `storage/fonts/`
2. Verificar permisos de escritura en `storage/fonts/`
3. Limpiar cache: `php artisan cache:clear`

### Símbolos no aparecen en PDF
1. Verificar que los archivos `.ufm` y `.afm` se generaron
2. Probar con caracteres ASCII como respaldo
3. Verificar configuración de codificación UTF-8

### Permisos en servidor
```bash
# Dar permisos a la carpeta de fuentes
chmod 755 storage/fonts/
chmod 644 storage/fonts/*
```

## Alternativas

Si Wingdings 3 no funciona, puedes usar:

1. **Caracteres Unicode**: ← → ↑ ↓ ↗ ↖ ↘ ↙ ⟲
2. **Fuentes web-safe**: Arial Unicode MS, Courier New
3. **Caracteres ASCII**: < > ^ v (como actualmente)
