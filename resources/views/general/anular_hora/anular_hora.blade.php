<button type="button" class="btn btn-agenda btn-danger d-inline float-right mb-2 mt-0 ml-2 mr-3" onclick="abrir_anular_hora();" data-toggle="tooltip" data-placement="top" title="Anular horas"><i class="fas fa-calendar-times"></i> </button>

<div class="modal fade" id="modal_anular_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_anular_hora" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title text-white" id="modal_anular_horaLabel">Anular hora médica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_anular_hora').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="anular_id_profesional" id="anular_id_profesional" value="" >
        <input type="hidden" name="anular_id_lugar_atencion" id="anular_id_lugar_atencion" value="" >
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="floating-label-activo-sm">Agenda</label>
                <select class="form-control form-control-sm" name="anular_agenda" id="anular_agenda" onchange="carga_calendario_anular();">
                    @foreach ($listaTipoAgendaProf as $tipo_agenda)
                        <option value="{{ $tipo_agenda['id'] }}">{{ $tipo_agenda['texto'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label class="floating-label-activo-sm">Fecha</label>
                <input type="date" class="form-control form-control-sm" name="anular_fecha_consulta" id="anular_fecha_consulta" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" onchange="cargar_anular_horas();">
            </div>
        </div>
        <div class="form-row" >
            <div class="col-md-12" id="horas_medicas_lista">

            </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-danger-light btn-sm" onclick="$('#modal_anular_hora').modal('hide');">Cerrar</button>
      </div>-->
    </div>
  </div>
</div>


<div class="modal fade" id="modal_anular_hora_comentario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_anular_hora_comentario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white" id="modal_anular_hora_comentarioLabel">Anular hora médica comentario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_anular_hora_comentario').modal('hide');">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="anular_id_profesional_comentario" id="anular_id_profesional_comentario" value="" >
          <input type="hidden" name="anular_id_lugar_atencion_comentario" id="anular_id_lugar_atencion_comentario" value="" >
          <input type="hidden" name="anular_id_hora_comentario" id="anular_id_hora_comentario" value="" >
          <div class="form-row">
                <div class="form-group col-md-12">
                  <label class="floating-label-activo-sm">Comentario</label>
                  <textarea class="form-control" name="anular_comentario"  id="anular_comentario"></textarea>
              </div>
          </div>
        </div>

        <div class="modal-footer">
          <!--<button type="button" class="btn btn-danger-light btn-sm" onclick="$('#modal_anular_hora_comentario').modal('hide');">Cerrar</button>-->
          <button type="button" class="btn btn-danger-light-c btn-xxs" onclick="anular_horas();"><i class="feather icon-x"></i> Anular</button>
        </div>

      </div>
    </div>
</div>

<script>
    function abrir_anular_hora()
    {
        $('#anular_id_profesional').val('{{ $profesional->id }}');
        $('#anular_id_lugar_atencion').val('{{ $lugar_atencion }}');

        $('#anular_agenda option:first').prop('selected', true);
        carga_calendario_anular();
        cargar_dia_para_anular();
        cargar_anular_horas();

        $('#modal_anular_hora').modal('show');
    }

    function getNextDate()
    {
        date = moment().format('YYYY-MM-DD');
        const nextDate = activeDaysInRange.find(d => new Date(d) >= new Date(date));
        return moment(nextDate).format('YYYY-MM-DD');
    }

    function cargar_dia_para_anular()
    {
        console.log('cargar_dia_para_anular');
        var fecha = getNextDate();
        console.log(fecha);
        $('#anular_fecha_consulta').val(fecha);
    }

    function carga_calendario_anular()
    {
        $('#anular_fecha_consulta').val('');
        $('#anular_fecha_consulta').attr('disabled',true);

        let id_profesional = $('#anular_id_profesional').val();
        let tipo_agenda = $('#anular_agenda').val();
        let id_lugar_atencion = $('#anular_id_lugar_atencion').val();
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
                        let dias = ['','LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
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
                        $('#anular_fecha_consulta').attr('disabled',false);

                        $("#anular_fecha_consulta").flatpickr({
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
                    }
                    else
                    {
                        $('#anular_fecha_consulta').attr('disabled',true);
                    }

                } else {
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function cargar_anular_horas()
    {
        let url = "{{ route('agenda.dia.horas.ver') }}";
        let id_profesional = $('#bloqueo_id_profesional').val();
        let id_lugar_atencion = $('#bloqueo_id_lugar_atencion').val();
        let fecha_consulta = $('#anular_fecha_consulta').val();
        $('#horas_medicas_lista').html('');
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_profesional: id_profesional,
                id_lugar_atencion: id_lugar_atencion,
                fecha_consulta: fecha_consulta,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $.each(data.registros, function (index, value)
                {
                    var html = '';
                    html += '<div class="form-row">';
                    html += '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">';
                    html += '<div class="card-informacion">';
                    html += '<div class="card-body px-1 pb-1">';
                    html += '    <div class="col-md-12 text-left mb-2"><span class="font-weight-bold text-c-blue">Paciente:</span> '+value.paciente.nombres+' '+value.paciente.apellido_uno+' '+value.paciente.apellido_dos+'</div>';
                    html += '    <div class="col-md-12 text-left mb-2"><span class="font-weight-bold text-c-blue">Rut:</span> '+value.paciente.rut+'</div>';
                    html += '    <div class="col-md-12 text-left mb-2"><span class="font-weight-bold text-c-blue">Hora inicio:</span> '+value.hora_inicio+'</div>';
                    html += '    <div class="col-md-12 text-left mb-2"><span class="font-weight-bold text-c-blue">Hora término:</span> '+value.hora_termino+'</div>';
                    html += '    <div class="col-md-12 text-left mb-2"><span class="font-weight-bold text-c-blue">Estado:</span> <span style="background-color:'+value.estado.color+'; color:#fff; padding:2px 5px; border-radius:5px; font-weight:600;">'+value.estado.valor+'</span></div>';
                    html += '    <div class="card-footer pb-0">';
                    html += '    <div class="col-md-12 text-right">';
                    html += '       <button class="btn btn-xxs btn-danger-light-c" onclick="cargar_comentario_anular_hora(\''+value.id+'\');"><i class="feather icon-x"></i> Anular</button>';
                    html += '    </div>';
                    html += '   </div>';
                    html += '    </div>';
                    html += '    </div>';
                    html += '    </div>';
                    html += '</div>';

                    $('#horas_medicas_lista').append(html);
                });
            }
            else
            {
                if(data.msj == 'sin registros')
                {
                    //
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
                        title: "Anular Hora",
                        text: mensaje,
                        icon: "error",
                    });
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_comentario_anular_hora(id)
    {
        $('#modal_anular_hora').modal('hide');
        $('#modal_anular_hora_comentario').modal('show');
        $('#anular_id_profesional_comentario').val($('#anular_id_profesional').val());
        $('#anular_id_lugar_atencion_comentario').val($('#anular_id_lugar_atencion').val());
        $('#anular_id_hora_comentario').val(id);

        $('#anular_comentario').val("");
    }

    function anular_horas()
    {
        var id_profesional = $('#anular_id_profesional_comentario').val();
        var id_lugar_atencion = $('#anular_id_lugar_atencion_comentario').val();
        var id_hora = $('#anular_id_hora_comentario').val();
        var comentario = $('#anular_comentario').val();

        let url = "{{ route('profesional.cancelar_hora') }}";

        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    comentario: comentario,
                    id_hora_medica: id_hora
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    $('#consulta').modal('hide');
                    swal({
                        title: "Exito!",
                        text: "Hora medica cancelada correctamente",
                        type: "success",
                        confirmButtonText: "Cool"
                    });

                    $('#modal_anular_hora_comentario').modal('hide');
                    $('#anular_id_profesional_comentario').val('');
                    $('#anular_id_lugar_atencion_comentario').val('');
                    $('#anular_id_hora_comentario').val('');
                    $('#anular_comentario').val('');

                    cargarAgendaProfesional($('#id_tipo_agenda').val(), id_lugar_atencion, id_profesional, $('#anular_fecha_consulta').val());

                } else {
                    alert('No se pudo Confirmar Anulacion');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }
</script>
