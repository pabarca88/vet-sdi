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
                                <h5 class="m-b-10 font-weight-bold">Resultados de exámenes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_profesional_laboratorio.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="procesos_laboratorio.php">Procesos</a></li>
                                <li class="breadcrumb-item"><a href="resultados_laboratorio.php">Resultados de exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary">Buscar resultados de exámenes</h5>
                            </div>
                            <div class="card-body">
                                <!--Buscador-->
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label">Rut</label>
                                        <input type="number" class="form-control form-control-sm form-control-sm-activo" name="rut" id="rut">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label">Nº de Solicitud</label>
                                        <input type="number" class="form-control form-control-sm form-control-sm-activo" name="orden" id="orden">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group mb-0">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info btn-sm btn-block">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-header bg-light pb-1 pt-2">
                                <h5 class="text-primary">Identificación del Paciente</h5>
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
                </div>
                <div class="row">
                    <!--Resultados (esta card se carga con la búsqueda)-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-info pb-1 pt-2">
                                <h5 class="text-white">Resultados de exámenes</h5>
                            </div>
                            <div class="card-body">
                                <table id="resultados_examenes" class="display table table-striped table-hover dt-responsive nowrap table-sm text-center align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nº solicitud</th>
                                            <th>Fecha</th>
                                            <th>Paciente</th>
                                            <th>Contacto</th>
                                            <th>Estado</th>
                                            <th>Procedencia</th>
                                            <th>Resultados</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>23243455</td>
                                            <td>17/09/2021</td>
                                            <td>
                                                <span>Pepita Vargas Díaz</span><br>
                                                <span>22.234.455-0</span>
                                            </td>
                                            <td>
                                                <span>+569 2938938</span><br>
                                                <span>paciente@contacto.cl</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-danger">No procesada</span>
                                            </td>
                                            <td>
                                                <span>Nombre Laboratorio</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver</button>
                                                <button class="btn btn-success btn-sm"><i class="feather icon-mail"></i> Enviar a paciente</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>23243455</td>
                                            <td>17/09/2021</td>
                                            <td>
                                                <span>Pepita Vargas Díaz</span><br>
                                                <span>22.234.455-0</span>
                                            </td>
                                            <td>
                                                <span>+569 2938938</span><br>
                                                <span>paciente@contacto.cl</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">Procesando</span>
                                            </td>
                                            <td>
                                                <span>Nombre Laboratorio</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver</button>
                                                <button class="btn btn-success btn-sm"><i class="feather icon-mail"></i> Enviar a paciente</button>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td>23243455</td>
                                            <td>17/09/2021</td>
                                            <td>
                                                <span>Pepita Vargas Díaz</span><br>
                                                <span>22.234.455-0</span>
                                            </td>
                                            <td>
                                                <span>+569 2938938</span><br>
                                                <span>paciente@contacto.cl</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">Procesada</span>
                                            </td>
                                            <td>
                                                <span>Nombre Laboratorio</span>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver</button>
                                                <button class="btn btn-success btn-sm"><i class="feather icon-mail"></i> Enviar a paciente</button>
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
    <!--Cierre: Container Completo-->


    @endsection
