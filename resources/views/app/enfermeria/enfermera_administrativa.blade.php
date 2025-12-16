@extends('template.enfermera_adm.template')
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
                                <h5 class="m-b-10 font-weight-bold">Escritorio Enfermera Administrativa</h5>
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
                            <a href="reclamos_felicitaciones.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                    <h5 class="mt-3">Recibo Reclamos y Felicitaciones Estadisticas</h5>
                                </div>
                            </a>
                        </div>

                        <div class="card py-1 subir">
                            <a href="nomina.php">
                                <div class="card-body text-center" style="cursor:pointer" data-url="enviar.php">
                                    <img class="wid-60 text-center" src="../assets/images/iconos/otros_servicios_1.svg">
                                    <h5 class="mt-3"> Personal a Cargo</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card  subir py-1">
                            <a href="incluir_en_stock.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                    <h5 class="mt-3">Medicamentos e insumos no incluidos en Stock</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card  subir py-1">
                            <a href="pedidos_mat_ins.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-80 text-center mt-2" src="../assets/images/iconos/pacientes.svg">
                                    <h5 class="mt-3">Historial Pedidos de Materiales e Insumos</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card subir py-1">
                            <a href="pedidos_med.php">
                                <div class="card-body text-center" style="cursor:pointer">
                                    <img class="wid-60 text-center" src="../assets/images/iconos/agenda.svg">
                                    <h5 class="mt-3">Historial Pedidos de Medicamentos</h5>
                                </div>
                            </a>
                        </div>
                        <div class="card py-1 subir">
                            <a href="pedidos_hacer.php">
                                <div class="card-body text-center" style="cursor:pointer" data-url="enviar.php">
                                    <img class="wid-60 text-center" src="../assets/images/iconos/otros_servicios_1.svg">
                                    <h5 class="mt-3">Hacer Pedidos</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-b-30">
                <div class="col-md-12">
                    <div class="card-deck">
                        <!--Cierre de Card-->
                        <div class="card py-1 subir">
                            <a href="#">
                                <div class="card-body text-center" style="cursor:pointer" data-url="enviar.php">
                                    <img class="wid-60 text-center" src="../assets/images/iconos/usuario_asistente.svg" alt="secretaria admin">
                                    <h5 class="mt-3"> Contratar secretaria Online</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
