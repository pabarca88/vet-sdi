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
                            <h5 class="m-b-10 font-weight-bold">Mis Profesionales</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="profesionales_laboratorio.php">Mis Profesionales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Profesionales</h4>
                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#registrar_profesional">
                                <i class="feather icon-plus"></i> Registrar Profesional
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="tabla_profesionales_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nombre / Rut</th>
                                <th class="text-center align-middle">Especialidad</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Sucursales</th>
                                <th class="text-center align-middle">Rol y Permisos</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span><strong>Marías Sandoval</strong></span><br>
                                    <span>13.295.466-6</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Tecnólogo Médico</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Laboratorio Viña del Mar</span><br>
                                    <span>Laboratorio Quilpué</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="rol_permisos();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datos();">
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

<!--Modal Registrar profesional-->
<div id="registrar_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional" aria-hidden="true">
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
                        <div class="form-group">
                            <label class="floating-label">Especialidad</label>
                            <input class="form-control form-control-sm" name="especialidad" id="especialidad" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Análizar muestras</option>
                                <option>Recepcionar muestras</option>
                                <option>Tomar muestra</option>
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

<!--Modal Editar profesional-->
<div id="editar_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_profesional" aria-hidden="true">
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
                        <div class="form-group">
                            <label class="floating-label">Especialidad</label>
                            <input class="form-control form-control-sm" name="especialidad" id="especialidad" type="text" >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Rol</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                <option>Análizar muestras</option>
                                <option>Recepcionar muestras</option>
                                <option>Tomar muestra</option>
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
<div id="rol_permisos_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rol_permisos_profesional" aria-hidden="true">
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
                            <h6 class="text-c-blue">Cargo</h6>
                            <span>Análisis de muestras</span>

                        </div>                                     
                        <div class="col-sm-12">
                            <h6 class="text-c-blue mb-2">Permisos</h6>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="per_1">
                                <label class="custom-control-label" for="per_1">Solicitud de exámenes</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="per_2">
                                <label class="custom-control-label" for="per_2">Recepción de muestras</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="per_3">
                                <label class="custom-control-label" for="per_3">Procesar solicitud</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="per_4">
                                <label class="custom-control-label" for="per_4">Resultados de exámenes</label>
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

<!--Modal Contacto-->
<div id="contacto_profesional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contacto_admin" aria-hidden="true">
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
                        <span>admin@gmail.com</span>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Teléfono</h6>
                        <span>728392839</span>
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

<!--****Cierre Container Completo****-->

<script>
    $(document).ready(function() {
        $('#tabla_profesionales_laboratorio').DataTable({
            responsive: true,
        });
    });
</script>

<!--Modals-->
<script type="text/javascript">
    function editar_datos (){
        $('#editar_profesional').modal('show');
    }

    function rol_permisos (){
        $('#rol_permisos_profesional').modal('show');
    }

       function contacto (){
        $('#contacto_profesional').modal('show');
    }
</script>


@endsection