@extends('template.paciente.template')
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
                                <h5 class="m-b-10 font-weight-bold">Mis recetas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.receta') }}">Mis recetas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Mis recetas</h4>
                        </div>
                        <div class="card-body">
                            <table id="tabla_recetas_paciente_ro" class="display table table-striped  dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Profesional</th>
                                        <th>Receta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($recetas))
                                        @foreach ($recetas as $receta)
                                            <tr>
                                                <td class="text-wrap align-middle" data-sort=" {{ date('Y-m-d', strtotime($receta['created_at'])) }}">
                                                    {{ date('d-m-Y', strtotime($receta['created_at'])) }}
                                                </td>
                                                <td class="align-middle">
                                                    <strong>{{ $receta['profesional']['nombre'] }} {{ $receta['profesional']['apellido_uno'] }} {{ $receta['profesional']['apellido_dos'] }} </strong>
                                                    <br>
                                                    <span style="font-size:9px;">
                                                        {{ $receta['profesional']['TipoEspecialidad']['nombre'] }}
                                                        @if($receta['profesional']['SubTipoEspecialidad']['nombre'])
                                                            - {{ $receta['profesional']['SubTipoEspecialidad']['nombre'] }}
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div onclick="ver_pdf_receta_retenido({{ $receta['id_ficha_atencion'] }}, {{ $receta['id'] }})" class="btn btn-warning-light-c btn-xxs"><i class="feather icon-activity"></i> Ver Receta</div>
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
    <!--Cierre: Container Completo-->
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#tabla_recetas_paciente_ro').DataTable({
                responsive: true,
                order: [[0, "desc"]]
            });
        });

        function ver_pdf_receta_retenido(id_ficha_atencion, id_receta)
        {
            Fancybox.show(
                [
                    {
                        src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion+'&id_receta='+id_receta,
                        type: "iframe",
                        preload: false,
                    },
                ]
            );
        }
    </script>
@endsection
