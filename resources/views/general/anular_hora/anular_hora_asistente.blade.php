<button type="button" class="btn btn-danger-light-c btn-xxxs has-ripple" onclick="abrir_anular_hora();" tooltip="Anular">Anular Hora</button>

<div class="modal fade" id="modal_anular_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_anular_hora" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(28, 190, 190);">
        <h5 class="modal-title text-white" id="modal_anular_horaLabel">Anular hora Medica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_anular_hora').modal('hide');">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="anular_id_profesional" id="anular_id_profesional" value="" >
        <input type="hidden" name="anular_id_lugar_atencion" id="anular_id_lugar_atencion" value="" >
        <div class="row">
            <div class="form-group col-md-6">
                <label class="floating-label-activo-sm">Agenda</label>
                <select class="form-control form-control-sm" name="anular_agenda" id="anular_agenda" onchange="carga_calendario_anular();">
                    {{-- @foreach ($listaTipoAgendaProf as $tipo_agenda) --}}
                        {{-- <option value="{{ $tipo_agenda['id'] }}">{{ $tipo_agenda['texto'] }}</option> --}}
                    {{-- @endforeach --}}
                </select>
            </div>

            <div class="form-group col-md-6">
                <label class="floating-label-activo-sm">Fecha</label>
                <input type="date" class="form-control form-control-sm" name="anular_fecha_consulta" id="anular_fecha_consulta" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" onchange="cargar_anular_horas();">
            </div>
        </div>
        <div class="row" >
            <div class="col-md-12" id="horas_medicas_lista">
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger-light btn-sm" onclick="$('#modal_anular_hora').modal('hide');">Cerrar</button>
      </div>


    </div>
  </div>
</div>


<div class="modal fade" id="modal_anular_hora_comentario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_anular_hora_comentario" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(28, 190, 190);">
          <h5 class="modal-title text-white" id="modal_anular_hora_comentarioLabel">Anular hora Medica Comentario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_anular_hora_comentario').modal('hide');">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="anular_id_profesional_comentario" id="anular_id_profesional_comentario" value="" >
          <input type="hidden" name="anular_id_lugar_atencion_comentario" id="anular_id_lugar_atencion_comentario" value="" >
          <input type="hidden" name="anular_id_hora_comentario" id="anular_id_hora_comentario" value="" >
          <div class="row">
                <div class="form-group col-md-6">
                  <label class="floating-label-activo-sm">Comentario</label>
                  <textarea class="form-control" name="anular_comentario"  id="anular_comentario"></textarea>
              </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger-light btn-sm" onclick="$('#modal_anular_hora_comentario').modal('hide');">Cerrar</button>
          <button type="button" class="btn btn-success-light btn-sm" onclick="anular_horas();">Anular</button>
        </div>

      </div>
    </div>
</div>

<!-- Modal devolución -->
<div class="modal fade" id="modalDevolucion" tabindex="-1" role="dialog" aria-labelledby="modalDevolucionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="formDevolucion" action="#" method="POST">
        @csrf
        <input type="hidden" id="modalDevolucionValor" name="valor_devolucion">
        <input type="hidden" id="modalDevolucionIdHora" name="id_hora">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalDevolucionLabel">Devolución de dinero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <p>¿Deseas devolver el monto de <strong>$<span id="modalValorTexto"></span></strong>?</p>
            <div class="form-group">
                <label for="motivo_devolucion">Motivo de devolución:</label>
                <textarea class="form-control" name="motivo_devolucion" id="motivo_devolucion" rows="3" required></textarea>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="devolver_bono()">Confirmar devolución y anular hora</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
        </form>
    </div>
</div>


<script>
    function abrir_anular_hora()
    {
        $('#anular_id_profesional').val($('#agenda_profesional_asistente').val());
        $('#anular_id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());

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
        let id_profesional = $('#id_profesional').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
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
                    var clase = 'd-none';
                    if(value.estado.id !== 1 && value.estado.id !== 2){
                        clase = 'badge badge-danger mb-3';
                    }
                    var valor = 0;
                    if(value.dato !== null){
                        valor = value.dato ? value.dato.valor_atencion : null;
                    }
                    var html = '';
                    html += '<div class="row" style="border: 2px solid #aba8a8; border-radius: 13px; margin: 1em;padding: 10px 0px;">';
                    html += '    <div class="col-md-6 mb-2" style="text-align: left;"><span class="font-weight-bold">Paciente:</span> '+value.paciente.nombres+' '+value.paciente.apellido_uno+' '+value.paciente.apellido_dos+'</div>';
                    html += '    <div class="col-md-6 mb-2" style="text-align: left;"><span class="font-weight-bold">Rut:</span> '+value.paciente.rut+'</div>';
                    html += '    <div class="col-md-6 mb-2" style="text-align: left;"><span class="font-weight-bold">Hora inicio:</span> '+value.hora_inicio+'</div>';
                    html += '    <div class="col-md-6 mb-2" style="text-align: left;"><span class="font-weight-bold">Hora termino:</span> '+value.hora_termino+'</div>';
                    html += '    <div class="col-md-12 mb-2" style="text-align: left;background-color:'+value.estado.color+';"><span class="font-weight-bold">Estado: '+value.estado.valor+'</span></div>';
                    html += '    <div class="col-md-6 mb-2" style="text-align: center;">';
                    html += '       <span class="'+clase+'">Hay pago asociado. Se debe anular el pago de $'+valor+'. </span>';
                    html += '       <button class="btn btn-sm btn-danger-light mr-2" onclick="cargar_comentario_anular_hora(\''+value.id+'\');">Anular</button>';
                    if(valor && valor !== 0){
                        html += '       <button class="btn btn-sm btn-warning" onclick="abrirModalDevolucion('+valor+', \''+value.id+'\')">Devolver $'+valor+'</button>';
                    }
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

    function abrirModalDevolucion(valor, id_hora) {
        $('#modalDevolucionValor').val(valor);
        $('#modalDevolucionIdHora').val(id_hora);
        $('#modalDevolucion').modal('show');
        $('#modalValorTexto').html(valor);
    }

    function anular_horas()
    {
        var id_profesional = $('#anular_id_profesional_comentario').val();
        var id_lugar_atencion = $('#anular_id_lugar_atencion_comentario').val();
        var id_hora = $('#anular_id_hora_comentario').val();
        var comentario = $('#anular_comentario').val();

        if(!comentario || comentario == null || comentario == undefined || comentario == ''){
            comentario = '';
        }

        let url = "{{ route('agenda.cancelar_hora') }}";

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
                console.log(data);
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

                    cargarAgendaProfesional($('#id_tipo_agenda').val(),$('#anular_fecha_consulta').val())

                } else {
                    alert('No se pudo Confirmar Anulacion');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function carga_tipos_agendas_anular(tipos_agendas)
    {
        console.log('carga_tipos_agendas_anular');
        console.log(tipos_agendas);
        $("#anular_agenda").html('');
        arrayTipoAgenda = ['', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes','Modular'];
        $.each(tipos_agendas, function (key, value)
        {
            $("#anular_agenda").append('<option value="'+value+'">'+arrayTipoAgenda[value]+'</option>');
        });
    }

    function devolver_bono(){
        let id_hora_medica = $('#modalDevolucionIdHora').val();
        let url = "{{ ROUTE('profesional.devolucion_bono') }}";
        let motivo_devolucion = $('#motivo_devolucion').val();
        let data = {
            id_hora_medica: id_hora_medica,
            motivo_devolucion: motivo_devolucion,
            _token: CSRF_TOKEN
        }

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        title:'Exito',
                        icon:'success',
                        text: resp.mensaje,
                    });
                    // cerrar modal
                    $('#modalDevolucion').modal('hide');

                }else{
                    swal({
                        title:'Error',
                        icon:'error',
                        text: resp.mensaje,
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }
</script>
