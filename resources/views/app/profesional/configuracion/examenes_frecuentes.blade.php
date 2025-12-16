@extends('template.profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Configurar Exámenes Frecuentes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a panel de configuración">Panel de
                                        Configuración</a></li>
                                <li class="breadcrumb-item"><a href="examenes_frecuentes_configuracion.php">Exámenes
                                        Frecuentes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Pills-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 align-botton">
                                        <h4 class="text-white f-20 d-inline ml-4 mt-1 float-left">Configurar Exámenes
                                            Frecuentes</h4>
                                        <button id="busqueda_avanzada_1" type="button"
                                            class="btn btn-outline-light btn-sm d-inline float-right mr-4">
                                            <i class="feather icon-plus"></i> Búsqueda avanzada
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-gestion_bonos" role="tabpanel"
                                            aria-labelledby="pills-gestion_bonos-tab">
                                            <div id="busqueda_avanzada_aparecer_1" class="bg-light pt-4 pb-3 px-3 mb-3"
                                                style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <h6>Búsqueda Avanzada</h6>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label">Tipo de examen</label>
                                                            <select id="tipo_examen" name="tipo_examen"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Sangre</option>
                                                                <option>Orina</option>
                                                                <option>Radiológicos</option>
                                                                <option>Especialidades</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo" for="fecha_inicio"> Nombre
                                                                de Exámen</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="nombre_examen">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <div class="form-group">
                                                            <label class="floating-label">Grupo Fonasa</label>
                                                            <select id="grupo_fonasa" name="grupo_fonasa"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>01</option>
                                                                <option>02</option>
                                                                <option>03</option>
                                                                <option>04</option>
                                                                <option>05</option>
                                                                <option>06</option>
                                                                <option>07</option>
                                                                <option>08</option>
                                                                <option>09</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                                <option>13</option>
                                                                <option>14</option>
                                                                <option>15</option>
                                                                <option>16</option>
                                                                <option>17</option>
                                                                <option>18</option>
                                                                <option>19</option>
                                                                <option>20</option>
                                                                <option>21</option>
                                                                <option>22</option>
                                                                <option>23</option>
                                                                <option>24</option>
                                                                <option>25</option>
                                                                <option>26 </option>
                                                                <option>27</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3 text-center">
                                                        <button class="btn btn-block btn-sm btn-info"
                                                            type="submit">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="tabla_flujo_caja"
                                                class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-wrap text-center align-middle">Cod Examen</th>
                                                        <th class="text-center align-middle">Tipo del Examen</th>
                                                        <th class="text-center align-middle">Nombre del Examen</th>
                                                        <th class="text-center align-middle">Código Fonasa</th>
                                                        <th class="text-center align-middle">Seleccionar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle text-center">-</td>
                                                        <td class="align-middle text-center">-</td>
                                                        <td class="align-middle text-center">-</td>
                                                        <td class="align-middle text-center">-</td>
                                                        <td class="align-middle text-center">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="examen_2">
                                                                <label for="examen_2" class="cr"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Rendir Caja</h5>
                                                    <button id="busqueda_avanzada_2" type="button"
                                                        class="btn btn-outline-primary btn-sm float-right d-inline">Búsqueda
                                                        avanzada</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="busqueda_avanzada_aparecer_2" class="bg-light pt-4 pb-2 px-3 mb-3"
                                                style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por Profesional o
                                                                Institución</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Jaime Kriman Astorga</option>
                                                                <option>Laboratorio A</option>
                                                                <option>Centro Medico A</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por Previsión</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Fonasa</option>
                                                                <option>Cruz blanca</option>
                                                                <option>Masvida</option>
                                                                <option>Otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por valores</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Contado</option>
                                                                <option>Transbank</option>
                                                                <option>Cheque</option>
                                                                <option>Transferencia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo"
                                                                for="fecha_inicio">Fecha</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                id="date">
                                                            <!--HOY-->
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Entregado a:</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Encargado Caja </option>
                                                                <option>Administrador</option>
                                                                <option>Al profesional</option>
                                                                <option>Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 text-center">
                                                        <button class="btn btn-block btn-sm btn-info"
                                                            type="submit">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_rendir_caja"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Código de bono</th>
                                                            <th class="text-center align-middle">Convenio</th>
                                                            <th class="text-center align-middle">Fecha de Atención</th>
                                                            <th class="text-center align-middle">Nombre paciente</th>
                                                            <th class="text-center align-middle">Valor Total</th>
                                                            <th class="text-center align-middle">Estado Consulta</th>
                                                            <th class="text-center align-middle">Observaciones</th>
                                                            <th class="text-center align-middle">Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">123232</td>
                                                            <td class="align-middle text-center">Fonasa</td>
                                                            <td class="align-middle text-center">12/08/2021</td>
                                                            <td class="align-middle text-center">Pepita Sanchez</td>
                                                            <td class="align-middle text-center">$22.990</td>
                                                            <td class="align-middle text-center">Atendido</td>
                                                            <td class="align-middle text-center">No</td>
                                                            <td class="align-middle text-center">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" value="check1" /> </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-historial" role="tabpanel"
                                            aria-labelledby="pills-historial-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5 class="text-c-blue d-inline float-left f-18 pt-1">Historial</h5>
                                                    <button id="busqueda_avanzada_3" type="button"
                                                        class="btn btn-outline-primary btn-sm float-right d-inline">Búsqueda
                                                        avanzada</button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="busqueda_avanzada_aparecer_3" class="bg-light pt-4 pb-2 px-3 mb-3"
                                                style="display: none;">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por Profesional</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Jaime Kriman Astorga</option>
                                                                <option>Nombre del profesional</option>
                                                                <option>Nombre del profesional</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por Previsión</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Fonasa</option>
                                                                <option>Cruz blanca</option>
                                                                <option>Masvida</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label">Por valores</label>
                                                            <select id="estado_bono" name="estado_bono"
                                                                class="form-control form-control-sm">
                                                                <option>Seleccione una opción</option>
                                                                <option>Contado</option>
                                                                <option>Transbank</option>
                                                                <option>Cheque</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo" for="fecha_inicio">Fecha
                                                                de inicio</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                id="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo" for="fecha_inicio">Fecha
                                                                de término</label>
                                                            <input type="date" class="form-control form-control-sm"
                                                                id="date">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 text-center">
                                                        <button class="btn btn-block btn-sm btn-info"
                                                            type="submit">Buscar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="overflow-x:auto;">
                                                <table id="tabla_rendir_caja"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle">Código de bono</th>
                                                            <th class="text-center align-middle">Convenio</th>
                                                            <th class="text-center align-middle">Fecha de Atención</th>
                                                            <th class="text-center align-middle">Nombre paciente</th>
                                                            <th class="text-center align-middle">Valor Total</th>
                                                            <th class="text-center align-middle">Estado Consulta</th>
                                                            <th class="text-center align-middle">Observaciones</th>
                                                            <th class="text-center align-middle">Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">123232</td>
                                                            <td class="align-middle text-center">Fonasa</td>
                                                            <td class="align-middle text-center">12/08/2021</td>
                                                            <td class="align-middle text-center">Pepita Sanchez</td>
                                                            <td class="align-middle text-center">$22.990</td>
                                                            <td class="align-middle text-center">Atendido</td>
                                                            <td class="align-middle text-center">No</td>
                                                            <td class="align-middle text-center">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" value="check1" /> </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">-</td>
                                                            <td class="align-middle text-center">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox" value="check1" /> </label>
                                                                </div>
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
    </div>
    <!--Cierre: Container Completo-->
@endsection
