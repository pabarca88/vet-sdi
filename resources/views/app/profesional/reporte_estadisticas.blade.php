@extends('template.profesional.template')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Reporte y estadísticas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Reporte y estadísticas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="wid-50 mb-3" src="{{ asset('images/iconos/estadisticas_2.svg') }}" alt="Reporte y estadísticas">
                            <h4 class="mb-0">Reporte y estadísticas</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
