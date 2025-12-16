@extends('template.asistente_cm_publico.template')
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
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('asistentecm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('asistentecm.mis_profesionales') }}">Agenda de profesionales de la Institución</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Buscador de pacientes-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="row">
                            <div class="col-md-12 align-botton">
                                <h4 class="text-white f-20 ml-4 mt-2">Agenda de profesionales</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <table id="tabla_profesionales_asistente" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-wrap align-middle">Profesional</th>
                                        <th class="align-middle">Especialidad</th>
                                        <th class="align-middle">Contacto</th>
                                        <th class="align-middle">Agenda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lugares_atencion->Profesionales()->get() as $p)
                                    <tr>
                                        <td class="align-middle">
                                            <strong>
                                                {{ $p->nombre }}
                                                {{ $p->apellido_uno }}
                                                {{ $p->apellido_dos }}
                                            </strong>
                                            <br>
                                            {{ $p->rut }}
                                        </td>
                                        <td class="align-middle">{{ $p->Especialidad()->first()->nombre }}</td>
                                        <td class="align-middle">
                                            {{ $p->email }}
                                            <br>
                                            {{ $p->telefono_uno }}
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-info btn-sm" onclick="info_profesional({{ $p->id }});">
                                                <i class="feather icon-calendar"></i>
                                                Ver Información
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
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

@section('modales')
    @include('app.asistente_cm.modales.modal_profesional_informacion')
@endsection

@section('page-script')
    <script>
    </script>
@endsection

