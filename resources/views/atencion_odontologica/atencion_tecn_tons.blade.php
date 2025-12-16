@extends('template.asistente_dental.template_tad')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio Asistente Dental (ONS)</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                {{--  <a href="{{ route('asistente_adm.home') }}">Mi Escritorio </a>  --}}
                                Mi Escritorio
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
		<div class="col-sm-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card subir">
						{{--  <a href="{{ ROUTE('asistente_adm.mis_profesionales') }}">  --}}
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
								<h5 class="mt-1 mb-0">Info Profesionales</h5>
							</div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        {{--  <a href="{{ ROUTE('asistente_adm.liquidacion_profesionales') }}">  --}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-2">Pedido y Retiro Materiales</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card subir">
                        {{--  <a href="{{ ROUTE('asistente_adm.liquidacion_profesionales') }}">  --}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-50 text-center" src="{{ asset('images/iconos/profesional_1.svg') }}">
                                <h5 class="mt-2">Envios a Laboratorio Dental</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                         {{--  <a href="{{ ROUTE('asistente.flujo_caja') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0"> Control de Gastos por paciente</h5>
                            </div>
                    </div>
                </div>

				<div class="col-md-4">
                    <div class="card subir">
                       ]
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Gastos y Pagos Generales</h5>
                            </div>
                        </a>
                    </div>
                </div>
				<div class="col-md-4">
					<div class="card subir">
					   {{--  <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}">  --}}
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
								<h5 class="mt-1 mb-0">Administración Materiales Insumos</h5>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                         {{--  <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>--}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-1 mb-0">Pagos Personal del Centro</h5>
                        </div>
                    </div>
                </div>

				<div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                        {{--   <a href="{{ ROUTE('asistente_adm.cargar_contrato') }}"></a>--}}
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
                                <h5 class="mt-1 mb-0"> Proveedores</h5>
                            </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir" onclick="en_construccion()";>
                         {{--  <a href="{{ ROUTE('asistente_adm.gastos') }}"></a>--}}
                        <div class="card-body text-center" style="cursor:pointer">
                            <img class="wid-60 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                            <h5 class="mt-1 mb-0">Estadisticas del Centro</h5>
                        </div>
                    </div>
                </div>
				<div class="col-md-4">
					<div class="card subir" onclick="en_construccion()";>
					   {{--  <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}"></a>--}}
							<div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
								<h5 class="mt-1 mb-0">Convenios</h5>
							</div>
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
