{{-- modal agendar Hora examen --}}
<div class="modal fade" id="m_agendar_hora_examen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_agendar_hora_examen" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Agendar de Hora de Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_hex_agenda();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="m_agendar_hora_examen_lista_examenes" id="m_agendar_hora_examen_lista_examenes" value="">
                        <label class="mt-4">Examen: <span id="m_agendar_hora_examen_text_lista_examenes" class="hljs-strong"></span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="m_agendar_hora_examen_agendar_id_paciente" id="m_agendar_hora_examen_agendar_id_paciente" value="">
                        <div class="col-md-6">
                            <label class="mt-4">El Profesional atiende los dias <span id="m_agendar_hora_examen_dias_atencion" class="hljs-strong"></span></label>
                        </div>

                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
                                    <input class="form-control form-control-sm" type="date" name="m_agendar_hora_examen_fecha" onchange="carga_horas_profesional_horas_examens(this.value);" id="m_agendar_hora_examen_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?> />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h6 class="text-petroleo" id="m_agendar_hora_examen_fecha_seleccionada"></h6>
                                </div>
                                <div class="col-md-12 mx-auto" >
                                    <div class="row" id="m_agendar_hora_examen_lista_horas">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-danger align-middle" onclick="agendar_hora_examen()"; data-dismiss="modal">Eliminar</button> --}}
                <button type="button" class="btn btn-info align-middle" onclick="cerrar_modal_hex_agenda()"; data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{--  MODAL INFORMACION DE PACIENTE PARA AGENDA  --}}
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="hex_agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="hex_cerrar_tomar_hora" type="button" class="close text-white close_hex_agenda_agregar_paciente" onclick="$('#hex_agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">


                <form id="hex_form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="hex_reserva_hora_id_profesional" name="hex_reserva_hora_id_profesional" value="">
                    <input type="hidden" id="hex_reserva_hora_id_paciente" name="hex_reserva_hora_id_paciente" value="">
                    <input type="hidden" id="hex_reserva_hora_id_lugar_atencion" name="hex_reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="hex_reserva_hora_fecha_consulta" name="hex_reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="hex_reserva_hora_hora_consulta" name="hex_reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="hex_reserva_hora_origen" name="hex_reserva_hora_origen" value="escritorio_asistente">
                    <input type="hidden" id="hex_reserva_hora_id_asistente" name="hex_reserva_hora_id_asistente" value="{{ $asistente->id }}">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="hex_reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Examen</strong>
                                    </th>
                                    <td>
                                        <input type="hidden" name="hex_reserva_examen" value="hex_reserva_examen">
                                        <span id="hex_reserva_text_examen"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="hex_reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="hex_reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="hex_reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="hex_reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="hex_reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="hex_reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="hex_reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="hex_reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="hex_reserva_hora_descripcion" id="hex_reserva_hora_descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_hex_agenda_agregar_paciente" onclick="$('#hex_agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="agendar_hora_examen();" class="btn btn-info">Agendar Hora</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR HORA MEDICA -->

<script>

    /** CERRAR MODAL */
    function cerrar_modal_hex_agenda() {
        $('#m_agendar_hora_examen').modal('hide');
        $('#m_agendar_hora_examen_agendar_id_paciente').val('');
    }

    /** ABRIR MODAL */
    function abrir_agendar_hora_examen(id, id_paciente)
    {
        $('#m_agendar_hora_examen').modal('show');
        $('#m_agendar_hora_examen_agendar_id_paciente').val(id_paciente);
        carga_calendario_profesional();
    }

    /** CARGA DIA DE TRABAJO DE PROFESIONAL */
    function carga_calendario_profesional()
    {
        $('#m_agendar_hora_examen_fecha').val('');
        // $('#m_agendar_hora_examen_fecha').attr('disabled',true);
        $('#m_agendar_hora_examen_lista_horas').html('');

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        console.log('cargando calendario');
        let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
                lugar_atencion: id_lugar_atencion,
                tipo_agenda: 4 // agenda de examenes
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                if(data.registros.horario_agenda_laboral != '')
                {
                    console.log(data);
                    let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                    var dias_activos = data.registros.horario_agenda_laboral.split(',');
                    var dias_texto = '';
                    var cant = 0;

                    $.each(dias_activos, function(index, value)
                    {
                        if(cant>0)
                            dias_texto += ' - '+dias[value];
                        else
                            dias_texto += dias[value];

                        cant++;
                    });

                    $('#m_agendar_hora_examen_dias_atencion').html(dias_texto);

                    /** calendario */
                    // $('#m_agendar_hora_examen_fecha').attr('disabled',false);

                    $("#m_agendar_hora_examen_fecha").flatpickr({
                        "disable": [
                            function(date) {
                                return !dias_activos.includes(String(date.getDay()));
                            }
                        ],
                        minDate: "today",
                        maxDate: new Date().fp_incr(60), // 14 days from now
                        locale: {
                            firstDayOfWeek: 1,
                            weekdays: {
                            shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                            longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                            },
                            months: {
                            shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                            longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                            },
                        },
                    });
                    /** fin calendario */

                }
                else
                {
                    $('#m_agendar_hora_examen_dias_atencion').html('NO INFORMADOS');
                    // $('#m_agendar_hora_examen_fecha').attr('disabled',true);
                    $('#m_agendar_hora_examen_fecha_seleccionada').html('');
                }

            } else {
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    /** CARGA HORAS DISPONIBLES POR DIA SELECCIONADO */
    function carga_horas_profesional_horas_examens(dia)
    {

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        console.log('carga_horas_profesional_horas_examens');
        console.log(dia);

        let url = "{{ route('profesional.HorasProfesionalLugarAtencionBuscador') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                dia: dia,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1) {
                $('#m_agendar_hora_examen_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                $('#m_agendar_hora_examen_lista_horas').html('');
                $.each(data.registros, function(index, value)
                {
                    var estilo = 'btn-outline-primary';
                    if(value.reserva == 1)
                    {
                        estilo = 'btn-outline-danger';
                    }
                    else if(value.reserva == 0)
                    {
                        estilo = 'btn-outline-primary';
                    }

                    var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                    var html = '';
                    html += '<div class="col-md-2 btn '+estilo+' btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita_hora_examen(\''+value.hora+'\');">';
                    html += ''+hr1;
                    html += '</div>';

                    $('#m_agendar_hora_examen_lista_horas').append(html);
                });

            } else {
                // alert('No se pudo Cargar las ciudades');
                $('#m_agendar_hora_examen_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function generar_reserva_cita_hora_examen(hora)
    {
        console.log('generar_reserva_cita_hora_examen');

        $('#hex_form_reseva_de_horas').hide();
        $('#hex_reserva_datos_paciente').hide();

        $('#reservar_hora').modal('hide');

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        let fecha_consulta = $('#m_agendar_hora_examen_fecha').val();
        $('#hex_reserva_hora_id_profesional').val('');
        $('#hex_reserva_hora_id_lugar_atencion').val('');
        $('#hex_reserva_hora_fecha_consulta').val('');
        $('#hex_reserva_hora_hora_consulta').val('');

        let url = "{{ route('agenda.paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = $('#m_agendar_hora_examen_agendar_id_paciente').val();

        if(id_dependiente_activo != '')
            datos.id_dependiente_activo = id_dependiente_activo;

        $.ajax({
            url: url,
            type: "get",
            data: datos,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $('#hex_reserva_examen').val($('#m_agendar_hora_examen_lista_examenes').val());
                $('#hex_reserva_text_examen').html($('#m_agendar_hora_examen_text_lista_examenes').html());

                $('#hex_form_reseva_de_horas').show();
                $('#hex_reserva_datos_paciente').show();

                $('#hex_agenda_agregar_paciente').modal('show');
                $('#m_agendar_hora_examen').modal('hide');
                $('#m_lista_espera').modal('hide');

                $('#hex_reserva_hora_id_profesional').val(id_profesional);
                $('#hex_reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#hex_reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#hex_reserva_hora_hora_consulta').val(hora);

                $('#hex_reserva_hora_id_paciente').val(data.registro.id);

                $('#hex_reserva_rut_paciente').html(data.registro.rut);
                $('#hex_reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#hex_reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M')
                {
                    $('#hex_reserva_sexo').text('Masculino');
                }
                else
                {
                    $('#hex_reserva_sexo').text('Femenino');
                }
                $('#hex_reserva_convenio').html(data.registro.prevision.nombre);
                $('#hex_reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#hex_reserva_hora_email').html(data.registro.email);
                $('#hex_reserva_hora_telefono').html(data.registro.telefono_uno);
            }
            else
            {
                swal({
                    title: "Debe completar los datos de Inscripción",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{--  GENERAR HORA USUARIO EXISTENTE  --}}
    function agendar_hora_examen() {

        let url = "{{ route('agenda.paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#hex_reserva_hora_fecha_consulta').val()+' '+$('#hex_reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#hex_reserva_hora_id_paciente').val();
        let id_profesional = $('#hex_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#hex_reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#hex_reserva_hora_id_asistente').val();
        let origen = $('#hex_reserva_hora_origen').val();
        let examen = $('#hex_reserva_examen').val();
        let text_examen = $('#hex_reserva_text_examen').html();
        let id_procedimiento = $('#m_agendar_hora_examen_lista_examenes').val();

        $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    fecha_consulta: fecha_consulta,
                    reserva_hora_id: reserva_hora_id,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    id_asistente: id_asistente,
                    origen: origen,
                    tipo_hora_medica: 'E',
                    examen: text_examen,
                    id_procedimiento: id_procedimiento
                }
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {

                    data = JSON.parse(data);
                    if(data.estado == 'error')
                    {
                        swal({
                            title: "Error!",
                            text: data.msj,
                            icon: "error",
                            type: "error",
                            buttons: "Cerrar",
                        });
                    }
                    else
                    {
                        swal({
                            title: "Hora Agendada Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }
                    $('#hex_agenda_agregar_paciente').modal('hide');

                    $('#hex_reserva_hora_id_profesional').val('');
                    $('#hex_reserva_hora_id_lugar_atencion').val('');
                    $('#hex_reserva_hora_fecha_consulta').val('');
                    $('#hex_reserva_hora_hora_consulta').val('');
                    $('#hex_reserva_hora_id_paciente').val('');
                    $('#hex_reserva_rut_paciente').html('');
                    $('#hex_reserva_hora_nombre').html('');
                    $('#hex_reserva_fecha_nacimiento').html('');
                    $('#hex_reserva_sexo').text('');
                    $('#hex_reserva_convenio').html('');
                    $('#hex_reserva_direccion').html('');
                    $('#hex_reserva_hora_email').html('');
                    $('#hex_reserva_hora_telefono').html('');

                    cargarAgendaProfesional('');

                }
                else
                {
                    swal({
                        title: "Error!",
                        text: "Problema en la solicitud de la hora",
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };



</script>
