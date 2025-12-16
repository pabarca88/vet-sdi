<div class="user-profile user-card mt-0 bg-fondo-gris">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="text-c-blue mt-3 f-20 mb-0">Exámenes</h4>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-2" id="pediatria_general" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="bandeja-entrada-tab" data-toggle="tab" href="#bandeja-entrada" role="tab" aria-controls="bandeja-entrada" aria-selected="false">Bandeja de entrada</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-esp-rev-tab" data-toggle="tab" href="#ex-esp-rev" role="tab" aria-controls="ex-esp-rev" aria-selected="false">Examenes especialidad</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-rx-tab" data-toggle="tab" href="#ex-rx" role="tab" aria-controls="ex-rx" aria-selected="false">Exámenes radiológicos</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ex-generales-tab" data-toggle="tab" href="#ex-generales" role="tab" aria-controls="ex-generales" aria-selected="false">Exámenes generales</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="tab-content" id="ped-contenido">
                    <!--BANDEJA DE ENTRADA-->
                    <div class="tab-pane fade show active" id="bandeja-entrada" role="tabpanel" aria-labelledby="bandeja-entrada-tab">
                        <div class="card">
                            <div class="card-top">
                                    <h6>Bandeja de entrada</h6>
                                </div>
                            <div class="card-body pt-2">
                                <div class="dt-responsive table-responsive">
                                    <table id="bandeja_entrada" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="d-none">ID</th>
                                                <th>Fecha</th>
                                                <th>Nombre del examen</th>
                                                {{--  <th>Tipo de Examen</th>  --}}
                                                <th>Examen</th>
                                                <th>Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($examenes_especialidad_realizados))
                                                @foreach ($examenes_especialidad_realizados as $exam)
													@if (!empty($exam->HoraMedica))
														@if ($exam->HoraMedica->id_estado == 6 && $exam->revisado == 0)
															<tr>
                                                                <td class="d-none">{{ $exam->id }}</td>
                                                                <td>{{ $exam->nombre }}</td>
																<td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
																{{--  <td>{{ $exam->nombre }}</td>  --}}
																<td>
																	@if ($exam->SubTipoEspecialidad)
																		{{ $exam->SubTipoEspecialidad->nombre }}
																	@else
																		-
																	@endif
																</td>
																<td>
																	<button type="button" class="btn btn-xxs btn-success-light-c" onclick="verExamenEspecialidad('{{ $exam->id }}',1);"><i class="feather icon-activity"></i> Ver</button>
																</td>
															</tr>
														@endif
													@endif
                                                @endforeach
                                            @endif

                                            {{-- RESULTADODE DE EXAMENES LABORATORIO --}}
                                            @if (isset($resultado_examen))
                                                @foreach ( $resultado_examen as $result_ex)
                                                    @if ($result_ex->revisado == 0)
                                                        <tr>
                                                            <td class="d-none">{{ $result_ex->id }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                            <td>{{ $result_ex->id }}</td>
                                                            {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                            {{--  <td>LABORATORIO</td>  --}}
                                                            <td>
                                                                @if ($result_ex->obj_tipo_examen)
                                                                    {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                    <button type="button" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',1);"><i class="feather icon-activity"></i> Ver</button>
                                                                @else
                                                                    <button type="button" disabled="disabled" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-activity"></i> Ver</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif

                                            {{-- EXAMENES OCTAVO PAR --}}
                                            @if (isset($reg_octavo_par))
                                                @foreach ( $reg_octavo_par as $result_oct_par)
                                                    @if ($result_oct_par->revisado == 0)
                                                        <tr>
                                                            <td class="d-none">{{ $result_oct_par->id }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($result_oct_par->fecha_ex)) }}</td>
                                                            <td>{{ $result_oct_par->id }}</td>
                                                            {{-- <td>{{ $result_oct_par->nombre.' '.$result_oct_par->apellido_paterno.' '.$result_oct_par->apellido_materno }}</td> --}}
                                                            {{--  <td>
                                                                OCTAVO PAR
                                                            </td>  --}}
                                                            <td>
                                                                OCTAVO PAR
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamenOctavoPar_{{ $result_oct_par->id }}" onclick="verResultadoOctavoPar('{{ $result_oct_par->id }}',1);"><i class="feather icon-activity"></i> Ver</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if (isset($reg_exam_rayo))
                                                @foreach ($reg_exam_rayo as $result_rayo )
                                                    @if ($result_rayo->revisado == 0)
                                                        <tr>
                                                            <td class="d-none">{{ $result_rayo->id }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($result_rayo->created_at)) }}</td>
                                                            {{--  <td>{{ $result_rayo->id }}</td>  --}}

                                                            <td>
                                                                @php
                                                                    // echo json_encode($result_rayo);
                                                                @endphp
                                                                {{ $result_rayo->nombre_procedimientos }}
                                                            </td>
                                                            <td>
                                                                RADIOLOGIA
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamenRayo_{{ $result_rayo->id }}" onclick="carga_detalle_rayo('{{ $result_rayo->id }}');"><i class="feather icon-activity"></i> Ver</button>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach


                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EXAMEN ESPECIALIDAD  -->
                    <div class="tab-pane fade" id="ex-esp-rev" role="tabpanel" aria-labelledby="ex-esp-rev-tab">
                        <div class="card">
                            <div class="card-top">
                                    <h6>Exámenes especialidad</h6>
                                </div>
                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="tabla_ex_esp" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Nº de Orden</th>
                                                <th>Nombre del Examen</th>
                                                <th>Tipo de Examen</th>
                                                <th>Examen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($examenes_especialidad_realizados))
                                                @foreach ($examenes_especialidad_realizados as $exam)
													@if (!empty($exam->HoraMedica))
														@if ($exam->HoraMedica->id_estado == 6 && $exam->revisado == 1)
															<tr>
																<td>{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
																<td>{{ $exam->id }}</td>
																<td>{{ $exam->nombre }}</td>
																<td>
																	@if ($exam->SubTipoEspecialidad)
																		{{ $exam->SubTipoEspecialidad->nombre }}
																	@else
																		-
																	@endif
																</td>
																<td>
																	<button type="button" class="btn btn-xxs btn-success-light-c" onclick="verExamenEspecialidad('{{ $exam->id }}',0);"><i class="feather icon-activity"></i> Ver</button>
																</td>
															</tr>
														@endif
													@endif
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--EXÁMENES RADIOLÓGICOS-->
                    <div class="tab-pane fade show" id="ex-rx" role="tabpanel" aria-labelledby="ex-rx-tab">
                       <div class="dt-responsive table-responsive">
                            <div class="card">
                                <div class="card-top">
                                    <h6>Exámenes radiológicos</h6>
                                </div>
                                <div class="card-body">
                                    <table id="exam_radiologicos" class="display table dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Nº de Orden</th>
                                            <th>Nombre del Examen</th>
                                            <th>Tipo de Examen</th>
                                            <th>Examen</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- RESULTADODE DE EXAMENES LABORATORIO RADIOLOGIA--}}
                                            @if (isset($resultado_examen))
                                                @foreach ( $resultado_examen as $result_ex)
                                                    @if ($result_ex->revisado == 1)
                                                        @if ($result_ex->tipo_examen == 354)
                                                            <tr>
                                                                <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                                <td>{{ $result_ex->id }}</td>
                                                                {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                                <td>LABORATORIO</td>
                                                                <td>
                                                                    @if ($result_ex->obj_tipo_examen)
                                                                        {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                        <button type="button" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',0);"><i class="feather icon-activity"></i> Ver examen</button>
                                                                    @else
                                                                        <button type="button" disabled="disabled" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-activity"></i> Ver examen</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if (isset($reg_exam_rayo))
                                                @foreach ($reg_exam_rayo as $result_rayo )
                                                    @if ($result_rayo->revisado == 1)
                                                        <tr>
                                                            <td class="d-none">{{ $result_rayo->id }}</td>
                                                            <td>{{ date('d-m-Y',strtotime($result_rayo->created_at)) }}</td>
                                                             <td>{{ $result_rayo->id }}</td>

                                                            <td>
                                                                @php
                                                                    // echo json_encode($result_rayo);
                                                                @endphp
                                                                {{ $result_rayo->nombre_procedimientos }}
                                                            </td>
                                                            <td>
                                                                RADIOLOGIA
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-xxs btn-success-light-c" id="btn_verResultadoExamenRayo_{{ $result_rayo->id }}" onclick="carga_detalle_rayo('{{ $result_rayo->id }}');"><i class="feather icon-activity"></i> Revisar</button>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach


                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--EXÁMENES GENERALES-->
                    <div class="tab-pane fade show" id="ex-generales" role="tabpanel" aria-labelledby="ex-generales-tab">
                       <div class="dt-responsive table-responsive">
                            <div class="card">
                                <div class="card-top">
                                    <h6>Exámenes generales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="exam_general" class="display table dt-responsive nowrap table-xs align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Nº de Orden</th>
                                                    <th>Nombre del Examen</th>
                                                    <th>Tipo de Examen</th>
                                                    <th>Examen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- RESULTADODE DE EXAMENES LABORATORIO RADIOLOGIA--}}
                                                @if (isset($resultado_examen))
                                                    @foreach ( $resultado_examen as $result_ex)
                                                        @if ($result_ex->revisado == 1)
                                                            @if ($result_ex->tipo_examen != 354)
                                                                <tr>
                                                                    <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                                                    <td>{{ $result_ex->id }}</td>
                                                                    {{-- <td>{{ $result_ex->nombre.' '.$result_ex->apellido_paterno.' '.$result_ex->apellido_materno }}</td> --}}
                                                                    <td>{{ $result_ex->nombre_examen }}</td>
                                                                    <td>
                                                                        @if ($result_ex->obj_tipo_examen)
                                                                            {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                                            <button type="button" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',0);"><i class="feather icon-activity"></i> Ver</button>
                                                                        @else
                                                                            <button type="button" disabled="disabled" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-activity"></i> Ver</button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endif
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

<div id="modal_ver_rayo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_ver_rayo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Examenes Radilógicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_ver_rayo').modal('hide');"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h6 class="mt-2">Fecha del examen <span id="modal_ver_fecha_examan"></span> </h6>
                    </div>
                    <div class="col-12">
                        <h6 class="mt-2">Examen:</h6>
                        <ul id="modal_ver_lista_examen"></ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="modal_ver_rayo_fecha_examen">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_ver_rayo').modal('hide');"><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    {{-- ABRIR ARCHIVOS --}}
    function verExamenEspecialidad(id_examen, cambio_estado)
    {
        if(id_examen != '')
        {
            var data ='id_examen_especialidad='+id_examen+'';
            Fancybox.show(
                [{
                    src: '{{ route("pdf.examen_especialidad") }}?'+data,
                    type: "iframe",
                    preload: false,
                }]
            );

            if(cambio_estado == 1)
            {
                var estado_consulta = $('#rinde_estado_consulta').val();

                let url = "{{ route('pdf.examen.especialidad.revisado') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        id_examen : id_examen
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        console.log('examen revisado');
                        carga_bandeja_entrada();
                        carga_bandeja_revisados();
                        carga_bandeja_radiologia();
                        carga_bandeja_general();
                    }
                    else
                    {
                        console.log('examen no revisado');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        }
        else
        {
            swal({
                title: "Ver examen especialidad",
                text:"No Se encuentra examen",
                icon: "error"
            });
        }
    }

    function verResultadoExamen(id_examen, cambio_estado)
    {
        if(id_examen != '')
        {
            let url = "{{ route('resultado.examen.lab.archivo.ver') }}";
            var archivos = [];
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id : id_examen
                },
            })
            .done(function(data) {

                console.log(data);
                if (data.estado == 1)
                {
                    $.each(data.registros, function (key, value)
                    {
                        var temp_type = 'image';
                        console.log(value.url.indexOf('.pdf'));
                        if(value.url.indexOf('.pdf') != -1)
                        {
                            temp_type = 'iframe';
                        }
                        else
                        {
                            temp_type = 'image';
                        }
                        archivos.push({
                            src: value.url,
                            type: temp_type,
                            preload: false,
                        });
                    });

                    if(archivos.length > 0)
                        Fancybox.show(archivos);

                    if(cambio_estado == 1)
                    {
                        var estado_consulta = $('#rinde_estado_consulta').val();
                        let url = "{{ route('resultado.examen.lab.revisado') }}";
                        $.ajax({

                            url: url,
                            type: "GET",
                            data: {
                                id : id_examen
                            },
                        })
                        .done(function(data) {

                            console.log(data);
                            if (data.estado == 1)
                            {
                                console.log('examen revisado');
                                carga_bandeja_entrada();
                                carga_bandeja_revisados();
                                carga_bandeja_radiologia();
                                carga_bandeja_general();
                            }
                            else
                            {
                                console.log('examen no revisado');
                            }
                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
                    }
                }
                else
                {
                    console.log('examen no revisado');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Ver resultado de examen laboratorio",
                text:"No Se encuentra resultado de examen Laboratorio",
                icon: "error"
            });
        }
    }

    function carga_bandeja_entrada()
    {
        $('#bandeja_entrada tbody').html('');
        carga_bandeja_entrada_examen_especialidad();
        carga_bandeja_entrada_resultado_examen();
    }

    {{-- INICIO BANDEJA DE ENTRADA --}}
    function carga_bandeja_entrada_examen_especialidad()
    {
        let url = "{{ route('examen.especialidad.ver.registros') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 6;
        var revisado = 0;

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.hora_medica.fecha_realizacion_consulta+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>'+value.nombre+'</td>';
                    fila += '    <td>';
                    if (value.sub_tipo_especialidad!='null' && value.sub_tipo_especialidad!=null)
                    {
                        fila += ''+value.sub_tipo_especialidad.nombre+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    fila += '        <button type="button" class="btn btn btn-success-light-cbtn-xxs" onclick="verExamenEspecialidad(\''+value.id+'\', 1);"><i class="feather icon-activity"></i> Ver examen</button>';
                    fila += '    </td>';
                    fila += '</tr>';

                    $('#bandeja_entrada tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carga_bandeja_entrada_resultado_examen()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 0;

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.fecha_registro+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>LABORATORIO</td>';
                    fila += '    <td>';
                    if (value.obj_tipo_examen!='null')
                    {
                        fila += ''+value.obj_tipo_examen.nombre_examen+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    if(value.cantidad > 0)
                        fila += '        <button type="button" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',1);"><i class="feather icon-activity"></i> Ver</button>';
                    else
                        fila += '        <button type="button" disabled="disabled" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-activity"></i> Ver</button>';

                    fila += '    </td>';
                    fila += '</tr>';

                    $('#bandeja_entrada tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
    {{-- FIN BANDEJA DE ENTRADA --}}

    {{-- BANDEJA EXAMENES ESPECIALES --}}
    function carga_bandeja_revisados()
    {
        let url = "{{ route('examen.especialidad.ver.registros') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 6;
        var revisado = 1;

        $('#tabla_ex_esp tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                // $('#tabla_ex_esp tbody').html('');
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '<tr>';
                    fila += '    <td>'+value.hora_medica.fecha_realizacion_consulta+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>'+value.nombre+'</td>';
                    fila += '    <td>';
                    if (value.sub_tipo_especialidad!='null')
                    {
                        fila += ''+value.sub_tipo_especialidad.nombre+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    fila += '        <button type="button" class="btn btn-success-light-c btn-xxs" onclick="verExamenEspecialidad(\''+value.id+'\',0);"><i class="feather icon-activity"></i> Ver</button>';
                    fila += '    </td>';
                    fila += '</tr>';

                    $('#tabla_ex_esp tbody').append(fila);
                });

            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{-- BANDEJA EXAMENES RADIOLOGIA --}}
    function carga_bandeja_radiologia()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 1;
        var tipo_examen = 354;

        $('#exam_radiologicos tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
                tipo_examen : tipo_examen,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $.each(data.registros, function (index, value)
                {
                    var fila = '';
                    fila += '<tr >';
                    fila += '    <td>'+value.fecha_registro+'</td>';
                    fila += '    <td>'+value.id+'</td>';
                    fila += '    <td>LABORATORIO</td>';
                    fila += '    <td>';
                    if (value.obj_tipo_examen!='null')
                    {
                        fila += ''+value.obj_tipo_examen.nombre_examen+'';
                    }
                    else
                    {
                        fila += '-';
                    }
                    fila += '    </td>';
                    fila += '    <td>';
                    if(value.cantidad > 0)
                        fila += '        <button type="button" class="btn btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',0);"><i class="feather icon-file-text"></i> Ver examen</button>';
                    else
                        fila += '        <button type="button" disabled="disabled" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-file-text"></i> Ver examen</button>';

                    fila += '    </td>';
                    fila += '</tr>';

                    $('#exam_radiologicos tbody').append(fila);
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    {{-- BANDEJA EXAMENES GENERALES --}}
    function carga_bandeja_general()
    {
        let url = "{{ route('resultado.examen.ver') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var estado = 1;
        var revisado = 1;

        $('#exam_general tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_estado : estado,
                revisado : revisado,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $.each(data.registros, function (index, value)
                {
                    if(value.tipo_examen != 354)
                    {
                        var fila = '';
                        fila += '<tr >';
                        fila += '    <td>'+value.fecha_registro+'</td>';
                        fila += '    <td>'+value.id+'</td>';
                        fila += '    <td>LABORATORIO</td>';
                        fila += '    <td>';
                        if (value.obj_tipo_examen!='null')
                        {
                            fila += ''+value.obj_tipo_examen.nombre_examen+'';
                        }
                        else
                        {
                            fila += '-';
                        }
                        fila += '    </td>';
                        fila += '    <td>';
                        if(value.cantidad > 0)
                            fila += '        <button type="button" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'" onclick="verResultadoExamen(\''+value.id+'\',0);"><i class="feather icon-file-text"></i> Ver examen</button>';
                        else
                            fila += '        <button type="button" disabled="disabled" class="btn btn btn-primary-light btn-xs" id="btn_verResultadoExamen_'+value.id+'"><i class="feather icon-file-text"></i> Ver examen</button>';

                        fila += '    </td>';
                        fila += '</tr>';

                        $('#exam_general tbody').append(fila);
                    }
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carga_detalle_rayo(id)
    {
        $('#modal_ver_rayo').modal('show');
        let url = "{{ route('resultado.rayo.ver') }}";

        $('#modal_ver_rayo_fecha_examen').html('');
        $('#modal_ver_fecha_examan').html('');
        $('#modal_ver_lista_examen').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id : id,
            },
        })
        .done(function(data) {

            console.log(data);
            if (data.estado == 1)
            {
                $('#modal_ver_fecha_examan').html(data.fecha_examen);
                $('#modal_ver_lista_examen').html(data.lista_nombre_examnes);

                /** INICIO CARGA DE ARCHIVOS */
                var html = '';
                /** INFORM */
                if(data.registros.estado_informe == 1)
                {
                    // Primero crea la URL base y luego añade el token
                    var url_base = '{{ route("rayos.ver.informe.rayos", ["t" => "TOKEN"]) }}';
                    var url_pdf = url_base.replace('TOKEN', data.registros.token);

                    html += '<a href="'+url_pdf+'" target="_blank">';
                    html += '<div class="pdf-icon-container" style="width:200px;height:150px;display:flex;justify-content:center;background:#f5f5f5;flex-direction: column;flex-wrap: nowrap;align-content: center;align-items: center;"><i class="fas fa-file-pdf" style="font-size:48px;color:#e74c3c;"></i><div style="color: #000;">Informe</div></div>';
                    html += '</a>';
                }

                /** IMAGEN O PDF */
                if(data.registros.estado_archivo == 1)
                {
                    html += '<div class="gallery">';
                    html += '' +
                        $.map(data.lista_imagenes, function(value, index) {
                            var extension = value.split('.').pop().toLowerCase();
                            var esPDF = extension === 'pdf';

                            var contenido = esPDF?
                                '<div class="pdf-icon-container" style="width:200px;height:150px;display:flex;align-items:center;justify-content:center;background:#f5f5f5;"><i class="fas fa-file-pdf" style="font-size:48px;color:#e74c3c;"></i></div>'
                                : '<img src="'+value+'" alt="" style="width: 200px;">';

                            if (esPDF) {
                                return '<a href="' + value + '" target="_blank" data-caption="Documento PDF ' + (index + 1) + '">' +
                                    contenido +
                                '</a>';
                            } else {
                                return '<a href="' + value + '" data-fancybox="gallery" data-caption="Imagen ' + (index + 1) + '">' +
                                    '<img src="' + value + '" alt="" style="width: 200px;">' +
                                '</a>';
                            }
                        }).join('') +
                        '</div>';


                }

                $('#modal_ver_rayo_fecha_examen').html(html);
                /** FIN CARGA DE ARCHIVOS */

            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>

{{--  <script>
    $(document).ready(function() {
        $('#bandeja_entrada').DataTable({
            responsive: true,
            order: [[0, 'desc']]
        });
    });
</script>  --}}

<style>
    .fancybox__container
    {
        z-index: 2031;
    }
</style>
