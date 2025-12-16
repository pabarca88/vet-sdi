<?php

// Ruta para ficha_atencion_app CON AUTENTICACIÓN MANUAL
Route::post('/paciente/ficha-atencion-app-manual', function (Request $request) {
    try {
        // 1. AUTENTICACIÓN MANUAL
        $token = $request->header('X-Auth-Token');
        
        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Token de autenticación requerido'
            ], 401);
        }
        
        // Buscar token en BD
        $accessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
        
        if (!$accessToken || !$accessToken->tokenable) {
            return response()->json([
                'success' => false,
                'message' => 'Token inválido o expirado'
            ], 401);
        }
        
        $user = $accessToken->tokenable;
        
        // 2. PROCESAR DATOS DE FICHA DE ATENCIÓN
        $datosFicha = [
            'id_paciente' => $request->input('id_paciente'),
            'rut_profesional' => $request->input('rut_profesional'),
            'nombre_profesional' => $request->input('nombre_profesional'),
            'correo_profesional' => $request->input('correo_profesional'),
            'telefono_profesional' => $request->input('telefono_profesional'),
            'especialidad' => $request->input('especialidad'),
            'tipo_especialidad' => $request->input('tipo_especialidad'),
            'sub_tipo_especialidad' => $request->input('sub_tipo_especialidad'),
            'diagnosticos' => $request->input('diagnosticos'),
            'examenes' => $request->input('examenes'),
            'medicamentos' => $request->input('medicamentos'),
            'rut_dependiente' => $request->input('rut_dependiente'),
            'token' => $request->input('token', 'app-' . time()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        // 3. VALIDACIONES BÁSICAS
        if (empty($datosFicha['id_paciente'])) {
            return response()->json([
                'success' => false,
                'message' => 'ID de paciente es requerido'
            ], 400);
        }
        
        // 4. GUARDAR EN BD (usando DB directamente para simplificar)
        $fichaId = \Illuminate\Support\Facades\DB::table('ficha_atencion_app')->insertGetId($datosFicha);
        
        return response()->json([
            'success' => true,
            'message' => 'Ficha de atención guardada exitosamente',
            'ficha_id' => $fichaId,
            'user_authenticated' => [
                'id' => $user->id,
                'email' => $user->email
            ],
            'datos_guardados' => $datosFicha
        ], 201);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor',
            'error' => $e->getMessage(),
            'line' => $e->getLine()
        ], 500);
    }
});