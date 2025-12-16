@extends('template.adm_cm.template')
@section('content')
<!--****Container Completo****-->
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10 font-weight-bold">Personal del Vacunatorio</h5>
                                </div>
                               <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="escritorio_vacunatorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Personal</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-3">Nómina de Profesionales a Cargo </h4>
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_profesional">
                                            <i class="feather icon-plus"></i> Registrar Nuevo Profesional
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="tabla_nomina_enf" class="display table table-striped table-hover dt-responsive nowrap" style="width:99%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Fecha de Ingreso</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Profesión</th>
                                                    <th class="text-center align-middle">Cargo</th>
                                                    <th class="text-center align-middle">Centro</th>
                                                    <th class="text-center align-middle">Rol y Permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Juan Sanchez</strong></span><br>
                                                        <span>17.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/1/2020</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="modal" data-target="#contacto"><i class="feather icon-edit"></i> C</button></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>TENS</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Encargado Policlínico</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Plaza Oeste</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="modal" data-target="#roles_permisos"><i class="feather icon-edit"></i> R</button></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#editar_profesional">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Maria Cornejo</strong></span><br>
                                                        <span>17.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>02/10/2021</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="modal" data-target="#contacto"><i class="feather icon-edit"></i> C</button></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Enfermera Universitaria</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Encargada Sala</strong></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Plaza Oeste</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" data-toggle="modal" data-target="#roles_permisos"><i class="feather icon-edit"></i> R</button></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#editar_profesional">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon-sm">
                                                        <i class="feather icon-x-circle"></i> D</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
