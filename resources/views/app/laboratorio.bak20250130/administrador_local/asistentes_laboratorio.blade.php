@extends('template.laboratorio.administrador_local.template')
@section('content')
<!--****Container Completo****-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Asistentes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="asistentes_laboratorio.php">Mis Asistentes</a></li>
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
                           <div class="col-md-6">
                                <h4 class="text-white f-20 mt-2 mb-2">Mis Asistentes</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="float-right">
                                    <div class="btn-group mr-2 mt- mb-">
                                        <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#registrar_asistente"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a asistente</button>
                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button" class="btn  btn-primary" data-toggle="modal" data-target="#asociar_asistente">Asociar Asistente</button>
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
                    <table id="tabla_asistentes_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Nombre / Rut</th>
                                <th class="text-center align-middle">Contacto</th>
                                <th class="text-center align-middle">Dirección</th>
                                <th class="text-center align-middle">Desasociar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span><strong>Elvira Lápida</strong></span><br>
                                    <span>7.345.466-2</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>asistente@dominio.cl</span><br>
                                    <span>83983499</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Las Maravillas, 23</span><br>
                                    <span>Viña del Mar</span>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
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

<!--Modal Registrar asistente-->
<div id="registrar_asistente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar nuevo/a asistente</h5>
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

<!--Modal Asociar Asistente-->
<div id="asociar_asistente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar Asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre de el o la asistente y seleccione la sucursal en que desea asociar</h6>
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
                                    <option>Laboratorio Clínico</option>
                                    <option>Laboratorio de Rayos</option>
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

<!--****Cierre Container Completo****-->


<!--Tabla-->
<script>
    $(document).ready(function() {
        $('#tabla_asistentes_laboratorio').DataTable({
            responsive: true,
        });
    });
</script>
@endsection