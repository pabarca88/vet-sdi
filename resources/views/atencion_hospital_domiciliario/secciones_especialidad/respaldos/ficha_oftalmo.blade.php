<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="fcc-tab" data-toggle="tab" href="#fcc" role="tab" aria-controls="fcc" aria-selected="false">Ficha de atención general</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="atencion_oft-tab" data-toggle="tab" href="#atencion_oft" role="tab" aria-controls="atencion_oft" aria-selected="true">Ficha de atención especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="rinofibro-tab" data-toggle="tab" href="#rinofibro" role="tab" aria-controls="rinofibro" aria-selected="false">Procedimientos en consulta</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="tab-content" id="oft-contenido">
                    <!--ATENCIÓN  GENERAL-->
                    <div class="tab-pane fade show active" id="fcc" role="tabpanel" aria-labelledby="fcc-tab">
                         <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                        <hr>
                                    </div>
                                </div>
                                <!--FORMULARIOS-->
                                <div class="row">
                                    <!--INFO MENOR DE EDAD-->
                                    {{--  @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)  --}}
                                        <div class="col-sm-12 mt-3">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h6>Paciente Menor de Edad</h6>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-row">
                                                        <input type="hidden" name="id_tipo_autorizacion_acompanante" id="id_tipo_autorizacion_acompanante" value="1">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut_acompanante" id="rut_acompanante" oninput="formatoRut(this)">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Nombres</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Apellidos</label>
                                                            <input type="text" class="form-control form-control-sm" name="apell_acompanante" id="apell_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3" id="">
                                                            <label class="floating-label-activo-sm">Relación</label>
                                                            <select name="relacion_acompanante" id="relacion_acompanante" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Madre</option>
                                                                <option value="2">Padre</option>
                                                                <option value="3">Tio(a)</option>
                                                                <option value="4">Abuelo(a)</option>
                                                                <option value="5">Hermano(a) (Mayor Edad)</option>
                                                                <option value="6">Primo(a) (Mayor Edad)</option>
                                                                <option value="7">Amigo(a) de Familia (Mayor Edad)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3" id="">
                                                            <label class="floating-label-activo-sm">Forme de envio</label>
                                                            <select name="tipo_medio_acompanante" id="tipo_medio_acompanante" class="form-control form-control-sm">
                                                                <option value="1">SMS</option>
                                                                <option value="2">EMAIL</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Teléfono</label>
                                                            <input type="text" class="form-control form-control-sm" name="tel_acompanante" id="tel_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm" name="email_acompanante" id="email_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                            <!--genera codigo de aceptación al teléfono del responsable -->
                                                        </div>

                                                        {{--  <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Nombre del acompañante</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante" value="{!! old('nombre_acompanante') !!}">
                                                        </div>
                                                        <div class="form-group col-md-6" id="form_0">
                                                            <label class="floating-label-activo-sm">Relaci&oacute;n</label>
                                                            <input type="text" class="form-control form-control-sm" name="relacion_acompanante" id="relacion_acompanante" value="{!! old('relacion_acompanante') !!}">
                                                        </div>  --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    {{--  @endif  --}}

                                    <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ANTECEDENTES-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                  Antecedentes
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse show" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12 mx-auto">
                                                                <label class="floating-label">Descripción</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;"name="antecedentes" id="antecedentes"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN FÍSICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="examen-fisico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#examen-fisico-c" aria-expanded="false" aria-controls="examen-fisico-c">
                                                  Examen físico
                                                </button>
                                            </div>
                                            <div id="examen-fisico-c" class="collapse show" aria-labelledby="examen-fisico" data-parent="#examen-fisico">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label">Examen general</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ex_fisc_gral" id="ex_fisc_gral"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SIGNOS VITALES Y OTROS-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="signosvit-otros">
                                                <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                                Signos vitales y otros
                                                </button>
                                            </div>
                                            <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label">Tº</label>
                                                                <input type="text" class="form-control form-control-sm" name="temp" id="temp">
                                                            </div>
                                                            <div class="form-group col-md-1">
                                                                <label class="floating-label">Pulso</label>
                                                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Frec. Reposo</label>
                                                                <input type="text" class="form-control form-control-sm" name="fc_reposo" id="fc_reposo">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Peso</label>
                                                                <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Talla</label>
                                                                <input type="text" class="form-control form-control-sm" name="talla" id="talla">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">IMC</label>
                                                                <input type="text" class="form-control form-control-sm" name="imc" id="imc">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Estado nutricional</label>
                                                                <input type="text" class="form-control form-control-sm" name="est_nut" id="est_nut">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Presión arterial</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="p_arterial_esp">
                                                                    <label for="p_arterial_esp" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_1_esp" style="display:none">
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">BI</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_bi" id="pa_bi">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">BD</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_bd" id="pa_bd">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">De pié</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_pie" id="pa_pie">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label class="floating-label">Sentado</label>
                                                                <input type="text" class="form-control form-control-sm" name="pa_sent" id="pa_sent">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group mb-1">
                                                                <label><strong>Comunicación y traslado</strong></label>
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" id="com_trasl_esp">
                                                                    <label for="com_trasl_esp" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row" id="form_2_esp" style="display:none">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Estado de conciencia</label>
                                                                <input type="text" class="form-control form-control-sm" name="conc" id="conc">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Lenguaje</label>
                                                                <input type="text" class="form-control form-control-sm" name="leng" id="leng">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Traslado</label>
                                                                <input type="text" class="form-control form-control-sm" name="trasl" id="trasl">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="hip_diag" id="hip_diag"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="cie-10" id="cie-10"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_lente();"><i class="fa fa-plus"></i> Receta de lentes</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                         <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen_espoft();"><i class="fa fa-plus"></i> Indicar examen especialidad</button>
                                    </div>
                                </div>
                                <hr>
                                <!--ENFERMO CRÓNICO O GES-->
                                <div class="row px-3 mb-3 mt-3">
                                    <div class="col-md-6 mx-auto">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="enf_cronico" name="check_1" data-toggle="modal" data-target="#form_enfermo_cronico">
                                                        <label for="enf_cronico" class="cr"></label>
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
                                                            <tr>
                                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="modal_ges">
                                                        <label for="modal_ges" class="cr" data-toggle="modal" data-target="#form_ges"></label>
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
                                                                <td class="align-middle pb-1 pt-1">Paciente GES PS.02</td>
                                                                <td class="align-middle pb-1 pt-1"><button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar"><i class="feather icon-x"></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN GENERAL-->
                    <!--FICHA DE ATENCIÓN ESPECIALIDAD-->
                    <div class="tab-pane fade" id="atencion_oft" role="tabpanel" aria-labelledby="atencion_oft-tab">
                        <div class="row bg-white shadow-none rounded mx-1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-0">
                                        <h6 class="f-16 text-c-blue">Ficha de atención especialidad</h6>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--INFO MENOR DE EDAD-->
                                        {{--  @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)  --}}
                                        <div class="col-sm-12 mt-3">
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <h6>Paciente Menor de Edad</h6>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-row">
                                                        <input type="hidden" name="id_tipo_autorizacion_acompanante" id="id_tipo_autorizacion_acompanante" value="1">
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut_acompanante" id="rut_acompanante" oninput="formatoRut(this)">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Nombres</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Apellidos</label>
                                                            <input type="text" class="form-control form-control-sm" name="apell_acompanante" id="apell_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3" id="">
                                                            <label class="floating-label-activo-sm">Relación</label>
                                                            <select name="relacion_acompanante" id="relacion_acompanante" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                <option value="1">Madre</option>
                                                                <option value="2">Padre</option>
                                                                <option value="3">Tio(a)</option>
                                                                <option value="4">Abuelo(a)</option>
                                                                <option value="5">Hermano(a) (Mayor Edad)</option>
                                                                <option value="6">Primo(a) (Mayor Edad)</option>
                                                                <option value="7">Amigo(a) de Familia (Mayor Edad)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3" id="">
                                                            <label class="floating-label-activo-sm">Forme de envio</label>
                                                            <select name="tipo_medio_acompanante" id="tipo_medio_acompanante" class="form-control form-control-sm">
                                                                <option value="1">SMS</option>
                                                                <option value="2">EMAIL</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Teléfono</label>
                                                            <input type="text" class="form-control form-control-sm" name="tel_acompanante" id="tel_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm" name="email_acompanante" id="email_acompanante">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el examen</button>
                                                            <!--genera codigo de aceptación al teléfono del responsable -->
                                                        </div>

                                                        {{--  <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Nombre del acompañante</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante" value="{!! old('nombre_acompanante') !!}">
                                                        </div>
                                                        <div class="form-group col-md-6" id="form_0">
                                                            <label class="floating-label-activo-sm">Relaci&oacute;n</label>
                                                            <input type="text" class="form-control form-control-sm" name="relacion_acompanante" id="relacion_acompanante" value="{!! old('relacion_acompanante') !!}">
                                                        </div>  --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    {{--  @endif  --}}
                                     <!--MOTIVO CONSULTA-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta-esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-esp-oft" aria-expanded="false" aria-controls="mot-consulta-esp-oft">
                                                  Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-esp-oft" class="collapse show" aria-labelledby="mot-consulta-esp" data-parent="#mot-consulta-esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label">Consulta por:</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6 mx-auto">
                                                                <label class="floating-label">Antecedentes Oftalmológicos:</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_esp_oft" id="ant_esp_oft"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--EXAMEN ESPECIALIDAD - PARAMETROS DE CONTROL-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="exam_esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                                                  Examen especialidad
                                                </button>
                                            </div>
                                            <div id="exam_esp_c" class="collapse show" aria-labelledby="exam_esp" data-parent="#exam_esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row mb-2">
                                                            <div class="col-md-12">
                                                                <h6>Parámetros de control</h6>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label class="floating-label">Aspecto General</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="asp_general" id="asp_general"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Agudeza visual Subj. OD</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="avs_od" id="avs_od"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Agudeza visual Subj. OI</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="avs_oi" id="avs_oi"></textarea>
                                                            </div>
															<div class="form-group col-md-2">
                                                                <label class="floating-label">Agudeza visual Obj. OD</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="avo_od" id="avo_od"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Agudeza visual Obj. OI</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="avo_oi" id="avo_oi"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Movimientos oculares </label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="mov_ocular" id="mov_ocular"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Autorrefractometría OD</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="arm_od" id="arm_od"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Autorrefractometría OI</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="arm_oi" id="arm_oi"></textarea>
                                                            </div>
															<div class="form-group col-md-2">
                                                                <label class="floating-label">Presión ocular OD</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pio_od" id="pio_od"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Presión ocular OI</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="pio_oi" id="pio_oi"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Otros</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_par_oft" id="otros_par_oft"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label class="floating-label">Campo visual OD</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="cvisual_od_oft" id="cvisual_od_oft"></textarea>
                                                            </div>
															<div class="form-group col-md-2">
                                                                <label class="floating-label">Campo visual OI</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="cvisual_oi_oft" id="cvisual_oi_oft"></textarea>
                                                            </div>
															<div class="form-group col-md-8">
                                                                <label class="floating-label">Observaciones Examen Oftalmológico</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="bs_ex_oft" id="obs_ex_oft"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="bio_esp_oftalmo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#bio_oftalmo" aria-expanded="false" aria-controls="bio_oftalmo">
                                                   Biomicroscopía
                                                </button>
                                            </div>
                                            <div id="bio_oftalmo" class="collapse show" aria-labelledby="bio_oftalmo" data-parent="#bio_oftalmo">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
														<div class="row">
															<div class="col-md-12 mt-3 mb-0">
																<h6 class="f-12 text-c-blue">OJO DERECHO</h6>

																<hr>
															</div>
														</div>
                                                        <div class="form-row">
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Párpados</label>
																<select name="parpados_od" id="parpados_od" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Conjuntivas</label>
																<select name="conjuntivas_od" id="conjuntivas_od" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Córneas</label>
																<select name="corneas_od" id="corneas_od" class="form-control form-control-sm">
																	<option value="1">Claras y completamente epitelizadas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Cámara anterior</label>
																<select name="cam_ant_od" id="cam_ant_od" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Tyndall</label>
																<select name="tyn_od" id="tyn_od" class="form-control form-control-sm">
																	<option value="1">Negativo</option>
																	<option value="2">Positívo</option>

																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Cristalinos</label>
																<select name="crist_od" id="crist_od" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>

															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Párpados</label>
																	<input type="text"  name="otros_par_od" id="otros_par_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Conjuntivas</label>
																	<input type="text"  name="otros_conj_od" id="otros_conj_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Corneas</label>
																	<input type="text" name="otros_corneas_od" id="otros_corneas_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Camara Anterior</label>
																	<input type="text" name="otros_ca_od" id="otros_ca_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Tyndall</label>
																	<input type="text" name="otros_ty_od" id="otros_ty_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Cristalinos</label>
																	<input type="text" name="otros_cris_od" id="otros_cris_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="floating-label-activo-sm">Observaciones Ojo Derecho</label>
																<input type="text" class="form-control form-control-sm" name="Obs_od" id="Obs_od">
															</div>
                                                        </div>
														<div class="row">
															<div class="col-md-12 mt-3 mb-0">
																<h6 class="f-12 text-c-blue">OJO IZQUIERDO</h6>
																<hr>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Párpados</label>
																<select name="parpados_oi" id="parpados_oi" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Conjuntivas</label>
																<select name="conjuntivas_oi" id="conjuntivas_oi" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Córneas</label>
																<select name="corneas_oi" id="corneas_oi" class="form-control form-control-sm">
																	<option value="1">Claras y completamente epitelizadas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Cámara anterior</label>
																<select name="cam_ant_oi" id="cam_ant_oi" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Tyndall</label>
																<select name="tyn_oi" id="tyn_oi" class="form-control form-control-sm">
																	<option value="1">Negativo</option>
																	<option value="2">Positívo</option>

																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Cristalinos</label>
																<select name="crist_oi" id="crist_oi" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>

															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Párpados</label>
																	<input type="text"  name="otros_par_oi" id="otros_par_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Conjuntivas</label>
																	<input type="text"  name="otros_conj_oi" id="otros_conj_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Corneas</label>
																	<input type="text" name="otros_corneas_oi" id="otros_corneas_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Camara Anterior</label>
																	<input type="text" name="otros_ca_oi" id="otros_ca_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Tyndall</label>
																	<input type="text" name="otros_ty_oi" id="otros_ty_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Cristalinos</label>
																	<input type="text" name="otros_cris_oi" id="otros_cris_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="floating-label-activo-sm">Observaciones Ojo Izquierdo</label>
																<input type="text" class="form-control form-control-sm" name="Obs_oi" id="Obs_oi">
															</div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="fo-esp_oftalmo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#fo-oftalmo" aria-expanded="false" aria-controls="fo-oftalmo">
                                                   Fondo de Ojo
                                                </button>
                                            </div>
                                            <div id="fo-oftalmo" class="collapse show" aria-labelledby="fo-oftalmo" data-parent="#fo-oftalmo">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <form>
														<div class="row">
															<div class="col-md-12 mt-3 mb-0">
																<h6 class="f-12 text-c-blue">OJO DERECHO</h6>

																<hr>
															</div>
														</div>
                                                        <div class="form-row">
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Papilas</label>
																<select name="papilas_od" id="papilas_od" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">excavación</label>
																<select name="exc_od" id="exc_od" class="form-control form-control-sm">
																	<option value="1">0</option>
																	<option value="2">0.1</option>
																	<option value="3">0.2</option>
																	<option selected='selected' value="4">0.3</option>
																	<option value="5">0.4</option>
																	<option value="6">0.5</option>
																	<option value="7">0.6</option>
																	<option value="8">0.7</option>
																	<option value="9">0.8</option>
																	<option value="10">0.9</option>
																	<option value="11">Total</option>
																	<option value="12">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Bordes</label>
																<select name="bordes_od" id="bordes_od" class="form-control form-control-sm">
																	<option value="1">Bordes Netos y Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Máculas</label>
																<select name="maculas_od" id="maculas_od" class="form-control form-control-sm">
																	<option value="1">Sanas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Vasos</label>
																<select name="vasos_od" id="vasos_od" class="form-control form-control-sm">
																	<option value="1"> Vasos Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Periféria</label>
																<select name="perif_od" id="perif_od" class="form-control form-control-sm">
																	<option value="1">Sanas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>

																</select>
															</div>


															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Papilas</label>
																	<input type="text"  name="otros_papilas_od" id="otros_papilas_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Excavación</label>
																	<input type="text"  name="otros_exc_od" id="otros_exc_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Bordes</label>
																	<input type="text" name="otros_bordes_od" id="otros_bordes_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Máculas</label>
																	<input type="text" name="otros_macula_od" id="otros_macula_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Vasos</label>
																	<input type="text" name="otros_vasos_od" id="otros_vasos_od" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Periféria</label>
																	<input type="text" name="otros_periferia_od" id="otros_periferia_od

																	" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="floating-label-activo-sm">Observaciones Ojo Derecho</label>
																<input type="text" class="form-control form-control-sm" name="Obs_fo_od" id="Obs_fo_od">
															</div>
                                                        </div>
														<div class="row">
															<div class="col-md-12 mt-3 mb-0">
																<h6 class="f-12 text-c-blue">OJO IZQUIERDO</h6>
																<hr>
															</div>
														</div>
														<div class="form-row">
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Papilas</label>
																<select name="papilas_oi" id="papilas_oi" class="form-control form-control-sm">
																	<option value="1">Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">excavación</label>
																<select name="exc_oi" id="exc_oi" class="form-control form-control-sm">
																	<option value="1">0</option>
																	<option value="2">0.1</option>
																	<option value="3">0.2</option>
																	<option selected='selected' value="4">0.3</option>
																	<option value="5">0.4</option>
																	<option value="6">0.5</option>
																	<option value="7">0.6</option>
																	<option value="8">0.7</option>
																	<option value="9">0.8</option>
																	<option value="10">0.9</option>
																	<option value="11">Total</option>
																	<option value="12">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Bordes</label>
																<select name="bordes_oi" id="bordes_oi" class="form-control form-control-sm">
																	<option value="1">Bordes Netos y Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Máculas</label>
																<select name="maculas_oi" id="maculas_oi" class="form-control form-control-sm">
																	<option value="1">Sanas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Vasos</label>
																<select name="vasos_oi" id="vasos_oi" class="form-control form-control-sm">
																	<option value="1"> Vasos Normales</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>
																</select>
															</div>
															<div class="form-group col-md-2">
																<label class="floating-label-activo-sm">Periféria</label>
																<select name="perif_oi" id="perif_oi" class="form-control form-control-sm">
																	<option value="1">Sanas</option>
																	<option value="2">Anormales</option>
																	<option value="3">Otros</option>

																</select>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Papilas</label>
																	<input type="text"  name="otros_papilas_oi" id="otros_papilas_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Excavación</label>
																	<input type="text"  name="otros_exc_oi" id="otros_exc_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Bordes</label>
																	<input type="text" name="otros_bordes_oi" id="otros_bordes_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Máculas</label>
																	<input type="text" name="otros_macula_oi" id="otros_macula_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Vasos</label>
																	<input type="text" name="otros_vasos_oi" id="otros_vasos_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="col-md-2" hidden="hidden">
																<div class="form-group fill">
																	<label class="floating-label">Otros Periféria</label>
																	<input type="text" name="otros_periferia_oi" id="otros_periferia_oi" class="form-control form-control-sm " disabled >
																</div>
															</div>
															<div class="form-group col-md-12">
																<label class="floating-label-activo-sm">Observaciones Ojo Izquierdo</label>
																<input type="text" class="form-control form-control-sm" name="Obs_fo_oi" id="Obs_fo_oi">
															</div>
                                                        </div>
                                                    </form>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									 <!--DIAGNÓSTICO-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico-esp">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-esp-c" aria-expanded="false" aria-controls="diagnostico-esp-c">
                                                  Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-esp-c" class="collapse show" aria-labelledby="diagnostico-esp" data-parent="#diagnostico-esp">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis diagnóstica</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="hip_diag" id="hip_diag"></textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Indicaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="cie-10" id="cie-10"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!--PLAN-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="plan_oftalmo">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#plan_oft" aria-expanded="false" aria-controls="plan_oft">
                                                  Planificación de tratamiento
                                                </button>
                                            </div>
                                            <div id="plan_oft" class="collapse show" aria-labelledby="plan_oft" data-parent="#plan_oft">
                                                <div class="card-body-aten shadow-none">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                                <div class="form-check">
																  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
																  <label class="form-check-label" for="defaultCheck1">
																	Solo Tratamiento Médico
																  </label>
																</div>
                                                            </div>
															<div class="form-group col-md-3">
                                                                <div class="form-check">
																  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
																  <label class="form-check-label" for="defaultCheck1">
																	Lentes
																  </label>
																</div>
                                                            </div>
															<div class="form-group col-md-3">
                                                                <div class="form-check">
																  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
																  <label class="form-check-label" for="defaultCheck1">
																	Procedimiento
																  </label>
																</div>
                                                            </div>
															<div class="form-group col-md-3">
                                                                <div class="form-check">
																  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
																  <label class="form-check-label" for="defaultCheck1">
																	Cirugía
																  </label>
																</div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_lente();"><i class="fa fa-plus"></i> Receta de lentes</button>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                         <button type="button" class="btn btn-info btn-block btn-sm mt-1" onclick="i_examen_espoft();"><i class="fa fa-plus"></i> Indicar examen especialidad</button>
                                    </div>
                                </div>
                                <hr>
                                <!--Guardar o imprimir ficha-->
                                <div class="row mb-3">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-info">Guardar</button>
                                        <button type="button" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





