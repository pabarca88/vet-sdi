<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaAtencion;
use App\Models\OctavoPar;
use App\Models\Paciente;
use App\Models\Profesional;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;

class OctavoParController extends Controller
{
    // Mapeo de valores a símbolos de Wingdings 3 para direcciones de nistagmo
    // Mapeo de valores a símbolos Unicode para direcciones de nistagmo
    private static function convertirValorAWingdings($valor)
    {
        // Mapeo completo para TODAS las opciones de direcciones
        $mapeo = [
            // Valores vacíos y sin dirección
            '0' => '',           // Vacío
            '1' => '0',          // Sin dirección
            
            // Nistagmo provocado (valores 2-10, letras G,F,I,H,J,K,M,L,N)
            '2' => '→',          // G -> Derecha
            '3' => '←',          // F -> Izquierda  
            '4' => '↑',          // I -> Arriba
            '5' => '↓',          // H -> Abajo
            '6' => '↗',          // J -> Diagonal arriba-derecha
            '7' => '↖',          // K -> Diagonal arriba-izquierda
            '8' => '↘',          // M -> Diagonal abajo-derecha
            '9' => '↙',          // L -> Diagonal abajo-izquierda
            '10' => '⟲',         // N -> Rotacional
            
            // Nistagmo espontáneo (valores 11-13, letras i,j,k,l)
            '11' => '↻',         // i -> Rotacional horario
            '12' => '↺',         // j -> Rotacional antihorario  
            '13' => '⇄',         // k -> Bidireccional horizontal
            
            // Mapeos adicionales si se necesitan
            '14' => '⇅',         // l -> Bidireccional vertical
            '15' => '◊',         // Nistagmo multidireccional
        ];

        return $mapeo[$valor] ?? '';
    }

    private static function convertirValorSiNo($valor)
    {
        $mapeo = [
            '0' => '',
            '1' => 'Sí',
            '2' => 'No',
            '3' => ''
        ];

        return $mapeo[$valor] ?? '';
    }

    private static function convertirValorSintomas($valor)
    {
        $mapeo = [
            '0' => '0',
            '1' => '+',
            '2' => '++',
            // '3' => '++'  // Cambiado de '' a '++'
        ];

        return $mapeo[$valor] ?? '';
    }    // NISTAGMO PROVOCADO - json
    static public function estructuraExaNistagmoProvocado(Request $request)
    {
        // Extraer datos del array nistagmo_provocado si existe
        $nistagmo_provocado = $request->nistagmo_provocado ?? [];

        $datos = array();

        // Función helper para obtener valor con fallback
        $getValue = function($key_array, $key_direct) use ($nistagmo_provocado, $request) {
            if (is_array($nistagmo_provocado) && isset($nistagmo_provocado[$key_array])) {
                return $nistagmo_provocado[$key_array];
            }
            return $request->{$key_direct} ?? '';
        };

        $datos['EaS'] = self::convertirValorAWingdings($getValue('EaS', 'EaS'));
        $datos['LatEaS'] = $getValue('LatEaS', 'LatEaS');
        $datos['par1'] = $getValue('par1', 'par1');
        $datos['fat1'] = $getValue('fat1', 'fat1');
        $datos['DurEaS'] = $getValue('DurEaS', 'DurEaS');
        $datos['verEaS'] = $getValue('verEaS', 'verEaS');
        $datos['NauEaS'] = $getValue('NauEaS', 'NauEaS');
        $datos['VomEaS'] = $getValue('VomEaS', 'VomEaS');
        $datos['SaD'] = self::convertirValorAWingdings($getValue('SaD', 'SaD'));
        $datos['LatSaD'] = $getValue('LatSaD', 'LatSaD');
        $datos['sad_1'] = $getValue('sad_1', 'sad_1');
        $datos['sad_2'] = $getValue('sad_2', 'sad_2');
        $datos['DurSaD'] = $getValue('DurSaD', 'DurSaD');
        $datos['sad_3'] = $getValue('sad_3', 'sad_3');
        $datos['sad_4'] = $getValue('sad_4', 'sad_4');
        $datos['sad_5'] = $getValue('sad_5', 'sad_5');
        $datos['DaS'] = self::convertirValorAWingdings($getValue('DaS', 'DaS'));
        $datos['LatDaS'] = $getValue('LatDaS', 'LatDaS');
        $datos['DaS_1'] = $getValue('DaS_1', 'DaS_1');
        $datos['DaS_2'] = $getValue('DaS_2', 'DaS_2');
        $datos['DurDaS'] = $getValue('DurDaS', 'DurDaS');
        $datos['DaS_3'] = $getValue('DaS_3', 'DaS_3');
        $datos['DaS_4'] = $getValue('DaS_4', 'DaS_4');
        $datos['DaS_5'] = $getValue('DaS_5', 'DaS_5');
        $datos['SaL'] = self::convertirValorAWingdings($getValue('SaL', 'SaL'));
        $datos['LatSal'] = $getValue('LatSal', 'LatSal');
        $datos['SaL_1'] = $getValue('SaL_1', 'SaL_1');
        $datos['SaL_2'] = $getValue('SaL_2', 'SaL_2');
        $datos['DurSal'] = $getValue('DurSal', 'DurSal');
        $datos['SaL_3'] = $getValue('SaL_3', 'SaL_3');
        $datos['SaL_4'] = $getValue('SaL_4', 'SaL_4');
        $datos['SaL_5'] = $getValue('SaL_5', 'SaL_5');
        $datos['LaS'] = self::convertirValorAWingdings($getValue('LaS', 'LaS'));
        $datos['LatLas'] = $getValue('LatLas', 'LatLas');
        $datos['LaS_1'] = $getValue('LaS_1', 'LaS_1');
        $datos['LaS_2'] = $getValue('LaS_2', 'LaS_2');
        $datos['DurLaS'] = $getValue('DurLaS', 'DurLaS');
        $datos['LaS_3'] = $getValue('LaS_3', 'LaS_3');
        $datos['LaS_4'] = $getValue('LaS_4', 'LaS_4');
        $datos['LaS_5'] = $getValue('LaS_5', 'LaS_5');
        $datos['SaE'] = self::convertirValorAWingdings($getValue('SaE', 'SaE'));
        $datos['LatSaE'] = $getValue('LatSaE', 'LatSaE');
        $datos['SaE_1'] = $getValue('SaE_1', 'SaE_1');
        $datos['SaE_2'] = $getValue('SaE_2', 'SaE_2');
        $datos['DurSaE'] = $getValue('DurSaE', 'DurSaE');
        $datos['SaE_3'] = $getValue('SaE_3', 'SaE_3');
        $datos['SaE_4'] = $getValue('SaE_4', 'SaE_4');
        $datos['SaE_5'] = $getValue('SaE_5', 'SaE_5');
        $datos['EaCC'] = self::convertirValorAWingdings($getValue('EaCC', 'EaCC'));
        $datos['LatEaCC'] = $getValue('LatEaCC', 'LatEaCC');
        $datos['EaCC_1'] = $getValue('EaCC_1', 'EaCC_1');
        $datos['EaCC_2'] = $getValue('EaCC_2', 'EaCC_2');
        $datos['DurEaCC'] = $getValue('DurEaCC', 'DurEaCC');
        $datos['EaCC_3'] = $getValue('EaCC_3', 'EaCC_3');
        $datos['EaCC_4'] = $getValue('EaCC_4', 'EaCC_4');
        $datos['EaCC_5'] = $getValue('EaCC_5', 'EaCC_5');
        $datos['CCaE'] = self::convertirValorAWingdings($getValue('CCaE', 'CCaE'));
        $datos['LatCCaE'] = $getValue('LatCCaE', 'LatCCaE');
        $datos['CCaE_1'] = $getValue('CCaE_1', 'CCaE_1');
        $datos['CCaE_2'] = $getValue('CCaE_2', 'CCaE_2');
        $datos['DurCCaE'] = $getValue('DurCCaE', 'DurCCaE');
        $datos['CCaE_3'] = $getValue('CCaE_3', 'CCaE_3');
        $datos['CCaE_4'] = $getValue('CCaE_4', 'CCaE_4');
        $datos['CCaE_5'] = $getValue('CCaE_5', 'CCaE_5');
        $datos['EaCCd'] = self::convertirValorAWingdings($getValue('EaCCd', 'EaCCd'));
        $datos['LatEaCCd'] = $getValue('LatEaCCd', 'LatEaCCd');
        $datos['EaCCd_1'] = $getValue('EaCCd_1', 'EaCCd_1');
        $datos['EaCCd_2'] = $getValue('EaCCd_2', 'EaCCd_2');
        $datos['DurEaCCd'] = $getValue('DurEaCCd', 'DurEaCCd');
        $datos['EaCCd_3'] = $getValue('EaCCd_3', 'EaCCd_3');
        $datos['EaCCd_4'] = $getValue('EaCCd_4', 'EaCCd_4');
        $datos['EaCCd_5'] = $getValue('EaCCd_5', 'EaCCd_5');
        $datos['CCdaE'] = self::convertirValorAWingdings($getValue('CCdaE', 'CCdaE'));
        $datos['LatCCdaE'] = $getValue('LatCCdaE', 'LatCCdaE');
        $datos['CCdaE_1'] = $getValue('CCdaE_1', 'CCdaE_1');
        $datos['CCdaE_2'] = $getValue('CCdaE_2', 'CCdaE_2');
        $datos['DurCCdaE'] = $getValue('DurCCdaE', 'DurCCdaE');
        $datos['CCdaE_3'] = $getValue('CCdaE_3', 'CCdaE_3');
        $datos['CCdaE_4'] = $getValue('CCdaE_4', 'CCdaE_4');
        $datos['CCdaE_5'] = $getValue('CCdaE_5', 'CCdaE_5');
        $datos['EaCCi'] = self::convertirValorAWingdings($getValue('EaCCi', 'EaCCi'));
        $datos['LatEaCCi'] = $getValue('LatEaCCi', 'LatEaCCi');
        $datos['EaCCi_1'] = $getValue('EaCCi_1', 'EaCCi_1');
        $datos['EaCCi_2'] = $getValue('EaCCi_2', 'EaCCi_2');
        $datos['DurEaCCi'] = $getValue('DurEaCCi', 'DurEaCCi');
        $datos['EaCCi_3'] = $getValue('EaCCi_3', 'EaCCi_3');
        $datos['EaCCi_4'] = $getValue('EaCCi_4', 'EaCCi_4');
        $datos['EaCCi_5'] = $getValue('EaCCi_5', 'EaCCi_5');
        $datos['CCiaE'] = $getValue('CCiaE', 'CCiaE');
        $datos['LatCCiaE'] = $getValue('LatCCiaE', 'LatCCiaE');
        $datos['CCiaE_1'] = $getValue('CCiaE_1', 'CCiaE_1');
        $datos['CCiaE_2'] = $getValue('CCiaE_2', 'CCiaE_2');
        $datos['DurCCiaE'] = $getValue('DurCCiaE', 'DurCCiaE');
        $datos['CCiaE_3'] = $getValue('CCiaE_3', 'CCiaE_3');
        $datos['CCiaE_4'] = $getValue('CCiaE_4', 'CCiaE_4');
        $datos['CCiaE_5'] = $getValue('CCiaE_5', 'CCiaE_5');

        return json_encode($datos);
    }

    //
    static public function estructuraExaPruebaCalorica(Request $request)
    {
        // Extraer datos del array prueba_calorica si existe
        $prueba_calorica = $request->prueba_calorica ?? [];

        // Función helper para obtener valor con fallback
        $getValue = function($key_array, $key_direct) use ($prueba_calorica, $request) {
            if (is_array($prueba_calorica) && isset($prueba_calorica[$key_array])) {
                return $prueba_calorica[$key_array];
            }
            return $request->{$key_direct} ?? '';
        };

        $datos = array();
        $datos['DUR_IO30'] = $getValue('DUR_IO30', 'DUR_IO30');
        $datos['FR_IO30'] = $getValue('FR_IO30', 'FR_IO30');
        $datos['AM_IO30'] = $getValue('AM_IO30', 'AM_IO30');
        $datos['IO30_1'] = $getValue('IO30_1', 'IO30_1');
        $datos['IO30_2'] = $getValue('IO30_2', 'IO30_2');
        $datos['IO30_3'] = $getValue('IO30_3', 'IO30_3');
        $datos['VCL_IO30'] = $getValue('VCL_IO30', 'VCL_IO30');
        $datos['DUR_OD30'] = $getValue('DUR_OD30', 'DUR_OD30');
        $datos['FR_OD30'] = $getValue('FR_OD30', 'FR_OD30');
        $datos['AM_OD30'] = $getValue('AM_OD30', 'AM_OD30');
        $datos['OD30_1'] = $getValue('OD30_1', 'OD30_1');
        $datos['OD30_2'] = $getValue('OD30_2', 'OD30_2');
        $datos['OD30_3'] = $getValue('OD30_3', 'OD30_3');
        $datos['VCL_OD30'] = $getValue('VCL_OD30', 'VCL_OD30');
        $datos['DUR_IO44'] = $getValue('DUR_IO44', 'DUR_IO44');
        $datos['FR_IO44'] = $getValue('FR_IO44', 'FR_IO44');
        $datos['AM_IO44'] = $getValue('AM_IO44', 'AM_IO44');
        $datos['IO44_1'] = $getValue('IO44_1', 'IO44_1');
        $datos['IO44_2'] = $getValue('IO44_2', 'IO44_2');
        $datos['IO44_3'] = $getValue('IO44_3', 'IO44_3');
        $datos['VCL_IO44'] = $getValue('VCL_IO44', 'VCL_IO44');
        $datos['DUR_OD44'] = $getValue('DUR_OD44', 'DUR_OD44');
        $datos['FR_OD44'] = $getValue('FR_OD44', 'FR_OD44');
        $datos['AM_OD44'] = $getValue('AM_OD44', 'AM_OD44');
        $datos['OD44_1'] = $getValue('OD44_1', 'OD44_1');
        $datos['OD44_2'] = $getValue('OD44_2', 'OD44_2');
        $datos['OD44_3'] = $getValue('OD44_3', 'OD44_3');
        $datos['VCL_OD44'] = $getValue('VCL_OD44', 'VCL_OD44');
        $datos['DUR_OI18'] = $getValue('DUR_OI18', 'DUR_OI18');
        $datos['FR_OI18'] = $getValue('FR_OI18', 'FR_OI18');
        $datos['AM_OI18'] = $getValue('AM_OI18', 'AM_OI18');
        $datos['OI18_1'] = $getValue('OI18_1', 'OI18_1');
        $datos['OI18_2'] = $getValue('OI18_2', 'OI18_2');
        $datos['OI18_3'] = $getValue('OI18_3', 'OI18_3');
        $datos['VCL_OI18'] = $getValue('VCL_OI18', 'VCL_OI18');
        $datos['DUR_OP18'] = $getValue('DUR_OP18', 'DUR_OP18');
        $datos['FR_OP18'] = $getValue('FR_OP18', 'FR_OP18');
        $datos['AM_OP18'] = $getValue('AM_OP18', 'AM_OP18');
        $datos['OP18_1'] = $getValue('OP18_1', 'OP18_1');
        $datos['OP18_2'] = $getValue('OP18_2', 'OP18_2');
        $datos['OP18_3'] = $getValue('OP18_3', 'OP18_3');
        $datos['VCL_OP18'] = $getValue('VCL_OP18', 'VCL_OP18');

        return json_encode($datos);
    }

    /**
     * Generar PDF del examen funcional del 8° par
     */
    public function pdf_ficha_fono_octavo_par(Request $request)
    {
        try {
            // Obtener la ficha de atención
            $id_ficha_atencion = $request->id_fc;
            $ficha_atencion = FichaAtencion::find($id_ficha_atencion);

            if (!$ficha_atencion) {
                return response()->json(['error' => 'Ficha de atención no encontrada'], 404);
            }

            // Obtener datos del paciente
            $paciente = Paciente::find($ficha_atencion->id_paciente);

            // Obtener datos del profesional
            $profesional = Profesional::with('especialidad')->find($ficha_atencion->id_profesional);

            // Obtener datos del examen octavo par
            $octavo_par = OctavoPar::where('id_otros_profesionales', $id_ficha_atencion)->first();

            // Calcular edad del paciente
            $edad = '';
            if ($paciente && $paciente->fecha_nacimiento) {
                $fechaNac = new \DateTime($paciente->fecha_nacimiento);
                $hoy = new \DateTime();
                $edad = $hoy->diff($fechaNac)->y . ' años';
            }

            // Extraer datos de nistagmo espontaneo del array JSON
            $nistagmo_espontaneo = $request->nistagmo_espontaneo ?? [];

            // Extraer datos de nistagmo provocado del array JSON
            $nistagmo_provocado = $request->nistagmo_provocado ?? [];

            // Extraer datos de prueba calorica del array JSON
            $prueba_calorica = $request->prueba_calorica ?? [];

            // Preparar datos para la vista
            $data = [
                'paciente' => $paciente,
                'profesional' => $profesional,
                'ficha_atencion' => $ficha_atencion,
                'octavo_par' => $octavo_par,
                'edad' => $edad,
                'fecha_examen' => $request->fecha_ex ?? ($octavo_par ? $octavo_par->fecha_ex : date('d-m-Y')),
                'otros_pares_craneanos' => $request->otros_pares_craneanos ?? ($octavo_par ? $octavo_par->otros_pares_craneanos : ''),
                // Datos del request (formulario)
                'derivado_por' => $request->derivado_por ?? ($octavo_par ? $octavo_par->derivado_por : ''),
                'resumen_anamnestico' => $request->resumen_anamnestico ?? '',
                'concluciones_examen' => $request->concluciones_examen ?? ($ficha_atencion ? $ficha_atencion->hipotesis : ''),

                // Pares craneanos - extraer del array nistagmo_espontaneo
                'ng_1' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_1'] ?? ($octavo_par ? $octavo_par->ng_1 : '')),
                'ng_2' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_2'] ?? ($octavo_par ? $octavo_par->ng_2 : '')),
                'ng_3' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_3'] ?? ($octavo_par ? $octavo_par->ng_3 : '')),
                'ng_4' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_4'] ?? ($octavo_par ? $octavo_par->ng_4 : '')),
                'ng_5' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_5'] ?? ($octavo_par ? $octavo_par->ng_5 : '')),
                'ng_6' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_6'] ?? ($octavo_par ? $octavo_par->ng_6 : '')),
                'ng_7' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_7'] ?? ($octavo_par ? $octavo_par->ng_7 : '')),
                'ng_8' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_8'] ?? ($octavo_par ? $octavo_par->ng_8 : '')),
                'ng_9' => self::convertirValorAWingdings($nistagmo_espontaneo['ng_9'] ?? ($octavo_par ? $octavo_par->ng_9 : '')),
                'ng_10' => self::convertirValorAWingdings($nistagmo_provocado['ng_10'] ?? ($octavo_par ? $octavo_par->ng_10 : '')),
                'ng_11' => ($octavo_par ? $octavo_par->ng_11 : ''),
                'ng_12' => ($octavo_par ? $octavo_par->ng_12 : ''),

                // Equilibrio
                'romberg' => $request->romberg ?? ($octavo_par ? $octavo_par->romberg : ''),
                'romberg_sens' => $request->romberg_sens ?? ($octavo_par ? $octavo_par->romberg_sens : ''),
                'marcha_ojo_ab' => $request->marcha_ojo_ab ?? ($octavo_par ? $octavo_par->marcha_ojo_ab : ''),
                'marcha_adelante' => $request->marcha_adelante ?? '',
                'marcha_atras' => $request->marcha_atras ?? '',
                'marcha_linea' => $request->marcha_linea ?? '',
                'babinsky' => $request->babinsky ?? '',
                'romberg_barre' => $request->romberg_barre ?? '',
                'untenberg_fak' => $request->untenberg_fak ?? '',
                'indicacion' => $request->indicacion ?? '',
                'observaciones_equilibrio' => $request->observaciones_equilibrio ?? '',

                // Cerebelo
                'temblor' => $request->temblor ?? ($octavo_par ? $octavo_par->temblor : ''),
                'coordinacion' => $request->coordinacion ?? '',
                'dismetria' => $request->dismetria ?? ($octavo_par ? $octavo_par->dismetria : ''),
                'disdiadoco' => $request->disdiadoco ?? ($octavo_par ? $octavo_par->disdiadoco : ''),
                'discinergia' => $request->discinergia ?? ($octavo_par ? $octavo_par->discinergia : ''),
                'tono_muscular' => $request->tono_muscular ?? '',
                'hipotonia' => $request->hipotonia ?? ($octavo_par ? $octavo_par->hipotonia : ''),
                'otras_pruebas' => $request->otras_pruebas ?? '',

                // Nistagmo espontáneo - convertir array a string descriptiva si viene como array
                'nistagmo_espontaneo' => is_array($request->nistagmo_espontaneo) ? '' : ($request->nistagmo_espontaneo ?? ''),
                'mov_oculares' => $request->mov_oculares ?? ($octavo_par ? $octavo_par->mov_oculares : ''),
                'dismetria_ocular' => $request->dismetria_ocular ?? ($octavo_par ? $octavo_par->dismetria_ocular : ''),
                'head_impulse_test' => $request->head_impulse_test ?? '',

                // Nistagmo posicional - extraer del array nistagmo_provocado
                // EaS - usando la nueva estructura del array
                'eas_direccion' => self::convertirValorAWingdings($nistagmo_provocado['EaS'] ?? ''),
                'eas_latencia' => $nistagmo_provocado['LatEaS'] ?? '',
                'eas_paroxistico' => '', // No se envía desde el frontend
                'eas_fatigable' => '', // No se envía desde el frontend
                'eas_duracion' => $nistagmo_provocado['DurEaS'] ?? '',
                'eas_vertigo' => '', // No se envía desde el frontend
                'eas_nauseas' => '', // No se envía desde el frontend
                'eas_vomito' => '', // No se envía desde el frontend

                // SaD
                'sad_direccion' => self::convertirValorAWingdings($nistagmo_provocado['SaD'] ?? ''),
                'sad_latencia' => $nistagmo_provocado['LatSaD'] ?? '',
                'sad_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['sad_1'] ?? ''),
                'sad_fatigable' => self::convertirValorSiNo($nistagmo_provocado['sad_2'] ?? ''),
                'sad_duracion' => $nistagmo_provocado['DurSaD'] ?? '',
                'sad_vertigo' => self::convertirValorSintomas($nistagmo_provocado['sad_3'] ?? ''),
                'sad_nauseas' => self::convertirValorSintomas($nistagmo_provocado['sad_4'] ?? ''),
                'sad_vomito' => self::convertirValorSintomas($nistagmo_provocado['sad_5'] ?? ''),

                // DaS
                'das_direccion' => self::convertirValorAWingdings($nistagmo_provocado['DaS'] ?? ''),
                'das_latencia' => $nistagmo_provocado['LatDaS'] ?? '',
                'das_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['DaS_1'] ?? ''),
                'das_fatigable' => self::convertirValorSiNo($nistagmo_provocado['DaS_2'] ?? ''),
                'das_duracion' => $nistagmo_provocado['DurDaS'] ?? '',
                'das_vertigo' => self::convertirValorSintomas($nistagmo_provocado['DaS_3'] ?? ''),
                'das_nauseas' => self::convertirValorSintomas($nistagmo_provocado['DaS_4'] ?? ''),
                'das_vomito' => self::convertirValorSintomas($nistagmo_provocado['DaS_5'] ?? ''),

                // SaL
                'sal_direccion' => self::convertirValorAWingdings($nistagmo_provocado['SaL'] ?? ''),
                'sal_latencia' => $nistagmo_provocado['LatSal'] ?? '',
                'sal_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['SaL_1'] ?? ''),
                'sal_fatigable' => self::convertirValorSiNo($nistagmo_provocado['SaL_2'] ?? ''),
                'sal_duracion' => $nistagmo_provocado['DurSal'] ?? '',
                'sal_vertigo' => self::convertirValorSintomas($nistagmo_provocado['SaL_3'] ?? ''),
                'sal_nauseas' => self::convertirValorSintomas($nistagmo_provocado['SaL_4'] ?? ''),
                'sal_vomito' => self::convertirValorSintomas($nistagmo_provocado['SaL_5'] ?? ''),

                // LaS
                'las_direccion' => self::convertirValorAWingdings($nistagmo_provocado['LaS'] ?? ''),
                'las_latencia' => $nistagmo_provocado['LatLas'] ?? '',
                'las_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['LaS_1'] ?? ''),
                'las_fatigable' => self::convertirValorSiNo($nistagmo_provocado['LaS_2'] ?? ''),
                'las_duracion' => $nistagmo_provocado['DurLaS'] ?? '',
                'las_vertigo' => self::convertirValorSintomas($nistagmo_provocado['LaS_3'] ?? ''),
                'las_nauseas' => self::convertirValorSintomas($nistagmo_provocado['LaS_4'] ?? ''),
                'las_vomito' => self::convertirValorSintomas($nistagmo_provocado['LaS_5'] ?? ''),

                // SaE
                'sae_direccion' => self::convertirValorAWingdings($nistagmo_provocado['SaE'] ?? ''),
                'sae_latencia' => $nistagmo_provocado['LatSaE'] ?? '',
                'sae_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['SaE_1'] ?? ''),
                'sae_fatigable' => self::convertirValorSiNo($nistagmo_provocado['SaE_2'] ?? ''),
                'sae_duracion' => $nistagmo_provocado['DurSaE'] ?? '',
                'sae_vertigo' => self::convertirValorSintomas($nistagmo_provocado['SaE_3'] ?? ''),
                'sae_nauseas' => self::convertirValorSintomas($nistagmo_provocado['SaE_4'] ?? ''),
                'sae_vomito' => self::convertirValorSintomas($nistagmo_provocado['SaE_5'] ?? ''),

                // EaCC
                'eacc_direccion' => self::convertirValorAWingdings($nistagmo_provocado['EaCC'] ?? ''),
                'eacc_latencia' => $nistagmo_provocado['LatEaCC'] ?? '',
                'eacc_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['EaCC_1'] ?? ''),
                'eacc_fatigable' => self::convertirValorSiNo($nistagmo_provocado['EaCC_2'] ?? ''),
                'eacc_duracion' => $nistagmo_provocado['DurEaCC'] ?? '',
                'eacc_vertigo' => self::convertirValorSintomas($nistagmo_provocado['EaCC_3'] ?? ''),
                'eacc_nauseas' => self::convertirValorSintomas($nistagmo_provocado['EaCC_4'] ?? ''),
                'eacc_vomito' => self::convertirValorSintomas($nistagmo_provocado['EaCC_5'] ?? ''),

                // CCaE
                'ccae_direccion' => self::convertirValorAWingdings($nistagmo_provocado['CCaE'] ?? ''),
                'ccae_latencia' => $nistagmo_provocado['LatCCaE'] ?? '',
                'ccae_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['CCaE_1'] ?? ''),
                'ccae_fatigable' => self::convertirValorSiNo($nistagmo_provocado['CCaE_2'] ?? ''),
                'ccae_duracion' => $nistagmo_provocado['DurCCaE'] ?? '',
                'ccae_vertigo' => self::convertirValorSintomas($nistagmo_provocado['CCaE_3'] ?? ''),
                'ccae_nauseas' => self::convertirValorSintomas($nistagmo_provocado['CCaE_4'] ?? ''),
                'ccae_vomito' => self::convertirValorSintomas($nistagmo_provocado['CCaE_5'] ?? ''),

                // EaCCd
                'eaccd_direccion' => self::convertirValorAWingdings($nistagmo_provocado['EaCCd'] ?? ''),
                'eaccd_latencia' => $nistagmo_provocado['LatEaCCd'] ?? '',
                'eaccd_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['EaCCd_1'] ?? ''),
                'eaccd_fatigable' => self::convertirValorSiNo($nistagmo_provocado['EaCCd_2'] ?? ''),
                'eaccd_duracion' => $nistagmo_provocado['DurEaCCd'] ?? '',
                'eaccd_vertigo' => self::convertirValorSintomas($nistagmo_provocado['EaCCd_3'] ?? ''),
                'eaccd_nauseas' => self::convertirValorSintomas($nistagmo_provocado['EaCCd_4'] ?? ''),
                'eaccd_vomito' => self::convertirValorSintomas($nistagmo_provocado['EaCCd_5'] ?? ''),

                // CCdaE
                'ccdae_direccion' => self::convertirValorAWingdings($nistagmo_provocado['CCdaE'] ?? ''),
                'ccdae_latencia' => $nistagmo_provocado['LatCCdaE'] ?? '',
                'ccdae_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['CCdaE_1'] ?? ''),
                'ccdae_fatigable' => self::convertirValorSiNo($nistagmo_provocado['CCdaE_2'] ?? ''),
                'ccdae_duracion' => $nistagmo_provocado['DurCCdaE'] ?? '',
                'ccdae_vertigo' => self::convertirValorSintomas($nistagmo_provocado['CCdaE_3'] ?? ''),
                'ccdae_nauseas' => self::convertirValorSintomas($nistagmo_provocado['CCdaE_4'] ?? ''),
                'ccdae_vomito' => self::convertirValorSintomas($nistagmo_provocado['CCdaE_5'] ?? ''),

                // EaCCi
                'eacci_direccion' => self::convertirValorAWingdings($nistagmo_provocado['EaCCi'] ?? ''),
                'eacci_latencia' => $nistagmo_provocado['LatEaCCi'] ?? '',
                'eacci_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['EaCCi_1'] ?? ''),
                'eacci_fatigable' => self::convertirValorSiNo($nistagmo_provocado['EaCCi_2'] ?? ''),
                'eacci_duracion' => $nistagmo_provocado['DurEaCCi'] ?? '',
                'eacci_vertigo' => self::convertirValorSintomas($nistagmo_provocado['EaCCi_3'] ?? ''),
                'eacci_nauseas' => self::convertirValorSintomas($nistagmo_provocado['EaCCi_4'] ?? ''),
                'eacci_vomito' => self::convertirValorSintomas($nistagmo_provocado['EaCCi_5'] ?? ''),

                // CCiaE
                'cciae_direccion' => self::convertirValorAWingdings($nistagmo_provocado['CCiaE'] ?? ''),
                'cciae_latencia' => $nistagmo_provocado['LatCCiaE'] ?? '',
                'cciae_paroxistico' => self::convertirValorSiNo($nistagmo_provocado['CCiaE_1'] ?? ''),
                'cciae_fatigable' => self::convertirValorSiNo($nistagmo_provocado['CCiaE_2'] ?? ''),
                'cciae_duracion' => $nistagmo_provocado['DurCCiaE'] ?? '',
                'cciae_vertigo' => self::convertirValorSintomas($nistagmo_provocado['CCiaE_3'] ?? ''),
                'cciae_nauseas' => self::convertirValorSintomas($nistagmo_provocado['CCiaE_4'] ?? ''),
                'cciae_vomito' => self::convertirValorSintomas($nistagmo_provocado['CCiaE_5'] ?? ''),

                // Datos de prueba calórica - extraer del array prueba_calorica
                // IO30 (Oído Izquierdo 30°)
                'io30_duracion' => $prueba_calorica['DUR_IO30'] ?? '',
                'io30_frecuencia' => $prueba_calorica['FR_IO30'] ?? '',
                'io30_amplitud' => $prueba_calorica['AM_IO30'] ?? '',
                'io30_vertigo' => self::convertirValorSintomas($prueba_calorica['IO30_1'] ?? ''),
                'io30_nauseas' => self::convertirValorSintomas($prueba_calorica['IO30_2'] ?? ''),
                'io30_vomito' => self::convertirValorSintomas($prueba_calorica['IO30_3'] ?? ''),
                'io30_vcl' => $prueba_calorica['VCL_IO30'] ?? '',

                // OD30 (Oído Derecho 30°)
                'od30_duracion' => $prueba_calorica['DUR_OD30'] ?? '',
                'od30_frecuencia' => $prueba_calorica['FR_OD30'] ?? '',
                'od30_amplitud' => $prueba_calorica['AM_OD30'] ?? '',
                'od30_vertigo' => self::convertirValorSintomas($prueba_calorica['OD30_1'] ?? ''),
                'od30_nauseas' => self::convertirValorSintomas($prueba_calorica['OD30_2'] ?? ''),
                'od30_vomito' => self::convertirValorSintomas($prueba_calorica['OD30_3'] ?? ''),
                'od30_vcl' => $prueba_calorica['VCL_OD30'] ?? '',

                // IO44 (Oído Izquierdo 44°)
                'io44_duracion' => $prueba_calorica['DUR_IO44'] ?? '',
                'io44_frecuencia' => $prueba_calorica['FR_IO44'] ?? '',
                'io44_amplitud' => $prueba_calorica['AM_IO44'] ?? '',
                'io44_vertigo' => self::convertirValorSintomas($prueba_calorica['IO44_1'] ?? ''),
                'io44_nauseas' => self::convertirValorSintomas($prueba_calorica['IO44_2'] ?? ''),
                'io44_vomito' => self::convertirValorSintomas($prueba_calorica['IO44_3'] ?? ''),
                'io44_vcl' => $prueba_calorica['VCL_IO44'] ?? '',

                // OD44 (Oído Derecho 44°)
                'od44_duracion' => $prueba_calorica['DUR_OD44'] ?? '',
                'od44_frecuencia' => $prueba_calorica['FR_OD44'] ?? '',
                'od44_amplitud' => $prueba_calorica['AM_OD44'] ?? '',
                'od44_vertigo' => self::convertirValorSintomas($prueba_calorica['OD44_1'] ?? ''),
                'od44_nauseas' => self::convertirValorSintomas($prueba_calorica['OD44_2'] ?? ''),
                'od44_vomito' => self::convertirValorSintomas($prueba_calorica['OD44_3'] ?? ''),
                'od44_vcl' => $prueba_calorica['VCL_OD44'] ?? '',

                // OI18 (Oído Izquierdo 18°)
                'oi18_duracion' => $prueba_calorica['DUR_OI18'] ?? '',
                'oi18_frecuencia' => $prueba_calorica['FR_OI18'] ?? '',
                'oi18_amplitud' => $prueba_calorica['AM_OI18'] ?? '',
                'oi18_vertigo' => self::convertirValorSintomas($prueba_calorica['OI18_1'] ?? ''),
                'oi18_nauseas' => self::convertirValorSintomas($prueba_calorica['OI18_2'] ?? ''),
                'oi18_vomito' => self::convertirValorSintomas($prueba_calorica['OI18_3'] ?? ''),
                'oi18_vcl' => $prueba_calorica['VCL_OI18'] ?? '',

                // OD18 (Oído Derecho 18°)
                'od18_duracion' => $prueba_calorica['DUR_OD18'] ?? '',
                'od18_frecuencia' => $prueba_calorica['FR_OD18'] ?? '',
                'od18_amplitud' => $prueba_calorica['AM_OD18'] ?? '',
                'od18_vertigo' => self::convertirValorSintomas($prueba_calorica['OD18_1'] ?? ''),
                'od18_nauseas' => self::convertirValorSintomas($prueba_calorica['OD18_2'] ?? ''),
                'od18_vomito' => self::convertirValorSintomas($prueba_calorica['OD18_3'] ?? ''),
                'od18_vcl' => $prueba_calorica['VCL_OD18'] ?? '',

                // Comentarios adicionales
                'comentarios_pc' => $request->comentarios_pc ?? '',
            ];

            // Generar PDF
            $pdf = SnappyPdf::loadView('app.laboratorio.pdf.audiometria', $data);
            $pdf->setPaper('A4', 'portrait');            // Crear directorio si no existe
            $reportesPath = public_path('reportes');
            if (!file_exists($reportesPath)) {
                mkdir($reportesPath, 0777, true);
            }

            // Nombre del archivo
            $filename = 'examen_octavo_par_' . ($paciente ? str_replace('-', '', $paciente->rut) : 'paciente') . '_' . date('YmdHis') . '.pdf';
            $filePath = $reportesPath . '/' . $filename;

            // Guardar el PDF en la carpeta public/reportes
            file_put_contents($filePath, $pdf->output());

            // Devolver la ruta accesible del archivo PDF
            return response()->json([
                'success' => true,
                'message' => 'PDF generado exitosamente',
                'ruta' => asset('reportes/' . $filename),
                'filename' => $filename
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al generar el PDF: ' . $e->getMessage()
            ], 500);
        }
    }

}
