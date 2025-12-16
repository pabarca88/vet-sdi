<!-- BASE -->
@extends('layouts.base')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>FICHA MÉDICA ÚNICA</strong></h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}">Mis pacientes </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @include('general.secciones_ficha.fmu')
    </div>
@endsection
