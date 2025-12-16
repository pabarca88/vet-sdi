@extends('template.laboratorio.laboratorio_asistente_subir_ex.template')

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
                        <h5 class="m-b-10 font-weight-bold">Escritorio Asistente Laboratorio exx</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_asistente_laboratorio.php">Mi Escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
        <!--Botones superiores-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck m-b-30">
                    <div class="card subir">
                        <a href="{{ ROUTE('lab.exa.asistente.agenda_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-2">Agenda</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('lab.exa.asistente.orden_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/examen-medico.svg') }}">
                                <h5 class="mt-2">Orden de exámenes</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('lab.exa.asistente.cotizar_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Cotización de exámenes</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card subir">
                        <a href="{{ ROUTE('lab.exa.asistente.pacientes_laboratorio') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-2">Pacientes</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabla agenda del día y resultado de exámenes-->
            <div class="row m-b-30">
                {{-- <div class="col-md-8"> --}}
                    {{-- <div class="card h-100 pb-0"> --}}
                        {{-- <div class="card-header bg-c-info"> --}}
                            {{-- <div class="row"> --}}
                                {{-- <div class="col-sm-8 d-inline text-left"> --}}
                                    {{-- <h5 class="text-white my-2" style="font-size: 1.0rem;">Pacientes esperando atención</h5> --}}
                                {{-- </div> --}}
                                {{-- <div class="col-sm-4 d-inline text-right"> --}}
                                    {{-- <input type="date" class="form-control form-control-sm" id="date"> --}}
                                {{-- </div> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                        {{-- <div class="card-body pt-4 pb-0"> --}}
                            {{-- <div class="dt-responsive table-responsive" style="height:247px;"> --}}
                                {{-- <table id="ingreso_atencion" class="table table-striped table-bordered nowrap table-xs"> --}}
                                    {{-- <thead> --}}
                                        {{-- <tr> --}}
                                            {{-- <th class="text-center align-middle">Paciente</th> --}}
                                            {{-- <th class="text-center align-middle">Atención</th> --}}
                                        {{-- </tr> --}}
                                    {{-- </thead> --}}
                                    {{-- <tbody> --}}
                                        {{-- <tr> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Pepita sanchez </strong></span><br> --}}
                                                {{-- <span>2783783-9</span> --}}
                                            {{-- </td> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Box 5</strong></span><br> --}}
                                                {{-- <span class="badge badge-success">Turno de atención</span> --}}
                                            {{-- </td> --}}
                                        {{-- </tr> --}}
                                        {{-- <tr> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Alejandro silva </strong></span><br> --}}
                                                {{-- <span>2783783-9</span> --}}
                                            {{-- </td> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Box 2</strong></span><br> --}}
                                                {{-- <span class="badge badge-success">Turno de atención</span> --}}
                                            {{-- </td> --}}
                                        {{-- </tr> --}}
                                        {{-- <tr> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Carlos silva </strong></span><br> --}}
                                                {{-- <span>2783783-9</span> --}}
                                            {{-- </td> --}}
                                            {{-- <td class="text-center align-middle"> --}}
                                                {{-- <span><strong>Box 6</strong></span><br> --}}
                                                {{-- <span class="badge badge-success">Turno de atención</span> --}}
                                            {{-- </td> --}}
                                        {{-- </tr> --}}
                                    {{-- </tbody> --}}
                                {{-- </table> --}}
                            {{-- </div> --}}
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
                <div class="col-md-12">
                    <div class="card subir text-center h-100">
                        <a href="{{ ROUTE('lab.exa.asistente.cargar_resultados_examenes_laboratorio') }}" class="btn">
						    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}" alt="Inscripciones" style="width: 50%; margin: auto;">
                            <div class="card-body">
                                <h4 class="card-title f-20 pt-3">Resultado de exámenes</h4>
                                <p class="card-text">Acceda a los resultados de los exámenes de los pacientes</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <!--Botones-->
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck">
                    <div class="card social-widget-card bg-c-info opacidad px-0">
                        <a href="https://www.cronicos.cl/" class="btn" type="button">
                        <div class="card-body">
							<img class="wid-30 mb-3 text-center" src="{{ asset('images/iconos/cronicos.svg') }}">
                            <h5 class="my-auto text-white">Portal Crónicos</h5>
                        </div>
                        </a>
                    </div>
                    <div class="card social-widget-card bg-c-info opacidad px-0">
                        <a href="#.php" class="btn" type="button">
                        <div class="card-body">
							 <img class="wid-30 mb-3" src="{{ asset('images/iconos/flujo_caja_3.svg') }}">
                            <h5 class="my-auto text-white">Flujo de Caja</h5>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Botones-->
    </div>
</div>
@endsection
