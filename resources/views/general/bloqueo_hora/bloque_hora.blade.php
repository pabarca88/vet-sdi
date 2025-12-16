<button type="button" class="btn btn-agenda btn-info d-inline float-right ml-1" onclick="abrir_bloqueo_hora_atencion();" data-toggle="tooltip" data-placement="top" title="Bloqueos de fechas en la agenda"><i class="fas fa-lock"></i> </button>



<div class="modal fade" id="modal_bloqueo_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_bloqueo_hora" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="modal_bloqueo_horaLabel">Configuración de agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_bloqueo_hora').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="bloqueo_crear-tab" data-toggle="tab" href="#bloqueo_crear" role="tab" aria-controls="bloqueo_crear" aria-selected="true">Crear bloqueo</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="bloqueos_lista-tab" data-toggle="tab" href="#bloqueos_lista" role="tab" aria-controls="bloqueos_lista" aria-selected="false">Bloqueos</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="bloqueo_crear" role="tabpanel" aria-labelledby="bloqueo_crear-tab">
                        <div class="form-row">
                            <input type="hidden" name="bloqueo_id_profesional" id="bloqueo_id_profesional" value="{{ $profesional->id }}">
                            <input type="hidden" name="bloqueo_id_lugar_atencion" id="bloqueo_id_lugar_atencion" value="">
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Agenda</label>
                                <select class="form-control form-control-sm" name="bloqueo_agenda" id="bloqueo_agenda" onchange="carga_calendario_bloqueo();">
                                    @foreach ($listaTipoAgendaProf as $tipo_agenda)
                                        <option value="{{ $tipo_agenda['id'] }}">{{ $tipo_agenda['texto'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="floating-label-activo-sm">Motivo</label>
                                <input type="text" class="form-control form-control-sm" name="bloqueo_motivo" id="bloqueo_motivo">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Fecha de inicio</label>
                                <input type="date" class="form-control form-control-sm" name="bloqueo_fecha_inicio" id="bloqueo_fecha_inicio" min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Fecha de finalización</label>
                                <input type="date" class="form-control form-control-sm" name="bloqueo_fecha_termino" id="bloqueo_fecha_termino"  min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Hora de inicio</label>
                                <input type="time" class="form-control form-control-sm" name="bloqueo_hora_inicio" id="bloqueo_hora_inicio">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Hora de término</label>
                                <input type="time" class="form-control form-control-sm" name="bloqueo_hora_termino" id="bloqueo_hora_termino">
                            </div>

                            <div class="form-group col-md-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" onchange="bloqueo_todo_dia();" id="bloqueo_todo_dia" name="bloqueo_todo_dia" value="">
                                    <label class="custom-control-label pt-1" for="bloqueo_todo_dia">Todo el día</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-info" onclick="registrar_bloqueo_hora();"><i class="feather icon-save"></i> Guardar bloqueo</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bloqueos_lista" role="tabpanel" aria-labelledby="bloqueos_lista-tab">
                        @if (!empty($bloque_horario))
                            @foreach ($bloque_horario as $bloqueo)
                                <div class="row">
                                    <div class="card-informacion">
                                        <div class="card-body">
                                    <div class="col-md-12 mb-2" style="text-align: left;"><span class="font-weight-bold">Motivo:</span> {{ empty($bloqueo->motivo)?'-':$bloqueo->motivo }}</div>
                                    @php
                                        $mes = array('', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE');
                                        $fecha_inicio = date('d', strtotime($bloqueo->fecha_inicio)).' de '.$mes[intval(date('m', strtotime($bloqueo->fecha_inicio)))].' del '.date('Y', strtotime($bloqueo->fecha_inicio));
                                        $fecha_termino = date('d', strtotime($bloqueo->fecha_termino)).' de '.$mes[intval(date('m', strtotime($bloqueo->fecha_termino)))].' del '.date('Y', strtotime($bloqueo->fecha_termino));
                                    @endphp
                                    <div class="col-md-12 mb-2" style="text-align: left;"><span class="font-weight-bold">Inicio:</span> {!! $fecha_inicio !!} {{ $bloqueo->hora_inicio }}</div>
                                    <div class="col-md-12 mb-2" style="text-align: left;"><span class="font-weight-bold">Finalización:</span> {!! $fecha_termino !!} {{ $bloqueo->hora_termino }}</div>
                                    <div class="col-md-6 mb-2" style="text-align: center;">
                                        @if ($bloqueo->estado == 1)
                                            <button class="btn btn-sm btn-info-light-c" onclick="desbloquear_bloqueo_hora('{{ $bloqueo->id }}');"><i class="feather icon-x"></i> Desbloquear</button>
                                        @else
                                            <button class="btn btn-sm btn-danger-light-c" onclick="bloquear_bloqueo_hora('{{ $bloqueo->id }}');"><i class="feather icon-x"></i> Bloquear</button>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-2" style="text-align: center;">
                                        <button class="btn btn-sm btn-info-light-c" onclick="eliminar_bloqueo_hora('{{ $bloqueo->id }}');"><i class="feather icon-x"></i> Eliminar bloqueo</button>
                                    </div>
                                </div>
                                </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- flatpickr -->
{{-- <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}"> --}}
<!-- flatpickr -->
{{-- <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script> --}}
<script>
    function abrir_bloqueo_hora_atencion()
    {
        $('#bloqueo_id_profesional').val('{{ $profesional->id }}');
        $('#bloqueo_id_lugar_atencion').val('{{ $lugar_atencion }}');

        cargar_bloqueo_horas();

        // $('#bloqueo_agenda').val('');
        $('#bloqueo_agenda option:first').prop('selected', true);
        carga_calendario_bloqueo();
        $('#bloqueo_motivo').val('');
        $('#bloqueo_fecha_inicio').val('');
        $('#bloqueo_fecha_termino').val('');
        $('#bloqueo_hora_inicio').val('');
        $('#bloqueo_hora_termino').val('');
        $('#bloqueo_todo_dia').prop('checked', false);

        $('#modal_bloqueo_hora').modal('show');
    }

    function bloqueo_todo_dia()
    {
        console.log($('#bloqueo_todo_dia').prop('checked'));
        if( $('#bloqueo_todo_dia').prop('checked') )
        {
            $('#bloqueo_hora_inicio').val('00:00');
            $('#bloqueo_hora_inicio').attr('disabled', 'true');
            $('#bloqueo_hora_termino').val('23:59');
            $('#bloqueo_hora_termino').attr('disabled', 'true');
        }
        else
        {
            $('#bloqueo_hora_inicio').val('00:00');
            $('#bloqueo_hora_inicio').attr('disabled', false);
            $('#bloqueo_hora_termino').val('00:00');
            $('#bloqueo_hora_termino').attr('disabled', false);
        }
    }

    function registrar_bloqueo_hora()
    {
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let agenda = $('#bloqueo_agenda').val();
        let motivo = $('#bloqueo_motivo').val();
        let fecha_inicio = $('#bloqueo_fecha_inicio').val();
        let fecha_termino = $('#bloqueo_fecha_termino').val();
        let hora_inicio = $('#bloqueo_hora_inicio').val();
        let hora_termino = $('#bloqueo_hora_termino').val();

        var todo_dia = '0';
        if( $('#bloqueo_todo_dia').prop('checked') )    todo_dia = '1';
        else                                            todo_dia = '0';

        let url = "{{ route('bloqueo.horas.registrar') }}";

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                agenda: agenda,
                motivo: motivo,
                fecha_inicio: fecha_inicio,
                fecha_termino: fecha_termino,
                hora_inicio: hora_inicio,
                hora_termino: hora_termino,
                todo_dia: todo_dia,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#modal_bloqueo_hora').modal('hide');

                swal({
                    title: "Bloqueo de horario",
                    text: "Registro con exito.",
                    icon: "success",
                    buttons: "Aceptar",
                });

                $('#bloqueo_agenda option:first').prop('selected', true);
                $('#bloqueo_motivo').val('');
                $('#bloqueo_fecha_inicio').val('');
                $('#bloqueo_fecha_termino').val('');
                $('#bloqueo_hora_inicio').val('');
                $('#bloqueo_hora_termino').val('');
                $('#bloqueo_todo_dia').prop('checked', false);

                cargarAgendaProfesional(agenda, id_lugar_atencion, id_profesional);

            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Bloqueo de horario",
                    text: mensaje,
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function desbloquear_bloqueo_hora(id)
    {
        let url = "{{ route('bloqueo.horas.estado') }}";
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let estado = 0;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id: id,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                estado: estado,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                swal({
                    title: "Bloqueo de horario desbloqueado",
                    text: "Registro con exito.",
                    icon: "success",
                    buttons: "Aceptar",
                });
                cargar_bloqueo_horas();

                /** CARGA DE AGENDA DEL PROFESIONAL */
                cargarAgendaProfesional($('#id_tipo_agenda').val(), id_lugar_atencion, id_profesional);
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Bloqueo de horario",
                    text: mensaje,
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function bloquear_bloqueo_hora(id)
    {
        let url = "{{ route('bloqueo.horas.estado') }}";
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let estado = 1;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id: id,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                estado: estado,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                swal({
                    title: "Bloqueo de horario bloqueado",
                    text: "Registro con exito.",
                    icon: "success",
                    buttons: "Aceptar",
                });
                cargar_bloqueo_horas();

                /** CARGA DE AGENDA DEL PROFESIONAL */
                cargarAgendaProfesional($('#id_tipo_agenda').val(), id_lugar_atencion, id_profesional);
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Bloqueo de Horario",
                    text: mensaje,
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_bloqueo_hora(id)
    {
        let url = "{{ route('bloqueo.horas.estado') }}";
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let estado = 2;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                id: id,
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                estado: estado,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                swal({
                    title: "Bloqueo de horario eliminado",
                    text: "Registro con exito.",
                    icon: "success",
                    buttons: "Aceptar",
                });
                cargar_bloqueo_horas();

                /** CARGA DE AGENDA DEL PROFESIONAL */
                cargarAgendaProfesional($('#id_tipo_agenda').val(), id_lugar_atencion, id_profesional);
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Bloqueo de Horario",
                    text: mensaje,
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_bloqueo_horas()
    {
        let url = "{{ route('bloqueo.horas.ver') }}";
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        $('#bloqueos_lista').html('');
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                let meses = ['','ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

                $.each(data.registros, function (index, value){

                    var fechaInicio = new Date(value.fecha_inicio);
                    var dia = fechaInicio.getDate()+1;
                    var mes = fechaInicio.getMonth() + 1;
                    var anio = fechaInicio.getFullYear();
                    var fechaInicio = dia + ' de ' + meses[mes] + ' del ' + anio;

                    var fechaTermino = new Date(value.fecha_termino);
                    var dia = fechaTermino.getDate()+1;
                    var mes = fechaTermino.getMonth() + 1;
                    var anio = fechaTermino.getFullYear();
                    var fechaTermino = dia + ' de ' + meses[mes] + ' del ' + anio;

                    var html = '';
                    html += '<div class="card-informacion">';
                    html += '<div class="card-body">';
                    html += '<div class="row">';
                    html += '    <div class="col-md-12 mb-1" style="text-align: left;"><span class="font-weight-bold">Motivo:</span> '+((value.motivo == null)?'':value.motivo)+'</div>';
                    html += '    ';
                    html += '    <div class="col-md-12 mb-1" style="text-align: left;"><span class="font-weight-bold">Inicio:</span> '+fechaInicio+' - '+value.hora_inicio+'</div>';
                    html += '    <div class="col-md-12 mb-1" style="text-align: left;"><span class="font-weight-bold">Finalización:</span> '+fechaTermino+' - '+value.hora_termino+'</div>';
                    html += '    <div class="col-md-12 mb-1 d-inline mt-3" style="text-align: right;">';

                    if (value.estado == 1)
                    html += '            <button class="btn btn-xxs btn-info-light-c d-inline" onclick="desbloquear_bloqueo_hora(\''+value.id+'\');"><i class="feather icon-unlock"></i> Desbloquear</button>';
                    else
                    html += '            <button class="btn btn-xxs btn-danger-light-c  d-inline" onclick="bloquear_bloqueo_hora(\''+value.id+'\');"><i class="feather icon-lock"></i> Bloquear</button>';
                    html += '        <button class="btn btn-xxs btn-primary-light-c d-inline" onclick="eliminar_bloqueo_hora(\''+value.id+'\');"><i class="feather icon-x"></i> Eliminar bloqueo</button>';

                    html += '    </div>';
                     html += '    </div>';
                      html += '    </div>';
                    html += '</div>';

                    $('#bloqueos_lista').append(html);
                });
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Bloqueo de Horario",
                    text: mensaje,
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carga_calendario_bloqueo()
    {
        $('#bloqueo_fecha_inicio').val('');
        $('#bloqueo_fecha_termino').val('');
        $('#bloqueo_fecha_inicio').attr('disabled',true);
        $('#bloqueo_fecha_termino').attr('disabled',true);

        let id_profesional = $('#bloqueo_id_profesional').val();
        let tipo_agenda = $('#bloqueo_agenda').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional: id_profesional,
                    lugar_atencion: id_lugar_atencion,
                    tipo_agenda: tipo_agenda,
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
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


                        /** calendario inicio */
                        $('#bloqueo_fecha_inicio').attr('disabled',false);

                        $("#bloqueo_fecha_inicio").flatpickr({
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
                        /** fin calendario inicio */

                        /** calendario termino */
                        $('#bloqueo_fecha_termino').attr('disabled',false);

                        $("#bloqueo_fecha_termino").flatpickr({
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
                        /** fin calendario termino */

                    }
                    else
                    {
                        $('#bloqueo_fecha_termino').attr('disabled',true);
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

</script>
