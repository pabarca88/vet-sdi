<?php



use App\Http\Controllers\CertificadoReposoController;

use App\Http\Controllers\DentalController;

use App\Http\Controllers\CirugiaController;

use App\Http\Controllers\ContactoEmergenciaController;

use App\Http\Controllers\DetalleRecetaController;

use App\Http\Controllers\EscritorioPaciente;

use App\Http\Controllers\EscritorioProfesional;

use App\Http\Controllers\ExamenesPPFController;

use App\Http\Controllers\ficha_atencionController;

use App\Http\Controllers\HoraMedicaController;

use App\Http\Controllers\InformeMedicoController;

use App\Http\Controllers\Mascotascontroller;

use App\Http\Controllers\PacienteController;

use App\Http\Controllers\UsoPersonalController;

use App\Http\Controllers\UbicacionController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;



Route::get('/Acceso_Profesional_NI/{token}', [App\Http\Controllers\EscritorioProfesional::class, 'acceso_pni'])->name('anonymous.acceso_pni');

Route::get('/Check_sdi_external',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdi'])->name('anonymous.check_sdi'); // PARAMS OBLIGATORIOS urla=Inicio&urln=Mi_Ficha_Medica

Route::get('/Check_sdi_token_external',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdiToken'])->name('anonymous.check_sdi_token');

Route::post('/estado_acceso_profesional_no_inscrito', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_profesional_provisorio'])->name('anonymous.agregar_profesional_provisorio');

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

Route::post('recuperar_contrasena', [App\Http\Controllers\HomeController::class, 'recuperarcontrasena'])->name('home.recuperar_contrasena');







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

    'middleware' => ['role:Admin|Administrador-SDI'],

    'prefix' => 'Administracion',

], function () {

    Route::get('Home', [App\Http\Controllers\AdminController::class, 'index'])->name('administracion.home');

	Route::get('Configuracion', [App\Http\Controllers\AdminController::class, 'config_sdi'])->name('administracion.configuracion');

	Route::get('Profesionales', [App\Http\Controllers\AdminController::class, 'Profesionales_sdi'])->name('administracion.profesionales');

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

    Route::post('eliminar_odontograma', [DentalController::class, 'eliminar_odontograma'])->name('dental.eliminar_odontograma');



    //Cirugia Dental

    Route::get('cirugia_dental', [DentalController::class, 'index_cirugia_dental'])->name('dental.index_cirugia_dental');

    Route::post('registrar_solicitud_pabellon_quirurgico', [DentalController::class, 'registrar_solicitud_pabellon_quirurgico'])->name('dental.registrar_solicitud_pabellon_quirurgico');

    Route::post('registrar_ingreso_paciente_cirugia', [DentalController::class, 'registrar_ingreso_paciente_cirugia'])->name('dental.registrar_ingreso_paciente_cirugia');

    Route::post('registrar_protocolo_operatorio', [DentalController::class, 'registrar_protocolo_operatorio'])->name('dental.registrar_protocolo_operatorio');

    Route::post('registrar_epicrisis_carnet_cirugia', [DentalController::class, 'registrar_epicrisis_carnet_cirugia'])->name('dental.registrar_epicrisis_carnet_cirugia');

    Route::post('registrar_evolucion_recuperacion_cirugia', [DentalController::class, 'registrar_evolucion_recuperacion_cirugia'])->name('dental.registrar_evolucion_recuperacion_cirugia');



    Route::get('/autocomplete', [DentalController::class, 'autocomplete'])->name('dental.autocompletar_medicamento');

    Route::post('/getArticulo', [DentalController::class, 'getArticulo'])->name('dental.getArticulo');

    Route::post('/getDiagnosticoDental', [DentalController::class, 'getDiagnosticoDental'])->name('dental.getDiagnosticoDental');

    Route::post('/getDiagnosticoDentalUrg', [DentalController::class, 'getDiagnosticoDentalUrg'])->name('dental.getDiagnosticoDentalUrg');

    Route::post('/guardarCambiosTratamientoUrgencia', [DentalController::class, 'guardarCambiosTratamientoUrgencia'])->name('dental.guardarCambiosTratamientoUrgencia');

    Route::post('/getTratamientoImpl',[DentalController::class, 'getTratamientoImplantologia'])->name('dental.getTratamientoImplantologia');

    Route::post('/getTratamientoRehabImpl',[DentalController::class, 'getTratamientoRehabImplantologia'])->name('dental.getTratamientoRehabImplantologia');

    Route::post('/getPrestacionesLaboratorio', [DentalController::class, 'getPrestacionesLaboratorio'])->name('dental.getPrestacionesLaboratorio');



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



    Route::post('/getDSM5',[EscritorioProfesional::class,('getDsm5')])->name('profesional.getDSM-5');



    Route::post('/registrar_gastos', [DentalController::class, 'registrar_gastos'])->name('dental.registrar_gastos');





    Route::post('/registrar_antecedente_fractura_ficha_dental', [DentalController::class, 'registrar_antecedente_fractura_ficha_dental'])->name('dental.registrar_antecedente_fractura_ficha_dental');



    Route::post('/registrar_antecedente_anestesia_ficha_dental', [DentalController::class, 'registrar_antecedente_anestesia_ficha_dental'])->name('dental.registrar_antecedente_anestesia_ficha_dental');

    Route::post('/registrar_antecedente_hemorragia_ficha_dental', [DentalController::class, 'registrar_antecedente_hemorragia_ficha_dental'])->name('dental.registrar_antecedente_hemorragia_ficha_dental');





    Route::get('Inicio', [DentalController::class, 'index'])->name('dental.index');

    Route::post('/registrar_ficha_atencion_dental', [DentalController::class, 'registrar_ficha_atencion_dental'])->name('dental.registrar_ficha_atencion_dental');

    Route::post('/registrar_ficha_atencion_dental_odontopediatria', [DentalController::class, 'registrar_ficha_atencion_dental_odontopediatria'])->name('dental.registrar_ficha_atencion_dental_odontopediatria');



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

    Route::post('/Generar_pdf_trabajo_mayor', [DentalController::class, 'generar_pdf_trabajo_mayor'])->name('dental.generar_pdf_trabajo_mayor');

    Route::post('/Generar_pdf_trabajo_menor_hist', [DentalController::class, 'generar_pdf_trabajo_menor_hist'])->name('dental.generar_pdf_trabajo_menor_hist');

    Route::post('/Eliminar_orden_trabajo_menor', [DentalController::class, 'eliminar_orden_trabajo_menor'])->name('dental.eliminar_trabajo_menor');

    Route::post('/Eliminar_orden_trabajo_mayor', [DentalController::class, 'eliminar_orden_trabajo_mayor'])->name('dental.eliminar_trabajo_mayor');

    Route::post('/Generar_pdf_trabajo_menor',[DentalController::class, 'generar_pdf_trabajo_menor'])->name('dental.generar_pdf_trabajo_menor');

    Route::post('/Generar_pdf_insumos_dental_sidebar', [DentalController::class, 'generar_pdf_insumos_dental_sidebar'])->name('dental.generar_pdf_insumos_dental_sidebar');

    Route::post('/Registrar_insumos_pedido',[DentalController::class, 'registrar_insumos_pedido'])->name('dental.agregar_insumo_pedido');



    Route::get('/periodontograma/ver', function () {

        return view('atencion_odontologica.modals.periodontograma.index');

    }) ->name('periodontograma.ver');



});



// Productos paciente

Route::group([

    'middleware' => ['role:Paciente|Admin|Profesional|Asistente'],

    'prefix' => 'Laboratorio/Productos',

], function () {

    Route::get('listar', [App\Http\Controllers\ProductoPacienteController::class, 'listar'])->name('laboratorio.paciente.producto.listar');

    Route::post('guardar', [App\Http\Controllers\ProductoPacienteController::class, 'guardar'])->name('laboratorio.paciente.producto.guardar');

    Route::get('dameProducto/{id}', [App\Http\Controllers\ProductoPacienteController::class, 'dameProducto'])->name('laboratorio.paciente.producto.dameProducto');

    Route::post('evaluar', [App\Http\Controllers\ProductoPacienteController::class, 'evaluar'])->name('laboratorio.paciente.producto.evaluar');

    Route::post('devolver', [App\Http\Controllers\ProductoPacienteController::class, 'devolver'])->name('laboratorio.paciente.producto.devolver');

    Route::post('/audifono/externo/guardar', [App\Http\Controllers\AudifonoExternoController::class, 'guardar'])->name('laboratorio.audifono.externo.guardar');

    Route::get('/audifono/externo/listar', [App\Http\Controllers\AudifonoExternoController::class, 'listar'])->name('laboratorio.audifono.externo.listar');

    Route::get('/audifono/externo/detalle/{id}', [App\Http\Controllers\AudifonoExternoController::class, 'detalle'])->name('laboratorio.audifono.externo.detalle');

});



Route::group([

    'middleware' => ['role:Admin|Profesional|Asistente'],

    'prefix' => 'Laboratorio/Cotizaciones',

], function () {

    // Búsqueda de productos

    Route::get('/productos/buscar', [App\Http\Controllers\CotizacionController::class, 'buscarProductos'])->name('laboratorio.cotizaciones.buscar_productos');

    

    // Gestión de cotizaciones

    Route::post('/guardar-borrador', [App\Http\Controllers\CotizacionController::class, 'guardarBorrador'])->name('laboratorio.cotizaciones.guardar_borrador');

    Route::post('/vista-previa', [App\Http\Controllers\CotizacionController::class, 'vistaPrevia'])->name('laboratorio.cotizaciones.vista_previa');

    Route::post('/generar', [App\Http\Controllers\CotizacionController::class, 'generar'])->name('laboratorio.cotizaciones.generar');

    Route::post('/enviar-email', [App\Http\Controllers\CotizacionController::class, 'enviarEmail'])->name('laboratorio.cotizaciones.enviar_email');

    Route::post('/enviar-existente/{id}', [App\Http\Controllers\CotizacionController::class, 'enviarCotizacionExistente'])->name('laboratorio.cotizaciones.enviar-existente');

    // Historial

    Route::get('/historial/{paciente_id}', [App\Http\Controllers\CotizacionController::class, 'historial'])->name('laboratorio.cotizaciones.historial');

    Route::get('/{id}/detalle', [App\Http\Controllers\CotizacionController::class, 'detalle'])->name('laboratorio.cotizaciones.detalle');

    Route::get('/{id}/pdf', [App\Http\Controllers\CotizacionController::class, 'descargarPDF'])->name('laboratorio.cotizaciones.descargar_pdf');



    // Cambios de estado

    Route::put('/{id}/anular', [App\Http\Controllers\CotizacionController::class, 'anular'])->name('laboratorio.cotizaciones.anular');

    Route::put('/{id}/aceptar', [App\Http\Controllers\CotizacionController::class, 'aceptar'])->name('laboratorio.cotizaciones.aceptar');

    Route::put('/{id}/rechazar', [App\Http\Controllers\CotizacionController::class, 'rechazar'])->name('laboratorio.cotizaciones.rechazar');



    // Seguimiento de cotizaciones

    Route::get('/seguimiento/{paciente_id}', [App\Http\Controllers\CotizacionController::class, 'seguimiento'])->name('laboratorio.cotizaciones.seguimiento');

    Route::post('/enviar-seguimiento', [App\Http\Controllers\CotizacionController::class, 'enviarSeguimiento'])->name('laboratorio.profesional.enviar_seguimiento_cotizacion');

    

});





// Rutas para Productos

Route::prefix('productos')->middleware(['auth:sanctum'])->group(function () {

    Route::get('/buscar-cotizacion', 'ProductoController@buscarParaCotizacion');

});





//Paciente

Route::group([

    'middleware' => ['role:Admin|Paciente|Asistente|Profesional|AsistenteLaboratorio'],

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
    Route::get('Convenios', [App\Http\Controllers\EscritorioPaciente::class, 'convenios'])->name('paciente.convenios');
    Route::post('Convenios', [App\Http\Controllers\EscritorioPaciente::class, 'guardarConvenio'])->name('paciente.convenios.guardar');

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

	Route::get('Receta_Online/Mis_Documentos', [App\Http\Controllers\EscritorioPaciente::class, 'receta_misdocumentos'])->name('paciente.receta.documentos');

    Route::get('Receta_Online/Mis_Certificados', [App\Http\Controllers\EscritorioPaciente::class, 'receta_miscertificados'])->name('paciente.receta.certificado');

    Route::get('Receta_Online/Mis_Licencias', [App\Http\Controllers\EscritorioPaciente::class, 'receta_mislicencias'])->name('paciente.receta.licencia');

    Route::get('Receta_Online/licencia/pdf', [App\Http\Controllers\LicenciaAprobacionController::class, 'pdfLicenciaPaciente'])->name('paciente.licencia.pdf');



    /* 3.- Perfil */

    Route::post('Perfil/editinfo', [App\Http\Controllers\EscritorioPaciente::class, 'editInfor'])->name('paciente.perfil.editinfo');

    Route::post('Perfil/editcontacto', [App\Http\Controllers\EscritorioPaciente::class, 'editcontacto'])->name('paciente.perfil.editcontacto');

    Route::post('Perfil/editdirec', [App\Http\Controllers\EscritorioPaciente::class, 'editdirec'])->name('paciente.perfil.editdirec');

    Route::get('Perfil/crearContacto', [App\Http\Controllers\EscritorioPaciente::class, 'crearcontacto'])->name('paciente.perfil.crearcontacto');

    Route::post('Perfil/autorizacion/editar', [App\Http\Controllers\EscritorioPaciente::class, 'editarAutorizacion'])->name('paciente.perfil.registro_autorizacion');



    /** FOTO DE PERFIL */

    Route::post('/paciente/actualizar-foto', [EscritorioPaciente::class, 'actualizarFoto'])->name('paciente.actualizar.foto');

    Route::post('/paciente/eliminar-foto', [EscritorioPaciente::class, 'eliminarFoto'])->name('paciente.eliminar.foto');



    Route::get('get/informacion/{id_dependiente_activo?}', [App\Http\Controllers\EscritorioPaciente::class, 'getPacienteUser'])->name('paciente.get.informacion');

    Route::post('Reservar_Hora/generar_reserva', [App\Http\Controllers\EscritorioPaciente::class, 'agendar_horas'])->name('paciente.solicitar.hora');





    /** DEPENDENCIA */

   Route::get('/mapa', function () { return view('mapa');});


    Route::post('/guardar-ubicacion', [App\Http\Controllers\UbicacionController::class, 'store'])->name('guardar.ubicacion');
    

    Route::get('dependientes/cargar/lista', [App\Http\Controllers\PacientesDependientesController::class, 'ver_registro_paciente'])->name('paciente.dependientes.ver_registros');

    /** MASCOTAS */
    Route::get('mascotas', [App\Http\Controllers\MascotasController::class, 'index'])->name('paciente.mascotas.index');
    Route::post('mascotas', [App\Http\Controllers\MascotasController::class, 'store'])->name('paciente.mascotas.store');
    Route::get('mascotas/lista', [App\Http\Controllers\MascotasController::class, 'listar'])->name('paciente.mascotas.lista');
    Route::put('mascotas/{mascota}', [App\Http\Controllers\MascotasController::class, 'update'])->whereNumber('mascota')->name('paciente.mascotas.update');
    Route::delete('mascotas/{mascota}', [App\Http\Controllers\MascotasController::class, 'destroy'])->whereNumber('mascota')->name('paciente.mascotas.destroy');
    Route::get('/inscripcion_alimentos',[App\Http\Controllers\MascotasController::class, 'inscripcion_alimentos'])->name('paciente.mascotas.inscripcion_alimentos');
    Route::get('/inscripcion_medicamentos',[App\Http\Controllers\MascotasController::class, 'inscripcion_medicamentos'])->name('paciente.mascotas.inscripcion_medicamentos');
    Route::get('/promociones_especiales',[App\Http\Controllers\MascotasController::class, 'promociones_especiales'])->name('paciente.mascotas.promociones_especiales');
    Route::get('/promociones_generales',[App\Http\Controllers\MascotasController::class, 'promociones_generales'])->name('paciente.mascotas.promociones_generales');

    Route::get('/vacunas',[App\Http\Controllers\MascotasController::class, 'registro_vacunas'])->name('registro_vacunas');
    Route::get('/desparasitaciones',[App\Http\Controllers\MascotasController::class, 'registro_desparasitacion'])->name('registro_desparasitacion');




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



    Route::get('buscar_persona_rut', [App\Http\Controllers\EscritorioDependientesController::class, 'buscar_persona_rut'])->name('paciente.buscar_persona_rut');



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



    /** controles de glicemia */

    Route::post('control/glicemia/registro',[App\Http\Controllers\EscritorioPaciente::class, 'registroControlGlicemia'])->name('paciente.registro_c_glicemia');

    Route::get('control/glicemia/ver',[App\Http\Controllers\EscritorioPaciente::class, 'verRegistrosControlGlicemia'])->name('paciente.ver_registros_c_glicemia');

    Route::post('control/glicemia/eliminar',[App\Http\Controllers\EscritorioPaciente::class, 'eliminarRegistroControlGlicemia'])->name('paciente.eliminar_registro_c_glicemia');



    /** controles de peso */

    Route::post('control/peso/registro',[App\Http\Controllers\EscritorioPaciente::class, 'registroControlPeso'])->name('paciente.registro_c_peso');

    Route::get('control/peso/ver',[App\Http\Controllers\EscritorioPaciente::class, 'verRegistrosControlPeso'])->name('paciente.ver_registros_c_peso');

    Route::post('control/peso/eliminar',[App\Http\Controllers\EscritorioPaciente::class, 'eliminarRegistroControlPeso'])->name('paciente.eliminar_registro_c_peso');

    /** controles de oxigeno */

    Route::post('control/oxigeno/registro',[App\Http\Controllers\EscritorioPaciente::class, 'registroControlOxigeno'])->name('paciente.registro_c_oxigeno');

    Route::get('control/oxigeno/ver',[App\Http\Controllers\EscritorioPaciente::class, 'verRegistrosControlOxigeno'])->name('paciente.ver_registros_c_oxigeno');

    Route::post('control/oxigeno/eliminar',[App\Http\Controllers\EscritorioPaciente::class, 'eliminarRegistroControlOxigeno'])->name('paciente.eliminar_registro_c_oxigeno');

     /** controles de orina */

     Route::post('control/orina/registro',[App\Http\Controllers\EscritorioPaciente::class, 'registroControlOrina'])->name('paciente.registro_c_orina');

     Route::get('control/orina/ver',[App\Http\Controllers\EscritorioPaciente::class, 'verRegistrosControlOrina'])->name('paciente.ver_registros_c_orina');

     Route::post('control/orina/eliminar',[App\Http\Controllers\EscritorioPaciente::class, 'eliminarRegistroControlOrina'])->name('paciente.eliminar_registro_c_orina');

    /** controles de presion */

    Route::post('control/presion/registro',[App\Http\Controllers\EscritorioPaciente::class, 'registroControlPresion'])->name('paciente.registro_c_presion');

    Route::get('control/presion/ver',[App\Http\Controllers\EscritorioPaciente::class, 'verRegistrosControlPresion'])->name('paciente.ver_registros_c_presion');

    Route::post('control/presion/eliminar',[App\Http\Controllers\EscritorioPaciente::class, 'eliminarRegistroControlPresion'])->name('paciente.eliminar_registro_c_presion');



	/** liberar bienvenida  */

    Route::get('contrasena/bienvenida/liberar', [App\Http\Controllers\EscritorioPaciente::class, 'CambiocontrasenaLiberacionBienvenida'])->name('paciente.perfil.contrasena.liberar.bienvenida');

    Route::get('bienvenida/liberar', [App\Http\Controllers\EscritorioPaciente::class, 'liberarBienvenida'])->name('paciente.perfil.liberar.bienvenida');



    /** ACOMPAÑANATE DE DEPENDIENTE */

    Route::post('acompanante/asignacion', [App\Http\Controllers\AcompananteController::class, 'registrarAcompananteAsignacionPaciente'])->name('paciente.acompanante.asignacion');

    Route::get('acompanante/ver/asignacion', [App\Http\Controllers\AcompananteController::class, 'verRegistros'])->name('paciente.acompanante.ver');



    /** CONFIRMACION HORA MEDICA */

    Route::post('hora/medica/confirmar', [App\Http\Controllers\EscritorioProfesional::class, 'confirmar_hora'])->name('hora.medica.confirmar');

    Route::post('hora/medica/cancelar', [App\Http\Controllers\EscritorioProfesional::class, 'cancelar_hora'])->name('hora.medica.cancelar');



    /** VER HORAS MEDICAS */

    Route::get('hora/medica/ver', [App\Http\Controllers\EscritorioPaciente::class, 'cargarHorasMedicas'])->name('paciente.hora.medica.ver');



	/** buscar profesional por rut */

    Route::get('buscar/profesional/rut', [App\Http\Controllers\EscritorioPaciente::class, 'buscar_informacion_profesional'])->name('paciente.buscar.prof.rut');



	// carga imagen

    Route::post('/archivo/carga', [App\Http\Controllers\CargaImagenController::class, 'cargaArchivoTemp'])->name('paciente.archivo.carga');



    // eliminar imagen

    Route::post('/archivo/eliminar', [App\Http\Controllers\CargaImagenController::class, 'eliminarArchivoTemp'])->name('paciente.archivo.eliminar');



    /** registro de examen por paciente */

    Route::post('/examen/registro', [App\Http\Controllers\EscritorioPaciente::class, 'cargaExamenPorPaciente'])->name('paciente.examen.registro');



	Route::post('/consulta/confidencial/cargar', [App\Http\Controllers\EscritorioPaciente::class, 'cargaConsultaConfidencial'])->name('paciente.consultas.confidenciales');



    // Registrar nuevo paciente desde laboratorio

    Route::post('laboratorio/nuevo/paciente', [App\Http\Controllers\EscritorioPaciente::class, 'registrar_nuevo_paciente_laboratorio'])->name('paciente.laboratorio.registrar');



});



/** INICIO DE LICENCIA */

Route::get('/aprobar/licencia/aceptar', [App\Http\Controllers\LicenciaAprobacionController::class, 'licenciaEvaluacion'])->name('paciente.licencia.evalueacion.aceptar');

Route::get('/aprobar/licencia/rechazar', [App\Http\Controllers\LicenciaAprobacionController::class, 'licenciaEvaluacion'])->name('paciente.licencia.evalueacion.rechazar');



Route::group(

    [

        // 'middleware' => ['role:Profesional|Admin|Paciente'],

        'middleware' => ['auth:sanctum', 'verified'],

        // 'prefix' => 'Contacto',

    ],

    function () {

        Route::post('Perfil/Agregar_contacto', [ContactoEmergenciaController::class, 'registrar_contacto_emergencia'])->name('contacto_emergencia.registrar_contacto_emergencia');

        Route::post('buscar_contacto', [ContactoEmergenciaController::class, 'buscar_contacto'])->name('contacto_emergencia.buscar_contacto');

        Route::get('Eliminar_contacto_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_contacto_paciente'])->name('contacto_emergencia.eliminar_contacto_paciente');

        Route::get('Editar_contacto_emergencia', [App\Http\Controllers\EscritorioProfesional::class, 'editar_contacto_emergencia'])->name('contacto_emergencia.editar_contacto');

        Route::get('Cargar_datos_contacto', [App\Http\Controllers\EscritorioProfesional::class, 'cargar_datos_contacto'])->name('cargar_datos_contacto');

        Route::get('Check_sdi_token',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdiToken'])->name('check_sdi_token');

        Route::get('Check_sdi',[App\Http\Controllers\EscritorioPaciente::class, 'checkSdi'])->name('check_sdi'); // PARAMS OBLIGATORIOS urla=Inicio&urln=Mi_Ficha_Medica

        Route::get('Mi_Ficha_Medica', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica'])->name('profesional.mi_ficha');

        Route::get('Mi_Ficha_Medica_Pdf', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedicaPdfView']);

		Route::get('confidencial/solitar/autorizacion', [App\Http\Controllers\FmuAprobacionController::class, 'solicitarAutorizacionConfidencial'])->name('solicitud.aprobacion.fmu.confidencial');

        Route::get('confidencial/validar/autorizacion', [App\Http\Controllers\FmuAprobacionController::class, 'validarAutorizacionConfidencial'])->name('validar.aprobacion.fmu.confidencial');



    }

);



Route::group([

    'middleware' => ['role:Profesional|Admin|Ministerio|Institucion|Asistente|AsistenteCaja|AsistenteManejoAgenda|AsistenteJefaCaja|AsistenteOnline|Adm_Institucion'],

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

    Route::get('Mis_pacientes_ajax', [App\Http\Controllers\EscritorioProfesional::class, 'mis_pacientes_ajax'])->name('profesional.mis_pacientes.ajax');

    Route::get('Recetas', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_receta_ficha'])->name('profesional.buscar_recetas');

    Route::get('Examenes', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_examen_ficha'])->name('profesional.buscar_examenes');

    Route::get('Editar_paciente/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'ver_paciente'])->name('profesional.editar_paciente');

    Route::get('Configuraciones', [App\Http\Controllers\EscritorioProfesional::class, 'config_profesional'])->name('profesional.configuracion');

    Route::get('Mis_lugares_atencion', [App\Http\Controllers\EscritorioProfesional::class, 'mis_lugares'])->name('profesional.lugares_atencion');

    Route::post('agregar_centro', [App\Http\Controllers\EscritorioProfesional::class, 'agregar_lugar_atencion'])->name('profesional.agregar_centro');

    Route::get('mi_agenda', [App\Http\Controllers\EscritorioProfesional::class, 'mi_agenda'])->name('profesional.mi_agenda');

    Route::post('dame_tratamientos_presupuesto',[App\Http\Controllers\EscritorioProfesional::class, 'dame_tratamientos_presupuesto'])->name('profesional.mi_agenda.dame_tratamientos_presupuesto');

    Route::post('atender_tratamiento_presupuesto',[App\Http\Controllers\EscritorioProfesional::class, 'atender_tratamiento_presupuesto']) ->name('profesional.mi_agenda.atender_tratamiento_presupuesto');

    Route::get('mi_agenda/tipo', [App\Http\Controllers\EscritorioAsistente::class, 'buscarInfoProfesional'])->name('profesional.agenda.buscar_info_profesional');

    Route::get('atenciones_previas_paciente/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'atenciones_previas_paciente'])->name('profesional.atenciones_previas_paciente');

    Route::get('mis_asistentes', [App\Http\Controllers\EscritorioProfesional::class, 'mis_asistentes'])->name('profesional.mis_asistentes');

	Route::get('busq_asistentes', [App\Http\Controllers\EscritorioProfesional::class, 'busq_asistentes'])->name('profesional.busq_asistentes');

    Route::get('Diagnosticos_frecuentes', [App\Http\Controllers\EscritorioProfesional::class, 'diagnosticos_frecuentes'])->name('profesional.diagnosticos_frecuentes');

    Route::get('Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'diagnosticos_cie10'])->name('profesional.diagnosticos_cie10');

	Route::get('buscar_Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'buscarDiagnostico_cie10'])->name('profesional.buscar_diagnosticos_cie10');

	Route::post('registrar_Diagnosticos_cie10', [App\Http\Controllers\EscritorioProfesional::class, 'registrarDiagnosticoCie10Profesional'])->name('profesional.registrar_diagnosticos_cie10');





    Route::get('Flujo_caja', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('profesional.flujo_caja');

    Route::post('iniciar_cobro', [App\Http\Controllers\FlujoCajaController::class, 'iniciar_cobro'])->name('flujo_caja.profesional.iniciar_cobro');

    Route::get('Mis_estadisticas', [App\Http\Controllers\EscritorioProfesional::class, 'mis_estadisticas'])->name('profesional.mis_estadisticas');

	Route::get('Administracion', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental'])->name('profesional.ver_adm_dental');

    Route::get('Administracion/Convenios', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_convenios'])->name('profesional.adm_dental.convenios');

    Route::get('Administracion/Equipos', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_equipos'])->name('profesional.adm_dental.equipos');

    Route::get('Administracion/Horario', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_horario'])->name('profesional.adm_dental.horario_clin');

    Route::get('Administracion/Laboratorios', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_laboratorio'])->name('profesional.adm_dental.lab');

    Route::get('Administracion/Personal', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_personal'])->name('profesional.adm_dental.personal');

    Route::get('Administracion/Proveedores', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_proveedores'])->name('profesional.adm_dental.proveedores');

    Route::get('Administracion/Aranceles', [App\Http\Controllers\EscritorioProfesional::class, 'ver_adm_dental_misaranceles'])->name('profesional.adm_dental.misaranceles');



    Route::get('/aranceles', [App\Http\Controllers\EscritorioProfesional::class, 'aranceles'])->name('profesional.aranceles');



    Route::post('Paciente/guardar_pieza_dental_dolor',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_dolor'])->name('profesional.adm_dental.guardar_pieza_dental_dolor');

    Route::post('Paciente/guardar_pieza_dental_tto_impl',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_tto_impl'])->name('profesional.adm_dental.guardar_pieza_dental_tto_impl');

    Route::post('Paciente/guardar_pieza_dental_tto_impl_rehab',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_tto_impl_rehab'])->name('profesional.adm_dental.guardar_pieza_dental_tto_impl_rehab');

    Route::post('Paciente/guardar_pieza_dental_tto_period',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_tto_period'])->name('profesional.adm_dental.guardar_pieza_dental_tto_period');

    Route::post('Paciente/guardar_pieza_dental_tto_gral',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_tto_gral'])->name('profesional.adm_dental.guardar_pieza_dental_tto_gral');

    Route::post('Paciente/guardar_pieza_dental_post_impl',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_post_impl'])->name('profesional.adm_dental.guardar_pieza_dental_post_impl');

    Route::post('Paciente/guardar_grupo_dental_post_impl',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_grupo_dental_post_impl'])->name('profesional.adm_dental.guardar_grupo_dental_post_impl');

    Route::post('Paciente/guardar_pieza_dental_end_dolor',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_end_dolor'])->name('profesional.adm_dental.guardar_pieza_dental_end_dolor');

    Route::post('Paciente/guardar_pieza_dental_odontp_dolor',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_odontp_dolor'])->name('profesional.adm_dental.guardar_pieza_dental_odontp_dolor');

    Route::post('/mostrar_nueva_pieza_dental_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental'])->name('profesional.mostrar_nueva_pieza_dental');

    Route::post('/mostrar_nueva_pieza_dental_paciente_tto', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_tto'])->name('profesional.mostrar_nueva_pieza_dental_tto');

    Route::post('/mostrar_nueva_pieza_dental_paciente_tto_impl', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_tto_impl'])->name('profesional.mostrar_nueva_pieza_dental_tto_impl');

    Route::post('/mostrar_nueva_pieza_dental_paciente_tto_impl_rehab', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_tto_impl_rehab'])->name('profesional.mostrar_nueva_pieza_dental_tto_impl_rehab');

    Route::post('/mostrar_nuevas_imagenes_dental', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nuevas_imagenes_dental'])->name('profesional.mostrar_nuevas_imagenes_dental');

    Route::post('/eliminar_pieza_dental_imagenes_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_imagenes_paciente'])->name('profesional.eliminar_pieza_dental_imagenes_paciente');

    Route::post('/eliminar_pieza_dental_tto_impl',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_tto_impl'])->name('profesional.eliminar_pieza_dental_tto_impl');

    Route::post('/eliminar_pieza_dental_tto_period',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_tto_period'])->name('profesional.eliminar_pieza_dental_tto_period');

    Route::post('/eliminar_pieza_dental_post_impl',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_post_impl'])->name('profesional.eliminar_pieza_dental_post_impl');

    Route::post('/eliminar_grupo_dental_post_impl',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_grupo_dental_post_impl'])->name('profesional.eliminar_grupo_dental_post_impl');

    Route::post('/mostrar_nueva_pieza_dental_end_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_end'])->name('profesional.mostrar_nueva_pieza_dental_end');

    Route::post('/mostrar_nueva_pieza_dental_paciente_rx', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_rx'])->name('profesional.mostrar_nueva_pieza_dental_rx');

    Route::post('/mostrar_nueva_pieza_dental_paciente_rx_end', [App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_rx_end'])->name('profesional.mostrar_nueva_pieza_dental_rx_end');

    Route::post('/eliminar_nueva_pieza_dental_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_nueva_pieza_dental'])->name('profesional.eliminar_nueva_pieza_dental');

    Route::post('/eliminar_pieza_dental_paciente_rx', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_rx'])->name('profesional.eliminar_pieza_dental_rx');

    Route::post('/eliminar_pieza_dental_paciente_rx_end', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_pieza_dental_rx_end'])->name('profesional.eliminar_pieza_dental_rx_end');

    Route::post('/eliminar_nueva_pieza_dental_paciente_end', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_nueva_pieza_dental_end'])->name('profesional.eliminar_nueva_pieza_dental_end');

    Route::post('/eliminar_nueva_pieza_dental_paciente_rx_odontop', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_nueva_pieza_dental_rx_odontop'])->name('profesional.eliminar_nueva_pieza_dental_rx_odontop');

    Route::post('/guardar_pieza_dental_examen_oral_rx',[App\Http\Controllers\EscritorioProfesional::class,'guardar_pieza_dental_examen_oral_rx'])->name('profesional.guardar_pieza_dental_examen_oral_rx');

    Route::post('/recargar_piezas_dental_examen_oral_rx',[App\Http\Controllers\EscritorioProfesional::class,'recargar_piezas_dental_examen_oral_rx'])->name('profesional.recargar_piezas_dental_examen_oral_rx');

    Route::post('/eliminar_imagen_rx_paciente',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_imagen_rx_paciente'])->name('profesional.eliminar_imagen_rx_paciente');

    Route::post('/eliminar_imagen_rx_end_paciente',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_imagen_rx_end_paciente'])->name('profesional.eliminar_imagen_rx_end_paciente');

    Route::post('/mostrar_nueva_pieza_dental_examen',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_examen'])->name('profesional.mostrar_nueva_pieza_dental_examen');

    Route::post('/mostrar_nueva_pieza_dental_examen_odontop',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_examen_odontop'])->name('profesional.mostrar_nueva_pieza_dental_examen_odontop');

    Route::post('/mostrar_nueva_pieza_dental_end_examen',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_end_examen'])->name('profesional.mostrar_nueva_pieza_dental_examen_end');

    Route::post('/mostrar_nueva_pieza_dental_hist',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_hist'])->name('profesional.mostrar_nueva_pieza_dental_hist');

    Route::post('/mostrar_nueva_pieza_dental_period',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_period'])->name('profesional.mostrar_nueva_pieza_dental_period');

    Route::post('/mostrar_nueva_pieza_post_impl',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nueva_pieza_dental_post_impl'])->name('profesional.mostrar_nueva_pieza_dental_post_impl');

    Route::post('/mostrar_nuevo_grupo_post_impl',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nuevo_grupo_post_impl'])->name('profesional.mostrar_nuevo_grupo_post_impl');

    Route::post('/guardar_imagenes_dental_paciente',[App\Http\Controllers\EscritorioProfesional::class,'guardar_imagenes_dental_paciente'])->name('profesional.guardar_imagenes_dental_paciente');

    Route::post('/recargar_imagenes_dental_paciente',[App\Http\Controllers\EscritorioProfesional::class,'recargar_imagenes_dental_paciente'])->name('profesional.recargar_imagenes_dental_paciente');

    Route::post('/recargar_imagenes_dental_general_paciente',[App\Http\Controllers\EscritorioProfesional::class,'recargar_imagenes_dental_general_paciente'])->name('profesional.recargar_imagenes_dental_general_paciente');

    Route::post('/eliminar_imagen_dental_paciente',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_imagen_dental_paciente'])->name('profesional.eliminar_imagen_dental_paciente');

    Route::post('/guardar_pieza_dental_examen_pieza',[App\Http\Controllers\EscritorioProfesional::class,'guardar_pieza_dental_examen_pieza'])->name('profesional.guardar_pieza_examen_pieza');

    Route::post('/guardar_pieza_dental_examen_pieza_hist',[App\Http\Controllers\EscritorioProfesional::class,'guardar_pieza_dental_examen_pieza_hist'])->name('profesional.guardar_pieza_examen_pieza_hist');

    Route::post('/guardar_pieza_dental_examen_pieza_period',[App\Http\Controllers\EscritorioProfesional::class,'guardar_pieza_dental_examen_pieza_period'])->name('profesional.guardar_pieza_examen_pieza_period');

    Route::post('/eliminar_examen_period',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_examen_period'])->name('profesional.eliminar_examen_period');

    Route::post('/guardar_diagnostico_periodoncia',[App\Http\Controllers\EscritorioProfesional::class,'guardar_diagnostico_periodoncia'])->name('profesional.agregar_dg_periodonto_pieza');

    Route::post('/editar_evaluacion_periodonto',[App\Http\Controllers\EscritorioProfesional::class,'editar_evaluacion_periodonto'])->name('profesional.editar_evaluacion_periodonto');

    Route::post('/eliminar_evaluacion_periodonto',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_evaluacion_periodonto'])->name('profesional.eliminar_evaluacion_periodonto');

    Route::get('/obtener_evaluaciones_periodonto',[App\Http\Controllers\EscritorioProfesional::class,'obtener_evaluaciones_periodonto'])->name('profesional.obtener_evaluaciones_periodonto');

    Route::get('/obtener_tto_periodonto',[App\Http\Controllers\EscritorioProfesional::class,'obtener_tto_periodonto'])->name('profesional.obtener_tto_periodonto');

    Route::post('/guardar_pieza_dental_examen_oral_rx_end',[App\Http\Controllers\EscritorioProfesional::class,'guardar_pieza_dental_examen_oral_rx_end'])->name('profesional.guardar_pieza_dental_examen_oral_rx_end');

    Route::post('/eliminar_pieza_dental_examen_pieza',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_pieza_dental_examen_pieza'])->name('profesional.eliminar_pieza_dental_pieza');

    Route::post('/eliminar_pieza_dental_examen_hist',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_pieza_dental_examen_hist'])->name('profesional.eliminar_pieza_dental_hist');

    Route::post('/guardar_examen_boca_general', [App\Http\Controllers\EscritorioProfesional::class, 'guardar_examen_boca_general'])->name('profesional.guardar_examen_boca_general');

    Route::post('/eliminar_diagnostico_dental',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_diagnostico_dental'])->name('profesional.eliminar_diagnostico_dental');

    Route::post('/eliminar_tratamiento_dental',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_tratamiento_dental'])->name('profesional.eliminar_tratamiento_dental');

    Route::post('/actualizar_tratamiento_dental',[App\Http\Controllers\EscritorioProfesional::class, 'actualizar_tratamiento_dental'])->name('profesional.actualizar_tratamiento_dental');

    Route::post('/generar_pdf_presupuesto',[App\Http\Controllers\EscritorioProfesional::class, 'generar_pdf_presupuesto'])->name('profesional.generar_pdf_presupuesto_dental');

    Route::post('/generar_pdf_presupuesto_hist',[App\Http\Controllers\EscritorioProfesional::class, 'generar_pdf_presupuesto_hist'])->name('profesional.generar_pdf_presupuesto_dental_hist');

    Route::post('/registrar_presupuesto_dental',[App\Http\Controllers\EscritorioProfesional::class, 'registrar_presupuesto_dental'])->name('profesional.registrar_presupuesto_dental');



    Route::get('FIcha_medica_unica/{id}', [App\Http\Controllers\EscritorioPaciente::class, 'miFichaMedica'])->name('profesional.ficha_medica_unica');

    Route::get('Ficha_medica_unica_atencion/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'miFichaMedicaAtencion'])->name('profesional.ficha_medica_unica_atencion');

    Route::get('Mi_perfil', [App\Http\Controllers\EscritorioProfesional::class, 'mi_perfil'])->name('profesional.mi_perfil');

    Route::get('Receta_online', [App\Http\Controllers\EscritorioProfesional::class, 'index_receta'])->name('profesional.index_receta_online');

    Route::get('historial_mensajes', [App\Http\Controllers\EscritorioProfesional::class, 'historial_mensajes'])->name('profesional.historial_mensajes');

    Route::get('ver_mensaje/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'ver_mensaje'])->name('profesional.ver_mensaje');

    Route::get('eliminar_mensaje/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'eliminar_mensaje'])->name('profesional.eliminar_mensaje');

    Route::get('descargar_mensaje/{id}', [App\Http\Controllers\EscritorioProfesional::class, 'descargar_mensaje'])->name('profesional.descargar_mensaje');

    Route::post('enviar_mensaje_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'enviar_mensaje_paciente'])->name('enviar_mensaje_paciente');

    Route::post('enviar_mensaje_difusion_pacientes', [App\Http\Controllers\EscritorioProfesional::class, 'enviar_mensaje_difusion_pacientes'])->name('enviar_mensaje_difusion_pacientes');

    Route::get('Mis_recetas', [App\Http\Controllers\EscritorioProfesional::class, 'mis_recetas'])->name('profesional.mis_recetas');

    Route::get('Mis_examenes', [App\Http\Controllers\EscritorioProfesional::class, 'mis_examenes'])->name('profesional.mis_examenes');

    Route::get('Mis_certificados', [App\Http\Controllers\EscritorioProfesional::class, 'mis_certificados'])->name('profesional.mis_certificados');

	Route::get('Mis_documentos', [App\Http\Controllers\EscritorioProfesional::class, 'mis_documentos'])->name('profesional.mis_documentos');

	Route::get('Mis_licencias', [App\Http\Controllers\EscritorioProfesional::class, 'mis_licencias'])->name('profesional.mis_licencias');

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
    Route::post('Paciente/Presupuesto_mascota', [App\Http\Controllers\ficha_atencionController::class, 'guardarPresupuestoMascota'])->name('profesional.presupuesto_mascota.guardar');

    Route::get('Paciente/Ficha_consulta/sdi', [App\Http\Controllers\ficha_atencionController::class, 'index_sdi'])->name('profesional.realizar_consulta_sdi');

    Route::get('Paciente/Ficha_consulta/hospital_amb',[App\Http\Controllers\ficha_atencionController::class, 'index_hospital_amb'])->name('profesional.realizar_consulta_hospital_amb');

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

	 Route::post('/profesional/eliminar_antecedente_academico', [App\Http\Controllers\EscritorioProfesional::class, 'eliminarAntecedenteAcademico'])->name('profesional.eliminar_antecedente_academico');



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

    Route::post('/imagenes/dental/rx',[App\Http\Controllers\CargaImagenController::class, 'guardarImagenesRxDental'])->name('profesional.imagenes.guardar_rx_dental');

    Route::post('/imagenes/dental/End/rx',[App\Http\Controllers\CargaImagenController::class, 'guardarImagenesRxEndDental'])->name('profesional.imagenes.guardar_rx_end_dental');

    Route::post('/imagenes/dental',[App\Http\Controllers\CargaImagenController::class, 'guardarImagenesDental'])->name('profesional.imagenes.guardar_dental');

    Route::post('/archivo/carga', [App\Http\Controllers\CargaImagenController::class, 'cargaArchivoTemp'])->name('profesional.archivo.carga');



    /** FOTO DE PERFIL */

    Route::post('/profesional/actualizar-foto', [EscritorioProfesional::class, 'actualizarFoto'])->name('profesional.actualizar.foto');

    Route::post('/profesional/eliminar-foto', [EscritorioProfesional::class, 'eliminarFoto'])->name('profesional.eliminar.foto');



    /** peditria tunner */

	Route::post('/peditria/tunner/agregar', [App\Http\Controllers\FichaPediatriaController::class, 'agergarTunner'])->name('ped.tunner.agregar');

	Route::get('/peditria/tunner/ver', [App\Http\Controllers\FichaPediatriaController::class, 'verTunner'])->name('ped.tunner.ver');



    /** registro de equipo */

    Route::get('mi/equipo/ver/equipos',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'verEquiposProfesional'])->name('profesional.equipo.ver');

    Route::get('mi/equipo/ver/equipos/profesional',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'verDetalleEquipoProfesional'])->name('profesional.equipo.ver.profesional');

    Route::post('mi/equipo/crear',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'registroMiEquipoProfesionales'])->name('profesional.equipo.crear');

    Route::post('mi/equipo/eliminar',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'eliminarMiEquipoProfesionales'])->name('profesional.equipo.eliminar');

    Route::get('mi/equipo/modificar',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'modificarMiEquipoProfesionales'])->name('profesional.equipo.modificar');

    Route::get('mi/equipo/cambiar_estado',[App\Http\Controllers\ProfesionalMiEquipoController::class, 'modificarEstadoMiEquipoProfesionales'])->name('profesional.equipo.cambiar_estado');

    /** solicitud de pabellon  */

    Route::post('solicitud/pabellon/crear',[App\Http\Controllers\SolicitudPabellonQuirurgicosController::class, 'registroSolicitud'])->name('solicitud.pabellon.registrar');



    /** PDF solicitud pabellon */

    Route::post('solicitud/pabellon/pdf',[App\Http\Controllers\EscritorioProfesional::class, 'pdfSolicitud'])->name('solicitud.pabellon.pdf');



    /** transcripcion */

    Route::get('transcripcion/examen',[App\Http\Controllers\TranscripcionController::class, 'verExamenTranscrito'])->name('profesional.index_transcripcion_examen');

    Route::get('/carga/examen', [App\Http\Controllers\TranscripcionController::class, 'CargarExamenProfesional'])->name('profesional.cargar.examen.transcripcion');

    Route::post('/registro/examen', [App\Http\Controllers\TranscripcionController::class, 'RegistrarTranscripcionProfesional'])->name('profesional.registro.examen.transcripcion');



    /** revision de examen especialdiad */

    Route::get('/pdf/examen/revisado', [App\Http\Controllers\ExamenEspecialidadController::class, 'ExamenRevisado'])->name('pdf.examen.especialidad.revisado');

    Route::get('/pdf/examen/octavo_par/revisado', [App\Http\Controllers\ExamenEspecialidadController::class, 'ExamenOctavoParRevisado'])->name('pdf.examen.especialidad.octavo_par.revisado');

    Route::get('/examen/especialidad/lista', [App\Http\Controllers\ExamenEspecialidadController::class, 'VerRegistros'])->name('examen.especialidad.ver.registros');





    /** CNS */

    Route::post('/ficha/cns/registro', [App\Http\Controllers\FichaPediatriaCnsController::class, 'registrar'])->name('ficha.registro.cns');





    /** VACUNAS PEDIATRIA */

    Route::post('/ficha/vacuna/registro', [App\Http\Controllers\FichaPediatriaVacunaController::class, 'registrar'])->name('ficha.registro.vacuna');

    Route::get('/ficha/vacuna/ver_registros', [App\Http\Controllers\FichaPediatriaVacunaController::class, 'verRegistros'])->name('ficha.ver.registros.vacuna');

    Route::get('/ficha/vacuna/carnet', [App\Http\Controllers\FichaPediatriaVacunaController::class, 'generarPdfCarnet'])->name('ficha.pdf.vacuna');



    /** INICIO DE LICENCIA */

    Route::get('/aprobar/licencia/aceptar', [App\Http\Controllers\LicenciaAprobacionController::class, 'licenciaEvaluacion'])->name('profesional.licencia.evalueacion.aceptar');

    Route::get('/aprobar/licencia/rechazar', [App\Http\Controllers\LicenciaAprobacionController::class, 'licenciaEvaluacion'])->name('profesional.licencia.evalueacion.rechazar');

    Route::get('/licencia/autorizacion/soliciar', [App\Http\Controllers\LicenciaAprobacionController::class, 'solicitarAutorizacion'])->name('profesional.licencia.solicitar');

    Route::get('/licencia/autorizacion/validar', [App\Http\Controllers\LicenciaAprobacionController::class, 'validarAutorizacion'])->name('profesional.licencia.validar');

    Route::get('/licencia/autorizacion/cancelar', [App\Http\Controllers\LicenciaAprobacionController::class, 'cancelarAutorizacion'])->name('profesional.licencia.cancelar');

    /** SOLICITUD PERMISO A PACIENTE */

    Route::get('/licencia/paciente/autorizacion/soliciar', [App\Http\Controllers\LicenciaAprobacionController::class, 'solicitarPacienteAutorizacion'])->name('profesional.paciente.licencia.solicitar');

    Route::get('/licencia/paciente/autorizacion/validar', [App\Http\Controllers\LicenciaAprobacionController::class, 'validarPacienteAutorizacion'])->name('profesional.paciente.licencia.validar');

    Route::get('/licencia/paciente/autorizacion/cancelar', [App\Http\Controllers\LicenciaAprobacionController::class, 'cancelarPacienteAutorizacion'])->name('profesional.paciente.licencia.cancelar');





    /** PERMISOS PARA FMU */

    Route::get('/aprobar/fmu/aceptar', [App\Http\Controllers\FmuAprobacionController::class, 'fmuEvaluacion'])->name('profesional.fmu.evalueacion.aceptar');

    Route::get('/aprobar/fmu/rechazar', [App\Http\Controllers\FmuAprobacionController::class, 'fmuEvaluacion'])->name('profesional.fmu.evalueacion.rechazar');

    Route::get('/fmu/autorizacion/soliciar', [App\Http\Controllers\FmuAprobacionController::class, 'solicitarAutorizacion'])->name('profesional.fmu.solicitar');

    Route::get('/fmu/autorizacion/validar', [App\Http\Controllers\FmuAprobacionController::class, 'validarAutorizacion'])->name('profesional.fmu.validar');

    Route::get('/fmu/autorizacion/cancelar', [App\Http\Controllers\FmuAprobacionController::class, 'cancelarAutorizacion'])->name('profesional.fmu.cancelar');



    /** REGISTRO DE RECOMENDACION */

    Route::post('/receta/registro', [App\Http\Controllers\RecomendacionController::class, 'registroRecomendacion'])->name('profesional.receta.registro');

    Route::get('/receta/ver', [App\Http\Controllers\RecomendacionController::class, 'verRecomendaciones'])->name('profesional.receta.ver');

    Route::get('/receta/paciente/cantidad', [App\Http\Controllers\RecomendacionController::class, 'verRecetaPacienteCantidad'])->name('profesional.receta.paciente.cantidad');

	Route::get('/receta/paciente/cantidad', [App\Http\Controllers\RecomendacionController::class, 'verRecetaPacienteCantidad'])->name('profesional.receta.paciente.cantidad');

    // Route::get('/receta/pdf', [App\Http\Controllers\RecomendacionController::class, 'verPDF'])->name('profesional.receta.pdf');



	/** GINECO OBSTETRICO */

    Route::post('/ficha/ginecologia/obstetricia/registrar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'store'])->name('fichaAtencion.registrar_ficha_gine_obst');

    Route::post('/gine/obst/ciclo/menstrual/registro', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'GineModalCicloMenstrual'])->name('gine.obste.examen.ciclo.menstrual.registrar');

    Route::get('/gine/obst/ciclo/menstrual/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerGineModalCicloMenstrual'])->name('gine.obste.examen.ciclo.menstrual.ver');

    Route::post('/gine/obst/antecedente/mamas/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarAntesedenteMamas'])->name('gine.obste.antesedente.mamas.agregar');

    Route::get('/gine/obst/antecedente/mamas/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerAntesedenteMamas'])->name('gine.obste.antesedente.mamas.ver');

    Route::post('/gine/obst/mamas/examen/clinico/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarExamenCliniMamas'])->name('gine.obste.mamas.exam.clini.agregar');

    Route::get('/gine/obst/mamas/examen/clinico/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerExamenCliniMamas'])->name('gine.obste.mamas.exam.clini.ver');

    Route::post('/gine/obst/antecedente/aborto/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarAntAborto'])->name('gine.obste.ant.aborto.agregar');

    Route::get('/gine/obst/antecedente/aborto/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerAntAborto'])->name('gine.obste.ant.aborto.ver');

    Route::post('/gine/obst/antecedente/parto/puerperio/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarAntePartoPuerperio'])->name('gine.obste.ant.parto.puerperio.agregar');

    Route::get('/gine/obst/antecedente/parto/puerperio/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerAntePartoPuerperio'])->name('gine.obste.ant.parto.puerperio.ver');

    Route::post('/gine/obst/antecedente/ex/hormonas/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarAntExHormonales'])->name('gine.obste.ant.ex.hormonas.agregar');

    Route::get('/gine/obst/antecedente/ex/hormonas/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerAntExHormonales'])->name('gine.obste.ant.ex.hormonas.ver');

    Route::post('/gine/hipertension/agregar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarModalHipertension'])->name('gine.obste.hipertension.agregar');

    Route::get('/gine/hipertension/ver', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerModalHipertension'])->name('gine.obste.hipertension.ver');

    Route::post('/gine/otros/procedimiento/registrar', [App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarModalOtrosProcedimientos'])->name('gine.otros.procedimiento.registrar');

    Route::get('/gine/otros/procedimiento/ver',[App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerModalOtrosProcedimientos'])->name('gine.otros.procedimiento.ver');

    Route::post('/gine/otros/procedimiento/eliminar',[App\Http\Controllers\FichaGinecoObstetricoController::class, 'EliminarModalOtrosProcedimientos'])->name('gine.otros.procedimiento.eliminar');

    Route::post('/gine/antecedentes/anticonceptivo/registrar',[App\Http\Controllers\FichaGinecoObstetricoController::class, 'AgregarModalAntAnticonceptivo'])->name('gine.ante.anticonceptivo.registrar');

    Route::get('/gine/antecedentes/anticonceptivo/ver',[App\Http\Controllers\FichaGinecoObstetricoController::class, 'VerModalAntAnticonceptivo'])->name('gine.ante.anticonceptivo.ver');



    /** RECETA DE LENTES */

    Route::post('/receta/lente/registro', [App\Http\Controllers\OftarmoRecetaLenteController::class, 'registrar'])->name('receta.oftalmo.lente.registrar');

    Route::get('/receta/lente/ver', [App\Http\Controllers\OftarmoRecetaLenteController::class, 'verRegistros'])->name('receta.oftalmo.lente.ver');



    /** OTRO ACOMPAÑANTE */

    Route::post('/otro/acompanante/registro', [App\Http\Controllers\OtroAcompananteAtencionController::class, 'registrar'])->name('otro.acompanante.registrar');



    /** modificar paciente */

    Route::get('paciente/modificar', [App\Http\Controllers\EscritorioPaciente::class, 'modificarPaciente'])->name('profesional.paciente.modificar');



    /** procedimientos */

    Route::get('lugar_atencion/procedimientos', [App\Http\Controllers\EscritorioProfesional::class, 'mis_procedimientos_lugar_atencion'])->name('profesional.mis_procedimientos_lugar_atencion');

    Route::get('lugar_atencion/procedimientos/registrar', [App\Http\Controllers\ProcedimientosCentroLugarAtencionProfesionalController::class, 'registrar_r'])->name('profesional.mis_procedimientos_lugar_atencion.registrar');

    Route::get('centro/procedimientos', [App\Http\Controllers\ProcedimientosCentroController::class, 'verRegistros_r'])->name('centro.procedimientos');

    Route::get('centro/procedimientos/eliminar', [App\Http\Controllers\ProcedimientosCentroLugarAtencionProfesionalController::class, 'modificar_r'])->name('centro.procedimientos.eliminar');



	Route::get('Receta_Online/licencia/pdf', [App\Http\Controllers\LicenciaAprobacionController::class, 'pdfLicenciaPaciente'])->name('profesional.licencia.pdf');

    Route::get('control_acceso',[App\Http\Controllers\EscritorioProfesional::class, 'control_acceso'])->name('app.profesional.control_acceso');



    /** llamado pantalla  */

    Route::post('llamado/registrar', [\App\Http\Controllers\LlamadoPacienteController::class, 'registrar'])->name('llamado_paciente.registrar');

    Route::post('llamado/modificar', [\App\Http\Controllers\LlamadoPacienteController::class, 'modificar'])->name('llamado_paciente.modificar');

    Route::get('llamado/ver_registro', [\App\Http\Controllers\LlamadoPacienteController::class, 'verRegistro'])->name('llamado_paciente.ver_registro');

    Route::get('llamado/ver_registros', [\App\Http\Controllers\LlamadoPacienteController::class, 'verRegistros'])->name('llamado_paciente.ver_registros');

    Route::post('llamado/paciente', [\App\Http\Controllers\LlamadoPacienteController::class, 'llamarPaciente'])->name('llamado_paciente.llamarPaciente');



    // Route::post('/registro_receta', [App\Http\Controllers\DetalleRecetaController::class, 'registroRecetaInterna'])->name('detalle_receta.registro_receta');

    Route::post('/registro_manual_receta', [App\Http\Controllers\DetalleRecetaController::class, 'registroRecetaManualInterna'])->name('detalle_receta.registro_manual_receta');

    Route::post('/profesional/mostrar_nueva_evolucion_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'mostrar_nueva_evolucion_paciente'])->name('profesional.mostrar_nueva_evolucion_paciente_hosp');

    Route::post('/agregar_evolucion_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'agregar_evolucion_paciente'])->name('profesional.agregar_evolucion_paciente_hosp');

});





    Route::post('/buscar_rut_profesional_bodega', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_rut_profesional_bodega'])->name('profesional.buscar_rut_profesional_bodega');

    Route::post('/guardar_responsable_bodega', [App\Http\Controllers\BodegasController::class,'guardar_responsable_bodega'])->name('bodega.guardar_responsable_bodega');







Route::group([

    // 'middleware' => ['guest', 'role:Profesional|Paciente|Admin'],

    'prefix' => 'receta',

], function () {

    Route::get('pdf', [App\Http\Controllers\RecomendacionController::class, 'verPDF'])->name('profesional.receta.pdf');

    Route::post('validar.certificado', [App\Http\Controllers\CertificadoController::class, 'validarCertificado'])->name('validar.certificado');

    Route::post('validar.firma.documento', [App\Http\Controllers\CertificadoController::class, 'validarFirmaDocumento'])->name('validar.firma.documento');

    Route::post('validar.fecha.documento', [App\Http\Controllers\CertificadoController::class, 'validarFechaDocumento'])->name('validar.fecha.documento');

    Route::post('validar.paciente.documento', [App\Http\Controllers\CertificadoController::class, 'validarPacienteDocumento'])->name('validar.paciente.documento');

    Route::post('validar.profesional.documento', [App\Http\Controllers\CertificadoController::class, 'validarProfesionalDocumento'])->name('validar.profesional.documento');

});



Route::group([

    'middleware' => ['role:Profesional|Paciente|Admin'],

    'prefix' => 'resultado/examen',

], function () {

    /** VER ARCHIVO DE RESULTADOS LAB */

    Route::get('/archivo/ver', [App\Http\Controllers\ResultadoExamenController::class, 'verArchivos'])->name('resultado.examen.lab.archivo.ver');

    Route::get('/revisado', [App\Http\Controllers\ResultadoExamenController::class, 'resultadoRevisado'])->name('resultado.examen.lab.revisado');

    Route::get('/ver', [App\Http\Controllers\ResultadoExamenController::class, 'resultadoVer'])->name('resultado.examen.ver');

});





Route::group([

    'middleware' => ['role:Profesional|Paciente|Admin'],

    'prefix' => 'log/datos/medico',

], function () {

    /** HISTORICO MODIFICACION DE DATOS MEDICOS DEL PACIENTE */

    Route::post('/registro', [App\Http\Controllers\PacienteHistoricoDatosMedicosController::class, 'registrar_r'] )->name('log.hist.medico.registro');

    Route::get('/ver', [App\Http\Controllers\PacienteHistoricoDatosMedicosController::class, 'verRegistrosPaciente'] )->name('log.hist.medico.ver');

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

    // Route::get('Flujo_Caja', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('asistente.flujo_caja');

    Route::get('Flujo_Caja', [App\Http\Controllers\FlujoCajaController::class, 'home'])->name('asistente.flujo_caja');

	Route::get('hora/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'confirmarHora'])->name('asistente.cargar_hora_confirmar');

	Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargarConfirmarHora'])->name('asistente.cargar_hora_por_confirmar');

    Route::get('Administracion_asistente', [App\Http\Controllers\EscritorioAsistente::class, 'administracion_asistente'])->name('asistente.administracion_asistente');



    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistente::class, 'index'])->name('asistente.subcripcion');

    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistente::class, 'index'])->name('asistente.venta_productos');

    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'registroPaciente'])->name('asistente.registro_paciente');

    Route::get('AgendaPorProfesional', [App\Http\Controllers\EscritorioAsistente::class, 'agendaPorProfesional'])->name('asistente.agenda_por_profesional');

	// Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargarConfirmarHora'])->name('asistente.cargar_hora_por_confirmar');

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



    Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente_rut'])->name('asistente.buscar_paciente_rut');



});



/** ASISTENTE MANEJO DE AGENDA */

Route::group([

    'middleware' => ['role:AsistenteManejoAgenda|Admin'],

    'prefix' => 'Asistente/cm/manejo/agenda/',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'index'])->name('asistentecm.ma.home');



    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'perfil'])->name('asistentecm.ma.perfil');

    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'buscar_paciente'])->name('asistentecm.ma.buscar_paciente');

    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'reservar_hora'])->name('asistentecm.ma.reservar_hora');

    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'mis_profesionales'])->name('asistentecm.ma.mis_profesionales');

    Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiariaMa'])->name('asistentecm.ma.rendir');

    Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentecm.ma.rendicion_carga_bonos');

    Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistentecm.ma.historico_caja');



    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.ma.subcripcion');

    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.ma.venta_productos');

    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registroPaciente'])->name('asistentecm.ma.registro_paciente');

	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'buscar_paciente_rut'])->name('asistentecm.ma.buscar_paciente_rut');



    Route::get('Profesional/informacion/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscarInfoProfesional'])->name('asistentecm.ma.buscar_info_profesional');

    Route::get('Hora-Medica/buscar', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('asistentecm.ma.buscar_hora_medica');



    /* 1.- Reservar Hora Médica */

    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getEspecialidad'])->name('asistentecm.ma.getEspecialidad');

    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getProfesional'])->name('asistentecm.ma.getProfesional');

    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getVideoConsulta'])->name('asistentecm.ma.getVideoConsulta');



    /** perfil  */

    Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_personales_perfil'])->name('asistentecm.ma.editar_datos_personales_perfil');

    Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_contacto_perfil'])->name('asistentecm.ma.editar_datos_contacto_perfil');

    Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_direccion_perfil'])->name('asistentecm.ma.editar_datos_direccion_perfil');

    /** contacto emergencia */

    Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_contacto_emergencia'])->name('asistentecm.ma.cargar_contacto_emergencia');

    Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registrar_contacto_emergencia'])->name('asistentecm.ma.registrar_contacto_emergencia');

    /** contacto */

    Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_datos_contacto'])->name('asistentecm.ma.cargar_datos_contacto');

    Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_contacto_emergencia'])->name('asistentecm.ma.editar_contacto');

    Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'eliminar_contacto_asistente'])->name('asistentecm.ma.eliminar_contacto_asistente');

    Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_contacto'])->name('asistentecm.ma.buscar_contacto');



    Route::get('hora/confirmar', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'confirmarHora'])->name('asistentecm.ma.confirmar_hora');

    Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmMnAg::class, 'cargarConfirmarHora'])->name('asistentecm.ma.cargar_hora_por_confirmar');

});



/* ASISTENTE caja Centro Medico*/

Route::group([

    'middleware' => ['role:AsistenteCaja|Admin|AsistenteLaboratorio|AsistenteOnline'],

    'prefix' => 'Asistente/cm/',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.home');

    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'perfil'])->name('asistentecm.perfil');

    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente'])->name('asistentecm.buscar_paciente');

    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'reservar_hora'])->name('asistentecm.reservar_hora');

    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'mis_profesionales'])->name('asistentecm.mis_profesionales');



    // Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiaria'])->name('asistentecm.rendir');

	Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'home'])->name('asistentecm.rendir');

    Route::get('caja/rendir/bonos/fecha', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteFecha'])->name('asistentecm.rendicion_carga_bonos_fecha');



    // Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentecm.rendicion_carga_bonos');

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

    // Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_personales_perfil'])->name('asistentecm.editar_datos_personales_perfil');

    // Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_contacto_perfil'])->name('asistentecm.editar_datos_contacto_perfil');

    // Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_direccion_perfil'])->name('asistentecm.editar_datos_direccion_perfil');

    // /** contacto emergencia */

    // Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_contacto_emergencia'])->name('asistentecm.cargar_contacto_emergencia');

    // Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registrar_contacto_emergencia'])->name('asistentecm.registrar_contacto_emergencia');

    // /** contacto */

    // Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_datos_contacto'])->name('asistentecm.cargar_datos_contacto');

    // Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_contacto_emergencia'])->name('asistentecm.editar_contacto');

    // Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'eliminar_contacto_asistente'])->name('asistentecm.eliminar_contacto_asistente');

    // Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_contacto'])->name('asistentecm.buscar_contacto');



    Route::get('hora/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'confirmarHora'])->name('asistentecm.confirmar_hora');

    Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargarConfirmarHora'])->name('asistentecm.cargar_hora_por_confirmar');



 /** FOTO DE PERFIL */

    Route::post('/actualizar-foto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'actualizarFoto'])->name('asistente.actualizar.foto');

    Route::post('/eliminar-foto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'eliminarFoto'])->name('asistente.eliminar.foto');



});



/* ASISTENTE caja Centro Medico*/

Route::group([

    'middleware' => ['role:Admin|AsistenteLaboratorio'],

    'prefix' => 'Laboratorio/Asistente/',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistenteLaboratorio::class, 'index'])->name('asistente.lab.home');

    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'perfil'])->name('asistente.lab.perfil');

    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente'])->name('asistente.lab.buscar_paciente');

    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'reservar_hora'])->name('asistente.lab.reservar_hora');

    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'mis_profesionales'])->name('asistente.lab.mis_profesionales');



    // Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiaria'])->name('asistente.lab.rendir');

	Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'home'])->name('asistente.lab.rendir');





    // Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistente.lab.rendicion_carga_bonos');

    Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistente.lab.historico_caja');



    Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistente.lab.subcripcion');

    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistente.lab.venta_productos');

    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registroPaciente'])->name('asistente.lab.registro_paciente');

	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente_rut'])->name('asistente.lab.buscar_paciente_rut');



    Route::get('Profesional/informacion/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscarInfoProfesional'])->name('asistente.lab.buscar_info_profesional');

    Route::get('Hora-Medica/buscar', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('asistente.lab.buscar_hora_medica');



    /* 1.- Reservar Hora Médica */

    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getEspecialidad'])->name('asistente.lab.getEspecialidad');

    Route::get('getProfesional', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getProfesional'])->name('asistente.lab.getProfesional');

    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'getVideoConsulta'])->name('asistente.lab.getVideoConsulta');



    /** perfil  */

    // Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_personales_perfil'])->name('asistente.lab.editar_datos_personales_perfil');

    // Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_contacto_perfil'])->name('asistente.lab.editar_datos_contacto_perfil');

    // Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_datos_direccion_perfil'])->name('asistente.lab.editar_datos_direccion_perfil');

    // /** contacto emergencia */

    // Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_contacto_emergencia'])->name('asistente.lab.cargar_contacto_emergencia');

    // Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'registrar_contacto_emergencia'])->name('asistente.lab.registrar_contacto_emergencia');

    // /** contacto */

    // Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargar_datos_contacto'])->name('asistente.lab.cargar_datos_contacto');

    // Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'editar_contacto_emergencia'])->name('asistente.lab.editar_contacto');

    // Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'eliminar_contacto_asistente'])->name('asistente.lab.eliminar_contacto_asistente');

    // Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_contacto'])->name('asistente.lab.buscar_contacto');



    Route::get('hora/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'confirmarHora'])->name('asistente.lab.confirmar_hora');

    Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'cargarConfirmarHora'])->name('asistente.lab.cargar_hora_por_confirmar');



    Route::get('procedimiento/profesional/lugar_atencion', [App\Http\Controllers\ProcedimientosCentroLugarAtencionProfesionalController::class, 'verRegistros_r'])->name('asistente.lab.ver.proced.profe.lugar_atencion');



});







/* ASISTENTE tecn dental*/

Route::group([

    'middleware' => ['role:AsistenteDentalTecn|Admin'],

    'prefix' => 'Asistente/tons/',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioDentalTons::class, 'index'])->name('asistentedentaltecn.home');

    Route::get('Perfil', [App\Http\Controllers\EscritorioDentalTons::class, 'perfil'])->name('asistentedentaltecn.perfil');

    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioDentalTons::class, 'buscar_paciente'])->name('asistentedentaltecn.buscar_paciente');

    Route::get('Reservar_Hora', [App\Http\Controllers\EscritorioDentalTons::class, 'reservar_hora'])->name('asistentedentaltecn.reservar_hora');

    Route::get('Mis_Profesionales', [App\Http\Controllers\EscritorioDentalTons::class, 'mis_profesionales'])->name('asistentedentaltecn.mis_profesionales');

    // Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'rendirCajaDiaria'])->name('asistentecm.rendir');

    // Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentecm.rendicion_carga_bonos');

    // Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistentecm.historico_caja');



    // Route::get('Subcripcion', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'index'])->name('asistentecm.subcripcion');

    Route::get('Venta_Productos', [App\Http\Controllers\EscritorioDentalTons::class, 'index'])->name('asistentedentaltecn.venta_productos');

    Route::get('Registro_Paciente', [App\Http\Controllers\EscritorioDentalTons::class, 'registroPaciente'])->name('asistentedentaltecn.registro_paciente');

	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioDentalTons::class, 'buscar_paciente_rut'])->name('asistentedentaltecn.buscar_paciente_rut');



    Route::get('Profesional/informacion/buscar', [App\Http\Controllers\EscritorioDentalTons::class, 'buscarInfoProfesional'])->name('asistentedentaltecn.buscar_info_profesional');

    Route::get('Hora-Medica/buscar', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_hora_medica'])->name('asistentedentaltecn.buscar_hora_medica');



    /* 1.- Reservar Hora Médica */

    Route::get('getEspecialidad', [App\Http\Controllers\EscritorioDentalTons::class, 'getEspecialidad'])->name('asistentedentaltecn.getEspecialidad');

    Route::get('getProfesional', [App\Http\Controllers\EscritorioDentalTons::class, 'getProfesional'])->name('asistentedentaltecn.getProfesional');

    Route::get('getVideoConsulta', [App\Http\Controllers\EscritorioDentalTons::class, 'getVideoConsulta'])->name('asistentedentaltecn.getVideoConsulta');



    /** perfil  */

    Route::post('perfil/editar_datos/personales', [App\Http\Controllers\EscritorioDentalTons::class, 'editar_datos_personales_perfil'])->name('asistentedentaltecn.editar_datos_personales_perfil');

    Route::post('perfil/editar_datos/contacto', [App\Http\Controllers\EscritorioDentalTons::class, 'editar_datos_contacto_perfil'])->name('asistentedentaltecn.editar_datos_contacto_perfil');

    Route::post('perfil/editar_datos/direccion', [App\Http\Controllers\EscritorioDentalTons::class, 'editar_datos_direccion_perfil'])->name('asistentedentaltecn.editar_datos_direccion_perfil');

    /** contacto emergencia */

    Route::get('perfil/contacto/emergencia/cargar', [App\Http\Controllers\EscritorioDentalTons::class, 'cargar_contacto_emergencia'])->name('asistentedentaltecn.cargar_contacto_emergencia');

    Route::get('perfil/contacto/emergencia/registrar_contacto_emergencia', [App\Http\Controllers\EscritorioDentalTons::class, 'registrar_contacto_emergencia'])->name('asistentedentaltecn.registrar_contacto_emergencia');

    /** contacto */

    Route::get('perfil/contacto/cargar', [App\Http\Controllers\EscritorioDentalTons::class, 'cargar_datos_contacto'])->name('asistentedentaltecn.cargar_datos_contacto');

    Route::get('perfil/contacto/editar', [App\Http\Controllers\EscritorioDentalTons::class, 'editar_contacto_emergencia'])->name('asistentedentaltecn.editar_contacto');

    Route::get('perfil/contacto/eliminar', [App\Http\Controllers\EscritorioDentalTons::class, 'eliminar_contacto_asistente'])->name('asistentedentaltecn.eliminar_contacto_asistente');

    Route::get('perfil/contacto/buscar', [App\Http\Controllers\EscritorioDentalTons::class, 'buscar_contacto'])->name('asistentedentaltecn.buscar_contacto');



    Route::get('hora/confirmar', [App\Http\Controllers\EscritorioDentalTons::class, 'confirmarHora'])->name('asistentedentaltecn.confirmar_hora');

    Route::get('hora/por/confirmar', [App\Http\Controllers\EscritorioDentalTons::class, 'cargarConfirmarHora'])->name('asistentedentaltecn.cargar_hora_por_confirmar');



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

    Route::get('caja/rendir', [App\Http\Controllers\FlujoCajaController::class, 'home'])->name('asistentejcm.rendir');

    Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentejcm.rendicion_carga_bonos');

    Route::get('caja/cerrar/rendiciones', [App\Http\Controllers\FlujoCajaController::class, 'cargaRendicionesAsistenteDia'])->name('asistentejcm.rendicion_carga_rendiciones');

    Route::get('caja/historico', [App\Http\Controllers\FlujoCajaController::class, 'historicoCajaDiaria'])->name('asistentejcm.historico_caja');

    Route::get('caja/rendicion/detalle', [App\Http\Controllers\FlujoCajaController::class, 'rendicionDetalle'])->name('asistentejcm.rendicion.detalle');

    Route::get('caja/rendicion/detalle/archivos', [App\Http\Controllers\FlujoCajaController::class, 'rendicionDetalleArchivos'])->name('asistentejcm.rendicion.detalle.archivos');



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

/* ASISTENTE Manejo Agenda Centro Medico*/

Route::group([

    'middleware' => ['role:Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteManejoAgenda|Admin|AsistenteLaboratorio'],

    'prefix' => 'Asistente/cm/',

], function () {

    /** rendicion caja */

    Route::post('caja/crear/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucion'])->name('asistentecm.solicitar_rendir_caja');

    Route::post('caja/crear/rendicion/prof', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionProf'])->name('asistentecm.solicitar_rendir_caja.prof');

    Route::post('caja/desistir/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionDesistir'])->name('asistentecm.rendicion_caja_desistir');

    Route::post('caja/extencion/validacion/rendicion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionExtenderValidacion'])->name('asistentecm.rendicion_caja_extender_validacion');

    Route::post('caja/rendicion/autorizacion/validacion', [App\Http\Controllers\RendicionCajaController::class, 'rendirCajaDiariaInstitucionValidarAutorizacion'])->name('asistentecm.rendir_caja_validar_autorizacion');



    /** carga archivo rendir */

    Route::post('caja/carga/archivo', [App\Http\Controllers\CargaArchivoController::class, 'cargaArchivoTemp'])->name('rendir.archivo.carga');

    Route::post('caja/carga/mover_r', [App\Http\Controllers\CargaArchivoController::class, 'moverArchivo_r'])->name('rendir.archivo.mover_r');



});



Route::group([

    'middleware' => ['role:Asistente|AsistenteAdm|AsistenteJefaCaja|AsistenteCaja|AsistenteOnline|AsistenteManejoAgenda|Admin|AsistenteLaboratorio|Profesional'],

    'prefix' => 'Asistente/',

], function () {

    /** lista espera */

    Route::get('lista/espera/buscar/por/profesional', [App\Http\Controllers\ListaEsperaController::class, 'buscarListaPorProfesional'])->name('lista.espera.buscar.por.profesional');

    Route::get('lista/espera/ver', [App\Http\Controllers\ListaEsperaController::class, 'verRegistro'])->name('lista.espera.ver');

    Route::post('lista/espera/registrar/existente', [App\Http\Controllers\ListaEsperaController::class, 'registrarExistente'])->name('lista.espera.registrar.existente');

    Route::post('lista/espera/registrar/nuevo', [App\Http\Controllers\ListaEsperaController::class, 'registrarNuevo'])->name('lista.espera.registrar.nuevo');

    Route::post('lista/espera/eliminar', [App\Http\Controllers\ListaEsperaController::class, 'eliminar'])->name('lista.espera.eliminar');



    /** solicitud de permiso al paciente para venta de bono  */

    Route::post('solicitud/autorizacion/bono/venta', [App\Http\Controllers\VentaBonoController::class, 'solicitarAutorizacionPaciente'])->name('asistente.solicitud.auto.paciente.venta.bono');

    Route::post('solicitud/autorizacion/validar', [App\Http\Controllers\VentaBonoController::class, 'validarAutorizacion'])->name('asistente.solicitud.auto.validar');

    Route::post('conectar/prevision', [App\Http\Controllers\VentaBonoController::class, 'conectarIsapreFonasa'])->name('asistente.conectar.prevision');

    Route::post('venta/bono/pago', [App\Http\Controllers\VentaBonoController::class, 'procesarPagoVenta'])->name('asistente.venta.bono.pago');

    Route::get('venta/bono/pdf', [App\Http\Controllers\VentaBonoController::class, 'generarPdf_r'])->name('asistente.venta.bono.pdf');



    /** modificar paciente */

    Route::get('paciente/modificar', [App\Http\Controllers\EscritorioPaciente::class, 'modificarPaciente'])->name('asistente.paciente.modificar');

    /** modificar contacto emergencia */

    Route::get('contacto/modificar',[App\Http\Controllers\EscritorioPaciente::class, 'modificarContacto'])->name('asistente.contacto.modificar');



    Route::post('carga/archivo', [App\Http\Controllers\CargaArchivoController::class, 'cargaArchivoTemp'])->name('asistente.archivo.carga');







});



/* ASISTENTE Online*/

Route::group([

    'middleware' => ['role:AsistenteOnline|Admin'],

    'prefix' => 'Asistente_Online',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioAsistente::class, 'indexon'])->name('asistenteon.home');

    Route::get('Perfil', [App\Http\Controllers\EscritorioAsistente::class, 'perfilon'])->name('asistenteon.perfil');

    Route::get('Buscar_Paciente', [App\Http\Controllers\EscritorioAsistente::class, 'buscar_pacienteon'])->name('asistenteon.buscar_paciente');

	Route::get('Paciente/cargar_info', [App\Http\Controllers\EscritorioAsistenteCmPublico::class, 'buscar_paciente_rut'])->name('asistenteon.buscar_paciente_rut');

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

    'middleware' => ['role:AsistenteAdm|Adm_Comercial|AsistenteManejoAgenda|Adm_Comercial|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|Profesional|Admin|AsistenteLaboratorio|Institucion'],

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

    Route::get('Hora-medica/hora/agendar/prereserva/paciente/nuevo', [App\Http\Controllers\EscritorioAsistente::class, 'agendar_hora_nuevo_paciente_prereserva'])->name('agenda.agendar_hora_nuevo_paciente_prereserva');

    Route::post('Hora-medica/hora/extra/agendar/prereserva/paciente/nuevo', [App\Http\Controllers\EscritorioAsistente::class, 'agendar_hora_extra_nuevo_paciente_prereserva'])->name('agenda.agendar_hora_extra_nuevo_paciente_prereserva');

    Route::post('Hora-medica/paciente/nuevo', [App\Http\Controllers\AsistenteController::class, 'AgregarNuevoPaciente'])->name('agenda.paciente.nuevo');

    Route::post('Hora-medica/paciente/nuevo/prereserva', [App\Http\Controllers\AsistenteController::class, 'AgregarNuevoPacientePrereserva'])->name('agenda.paciente.nuevo.prereserva');

    Route::get('Hora-medica/validar/email', [App\Http\Controllers\EscritorioProfesional::class, 'validar_rut'])->name('agenda.validar_email');

	Route::get('Hora-medica/validar/email/paciente', [App\Http\Controllers\EscritorioProfesional::class, 'validar_email_paciente'])->name('agenda.paciente.validar_email');



    /** motor de busqueda asistente online*/

    Route::get('perfil/configuracion/busqueda/editar', [App\Http\Controllers\EscritorioAsistente::class, 'editar_configuracion_busqueda'])->name('asistente.editar_configuracion_busqueda');



    /** SOLICITUD A TENCION MENOR DE EDAD  */

    Route::get('autorizacion/solicitud/representante', [App\Http\Controllers\EscritorioAsistente::class, 'envioSolicitudAtencionMenor'])->name('asistente.solicitar_aprobacion.atencion_menor');

    Route::get('autorizacion/solicitud/validar/representante', [App\Http\Controllers\EscritorioAsistente::class, 'validarSolicitudAtencionMenor'])->name('asistente.aprobacion.validar.atencion_menor');

    Route::get('autorizacion/solicitud/cancelar/representante', [App\Http\Controllers\EscritorioAsistente::class, 'cancelarSolicitudAtencionMenor'])->name('asistente.aprobacion.cancelar.atencion_menor');



    /** VALIDAR TIPO DE AGENDA POR HORA Y PROFESIONAL  */

    Route::get('autorizacion/solicitud/cancelar/representante', [EscritorioProfesional::class, 'tipoHorario_r'])->name('asistente.aprobacion.cancelar.atencion_menor');



    /** BLOQUEO DE HORAS */

    Route::post('/horas/bloqueo/registro', [App\Http\Controllers\ProfesionalHorariosBloqueoController::class, 'registrar_r'])->name('bloqueo.horas.registrar');

    Route::get('/horas/bloqueo/ver', [App\Http\Controllers\ProfesionalHorariosBloqueoController::class, 'verRegistros'])->name('bloqueo.horas.ver');

    Route::post('/horas/bloqueo/estado', [App\Http\Controllers\ProfesionalHorariosBloqueoController::class, 'estado'])->name('bloqueo.horas.estado');



    /** ANULACION DE HORAS */

    Route::get('/horas/ver', [App\Http\Controllers\HoraMedicaController::class, 'verRegistrosDia'])->name('agenda.dia.horas.ver');





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



    Route::post('perfil/paceinte/prevision/actualizar', [App\Http\Controllers\PacienteController::class, 'actualizarPrevision'])->name('paciente.prevision.actualizar');



});



 /** ENFERMERIA  */

  Route::group([

    'middleware' => ['role:Enfermera|Tens|Admin|Profesional'],

    'prefix' => 'Enfermeria',

], function () {

    Route::get('/Enfermera_administrativa', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_administrativa'])->name('app.enfermeria.enfermera_administrativa');

    Route::get('/Enfermera_tratante', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_tratante'])->name('app.enfermeria.enfermera_tratante');

    Route::get('/Enfermera_tens', [App\Http\Controllers\EnfermeriaController::class, 'enfermera_tens'])->name('app.enfermeria.enfermera_tens');

    Route::get('/Enfermera/atencion',[App\Http\Controllers\EnfermeriaController::class, 'enfermera_atencion'])->name('app.enfermeria.atencion');

    Route::post('/guardar_informacion_ingreso_urgencia', [App\Http\Controllers\EscritorioGeneral::class, 'guardarIngresoUrgencia'])->name('enfermeria.guardar_informacion_ingreso');

    Route::post('/guardar_antecedentes_urgencia', [App\Http\Controllers\EscritorioGeneral::class, 'guardarAntecedentesUrgencia'])->name('enfermeria.guardar_antecedentes_ingreso');

    Route::post('/guardar_informes', [App\Http\Controllers\EscritorioEnfermerasController::class, 'guardar_informes'])->name('enfermeria.guardar_informes');

    Route::post('cambiar_estado_tratamiento', [App\Http\Controllers\EscritorioEnfermerasController::class, 'cambiar_estado_tratamiento'])->name('enfermeria.cambiar_estado_tratamiento');



});



Route::post('/cambiar_estado_curacion', [App\Http\Controllers\EscritorioEnfermerasController::class, 'cambiar_estado_curacion'])->name('enfermeria.cambiar_estado_curacion');

Route::post('/asignar_nuevo_triage_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'asignar_nuevo_triage_paciente'])->name('enfermeria.asignar_nuevo_triage_paciente');

Route::post('/asignar_nueva_urgencia_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'asignar_nueva_urgencia_paciente'])->name('enfermeria.asignar_nueva_urgencia_paciente');

Route::post('guardar_curacion_plana_servicio', [App\Http\Controllers\EscritorioEnfermerasController::class, 'guardarCuracionPlanaServicio'])->name('enfermeria.guardar_curacion_plana_servicio');

Route::post('guardar_curacion_lpp_servicio', [App\Http\Controllers\EscritorioEnfermerasController::class, 'guardarCuracionLPPServicio'])->name('enfermeria.guardar_curacion_lpp_servicio');

Route::get('eliminar_curacion_lpp_servicio/{id}', [App\Http\Controllers\EscritorioEnfermerasController::class, 'eliminarCuracionLPPServicio'])->name('enfermeria.eliminar_curacion_lpp_servicio');

Route::post('/agregar_observaciones_tratamiento', [App\Http\Controllers\EscritorioEnfermerasController::class, 'agregar_observaciones_tratamiento'])->name('enfermeria.agregar_observaciones_tratamiento');



/** LABORATORIO  */

Route::group([

    'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Profesional|AdministradorLaboratorio|Adm_Institucion'],

    'prefix' => 'Laboratorio',

], function () {

    // Route::get('/Laboratorio/home', [App\Http\Controllers\LaboratorioController::class, 'home'])->name('laboratorio.adm_general.home');

    // Route::get('/Inicio', [App\Http\Controllers\LaboratorioController::class, 'index'])->name('laboratorio.home');

    Route::get('/Inicio', [App\Http\Controllers\EscritorioInstitucion::class, 'index'])->name('laboratorio.adm_general.home');



    Route::get('/adm_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'admin_laboratorio'])->name('laboratorio.adm_general.admin_laboratorio');

    Route::get('/sucursales_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'sucursales_laboratorio'])->name('laboratorio.adm_general.sucursales_laboratorio');

	Route::get('/profesionales_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'profesionales_laboratorio'])->name('laboratorio.adm_general.profesionales_laboratorio');

	Route::get('/asistentes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'asistentes_laboratorio'])->name('laboratorio.adm_general.asistentes_laboratorio');

	Route::get('/lista_exam', [App\Http\Controllers\LaboratorioController::class, 'lista_exam'])->name('laboratorio.adm_general.lista_exam');

	Route::get('/administracion', [App\Http\Controllers\LaboratorioController::class, 'administracion'])->name('laboratorio.adm_general.administracion');

	Route::get('/administracion/Gastos_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'gastos_laboratorio_admin'])->name('laboratorio.adm_general.gastos_laboratorio_admin');

	Route::get('/administracion/Inventario_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'inventario_laboratorio_admin'])->name('laboratorio.adm_general.inventario_laboratorio_admin');

	Route::get('/administracion/Proveedores_laboratorio_admin', [App\Http\Controllers\LaboratorioController::class, 'proveedores_laboratorio_admin'])->name('laboratorio.adm_general.proveedores_laboratorio_admin');



	Route::get('/perfil_admin', [App\Http\Controllers\LaboratorioController::class, 'perfil_admin'])->name('laboratorio.adm_general.perfil_admin');

	Route::get('/perfil_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'perfil_laboratorio'])->name('laboratorio.adm_general.perfil_laboratorio');

	Route::get('/suscripcion_pago_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'suscripcion_pago_laboratorio'])->name('laboratorio.adm_general.suscripcion_pago_laboratorio');



	Route::get('/agenda_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'agenda_laboratorio'])->name('laboratorio.lab_asistente.agenda_laboratorio');

	Route::get('/agenda_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'agenda_laboratorio'])->name('laboratorio.agenda_laboratorio');

	Route::get('/orden_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'orden_laboratorio'])->name('laboratorio.lab_asistente.orden_laboratorio');

	Route::get('/cotizar_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'cotizar_laboratorio'])->name('laboratorio.lab_asistente.cotizar_laboratorio');

	Route::get('/pacientes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'pacientes_laboratorio'])->name('laboratorio.lab_asistente.pacientes_laboratorio');

	Route::get('/resultados_examenes_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'resultados_examenes_laboratorio'])->name('laboratorio.lab_asistente.resultados_examenes_laboratorio');



    Route::get('/lab_asistente', [App\Http\Controllers\LaboratorioController::class, 'escritorio_asistente_laboratorio'])->name('laboratorio.lab_asistente');

    // Route::get('/escritorio_profesional_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'escritorio_profesional_laboratorio'])->name('laboratorio.lab_profesional.escritorio_profesional_laboratorio');

    Route::get('/escritorio_profesional_laboratorio', [App\Http\Controllers\EscritorioProfesional::class, 'index'])->name('laboratorio.lab_profesional.escritorio_profesional_laboratorio');

	Route::get('/pacientes_laboratoriop', [App\Http\Controllers\LaboratorioController::class, 'pacientes_laboratorio'])->name('laboratorio.lab_profesional.pacientes_laboratorio');



	Route::get('/procesos_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'procesos_laboratorio'])->name('laboratorio.lab_profesional.procesos_laboratorio');

	Route::get('/inventario_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'inventario_laboratorio'])->name('laboratorio.lab_profesional.inventario_laboratorio');

	Route::get('/gastos_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'gastos_laboratorio'])->name('laboratorio.lab_profesional.gastos_laboratorio');

	Route::get('/resultados', [App\Http\Controllers\LaboratorioController::class, 'resultados'])->name('laboratorio.lab_profesional.resultados');

	Route::get('/proveedores_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'proveedores_laboratorio'])->name('laboratorio.lab_profesional.proveedores_laboratorio');

	Route::get('/recepcion_muestras', [App\Http\Controllers\LaboratorioController::class, 'recepcion_muestras'])->name('laboratorio.lab_profesional.recepcion_muestras');

	Route::get('/solicitud_exam_laboratorio_profesional', [App\Http\Controllers\LaboratorioController::class, 'solicitud_exam_laboratorio_profesional'])->name('laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional');

    Route::get('/dame_laboratorio/{id}', [App\Http\Controllers\LaboratorioController::class, 'dame_laboratorio'])->name('laboratorio.lab_profesional.dame_laboratorio');

    Route::post('editar_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'editar_laboratorio'])->name('laboratorio.editar_laboratorio');



    Route::get('/Configuracion', [App\Http\Controllers\LaboratorioController::class, 'configuracion'])->name('laboratorio.configuracion');

    Route::get('/Configuracion/comercial', [App\Http\Controllers\LaboratorioController::class, 'perfil_laboratorio_comercial'])->name('laboratorio.configuracion_esc_comercial');

    Route::get('/Configuracion/prestaciones_dentales', [App\Http\Controllers\LaboratorioController::class, 'prestaciones_dentales'])->name('laboratorio.prestaciones_dentales');

    Route::get('/Configuracion/prestaciones', [App\Http\Controllers\LaboratorioController::class, 'prestaciones'])->name('laboratorio.prestaciones');

    Route::post('/Configuracion/perfil/datos/editar', [App\Http\Controllers\LaboratorioController::class, 'editarDatosPerfil'])->name('laboratorio.editar_datos_perfil');

    Route::post('/Configuracion/perfil/datos/responsable/editar', [App\Http\Controllers\LaboratorioController::class, 'editarDatosPerfilResponsable'])->name('laboratorio.editar_datos_perfil_responsable');

    Route::post('/Configuracion/perfil/datos/responsable_medico/editar', [App\Http\Controllers\LaboratorioController::class, 'editarDatosPerfilResponsableMedico'])->name('laboratorio.editar_datos_perfil_responsable_medico');

    Route::get('/Configuracion/perfil_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'perfil'])->name('laboratorio.perfil_laboratorio');

    Route::get('/Configuracion/departamentos_servicios', [App\Http\Controllers\LaboratorioController::class, 'departamentos'])->name('laboratorio.departamentos_servicios');

    Route::post('/registrar_servicio', [App\Http\Controllers\LaboratorioController::class, 'registrar_servicio'])->name('laboratorio.registrar_servicio');

    Route::post('/registrar_servicio_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'registrar_servicio_laboratorio'])->name('laboratorio.registrar_servicio_laboratorio');

    Route::post('/eliminar_servicio_laboratorio', [App\Http\Controllers\LaboratorioController::class, 'eliminar_servicio_laboratorio'])->name('laboratorio.eliminar_servicio_laboratorio');

    Route::get('/Estadisticas/{id_institucion?}', [App\Http\Controllers\LaboratorioController::class, 'estadisticas'])->name('laboratorio.estadisticas');

    Route::get('/Estadisticas/finanzas/{id_institucion?}', [App\Http\Controllers\LaboratorioController::class, 'estadisticas_finanzas'])->name('laboratorio.estadisticas_finanzas');

    Route::get('/Profesionales_institucion', [App\Http\Controllers\LaboratorioController::class, 'profesionales_institucion'])->name('laboratorio.profesionales_institucion');

    // Route::get('/Mis/Profesionales', [App\Http\Controllers\LaboratorioController::class, 'adm_inst_mis_profesionales'])->name('laboratorio.mis_profesionales');

    Route::get('/administracion/Pacientes/', [App\Http\Controllers\LaboratorioController::class, 'adm_buscar_pacientes'])->name('laboratorio.pacientes');

	Route::get('/Personal', [App\Http\Controllers\LaboratorioController::class, 'personal'])->name('laboratorio.personal');

    Route::post('/Personal/finalizar/contrato', [App\Http\Controllers\LaboratorioController::class, 'finalizar_contrato'])->name('laboratorio.personal.finalizar_profesional');

    Route::get('/Mis/Profesionales', [App\Http\Controllers\LaboratorioController::class, 'adm_inst_mis_profesionales'])->name('adm_cm.mis_profesionales');

    Route::get('/Profesional/lugar_atencion/horario', [App\Http\Controllers\LaboratorioController::class, 'mi_horario_lugar_atencion'])->name('laboratorio.prof_horario_lugar_atencion');

    Route::post('dame_profesional_lab', [App\Http\Controllers\LaboratorioController::class, 'dame_profesional'])->name('laboratorio.dame_profesional_cm');



    Route::get('/mis_convenios', [App\Http\Controllers\LaboratorioController::class, 'mis_convenios'])->name('laboratorio.mis_convenios');



	Route::get('/Profesionales', [App\Http\Controllers\LaboratorioController::class, 'profesionales'])->name('laboratorio.profesionales');

    Route::get('/Profesionales/{id}', [App\Http\Controllers\LaboratorioController::class, 'profesionales_id'])->name('laboratorio.profesionales_id');

    // Route::get('/Profesionales_institucion', [App\Http\Controllers\LaboratorioController::class, 'profesionales_institucion'])->name('laboratorio.profesionales_institucion');

    Route::get('/Mis/Profesionales', [App\Http\Controllers\LaboratorioController::class, 'adm_inst_mis_profesionales'])->name('laboratorio.mis_profesionales');

	Route::post('/Profesionales/asociar/existente', [App\Http\Controllers\LaboratorioController::class, 'asociarProfesionalExistente'])->name('laboratorio.asociar_profesional_existente');

	Route::post('/Profesionales/asociar/nuevo', [App\Http\Controllers\LaboratorioController::class, 'asociarProfesionalNuevo'])->name('laboratorio.asociar_profesional_nuevo');

	Route::get('/Profesionales/buscar/{id_profesional}', [App\Http\Controllers\LaboratorioController::class, 'buscar_profesional'])->name('laboratorio.profesional_buscar');



    Route::get('/historial_mensajes_profesional/{id}', [App\Http\Controllers\LaboratorioController::class, 'historial_mensajes_profesional'])->name('laboratorio.historial_mensajes_profesional');

    Route::get('/Administracion/Comercial', [App\Http\Controllers\LaboratorioController::class, 'areaComercial'])->name('laboratorio.area_comercial');

    Route::get('/Administracion/Venta/Audifonos',[App\Http\Controllers\LaboratorioController::class, 'areaVentaAudifonos'])->name('laboratorio.venta_audifonos');

    // Route::post('dame_profesional_servicio', [App\Http\Controllers\LaboratorioController::class, 'dame_profesional'])->name('laboratorio.dame_profesional_cm');

    Route::post('agregar_laboratorio',[App\Http\Controllers\LaboratorioController::class, 'agregar_laboratorio'])->name('laboratorio.agregar_laboratorio');

    Route::post('eliminar_laboratorio',[App\Http\Controllers\LaboratorioController::class, 'eliminar_laboratorio'])->name('laboratorio.eliminar_laboratorio_cm');



    // Route::get('ver/ficha/atencion/lab/orl', function(){

    //     return view('app.laboratorio.atencion_prof_laboratorio_especialidades');

    // })->name('laboratorio.ver.ficha.atencion.orl');



    Route::get('ver/ficha/atencion/', [App\Http\Controllers\ficha_atencionController::class, 'index'])->name('laboratorio.ver.ficha.atencion.orl');



    Route::get('box/buscar', [App\Http\Controllers\LaboratorioController::class, 'cargarBox'])->name('laboratorio.box');

    Route::get('agenda/cargar', [App\Http\Controllers\LaboratorioController::class, 'cargarAgendaSucursalBox'])->name('laboratorio.sucursal.horario.agenda');

    Route::get('agenda/hora', [App\Http\Controllers\LaboratorioController::class, 'agendar_horas'])->name('laboratorio.agendar_hora');





    Route::get('resultado/cargar', [App\Http\Controllers\LaboratorioController::class, 'cargarResultado'])->name('laboratorio.cargar.resultados');

    Route::post('resultado/subir', [App\Http\Controllers\LaboratorioController::class, 'subirResultado'])->name('laboratorio.subir.examen');

    Route::get('resultado/cargar/tabla', [App\Http\Controllers\LaboratorioController::class, 'cargarTablaResultado'])->name('laboratorio.cargar.tabla.resultados');

    Route::get('/Pacientes', [App\Http\Controllers\LaboratorioController::class, 'buscar_pacientes_profesional_asistente'])->name('laboratorio.pacientes.profesional.asistente');

    Route::get('/pacientes/buscar/rut', [App\Http\Controllers\LaboratorioController::class, 'buscar_paciente_rut'])->name('laboratorio.buscar_paciente_rut');



    Route::get('/atencion/audifono/venta', [App\Http\Controllers\LaboratorioController::class, 'audifonosVenta'])->name('laboratorio.profesional.audifono.venta');

    Route::get('/atencion/audifono/control', [App\Http\Controllers\LaboratorioController::class, 'audifonosControl'])->name('laboratorio.profesional.audifono.control');

    Route::post('/atencion/audifono/externo/guardar', [App\Http\Controllers\LaboratorioController::class, 'guardarAudifonoExterno'])->name('laboratorio.profesional.audifono.externo.guardar');

    Route::get('/atencion/examen/vppb', [App\Http\Controllers\LaboratorioController::class, 'examenVPPB'])->name('laboratorio.profesional.examen.vppb');

    Route::post('/atencion/examen/terapia_voz', [App\Http\Controllers\LaboratorioController::class, 'examenTerapiaVoz'])->name('laboratorio.profesional.examen.informe_terapia_voz');

    Route::post('/atencion/examen/vppb', [App\Http\Controllers\LaboratorioController::class, 'examenTerapiaVoz'])->name('laboratorio.profesional.examen.informe_vppb');

    Route::post('/atencion/examen/guardar_terapia_voz', [App\Http\Controllers\LaboratorioController::class, 'guardarTerapiaVoz'])->name('laboratorio.profesional.guardar_terapia_voz');

    Route::post('/atencion/examen/guardar_vppb', [App\Http\Controllers\LaboratorioController::class, 'guardarVPPB'])->name('laboratorio.profesional.guardar_vppb');

    Route::get('/atencion/examen/dame_sesiones_terapia_voz', [App\Http\Controllers\LaboratorioController::class, 'dameSesionesTerapiaVoz'])->name('laboratorio.profesional.dame_sesiones_terapia_voz');

    Route::get('/atencion/examen/dame_sesiones_vppb', [App\Http\Controllers\LaboratorioController::class, 'dameSesionesVPPB'])->name('laboratorio.profesional.dame_sesiones_vppb');

    Route::get('/atencion/examen/dame_atenciones_previas', [App\Http\Controllers\LaboratorioController::class, 'dameAtencionesPrevias'])->name('laboratorio.profesional.dame_atenciones_previas_lab');

    Route::post('/atencion/examen/finalizar_sesiones', [App\Http\Controllers\LaboratorioController::class, 'finalizarSesiones'])->name('laboratorio.profesional.finalizar_sesiones');

    Route::post('/atencion/examen/eliminar_registro_terapia_voz', [App\Http\Controllers\LaboratorioController::class, 'eliminarRegistroTerapiaVoz'])->name('laboratorio.profesional.eliminar_registro_terapia_voz');

    Route::post('/atencion/audifono/guardar', [App\Http\Controllers\LaboratorioController::class, 'guardarAudifonoVenta'])->name('laboratorio.profesional.examen.guardar_datos_audifonos');

    Route::get('/atencion/audifono/mis_audifonos', [App\Http\Controllers\LaboratorioController::class, 'misAudifonos'])->name('laboratorio.profesional.examen.mis_audifonos');

    Route::post('/solicitar/producto/bodega', [App\Http\Controllers\LaboratorioController::class, 'solicitarProductoBodega'])->name('laboratorio.profesional.solicitar_producto_bodega');

    Route::get('/laboratorio/profesional/buscar-productos-audifonos', [App\Http\Controllers\LaboratorioController::class, 'buscarProductosAudifonos'])->name('laboratorio.profesional.buscar_productos_audifonos');

    Route::get('/laboratorio/profesional/buscar-productos-general', [App\Http\Controllers\LaboratorioController::class, 'buscarProductosGeneral'])->name('laboratorio.profesional.buscar_productos_general');

    Route::post('/laboratorio/profesional/traspaso-productos-guardar', [App\Http\Controllers\LaboratorioController::class, 'traspasoProductosGuardar'])->name('laboratorio.profesional.traspaso_guardar');

    Route::post('/laboratorio/profesional/devolver-productos-guardar', [App\Http\Controllers\LaboratorioController::class, 'devolverProductosGuardar'])->name('laboratorio.profesional.devolver_guardar');

    Route::post('/laboratorio/profesional/rechazar-productos-guardar', [App\Http\Controllers\LaboratorioController::class, 'rechazarProductosGuardar'])->name('laboratorio.profesional.rechazar_guardar');

    Route::get('/laboratorio/profesional/detalle-producto',[App\Http\Controllers\LaboratorioController::class, 'detalleProductoBodegas'])->name('laboratorio.profesional.detalle_producto');

    Route::get('/laboratorio/profesional/detalle-producto-audifono/{id}', [App\Http\Controllers\LaboratorioController::class, 'detalleProductoAudifono'])->name('laboratorio.profesional.detalle_producto_audifono');

    Route::post('/atencion/examen/guardar-examen-audicion', [App\Http\Controllers\LaboratorioController::class, 'guardarExamenAudicion'])->name('laboratorio.profesional.examen.guardar_audicion');

    Route::get('/mi_horario_lab_agregar',[App\Http\Controllers\LaboratorioController::class, 'mi_horario_lab_agregar'])->name('laboratorio.mi_horario_lab_agregar');

    Route::get('mi_horario_lab', [App\Http\Controllers\LaboratorioController::class, 'mi_horario_lab'])->name('laboratorio.mi_horario_lab');

    Route::get('/productos/tipos', [App\Http\Controllers\LaboratorioController::class, 'productos_tipos'])->name('laboratorio.tipos_productos');



    Route::post('/laboratorio/profesional/registrar_calibracion_audifono', [App\Http\Controllers\LaboratorioController::class, 'registrar_calibracion_audifono'])->name('laboratorio.profesional.registrar_calibracion_audifono');

    Route::post('/laboratorio/profesional/historial_calibraciones_audifono', [App\Http\Controllers\LaboratorioController::class, 'historial_calibraciones_audifono'])->name('laboratorio.profesional.dame_historial_calibraciones_audifono');

    Route::post('/laboratorio/profesional/registrar_reparacion_audifono', [App\Http\Controllers\LaboratorioController::class, 'registrar_reparacion_audifono'])->name('laboratorio.profesional.registrar_reparacion_audifono');

    Route::post('/laboratorio/profesional/historial_reparaciones_audifono', [App\Http\Controllers\LaboratorioController::class, 'historial_reparaciones_audifono'])->name('laboratorio.profesional.dame_historial_reparaciones_audifono');

    Route::post('/laboratorio/profesional/historial_productos_prestados', [App\Http\Controllers\LaboratorioController::class, 'historial_productos_prestados'])->name('laboratorio.profesional.dame_historial_productos_prestados');



    Route::post('/laboratorio/profesional/guardar/permisos', [App\Http\Controllers\LaboratorioController::class, 'guardar_permisos'])->name('laboratorio.profesional.guardar_permisos');

    Route::post('/laboratorio/profesional/obtener/permisos', [App\Http\Controllers\LaboratorioController::class, 'obtener_permisos'])->name('laboratorio.profesional.obtener_permisos');



     // Registrar campaña publicitaria 

    Route::post('/registrar-campania',[App\Http\Controllers\LaboratorioController::class, 'registrarCampaniaPublicitaria'])->name('laboratorio.registrar_campania_publicitaria');

    Route::post('/historial-campanias',[App\Http\Controllers\LaboratorioController::class, 'historialCampaniasPublicitarias'])->name('laboratorio.historial_campanias_publicitarias');

    Route::post('/detalle-campania',[App\Http\Controllers\LaboratorioController::class, 'detalleCampaniaPublicitaria'])->name('laboratorio.detalle_campania_publicitaria');

    Route::post('/cargar-archivo-campania',[App\Http\Controllers\CargaImagenController::class, 'cargarArchivoCampania'])->name('laboratorio.cargar_archivo_campania');



    // Bodega Laboratorio

    Route::post('/bodega/registrar/item',[App\Http\Controllers\ComprasController::class, 'guardarItemFacturaLaboratorio'])->name('laboratorio.bodega.guardarItemFactura');

    



    // Asistente Laboratorio

    Route::post('/laboratorio/asistente/registrar',[App\Http\Controllers\ManejoContratoController::class, 'registrarPersonalLaboratorio'])->name('laboratorio.registrar_personal');

    Route::get('/laboratorio/lugar_atencion/horario/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verHorarioEmpleadoLaboratorio'])->name('laboratorio.empleado_horario_lugar_atencion');



    // Estadisticas del laboratorio

    Route::get('/buscar/estadisticas',[App\Http\Controllers\LaboratorioController::class, 'estadisticasBuscar'])->name('laboratorio.estadisticas.buscar');

    Route::get('/buscar/estadisticas/remuneraciones',[App\Http\Controllers\LaboratorioController::class, 'estadisticasBuscarRemuneraciones'])->name('laboratorio.estadisticas.buscar_remuneraciones');

});



// Grupo de rutas para carrito de compras (requiere autenticación)

Route::group([

    'middleware' => ['role:Admin|Profesional'],

    'prefix' => 'laboratorio/carrito',

],function () {



    // Agregar producto al carrito

    Route::post('/agregar',[App\Http\Controllers\LaboratorioController::class, 'agregarAlCarrito'])->name('laboratorio.carrito.agregar');

    // Agregar producto al carrito de prestamo

    Route::post('/agregar-prestamo',[App\Http\Controllers\LaboratorioController::class, 'agregarAlCarritoPrestamo'])->name('laboratorio.carrito_prestamos.agregar');



    // Obtener items del carrito

    Route::get('/',[App\Http\Controllers\LaboratorioController::class, 'obtenerCarrito'])->name('laboratorio.carrito.obtener');

    // Obtener items del carrito de prestamo

    Route::get('/prestamo',[App\Http\Controllers\LaboratorioController::class, 'obtenerCarritoPrestamo'])->name('laboratorio.carrito_prestamos.obtener');



    // Actualizar cantidad de un item

    Route::put('/actualizar-cantidad',[App\Http\Controllers\LaboratorioController::class, 'actualizarCantidadCarrito'])->name('laboratorio.carrito.actualizar_cantidad');



    // Eliminar item del carrito

    Route::delete('/eliminar',[App\Http\Controllers\LaboratorioController::class, 'eliminarDelCarrito'])->name('laboratorio.carrito.eliminar');

    //Eliminar item del carrito de prestamo

    Route::delete('/eliminar-prestamo',[App\Http\Controllers\LaboratorioController::class, 'eliminarDelCarritoPrestamo'])->name('laboratorio.carrito_prestamos.eliminar');



    // Vaciar carrito completo

    Route::delete('/vaciar',[App\Http\Controllers\LaboratorioController::class, 'vaciarCarrito'])->name('laboratorio.carrito.vaciar');

    // Vaciar carrito completo de prestamo

    Route::delete('/vaciar-prestamo',[App\Http\Controllers\LaboratorioController::class, 'vaciarCarritoPrestamo'])->name('laboratorio.carrito_prestamos.vaciar');



    // Procesar venta (finalizar compra)

    Route::post('/procesar-venta',[App\Http\Controllers\LaboratorioController::class, 'procesarVentaCarrito'])->name('laboratorio.carrito.procesar_venta');

    // Procesar prestamo (finalizar prestamo)

    Route::post('/procesar-prestamo',[App\Http\Controllers\LaboratorioController::class, 'procesarPrestamoCarrito'])->name('laboratorio.carrito_prestamos.procesar_prestamo');



});





/** CARGA DE RESULTADOS LABORATORIO */

Route::group([

    'middleware' => ['role:AsistenteCargaExamenExterno|Admin'],

    'prefix' => 'Asistente/laboratorio/examen',

], function () {

    Route::get('/home', [App\Http\Controllers\LaboratorioController::class, 'escritorio_asistente_laboratorio_subir_examan'])->name('lab.exa.asistente.home');

    Route::get('/agenda', [App\Http\Controllers\LaboratorioController::class, 'agenda_laboratorio_subir_examan'])->name('lab.exa.asistente.agenda_laboratorio');

    Route::get('/cotizar', [App\Http\Controllers\LaboratorioController::class, 'cotizar_laboratorio_subir_examan'])->name('lab.exa.asistente.cotizar_laboratorio');

    Route::get('/orden/ver', [App\Http\Controllers\LaboratorioController::class, 'orden_laboratorio_subir_examan'])->name('lab.exa.asistente.orden_laboratorio');

    Route::get('/pacientes', [App\Http\Controllers\LaboratorioController::class, 'pacientes_laboratorio_subir_examan'])->name('lab.exa.asistente.pacientes_laboratorio');

    Route::get('/resultados/ver', [App\Http\Controllers\LaboratorioController::class, 'resultados_examenes_laboratorio_subir_examan'])->name('lab.exa.asistente.resultados_examenes_laboratorio');



    Route::get('/resultados/cargar', [App\Http\Controllers\LaboratorioController::class, 'cargar_resultados_examenes_laboratorio_subir_examan'])->name('lab.exa.asistente.cargar_resultados_examenes_laboratorio');

    Route::get('/resultados/registrar', [App\Http\Controllers\LaboratorioController::class, 'registrar_resultados_examenes_laboratorio_subir_examan'])->name('lab.exa.asistente.registrar_resultados_examenes_laboratorio');

    Route::get('/resultados/ver/resultado/rut', [App\Http\Controllers\ResultadoExamenController::class, 'verRegistrosRut'])->name('lab.exa.asistente.ver_resultados_examenes_rut_laboratorio');



    /** Proceso de examen */

	Route::post('/examen/carga', [App\Http\Controllers\CargaExamenController::class, 'cargaArchivoTemp'])->name('examen.imagen.carga');



    Route::get('Paciente/buscar', [App\Http\Controllers\EscritorioPaciente::class, 'buscarPacientePorRut'])->name('lab.exa.asistente.buscar_paciente_rut');

});





Route::get('testarchivo',[App\Http\Controllers\ResultadoExamenController::class, 'testArchivo']);

Route::get('notificar',[App\Http\Controllers\ResultadoExamenController::class, 'notificar_r']);





Route::group([

    'middleware' => ['auth:sanctum', 'verified'],

], function () {

    /*Ficha Medica*/

    Route::post('Ficha_medica_no_inscrito', [App\Http\Controllers\ficha_atencionController::class, 'atencion_profesional_no_inscrito'])->name('atencion_medica.ficha_atencion_profesional_no_inscrito');



    Route::post('Ficha_Atencion/crear', [App\Http\Controllers\ficha_atencionController::class, 'store'])->name('fichaAtencion.registrar_ficha');

	Route::post('Ficha_Atencion/crear/orl', [App\Http\Controllers\ficha_atencionController::class, 'store_orl'])->name('fichaAtencion.registrar_ficha_orl');

    Route::post('Ficha_Atencion/crear/cg', [App\Http\Controllers\ficha_atencionController::class, 'store_cg'])->name('fichaAtencion.registrar_ficha_cg');

    Route::post('Ficha_Atencion/crear/cdg', [App\Http\Controllers\ficha_atencionController::class, 'store_cdg'])->name('fichaAtencion.registrar_ficha_cdg');

    Route::post('Ficha_Atencion/crear/uro', [App\Http\Controllers\ficha_atencionController::class, 'store_uro'])->name('fichaAtencion.registrar_ficha_uro');

    Route::post('Ficha_Atencion/crear/oft', [App\Http\Controllers\ficha_atencionController::class, 'store_oft'])->name('fichaAtencion.registrar_ficha_oft');

	Route::post('Ficha_Atencion/crear/dermo', [App\Http\Controllers\ficha_atencionController::class, 'store_dermo'])->name('fichaAtencion.registrar_ficha_dermo');

    Route::post('Ficha_Atencion/crear/neuro', [App\Http\Controllers\ficha_atencionController::class, 'store_neuro'])->name('fichaAtencion.registrar_ficha_neuro');

	Route::post('Ficha_Atencion/crear/trumatologia/ortopedia', [App\Http\Controllers\ficha_atencionController::class, 'store_tru_ort'])->name('fichaAtencion.registrar_ficha_trau_ort');

	Route::post('Ficha_Atencion/crear/pediatria/general', [App\Http\Controllers\FichaPediatriaController::class, 'storePediatriaGeneral'])->name('fichaAtencion.registrar_ficha_ped_gen');

    Route::post('Ficha_Atencion/crear/pediatria/cirugia/general', [App\Http\Controllers\FichaPediatriaController::class, 'storePediatriaCirugiaGeneral'])->name('fichaAtencion.registrar_ficha_ped_cir_trum_quem');

	Route::post('Ficha_Atencion/crear/antecedentes/sdi', [App\Http\Controllers\ficha_atencionController::class, 'storeFichaAntSdi'])->name('fichaAtencion.registrar_ficha_ant_sdi');

    //Route::post('Ficha_atencion/Registro_ficha', [App\Http\Controllers\ficha_atencionController::class, 'store'])->name('crear.ficha_atencion');



    Route::post('/getArticulo', [App\Http\Controllers\ficha_atencionController::class, 'getArticulo'])->name('ficha_medica.getArticulo');





    Route::get('/Ficha_medica', [App\Http\Controllers\ficha_atencionController::class, 'index']);

    Route::get('/Ficha_medica/registro_obesidad', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_obesidad'])->name('ficha_medica.registrar_control_obesidad');

    Route::get('/Ficha_medica/registro_hipertension', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_hipertension'])->name('ficha_medica.registrar_hipertension');

    Route::get('/Ficha_medica/registro_diabetes', [App\Http\Controllers\ficha_atencionController::class, 'registrar_control_diabetes'])->name('ficha_medica.registrar_diabetes');

	Route::get('/Ficha_medica/diabetes/get',[App\Http\Controllers\DiabetesController::class, 'getDiabetes'])->name('ficha_medica.diabetes.getDiabete');

    Route::post('/Ficha_medica/finalizar_atencion', [App\Http\Controllers\ficha_atencionController::class, 'finalizar_atencion'])->name('ficha_atencion.finalizar_atencion');



	/** toma de muestras */

    Route::post('/Ficha_medica/toma/muestra/registrar', [App\Http\Controllers\TomaMuestraController::class, 'registrarMuestra'])->name('ficha_atencion.toma.muestra.registrar');

    Route::get('/Ficha_medica/toma/muestra/ver',[App\Http\Controllers\TomaMuestraController::class, 'verRegistros_r'])->name('ficha_atencion.toma.muestra.ver');

    Route::post('/Ficha_medica/toma/muestra/eliminar',[App\Http\Controllers\TomaMuestraController::class, 'eliminarRegistros_r'])->name('ficha_atencion.toma.muestra.eliminar');



    /** REGISTRO DE DIAGNOSTICO GES */

    Route::get('/Ficha_medica/registrar_ges_ficha', [App\Http\Controllers\ficha_atencionController::class, 'registrar_ges_ficha'])->name('ficha_atencion.registrar_diagnostico_ges');

    Route::get('/Ficha_medica/ges/pdf', [App\Http\Controllers\GesRegistrosController::class, 'generarPdf_r'])->name('ficha_atencion.pdf.ges');

    Route::get('/Ficha_medica/ges/vista/previa/pdf', [App\Http\Controllers\GesRegistrosController::class, 'vistaPreviaPdf_r'])->name('ficha_atencion.vista.previa.pdf.ges');



    /** REGISTROS ENO */

    Route::get('/diagnostico/eno', [App\Http\Controllers\DiagnosticoEnoController::class, 'verRegistros'])->name('diagnostico.eno');

    Route::post('/diagnostico/auto/eno', [App\Http\Controllers\DiagnosticoEnoController::class, 'verRegistrosAuto'])->name('diagnostico.auto.eno');

    Route::post('/Ficha_medica/registrar/eno', [App\Http\Controllers\ficha_atencionController::class, 'registrar_eno'])->name('ficha_atencion.registrar.eno');

    Route::get('/Ficha_medica/cargar/eno', [App\Http\Controllers\ficha_atencionController::class, 'cargar_eno'])->name('ficha_atencion.cargar.eno');



    //Formularos Generales

    Route::get('/Ficha_medica/certificado_reposo', [App\Http\Controllers\ficha_atencionController::class, 'registrar_certificado_reposo'])->name('ficha_medica.registrar_certificado_reposo');

    Route::get('/Ficha_medica/registrar_interconsulta', [App\Http\Controllers\ficha_atencionController::class, 'registrar_interconsulta'])->name('ficha_medica.registrar_interconsulta');

	Route::get('/Ficha_medica/registrar_interconsulta_respuesta', [App\Http\Controllers\ficha_atencionController::class, 'registrar_interconsulta_respuesta'])->name('ficha_medica.registrar_interconsulta_respuesta');

    Route::get('/Ficha_medica/registrar_informe_medico', [App\Http\Controllers\ficha_atencionController::class, 'registrar_informe_medico'])->name('ficha_medica.registrar_informe_medico');

	Route::get('/Ficha_medica/registrar_uso_personal', [App\Http\Controllers\ficha_atencionController::class, 'registrar_uso_personal'])->name('ficha_medica.registrar_uso_personal');

    Route::get('/Registro1', [App\Http\Controllers\ficha_atencionController::class, 'index']);

    Route::get('/Ficha_medica/profesional_provisorio/{id_paciente}/{lugar_atencion_id}/{id_hora_realizar}', [App\Http\Controllers\ficha_atencionController::class, 'index2'])->name('ficha_medica.profesional_provisorio'); // PROFESIONAL PROVISORIO

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



	/** OTROS PROFESIONALES */

    /** PSICOLOGIA Y PSIQUIATRIA */

    Route::post('Ficha_Atencion/crear/sico', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_sico'])->name('ficha.otro.prof.registrar_ficha_sico');

    Route::post('Ficha_Atencion/crear/siqui', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_siqui'])->name('ficha.otro.prof.registrar_ficha_siqui');

	Route::post('sicologia/plan_tratamiento/registro', [App\Http\Controllers\PlanTratamientoTerapiaSicologicaController::class, 'registrar_r'])->name('ficha.otro.prof.plan_tratamiento.registro');

    Route::post('sicologia/test_rorshchach/registro', [App\Http\Controllers\PsicoPsiquiatriaController::class, 'TestRorshchachRegistro'])->name('ficha.otro.prof.test_rorshchach.registro');

    Route::post('sicologia/otros_test/registro', [App\Http\Controllers\PsicoPsiquiatriaController::class, 'OtrosTestPsicoPsiquiatrico'])->name('ficha.otro.prof.otros_test.registro');



    /** KINESIOLOGIA */

    Route::post('Ficha_Atencion/crear/kine', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_kine'])->name('ficha.otro.prof.registrar_ficha_kine');



    /** NUTRICION */

    Route::post('Ficha_Atencion/crear/nutri', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_nutri'])->name('ficha.otro.prof.registrar_ficha_nutri');



	/** FONOAUDIOLOGIA */

    Route::post('Ficha_Atencion/crear/fonoaudiologia', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_fono'])->name('ficha.otro.prof.registrar_ficha_fono');

    Route::post('fonoaudiologia/evaluacion/ofa/registro', [App\Http\Controllers\EvaluacionOfaController::class, 'Registrar_r'])->name('ficha.otro.prof.registro.eval.ofa');

    Route::post('fonoaudiologia/evaluacion/voz/registro', [App\Http\Controllers\EvaluacionVozController::class, 'Registrar_r'])->name('ficha.otro.prof.registro.eval.voz');

    Route::post('fonoaudiologia/evaluacion/espasmofemia/registro', [App\Http\Controllers\EvaluacionEspasmofemiaController::class, 'Registrar_r'])->name('ficha.otro.prof.registro.eval.espasmofemia');

    Route::post('fonoaudiologia/habilida/pragmatica/registro', [App\Http\Controllers\HabilidadPragmaticaController::class, 'Registrar_r'])->name('ficha.otro.prof.registro.habilidad.pragmatica');

	Route::post('fonoaudiologia/examen/praxias/registro', [App\Http\Controllers\ExamenPraxiasController::class, 'Registrar_r'])->name('ficha.otro.prof.registro.examen.praxias');



	/** FONOAUDIOLOGIA OCTAVO PAR */

    Route::post('Ficha_Atencion/crear/fonoaudiologia', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_fono_octa_par'])->name('ficha.otro.prof.registrar_octavo_par');

    Route::post('Ficha_Atencion/crear/fonoaudiologia', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_fono_octa_par'])->name('ficha.otro.prof.registrar_lab_octavo_par');

    Route::post('Ficha_Atencion/crear/fonoaudiologia/general', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_fono_lab_general'])->name('ficha.otro.prof.registrar_lab_general');

    Route::post('Ficha_Atencion/pdf/octavo_par', [App\Http\Controllers\OctavoParController::class, 'pdf_ficha_fono_octavo_par'])->name('ficha.otro.prof.generar_pdf_octavo_par');



    /** FONOAUDIOLOGIA AUDICION */

    Route::post('Ficha_Atencion/crear/fonoaudiologia/audicion', [App\Http\Controllers\FichaAtencionOtrosProfController::class, 'store_fono_audicion'])->name('ficha.otro.prof.registrar_ficha_fono_audicion');



    /*** RAYOS x */

    Route::post('Ficha_Atencion/crear/rayo', [App\Http\Controllers\FichaAtencionRayosController::class, 'store_fono_lab_rayos'])->name('ficha.otro.prof.registrar_lab_rayos');

	Route::get('examen/rayo/ver', [App\Http\Controllers\FichaAtencionRayosController::class, 'resultadosRayos'])->name('resultado.rayo.ver');



    /** profesional box */

    // Route::post('profesional/box/asignar', [App\Http\Controllers\FichaAtencionRayosController::class, 'resultadosRayos'])->name('resultado.rayo.ver');

    Route::get('lugar-atencion-box-profesional/ver', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'verRegistro'])->name('lugar_box_profesional.ver_registro');

    Route::get('lugar-atencion-box-profesional/ver/registros', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'verRegistros'])->name('lugar_box_profesional.ver_registros');

    Route::post('lugar-atencion-box-profesional/agregar', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'agregar'])->name('lugar_box_profesional.agregar');

    Route::post('lugar-atencion-box-profesional/modificar', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'modificar'])->name('lugar_box_profesional.modificar');

    Route::post('lugar-atencion-box-profesional/estado', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'estado'])->name('lugar_box_profesional.estado');

    Route::post('lugar-atencion-box-profesional/eliminar', [App\Http\Controllers\LugarAtencionBoxProfesionalController::class, 'eliminar'])->name('lugar_box_profesional.eliminar');



});

/**VER INFORME RAYOS */

Route::get('informe/rayo/{t}', [App\Http\Controllers\FichaAtencionRayosController::class, 'generarPdfInformeRayos'])->name('rayos.ver.informe.rayos');



/**--CENTRO MEDICO--**/

Route::group([

	'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Adm_Institucion|Ministerio|Profesional|AdministradorLaboratorio|Contador'],

    'prefix' => 'Administrador',

], function () {

    Route::get('/Inicio', [App\Http\Controllers\AdministradorCmController::class, 'index'])->name('adm_cm.home');

    Route::get('/Configuracion', [App\Http\Controllers\AdministradorCmController::class, 'configuracion'])->name('adm_cm.configuracion');

	Route::get('/Configuracion/comercial', [App\Http\Controllers\AdministradorCmController::class, 'perfiladm_conercial'])->name('adm_cm.configuracion_esc_comercial');

    Route::post('/Configuracion/perfil/datos/editar', [App\Http\Controllers\AdministradorCmController::class, 'editarDatosPerfil'])->name('adm_cm.editar_datos_perfil');

	Route::post('/Configuracion/perfil/datos/responsable/editar', [App\Http\Controllers\AdministradorCmController::class, 'editarDatosPerfilResponsable'])->name('adm_cm.editar_datos_perfil_responsable');

    Route::post('/Configuracion/perfil/datos/responsable_medico/editar', [App\Http\Controllers\AdministradorCmController::class, 'editarDatosPerfilResponsableMedico'])->name('adm_cm.editar_datos_perfil_responsable_medico');

	Route::get('/Configuracion/perfil/datos/personal/persona', [App\Http\Controllers\AdministradorCmController::class, 'cargaPersonalPersona'])->name('adm_cm.cargar_personal_persona');

	Route::post('/Configuracion/perfil/actualizar/personal/clave/centro', [App\Http\Controllers\AdministradorCmController::class, 'actualizarAccesoPersonal'])->name('adm_cm.actualizar_acceso_personal');

	Route::post('/registrar_especialidad', [App\Http\Controllers\AdministradorCmController::class, 'registrar_especialidad_cm'])->name('adm_cm.registrar_especialidad');

    Route::post('/editar_especialidad', [App\Http\Controllers\AdministradorCmController::class, 'editar_especialidad_cm'])->name('adm_cm.editar_especialidad');

	Route::post('/eliminar_especialidad', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_especialidad_cm'])->name('adm_cm.eliminar_especialidad');

    Route::post('/eliminar_otra_especialidad', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_otra_especialidad'])->name('adm_cm.eliminar_otra_especialidad');

    Route::get('/dame_especialidad/{id}', [App\Http\Controllers\AdministradorCmController::class, 'dame_especialidad'])->name('adm_cm.dame_especialidad');

    Route::get('/dame_area/{id}/{inst}', [App\Http\Controllers\AdministradorCmController::class, 'dame_area'])->name('adm_cm.dame_area');

    Route::post('/cambiar_estado_especialidad', [App\Http\Controllers\AdministradorCmController::class, 'cambiar_estado_especialidad'])->name('adm_cm.cambiar_estado_especialidad');

    Route::post('/editar_direccion_medica', [App\Http\Controllers\AdministradorCmController::class, 'editar_direccion_medica'])->name('adm_cm.editar_direccion_medica');

    Route::post('/eliminar_area_profesional', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_area_profesional'])->name('adm_cm.eliminar_area_profesional');

    Route::post('/eliminar_admin_cm', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_admin_cm'])->name('adm_cm.eliminar_admin_cm');

    Route::get('/Configuracion/perfil_cm', [App\Http\Controllers\AdministradorCmController::class, 'perfil'])->name('adm_cm.perfil_cm');

	Route::get('/Configuracion/departamentos_servicios', [App\Http\Controllers\AdministradorCmController::class, 'departamentos'])->name('adm_cm.departamentos_servicios');

    Route::post('/registrar_servicio', [App\Http\Controllers\AdministradorCmController::class, 'registrar_servicio'])->name('adm_cm.registrar_servicio');

    Route::post('/registrar_servicio_cm', [App\Http\Controllers\AdministradorCmController::class, 'registrar_servicio_cm'])->name('adm_cm.registrar_servicio_cm');

    Route::post('/eliminar_servicio_cm', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_servicio_cm'])->name('adm_cm.eliminar_servicio_cm');

    Route::get('/Estadisticas', [App\Http\Controllers\AdministradorCmController::class, 'estadisticas'])->name('adm_cm.estadisticas');



    Route::post('/procedimientos/institucion/registro', [App\Http\Controllers\ProcedimientosCentroController::class, 'registrar_r'])->name('adm_cm.procedimiento.registrar');

    Route::post('/procedimientos/institucion/modificar', [App\Http\Controllers\ProcedimientosCentroController::class, 'modificar_r'])->name('adm_cm.procedimiento.modificar');

    Route::post('/procedimientos/institucion/ver', [App\Http\Controllers\ProcedimientosCentroController::class, 'verRegistro_r'])->name('adm_cm.procedimiento.ver');

    Route::post('/procedimientos/institucion/registros', [App\Http\Controllers\ProcedimientosCentroController::class, 'verRegistros_r'])->name('adm_cm.procedimiento.registros');



	Route::get('/Profesionales', [App\Http\Controllers\AdministradorCmController::class, 'profesionales'])->name('adm_cm.profesionales');

    Route::get('/Profesionales/{id}', [App\Http\Controllers\AdministradorCmController::class, 'profesionales_id'])->name('adm_cm.profesionales_id');

    Route::get('/Profesionales_institucion', [App\Http\Controllers\AdministradorCmController::class, 'profesionales_institucion'])->name('adm_cm.profesionales_institucion');

    Route::get('/Mis/Profesionales', [App\Http\Controllers\AdministradorCmController::class, 'adm_inst_mis_profesionales'])->name('adm_cm.mis_profesionales');

	Route::post('/Profesionales/asociar/existente', [App\Http\Controllers\AdministradorCmController::class, 'asociarProfesionalExistente'])->name('adm_cm.asociar_profesional_existente');

	Route::post('/Profesionales/asociar/nuevo', [App\Http\Controllers\AdministradorCmController::class, 'asociarProfesionalNuevo'])->name('adm_cm.asociar_profesional_nuevo');

	Route::get('/Profesionales/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_profesional'])->name('adm_cm.profesional_buscar');

    Route::get('/Administrativo/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_administrativo'])->name('adm_cm.administrativo_buscar');

    Route::get('/Mantencion/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_mantencion'])->name('adm_cm.mantencion_buscar');

    Route::post('/Administrativo/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarAdministrativo'])->name('adm_cm.administrativo_editar');



    Route::get('/Profesional/lugar_atencion/horario', [App\Http\Controllers\AdministradorCmController::class, 'mi_horario_lugar_atencion'])->name('adm_cm.prof_horario_lugar_atencion');

	Route::post('/Personal/registro', [App\Http\Controllers\ManejoContratoController::class, 'registrarPersonal'])->name('adm_cm.registrar_personal');

	Route::post('/Personal/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarPersonal'])->name('adm_cm.editar_personal');

    Route::post('/Profesional/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarProfesional'])->name('adm_cm.editar_profesional');

    Route::post('/Mantencion/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarMantencion'])->name('adm_cm.editar_mantencion');

	Route::post('/Personal/horario/editar', [App\Http\Controllers\ManejoContratoController::class, 'modificarHorario'])->name('adm_cm.personal.horario.editar');

	Route::get('/profesionales/liquidacion', [App\Http\Controllers\AdministradorCmController::class, 'adm_liquidacion_profesionales'])->name('adm_cm.liquidacion_profesionales');

    Route::post('/profesional/liquidacion',[App\Http\Controllers\AdministradorCmController::class,'adm_liquidacion_profesional'])->name('adm_cm.liquidacion_profesional');

	Route::get('/liquidacion_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'liquidacion_profesionales'])->name('app.adm_cm.liquidacion_profesionales');

	Route::post('/Personal/finalizar', [App\Http\Controllers\ManejoContratoController::class, 'desasociarPersonalAsistente'])->name('adm_cm.personal.finalizar');

	Route::post('/Profesional/finalizar', [App\Http\Controllers\ManejoContratoController::class, 'desasociarPersonalProfesional'])->name('adm_cm.personal.finalizar_profesional');

    Route::post('/OtrosProfesional/finalizar', [App\Http\Controllers\ManejoContratoController::class, 'desasociarPersonalOtrosProfesionales'])->name('adm_cm.personal.finalizar_otros_profesionales');



	Route::get('/liquidacion_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'liquidacion_profesionales'])->name('app.adm_cm.liquidacion_profesionales');



	Route::get('/Personal', [App\Http\Controllers\AdministradorCmController::class, 'personal'])->name('adm_cm.personal');

	Route::get('/Personal/Asistente', [App\Http\Controllers\AdministradorCmController::class, 'personal_asistentes'])->name('adm_cm.personal.asistente');

    Route::get('/Personal/Asistente/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_asistente'])->name('adm_cm.asistente_buscar');

    Route::get('/Personal/lugar_atencion/contrato/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verContratoEmpleado'])->name('adm_cm.empleado_contrato_lugar_atencion');

    Route::get('/Personal/lugar_atencion/horario/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verHorarioEmpleado'])->name('adm_cm.empleado_horario_lugar_atencion');

    Route::get('/Administrativo/lugar_atencion/horario/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verHorarioEmpleadoAdmin'])->name('adm_cm.empleado_admin_horario_lugar_atencion');

    Route::get('/Mantenimiento/lugar_atencion/horario/buscar', [App\Http\Controllers\ManejoContratoController::class, 'verHorarioEmpleadoMantencion'])->name('adm_cm.empleado_mantencion_horario_lugar_atencion');

    Route::post('/Personal/asistente/modificar/permisos', [App\Http\Controllers\AdministradorCmController::class, 'modificar_rol_asistente'])->name('adm_cm.personal.asistente.actualizar.rol');



	Route::get('/Pacientes', [App\Http\Controllers\AdministradorCmController::class, 'adm_buscar_pacientes'])->name('adm_cm.pacientes');



	Route::get('/Adm_medico', [App\Http\Controllers\AdministradorCmController::class, 'adm_medico'])->name('adm_cm.adm_medico');

    Route::get('/Adm_medico/{id}', [App\Http\Controllers\AdministradorCmController::class, 'adm_medico_id'])->name('adm_cm.adm_medico_id');

    Route::get('/Proveedores', [App\Http\Controllers\AdministradorCmController::class, 'proveedores'])->name('adm_cm.proveedores');

    // Route::get('/Gastos', [App\Http\Controllers\AdministradorCmController::class, 'gastos'])->name('adm_cm.gastos');

	Route::get('/At_profesionales', [App\Http\Controllers\AdministradorCmController::class, 'at_profesionales'])->name('adm_cm.at_profesionales');



    Route::get('/Pagos', [App\Http\Controllers\AdministradorCmController::class, 'pagos'])->name('adm_cm.pagos');

    Route::get('/Laboratorios', [App\Http\Controllers\AdministradorCmController::class, 'laboratorio'])->name('adm_cm.laboratorio');

	Route::get('/Vacunatorio', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio'])->name('adm_cm.vacunatorio');

    Route::get('/Cei', [App\Http\Controllers\AdministradorCmController::class, 'centro_enfermeria_integral'])->name('adm_cm.centro_enfermeria_integral');

    Route::get('/Cei/cei_pedidos', [App\Http\Controllers\AdministradorCmController::class, 'cei_pedidos'])->name('app.centro_enfermeria_integral.cei_pedidos');

    Route::get('/Cei/cei__felicitreclamos', [App\Http\Controllers\AdministradorCmController::class, 'cei_felicitreclamos'])->name('adm_cm.cei_felicitreclamos');

	// Route::get('/Vacunatorio/vacunatorio_instalaciones', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_instalaciones'])->name('adm_cm.vacunatorio_instalaciones');

	Route::get('/Vacunatorio/vacunatorio_pedidos', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_pedidos'])->name('vacunatorio.vacunatorio_pedidos');

	// Route::get('/Vacunatorio/vacunatorio_personal', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_personal'])->name('adm_cm.vacunatorio_personal');

	Route::get('/Vacunatorio/vacunatorio_felicitreclamos', [App\Http\Controllers\AdministradorCmController::class, 'vacunatorio_felicitreclamos'])->name('app.adm_cm.centro_enfermeria_integral_felicitreclamos');

    Route::get('/Laboratorios/Examenes', [App\Http\Controllers\AdministradorCmController::class, 'examenes'])->name('adm_cm.examenes');

    Route::get('/Laboratorios/Agregar', [App\Http\Controllers\AdministradorCmController::class, 'laboratorio_agregar'])->name('adm_cm.laboratorio_agregar');

    Route::get('/Laboratorios/Procedimientos', [App\Http\Controllers\AdministradorCmController::class, 'procedimientos'])->name('adm_cm.procedimientos');

    Route::get('/Laboratorios/Sucursales', [App\Http\Controllers\AdministradorCmController::class, 'sucursales_cm'])->name('adm_cm.sucursales_cm');



    Route::get('/Administracion', [App\Http\Controllers\AdministradorCmController::class, 'administracion_cm'])->name('adm_cm.administracion_cm');

    Route::get('/Administracion/Comercial', [App\Http\Controllers\AdministradorCmController::class, 'areaComercial'])->name('adm_cm.area_comercial');

    Route::get('/Administracion/Contratos', [App\Http\Controllers\AdministradorCmController::class, 'areaContratosNuevos'])->name('adm_cm.area_contratos_nuevos');

    Route::post('/Administracion/Contratos/registrar', [App\Http\Controllers\ContratoDependienteController::class, 'registrar'])->name('adm_cm.contrato.registrar');

    Route::get('/Administracion/Comercial/sueldos', [App\Http\Controllers\AdministradorCmController::class, 'sueldos'])->name('adm_cm.sueldos');

    Route::post('/Administracion/Comercial/remuneracion/registrar', [App\Http\Controllers\RemuneracionesController::class, 'registrar'])->name('adm_cm.remuneracion.registrar');

    Route::post('/Administracion/Comercial/remuneracion/registrar/profesional', [App\Http\Controllers\RemuneracionesController::class, 'registrarProfesional'])->name('adm_cm.remuneracion.registrar_profesional');

    Route::post('/Administracion/Comercial/remuneracion/pagada', [App\Http\Controllers\RemuneracionesController::class, 'pagada'])->name('adm_cm.remuneracion.pagada');

    Route::post('/Administracion/Comercial/registrar/multicaja', [App\Http\Controllers\RemuneracionesController::class, 'registrarMulticaja'])->name('adm_cm.registrar_multicaja');

	/** CONTABILIDAD */

    Route::get('/Contabilidad',[App\Http\Controllers\ContabilidadController::class, 'index'])->name('contabilidad.home');

    Route::get('/Contabilidad/LibroContable', [App\Http\Controllers\AdministradorCmController::class, 'ContadorLibroContable'])->name('contabilidad.secciones_contabilidad.contable');

    Route::get('/Contabilidad/Liquidaciones', [App\Http\Controllers\AdministradorCmController::class, 'ContadorLiquidaciones'])->name('contabilidad.secciones_contabilidad.liquidaciones');

    Route::get('/Contabilidad/Remuneraciones', [App\Http\Controllers\AdministradorCmController::class, 'ContadorRemuneraciones'])->name('contabilidad.secciones_contabilidad.remuneraciones');

    Route::get('/Contabilidad/Info/personal', [App\Http\Controllers\AdministradorCmController::class, 'ContadorSueldos'])->name('contabilidad.secciones_contabilidad.info-pago_sueldos');

    Route::get('/Contabilidad/Recursos/Humanos', [App\Http\Controllers\AdministradorCmController::class, 'ContadorRrHh'])->name('contabilidad.secciones_contabilidad.rrhh');

    Route::get('/Contabilidad/Facturar', [App\Http\Controllers\AdministradorCmController::class, 'ContadorFacturas'])->name('contabilidad.secciones_contabilidad.factura');

    Route::get('/Contabilidad/Ingresos', [App\Http\Controllers\ComprasController::class, 'index'])->name('contabilidad.secciones_contabilidad.ingresos');

    Route::get('/Contabilidad/Egresos', [App\Http\Controllers\AdministradorCmController::class, 'ContadorEgresos'])->name('contabilidad.secciones_contabilidad.egresos');

    Route::get('/Administracion/Contabilidad', [App\Http\Controllers\AdministradorCmController::class, 'areaContabilidad'])->name('adm_cm.area_contabilidad');

    Route::get('/Administracion/Bodega', [App\Http\Controllers\AdministradorCmController::class, 'areaBodega'])->name('adm_cm.area_bodega');

    Route::get('/Administracion/Estadistica', [App\Http\Controllers\AdministradorCmController::class, 'areaEstadistica'])->name('adm_cm.area_estadistica');

    Route::get('/Administracion/Insumos', [App\Http\Controllers\AdministradorCmController::class, 'insumos'])->name('adm_cm.insumos');

    Route::get('/historial_mensajes_profesional/{id}', [App\Http\Controllers\AdministradorCmController::class, 'historial_mensajes_profesional'])->name('adm_cm.historial_mensajes_profesional');

	Route::get('/Administrador/ciudad/buscar', [App\Http\Controllers\AdministradorCmController::class, 'buscar_ciudad_region'])->name('adm_cm.buscar_ciudad_region');



    Route::post('/mensaje_profesional', [App\Http\Controllers\AdministradorCmController::class, 'mensaje_profesional'])->name('mensaje_profesional');

    Route::post('/mensaje_difusion', [App\Http\Controllers\AdministradorCmController::class, 'mensaje_difusion'])->name('mensaje_difusion');

    Route::post('/mensaje_difusion_ministerio', [App\Http\Controllers\AdministradorCmController::class, 'mensaje_difusion_ministerio'])->name('mensaje_difusion_ministerio');

    /** CAMBIO CONTRASEÑA DEL RESPONSABLE */

    Route::get('/Administrador/responsable/contrasena/cambio', [App\Http\Controllers\AdministradorCmController::class, 'cambioContrasenaPerfilResponsable'])->name('adm_cm.cambio_contrasena_responsable');



    Route::get('/invitacion/buscar/informacion', [App\Http\Controllers\InvitacionController::class, 'cambioContrasenaPerfilResponsable'])->name('invitaciones.buscar.info');



	/** FLUJO DE CAJA */

    Route::get('/flujo_caja', [App\Http\Controllers\FlujoCajaController::class, 'cargaRendicionCmAdm'])->name('flujo.caja.index');



    /** Contrato dependiente */

    Route::get('/contrato/dependiente/ver', [App\Http\Controllers\ContratoDependienteController::class, 'verRegistro'])->name('adm_cm.contrato.dependiente.ver');



/** FOTO DE PERFIL */

    Route::post('/Administracion/actualizar-foto', [App\Http\Controllers\AdministradorCmController::class, 'actualizarFoto'])->name('adm_cm.actualizar.foto');

    Route::post('/Administracion/eliminar-foto', [App\Http\Controllers\AdministradorCmController::class, 'eliminarFoto'])->name('adm_cm.eliminar.foto');



    /** admin Comercial */

    Route::get('/comercial/escritorio', [App\Http\Controllers\AdministradorCmController::class, 'escritorioAdminComercial'])->name('administrador_comercial.home');

    Route::get('/comercial/configuracion', [App\Http\Controllers\AdministradorCmController::class, 'configuracion_comercial'])->name('administrador_comercial.configuracion');



    /** FLUJO DE CAJA */

    // Route::get('/comercial/flujo_caja', [App\Http\Controllers\FlujoCajaController::class, 'cargaRendicionCmAdm'])->name('adm_cm.comercial.flujo.caja.index');



    Route::post('dame_profesional_cm', [App\Http\Controllers\AdministradorCmController::class, 'dame_profesional'])->name('adm_cm.dame_profesional_cm');

    Route::post('editar_cuenta_bancaria_institucion',[App\Http\Controllers\AdministradorCmController::class, 'editar_cuenta_bancaria_institucion'])->name('adm_cm.editar_cuenta_bancaria_institucion');

    Route::post('agregar_cuenta_bancaria_institucion',[App\Http\Controllers\AdministradorCmController::class, 'agregar_cuenta_bancaria_institucion'])->name('adm_cm.agregar_cuenta_bancaria_institucion');

    Route::post('eliminar_cuenta_bancaria_institucion',[App\Http\Controllers\AdministradorCmController::class, 'eliminar_cuenta_bancaria_institucion'])->name('adm_cm.eliminar_cuenta_bancaria_institucion');



    Route::post('registrar_profesional', [App\Http\Controllers\ManejoContratoController::class, 'registrarProfesional'])->name('adm_cm.registrar_profesional');

    Route::post('registrar_profesional_convenio', [App\Http\Controllers\ManejoContratoController::class, 'registrarProfesionalConvenio'])->name('adm_cm.liquidar_profesional');

    Route::post('registrar_asistente', [App\Http\Controllers\AdministradorCmController::class, 'registrar_asistente'])->name('adm_cm.registrar_asistente');

    Route::post('eliminar_asistente', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_asistente'])->name('adm_cm.eliminar_asistente');

    Route::post('registrar_personal_mantencion', [App\Http\Controllers\AdministradorCmController::class, 'registrar_personal_mantencion'])->name('adm_cm.registrar_personal_mantencion');

    Route::post('eliminar_personal_mantencion', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_personal_mantencion'])->name('adm_cm.eliminar_personal_mantencion');

    /** CONVENIOS */

    Route::post('dame_convenio', [App\Http\Controllers\AdministradorCmController::class, 'dame_convenio'])->name('adm_cm.dame_convenio');

    Route::post('dame_convenio_profesional', [App\Http\Controllers\AdministradorCmController::class, 'dame_convenio_profesional'])->name('adm_cm.dame_convenio_profesional');

    Route::post('registrar_convenio', [App\Http\Controllers\AdministradorCmController::class, 'registrar_convenio'])->name('adm_cm.convenio_nuevo');

    Route::post('eliminar_convenio', [App\Http\Controllers\AdministradorCmController::class, 'eliminar_convenio'])->name('adm_cm.eliminar_convenio');

    Route::post('editar_convenio', [App\Http\Controllers\AdministradorCmController::class, 'editar_convenio'])->name('adm_cm.editar_convenio');

    /** SOLICITUDES PENDIENTES */

    Route::get('solicitudes_pendientes', [App\Http\Controllers\AdministradorCmController::class, 'solicitudes_pendientes'])->name('adm_cm.solicitudes_pendientes');

    Route::post('ver_solicitud', [App\Http\Controllers\AdministradorCmController::class, 'ver_solicitud'])->name('adm_cm.ver_solicitud');

    /** CONTROLES DE ALMACENAMIENTO */

    Route::get('controles_almacenamiento', [App\Http\Controllers\AdministradorCmController::class, 'controles_almacenamiento'])->name('adm_cm.controles_almacenamiento');

    Route::post('agregar_area_cm',[App\Http\Controllers\AdministradorCmController::class, 'agregar_area_cm'])->name('adm_cm.agregar_area_cm');

    Route::post('editar_area_cm',[App\Http\Controllers\AdministradorCmController::class, 'editar_area_cm'])->name('adm_cm.editar_area_cm');

    Route::post('asignar_profesionales_area',[App\Http\Controllers\AdministradorCmController::class, 'asignar_profesionales_area'])->name('adm_cm.asignar_profesionales_area');



	// Sala de espera

    Route::get('sala-espera/ver', [App\Http\Controllers\SalaEsperaController::class, 'verRegistro'])->name('sala_espera.ver_registro');

    Route::get('sala-espera/ver/registros', [App\Http\Controllers\SalaEsperaController::class, 'verRegistros'])->name('sala_espera.ver_registros');

    Route::post('sala-espera/agregar', [App\Http\Controllers\SalaEsperaController::class, 'agregar'])->name('sala_espera.agregar');

    Route::post('sala-espera/modificar', [App\Http\Controllers\SalaEsperaController::class, 'modificar'])->name('sala_espera.modificar');

    Route::post('sala-espera/estado', [App\Http\Controllers\SalaEsperaController::class, 'estado'])->name('sala_espera.estado');

    Route::post('sala-espera/eliminar', [App\Http\Controllers\SalaEsperaController::class, 'eliminar'])->name('sala_espera.eliminar');



    // Rutas para SalaEsperaBox

    Route::get('sala-espera-box/ver', [App\Http\Controllers\SalaEsperaBoxController::class, 'verRegistro'])->name('box_sala.ver_registro');

    Route::get('sala-espera-box/ver/registros', [App\Http\Controllers\SalaEsperaBoxController::class, 'verRegistros'])->name('box_sala.ver_registros');

    Route::post('sala-espera-box/agregar', [App\Http\Controllers\SalaEsperaBoxController::class, 'agregar'])->name('box_sala.agregar');

    Route::post('sala-espera-box/modificar', [App\Http\Controllers\SalaEsperaBoxController::class, 'modificar'])->name('box_sala.modificar');

    Route::post('sala-espera-box/eliminar', [App\Http\Controllers\SalaEsperaBoxController::class, 'eliminar'])->name('box_sala.eliminar');

    Route::post('sala-espera-box/estado', [App\Http\Controllers\SalaEsperaBoxController::class, 'estado'])->name('box_sala.estado');



    // Rutas para Televisor

    Route::get('television/ver', [App\Http\Controllers\TelevisorController::class, 'verRegistro'])->name('television.ver_registro');

    Route::get('television/ver/registros', [App\Http\Controllers\TelevisorController::class, 'verRegistros'])->name('television.ver_registros');

    Route::post('television/agregar', [App\Http\Controllers\TelevisorController::class, 'agregar'])->name('television.agregar');

    Route::post('television/modificar', [App\Http\Controllers\TelevisorController::class, 'modificar'])->name('television.modificar');

    Route::post('television/estado', [App\Http\Controllers\TelevisorController::class, 'estado'])->name('television.estado');

    Route::post('television/eliminar', [App\Http\Controllers\TelevisorController::class, 'eliminar'])->name('television.eliminar');



});



/** NUEVO */

/**--HOSPITAL DOMICILIARIO--**/

Route::group([

	'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Adm_Institucion|Ministerio|Profesional|AdministradorLaboratorio'],

    'prefix' => 'AdministradorHospitalAmbulatorio',

], function () {

    Route::get('/Inicio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'index'])->name('adm_hospital_ambulatorio.home');

    Route::get('/Configuracion', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'configuracion'])->name('adm_hospital_ambulatorio.configuracion');



    Route::get('/Configuracion/comercial', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'perfiladm_conercial'])->name('adm_hospital_ambulatorio.configuracion_esc_comercial');

    Route::post('/Configuracion/perfil/datos/editar', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'editarDatosPerfil'])->name('adm_hospital_ambulatorio.editar_datos_perfil');

	Route::post('/Configuracion/perfil/datos/responsable/editar', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'editarDatosPerfilResponsable'])->name('adm_hospital_ambulatorio.editar_datos_perfil_responsable');

    Route::post('/Configuracion/perfil/datos/responsable_medico/editar', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'editarDatosPerfilResponsableMedico'])->name('adm_hospital_ambulatorio.editar_datos_perfil_responsable_medico');

	Route::get('/Configuracion/perfil/datos/personal/persona', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'cargaPersonalPersona'])->name('adm_hospital_ambulatorio.cargar_personal_persona');

	Route::post('/Configuracion/perfil/actualizar/personal/clave/centro', [App\Http\Controllers\AdministradorCmController::class, 'actualizarAccesoPersonal'])->name('adm_hospital_ambulatorio.actualizar_acceso_personal');

	Route::post('/registrar_especialidad', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'registrar_especialidad_cm'])->name('adm_hospital_ambulatorio.registrar_especialidad');

    Route::post('/editar_especialidad', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'editar_especialidad_cm'])->name('adm_hospital_ambulatorio.editar_especialidad');

	Route::post('/eliminar_especialidad', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'eliminar_especialidad_cm'])->name('adm_hospital_ambulatorio.eliminar_especialidad');

    Route::post('/eliminar_otra_especialidad', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'eliminar_otra_especialidad'])->name('adm_hospital_ambulatorio.eliminar_otra_especialidad');

    Route::get('/dame_especialidad/{id}', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'dame_especialidad'])->name('adm_hospital_ambulatorio.dame_especialidad');

    Route::get('/dame_area/{id}/{inst}', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'dame_area'])->name('adm_hospital_ambulatorio.dame_area');

    Route::post('/cambiar_estado_especialidad', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'cambiar_estado_especialidad'])->name('adm_hospital_ambulatorio.cambiar_estado_especialidad');

    Route::post('/editar_direccion_medica', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'editar_direccion_medica'])->name('adm_hospital_ambulatorio.editar_direccion_medica');

    Route::post('/eliminar_area_profesional', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'eliminar_area_profesional'])->name('adm_hospital_ambulatorio.eliminar_area_profesional');

    Route::post('/eliminar_admin_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'eliminar_admin_cm'])->name('adm_hospital_ambulatorio.eliminar_admin_cm');

    Route::get('/Configuracion/perfil_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'perfil'])->name('adm_hospital_ambulatorio.perfil_cm');

	Route::get('/Configuracion/departamentos_servicios', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'departamentos'])->name('adm_hospital_ambulatorio.departamentos_servicios');

    Route::post('/registrar_servicio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'registrar_servicio'])->name('adm_hospital_ambulatorio.registrar_servicio');

    Route::post('/registrar_servicio_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'registrar_servicio_cm'])->name('adm_hospital_ambulatorio.registrar_servicio_cm');

    Route::post('/eliminar_servicio_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'eliminar_servicio_cm'])->name('adm_hospital_ambulatorio.eliminar_servicio');

    Route::get('/Estadisticas', [App\Http\Controllers\AdministradorHospitalAmbulatorioController::class, 'estadisticas'])->name('adm_hospital_ambulatorio.estadisticas');



});



/**--HOSPITAL --**/

Route::group([

	'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Adm_Institucion|Ministerio|Profesional|AdministradorLaboratorio'],

    'prefix' => 'AdministradorHospital',

], function () {

    Route::get('/Inicio', [App\Http\Controllers\AdministradorHospitalController::class, 'index'])->name('adm_hospital.home');

    Route::get('/Configuracion', [App\Http\Controllers\AdministradorHospitalController::class, 'configuracion'])->name('adm_hospital.configuracion');



    Route::get('/Configuracion/comercial', [App\Http\Controllers\AdministradorHospitalController::class, 'perfiladm_conercial'])->name('adm_hospital.configuracion_esc_comercial');

    Route::post('/Configuracion/perfil/datos/editar', [App\Http\Controllers\AdministradorHospitalController::class, 'editarDatosPerfil'])->name('adm_hospital.editar_datos_perfil');

	Route::post('/Configuracion/perfil/datos/responsable/editar', [App\Http\Controllers\AdministradorHospitalController::class, 'editarDatosPerfilResponsable'])->name('adm_hospital.editar_datos_perfil_responsable');

    Route::post('/Configuracion/perfil/datos/responsable_medico/editar', [App\Http\Controllers\AdministradorHospitalController::class, 'editarDatosPerfilResponsableMedico'])->name('adm_hospital.editar_datos_perfil_responsable_medico');

	Route::get('/Configuracion/perfil/datos/personal/persona', [App\Http\Controllers\AdministradorHospitalController::class, 'cargaPersonalPersona'])->name('adm_hospital.cargar_personal_persona');

	Route::post('/Configuracion/perfil/actualizar/personal/clave/centro', [App\Http\Controllers\AdministradorHospitalController::class, 'actualizarAccesoPersonal'])->name('adm_hospital.actualizar_acceso_personal');

	Route::post('/registrar_especialidad', [App\Http\Controllers\AdministradorHospitalController::class, 'registrar_especialidad_cm'])->name('adm_hospital.registrar_especialidad');

    Route::post('/editar_especialidad', [App\Http\Controllers\AdministradorHospitalController::class, 'editar_especialidad_cm'])->name('adm_hospital.editar_especialidad');

	Route::post('/eliminar_especialidad', [App\Http\Controllers\AdministradorHospitalController::class, 'eliminar_especialidad_cm'])->name('adm_hospital.eliminar_especialidad');

    Route::post('/eliminar_otra_especialidad', [App\Http\Controllers\AdministradorHospitalController::class, 'eliminar_otra_especialidad'])->name('adm_hospital.eliminar_otra_especialidad');

    Route::get('/dame_especialidad/{id}', [App\Http\Controllers\AdministradorHospitalController::class, 'dame_especialidad'])->name('adm_hospital.dame_especialidad');

    Route::get('/dame_area/{id}/{inst}', [App\Http\Controllers\AdministradorHospitalController::class, 'dame_area'])->name('adm_hospital.dame_area');

    Route::post('/cambiar_estado_especialidad', [App\Http\Controllers\AdministradorHospitalController::class, 'cambiar_estado_especialidad'])->name('adm_hospital.cambiar_estado_especialidad');

    Route::post('/editar_direccion_medica', [App\Http\Controllers\AdministradorHospitalController::class, 'editar_direccion_medica'])->name('adm_hospital.editar_direccion_medica');

    Route::post('/eliminar_area_profesional', [App\Http\Controllers\AdministradorHospitalController::class, 'eliminar_area_profesional'])->name('adm_hospital.eliminar_area_profesional');

    Route::post('/eliminar_admin_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalController::class, 'eliminar_admin_cm'])->name('adm_hospital.eliminar_admin_cm');

    Route::get('/Configuracion/perfil_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalController::class, 'perfil'])->name('adm_hospital.perfil_cm');

	Route::get('/Configuracion/departamentos_servicios', [App\Http\Controllers\AdministradorHospitalController::class, 'departamentos'])->name('adm_hospital.departamentos_servicios');

    Route::post('/registrar_servicio', [App\Http\Controllers\AdministradorHospitalController::class, 'registrar_servicio'])->name('adm_hospital.registrar_servicio');

    Route::post('/registrar_servicio_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalController::class, 'registrar_servicio_cm'])->name('adm_hospital.registrar_servicio_cm');

    Route::post('/eliminar_servicio_hosp_ambulatorio', [App\Http\Controllers\AdministradorHospitalController::class, 'eliminar_servicio_cm'])->name('adm_hospital.eliminar_servicio');

    Route::get('/Estadisticas', [App\Http\Controllers\AdministradorHospitalController::class, 'estadisticas'])->name('adm_hospital.estadisticas');

    Route::get('/Adm_medico', [App\Http\Controllers\AdministradorHospitalController::class, 'adm_medico'])->name('adm_hospital.adm_medico');

    Route::get('/Administracion/Contratos', [App\Http\Controllers\AdministradorHospitalController::class, 'areaContratosNuevos'])->name('adm_hospital.area_contratos_nuevos');

    Route::post('/Administracion/Contratos/registrar', [App\Http\Controllers\ContratoDependienteController::class, 'registrar'])->name('adm_hospital.contrato.registrar');

    Route::get('/Administracion/Comercial', [App\Http\Controllers\AdministradorHospitalController::class, 'areaComercial'])->name('adm_hospital.area_comercial');

    Route::get('/Profesionales_institucion', [App\Http\Controllers\AdministradorHospitalController::class, 'profesionales_institucion'])->name('adm_hospital.profesionales_institucion');

	Route::post('/Profesionales/asociar/nuevo', [App\Http\Controllers\AdministradorHospitalController::class, 'asociarProfesionalNuevo'])->name('adm_hospital.asociar_profesional_nuevo');

	Route::get('/Profesionales/buscar', [App\Http\Controllers\AdministradorHospitalController::class, 'buscar_profesional'])->name('adm_hospital.profesional_buscar');

    Route::get('/Administrativo/buscar', [App\Http\Controllers\AdministradorHospitalController::class, 'buscar_administrativo'])->name('adm_hospital.administrativo_buscar');

    Route::get('/Mantencion/buscar', [App\Http\Controllers\AdministradorHospitalController::class, 'buscar_mantencion'])->name('adm_hospital.mantencion_buscar');

    Route::post('/Administrativo/editar', [App\Http\Controllers\ManejoContratoController::class, 'editarAdministrativo'])->name('adm_hospital.administrativo_editar');

    Route::get('/Mis/Profesionales', [App\Http\Controllers\AdministradorHospitalController::class, 'adm_inst_mis_profesionales'])->name('adm_hospital.mis_profesionales');

    Route::get('/Pacientes', [App\Http\Controllers\AdministradorHospitalController::class, 'adm_buscar_pacientes'])->name('adm_hospital.pacientes');

    Route::get('/Personal', [App\Http\Controllers\AdministradorHospitalController::class, 'personal'])->name('adm_hospital.personal');

    Route::post('/Administracion/Salas/Guardar',[App\Http\Controllers\AdministradorHospitalController::class,'guardar_salas_servicio'])->name('adm_hospital.guardar_salas_servicio');

    Route::post('/Administracion/Camas/Guardar',[App\Http\Controllers\AdministradorHospitalController::class,'guardar_camas_servicio'])->name('adm_hospital.guardar_camas_servicio');

    Route::post('/Administracion/Servicios/editar',[App\Http\Controllers\AdministradorHospitalController::class,'editar_servicio'])->name('adm_hospital.editar_servicio');

    Route::post('/Profesionales/asociar/existente', [App\Http\Controllers\AdministradorHospitalController::class, 'asociarProfesionalExistente'])->name('adm_hospital.asociar_profesional_existente');

    Route::post('/Profesionales/desasociar/existente',[App\Http\Controllers\AdministradorHospitalController::class,'desasociarProfesionalExistente'])->name('adm_hospital.desasociar_profesional_existente');

    Route::post('/Pacientes/registrar',[App\Http\Controllers\AdministradorHospitalController::class,'registrarPaciente'])->name('adm_hospital.registrar_paciente_servicio');

    Route::post('/Administracion/Salas/Camas',[App\Http\Controllers\AdministradorHospitalController::class,'dameSalasCamas'])->name('adm_hospital.dame_camas_sala');

    Route::post('/Pacientes/Agendar',[App\Http\Controllers\AdministradorHospitalController::class,'agendarPacienteNuevo'])->name('adm_hospital.agendar_hora_nuevo_paciente_servicio');

    Route::get('/buscar_rut', [App\Http\Controllers\AdministradorHospitalController::class, 'buscar_rut_paciente'])->name('adm_hospital.buscar_rut_paciente');

    Route::post('/Profesional/Asignar/Atencion',[App\Http\Controllers\AdministradorHospitalController::class, 'asignarProfesionalAtencion'])->name('adm_hospital.asignar_profesional_atencion');

    Route::get('/Pacientes/Sacar/{id}',[App\Http\Controllers\AdministradorHospitalController::class, 'sacarPacienteCama'])->name('adm_hospital.sacar_paciente_cama');

    Route::get('/Paciente/atencion', [App\Http\Controllers\AdministradorHospitalController::class, 'atencion'])->name('adm_hospital.atencion');

    Route::post('/Paciente/cambiar_estado_paciente_triage', [App\Http\Controllers\AdministradorHospitalController::class, 'cambiar_estado_paciente_triage'])->name('adm_hospital.cambiar_estado_paciente_triage');

    Route::post('/Salas/clave1', [App\Http\Controllers\AdministradorHospitalController::class, 'clave1'])->name('adm_hospital.clave1');

    Route::post('/Paciente/Registrar/evolucion',[App\Http\Controllers\AdministradorHospitalController::class, 'registrar_evolucion_paciente_hosp'])->name('adm_hospital.registrar_evolucion_paciente_hosp');

    Route::post('/agregar_observaciones_tratamiento', [App\Http\Controllers\AdministradorHospitalController::class, 'agregar_observaciones_tratamiento'])->name('adm_hospital.agregar_observaciones_tratamiento');

    Route::post('cambiar_estado_tratamiento', [App\Http\Controllers\AdministradorHospitalController::class, 'cambiar_estado_tratamiento'])->name('adm_hospital.cambiar_estado_tratamiento');

    Route::post('profesional/mostrar_nueva_evolucion_paciente', [App\Http\Controllers\AdministradorHospitalController::class, 'mostrar_nueva_evolucion_paciente_profesional'])->name('adm_hospital.mostrar_nueva_evolucion_paciente');

});



Route::get('/dosis/get', [App\Http\Controllers\UtilsController::class, 'getDosis'])->name('dosis.get');

    /** MEDICAMENTOS */

    Route::post('/autocomplete', [App\Http\Controllers\UtilsController::class, 'autocomplete'])->name('autocompletar.medicamento');

    Route::post('/medicamentos/get', [App\Http\Controllers\UtilsController::class, 'getArticulo'])->name('medicamentos.get');



     /** EXAMEN MEDICO */

     Route::get('/examen/medico/get', [App\Http\Controllers\ExamenMedicoController::class, 'get_examen'])->name('examen.medico.get');

     Route::get('/examen/medico/sub/tipo/get', [App\Http\Controllers\ExamenMedicoController::class, 'get_sub_tipo_examen'])->name('examen.medico.sub_tipo_examen.get');

     Route::get('/examen/medico/buscar/get', [App\Http\Controllers\ExamenMedicoController::class, 'buscar_examen'])->name('examen.medico.buscar.examen.get');

     Route::post('/examen/indicar_examen_cirugia', [App\Http\Controllers\ExamenMedicoController::class, 'indicar_examen_cirugia'])->name('examen.indicar_examen_cirugia');

     Route::post('/examen/eliminar_examen_cirugia', [App\Http\Controllers\ExamenMedicoController::class, 'eliminar_examen_cirugia'])->name('examen.eliminar_examen_cirugia');



    /** EXAMEN MEDICO HOSPITALIZACION */

    Route::post('/examen/indicar_examen_hosp', [App\Http\Controllers\ExamenMedicoController::class, 'indicar_examen_hosp'])->name('examen.indicar_examen_hosp');

    Route::get('/examen/eliminar_examen_hosp', [App\Http\Controllers\ExamenMedicoController::class, 'eliminar_examen_hosp'])->name('examen.eliminar_examen_hosp');

    Route::get('/examen/examenes_hosp',[App\Http\Controllers\ExamenMedicoController::class, 'dame_examenes_hosp'])->name('examen.dame_examenes_hosp');



     /** FRECUENCIA MEDICAMENTO */

 Route::get('/frecuencia/get', [App\Http\Controllers\UtilsController::class, 'getFrecuencia'])->name('frecuencia.get');

 Route::get('/presentacion/get', [App\Http\Controllers\UtilsController::class, 'getCantComp'])->name('presentacion.get');



 Route::post('/finalizar_atencion', [App\Http\Controllers\AdministradorHospitalController::class, 'finalizarAtencion'])->name('profesional.finalizar_atencion');





Route::post('enfermeria/agregar_evolucion_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'agregar_evolucion_paciente'])->name('enfermeria.agregar_evolucion_paciente');

Route::post('/mostrar_nueva_evolucion_paciente', [App\Http\Controllers\EscritorioEnfermerasController::class, 'mostrar_nueva_evolucion_paciente'])->name('enfermeria.mostrar_nueva_evolucion_paciente');

Route::post('enfermeria/mostrar_nueva_evolucion_paciente_hosp', [App\Http\Controllers\EscritorioEnfermerasController::class, 'mostrar_nueva_evolucion_paciente_hosp'])->name('enfermeria.mostrar_nueva_evolucion_paciente_hosp');

Route::post('enfermeria/eliminar_evolucion_agregada', [App\Http\Controllers\EscritorioEnfermerasController::class, 'eliminar_evolucion_agregada'])->name('enfermeria.eliminar_evolucion_agregada');

Route::post('enfermeria/eliminar_evolucion_agregada_hosp', [App\Http\Controllers\EscritorioEnfermerasController::class, 'eliminar_evolucion_agregada_hosp'])->name('enfermeria.eliminar_evolucion_agregada_hosp');

Route::post('/eliminar_medicamento', [App\Http\Controllers\DetalleRecetaController::class, 'eliminarMedicamento'])->name('detalle_receta.eliminar');



route::post('/indicar_procedimiento_sdi', [App\Http\Controllers\PacienteController::class, 'indicarProcedimientoSDI'])->name('indicar_procedimiento_sdi');

Route::post('/eliminar_procedimiento_sdi', [App\Http\Controllers\PacienteController::class, 'eliminarProcedimientoSDI'])->name('eliminar_procedimiento_sdi');

Route::post('/suspender_procedimiento_sdi', [App\Http\Controllers\PacienteController::class, 'suspenderProcedimientoSDI'])->name('suspender_procedimiento_sdi');

Route::post('/eliminar_curacion', [App\Http\Controllers\PacienteController::class, 'eliminarCuracion'])->name('eliminar_curacion');

Route::post('/registrar_sad_person_paciente',[App\Http\Controllers\PacienteController::class, 'registrarSadPerson'])->name('registrar_sad_person_paciente');

Route::post('/registrar_drogas_paciente',[App\Http\Controllers\PacienteController::class, 'registrarDrogas'])->name('registrar_drogas_paciente');

Route::post('/registro_receta', [App\Http\Controllers\DetalleRecetaController::class, 'registroRecetaInterna'])->name('detalle_receta.registro_receta');





Route::post('guardar_box_atencion', [App\Http\Controllers\BoxController::class, 'guardarBoxAtencion'])->name('guardar_box_atencion');

Route::post('guardar_box_servicio', [App\Http\Controllers\BoxController::class, 'guardarBoxServicio'])->name('adm_cm.guardar_box_servicio');

Route::get('dame_box/{id}', [App\Http\Controllers\BoxController::class, 'dameBox'])->name('dame_box');

Route::post('editar_box_servicio', [App\Http\Controllers\BoxController::class, 'editarBoxServicio'])->name('adm_cm.editar_box_servicio');

Route::post('eliminar_box_servicio', [App\Http\Controllers\BoxController::class, 'eliminarBoxServicio'])->name('adm_cm.eliminar_box_servicio');

Route::post('finalizar_contrato',[App\Http\Controllers\AdministradorCmController::class,'finalizar_contrato'])->name('adm_cm.finalizar_contrato');

Route::post('generar_liquidacion_profesional',[App\Http\Controllers\AdministradorCmController::class,'generar_liquidacion_profesional'])->name('adm_cm.generar_liquidacion_profesional');

Route::post('eliminar_liquidacion_profesional',[App\Http\Controllers\AdministradorCmController::class,'eliminar_liquidacion_profesional'])->name('adm_cm.eliminar_liquidacion_profesional');

Route::post('generar_pdf_liquidacion',[App\Http\Controllers\AdministradorCmController::class,'generarPdfLiquidacion'])->name('adm_cm.generar_pdf_liquidacion');

Route::post('cambiar_estado_box',[App\Http\Controllers\EscritorioAdministracionController::class,'desactivar_box'])->name('adm_cm.cambiar_estado_box');

Route::group([

	'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Adm_Institucion|AdministradorLaboratorio'],

    'prefix' => 'Administrador/gastos',

], function () {

    Route::get('/Inicio', [App\Http\Controllers\GastosInstitucionalesController::class, 'index'])->name('gastos.home');

    Route::post('/agregar', [App\Http\Controllers\GastosInstitucionalesController::class, 'agregar'])->name('gastos.agregar');

    Route::post('/pagado', [App\Http\Controllers\GastosInstitucionalesController::class, 'pagado'])->name('gastos.pagado');

    Route::get('/ver', [App\Http\Controllers\GastosInstitucionalesController::class, 'ver_registro'])->name('gastos.ver');

    Route::post('/editar', [App\Http\Controllers\GastosInstitucionalesController::class, 'modificar'])->name('gastos.editar');

});



Route::group([

    'middleware' => ['role:Admin|AsistenteAdm|Adm_Comercial|Institucion|Adm_Institucion|AdministradorLaboratorio'],

    'prefix' => 'cm/',

], function () {

    Route::get('Paciente/cargar_info', [App\Http\Controllers\AdministradorCmController::class, 'buscar_paciente_rut'])->name('asistente_adm.buscar_paciente_rut');

});



/** ASISTENTE ADMINISTRATIVA DE CENTRO MEDICO */

Route::group([

    'middleware' => ['role:Admin|AsistenteAdm|Adm_Comercial'],

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

	Route::post('/regitrar/receta',[App\Http\Controllers\MedicamentoUsoCronicoGeneralController::class, 'pasarMedicamentoCronicoAReceta'])->name('medicamento_cronico.pasar_a_receta');

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

Route::get('pdf_receta/receta_medicamentos', [App\Http\Controllers\RecomendacionController::class, 'verPDF'])->name('pdf.receta_medicamentos');

// Route::get('pdf_receta/receta_medicamentos', [App\Http\Controllers\ficha_atencionController::class, 'pdf_receta_medicamentos'])->name('pdf.receta_medicamentos');

Route::get('pdf_orden/orden_examenes', [App\Http\Controllers\ficha_atencionController::class, 'pdf_orden_examenes'])->name('pdf.orden_examenes');

Route::get('pdf_orden/orden_examenes_plan_tto', [App\Http\Controllers\ficha_atencionController::class, 'pdf_orden_examenes_plan_tto'])->name('pdf.orden_examenes_plan_tto');

Route::get('pdf_orden/orden_examenes_tipo_examen', [App\Http\Controllers\ficha_atencionController::class, 'pdf_orden_examenes_tipo_examen'])->name('pdf.orden_examenes_tipo_examen');

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



/** TRABAJOS DENTALES */

Route::get('trabajos_dentales/ver', [App\Http\Controllers\ficha_atencionController::class, 'getTrabajosDentales'])->name('ficha_atencion.ver_trabajos');



/** EVOLUCIONES DENTALES */

Route::get('evoluciones_dentales/ver',[App\Http\Controllers\ficha_atencionController::class, 'getEvolucionesDentales'])->name('ficha_atencion.ver_evoluciones');



/** EXAMENES CIRUGIA DIGESTIVA */

Route::post('registrar_ficha_atencion_cirugia_digestiva',[App\Http\Controllers\ficha_atencionController::class, 'registrar_ficha_atencion_cirugia_digestiva'])->name('ficha_atencion.registrar_cirugia_digestiva');



/** ALERGIAS */

Route::get('alergias/ver', [App\Http\Controllers\AlergiasController::class, 'getAlergias'])->name('alergias.ver');

Route::get('alergias/ver_autocomplete', [App\Http\Controllers\AlergiasController::class, 'getAlergiasAutocomplete'])->name('alergias.ver_autocomplete');





/** SERVICIO */

Route::group([

    'middleware' => ['role:Admin|Servicio|Profesional'],

    'prefix' => 'Servicio',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioServicio::class, 'index'])->name('servicio.home');

    Route::get('Salas/{id}',[App\Http\Controllers\EscritorioServicio::class, 'salas'])->name('servicio.salas');

    Route::get('Enfermeria/Salas/{id}',[App\Http\Controllers\EnfermeriaController::class, 'salas'])->name('servicio.enfermeria.salas');



});



/** INSTITUCION */

Route::group([

    'middleware' => ['role:Admin|Institucion|AdministradorLaboratorio|Profesional'],

    'prefix' => 'Institucion',

], function () {

    Route::get('Inicio', [App\Http\Controllers\EscritorioInstitucion::class, 'index'])->name('institucion.home');



});

/** URGENCIAS */

// MEDICO URGENCIA

Route::group([

    'middleware' => ['role:MedicoUrgencia|admin'],

    'prefix' => 'urgencia/profesional/',

], function () {

    Route::get('index', [App\Http\Controllers\UrgenciaController::class, 'IndexProfesional'])->name('urgencia.profesional.home');

    Route::get('atencion', [App\Http\Controllers\UrgenciaController::class, 'AtencionProfesional'])->name('urgencia.profesional.atencion');

    Route::get('triage', [App\Http\Controllers\UrgenciaController::class, 'TriageProfesional'])->name('urgencia.profesional.triage');

    Route::get('box', [App\Http\Controllers\UrgenciaController::class, 'BoxProfesional'])->name('urgencia.profesional.box');

    Route::get('ambulancia', [App\Http\Controllers\UrgenciaController::class, 'AmbulanciaProfesional'])->name('urgencia.profesional.ambulancia');

    Route::get('camas', [App\Http\Controllers\UrgenciaController::class, 'CamasProfesional'])->name('urgencia.profesional.camas');

    Route::get('paciente/buscar', [App\Http\Controllers\UrgenciaController::class, 'BuscarPacienteProfesional'])->name('urgencia.profesional.buscar.paciente');



    // TIPO PROCEDIMIENTO

    Route::get('tipo/procedimiento/ver', [App\Http\Controllers\TipoProcedimientoController::class, 'verRegistros_r'])->name('urgencia.tipo.procedimiento.ver');



    // PROCEDIMIENTO

    Route::get('procedimiento/ver', [App\Http\Controllers\ProcedimientoController::class, 'verRegistros_r'])->name('urgencia.procedimiento.ver');



    // URGENCIA INDICACION

    Route::get('indicacion/ver', [App\Http\Controllers\UrgenciaIndicacionController::class, 'verRegistros_r'])->name('urgencia.indicacion.ver');

    Route::post('indicacion/registrar', [App\Http\Controllers\UrgenciaIndicacionController::class, 'registrar_r'])->name('urgencia.indicacion.registro');



    // URGENCIA RECETA

    Route::get('receta/ver', [App\Http\Controllers\UrgenciaRecetaController::class, 'verRegistros_r'])->name('urgencia.receta.ver');

    Route::post('receta/registrar', [App\Http\Controllers\UrgenciaRecetaController::class, 'registrar_r'])->name('urgencia.receta.registro');



    // URGENCIA PROCEDIMIENTO

    Route::get('procedimiento/ver', [App\Http\Controllers\UrgenciaProcedimientoController::class, 'verRegistros_r'])->name('urgencia.procedimiento.ver');

    Route::post('procedimiento/registrar', [App\Http\Controllers\UrgenciaProcedimientoController::class, 'registrar_r'])->name('urgencia.procedimiento.registro');

});



// ENFERMERA URGENCIA

Route::group([

    'middleware' => ['role:EnfermeraUrgencia|admin'],

    'prefix' => 'urgencia/enfermeria/',

], function () {

    Route::get('index', [App\Http\Controllers\UrgenciaController::class, 'IndexEnfermeria'])->name('urgencia.enfermera.home');

    Route::get('atencion', [App\Http\Controllers\UrgenciaController::class, 'AtencionEnfermeria'])->name('urgencia.enfermera.atencion');

    Route::get('triage', [App\Http\Controllers\UrgenciaController::class, 'TriageEnfermeria'])->name('urgencia.enfermera.triage');

    Route::get('box', [App\Http\Controllers\UrgenciaController::class, 'BoxEnfermeria'])->name('urgencia.enfermera.box');

    Route::get('ambulancia', [App\Http\Controllers\UrgenciaController::class, 'AmbulanciaEnfermeria'])->name('urgencia.enfermera.ambulancia');

    Route::get('camas', [App\Http\Controllers\UrgenciaController::class, 'CamasEnfermeria'])->name('urgencia.enfermera.camas');

    Route::get('paciente/buscar', [App\Http\Controllers\UrgenciaController::class, 'BuscarPacienteEnfermeria'])->name('urgencia.enfermera.buscar.paciente');

});



// ASISTENTE URGENCIA

Route::group([

    'middleware' => ['role:AdministrativoUrgencia|admin'],

    'prefix' => 'urgencia/recepcion/',

], function () {

    Route::get('index', [App\Http\Controllers\UrgenciaController::class, 'IndexAdministrativo'])->name('urgencia.adminstrativo.home');

    Route::get('recepcion', [App\Http\Controllers\UrgenciaController::class, 'RecepcionAdministrativo'])->name('urgencia.adminstrativo.recepcion');



    Route::get('profesionales', [App\Http\Controllers\UrgenciaController::class, 'MisProfesionalesAdministrativo'])->name('urgencia.adminstrativo.mis.profesionales');

    Route::get('enfermeras', [App\Http\Controllers\UrgenciaController::class, 'MisEnfermerasAdministrativo'])->name('urgencia.adminstrativo.mis.enfermeras');

    Route::get('ambulancia', [App\Http\Controllers\UrgenciaController::class, 'AmbulanciaAdministrativo'])->name('urgencia.adminstrativo.ambulancia');

    Route::get('camas', [App\Http\Controllers\UrgenciaController::class, 'CamasAdministrativo'])->name('urgencia.adminstrativo.cama');

    Route::get('paciente/buscar', [App\Http\Controllers\UrgenciaController::class, 'BuscarPacienteAdministrativo'])->name('urgencia.adminstrativo.buscar.paciente');



});



// URGENCIA GENERICOS

Route::group([

    'middleware' => ['role:MedicoUrgencia|EnfermeraUrgencia|AdministrativoUrgencia|admin|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteLaboratorio|Institucion|Servicio'],

    'prefix' => 'urgencia/',

], function () {

    Route::get('cargar/paciente/', [App\Http\Controllers\UrgenciaController::class, 'buscar_rut_paciente'])->name('urgencia.buscar_rut_paciente');

});







/** CIERRRE URGENCIAS */

/**CAMBIO DE CONTRASEÑA PERFIL */

Route::get('perfil/cambio_contrasena', [App\Http\Controllers\UtilsController::class, 'cambioContrasenaPerfil'])->name('perfil.cambio_contrasena');





/** FLUJO DE CAJA */

Route::group([

    'middleware' => ['role:Admin|Profesional|Asistente|AsistenteCaja|AsistenteJefaCaja|Institucion|Servicio|AsistenteLaboratorio|AsistenteAdm|AsistenteOnline|AsistenteManejoAgenda|AsistenteLaboratorio'],

    'prefix' => 'flujo_caja',

], function () {

    // Route::get('ver', [App\Http\Controllers\FlujoCajaController::class, 'ver_flujo_caja'])->name('flujo_caja.flujo_caja'); /** se llama en cada perfil */

    Route::get('data', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCaja'])->name('flujo_caja.data_flujo_caja');

    Route::get('data_programa', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaPrograma'])->name('flujo_caja.data_flujo_caja_programa');

    Route::get('data_rendidos', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaRendidos'])->name('flujo_caja.data_flujo_caja_rendidos');

	Route::get('data/profesional/rendidos', [App\Http\Controllers\FlujoCajaController::class, 'dataProfesionalRendiciones'])->name('flujo_caja.profesional.data_rendidos');

    Route::get('data/profesional/rendidos/programa', [App\Http\Controllers\FlujoCajaController::class, 'dataProfesionalBonosRendidosPrograma'])->name('flujo_caja.profesional.data_rendidos_programa');

	Route::get('data/profesional/gestion/bonos', [App\Http\Controllers\FlujoCajaController::class, 'dataProfesionalGestionBonos'])->name('flujo_caja.profesional.data_gestion_bonos');

    Route::get('data_rendidos_programas', [App\Http\Controllers\FlujoCajaController::class, 'dataFlujoCajaRendidosProgramas'])->name('flujo_caja.data_flujo_caja_rendidos_programa');



	Route::get('dame_rendicion/{id}', [App\Http\Controllers\FlujoCajaController::class, 'dameRendicion'])->name('flujo_caja.profesional.rendicion.show');

    Route::get('dame_rendicion_pdf/{id}/{id_asistente}', [App\Http\Controllers\FlujoCajaController::class, 'dameRendicionPdf'])->name('flujo_caja.profesional.rendicion.pdf');

    Route::get('aprobar_rendicion/{id}', [App\Http\Controllers\FlujoCajaController::class, 'aprobarRendicion'])->name('flujo_caja.profesional.rendicion.aprobar');

    Route::get('rechazar_rendicion/{id}', [App\Http\Controllers\FlujoCajaController::class, 'rechazarRendicion'])->name('flujo_caja.profesional.rendicion.rechazar');

    Route::post('cambiar_estado', [App\Http\Controllers\FlujoCajaController::class, 'cambiarEstado'])->name('flujo_caja.profesional.rendicion.cambiar_estado');

    Route::post('dame_bonos_diarios',[App\Http\Controllers\FlujoCajaController::class, 'dameBonosDiarios'])->name('flujo_caja.data_flujo_caja_diario');



	Route::get('caja/rendir/bonos', [App\Http\Controllers\FlujoCajaController::class, 'cargaBonosAsistenteDia'])->name('asistentecm.rendicion_carga_bonos');

    Route::get('caja/pdf/bonos/cm/dia',[App\Http\Controllers\FlujoCajaController::class, 'pdfBonosDia'])->name('asistentecm.pdf_bonos_cm_dia');

    Route::get('caja/pdf/bonos/prof/dia/{id}',[App\Http\Controllers\FlujoCajaController::class, 'pdfBonosDiaProf'])->name('asistentecm.pdf_bonos_profesional_dia');

});



/** BUSCADOR DE PROFESIONAL */

Route::group([

    'middleware' => ['role:Paciente|Asistente|AsistenteAdm|AsistenteJefaCaja|AsistenteCaja|AsistenteOnline|AsistenteManejoAgenda|Adm_Institucion|Profesional|Institucion|AdministradorLaboratorio|Admin|AsistenteLaboratorio'],

    'prefix' => 'buscador',

], function () {



    Route::get('buscar_profesional', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesional'])->name('profesional.buscar');

    Route::get('buscar_profesional_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesionalBuscador'])->name('profesional.buscador');

    Route::get('informacion_profesional', [App\Http\Controllers\EscritorioGeneral::class, 'informacionProfesional'])->name('profesional.informacionProfesional');



    Route::get('lugares_atencion_profesional_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'lugaresAtencionProfesionalBuscador'])->name('profesional.lugaresAtencionProfesionalBuscador');

    Route::get('dias_laborales_profesiona_lugar_atencion_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'diasLaboralesProfesionaLugarAtencionBuscador'])->name('profesional.DiasLaboralesProfesionaLugarAtencionBuscador');

    Route::get('horas_disponibles_profesional_lugar_atencion_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'horasDisponiblesProfesionalLugarAtencionBuscador'])->name('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador');

    Route::get('horas_profesional_lugar_atencion_buscador', [App\Http\Controllers\EscritorioGeneral::class, 'horasProfesionalLugarAtencionBuscador'])->name('profesional.HorasProfesionalLugarAtencionBuscador');

    Route::get('get/informacion/{id_dependiente_activo?}', [App\Http\Controllers\EscritorioPaciente::class, 'getPacienteUser'])->name('agenda.paciente.get.informacion');

    Route::post('reservar/hora/generar/reserva', [App\Http\Controllers\EscritorioPaciente::class, 'agendar_horas'])->name('agenda.paciente.solicitar.hora');

});





/** TRANSCRIPCION DE EXAMEN ASISTENTE */

Route::group([

    'middleware' => ['role:Asistente|AsistenteJefaCaja|AsistenteCaja|AsistenteOnline|AsistenteManejoAgenda|admin|AsistenteLaboratorio'],

    'prefix' => 'transcripcion',

], function () {

    Route::get('/carga/examen', [App\Http\Controllers\TranscripcionController::class, 'CargarExamen'])->name('asisten.cargar.examen.transcripcion');

    Route::post('/registro/examen', [App\Http\Controllers\TranscripcionController::class, 'RegistrarTranscripcion'])->name('asisten.registro.examen.transcripcion');



    /** Proceso de imagenes */

	Route::post('/imagen/carga', [App\Http\Controllers\CargaImagenController::class, 'cargaImagenTemp'])->name('asistente.imagen.carga');



});





/** VER LIQUIDACIONES - DATOS DE DEPOSITO */

Route::group([

    'middleware' => ['role:Profesional|Contador|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|AsistenteManejoAgenda|admin|Adm_Institucion|Institucion|AsistenteLaboratorio|Ministerio'],

    'prefix' => 'liquidacion_recibo',

], function () {

    Route::get('/profesional/ver_registro', [App\Http\Controllers\LiquidacionReciboController::class, 'ver_registro_r'])->name('profesional.liquidacion_ver');

    Route::get('/profesional/ver_registros', [App\Http\Controllers\LiquidacionReciboController::class, 'ver_registros_r'])->name('profesional.liquidacion_ver_profesional');

});



/** LIQUIDACIONES - DATOS DE DEPOSITO */

Route::group([

    'middleware' => ['role:Profesional|Contador|Asistente|AsistenteCaja|AsistenteJefaCaja|AsistenteOnline|AsistenteManejoAgenda|admin|Adm_Institucion|AsistenteLaboratorio'],

    'prefix' => 'bodega',

], function () {

    Route::post('/liquidacion/agregar', [App\Http\Controllers\LiquidacionReciboController::class, 'agregarLiquidacion'])->name('liquidacion.agregar');

    Route::post('/liquidacion/modificar', [App\Http\Controllers\LiquidacionReciboController::class, 'modificarLiquidacion'])->name('liquidacion.modificar');

	Route::post('/liquidacion/eliminar',[App\Http\Controllers\LiquidacionReciboController::class, 'eliminarLiquidacion'])->name('liquidacion.eliminar');

});



/** PRODUCTO BODEGA */

Route::group([

    'middleware' => ['role:Asistente|AsistenteAdm|Adm_Comercial|admin|Contador|Bodega|Adm_Institucion'],

    'prefix' => 'bodega',

], function () {

    Route::post('/autocomplete/producto/categoria/ver_registros', [App\Http\Controllers\ProductoBodegaController::class, 'getProductoBodegaCategoriaAutocomplete'])->name('bodega.autocomplete.productoVerCategoria');

});



/** INSTITUCION */

Route::group([

    'middleware' => ['role:admin|Ministerio'],

    'prefix' => 'direccion/salud',

], function () {

    Route::get('/index', [App\Http\Controllers\DireccionSaludController::class, 'index'])->name('ministerio.home');



    Route::get('/ges', [App\Http\Controllers\DireccionSaludController::class, 'cargarGes'])->name('ministerio.ges');

    Route::get('/ges/buscar', [App\Http\Controllers\DireccionSaludController::class, 'buscarGes'])->name('ministerio.ges.buscar');



    Route::get('/comunicados', [App\Http\Controllers\DireccionSaludController::class, 'comunicados'])->name('ministerio.comunicados');

    Route::post('/comunicados/difusion', [App\Http\Controllers\DireccionSaludController::class, 'difusionComunicados'])->name('ministerio.mensaje.difusion');

    Route::get('/enfermedades/notificacion/obligatoria', [App\Http\Controllers\DireccionSaludController::class, 'cargarEnfNotiOblig'])->name('ministerio.enfer_noti_obliga');

    Route::get('/enfermedades/notificacion/obligatoria/buscar', [App\Http\Controllers\DireccionSaludController::class, 'buscarEnfNotiOblig'])->name('ministerio.enfer_noti_obliga.buscar');



    Route::get('/control/medicamento', [App\Http\Controllers\DireccionSaludController::class, 'CargarControlMedicamento'])->name('ministerio.control_medicamento');

    Route::get('/control/medicamento/buscar', [App\Http\Controllers\DireccionSaludController::class, 'buscarControlMedicamento'])->name('ministerio.control_medicamento.buscar');



    Route::get('/control/farmacia', [App\Http\Controllers\DireccionSaludController::class, 'CargarControlFarmacia'])->name('ministerio.control_farmacia');

	Route::get('/control/licencia', [App\Http\Controllers\DireccionSaludController::class, 'CargarControlLicencia'])->name('ministerio.control_licencia');

    Route::post('/imagen/carga', [App\Http\Controllers\CargaImagenController::class, 'cargaImagenTemp'])->name('ministerio.imagen.carga');

    Route::post('/archivo/carga', [App\Http\Controllers\CargaArchivoController::class, 'cargaArchivoTemp'])->name('ministerio.archivo.carga');



});





Route::group([

    'middleware' => ['role:Admin|Institucion|AsistenteAdm|Adm_Comercial|Profesional|AdministradorLaboratorio'],

    'prefix' => 'sucursal',

], function () {



    Route::post('registrar', [App\Http\Controllers\SucursalController::class, 'registrar_r'])->name('sucursal.registrar');

    Route::post('modificar', [App\Http\Controllers\SucursalController::class, 'modificar_r'])->name('sucursal.modificar');

    Route::get('registros/ver', [App\Http\Controllers\SucursalController::class, 'verRegistros_r'])->name('sucursal.ver_registros');

    Route::get('ver', [App\Http\Controllers\SucursalController::class, 'verRegistro_r'])->name('sucursal.ver_registro');



    Route::post('horario/registrar', [App\Http\Controllers\SucursalHorarioController::class, 'registrar_r'])->name('sucursal.horario.registrar');

    Route::post('horario/modificar', [App\Http\Controllers\SucursalHorarioController::class, 'modificar_r'])->name('sucursal.horario.modificar');

    Route::get('horario/registros/ver', [App\Http\Controllers\SucursalHorarioController::class, 'verRegistros_r'])->name('sucursal.horario.ver_registros');

    Route::get('horario/ver', [App\Http\Controllers\SucursalHorarioController::class, 'verRegistro_r'])->name('sucursal.horario.ver_registro');

    Route::post('bodega/asignar', [App\Http\Controllers\SucursalBodegaController::class, 'asignarBodegaSucursal_r'])->name('sucursal.bodega.asignar');

    Route::get('bodega/ver', [App\Http\Controllers\SucursalBodegaController::class, 'verBodegasSucursal_r'])->name('sucursal.bodega.ver');

    Route::post('bodega/remover', [App\Http\Controllers\SucursalBodegaController::class, 'removerBodegaSucursal_r'])->name('sucursal.bodega.remover');



});



/** web */

Route::get('/profesional/especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_especialidad'])->name('web.profesional.buscar_especialidad');

Route::get('/profesional/tipo_especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_tipo_especialidad'])->name('web.profesional.buscar_tipo_especialidad');

Route::get('/profesional/sub_tipo_especialidad', [App\Http\Controllers\EscritorioGeneral::class, 'cargar_sub_tipo_especialidad'])->name('web.profesional.buscar_sub_tipo_especialidad');

Route::get('/profesional/buscador', [App\Http\Controllers\EscritorioGeneral::class, 'buscarProfesionalBuscador'])->name('web.profesionales.buscador');



Route::get('/profesional/mensaje/{id}', [App\Http\Controllers\EscritorioGeneral::class, 'mensaje'])->name('profesional.mensaje');

Route::get('/profesional/mensaje/{id}/json', [App\Http\Controllers\EscritorioGeneral::class, 'mensajeJson'])->name('profesional.mensaje.json');

Route::post('/profesional/convenio/nuevo',[App\Http\Controllers\ConveniosController::class, 'nuevoConvenio'])->name('profesional.convenio_nuevo');

Route::get('/profesional/mis_convenios',[App\Http\Controllers\ConveniosController::class, 'misPropiosConvenios'])->name('profesional.mis_propios_convenios');

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

Route::get('/validacion/documento2', [App\Http\Controllers\CertificadoController::class, 'validarCertificadoDocumento_r'])->name('validacion_documento_2');



Route::get('/validacion/profesional', [App\Http\Controllers\CertificadoController::class, 'validarCertificadoProfesional_r'])->name('validacion_profesional_');

Route::get('/validacion/profesional2', [App\Http\Controllers\CertificadoController::class, 'validarProfesional'])->name('validacion_profesional_2');





Route::get('/pdf/examen', [App\Http\Controllers\ExamenEspecialidadController::class, 'generarPDF_r'])->name('pdf.examen_especialidad');

Route::get('/pdf/examen/octavo_par', [App\Http\Controllers\ExamenEspecialidadController::class, 'generarPDF_octavo_par_r'])->name('pdf.examen_especialidad.octavo_par');

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

Route::post('/consentimiento/enviar', [App\Http\Controllers\ConsentimientosController::class, 'enviar_consentimineto'])->name('consentimiento.enviar');

Route::post('/consentimiento/enviar/revocacion', [App\Http\Controllers\ConsentimientosController::class, 'enviar_revocacion'])->name('consentimiento.enviar.revocacion');

Route::post('/consentimiento/confirmar', [App\Http\Controllers\ConsentimientosController::class, 'confirmar_consentimiento'])->name('consentimiento.confirmar');

Route::post('/consentimiento/confirmar/revocacion', [App\Http\Controllers\ConsentimientosController::class, 'confirmar_revocacion_consentimiento'])->name('consentimiento.confirmar.revocacion');

Route::get('/consentimiento/form', [App\Http\Controllers\ConsentimientosController::class, 'form_consentimiento'])->name('consentimiento.form');

Route::get('/consentimiento/revocacion/form', [App\Http\Controllers\ConsentimientosController::class, 'form_revocacion_consentimiento'])->name('consentimiento.revocar.form');

Route::get('/consentimiento/exito', [App\Http\Controllers\ConsentimientosController::class, 'exito_consentimiento'])->name('consentimiento.exito');

Route::get('/consentimiento/revocacion/exito', [App\Http\Controllers\ConsentimientosController::class, 'exito_revocacion_consentimiento'])->name('consentimiento.revocacion.exito');

Route::get('/consentimiento/error', [App\Http\Controllers\ConsentimientosController::class, 'error_consentimiento'])->name('consentimiento.error');

Route::get('/consentimiento/revocacion/error', [App\Http\Controllers\ConsentimientosController::class, 'error_revocacion_consentimiento'])->name('consentimiento.revocacion.error');

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



/** ENVIO INSUMOS DENTALES MAIL */

Route::post('/insumos/presupuesto/enviar/mail', [App\Http\Controllers\EscritorioProfesional::class, 'enviarMailInsumosPresupuesto'])->name('enviar.presupuesto.insumos.email');



Route::get('/codigo/fonasa/buscar/por/codigo',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorCodigo'])->name('fonasa.buscar.por.codigo');

Route::get('/codigo/fonasa/buscar/por/nombre',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorNombre'])->name('fonasa.buscar.por.nombre');

Route::get('/codigo/fonasa/buscar/por/nombre/Autocomplete',[App\Http\Controllers\CodigoFonasaController::class, 'buscarPorNombreAutocomplete'])->name('fonasa.buscar.por.nombre.autocomplete');



/** INICIO BODEGAS */



// Compras

Route::get('/Administracion/compras', [App\Http\Controllers\ComprasController::class,'index'])->name('compras');

Route::post('/Administracion/guardarCompra', [App\Http\Controllers\ComprasController::class, 'guardarCompra'])->name('guardarCompra');

Route::post('/Administracion/buscarFacturasPorProveedor', [App\Http\Controllers\ComprasController::class,'buscarFacturasPorProveedor'])->name('buscarFacturasPorProveedor');

Route::post('/Administracion/buscarProductosFactura', [App\Http\Controllers\ComprasController::class,'buscarProductosFactura'])->name('buscarProductosFactura');

Route::post('/Administracion/guardarItemFactura', [App\Http\Controllers\ComprasController::class,'guardarItemFactura'])->name('guardarItemFactura');

Route::post('/Administracion/eliminarItemFactura', [App\Http\Controllers\ComprasController::class,'eliminarItemFactura'])->name('eliminarItemFactura');

Route::get('/Administracion/detalleCompraProducto/{id}', [App\Http\Controllers\ComprasController::class,'detalleCompraProducto'])->name('detalleCompraProducto');

Route::post('/Administracion/filtrarProductos', [App\Http\Controllers\ComprasController::class,'filtrarProductos'])->name('filtrarProductos');

Route::post('/Administracion/filtrarProductosTotal', [App\Http\Controllers\ComprasController::class,'filtrarProductosTotal'])->name('filtrarProductosTotal');





// Proveedores

Route::get('/Administracion/proveedores', [App\Http\Controllers\ProveedoresController::class,'index'])->name('proveedores');

Route::get('/Administracion/getProveedor/{id}', [App\Http\Controllers\ProveedoresController::class,'getProveedor'])->name('getProveedor');

Route::post('/Administracion/guardarProveedor', [App\Http\Controllers\ProveedoresController::class, 'guardarProveedor'])->name('guardarProveedor');

Route::post('/Administracion/guardarProveedorCompras', [App\Http\Controllers\ProveedoresController::class, 'guardarProveedorCompras'])->name('guardarProveedorCompras');

Route::post('/Administracion/editarProveedor', [App\Http\Controllers\ProveedoresController::class, 'editarProveedor'])->name('editarProveedor');

Route::get('/Administracion/cambiarEstadoProveedor/{id}', [App\Http\Controllers\ProveedoresController::class,'cambiarEstadoProveedor'])->name('cambiarEstadoProveedor');

// Productos

Route::post('/Administracion/guardarMarca', [App\Http\Controllers\ProductosController::class,'guardarMarca'])->name('guardarMarca');

Route::post('/Administracion/guardarMedida', [App\Http\Controllers\ProductosController::class,'guardarMedida'])->name('guardarMedida');

Route::post('/Administracion/buscarProductos', [App\Http\Controllers\ProductosController::class,'buscarProductos'])->name('buscarProductos');

Route::get('/Administracion/buscarProductosTipo/{id}/{id_lugar_atencion}', [App\Http\Controllers\ProductosController::class,'buscarProductosTipo'])->name('buscarProductosTipo');

Route::get('/Administracion/seleccionarProducto/{id}', [App\Http\Controllers\ProductosController::class,'seleccionarProducto'])->name('seleccionarProducto');





// Bodegas con controlador del tipo resource

Route::resource('bodegas', App\Http\Controllers\BodegasController::class);

Route::post('/buscarProductosBodega', [App\Http\Controllers\BodegasController::class,'buscarProductosBodega'])->name('bodegas.buscarProductosBodega');

Route::post('/guardarAsignacion', [App\Http\Controllers\BodegasController::class,'guardarAsignacion'])->name('bodegas.guardarAsignacion');

Route::post('/ver_producto_almacenado', [App\Http\Controllers\BodegasController::class,'verProductoAlmacenado'])->name('bodegas.ver_producto_almacenado');

Route::post('/editar_producto_almacenado', [App\Http\Controllers\BodegasController::class,'editarProductoAlmacenado'])->name('bodegas.editar_producto_almacenado');

Route::post('/editar_producto', [App\Http\Controllers\BodegasController::class,'editarProducto'])->name('bodegas.editar_producto');

Route::get('Administracion/historial_almacen', [App\Http\Controllers\BodegasController::class,'historial_almacen'])->name('bodegas.historial');

Route::post('/dame_producto_inventario', [App\Http\Controllers\BodegasController::class,'dameProductoInventario'])->name('bodegas.dame_producto_inventario');

Route::get('Administracion/reportes', [App\Http\Controllers\BodegasController::class,'reportes'])->name('bodegas.reportes');

Route::post('Administracion/agregar_producto_carro',[App\Http\Controllers\BodegasController::class,'agregarProductoCarro'])->name('bodegas.agregar_producto_carro');

Route::post('Administracion/eliminar_producto_carro',[App\Http\Controllers\BodegasController::class,'eliminarProductoCarro'])->name('bodegas.devolver_producto');

Route::post('reporte_diario', [App\Http\Controllers\BodegasController::class,'reporteDiario'])->name('bodegas.reporte_diario');

Route::post('reporte_mensual', [App\Http\Controllers\BodegasController::class,'reporteMensual'])->name('bodegas.reporte_mensual');

Route::post('reporte_anual', [App\Http\Controllers\BodegasController::class,'reporteAnual'])->name('bodegas.reporte_anual');

Route::post('generar_reporte', [App\Http\Controllers\BodegasController::class,'generarReporte'])->name('bodegas.generar_reporte');

Route::post('eliminar_registro_temperatura', [App\Http\Controllers\BodegasController::class,'eliminarRegistroTemperatura'])->name('bodegas.eliminar_registro_temperatura');

Route::post('eliminar_producto', [App\Http\Controllers\BodegasController::class,'eliminarProductoBodega'])->name('bodegas.eliminar_producto');



Route::post('Administracion/editar_bodega', [App\Http\Controllers\BodegasController::class,'editarBodega'])->name('bodegas.editar_bodega');

Route::get('Administracion/traspasos', [App\Http\Controllers\BodegasController::class,'traspasos'])->name('bodegas.traspasos');

Route::get('Administracion/devoluciones', [App\Http\Controllers\BodegasController::class,'devoluciones'])->name('bodegas.devoluciones');

Route::post('Administracion/guardar_bodega', [App\Http\Controllers\BodegasController::class,'guardar_registro_bodega'])->name('bodega.guardar_bodega');

Route::post('Administracion/eliminar_bodega', [App\Http\Controllers\BodegasController::class,'eliminar_registro_bodega'])->name('bodega.eliminar_bodega');

Route::post('Administracion/editar_registro_bodega', [App\Http\Controllers\BodegasController::class,'editar_registro_bodega'])->name('bodega.editar_registro_bodega');

// Convenios con controlador del tipo resource

Route::resource('convenios', App\Http\Controllers\ConveniosController::class);

Route::get('/dameInfoConvenio/{id}', [App\Http\Controllers\ConveniosController::class,'dameInfoConvenio'])->name('convenios.dameInfoConvenio');

Route::post('/guardarTipoConvenio', [App\Http\Controllers\ConveniosController::class,'guardarTipoConvenio'])->name('convenios.guardarTipoConvenio');

Route::get('/dameTiposConvenio', [App\Http\Controllers\ConveniosController::class,'dameTiposConvenio'])->name('convenios.dameTiposConvenio');

Route::post('/guardarNuevoConvenio', [App\Http\Controllers\ConveniosController::class,'guardarNuevoConvenio'])->name('convenios.guardarNuevoConvenio');



// Anteriores

Route::get('/comercial', [App\Http\Controllers\AdministradorCmController::class,'index'])->name('comercial');

Route::get('/buscar_ciudad_region', [App\Http\Controllers\AdministradorCmController::class, 'buscar_ciudad_region'])->name('buscar_ciudad_region');

Route::get('/estadisticas', [App\Http\Controllers\AdministradorCmController::class,'estadisticas'])->name('estadisticas');

Route::get('/estadisticas_', [App\Http\Controllers\AdministradorCmController::class,'getEstadisticas'])->name('getEstadisticas');

/** FIN BODEGAS */





/** ZOOM */

// Route::get('/zoom/create',[App\Http\Controllers\ZoomManagerController::class, 'crearMeeting'])->name('zoom.create');

// Route::get('meeting', function () {

//     // echo json_encode($_REQUEST);

//     return view('atencion_medica.secciones_especialidad.meeting');

// });



/** PARA VISUALIZAR DEMOS */

// Route::get('/autorizacion/enlace', function () {

//     return view('app/autorizacion/enlace_equipo_app');

// });



/** DESCARGA DE APP */

Route::get('/descarga/app', function () {

    return view('app_descarga');

})->name('app.descarga');



Route::group([

    'middleware' => ['role:JefeTurno|Admin'],

    'prefix' => 'urgencias/jefe/turno',

], function () {

    

    /*  Escritorio JefeTurno */

    Route::get('inicio', [App\Http\Controllers\EscritorioJefeTurnoController::class, 'index'])->name('jefe.turno.home');

    

});



/** jitsi */

Route::get('llamada/inicio', [App\Http\Controllers\JitsiController::class, 'buscarLlamadaJitsi'])->name('jitsi.buscar.meet');

Route::get('/paciente/videollamada/{id}/{nombre}', [App\Http\Controllers\JitsiController::class, 'index'])->name('videollamada');



/** IMPORTAR DIAGNOSTICOS DENTALES **/

Route::get('/importar/diagnosticos', [App\Http\Controllers\DentalController::class, 'importacion_datos_excel'])->name('importar.diagnosticos');

Route::post('/importar/diagnosticos/dentales', [App\Http\Controllers\DentalController::class, 'importarDiagnosticos'])->name('dental.importar_datos_excel');

Route::post('/guardar/diagnostico/laboratorio', [App\Http\Controllers\DentalController::class, 'guardarDiagnosticoLaboratorio'])->name('dental.guardarLaboratorio');

Route::post('/cargar/tratamiento',[App\Http\Controllers\DentalController::class, 'cargar_tratamiento_presupuesto'])->name('dental.cargar_tratamiento_presupuesto');

Route::post('/cargar/tratamiento/period',[App\Http\Controllers\DentalController::class, 'cargar_tratamiento_presupuesto_period'])->name('dental.cargar_tratamiento_presupuesto_period');

Route::post('/cargar/tratamiento/endo',[App\Http\Controllers\DentalController::class, 'cargar_tratamiento_presupuesto_endo'])->name('dental.cargar_tratamiento_presupuesto_endo');

Route::post('/sacar/tratamiento',[App\Http\Controllers\DentalController::class, 'sacar_tratamiento_presupuesto'])->name('dental.sacar_tratamiento_presupuesto');

Route::post('/cargar/prestacion/laboratorio',[App\Http\Controllers\DentalController::class, 'cargar_prestacion_laboratorio'])->name('dental.cargar_a_presupuesto_lab');

Route::post('/sacar/prestacion/laboratorio',[App\Http\Controllers\DentalController::class, 'sacar_prestacion_laboratorio'])->name('dental.sacar_de_presupuesto_lab');

Route::post('/dame_estado_trabajos_laboratorio',[App\Http\Controllers\DentalController::class, 'dame_estados_trabajo'])->name('dental.dame_estados_trabajo');

Route::post('/info/laboratorio',[App\Http\Controllers\DentalController::class, 'info_laboratorio'])->name('dental.info_laboratorio');

Route::post('/agregar/insumos/tratamiento',[App\Http\Controllers\DentalController::class, 'agregar_insumos_tratamiento'])->name('dental.agregar_insumos_tto');

Route::post('/dame/insumos/tratamiento',[App\Http\Controllers\DentalController::class, 'dame_insumos_tratamiento'])->name('dental.dame_insumos_tratamiento');

Route::post('/generar_pdf_prot_impl',[App\Http\Controllers\DentalController::class, 'generar_pdf_prot_impl'])->name('dental.generar_pdf_protocolo_impl');

Route::post('/generar_pdf_prot_period',[App\Http\Controllers\DentalController::class, 'generar_pdf_prot_period'])->name('dental.generar_pdf_protocolo_period');

Route::post('/generar_pdf_prot_end',[App\Http\Controllers\DentalController::class, 'generar_pdf_prot_endodoncia'])->name('dental.generar_pdf_protocolo_endodoncia');

Route::post('/odontograma/dame_pieza', [DentalController::class, 'dame_pieza'])->name('dental.dame_pieza');

/* RUTAS DENTAL FRANCISCO */

Route::post('/agregar/procedimiendo/dental', [App\Http\Controllers\EscritorioProfesional::class, 'agregarProcedimientoDental'])->name('profesional.agregar_procedimiento');

Route::post('/eliminar/procedimiendo/dental', [App\Http\Controllers\EscritorioProfesional::class, 'eliminarProcedimientoDental'])->name('profesional.eliminar_procedimiento');

Route::post('/editar/procedimiento/dental',[App\Http\Controllers\EscritorioProfesional::class, 'editarProcedimientoDental'])->name('profesional.editar_procedimiento');

Route::post('/mostrar/procedimiento/dental',[App\Http\Controllers\EscritorioProfesional::class, 'mostrarProcedimientoDental'])->name('profesional.mostrar_procedimiento');

Route::post('/mostrar/prestacion/lab',[App\Http\Controllers\EscritorioProfesional::class, 'mostrarPrestacionLaboratorio'])->name('profesional.mostrar_prestacion_lab');

Route::post('/guardar/procedimiento/propio',[App\Http\Controllers\EscritorioProfesional::class, 'guardarProcedimientoPropio'])->name('profesional.guardar_procedimiento_propio');

Route::get('/insumos/dental',[App\Http\Controllers\EscritorioProfesional::class, 'insumosDental'])->name('profesional.insumos');



Route::post('/generar/pdf/insumos/dental',[App\Http\Controllers\DentalController::class, 'generar_pdf_insumos_dental'])->name('dental.generar_pdf_insumos_dental');

Route::get('/insumos/dental',[App\Http\Controllers\EscritorioProfesional::class, 'insumosDental'])->name('dental.insumos');

/** RUTAS PROVISORIAS  */

Route::get('periodontograma_prueba',[App\Http\Controllers\DentalController::class,'periodontograma_prueba'])->name('periodontograma_prueba');



Route::post('/profesional/dame_valor_consulta',[App\Http\Controllers\EscritorioProfesional::class, 'dame_valor_consulta'])->name('profesional.dame_valor_consulta');

Route::post('/dental/eliminar_insumos_tto',[App\Http\Controllers\DentalController::class, 'eliminar_insumos_tratamiento'])->name('dental.eliminar_insumos_tto');

Route::post('/dental/dame_insumos',[App\Http\Controllers\DentalController::class, 'dame_insumos_tipo'])->name('dental.dame_implantes_dental');

Route::post('/dental/dame_bono_pago',[App\Http\Controllers\DentalController::class, 'dame_bono_pago'])->name('dental.dame_bono_pago');

Route::post('/dental/pago_presupuesto',[App\Http\Controllers\DentalController::class, 'pago_presupuesto'])->name('dental.confirmar_pago_presupuesto_dental');

Route::post('/dental/pago_urgencias',[App\Http\Controllers\DentalController::class, 'pago_urgencias'])->name('dental.confirmar_pago_urgencias_dental');

Route::post('/dental/eliminar_pago_presupuesto',[App\Http\Controllers\DentalController::class, 'eliminar_pago_presupuesto'])->name('dental.eliminar_pago_presupuesto_dental');

Route::post('/dental/eliminar_pago_urgencias',[App\Http\Controllers\DentalController::class, 'eliminar_pago_urgencias'])->name('dental.eliminar_pago_urgencias_dental');

Route::post('/dental/reasignar_pago_presupuesto',[App\Http\Controllers\DentalController::class, 'reasignar_pago_presupuesto'])->name('dental.reasignar_presupuesto_dental');

Route::post('/dental/actualizar_presupuesto',[App\Http\Controllers\DentalController::class, 'actualizar_presupuesto'])->name('dental.actualizar_presupuesto');

Route::post('/dental/actualizar_presupuesto_urg',[App\Http\Controllers\DentalController::class, 'actualizar_presupuesto_urg'])->name('dental.actualizar_presupuesto_urg');

Route::post('/dental/dame_prestaciones_presupuesto',[App\Http\Controllers\DentalController::class, 'dame_prestaciones_presupuesto'])->name('dental.dame_prestaciones_presupuesto');

Route::post('/dental/eliminar_pedido_insumo',[App\Http\Controllers\DentalController::class, 'eliminar_pedido_insumos_materiales'])->name('dental.eliminar_pedido_insumos_materiales');

Route::post('/dental/generar_pdf_pedido_insumos',[App\Http\Controllers\DentalController::class, 'generar_pdf_pedido_insumos'])->name('dental.generar_pdf_pedido_insumos');

Route::post('/dental/guardar_pieza_periodonto',[App\Http\Controllers\DentalController::class, 'guardar_pieza_periodonto'])->name('dental.guardar_pieza_periodonto');

Route::post('/dental/dame_tratamientos_pieza_impl',[App\Http\Controllers\DentalController::class, 'dame_tratamientos_pieza_impl'])->name('dental.dame_tratamientos_pieza_impl');

Route::post('/dental/dame_tratamientos_pieza_gral',[App\Http\Controllers\DentalController::class, 'dame_tratamientos_pieza_gral'])->name('dental.dame_tratamientos_pieza_gral');

Route::post('/dental/dame_insumo_tratamiento',[App\Http\Controllers\DentalController::class, 'dame_insumo_tto'])->name('dental.dame_insumo_tto');

Route::post('/dental/nueva_pieza_post_impl',[App\Http\Controllers\EscritorioProfesional::class, 'mostrar_nueva_pieza_dental_pfu'])->name('profesional.mostrar_nueva_pieza_pfu');

Route::post('/dental/eliminar_pieza_corona_protesis',[App\Http\Controllers\EscritorioProfesional::class, 'eliminarPiezaCoronaProtesis'])->name('profesional.eliminar_pieza_dental_corona_protesis');

Route::post('/dental/guardar_pieza_dental',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_pfp'])->name('profesional.adm_dental.guardar_pieza_dental_pfp');

Route::post('/dental/guardar_pieza_dental_pfu',[App\Http\Controllers\EscritorioProfesional::class, 'guardar_pieza_dental_pfu'])->name('profesional.adm_dental.guardar_pieza_dental_pfu');

Route::post('/dental/editar_insumo_tto',[App\Http\Controllers\DentalController::class, 'editar_insumo_tto'])->name('dental.editar_insumos_tto');

Route::post('/dental/finalizar_atencion_urg',[App\Http\Controllers\DentalController::class, 'finalizar_atencion_urg'])->name('dental.finalizar_atencion_urg');

Route::post('/dental/proxima_atencion_paciente',[App\Http\Controllers\DentalController::class, 'proxima_atencion_paciente'])->name('dental.proxima_atencion_paciente');

Route::post('/dental/guardar_evolucion_od_gral',[App\Http\Controllers\DentalController::class, 'guardar_evolucion_od_gral'])->name('dental.guardar_evolucion_od_gral');

Route::post('/dental/dame_evoluciones_od_gral',[App\Http\Controllers\DentalController::class, 'dame_evoluciones_od_gral'])->name('dental.dame_evoluciones_od_gral');

Route::post('/dental/eliminar_evolucion_od_gral',[App\Http\Controllers\DentalController::class, 'eliminar_evolucion_od_gral'])->name('dental.eliminar_evolucion_od_gral');

Route::post('/dental/dame_estado_prestacion',[App\Http\Controllers\DentalController::class, 'dame_estado_prestacion'])->name('dental.dame_estado_prestacion');

Route::post('/dental/modificar_evolucion',[App\Http\Controllers\DentalController::class, 'modificar_evolucion'])->name('dental.modificar_evolucion');

Route::post('/profesional/buscar_empresa', [App\Http\Controllers\EscritorioProfesional::class, 'buscar_empresa'])->name('profesional.buscar_empresa');

Route::post('/profesional/registrar_empresa', [App\Http\Controllers\EscritorioProfesional::class, 'registrar_empresa'])->name('profesional.registrar_empresa');

Route::post('/profesional/registrar_convenio_profesional/empresa', [App\Http\Controllers\EscritorioProfesional::class, 'registrar_convenio_profesional_empresa'])->name('profesional.guardar_convenio_empresa');

Route::post('/profesional/guardar_tipo_convenio', [App\Http\Controllers\EscritorioProfesional::class, 'guardar_tipo_convenio'])->name('profesional.guardar_tipo_convenio');

Route::post('/profesional/eliminar_tipo_convenio',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_tipo_convenio'])->name('profesional.eliminar_tipo_convenio');

Route::post('/profesional/aplicar_convenio_tratamiento',[App\Http\Controllers\EscritorioProfesional::class, 'aplicar_convenio_tratamiento'])->name('profesional.aplicar_convenio_tratamiento');

Route::get('/profesional/tons',[App\Http\Controllers\EscritorioProfesional::class, 'tons'])->name('profesional.tons');

Route::get('/profesional/mantencion_equipo',[App\Http\Controllers\EscritorioProfesional::class, 'mantencion_equipo'])->name('profesional.mantencion_equipo');

Route::post('/profesional/buscar_tons',[App\Http\Controllers\EscritorioProfesional::class, 'buscar_tons'])->name('profesional.buscar_tons');

Route::post('/profesional/solicitar_tons',[App\Http\Controllers\EscritorioProfesional::class, 'solicitar_tons'])->name('profesional.solicitar_tons');

Route::post('/profesional/desasociar_tons',[App\Http\Controllers\EscritorioProfesional::class, 'desasociar_tons'])->name('profesional.desasociar_tons');

Route::post('/profesional/registrar_tons',[App\Http\Controllers\EscritorioProfesional::class, 'registrar_tons'])->name('profesional.registrar_nueva_tons');

Route::post('/profesional/eliminar_tons',[App\Http\Controllers\EscritorioProfesional::class, 'eliminar_tons'])->name('profesional.eliminar_tons');

Route::post('/profesional/solicitar_tons_atencion',[App\Http\Controllers\EscritorioProfesional::class, 'solicitar_tons_atencion'])->name('profesional.solicitar_tons_atencion_dental');

Route::post('/profesional/devolucion_bono',[App\Http\Controllers\EscritorioProfesional::class, 'devolucion_bono'])->name('profesional.devolucion_bono');

Route::post('/profesional/examen/registro',[App\Http\Controllers\EscritorioProfesional::class, 'registro_examen'])->name('profesional.examen.registro');

Route::post('/profesional/examen/eliminar', [EscritorioProfesional::class, 'eliminar_examen'])->name('profesional.examen.eliminar');

Route::post('/profesional/examen/pdf',[EscritorioProfesional::class, 'generar_pdf_examen'])->name('profesional.examen.generarPDF');

Route::post('/profesional/enviar/pdf/examen',[EscritorioProfesional::class, 'enviar_pdf_examen'])->name('profesional.examen.enviar_paciente');

Route::post('/profesional/recalcular_presupuestos',[App\Http\Controllers\EscritorioProfesional::class, 'recalcular_presupuestos'])->name('profesional.recalcular_presupuestos');

Route::get('/profesional/presupuestos_paciente', [App\Http\Controllers\EscritorioProfesional::class, 'presupuestosPaciente'])->name('profesional.presupuestos.paciente');

Route::post('/profesional/paciente/orden_hospitalizacion', [App\Http\Controllers\EscritorioProfesional::class, 'ordenHospitalizacion'])->name('profesional.paciente.orden_hospitalizacion');

Route::post('/profesional/paciente/guardar_hospitalizacion',[App\Http\Controllers\EscritorioProfesional::class, 'guardarHospitalizacion'])->name('profesional.paciente.guardar_hospitalizacion');

Route::post('/mostrar_nuevo_medicamento_hosp',[App\Http\Controllers\EscritorioProfesional::class,'mostrar_nuevo_medicamento_hosp'])->name('profesional.mostrar_nuevo_medicamento_hosp');

Route::post('/guardar_examen_biopsia',[App\Http\Controllers\EscritorioProfesional::class,'guardar_examen_biopsia'])->name('profesional.guardar_examen_biopsia');

Route::get('/dame_examenes_biopsia',[App\Http\Controllers\EscritorioProfesional::class,'dame_examenes_biopsia'])->name('profesional.dame_examenes_biopsia');

Route::get('/eliminar_examen_biopsia',[App\Http\Controllers\EscritorioProfesional::class,'eliminar_examen_biopsia'])->name('profesional.eliminar_examen_biopsia');

Route::get('/generar_pdf_biopsias',[App\Http\Controllers\EscritorioProfesional::class,'generar_pdf_biopsias'])->name('profesional.generar_pdf_biopsias');

Route::get('/dame_evaluaciones_especialidad',[App\Http\Controllers\EscritorioProfesional::class,'buscar_evaluaciones_especialidad'])->name('profesional.buscar_evaluaciones_especialidad');

Route::post('/guardar_planificacion_nutri',[App\Http\Controllers\EscritorioProfesional::class,'guardar_planificacion_nutri'])->name('profesional.guardar_planificacion_nutri');

Route::post('/guardar_signos_vitales_sidebar',[App\Http\Controllers\EscritorioProfesional::class, 'guardarSignosVitalesSidebar'])->name('profesional.guardar_signos_vitales_sidebar');

Route::post('/guardar_com_conc_sidebar',[App\Http\Controllers\EscritorioProfesional::class, 'guardarComunicacionConcienciaSidebar'])->name('profesional.guardar_comunicacion_conciencia_sidebar');

Route::post('/guardar_estado_nutricional_sidebar',[App\Http\Controllers\EscritorioProfesional::class, 'guardarEstadoNutricionalSidebar'])->name('profesional.guardar_estado_nutricional_sidebar');

Route::post('/guardar_presion_arterial_sidebar',[App\Http\Controllers\EscritorioProfesional::class, 'guardarPresionArterialSidebar'])->name('profesional.guardar_presion_arterial_sidebar');

Route::get('/dame_plan_tratamiento', [App\Http\Controllers\EscritorioProfesional::class, 'damePlanTratamiento'])->name('profesional.dame_plan_tratamiento');

Route::post('/guardar_evaluacion_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'guardarEvaluacionNutricional'])->name('profesional.guardar_evaluacion_nutricional');

Route::post('/guardar_control_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'guardarControlNutricional'])->name('profesional.guardar_control_nutricional');

Route::get('/dame_evaluacion_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'dameEvaluacionNutricional'])->name('profesional.dame_evaluacion_nutricional');

Route::post('/dame_historial_control_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'dameHistorialControlNutricional'])->name('profesional.dame_historial_controles_nutricionales');

Route::post('/dame_historial_control_hipertension', [App\Http\Controllers\EscritorioProfesional::class, 'dameHistorialControlHipertension'])->name('profesional.dame_historial_controles_hipertension');

Route::post('/dame_control_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'dameControlNutricional'])->name('profesional.dame_control_nutricional');

Route::post('/continuar_tratamiento',[App\Http\Controllers\EscritorioProfesional::class, 'continuarTratamientoNutricional'])->name('profesional.continuar_sesiones_nutricion');

Route::post('/guardar_dieta_nutricional', [App\Http\Controllers\EscritorioProfesional::class, 'guardarDietaNutricional'])->name('profesional.guardar_dieta_nutricional');

Route::post('/examenes/enviar/mail', [App\Http\Controllers\EscritorioProfesional::class, 'enviarMailExamenes'])->name('profesional.examenes.enviar');

Route::post('/dame_correlativo', [App\Http\Controllers\EscritorioProfesional::class, 'dameCorrelativo'])->name('profesional.dame_correlativo');

Route::get('/paciente/datos/cargar/prereserva/{token1}/{token2}/{token3}',[App\Http\Controllers\EscritorioPaciente::class, 'cargaDatosPacientePreReserva'])->name('paciente.datos.cargar.prereserva');

Route::get('/paciente/datos/cargar/prereserva/registrar',[App\Http\Controllers\EscritorioPaciente::class, 'registrarCargaDatosPacientePreReserva'])->name('paciente.datos.cargar.prereserva.registrar');

Route::post('/paciente/dieta', [App\Http\Controllers\EscritorioPaciente::class, 'dameDietaNutricional'])->name('paciente.dame_dieta_nutricional');

Route::post('/paciente/pdf/dieta', [App\Http\Controllers\EscritorioPaciente::class, 'generarPdfDietaNutricional'])->name('paciente.pdf.dieta');





// Route::get('pantalla', function(){

//     return view('pantalla.pantalla');

// });



Route::get('pantalla/{token}', [\App\Http\Controllers\PantallaController::class, 'pantallaPorToken'])->name('pantalla.token');

Route::get('pantalla/{alias_sala}/{alias_televisor}', [\App\Http\Controllers\PantallaController::class, 'pantallaPorAlias'])->name('pantalla.alias');

Route::get('api/pantalla/{token}', [\App\Http\Controllers\PantallaController::class, 'apiPantallaPorToken'])->name('api.pantalla.token');





Route::get('pantalla2/{token}', [\App\Http\Controllers\PantallaController::class, 'pantalla2PorToken'])->name('pantalla2.token');
