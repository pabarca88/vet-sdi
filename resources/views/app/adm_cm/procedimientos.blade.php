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
                            <h5 class="m-b-10 font-weight-bold">Procedimientos</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="escritorio_admin_general_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="lista_exam.php">Mis Exámenes</a></li>
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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Procedimientos</h4>
                            <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_examen">
                                <i class="feather icon-plus"></i> Agregar examen
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                        </div>
                    </div>
                    <table id="lista_examenes_laboratorio" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Código</th>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Plazo de entrega</th>
                                <th class="text-center align-middle">Preparación del paciente</th>
                                <th class="text-center align-middle">Toma de muestras</th>
                                <th class="text-center align-middle">Análisis de examen</th>
                                <th class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span>302056</span><br>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Magnesio en sangre</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>1 día</span><br>
                                </td>
                                <td class="align-middle text-center">
                                    <span>Ayuno 8 hrs</span><!--Texto como link para descargar instructivo-->
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="toma_muestras();" data-toggle="tooltip" data-placement="top" title="Ver lugares"><i class="feather icon-settings"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <!--Botón Modal-->
                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="analisis_muestra();" data-toggle="tooltip" data-placement="top" title="Ver lugares"><i class="feather icon-settings"></i></button>
                                </td>
                                <td class="align-middle text-center">
                                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datos();">
                                    <i class="feather icon-edit"></i> Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                    <i class="feather icon-x-circle"></i> Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal agregar examen-->
<div id="agregar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Agregar nuevo examen
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Código del examen</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre del examen</label>
                                <input class="form-control form-control-sm" name="nombre_examen" id="nombre_examen" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Plazo de entrega</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue">Instructivo para la preparación del paciente</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Preparación del examen</label>
                                <textarea class="form-control form-control-sm" id="preparacion_examen" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label for="subir_instructivo">Instructivo de preparación en formato de archivo</label>
                                <input type="file" class="form-control-file" id="subir_instructivo">
                            </div>
                        </div>
                         <div class="col-sm-12 mt-2">
                            <h6 class="text-c-blue">Lugar para tomar muestra</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_01">
                                    <label class="custom-control-label" for="sucursal_01">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_02">
                                    <label class="custom-control-label" for="sucursal_02">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_03">
                                    <label class="custom-control-label" for="sucursal_03">Nombre de sucursal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <h6 class="text-c-blue">Lugar para análisis de examen</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_04">
                                    <label class="custom-control-label" for="sucursal_04">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_05">
                                    <label class="custom-control-label" for="sucursal_05">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_06">
                                    <label class="custom-control-label" for="sucursal_06">Nombre de sucursal</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0 pb-0">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Agregar examen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Editar administrador-->
<div id="editar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">
                    Agregar nuevo examen
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Código del examen</label>
                                <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Nombre del examen</label>
                                <input class="form-control form-control-sm" name="nombre_examen" id="nombre_examen" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label">Plazo de entrega</label>
                                <input class="form-control form-control-sm" name="numero" id="numero_lugar_atencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h6 class="text-c-blue">Instructivo para la preparación del paciente</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label">Preparación del examen</label>
                                <textarea class="form-control form-control-sm" id="preparacion_examen" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label for="subir_instructivo">Instructivo de preparación en formato de archivo</label>
                                <input type="file" class="form-control-file" id="subir_instructivo">
                            </div>
                        </div>
                         <div class="col-sm-12 mt-2">
                            <h6 class="text-c-blue">Lugar para tomar muestra</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_01">
                                    <label class="custom-control-label" for="sucursal_01">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_02">
                                    <label class="custom-control-label" for="sucursal_02">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_03">
                                    <label class="custom-control-label" for="sucursal_03">Nombre de sucursal</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <h6 class="text-c-blue">Lugar para análisis de examen</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_04">
                                    <label class="custom-control-label" for="sucursal_04">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_05">
                                    <label class="custom-control-label" for="sucursal_05">Nombre de sucursal</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_06">
                                    <label class="custom-control-label" for="sucursal_06">Nombre de sucursal</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0 pb-0">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal sucursales toma de muestras-->
<div id="sucursal_toma_muestras" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sucursal_toma_muestras" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Lugares para toma de muestras</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Activar /<br>desactivar</th>
                            <th class="text-center align-middle">Sucursal</th>
                            <th class="text-center align-middle">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_1">
                                    <label class="custom-control-label" for="sucursal_1"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">Nombre sucursal</td>
                            <td class="text-center align-middle">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_2">
                                    <label class="custom-control-label" for="sucursal_2"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">Nombre sucursal</td>
                            <td class="text-center align-middle">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Modal sucursales analisis muestras-->
<div id="sucursal_analisis_muestra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sucursal_analisis_muestra" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Lugares para analizar muestra</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Activar /<br>desactivar</th>
                            <th class="text-center align-middle">Sucursal</th>
                            <th class="text-center align-middle">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_1">
                                    <label class="custom-control-label" for="sucursal_1"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">Nombre sucursal</td>
                            <td class="text-center align-middle">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sucursal_2">
                                    <label class="custom-control-label" for="sucursal_2"></label>
                                </div>
                            </td>
                            <td class="text-center align-middle">Nombre sucursal</td>
                            <td class="text-center align-middle">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function() {
        $('#lista_examenes_laboratorio').DataTable({
            responsive: true,
        });
    });
</script>

<!--Modals-->
<script type="text/javascript">
function editar_datos(){
        $('#editar_examen').modal('show');
    }

function toma_muestras(){
        $('#sucursal_toma_muestras').modal('show');
    }

function analisis_muestra(){
        $('#sucursal_analisis_muestra').modal('show');
    }
</script>
@endsection
