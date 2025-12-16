@extends('template.paciente.template')
@section('content')
    <!--**** CIERRE CONTAINER BASE ***-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Controles</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Controles</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ">
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="#" onclick="ctrl_presion();">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/presion.png') }}">
                                <h5 class="mt-1 mb-0">Presión arterial</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="#" onclick="ctrl_glicemia();">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/glicemia.png') }}">
                                <h5 class="mt-1 mb-0">Glicemia</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card subir py-auto">
                        <a href="#" onclick="ctrl_peso();">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/peso.png') }}">
                                <h5 class="mt-1 mb-0">Peso</h5>
                            </div>
                        </a>
                    </div>
                </div>
              <div class="col">
                <div class="card subir py-auto">
                    <a href="#" onclick="ctrl_oxig();">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/oxigeno.png') }}">
                            <h5 class="mt-1 mb-0">Control Oxigeno</h5>
                        </div>
                    </a>
                </div>
              </div>
              <div class="col">
                <div class="card subir py-auto">
                    <a href="#" onclick="ctrl_orina();">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-30 text-center mb-1" src="{{ asset('images/iconos/vol_orina1.png') }}">
                            <h5 class="mt-1 mb-0">Volumen de Orina</h5>
                        </div>
                    </a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!--**** CIERRE CONTAINER BASE ****-->

    @include("app.paciente.modales.control.m_presion_arterial")
	@include("app.paciente.modales.control.m_glicemia")
    @include("app.paciente.modales.control.m_peso")
    @include("app.paciente.modales.control.m_oxigeno")
    @include("app.paciente.modales.control.m_vol_orina")
@endsection
