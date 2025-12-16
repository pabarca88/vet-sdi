@extends('template.paciente_dependiente.template')
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
                                <h5 class="m-b-10 font-weight-bold">Mis Recetas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo' => $id_dependiente_activo]) }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}">Mis
                                        Recetas</a></li>
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
                                <div class="col-md-12">
                                    <h4 class="text-c-blue f-20 d-inline ml-4 my-1 py-1">Mis Recetas</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha</th>
                                                <th class="text-center align-middle">Profesional</th>
                                                <th class="text-center align-middle">Diagnóstico</th>
                                                <th class="text-center align-middle">Estado</th>
                                                <th class="text-center align-middle">Receta</th>
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
                                                                <strong>{{ $f->Profesional()->first()->nombre }}
                                                                    {{ $f->Profesional()->first()->apellido_uno }}
                                                                    {{ $f->Profesional()->first()->apellido_dos }}
                                                                </strong>
                                                                <br>
                                                                {{ $f->Profesional()->first()->especialidad()->first()->txt_esp }}
                                                            </td>
                                                            <td class="align-middle text-center">{{ $f->diagnostico }}</td>
                                                            <td class="align-middle text-center">Enviado</td>
                                                            <td class="text-center align-middle">
                                                                <button href="#!" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_cons_receta">
                                                                    <i class="feather icon-file-plus"></i> Ver Receta
                                                                </button>
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
