<ul class="nav nav-tabs-secciones mb-3 mt-3" id="dental" role="tablist">
    <li class="nav-item-secciones">
        <a class="nav-secciones active text-uppercase" id="atencion-dental-tab" data-toggle="tab" href="#atencion-dental"
            role="tab" aria-controls="atencion-dental" aria-selected="true">Atención Atención dental</a>
    </li>
    <li class="nav-item-secciones">
        <a class="nav-secciones text-uppercase" id="odontograma-dental-tab" data-toggle="tab" href="#odontograma-dental"
            role="tab" aria-controls="odontograma-dental" aria-selected="false">Odontograma</a>
    </li>
    <li class="nav-item-secciones">
        <a class="nav-secciones text-uppercase" id="evaluacion-dental-tab" data-toggle="tab" href="#evaluacion-dental"
            role="tab" aria-controls="evaluacion-dental" aria-selected="false">Evaluación</a>
    </li>
    <li class="nav-item-secciones">
        <a class="nav-secciones text-uppercase" id="tratamiento-dental-tab" data-toggle="tab" href="#tratamiento-dental"
            role="tab" aria-controls="tratamiento-dental" aria-selected="false">Tratamiento</a>
    </li>
</ul>


<div class="tab-content" id="dental-contenido">
    <!--Atención-->
    <div class="tab-pane fade show active" id="atencion-dental" role="tabpanel" aria-labelledby="atencion-dental-tab">
        <form id="ficha_atencion_dental_infantil" action="{{ route('dental.registrar_ficha_atencion_dental') }}"
            method="post">

            @csrf
            <input type="hidden" name="ficha_id_atencion_dental" id="ficha_id_atencion_dental"
                value=" @if ($ficha != null) {{ $ficha->id }} @endif">
            <input type="hidden" name="paciente_atencion_dental" id="paciente_atencion_dental"
                value="{{ $paciente->id }}">

            <input type="hidden" name="examenes" id="examenes" value="">
            <input type="hidden" name="medicamentos" id="medicamentos" value="">
            <div class="row bg-white shadow-sm rounded mx-1">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-0">
                            <h6 class="f-16 text-c-blue">Ficha de atención</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
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
                                                    name="rut_responsable_pago_ficha_dental"
                                                    id="rut_responsable_pago_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Nombre y Apellidos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_acompañante_pago_ficha_dental"
                                                    id="nombre_acompañante_pago_ficha_dental">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Email</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="email_acompañante_ficha_dental"
                                                    id="email_acompañante_ficha_dental">
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
                                        <div class="card-body text-center">

                                            <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                onclick="anestesia_local();">Anestesia local
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                onclick="fracturas();">Fracturas
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                onclick="hemorragias();">Hemorragias
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cierre: Formulario / Antecedentes-->
                        <!--Formulario / Signos vitales y otros-->
                        @include('general.secciones_ficha.signos_vitales')

                        <!--Cierre: Formulario / Signos vitales y otros-->
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

                                <input type="hidden" name="es_ficha_infantil" id="es_ficha_infantil" value="1">
                                <br> <button type="submit" class="btn btn-info">Guardar
                                    ficha
                                    clínica</button>
                                <button type="button" class="btn btn-success">Imprimir</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!--Odontograma-->
    <div class="tab-pane fade" id="odontograma-dental" role="tabpanel" aria-labelledby="odontograma-dental-tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Odontograma</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="table-responsive">
                            <table id="odontograma_inf" class="table table-borderless" style="width:100%">

                                <input type="hidden" name="paciente_odontograma" id="paciente_odontograma"
                                    value="{{ $paciente->id }}">
                                <!-- INFANTIL SUPERIOR -->
                                <tbody>
                                    <tr>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t55">
                                                <img src="{{ asset('images/dientes/d55.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('5-5');">
                                            </div>
                                            <label data-ndiente="55" class="font-weight-bolder">5.5</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t54">
                                                <img src="{{ asset('images/dientes/d54.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('5-4');">
                                            </div>
                                            <label data-ndiente="54" class="font-weight-bolder">5.4</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t53">
                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('5-3');">
                                            </div>
                                            <label data-ndiente="53" class="font-weight-bolder">5.3</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t52">
                                                <img src="{{ asset('images/dientes/d52.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('5-2');">
                                            </div>
                                            <label data-ndiente="52" class="font-weight-bolder">5.2</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t51">
                                                <img src="{{ asset('images/dientes/d51.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('5-1');">
                                            </div>
                                            <label data-ndiente="51" class="font-weight-bolder">5.1</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t71">
                                                <img src="{{ asset('images/dientes/d61.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('6-1');">
                                            </div>
                                            <label data-ndiente="61" class="font-weight-bolder">6.1</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t62">
                                                <img src="{{ asset('images/dientes/d62.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('6-2');">
                                            </div>
                                            <label data-ndiente="62" class="font-weight-bolder">6.2</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t63">
                                                <img src="{{ asset('images/dientes/d63.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('6-3');">
                                            </div>
                                            <label data-ndiente="63" class="font-weight-bolder">6.3</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t64">
                                                <img src="{{ asset('images/dientes/d64.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('6-4');">
                                            </div>
                                            <label data-ndiente="64" class="font-weight-bolder">6.4</label>
                                        </td>
                                        <td class="text-center py-0 mb-3">
                                            <div id="t65">
                                                <img src="{{ asset('images/dientes/d65.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('6-5');">
                                            </div>
                                            <label data-ndiente="65" class="font-weight-bolder">6.5</label>
                                        </td>
                                    </tr>
                                    <!-- INFANTIL INFERIOR -->
                                    <tr class="mt-4">
                                        <td class="text-center py-0">
                                            <label data-ndente="85" class="font-weight-bolder">8.5</label>
                                            <div class="#" id="t85">
                                                <img src="{{ asset('images/dientes/d85.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('8-5');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="84" class="font-weight-bolder">8.4</label>
                                            <div class="#" id="t84">
                                                <img src="{{ asset('images/dientes/d84.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('8-4');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="83" class="font-weight-bolder">8.3</label>
                                            <div id="t83">
                                                <img src="{{ asset('images/dientes/d83.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('8-3');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="82" class="font-weight-bolder">8.2</label>
                                            <div id="t82">
                                                <img src="{{ asset('images/dientes/d82.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('8-2');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="81" class="font-weight-bolder">8.1</label>
                                            <div id="t81">
                                                <img src="{{ asset('images/dientes/d81.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('8-1');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="71" class="font-weight-bolder">7.1</label>
                                            <div id="t71">
                                                <img src="{{ asset('images/dientes/d71.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('7-1');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="72" class="font-weight-bolder">7.2</label>
                                            <div id="t72">
                                                <img src="{{ asset('images/dientes/d72.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('7-2');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="73" class="font-weight-bolder">7.3</label>
                                            <div id="t73">
                                                <img src="{{ asset('images/dientes/d73.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('7-3');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="74" class="font-weight-bolder">7.4</label>
                                            <div id="t74">
                                                <img src="{{ asset('images/dientes/d74.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('7-4');">
                                            </div>
                                        </td>
                                        <td class="text-center py-0">
                                            <label data-ndiente="75" class="font-weight-bolder">7.5</label>
                                            <div id="t75">
                                                <img src="{{ asset('images/dientes/d75.png') }}"
                                                    class="wid-30" role="button"
                                                    onclick="info_odontograma('7-5');">
                                            </div>
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Evaluación dental-->
    <div class="tab-pane fade" id="evaluacion-dental" role="tabpanel" aria-labelledby="evaluacion-dental-tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Evaluación</h6>


                        <hr>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 px-1 py-1">
                        <button type="button" class="btn btn-info btn-sm btn-block"
                            onclick="tto_max_sup()";><i class="feather icon-file-plus"></i> Maxilar
                            superior</button>
                    </div>
                    <div class="col-md-3 px-1 py-1">
                        <button type="button" class="btn btn-info btn-sm btn-block"
                            onclick="tto_max_inf_ped()";><i class="feather icon-file-plus"></i> Maxilar
                            inferior</button>
                    </div>
                    <div class="col-md-3 px-1 py-1">
                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="tto_boca()";><i
                                class="feather icon-file-plus"></i> Boca
                            Completa</button>
                    </div>
                    <div class="col-md-3 px-1 py-1">
                        <button type="button" class="btn btn-primary btn-sm btn-block" onclick="prest_lab();"><i
                                class="feather icon-file-plus"></i>Solicitud en
                            laboratorio</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-center text-c-blue mb-2">CUADRANTE 5</h6>
                        <div class="table-responsive">
                            <form id="form_6_5"
                                action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                @csrf
                                <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                    id="ficha_id_atencion_dental_odon1"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_atencion_dental_odon1"
                                    id="paciente_atencion_dental_odon1" value="{{ $paciente->id }}">


                                <table class="table table-bordered table-xs" style="width:100%;">
                                    <tr class="bg-encabezado">
                                        <th class="text-center align-middle">PIEZA</th>
                                        <th class="text-center align-middle">CARA</th>
                                        <th class="text-center align-middle">CUADRANTE</th>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1 text-center align-middle">
                                            <select id="pieza_odontograma_1" name="pieza_odontograma_1"
                                                class="form-control form-control-sm">
                                                <option value="5-5"> 5-5 </option>
                                                <option value="5-4"> 5-4 </option>
                                                <option value="5-3"> 5-3 </option>
                                                <option value="5-2"> 5-2 </option>
                                                <option value="5-1"> 5-1</option>
                                            </select>
                                            <div id="t53">
                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                    class="wid-40 py-1">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <table class="table-borderless" style="align-content:center">
                                                <tbody>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-v" id="caraV1"
                                                                onclick="cambiar_color(1)">
                                                                V
                                                            </div>

                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras">
                                                            <div class="circulo-d" id="caraD1"
                                                                onclick="cambiar_colorD(1)">D</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-o" id="caraO1"
                                                                onclick="cambiar_colorO(1)">O</div>

                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-m" id="caraM1"
                                                                onclick="cambiar_colorM(1)">M</div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-p" id="caraP1"
                                                                onclick="cambiar_colorP(1)">P</div>

                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div id="t53" style="width:100%;">
                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                    class="wid-100">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1"><button type="button"
                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                title="Historia" data-content="cargar historia del diente">Ver
                                                historia</button></td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="diagnostico_1"
                                                name="diagnostico_1">
                                                <option value="0">Diagnóstico</option>
                                                <option value="1">Caries</option>
                                                <option value="2">Fractura</option>
                                                <option value="3">periodontopatia</option>
                                                <option value="4">profilaxis</option>
                                                <option value="5">Restos radiculares</option>
                                            </select>
                                        </td>
                                        <td class="px-2 py-2">
                                            <select class="form-control form-control-sm" id="tratamiento_1"
                                                name="tratamiento_1">
                                                <option>Tratamiento</option>
                                                <optgroup label="Tratamiento Pediátrico">
                                                    <option value="dp_1">Examen inicial, plan de tratamiento y
                                                        presupuesto
                                                    </option>
                                                    <option value="dp_2">Instrucción y control de higiene y
                                                        profilaxis
                                                    </option>
                                                    <option value="dp_3">Aplicación flúor gel</option>
                                                    <option value="dp_4">Aplicación flúor barniz</option>
                                                    <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                    </option>
                                                    <option value="dp_6">Endodoncia pieza permanente</option>
                                                    <option value="dp_7">Exodoncia simple diente temporal</option>
                                                    <option value="dp_8">Mantenedor de espacio fijo o removible
                                                        /valor no
                                                        incluye laboratorio</option>
                                                    <option value="dp_9">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior simple</option>
                                                    <option value="dp_10">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior compuesto</option>
                                                    <option value="dp_11">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior simple</option>
                                                    <option value="dp_12">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior compuesto</option>
                                                    <option value="dp_13">Obturación resina fotocurado,
                                                        reconstitución
                                                    </option>
                                                    <option value="dp_14">Obturación resina fotocurado carillas
                                                        anteriores
                                                    </option>
                                                    <option value="dp_15">Pulpotomía</option>
                                                    <option value="dp_16">Pulpectomía anterior</option>
                                                    <option value="dp_17">Pulpectomía posterior</option>
                                                    <option value="dp_18">Recubrimiento pulpar directo</option>
                                                    <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                    <option value="dp_20">Sellantes pieza temporal y permanente
                                                    </option>
                                                    <option value="dp_21">Sesión de adaptación</option>
                                                    <option value="dp_22">Trat. de conducto en pieza temporal
                                                        anterior
                                                    </option>
                                                    <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                        posterior</option>
                                                    <option value="dp_24">Tratamiento diente gangrenado</option>
                                                    <option value="dp_25">Urgencia odontopediátrica</option>
                                                </optgroup>
                                            </select>
                                            <input type="hidden" name="odontograma1" id="odontograma1" value="1">
                                            <input type="hidden" name="caraM_check_1" id="caraM_check_1" value="0">
                                            <input type="hidden" name="caraO_check_1" id="caraO_check_1" value="0">
                                            <input type="hidden" name="caraD_check_1" id="caraD_check_1" value="0">
                                            <input type="hidden" name="carav_check_1" id="carav_check_1" value="0">
                                            <input type="hidden" name="caraP_check_1" id="caraP_check_1" value="0">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Registrar
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6 class="text-center text-c-blue mb-2">CUADRANTE 6</h6>
                        <div class="table-responsive">
                            <form id="form_5_5"
                                action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                @csrf
                                <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                    id="ficha_id_atencion_dental_odon2"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_atencion_dental_odon2"
                                    id="paciente_atencion_dental_odon2" value="{{ $paciente->id }}">
                                <table class="table table-bordered table-xs" style="width:100%;">
                                    <tr class="bg-encabezado">
                                        <th class="text-center align-middle">PIEZA</th>
                                        <th class="text-center align-middle">CARA</th>
                                        <th class="text-center align-middle">CUADRANTE</th>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1 text-center align-middle">
                                            <select id="pieza_odontograma_2" name="pieza_odontograma_2"
                                                class="form-control form-control-sm">
                                                <option value="6-1"> 6-1 </option>
                                                <option value="6-2"> 6-2 </option>
                                                <option value="6-3"> 6-3 </option>
                                                <option value="6-4"> 6-4 </option>
                                                <option value="6-5"> 6-5</option>
                                            </select>
                                            <div id="t53">
                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                    class="wid-40 py-1">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <table class="table-borderless" style="align-content:center">
                                                <tbody>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-v" id="caraV2"
                                                                onclick="cambiar_color(2)">V</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras">
                                                            <div class="circulo-d" id="caraD2"
                                                                onclick="cambiar_colorD(2)">D</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-o" id="caraO2"
                                                                onclick="cambiar_colorO(2)">O</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-m" id="caraM2"
                                                                onclick="cambiar_colorM(2)">M</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-p" id="caraP2"
                                                                onclick="cambiar_colorP(2)">P</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div id="t53" style="width:100%;">
                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                    class="wid-100">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1"><button type="button"
                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                title="Historia" data-content="cargar historia del diente">Ver
                                                historia</button></td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="diagnostico_2"
                                                name="diagnostico_2">
                                                <option value="0">Diagnóstico</option>
                                                <option value="1">Caries</option>
                                                <option value="2">Fractura</option>
                                                <option value="3">periodontopatia</option>
                                                <option value="4">profilaxis</option>
                                                <option value="5">Restos radiculares</option>
                                            </select>
                                        </td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="tratamiento_2"
                                                name="tratamiento_2">
                                                <option>Tratamiento</option>
                                                <optgroup label="Tratamiento Pediátrico">
                                                    <option value="dp_1">Examen inicial, plan de tratamiento y
                                                        presupuesto
                                                    </option>
                                                    <option value="dp_2">Instrucción y control de higiene y
                                                        profilaxis
                                                    </option>
                                                    <option value="dp_3">Aplicación flúor gel</option>
                                                    <option value="dp_4">Aplicación flúor barniz</option>
                                                    <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                    </option>
                                                    <option value="dp_6">Endodoncia pieza permanente</option>
                                                    <option value="dp_7">Exodoncia simple diente temporal</option>
                                                    <option value="dp_8">Mantenedor de espacio fijo o removible
                                                        /valor no
                                                        incluye laboratorio</option>
                                                    <option value="dp_9">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior simple</option>
                                                    <option value="dp_10">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior compuesto</option>
                                                    <option value="dp_11">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior simple</option>
                                                    <option value="dp_12">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior compuesto</option>
                                                    <option value="dp_13">Obturación resina fotocurado,
                                                        reconstitución
                                                    </option>
                                                    <option value="dp_14">Obturación resina fotocurado carillas
                                                        anteriores
                                                    </option>
                                                    <option value="dp_15">Pulpotomía</option>
                                                    <option value="dp_16">Pulpectomía anterior</option>
                                                    <option value="dp_17">Pulpectomía posterior</option>
                                                    <option value="dp_18">Recubrimiento pulpar directo</option>
                                                    <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                    <option value="dp_20">Sellantes pieza temporal y permanente
                                                    </option>
                                                    <option value="dp_21">Sesión de adaptación</option>
                                                    <option value="dp_22">Trat. de conducto en pieza temporal
                                                        anterior
                                                    </option>
                                                    <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                        posterior</option>
                                                    <option value="dp_24">Tratamiento diente gangrenado</option>
                                                    <option value="dp_25">Urgencia odontopediátrica</option>
                                                </optgroup>
                                            </select>
                                            <input type="hidden" name="odontograma2" id="odontograma2" value="1">
                                            <input type="hidden" name="caraM_check_2" id="caraM_check_2" value="0">
                                            <input type="hidden" name="caraO_check_2" id="caraO_check_2" value="0">
                                            <input type="hidden" name="caraD_check_2" id="caraD_check_2" value="0">
                                            <input type="hidden" name="carav_check_2" id="carav_check_2" value="0">
                                            <input type="hidden" name="caraP_check_2" id="caraP_check_2" value="0">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Registrar
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-center text-c-blue mb-2">CUADRANTE 7</h6>
                        <div class="table-responsive">
                            <form id="form_7_5"
                                action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                @csrf
                                <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                    id="ficha_id_atencion_dental_odon3"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_atencion_dental_odon3"
                                    id="paciente_atencion_dental_odon3" value="{{ $paciente->id }}">
                                <table class="table table-bordered table-xs" style="width:100%;">
                                    <tr class="bg-encabezado">
                                        <th class="text-center align-middle">PIEZA</th>
                                        <th class="text-center align-middle">CARA</th>
                                        <th class="text-center align-middle">CUADRANTE</th>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1 text-center align-middle">
                                            <select id="pieza_odontograma_3" name="pieza_odontograma_3"
                                                class="form-control form-control-sm">
                                                <option value="7-1"> 7-1 </option>
                                                <option value="7-2"> 7-2 </option>
                                                <option value="7-3"> 7-3 </option>
                                                <option value="7-4"> 7-4 </option>
                                                <option value="7-5"> 7-5</option>
                                            </select>
                                            <div id="t53">
                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                    class="wid-40 py-1">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <table class="table-borderless" style="align-content:center">
                                                <tbody>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-v" id="caraV3"
                                                                onclick="cambiar_color(3)">V</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras">
                                                            <div class="circulo-d" id="caraD3"
                                                                onclick="cambiar_colorD(3)">D</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-o" id="caraO3"
                                                                onclick="cambiar_colorO(3)">O</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-m" id="caraM3"
                                                                onclick="cambiar_colorM(3)">M</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-p" id="caraP3"
                                                                onclick="cambiar_colorP(3)">P</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div id="t53" style="width:100%;">
                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                    class="wid-100">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1"><button type="button"
                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                title="Historia" data-content="cargar historia del diente">Ver
                                                historia</button></td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="diagnostico_3"
                                                name="diagnostico_3">
                                                <option value="0">Diagnóstico</option>
                                                <option value="01">Caries</option>
                                                <option value="02">Fractura</option>
                                                <option value="03">Periodontopatia</option>
                                                <option value="04">Profilaxis</option>
                                                <option value="05">Restos radiculares</option>
                                            </select>
                                        </td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="tratamiento_3"
                                                name="tratamiento_3">
                                                <option>Tratamiento</option>
                                                <optgroup label="Tratamiento Pediátrico">
                                                    <option value="dp_1">Examen inicial, plan de tratamiento y
                                                        presupuesto
                                                    </option>
                                                    <option value="dp_2">Instrucción y control de higiene y
                                                        profilaxis
                                                    </option>
                                                    <option value="dp_3">Aplicación flúor gel</option>
                                                    <option value="dp_4">Aplicación flúor barniz</option>
                                                    <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                    </option>
                                                    <option value="dp_6">Endodoncia pieza permanente</option>
                                                    <option value="dp_7">Exodoncia simple diente temporal</option>
                                                    <option value="dp_8">Mantenedor de espacio fijo o removible
                                                        /valor no
                                                        incluye laboratorio</option>
                                                    <option value="dp_9">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior simple</option>
                                                    <option value="dp_10">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior compuesto</option>
                                                    <option value="dp_11">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior simple</option>
                                                    <option value="dp_12">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior compuesto</option>
                                                    <option value="dp_13">Obturación resina fotocurado,
                                                        reconstitución
                                                    </option>
                                                    <option value="dp_14">Obturación resina fotocurado carillas
                                                        anteriores
                                                    </option>
                                                    <option value="dp_15">Pulpotomía</option>
                                                    <option value="dp_16">Pulpectomía anterior</option>
                                                    <option value="dp_17">Pulpectomía posterior</option>
                                                    <option value="dp_18">Recubrimiento pulpar directo</option>
                                                    <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                    <option value="dp_20">Sellantes pieza temporal y permanente
                                                    </option>
                                                    <option value="dp_21">Sesión de adaptación</option>
                                                    <option value="dp_22">Trat. de conducto en pieza temporal
                                                        anterior
                                                    </option>
                                                    <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                        posterior</option>
                                                    <option value="dp_24">Tratamiento diente gangrenado</option>
                                                    <option value="dp_25">Urgencia odontopediátrica</option>
                                                </optgroup>
                                            </select>
                                            <input type="hidden" name="odontograma3" id="odontograma3" value="1">
                                            <input type="hidden" name="caraM_check_3" id="caraM_check_3" value="0">
                                            <input type="hidden" name="caraO_check_3" id="caraO_check_3" value="0">
                                            <input type="hidden" name="caraD_check_3" id="caraD_check_3" value="0">
                                            <input type="hidden" name="carav_check_3" id="carav_check_3" value="0">
                                            <input type="hidden" name="caraP_check_3" id="caraP_check_3" value="0">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Registrar
                                            </button>

                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-center text-c-blue mb-2">CUADRANTE 8</h6>
                        <div class="table-responsive">
                            <form id="form_6_5"
                                action="{{ route('dental_infantil.registrar_odontograma_infantil') }}" method="POST">

                                @csrf
                                <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                    id="ficha_id_atencion_dental_odon4"
                                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                <input type="hidden" name="paciente_atencion_dental_odon4"
                                    id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                <table class="table table-bordered table-xs" style="width:100%;">
                                    <tr class="bg-encabezado">
                                        <th class="text-center align-middle">PIEZA</th>
                                        <th class="text-center align-middle">CARA</th>
                                        <th class="text-center align-middle">CUADRANTE</th>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1 text-center align-middle">
                                            <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                class="form-control form-control-sm">
                                                <option value="8-5"> 8-5 </option>
                                                <option value="8-4"> 8-4 </option>
                                                <option value="8-3"> 8-3 </option>
                                                <option value="8-2"> 8-2 </option>
                                                <option value="8-1"> 8-1</option>
                                            </select>
                                            <div id="t53">
                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                    class="wid-40 py-1">
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <table class="table-borderless" style="align-content:center">
                                                <tbody>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-v" id="caraV4"
                                                                onclick="cambiar_color(4)">V</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras">
                                                            <div class="circulo-d" id="caraD4"
                                                                onclick="cambiar_colorD(4)">D</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-o" id="caraO4"
                                                                onclick="cambiar_colorO(4)">O</div>
                                                        </td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-m" id="caraM4"
                                                                onclick="cambiar_colorM(4)">M</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding-caras"></td>
                                                        <td class="padding-caras">
                                                            <div class="circulo-p" id="caraP4"
                                                                onclick="cambiar_colorP(4)">P</div>
                                                        </td>
                                                        <td class="padding-caras"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div id="t53" style="width:100%;">
                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                    class="wid-100">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-1 py-1"><button type="button"
                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                title="Historia" data-content="cargar historia del diente">Ver
                                                historia</button></td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="diagnostico_4"
                                                name="diagnostico_4">
                                                <option value="0">Diagnóstico</option>
                                                <option value="01">Caries</option>
                                                <option value="02">Fractura</option>
                                                <option value="03">periodontopatia</option>
                                                <option value="04">profilaxis</option>
                                                <option value="05">Restos radiculares</option>
                                            </select>
                                        </td>
                                        <td class="px-1 py-1">
                                            <select class="form-control form-control-sm" id="tratamiento_4"
                                                name="tratamiento_4">
                                                <option>Tratamiento</option>
                                                <optgroup label="Tratamiento Pediátrico">
                                                    <option value="dp_1">Examen inicial, plan de tratamiento y
                                                        presupuesto
                                                    </option>
                                                    <option value="dp_2">Instrucción y control de higiene y
                                                        profilaxis
                                                    </option>
                                                    <option value="dp_3">Aplicación flúor gel</option>
                                                    <option value="dp_4">Aplicación flúor barniz</option>
                                                    <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                    </option>
                                                    <option value="dp_6">Endodoncia pieza permanente</option>
                                                    <option value="dp_7">Exodoncia simple diente temporal</option>
                                                    <option value="dp_8">Mantenedor de espacio fijo o removible
                                                        /valor no
                                                        incluye laboratorio</option>
                                                    <option value="dp_9">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior simple</option>
                                                    <option value="dp_10">Obturación v. ionómero pieza temporal
                                                        anterior y
                                                        posterior compuesto</option>
                                                    <option value="dp_11">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior simple</option>
                                                    <option value="dp_12">Obturación resina fotocurado composite
                                                        pieza
                                                        permanente anterior y posterior compuesto</option>
                                                    <option value="dp_13">Obturación resina fotocurado,
                                                        reconstitución
                                                    </option>
                                                    <option value="dp_14">Obturación resina fotocurado carillas
                                                        anteriores
                                                    </option>
                                                    <option value="dp_15">Pulpotomía</option>
                                                    <option value="dp_16">Pulpectomía anterior</option>
                                                    <option value="dp_17">Pulpectomía posterior</option>
                                                    <option value="dp_18">Recubrimiento pulpar directo</option>
                                                    <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                    <option value="dp_20">Sellantes pieza temporal y permanente
                                                    </option>
                                                    <option value="dp_21">Sesión de adaptación</option>
                                                    <option value="dp_22">Trat. de conducto en pieza temporal
                                                        anterior
                                                    </option>
                                                    <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                        posterior</option>
                                                    <option value="dp_24">Tratamiento diente gangrenado</option>
                                                    <option value="dp_25">Urgencia odontopediátrica</option>
                                                </optgroup>
                                            </select>
                                            <input type="hidden" name="odontograma4" id="odontograma4" value="1">
                                            <input type="hidden" name="caraM_check_4" id="caraM_check_4" value="0">
                                            <input type="hidden" name="caraO_check_4" id="caraO_check_4" value="0">
                                            <input type="hidden" name="caraD_check_4" id="caraD_check_4" value="0">
                                            <input type="hidden" name="carav_check_4" id="carav_check_4" value="0">
                                            <input type="hidden" name="caraP_check_4" id="caraP_check_4" value="0">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                Registrar
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Plan de tratamiento</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-xs">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Prestación</th>
                                            <th>Caras</th>
                                            <th>Pieza</th>
                                            <th>Diagnóstico</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>00/00/000</td>
                                            <td>Sellado</td>
                                            <td>12</td>
                                            <td>Vestibular, Distal</td>
                                            <td>Caries</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"><i
                                                        class="feather icon-x"></i>Eliminar</button>
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
    <!--Tratamiento-->
    <div class="tab-pane fade" id="tratamiento-dental" role="tabpanel" aria-labelledby="tratamiento-dental-tab">
        <div class="row bg-white shadow-sm rounded mx-1">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Tratamiento</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!--Tabla responsiva-->
                        <div class="table-responsive">
                            <table id="tratamiento_dental"
                                class="display table table-striped  dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº de presupuesto</th>
                                        <th class="text-center align-middle">Aprobado</th>
                                        <th class="text-center align-middle">Presupuesto</th>
                                        <th class="text-center align-middle">Estado</th>
                                        <th class="text-center align-middle">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">7281738<br>00/00/000</td>
                                        <td class="text-center align-middle">Si</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-info btn-sm"
                                                onclick="añadir_presupuesto();">
                                                <i class="fa fa-plus"></i> Cargar Presupuesto
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="convenio_1">
                                                <label class="custom-control-label" for="convenio_1">Finalizado</label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">00/00/000</td>
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
