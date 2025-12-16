# Interfaz PDF para VPPB (Vértigo Posicional Paroxístico Benigno)

## Descripción General

Se ha creado una interfaz completa para generar PDFs de evaluación de VPPB (Vértigo Posicional Paroxístico Benigno), diseñada específicamente para documentación médica profesional.

## Campos Principales Requeridos

### Campos Obligatorios
- `$tipo_tratamiento` (string) - Tipo de tratamiento prescrito
- `$observaciones` (string) - Observaciones y recomendaciones

### Campos Adicionales Disponibles

#### Información del Paciente
- `$paciente` - Objeto con datos del paciente
- `$profesional` - Objeto con datos del profesional
- `$ficha_atencion` - Objeto con datos de la ficha
- `$edad` - Edad calculada del paciente
- `$fecha_examen` - Fecha del examen
- `$derivado_por` - Profesional que deriva

#### Anamnesis
- `$motivo_consulta` - Motivo de la consulta
- `$historia_actual` - Historia clínica actual
- `$sintomas_asociados` - Síntomas asociados

#### Maniobras Diagnósticas
- `$dix_hallpike_derecha` - Resultado Dix-Hallpike derecha
- `$nistagmo_dix_derecha` - Nistagmo observado (derecha)
- `$dix_hallpike_izquierda` - Resultado Dix-Hallpike izquierda
- `$nistagmo_dix_izquierda` - Nistagmo observado (izquierda)
- `$mcclure_test` - Resultado test McClure (Roll Test)
- `$nistagmo_mcclure` - Nistagmo en McClure

#### Exploración Física
- `$head_impulse` - Resultado Head Impulse Test
- `$nistagmo_espontaneo` - Nistagmo espontáneo
- `$romberg` - Prueba de Romberg
- `$marcha` - Evaluación de la marcha
- `$coordinacion` - Pruebas de coordinación
- `$funcion_cerebelar` - Función cerebelar

#### Diagnóstico
- `$tipo_vppb` - Tipo específico de VPPB
- `$canal_afectado` - Canal semicircular afectado
- `$lateralidad` - Lado afectado (derecho/izquierdo)

#### Seguimiento
- `$proximo_control` - Fecha próximo control
- `$indicaciones_seguimiento` - Indicaciones para seguimiento

## Ejemplo de Uso en Controlador

```php
public function pdf_vppb(Request $request)
{
    // Obtener datos básicos
    $ficha_atencion = FichaAtencion::find($request->id_fc);
    $paciente = Paciente::find($ficha_atencion->id_paciente);
    $profesional = Profesional::with('especialidad')->find($ficha_atencion->id_profesional);
    
    // Calcular edad
    $edad = '';
    if ($paciente && $paciente->fecha_nacimiento) {
        $fechaNac = new \DateTime($paciente->fecha_nacimiento);
        $hoy = new \DateTime();
        $edad = $hoy->diff($fechaNac)->y . ' años';
    }
    
    // Preparar datos para la vista
    $data = [
        'paciente' => $paciente,
        'profesional' => $profesional,
        'ficha_atencion' => $ficha_atencion,
        'edad' => $edad,
        'fecha_examen' => $request->fecha_examen ?? date('d-m-Y'),
        
        // Campos principales requeridos
        'tipo_tratamiento' => $request->tipo_tratamiento ?? '',
        'observaciones' => $request->observaciones ?? '',
        
        // Anamnesis
        'motivo_consulta' => $request->motivo_consulta ?? '',
        'historia_actual' => $request->historia_actual ?? '',
        'sintomas_asociados' => $request->sintomas_asociados ?? '',
        
        // Maniobras diagnósticas
        'dix_hallpike_derecha' => $request->dix_hallpike_derecha ?? '',
        'nistagmo_dix_derecha' => $request->nistagmo_dix_derecha ?? '',
        'dix_hallpike_izquierda' => $request->dix_hallpike_izquierda ?? '',
        'nistagmo_dix_izquierda' => $request->nistagmo_dix_izquierda ?? '',
        'mcclure_test' => $request->mcclure_test ?? '',
        'nistagmo_mcclure' => $request->nistagmo_mcclure ?? '',
        
        // Exploración física
        'head_impulse' => $request->head_impulse ?? '',
        'nistagmo_espontaneo' => $request->nistagmo_espontaneo ?? '',
        'romberg' => $request->romberg ?? '',
        'marcha' => $request->marcha ?? '',
        'coordinacion' => $request->coordinacion ?? '',
        'funcion_cerebelar' => $request->funcion_cerebelar ?? '',
        
        // Diagnóstico
        'tipo_vppb' => $request->tipo_vppb ?? '',
        'canal_afectado' => $request->canal_afectado ?? '',
        'lateralidad' => $request->lateralidad ?? '',
        
        // Seguimiento
        'proximo_control' => $request->proximo_control ?? '',
        'indicaciones_seguimiento' => $request->indicaciones_seguimiento ?? '',
        'derivado_por' => $request->derivado_por ?? '',
    ];
    
    // Generar PDF
    $pdf = Pdf::loadView('app.laboratorio.pdf.vppb', $data);
    $pdf->setPaper('A4', 'portrait');
    
    // Guardar archivo
    $filename = 'vppb_' . str_replace('-', '', $paciente->rut) . '_' . date('YmdHis') . '.pdf';
    $reportesPath = public_path('reportes');
    if (!file_exists($reportesPath)) {
        mkdir($reportesPath, 0777, true);
    }
    
    $filePath = $reportesPath . '/' . $filename;
    file_put_contents($filePath, $pdf->output());
    
    return response()->json([
        'success' => true,
        'message' => 'PDF VPPB generado exitosamente',
        'ruta' => asset('reportes/' . $filename),
        'filename' => $filename
    ]);
}
```

## Características del Diseño

### Estilo Visual
- ✅ **Diseño médico profesional** con colores institucionales
- ✅ **Secciones claramente delimitadas** para fácil lectura
- ✅ **Tipografía optimizada** para impresión y visualización digital
- ✅ **Espaciado adecuado** para completar a mano si es necesario

### Secciones Incluidas
1. **Header** - Título y datos del centro médico
2. **Información del Paciente** - Datos personales y de la consulta
3. **Anamnesis** - Historia clínica y síntomas
4. **Evaluación Clínica VPPB** - Maniobras diagnósticas y hallazgos
5. **Diagnóstico** - Tipo de VPPB y localización
6. **Plan de Tratamiento** - Tratamiento prescrito (campo principal)
7. **Observaciones** - Recomendaciones (campo principal)
8. **Seguimiento** - Controles y indicaciones
9. **Firmas** - Datos del profesional y fecha

### Campos Destacados
- **Tipo de tratamiento**: Caja verde destacada para el plan terapéutico
- **Observaciones**: Caja gris con mayor espacio para recomendaciones detalladas

## Compatibilidad
- ✅ DomPDF
- ✅ Formato A4 vertical
- ✅ Impresión en papel
- ✅ Visualización digital
- ✅ UTF-8 para caracteres especiales

## Fecha de Creación
**6 de octubre de 2025** - Interfaz PDF completa para evaluación VPPB
