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
                            <h5 class="m-b-10 font-weight-bold">Personal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="personal_laboratorio">Personal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Profesionales de la salud</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="asistentes-tab" data-toggle="tab" href="#asistentes" role="tab" aria-controls="asistentes" aria-selected="false">Asistentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="administrativos-tab" data-toggle="tab" href="#administrativos" role="tab" aria-controls="administrativos" aria-selected="false">Personal administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="limpieza-mantencion-tab" data-toggle="tab" href="#limpieza-mantencion" role="tab" aria-controls="limpieza-mantencion" aria-selected="false">Limpieza y Mantención</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="personal_cm">
                    <!--Tab Profesionales de la salud-->
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales de la salud</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_profesional();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a profesional</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar profesional</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="profesionales_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Especialidad</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Jaime Kriman</strong></span><br>
                                                        <span>4.345.466-2</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Otorrinolaringología</span><br>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Ist Viña del Mar</span><br>
                                                        <span>Ist Quilpué</span><br>
                                                        <span>Ist San Felipe</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_profesional();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_profesional();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x-circle"></i> Desasociar</button>
                                                    </td>                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab Profesionales de la salud-->
                    <!--Tab asistentes-->
                    <div class="tab-pane fade" id="asistentes" role="tabpanel" aria-labelledby="asistentes-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_asistente();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a asistente</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_asistente();">Asociar asistente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="asistentes_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Pepita Sanchez</strong></span><br>
                                                        <span>7.344.323-9</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Ist Viña del Mar</span><br>
                                                        <span>Ist Quilpué</span><br>
                                                        <span>Ist San Felipe</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_asistente();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_asistente();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x-circle"></i> Desasociar</button>
                                                    </td>                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab asistentes-->
                    <!--Tab personal administrativo-->
                    <div class="tab-pane fade" id="administrativos" role="tabpanel" aria-labelledby="administrativos-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal administrativo</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal administrativo</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_administrativo();">Asociar personal administrativo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="administrativo_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Carlos Aguilera</strong></span><br>
                                                        <span>12.564.323-3</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Ist Viña del Mar</span><br>
                                                        <span>Ist Quilpué</span><br>
                                                        <span>Ist San Felipe</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_administrativo();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_administrativo();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x-circle"></i> Desasociar</button>
                                                    </td>                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->
                    <!--Tab personal limpieza y mantencion-->
                    <div class="tab-pane fade" id="limpieza-mantencion" role="tabpanel" aria-labelledby="limpieza-mantencion-tab">
                        <div class="row mb-n4">
                           <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                               <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Limpieza y mantención</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_limpieza_mantencion();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a personal de limpieza y mantencion</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_limpieza_mantencion();">Asociar personal de limpieza y mantencion</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="limpieza_mantencion_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Nombre / Rut</th>
                                                    <th class="text-center align-middle">Sucursales</th>
                                                    <th class="text-center align-middle">Contacto</th>
                                                    <th class="text-center align-middle">Rol y permisos</th>
                                                    <th class="text-center align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span><strong>Roberto Olguín Díaz</strong></span><br>
                                                        <span>18.564.323-k</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span>Ist Viña del Mar</span><br>
                                                        <span>Ist Quilpué</span><br>
                                                        <span>Ist San Felipe</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <!--Botón Modal-->
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos_limpieza_mantencion();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_limpieza_mantencion();">
                                                        <i class="feather icon-edit"></i> Editar</button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x-circle"></i> Desasociar</button>
                                                    </td>                        
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab personal limpieza y mantencion-->
                </div>
                <!--Cierre: Pills-->
            </div>
        </div>
    </div>
</div>
<!--****Cierre Container Completo****-->

<!--Footer-->
<footer>
<?php
require_once('../include/footer.php');
?>
</footer>
<!--Cierre: Footer-->

<!--/////////////MODALS PROFESIONALES DE LA SALUD /////////-->

<!--Modal Registrar profesional-->
<div id="registrar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Medicina General</option>
                                <option>Medicina Interna</option>
                                <option>Otorrinolaringologo</option>
                                <option>Odontologo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Sub-Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Otología</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Profesional Otorrinolaringólogo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar profesional</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar Profesional-->
<div id="asociar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del profesional y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar profesional-->
<div id="editar_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar profesional</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Medicina General</option>
                                <option>Medicina Interna</option>
                                <option>Otorrinolaringologo</option>
                                <option>Odontologo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Sub-Especialidad</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Otología</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Profesional Otorrinolaringólogo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_profesional_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Profesional</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Profesional Otorrinolaringologo</span>
                        </div>                                     
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_1">
                                <label class="custom-control-label" for="perm_1">Agenda</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_2">
                                <label class="custom-control-label" for="perm_2">Pacientes</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_3">
                                <label class="custom-control-label" for="perm_3">Panel de configuración</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_4">
                                <label class="custom-control-label" for="perm_4">Receta online</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_5">
                                <label class="custom-control-label" for="perm_5">Estadísticas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/////////////MODALS ASISTENTES /////////-->

<!--Modal Registrar asistente-->
<div id="registrar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Función que tipo de asistente es</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar asistente</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar asistente-->
<div id="asociar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del asistente y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar asistente-->
<div id="editar_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Función que tipo de asistente es</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_asistente_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_profesional_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Asistente</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Que rol de asistente cumple</span>
                        </div>                                     
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_1">
                                <label class="custom-control-label" for="perm_asis_1">Agenda</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_2">
                                <label class="custom-control-label" for="perm_asis_2">Pacientes</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_3">
                                <label class="custom-control-label" for="perm_asis_3">Panel de configuración</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_asis_5">
                                <label class="custom-control-label" for="perm_asis_5">Estadísticas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--/////////////MODALS PERSONAL ADMINISTRATIVO /////////-->

<!--Modal Registrar personal administrativo-->
<div id="registrar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Administrador</option>
                                <option>Cajero</option>
                                <option>Contador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar personal administrativo-->
<div id="asociar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del personal administrativo y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar personal administrativo-->
<div id="editar_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_administrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Administrador</option>
                                <option>Cajero</option>
                                <option>Contador</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_administrativo_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_pradministrativo_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Personal administrativo</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Administrador</span><br>
                            <span>Contador</span>
                        </div>                                     
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3"><!--Se cargan según su rol-->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_1">
                                <label class="custom-control-label" for="perm_administrativo_1">Flujo de caja</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_2">
                                <label class="custom-control-label" for="perm_administrativo_2">Sucursales</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_3">
                                <label class="custom-control-label" for="perm_administrativo_3">Laboratorio</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="perm_administrativo_5">
                                <label class="custom-control-label" for="perm_administrativo_5">Estadísticas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!--///////////// MODALS PERSONAL LIMPIEZA Y MANTENCIÓN /////////-->

<!--Modal Registrar personal limpieza_mantencion-->
<div id="registrar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Chofer</option>
                                <option>Limpieza</option>
                                <option>Eléctrico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Asociar personal limpieza_mantencion-->
<div id="asociar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar personal de limpieza y mantención </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del personal de limpieza y mantención seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Sucursal</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>Nombre centro médico</option>
                                    <option>etc...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar personal limpieza_mantencion-->
<div id="editar_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar personal administrativo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre" id="nombre" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Primer Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Segundo Apellido</label>
                            <input class="form-control form-control-sm" name="apellido" id="apellido" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Correo Electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="email" type="email" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="telefono" id="telefono" type="number" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Dirección / Calle</label>
                            <input class="form-control form-control-sm" name="direccion_nuevo_lugar_atencion" id="direccion_nuevo_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Número</label>
                            <input class="form-control form-control-sm" name="numero" id="numero" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Chofer</option>
                                <option>Limpieza</option>
                                <option>Eléctrico</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="correo-1" checked="">
                                <label for="correo-1" class="cr"></label>
                            </div>
                            <label>Notificar por correo electrónico</label>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Rol y permisos-->
<div id="rol_permisos_limpieza_mantencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_limpieza_mantencion_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Rol y permisos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Usuario</h6>
                            <span>Limpieza y mantención</span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <h6 class="text-c-blue">Rol</h6>
                            <span>Chofer</span><br>
                            <span>Limpieza</span>
                            <span>Eléctrico</span>
                        </div>                                     
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Contacto-->
<div id="contacto_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contacto_usuario" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Contacto</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Correo electrónico</h6>
                        <span>nombre@gmail.com</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Teléfono</h6>
                        <span>728392839</span><br>
                        <span>932930923</span>
                    </div> 
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Dirección</h6>
                        <span>Chañaral 132, Viña del Mar, Valparaíso.</span>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection