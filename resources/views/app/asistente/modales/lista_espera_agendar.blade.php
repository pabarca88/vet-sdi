{{-- modal agendar lista espera --}}
<div class="modal fade" id="modal_agendar_lista_espera" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_agendar_lista_espera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Agendar de Lista de Espera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_agendar();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="agendar_id_lista_espera" id="agendar_id_lista_espera" value="">
                        <input type="hidden" name="agendar_id_paciente" id="agendar_id_paciente" value="">
                        <div class="col-md-6">
                            <label class="mt-4">El Profesional atiende los dias <span id="modal_agendar_lista_espera_dias_atencion" class="hljs-strong"></span></label>
                            {{--  <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                </div>
                            </div>  --}}
                        </div>

                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
                                    <input class="form-control form-control-sm" type="date" name="modal_agendar_lista_espera_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_agendar_lista_espera_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?> />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h6 class="text-petroleo" id="modal_agendar_lista_espera_fecha_seleccionada"></h6>
                                </div>
                                <div class="col-md-12 mx-auto" >
                                    <div class="row" id="modal_agendar_lista_espera_lista_horas">
                                        {{--  <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
                                            8:00
                                        </div>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="agendar_lista_epera()"; data-dismiss="modal">Eliminar</button>
                <button type="button" class="btn btn-info align-middle" onclick="cerrar_modal_agendar()"; data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{--  MODAL INFORMACION DE PACIENTE PARA AGENDA  --}}
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="le_agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora2</h5>
                <button id="le_cerrar_tomar_hora" type="button" class="close text-white close_le_agenda_agregar_paciente" onclick="$('#le_agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">


                <form id="le_form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="le_reserva_hora_id_profesional" name="le_reserva_hora_id_profesional" value="">
                    <input type="hidden" id="le_reserva_hora_id_paciente" name="le_reserva_hora_id_paciente" value="">
                    <input type="hidden" id="le_reserva_hora_id_lugar_atencion" name="le_reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="le_reserva_hora_fecha_consulta" name="le_reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="le_reserva_hora_hora_consulta" name="le_reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="le_reserva_hora_origen" name="le_reserva_hora_origen" value="escritorio_asistente">
                    <input type="hidden" id="le_reserva_hora_id_asistente" name="le_reserva_hora_id_asistente" value="{{ $asistente->id }}">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="le_reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="le_le_reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="le_reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="le_reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="le_reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="le_reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="le_reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="le_reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="le_reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="le_reserva_hora_descripcion" id="le_reserva_hora_descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_le_agenda_agregar_paciente" onclick="$('#le_agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="agendar_hora_lista_espera();" class="btn btn-info">Agendar Hora</button>

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
    function cerrar_modal_agendar() {
        $('#modal_agendar_lista_espera').modal('hide');
        $('#agendar_id_lista_espera').val('');
        $('#agendar_id_paciente').val('');
    }

    /** ABRIR MODAL */
    function abrir_agendar_lista_epera(id, id_paciente)
    {
        console.log('abrir_agendar_lista_epera resources\views\app\asistente\modales\lista_espera_agendar.blade.php');
        $('#modal_agendar_lista_espera').modal('show');
        $('#agendar_id_lista_espera').val(id);
        $('#agendar_id_paciente').val(id_paciente);
        carga_calendario_profesional_lista_espera_agendar();
    }

    /** CARGA DIA DE TRABAJO DE PROFESIONAL */
    function carga_calendario_profesional_lista_espera_agendar()
    {
        $('#modal_agendar_lista_espera_fecha').val('');
        // $('#modal_agendar_lista_espera_fecha').attr('disabled',true);
        $('#modal_agendar_lista_espera_lista_horas').html('');

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
            },
        })
        .done(function(data) {
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

                    $('#modal_agendar_lista_espera_dias_atencion').html(dias_texto);

                    /** calendario */
                    // $('#modal_agendar_lista_espera_fecha').attr('disabled',false);

                    $("#modal_agendar_lista_espera_fecha").flatpickr({
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
                    $('#modal_agendar_lista_espera_lista_horas').html('NO INFORMADOS');
                    // $('#modal_agendar_lista_espera_fecha').attr('disabled',true);
                    $('#modal_agendar_lista_espera_fecha_seleccionada').html('');
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
    function cargar_horas_disponibles_calendario_profesion(dia)
    {

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        console.log('cargar_horas_disponibles_calendario_profesion');
        console.log(dia);

        let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
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
                $('#modal_agendar_lista_espera_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                $('#modal_agendar_lista_espera_lista_horas').html('');
                $.each(data.registros, function(index, value)
                {
                    var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                    var html = '';
                    html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                    html += ''+hr1;
                    html += '</div>';

                    $('#modal_agendar_lista_espera_lista_horas').append(html);
                });

            } else {
                // alert('No se pudo Cargar las ciudades');
                $('#modal_agendar_lista_espera_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function generar_reserva_cita(hora)
    {
        console.log('generar_reserva_cita');

        $('#form_reseva_de_horas').hide();
        $('#reserva_datos_paciente').hide();

        $('#reservar_hora').modal('hide');

        let id_profesional = $('#agenda_profesional_asistente').val();
        let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
        let fecha_consulta = $('#modal_agendar_lista_espera_fecha').val();
        $('#le_reserva_hora_id_profesional').val('');
        $('#le_reserva_hora_id_lugar_atencion').val('');
        $('#le_reserva_hora_fecha_consulta').val('');
        $('#le_reserva_hora_hora_consulta').val('');

        let url = "{{ route('agenda.paciente.get.informacion') }}";
        var datos = {};
        var id_dependiente_activo = $('#agendar_id_paciente').val();

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


                $('#le_form_reseva_de_horas').show();
                $('#le_reserva_datos_paciente').show();

                $('#le_agenda_agregar_paciente').modal('show');
                $('#modal_agendar_lista_espera').modal('hide');
                $('#m_lista_espera').modal('hide');

                $('#le_reserva_hora_id_profesional').val(id_profesional);
                $('#le_reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                $('#le_reserva_hora_fecha_consulta').val(fecha_consulta);
                $('#le_reserva_hora_hora_consulta').val(hora);

                $('#le_reserva_hora_id_paciente').val(data.registro.id);

                $('#le_le_reserva_rut_paciente').html(data.registro.rut);
                $('#le_reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                $('#le_reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                if (data.registro.sexo == 'M')
                {
                    $('#le_reserva_sexo').text('Masculino');
                }
                else
                {
                    $('#le_reserva_sexo').text('Femenino');
                }
                $('#le_reserva_convenio').html(data.registro.prevision.nombre);
                $('#le_reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                $('#le_reserva_hora_email').html(data.registro.email);
                $('#le_reserva_hora_telefono').html(data.registro.telefono_uno);
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
    function agendar_hora_lista_espera() {

        let url = "{{ route('agenda.paciente.solicitar.hora') }}";
        let _token = $('#_token').val();
        let fecha_consulta = $('#le_reserva_hora_fecha_consulta').val()+' '+$('#le_reserva_hora_hora_consulta').val();
        let reserva_hora_id = $('#le_reserva_hora_id_paciente').val();
        let id_profesional = $('#le_reserva_hora_id_profesional').val();
        let id_lugar_atencion = $('#le_reserva_hora_id_lugar_atencion').val();
        let id_asistente = $('#le_reserva_hora_id_asistente').val();
        let origen = $('#le_reserva_hora_origen').val();
		let tipo_agenda = $('#id_tipo_agenda').val();
        var tipo_agenda_text = 'C';

        switch (tipo_agenda) {
            case '1':
                tipo_agenda_text = 'C';//CONSULTA
                break;
            case '2':
                tipo_agenda_text = 'D';//DENTAL
                break;
            case '3':
                tipo_agenda_text = 'T';//TELEMEDICINA
                break;
            case '4':
                tipo_agenda_text = 'E';//EXAMEN
                break;
        }

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
                    tipo_hora_medica: tipo_agenda_text,
                }
            })
            .done(function(data) {
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
                    $('#le_agenda_agregar_paciente').modal('hide');

                    $('#le_reserva_hora_id_profesional').val('');
                    $('#le_reserva_hora_id_lugar_atencion').val('');
                    $('#le_reserva_hora_fecha_consulta').val('');
                    $('#le_reserva_hora_hora_consulta').val('');
                    $('#le_reserva_hora_id_paciente').val('');
                    $('#le_reserva_rut_paciente').html('');
                    $('#le_reserva_hora_nombre').html('');
                    $('#le_reserva_fecha_nacimiento').html('');
                    $('#le_reserva_sexo').text('');
                    $('#le_reserva_convenio').html('');
                    $('#le_reserva_direccion').html('');
                    $('#le_reserva_hora_email').html('');
                    $('#le_reserva_hora_telefono').html('');

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

    /** AGENDAR ITEM DE LISTA DE ESPERA */
    function agendar_lista_epera()
    {
        var id = $('#agendar_id_lista_espera').val();

        let _token = CSRF_TOKEN;
        let url = "{{ route('lista.espera.eliminar') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id : id,
            },
        })
        .done(function(data) {
            if (data != null)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de lista de espera",
                        text: 'Eliminado',
                        icon: "success",
                        buttons: "Aceptar"
                    });
                    $('#modal_agendar_lista_espera').modal('hide');
                    cargarListaEsperaPorProfesional();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += indexInArray+': '+valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro a lista de espera",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }

            }
            else
            {
                swal({
                    title: "Registro a lista de espera",
                    text: "Error al eliminar",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
