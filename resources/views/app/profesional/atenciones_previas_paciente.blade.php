@extends('template.profesional.template')

@section('page-styles')
<style>
p {
    color: #59636d;
    word-wrap: break-word !important;
    font-size: 14px;
}
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!--Header-->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5 class="m-b-10 font-weight-bold">Historial de atenciones</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{ route('profesional.pacientes') }}" data-toggle="tooltip" data-placement="top" title="Volver a mis pacientes">Mis pacientes</a></li>
							<li class="breadcrumb-item"><a href="#">Historial de atenciones</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row  user-profile user-card  py-1 pb-3 mt-3 px-2 bg-gris">
		<!--Cierre: Header-->
			<!-- inculde -->
			<?php $fade = 'in'; $titulo = 'titulo'; ?>
			{{-- @include('atencion_medica.formularios.atenciones_previas_form' ) --}}
			@include('general.secciones_ficha.atenciones_previas_form')
		</div>

	</div>
</div>
@endsection
