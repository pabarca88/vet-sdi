
<!-- BOTÓN FLOTANTE AGENDA (ESPACIO PARA INSERTAR LA NUEVA AGENDA) -->
<div class="bs-offset-main bs-canvas-anim">
    @php
        // var_dump($tipo_agendas);
    @endphp
    @foreach ($tipo_agendas as $ta )
        @switch($ta)
            @case(1)
                <button class="btn btn-tipo-agenda btn-agenda-cons btn-agenda-1 shadow-sm"  type="button" onclick="cargarAgendaProfesional(1, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Consulta</button>
                @break

            @case(2)

                @break
            @case(3)
                {{-- <button class="btn btn-tipo-agenda btn-agenda-tel btn-agenda-3 shadow-sm"  type="button" onclick="cargarAgendaProfesional(3, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> <br>Agenda Telemedicina</button> --}}
                <button class="btn btn-tipo-agenda btn-agenda-tel btn-agenda-3 shadow-sm"  type="button" onclick="cargarAgendaProfesional(3, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Telemedicina</button>
                @break
            @case(4)
                <button class="btn btn-tipo-agenda btn-agenda-exa btn-agenda-4 shadow-sm"  type="button" onclick="cargarAgendaProfesional(4, '{{ $lugar_atencion }}', '{{ $profesional->id}}', '{{ date('Y-m-d') }}');"><i class="feather icon-calendar f-12"></i> Agenda Examenes</button>
                @break
            @default

        @endswitch
    @endforeach
    <input type="hidden" name="id_tipo_agenda" id="id_tipo_agenda" value="1">
</div>

<!-- SCRIPT -->
@section('btn-script-agenda')
    <script type="text/javascript">
        var activeDaysInRange = [];
        var info_profesional_seleccionado = [];
        $(document).ready(function ()
        {
            if($('#agenda').length > 0)
            {
                cargarAgendaProfesional(1, '{{ $lugar_atencion }}', '{{ $profesional->id}}');
            }
        });

        function cargarAgendaProfesional(tipo_agenda, id_lugar_atencion, id_profesional, fecha)
        {
            $('.btn-tipo-agenda').css('background-color','#387fb6');
            $('.btn-agenda-'+tipo_agenda).css('background-color','#1cbebe');

            $('#id_tipo_agenda').val(tipo_agenda);

            $('#titulo_tipo_agenda').html('');
            switch (parseInt(tipo_agenda)) {
                case 1:
                    $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                    break;
                case 2:
                    $('#titulo_tipo_agenda').html('AGENDA DE DENTAL');
                    break;
                case 3:
                    $('#titulo_tipo_agenda').html('AGENDA DE TELEMEDICINA');
                    break;
                case 4:
                    $('#titulo_tipo_agenda').html('AGENDA DE EXAMEN');
                    break;
                default:
                    $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                    break;
            }

            var evaluacion = false;
            let url1 = "{{ route('profesional.agenda.buscar_info_profesional') }}";

            $.ajax({
                url: url1,
                type: "GET",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    tipo_agenda: tipo_agenda,
                },
                success: function(data){

                    console.log(data);

                    if (data !== 'null')
                    {
                        if(data.estado == 1 && data.horario.length!=0)
                        {
                            // carga de examenes posibles por el profesional
                            $('#m_hora_examen_lista_examenes').html('<option value="">Seleccione</option>');
                            if(data.examen_tipo != null && data.examen_tipo != '')
                            {
                                data.examen_tipo.forEach(element => {
                                    $('#m_hora_examen_lista_examenes').append('<option value="'+element.id+'">'+element.nombre+'</option>');
                                });
                            }

                            info_profesional_seleccionado['profesional'] = data.profesional;
                            info_profesional_seleccionado['horario'] = data.horario;
                            info_profesional_seleccionado['horario_data'] = data.horario_data;
                            evaluacion =  true;

                            if(evaluacion)
                            {
                                var calendarEl = document.getElementById('agenda');
                                var CalendarEl = new FullCalendar.Calendar(calendarEl, {
                                    droppable: false,
                                    editable: false,
                                    locale: "es",
                                    timeZone: 'local',
                                    initialDate: fecha,
                                    initialView: 'timeGridWeek',
                                    themeSystem: 'bootstrap',
                                    slotDuration: '00:15:00',
                                    headerToolbar: {
                                        //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                                        //center: 'title',
                                        //end: 'today prev,next'
                                        start: 'prev,next today',
                                        center: 'title',
                                        // right: 'timeGridWeek,listWeek'
                                        right: 'timeGridWeek,listWeek'
                                    },
                                    weekends: true,
                                    nowIndicator: true,
                                    selectable: true,
                                    //dayMaxEvents: true,
                                    titleFormat: {
                                        year: 'numeric',
                                        month: 'numeric',
                                        day: 'numeric'
                                    },
                                    allDaySlot: false,
                                    expandRows: true,
                                    slotEventOverlap: false,

                                    selectConstraint: "businessHours",
                                    slotLabelFormat: {
                                        hour: 'numeric',
                                        minute: '2-digit',
                                        omitZeroMinute: false,
                                        meridiem: 'medium'
                                    },
                                    eventDidMount: function(info) {
                                        {{--   console.log(info.el);  --}}
                                        $(info.el).tooltip({
                                            title: info.event.extendedProps.description,
                                            placement: "top",
                                            trigger: "hover",
                                            container: "body"
                                        });
                                    },

                                    events: function(start, end, callback){
                                            var arrayTemp = [];
                                            let url = "{{ route('hora_medica.ver') }}";
                                            $.ajax({
                                                url: url,
                                                type: "GET",
                                                data: {
                                                    id_profesional: id_profesional,
                                                    id_lugar_atencion: id_lugar_atencion,
                                                },
                                                success:function(data){
                                                    console.log(data);
                                                    if (data !== 'null')
                                                    {
                                                        if(data.estado == 1)
                                                        {
                                                            var arrayTemp = [];
                                                            data.registros.forEach(element => {
                                                                var rut = element.paciente.rut+' | ';
                                                                var valor = element.estado.valor+' | ';
                                                                var comentarios_confirmacion = '';
                                                                if(comentarios_confirmacion != 'null')
                                                                    comentarios_confirmacion = element.comentarios_confirmacion+' | ';
                                                                var nombre = element.paciente.prevision.nombre
                                                                var descripcion = '';

                                                                if(element.tipo_hora_medica == 'B')
                                                                {
                                                                    descripcion += valor;
                                                                    arrayTemp.push({
                                                                                    id: element.id,
                                                                                    title: element.descripcion,
                                                                                    description: descripcion ,
                                                                                    start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                    end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                    backgroundColor: element.estado.color
                                                                    });
                                                                }
                                                                else
                                                                {
                                                                    descripcion += rut;
                                                                    descripcion += valor;
                                                                    descripcion += comentarios_confirmacion;
                                                                    descripcion += nombre;
                                                                    arrayTemp.push({
                                                                                    id: element.id,
                                                                                    title: element.tipo_hora_medica+' - '+element.descripcion,
                                                                                    description: descripcion ,
                                                                                    start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                    end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                    backgroundColor: element.estado.color
                                                                    });
                                                                }
                                                            });
                                                            // console.log(arrayTemp);
                                                            end(arrayTemp);
                                                        }
                                                        else
                                                        {
                                                            console.log('falla en carga');
                                                        }
                                                    }

                                                }
                                            });
                                    },

                                    eventClick: function(info) {
                                        let id_hora_medica = info.event.id;
                                        let url = "{{ route('agenda.buscar_hora_medica') }}"

                                        $.ajax({

                                                url: url,
                                                type: "get",
                                                data: {
                                                    //_token: _token,
                                                    id_hora_medica: id_hora_medica,
                                                },
                                            })
                                            .done(function(data) {
                                                if (data != null)
                                                {
                                                    $('#datos_consulta_rut').text(data.paciente.rut);
                                                    $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                    $('#datos_consulta_edad').text(data.paciente.fecha_nac);

                                                    if (data.paciente.sexo == 'M') {
                                                        $('#datos_consulta_sexo').text('Masculino');
                                                    } else {
                                                        $('#datos_consulta_sexo').text('Femenino');
                                                    }

                                                    $('#estado_id_profesional').val(data.profesional.id);
                                                    $('#estado_id_paciente').val(data.paciente.id);
                                                    $('#id_hora_medica').val(id_hora_medica);

                                                    //celeste
                                                    //Reservada
                                                    if (data.estado_hora == 1) //else if (info.event.backgroundColor == '#FEAA32')
                                                    {
                                                        //'Reservada') //Hora pendiente
                                                        $('#hm_anular_hora').show();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_confirmar_hora').show();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //verde
                                                    // CONFIRMADO
                                                    else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                                    {
                                                        $('#modal_recepcion_bonos_api').modal('show');

                                                        /** PESTAÑA DE RECIBIR PAGO */
                                                        $('#bono_paciente_rut').val(data.paciente.rut);
                                                        $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                        $('#bono_profesional_rut').val( data.profesional.rut);
                                                        $('#bono_hora_medica').val(info.event.id);
                                                        $('#bono_id_profesional').val(data.profesional.id);
                                                        $('#bono_id_paciente').val(data.paciente.id);

                                                        /** PESTAÑA DE VENTA DE BONO */
                                                        $('#venta_rut').val(data.paciente.rut);
                                                        $('#venta_serie').val('');
                                                        $('#venta_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#venta_paciente_nombre').val(data.paciente.nombres);
                                                        $('#venta_paciente_apellido_uno').val(data.paciente.apellido_uno);
                                                        $('#venta_paciente_apellido_dos').val(data.paciente.apellido_dos);
                                                        $('#venta_paciente_email').val(data.paciente.email);
                                                        $('#venta_previsioon').val('0');
                                                        $('#venta_folio').val('');
                                                        $('#venta_valor_consulta').val('');
                                                        $('#venta_valor_pagar').val('');
                                                        $('#venta_valor_seguro').val('');
                                                        $('#venta_valor_copago').val('');

                                                        $('.venta_autorizada').hide();

                                                        $('#div_btn_pedir_autorizacion').show();

                                                    }
                                                    //rojo
                                                    //Rechazada
                                                    else if(data.estado_hora == 3)//else if (info.event.backgroundColor == '#FF3D3D')
                                                    {
                                                        // 'Rechazada')//Hora cancelada
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //morado
                                                    // Espera -- Llamando
                                                    else if (data.estado_hora == 4 || data.estado_hora == 8) //else if (info.event.backgroundColor == '#A06CC1')
                                                    {
                                                        // 'Espera')//Esperando atención
                                                        // 'Llamando')//Esperando atención
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').show();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //rosa
                                                    //Realizando
                                                    else if (data.estado_hora == 5) //else if (info.event.backgroundColor == '#EDBB99')
                                                    {
                                                        //'Realizando')
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').show();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //azul
                                                    // Realizada
                                                    else if (data.estado_hora == 6)//else if (info.event.backgroundColor == '#17C1C1')
                                                    {
                                                        //'Realizada')//Paciente atendido
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');

                                                    }
                                                    //naranjo
                                                    //Inasistida
                                                    else if (data.estado_hora == 7)//else if (info.event.backgroundColor == '#F9A825')
                                                    {
                                                        //'Inasistida')
                                                        $('#hm_anular_hora').hide();
                                                        $('#hm_atender_hora').hide();
                                                        $('#hm_confirmar_hora').hide();
                                                        $('#hm_ver_hora').hide();
                                                        $('#hm_espera_paciente_hora').hide();
                                                        $('#confirmar_anulacion_hora').hide();
                                                        $('#confirmacion_hora').hide();

                                                        $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        $('#consulta').modal('show');


                                                    }

                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Paciente no encontrado en el sistema",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    })

                                                }

                                            })
                                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                                console.log(jqXHR, ajaxOptions, thrownError)
                                            });


                                        $('#datos_hora_medica').show();
                                        $('#cancelacion_hora_medica').hide();
                                        $('#confirmacion_hora_medica').hide();
                                        /*$('#opcion_cancelar_hora_div').hide();*/
                                        $('#id_hora_medica').val(info.event.id);
                                        $('#id_hora_realizar').val(info.event.id);
                                        info.el.style.borderColor = 'red';
                                    },

                                    selectOverlap: function(event) {
                                        {{--  console.log(event);  --}}
                                        return event.rendering === 'background';
                                    },

                                    dateClick: function(date, jsEvent, view) {
										var valido = 1;

                                        /** VALIDACION DE FUERA DE HORARIO */
                                        // $.each(date.jsEvent.path, function(index, value)
                                        $.each(date.jsEvent.srcElement.classList, function(index, value)
                                        {
                                            // console.log(value);
                                            if(value == 'fc-non-business')
                                            {
                                                swal({
                                                    title: "Toma de Hora",
                                                    text: "Horario no disponible con el Profesional",
                                                    icon: "error",
                                                    buttons: "Aceptar",
                                                    DangerMode: true,
                                                })
                                                valido = 0;
                                            }

                                        });

                                        if(valido == 1)
                                        {
                                            // console.log(date.date);
                                            // console.log(date.dateStr);

                                            /** VALIDAR EVENTO */
                                            var date_str = date.dateStr.replace('T',' ');
                                            var date_DD = new Date(date_str);
                                            var curr_date = date_DD.getDate();
                                            var curr_month = date_DD.getMonth();
                                            var curr_year = date_DD.getFullYear();
                                            var curr_hour = date_DD.getHours();
                                            var curr_mint = date_DD.getMinutes();
                                            var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                            $.each(CalendarEl.getEvents(), function( index, value ) {
                                                // console.log(index);
                                                // console.log(value);
                                                var date_str2 = value.startStr.replace('T',' ');
                                                var date_DD2 = new Date(date_str2);
                                                var curr_date2 = date_DD2.getDate();
                                                var curr_month2 = date_DD2.getMonth();

                                                var curr_year2 = date_DD2.getFullYear();
                                                var curr_hour2 = date_DD2.getHours();
                                                var curr_mint2 = date_DD2.getMinutes();
                                                var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                                                if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                                {
                                                    valido = 0;
                                                }
                                            });

                                            /** VALIDAR BLOQUEO */
                                            CalendarEl.getEvents().forEach(function(event) {
                                                var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                                if (date.date >= event.start && date.date <= eventEnd) {
                                                    valido = 0;
                                                    console.log('Existe un evento en esta fecha: ' + event.title);
                                                    console.log(date.date);
                                                    console.log(event.start);
                                                    console.log(eventEnd);

                                                    swal({
                                                        title: "Toma de Hora",
                                                        text: "El profesional no atiende en este periodo.",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    });
                                                    return false;
                                                }

                                            });

                                            /** validar  dias pasados */
                                            var diaActual = '{{ date('d') }}';
                                            var mesActual = '{{ date('m')-1 }}';
                                            var anioActual = '{{ date('Y') }}';

                                            var fecha_actual = new Date(anioActual, mesActual, diaActual);
                                            var fecha_seleccion = new Date(curr_year, curr_month, curr_date);

                                            if(fecha_actual > fecha_seleccion){
                                                console.log("fecha_actual > fecha_seleccion");
                                                valido_fecha = 0;
                                            }
                                            if(fecha_actual <= fecha_seleccion){
                                                console.log("fecha_actual < fecha_seleccion");
                                                valido_fecha = 1;
                                            }

                                            if(valido == 1)
                                            {
                                                if(valido_fecha == 1)
                                                {
                                                    $('.div_rut_buscar').show();
                                                    $('#agenda_agregar_paciente').modal('show');
                                                    $('#reserva_datos_paciente').hide();
                                                    $('#rut_paciente_reserva').val('');
                                                    $('#reserva_agregar_paciente_hora').hide();
                                                    $('#fecha_consulta').val(date.dateStr);
                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Seleccion Fecha",
                                                        text: "No Puede tomar Hora en Fechas Anterior a la actual",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    })
                                                }
                                            }
                                            else
                                            {
                                                swal({
                                                    title: "Toma de Hora",
                                                    text: "Hora con profesional ya esta tomada",
                                                    icon: "error",
                                                    buttons: "Aceptar",
                                                    DangerMode: true,
                                                });
                                            }
                                        }
                                    },
                                    eventDrop: function(info) {
                                        {{--  console.log(info);  --}}
                                        return false;
                                    },

                                });

                                var data_businessHours = [];
                                $.each(info_profesional_seleccionado.horario, function(key, value){
                                    var dias =  value.dia.split(",");
                                    data_businessHours.push({
                                        'daysOfWeek': dias ,
                                        'startTime': value.hora_inicio,
                                        'endTime': value.hora_termino
                                    });
                                })
                                var tem_hiddenDays = info_profesional_seleccionado.horario_data.horario_agenda.split(",");
                                var tem_hiddenDays2 =[];

                                $.each(tem_hiddenDays, function(key, value){
                                    {{--  console.log(value);  --}}
                                    tem_hiddenDays2.push(parseInt(value));
                                });

                                CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                                CalendarEl.setOption('businessHours', data_businessHours );
                                CalendarEl.setOption('slotMinTime', info_profesional_seleccionado.horario_data.hora_inicio_agenda );
                                CalendarEl.setOption('slotMaxTime', info_profesional_seleccionado.horario_data.hora_termino_agenda );
                                {{--  console.log(CalendarEl.getOption('hiddenDays'));  --}}
                                {{--  console.log(CalendarEl.getOption('businessHours'));  --}}
                                {{--  console.log(CalendarEl.getOption('slotMinTime'));  --}}
                                {{--  console.log(CalendarEl.getOption('slotMaxTime'));  --}}

                                /** registra la fecha de la semana en la vista */
                                CalendarEl.on('datesSet', function(info) {
                                    activeDaysInRange = [];
                                    var dia_inicio = CalendarEl.view.currentStart;
                                    var dia_fin = CalendarEl.view.currentEnd;
                                    var array_activos = CalendarEl.getCurrentData().dateProfileGenerator.isHiddenDayHash;
                                    getInactiveDays(dia_inicio, dia_fin, array_activos);
                                    console.log('activeDaysInRange2:', activeDaysInRange);
                                })

                                CalendarEl.render();

                                if(fecha != '' && fecha != null)
                                    CalendarEl.gotoDate(fecha);
                            }
                        }
                        else
                        {
                            swal({
                                title: "Agenda del Profesional.",
                                text:"El profesional no cuenta con agenda.",
                                icon: "error",
                            });
                            evaluacion =  false;
                            $('#agenda').html('');
                        }
                    }
                }
            });
        }

        function getInactiveDays(startDate, endDate, activeDays)
        {
            const diffInDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));

            for (let i = 0; i <= diffInDays; i++)
            {
                const day = new Date(startDate.getTime() + i * 1000 * 60 * 60 * 24);
                if (!activeDays[day.getDay()]) {
                    activeDaysInRange.push(day);
                }
            }

            return activeDaysInRange;
        }
    </script>
@endsection
