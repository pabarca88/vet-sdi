@extends('template.paciente_dependiente.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis Exámenes</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta.examen', ['id_dependiente_activo' => $id_dependiente_activo]) }}">Mis Exámenes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis Exámenes</h4>
                                <!--<button type="button" class="btn btn-success btn-sm d-inline float-right mr-4"
                                    data-toggle="modal" data-target="#agregar_examen_profesional_ro">
                                    <i class="feather icon-plus"></i> Agregar examen
                                </button>-->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_examenes_paciente_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº de Orden</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Nombre del examen</th>
                                            <th class="text-center align-middle">Comentarios</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Examen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Pendiente
                                        <tr>
                                            <td class="text-wrap text-center align-middle">11/09/2020</td>
                                            <td class="text-wrap text-center align-middle">12344434</td>
                                            <td class="align-middle text-center">
                                                <strong>Jaime Kriman Astorga</strong><br>
                                                Otorrinolaringólogo</td>
                                            <td class="align-middle text-center">Hemograma Completo</td>
                                            <td class="align-middle text-center">Comentarios
                                            <td class="align-middle text-center">Enviado</td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-toggle="modal" data-target="#m_cons_ex"><i
                                                        class="feather icon-file-plus"></i> Ver Examen</button>
                                            </td>
                                        </tr>
                                        -->
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
<!--Cierre: Container Completo-->
<!-- Modal examen profesional-->
<div id="agregar_examen_profesional_ro" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar examen</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="recetas_profesional">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del examen</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos_paciente"
                                    id="apellidos_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombre del Examen</label>
                                <select id="nombre_examen" name="nombre_examen" class="form-control">
                                    <option selected value="0">Seleccione una opción </option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha</label>
                                <input type="date" class="form-control" name="fecha_paciente" id="fecha_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="ml-2 mt-2">Adjuntar examen</h6>
                                <input type="file" class="aform-control-file pb-3" id="adjuntar_examen_receta_online">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Comentarios</label>
                                <textarea class="form-control" rows="1" name="comentarios_examen"
                                    id="comentarios_examen"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-script')
<script>
    $(document).ready(function () {
        $('#tabla_examenes_paciente_ro').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
