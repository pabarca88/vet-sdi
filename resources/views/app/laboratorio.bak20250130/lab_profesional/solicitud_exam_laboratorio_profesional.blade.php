@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Solicitud de exámenes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_profesional_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="procesos_laboratorio.php">Procesos</a></li>
                                <li class="breadcrumb-item"><a href="solicitud_exam_laboratorio_profesional.php">Solicitud de exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary d-inline mt-4">Identificación del Paciente</h5>
                            </div>
                            <div class="card-body">
                                <!--Paciente-->
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Rut</label>
                                            <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                        </div>
                                    </div>
                                    <!--Inputs bloqueados porque se autocompleta al ingresar rut-->
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Nombres</label>
                                            <input type="text" class="form-control form-control-sm" name="nombres" id="nombres">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Apellidos</label>
                                            <input type="text" class="form-control form-control-sm" name="apellidos" id="apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                                        </div>
                                    </div>
                                    <!--Inputs bloqueados porque se autocompleta al ingresar rut-->
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Edad</label>
                                            <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Sexo</label>
                                            <input type="text" class="form-control form-control-sm" name="sexo" id="sexo">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-md-8">
                                        <div class="form-group">
                                            <label class="floating-label">Dirección</label>
                                            <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="floating-label">Comuna</label>
                                            <select id="comuna_paciente" name="comuna_paciente" class="form-control form-control-sm">
                                                <option>Seleccione una opción</option>
                                                <optgroup label="Valparaíso">
                                                    <option>Viña del Mar</option>
                                                    <option>La Calera</option>
                                                    <option>Valparaíso</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary">Solicitud de exámenes</h5>
                            </div>
                            <div class="card-body">
                                <!--Num solicitud y fecha-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label">Profesional solicitante</label>
                                            <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12"><!--Estos campos se autocompletan y se mantienen bloqueados porque no se pueden modificar-->
                                        <div class="form-group">
                                            <label class="floating-label">Nº de Solicitud</label>
                                            <input type="number" class="form-control form-control-sm form-control-sm-activo" name="solicitud" id="solicitud">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--Solicitud de exámenes-->
                    <div class="col-md-12 h-100">
                        <div class="card">
                            <div class="card-header bg-info pb-1 pt-2">
                                <h5 class="text-white">Solicitud de exámenes</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="table table-xs">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Código</th>
                                                <th class="text-center align-middle">Tipo de muestra</th>
                                                <th class="text-center align-middle">Examen</th>
                                                <th class="text-center align-middle">Valor Examen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">7823738</td>
                                                <td class="text-center align-middle">Sangre</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">7823738</td>
                                                 <td class="text-center align-middle">Orina</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">7823738</td>
                                                <td class="text-center align-middle">Tejidos</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">7823738</td>
                                                <td class="text-center align-middle">Deposición</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">Sin código</td>
                                                 <td class="text-center align-middle">Piel</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">Sin código</td>
                                                <td class="text-center align-middle">Cateter</td>
                                                <td class="text-center align-middle">Nombre examen</td>
                                                <td class="text-center align-middle">$0000</td>
                                            </tr>
                                            <tr class="table-secondary">
                                                <th colspan="3" class="text-right align-middle">Monto total</th>
                                                <th colspan="1" class="text-center align-middle">$10.000</th>
                                            </tr>
                                            <tr class="table-secondary">
                                                <th colspan="3" class="text-right align-middle">Total bonificación</th>
                                                <th colspan="1" class="text-center align-middle">$8.000</th>
                                            </tr>
                                            <tr class="table-warning">
                                                <th colspan="3" class="text-right align-middle">Total Copago</th>
                                                <th colspan="1" class="text-center align-middle">$3.000</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="alert alert-success" role="alert">
                                      <strong>Solicitud pagada</strong>
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                      <strong>Solicitud pendiente de pago</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-white text-center">
                                <button type="submit" class="btn btn-info">Imprimir solicitud</button>
                                <button type="submit" class="btn btn-info">Imprimir etiquetas</button>
                                <button type="submit" class="btn btn-success"><i class="feather feather icon-printer"></i> Imprimir ambas</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!-- Modal registrar paciente-->
    <div id="agregar_paciente_laboratorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info pt-3 pb-2">
                   <h5 class="modal-title text-white text-center">Registrar Paciente</h5>
                   <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del paciente</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control form-control-sm" name="rut_paciente" id="rut_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombres</label>
                                    <input type="text" class="form-control form-control-sm" name="nombres_paciente" id="nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Apellidos</label>
                                    <input type="text" class="form-control form-control-sm" name="apellidos_paciente" id="apellidos_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 mb-3">
                                <label class="floating-label-activo">Fecha de Nacimiento</label>
                                <input type="date" class="form-control form-control-sm" name="nacimiento" id="nacimiento">
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Sexo</label>
                                    <select id="sexo" name="sexo" class="form-control form-control-sm">
                                        <option>Selecione una opción</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Convenio</label>
                                    <select id="convenio" name="convenio" class="form-control form-control-sm">
                                        <option>Selecione una opción</option>
                                        <option>Particular</option>
                                        <option>Fonasa</option>
                                        <option>Banmédica</option>
                                        <option>Colmena</option>
                                        <option>Cruz Blanca</option>
                                        <option>Nueva Masvida</option>
                                        <option>Consalud</option>
                                        <option>Cruz del Norte</option>
                                        <option>Vida Tres</option>
                                        <option>Isalud</option>
                                        <option value="control sin costo">Control sin costo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input type="address" class="form-control form-control-sm" name="direccion_paciente" id="direccion_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Comuna</label>
                                    <select id="comuna_paciente" name="comuna_paciente" class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option>Viña del Mar</option>
                                            <option>La Calera</option>
                                            <option>Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input type="email" class="form-control form-control-sm" name="email_paciente" id="email_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label">Teléfono</label>
                                    <input type="tel" class="form-control form-control-sm" name="telefono_paciente" id="telefono_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                     <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="registro_alternativo_paciente" checked="">
                                        <label for="registro_alternativo_paciente" class="cr"></label>
                                    </div>
                                    <label>Notificar registro por correo electrónico</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                   <button type="submit" class="btn btn-info">Guardar Registro</button>
                </div>
            </div>
       </div>
    </div>
@endsection
