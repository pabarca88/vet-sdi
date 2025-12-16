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
                            <h5 class="m-b-10 font-weight-bold">Laboratorios del centro médico</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather       icon-home"></i></a></li>
                            <!--<li class="breadcrumb-item"><a href="sucursales_cm.php">Sucursales del centro médico</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-6 d-inline">
                                <h4 class="text-white f-20 mt-2 mb-1">Mis Laboratorios</h4>
                            </div>
                            <div class="col-md-6 d-inline">
                                <div class="float-right">
                                    <div class="btn-group mr-2">
                                        <button type="button" class="btn  btn-sm btn-outline-light" onclick="nueva_sucursal();"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo Laboratorio</button>
                                        <button type="button" class="btn  btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="agregar_desasociar ();">Desasociar o Agregar Laboratorio existente</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="sucursales_cm" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Complejidad</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Administrador</th>
                                <th class="text-center align-middle">Sucursal</th>
                                <th class="text-center align-middle">Asistentes</th>
                                <th class="text-center align-middle">Horarios</th>
                                <th class="text-center align-middle">Convenios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                               <td class="align-middle text-center">
                                    <span><strong>Laboratorio Clínico</strong></span><br>
                                    <span>72.378.384-2</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Todos</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>contacto@correo.cl</span><br>
                                    <span>2178218</span>
                                    <span>37283782</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span><strong>Pablo Espinoza Alarcon</strong></span><br>
                                    <span>7.783.389-1</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_laboratorio ();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="editar_asistentes();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-user"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-primary btn-sm btn-icon"onclick="horario_atencion();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-watch"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm btn-icon"  onclick="convenios();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="fas fa-dollar-sign"></i></button>
                                </td>
                            </tr>
							<tr>
                               <td class="align-middle text-center">
                                    <span><strong>Laboratorio Otorrino</strong></span><br>
                                    <span>72.378.384-2</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Todos</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>contacto@correo.cl</span><br>
                                    <span>2178218</span>
                                    <span>37283782</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span><strong>Pablo Espinoza Alarcon</strong></span><br>
                                    <span>7.783.389-1</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="editar_laboratorio ();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="editar_asistentes();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-user"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-primary btn-sm btn-icon"onclick="horario_atencion();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="feather icon-watch"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-success btn-sm btn-icon"  onclick="convenios();" data-toggle="tooltip" data-placement="top" title="Configurar"><i class="fas fa-dollar-sign"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal nueva sucursal-->
<div id="nuevo_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_laboratorio_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar nuevo Laboratorio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre o Rut del administrador</label>
                                <input class="form-control form-control-sm" name="rut_admin" id="rut_admin" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mb-0" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info mb-0" >Agregar nueva sucursal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal editar laboratorio-->
<div id="editar_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_laboratorio_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Editar Laboratorio
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre o Rut del administrador</label>
                                <input class="form-control form-control-sm" name="rut_admin" id="rut_admin" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Número</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Comuna</label>
                                <select class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email" id="email" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info" >Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal agregar o desasociar laboratorio existente-->
<div id="agregar_laboratorio_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_agregar_desasociar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="">Desasociar o Agregar Laboratorio existente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <table id="config_sucursal" class="display table table-striped table-hover dt-responsive nowrap text-center align-middle table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Desasociar /Agregar</th>
                                    <th class="text-center align-middle">Nombre</th>
                                    <th class="text-center align-middle">Dirección</th>
                                    <th class="text-center align-middle">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox" id="agregar-1">
                                            <label for="agregar-1" class="cr"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <span><strong>Nombre de centro médico</strong></span><br>
                                        <span>72.378.384-2</span>
                                    </td>
                                    <td class="text-center align-middle">Villanelo,123,Viña del Mar</td>
                                    <td class="text-center align-middle">Laboratorio Cínico</td>
                                </tr>
                                <tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="not_pacientes_4">
                                <label for="not_pacientes_4" class="cr"></label>
                                <label>Notificar a pacientes modificación</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer mb-0 pb-0">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" >Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Confgurar asistentes-->
<div id="editar_asistentes_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistentes_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar Asistentes</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar al centro médico</h6>
                        </div>
                        <div class="col-sm-12 col-md-12 mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Rut" aria-label="Rut" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-success" type="button" id="button-addon2">Asociar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3 mt-2">
                            <table id="config_asistentes" class="display table table-striped table-hover dt-responsive nowrap text-center align-middle table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Deshabilitar o Agregar</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="asistentes_editar-1" checked="">
                                                    <label for="asistentes_editar-1" class="cr"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="asistentes_editar-2" checked="">
                                                    <label for="asistentes_editar-2" class="cr"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        <div class="modal-footer pt-2 mb-0 pb-0">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-info" >Guardar Cambios</button>
        </div>
     </div>
</div>
</div>

<!--Modal Horario de Atención-->
<div id="horario_atencion_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_horario_atencion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atención</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-3">Horario de Atención</h6>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Día </label>
                                <select name="dia" id="dia" class=" form-control form-control-sm">
                                    <option>Seleccione día</option>
                                    <option>Lunes</option>
                                    <option>Martes</option>
                                    <option>Miércoles</option>
                                    <option>Jueves</option>
                                    <option>Viernes</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Desde </label>
                                <select name="horario" id="horario" class="form-control form-control-sm">
                                    <option>Seleccione horario</option>
                                    <option>8:00 am</option>
                                    <option>8:30 am</option>
                                    <option>9:00 am</option>
                                    <option>9:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 pm</option>
                                    <option>12:30 pm</option>
                                    <option>13:00 pm</option>
                                    <option>13:30 pm</option>
                                    <option>14:00 pm</option>
                                    <option>14:30 pm</option>
                                    <option>15:00 pm</option>
                                    <option>15:30 pm</option>
                                    <option>16:00 pm</option>
                                    <option>16:30 pm</option>
                                    <option>17:00 pm</option>
                                    <option>17:30 pm</option>
                                    <option>18:00 pm</option>
                                    <option>18:30 pm</option>
                                    <option>19:00 pm</option>
                                    <option>19:30 pm</option>
                                    <option>20:00 pm</option>
                                    <option>20:30 pm</option>
                                    <option>21:00 pm</option>
                                    <option>21:30 pm</option>
                                    <option>22:00 pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label">Hasta </label>
                                <select name="horario" id="horario" class=" form-control form-control-sm">
                                    <option>Seleccione horario</option>
                                    <option>8:00 am</option>
                                    <option>8:30 am</option>
                                    <option>9:00 am</option>
                                    <option>9:30 am</option>
                                    <option>10:00 am</option>
                                    <option>10:30 am</option>
                                    <option>11:00 am</option>
                                    <option>11:30 am</option>
                                    <option>12:00 pm</option>
                                    <option>12:30 pm</option>
                                    <option>13:00 pm</option>
                                    <option>13:30 pm</option>
                                    <option>14:00 pm</option>
                                    <option>14:30 pm</option>
                                    <option>15:00 pm</option>
                                    <option>15:30 pm</option>
                                    <option>16:00 pm</option>
                                    <option>16:30 pm</option>
                                    <option>17:00 pm</option>
                                    <option>17:30 pm</option>
                                    <option>18:00 pm</option>
                                    <option>18:30 pm</option>
                                    <option>19:00 pm</option>
                                    <option>19:30 pm</option>
                                    <option>20:00 pm</option>
                                    <option>20:30 pm</option>
                                    <option>21:00 pm</option>
                                    <option>21:30 pm</option>
                                    <option>22:00 pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2 text-center">
                            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Agregar horario de atención</button>
                            <button type="button" class="btn btn-danger btn-sm" >Cancelar</button>
                        </div>
                        <div class="col-sm-12 mt-2 mb-2">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Día</th>
                                        <th class="text-center align-middle">Desde</th>
                                        <th class="text-center align-middle">Hasta</th>
                                        <th class="text-center align-middle">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">Lunes</td>
                                        <td class="text-center align-middle">08:00 am</td>
                                        <td class="text-center align-middle">13:30 pm</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-icon"><i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">Miércoles</td>
                                        <td class="text-center align-middle">15:00 am</td>
                                        <td class="text-center align-middle">19:00 pm</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-danger btn-icon"><i class="feather icon-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Convenios (previsión)-->
<div id="convenios_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_convenios" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Convenios</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Convenios</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Particular</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_1">
                                <label class="custom-control-label" for="convenio_1">Fonasa</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_0">
                                <label class="custom-control-label" for="convenio_0">Todas las Isapres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_2">
                                <label class="custom-control-label" for="convenio_2">Banmédica</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_3">
                                <label class="custom-control-label" for="convenio_3">Colmena</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Nueva Masvida</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_4">
                                <label class="custom-control-label" for="convenio_4">Consalud</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_5">
                                <label class="custom-control-label" for="convenio_5">Cruz Blanca</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_6">
                                <label class="custom-control-label" for="convenio_6">Cruz del Norte</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Vida Tres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Fundación </label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" for="convenio_7">Isalud</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer mb-0 pb-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" >Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">

    function nueva_sucursal (){
        $('#nuevo_laboratorio_cm').modal('show');
    }

    function agregar_desasociar (){
        $('#agregar_laboratorio_cm').modal('show');
    }

    function editar_laboratorio (){
        $('#editar_laboratorio_cm').modal('show');
    }

    function editar_asistentes (){
        $('#editar_asistentes_cm').modal('show');
    }

    function horario_atencion (){
        $('#horario_atencion_cm').modal('show');
    }

    function convenios (){
        $('#convenios_cm').modal('show');
    }


    </script>

    <!--Tabla-->
    <script>
        $(document).ready(function() {
            $('#sucursales_cm').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#config_asistentes').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function() {
            $('#config_sucursal').DataTable({
                responsive: true,
            });
        });
    </script>
@endsection
