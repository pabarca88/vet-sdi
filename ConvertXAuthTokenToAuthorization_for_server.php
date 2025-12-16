<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        // Si no hay header Authorization pero sí hay X-Auth-Token
        if (!$request->hasHeader('Authorization') && $request->hasHeader('X-Auth-Token')) {
            // Obtener el token de X-Auth-Token
            $token = $request->header('X-Auth-Token');

            // Agregar el header Authorization en formato Bearer
            $request->headers->set('Authorization', 'Bearer ' . $token);
        }

        return $next($request);
    }
}
