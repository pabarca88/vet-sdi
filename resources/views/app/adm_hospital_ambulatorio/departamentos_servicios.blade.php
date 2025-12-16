@extends('template.adm_cm.template')
@section('content')
{{--  ESTILOS PROPIOD DE LA VISTA   --}}
@section('page-styles')
    <link href='{{ asset('css/perfiles_usuarios.css') }}' rel='stylesheet' />
@endsection

{{--  CONTENIDO  --}}
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12 mb-4">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Especialidades y áreas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="admin_config.php" data-toggle="tooltip" data-placement="top" title="Volver a configuración de centro médico">Configuración del centro médico</a></li>
                                <li class="breadcrumb-item"><a href="esp_areas.php">Especialidades y áreas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- tab general -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="equip-med-tab" data-toggle="tab" href="#equip-med" role="tab" aria-controls="equip-med" aria-selected="true">Especialidades</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="adm-tab" data-toggle="tab" href="#adm" role="tab" aria-controls="adm" aria-selected="false">Áreas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="tab-content" id="myTabContent">
                        <!--Equipo médico-->
                        <div class="tab-pane fade show active" id="equip-med" role="tabpanel" aria-labelledby="equip-med-tab">
                            <div class="card">
                                <div class="card-header pt-3 pb-2 bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="f-18 d-inline mt-3">Especialidades</h6>
                                            <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                <button type="button" class="btn btn-sm btn-info" onclick="();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Especialidad</th>
                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">Medicina general</td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Administración-->
                        <div class="tab-pane fade" id="adm" role="tabpanel" aria-labelledby="adm-tab">
                            <div class="card">
                                <div class="card-header pt-3 pb-2 bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="f-18 d-inline mt-3">Áreas</h6>
                                            <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                <button type="button" class="btn btn-sm btn-info" onclick="();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Jefe o (administrador)</th>
                                                        <th class="text-wrap text-center align-middle">Área</th>
                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center"><strong>Osvaldo Rojas</strong><br>
                                                        00.000.000-0</td>
                                                        <td class="align-middle text-center">Traumatología</td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Limpieza y mantención-->
                        <div class="tab-pane fade" id="limp-mant" role="tabpanel" aria-labelledby="limp-mant-tab">
                            <div class="card">
                                <div class="card-header pt-3 pb-2 bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="f-18 d-inline mt-3">Limpieza y mantención</h6>
                                            <!--<div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                <button type="button" class="btn btn-sm btn-info" onclick="r_profesional();"><i class="feather icon-plus" aria-hidden="true"></i> Registrar profesional</button>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Identificación</th>
                                                        <th class="text-wrap text-center align-middle">Área</th>
                                                        <th class="text-wrap text-center align-middle">Sucursal</th>
                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center"><strong>Pablo Gutierrez</strong><br>
                                                        11.344.985-6</td>
                                                        <td class="align-middle text-center">Limpieza</td>
                                                        <td class="align-middle text-center">CEMICAL</td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="pv_contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone-call"></i></button>
                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="rol_permisos();" data-toggle="tooltip" data-placement="top" title="Rol y permisos"><i class="feather icon-settings"></i></button>
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="docs();" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="feather icon-file-text"></i></button>
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Otros-->
                        <div class="tab-pane fade" id="otros" role="tabpanel" aria-labelledby="otros-tab">
                            <div class="card">
                                <div class="card-header pt-3 pb-2 bg-light">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="f-18 d-inline mt-3">Otros</h6>
                                            <!--<div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                <button type="button" class="btn btn-sm btn-info" onclick="r_profesional();"><i class="feather icon-plus" aria-hidden="true"></i> Registrar profesional</button>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-12">
                                            <table id="personal_vac" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Identificación</th>
                                                        <th class="text-wrap text-center align-middle">Especialidad</th>
                                                        <th class="text-wrap text-center align-middle">Sucursal</th>
                                                        <th class="text-wrap text-center align-middle">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center"><strong>Pablo Gutierrez</strong><br>
                                                        11.344.985-6</td>
                                                        <td class="align-middle text-center">-</td>
                                                        <td class="align-middle text-center">CEMICAL</td>
                                                        <td class="align-middle text-center">
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="pv_contacto();" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone-call"></i></button>
                                                            <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="rol_permisos();" data-toggle="tooltip" data-placement="top" title="Rol y permisos"><i class="feather icon-settings"></i></button>
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="docs();" data-toggle="tooltip" data-placement="top" title="Documentos"><i class="feather icon-file-text"></i></button>
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="pv_editar();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>
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
        </div>
    </div>
    <!--Cierre: Container Completo-->
@endsection
