@extends('template.profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Mis documentos e indicaciones</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('profesional.index_receta_online') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis documentos e indicaciones</a></li>

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
                            <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Mis documentos e indicaciones</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Paciente</th>
                                                <th class="text-center align-middle">Diagnóstico</th>
                                                <th class="text-center align-middle">Tipo</th>
                                                <th class="text-center align-middle">ver documento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($fichas))
                                                @foreach ($fichas as $f)
                                                    @foreach ($f->Recetas()->get() as $r)
                                                        <tr>
                                                            <td class="text-wrap text-center align-middle">
                                                                {{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y') }}
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                {{ $f->Paciente()->first()->nombres }}
                                                                {{ $f->Paciente()->first()->apellido_uno }}
                                                                {{ $f->Paciente()->first()->apellido_dos }}
                                                            </td>
                                                            <td class="align-middle text-center">{{ $f->hipotesis_diagnostico }}
                                                            </td>
                                                            <td class="align-middle text-center">Enviado</td>
                                                            <td class="text-center align-middle">
                                                                <button href="#!" class="btn btn-danger-light-c btn-xxs" data-toggle="modal" data-target="#m_cons_receta"><i class="feather icon-file-plus"></i> Ver </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
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
    <!--Cierre: Container Completo-->
@endsection
@section('page-script')
    <script>
        $(document).ready(function() {
            $('#tabla_recetas_paciente_ro').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
