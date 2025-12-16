<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudifonoExterno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AudifonoExternoController extends Controller
{
    /**
     * Guardar un nuevo audífono externo
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function guardar(Request $request)
    {
        try {
            // Validación de campos obligatorios
            $validator = Validator::make($request->all(), [
                'id_paciente' => 'required|integer|exists:pacientes,id',
                'procedencia_laboratorio' => 'required|string|max:255',
                'fecha_adquisicion' => 'required|date',
                // Audífono izquierdo (marca y modelo obligatorios)
                'marca_izquierdo' => 'required|string|max:100',
                'modelo_izquierdo' => 'required|string|max:100',
                'n_serie_izquierdo' => 'nullable|string|max:100',
                'tipo_izquierdo' => 'nullable|in:BTE,ITE,ITC,CIC,RIC',
                // Audífono derecho (marca y modelo obligatorios)
                'marca_derecho' => 'required|string|max:100',
                'modelo_derecho' => 'required|string|max:100',
                'n_serie_derecho' => 'nullable|string|max:100',
                'tipo_derecho' => 'nullable|in:BTE,ITE,ITC,CIC,RIC',
                // Información adicional (opcional)
                'estado_audifono' => 'nullable|in:Excelente,Bueno,Regular,Malo,Requiere reparación',
                'motivo_control' => 'nullable|in:Control rutinario,Calibración,Reparación,Ajuste,Limpieza,Cambio de accesorios,Otro',
                'observaciones' => 'nullable|string',
                // Datos del control (opcionales)
                'fecha_control' => 'nullable|date',
                'examinador' => 'nullable|string|max:255',
                'examen_cae' => 'nullable|string',
            ], [
                // Mensajes personalizados
                'id_paciente.required' => 'El paciente es obligatorio',
                'id_paciente.exists' => 'El paciente no existe en el sistema',
                'procedencia_laboratorio.required' => 'El laboratorio o proveedor es obligatorio',
                'fecha_adquisicion.required' => 'La fecha de adquisición es obligatoria',
                'fecha_adquisicion.date' => 'La fecha de adquisición debe ser una fecha válida',
                'marca_izquierdo.required' => 'La marca del audífono izquierdo es obligatoria',
                'modelo_izquierdo.required' => 'El modelo del audífono izquierdo es obligatorio',
                'marca_derecho.required' => 'La marca del audífono derecho es obligatoria',
                'modelo_derecho.required' => 'El modelo del audífono derecho es obligatorio',
            ]);

            // Si la validación falla
            if ($validator->fails()) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'Error de validación',
                    'errores' => $validator->errors()
                ], 422);
            }

            // Iniciar transacción
            DB::beginTransaction();

            // Crear el registro del audífono externo
            $audifonoExterno = AudifonoExterno::create([
                'id_paciente' => $request->id_paciente,
                'procedencia_laboratorio' => $request->procedencia_laboratorio,
                'fecha_adquisicion' => $request->fecha_adquisicion,
                // Audífono izquierdo
                'n_serie_izquierdo' => $request->n_serie_izquierdo,
                'marca_izquierdo' => $request->marca_izquierdo,
                'modelo_izquierdo' => $request->modelo_izquierdo,
                'tipo_izquierdo' => $request->tipo_izquierdo,
                // Audífono derecho
                'n_serie_derecho' => $request->n_serie_derecho,
                'marca_derecho' => $request->marca_derecho,
                'modelo_derecho' => $request->modelo_derecho,
                'tipo_derecho' => $request->tipo_derecho,
                // Información adicional
                'estado_audifono' => $request->estado_audifono ?? 'Bueno',
                'motivo_control' => $request->motivo_control,
                'observaciones' => $request->observaciones,
                // Datos del control
                'fecha_control' => $request->fecha_control,
                'examinador' => $request->examinador,
                'examen_cae' => $request->examen_cae,
            ]);

            // Confirmar transacción
            DB::commit();

            // Log del registro exitoso
            Log::info('Audífono externo registrado', [
                'id' => $audifonoExterno->id,
                'id_paciente' => $audifonoExterno->id_paciente,
                'procedencia' => $audifonoExterno->procedencia_laboratorio,
                'usuario' => auth()->user()->email ?? 'Sistema'
            ]);

            // Retornar respuesta exitosa
            return response()->json([
                'estado' => 1,
                'mensaje' => 'Audífono externo registrado correctamente',
                'audifono' => [
                    'id' => $audifonoExterno->id,
                    'procedencia_laboratorio' => $audifonoExterno->procedencia_laboratorio,
                    'fecha_adquisicion' => $audifonoExterno->fecha_adquisicion->format('Y-m-d'),
                    'audifono_izquierdo' => $audifonoExterno->audifono_izquierdo,
                    'audifono_derecho' => $audifonoExterno->audifono_derecho,
                    'estado_audifono' => $audifonoExterno->estado_audifono,
                    'created_at' => $audifonoExterno->created_at->format('Y-m-d H:i:s'),
                ]
            ], 201);

        } catch (\Exception $e) {
            // Revertir transacción en caso de error
            DB::rollBack();

            // Log del error
            Log::error('Error al guardar audífono externo', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            // Retornar respuesta de error
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al guardar el audífono externo: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Listar audífonos externos de un paciente
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listar(Request $request)
    {
        try {
            $idPaciente = $request->input('id_paciente');

            if (!$idPaciente) {
                return response()->json([
                    'estado' => 0,
                    'mensaje' => 'El ID del paciente es obligatorio'
                ], 400);
            }

            // Obtener audífonos externos del paciente
            $audifonos = AudifonoExterno::porPaciente($idPaciente)
                ->orderBy('fecha_control', 'desc')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($audifono) {
                    return [
                        'id' => $audifono->id,
                        'procedencia_laboratorio' => $audifono->procedencia_laboratorio,
                        'fecha_adquisicion' => $audifono->fecha_adquisicion->format('Y-m-d'),
                        'audifono_izquierdo' => $audifono->audifono_izquierdo,
                        'audifono_derecho' => $audifono->audifono_derecho,
                        'marca_izquierdo' => $audifono->marca_izquierdo,
                        'modelo_izquierdo' => $audifono->modelo_izquierdo,
                        'tipo_izquierdo' => $audifono->tipo_izquierdo,
                        'marca_derecho' => $audifono->marca_derecho,
                        'modelo_derecho' => $audifono->modelo_derecho,
                        'tipo_derecho' => $audifono->tipo_derecho,
                        'estado_audifono' => $audifono->estado_audifono,
                        'motivo_control' => $audifono->motivo_control,
                        'fecha_control' => $audifono->fecha_control ? $audifono->fecha_control->format('Y-m-d') : null,
                        'examinador' => $audifono->examinador,
                        'requiere_atencion' => $audifono->requiere_atencion,
                        'created_at' => $audifono->created_at->format('Y-m-d H:i:s'),
                    ];
                });

            return response()->json([
                'estado' => 1,
                'audifonos' => $audifonos,
                'total' => $audifonos->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Error al listar audífonos externos', [
                'error' => $e->getMessage(),
                'id_paciente' => $request->input('id_paciente')
            ]);

            return response()->json([
                'estado' => 0,
                'mensaje' => 'Error al listar audífonos externos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener detalle de un audífono externo
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detalle($id)
    {
        try {
            $audifono = AudifonoExterno::with('paciente')->findOrFail($id);

            return response()->json([
                'estado' => 1,
                'audifono' => [
                    'id' => $audifono->id,
                    'id_paciente' => $audifono->id_paciente,
                    'paciente' => $audifono->paciente ? [
                        'nombres' => $audifono->paciente->nombres,
                        'apellidos' => $audifono->paciente->apellido_uno . ' ' . $audifono->paciente->apellido_dos,
                        'rut' => $audifono->paciente->rut,
                    ] : null,
                    'procedencia_laboratorio' => $audifono->procedencia_laboratorio,
                    'fecha_adquisicion' => $audifono->fecha_adquisicion->format('Y-m-d'),
                    // Audífono izquierdo
                    'n_serie_izquierdo' => $audifono->n_serie_izquierdo,
                    'marca_izquierdo' => $audifono->marca_izquierdo,
                    'modelo_izquierdo' => $audifono->modelo_izquierdo,
                    'tipo_izquierdo' => $audifono->tipo_izquierdo,
                    'audifono_izquierdo' => $audifono->audifono_izquierdo,
                    // Audífono derecho
                    'n_serie_derecho' => $audifono->n_serie_derecho,
                    'marca_derecho' => $audifono->marca_derecho,
                    'modelo_derecho' => $audifono->modelo_derecho,
                    'tipo_derecho' => $audifono->tipo_derecho,
                    'audifono_derecho' => $audifono->audifono_derecho,
                    // Información adicional
                    'estado_audifono' => $audifono->estado_audifono,
                    'motivo_control' => $audifono->motivo_control,
                    'observaciones' => $audifono->observaciones,
                    // Datos del control
                    'fecha_control' => $audifono->fecha_control ? $audifono->fecha_control->format('Y-m-d') : null,
                    'examinador' => $audifono->examinador,
                    'examen_cae' => $audifono->examen_cae,
                    // Metadata
                    'requiere_atencion' => $audifono->requiere_atencion,
                    'created_at' => $audifono->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $audifono->updated_at->format('Y-m-d H:i:s'),
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Audífono externo no encontrado'
            ], 404);
        }
    }
}
