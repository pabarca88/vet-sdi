<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersDevicesController;
use App\Http\Controllers\LogUsersDevicesController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfesionalProvisorioController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\JitsiController;
use App\Http\Controllers\VentaManualRecetaController;
use App\Http\Controllers\DentalController;
use App\Http\Controllers\CentroMedicoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('user/login',[LoginController::class, 'login']);
Route::post('user/login_farmacia',[LoginController::class, 'login_farmacia']);

//USER DEVICES - CRUD
Route::post('/user_devices/registrar',    [UsersDevicesController::class, 'registrar']);
Route::post('/user_devices/modificar',    [UsersDevicesController::class, 'modificar']);
Route::get('/user_devices/ver_registros',[UsersDevicesController::class, 'verRegistros']);
Route::get('/user_devices/ver_registro', [UsersDevicesController::class, 'verRegistro']);
Route::post('/user_devices/estado',       [UsersDevicesController::class, 'estado']);
Route::get('/user_devices/solicitud_registro_equipo', [UsersDevicesController::class, 'solicitarAutorizacion']);


//LOG USER DEVICES - CRUD
Route::post('/log_user_devices/registrar',    [LogUsersDevicesController::class, 'registrar']);
Route::post('/log_user_devices/modificar',    [LogUsersDevicesController::class, 'modificar']);
Route::get('/log_user_devices/ver_registros',[LogUsersDevicesController::class, 'verRegistros']);
Route::get('/log_user_devices/ver_registro', [LogUsersDevicesController::class, 'verRegistro']);
Route::post('/log_user_devices/estado',       [LogUsersDevicesController::class, 'estado']);
Route::get('/log_user_devices/gen_solicitud',       [LogUsersDevicesController::class, 'genSolicitud']);
Route::get('/log_user_devices/check_state_sol',       [LogUsersDevicesController::class, 'checkStateSol']);


//USER DEVICES - CRUD
Route::post('/antecedente/registrar',    [AntecedenteController::class, 'registrar']);
Route::post('/antecedente/modificar',    [AntecedenteController::class, 'modificar']);
Route::post('/antecedente/eliminar',    [AntecedenteController::class, 'eliminar']);
Route::get('/antecedente/ver_registros',[AntecedenteController::class, 'verRegistros']);
Route::get('/antecedente/ver_registro', [AntecedenteController::class, 'verRegistro']);
Route::post('/antecedente/estado',       [AntecedenteController::class, 'estado']);


//PROFESIONAL PROVISORIO
Route::post('/profesional_provisorio/registrar',    [ProfesionalProvisorioController::class, 'registrar_profesional_provisorio']);
Route::post('/profesional_provisorio/modificar',    [ProfesionalProvisorioController::class, 'modificar_profesional_provisorio']);

//DOCUMENTOS
Route::get('/documento/ver_registro_recetas', [DocumentoController::class, 'verRegistrosRecetas']);
Route::get('/documento/ver_receta_pdf', [DocumentoController::class, 'verRecetaPDF']);
Route::get('/documento/ver_registro_recetas/{id_paciente}', [DocumentoController::class, 'verRegistrosRecetas']);
Route::get('/documento/ver_receta_pdf/{id}', [DocumentoController::class, 'verRecetaPDF']);
Route::get('/documento/ver_registro_recetas_rut', [DocumentoController::class, 'verRegistrosRecetasRut']);
Route::get('/documento/ver_registro_recetas_rut/{rut}', [DocumentoController::class, 'verRegistrosRecetasRut']);
Route::get('/documento/ver_registro_recetas_id', [DocumentoController::class, 'verRegistrosRecetasId']);

Route::get('/documento/ver_registro_recetas_id/{id}', [DocumentoController::class, 'verRegistrosRecetasId']);
Route::get('/documento/ver_registro_recetas_id/{id}/{token}', [DocumentoController::class, 'verRegistrosRecetasId']);
Route::get('/documento/ver_detalle_recetas', [DocumentoController::class, 'verDetalleRecetas']);
Route::get('/documento/ver_detalle_recetas/{id_ficha}', [DocumentoController::class, 'verDetalleRecetas']);
Route::get('/documento/venta_detalle_recetas', [DocumentoController::class, 'ventaDetalleRecetas']);
Route::get('/documento/venta_detalle_recetas/{lista_productos}', [DocumentoController::class, 'ventaDetalleRecetas']);


//VENTA MANUAL RECETA
Route::post('/venta_manual_receta/registrar', [VentaManualRecetaController::class, 'registrar']);
Route::get('/venta_manual_receta/ver_registro', [VentaManualRecetaController::class, 'verRegistro']);
Route::post('/getArticulo', [DentalController::class, 'getArticulo']);
Route::get('/getDosis', [DentalController::class, 'getDosis'])->name('dental_.getDosis');
Route::post('/insertMedicamento', [DentalController::class, 'insertMedicamento'])->name('dental.insertMedicamento');
Route::post('/eliminarMedicamento', [DentalController::class, 'eliminarMedicamento'])->name('dental.eliminarMedicamento');
Route::post('/insertPaciente', [DentalController::class, 'insertPaciente'])->name('dental.insertPaciente');
Route::get('/buscar_ciudad_region', [App\Http\Controllers\DentalController::class, 'buscar_ciudad_region'])->name('api.buscar_ciudad_region');
Route::get('/dame_regiones', [App\Http\Controllers\DentalController::class, 'dameRegiones'])->name('api.dame_regiones');
Route::get('/buscar_paciente', [App\Http\Controllers\DentalController::class, 'buscarPaciente'])->name('api.buscar_paciente');
Route::get('/buscar_paciente_hora_medica', [App\Http\Controllers\DentalController::class, 'buscarPacienteHoraMedica'])->name('api.buscar_paciente_hora_medica');
Route::post('/agendar_hora_medica', [App\Http\Controllers\DentalController::class, 'agendarHoraMedica'])->name('api.agendar_hora_medica');
Route::get('/horas_medicas_profesional_lugar_atencion', [App\Http\Controllers\DentalController::class, 'horas_medicas_profesional_lugar_atencion'])->name('api.horas_medicas_profesional_lugar_atencion');
Route::get('/horas_disponibles_profesional_lugar_atencion', [App\Http\Controllers\DentalController::class, 'horasDisponiblesProfesionalLugarAtencionBuscador'])->name('api.HorasDisponiblesProfesionalLugarAtencionBuscador');
Route::post('/buscar_profesionales_cm',[App\Http\Controllers\CentroMedicoController::class, 'buscarProfesional'])->name('api.buscar_profesionales_cm');
Route::post('/buscar_especialidades_cm',[App\Http\Controllers\CentroMedicoController::class, 'buscarEspecialidades'])->name('api.buscar_especialidades_cm');
Route::post('/buscar_sub_especialidades_cm',[App\Http\Controllers\CentroMedicoController::class, 'buscarSubEspecialidades'])->name('api.buscar_sub_especialidades_cm');
Route::post('/buscar_profesionales_cm_todos',[App\Http\Controllers\CentroMedicoController::class, 'buscarProfesionales'])->name('api.buscar_profesionales_cm_todos');

/**jwt test */
Route::get('/jwt/generar', [JitsiController::class, 'generarJWT_r']);
Route::get('/jwt/generar/meet', [JitsiController::class, 'jitsiRegistroMeet_r']);
Route::get('/jwt/envio/correo', [JitsiController::class, 'envioNotificacionLlamada']);

/**jwt test */
Route::get('/jwt/generar', [JitsiController::class, 'generarJWT_r']);
Route::get('/jwt/generar/meet', [JitsiController::class, 'jitsiRegistroMeet_r']);
Route::get('/jwt/envio/correo', [JitsiController::class, 'envioNotificacionLlamada']);


/** PACIENTE */
// Route::middleware(['auth:api'])->group(function () {
//     Route::get('/paciente/mi_ficha_medica', [App\Http\Controllers\AppPacienteController::class, 'getMiFichaMedica']);
//     Route::get('/paciente/mis_profesionales', [App\Http\Controllers\AppPacienteController::class, 'getMisProfesionales']);
//     Route::get('/paciente/mis_horas_medicas', [App\Http\Controllers\AppPacienteController::class, 'getMisHorasMedicas']);
// });

Route::get('/paciente/mi_ficha_medica', [App\Http\Controllers\AppPacienteController::class, 'getMiFichaMedica']);
Route::get('/paciente/mis_profesionales', [App\Http\Controllers\AppPacienteController::class, 'getMisProfesionales']);
Route::get('/paciente/mis_horas_medicas', [App\Http\Controllers\AppPacienteController::class, 'getMisHorasMedicas']);
Route::post('/paciente/guardar_atencion_medica', [App\Http\Controllers\AppPacienteController::class, 'guardarAtencionMedica']);
Route::get('/profesionales/especialidades', [App\Http\Controllers\AppPacienteController::class, 'getEspecialidadesProfesionales']);
Route::get('/profesionales/tipo_especialidades', [App\Http\Controllers\AppPacienteController::class, 'getTipoEspecialidadesProfesionales']);
Route::get('/profesionales/sub_tipo_especialidades', [App\Http\Controllers\AppPacienteController::class, 'getSubTipoEspecialidadesProfesionales']);
Route::post('/profesionales/buscar_profesionales', [App\Http\Controllers\AppPacienteController::class, 'buscarProfesionales']);
Route::get('/profesionales/perfil_profesional', [App\Http\Controllers\AppPacienteController::class, 'getPerfilProfesional']);

Route::get('/profesionales/mis_lugares_atencion', [App\Http\Controllers\AppPacienteController::class, 'getLugaresAtencionProfesional']);
Route::get('/profesionales/dias_laborales_lugar_atencion', [App\Http\Controllers\AppPacienteController::class, 'getDiasLaboralesLugarAtencionProfesional']);
Route::get('/profesionales/horas_disponibles_profesional_lugar_atencion', [App\Http\Controllers\AppPacienteController::class, 'getHorasDisponiblesProfesionalLugarAtencionBuscador']);
Route::post('/paciente/agendar_hora_medica', [App\Http\Controllers\AppPacienteController::class, 'agendarHoraMedica']);
Route::post('/paciente/anular_hora_medica', [App\Http\Controllers\AppPacienteController::class, 'anularHoraMedica']);
Route::post('/paciente/confirmar_hora_medica', [App\Http\Controllers\AppPacienteController::class, 'confirmarHoraMedica']);
Route::get('/paciente/dame_regiones', [App\Http\Controllers\AppPacienteController::class, 'dameRegiones']);
Route::get('/paciente/dame_ciudades', [App\Http\Controllers\AppPacienteController::class, 'dameCiudades']);


//  Escritorio Paciente
//Route::get('/paciente/mis_profesionales', [App\Http\Controllers\PacienteController::class, 'getMisProfesionales']);
//Route::get('/paciente/buscar_profesional_1', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_1']);
//Route::get('/paciente/buscar_profesional_2', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_2']);
//Route::get('/paciente/buscar_profesional_3', [App\Http\Controllers\PacienteController::class, 'getBuscarProfesional_3']);
//
//Route::get('/paciente/getRecetas',      [App\Http\Controllers\PacienteController::class, 'getRecetas']);
//Route::get('/paciente/getLicencias',    [App\Http\Controllers\PacienteController::class, 'getLicencias']);
//Route::get('/paciente/getCertificados', [App\Http\Controllers\PacienteController::class, 'getCertificados']);
//Route::get('/paciente/getExamenes', [App\Http\Controllers\PacienteController::class, 'getExamenes']);
//
//Route::get('/paciente/getInfoPerfil', [App\Http\Controllers\PacienteController::class, 'getInfoPerfil']);
//Route::get('/paciente/updPerfilContacto', [App\Http\Controllers\PacienteController::class, 'updPerfilContacto']);
//Route::get('/paciente/updInfoPersonal', [App\Http\Controllers\PacienteController::class, 'updInfoPersonal']);
//Route::get('/paciente/updPerfilResidencia', [App\Http\Controllers\PacienteController::class, 'updPerfilResidencia']);
//
//Route::get('/paciente/getContacto', [App\Http\Controllers\PacienteController::class, 'getContacto']);
//
//// Funciones Utils
//Route::get('/getPrevisionesAll', [App\Http\Controllers\UtilsController::class, 'getPrevisionesAll']);
//Route::get('/getCuidades', [App\Http\Controllers\UtilsController::class, 'getCuidades']);
//Route::get('/getCuidadesAll', [App\Http\Controllers\UtilsController::class, 'getCuidadesAll']);
//Route::get('/getRegionesAll', [App\Http\Controllers\UtilsController::class, 'getRegionesAll']);
//Route::get('/getRegiones', [App\Http\Controllers\UtilsController::class, 'getRegiones']);
//Route::get('/getContacto', [App\Http\Controllers\UtilsController::class, 'getContacto']);
//Route::get('/setContacto', [App\Http\Controllers\UtilsController::class, 'setContacto']);
//Route::get('/delContacto', [App\Http\Controllers\UtilsController::class, 'delContacto']);
//
//Route::get('/getC10', [App\Http\Controllers\UtilsController::class, 'getC10']);
////Route::resource('paciente', App\Http\Controllers\PacienteController::class);
//
////  Escritorio Asistente Laboratorio
//Route::get('/asistente/laboratorio/getPacientes', [App\Http\Controllers\AsistenteController::class, 'getPacientes']);
//
//// Funciones Vistas
//Route::get('/getMisPacientes', [App\Http\Controllers\UtilsController::class, 'getPacientes']);


Route::get('/Ficha_atencion_sub_tipo', [App\Http\Controllers\ficha_atencionController::class, 'get_sub_tipo_examen']);

Route::get('/llamados/televisor/{idTelevisor}', 'App\Http\Controllers\LlamadoPacienteController@getLlamadosPorTelevisor');

// =================== DEBUG AUTH:API MIDDLEWARE ===================

// 1. RUTA SIN MIDDLEWARE (para comparar)
Route::get('/debug-sin-auth', function (Request $request) {
    return response()->json([
        'mensaje' => 'Ruta SIN middleware auth:api funcionando',
        'timestamp' => now(),
        'headers' => [
            'authorization' => $request->header('Authorization'),
            'x_auth_token' => $request->header('X-Auth-Token'),
        ]
    ]);
});

// 2. RUTA CON MIDDLEWARE auth:api (para probar si funciona)
Route::middleware(['auth:api'])->get('/debug-con-auth-api', function (Request $request) {
    return response()->json([
        'mensaje' => 'Middleware auth:api FUNCIONANDO',
        'user_id' => $request->user() ? $request->user()->id : null,
        'user_email' => $request->user() ? $request->user()->email : null,
        'timestamp' => now(),
        'headers' => [
            'authorization' => $request->header('Authorization'),
            'x_auth_token' => $request->header('X-Auth-Token'),
        ]
    ]);
});

// 3. RUTA CON MIDDLEWARE auth:sanctum (alternativa)
Route::middleware(['auth:sanctum'])->get('/debug-con-auth-sanctum', function (Request $request) {
    return response()->json([
        'mensaje' => 'Middleware auth:sanctum FUNCIONANDO',
        'user_id' => $request->user() ? $request->user()->id : null,
        'user_email' => $request->user() ? $request->user()->email : null,
        'timestamp' => now(),
        'headers' => [
            'authorization' => $request->header('Authorization'),
            'x_auth_token' => $request->header('X-Auth-Token'),
        ]
    ]);
});

// 4. RUTA PARA PROBAR ESPECÍFICAMENTE EL MIDDLEWARE auth:api PASO A PASO
Route::get('/debug-auth-paso-a-paso', function (Request $request) {
    try {
        $resultados = [];

        // Paso 1: Headers
        $resultados['paso1_headers'] = [
            'authorization' => $request->header('Authorization'),
            'x_auth_token' => $request->header('X-Auth-Token'),
            'bearer_token' => $request->bearerToken(),
        ];

        // Paso 2: Verificar guards
        try {
            $resultados['paso2_auth_api_check'] = auth('api')->check();
        } catch (\Exception $e) {
            $resultados['paso2_auth_api_check'] = 'ERROR: ' . $e->getMessage();
        }

        try {
            $resultados['paso3_auth_sanctum_check'] = auth('sanctum')->check();
        } catch (\Exception $e) {
            $resultados['paso3_auth_sanctum_check'] = 'ERROR: ' . $e->getMessage();
        }

        // Paso 4: Intentar obtener usuario
        try {
            $user = auth('api')->user();
            $resultados['paso4_auth_api_user'] = $user ? 'Usuario encontrado: ' . $user->email : 'Usuario no encontrado';
        } catch (\Exception $e) {
            $resultados['paso4_auth_api_user'] = 'ERROR: ' . $e->getMessage();
        }

        return response()->json([
            'mensaje' => 'Debug auth paso a paso completado',
            'resultados' => $resultados,
            'timestamp' => now(),
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error en debug paso a paso',
            'mensaje' => $e->getMessage(),
            'linea' => $e->getLine(),
        ], 500);
    }
});

// =================== FIN DEBUG AUTH:API MIDDLEWARE ===================

// RUTAS PARA FICHA DE ATENCIÓN APP - SIN MIDDLEWARE (autenticación manual en controlador)
// Crear nueva ficha de atención
Route::post('/paciente/ficha-atencion-app', [App\Http\Controllers\FichaAtencionAppController::class, 'store']);

// Obtener fichas por paciente
Route::get('/paciente/ficha-atencion-app/{idPaciente}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichasPorPaciente']);

// Obtener fichas por profesional
Route::get('/paciente/ficha-atencion-app/profesional/{rutProfesional}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichasPorProfesional']);

// Obtener ficha por token
Route::get('/paciente/ficha-atencion-app/token/{token}', [App\Http\Controllers\FichaAtencionAppController::class, 'getFichaPorToken']);

// Actualizar ficha
Route::put('/paciente/ficha-atencion-app/{id}', [App\Http\Controllers\FichaAtencionAppController::class, 'update']);

// Desactivar ficha
Route::delete('/paciente/ficha-atencion-app/{id}', [App\Http\Controllers\FichaAtencionAppController::class, 'destroy']);

// RUTA DE PRUEBA PARA FICHA ATENCIÓN APP (SIN AUTENTICACIÓN)
Route::post('/test-ficha-atencion-app', function (Request $request) {
    try {
        // Datos de ejemplo basados en tu JSON
        $datosPrueba = [
            'id_paciente' => $request->input('id_paciente', '3'),
            'rut_profesional' => $request->input('rut_profesional', '17.174.188-2'),
            'nombre_profesional' => $request->input('nombre_profesional', 'francisco rojo'),
            'correo_profesional' => $request->input('correo_profesional', 'francisco@gmail.com'),
            'telefono_profesional' => $request->input('telefono_profesional', '56932659812d'),
            'especialidad' => $request->input('especialidad'),
            'tipo_especialidad' => $request->input('tipo_especialidad'),
            'sub_tipo_especialidad' => $request->input('sub_tipo_especialidad'),
            'diagnosticos' => $request->input('diagnosticos', 'qwdwq'),
            'examenes' => $request->input('examenes', 'examenes'),
            'medicamentos' => $request->input('medicamentos', 'aspirina'),
            'rut_dependiente' => $request->input('rut_dependiente'),
            'token' => $request->input('token', 'test-token-' . time()),
        ];

        $controller = new App\Http\Controllers\FichaAtencionAppController();
        $requestTest = new Request($datosPrueba);

        return $controller->store($requestTest);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error en prueba',
            'error' => $e->getMessage(),
            'line' => $e->getLine(),
        ], 500);
    }
});
