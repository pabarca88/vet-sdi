<!-- Modal consulta agenda profesional-->
<div id="consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="consulta" aria-hidden="true"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <input type="hidden" name="estado_id_profesional" id="estado_id_profesional" value="">
            <input type="hidden" name="estado_id_paciente" id="estado_id_paciente" value="">
            <input type="hidden" name="id_hora_medica" id="id_hora_medica" value="">
            <div class="modal-header bg-info pt-3 pb-3">
                <h6 id="cabecera_hora_medica" class="text-white f-16 mb-0 mt-0">Información del paciente</h6>
            </div>
            <div class="modal-body">
                <form id="datos_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <table class="table table-borderless table-xs text-break table-responsive modal-agenda">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <strong>Rut</strong>
                                        <td>
                                            <span id="datos_consulta_rut"></span>
                                        </td>


                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Nombre</strong>
                                        <td>
                                            <span id="datos_consulta_nombre"></span>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Fecha Nacimiento</strong>
                                        <td>
                                            <span id="datos_consulta_edad"></span>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Sexo</strong>
                                        <td>
                                            <span id="datos_consulta_sexo"></span>
                                        </td>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

                <form id="cancelacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group ">
                                <label class="floating-label">Comentarios</label>
                                <input type="text" class="form-control" id="cancelar_hora_comentario"
                                    name="cancelar_hora_comentario">
                            </div>

                        </div>
                    </div>
                </form>

                <form id="confirmacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group ">
                                <label class="floating-label-activo-sm">Vía de Confirmación</label>
                                {{--  <input type="text" class="form-control" id="confirmar_hora_comentario" name="confirmar_hora_comentario">  --}}
                                <select class="form-control" name="confirmar_hora_comentario"
                                    id="confirmar_hora_comentario">
                                    @if (isset($reg_confirmacion_hora))
                                        @foreach ($reg_confirmacion_hora as $reg)
                                            <option value="{{ $reg->nombre }}">
                                                {{ $reg->nombre }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="0">Seleccione</option>
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">

                <div>
                    <button type="button" onclick="opcion_cancelar_hora();" id="hm_anular_hora"
                        class="btn btn-danger btn-sm" data-dismiss="modal">
                        Anular Hora
                    </button>
                </div>

                <div>
                    <button type="submit" onclick="opcion_confirmar_hora()" id="hm_confirmar_hora"
                        class="btn btn-success btn-sm">
                        Confirmar Hora
                    </button>
                </div>


                <div>
                    <button type="submit" id="hm_ver_hora" class="btn btn-info btn-sm">Ver Atención</button>
                </div>


                <div>

                    <form method="get" action="{{ route('profesional.realizar_consulta') }}">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">
                        <input type="hidden" name="lugar_atencion_id" id="lugar_atencion_id"
                            value="$('#agenda_lugar_atencion_asistente').val();">

                        <button type="submit" id="hm_atender_hora" class="btn btn-info btn-sm">Atender</button>
                    </form>
                </div>

                <div>
                    <form method="get" action="#">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">

                        <button type="submit" id="hm_espera_paciente_hora" class="btn btn-info btn-sm"
                            onclick="paciente_esperando();">Esperando</button>
                    </form>
                </div>

                <div>
                    <button type="button" id="cerrarModal" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar
                    </button>
                </div>
                <div>
                    <button type="button" id="confirmar_anulacion_hora" onclick="cancelar_hora();"
                        class="btn btn-danger btn-sm">Anular
                        Hora
                    </button>
                </div>
                <div>
                    <button type="button" id="confirmacion_hora" onclick="confirmar_hora();"
                        class="btn btn-success btn-sm">Confirmar
                        Hora
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- INICIO RECEPCION BONO  -->
<!--Modal Recepción de Bonos y programas-->
<div id="modal_recepcion_bonos_api" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="Recepcion de bonos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modal_pago_consulta_title">Pago Consulta</h5>
                <button type="button" class="close close_modal_recepcion_bonos_api" data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body pb-0">
                {{--  BOTONES  --}}
                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-bonos" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-recibir-bono" data-toggle="pill"
                            href="#pills-recibir-bono" role="tab" aria-controls="pills-home"
                            aria-selected="true">Recibir Pago</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-venta-tab" data-toggle="pill" href="#pills-venta"
                            role="tab" aria-controls="pills-venta" aria-selected="false">Venta de Bonos</a>
                    </li>
                </ul>
                {{--  PESTAÑAS  --}}
                <div class="tab-content" id="pills-tabContent-interconsulta">
                    {{--  PESTAÑA DE RECIBIR PAGO  --}}
                    <div class="tab-pane fade show active" id="pills-recibir-bono" role="tabpanel"
                        aria-labelledby="pills-tab-recibir-bono">
                        <div class="form-row">
                            <input type="hidden" name="bono_hora_medica" id="bono_hora_medica">
                            <input type="hidden" name="bono_id_profesional" id="bono_id_profesional">
                            <input type="hidden" name="bono_id_paciente" id="bono_id_paciente">
                            <input type="hidden" name="bono_id_tipo_bono" id="bono_id_tipo_bono" value="1">
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Rut del Paciente</label>
                                    <input type="person" class="form-control form-control-sm"
                                        name="bono_paciente_rut" id="bono_paciente_rut">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre del Paciente</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="bono_paciente_nombre" id="bono_paciente_nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm"> Nombre Profesional</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="bono_profesional_nombre" id="bono_profesional_nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm"> Rut Profesional</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="bono_profesional_rut" id="bono_profesional_rut">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Clase Pago</label>
                                    <select id="bono_id_clase_bono" name="bono_id_clase_bono"
                                        class="form-control form-control-sm">
                                        <option value="1">Bono Fisico</option>
                                        <option value="2">Sencillito</option>
                                        <option value="3">Caja Vecina</option>
                                        <option value="4">Bono Web</option>
                                        <option value="5">Bono Web Pre-Pago</option>
                                        <option value="6">Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nº de bono o programa</label>
                                    <input type="text" class="form-control form-control-sm" name="bono_numero"
                                        id="bono_numero">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select id="bono_prevision" name="bono_prevision"
                                        class="form-control form-control-sm">
                                        <option value="0">Selecione una opción</option>
                                        @foreach ($prevision as $prev)
                                            <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Valor total</label>
                                    <input name="bono_valor_consulta" id="bono_valor_consulta" type="number"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="recepcion_programa">
                                        <label for="recepcion_programa" class="cr"></label>
                                    </div>
                                    <label>Recepción de programa</label>
                                </div>
                                <div class="form-group" id="sesiones_programa" style="display:none">
                                    <label class="floating-label">Nº de Sesiones</label>
                                    <input name="bono_sn_sesiones" id="bono_sn_sesiones" type="number"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group text-center my-2 pb-2">
                                    <div onclick="recepcion_pago();" class="btn btn-success">Recepcionar</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  PESTAÑA DE VENTA DE BONO  --}}
                    <div class="tab-pane fade" id="pills-venta" role="tabpanel" aria-labelledby="pills-venta-tab">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="person" class="form-control form-control-sm" name="venta_rut"
                                        id="venta_rut">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nº de serie carne</label>
                                    <input type="text" class="form-control form-control-sm" name="venta_serie"
                                        id="venta_serie">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" name="venta_nombre"
                                        id="venta_nombre">
                                    <input type="hidden" class="form-control form-control-sm"
                                        name="venta_paciente_nombre" id="venta_paciente_nombre">
                                    <input type="hidden" class="form-control form-control-sm"
                                        name="venta_paciente_apellido_uno" id="venta_paciente_apellido_uno">
                                    <input type="hidden" class="form-control form-control-sm"
                                        name="venta_paciente_apellido_dos" id="venta_paciente_apellido_dos">
                                    <input type="hidden" class="form-control form-control-sm"
                                        name="venta_paciente_email" id="venta_paciente_email">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Previsión</label>
                                    <select id="venta_prevision" name="venta_prevision"
                                        class="form-control form-control-sm">
                                        <option value="0">Selecione una opción</option>
                                        @foreach ($prevision as $prev)
                                            <option value="{{ $prev->id }}">{{ $prev->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" id="div_btn_pedir_autorizacion">
                                <div class="form-group fill">
                                    <button type="button" onclick="conectar_api();"
                                        class="btn btn-info btn-sm has-ripple">Pedir Autorización</button>
                                </div>
                            </div>

                            {{-- seccion autorizado --}}
                            <div class="venta_autorizada row" style="display: none;">

                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Folio</label>
                                        <input type="number" class="form-control form-control-sm" name="venta_folio"
                                            id="venta_folio">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor Bono</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="venta_valor_consulta" id="venta_valor_consulta">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor Bonificación</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="venta_valor_pagar" id="venta_valor_pagar">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Aporte Seguro</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="venta_valor_seguro" id="venta_valor_seguro">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Valor a pagar</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="venta_valor_copago" id="venta_valor_copago">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <button type="button" class="btn btn-info btn-sm has-ripple left-0"
                                            onclick="pago_venta_bono();">Generar Bono de Atención</button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="form-group fill text-left">
                                    <button type="button" class="btn btn-danger btn-sm has-ripple "
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FIN RECEPCION BONO  -->

<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <h6 class="text-c-blue f-14">Ingrese el RUT del paciente</h6>
                        </div>
                    </div>
                </div>

                {{--  BUSCADOR DE RUT  --}}
                <div class="form-row div_rut_buscar">
                    <div class="col-sm-9 col-md-9">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva"
                                    class="form-control form-control-sm" placeholder="Rut del paciente"
                                    aria-label="Rut del paciente" aria-describedby="button-addon2" required
                                    oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3 col-md-3 mb-3">
                        <button class="btn btn-sm btn-info btn-block" onclick="buscar_paciente();"
                            type="button"id="button-addon2">
                            <i class="feather icon-search"></i> Buscar
                        </button>
                    </div>
                </div>

                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="fecha_consulta" name="fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="">
                    <input type="hidden" name="fecha" id="fecha" value="">
                    <input type="hidden" name="reserva_hora_edad" id="reserva_hora_edad" value="">
                    <input type="hidden" name="reserva_hora_id_responsable" id="reserva_hora_id_responsable" value="">


                    <div id="reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td><span id="reserva_hora_email"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descripción reserva</label>
                                <input type="text" class="form-control form-control-sm"
                                    name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>

                        <div class="modal-footer mb-0 pt-1 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                    class="feather icon-x"></i> Cancelar</button>
                            <button type="button" onclick="agendar_hora();" class="btn btn-info"><i
                                    class="feather icon-check"></i> Agendar hora</button>
                        </div>
                    </div>

                    <div id="reserva_agregar_paciente_hora">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger py-1" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="paciente_dependiente"
                                            name="paciente_dependiente" onchange="activar_paciente_dependientes();">
                                        <label class="custom-control-label" for="paciente_dependiente">Paciente Dependiente</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- INFORMACION DEL PACIENTE --}}
                        <div class="form-row seccion_reserva_paciente_nuevo">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm"
                                        name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    {{-- <input type="date" class="form-control form-control-sm"
                                        name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac"
                                        onchange="evaluar_edad();"> --}}
                                    <input type="text" class="mask_date form-control form-control-sm"
                                        name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac"
                                        onchange="evaluar_edad();"
                                        maxlength="10" placeholder="dd/mm/aaaa"
                                        autocomplete="off"
                                        data-mask="00/00/0000"
                                    />
                                    <span id="mensaje_reserva_hora_fecha_nac" style="font-size: 10px; color: #f33; font-weight: bold; display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo"
                                        class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio"
                                        class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm"
                                        name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                    <input type="address" class="form-control form-control-sm"
                                        name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                        class="form-control form-control-sm" required>
                                        <option value="0">Seleccione</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar"
                                        class="form-control form-control-sm" required>
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico Paciente</label>
                                    <input type="text" class="form-control form-control-sm"
                                        onblur="validar_email_agenda()" name="reserva_hora_correo"
                                        id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="width: 100%; font-size: 10px; color: #f00; font-weight: bold; display:none"></span>
                                    <label class="" style="width: 100%; font-size: 10px; color: #f00; font-weight: bold;">En caso que sea menor de edad no es requerido</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm"
                                        name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno" onchange="validar_campo_telefono();">
                                </div>
                                <button class="btn btn-sm btn-info btn-block"
                                    type="button" id="btn_reserva_hora_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono();">
                                    <i class="feather icon-check"></i> Validar
                                </button>
                                <div class="form-group" style="display:none" name="div_codigo_validador" id="div_codigo_validador">
                                    <label class="floating-label-activo-sm">Codigo Validador</label>
                                    <input type="tel" class="form-control form-control-sm"
                                        name="reserva_hora_telefono_uno_codigo_validador" id="reserva_hora_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono();">
                                </div>
                                <input type="hidden" name="result_codigo_validacion" id="result_codigo_validacion" value="0">
                                <div id="div_codigo_validador_mensaje" style="display:none"></div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descripción reserva</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>

                        {{-- INFORMACION DEL REPRESENTANTE --}}
                        <div class="form-row seccion_reserva_paciente_nuevo_representante" style="display: none;">
                            <div class="col-sm-12 col-md-12 mb-3">
                                <h6 class="f-14 text-c-blue">Información del Representante Legal o encargado de la
                                    reserva:</h6>
                            </div>
                            <div class="col-sm-9 col-md-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">RUT</label>
                                    <input type="text" required class="form-control form-control-sm"
                                        name="reserva_hora_representante_rut" id="reserva_hora_representante_rut"
                                        oninput="formatoRut(this);">
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <button type="button" class="btn btn-info btn-sm btn-block"
                                    onclick="buscar_rut_representente();"><i class="feather icon-search"></i>
                                    Buscar</button>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-5 col-xl-5">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm"><span
                                            class="text-danger">*</span>Relación</label>
                                    <select class="form-control form-control-sm"
                                        name="reserva_hora_representante_agregar_relacion"
                                        id="reserva_hora_representante_agregar_relacion">
                                        <option value="">Seleccione</option>
                                        <option data-tipo="1" value="Hijo(a)" selected>Hijo(a)</option>
                                        <option data-tipo="1" value="Sobrino(a)">Sobrino(a)</option>
                                        <option data-tipo="1" value="Nieto(a)">Nieto(a)</option>
                                        <option data-tipo="1" value="Hermano(a)">Hermano(a)</option>
                                        <option data-tipo="1" value="Primo(a)">Primo(a)</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="reserva_representante_nuevo_exitente"
                                id="reserva_representante_nuevo_exitente" value="0">
                            <div class="div_representante_nuevo px-1" style="display:none;">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nombres</label>
                                            <input type="text" required class="form-control form-control-sm"
                                                name="reserva_hora_representante_nombres_paciente"
                                                id="reserva_hora_representante_nombres_paciente">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="reserva_hora_representante_apellido_uno"
                                                id="reserva_hora_representante_apellido_uno">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="reserva_hora_representante_apellido_dos"
                                                id="reserva_hora_representante_apellido_dos">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">F. Nacimiento</label>
                                            {{-- <input type="date" class="form-control form-control-sm"
                                                name="reserva_hora_representante_fecha_nac"
                                                id="reserva_hora_representante_fecha_nac"> --}}
                                            <input type="text" class="mask_date form-control form-control-sm"
                                                name="reserva_hora_representante_fecha_nac" id="reserva_hora_representante_fecha_nac"
                                                maxlength="10" placeholder="dd/mm/aaaa"
                                                autocomplete="off"
                                                data-mask="00/00/0000"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <select id="reserva_hora_representante_sexo"
                                                name="reserva_hora_representante_sexo"
                                                class="form-control form-control-sm">
                                                <option value="0">Selecione una opci&oacute;n</option>
                                                <option value="F">Femenino</option>
                                                <option value="M">Masculino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                            <select id="reserva_hora_representante_convenio"
                                                name="reserva_hora_representante_convenio"
                                                class="form-control form-control-sm">
                                                <option value="0">Selecione una opci&oacute;n</option>
                                                @if (isset($prevision))
                                                    @foreach ($prevision as $p)
                                                        <option value="{{ $p->id }}">{{ $p->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                            <input type="address" class="form-control form-control-sm"
                                                name="reserva_hora_representante_direccion"
                                                id="reserva_hora_representante_direccion">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                                            <input type="address" class="form-control form-control-sm"
                                                name="reserva_hora_representante_numero_dir"
                                                id="reserva_hora_representante_numero_dir">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Región</label>
                                            <select onchange="buscar_ciudad_repesentante();"
                                                name="reserva_hora_representante_region_agregar"
                                                id="reserva_hora_representante_region_agregar"
                                                class="form-control form-control-sm" required>
                                                <option value="0">Seleccione</option>
                                                @if (isset($region))
                                                    @foreach ($region as $reg)
                                                        <option value="{{ $reg->id }}">{{ $reg->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Ciudad</label>
                                            <select id="reserva_hora_representante_ciudad_agregar"
                                                name="reserva_hora_representante_ciudad_agregar"
                                                class="form-control form-control-sm" required>
                                                <option value="0">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                            <input type="text" class="form-control form-control-sm"
                                                onblur="validar_email_agenda_representante()"
                                                name="reserva_hora_representante_correo"
                                                id="reserva_hora_representante_correo">
                                            <span id="mensaje_email_reserva_representante"
                                                style="display:none"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="reserva_hora_representante_telefono_uno"
                                                id="reserva_hora_representante_telefono_uno" onchange="validar_campo_telefono_representante();">
                                        </div>

                                        <button class="btn btn-sm btn-info btn-block"
                                            type="button" id="btn_reserva_hora_representante_telefono_uno_validar" disabled="disabled" onclick="enviar_validacion_telefono_representante();">
                                            <i class="feather icon-check"></i> Validar
                                        </button>

                                        <div class="form-group" style="display:none" name="div_representante_codigo_validador" id="div_representante_codigo_validador">
                                            <label class="floating-label-activo-sm">Codigo Validador</label>
                                            <input type="tel" class="form-control form-control-sm"
                                                name="reserva_hora_representante_telefono_uno_codigo_validador" id="reserva_hora_representante_telefono_uno_codigo_validador" onkeyup="validar_codigo_telefono_representante();">
                                        </div>

                                        <input type="hidden" name="result_representante_codigo_validacion" id="result_representante_codigo_validacion" value="0">
                                        <div id="div_representante_codigo_validador_mensaje" style="display:none"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="div_representante_existente" style="display:none;">
                                <input type="hidden" name="reserva_representante_id" id="reserva_representante_id"
                                    value=''>
                                <input type="hidden" name="reserva_representante_id_usuario"
                                    id="reserva_representante_id_usuario" value=''>
                                <table class="table table-borderless table-xs">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <strong>Nombre</strong>
                                            </th>
                                            <td><span id="reserva_representante_nombre"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Fecha Nacimiento</strong>
                                            </th>
                                            <td><span id="reserva_representante_fecha_nacimiento"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Sexo</strong>
                                            </th>
                                            <td><span id="reserva_representante_sexo"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Dirección</strong>
                                            </th>
                                            <td><span id="reserva_representante_direccion"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Correo Electrónico</strong>
                                            </th>
                                            <td><span id="reserva_representante_email"></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <strong>Teléfono</strong>
                                            </th>
                                            <td><span id="reserva_representante_telefono"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <h6 class="f-14 text-c-blue">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input"
                                            id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo
                                            electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms"
                                            name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="cerrar_registro_paciente_hora"
                                data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente"
                                onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                <i class="feather icon-check"></i> Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="agenda_validar_auto_menor_edad" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="agenda_validar_auto_menor_edad" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white" data-dismiss="modal"
                    aria-label="Close" onclick="cancelarautorizacionMenorEdad();"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="agenda_validar_auto_menor_edad" id="agenda_validar_auto_menor_edad"
                    value="">
                <input type="hidden" name="agenda_validar_auto_menor_token" id="agenda_validar_auto_menor_token"
                    value="">
                <div class="row">
                    <div class="col-md-12">
                        Validando Aprobación de Responsable para Atencion Medica de Menor de Edad
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="">
                        <div class="row">
                            <div class="col-md-6" id="imagen_resultado"></div>
                            <div class="col-md-6" id="text_resultado"></div>
                        </div>
                    </div>
                    <div class="col-md-12" id="imagen_carga">
                        <img src="{{ asset('images/spinner.svg') }}" alt="Cargando">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    onclick="cancelarautorizacionMenorEdad();">Cancelar</button>
            </div>
        </div>
    </div>
</div>



@include('general.asistentes.m_esperando_api')
@include('general.asistentes.m_pago')
<!-- FIN MODAL AGREGAR HORA MEDICA -->


<script>
    $(document).ready(function () {
        $('.mask_date').mask("dd/mm/0000", {
            'translation': {
                0: {pattern: /[0-9]/},
                d: {pattern: /[0-9]/},
                m: {pattern: /[0-9]/},
                Y: {
                    pattern: function (value) {
                        // Eliminar cualquier carácter que no sea un dígito
                        value = value.replace(/\D/g, '');

                        // Validar el año para que esté entre 1924 y 2024
                        if (value.length === 4) {
                            var year = parseInt(value, 10);
                            return year >= {{ date('Y')-110 }} && year <= {{ date('Y') }};
                        }
                        return true; // Permitir cualquier valor mientras se está escribiendo
                    }
                }
            },
            onKeyPress: function(value, e, field, options) {
                $('#mensaje_reserva_hora_fecha_nac').html('');
                $('#mensaje_reserva_hora_fecha_nac').hide();
                // Forzar la validación después de cada tecla presionada
                var year = value.split('/')[2];
                if (year)
                {
                    var year_txt = year.toString();
                    if(year_txt.length >= 4)
                    {
                        $('#mensaje_reserva_hora_fecha_nac').html('');
                        $('#mensaje_reserva_hora_fecha_nac').hide();
                        if (year && (year < {{ date('Y')-110 }} || year > {{ date('Y') }} ))
                        {

                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').show();
                            $('#mensaje_reserva_hora_fecha_nac').html('La fecha cargada no es valida');

                            // field.val('');
                            console.log('validacion:');
                            console.log(year);
                        }

                        if (validarEdad(value)) {
                            console.log("La edad es válida.");
                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').hide();
                        } else {
                            console.log("La edad no es válida.");
                            $("#guardar_reserva_paciente").prop('disabled', true);
                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').show();
                            $('#mensaje_reserva_hora_fecha_nac').html('La fecha cargada no es valida');
                        }

                        validar_email_agenda();
                        validar_campo_telefono();
                    }
                }
            }
        });
    });

    function validarEdad(fechaNacimiento) {
        // Dividir la fecha de nacimiento en día, mes y año
        var partes = fechaNacimiento.split('/');
        var dia = parseInt(partes[0], 10);
        var mes = parseInt(partes[1], 10) - 1; // Los meses en JavaScript van de 0 a 11
        var anio = parseInt(partes[2], 10);

        // Crear un objeto Date con la fecha de nacimiento
        var fechaNac = new Date(anio, mes, dia);

        // Obtener la fecha actual
        var hoy = new Date();

        // Calcular la diferencia en años
        var edad = hoy.getFullYear() - fechaNac.getFullYear();
        var mes = hoy.getMonth() - fechaNac.getMonth();
        var dia = hoy.getDate() - fechaNac.getDate();

        // Ajustar la edad si el mes o día actual es antes del mes o día de nacimiento
        if (mes < 0 || (mes === 0 && dia < 0)) {
            edad--;
        }

        // Validar si la edad está en el rango de 0 a 120 años
        return edad >= 0 && edad <= 120;
    }

    function evaluar_edad() {
        let fechaNacimiento = new Date($('#reserva_hora_fecha_nac').val());
        let hoy = new Date();
        let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

        // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
        if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
            edad--;
        }

        if (edad < 18) {
            $('#paciente_dependiente').prop('checked', 'checked');
            // $('.seccion_reserva_paciente_nuevo_representante').show();
            activar_paciente_dependientes();
            $('#reserva_hora_correo').attr('onblur', "");
            $('#reserva_hora_telefono_uno').attr('onchange', "");
            $('#btn_reserva_hora_telefono_uno_validar').hide();

            $('#reserva_hora_telefono_uno_codigo_validador').val('');
            $('#div_codigo_validador_mensaje').html('');
            $('#result_codigo_validacion').val('0');

            $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
            $('#div_representante_codigo_validador_mensaje').html('');
            $('#result_representante_codigo_validacion').val('0');
        } else {
            $('#paciente_dependiente').prop('checked', '')
            // $('.seccion_reserva_paciente_nuevo_representante').hide();
            activar_paciente_dependientes();
            $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
            $('#reserva_hora_telefono_uno').attr('onchange', "validar_campo_telefono();");
            $('#btn_reserva_hora_telefono_uno_validar').show();

            $('#reserva_hora_telefono_uno_codigo_validador').val('');
            $('#div_codigo_validador_mensaje').html('');
            $('#result_codigo_validacion').val('0');

            $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
            $('#div_representante_codigo_validador_mensaje').html('');
            $('#result_representante_codigo_validacion').val('0');
        }
    }

    function buscar_rut_representente() {

        let rut = $('#reserva_hora_representante_rut').val();
        let url = "{{ route('agenda.buscar_rut_paciente') }}";

        $('.div_representante_nuevo').hide();
        $('.div_representante_existente').hide();

        $.ajax({

                url: url,
                type: "get",
                data: {
                    rut: rut,
                },
            })
            .done(function(data) {

                if (data !== 'null') {
                    data = JSON.parse(data);

                    if (data.tipo_paciente == 'SI') {
                        $('#reserva_representante_nuevo_exitente').val(1);

                        $('#reserva_representante_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data
                            .apellido_dos);
                        $('#reserva_representante_fecha_nacimiento').text(data.fecha_nac);
                        if (data.sexo == 'M') {
                            $('#reserva_representante_sexo').text('Masculino');
                        } else {
                            $('#reserva_representante_sexo').text('Femenino');
                        }
                        $('#reserva_representante_direccion').text(data.direccion.direccion + ' ' + data.direccion
                            .numero_dir + ', ' + data.direccion.ciudad.nombre);
                        $('#reserva_representante_email').text(data.email);
                        $('#reserva_representante_telefono').text(data.telefono_uno);

                        $('#reserva_representante_id').val(data.id);
                        $('#reserva_representante_id_usuario').val(data.id_usuario);

                        $("#guardar_reserva_paciente").prop('disabled', false);

                        $('.div_representante_nuevo').hide();
                        $('.div_representante_existente').show();
                    } else {
                        $('#reserva_representante_nuevo_exitente').val(0);
                        $('#reserva_representante_id').val('');
                        $('#reserva_representante_id_usuario').val('');
                        $('.div_representante_nuevo').show();
                        $('.div_representante_existente').hide();

                        $('#reserva_hora_representante_nombres_paciente').val('');
                        $('#reserva_hora_representante_apellido_uno').val('');
                        $('#reserva_hora_representante_apellido_dos').val('');
                        $('#reserva_hora_representante_fecha_nac').val('');
                        $('#reserva_hora_representante_sexo').val('');
                        $('#reserva_hora_representante_direccion').val('');
                        $('#reserva_hora_representante_numero_dir').val('');
                        $('#reserva_hora_representante_region_agregar').val('');
                        buscar_ciudad_repesentante();
                        // $('#reserva_hora_representante_ciudad_agregar').val('');
                        $('#reserva_hora_representante_correo').val('');
                        $('#reserva_hora_representante_telefono_uno').val('');
                    }
                } else {
                    $('#reserva_representante_id').val('');
                    $('#reserva_representante_id_usuario').val('');
                    $('.div_representante_nuevo').show();
                    $('.div_representante_existente').hide();

                    $('#reserva_hora_representante_nombres_paciente').val('');
                    $('#reserva_hora_representante_apellido_uno').val('');
                    $('#reserva_hora_representante_apellido_dos').val('');
                    $('#reserva_hora_representante_fecha_nac').val('');
                    $('#reserva_hora_representante_sexo').val('');
                    $('#reserva_hora_representante_direccion').val('');
                    $('#reserva_hora_representante_numero_dir').val('');
                    $('#reserva_hora_representante_region_agregar').val('');
                    buscar_ciudad_repesentante();
                    // $('#reserva_hora_representante_ciudad_agregar').val('');
                    $('#reserva_hora_representante_correo').val('');
                    $('#reserva_hora_representante_telefono_uno').val('');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function buscar_ciudad_repesentante(id_ciudad = 0) {

        let region = $('#reserva_hora_representante_region_agregar').val();
        let url = "{{ route('home.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#reserva_hora_representante_ciudad_agregar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });


    }

    function validar_email_agenda() {

        if ($("#reserva_hora_correo").val().indexOf('@', 0) == -1 || $("#reserva_hora_correo")
            .val().indexOf(
                '.', 0) == -1) {
            swal({
                title: "El correo electrónico introducido no es correcto.",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('El correo electrónico introducido no es correcto.');
            $("#guardar_reserva_paciente").prop('disabled', true);
            return false;
        }

        let email = $('#reserva_hora_correo').val();
        let url = "{{ route('agenda.validar_email') }}";

        $.ajax({
                url: url,
                type: "get",
                data: {

                    email: email,

                }

            })
            .done(function(data) {
                if (data == 'fail') {

                    // console.log(data);

                    $('#mensaje_email_reserva').text('el email ya esta en nuestros registros');
                    $('#mensaje_email_reserva').show();
                    $('#reserva_hora_correo').focus();

                    $("#guardar_reserva_paciente").prop('disabled', true);

                } else {
                    $('#mensaje_email_reserva').text('');
                    $('#mensaje_email_reserva').hide();
                    $("#guardar_reserva_paciente").prop('disabled', false);
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function validar_email_agenda_representante() {

        if ($("#reserva_hora_representante_correo").val().indexOf('@', 0) == -1 || $("#reserva_hora_representante_correo").val().indexOf('.', 0) == -1) {
            swal({
                title: "El correo electrónico introducido no es correcto.",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            })
            // alert('El correo electrónico introducido no es correcto.');
            $("#guardar_reserva_paciente").prop('disabled', true);
            return false;
        }

        let email = $('#reserva_hora_representante_correo').val();
        let url = "{{ route('agenda.validar_email') }}";

        $.ajax({
                url: url,
                type: "get",
                data: {
                    email: email,
                }
            })
            .done(function(data) {
                if (data == 'fail') {
                    // console.log(data);
                    $('#mensaje_email_reserva_representante').text('el email ya esta en nuestros registros');
                    $('#mensaje_email_reserva_representante').show();
                    $('#reserva_hora_representante_correo').focus();

                    $("#guardar_reserva_paciente").prop('disabled', true);

                } else {
                    $('#mensaje_email_reserva_representante').text('');
                    $('#mensaje_email_reserva_representante').hide();
                    $("#guardar_reserva_paciente").prop('disabled', false);
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function activar_paciente_dependientes()
    {
        if ($('#paciente_dependiente').prop('checked'))
        {
            $('.seccion_reserva_paciente_nuevo_representante').show();
            $('#reserva_hora_correo').attr('onblur', "");
            $('#reserva_hora_telefono_uno').attr('onchange', "");
            $('#btn_reserva_hora_telefono_uno_validar').hide();
        }
        else
        {
            $('.seccion_reserva_paciente_nuevo_representante').hide();
            $('#reserva_hora_correo').attr('onblur', "validar_email_agenda();");
            $('#reserva_hora_telefono_uno').attr('onchange', "validar_campo_telefono();");
            $('#btn_reserva_hora_telefono_uno_validar').show();
            if($('#reserva_hora_fecha_nac').val() !=='')
                evaluar_edad();
        }
    }

    function validar_campo_telefono()
    {
        var telefono = $('#reserva_hora_telefono_uno').val();
        var email = $('#reserva_hora_correo').val();
        if(email == '')
        {
            // if (telefono != '')
            {
                var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                if( re.test(telefono) )
                {

                    if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                        console.log("La edad es válida.");
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',false);
                    } else {
                        console.log("La edad no es válida.");
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',true);
                        $("#guardar_reserva_paciente").prop('disabled', true);
                    }

                }
            }
        }
    }

    function enviar_validacion_telefono()
    {
        $('#btn_reserva_hora_telefono_uno_validar').hide();
        $('#div_codigo_validador').show();
        $('#reserva_hora_telefono_uno_codigo_validador').val('');
        $('#div_codigo_validador_mensaje').html('');
        $('#result_codigo_validacion').val('0');
    }

    function validar_codigo_telefono()
    {
        var codigo = $('#reserva_hora_telefono_uno_codigo_validador').val();
        if(codigo.length >= 4)
        {
            console.log(codigo);
            if(codigo == 1234)
            {
                $('#div_codigo_validador').hide();
                $('#div_codigo_validador_mensaje').show();
                $('#div_codigo_validador_mensaje').html('<span style="color:green;">Valido</span>');
                $('#result_codigo_validacion').val('1');
                $("#guardar_reserva_paciente").prop('disabled', false);
            }
            else
            {
                $('#div_codigo_validador').show();
                $('#div_codigo_validador_mensaje').show();
                $('#div_codigo_validador_mensaje').html('<span style="color:red;">No Valido</span>');
                $('#result_codigo_validacion').val('0');
                $("#guardar_reserva_paciente").prop('disabled', true);
            }
        }
    }

    function validar_campo_telefono_representante()
    {
        var telefono = $('#reserva_hora_representante_telefono_uno').val();
        var email = $('#reserva_hora_representante_correo').val();

        if(email === '')
        {
            // if (telefono != '')
            {
                var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                if( re.test(telefono) )
                    $('#btn_reserva_hora_representante_telefono_uno_validar').attr('disabled',false);
                else
                    $('#btn_reserva_hora_representante_telefono_uno_validar').attr('disabled',true);
            }
        }
        $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
        $('#div_representante_codigo_validador_mensaje').html('');
        $('#result_representante_codigo_validacion').val('0');
    }

    function enviar_validacion_telefono_representante()
    {
        $('#btn_reserva_hora_representante_telefono_uno_validar').hide();
        $('#div_representante_codigo_validador').show();
        $('#reserva_hora_representante_telefono_uno_codigo_validador').val('');
        $('#div_representante_codigo_validador_mensaje').html('');
        $('#result_representante_codigo_validacion').val('0');
    }

    function validar_codigo_telefono_representante()
    {
        var codigo = $('#reserva_hora_representante_telefono_uno_codigo_validador').val();
        if(codigo.length >= 4)
        {
            console.log(codigo);
            if(codigo == 1234)
            {
                $('#div_representante_codigo_validador').hide();
                $('#div_representante_codigo_validador_mensaje').show();
                $('#div_representante_codigo_validador_mensaje').html('<span style="color:green;">Valido</span>');
                $('#result_representante_codigo_validacion').val('1');
                $("#guardar_reserva_paciente").prop('disabled', false);
            }
            else
            {
                $('#div_representante_codigo_validador').show();
                $('#div_representante_codigo_validador_mensaje').show();
                $('#div_representante_codigo_validador_mensaje').html('<span style="color:red;">No Valido</span>');
                $('#result_representante_codigo_validacion').val('0');
                $("#guardar_reserva_paciente").prop('disabled', true);
            }
        }
    }

</script>
