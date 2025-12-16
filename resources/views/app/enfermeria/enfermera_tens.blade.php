@extends('template.enfermera_tens.template')
@section('content')
@include('app.adm_cm.modales.anadir_especialidad')
@include('app.adm_cm.modal_adm.datos_banco')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Técnico enfermería</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_enfermera_admin.php">Mi Escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Row Botones-->
        <div class="row m-b-30">
            <div class="col-md-12">
                <div class="card-deck">
                    <!--Cierre de Card-->
                    <div class="card  subir py-1">
                        <a href="nomina.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                <h5 class="mt-3">Historial de atenciones</h5>
                            </div>
                        </a>
                    </div>

                    <div class="card py-1 subir">
                        <a href="buscador_paciente.php">
                            <div class="card-body text-center" style="cursor:pointer" data-url="enviar.php">
                                <img class="wid-60 text-center" src="../assets/images/iconos/otros_servicios_1.svg">
                                <h5 class="mt-3">Buscar Pacientes </h5>
                            </div>
                        </a>
                    </div>
                    <div class="card  subir py-1">
                        <a href="atender_pcte.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                <h5 class="mt-3">Atender Paciente</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card  subir py-1">
                        <a href="pedidos_hacer.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                <h5 class="mt-3">Reporte de faltantes e Incidentes</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Cierre: Container Completo-->




@endsection
