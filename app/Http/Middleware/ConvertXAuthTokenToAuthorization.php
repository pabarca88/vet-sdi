<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;

class ConvertXAuthTokenToAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si hay X-Auth-Token, autenticar directamente
        if ($request->hasHeader('X-Auth-Token')) {
            $token = $request->header('X-Auth-Token');
            
            // Buscar el token en la base de datos
            $accessToken = PersonalAccessToken::findToken($token);
            
            if ($accessToken && $accessToken->tokenable) {
                // Autenticar al usuario manualmente
                Auth::guard('api')->setUser($accessToken->tokenable);
                Auth::guard('sanctum')->setUser($accessToken->tokenable);
            }
        }

        return $next($request);
    }
}