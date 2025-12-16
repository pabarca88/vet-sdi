<ul class="nav nav-tabs mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item">
        <a class="nav-atencion-medica active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental"
            role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental Endodoncia</a>
    </li>

    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="cont_endo-tab" data-toggle="tab" href="#cont_endo" role="tab"
            aria-controls="cont_endo" aria-selected="false">Control</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="Dgplantto-tab" data-toggle="tab" href="#Dgplantto" role="tab"
            aria-controls="Dgplantto" aria-selected="false">Plan de tratamiento</a>
    </li>
    <li class="nav-item">
        <a class="nav-atencion-medica text-uppercase" id="tratamiento_endo-tab" data-toggle="tab"
            href="#tratamiento_endo" role="tab" aria-controls="tratamiento_endo" aria-selected="false">Tratamiento</a>
    </li>
</ul>
<div class="row pb-3">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">


            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <form id="form_ficha_endodoncia" action="{{ route('dental.registrar_ficha_atencion_dental') }}"
                    method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental de endodoncia</h5>
                            <hr>
                        </div>
                        <hr>
                        <!--Formulario / Menor de edad-- y secargan la evaluacion infantil y el odontograma infantil-->
                        <!--Formulario / Menor de edad-->
                        @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Paciente menor de edad</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>Información del acompañente</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Rut</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="rut_acompañante_ficha_dental"
                                                    id="rut_acompañante_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Nombre y Apellidos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_acompañante_ficha_dental"
                                                    id="nombre_acompañante_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-4" id="form_0">
                                                <label class="floating-label">Relación</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="relacion_acompañante_ficha_dental"
                                                    id="relacion_acompañante_ficha_dental">
                                            </div>
                                        </div>
                                        <div class="form-row mb-1">
                                            <div class="col-md-12">
                                                <h6>Información del responsable del pago</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3" id="form_0">
                                                <label class="floating-label">Rut</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="responsable_pago_ficha_dental"
                                                    id="responsable_pago_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Nombre y Apellidos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_acompañante_ficha_dental"
                                                    id="nombre_acompañante_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Email</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_acompañante_ficha_dental"
                                                    id="nombre_acompañante_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-3" id="form_0">
                                                <button type="button" class="btn btn-success btn-block btn-sm"
                                                    onclick="respon_pago_dent();"><i class="fa fa-plus"></i> Aceptar
                                                    Pago</button>
                                                <!--genera codigo de aceptación al teléfono del responsable del pago-->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Cierre: Formulario / Menor de edad-->
                        <!--Formulario / Motivo consulta-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Motivo de la consulta</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="descripcion_consulta_ficha_dental"
                                                        id="descripcion_consulta_ficha_dental">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / Motivo consulta-->
                        <!--Formulario / Antecedentes-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Antecedentes</h6>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="descripcion_antecedentes_ficha_dental"
                                                        id="descripcion_antecedentes_ficha_dental">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h6>Ver o Agregar Antecedentes dentales</h6>
                                        </div>
                                        <div class="card-body ">
                                            <div class="row mb-3">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        onclick="abrir_modal_anestesia();">
                                                        Anestesia local</button>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        onclick="abrir_modal_hemorragia();">Hemorragias</button>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        onclick="abrir_modal_fractura();">Fracturas</button>
                                                </div>
                                            </div>

                                            <!-- <div class="form-check">
                                                <input class="form-check-input" type="button" onclick="info_info1();"
                                                    id="anestesia_local_ficha_dental"
                                                    name="anestesia_local_ficha_dental">
                                                <label class="form-check-label" for="anestesia_local_ficha_dental">
                                                    Problemas con la anestesia local
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" onclick="info_info2();"
                                                    id="hemorragias_ficha_dental" name="hemorragias_ficha_dental">
                                                <label class="form-check-label" for="hemorragias_ficha_dental">
                                                    Hemorragias
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" onclick="info_info3();"
                                                    id="fracturas_ficha_dental" name="fracturas_ficha_dental">
                                                <label class="form-check-label" for="fracturas_ficha_dental">
                                                    Fracturas
                                                </label>
                                            </div>
                                        -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / Antecedentes-->
                        <!--Formulario / Signos vitales y otros-->
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Signos vitales y otros</h6>
                                    <i id="signos_vitales_ficha_endodoncia"
                                        class="float-right f-18 d-inline fas fa-angle-down  mb-0"
                                        style="cursor:pointer"></i>
                                </div>

                                <div class="card-body" id="form_3_ficha_endodoncia" style="display:none">

                                    <div class="form-row">
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Tº</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="temperatura_ficha_dental" id="temperatura_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label class="floating-label">Pulso</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="pulso_ficha_dental" id="pulso_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Frec. Reposo</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="frecuencia_reposo_ficha_dental"
                                                id="frecuencia_reposo_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Peso</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="peso_ficha_dental" id="peso_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Talla</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="talla_ficha_dental" id="talla_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">IMC</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="imc_ficha_dental" id="imc_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Estado Nutricional</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="estado_nutricional_ficha_dental"
                                                id="estado_nutricional_ficha_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group mb-1">
                                            <label><strong>Presión Arterial</strong></label>
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="p_arterial_ficha_endodoncia">
                                                <label for="p_arterial_ficha_endodoncia"
                                                    class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="form_1_ficha_endodoncia" style="display:none">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">BI</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presion_bi_ficha_dental" id="presion_bi_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">BD</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presion_bd_ficha_dental" id="presion_bd_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">De pié</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presion_de_pie_ficha_dental" id="presion_de_pie_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Sentado</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="presion_sentado_ficha_dental" id="presion_sentado_ficha_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group mb-1">
                                            <label><strong>Comunicación y traslado</strong></label>
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="comunicacion_traslado_ficha_endodoncia">
                                                <label for="comunicacion_traslado_ficha_endodoncia"
                                                    class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="form_2_ficha_endodoncia" style="display:none">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Estado de conciencia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="estado_conciencia_ficha_dental"
                                                id="estado_conciencia_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Lenguaje</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="lenguaje_ficha_dental" id="lenguaje_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Traslado</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="traslado_ficha_dental" id="traslado_ficha_dental">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / Signos vitales y otros-->
                        <!--Formulario / endodoncia-->
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Ficha endodoncia</h6>
                                </div>
                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Pieza N°</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nro_pieza_ficha_endodoncia" id="nro_pieza_ficha_endodoncia">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Derivado por:</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="derivado_por_ficha_endodoncia" id="derivado_por_ficha_endodoncia">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Zona de Dolor</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="zona_dolor_ficha_endodoncia" id="zona_dolor_ficha_endodoncia">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Historia Anterior</label>
                                            <input type="text" class="form-control caja-texto form-control-sm"
                                                name="historia_anterior_ficha_endodoncia"
                                                id="historia_anterior_ficha_endodoncia">
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Tipo de dolor</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="row">
                                                        <div class="col-sm-6">

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" id="espontaneo_ficha_endodoncia"
                                                                    name="espontaneo_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="espontaneo_ficha_endodoncia">
                                                                    Espontáneo
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="provocado_ficha_endodoncia"
                                                                    id="provocado_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="provocado_ficha_endodoncia">
                                                                    Provocado
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="pulsatil_ficha_endodoncia"
                                                                    id="pulsatil_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="pulsatil_ficha_endodoncia">
                                                                    Pulsátil
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="ocacional_ficha_endodoncia"
                                                                    id="ocacional_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="ocacional_ficha_endodoncia">
                                                                    Ocacional
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="constante_ficha_endodoncia"
                                                                    id="constante_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="constante_ficha_endodoncia">
                                                                    Constante
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6">

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="leve_ficha_endodoncia"
                                                                    id="leve_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="leve_ficha_endodoncia">
                                                                    Leve
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="moderado_ficha_endodoncia"
                                                                    id="moderado_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="moderado_ficha_endodoncia">
                                                                    Moderado
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="intenso_ficha_endodoncia"
                                                                    id="intenso_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="intenso_ficha_endodoncia">
                                                                    Intenso
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="localizado_ficha_endodoncia"
                                                                    id="localizado_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="localizado_ficha_endodoncia">
                                                                    Localizado
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="referido_ficha_endodoncia"
                                                                    id="referido_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="referido_ficha_endodoncia">
                                                                    Referido
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Que provoca el dolor</h6>
                                                </div>
                                                <div class="card-body pt-1">
                                                    <div class="row">
                                                        <div class="col-sm-6">

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="calor_ficha_endodoncia"
                                                                    id="calor_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="calor_ficha_endodoncia">
                                                                    Calor
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="frio_ficha_endodoncia"
                                                                    id="frio_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="frio_ficha_endodoncia">
                                                                    Frio
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="actividad_ficha_endodoncia"
                                                                    id="actividad_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="actividad_ficha_endodoncia">
                                                                    Actividad
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="masticacion_ficha_endodoncia"
                                                                    id="masticacion_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="masticacion_ficha_endodoncia">
                                                                    Masticación
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="dolor_otro_ficha_endodoncia"
                                                                    id="dolor_otro_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="dolor_otro_ficha_endodoncia">
                                                                    Otro
                                                                </label>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6">

                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="palpacion_ficha_endodoncia"
                                                                    id="palpacion_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="palpacion_ficha_endodoncia">
                                                                    Palpación
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="decubito_ficha_endodoncia"
                                                                    id="decubito_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="decubito_ficha_endodoncia">
                                                                    Decúbito
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="diurno_ficha_endodoncia"
                                                                    id="diurno_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="diurno_ficha_endodoncia">
                                                                    Diurno
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="" name="nocturno_ficha_endodoncia"
                                                                    id="nocturno_ficha_endodoncia">
                                                                <label class="form-check-label"
                                                                    for="nocturno_ficha_endodoncia">
                                                                    Nocturno
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Tiempo y evolución</h6>
                                                </div>
                                                <div class="card-body pt-1">

                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            onclick="check_menos_una_semana();" type="checkbox" value=""
                                                            name="menos_semana_ficha_endodoncia"
                                                            id="menos_semana_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="menos_semana_ficha_endodoncia">
                                                            Menos de una semana
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            onclick="check_mas_una_semana();" type="checkbox" value=""
                                                            name="mas_semana_ficha_endodoncia"
                                                            id="mas_semana_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="mas_semana_ficha_endodoncia">
                                                            Más de una semana
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                            onclick="check_efecto_analgesico();" type="checkbox"
                                                            value="" name="efecto_analgesico_ficha_endodoncia"
                                                            id="efecto_analgesico_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="efecto_analgesico_ficha_endodoncia">
                                                            Efecto de analgésicos
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Examen extra-oral</h6>
                                                </div>
                                                <div class="card-body pt-1">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="extra_aum_vol_ficha_endodoncia"
                                                            name="extra_aum_vol_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="extra_aum_vol_ficha_endodoncia">
                                                            Aumento de Volumen
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="extra_fist_ficha_endodoncia"
                                                            name="extra_fist_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="extra_fist_ficha_endodoncia">
                                                            Fístula
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="padding-bottom:12px">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="extra_adeno_ficha_endodoncia"
                                                            name="extra_adeno_ficha_endodoncia">
                                                        <label class="form-check-label"
                                                            for="extra_adeno_ficha_endodoncia">
                                                            Adenopatías
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Examen intra-oral</h6>
                                                </div>
                                                <div class="card-body pt-3">

                                                    <div class="form-group">
                                                        <label class="floating-label">Examen del Periodonto</label>
                                                        <input type="text"
                                                            class="form-control caja-texto form-control-sm"
                                                            name="examen_periodonto_ficha_endodoncia"
                                                            id="examen_periodonto_ficha_endodoncia">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="floating-label">Examen Intra Oral </label>
                                                        <input type="text"
                                                            class="form-control caja-texto form-control-sm"
                                                            name="examen_intraoral_ficha_endodoncia"
                                                            id="examen_intraoral_ficha_endodoncia">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="card h-100">
                                                <div class="card-header">
                                                    <h6 class="text-center">Radiología</h6>
                                                </div>
                                                <div class="card-body pt-3">

                                                    <div class="form-group">
                                                        <label class="floating-label"></label>
                                                        <select id="radiologia1_ficha_endodoncia"
                                                            name="radiologia1_ficha_endodoncia"
                                                            class="form-control form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Espacio Periodontal Apical</option>
                                                            <option value="2">Normal</option>
                                                            <option value="3">Engrosado</option>
                                                            <option value="4">Ausente</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="floating-label"></label>
                                                        <select id="radiologia2_ficha_endodoncia"
                                                            name="radiologia2_ficha_endodoncia"
                                                            class="form-control form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            <option value="1">Hueso Alveolar Apical</option>
                                                            <option value="2">Normal</option>
                                                            <option value="3">Zona Apical Difusa</option>
                                                            <option value="4">Zona Apical Corticalizada</option>
                                                            <option value="5">Osteítis Condensante</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN POR PIEZA-->
                                    <div class="form-row">
                                        <div class="col-sm-12">
                                            <div class="card mb-3">
                                                <div class="card-header bg-info align-middle pt-1">
                                                    <h6 class="float-left d-inline">Examen por pieza</h6>
                                                    <i id="examen_pieza_ficha_endodoncia"
                                                        class="float-right f-18 d-inline fas fa-angle-down  mb-0"
                                                        style="cursor:pointer"></i>
                                                </div>
                                                <div class="card-body pb-2" id="form_4_ficha_endodoncia"
                                                    style="display:none">
                                                    <div class="table-responsive">
                                                        <table class="table table-xs w-100 table-bordered mb-1">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width:12%">Fecha
                                                                    </th>
                                                                    <th class="text-center" style="width:12%">Nº
                                                                        Pieza</th>
                                                                    <th class="text-center" style="width:16%">Resp
                                                                        Calor</th>
                                                                    <th class="text-center" style="width:16%">Resp
                                                                        Frio</th>
                                                                    <th class="text-center" style="width:16%">
                                                                        Eléctrico</th>
                                                                    <th class="text-center" style="width:16%">
                                                                        Percución</th>
                                                                    <th class="text-center" style="width:16%">
                                                                        Exploración</th>
                                                                    <th class="text-center" style="width:16%">
                                                                        Cavitaria</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center text-wrap">
                                                                        <input type="date"
                                                                            class="form-control form-control-sm f-12"
                                                                            name="" id="">
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <input type="number"
                                                                            class="form-control form-control-sm f-12"
                                                                            name="" id="">
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="text-center text-wrap">
                                                                        <select id="sel_endo" name="sel_endo"
                                                                            class="form-control form-control-sm f-12 text-danger">
                                                                            <option><span>N/R </span> No realizada
                                                                            </option>
                                                                            <option><span>↑ </span> Aumentado</option>
                                                                            <option><span>↓ </span> Disminuido</option>
                                                                            <option><span>N </span> Normal</a></option>
                                                                            <option><span>(-) </span> No responde</a>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row py-1">
                                                        <div class="col-md-12 py-0">
                                                            <button type="button" class="btn btn-sm btn-info">Agregar
                                                                fila</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: EXAMEN POR PIEZA-->
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / endodoncia-->
                        <!--Formulario / Diagnóstico-->
                        <div class="col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h6>Diagnóstico</h6>
                                </div>
                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="hipotesis_ficha_dental" id="hipotesis_ficha_dental">
                                        </div>

                                        <div class="form-group col-sm-6 col-md-6">
                                            <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="cie10_ficha_dental_endodoncia" id="cie10_ficha_dental_endodoncia">

                                            <input type="hidden" class="form-control form-control-sm"
                                                name="cie10_ficha_dental_endodoncia" id="cie10_ficha_dental_endodoncia">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-1">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                        onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar
                                        medicamento</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                        onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / Diagnóstico-->

                        <div class="col-sm-12 mt-3">
                            <hr>
                            <div class="col-md-12 text-center">

                                @csrf
                                <input type="hidden" name="ficha_id_atencion_dental" id="ficha_id_atencion_dental"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_atencion_dental" id="paciente_atencion_dental"
                                    value="{{ $paciente->id }}">

                                <input type="hidden" name="examenes" id="examenes" value="">
                                <input type="hidden" name="medicamentos" id="medicamentos" value="">

                                <input type="hidden" name="tipo_dolor_ficha_endodoncia"
                                    id="tipo_dolor_ficha_endodoncia">
                                <input type="hidden" name="provoca_dolor_ficha_endodoncia"
                                    id="provoca_dolor_ficha_endodoncia">
                                <input type="hidden" name="hidden_tiempo_evolucion_ficha_endodoncia"
                                    id="hidden_tiempo_evolucion_ficha_endodoncia">
                                <input type="hidden" name="examen_extra_oral_ficha_endodoncia"
                                    id="examen_extra_oral_ficha_endodoncia">
                                <input type="hidden" name="es_ficha_endodoncia" id="es_ficha_endodoncia" value="1">

                                <button type="submit" onclick="ficha_endodoncia();" class="btn btn-info">Guardar
                                    ficha
                                    clínica</button>
                                <button type="button" class="btn btn-success">Imprimir</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="tab-pane fade" id="cont_endo" role="tabpanel" aria-labelledby="cont_endo-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Control</h5>
                        <hr>
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="tabla_control_endodoncia" class="table table-xs w-100 table-bordered mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:12%">Fecha</th>
                                        <th class="text-center" style="width:12%">Nº Pieza</th>
                                        <th class="text-center" style="width:16%">Resp Calor</th>
                                        <th class="text-center" style="width:16%">Resp Frio</th>
                                        <th class="text-center" style="width:16%">Eléctrico</th>
                                        <th class="text-center" style="width:16%">Percución</th>
                                        <th class="text-center" style="width:16%">Exploración</th>
                                        <th class="text-center" style="width:16%">Cavitaria</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($control_endodoncias))
                                        @foreach ($control_endodoncias as $ce)
                                            <tr>
                                                <td class="text-center text-wrap">{{ $ce->fecha }}</td>
                                                <td class="text-center text-wrap">{{ $ce->nro_pieza }}</td>
                                                <td class="text-center text-wrap">{{ $ce->respuesta_calor }}</td>
                                                <td class="text-center text-wrap">{{ $ce->respuesta_frio }}</td>
                                                <td class="text-center text-wrap">{{ $ce->electrico }}</td>
                                                <td class="text-center text-wrap">{{ $ce->percucion }}</td>
                                                <td class="text-center text-wrap">{{ $ce->exploracion }}</td>
                                                <td class="text-center text-wrap">{{ $ce->cavitaria }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td class="text-center text-wrap">
                                            <input type="date" class="form-control form-control-sm f-12"
                                                name="fecha_control_endodoncia" id="fecha_control_endodoncia">
                                        </td>
                                        <td class="text-center text-wrap">
                                            <input type="number" class="form-control form-control-sm f-12"
                                                name="nro_pieza_control_endodoncia" id="nro_pieza_control_endodoncia">
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="respuesta_calor_control_endodoncia"
                                                name="respuesta_calor_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="respuesta_frio_control_endodoncia"
                                                name="respuesta_frio_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="electrico_control_endodoncia"
                                                name="electrico_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="percucion_control_endodoncia"
                                                name="percucion_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="exploracion_control_endodoncia"
                                                name="exploracion_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                        <td class="text-center text-wrap">
                                            <select id="cavitaria_control_endodoncia"
                                                name="cavitaria_control_endodoncia"
                                                class="form-control form-control-sm f-12 text-danger">
                                                <option value="0"><span>N/R </span> No realizada</option>
                                                <option value="1"><span>↑ </span> Aumentado</option>
                                                <option value="2"><span>↓ </span> Disminuido</option>
                                                <option value="3"><span>N </span> Normal</a></option>
                                                <option value="4"><span>(-) </span> No responde</a></option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row py-1">
                            <div class="col-md-12 py-0">
                                <input type="hidden" name="ficha_id_control_endodoncia" id="ficha_id_control_endodoncia"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_control_endodoncia" id="paciente_control_endodoncia"
                                    value="{{ $paciente->id }}">
                                <button type="button" onclick="agregar_control_endodoncia();"
                                    class="btn btn-sm btn-info">Agregar fila</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="Dgplantto" role="tabpanel" aria-labelledby="Dgplantto-tab">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Plan de tratamiento</h5>
                        <hr>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Diagnóstico endodóntico</label>
                        <textarea id="diagnostico_endodoncico" name="diagnostico_endodoncico"
                            class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Fundamentación diagnóstica</label>
                        <textarea id="fund_diag_endodoncico" name="fund_diag_endodoncico"
                            class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Plan de trabajo y tratamiento</label>
                        <textarea id="plan_endodoncico" name="plan_endodoncico"
                            class="form-control input-sm resize_vertical" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 float-right" id="form_derperi">
                        <button type="button" class="btn btn-success btn-sm float-right" onclick="d_deriv_tto();"><i
                                class="feather icon-file-plus"></i> Derivar a Otra Especialidad</button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tratamiento_endo" role="tabpanel" aria-labelledby="tratamiento_endo-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tratamiento_presupuesto"
                                class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Nº Presupuesto</th>
                                        <th class="text-center align-middle">Aprobado</th>
                                        <th class="text-center align-middle">Pieza</th>
                                        <th class="text-center align-middle">Boca</th>
                                        <th class="text-center align-middle">Presupuesto</th>
                                        <th class="text-center align-middle">Estado</th>
                                        <th class="text-center align-middle">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">23/05/2021</td>
                                        <td class="text-center align-middle">782638</td>
                                        <td class="text-center align-middle">Si</td>
                                        <td class="text-center align-middle">Sector I</td>
                                        <td class="text-center align-middle">no</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto();">
                                                <i class="fa fa-plus"></i> Cargar Presupuesto
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="form-group col-md-4">
                                                <div class="switch switch-success d-inline m-r-2">
                                                    <input type="checkbox" id="info_finalizado" checked="">
                                                    <label for="info_finalizado" class="cr"></label>
                                                </div>
                                                <label>Realizado?</label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            20/05/2022
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
