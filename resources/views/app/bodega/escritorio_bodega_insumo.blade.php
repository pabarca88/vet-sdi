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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Bodega</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('adm_cm.area_comercial') }}">Escritorio Adm. Comercial</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
		<div class="col-sm-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card subir" >
                         <a href="{{ ROUTE('compras') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
								<h5 class="mt-1 mb-0">Compras</h5>
							</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                         <a href="{{ ROUTE('proveedores') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
								<h5 class="mt-1 mb-0">Proveedores</h5>
							</div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card subir">
                         <a href="{{ ROUTE('adm_cm.solicitudes_pendientes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Solicitudes Pendientes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
					<div class="card subir">
                         <a href="{{ ROUTE('adm_cm.controles_almacenamiento') }}">
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
								<h5 class="mt-1 mb-0">Controles de Almacenamiento</h5>
							</div>
                        </a>
					</div>
				</div>
                <div class="col-md-4">
                    <div class="card subir">
                         <a href="{{ ROUTE('bodegas.historial') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-2">Historial Ingreso/Salida stock</h5>
                            </div>
                         </a>
                    </div>
                </div>

				<div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('bodegas.reportes') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Reportes</h5>
                            </div>
                        </a>
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
