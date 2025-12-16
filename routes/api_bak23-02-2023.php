<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersDevicesController;
use App\Http\Controllers\LogUsersDevicesController;
use App\Http\Controllers\Auth\LoginController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('user/login',[LoginController::class, 'login']);

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
