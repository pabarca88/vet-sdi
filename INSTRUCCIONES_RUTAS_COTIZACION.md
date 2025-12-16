# Instrucciones para Configurar las Rutas de Cotización en JavaScript

## 📋 Paso 1: Agregar el objeto de rutas en la vista Blade

Abre el archivo: `atencion_prof_laboratorio_especialidades.blade.php`

Busca la sección de scripts (normalmente al final del archivo, antes del `@endsection` o `@push('scripts')`)

Y agrega el siguiente código:

```blade
@push('scripts')
    {{-- Rutas para el sistema de cotizaciones --}}
    <script>
        // Definir rutas de Laravel para JavaScript
        window.cotizacionRoutes = {
            buscarProductos: "{{ route('laboratorio.cotizaciones.buscar_productos') }}",
            guardarBorrador: "{{ route('laboratorio.cotizaciones.guardar_borrador') }}",
            vistaPrevia: "{{ route('laboratorio.cotizaciones.vista_previa') }}",
            generar: "{{ route('laboratorio.cotizaciones.generar') }}",
            enviarEmail: "{{ route('laboratorio.cotizaciones.enviar_email') }}",
            historial: "{{ route('laboratorio.cotizaciones.historial', ':paciente_id') }}",
            detalle: "{{ route('laboratorio.cotizaciones.detalle', ':id') }}",
            descargarPdf: "{{ route('laboratorio.cotizaciones.descargar_pdf', ':id') }}",
            anular: "{{ route('laboratorio.cotizaciones.anular', ':id') }}",
            aceptar: "{{ route('laboratorio.cotizaciones.aceptar', ':id') }}",
            rechazar: "{{ route('laboratorio.cotizaciones.rechazar', ':id') }}"
        };
    </script>

    {{-- Incluir el script de cotizaciones --}}
    <script src="{{ asset('js/cotizacion_audifonos.js') }}"></script>
@endpush
```

## 📋 Paso 2: Verificar que existe el meta tag CSRF

En el `<head>` de tu layout principal (normalmente `app.blade.php` o `master.blade.php`), asegúrate de tener:

```blade
<meta name="csrf-token" content="{{ csrf_token() }}">
```

## 📋 Paso 3: Incluir el CSS

En la sección de estilos, agrega:

```blade
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cotizacion_audifonos.css') }}">
@endpush
```

## 📋 Paso 4: Verificar campo oculto del paciente

En el formulario de cotización, asegúrate de tener el campo oculto con el ID del paciente:

```blade
<input type="hidden" id="id_paciente" name="id_paciente" value="{{ $paciente->id }}">
```

## 🔄 Resumen de Cambios Realizados

### ✅ Archivo: `cotizacion_audifonos.js`

Se actualizaron todas las URLs de AJAX para usar el objeto `window.cotizacionRoutes`:

1. **Búsqueda de productos**:
   - Antes: `/api/productos/buscar-cotizacion`
   - Ahora: `window.cotizacionRoutes.buscarProductos`

2. **Guardar borrador**:
   - Antes: `/api/cotizaciones/guardar-borrador`
   - Ahora: `window.cotizacionRoutes.guardarBorrador`

3. **Vista previa**:
   - Antes: `/api/cotizaciones/vista-previa`
   - Ahora: `window.cotizacionRoutes.vistaPrevia`

4. **Generar cotización**:
   - Antes: `/api/cotizaciones/generar`
   - Ahora: `window.cotizacionRoutes.generar`

5. **Enviar email**:
   - Antes: `/api/cotizaciones/enviar-email`
   - Ahora: `window.cotizacionRoutes.enviarEmail`

6. **Historial**:
   - Antes: `/api/cotizaciones/historial/${pacienteId}`
   - Ahora: `window.cotizacionRoutes.historial.replace(':paciente_id', pacienteId)`

7. **Ver detalle**:
   - Antes: `/cotizaciones/${id}/detalle`
   - Ahora: `window.cotizacionRoutes.detalle.replace(':id', id)`

8. **Descargar PDF**:
   - Antes: `/cotizaciones/${id}/pdf`
   - Ahora: `window.cotizacionRoutes.descargarPdf.replace(':id', id)`

9. **Anular cotización**:
   - Antes: `/api/cotizaciones/${id}/anular`
   - Ahora: `window.cotizacionRoutes.anular.replace(':id', id)`

### ✅ Se agregó a todas las peticiones AJAX:

```javascript
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
```

Esto asegura que Laravel acepte las peticiones POST, PUT, DELETE.

## 🧪 Pruebas

Para verificar que todo funciona correctamente:

1. Abre la consola del navegador (F12)
2. Verifica que `window.cotizacionRoutes` existe:
   ```javascript
   console.log(window.cotizacionRoutes);
   ```
3. Deberías ver un objeto con todas las rutas

## ⚠️ Nota Importante

Las rutas con parámetros (`:id`, `:paciente_id`) usan `.replace()` en JavaScript para reemplazar el placeholder con el valor real:

```javascript
// Ejemplo:
// Ruta: "/Laboratorio/Cotizaciones/historial/:paciente_id"
// Se convierte en: "/Laboratorio/Cotizaciones/historial/123"

const url = window.cotizacionRoutes.historial.replace(':paciente_id', 123);
```

## 🔧 Troubleshooting

### Si ves errores de "cotizacionRoutes is not defined":
- Asegúrate de que el script con las rutas se carga ANTES de `cotizacion_audifonos.js`

### Si las peticiones AJAX fallan con error 419:
- Verifica que el meta tag CSRF está presente
- Verifica que el header `X-CSRF-TOKEN` se está enviando

### Si las rutas no funcionan:
- Ejecuta `php artisan route:clear`
- Ejecuta `php artisan route:cache`
- Verifica que las rutas están registradas: `php artisan route:list | grep cotizacion`

## 📞 Soporte

Si tienes problemas, verifica:
1. ✅ Las rutas están registradas en `web.php`
2. ✅ El controlador existe: `CotizacionController`
3. ✅ Los métodos del controlador existen
4. ✅ El objeto `window.cotizacionRoutes` se define antes de cargar el JS
5. ✅ El token CSRF está presente en el meta tag

---

**¡Listo!** Ahora el sistema de cotizaciones está completamente integrado con las rutas de Laravel.
