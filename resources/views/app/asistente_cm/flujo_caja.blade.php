@extends('template.asistente_cm.template')
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
                                    <a href="{{ route('asistentejcm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
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
                                <div class="col-md-12 mt-md-2">
                                    <ul class="nav nav-tabs justify-content-left" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="rendicion-tab" data-toggle="tab" href="#rendicion_caja" role="tab" aria-controls="rendicion_caja" aria-selected="true">Rendición de Caja Diaria</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="rendicion_rendicion-tab" data-toggle="tab" href="#rendicion_rendicion" role="tab" aria-controls="rendicion_rendicion" aria-selected="false" onclick="cargar_registros_cierre();">Cierres de Cajas</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="tab-content" id="pills-tabContent">

                                        {{-- PESTAÑA RENDICION DE CAJA --}}
                                        <div class="tab-pane fade show active " role="tabpanel" aria-labelledby="pills-profile-tab" id="rendicion_caja">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Rendir Caja del {{ date('d-m-Y') }}</h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <input type="hidden" name="lista_bonos" id="lista_bonos" value="{{ $lista_bonos }}">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">N° de Bonos Fisicos</label>
                                                                <input type="number" class="form-control form-control-sm" id="numero_bonos" name="numero_bonos" value="{{ $total_bonos }}" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Copago</label>
                                                                <input type="number" class="form-control form-control-sm" id="copago" name="copago" value="{{ $total_copago }}" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Efectivo</label>
                                                                <input type="number" class="form-control form-control-sm" id="efectivo" name="efectivo" value="{{ $total_efectivo }}" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Otros</label>
                                                                <input type="number" class="form-control form-control-sm" id="otros" name="otros" value="{{ $total_otros }}" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-1">
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                            <div class="form-row">
                                                                <div class="form-group col-12">
                                                                    <!-- [ Main Content ] start -->
                                                                    <div class="dropzone" id="mis-archivos-rendicion" action="{{ route('rendir.archivo.carga') }}">
                                                                    </div>
                                                                    <!-- [ file-upload ] end -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="row">
                                                        <div class="col-12 text-center">
                                                            <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja();" id="btn_rendicion_caja_diaria">Rendir Caja</button>
                                                        </div>
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
                                                                            @elseif($value_b->id_clase_bono == 7)
                                                                                Copago
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

                                        {{-- PESTAÑA RENDICION DE RENDICION --}}
                                        <div class="tab-pane fade" role="tabpanel" aria-labelledby="pills-profile-tab" id="rendicion_rendicion">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Cierres de Cajas {{ date('d-m-Y') }}</h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <input type="hidden" name="lista_rendiciones" id="lista_rendiciones" value="{{ $lista_rendiciones }}">
                                                <input type="hidden" name="total_rendiciones" id="total_rendiciones" value="{{ $total_rendiciones }}">
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Número de Bonos</label>
                                                        <input type="number" class="form-control form-control-sm" id="numero_bonos_rendiciones" name="numero_bonos_rendiciones" value="{{ $total_bonos_rendiciones  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Efectivo</label>
                                                        <input type="number" class="form-control form-control-sm" id="efectivo_rendiciones" name="efectivo_rendiciones" value="{{ $total_efectivo_rendicion  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Otros</label>
                                                        <input type="number" class="form-control form-control-sm" id="otros_rendiciones" name="otros_rendiciones" value="{{ $total_otros_rendicion  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Total Documentos</label>
                                                        <input type="number" class="form-control form-control-sm" id="total_documentos_rendiciones" name="total_documentos_rendiciones" value="{{ $total_documentos_rendiciones  }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Recibe Caja :</label>
                                                        <select name="id_asistente_receptor_rendiciones" id="id_asistente_receptor_rendiciones" class="form-control form-control-sm">
                                                            @if($listado_recibe)
                                                                @foreach ( $listado_recibe as $recibe )
                                                                    <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombres.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-info" onclick="rendir_cierre();" id="btn_rendicion_cierre_dia">Cierres de Cajas</button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <table id="tabla_rendir_rendiciones" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">ID REND</th>
                                                                <th class="text-center align-middle">Asistente</th>
                                                                <th class="text-center align-middle">Receptor</th>
                                                                <th class="text-center align-middle">F/Recepción</th>
                                                                <th class="text-center align-middle">Bonos</th>
                                                                <th class="text-center align-middle">Efectivo</th>
                                                                <th class="text-center align-middle">Otros</th>
                                                                <th class="text-center align-middle">T. Doc.</th>
                                                                <th class="text-center align-middle">T. Doc Adj.</th>
                                                                <th class="text-center align-middle">Detalle</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if( isset($rendiciones) )
                                                                @foreach($rendiciones as $key_r => $value_r)
                                                                    <tr >
                                                                        <td class="align-middle text-center">{{ $value_r->id }}</td>
                                                                        <td class="align-middle text-center">
                                                                            <span>{{ $value_r->Asistente()->first()->nombres }} {{ $value_r->Asistente()->first()->apellido_uno }} {{ $value_r->Asistente()->first()->apellido_dos }}</span><br>
                                                                            <span>{{ $value_r->Asistente()->first()->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->nombres }} {{ $value_r->AsistenteReceptor()->first()->apellido_uno }} {{ $value_r->AsistenteReceptor()->first()->apellido_dos }}</span><br>
                                                                            <span>{{ $value_r->AsistenteReceptor()->first()->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle text-center">{{ $value_r->fecha_rendicion }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_bono }}</td>
                                                                        <td class="align-middle text-center">${{ number_format($value_r->total_efectivo, 0, ",", ".") }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_otros }}</td>
                                                                        <td class="align-middle text-center">{{ $value_r->total_documentos }}</td>
                                                                        <td class="align-middle text-center">
                                                                            <div>
                                                                                <button  class="btn btn-block btn-sm btn-info" onclick="ver_archivos('{{ $value_r->id }}');">Ver</button>
                                                                                <div style=" background-color: red; border-radius: 90px; width: 25px; height: 25px; padding: 5px; color: white; font-weight: bold; position: relative; top: -40px;">{{ $value_r->cantidad_archivos }}</div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="align-middle text-center"><button  class="btn btn-block btn-sm btn-info" onclick="ver_datalle_rendicion('{{ $value_r->id }}');">Ver</button></td>
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
</div>

    <!--Cierre: Container Completo-->

@endsection

@section('modales')
    @include('app.asistente_cm.modales.modal_rendicion_caja_diaria')
    @include('app.asistente_cm.modales.modal_rendicion_cierre_dia')
    @include('app.asistente_cm.modales.modal_detalle_rendicion')
    @include('app.asistente_cm.modales.modal_detalle_rendicion_archivo')
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
            $('#tabla_rendir_rendiciones').DataTable({
                responsive: true,
            });
        });

        // function seleccionar_bonos_rendicion(){
        //     var estado  = $('#enviar_todos').is(':checked')
        //     $("input:checkbox").each(function() {
        //         if($(this).attr('id') != 'enviar_todos')
        //         {
        //             if(estado != $(this).is(':checked'))
        //             {
        //                 $(this).trigger('click');
        //             }
        //         }
        //     });
        // }

        function cargar_flujo_caja()
        {
            var fecha = '{{ date("Y-m-d") }}';
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
                        archivos : $('#input_lista_archivo').val(),
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
                                    $('#input_lista_archivo').html('');
                                    myDropzone_rendicion.removeAllFiles();

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
                let url = "{{ route('asistentejcm.rendicion_carga_bonos') }}";

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

        /** cierre de dia */
        function cargar_registros_cierre()
        {
                let url = "{{ route('asistentejcm.rendicion_carga_rendiciones') }}";
                $('#tabla_rendir_rendiciones tbody').html('');
                $.ajax({
                        url: url,
                        type: "GET",
                        data: {},
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            // $('#lista_rendiciones').val(data.lista_rendiciones);
                            $('#total_rendiciones').val(data.total_rendiciones);
                            $('#numero_bonos_rendiciones').val(data.total_bonos);
                            $('#efectivo_rendiciones').val(data.total_efectivo);
                            $('#otros_rendiciones').val(data.total_otros);
                            $('#total_documentos_rendiciones').val(data.total_documentos);


                            var lista_rendiciones = '';
                            var lista_rendiciones = '';
                            $('#tabla_rendir_rendiciones tbody').html('');
                            $(data.rendiciones).each(function(index, value) {
                                var html = '';
                                html +='<tr >';
                                html +='    <td class="align-middle text-center">'+value.id+'</td>';
                                html +='    <td class="align-middle text-center">';
                                html +='        <span>'+value.asistente.nombres+' '+value.asistente.apellido_uno+' '+value.asistente.apellido_dos+'</span><br>';
                                html +='        <span>'+value.asistente.rut+'</span>';
                                html +='    </td>';
                                html +='    <td class="align-middle text-center">';
                                html +='        <span>'+value.asistente_receptor.nombres+' '+value.asistente_receptor.apellido_uno+' '+value.asistente_receptor.apellido_dos+'</span><br>';
                                html +='        <span>'+value.asistente_receptor.rut+'</span>';
                                html +='    </td>';
                                html +='    <td class="align-middle text-center">'+value.fecha_rendicion+'</td>';
                                html +='    <td class="align-middle text-center">'+value.total_bono+'</td>';
                                html +='    <td class="align-middle text-center">$'+value.total_efectivo+'</td>';
                                html +='    <td class="align-middle text-center">'+value.total_otros+'</td>';
                                html +='    <td class="align-middle text-center">'+value.total_documentos+'</td>';
                                html +='    <td class="align-middle text-center">';
                                html +='        <button  class="btn btn-block btn-sm btn-info" onclick="ver_archivos(\''+value.id+'\');">Ver</button>';
                                html +='        <div>'+value.cantidad_archivos+'</div>';
                                html +='    </td>';
                                html +='    <td class="align-middle text-center"><button  class="btn btn-block btn-sm btn-info" onclick="ver_datalle_rendicion(\''+value.id+'\');">Ver</button></td>';
                                html +='</tr>';

                                $('#tabla_rendir_rendiciones tbody').append(html);
                                lista_rendiciones +='|'+value.id+'' ;
                            });

                            $('#tabla_rendir_rendiciones').DataTable().destroy();
                            $('#tabla_rendir_rendiciones').DataTable({
                                responsive: true,
                            });

                            $('#lista_rendiciones').val(data.lista_rendiciones)

                        }
                        else
                        {
                            swal({
                                title: "Problemas al cargar rendiciones del día",
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

        function rendir_cierre()
        {
            let url = "{{ route('asistentejcm.solicitar_rendir_cierre_dia') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        rendiciones : $('#lista_rendiciones').val(),
                        id_asistente_receptor : $('#id_asistente_receptor_rendiciones').val(),
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#cierre_numero_cierre_hidde').val(data.last_id);
                        $('#cierre_numero_cierre').html(data.last_id);
                        $('#cierre_total_rendiciones').html(data.registro.total_rendiciones);
                        $('#cierre_total_documento').html(data.registro.total_documentos);
                        $('#cierre_total_bonos').html(data.registro.total_bono);
                        $('#cierre_total_efectivo').html(data.registro.total_efectivo);
                        $('#cierre_total_otros').html(data.registro.total_otros);

                        $('#aprobacion_cierre_dia').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                        $('#rendicion_cierre_dia').modal('show',{backdrop: 'static', keyboard: false});

                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_cierre();
                    }
                    else
                    {
                        swal({
                            title: "Solicitud de Rendicion de Cierres de Cajas con Problema",
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

        function cerrarModalCierreDia()
        {
            swal({
                title: "Rendición Cierre de Caja.",
                text: 'Al "Aceptar" cierra la ventana sin Esperar Aprobación del receptor.',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                } else {

                    $('#rendicion_cierre_dia').modal('hide');
                }
            });
        }

        function validar_cierre()
        {
            console.log('------------------------------------');
            console.log('validar_cierre');
            console.log('------------------------------------');
            $('#cierre_aprobacion_tiempo').html(''+tiempo+' minutos');
            if(tiempo > 0 && conteo_activo == 1)
            {
                setTimeout(function(){
                    tiempo = tiempo-1;
                    $('#cierre_aprobacion_tiempo').html(''+tiempo+' minutos');
                    var value_validacion = 0;

                    var id_cierre = $('#cierre_numero_cierre_hidde').val()
                    let url = "{{ route('asistentejcm.cierre_dia_validar_autorizacion') }}";

                    $.ajax({
                            url: url,
                            type: "POST",
                            data: {
                                _token: CSRF_TOKEN,
                                id_cierre : id_cierre,
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
                                    $('#cierre_numero_cierre_hidde').val('');
                                    $('#cierre_numero_cierre').val('');
                                    $('#cierre_total_rendiciones').val('');
                                    $('#cierre_total_documento').val('');
                                    $('#cierre_total_bonos').val('');
                                    $('#cierre_total_efectivo').val('');
                                    $('#cierre_total_otros').val('');

                                    $('#aprobacion_cierre_dia').html('En Espera de Aprobación <span id="cierre_aprobacion_tiempo"></span>');
                                    $('#rendicion_cierre_dia').modal('hide');

                                    tiempo = 0;
                                    conteo_activo = 0;

                                    if(data.registro.estado == 1)
                                    {
                                        swal({
                                            title: "Solicitud de Cierres de Cajas.",
                                            text: "Cierre Aceptada conforme",
                                            icon: "success",
                                            buttons: "Aceptar",
                                            // DangerMode: true,
                                        });

                                        console.log('confirmado');
                                        value_validacion = 1;
                                        cargar_registros_cierre();
                                        return false;
                                    }
                                    else if(data.registro.estado == 2)
                                    {
                                        swal({
                                            title: "Solicitud de Cierres de Cajas.",
                                            text: "Autorizaión Vencida",
                                            icon: "success",
                                            buttons: "Aceptar",
                                            // DangerMode: true,
                                        });
                                    }
                                    else if(data.registro.estado == 3)
                                    {
                                        swal({
                                            title: "Solicitud de Cierres de Cajas.",
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
                                    title: "Solicitud de Cierres de Caja con Problema",
                                    text: data.msj,
                                    icon: "error",
                                    buttons: "Aceptar",
                                    // DangerMode: true,
                                });
                            }

                            validar_cierre(tiempo);
                            if(tiempo == 8)
                            {
                                swal({
                                    title: "Solicitud de Cierres de Caja",
                                    text: 'El tiempo para Autorizar Cierres de Cajas esta por finalizar, Desea continuar presione el botón "Más Tiempo", si "Acepta" el Cierre de Cajas quedará Anulada y debera realizarla de nuevo.',
                                    icon: "warning",
                                    buttons: ["Aceptar", 'Más Tiempo'],
                                }).then((result) => {
                                    if (result == true)
                                    {
                                        reiniciar_cierre_dia( $('#cierre_numero_cierre_hidde').val());
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
                desistir_cierre_dia();
            }
        }

        function reiniciar_cierre_dia(id_cierre)
        {
            let url = "{{ route('asistentejcm.cierre_dia_extender_validacion') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id_cierre : id_cierre
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_cierre();
                    }
                    else
                    {
                        swal({
                            title: "Falla Solicitud de Cierres de Caja Desistida",
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

        function desistir_cierre_dia()
        {
            var id_cierre = $('#cierre_numero_cierre_hidde').val();

            let url = "{{ route('asistentejcm.cierre_dia_desistir') }}";

            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id_cierre : id_cierre
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#cierre_numero_cierre_hidde').val('');
                        $('#cierre_numero_cierre').val('');
                        $('#cierre_total_rendiciones').val('');
                        $('#cierre_total_documento').val('');
                        $('#cierre_total_bonos').val('');
                        $('#cierre_total_efectivo').val('');
                        $('#cierre_total_otros').val('');


                        $('#aprobacion_cierre_dia').html('En Espera de Aprobación <span id="cierre_aprobacion_tiempo"></span>');
                        $('#rendicion_cierre_dia').modal('hide');

                        tiempo = 0;
                        conteo_activo = 0;

                        swal({
                            title: "Solicitud de Cierres de Caja.",
                            text: "Codigo no recibido a tiempo",
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }
                    else
                    {
                        swal({
                            title: "Falla Solicitud de Cierres de Cajas, Autorizacion no recibido a tiempo",
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



        /** MANEJO DE ARCHIVO */
        // mis-archivos-rendicion
        var myDropzone_rendicion ;
        Dropzone.options.misArchivosRendicion = {
            init:function()
            {
                myDropzone_rendicion = this;
            },
            url: "{{ route('rendir.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/csv",
            maxFilesize: 4,
            maxFiles: 6,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo(myDropzone_rendicion,'rendicion');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_archivo(myDropzone_rendicion,'rendicion');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo(myDropzone_rendicion,'rendicion');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };

        var lista_archivo = {};
        function cargar_lista_archivo(obj_dropzone, alias_archivo)
        {
            // console.log('--------------cargar_lista_archivo----------------------');
            lista_archivo = [];
            let temp  = obj_dropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined)
                    {
                        var archivo_temp = JSON.parse(value.xhr.response);
                        lista_archivo[index] = [
                            url = archivo_temp.archivo.url,
                            nombre_original = archivo_temp.archivo.original_file_name,
                            nombre_archivo = archivo_temp.archivo.nombre_archivo,
                            file_extension = archivo_temp.archivo.file_extension,
                        ];
                        $('#input_lista_archivo').val('');
                        $('#input_lista_archivo').val(JSON.stringify(lista_archivo));
                    }
                }
            });
        }

    </script>

@endsection

