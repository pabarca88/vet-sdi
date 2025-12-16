@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content m-top">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de configuración</a></li>
                                <li class="breadcrumb-item"><a href="#">Configuración Diagnósticos CIE 1O</a></li>
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
                            <h4 class="text-white f-20 text-center mb-0">Diagnósticos Frecuentes CIE-10</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="input-group mb-1">
                                      <input type="text" class="form-control form-control-sm" placeholder="Buscar diagnóstico" aria-label="Buscar diagnóstico" aria-describedby="button-addon2" name="text_busqueda_cie10" id="text_busqueda_cie10">
                                      <div class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="button" id="button-addon2" onclick="buscar_diagnosticos_cie10();"><i class="feather icon-search"></i> Buscar</button>
                                      </div>
                                    </div>
                                    <small>SI REALIZA MODIFICACIÓN DEBE "GUARDAR DIAGNÓSTICOS SELECCIONADOS" POR CADA BÚSQUEDA .</small>
                                </div>
                                <!--<div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-form-label-sm-active">Buscar diagnóstico</label>
                                        <input type="text" name="text_busqueda_cie10" id="text_busqueda_cie10">
                                        <div class="btn btn-primary" onclick="buscar_diagnosticos_cie10();">Buscar</div>
                                        <small>Por cada busqueda si realiza modificación debe "Guardar Diagnósticos Seleccionados"</small>
                                    </div>
                                </div>-->
                                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-9 col-xxl-9">
                                    <div class="form-group">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="todos_diagnosticos_cie10" onchange="activar_diagnosticos_cie10();">
                                            {{--  <label for="todos_diagnosticos_cie10" class="cr">Activar Todos los diagnosticos seleccionados</label>  --}}
                                            <label for="todos_diagnosticos_cie10" class="cr"></label>
                                        </div>
                                        <label for="todos_diagnosticos_cie10" class="cr">Activar todos los diagnósticos seleccionados</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 col-xxl-3 float-md-right mt-3">
                                    <div class="btn btn-primary-light-c btn-xxs btn-block" onclick="guardar_diagnosticos_cie10_profesional();"><i class="feather icon-save"></i> Guardar diagnósticos seleccionados</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div style="overflow-x:auto;"></div>
                            <div class="table-responsive">
                                <table id="tabla_configuracion_cie10" class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Código</th>
                                            <th style="width: 60%;">Descripción</th>
                                            <th style="width: 9%;">Activar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{--  @foreach ($diagnostico as $df)
                                            <tr>
                                                <td class="" style="width: 20%;">{{ $df->codigo }}
                                                </td>
                                                <td class="" style="width: 60%;">{{ $df->descripcion }}
                                                </td>
                                                <td class="" style="width: 9%;">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="diagnostico_{{ $df->id }}">
                                                        <label for="diagnostico_{{ $df->id }}" class="cr"></label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach  --}}
                                    </tbody>
                                </table>
                            </div>
                            {{--  {{ $diagnostico->links() }}  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
