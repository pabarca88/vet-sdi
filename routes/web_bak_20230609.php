<?php

use App\Http\Controllers\CertificadoReposoController;
use App\Http\Controllers\DentalController;
use App\Http\Controllers\CirugiaController;
use App\Http\Controllers\ContactoEmergenciaController;
use App\Http\Controllers\DetalleRecetaController;
use App\Http\Controllers\EscritorioPaciente;
use App\Http\Controllers\ExamenesPPFController;
use App\Http\Controllers\ficha_atencionController;
use App\Http\Controllers\HoraMedicaController;
use App\Http\Controllers\InformeMedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UsoPersonalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/autocomplete', [ficha_atencionController::class, 'autocomplete'])->name('autocomplete.medicamentos');

//PDF
Route::name('print')->get('/imprimir', [App\Http\Controllers\ficha_atencionController::class, 'imprimir']);
Route::get('ver_receta_pdf/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'ver_receta_pdf'])->name('profesional.ver_recetas_pdf');

Route::get('pdf', function(){
    return view('PDF.pdf_receta_medica');
});

//Ingreso
Route::get('/', function () {
    return redirect('Ingreso');
});


Route::get('Ingreso', [App\Http\Controllers\HomeController::class, 'ingreso'])->name('home.ingreso');
Route::post('Registro', [App\Http\Controllers\HomeController::class, 'registro'])->name('home.registro');
Route::get('Buscar_user_email', [App\Http\Controllers\HomeController::class, 'buscar_user_email'])->name('home.buscar_user_email');

/** confirmaciones  */
Route::get('invitacion/profesional/aprobacion_rechazo', [App\Http\Controllers\EscritorioGeneral::class, 'invitacionProfesionalConfirmacionRechazo'])->name('invitacion.profesional.confirmacion_rechazo');
Route::get('invitacion/convenio/profesional/aprobacion_rechazo', [App\Http\Controllers\EscritorioGeneral::class, 'invitacionConvenioProfesionalConfirmacionRechazo'])->name('invitacion.convenio.profesional.confirmacion_rechazo');

/* profesional */
Route::get('Registros', [App\Http\Controllers\EscritorioProfesional::class, 'registro'])->name('profesional.registro');
Route::get('Registro_profesional', [App\Http\Controllers\HomeController::class, 'registro_profesional'])->name('home.registro_profesional');
Route::get('Registro_paciente_especialidades', [App\Http\Controllers\HomeController::class, 'buscar_especialidad'])->name('home.buscar_especialidad');
Route::get('Registro_paciente_sub_tipo_especialidades', [App\Http\Controllers\HomeController::class, 'buscar_sub_tipo_especialidad'])->name('home.buscar_sub_tipo_especialidad');
/* paciente */
Route::get('Registro_paciente_', [App\Http\Controllers\HomeController::class, 'registro_paciente'])->name('home.registro_paciente');
/* asistente */
Route::get('Registro_asistente', [App\Http\Controllers\HomeController::class, 'registro_asistente'])->name('home.registro_asistente');
/* servicio */
Route::get('Registro_servicio', [App\Http\Controllers\HomeController::class, 'registro_servicio'])->name('home.registro_servicio');
/* institucion */
Route::get('Registro_institucion', [App\Http\Controllers\HomeController::class, 'registro_institucion'])->name('home.registro_institucion');


Route::get('Registro_paciente_verificacion', [App\Http\Controllers\HomeController::class, 'verificar_rut'])->name('home.verificar_rut');
Route::get('Registro_paciente_datos_residencia', [App\Http\Controllers\HomeController::class, 'buscar_ciudad_region'])->name('home.buscar_ciudad_region');


Route::get('/sss', function () {
    $details = [
        'title' => 'Mail de Prueba de Medichile',
        'body' => 'Este es un correo de prueba desde medichile',
    ];

    Mail::to('jkriman@gmail.com')->send(new \App\Mail\RegistroPacienteMail($details));

    dd('Email is Sent.');
});

//lRoute::get('/Registro', [App\Http\Controllers\ficha_atencionController::class, 'index']);

Route::get('/prueba', function () {
    return view('dashboard');
});

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
], function () {
    Route::get('/Acceso-Redirect', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/Acceso', [App\Http\Controllers\HomeController::class, 'acceso'])->name('acceso');

    /** autocomplete  */
    Route::post('/profesional/buscar/por/nombre/Autocomplete',[App\Http\Controllers\EscritorioProfesional::class, 'buscarPorNombreAutocomplete'])->name('profesional.buscar.por.nombre.autocomplete');
});

//Admnistracion
Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'Administracion',
], function () {
    Route::get('Home', [App\Http\Controllers\AdminController::class, 'index'])->name('administrador.home');
    Route::get('/Roles_Permisos', [App\Http\Controllers\AdminController::class, 'roles_permisos'])->name('admin.roles_permisos');
    Route::get('/Agregar_permiso', [App\Http\Controllers\AdminController::class, 'agregar_permiso'])->name('admin.agregar_permiso');
});

//Dental
Route::group(
    [
        'middleware' => ['role:Profesional|admin'],
        'prefix' => 'Cirugia',
    ],
    function () {

        Route::get('Inicio_Cirugia_Quirugica', [CirugiaController::class, 'index_cirugia_quirurgica'])->name('cirugia.index_cirugia_quirurgica');
        Route::post('cargar_lugar_atencion', [CirugiaController::class, 'cargar_lugar_atencion'])->name('cirugia.cargar_lugar_atencion');
        Route::post('registrar_solicitud_pabellon_quirurgico', [CirugiaController::class, 'registrar_solicitud_pabellon_quirurgico'])->name('cirugia.registrar_solicitud_pabellon_quirurgico');

        Route::get('ingreso_paciente/{id}', [CirugiaController::class, 'ingreso_paciente'])->name('cirugia.ingreso_paciente');
        Route::post('registrar_ingreso_paciente_cirugia', [CirugiaController::class, 'registrar_ingreso_paciente_cirugia'])->name('cirugia.registrar_ingreso_paciente_cirugia');
        Route::post('actualizar_ingreso_paciente_cirugia', [CirugiaController::class, 'actualizar_ingreso_paciente_cirugia'])->name('cirugia.actualizar_ingreso_paciente_cirugia');

        Route::get('protocolo_cirugia/{id}', [CirugiaController::class, 'protocolo_cirugia'])->name('cirugia.protocolo_cirugia');
        Route::post('registrar_protocolo_cirugia', [CirugiaController::class, 'registrar_protocolo_cirugia'])->name('cirugia.registrar_protocolo_cirugia');
        Route::post('actualizar_protocolo_cirugia', [CirugiaController::class, 'actualizar_protocolo_cirugia'])->name('cirugia.actualizar_protocolo_cirugia');

        Route::get('sala_recuperacion/{id}', [CirugiaController::class, 'sala_recuperacion'])->name('cirugia.sala_recuperacion');
        Route::post('registrar_recuperacion_cirugia', [CirugiaController::class, 'registrar_recuperacion_cirugia'])->name('cirugia.registrar_recuperacion_cirugia');
        Route::post('actualizar_recuperacion_cirugia', [CirugiaController::class, 'actualizar_recuperacion_cirugia'])->name('cirugia.actualizar_recuperacion_cirugia');

        Route::get('sala_hospitalizacion/{id}', [CirugiaController::class, 'sala_hospitalizacion'])->name('cirugia.sala_hospitalizacion');
        Route::post('registrar_hospitalizacion_cirugia', [CirugiaController::class, 'registrar_hospitalizacion_cirugia'])->name('cirugia.registrar_hospitalizacion_cirugia');
        // Route::post('actualizar_hospitalizacion_cirugia', [CirugiaController::class, 'actualizar_hospitalizacion_cirugia'])->name('cirugia.actualizar_hospitalizacion_cirugia');

        Route::get('epicrisis_alta_medica/{id}', [CirugiaController::class, 'epicrisis_alta_medica'])->name('cirugia.epicrisis_alta_medica');
        Route::post('registrar_epicrisis_alta_medica', [CirugiaController::class, 'registrar_epicrisis_alta_medica'])->name('cirugia.registrar_epicrisis_alta_medica');
        Route::post('actualizar_epicrisis_alta_medica', [CirugiaController::class, 'actualizar_epicrisis_alta_medica'])->name('cirugia.actualizar_epicrisis_alta_medica');

        Route::get('Inicio_Cirugia_obstetricia', [CirugiaController::class, 'index_cirugia_obstetricia'])->name('cirugia.index_cirugia_obstetricia');
        Route::post('registrar_solicitud_pabellon_parto_normal', [CirugiaController::class, 'registrar_solicitud_pabellon_parto_normal'])->name('cirugia.registrar_solicitud_pabellon_parto_normal');

        Route::get('ingreso_paciente_obstetrico/{id}', [CirugiaController::class, 'ingreso_paciente_obstetrico'])->name('cirugia.ingreso_paciente_obstetrico');
        Route::post('registrar_ingreso_paciente_obstetrico', [CirugiaController::class, 'registrar_ingreso_paciente_obstetrico'])->name('cirugia.registrar_ingreso_paciente_obstetrico');
        Route::post('actualizar_ingreso_paciente_obstetrico', [CirugiaController::class, 'actualizar_ingreso_paciente_obstetrico'])->name('cirugia.actualizar_ingreso_paciente_obstetrico');

        Route::get('protocolo_obstetrico/{id}', [CirugiaController::class, 'protocolo_obstetrico'])->name('cirugia.protocolo_obstetrico');
        Route::post('registrar_protocolo_obstetrico', [CirugiaController::class, 'registrar_protocolo_obstetrico'])->name('cirugia.registrar_protocolo_obstetrico');
        Route::post('actualizar_protocolo_obstetrico', [CirugiaController::class, 'actualizar_protocolo_obstetrico'])->name('cirugia.actualizar_protocolo_obstetrico');

        Route::get('recuperacion_obstetrico/{id}', [CirugiaController::class, 'recuperacion_obstetrico'])->name('cirugia.recuperacion_obstetrico');
        Route::post('registrar_recuperacion_obstetrico', [CirugiaController::class, 'registrar_recuperacion_obstetrico'])->name('cirugia.registrar_recuperacion_obstetrico');
        Route::post('actualizar_recuperacion_obstetrico', [CirugiaController::class, 'actualizar_recuperacion_obstetrico'])->name('cirugia.actualizar_recuperacion_obstetrico');

        Route::get('sala_parto_obstetrico/{id}', [CirugiaController::class, 'sala_parto_obstetrico'])->name('cirugia.sala_parto_obstetrico');
        Route::post('registrar_sala_parto_obstretico', [CirugiaController::class, 'registrar_sala_parto_obstretico'])->name('cirugia.registrar_sala_parto_obstretico');
        // Route::post('actualizar_sala_parto_obstretico', [CirugiaController::class, 'actualizar_sala_parto_obstretico'])->name('cirugia.actualizar_sala_parto_obstretico');

        Route::post('registrar_ficha_neonatoligica', [CirugiaController::class, 'registrar_ficha_neonatoligica'])->name('cirugia.registrar_ficha_neonatoligica');
        Route::post('actualizar_ficha_neonatoligica', [CirugiaController::class, 'actualizar_ficha_neonatoligica'])->name('cirugia.actualizar_ficha_neonatoligica');

        Route::get('epicrisis_alta_medica_obstetrico/{id}', [CirugiaController::class, 'epicrisis_alta_medica_obstetrico'])->name('cirugia.epicrisis_alta_medica_obstetrico');
        Route::post('registrar_epicrisis_alta_medica_obstetrico', [CirugiaController::class, 'registrar_epicrisis_alta_medica_obstetrico'])->name('cirugia.registrar_epicrisis_alta_medica_obstetrico');
        Route::post('actualizar_epicrisis_alta_medica_obstetrico', [CirugiaController::class, 'actualizar_epicrisis_alta_medica_obstetrico'])->name('cirugia.actualizar_epicrisis_alta_medica_obstetrico');

        Route::get('Inicio_Cirugia_obstetricia_cesarea', [CirugiaController::class, 'index_cirugia_obstetricia_cesarea'])->name('cirugia.index_cirugia_obstetricia_cesarea');
        Route::post('registrar_solicitud_pabellon_cesarea', [CirugiaController::class, 'registrar_solicitud_pabellon_cesarea'])->name('cirugia.registrar_solicitud_pabellon_cesarea');

        Route::get('ingreso_paciente_cesarea/{id}', [CirugiaController::class, 'ingreso_paciente_cesarea'])->name('cirugia.ingreso_paciente_cesarea');
        Route::post('registrar_ingreso_paciente_cesarea', [CirugiaController::class, 'registrar_ingreso_paciente_cesarea'])->name('cirugia.registrar_ingreso_paciente_cesarea');
        Route::post('actualizar_ingreso_paciente_cesarea', [CirugiaController::class, 'actualizar_ingreso_paciente_cesarea'])->name('cirugia.actualizar_ingreso_paciente_cesarea');

        Route::get('protocolo_cesarea/{id}', [CirugiaController::class, 'protocolo_cesarea'])->name('cirugia.protocolo_cesarea');
        Route::post('registrar_protocolo_cesarea', [CirugiaController::class, 'registrar_protocolo_cesarea'])->name('cirugia.registrar_protocolo_cesarea');
        Route::post('actualizar_protocolo_cesarea', [CirugiaController::class, 'actualizar_protocolo_cesarea'])->name('cirugia.actualizar_protocolo_cesarea');
        Route::post('Registrar_biopsia_cesarea', [CirugiaController::class, 'registrar_biopsia_cesarea'])->name('cirugia.registrar_biopsia_cesarea');
        Route::post('actualizar_biopsia_cesarea', [CirugiaController::class, 'actualizar_biopsia_cesarea'])->name('cirugia.actualizar_biopsia_cesarea');


        Route::get('recuperacion_cesarea/{id}', [CirugiaController::class, 'recuperacion_cesarea'])->name('cirugia.recuperacion_cesarea');
        Route::post('registrar_recuperacion_cesarea', [CirugiaController::class, 'registrar_recuperacion_cesarea'])->name('cirugia.registrar_recuperacion_cesarea');
        Route::post('actualizar_recuperacion_cesarea', [CirugiaController::class, 'actualizar_recuperacion_cesarea'])->name('cirugia.actualizar_recuperacion_cesarea');

        Route::get('sala_parto_cesarea/{id}', [CirugiaController::class, 'sala_parto_cesarea'])->name('cirugia.sala_parto_cesarea');
        Route::post('registrar_sala_parto_cesarea', [CirugiaController::class, 'registrar_sala_parto_cesarea'])->name('cirugia.registrar_sala_parto_cesarea');
        // Route::post('actualizar_sala_parto_obstretico', [CirugiaController::class, 'actualizar_sala_parto_obstretico'])->name('cirugia.actualizar_sala_parto_obstretico');

        // Route::post('registrar_ficha_neonatoligica', [CirugiaController::class, 'registrar_ficha_neonatoligica'])->name('cirugia.registrar_ficha_neonatoligica');
        // Route::post('actualizar_ficha_neonatoligica', [CirugiaController::class, 'actualizar_ficha_neonatoligica'])->name('cirugia.actualizar_ficha_neonatoligica');

        Route::get('epicrisis_alta_medica_cesarea/{id}', [CirugiaController::class, 'epicrisis_alta_medica_cesarea'])->name('cirugia.epicrisis_alta_medica_cesarea');
        Route::post('registrar_epicrisis_alta_medica_cesarea', [CirugiaController::class, 'registrar_epicrisis_alta_medica_cesarea'])->name('cirugia.registrar_epicrisis_alta_medica_cesarea');
        Route::post('actualizar_epicrisis_alta_medica_cesarea', [CirugiaController::class, 'actualizar_epicrisis_alta_medica_cesarea'])->name('cirugia.actualizar_epicrisis_alta_medica_cesarea');
    }
);


//Dental
Route::group([
    'middleware' => ['role:Dental|Profesional|admin'],
    'prefix' => 'Dental',
], function () {

    Route::name('dental.imprimir_certificado_reposo')->post('/imprimir_reposo', [DentalController::class, 'imprimir']);
    Route::get('Inicio_endodoncia', [DentalController::class, 'index_endodoncia'])->name('dental.index_endodoncia');
    Route::post('/Control_endodoncia', [DentalController::class, 'registrar_control_endodoncia'])->name('dental.registrar_control_endodoncia');

    //INFANTIL
    Route::get('Inicio_dental_infantil', [DentalController::class, 'index_dental_infantil'])->name('dental.index_dental_infantil');
    Route::post('Registro_odontograma_dental_infantil', [DentalController::class, 'registrar_odontograma_infantil'])->name('dental_infantil.registrar_odontograma_infantil');
    Route::get('listar_odontograma_infantil', [DentalController::class, 'listar_odontograma_infantil'])->name('dental_infantil.listar_odontograma_infantil');
    Route::get('tab_examen_paciente', [DentalController::class, 'tab_examenes_paciente'])->name('dental_infantil.tab_examenes_paciente');
    Route::post('registrar_maxilar_superior_infantil', [DentalController::class, 'registrar_maxilar_superior_infantil'])->name('dental_infantil.registrar_maxilar_superior_infantil');
    Route::post('registrar_maxilar_inferior_infantil', [DentalController::class, 'registrar_maxilar_inferior_infantil'])->name('dental_infantil.registrar_maxilar_inferior_infantil');
    Route::post('registrar_boca_completa_infantil', [DentalController::class, 'registrar_boca_completa_infantil'])->name('dental_infantil.registrar_boca_completa_infantil');
    Route::post('registrar_odontograma', [DentalController::class, 'registrar_odontograma'])->name('dental.registrar_odontograma');

    //Cirugia Dental
    Route::get('cirugia_dental', [DentalController::class, 'index_cirugia_dental'])->name('dental.index_cirugia_dental');
    Route::post('registrar_solicitud_pabellon_quirurgico', [DentalController::class, 'registrar_solicitud_pabellon_quirurgico'])->name('dental.registrar_solicitud_pabellon_quirurgico');
    Route::post('registrar_ingreso_paciente_cirugia', [DentalController::class, 'registrar_ingreso_paciente_cirugia'])->name('dental.registrar_ingreso_paciente_cirugia');
    Route::post('registrar_protocolo_operatorio', [DentalController::class, 'registrar_protocolo_operatorio'])->name('dental.registrar_protocolo_operatorio');
    Route::post('registrar_epicrisis_carnet_cirugia', [DentalController::class, 'registrar_epicrisis_carnet_cirugia'])->name('dental.registrar_epicrisis_carnet_cirugia');
    Route::post('registrar_evolucion_recuperacion_cirugia', [DentalController::class, 'registrar_evolucion_recuperacion_cirugia'])->name('dental.registrar_evolucion_recuperacion_cirugia');

    Route::get('/autocomplete', [DentalController::class, 'autocomplete'])->name('dental.autocompletar_medicamento');
    Route::post('/getArticulo', [DentalController::class, 'getArticulo'])->name('dental.getArticulo');

    Route::get('/getDosis', [DentalController::class, 'getDosis'])->name('dental.getDosis');
    Route::get('/getFrecuencia', [DentalController::class, 'getFrecuencia'])->name('dental.getFrecuencia');

    Route::post('/getTipoExamen', [DentalController::class, 'getTipoExamen'])->name('dental.getTipoExamen');
    Route::get('/get_sub_tipo_examen', [DentalController::class, 'get_sub_tipo_examen'])->name('dental.get_sub_tipo_examen');
    Route::get('/get_examen', [DentalController::class, 'get_examen'])->name('dental.get_examen');


    Route::get('/registro_obesidad_dental', [DentalController::class, 'registro_obesidad_dental'])->name('dental.registrar_control_obesidad');
    Route::get('/Registro_hipertension', [DentalController::class, 'registrar_control_hipertension'])->name('dental.registrar_hipertension');
    Route::get('/registro_diabetes', [DentalController::class, 'registrar_control_diabetes'])->name('dental.registrar_diabetes');


    //Route::post('/registrar_constancia_ges', [DentalController::class, 'registrar_constancia_ges'])->name('dental.registrar_constancia_ges');
    Route::post('/registrar_declaracion_eno', [DentalController::class, 'registrar_declaracion_eno'])->name('dental.registrar_declaracion_eno');
    Route::post('/getCie10', [DentalController::class, 'getCie10'])->name('dental.getCie10');
    Route::post('/getCie10_1', [DentalController::class, 'getCie10_1'])->name('dental.getCie10_1');

    Route::post('/registrar_gastos', [DentalController::class, 'registrar_gastos'])->name('dental.registrar_gastos');


    Route::post('/registrar_antecedente_fractura_ficha_dental', [DentalController::class, 'registrar_antecedente_fractura_ficha_dental'])->name('dental.registrar_antecedente_fractura_ficha_dental');

    Route::post('/registrar_antecedente_anestesia_ficha_dental', [DentalController::class, 'registrar_antecedente_anestesia_ficha_dental'])->name('dental.registrar_antecedente_anestesia_ficha_dental');
    Route::post('/registrar_antecedente_hemorragia_ficha_dental', [DentalController::class, 'registrar_antecedente_hemorragia_ficha_dental'])->name('dental.registrar_antecedente_hemorragia_ficha_dental');


    Route::get('Inicio', [DentalController::class, 'index'])->name('dental.index');
    Route::post('/registrar_ficha_atencion_dental', [DentalController::class, 'registrar_ficha_atencion_dental'])->name('dental.registrar_ficha_atencion_dental');


    Route::post('/registrar_interconsulta', [DentalController::class, 'registrar_interconsulta'])->name('dental.registrar_interconsulta');
    Route::post('/registrar_informe_medico', [DentalController::class, 'registrar_informe_medico'])->name('dental.registrar_informe_medico');
    Route::post('/registrar_certificado_reposo', [DentalController::class, 'registrar_certificado_reposo'])->name('dental.registrar_certificado_reposo');

    Route::post('/registrar_anestesia_paciente', [DentalController::class, 'registrar_anestesia_paciente'])->name('dental.registrar_anestesia_paciente');
    Route::post('/Registrar_pedido_insumos_materiales', [DentalController::class, 'registrar_pedido_insumos_materiales'])->name('dental.registrar_pedido_insumos_materiales');
    Route::post('/registrar_gastos_material_paciente', [DentalController::class, 'registrar_gastos_material_paciente'])->name('dental.registrar_gastos_material_paciente');
    Route::post('/registrar_control_trabajo_laboratorio', [DentalController::class, 'registrar_control_trabajo_laboratorio'])->name('dental.registrar_control_trabajo_laboratorio');

    Route::post('/Registrar_examen_radiologico', [DentalController::class, 'registrar_examen_radiologico'])->name('dental.registrar_examen_radiologico');
    Route::post('/Registrar_biopsia', [DentalController::class, 'registrar_biopsia'])->name('dental.registrar_biopsia');
    Route::post('/Registrar_orden_trabajo_menor', [DentalController::class, 'registrar_orden_trabajo_menor'])->name('dental.registrar_orden_trabajo_menor');
    Route::post('/Registrar_orden_trabajo_mayor', [DentalController::class, 'registrar_orden_trabajo_mayor'])->name('dental.registrar_orden_trabajo_mayor');
});

Route::group([
    'middleware' => ['role:Admin|Paciente'],
    'prefix' => 'Paciente',
], function () {
    /*  Escritorio Paciente  */
    Route::post('buscar_especialidad', [EscritorioPaciente::class, 'buscar_especialidad'])->name('paciente.buscar_especialidad');
    Route::post('buscar_sub_especialidad', [EscritorioPaciente::class, 'buscar_sub_especialidad'])->name('paciente.buscar_sub_especialidad');

    Route::post('Nuevo_paciente', [EscritorioPaciente::class, 'registrar_paciente'])->name('paciente.nuevo_paciente');
    Route::get('Inicio', [App\Http\Controllers\EscritorioPaciente::class, 'index'])->name('paciente.home');
    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioPaciente::class, 'agendarHora'])->name('paciente.agendar_hora');
    Route::get('Reservar_Hora/{profesion}/{especialidad}/{subespecialidad}', [App\Http\Controllers\EscritorioPaciente::class, 'agendarHora'])->name('paciente.agendar_hora_filtro');
    Route::get('Mi_Profesionales', [App\Http\Controllers\EscritorioPaciente::class, 'miProfesionales'])->name('paciente.mis_profesionales');
    Route::get('desvincular_profesional/{id_usuario}/{id_profesional}', [App\Http\Controllers\EscritorioPaciente::class, 'miProfesionales'])->name('paciente.desvincular_profesional');

    // Route::get('Check_sdi',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdi'])->name('check_sdi'); // PARAMS OBLIGATORIOS urla=Inicio&urln=Mi_Ficha_Medica
    // Route::get('Check_sdi_token',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdiToken'])->name('check_sdi_token'); // se traspaso a grupo de paciente y profesional
    Route::get('Mi_Ficha_Medica', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica'])->name('paciente.mi_ficha');
    Route::get('Mi_Ficha_Medica_Pdf', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedicaPdfView']);

    Route::get('Mi_Ficha_Medica2', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica2'])->name('paciente.mi_ficha2');
    Route::get('Receta_Online', [App\Http\Controllers\EscritorioPaciente::class, 'recetaOnline'])->name('paciente.receta');
    Route::get('Acceso_Profesional_NI', [App\Http\Controllers\EscritorioPaciente::class, 'acceso_pni'])->name('paciente.acceso_pni');

    Route::get('Perfil', [App\Http\Controllers\EscritorioPaciente::class, 'perfil'])->name('paciente.perfil');
    Route::get('RompeClave', [App\Http\Controllers\EscritorioPaciente::class, 'rompeclave'])->name('paciente.rompeclave');
    Route::get('Suscripcion', [App\Http\Controllers\EscritorioPaciente::class, 'subcripcion'])->name('paciente.subcripcion');

    /* 1.- Reservar Hora Médica */
    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioPaciente::class, 'getEspecialidad'])->name('paciente.getEspecialidad');
    Route::get('getProfesional', [App\Http\Controllers\EscritorioPaciente::class, 'getProfesional'])->name('paciente.getProfesional');
    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioPaciente::class, 'getVideoConsulta'])->name('paciente.getVideoConsulta');

    /* 2.- Receta Online */
    Route::get('Receta_Online/Mis_Recetas', [App\Http\Controllers\EscritorioPaciente::class, 'receta_misrecetas'])->name('paciente.receta.receta');
    Route::get('Receta_Online/Mis_Examenes', [App\Http\Controllers\EscritorioPaciente::class, 'receta_misexamenes'])->name('paciente.receta.examen');
    Route::get('Receta_Online/Mis_Certificados', [App\Http\Controllers\EscritorioPaciente::class, 'receta_miscertificados'])->name('paciente.receta.certificado');
    Route::get('Receta_Online/Mis_Licencias', [App\Http\Controllers\EscritorioPaciente::class, 'receta_mislicencias'])->name('paciente.receta.licencia');

    /* 3.- Perfil */
    Route::post('Perfil/editinfo', [App\Http\Controllers\EscritorioPaciente::class, 'editInfor'])->name('paciente.perfil.editinfo');
    Route::post('Perfil/editcontacto', [App\Http\Controllers\EscritorioPaciente::class, 'editcontacto'])->name('paciente.perfil.editcontacto');
    Route::post('Perfil/editdirec', [App\Http\Controllers\EscritorioPaciente::class, 'editdirec'])->name('paciente.perfil.editdirec');
    Route::get('Perfil/crearContacto', [App\Http\Controllers\EscritorioPaciente::class, 'crearcontacto'])->name('paciente.perfil.crearcontacto');


    Route::get('get/informacion/{id_dependiente_activo?}', [App\Http\Controllers\EscritorioPaciente::class, 'getPacienteUser'])->name('paciente.get.informacion');
    Route::post('Reservar_Hora/generar_reserva', [App\Http\Controllers\EscritorioPaciente::class, 'agendar_horas'])->name('paciente.solicitar.hora');


    /** DEPENDENCIA */
    Route::get('dependientes/cargar/lista', [App\Http\Controllers\PacientesDependientesController::class, 'ver_registro_paciente'])->name('paciente.dependientes.ver_registros');

    /** DEPENDENCIA MENOR DE EDAD */
    Route::get('dependientes/definitiva/infante', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependiente'])->name('paciente.dependientes.infante.definitiva');
    Route::get('dependientes/definitiva/adulto', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependiente'])->name('paciente.dependientes.adulto.definitiva');

    /** DEPENDENCIA MAYOR DE EDAD */
    Route::get('dependientes/temporales/infante', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependienteAdultoTemporales'])->name('paciente.dependientes.infante.temporal');
    Route::get('dependientes/temporales/adulto', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependienteAdultoTemporales'])->name('paciente.dependientes.adulto.temporal');

    // Route::get('dependientes/definitiva', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependiente'])->name('paciente.dependientes.definitiva');
    // Route::get('dependientes/adulto/temporales', [App\Http\Controllers\EscritorioDependientesController::class, 'verDependienteAdultoTemporales'])->name('paciente.dependientes.adulto_temporales');

    Route::post('dependientes/registro', [App\Http\Controllers\EscritorioDependientesController::class, 'registrarDepPacienteExistente'])->name('paciente.dependientes.registro');
    Route::post('dependientes/nuevo/registro', [App\Http\Controllers\EscritorioDependientesController::class, 'registroDepPacienteNuevo'])->name('paciente.dependientes.nuevo.registro');

    Route::get('buscar_rut', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_rut_paciente'])->name('paciente.buscar_rut_paciente');

    /** index */
    Route::get('dependiente/Inicio/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'index'])->name('paciente.dependiente.home');
    // Route::get('dependiente/Inicio/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'index'])->name('paciente.dependiente.perfil');
    // Route::get('dependiente/Reservar_Hora/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'agendarHora'])->name('paciente.dependiente.agendar_hora');
    Route::get('dependiente/Reservar_Hora/{id_dependiente_activo}/{profesion?}/{especialidad?}/{subespecialidad?}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'agendarHora'])->name('paciente.dependiente.agendar_hora');
    Route::get('dependiente/Mi_Profesionales/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'miProfesionales'])->name('paciente.dependiente.mis_profesionales');
    Route::get('dependiente/desvincular_profesional/{id_dependiente_activo}/{id_usuario}/{id_profesional}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'miProfesionales'])->name('paciente.dependiente.desvincular_profesional');
    Route::get('dependiente/Mi_Ficha_Medica/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'miFichaMedica'])->name('paciente.dependiente.mi_ficha');

    Route::get('dependiente/Receta_Online/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'recetaOnline'])->name('paciente.dependiente.receta');
    Route::get('dependiente/Receta_Online/Mis_Recetas/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'receta_misrecetas'])->name('paciente.dependiente.receta.receta');
    Route::get('dependiente/Receta_Online/Mis_Examenes/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'receta_misexamenes'])->name('paciente.dependiente.receta.examen');
    Route::get('dependiente/Receta_Online/Mis_Certificados/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'receta_miscertificados'])->name('paciente.dependiente.receta.certificado');
    Route::get('dependiente/Receta_Online/Mis_Licencias/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'receta_mislicencias'])->name('paciente.dependiente.receta.licencia');

    // Route::get('dependiente/Inicio/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'index'])->name('paciente.dependiente.perfil');
    Route::get('dependiente/RompeClave/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'rompeclave'])->name('paciente.dependiente.rompeclave');
    Route::get('dependiente/Suscripcion/{id_dependiente_activo}', [App\Http\Controllers\EscritorioPacienteDependiente::class, 'subcripcion'])->name('paciente.dependiente.subcripcion');

    /** mis controles personales */
    Route::get('mis_controles', [App\Http\Controllers\EscritorioPaciente::class, 'mis_controles'])->name('paciente.mis_controles');


});

Route::group(
    [
        'middleware' => ['role:Profesional|Admin|Paciente'],
        // 'prefix' => 'Contacto',
    ],
    function () {
        Route::post('Perfil/Agregar_contacto', [ContactoEmergenciaController::class, 'registrar_contacto_emergencia'])->name('contacto_emergencia.registrar_contacto_emergencia');
        Route::post('buscar_contacto', [ContactoEmergenciaController::class, 'buscar_contacto'])->name('contacto_emergencia.buscar_contacto');
        Route::get('Check_sdi_token',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdiToken'])->name('check_sdi_token');
        Route::get('Check_sdi',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdi'])->name('check_sdi'); // PARAMS OBLIGATORIOS urla=Inicio&urln=Mi_Ficha_Medica
        Route::get('Mi_Ficha_Medica', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica'])->name('profesional.mi_ficha');
        Route::get('Mi_Ficha_Medica_Pdf', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedicaPdfView']);

    }
);

Route::group([
    'middleware' => ['role:Profesional|Admin'],
    'prefix' => 'Profesional',
], function () {
    /*  Escritorio Profesional */

    Route::post('eliminar_horario_agenda', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_horario_agenda'])->name('profesional.eliminar_horario_agenda');
    Route::post('ver_ficha_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'ver_ficha_atencion'])->name('profesional.ver_ficha_atencion');

     /** ANTECEDENTES MEDICOS DEL PACIENTE  */
    Route::post('Agregar_alergia_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_alergia_paciente'])->name('profesional.agregar_alergia_paciente');
    Route::post('eliminar_alergia_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminarAlergiaPaciente'])->name('profesional.eliminar_alergia_paciente');
    Route::post('agregar_antecedente_quirurgico_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_antecedente_quirurgico_paciente'])->name('profesional.agregar_antecedente_quirurgico_paciente');
    Route::post('agregar_patologia_cronica_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_patologia_cronica_paciente'])->name('profesional.agregar_patologia_cronica_paciente');
    Route::post('eliminar_patologia_cronica_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminarPatologiaCronicaPaciente'])->name('profesional.eliminar_patologia_cronica_paciente');
    Route::post('agregar_medicamento_cronico_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_medicamento_cronico_paciente'])->name('profesional.agregar_medicamento_cronico_paciente');
    Route::post('eliminar_medicamento_cronico_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_medicamento_cronico_paciente'])->name('profesional.eliminar_medicamento_cronico_paciente');
    Route::post('agregar_cirugias_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_cirugias_paciente'])->name('profesional.agregar_cirugias_paciente');
    Route::post('eliminar_cirugias_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_cirugias_paciente'])->name('profesional.eliminar_cirugias_paciente');
    Route::post('editar_datos_personales_perfil', [App\Http\Controllers\EscritorioProfesional::class, 'editar_datos_personales_perfil'])->name('profesional.editar_datos_personales_perfil');
    Route::post('editar_datos_contacto_perfil', [App\Http\Controllers\EscritorioProfesional::class, 'editar_datos_contacto_perfil'])->name('profesional.editar_datos_contacto_perfil');
	Route::post('editar_datos_residencia_perfil', [App\Http\Controllers\EscritorioProfesional::class, 'editar_datos_residencia_perfil'])->name('profesional.editar_datos_residencia_perfil');


    Route::get('examenes_frecuentes', [App\Http\Controllers\EscritorioProfesional::class, 'examenes_frecuentes'])->name('profesional.examenes_frecuentes');



    Route::post('ficha_medica_unica_auth', [App\Http\Controllers\EscritorioProfesional::class, 'ficha_medica_unica_auth'])->name('profesional.ficha_medica_unica_auth');
    Route::get('Solicitar_codigo_fmu', [App\Http\Controllers\EscritorioProfesional::class, 'Solicitar_codigo_fmu'])->name('profesional.solicitar_codigo_fmu');

    Route::get('Lugares_atencion_profesional', [App\Http\Controllers\EscritorioProfesional::class, 'lugares_atencion_profesional_agenda'])->name('profesional.lugares_atencion_profesional_agenda');
    Route::get('mis_valores_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'mis_valores_lugar_atencion'])->name('profesional.mis_valores_lugar_atencion');
    Route::get('Guardar_valores_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'guardar_valores_lugar_atencion'])->name('profesional.guardar_valores_lugar_atencion');
    Route::get('Eliminar_contacto_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_contacto_paciente'])->name('profesional.eliminar_contacto_paciente');
    Route::get('Editar_antecedentes_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'editar_antecedentes_paciente'])->name('profesional.editar_antecedentes_paciente');
	Route::get('Editar_antecedentes_confidenciales_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'editar_antecedentes_confidenciales_paciente'])->name('profesional.editar_antecedentes_confidenciales_paciente');
    Route::get('Eliminar_valor_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_valor_lugar_atencion'])->name('profesional.eliminar_valor_lugar_atencion');

    Route::get('Cargar_datos_contacto', [App\Http\Controllers\EscritorioProfesional::class, 'cargar_datos_contacto'])->name('profesional.cargar_datos_contacto');
    Route::get('Inicio', [App\Http\Controllers\EscritorioProfesional::class, 'index'])->name('profesional.home');
    Route::get('Mis_pacientes', [App\Http\Controllers\EscritorioProfesional::class, 'mis_pacientes'])->name('profesional.pacientes');
    Route::get('Recetas', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_receta_ficha'])->name('profesional.buscar_recetas');
    Route::get('Examenes', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_examen_ficha'])->name('profesional.buscar_examenes');
    Route::get('Editar_paciente/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'ver_paciente'])->name('profesional.editar_paciente');
    Route::get('Configuraciones', [App\Http\Controllers\EscritorioProfesional::class, 'config_profesional'])->name('profesional.configuracion');
    Route::get('Mis_lugares_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'mis_lugares'])->name('profesional.lugares_atencion');
    Route::post('agregar_centro', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_lugar_atencion'])->name('profesional.agregar_centro');
    Route::get('mi_agenda', [App\Http\Controllers\EscritorioProfesional::class, 'mi_agenda'])->name('profesional.mi_agenda');
    Route::get('atenciones_previas_paciente/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'atenciones_previas_paciente'])->name('profesional.atenciones_previas_paciente');
    Route::get('mis_asistentes', [App\Http\Controllers\EscritorioProfesional::class, 'mis_asistentes'])->name('profesional.mis_asistentes');
	Route::get('busq_asistentes', [App\Http\Controllers\EscritorioProfesional::class, 'busq_asistentes'])->name('profesional.busq_asistentes');
    Route::get('Diagnosticos_frecuentes', [App\Http\Controllers\EscritorioProfesional::class, 'diagnosticos_frecuentes'])->name('profesional.diagnosticos_frecuentes');
    Route::get('Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'diagnosticos_cie10'])->name('profesional.diagnosticos_cie10');
	Route::get('buscar_Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'buscarDiagnostico_cie10'])->name('profesional.buscar_diagnosticos_cie10');
	Route::post('registrar_Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'registrarDiagnosticoCie10Profesional'])->name('profesional.registrar_diagnosticos_cie10');
    Route::get('Flujo_caja', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('profesional.flujo_caja');
    Route::get('Mis_estadisticas', [App\Http\Controllers\EscritorioProfesional::class, 'mis_estadisticas'])->name('profesional.mis_estadisticas');
    Route::get('FIcha_medica_unica/{id}', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica'])->name('profesional.ficha_medica_unica');
    Route::get('Ficha_medica_unica_atencion/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'miFichaMedicaAtencion'])->name('profesional.ficha_medica_unica_atencion');
    Route::get('Mi_perfil', [App\Http\Controllers\EscritorioProfesional::class, 'mi_perfil'])->name('profesional.mi_perfil');
    Route::get('Receta_online', [App\Http\Controllers\EscritorioProfesional::class, 'index_receta'])->name('profesional.index_receta_online');
    Route::get('Mis_recetas', [App\Http\Controllers\EscritorioProfesional::class, 'mis_recetas'])->name('profesional.mis_recetas');
    Route::get('Mis_examenes', [App\Http\Controllers\EscritorioProfesional::class, 'mis_examenes'])->name('profesional.mis_examenes');
    Route::get('Mis_certificados', [App\Http\Controllers\EscritorioProfesional::class, 'mis_certificados'])->name('profesional.mis_certificados');
    Route::get('Mis_horas', [App\Http\Controllers\EscritorioProfesional::class, 'mis_horas'])->name('profesional.mis_horas');
    Route::get('Agendar_hora', [App\Http\Controllers\EscritorioProfesional::class, 'agendar_horas'])->name('profesional.agendar_hora');
    Route::get('Agendar_hora_nuevo_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'agendar_hora_nuevo_paciente'])->name('profesional.agendar_hora_nuevo_paciente');
    Route::get('Confirmar_hora', [App\Http\Controllers\EscritorioProfesional::class, 'confirmar_hora'])->name('profesional.confirmar_hora');

    Route::post('recibir_bono', [App\Http\Controllers\EscritorioProfesional::class, 'recibir_bono'])->name('profesional.recibir_bono');

    Route::get('cancelar_hora', [App\Http\Controllers\EscritorioProfesional::class, 'cancelar_hora'])->name('profesional.cancelar_hora');
    Route::get('mi_horario_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'mi_horario_lugar_atencion'])->name('profesional.mi_horario_lugar_atencion');
    Route::get('mi_horario_lugar_atencion_agregar', [App\Http\Controllers\EscritorioProfesional::class, 'mi_horario_lugar_atencion_agregar'])->name('profesional.mi_horario_lugar_atencion_agregar');
    Route::get('mi_asistente_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'mi_asistente_lugar_atencion'])->name('profesional.mi_asistente_lugar_atencion');
    Route::get('Paciente/Ficha_consulta', [App\Http\Controllers\ficha_atencionController::class, 'index'])->name('profesional.realizar_consulta');
    Route::get('ver_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'ver_lugar_atencion'])->name('profesional.ver_lugar_atencion');
    Route::get('buscar_ciudad_region', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_ciudad_region'])->name('profesional.buscar_ciudad_region');
    Route::get('Buscar_horas_medicas', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_horas_medicas'])->name('profesional.buscar_horas_medicas');
    Route::get('envair_email', [App\Http\Controllers\EscritorioProfesional::class, 'enviar_email'])->name('profesional.enviar_email');
    Route::get('editar_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'editar_lugar_atencion'])->name('profesional.editar_lugar_atencion');
    Route::get('buscar_contacto', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_contacto'])->name('profesional.buscar_contacto');

    Route::get('/validar_rut', [App\Http\Controllers\EscritorioProfesional::class, 'validar_rut'])->name('profesional.validar_rut');
    Route::get('/Desasociar_asistente', [App\Http\Controllers\EscritorioProfesional::class, 'desasociar_asistente'])->name('profesional.desasociar_asistente');
    Route::get('cambio_estado_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'cambio_estado_lugar_atencion'])->name('profesional.cambio_estado_lugar_atencion');

    Route::get('/buscar_rut', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_rut_paciente'])->name('profesional.buscar_rut_paciente');
    Route::get('buscar_hora_medica', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('profesional.buscar_hora_medica');
    Route::get('buscar_asistente', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_asistente'])->name('profesional.buscar_asistente');
    Route::get('buscar_asistente_profesional', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_asistente_profesional'])->name('profesional.buscar_asistente_profesional');
    Route::get('agregar_asistente_lugar_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_asistente_lugar_atencion'])->name('profesional.agregar_asistente_lugar_atencion');
    Route::get('cambio_estado_asistente', [App\Http\Controllers\EscritorioProfesional::class, 'cambio_estado_asistente'])->name('profesional.cambio_estado_asistente');
    Route::get('paciente_esperando', [App\Http\Controllers\EscritorioProfesional::class, 'paciente_esperando'])->name('profesional.eperando_hora');
    //Pacientes Mantenedor

    Route::get('Registrar_contacto_emergencia', [App\Http\Controllers\EscritorioProfesional::class, 'registrar_contacto_emergencia'])->name('profesional.registrar_contacto_emergencia');
    Route::get('Editar_contacto_emergencia', [App\Http\Controllers\EscritorioProfesional::class, 'editar_contacto_emergencia'])->name('profesional.editar_contacto');

    Route::post('/Paciente/crear', [App\Http\Controllers\pacienteController::class, 'crear_paciente'])->name('profesional.paciente_agregar');
    Route::post('/Asistente/crear', [App\Http\Controllers\EscritorioProfesional::class, 'crear_asistente'])->name('profesional.crear_asistente');
    Route::post('Paciente_contacto/crear', [App\Http\Controllers\EscritorioProfesional::class, 'crear_contacto_paciente'])->name('profesional.agregar_contacto_paciente');

	/** CODIGO DE AUTORIZACION */
    Route::post('/autorizacion/crear', [App\Http\Controllers\CodigoAutorizacionController::class, 'crear'])->name('cod_autorizacion.agregar');
	Route::post('/autorizacion/validar_codigo', [App\Http\Controllers\CodigoAutorizacionController::class, 'validarCodigo'])->name('cod_autorizacion.validar_codigo');

	/** ANTECEDENTE ACADEMICO */
    Route::post('/profesional/modificar_antecedente_academico', [App\Http\Controllers\EscritorioProfesional::class, 'modificarAntecedenteAademico'])->name('profesional.editar_antecedente_academico');
	Route::post('/profesional/agregar_antecedente_academico', [App\Http\Controllers\EscritorioProfesional::class, 'agregarAntecedenteAademico'])->name('profesional.agregar_antecedente_academico');

	/** REGISTRO DE FICHA TIPO  */
    Route::post('/profesional/agregar_ficha_tipo_otorrino', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoOtorrino'])->name('profesional.ficha_tipo_otorrino');
	Route::get('/profesional/buscar_ficha_tipo_otorrino', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoOtorrino'])->name('profesional.buscar_ficha_tipo_otorrino');

    /** REGISTRO DE FICHA TIPO CDG CIRUGIA DIGESTIVA GENERAL */
    Route::post('/profesional/agregar_ficha_tipo_cdg', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoCDG'])->name('profesional.ficha_tipo_cdg');
	Route::get('/profesional/buscar_ficha_tipo_cdg', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoCDG'])->name('profesional.buscar_ficha_tipo_cdg');
    Route::get('/profesional/cargar_fichas_tipo_cdg', [App\Http\Controllers\EscritorioProfesional::class, 'cargarFichasTipoCDG'])->name('profesional.cargar_fichas_tipo_cdg');

    /** REGISTRO DE FICHA TIPO OFTALMOLOGIA */
    /** EXAMEN ESPACIALIDAD */
    Route::post('/profesional/agregar_ficha_tipo_oft', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoOft'])->name('profesional.ficha_tipo_oft');
	Route::get('/profesional/buscar_ficha_tipo_oft', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoOft'])->name('profesional.buscar_ficha_tipo_oft');
    /** EXAMEN BIOMICROSCOPIA */
    Route::post('/profesional/agregar_ficha_tipo_oft_bio', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoOftBio'])->name('profesional.ficha_tipo_oft_bio');
	Route::get('/profesional/buscar_ficha_tipo_oft_bio', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoOftBio'])->name('profesional.buscar_ficha_tipo_oft_bio');
    /** EXAMEN FONDO DE OJO */
    Route::post('/profesional/agregar_ficha_tipo_oft_fondo_ojo', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoOftFondo'])->name('profesional.ficha_tipo_oft_fondo_ojo');
    Route::get('/profesional/buscar_ficha_tipo_oft_fondo_ojo', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoOftFondo'])->name('profesional.buscar_ficha_tipo_oft_fondo_ojo');

    /** REGISTRO DE FICHA TIPO URO UROLOGIA */
    Route::post('/profesional/agregar_ficha_tipo_uro', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoUro'])->name('profesional.ficha_tipo_uro');
	Route::get('/profesional/buscar_ficha_tipo_uro', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoUro'])->name('profesional.buscar_ficha_tipo_uro');

    /** REGISTRO DE FICHA TIPO CDG CIRUGIA GENERAL */
    Route::post('/profesional/agregar_ficha_tipo_cg', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoCG'])->name('profesional.ficha_tipo_cg');
	Route::get('/profesional/buscar_ficha_tipo_cg', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoCG'])->name('profesional.buscar_ficha_tipo_cg');
    Route::get('/profesional/cargar_fichas_tipo_cg', [App\Http\Controllers\EscritorioProfesional::class, 'cargarFichasTipoCG'])->name('profesional.cargar_fichas_tipo_cg');

    /** REGISTRO DE FICHA TIPO PEDIATRIA GENERAL */
    Route::post('/profesional/agregar_ficha_tipo_pediatria', [App\Http\Controllers\EscritorioProfesional::class, 'agregarFichaTipoPedGen'])->name('profesional.ficha_tipo_ped_gen');
	Route::get('/profesional/buscar_ficha_tipo_pediatria', [App\Http\Controllers\EscritorioProfesional::class, 'buscarFichaTipoPedGen'])->name('profesional.buscar_ficha_tipo_ped_gen');

	/** RECETA AUDIFONOS */
    Route::post('/profesional/audifono/agregar', [App\Http\Controllers\EscritorioProfesional::class, 'agregarAudifono'])->name('profesional.registrar_audifono');
    Route::get('/profesional/audifono/ver', [App\Http\Controllers\EscritorioProfesional::class, 'verAudifono'])->name('profesional.ver_audifono');

	/** LIQUIDACIONES */
    // Route::post('/profesional/liquidacion/agregar', [App\Http\Controllers\LiquidacionReciboController::class, 'agregarLiquidacion'])->name('profesional.agregar_liquidacion');
	// Route::post('/profesional/liquidacion/modificar', [App\Http\Controllers\LiquidacionReciboController::class, 'modificarLiquidacion'])->name('profesional.modificar_liquidacion');

    /** Proceso de imagenes */
	Route::post('/imagen/carga', [App\Http\Controllers\CargaImagenController::class, 'cargaImagenTemp'])->name('profesional.imagen.carga');


    /** peditria tunner */
	Route::post('/peditria/tunner/agregar', [App\Http\Controllers\FichaPediatriaController::class, 'agergarTunner'])->name('ped.tunner.agregar');
	Route::get('/peditria/tunner/ver', [App\Http\Controllers\FichaPediatriaController::class, 'verTunner'])->name('ped.tunner.ver');

    /** registro de equipo */
    Route::get('mi/equipo/ver/equipos',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'verEquiposProfesional'])->name('profesional.equipo.ver');
    Route::get('mi/equipo/ver/equipos/profesional',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'verDetalleEquipoProfesional'])->name('profesional.equipo.ver.profesional');
    Route::post('mi/equipo/crear',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'registroMiEquipoProfesionales'])->name('profesional.equipo.crear');

    /** solicitud de pabellon  */
    Route::post('solicitud/pabellon/crear',[App\Http\Controllers\SolicitudPabellonQuirurgicosController::class, 'registroSolicitud'])->name('solicitud.pabellon.registrar');
});

/* ASISTENTE CONSULTA*/
Route::group([
    'middleware' => ['role:Asistente|Admin'],
    'prefix' => 'Asistente',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistente::class, 'index'])->name('asistente.home');
    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistente::class, 'perfil'])->name('asistente.perfil');
    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'buscar_paciente'])->name('asistente.buscar_paciente');
    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistente::class, 'reservar_hora'])->name('asistente.reservar_hora');
    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistente::class, 'mis_profesionales'])->name('asistente.mis_profesionales');
    Route::get('Flujo_Caja', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('asistente.flujo_caja');

    Route::get('Administracion_asistente', [App\Http\Controllers\EscritorioAsistente::class, 'administracion_asistente'])->name('asistente.administracion_asistente');

    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistente::class, 'index'])->name('asistente.subcripcion');
    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistente::class, 'index'])->name('asistente.venta_productos');
    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'registroPaciente'])->name('asistente.registro_paciente');
    Route::get('AgendaPorProfesional', [App\Http\Controllers\EscritorioAsistente::class, 'agendaPorProfesional'])->name('asistente.agenda_por_profesional');

    /** perfil  */
    Route::post('editar_datos_personales_perfil', [App\Http\Controllers\EscritorioAsistente::class, 'editar_datos_personales_perfil'])->name('asistente.editar_datos_personales_perfil');
    Route::post('editar_datos_contacto_perfil', [App\Http\Controllers\EscritorioAsistente::class, 'editar_datos_contacto_perfil'])->name('asistente.editar_datos_contacto_perfil');
    Route::post('editar_datos_direccion_perfil', [App\Http\Controllers\EscritorioAsistente::class, 'editar_datos_direccion_perfil'])->name('asistente.editar_datos_direccion_perfil');
        /** contacto emergencia */
    Route::get('cargar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistente::class, 'cargar_contacto_emergencia'])->name('asistente.cargar_contacto_emergencia');
    Route::get('cargar_datos_contacto', [App\Http\Controllers\EscritorioAsistente::class, 'cargar_datos_contacto'])->name('asistente.cargar_datos_contacto');
    Route::get('editar_contacto', [App\Http\Controllers\EscritorioAsistente::class, 'editar_contacto_emergencia'])->name('asistente.editar_contacto');
    Route::get('eliminar_contacto_asistente', [App\Http\Controllers\EscritorioAsistente::class, 'eliminar_contacto_asistente'])->name('asistente.eliminar_contacto_asistente');
    Route::get('registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistente::class, 'registrar_contacto_emergencia'])->name('asistente.registrar_contacto_emergencia');
    Route::get('buscar_contacto', [App\Http\Controllers\EscritorioAsistente::class, 'buscar_contacto'])->name('asistente.buscar_contacto');


    /* 1.- Reservar Hora Médica */
    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistente::class, 'getEspecialidad'])->name('asistente.getEspecialidad');
    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistente::class, 'getProfesional'])->name('asistente.getProfesional');
    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistente::class, 'getVideoConsulta'])->name('asistente.getVideoConsulta');
});

/* ASISTENTE caja Centro Medico*/
Route::group([
    'middleware' => ['role:AsistenteCaja|Admin'],
    'prefix' => 'Asistente/cm/',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.home');
    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'perfil'])->name('asistentecm.perfil');
    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente'])->name('asistentecm.buscar_paciente');
    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'reservar_hora'])->name('asistentecm.reservar_hora');
    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'mis_profesionales'])->name('asistentecm.mis_profesionales');
    Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiaria'])->name('asistentecm.rendir');
    Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentecm.rendicion_carga_bonos');
    Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistentecm.historico_caja');

    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.subcripcion');
    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.venta_productos');
    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registroPaciente'])->name('asistentecm.registro_paciente');
	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente_rut'])->name('asistentecm.buscar_paciente_rut');

    Route::get('Profesional/informacion/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscarInfoProfesional'])->name('asistentecm.buscar_info_profesional');
    Route::get('Hora-Medica/buscar', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('asistentecm.buscar_hora_medica');

    /* 1.- Reservar Hora Médica */
    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getEspecialidad'])->name('asistentecm.getEspecialidad');
    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getProfesional'])->name('asistentecm.getProfesional');
    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getVideoConsulta'])->name('asistentecm.getVideoConsulta');

    /** perfil  */
    Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_personales_perfil'])->name('asistentecm.editar_datos_personales_perfil');
    Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_contacto_perfil'])->name('asistentecm.editar_datos_contacto_perfil');
    Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_direccion_perfil'])->name('asistentecm.editar_datos_direccion_perfil');
    /** contacto emergencia */
    Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_contacto_emergencia'])->name('asistentecm.cargar_contacto_emergencia');
    Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registrar_contacto_emergencia'])->name('asistentecm.registrar_contacto_emergencia');
    /** contacto */
    Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_datos_contacto'])->name('asistentecm.cargar_datos_contacto');
    Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_contacto_emergencia'])->name('asistentecm.editar_contacto');
    Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'eliminar_contacto_asistente'])->name('asistentecm.eliminar_contacto_asistente');
    Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_contacto'])->name('asistentecm.buscar_contacto');

    Route::get('hora/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'confirmarHora'])->name('asistentecm.confirmar_hora');
    Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargarConfirmarHora'])->name('asistentecm.cargar_hora_por_confirmar');

});

/* ASISTENTE JEFE Centro Medico*/
Route::group([
    'middleware' => ['role:AsistenteJefaCaja|Admin'],
    'prefix' => 'Asistente/cm/jefe/',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'index'])->name('asistentejcm.home');
    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'perfil'])->name('asistentejcm.perfil');
    Route::get('Paciente/buscar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'buscar_paciente'])->name('asistentejcm.buscar_paciente');
    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'reservar_hora'])->name('asistentejcm.reservar_hora');
    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'mis_profesionales'])->name('asistentejcm.mis_profesionales');
    // Route::get('Flujo_Caja', [App\Http\Controllers\FlujoCajaController::class, 'index'])->name('asistentejcm.flujo_caja');
    Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiariaJefe'])->name('asistentejcm.rendir');
    Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentejcm.rendicion_carga_bonos');
    Route::get('caja/cerrar/rendiciones', [App\Http\Controllers\FlujoCajaController::class, 'cargaRendicionesAsistenteDia'])->name('asistentejcm.rendicion_carga_rendiciones');
    Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistentejcm.historico_caja');

    Route::get('Administracion_asistente', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'administracion_asistente'])->name('asistentejcm.administracion_asistente');

    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'index'])->name('asistentejcm.subcripcion');
    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'index'])->name('asistentejcm.venta_productos');
    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'registroPaciente'])->name('asistentejcm.registro_paciente');
	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'buscar_paciente_rut'])->name('asistentejcm.buscar_paciente_rut');

    /* 1.- Reservar Hora Médica */
    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'getEspecialidad'])->name('asistentejcm.getEspecialidad');
    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'getProfesional'])->name('asistentejcm.getProfesional');
    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'getVideoConsulta'])->name('asistentejcm.getVideoConsulta');

    /** perfil  */
    Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'editar_datos_personales_perfil'])->name('asistentejcm.editar_datos_personales_perfil');
    Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'editar_datos_contacto_perfil'])->name('asistentejcm.editar_datos_contacto_perfil');
    Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'editar_datos_direccion_perfil'])->name('asistentejcm.editar_datos_direccion_perfil');
        /** contacto emergencia */
    Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'cargar_contacto_emergencia'])->name('asistentejcm.cargar_contacto_emergencia');
    Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'registrar_contacto_emergencia'])->name('asistentejcm.registrar_contacto_emergencia');
        /** contacto */
    Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'cargar_datos_contacto'])->name('asistentejcm.cargar_datos_contacto');
    Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'editar_contacto_emergencia'])->name('asistentejcm.editar_contacto');
    Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'eliminar_contacto_asistente'])->name('asistentejcm.eliminar_contacto_asistente');
    Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioAsistenteCmJefe::class, 'buscar_contacto'])->name('asistentejcm.buscar_contacto');

    /** rendicion cierre dia */
    Route::post('cierre/crear/rendicion', [App\Http\Controllers\CierreDiarioController::class, 'cierreDiarioIntitucion'])->name('asistentejcm.solicitar_rendir_cierre_dia');
    Route::post('cierre/desistir/rendicion', [App\Http\Controllers\CierreDiarioController::class, 'cierreCajaDiariaInstitucionDesistir'])->name('asistentejcm.cierre_dia_desistir');
    Route::post('cierre/extencion/validacion/rendicion', [App\Http\Controllers\CierreDiarioController::class, 'cierreCajaDiariaInstitucionExtenderValidacion'])->name('asistentejcm.cierre_dia_extender_validacion');
    Route::post('cierre/rendicion/autorizacion/validacion', [App\Http\Controllers\CierreDiarioController::class, 'cierreDiarioInstitucionValidarAutorizacion'])->name('asistentejcm.cierre_dia_validar_autorizacion');

});

/** procesos de rendicion */
/* ASISTENTE caja Centro Medico*/
/* ASISTENTE JEFE Centro Medico*/
Route::group([
    'middleware' => ['role:AsistenteCaja|AsistenteJefaCaja|Admin'],
    'prefix' => 'Asistente/cm/',
], function () {
    /** rendicion caja */
    Route::post('caja/crear/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucion'])->name('asistentecm.solicitar_rendir_caja');
    Route::post('caja/desistir/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionDesistir'])->name('asistentecm.rendicion_caja_desistir');
    Route::post('caja/extencion/validacion/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionExtenderValidacion'])->name('asistentecm.rendicion_caja_extender_validacion');
    Route::post('caja/rendicion/autorizacion/validacion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionValidarAutorizacion'])->name('asistentecm.rendir_caja_validar_autorizacion');
});


/* ASISTENTE Online*/
Route::group([
    'middleware' => ['role:AsistenteOnline|Admin'],
    'prefix' => 'Asistente_Online',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistente::class, 'indexon'])->name('asistenteon.home');
    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistente::class, 'perfilon'])->name('asistenteon.perfil');
    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'buscar_pacienteon'])->name('asistenteon.buscar_paciente');
    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistente::class, 'reservar_horaon'])->name('asistenteon.reservar_hora');
    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistente::class, 'mis_profesionaleson'])->name('asistenteon.mis_profesionales');
    Route::get('Flujo_Caja', [App\Http\Controllers\FlujoCajaController::class, 'indexcm'])->name('asistenteon.flujo_caja');
    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistente::class, 'indexcm'])->name('asistenteon.subcripcion');
    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistente::class, 'indexcm'])->name('asistenteon.venta_productos');
    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'registroPacientecm'])->name('asistenteon.registro_paciente');

    /* 1.- Reservar Hora Médica */
    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistente::class, 'getEspecialidadcm'])->name('asistenteon.getEspecialidad');
    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistente::class, 'getProfesionalcm'])->name('asistenteon.getProfesional');
    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistente::class, 'getVideoConsultacm'])->name('asistenteon.getVideoConsulta');
});


Route::group([
    'middleware' => ['role:AsistenteAdm|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|Admin'],
    'prefix' => 'Agenda/',
], function () {
    Route::get('BuscarInfoProfesional', [App\Http\Controllers\EscritorioAsistente::class, 'buscarInfoProfesional'])->name('agenda.buscar_info_profesional');
    Route::get('buscar_informacion_profesional', [App\Http\Controllers\EscritorioAsistente::class, 'buscar_informacion_profesional'])->name('agenda.buscar_informacion_profesional');

    /**agenda del profesional */
    Route::get('Hora-medica/hora/buscar', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('agenda.buscar_hora_medica');
    Route::get('Hora-medica/hora/cancelar', [App\Http\Controllers\EscritorioProfesional::class, 'cancelar_hora'])->name('agenda.cancelar_hora');
    Route::get('Hora-medica/hora/confirmar', [App\Http\Controllers\EscritorioProfesional::class, 'confirmar_hora'])->name('agenda.confirmar_hora');
    Route::post('Hora-medica/hora/bono/recibir', [App\Http\Controllers\EscritorioProfesional::class, 'recibir_bono'])->name('agenda.recibir_bono');
    Route::get('Hora-medica/paciente/buscar/rut', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_rut_paciente'])->name('agenda.buscar_rut_paciente');
    Route::get('Hora-medica/hora/agendar/agendar', [App\Http\Controllers\EscritorioAsistente::class, 'agendar_horas'])->name('agenda.agendar_hora');
    Route::get('Hora-medica/hora/agendar/paciente/nuevo', [App\Http\Controllers\EscritorioAsistente::class, 'agendar_hora_nuevo_paciente'])->name('agenda.agendar_hora_nuevo_paciente');

    /** motor de busqueda asistente online*/
    Route::get('perfil/configuracion/busqueda/editar', [App\Http\Controllers\EscritorioAsistente::class, 'editar_configuracion_busqueda'])->name('asistente.editar_configuracion_busqueda');
});

 /** ENFERMERIA  */
  Route::group([
    'middleware' => ['role:Enfermera|Admin'],
    'prefix' => 'Enfermeria',
], function () {
    Route::get('/Enfermera_administrativa', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_administrativa'])->name('app.enfermeria.enfermera_administrativa');
    Route::get('/Enfermera_tratante', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_tratante'])->name('app.enfermeria.enfermera_tratante');
    Route::get('/Enfermera_tens', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_tens'])->name('app.enfermeria.enfermera_tens');

});
  /** LABORATORIO  */
 Route::group([
    'middleware' => ['role:Laboratorio|Admin'],
    'prefix' => 'Laboratorio',
], function () {
    Route::get('/Laboratorio/home', [App\Http\Controllers\LaboratorioController::class, 'home'])->name('app.laboratorio.adm_general.home');
    Route::get('/Laboratorio/adm_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'admin_laboratorio'])->name('app.laboratorio.adm_general.admin_laboratorio');
    Route::get('/Laboratorio/sucursales_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'sucursales_laboratorio'])->name('app.laboratorio.adm_general.sucursales_laboratorio');
	Route::get('/Laboratorio/profesionales_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'profesionales_laboratorio'])->name('app.laboratorio.adm_general.profesionales_laboratorio');
	Route::get('/Laboratorio/asistentes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'asistentes_laboratorio'])->name('app.laboratorio.adm_general.asistentes_laboratorio');
	Route::get('/Laboratorio/lista_exam', [App\Http\Controllers\LaboratorioController::class, 'lista_exam'])->name('app.laboratorio.adm_general.lista_exam');
	Route::get('/Laboratorio/administracion', [App\Http\Controllers\LaboratorioController::class, 'administracion'])->name('app.laboratorio.adm_general.administracion');
	Route::get('/Laboratorio/administracion/Gastos_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'gastos_laboratorio_admin'])->name('app.laboratorio.adm_general.gastos_laboratorio_admin');
	Route::get('/Laboratorio/administracion/Inventario_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'inventario_laboratorio_admin'])->name('app.laboratorio.adm_general.inventario_laboratorio_admin');
	Route::get('/Laboratorio/administracion/Proveedores_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'proveedores_laboratorio_admin'])->name('app.laboratorio.adm_general.proveedores_laboratorio_admin');

	Route::get('/Laboratorio/perfil_admin', [App\Http\Controllers\LaboratorioController::class, 'perfil_admin'])->name('app.laboratorio.adm_general.perfil_admin');
	Route::get('/Laboratorio/perfil_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'perfil_laboratorio'])->name('app.laboratorio.adm_general.perfil_laboratorio');
	Route::get('/Laboratorio/suscripcion_pago_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'suscripcion_pago_laboratorio'])->name('app.laboratorio.adm_general.suscripcion_pago_laboratorio');

	Route::get('/Laboratorio/agenda_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'agenda_laboratorio'])->name('app.laboratorio.lab_asistente.agenda_laboratorio');
	Route::get('/Laboratorio/orden_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'orden_laboratorio'])->name('app.laboratorio.lab_asistente.orden_laboratorio');
	Route::get('/Laboratorio/cotizar_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'cotizar_laboratorio'])->name('app.laboratorio.lab_asistente.cotizar_laboratorio');
	Route::get('/Laboratorio/pacientes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'pacientes_laboratorio'])->name('app.laboratorio.lab_asistente.pacientes_laboratorio');
	Route::get('/Laboratorio/resultados_examenes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'resultados_examenes_laboratorio'])->name('app.laboratorio.lab_asistente.resultados_examenes_laboratorio');

    Route::get('/Laboratorio/lab_asistente', [App\Http\Controllers\LaboratorioController::class, 'escritorio_asistente_laboratorio'])->name('app.laboratorio.lab_asistente.escritorio_asistente_laboratorio');
    Route::get('/Laboratorio/escritorio_profesional_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'escritorio_profesional_laboratorio'])->name('app.laboratorio.lab_profesional.escritorio_profesional_laboratorio');
	Route::get('/Laboratorio/pacientes_laboratoriop', [App\Http\Controllers\LaboratorioController::class, 'pacientes_laboratorio'])->name('app.laboratorio.lab_profesional.pacientes_laboratorio');

	Route::get('/Laboratorio/procesos_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'procesos_laboratorio'])->name('app.laboratorio.lab_profesional.procesos_laboratorio');
	Route::get('/Laboratorio/inventario_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'inventario_laboratorio'])->name('app.laboratorio.lab_profesional.inventario_laboratorio');
	Route::get('/Laboratorio/gastos_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'gastos_laboratorio'])->name('app.laboratorio.lab_profesional.gastos_laboratorio');
	Route::get('/Laboratorio/resultados', [App\Http\Controllers\LaboratorioController::class, 'resultados'])->name('app.laboratorio.lab_profesional.resultados');
	Route::get('/Laboratorio/proveedores_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'proveedores_laboratorio'])->name('app.laboratorio.lab_profesional.proveedores_laboratorio');
	Route::get('/Laboratorio/recepcion_muestras', [App\Http\Controllers\LaboratorioController::class, 'recepcion_muestras'])->name('app.laboratorio.lab_profesional.recepcion_muestras');
	Route::get('/Laboratorio/solicitud_exam_laboratorio_profesional', [App\Http\Controllers\LaboratorioController::class, 'solicitud_exam_laboratorio_profesional'])->name('app.laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional');
});
Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
], function () {
    /*Ficha Medica*/
    Route::post('Ficha_medica_no_inscrito', [ficha_atencionController::class, 'atencion_profesional_no_inscrito'])->name('atencion_medica.ficha_atencion_profesional_no_inscrito');

    Route::post('Ficha_Atencion/crear', [ficha_atencionController::class, 'store'])->name('fichaAtencion.registrar_ficha');
	Route::post('Ficha_Atencion/crear/orl', [ficha_atencionController::class, 'store_orl'])->name('fichaAtencion.registrar_ficha_orl');
    Route::post('Ficha_Atencion/crear/cg', [ficha_atencionController::class, 'store_cg'])->name('fichaAtencion.registrar_ficha_cg');
    Route::post('Ficha_Atencion/crear/cdg', [ficha_atencionController::class, 'store_cdg'])->name('fichaAtencion.registrar_ficha_cdg');
    Route::post('Ficha_Atencion/crear/uro', [ficha_atencionController::class, 'store_uro'])->name('fichaAtencion.registrar_ficha_uro');
    Route::post('Ficha_Atencion/crear/oft', [ficha_atencionController::class, 'store_oft'])->name('fichaAtencion.registrar_ficha_oft');
	Route::post('Ficha_Atencion/crear/dermo', [ficha_atencionController::class, 'store_dermo'])->name('fichaAtencion.registrar_ficha_dermo');
	Route::post('Ficha_Atencion/crear/pediatria/general', [ficha_atencionController::class, 'store_pediatria_general'])->name('fichaAtencion.registrar_ficha_ped_gen');
    //Route::post('Ficha_atencion/Registro_ficha', [ficha_atencionController::class, 'store'])->name('crear.ficha_atencion');
    //Route::post('Ficha_atencion/Registro_ficha', [ficha_atencionController::class, 'store'])->name('crear.ficha_atencion');

    Route::post('/getArticulo', [ficha_atencionController::class, 'getArticulo'])->name('ficha_medica.getArticulo');


    Route::get('/Ficha_medica', [App\Http\Controllers\ficha_atencionController::class, 'index']);
    Route::get('/Ficha_medica/registro_obesidad', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_obesidad'])->name('ficha_medica.registrar_control_obesidad');
    Route::get('/Ficha_medica/registro_hipertension', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_hipertension'])->name('ficha_medica.registrar_hipertension');
    Route::get('/Ficha_medica/registro_diabetes', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_diabetes'])->name('ficha_medica.registrar_diabetes');
    Route::post('/Ficha_medica/finalizar_atencion', [App\Http\Controllers\ficha_atencionController::class, 'finalizar_atencion'])->name('ficha_atencion.finalizar_atencion');


    Route::get('/Ficha_medica/registrar_ges_ficha', [App\Http\Controllers\ficha_atencionController::class, 'registrar_ges_ficha'])->name('ficha_atencion.registrar_diagnostico_ges');
    //Formularos Generales
    Route::get('/Ficha_medica/certificado_reposo', [App\Http\Controllers\ficha_atencionController::class, 'registrar_certificado_reposo'])->name('ficha_medica.registrar_certificado_reposo');
    Route::get('/Ficha_medica/registrar_interconsulta', [App\Http\Controllers\ficha_atencionController::class, 'registrar_interconsulta'])->name('ficha_medica.registrar_interconsulta');
	Route::get('/Ficha_medica/registrar_interconsulta_respuesta', [App\Http\Controllers\ficha_atencionController::class, 'registrar_interconsulta_respuesta'])->name('ficha_medica.registrar_interconsulta_respuesta');
    Route::get('/Ficha_medica/registrar_informe_medico', [App\Http\Controllers\ficha_atencionController::class, 'registrar_informe_medico'])->name('ficha_medica.registrar_informe_medico');
	Route::get('/Ficha_medica/registrar_uso_personal', [App\Http\Controllers\ficha_atencionController::class, 'registrar_uso_personal'])->name('ficha_medica.registrar_uso_personal');
    Route::get('/Registro1', [App\Http\Controllers\ficha_atencionController::class, 'index']);
    Route::get('/Registro_paciente', [App\Http\Controllers\pacienteController::class, 'buscar_paciente'])->name('buscar_paciente');

    //faltantes
    Route::get('/Ficha_medica/registrar_consentimiento_faltante', [App\Http\Controllers\ficha_atencionController::class, 'registrar_consentimiento_faltante'])->name('ficha_medica.registrar_consentimiento_faltante');
    Route::get('/Ficha_medica/registrar_formulario_faltante', [App\Http\Controllers\ficha_atencionController::class, 'registrar_formulario_faltante'])->name('ficha_medica.registrar_formulario_faltante');
    Route::get('/Ficha_medica/registrar_registrar_sugerencias', [App\Http\Controllers\ficha_atencionController::class, 'registrar_sugerencia'])->name('ficha_medica.registrar_sugerencias');

    Route::post('/Licencia/crear', [App\Http\Controllers\ficha_atencionController::class, 'crear_licencia'])->name('crear.licencia');
    Route::post('/Interconsulta/crear', [App\Http\Controllers\ficha_atencionController::class, 'interconsulta'])->name('crear.interconsulta');
    Route::post('/reposo/crear', [App\Http\Controllers\ficha_atencionController::class, 'reposo'])->name('crear.reposo');
    Route::post('/Informe_medico/crear', [App\Http\Controllers\ficha_atencionController::class, 'informe_medico'])->name('crear.informe_medico');
    //Route::post('/Constancia_ges/crear', [App\Http\Controllers\ficha_atencionController::class, 'constancia_ges'])->name('crear.constancia_ges');
    Route::post('/ENO/crear', [App\Http\Controllers\ficha_atencionController::class, 'eno'])->name('crear.eno');
    Route::get('/Ficha_atencion_sub_tipo', [App\Http\Controllers\ficha_atencionController::class, 'get_sub_tipo_examen'])->name('listar.sub_tipo_examen');
    Route::get('/Ficha_atencion_tipo', [App\Http\Controllers\ficha_atencionController::class, 'get_tipo_examen'])->name('listar.tipo_examen');
    Route::get('/Ficha_atencion_examen', [App\Http\Controllers\ficha_atencionController::class, 'get_examen'])->name('listar.examen');
    Route::get('/Ficha_atencion/examen/buscar', [App\Http\Controllers\ficha_atencionController::class, 'buscar_examen'])->name('examenes_medico.ver_examen');
    Route::get('/Ficha_atencion_presentacion', [App\Http\Controllers\ficha_atencionController::class, 'get_presentacion'])->name('listar.presentacion');
    Route::get('/Ficha_atencion_dosis', [App\Http\Controllers\ficha_atencionController::class, 'get_dosis'])->name('listar.dosis');
    Route::get('/buscar_recetas', [App\Http\Controllers\ficha_atencionController::class, 'get_recetas'])->name('buscar.recetas');
    Route::get('/buscar_examenes', [App\Http\Controllers\ficha_atencionController::class, 'get_examenes'])->name('buscar.examenes_ficha');

	Route::post('/examen_ppf', [App\Http\Controllers\ficha_atencionController::class, 'registroExamen'])->name('examen_ppf.registrar');

	Route::get('/get_ficha_clinica_paciente', [App\Http\Controllers\ficha_atencionController::class, 'getFichasClinicaPaciente'])->name('ficha_clinica.get_fichas');
	Route::get('/get_ficha_atencion', [App\Http\Controllers\ficha_atencionController::class, 'getFichaAtencion'])->name('ficha_clinica.get_ficha');

	/** busqueda en tabla de persona */
    Route::get('/personas/buscar', [App\Http\Controllers\EscritorioGeneral::class, 'getPersona'])->name('personas.buscador');

});
/**--CENTRO MEDICO--**/
Route::group([
	'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Institucion'],
    'prefix' => 'Administrador',
], function () {
    Route::get('/Inicio', [App\Http\Controllers\AdministradorCmController::class, 'index'])->name('adm_cm.home');
    Route::get('/Configuracion', [App\Http\Controllers\AdministradorCmController::class, 'configuracion'])->name('adm_cm.configuracion');
    Route::post('/Configuracion/perfil/datos/editar', [App\Http\Controllers\AdministradorCmController::class, 'editarDatosPerfil'])->name('adm_cm.editar_datos_perfil');
	Route::post('/Configuracion/perfil/datos/responsable/editar', [App\Http\Controllers\AdministradorCmController::class, 'editarDatosPerfilResponsable'])->name('adm_cm.editar_datos_perfil_responsable');
	Route::get('/Configuracion/perfil/datos/personal/persona', [App\Http\Controllers\AdministradorCmController::class, 'cargaPersonalPersona'])->name('adm_cm.cargar_personal_persona');
	Route::post('/Configuracion/perfil/actualizar/personal/clave/centro', [App\Http\Controllers\AdministradorCmController::class, 'actualizarAccesoPersonal'])->name('adm_cm.actualizar_acceso_personal');

    Route::get('/Configuracion/perfil_cm', [App\Http\Controllers\AdministradorCmController::class, 'perfil'])->name('adm_cm.perfil_cm');
	Route::get('/Configuracion/departamentos_servicios', [App\Http\Controllers\AdministradorCmController::class, 'departamentos'])->name('adm_cm.departamentos_servicios');
    Route::get('/Estadisticas', [App\Http\Controllers\AdministradorCmController::class, 'estadisticas'])->name('adm_cm.estadisticas');

	Route::get('/Profesionales', [App\Http\Controllers\AdministradorCmController::class, 'profesionales'])->name('adm_cm.profesionales');
    Route::get('/Mis/Profesionales', [App\Http\Controllers\AdministradorCmController::class, 'adm_inst_mis_profesionales'])->name('adm_cm.mis_profesionales');
	Route::post('/Profesionales/asociar/existente', [App\Http\Controllers\AdministradorCmController::class, 'asociarProfesionalExistente'])->name('adm_cm.asociar_profesional_existente');
	Route::post('/Profesionales/asociar/nuevo', [App\Http\Controllers\AdministradorCmController::class, 'asociarProfesionalNuevo'])->name('adm_cm.asociar_profesional_nuevo');
	Route::get('/Profesionales/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_profesional'])->name('adm_cm.profesional_buscar');
	Route::get('/Profesional/lugar_atencion/horario', [App\Http\Controllers\AdministradorCmController::class, 'mi_horario_lugar_atencion'])->name('adm_cm.prof_horario_lugar_atencion');
	Route::post('/Personal/registro', [App\Http\Controllers\ManejoContratoController::class, 'registrarPersonal'])->name('adm_cm.registrar_personal');
	Route::post('/Personal/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarPersonal'])->name('adm_cm.editar_personal');
	Route::post('/Personal/horario/editar', [App\Http\Controllers\ManejoContratoController::class, 'modificarHorario'])->name('adm_cm.personal.horario.editar');
	Route::get('/profesionales/liquidacion', [App\Http\Controllers\AdministradorCmController::class, 'adm_liquidacion_profesionales'])->name('adm_cm.liquidacion_profesionales');

	Route::get('/liquidacion_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'liquidacion_profesionales'])->name('app.adm_cm.liquidacion_profesionales');
	Route::post('/Personal/finalizar', [App\Http\Controllers\ManejoContratoController::class, 'desasociarPersonalAsistente'])->name('adm_cm.personal.finalizar');

	Route::get('/liquidacion_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'liquidacion_profesionales'])->name('app.adm_cm.liquidacion_profesionales');

	Route::get('/Personal', [App\Http\Controllers\AdministradorCmController::class, 'personal'])->name('adm_cm.personal');
	Route::get('/Personal/Asistente', [App\Http\Controllers\AdministradorCmController::class, 'personal_asistentes'])->name('adm_cm.personal.asistente');
    Route::get('/Personal/Asistente/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_asistente'])->name('adm_cm.asistente_buscar');
    Route::get('/Personal/lugar_atencion/contrato/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verContratoEmpleado'])->name('adm_cm.empleado_contrato_lugar_atencion');
    Route::get('/Personal/lugar_atencion/horario/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verHorarioEmpleado'])->name('adm_cm.empleado_horario_lugar_atencion');
    Route::post('/Personal/asistente/modificar/permisos', [App\Http\Controllers\AdministradorCmController::class, 'modificar_rol_asistente'])->name('adm_cm.personal.asistente.actualizar.rol');

	Route::get('/Pacientes', [App\Http\Controllers\AdministradorCmController::class, 'adm_buscar_pacientes'])->name('adm_cm.pacientes');

	Route::get('/Adm_medico', [App\Http\Controllers\AdministradorCmController::class, 'adm_medico'])->name('adm_cm.adm_medico');
    Route::get('/Proveedores', [App\Http\Controllers\AdministradorCmController::class, 'proveedores'])->name('adm_cm.proveedores');
    Route::get('/Gastos', [App\Http\Controllers\AdministradorCmController::class, 'gastos'])->name('adm_cm.gastos');
	Route::get('/At_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'at_profesionales'])->name('adm_cm.at_profesionales');

    Route::get('/Pagos', [App\Http\Controllers\AdministradorCmController::class, 'pagos'])->name('adm_cm.pagos');
    Route::get('/Laboratorios', [App\Http\Controllers\AdministradorCmController::class, 'laboratorio'])->name('adm_cm.laboratorio');
	Route::get('/Vacunatorio', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio'])->name('adm_cm.vacunatorio');
	Route::get('/Vacunatorio/vacunatorio_instalaciones', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_instalaciones'])->name('adm_cm.vacunatorio_instalaciones');
	Route::get('/Vacunatorio/vacunatorio_pedidos', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_pedidos'])->name('adm_cm.vacunatorio_pedidos');
	Route::get('/Vacunatorio/vacunatorio_personal', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_personal'])->name('adm_cm.vacunatorio_personal');
	Route::get('/Vacunatorio/vacunatorio_felicitreclamos', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_felicitreclamos'])->name('adm_cm.vacunatorio_felicitreclamos');
    Route::get('/Laboratorios/Examenes', [App\Http\Controllers\AdministradorCmController::class, 'examenes'])->name('adm_cm.examenes');
    Route::get('/Laboratorios/Agregar', [App\Http\Controllers\AdministradorCmController::class, 'laboratorio_agregar'])->name('adm_cm.laboratorio_agregar');
    Route::get('/Laboratorios/Procedimientos', [App\Http\Controllers\AdministradorCmController::class, 'procedimientos'])->name('adm_cm.procedimientos');
    Route::get('/Laboratorios/Sucursales', [App\Http\Controllers\AdministradorCmController::class, 'sucursales_cm'])->name('adm_cm.sucursales_cm');

    Route::get('/Administracion', [App\Http\Controllers\AdministradorCmController::class, 'administracion_cm'])->name('adm_cm.administracion_cm');
    Route::get('/Administracion/Comercial', [App\Http\Controllers\AdministradorCmController::class, 'areaComercial'])->name('adm_cm.area_comercial');
    Route::get('/Administracion/Comercial/sueldos', [App\Http\Controllers\AdministradorCmController::class, 'sueldos'])->name('adm_cm.sueldos');

    Route::get('/Administracion/Contabilidad', [App\Http\Controllers\AdministradorCmController::class, 'areaContabilidad'])->name('adm_cm.area_contabilidad');
    Route::get('/Administracion/Bodega', [App\Http\Controllers\AdministradorCmController::class, 'areaBodega'])->name('adm_cm.area_bodega');
    Route::get('/Administracion/Estadistica', [App\Http\Controllers\AdministradorCmController::class, 'areaEstadistica'])->name('adm_cm.area_estadistica');
    Route::get('/Administracion/Insumos', [App\Http\Controllers\AdministradorCmController::class, 'insumos'])->name('adm_cm.insumos');

	Route::get('/Administrador/ciudad/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_ciudad_region'])->name('adm_cm.buscar_ciudad_region');

	/** CAMBIO CONTRASEÑA DEL RESPONSABLE */
    Route::get('/Administrador/responsable/contrasena/cambio', [App\Http\Controllers\AdministradorCmController::class, 'cambioContrasenaPerfilResponsable'])->name('adm_cm.cambio_contrasena_responsable');

    Route::get('/invitacion/buscar/informacion', [App\Http\Controllers\InvitacionController::class, 'cambioContrasenaPerfilResponsable'])->name('invitaciones.buscar.info');

    /** FLUJO DE CAJA */
    Route::get('/flujo_caja', [App\Http\Controllers\FlujoCajaController::class, 'adm_cm_flujo_caja'])->name('adm_cm.flujo.caja.index');


});

Route::group([
    'middleware' => ['role:Admin|AsistenteAdm|Institucion|AsistenteAdm|Adm_Institucion'],
    'prefix' => 'cm/',
], function () {
    Route::get('Paciente/cargar_info', [App\Http\Controllers\AdministradorCmController::class, 'buscar_paciente_rut'])->name('asistente_adm.buscar_paciente_rut');
});

/** ASISTENTE ADMINISTRATIVA DE CENTRO MEDICO */
Route::group([
    'middleware' => ['role:Admin|AsistenteAdm'],
    'prefix' => 'Asistente/cm/Administrativa',
], function () {
    Route::get('/escritorio', [App\Http\Controllers\AdministradorCmController::class, 'escritorio_asist_adm'])->name('asistente_adm.home');
    Route::get('/pedidos', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_pedidos'])->name('asistente_adm.asistente_adm_pedidos');
    Route::get('/paciente/buscar', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_buscar_pacientes'])->name('asistente_adm.buscar_paciente');
    Route::get('/profesionales/buscar', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_mis_profesionales'])->name('asistente_adm.mis_profesionales');
    Route::get('/profesionales/liquidacion', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_liquidacion_profesionales'])->name('asistente_adm.liquidacion_profesionales');
    Route::get('/gastos', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_gastos'])->name('asistente_adm.gastos');


    /** CONTRATOS */
    Route::get('Contratos/cargar', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_cargar_contrato'])->name('asistente_adm.cargar_contrato');
    Route::get('Contratos/cargar/detalle', [App\Http\Controllers\AdministradorCmController::class, 'asistente_adm_detalle_contrato'])->name('asistente_adm.detalle_contrato');
});


/** ADMIN */
Route::group([
    'middleware' => ['role:Admin'],
    'prefix' => 'Admin/',
], function () {

    /** Tipo Dependencia */
    Route::post('tipo/dependencia/registrar', [App\Http\Controllers\TipoDependenciaController::class, 'registrar'])->name('tipo_dependencia.registrar');
    Route::get('tipo/dependencia/ver', [App\Http\Controllers\TipoDependenciaController::class, 'ver_registro'])->name('tipo_dependencia.ver');

    /** Responsable nivel */
    Route::post('responsable/nivel/registrar', [App\Http\Controllers\ResponsableNivelController::class, 'registrar'])->name('responsable_nivel.registrar');
    Route::get('responsable/nivel/ver', [App\Http\Controllers\ResponsableNivelController::class, 'ver_registro'])->name('responsable_nivel.ver');

    /** Tipo Responsable */
    Route::post('tipo/responsable/registrar', [App\Http\Controllers\ResponsableTipoController::class, 'registrar'])->name('responsable_tipo.registrar');
    Route::get('tipo/responsable/ver', [App\Http\Controllers\ResponsableTipoController::class, 'ver_registro'])->name('responsable_tipo.ver');

    /** Responsable */
    Route::post('responsable/registrar', [App\Http\Controllers\ResponsableController::class, 'registrar_r'])->name('responsable.registrar');

});

/** Tipo Dependencia */
Route::get('tipo/dependencia/lista', [App\Http\Controllers\TipoDependenciaController::class, 'ver_registros'])->name('tipo_dependencia.lista');
/** Responsable nivel */
Route::get('responsable/nivel/lista', [App\Http\Controllers\ResponsableNivelController::class, 'ver_registros'])->name('responsable_nivel.lista');
/** Tipo Responsable */
Route::get('tipo/responsable/lista', [App\Http\Controllers\ResponsableTipoController::class, 'ver_registros'])->name('responsable_tipo.lista');

/** - VUE JS - */

//Route::get('/Paciente',         [App\Http\Controllers\PacienteController::class, 'index2'])->name('escritorio.paciente');
//Route::get('/Paciente/{any}',   [App\Http\Controllers\PacienteController::class, 'index'])->where('any', '.*');

//Route::get('/Asistente_Laboratorio',         [App\Http\Controllers\AsistenteController::class, 'index'])->name('escritorio.asis_lab');
//Route::get('/Asistente_Laboratorio/{any}',   [App\Http\Controllers\AsistenteController::class, 'index'])->where('any', '.*');

Route::get('/Dental',         [App\Http\Controllers\HomeController::class, 'EscritorioDental'])->name('escritorio.dental');
Route::get('/Dental/{any}',   [App\Http\Controllers\HomeController::class, 'EscritorioDental'])->where('any', '.*');

/** - API - **/

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'api/Utils',
], function () {
    Route::get('/getRegionesAll',      [App\Http\Controllers\UtilsController::class, 'getRegionesAll']);
    Route::get('/getCuidades',      [App\Http\Controllers\UtilsController::class, 'getCuidades']);
});

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'api/Profesional',
], function () {
    Route::get('/getMisPacientes',      [App\Http\Controllers\ProfesionalController::class, 'getPacientes']);
    Route::get('/getMisClinicasDental', [App\Http\Controllers\ProfesionalController::class, 'getMisClinicasDental']);
    Route::get('/newLugarAtencion',     [App\Http\Controllers\ProfesionalController::class, 'newLugarAtencion']);
});

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'api/Paciente',
], function () {
    Route::get('/getMisAtenciones', [App\Http\Controllers\PacienteController::class, 'getMisAtenciones'])->name('api.Paciente.getMisAtenciones');
    Route::get('/getRecetasByFicha', [App\Http\Controllers\PacienteController::class, 'getRecetasByFicha']);
    Route::get('/getExamenesByFicha', [App\Http\Controllers\PacienteController::class, 'getExamenesByFicha']);
});

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => 'Contabilidad',
], function () {
    Route::get('/FujoCaja/getRendicion',    [App\Http\Controllers\ContabilidadController::class, 'getRendicion']);
    Route::get('/FujoCaja/Rendicion',       [App\Http\Controllers\ContabilidadController::class, 'Rendicion']);
});

/** Medicamento faltante */
Route::group([
    'middleware' => ['role:Profesional|admin'],
    'prefix' => 'MedicamentoFaltante',
], function () {
    Route::post('/registrar',       [App\Http\Controllers\ArticuloFaltanteController::class, 'registrarArticulo'])->name('medicamentoFaltante.registro');
    Route::post('/estado',       [App\Http\Controllers\ArticuloFaltanteController::class, 'estado'])->name('medicamentoFaltante.estado');
    Route::get('/ver',       [App\Http\Controllers\ArticuloFaltanteController::class, 'getArticuloFaltante'])->name('medicamentoFaltante.getArticulosFaltantes');
});

/** DIAGNOSTICO GES */
Route::group([
    'middleware' => ['role:Profesional|admin'],
    'prefix' => 'ges',
], function () {
    Route::post('/ver',       [App\Http\Controllers\GesDiagnosticosController::class, 'get_ges'])->name('ges.ver');
});


/** REGISTROS MEDICAMENTOS CRONICO */
Route::group([
    'middleware' => ['role:Profesional|admin'],
    'prefix' => 'medicamento_cronico',
], function () {
    Route::post('/registrar',[App\Http\Controllers\MedicamentoUsoCronicoGeneralController::class, 'registrar'])->name('medicamento_cronico.registrar');
    Route::get('/getRegsitros',[App\Http\Controllers\MedicamentoUsoCronicoGeneralController::class, 'getRegsitros'])->name('medicamento_cronico.getRegsitros');
    Route::get('/getRegsitro',[App\Http\Controllers\MedicamentoUsoCronicoGeneralController::class, 'getRegsitro'])->name('medicamento_cronico.getRegsitro');
    Route::post('/deleteRegsitro',[App\Http\Controllers\MedicamentoUsoCronicoGeneralController::class, 'deleteRegsitro'])->name('medicamento_cronico.deleteRegsitro');
});

/** REGISTROS CONTROL HIPERTENSION - CRONICO */
Route::group([
    'middleware' => ['role:Profesional|admin'],
    'prefix' => 'hipertension',
], function () {
    Route::get('/getHipertension',[App\Http\Controllers\HipertensionController::class, 'getHipertension'])->name('hipertension.getHipertension');
});


/** REGISTROS CONTROL OBESIDAD - CRONICO */
Route::group([
    'middleware' => ['role:Profesional|admin'],
    'prefix' => 'control_obesidad',
], function () {
    Route::get('/getControlObesidad',[App\Http\Controllers\ControlObesidadController::class, 'getControlObesidad'])->name('control_obesidad.getControlObesidad');
});

/** LISTA DE TIPOS DE CONFIRMACION DE HORA AGENDADA */
Route::get('conf_hora_agenda/get_registro', [App\Http\Controllers\RegistroConfirmacionHoraAgendaController::class, 'getRegistros'])->name('conf_hora_agenda.get_registro');


Route::get('consulta/persona', [App\Http\Controllers\PersonasController::class, 'get_persona'])->name('consulta.persona');


/** GENERAR PDF DESDE TABLA DE MEDICAMENTOS */
Route::get('pdf_receta/receta_medicamentos', [App\Http\Controllers\ficha_atencionController::class, 'pdf_receta_medicamentos'])->name('pdf.receta_medicamentos');
Route::get('pdf_orden/orden_examenes', [App\Http\Controllers\ficha_atencionController::class, 'pdf_orden_examenes'])->name('pdf.orden_examenes');
Route::get('pdf_certificado_reposo/certificado_reposo', [App\Http\Controllers\ficha_atencionController::class, 'pdf_certificado_reposo'])->name('pdf.certificado_reposo');
Route::get('pdf_informe_medico/informe_medico', [App\Http\Controllers\ficha_atencionController::class, 'pdf_informe_medico'])->name('pdf.informe_medico');
Route::get('pdf_uso_personal/uso_personal', [App\Http\Controllers\ficha_atencionController::class, 'pdf_uso_personal'])->name('pdf.uso_personal');
Route::get('pdf_interconsulta/interconsulta', [App\Http\Controllers\ficha_atencionController::class, 'pdf_interconsulta'])->name('pdf.interconsulta');

Route::get('getCantComp', [DentalController::class, 'getCantComp'])->name('presentacion.getCantComp');


Route::group([
    'middleware' => ['role:Profesional|admin|Paciente'],
    'prefix' => 'detalle_receta',
], function () {
    /** REGISTROS DE MEDICAMENTOS EN DETALLE RECETA */
    Route::post('/registro_medicamento', [DetalleRecetaController::class, 'registroMedicamento_r'])->name('detalle_receta.registro_medicamento');
    Route::post('/registro_medicamentos', [DetalleRecetaController::class, 'registroMedicamentos_r'])->name('detalle_receta.registro_medicamentos');
    Route::get('/ver_registros', [DetalleRecetaController::class, 'verRegistros'])->name('detalle_receta.ver_medicamentos');
});

/** REGISTROS DE EXAMENES PPF*/
Route::post('examenes/registro_examen', [ExamenesPPFController::class, 'registroExamen_r'])->name('examenes.registro_examen');
Route::post('examenes/registro_examenes', [ExamenesPPFController::class, 'registroExamenes_r'])->name('examenes.registro_examenes');
Route::get('examenes/ver_registros', [ExamenesPPFController::class, 'verRegistros'])->name('examenes.ver_examenes');



/** CERTIFICADO DE REPOSO */
Route::get('certificado_reposo/ver_registros', [CertificadoReposoController::class, 'verRegistros'])->name('certificado_reposo.ver');

/** INFORME MEDICO */
Route::get('informe_medico/ver_registros', [InformeMedicoController::class, 'verRegistros'])->name('informe_medico.ver');

/** USO PERSONAL */
Route::get('uso_personal/ver_registros', [UsoPersonalController::class, 'verRegistros'])->name('uso_personal.ver');

/** HORAS MEDICAS */
Route::get('hora_medica/ver_registros', [HoraMedicaController::class, 'verHorasMedicas'])->name('hora_medica.ver');

/** ARCHIVOS DE CONSULTA */
Route::get('ficha_atencion/ver_archivos', [App\Http\Controllers\ficha_atencionController::class, 'getArchivosFicha'])->name('ficha_atencion.ver_archivos');

/** ALERGIAS */
Route::get('alergias/ver', [App\Http\Controllers\AlergiasController::class, 'getAlergias'])->name('alergias.ver');
Route::get('alergias/ver_autocomplete', [App\Http\Controllers\AlergiasController::class, 'getAlergiasAutocomplete'])->name('alergias.ver_autocomplete');


/** SERVICIO */
Route::group([
    'middleware' => ['role:Admin|Servicio'],
    'prefix' => 'Servicio',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioServicio::class, 'index'])->name('servicio.home');

});

/** INSTITUCION */
Route::group([
    'middleware' => ['role:Admin|Institucion'],
    'prefix' => 'Institucion',
], function () {
    Route::get('Inicio', [App\Http\Controllers\EscritorioInstitucion::class, 'index'])->name('institucion.home');

});

/**CAMBIO DE CONTRASEÑA PERFIL */
Route::get('perfil.cambio_contrasena', [App\Http\Controllers\UtilsController::class, 'cambioContrasenaPerfil'])->name('perfil.cambio_contrasena');


/** FLUJO DE CAJA */
Route::group([
    'middleware' => ['role:Admin|Profesional|Asistente|AsistenteCaja|AsistenteJefaCaja|Institucion|Servicio'],
    'prefix' => 'flujo_caja',
], function () {
    // Route::get('ver', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('flujo_caja.flujo_caja'); /** se llama en cada perfil */
    Route::get('data', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCaja'])->name('flujo_caja.data_flujo_caja');
    Route::get('data_programa', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaPrograma'])->name('flujo_caja.data_flujo_caja_programa');
    Route::get('data_rendidos', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaRendidos'])->name('flujo_caja.data_flujo_caja_rendidos');
    Route::get('data_rendidos_programas', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaRendidosProgramas'])->name('flujo_caja.data_flujo_caja_rendidos_programa');

});

/** BUSCADOR DE PROFESIONAL */
Route::group([
    'middleware' => ['role:Paciente|Asistente|Adm_Institucion|Profesional|Institucion'],
    'prefix' => 'buscador',
], function () {

    Route::get('buscar_profesional', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesional'])->name('profesional.buscar');
    Route::get('buscar_profesional_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesionalBuscador'])->name('profesional.buscador');
    Route::get('informacion_profesional', [App\Http\Controllers\EscritorioGeneral::class, 'informacionProfesional'])->name('profesional.informacionProfesional');

    Route::get('lugares_atencion_profesional_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'lugaresAtencionProfesionalBuscador'])->name('profesional.lugaresAtencionProfesionalBuscador');
    Route::get('dias_laborales_profesiona_lugar_atencion_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'diasLaboralesProfesionaLugarAtencionBuscador'])->name('profesional.DiasLaboralesProfesionaLugarAtencionBuscador');
    Route::get('horas_disponibles_profesional_lugar_atencion_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'horasDisponiblesProfesionalLugarAtencionBuscador'])->name('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador');
});

/** VER LIQUIDACIONES - DATOS DE DEPOSITO */
Route::group([
    'middleware' => ['role:Profesional|Contador|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|admin|Adm_Institucion|Institucion'],
    'prefix' => 'liquidacion_recibo',
], function () {
    Route::get('/profesional/ver_registro', [App\Http\Controllers\LiquidacionReciboController::class, 'ver_registro_r'])->name('profesional.liquidacion_ver');
    Route::get('/profesional/ver_registros', [App\Http\Controllers\LiquidacionReciboController::class, 'ver_registros_r'])->name('profesional.liquidacion_ver_profesional');
});

/** LIQUIDACIONES - DATOS DE DEPOSITO */
Route::group([
    'middleware' => ['role:Profesional|Contador|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|admin|Adm_Institucion'],
    'prefix' => 'bodega',
], function () {
    Route::post('/liquidacion/agregar', [App\Http\Controllers\LiquidacionReciboController::class, 'agregarLiquidacion'])->name('liquidacion.agregar');
    Route::post('/liquidacion/modificar', [App\Http\Controllers\LiquidacionReciboController::class, 'modificarLiquidacion'])->name('liquidacion.modificar');
});

/** PRODUCTO BODEGA */
Route::group([
    'middleware' => ['role:Asistente|AsistenteAdm|admin|Contador|Bodega|Adm_Institucion'],
    'prefix' => 'bodega',
], function () {
    Route::post('/autocomplete/producto/categoria/ver_registros', [App\Http\Controllers\ProductoBodegaController::class, 'getProductoBodegaCategoriaAutocomplete'])->name('bodega.autocomplete.productoVerCategoria');
});


/** web */
Route::get('/profesional/especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_especialidad'])->name('web.profesional.buscar_especialidad');
Route::get('/profesional/tipo_especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_tipo_especialidad'])->name('web.profesional.buscar_tipo_especialidad');
Route::get('/profesional/sub_tipo_especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_sub_tipo_especialidad'])->name('web.profesional.buscar_sub_tipo_especialidad');
Route::get('/profesional/buscador', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesionalBuscador'])->name('web.profesionales.buscador');


/** envio de correo prueba */
Route::get('/correo/envio', [App\Http\Controllers\SendMailController::class, 'envioCorreoR'])->name('correo.envio');
Route::get('/correo/envio_test', [App\Http\Controllers\SendMailController::class, 'envioCorreoTest'])->name('correo.envio.test');


// require_once __DIR__ . './jetstream.php';
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




/** AUTORIZACION PARA ENLACE DE APP */
Route::get('/registro/equipo', [App\Http\Controllers\UsersDevicesController::class, 'enlazarEquipo']);

/** confirmacion de hora medica */
Route::get('/hora/atencion/solicitud/confirmacion', [App\Http\Controllers\ConfirmacionHoraController::class, 'EnviarPrimeraSolicitudConfirmarHora']);
Route::get('/hora/atencion/solicitud/confirmacion/segundo', [App\Http\Controllers\ConfirmacionHoraController::class, 'EnviarSegundaSolicitudConfirmarHora']);
Route::get('/hora/atencion/confirmacion', [App\Http\Controllers\ConfirmacionHoraController::class, 'Confirmacion'])->name('solicitud.comfirmacion.hora.confirmacion');
Route::get('/hora/atencion/cancelacion', [App\Http\Controllers\ConfirmacionHoraController::class, 'Cancelacion'])->name('solicitud.comfirmacion.hora.cancelacion');


Route::get('/img/mover', [App\Http\Controllers\CargaImagenController::class, 'moverImagen_r'])->name('img.mover');


Route::get('/certificacdo/test', [App\Http\Controllers\CertificadoController::class, 'testCertificacion']);

/** simple qrcode  */
Route::get('/qr', [App\Http\Controllers\GeneradorQrController::class, 'generar']);


Route::get('/validacion/documento', [App\Http\Controllers\CertificadoController::class, 'validarDocumento'])->name('validacion_documento_');
Route::get('/validacion/profesional', [App\Http\Controllers\CertificadoController::class, 'validarProfesional'])->name('validacion_profesional_');


Route::get('/pdf/examen', [App\Http\Controllers\ExamenEspecialidadController::class, 'generarPDF_r'])->name('pdf.examen_especialidad');
Route::get('/pdf/previsualizacion', [App\Http\Controllers\ExamenEspecialidadController::class, 'visualizarGenerarPDF_r'])->name('pdf.visualizar.examen');

/** consentimiento */
Route::get('/consentimiento/ver_lista', [App\Http\Controllers\ConsentimientosController::class, 'ver_consentimiento_autocomplete'])->name('consentimiento.ver_autocomplete');
Route::get('/consentimiento/cargar', [App\Http\Controllers\ConsentimientosController::class, 'cargar_consentimiento'])->name('consentimiento.cargar_consentimiento');
Route::post('/consentimiento/registrar/autorizacion', [App\Http\Controllers\ConsentimientosController::class, 'registrar'])->name('consentimiento.registrar.autorizacion');
Route::post('/consentimiento/revocacion/autorizacion', [App\Http\Controllers\ConsentimientosController::class, 'solicitar_autorizacion_revocacion'])->name('consentimiento.revocacion.autorizacion');
Route::post('/consentimiento/estado/autorizacion', [App\Http\Controllers\ConsentimientosController::class, 'estado_autorizacion'])->name('consentimiento.estado.autorizacion');
Route::post('/consentimiento/estado/revocacion', [App\Http\Controllers\ConsentimientosController::class, 'estado_revocacion'])->name('consentimiento.estado.revocacion');
Route::get('/consentimiento/paciente/ver', [App\Http\Controllers\ConsentimientosController::class, 'consentimiento_paciente'])->name('consentimiento.paciente.ver');
Route::get('/consentimiento/pdf', [App\Http\Controllers\ConsentimientosController::class, 'pdf_consentimineto'])->name('consentimiento.pdf');
Route::get('/revocacion/pdf', [App\Http\Controllers\ConsentimientosController::class, 'pdf_revocacion'])->name('consentimiento.revocacion.pdf');


/** consentimiento Solicitud de alta medica */
Route::post('/consentimiento/solicitud/alta_medica/registro/autorizacion', [App\Http\Controllers\ConsentimientoSolicitudAltaMedicaController::class, 'registro_aprobacion'])->name('consentimiento.solicitud.alta.registrar.autorizacion');
Route::post('/consentimiento/solicitud/alta_medica/registro', [App\Http\Controllers\ConsentimientoSolicitudAltaMedicaController::class, 'registro'])->name('consentimiento.solicitud.alta.registrar');
Route::post('/consentimiento/solicitud/alta_medica/estado/autorizacion', [App\Http\Controllers\ConsentimientoSolicitudAltaMedicaController::class, 'estado_autorizacion'])->name('consentimiento.solicitud.alta.estado.autorizacion');
Route::get('/consentimiento/solicitud/alta_medica/pdf', [App\Http\Controllers\ConsentimientoSolicitudAltaMedicaController::class, 'pdf_consentimineto'])->name('consentimiento.solicitud.alta.pdf');

/** consentimiento Rechazo de Tratamiento */
Route::post('/consentimiento/rechazo/tratamiento/registro/autorizacion', [App\Http\Controllers\ConsentimientoRechazoTratamientoController::class, 'registro_aprobacion'])->name('consentimiento.rechazo.tratamiento.registrar.autorizacion');
Route::post('/consentimiento/rechazo/tratamiento/registro', [App\Http\Controllers\ConsentimientoRechazoTratamientoController::class, 'registro'])->name('consentimiento.rechazo.tratamiento.registrar');
Route::post('/consentimiento/rechazo/tratamiento/estado/autorizacion', [App\Http\Controllers\ConsentimientoRechazoTratamientoController::class, 'estado_autorizacion'])->name('consentimiento.rechazo.tratamiento.estado.autorizacion');
Route::get('/consentimiento/rechazo/tratamiento/pdf', [App\Http\Controllers\ConsentimientoRechazoTratamientoController::class, 'pdf_consentimineto'])->name('consentimiento.rechazo.tratamiento.pdf');


/** INDICACIONES MEDICAS */
Route::post('/indicacion/medica/registrar/enviar',[App\Http\Controllers\DocumentoFcPacienteController::class, 'registrar_enviar'])->name('indicacion.medica.registro.envio');
Route::get('/indicacion/medica/enviar',[App\Http\Controllers\DocumentoFcPacienteController::class, 'enviarDocumento_r'])->name('indicacion.medica.envio');


Route::get('/codigo/fonasa/buscar/por/codigo',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorCodigo'])->name('fonasa.buscar.por.codigo');
Route::get('/codigo/fonasa/buscar/por/nombre',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorNombre'])->name('fonasa.buscar.por.nombre');
Route::get('/codigo/fonasa/buscar/por/nombre/Autocomplete',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorNombreAutocomplete'])->name('fonasa.buscar.por.nombre.autocomplete');




/** PARA VISUALIZAR DEMOS */
// Route::get('/autorizacion/enlace', function () {
//     return view('app/autorizacion/enlace_equipo_app');
// });
