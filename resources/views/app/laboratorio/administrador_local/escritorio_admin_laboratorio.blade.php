@extends('template.laboratorio.administrador_local.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10 font-weight-bold">Escritorio Administrador Laboratorio</h5>
                    </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="escritorio_admin_laboratorio.php">Mi Escritorio</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <!--Botones superiores-->
            <div class="row">
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="sucursales_laboratorio.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/laboratorio_1.svg">
                                <h5 class="mt-2">Mis sucursales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="profesionales_laboratorio.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/profesional_2.svg">
                                <h5 class="mt-2">Mis profesionales</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="asistentes_laboratorio.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/mis_asistentes.svg">
                                <h5 class="mt-2">Mis asistentes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="lista_exam.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/examen.svg">
                                <h5 class="mt-2">Mis exámenes</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="administracion_admin.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/administracion.svg">
                                <h5 class="mt-2">Administración</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card subir">
                        <a href="perfil_admin.php">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-70 text-center" src="../assets/images/iconos/perfil_admin.svg">
                                <h5 class="mt-2">Mi Perfil</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Cierre: Container Completo-->
@endsection