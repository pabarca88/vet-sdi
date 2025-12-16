@extends('template.laboratorio.laboratorio_profesional.template')
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
                            <h5 class="m-b-10 font-weight-bold">Procesos</h5>
                        </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_profesional_laboratorio.php"data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="procesos_laboratorio.php">Procesos</a></li>
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
                            <a href="{{ ROUTE('app.laboratorio.lab_profesional.solicitud_exam_laboratorio_profesional') }}">
                                <div class="card-body text-center" style="cursor:pointer">
									<img class="wid-60 text-center" src="{{ asset('images/iconos/solicitud_examen.svg') }}">
                                    <h5 class="mt-2">Solicitud de exámenes</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="recepcion_muestras.php">
                                <div class="card-body text-center" style="cursor:pointer">
									<img class="wid-60 text-center" src="{{ asset('images/iconos/recepcion_muestras.svg') }}">
                                    <h5 class="mt-2">Recepción de muestras</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-deck m-b-30">
                        <div class="card subir">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer">
									<img class="wid-60 text-center" src="{{ asset('images/iconos/procesar_solicitud.svg') }}">
                                    <h5 class="mt-2">Procesar solicitud(no está)</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card subir">
                            <a href="{{ ROUTE('app.laboratorio.lab_profesional.resultados') }}">
                                <div class="card-body text-center" style="cursor:pointer">
									<img class="wid-60 text-center" src="{{ asset('images/iconos/resultado_examenes.svg') }}">
                                    <h5 class="mt-2">Resultados de exámenes</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
