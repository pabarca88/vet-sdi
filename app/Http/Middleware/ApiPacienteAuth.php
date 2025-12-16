<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiPacienteAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Debug: Verificar si hay token en el request
        \Log::info('ApiPacienteAuth Debug:', [
            'has_auth_header' => $request->hasHeader('Authorization'),
            'auth_header' => $request->header('Authorization'),
            'sanctum_check' => Auth::guard('sanctum')->check(),
        ]);

        // Verificar que el usuario esté autenticado con Sanctum
        if (!Auth::guard('sanctum')->check()) {
            \Log::info('ApiPacienteAuth: Usuario no autenticado con Sanctum');
            return response()->json([
                'error' => 'No autorizado',
                'message' => 'Token de autenticación requerido'
            ], 401);
        }

        $user = Auth::guard('sanctum')->user();

        \Log::info('ApiPacienteAuth: Usuario autenticado', [
            'user_id' => $user->id,
            'email' => $user->email,
            'tipo_usuario' => $user->tipo_usuario,
            'activo' => $user->activo
        ]);

        // TEMPORALMENTE COMENTADO: Verificar que el usuario sea un paciente (tipo_usuario = 2)
        /*
        if ($user->tipo_usuario != 2) {
            \Log::info('ApiPacienteAuth: Usuario no es paciente', [
                'tipo_usuario_actual' => $user->tipo_usuario,
                'tipo_requerido' => 2
            ]);
            return response()->json([
                'error' => 'Acceso denegado',
                'message' => 'Solo pacientes pueden acceder a estas rutas',
                'debug' => [
                    'tu_tipo_usuario' => $user->tipo_usuario,
                    'requerido' => 2
                ]
            ], 403);
        }
        */

        // Verificar que el usuario esté activo
        if ($user->activo != 1) {
            \Log::info('ApiPacienteAuth: Usuario inactivo', [
                'activo' => $user->activo
            ]);
            return response()->json([
                'error' => 'Usuario inactivo',
                'message' => 'Su cuenta está desactivada'
            ], 403);
        }

        \Log::info('ApiPacienteAuth: Acceso autorizado para usuario', [
            'user_id' => $user->id,
            'email' => $user->email
        ]);

        return $next($request);
    }
}
