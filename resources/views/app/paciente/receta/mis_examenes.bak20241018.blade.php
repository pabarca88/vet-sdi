@extends('template.paciente.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis exámenes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.examen') }}">Mis exámenes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline">Mis exámenes</h4>
                                <button type="button" class="btn btn-info btn-sm float-right d-inline" onclick="subir_ex_pcte();"><i class="feather icon-plus"></i> Subir examen</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabla_examenes_paciente_ro" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nº de Orden</th>
                                    <th>Profesional</th>
                                    <th>Tipo de Examen</th>
                                    <th>Nombre del examen</th>
                                    <th>Comentarios</th>
                                    <th>Estado</th>
                                    <th>Examen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($examenes_especialidad_realizados)
                                    @foreach ($examenes_especialidad_realizados as $exam)
                                        @if ($exam->HoraMedica->id_estado == 6)
                                            <tr>
                                                <td data-sort=" {{ date('Y-m-d', strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}">{{ date('d-m-Y',strtotime($exam->HoraMedica->fecha_realizacion_consulta)) }}</td>
                                                <td>{{ $exam->id }}</td>
                                                <td>{{ $exam->profesional->nombre.' '.$exam->profesional->apellido_uno.' '.$exam->profesional->apellido_dos }}</td>
                                                <td>{{ $exam->nombre }}</td>
                                                <td>
                                                    @if ($exam->SubTipoEspecialidad)
                                                        {{ $exam->SubTipoEspecialidad->nombre }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>-</td>
                                                <td>
                                                    @if ($exam->revisado == 1)
                                                        Revisado
                                                    @else
                                                        No revisado
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success-light-c btn-xxs" onclick="verExamenEspecialidad('{{ $exam->id }}',1);"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                                {{-- RESULTADODE DE EXAMENES LABORATORIO --}}
                                @if ($resultado_examen)
                                    @foreach ( $resultado_examen as $result_ex)
                                        <tr>
                                            <td>{{ date('d-m-Y',strtotime($result_ex->fecha_registro)) }}</td>
                                            <td>{{ $result_ex->id }}</td>
                                            <td>LABORATORIO</td>
                                            <td>
                                                @if ($result_ex->obj_tipo_examen)
                                                    {{ $result_ex->obj_tipo_examen->nombre_examen }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>-</td>
                                            <td>{{ $result_ex->observacion }}</td>
                                            <td>
                                                @if ($result_ex->revisado == 1)
                                                    Revisado
                                                @else
                                                    No revisado
                                                @endif
                                            </td>
                                            <td>
                                                @if ($result_ex->ResultadoExamenArchivo->count()>0)
                                                    <button type="button" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}" onclick="verResultadoExamen('{{ $result_ex->id }}',1);"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                @else
                                                    <button type="button" disabled="disabled" class="btn btn-success-light-c btn-xxs" id="btn_verResultadoExamen_{{ $result_ex->id }}"><i class="feather icon-file-plus"></i> Ver examen</button>
                                                @endif
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

<!--Modal-->
<div id="ex-pcte" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                   <h5 class="modal-title text-white text-center">Subir exámenes</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm"name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Nº Órden</label>
                            <input type="text" class="form-control form-control-sm"name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Profesional</label>
                            <input type="text" class="form-control form-control-sm"name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Tipo de examen</label>
                            <input type="text" class="form-control form-control-sm"name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <textarea class="form-control form-control-sm"name="" id=""></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm">Adjuntar exámen</label>
                            <p class="mt-3">DEJAR UN DROPZONE</p>
                            <!------ DEJAR UN DROPZONE--->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                   <button type="submit" class="btn btn-info"><i class="feather icon-upload"></i> Subir exámen</button>
                </div>
            </div>
       </div>
</div>

<!--Cierre: Container Completo-->

@endsection
@section('page-script')
<script type="text/javascript">
    
function subir_ex_pcte() {
        $('#ex-pcte').modal('show');
    }
    
</script>
<script>
    $(document).ready(function () {
        $('#tabla_examenes_paciente_ro').DataTable({
            responsive: true,
            order: [[0, "desc"]]
        });
    });

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
        }
        else
        {
            swal({
                title: "Ver Examen Especialidad",
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
                title: "Ver Resultado de Examen Laboratorio",
                text:"No Se encuentra resultado de examen Laboratorio",
                icon: "error"
            });
        }
    }
</script>
@endsection
