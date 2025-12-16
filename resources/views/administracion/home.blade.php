@extends('template.administracion.template')
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
                                <h5 class=" font-weight-bold">Administrador general </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->

            <div class="row">
                <div class="col-md-12">
                    <div class="card py-auto bg-info">
                        <div class="card-body text-center">
                             <h5 class=" mb-0 text-white f-22">Administración general SDI</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-primary text-center">
                        <div class="card-body" style="cursor:pointer">
                            <h6 class="mb-0 text-white f-18">Configuración general SDI</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('administracion.configuracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-2 mb-0">Configuración Equipo directivo</h6>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('administracion.profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesionales.svg') }}">
                                <h6 class="mt-2 mb-0">Profesionales de SDI</h6>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.personal') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center"  src="{{ asset('images/iconos/personal.png') }}">
                                <h6 class="mt-1 mb-0">Personal Institucional</h6>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('adm_cm.area_contratos_nuevos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center"  src="{{ asset('images/iconos/personal.png') }}">
                                <h6 class="mt-1 mb-0">Contratar Personal SDI</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-primary">
                        <div class="card-body text-center" style="cursor:pointer">
                            <h6 class="mb-0 text-white f-18">Reportes Administrativos</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--TARJETAS REPORTES-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                <div class="col mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <img src="{{ asset('images/iconos/s-pac.png') }}" class="wid-40 align-self-start mr-3" alt="...">
                              <div class="media-body">
                                <h6 class="t-aten">Total suscripción</h6>
                                <h5 class="mt-0">Pacientes</h5>
                                <h4>0000</h4>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <img src="{{ asset('images/iconos/s-prof.png') }}" class="wid-40 align-self-start mr-3" alt="...">
                              <div class="media-body">
                                <h6 class="t-aten">Total suscripción</h6>
                                <h5 class="mt-0">Profesionales</h5>
                                <h4>0000</h4>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <img src="{{ asset('images/iconos/s-institucion.png') }}" class="wid-40 align-self-start mr-3" alt="...">
                              <div class="media-body">
                                <h6 class="t-aten">Total suscripción</h6>
                                <h5 class="mt-0">Instituciones</h5>
                                <h4>0000</h4>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <img src="{{ asset('images/iconos/s-asistente.png') }}" class="wid-40 align-self-start mr-3" alt="...">
                              <div class="media-body">
                                <h6 class="t-aten">Total suscripción</h6>
                                <h5 class="mt-0">Asistentes</h5>
                                <h4>0000</h4>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <img src="..." class="align-self-start mr-3" alt="...">
                              <div class="media-body">
                                <h5 class="mt-0">FMU</h5>
                                <h4>0000</h4>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                         <div class="card-body">
                            <h6 class="text-c-blue">Enero</h6><!--DEJAR MES ACTUAL PERO DEBE CAMBIAR SI SE SELECCIONA OTRO MES DESDE EL BOTON-->
                        <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>$6,456<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>$2,500</span></h6>
                        <div class="progress mt-1" style="height:6px;">
                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-1 d-block mb-3">Ingresos<span class="float-right">Egresos</span></span>
                        <div class="btn-group">
                          <button class="btn btn-outline-primary btn-lg dropdown-toggle btn-xxs" type="button" data-toggle="dropdown" aria-expanded="false">
                            Ver otro mes
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Enero</a>
                            <a class="dropdown-item" href="#">Febrero</a>
                            <a class="dropdown-item" href="#">Marzo</a>
                            <a class="dropdown-item" href="#">Abril</a>
                            <a class="dropdown-item" href="#">Mayo</a>
                            <a class="dropdown-item" href="#">Junio</a>
                            <a class="dropdown-item" href="#">Julio</a>
                            <a class="dropdown-item" href="#">Agosto</a>
                            <a class="dropdown-item" href="#">Septiembre</a>
                            <a class="dropdown-item" href="#">Octubre</a>
                            <a class="dropdown-item" href="#">Noviembre</a>
                            <a class="dropdown-item" href="#">Diciembre</a>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                              <div class="media-body">
                                <h6 class="text-c-blue">Enero</h6><!--DEJAR MES ACTUAL PERO DEBE CAMBIAR SI SE SELECCIONA OTRO MES DESDE EL BOTON-->
                                <h5 class="mt-0">Balance Mes</h5>
                                <h4>0000</h4>
                                <div class="btn-group">
                                  <button class="btn btn-outline-primary btn-lg dropdown-toggle btn-xxs" type="button" data-toggle="dropdown" aria-expanded="false">
                                    Ver otro mes
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Enero</a>
                                    <a class="dropdown-item" href="#">Febrero</a>
                                    <a class="dropdown-item" href="#">Marzo</a>
                                    <a class="dropdown-item" href="#">Abril</a>
                                    <a class="dropdown-item" href="#">Mayo</a>
                                    <a class="dropdown-item" href="#">Junio</a>
                                    <a class="dropdown-item" href="#">Julio</a>
                                    <a class="dropdown-item" href="#">Agosto</a>
                                    <a class="dropdown-item" href="#">Septiembre</a>
                                    <a class="dropdown-item" href="#">Octubre</a>
                                    <a class="dropdown-item" href="#">Noviembre</a>
                                    <a class="dropdown-item" href="#">Diciembre</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card table-card">
                        <div class="card-header borderless bg-light">
                            <h4 class="text-c-blue f-18">Convenios de pacientes</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr class="pb-0">
                                            <td class="f-16">Particular</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>50</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="pb-0">
                                            <td  class="f-16">Fonasa</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>350</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Banmédica</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>350</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Colmena</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>35</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Cruz Blanca</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>50</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Nueva Masvida</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>347</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Consalud</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>78</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Cruz del Norte</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>15</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Vida Tres</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <span class="m-r-15"><strong>22</strong></span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card table-card">
                        <div class="card-header borderless bg-light">
                            <h4 class="text-c-blue f-18 d-inline">Suscripciones de Enero<span class="text-muted font-weight-light"><!--INGRESAR TOTAL SIN FILTRO--></span></h4>
                            <button class="btn btn-outline-primary btn-lg dropdown-toggle btn-xxs float-right d-inline" type="button" data-toggle="dropdown" aria-expanded="false">
                                Ver otro mes
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Enero</a>
                                <a class="dropdown-item" href="#">Febrero</a>
                                <a class="dropdown-item" href="#">Marzo</a>
                                <a class="dropdown-item" href="#">Abril</a>
                                <a class="dropdown-item" href="#">Mayo</a>
                                <a class="dropdown-item" href="#">Junio</a>
                                <a class="dropdown-item" href="#">Julio</a>
                                <a class="dropdown-item" href="#">Agosto</a>
                                <a class="dropdown-item" href="#">Septiembre</a>
                                <a class="dropdown-item" href="#">Octubre</a>
                                <a class="dropdown-item" href="#">Noviembre</a>
                                <a class="dropdown-item" href="#">Diciembre</a>
                              </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr class="pb-0">
                                            <td class="f-16">Pacientes</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>230<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>9</span></h6>
                                            </td>
                                        </tr>
                                        <tr class="pb-0">
                                            <td  class="f-16">Profesionales</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>2130<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>239</span></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Instituciones</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>30<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>1</span></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Asistentes</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>3230<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>223</span></h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="f-16">Asistente online</td>
                                            <td class="f-16"><span class="text-right d-block m-0">
                                                <h6 class="mb-0"><i class="feather icon-arrow-up text-c-green"></i>120<span class="float-right"><i class="feather icon-arrow-down text-c-red"></i>7</span></h6>
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
    <!--Cierre: Container Completo-->
    @include('app.adm_cm.modales.en_construccion')
    @include('administracion.modales.modal_registrar_administrador')
    @include('administracion.modales.modal_mantenedor_modulos')
@endsection
