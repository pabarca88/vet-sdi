@extends('template.laboratorio.laboratorio_profesional.template')
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
                        <h5 class="m-b-10 font-weight-bold">Escritorio Laboratorio</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_profesional_laboratorio.php">Mi Escritorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
		                        
        <!--Botones superiores-->
        <div class="row">
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.pacientes_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/pacientes.svg') }}">
                            <h5 class="mt-2">Pacientes</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.procesos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/examen.svg') }}">
                            <h5 class="mt-2">Procesos</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h5 class="mt-2">Recepción de Muestras</h5>
                        </div>
                    </a>
                </div>
            </div>
			<div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.recepcion_muestras') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/derivar.svg') }}">
                            <h5 class="mt-2">Derivación de exámenes</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.inventario_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                            <h5 class="mt-2">Inventario</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.proveedores_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                            <h5 class="mt-2">Proveedores</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card subir">
                    <a href="{{ ROUTE('app.laboratorio.lab_profesional.gastos_laboratorio') }}">
                        <div class="card-body text-center" style="cursor:pointer">
							<img class="wid-60 text-center" src="{{ asset('images/iconos/gastos.svg') }}">
                            <h5 class="mt-2">Gastos</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
    <!--Cierre: Container Completo-->
@endsection
