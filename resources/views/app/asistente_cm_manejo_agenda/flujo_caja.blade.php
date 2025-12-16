@extends('template.asistente_cm_manejo_agenda.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Rendir Caja Diaria</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('asistentecm.ma.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('asistentecm.ma.home') }}">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        {{-- PESTAÑA RENDICION DE CAJA --}}
                                        <div class="tab-pane fade show active " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Rendir Caja del {{ date('d-m-Y') }}</h5>
                                                    <a href="{{ route('asistentecm.ma.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                                        <i class="feather icon-home"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <input type="hidden" name="lista_bonos" id="lista_bonos" value="{{ $lista_bonos }}">
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Número de Bonos</label>
                                                        <input type="number" class="form-control form-control-sm" id="numero_bonos" name="numero_bonos" value="{{ $total_bonos }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Efectivo</label>
                                                        <input type="number" class="form-control form-control-sm" id="efectivo" name="efectivo" value="{{ $total_efectivo }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Otros</label>
                                                        <input type="number" class="form-control form-control-sm" id="otros" name="otros" value="{{ $total_otros }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Total Documentos</label>
                                                        <input type="number" class="form-control form-control-sm" id="total" name="total" value="{{ $total }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Recibe Caja :</label>
                                                        <select name="id_asistente_receptor" id="id_asistente_receptor" class="form-control form-control-sm">
                                                            @if($listado_recibe)
                                                                @foreach ( $listado_recibe as $recibe )
                                                                    <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja();" id="btn_rendicion_caja_diaria">Rendir Caja</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <table id="tabla_rendir_caja" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Tipo</th>
                                                            <th class="text-center align-middle">Código</th>
                                                            <th class="text-center align-middle">Clase de Pago</th>
                                                            <th class="text-center align-middle">Convenio</th>
                                                            <th class="text-center align-middle">F/Atención</th>
                                                            <th class="text-center align-middle">Paciente</th>
                                                            <th class="text-center align-middle">Valor total</th>
                                                            <th class="text-center align-middle">Profesional</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($bono) )
                                                            @foreach($bono as $key_b => $value_b)
                                                                <tr >
                                                                    <td class="align-middle text-center">{{ $value_b->TipoBono()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_b->numero_bono }}</td>
                                                                    <td class="align-middle text-center">
                                                                        @if($value_b->id_clase_bono == 1)
                                                                            Bono Fisico
                                                                        @elseif($value_b->id_clase_bono == 2)
                                                                            Sencillito
                                                                        @elseif($value_b->id_clase_bono == 3)
                                                                            Caja Vecina
                                                                        @elseif($value_b->id_clase_bono == 4)
                                                                            Bono Web
                                                                        @elseif($value_b->id_clase_bono == 5)
                                                                            Bono Web Pre-Pago
                                                                        @elseif($value_b->id_clase_bono == 6)
                                                                            Particular
                                                                        @else
                                                                            Otro
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle text-center">{{ $value_b->Convenio()->first()->nombre }}</td>
                                                                    <td class="align-middle text-center">{{ $value_b->fecha_atencion }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <span>{{ $value_b->Paciente()->first()->nombres }} {{ $value_b->Paciente()->first()->apellido_uno }} {{ $value_b->Paciente()->first()->apellido_dos }}</span><br>
                                                                        <span>{{ $value_b->Paciente()->first()->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle text-center">${{ number_format($value_b->valor_atencion, 2, ",", ".") }}</td>
                                                                    <td class="align-middle text-center">
                                                                        <span>{{ $value_b->Profesional()->first()->nombres }} {{ $value_b->Profesional()->first()->apellido_uno }} {{ $value_b->Profesional()->first()->apellido_dos }}</span><br>
                                                                        <span>{{ $value_b->Profesional()->first()->rut }}</span>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>

                                                </table>
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
    </div>
</div>

    <!--Cierre: Container Completo-->

@endsection

@section('modales')
    @include('app.asistente_cm_publico.modales.modal_rendicion_caja_diaria')
@endsection

@section('page-script')
    <script>
        let clase_bono = ['Bono Fisico' ,'Sencillito' ,'Caja Vecina' ,'Bono Web' ,'Bono Web Pre-Pago' ,'Particular'];
        var tiempo = 0; // CANTIDAD MINUTOS A ESPERAR PARA APROBACION
        var conteo_activo = 0; // valida si conteo esta activo

        $(document).ready(function(){
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });
        });

        function seleccionar_bonos_rendicion(){
            var estado  = $('#enviar_todos').is(':checked')
            $("input:checkbox").each(function() {
                if($(this).attr('id') != 'enviar_todos')
                {
                    if(estado != $(this).is(':checked'))
                    {
                        $(this).trigger('click');
                    }
                }
            });
        }

        function cargar_flujo_caja() {
            var fecha = {{ date('Y-m-d') }};
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja') }}";

            $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#tabla_rendir_caja tbody').html('');
                        for (i = 0; i < data.registros.length; i++) {

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr >';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].tipo_bono.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].convenio.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].fecha_atencion+'</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>'+ data.registros[i].paciente.nombres+' '+ data.registros[i].paciente.apellido_uno+' '+ data.registros[i].paciente.apellido_dos+'</span><br>';
                            fila += '        <span>'+ data.registros[i].paciente.rut +'</span>';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">$'+ data.registros[i].valor_atencion +'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].parametro.valor +'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].profesional.nombre+' '+ data.registros[i].profesional.apellido_uno+' '+ data.registros[i].profesional.apellido_dos+'</td>';
                            fila += '    {{--  <td class="align-middle text-center">{{ $value_b->observaciones }}</td>  --}}';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <div class="form-group">';
                            fila += '            <div class="switch switch-success d-inline m-r-10">';
                            fila += '                <input type="checkbox" id="rendir_caja_'+ data.registros[i].id +'">';
                            fila += '                <label for="rendir_caja_'+ data.registros[i].id +'"';
                            fila += '                    class="cr"></label>';
                            fila += '            </div>';
                            fila += '        </div>';
                            fila += '    </td>';
                            fila += '</tr>';
                            j++;

                            $('#tabla_rendir_caja tbody').append(fila);

                        }
                    }
                    else
                    {
                        $('#tabla_rendir_caja tbody').html('');
                        $('#tabla_rendir_caja tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function rendir_caja()
        {
            let url = "{{ route('asistentecm.solicitar_rendir_caja') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        bonos : $('#lista_bonos').val(),
                        id_asistente_receptor : $('#id_asistente_receptor').val(),
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#numero_rendicion_hidde').val(data.last_id);
                        $('#numero_rendicion').html(data.last_id);
                        $('#nombre_receptor').html(data.registro.asistente_receptor.nombres+' '+data.registro.asistente_receptor.apellido_uno+' '+data.registro.asistente_receptor.apellido_dos);
                        $('#total_documento').html(data.registro.total_documentos);
                        $('#total_bonos').html(data.registro.total_bono);
                        $('#total_efectivo').html(data.registro.total_efectivo);
                        $('#total_otros').html(data.registro.total_otros);

                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                        $('#rendicion_caja_diaria').modal('show',{backdrop: 'static', keyboard: false});

                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_rendicion();
                    }
                    else
                    {
                        swal({
                            title: "Solicitud de Rendicion con Problema",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cerrarModalRendicion()
        {
            swal({
                title: "Rendición Diaria.",
                text: 'Al "Aceptar" cierra la ventana sin Esperar Aprobación del receptor.',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                } else {

                    $('#rendicion_caja_diaria').modal('hide');
                }
            })
        }

        /** actualizar pagina */
        function actualizar_registros()
        {
            let url = "{{ route('asistentecm.rendir') }}";
            document.reload(url);
        }


        function validar_rendicion()
        {
            $('#aprobacion_tiempo').html(''+tiempo+' minutos');
            if(tiempo > 0 && conteo_activo == 1)
            {
                setTimeout(function(){
                    tiempo = tiempo-1;
                    $('#aprobacion_tiempo').html(''+tiempo+' minutos');
                    var value_validacion = 0;

                    var id_rendicion = $('#numero_rendicion_hidde').val()
                    let url = "{{ route('asistentecm.rendir_caja_validar_autorizacion') }}";

                    $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                id_rendicion : id_rendicion,
                            },
                        })
                        .done(function(data) {

                            console.log(data);
                            if (data.estado == 1)
                            {
                                if(data.registro.estado == 0)
                                {
                                    console.log('espera aprobacion');
                                }
                                else
                                {
                                    $('#numero_rendicion_hidde').val('');
                                    $('#numero_rendicion').html('');
                                    $('#nombre_receptor').html('');
                                    $('#total_documento').html('');
                                    $('#total_bonos').html('');
                                    $('#total_efectivo').html('');
                                    $('#total_otros').html('');

                                    $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');
                                    $('#rendicion_caja_diaria').modal('hide');

                                    tiempo = 0;
                                    conteo_activo = 0;

                                    if(data.registro.estado == 1)
                                    {
                                        swal({
                                            title: "Solicitud de Rendicion.",
                                            text: "Rendicion Aceptada conforme",
                                            icon: "success",
                                            buttons: "Aceptar",
                                            // DangerMode: true,
                                        });

                                        console.log('confirmado');
                                        value_validacion = 1;
                                        cargar_registros();
                                        return false;
                                    }
                                    else if(data.registro.estado == 2)
                                    {
                                        swal({
                                            title: "Solicitud de Rendicion.",
                                            text: "Autorizaión Vencida",
                                            icon: "success",
                                            buttons: "Aceptar",
                                            // DangerMode: true,
                                        });
                                    }
                                    else if(data.registro.estado == 3)
                                    {
                                        swal({
                                            title: "Solicitud de Rendicion.",
                                            text: "Autorizaión Rechazada",
                                            icon: "error",
                                            buttons: "Aceptar",
                                            // DangerMode: true,
                                        });
                                    }
                                }
                            }
                            else
                            {
                                swal({
                                    title: "Solicitud de Rendicion con Problema",
                                    text: data.msj,
                                    icon: "error",
                                    buttons: "Aceptar",
                                    // DangerMode: true,
                                });
                            }

                            validar_rendicion(tiempo);
                            if(tiempo == 8)
                            {
                                swal({
                                    title: "Solicitud de Rendicion",
                                    text: 'El tiempo para Autorizar Rendición esta por finalizar, Desea continuar presione el botón "Más Tiempo", si "Acepta" la Rendición quedará Anulada y debera realizarla de nuevo.',
                                    icon: "warning",
                                    buttons: ["Aceptar", 'Más Tiempo'],
                                }).then((result) => {
                                    if (result == true)
                                    {
                                        reiniciar_rendicion( $('#numero_rendicion_hidde').val());
                                    }
                                });
                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
                }, 10000);// 600 = 1seg |  60000 = 1 minutos | 10000 = 10 seg | 600000 = 10 minutos
            }
            else
            {
                conteo_activo = 0;
                $('#aprobacion').html('Se a finalizado el tiempo para la aprobación, debe realizar la rendicion nuevamente');
                console.log('desistir rendicion');
                desistir_rendicion();
            }
        }


        function desistir_rendicion()
        {
            var id_rendicion = $('#numero_rendicion_hidde').val();

            let url = "{{ route('asistentecm.rendicion_caja_desistir') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id_rendicion : id_rendicion
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#numero_rendicion_hidde').val('');
                        $('#numero_rendicion').html('');
                        $('#nombre_receptor').html('');
                        $('#total_documento').html('');
                        $('#total_bonos').html('');
                        $('#total_efectivo').html('');
                        $('#total_otros').html('');

                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                        $('#rendicion_caja_diaria').modal('hide');

                        tiempo = 0;
                        conteo_activo = 0;

                        swal({
                            title: "Solicitud de Rendicion.",
                            text: "Codigo no recibido a tiempo",
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }
                    else
                    {
                        swal({
                            title: "Falla Solicitud de Rendicion, Autorizacion no recibido a tiempo",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function reiniciar_rendicion(id_rendicion)
        {
            let url = "{{ route('asistentecm.rendicion_caja_extender_validacion') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id_rendicion : id_rendicion
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_rendicion();
                    }
                    else
                    {
                        swal({
                            title: "Falla Solicitud de Rendicion Desistida",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_registros()
        {
                let url = "{{ route('asistentecm.ma.rendicion_carga_bonos') }}";

                $.ajax({
                        url: url,
                        type: "GET",
                        data: {},
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {

                            $('#numero_bonos').val(data.total_bonos);
                            $('#efectivo').val(data.total_efectivo);
                            $('#otros').val(data.total_otros);
                            $('#total').val(data.total);

                            var lista_bonos = '';
                            $('#tabla_rendir_caja tbody').html('');
                            $(data.lista_bonos).each(function(index, value) { // indice, valor
                                var html = '';
                                let clase_bono = ['','Bono Fisico','Sencillito','Caja Vecina','Bono Web','Bono Web Pre-Pago','Particular','Otro'];
                                html +='<tr >';
                                html +='    <td class="align-middle text-center">'+value.TipoBono.nombre+'</td>';
                                html +='    <td class="align-middle text-center">'+value.numero_bono+'</td>';
                                html +='    <td class="align-middle text-center">'+clase_bono[value.id_clase_bono]+'</td>';
                                html +='    <td class="align-middle text-center">'+value.Convenio.nombre+'</td>';
                                html +='    <td class="align-middle text-center">'+value.fecha_atencion+'</td>';
                                html +='    <td class="align-middle text-center">';
                                html +='        <span>'+value.Paciente.nombres+' '+value.Paciente.apellido_uno+' '+value.Paciente.apellido_dos+'</span><br>';
                                html +='        <span>'+value.Paciente.rut+'</span>';
                                html +='    </td>';
                                html +='    <td class="align-middle text-center">'+$.number( value.valor_atencion, 2, ',' )+'</td>';
                                html +='    <td class="align-middle text-center">';
                                html +='        <span>'+value.Profesional.nombres+' '+value.Profesional.apellido_uno+' '+value.Profesional.apellido_dos+'</span><br>';
                                html +='        <span>'+value.Profesional.rut+'</span>';
                                html +='    </td>';
                                html +='</tr>';
                                $('#tabla_rendir_caja tbody').append(html);
                                lista_bonos +='|'+value.id+'' ;
                            });

                            $('#lista_bonos').val(data.lista_bonos)

                        }
                        else
                        {
                            swal({
                                title: "Problemas al cargar bonos del día",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                            return '0';
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
        }

        // function validar_autorizacion()
        // {
        //     console.log('-----------------validar_autorizacion-------------------');

        //     var id_rendicion = $('#numero_rendicion_hidde').val()
        //     let url = "{{ route('asistentecm.rendir_caja_validar_autorizacion') }}";

        //     $.ajax({
        //             url: url,
        //             type: "POST",
        //             data: {
        //                 _token: CSRF_TOKEN,
        //                 id_rendicion : id_rendicion,
        //             },
        //         })
        //         .done(function(data) {

        //             console.log(data);
        //             if (data.estado == 1)
        //             {
        //                 if(data.registro.estado == 0)
        //                 {
        //                     console.log('espera aprobacion');
        //                     return '0';
        //                 }
        //                 else
        //                 {
        //                     $('#numero_rendicion_hidde').val('');
        //                     $('#numero_rendicion').html('');
        //                     $('#nombre_receptor').html('');
        //                     $('#total_documento').html('');
        //                     $('#total_bonos').html('');
        //                     $('#total_efectivo').html('');
        //                     $('#total_otros').html('');

        //                     $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

        //                     $('#rendicion_caja_diaria').modal('hide');

        //                     tiempo = 0;
        //                     conteo_activo = 0;


        //                     if(data.registro.estado == 1)
        //                     {
        //                         swal({
        //                             title: "Solicitud de Rendicion.",
        //                             text: "Rendicion Aceptada conforme",
        //                             icon: "success",
        //                             buttons: "Aceptar",
        //                             // DangerMode: true,
        //                         });
        //                         return '1';
        //                     }
        //                     else if(data.registro.estado == 2)
        //                     {
        //                         swal({
        //                             title: "Solicitud de Rendicion.",
        //                             text: "Autorizaión Vencida",
        //                             icon: "success",
        //                             buttons: "Aceptar",
        //                             // DangerMode: true,
        //                         });
        //                     }
        //                     else if(data.registro.estado == 3)
        //                     {
        //                         swal({
        //                             title: "Solicitud de Rendicion.",
        //                             text: "Autorizaión Rechazada",
        //                             icon: "error",
        //                             buttons: "Aceptar",
        //                             // DangerMode: true,
        //                         });
        //                     }

        //                     return '0';
        //                 }
        //             }
        //             else
        //             {
        //                 swal({
        //                     title: "Solicitud de Rendicion con Problema",
        //                     text: data.msj,
        //                     icon: "error",
        //                     buttons: "Aceptar",
        //                     // DangerMode: true,
        //                 });
        //                 return '0';
        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });
        // }

    </script>

@endsection

