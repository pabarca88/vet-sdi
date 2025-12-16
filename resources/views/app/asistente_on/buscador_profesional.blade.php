@extends('template.asistente_on.template')
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
                            <h5 class="m-b-10 font-weight-bold">Reservar Hora Médica</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('asistentecm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('asistentecm.reservar_hora') }}">Reservar Hora Médica</a>
                            </li>
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
                    <div class="card-header text-white bg-light">
                        <h4 class="f-20 text-c-blue text-center mb-0">Reserve su hora médica</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3 justify-content-center" id="Buscadores" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(Session::has('view')) @if(Session::get('view') == 1) active @endif @else active  @endif text-uppercase" id="buscar_especialidad-tab" data-toggle="tab"
                                    href="#buscar_especialidad" role="tab" aria-controls="home"
                                    aria-selected="true">Especialidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Session::has('view') && Session::get('view') == 2 ) active @endif text-uppercase" id="buscar_profesional-tab" data-toggle="tab"
                                    href="#buscar_profesional" role="tab" aria-controls="buscar_profesional"
                                    aria-selected="false">Profesional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Session::has('view') && Session::get('view') == 3 ) active @endif text-uppercase" id="buscar_videoconsulta-tab" data-toggle="tab"
                                    href="#buscar_videoconsulta" role="tab" aria-controls="buscar_videoconsulta"
                                    aria-selected="false">Videoconsulta</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="BuscadoresContent">
                            <div class="tab-pane fade @if(Session::has('view')) @if(Session::get('view') == 1) show active @endif @else show active  @endif" id="buscar_especialidad" role="tabpanel"
                                aria-labelledby="buscar_especialidad-tab">
                                <form id="buscador_especialidad" action="{{ ROUTE('asistentecm.getEspecialidad') }}" method="GET">
                                    <input type="hidden" name="view" value="1">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por especialidad</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Especialidad</label>
                                                <input type="text" class="form-control @error('especialidad_profesional') is-invalid @enderror" 
                                                    name="especialidad_profesional" id="especialidad_profesional" value="{{ old('especialidad_profesional') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Convenio</label>
                                                <select id="convenios" name="convenios" 
                                                    class="form-control @error('convenios') is-invalid @enderror" value="{{ old('convenios') }}">
                                                    <option value="S">Seleccione una opción</option>
                                                    <option value="Particular">Particular</option>
                                                    <option value="Fonasa">Fonasa</option>
                                                    <option value="Banmédica">Banmédica</option>
                                                    <option value="Colmena">Colmena</option>
                                                    <option value="Cruz blanca">Cruz blanca</option>
                                                    <option value="Nueva MasVida">Nueva MasVida</option>
                                                    <option value="Vida tres">Vida tres</option>
                                                    <option value="Consalud">Consalud</option>
                                                    <option value="Control sin costo">Control sin costo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Región / Comuna</label>
                                                <select id="comuna_paciente" name="comuna_paciente" 
                                                    class="form-control @error('comuna_paciente') is-invalid @enderror" value="{{ old('comuna_paciente') }}">>
                                                    <option value="S">Seleccione una opción</option>
                                                    <optgroup label="Valparaíso">
                                                        <option value="Viña del Mar">Viña del Mar</option>
                                                        <option value="La Calera">La Calera</option>
                                                        <option value="Valparaíso">Valparaíso</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para los próximos 7 días</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                    <label for="registro_alternativo_paciente2" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para las próximas 24 horas</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button class="btn btn-info" type="submit">Buscar hora</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade @if(Session::has('view') && Session::get('view') == 2 ) show active @endif" id="buscar_profesional" role="tabpanel"
                                aria-labelledby="buscar_profesional-tab">
                                <form id="buscador_profesional" action="{{ ROUTE('asistentecm.getProfesional') }}" method="GET">
                                    <input type="hidden" name="view" value="2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por profesional</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label">Nombre o Rut del profesional</label>
                                                <input type="text" class="form-control @error('nombrerut_profesional') is-invalid @enderror" 
                                                    name="nombrerut_profesional" id="nombrerut_profesional">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label">Región / Comuna</label>
                                                <select id="comuna_paciente2" name="comuna_paciente2"
                                                    class="form-control @error('comuna_paciente2') is-invalid @enderror">
                                                    <option value="S" >Seleccione una opción</option>
                                                    <optgroup label="Valparaíso">
                                                        <option value="Viña del Mar">Viña del Mar</option>
                                                        <option value="La Calera">La Calera</option>
                                                        <option value="Valparaíso">Valparaíso</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente"
                                                        checked="">
                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para los próximos 7 días</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                    <label for="registro_alternativo_paciente2" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para las próximas 24 horas</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button class="btn btn-info" type="submit">Buscar hora</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade @if(Session::has('view') && Session::get('view') == 3 ) show active @endif" id="buscar_videoconsulta" role="tabpanel"
                                aria-labelledby="buscar_videoconsulta-tab">
                                <form id="buscador_videoconsulta" action="{{ ROUTE('asistentecm.getVideoConsulta') }}" method="GET">
                                    <input type="hidden" name="view" value="3">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar hora por videoconsulta</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Especialidad</label>
                                                <input type="text" class="form-control @error('especialidad_profesional3') is-invalid @enderror" 
                                                    name="especialidad_profesional3" id="especialidad_profesional3" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Convenio</label>
                                                <select id="convenios3" name="convenios3" class="form-control @error('convenios3') is-invalid @enderror">
                                                    <option value="S">Seleccione una opción</option>
                                                    <option value="Particular">Particular</option>
                                                    <option value="Fonasa">Fonasa</option>
                                                    <option value="Banmédica">Banmédica</option>
                                                    <option value="Colmena">Colmena</option>
                                                    <option value="Cruz blanca">Cruz blanca</option>
                                                    <option value="Nueva MasVida">Nueva MasVida</option>
                                                    <option value="Vida tres">Vida tres</option>
                                                    <option value="Consalud">Consalud </option>
                                                    <option value="Control sin costo">Control sin costo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label">Región / Comuna</label>
                                                <select id="comuna_paciente3" name="comuna_paciente3"
                                                    class="form-control @error('comuna_paciente3') is-invalid @enderror">
                                                    <option value="S">Seleccione una opción</option>
                                                    <optgroup label="Valparaíso">
                                                        <option value="Viña del Mar">Viña del Mar</option>
                                                        <option value="La Calera">La Calera</option>
                                                        <option value="Valparaíso">Valparaíso</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente"
                                                        checked="">
                                                    <label for="registro_alternativo_paciente" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para los próximos 7 días</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="registro_alternativo_paciente2" checked="">
                                                    <label for="registro_alternativo_paciente2" class="cr"></label>
                                                </div>
                                                <label>Buscar horas para las próximas 24 horas</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button class="btn btn-info" type="submit">Buscar hora</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($profesional))
        <div class="row">
            @foreach ($profesional as $p )
                <!--Card Tomar Hora Perfil Médico -->
                <div class="col-md-4">
                    <div class="card user-card user-card-1 mt-4">
                        <div class="card-body pt-0">
                            <div class="user-about-block text-center">
                                <div class="row align-items-end">
                                    <div class="col"><img class="img-radius img-fluid wid-70"
                                            src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Nombre del Médico">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#!" data-toggle="modal" data-target="#modal-report">
                                    <span class="badge badge-primary mt-2">{{ $p->Especialidad()->first()->nombre }}</span>
                                    <h5 class="mb-1 mt-2">{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</h5>
                                </a>
                                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora 27/08/2021</p>
                                <a class="btn btn-sm btn-info" href="#" role="button">Ver Agenda</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: Card Tomar Hora Perfil Médico -->
            @endforeach
        </div>
        @endif
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection
