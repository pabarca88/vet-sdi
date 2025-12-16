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
                            <h5 class="m-b-10 font-weight-bold">Mis Licencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta.licencia', ['id_dependiente_activo' => $id_dependiente_activo]) }}">Mis Licencias</a></li>
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
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis Licencias</h4>
                                <!--<button type="button" class="btn btn-success btn-sm d-inline float-right mr-4 my-1" data-toggle="modal" data-target="#agregar_licencia_profesional_ro">
                                        <i class="feather icon-plus"></i> Agregar licencia
                                    </button>-->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_licencia_paciente_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Licencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($fichas))
                                        @foreach ( $fichas as $f )
                                            @foreach ( $f->licencias()->get() as $l)
                                            <tr>
                                                <td class="text-wrap text-center align-middle">{{ \Carbon\Carbon::parse($l->created_at)->format('d/m/Y') }}</td>
                                                <td class="align-middle text-center">
                                                <strong>{{ $f->Profesional()->first()->nombre }} {{ $f->Profesional()->first()->apellido_uno }} {{ $f->Profesional()->first()->apellido_dos }} </strong>
                                                <br>
                                                {{ $f->Profesional()->first()->especialidad()->first()->txt_esp }}</td>
                                                <td class="align-middle text-center">Enviado a Isapre</td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#m_cons_ex"><i class="feather icon-file-plus"></i> Ver
                                                        Licencia</button>
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
    $(document).ready(function () {
        $('#tabla_licencia_paciente_ro').DataTable({
            responsive: true,
        });
    });

</script>
@endsection
