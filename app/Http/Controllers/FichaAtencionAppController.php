<?php

namespace App\Http\Controllers;

use App\Models\FichaAtencionApp;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class FichaAtencionAppController extends Controller
{
    /**
     * Crear una nueva ficha de atención desde la app
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            // 1. AUTENTICACIÓN MANUAL CON X-AUTH-TOKEN
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

            // 2. VALIDACIÓN DE LOS DATOS RECIBIDOS
            $validator = Validator::make($request->all(), [
                'id_paciente' => 'required|string',
                'rut_profesional' => 'required|string',
                'nombre_profesional' => 'required|string',
                'correo_profesional' => 'required|email',
                'telefono_profesional' => 'required|string',
                'especialidad' => 'nullable|string',
                'tipo_especialidad' => 'nullable|string',
                'sub_tipo_especialidad' => 'nullable|string',
                'diagnosticos' => 'nullable|string',
                'examenes' => 'nullable|string',
                'medicamentos' => 'nullable|string',
                'rut_dependiente' => 'nullable|string',
                'token' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Errores de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            // 3. CREAR LA FICHA DE ATENCIÓN
            $fichaAtencion = FichaAtencionApp::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Ficha de atención creada exitosamente',
                'data' => $fichaAtencion,
                'user_authenticated' => [
                    'id' => $user->id,
                    'email' => $user->email
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la ficha de atención',
                'error' => $e->getMessage(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    /**
     * Obtener fichas de atención por paciente
     *
     * @param  string  $idPaciente
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFichasPorPaciente($idPaciente): JsonResponse
    {
        try {
            $fichas = FichaAtencionApp::porPaciente($idPaciente)
                ->activo()
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $fichas
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las fichas de atención',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener fichas de atención por profesional
     *
     * @param  string  $rutProfesional
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFichasPorProfesional($rutProfesional): JsonResponse
    {
        try {
            $fichas = FichaAtencionApp::porProfesional($rutProfesional)
                ->activo()
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $fichas
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las fichas de atención',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener una ficha específica por token
     *
     * @param  string  $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFichaPorToken($token): JsonResponse
    {
        try {
            $ficha = FichaAtencionApp::porToken($token)
                ->activo()
                ->first();

            if (!$ficha) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ficha no encontrada'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $ficha
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener la ficha de atención',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar una ficha de atención
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $ficha = FichaAtencionApp::find($id);

            if (!$ficha) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ficha no encontrada'
                ], 404);
            }

            // Validación de los datos recibidos
            $validator = Validator::make($request->all(), [
                'id_paciente' => 'sometimes|string',
                'rut_profesional' => 'sometimes|string',
                'nombre_profesional' => 'sometimes|string',
                'correo_profesional' => 'sometimes|email',
                'telefono_profesional' => 'sometimes|string',
                'especialidad' => 'nullable|string',
                'tipo_especialidad' => 'nullable|string',
                'sub_tipo_especialidad' => 'nullable|string',
                'diagnosticos' => 'nullable|string',
                'examenes' => 'nullable|string',
                'medicamentos' => 'nullable|string',
                'rut_dependiente' => 'nullable|string',
                'token' => 'nullable|string',
                'estado' => 'sometimes|integer|in:0,1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Errores de validación',
                    'errors' => $validator->errors()
                ], 422);
            }

            $ficha->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Ficha de atención actualizada exitosamente',
                'data' => $ficha
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar la ficha de atención',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar (desactivar) una ficha de atención
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $ficha = FichaAtencionApp::find($id);

            if (!$ficha) {
                return response()->json([
                    'success' => false,
                    'message' => 'Ficha no encontrada'
                ], 404);
            }

            // Desactivar en lugar de eliminar (soft delete)
            $ficha->update(['estado' => 0]);

            return response()->json([
                'success' => true,
                'message' => 'Ficha de atención desactivada exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al desactivar la ficha de atención',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
