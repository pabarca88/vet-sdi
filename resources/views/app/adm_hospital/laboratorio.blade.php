@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Laboratorios del centro médico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}"" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.laboratorio') }}">Laboratorio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.laboratorio_agregar') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/laboratorio_1.svg') }}">
                                <h5 class="mt-2">Laboratorio del centro médico</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.examenes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Exámenes</h5>
                            </div>
                        </a>
                    </div>
                </div>
               <div class="col-md-6">
                    <div class="card subir">
                         <a href="{{ ROUTE('adm_cm.procedimientos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                                <h5 class="mt-2">Procedimientos</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->
@endsection
