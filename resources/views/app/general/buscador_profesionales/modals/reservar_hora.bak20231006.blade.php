<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Reservar hora médica</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reservar_hora').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                                <label class="floating-label-active-sm mb-0">Lugar de atención</label>
                                <select class="form-control form-control-sm" id="modal_reserva_hora_lugar_atencion" name="modal_reserva_hora_lugar_atencion" onchange="carga_calendario_profesional();">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="mt-4">El Profesional atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                        {{--  <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                            </div>
                        </div>  --}}
                    </div>

                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                                {{--  <input type="date" id="calendario" name="calendario">  --}}
                                {{--  <div id="calendario_reserva_buscador" name="calendario_reserva_buscador" class="calendar fc fc-unthemed fc-ltr"></div>  --}}
                                <label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
                                <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
                            </div>
                            <div class="col-md-12 mx-auto" >
                                <div class="row" id="modal_reserva_hora_lista_horas">
                                    {{--  <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
                                        8:00
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        {{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
                            Reservar hora</button>  --}}
                        <label class="label">Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--  MODAL INFORMACION DE PACIENTE PARA AGENDA  --}}
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                {{--  BUSCADOR DE RUT  --}}
                <div class="row div_rut_buscar">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 mb-3">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                            Buscar
                        </button>
                    </div>
                </div>



                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="reserva_hora_id_profesional" name="reserva_hora_id_profesional" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" id="reserva_hora_id_lugar_atencion" name="reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="reserva_hora_fecha_consulta" name="reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_hora_consulta" name="reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="reserva_hora_origen" name="reserva_hora_origen" value="escritorio_paciente">
                    <input type="hidden" id="reserva_hora_id_asistente" name="reserva_hora_id_asistente" value="2">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
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
                                    <td id="reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>

                        </div>
                    </div>

                    {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                    <div id="reserva_agregar_paciente_hora">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                    <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($profesion_oficio))
                                            @foreach ($profesion_oficio as $prof_ofic)
                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Region</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                        <option value="0">Seleccione Regi&oacute;n</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                        <option value="0">Seleccione Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  onclick="$('#agenda_agregar_paciente').modal('hide');">Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR HORA MEDICA -->
