<?php

// Ruta adicional para debug de tokens - agregar al final de api.php

// RUTA PARA DEBUG DE TOKENS SANCTUM
Route::get('/debug-token-info', function (Request $request) {
    try {
        $results = [];

        // 1. Headers recibidos
        $results['headers'] = [
            'authorization' => $request->header('Authorization'),
            'x_auth_token' => $request->header('X-Auth-Token'),
            'all_headers' => $request->headers->all(),
        ];

        // 2. Intentar extraer token
        $bearerToken = $request->bearerToken();
        $results['bearer_token_extracted'] = $bearerToken;

        // 3. Si hay token, buscar en la base de datos
        if ($bearerToken) {
            // Separar ID y hash del token
            $tokenParts = explode('|', $bearerToken, 2);
            if (count($tokenParts) === 2) {
                $tokenId = $tokenParts[0];
                $tokenHash = $tokenParts[1];

                $results['token_parts'] = [
                    'id' => $tokenId,
                    'hash' => substr($tokenHash, 0, 20) . '...',
                ];

                // Buscar en la tabla personal_access_tokens
                $tokenRecord = DB::table('personal_access_tokens')
                    ->where('id', $tokenId)
                    ->first();

                if ($tokenRecord) {
                    $results['token_in_db'] = [
                        'found' => true,
                        'tokenable_type' => $tokenRecord->tokenable_type,
                        'tokenable_id' => $tokenRecord->tokenable_id,
                        'name' => $tokenRecord->name,
                        'abilities' => json_decode($tokenRecord->abilities),
                        'created_at' => $tokenRecord->created_at,
                        'updated_at' => $tokenRecord->updated_at,
                        'expires_at' => $tokenRecord->expires_at ?? 'never',
                    ];

                    // Verificar si el hash coincide
                    $hashedToken = hash('sha256', $tokenHash);
                    $results['token_hash_match'] = hash_equals($tokenRecord->token, $hashedToken);

                } else {
                    $results['token_in_db'] = ['found' => false];
                }
            } else {
                $results['token_format_error'] = 'Token no tiene formato ID|HASH';
            }
        }

        // 4. Verificar configuración de Sanctum
        $results['sanctum_config'] = [
            'guards' => config('sanctum.guard'),
            'expiration' => config('sanctum.expiration'),
            'stateful_domains' => config('sanctum.stateful'),
        ];

        // 5. Verificar guard api
        $results['auth_config'] = [
            'api_guard_driver' => config('auth.guards.api.driver'),
            'api_guard_provider' => config('auth.guards.api.provider'),
        ];

        return response()->json([
            'mensaje' => 'Debug de tokens completado',
            'resultados' => $results,
            'timestamp' => now(),
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error en debug de tokens',
            'mensaje' => $e->getMessage(),
            'linea' => $e->getLine(),
            'archivo' => $e->getFile(),
        ], 500);
    }
});