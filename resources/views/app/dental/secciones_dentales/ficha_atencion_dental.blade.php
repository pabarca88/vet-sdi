<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 ">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3"  id="dental" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="ficha-dental-tab" data-toggle="tab" href="#ficha-dental"
                            role="tab" aria-controls="ficha-dental" aria-selected="true">Atención dental</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="odonto-adulto-tab" data-toggle="tab" href="#odonto-adulto"
                            role="tab" aria-controls="odonto-adulto" aria-selected="false">Odontograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="periodontograma-tab" data-toggle="tab" href="#periodontograma"
                            role="tab" aria-controls="periodontograma" aria-selected="false">Periodontrograma</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="evaluacion-adulto-tab" data-toggle="tab"
                            href="#evaluacion-adulto" role="tab" aria-controls="evaluacion-adulto" aria-selected="false">Evaluación</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="tratamiento-tab" data-toggle="tab" href="#tratamiento"
                            role="tab" aria-controls="tratamiento" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <form id="ficha_atencion_dental" action="{{ route('dental.registrar_ficha_atencion_dental') }}"
                    method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_atencion_dental" id="ficha_id_atencion_dental"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_atencion_dental" id="paciente_atencion_dental"
                        value="{{ $paciente->id }}">

                    <input type="hidden" name="examenes" id="examenes" value="">
                    <input type="hidden" name="medicamentos" id="medicamentos" value="">


                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental</h5>
                            <hr>
                        </div>
                        <hr>
                        <!--Formulario / Menor de edad-- y secargan la evaluacion infantil y el odontograma infantil-->
                        <!--Formulario / Menor de edad-->

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
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                        onclick="anestesia_local_dental();">
                                                        Anestesia local</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                        onclick="hemorragia_dental();">Hemorragias</button>
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                        onclick="fractura_dental();">Fracturas</button>
                                                </div>
                                            </div>
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
                                    <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0"
                                        style="cursor:pointer"></i>
                                </div>

                                <div class="card-body" id="form_3" style="display:none">

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
                                                <input type="checkbox" id="p_arterial">
                                                <label for="p_arterial" class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="form_1" style="display:none">
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
                                                <input type="checkbox" id="comunicacion_traslado_ficha_dental">
                                                <label for="comunicacion_traslado_ficha_dental"
                                                    class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="form_2" style="display:none">
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
                        <!--Formulario / Diagnóstico-->
                        <div class="col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h6>Diagnóstico</h6>
                                </div>
                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="hipotesis_ficha_dental" id="hipotesis_ficha_dental">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Diagnóstico CIE-10</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="cie10_ficha_dental" id="cie10_ficha_dental">
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
                    </div>
                    <div class="row px-3 mt-3 mb-3">
                        <!--
                            <div class="col-md-6 mx-auto">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="switch switch-success d-inline m-r-10">
                                                <input type="checkbox" id="cronico_ficha_dental" onchange="es_cronico();"
                                                    name="cronico_ficha_dental" data-toggle="modal"
                                                    data-target="#form_enfermo_cronico">
                                                <label for="cronico_ficha_dental" class="cr"></label>
                                            </div>
                                            <label>¿Es enfermo crónico?</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-warning" role="alert">
                                            <table class="table table-borderless mt-0 mb-0">
                                                <tbody>
                                                    <tr id="tr_obesidad" style="display: none">
                                                        <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                        <td class="align-middle pb-1 pt-1"><button type="button"
                                                                class="btn  btn-icon btn-danger" data-toggle="tooltip"
                                                                data-placement="top" title="Quitar"><i
                                                                    class="feather icon-x"></i></button></td>
                                                    </tr>
                                                    <tr id="tr_diabetes" style="display: none">
                                                        <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                        <td class="align-middle pb-1 pt-1"><button type="button"
                                                                class="btn  btn-icon btn-danger" data-toggle="tooltip"
                                                                data-placement="top" title="Quitar"><i
                                                                    class="feather icon-x"></i></button></td>
                                                    </tr>
                                                    <tr id="tr_freactura" style="display: none">
                                                        <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                        <td class="align-middle pb-1 pt-1"><button type="button"
                                                                class="btn  btn-icon btn-danger" data-toggle="tooltip"
                                                                data-placement="top" title="Quitar"><i
                                                                    class="feather icon-x"></i></button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="ges_ficha_dental" onchange="es_ges();"
                                                name="ges_ficha_dental">
                                            <label for="ges_ficha_dental" class="cr"></label>
                                        </div>
                                        <label>Ges</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning my-0" role="alert">
                                        <table class="table table-borderless mt-0 mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle pb-1 pt-1" id="ges_seleccionado">
                                                        <span id="nombre_ges_dental_selec"></span>
                                                        <input type="hidden" name="id_ges_seleccionado"
                                                            id="id_ges_seleccionado">
                                                    </td>
                                                    <td class="align-middle pb-1 pt-1">
                                                        <button type="button" style="display:none;"
                                                            id="ges_botn_eliminar" class="btn  btn-icon btn-danger"
                                                            data-toggle="tooltip" data-placement="top"
                                                            onclick="quitar_ges_seleccionado();" title="Quitar">
                                                            <i class="feather icon-x"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" onclick="registrar_consulta_medica();" class="btn btn-info">Guardar
                                ficha clínica</button>
                            <button type="button" class="btn btn-success">Imprimir</button>
                        </div>
                    </div>

                </form>

            </div>

            <div class="tab-pane fade" id="odonto-adulto" role="tabpanel" aria-labelledby="odonto-adulto-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Odontograma</h5>
                        <hr>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="dt-responsive table-responsive table-borderless">
                            <table id="odontograma_adulto" class="display table dt-responsive nowrap"
                                style="width:100%">
                                <!-- ADULTO SUPERIOR -->
                                <tbody>
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t18">
                                                <img src="{{ asset('images/dental/dientes/d18.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma(1-8);">
                                            </div>
                                            <label data-ndiente="18" class="nav-label-dent">1.8</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto px-0 py-0" id="t17">
                                                <img src="{{ asset('images/dental/dientes/d17.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma(1-7);">
                                            </div>
                                            <label data-ndiente="17" class="nav-label-dent">1.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t16">
                                                <img src="{{ asset('images/dental/dientes/d16.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma(1-5);">
                                            </div>
                                            <label data-ndiente="16" class="nav-label-dent">1.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t15">
                                                <img src="{{ asset('images/dental/dientes/d15.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="15" class="nav-label-dent">1.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t14">
                                                <img src="{{ asset('images/dental/dientes/d14.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="14" class="nav-label-dent">1.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t13">
                                                <img src="{{ asset('images/dental/dientes/d13.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="13" class="nav-label-dent">1.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t12">
                                                <img src="{{ asset('images/dental/dientes/d12.png') }}"
                                                    class="wid-40 img-fluid" role="button"
                                                    onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="12" class="nav-label-dent">1.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t11">
                                                <img src="{{ asset('images/dental/dientes/d11.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="11" class="nav-label-dent">1.1</label>
                                        </td>
                                        <!--nnnn-->
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t21">
                                                <img src="{{ asset('images/dental/dientes/d21.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="21" class="nav-label-dent">2.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto px-1 py-1" id="t22">
                                                <img src="{{ asset('images/dental/dientes/d22.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="22" class="nav-label-dent">2.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t23">
                                                <img src="{{ asset('images/dental/dientes/d23.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="23" class="nav-label-dent">2.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t24">
                                                <img src="{{ asset('images/dental/dientes/d24.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="24" class="nav-label-dent">2.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t25">
                                                <img src="{{ asset('images/dental/dientes/d25.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="25" class="nav-label-dent">2.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t26">
                                                <img src="{{ asset('images/dental/dientes/d26.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="26" class="nav-label-dent">2.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t27">
                                                <img src="{{ asset('images/dental/dientes/d27.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="27" class="nav-label-dent">2.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t28">
                                                <img src="{{ asset('images/dental/dientes/d28.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="28" class="nav-label-dent">2.8</label>
                                        </td>
                                    </tr>
                                    <!-- ADULTO INFERIOR -->
                                    <tr>
                                        <td class="text-center px-0 py-0">
                                            <div class="#" id="t48">
                                                <img src="{{ asset('images/dental/dientes/d48.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndente="48" class="nav-label-dent">4.8</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="#" id="t47">
                                                <img src="{{ asset('images/dental/dientes/d47.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="47" class="nav-label-dent">4.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t46">
                                                <img src="{{ asset('images/dental/dientes/d46.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="46" class="nav-label-dent">4.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t45">
                                                <img src="{{ asset('images/dental/dientes/d45.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="45" class="nav-label-dent">4.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t44">
                                                <img src="{{ asset('images/dental/dientes/d44.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="44" class="nav-label-dent">4.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t43">
                                                <img src="{{ asset('images/dental/dientes/d43.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="43" class="nav-label-dent">4.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t42">
                                                <img src="{{ asset('images/dental/dientes/d42.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="42" class="nav-label-dent">4.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t41">
                                                <img src="{{ asset('images/dental/dientes/d41.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="41" class="nav-label-dent">4.1</label>
                                        </td>
                                        <!--nnnn-->
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t31">
                                                <img src="{{ asset('images/dental/dientes/d31.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="31" class="nav-label-dent">3.1</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t32">
                                                <img src="{{ asset('images/dental/dientes/d32.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="32" class="nav-label-dent">3.2</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t33">
                                                <img src="{{ asset('images/dental/dientes/d33.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="33" class="nav-label-dent">3.3</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="diente_adulto" id="t34">
                                                <img src="{{ asset('images/dental/dientes/d34.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="34" class="nav-label-dent">3.4</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t35">
                                                <img src="{{ asset('images/dental/dientes/d35.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="35" class="nav-label-dent">3.5</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t36">
                                                <img src="{{ asset('images/dental/dientes/d36.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="36" class="nav-label-dent">3.6</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t37">
                                                <img src="{{ asset('images/dental/dientes/d37.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="37" class="nav-label-dent">3.7</label>
                                        </td>
                                        <td class="text-center px-0 py-0">
                                            <div class="relative diente_adulto" id="t38">
                                                <img src="{{ asset('images/dental/dientes/d38.png') }}"
                                                    class="wid-40" role="button" onclick="info_odontograma();">
                                            </div>
                                            <label data-ndiente="38" class="nav-label-dent">3.8</label>
                                        </td>
                                    </tr>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="periodontograma" role="tabpanel" aria-labelledby="periodontograma-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-3 mb-0">
                                <h6 class="f-16 text-c-blue">PSR</h6>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                I=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">1.8</th>
                                                            <th class="text-center align-middle px-1 py-1">1.7</th>
                                                            <th class="text-center align-middle px-1 py-1">1.6</th>
                                                            <th class="text-center align-middle px-1 py-1">1.5</th>
                                                            <th class="text-center align-middle px-1 py-1">1.4</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                II=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">1.3</th>
                                                            <th class="text-center align-middle px-1 py-1">1.2</th>
                                                            <th class="text-center align-middle px-1 py-1">1.1</th>
                                                            <th class="text-center align-middle px-1 py-1">2.1</th>
                                                            <th class="text-center align-middle px-1 py-1">2.2</th>
                                                            <th class="text-center align-middle px-1 py-1">2.3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                IV=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">4.8</th>
                                                            <th class="text-center align-middle px-1 py-1">4.7</th>
                                                            <th class="text-center align-middle px-1 py-1">4.6</th>
                                                            <th class="text-center align-middle px-1 py-1">4.5</th>
                                                            <th class="text-center align-middle px-1 py-1">4.4</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                III=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">2.4</th>
                                                            <th class="text-center align-middle px-1 py-1">2.5</th>
                                                            <th class="text-center align-middle px-1 py-1">2.6</th>
                                                            <th class="text-center align-middle px-1 py-1">2.7</th>
                                                            <th class="text-center align-middle px-1 py-1">2.8</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                V=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">4.3</th>
                                                            <th class="text-center align-middle px-1 py-1">4.2</th>
                                                            <th class="text-center align-middle px-1 py-1">4.1</th>
                                                            <th class="text-center align-middle px-1 py-1">3.1</th>
                                                            <th class="text-center align-middle px-1 py-1">3.2</th>
                                                            <th class="text-center align-middle px-1 py-1">3.3</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 text-center">
                                            <label
                                                class="d-inline col-md-3 mb-1 font-weight-bolder form-inline mr-0 f-16 pr-0">GRUPO
                                                VI=</label>
                                            <input
                                                class="form-control form-control-sm d-inline col-md-2 mb-1 form-inline ml-0"
                                                type="text" name="" id="">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle px-1 py-1">3.4</th>
                                                            <th class="text-center align-middle px-1 py-1">3.5</th>
                                                            <th class="text-center align-middle px-1 py-1">3.6</th>
                                                            <th class="text-center align-middle px-1 py-1">3.7</th>
                                                            <th class="text-center align-middle px-1 py-1">3.8</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center align-middle px-1 py-1">
                                                                <select class="form-control form-control-sm" id=""
                                                                    name="">
                                                                    <option>0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>1*</option>
                                                                    <option>2*</option>
                                                                    <option>3*</option>
                                                                    <option>4*</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">PSR</label>
                                            <input type="text" class="form-control form-control-sm" name="pct_t"
                                                id="pcr_t">
                                        </div>
                                        <div class="form-group col-md-4" style="text-align:center" id="form_0">
                                            <a href="atencion_odontologica\modals\periodontograma\index" target="_blank"><button type="button"
                                                    class="btn btn-primary btn-sm btn-block"> Abrir
                                                    periodontograma</button></a>


                                        </div>
                                        <div class="form-group col-md-4" style="text-align:center" id="form_derperi">
                                            <button type="button" class="btn btn-success btn-sm btn-block"
                                                onclick="d_periodoncista1();"><i class="feather icon-file-plus"></i>
                                                Derivar a Periodoncista</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 text-center mx-auto">
                                            <button type="reset" class="btn btn-danger">Limpiar formulario</button>
                                            <button type="submit" class="btn btn-info">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="evaluacion-adulto" role="tabpanel" aria-labelledby="evaluacion-adulto-tab">
                <div class="row bg-white shadow-sm rounded mx-1">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mt-3 mb-0">
                                <h6 class="f-16 text-c-blue">Evaluación Adulto</h6>
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 px-1 py-1">
                                <button type="button" class="btn btn-info btn-sm btn-block"
                                    onclick="maxilar_superior();"><i class="feather icon-file-plus"></i> Maxilar
                                    superior</button>
                            </div>
                            <div class="col-md-3 px-1 py-1">
                                <button type="button" class="btn btn-info btn-sm btn-block"
                                    onclick="maxilar_inferior();"><i class="feather icon-file-plus"></i> Maxilar
                                    inferior</button>
                            </div>
                            <div class="col-md-3 px-1 py-1">
                                <button type="button" class="btn btn-info btn-sm btn-block"
                                    onclick="boca_completa();"><i class="feather icon-file-plus"></i> Boca
                                    Completa</button>
                            </div>
                            <div class="col-md-3 px-1 py-1">
                                <button type="button" class="btn btn-primary btn-sm btn-block"
                                    onclick="prest_lab();"><i class="feather icon-file-plus"></i>Solicitud en
                                    laboratorio</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-center text-c-blue mb-2">GRUPO 1</h6>
                                <div class="table-responsive">
                                    <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <option value="1-8"> 1-8 </option>
                                                        <option value="1-7"> 1-7 </option>
                                                        <option value="1-6"> 1-6 </option>
                                                        <option value="1-5"> 1-5 </option>
                                                        <option value="1-4"> 1-4</option>
                                                    </select>
                                                    <div id="t53">
                                                        <img src="{{ asset('images/dental/i/dientes/d18.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma1" id="odontograma1"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_1" id="caraM_check_1"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_1" id="caraO_check_1"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_1" id="caraD_check_1"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_1" id="carav_check_1"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_1" id="caraP_check_1"
                                                        value="0">
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
                                <h6 class="text-center text-c-blue mb-2">GRUPO 2</h6>
                                <div class="table-responsive">
                                    <form id="form_5_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <option value="1-3"> 1-3</option>
                                                        <option value="1-2"> 1-2</option>
                                                        <option value="1-1"> 1-1</option>
                                                        <option value="2-1"> 2-1</option>
                                                        <option value="2-2"> 2-2</option>
                                                        <option value="2-3"> 2-3</option>
                                                    </select>
                                                    <div id="t53">
                                                        <img src="{{ asset('images/dental/i/dientes/d21.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma2" id="odontograma2"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_2" id="caraM_check_2"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_2" id="caraO_check_2"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_2" id="caraD_check_2"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_2" id="carav_check_2"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_2" id="caraP_check_2"
                                                        value="0">
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
                                <h6 class="text-center text-c-blue mb-2">GRUPO 3</h6>
                                <div class="table-responsive">
                                    <form id="form_7_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <option value="2-4"> 2-4 </option>
                                                        <option value="2-5"> 2-5 </option>
                                                        <option value="2-6"> 2-6 </option>
                                                        <option value="2-7"> 2-7 </option>
                                                        <option value="2-8"> 2-8 </option>
                                                    </select>
                                                    <div id="t53">
                                                        <img src="{{ asset('images/dental/i/dientes/d26.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma3" id="odontograma3"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_3" id="caraM_check_3"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_3" id="caraO_check_3"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_3" id="caraD_check_3"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_3" id="carav_check_3"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_3" id="caraP_check_3"
                                                        value="0">
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
                                <h6 class="text-center text-c-blue mb-2">GRUPO 4</h6>
                                <div class="table-responsive">
                                    <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <option value="4-8"> 4-8 </option>
                                                        <option value="4-7"> 4-7 </option>
                                                        <option value="4-7"> 4-7 </option>
                                                        <option value="4-5"> 4-5 </option>
                                                        <option value="4-4"> 4-4</option>
                                                    </select>
                                                    <div id="t53">
                                                        <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma4" id="odontograma4"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                        value="0">
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
                                <h6 class="text-center text-c-blue mb-2">GRUPO 5</h6>
                                <div class="table-responsive">
                                    <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <img src="{{ asset('images/dental/i/dientes/d31.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma4" id="odontograma4"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                        value="0">
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
                                <h6 class="text-center text-c-blue mb-2">GRUPO 6</h6>
                                <div class="table-responsive">
                                    <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                        method="POST">

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
                                                        <img src="{{ asset('images/dental/i/dientes/d38.png') }}"
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
                                                        class="btn btn-block btn-sm btn-outline-primary"
                                                        data-toggle="popover" title="Historia"
                                                        data-content="cargar historia del diente">Ver
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
                                                            <option value="dp_7">Exodoncia simple diente temporal
                                                            </option>
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
                                                            <option value="dp_19">Recubrimiento pulpar indirecto
                                                            </option>
                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                            </option>
                                                            <option value="dp_21">Sesión de adaptación</option>
                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                anterior
                                                            </option>
                                                            <option value="dp_23">Tratamiento de conducto en pieza
                                                                temporal
                                                                posterior</option>
                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                        </optgroup>
                                                    </select>
                                                    <input type="hidden" name="odontograma4" id="odontograma4"
                                                        value="1">
                                                    <input type="hidden" name="caraM_check_4" id="caraM_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraO_check_4" id="caraO_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraD_check_4" id="caraD_check_4"
                                                        value="0">
                                                    <input type="hidden" name="carav_check_4" id="carav_check_4"
                                                        value="0">
                                                    <input type="hidden" name="caraP_check_4" id="caraP_check_4"
                                                        value="0">
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
            <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento-tab">
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
<!--MODALES-->
@include('app.dental.modals.ficha.modal_ges')

<?php
//include 'modals/modal_presupuesto.php';
?>
<!--Modals evaluación-->
<?php
//include 'modals/tratamiento_boca_completa.php';
//include 'modals/tratamiento_maxilar_inferior.php';
//include 'modals/tratamiento_maxilar_superior.php';
?>
