@extends('template.asistente.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Asistente</h5>
                        </div>
                        {{-- <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('asistente.home') }}">Mi Escritorio </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row ">
            <div class="col-md-12">
                @if(Session::has('mensaje'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}</p>
                @endif
            </div>
        </div>
        <!--Módulos-->
        <div class="row mt-n3">
            <div class="col-md-12">
                <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                    <div class="col mb-1">
                    <!--Cierre de Card-->
                        <div class="card  subir py-auto">
                            <a href="{{ ROUTE('asistente.buscar_paciente') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                                    <h6 class="mt-1 mb-0">Buscar pacientes</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-1">
                        <div class="card subir py-auto">
                            <a href="{{ ROUTE('asistente.agenda_por_profesional') }}">
                                <div class="card-body text-center px-0" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                    <h6 class="mt-1 mb-0">Agenda de mis profesionales</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-1">
                        <div class="card subir py-auto">
                            <a href="{{ ROUTE('asistente.flujo_caja') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/flujo_caja.svg') }}">
                                    <h6 class="mt-1 mb-0">Flujo de caja</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-1">
                        <div class="card subir py-auto">
                            {{-- <a href="{{ ROUTE('asistente.cargar_hora_por_confirmar') }}"> --}}
                            <a href="{{ ROUTE('asistente.cargar_hora_confirmar') }}">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/confirmar_hora.png') }}">
                                    <h6 class="mt-1 mb-0">Confirmar horas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CIERRE:-->
        <!--Tabla agenda del día y flujo de caja-->
        <div class="row ">
            <div class="col-md-8">
                <div class="card h-100 pb-0">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 d-inline text-center">
                                <h5 class="text-white my-2" style="font-size: 1.1rem;">Información de mis profesionales</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 pb-0">
                        <div class="dt-responsive table-responsive" style="height:247px;">
                            <table id="simpletable" class="table table-striped table-bordered nowrap table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Profesional</th>
										<th class="text-center align-middle">Ver Información</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $asistente->Profesionales()->get() as $profesional)
                                        <tr>
                                            <td class="text-center align-middle">
                                                <span><strong>{{ $profesional->nombre.' '. $profesional->apellido_uno.' '.$profesional->apellido_dos}}a</strong></span><br>
                                                <span>
                                                    {{ $profesional->TipoEspecialidad()->first()->nombre }} </br>
                                                    @if($profesional->SubTipoEspecialidad()->first())
                                                        {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-info btn-sm" onclick="info_profesional({{ $profesional->id }});"><i class="fa fa-plus"></i> Ver Información</button>
                                            </td>
                                        </tr>
                                    @endforeach()
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card subir text-center h-100">
					<a href="http://www.cronicos.cl/registro.php" target="_blank">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}" alt="Inscripciones" class="btn  btn-arrastre" type="button">
                    <!--<a href="{{ ROUTE('asistente.registro_paciente') }}" class="btn" type="button">-->

					<div class="card-body">
						<h4 class="card-title f-20 pt-3">Inscripción en Crónicos</h4>
						<h6 class="text-dark">Inscriba a Pacientes en Cronicos.cl<br>El paciente obtendrá importantes novedades en el manejo de su Patoloía y en el uso de sus medicamentos.</h6>
					</div>
					</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
@endsection

@section('modals')
    @include('app.asistente.modales.modal_profesional_informacion')
    @include('general.asistentes.modal_consulta_agenda')
@endsection
