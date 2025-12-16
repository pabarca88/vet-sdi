@extends('template.direccion_salud.template')

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
                                <h5 class="m-b-10 font-weight-bold">Escritorio Dirección Salud</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Mi escritorio </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
               <div class="row row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-6">
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="{{ route('ministerio.comunicados') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/ministerio/comunicados.png') }}">
                                    <h6 class="mt-1">Envío, comunicados y decretos de difusión</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                             <a href="{{ route('ministerio.ges') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/ministerio/ges.png') }}">
                                    <h6 class="mt-2">GES</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="{{ route('ministerio.enfer_noti_obliga') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/ministerio/eno.png') }}">
                                    <h6 class="mt-1">Enfermedad de Notificacion Obligatoria</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="{{ route('ministerio.control_medicamento') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/ministerio/medicamento-ministerio.png') }}">
                                    <h6 class="mt-1">Control Medicamentos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                             <a href="{{ route('ministerio.control_farmacia') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/ministerio/farmacia-ministerio.png') }}">
                                    <h6 class="mt-1 f-13">Control farmacia</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="{{ route('ministerio.control_licencia') }}">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/certificados-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Control de licencias medicas</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="#">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/certificados-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Subir Base de datos Medicos</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="#">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/certificados-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Manejo Lista de espera</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="card-a subir mb-2 h-100 pt-0 pb-0">
                            <a href="#">
                                <div class="card-body text-center px-2 pt-2 pb-1" style="cursor:pointer">
                                    <img class="wid-50 text-center" src="{{ asset('images/iconos/certificados-ro.svg') }}">
                                    <h6 class="mt-1 f-13">Estadisticas medicamentos <br> de uso crónico</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            <!--Botones-->
               {{-- <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
                 <div class="col mb-1">
                        <div class="card shadow bg-c-info opacidad px-0">
                            <a href="#" class="btn" type="button">
                                <div class="media  align-items-center">
                                    <img class="wid-50" src="{{ asset('images/iconos/cronicos.svg') }}" class="align-items-center mr-5" alt="...">
                                    <div class="media-body">
                                        <h5 class="my-auto text-left text-white ml-3"> Portal Crónicos</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                 <div class="col mb-1">
                        <div class="card shadow-sm bg-c-info opacidad px-0">
                            <a href="{{ route('profesional.flujo_caja') }}" class="btn" type="button">
                                <div class="media  align-items-center">
                                    <img class="wid-50" src="{{ asset('images/iconos/finanzas.png') }}" class="align-items-center mr-5" alt="...">
                                    <div class="media-body">
                                        <h5 class="my-auto text-left text-white ml-3">Flujo de caja</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                 <div class="col mb-1">
                        <div class="card shadow-sm bg-c-info opacidad px-0">
                            <a href="#" class="btn" type="button">
                                <div class="media  align-items-center">
                                    <img class="wid-50" src="{{ asset('images/iconos/otros_servicios.svg') }}" class="align-items-center mr-5" alt="...">
                                    <div class="media-body">
                                        <h5 class="my-auto  text-left text-white ml-3"> Otros servicios</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!--Cierre: Botones-->

        </div>
    </div>
    <!--Cierre: Container Completo-->

@endsection

