@extends('template.contabilidad.template')
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
                            <h5 class="m-b-10 font-weight-bold">Escritorio contabilidad</h5>
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
        <div class="row row-cols-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="card mb-3 subir text-center py-2" style="cursor:pointer">
					  <a href="{{ ROUTE('contabilidad.secciones_contabilidad.rrhh') }}">
						<img class="wid-50 text-center" src="{{ asset('images/comercial/rh.png') }}">
						<h6 class="mt-1 mb-0">Recursos humanos</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3 subir text-center py-2">
					  <a href="{{ ROUTE('contabilidad.secciones_contabilidad.info-pago_sueldos') }}">
						<img class="wid-50 text-center" src="{{ asset('images/comercial/pago-personal.png') }}">
						<h6 class="mt-1 mb-0">Info. sueldos personal</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                 <div class="card mb-3 subir text-center py-2">
                   <a href="{{ ROUTE('contabilidad.secciones_contabilidad.liquidaciones') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/liquidaciones.png') }}">
                        <h6 class="mt-1 mb-0">Liquidaciones a profesionales</h6>
                    </a>
                </div>
            </div>
            <div class="col">
				<div class="card mb-3 subir text-center py-2" style="cursor:pointer">
				   <a href="{{ ROUTE('contabilidad.secciones_contabilidad.remuneraciones') }}">
						<img class="wid-50 text-center" src="{{ asset('images/comercial/salario.png') }}">
						<h6 class="mt-1 mb-0">Pago remuneraciones</h6>
                    </a>
				</div>
			</div>
            <div class="col">
                <div class="card mb-3 subir text-center py-2">
                     <a href="{{ ROUTE('contabilidad.secciones_contabilidad.contable') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/libro-contable.png') }}">
                        <h6 class="mt-1 mb-0"> Libro contable</h6>
                    </a>
                </div>
            </div>
	<!--{{--  <div class="col-md-3">
				<div class="card subir text-center" onclick="en_construccion()";>  --}}
				   {{-- <a href="{{ ROUTE('asistente_adm.asistente_adm_pedidos') }}">--}}
						<img class="wid-60 text-center mb-1" src="{{ asset('images/iconos/flujo_caja_2.svg') }}">
						<h5 class="mt-1 mb-0">Imposiciones y leyes sociales</h5>

					</a>
				</div>
			</div>  --}}-->

			<!--<div class="col-md-3">
                <div class="card subir text-center" onclick="en_construccion()"; style="cursor:pointer">
                    <a href="#">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/pago-personal.png') }}">
                        <h6 class="mt-1 mb-0">Pagos personal del centro</h6>
                    </a>
                </div>
            </div>-->
            <div class="col">
                <div class="mb-3 card subir text-center py-2" style="cursor:pointer">
                      <a href="{{ ROUTE('contabilidad.secciones_contabilidad.ingresos') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/ingresos.png') }}">
                        <h6 class="mt-2">Ingresos</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" style="cursor:pointer">
                    <a href="{{ ROUTE('contabilidad.secciones_contabilidad.egresos') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/egresos.png') }}">
                        <h6 class="mt-2">Egresos</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" onclick="en_construccion()"; style="cursor:pointer">
                   <a href="#">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/impuesto.png') }}">
                        <h6 class="mt-1 mb-0">Impuestos</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" style="cursor:pointer">
                    <a href="{{ ROUTE('convenios.index') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/convenios.png') }}">
                        <h6 class="mt-1 mb-0">Convenios</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" style="cursor:pointer">
                      <a href="{{ ROUTE('proveedores') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/provedor.png') }}">
                        <h6 class="mt-1 mb-0">Proveedores</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" style="cursor:pointer">
                   <a href="{{ ROUTE('contabilidad.secciones_contabilidad.factura') }}">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/factura.svg') }}">
                        <h6 class="mt-1 mb-0">Facturar</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 card subir text-center py-2" onclick="en_construccion()"; style="cursor:pointer">
                     <a href="#">
                        <img class="wid-50 text-center" src="{{ asset('images/comercial/estadisticas.png') }}">
                        <h6 class="mt-1 mb-0">Estadisticas del CM</h6>
                    </a>
                </div>
            </div>
        </div>
        <!--CIERRE: Row Botones -->
    </div>
</div>
@include('app.adm_cm.modales.en_construccion')
<!--Cierre: Container Completo-->
@endsection
