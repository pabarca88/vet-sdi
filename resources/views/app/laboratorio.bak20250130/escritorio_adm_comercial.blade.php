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
         <!--MODULOS-->
        <div class="row">
            <div class="col-md-12 mb-0">
                <div class="card py-3 mb-3 bg-info">
                    <div class="text-center">
                         <h5 class=" mb-0 text-white f-22">Administración comercial</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('administrador_comercial.configuracion') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/panel_configuracion.svg') }}">
                            <h6 class="mt-1 mb-0">Configurar mi escritorio</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('adm_cm.area_contabilidad') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/adm-contable.png') }}">
                            <h6 class="mt-1 mb-0">Administración contable</h6>
                        </div>
                    </a>
                </div>
            </div>
              <div class="col-md-4">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('adm_cm.estadisticas') }}">
                    <div class="card-body text-center" style="cursor:pointer">
                        <img class="wid-40 text-center" src="{{ asset('images/iconos/estadisticas.png') }}">
                        <h6 class="mt-1 mb-0">Estadisticas del CM</h6>
                    </div>
                </a>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-a mb-3 subir">
					<a href="{{ ROUTE('adm_cm.profesionales') }}">
						<div class="card-body text-center" style="cursor:pointer">
							<img class="wid-40 text-center" src="{{ asset('images/iconos/info-profesional.png') }}">
							<h6 class="mt-1 mb-0">Info profesionales del CM</h6>
						</div>
                    </a>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('adm_cm.sueldos') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/pago-personal.png') }}">
                            <h6 class="mt-1 mb-0">Info personal del CM</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card mb-3 subir" onclick="en_construccion()">
                    {{-- <a href="{{ ROUTE('flujo.caja.index') }}"> --}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/caja.png') }}">
                            <h6 class="mt-1 mb-0"> Recepción de cajas</h6>
                        </div>
                    {{-- </a> --}}
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('adm_cm.liquidacion_profesionales') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/liquidaciones.png') }}">
                            <h6 class="mt-1 mb-0">Procesar liquidaciones</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('asistente_adm.liquidacion_profesionales') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/liquidaciones.png') }}">
                            <h6 class="mt-1 mb-0">Historial liquidaciones</h6>
                        </div>
                    </a>
                </div>
            </div>


			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card mb-3 subir">
                    <a href="{{ ROUTE('gastos.home') }}">
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-40 text-center" src="{{ asset('images/iconos/gastos-pagos.png') }}">
                            <h6 class="mt-1 mb-0">Gastos y pagos</h6>
                        </div>
                    </a>
                </div>
            </div>
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card mb-3 subir">
				   <a href="{{ ROUTE('adm_cm.insumos') }}">
						<div class="card-body text-center" style="cursor:pointer">
							<img class="wid-40 text-center" src="{{ asset('images/iconos/insumos.png') }}">
							<h6 class="mt-1 mb-0">Adm. Materiales insumos</h6>
						</div>
					</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
				<div class="card mb-3 subir" onclick="en_construccion();">
				   <a href="#">
						<div class="card-body text-center" style="cursor:pointer">
							<img class="wid-40 text-center" src="{{ asset('images/iconos/convenios.png') }}">
							<h6 class="mt-1 mb-0">Convenios</h6>
						</div>
                    </a>
				</div>
			</div>
        </div>
        <!--CIERRE: MODULOS-->
    </div>
</div>
@include('app.adm_cm.modales.en_construccion')
<!--Cierre: Container Completo-->
@endsection
