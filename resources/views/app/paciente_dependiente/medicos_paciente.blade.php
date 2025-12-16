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
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.mis_profesionales') }}">Mis Veterinarios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="myTab" role="tablist">
                        @foreach( $lista_especialidad as $le)
                            <li class="nav-item" onclick="active_e('{{$le}}')">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user2-tab" data-toggle="tab" href="#user2" role="tab" aria-controls="user2" aria-selected="false">{{$le}}</a>
                            </li>
                        @endforeach
                            <li class="nav-item" onclick="active_e('all')">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="user2-tab" data-toggle="tab" href="#user2" role="tab" aria-controls="user2" aria-selected="false">VER TODOS</a>
                            </li>
                            <!--<li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user1-tab" data-toggle="tab" href="#todos" role="tab" aria-controls="todos" aria-selected="true">Todos</a>
                                </li>-->
                                <!--
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user2-tab" data-toggle="tab"
                                    href="#user2" role="tab" aria-controls="user2" aria-selected="false">Medicina
                                    General</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user3-tab" data-toggle="tab"
                                    href="#odontologia" role="tab" aria-controls="odontologia"
                                    aria-selected="false">Odontología</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user4-tab" data-toggle="tab"
                                    href="#user4" role="tab" aria-controls="user4" aria-selected="false">Psicología</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="user5-tab" data-toggle="tab"
                                    href="#user5" role="tab" aria-controls="user5" aria-selected="false">Cardiología</a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="myTabContent">
                    <!--Pills Medicina General-->
                    <div class="tab-pane fade active show" id="user2" role="tabpanel" aria-labelledby="user2-tab">
                        <div class="row mb-n4">
                            @if(isset($profesional))
                                @foreach( $profesional as $p)
                                    @if(in_array($p->id, $desvinculados)==false)
                                    <!--Card Tomar Hora Perfil Médico -->
                                    <div class="col-md-4 filtro_le le_{{ $p->Especialidad()->first()->nombre }}">
                                        <div class="card user-card user-card-1 mt-4">
                                            <div class="card-body pt-0">
                                                <div class="user-about-block text-center">
                                                    <div class="row align-items-end">
                                                        <div class="col"></div>
                                                        <div class="col">
                                                            <div class="position-relative d-inline-block">
                                                                <img class="img-radius img-fluid wid-80" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Mis médicos">
                                                            </div>
                                                        </div>
                                                        <div class="col text-right pb-3">
                                                            <div class="dropdown" style="cursor:pointer">
                                                                <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-more-horizontal" data-toggle="tooltip" data-placement="top" title="Opciones"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href='{{ url("Paciente/dependiente/desvincular_profesional/{$paciente->id}/{$paciente->id}/{$p->id}") }}'>Desvincular Veterinario</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#!" data-toggle="modal" data-target="#modal-report">
                                                        <span class="badge badge-purple mt-2">{{ $p->Especialidad()->first()->nombre }}</span>
                                                        <h5 class="mb-1 mt-2">{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</h5>
                                                    </a>
                                                    <p class="mb-3 text-muted">
                                                        <!--<i class="feather icon-calendar"></i></p>-->
                                                    <a class="btn btn-sm btn-info" href='{{ url("Paciente/dependiente/Reservar_Hora/{$paciente->id}/{$p->id_especialidad}/{$p->id_tipo_especialidad}/{$p->id_sub_tipo_especialidad}") }}' role="button"><i class="feather icon-calendar"></i> Agendar Hora</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--CIERRE: Card Tomar Hora Perfil Médico -->
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--Cierre: Pills Medicina General-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection

@section('page-script')
    <script>
        function active_e(tipo_esp){
            if(tipo_esp=='all')
            {
                $('.filtro_le').removeClass('d-none');
            }else{
                $('.filtro_le').addClass('d-none');
                $('.le_'+tipo_esp).removeClass('d-none');
            }
        }
    </script>
@endsection
