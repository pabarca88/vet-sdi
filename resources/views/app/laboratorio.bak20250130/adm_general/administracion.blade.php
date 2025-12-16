@extends('template.laboratorio.adm_general.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Administración</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="administracion.php">Administración</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.gastos_laboratorio_admin') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/gastos.svg') }}">
                                <h5 class="mt-2">Gastos</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.inventario_laboratorio_admin') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/inventario.svg') }}">
                                <h5 class="mt-2">Inventario</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="{{ ROUTE('app.laboratorio.adm_general.proveedores_laboratorio_admin') }}">
                            <div class="card-body text-center" style="cursor:pointer">
								<img class="wid-60 text-center" src="{{ asset('images/iconos/proveedores.svg') }}">
                                <h5 class="mt-2">Proveedores</h5>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection