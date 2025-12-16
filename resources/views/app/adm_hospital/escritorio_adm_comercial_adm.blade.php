@extends('template.adm_cm.template')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio comercial</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Administración comercial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card subir py-auto bg-info">
                        <div class="card-body text-center">
                             <h5 class=" mb-0 text-white f-24">Administración Comercial</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('administrador_comercial.configuracion') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                                <h6 class="mt-2 mb-0">Configurar mi Escritorio</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir">
						{{--  <a href="{{ ROUTE('asistente_adm.mis_profesionales') }}">  --}}
						<a href="{{ ROUTE('adm_cm.profesionales') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/info-profesional.png') }}">
								<h5 class="mt-1 mb-0">Info profesionales</h5>
							</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.liquidacion_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/liquidaciones.png') }}">
                                <h5 class="mt-2">Procesar liquidaciones</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('asistente_adm.liquidacion_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/liquidaciones.png') }}">
                                <h5 class="mt-2">Historico Liquidaciones</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <a href="{{ ROUTE('adm_cm.flujo.caja.index') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/caja.png') }}">
                                <h5 class="mt-1 mb-0"> Recepción de Cajas</h5>
                            </div>
                        </a>
                    </div>
                </div>

				<div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('gastos.home') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/gastos-pagos.png') }}">
                                <h5 class="mt-1 mb-0">Gastos y Pagos Generales</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
					<div class="card subir">
					   <a href="{{ ROUTE('adm_cm.insumos') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/insumos.png') }}">
								<h5 class="mt-1 mb-0">Adm. Materiales Insumos</h5>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3">
                    <div class="card subir">
                        <a href="{{ ROUTE('adm_cm.sueldos') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/pago-personal.png') }}">
                                <h5 class="mt-1 mb-0">Pagos Personal del Centro</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-3">
					<div class="card subir">
					    <a href="{{ ROUTE('adm_cm.area_contabilidad') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/adm-contable.png') }}">
								<h5 class="mt-1 mb-0">Administración contable</h5>
							</div>
                        </a>
					</div>
				</div>
				
                <div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                         {{--  <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>--}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                            <h5 class="mt-1 mb-0">Estadisticas del Centro</h5>
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
					<div class="card subir" onclick="en_construccion()";>
					   {{--  <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}"></a>--}}
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/convenios.png') }}">
								<h5 class="mt-1 mb-0">Convenios</h5>
							</div>
					</div>
				</div>
            </div>
        <!--CIERRE: Row Botones -->
    </div>
</div>
@include('app.adm_cm.modales.en_construccion')
<!--Cierre: Container Completo-->
@endsection
