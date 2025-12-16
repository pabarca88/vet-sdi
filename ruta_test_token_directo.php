<?php

// Agregar esta ruta TEMPORAL en api.php para testing
Route::get('/test-token-directo', function (Request $request) {
    try {
        // Obtener token de X-Auth-Token
        $token = $request->header('X-Auth-Token');
        
        if (!$token) {
            return response()->json([
                'error' => 'No X-Auth-Token header',
                'headers' => $request->headers->all()
            ], 400);
        }
        
        // Buscar token en BD
        $accessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
        
        if (!$accessToken) {
            return response()->json([
                'error' => 'Token no encontrado en BD',
                'token' => $token
            ], 401);
        }
        
        $user = $accessToken->tokenable;
        
        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado',
                'token_id' => $accessToken->id
            ], 401);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Token válido',
            'user_id' => $user->id,
            'user_email' => $user->email,
            'token_id' => $accessToken->id,
            'token_name' => $accessToken->name
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Exception: ' . $e->getMessage(),
            'line' => $e->getLine()
        ], 500);
    }
});