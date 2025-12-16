@extends('template.profesional.template')
@section('content')

    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Configuracion de Diagnósticos Frecuentes </h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a panel de configuración">Panel de
                                        Configuración</a></li>
                                <li class="breadcrumb-item"><a href="#">Configuracion de
                                        Diagnósticos Frecuentes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="text-white f-20 text-center mb-0">Diagnósticos Frecuentes</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_configuracion_diagnosticos_frecuentes"
                                        class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center align-middle" style="width: 6rem;">Código
                                                </th>
                                                <th class="text-center align-middle">Descripción</th>
                                                <th class="text-center align-middle">Tipo</th>
                                                <th class="text-center align-middle">Activar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-wrap text-center align-middle">1</td>
                                                <td class="align-middle text-center">Hematrocrito</td>
                                                <td class="align-middle text-center">Sangre</td>
                                                <td class="align-middle text-center">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="examen_1">
                                                        <label for="examen_1" class="cr"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap text-center align-middle">Nº</td>
                                                <td class="align-middle text-center">Nombre del examen</td>
                                                <td class="align-middle text-center">Imagenes</td>
                                                <td class="align-middle text-center">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="examen_2">
                                                        <label for="examen_2" class="cr"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
