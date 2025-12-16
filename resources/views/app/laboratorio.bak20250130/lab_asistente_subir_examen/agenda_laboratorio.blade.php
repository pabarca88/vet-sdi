@extends('template.laboratorio.laboratorio_asistente_subir_ex.template')
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
                                <h5 class="m-b-10 font-weight-bold">Agenda</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_asistente_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Pacientes y pagos-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <p class="f-18 d-inline text-white">
                                    <span><strong>Laboratorio:&nbsp;&nbsp;</strong></span><!--Nombre del Laboratorio--><span>Laboratorio Clínico</span><!--Tipo de Laboratorio-->
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                        <label class="floating-label-activo">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="nacimiento_paciente" id="nacimiento_paciente">
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="floating-label">Laboratorio</label>
                                            <select id="comuna_paciente" name="comuna_paciente" class="form-control form-control-sm">
                                                <option>Seleccione una opción</option>
                                                <option>Centro Médico Santiago Centro</option>
                                                <option>Centro Médico Rancagua</option>
                                                <option>Centro Médico Viña del Mar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-info btn-block btn-sm">Filtrar</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="agenda_laboratorio" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-wrap text-center align-middle">Acción</th>
                                                <th class="text-wrap text-center align-middle">Pago</th>
                                                <th class="text-wrap text-center align-middle">Hora</th>
                                                <th class="text-center align-middle">Sucursal</th>
                                                <th class="text-wrap text-center align-middle">Paciente</th>
                                                <th class="text-center align-middle">Contacto Paciente</th>
                                                <th class="text-center align-middle">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-info btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Confirmar Hora"><i class="feather icon-check"></i></button>
                                                    <button href="#!" class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pago</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_venta_bonos_api" style="cursor: pointer;">Vender Bono</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_recepcion_bonos_api" style="cursor: pointer;">Recibir Bono o Programa</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_boleta_electronica" style="cursor: pointer;">Particular</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    13:00 hrs
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span><strong>Centro Médico Santiago Centro</strong></span><br>
                                                    <span>Portugal, Nº 571</span><br>
                                                    <span>Santiago Centro</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    Pepita Silva Mora<br>
                                                    19.243.455-1
                                                </td>
                                                <td class="text-center align-middle">paciente@gmail.com<br>+569 4324343</td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-success">
                                                    Hora confirmada</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-info btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Confirmar Hora"><i class="feather icon-check"></i></button>
                                                    <button class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pago</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_venta_bonos_api" style="cursor: pointer;">Vender Bono</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_recepcion_bonos_api" style="cursor: pointer;">Recibir Bono o Programa</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_boleta_electronica" style="cursor: pointer;">Particular</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    13:00 hrs
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span><strong>Centro Médico Santiago Centro</strong></span><br>
                                                    <span>Portugal, Nº 571</span><br>
                                                    <span>Santiago Centro</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    Pepita Silva Mora<br>
                                                    19.243.455-1
                                                </td>
                                                <td class="text-center align-middle">paciente@gmail.com<br>+569 4324343</td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-warning">
                                                    Hora pendiente</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-info btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Confirmar Hora"><i class="feather icon-check"></i></button>
                                                    <button class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pago</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_venta_bonos_api" style="cursor: pointer;">Vender Bono</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_recepcion_bonos_api" style="cursor: pointer;">Recibir Bono o Programa</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_boleta_electronica" style="cursor: pointer;">Particular</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    13:00 hrs
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span><strong>Centro Médico Santiago Centro</strong></span><br>
                                                    <span>Portugal, Nº 571</span><br>
                                                    <span>Santiago Centro</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    Pepita Silva Mora<br>
                                                    19.243.455-1
                                                </td>
                                                <td class="text-center align-middle">paciente@gmail.com<br>+569 4324343</td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-danger">
                                                    Hora cancelada</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-info btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Confirmar Hora"><i class="feather icon-check"></i></button>
                                                    <button class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" data-placement="top" title="Anular Hora"><i class="feather icon-x"></i></button>

                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group">
                                                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pago</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_venta_bonos_api" style="cursor: pointer;">Vender Bono</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_recepcion_bonos_api" style="cursor: pointer;">Recibir Bono o Programa</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#modal_boleta_electronica" style="cursor: pointer;">Particular</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    13:00 hrs
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span><strong>Centro Médico Santiago Centro</strong></span><br>
                                                    <span>Portugal, Nº 571</span><br>
                                                    <span>Santiago Centro</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    Pepita Silva Mora<br>
                                                    19.243.455-1
                                                </td>
                                                <td class="text-center align-middle">paciente@gmail.com<br>+569 4324343</td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-purple">
                                                    Esperando atención</span>
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
    <!--Cierre: Container Completo-->

<!--Modal Recepción de Bonos y programas-->
   <div id="modal_recepcion_bonos_api" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Recepcion de bonos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Recepción de bonos y programas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="pago_atencion_medica">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut" id="rut">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nº de bono o programa</label>
                                    <input type="text" class="form-control" name="bono" id="bono">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Profesional</label>
                                    <input type="text" class="form-control" name="profesional" id="profesional">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor total</label>
                                    <input name="valor_consulta" id="valor_consulta" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Convenio</label>
                                    <select id="prevision" name="previsioon" class="form-control">
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
                                <div class="form-group mb-3">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="recepcion_programa">
                                        <label for="recepcion_programa" class="cr"></label>
                                    </div>
                                    <label>Recepción de programa</label>
                                </div>
                                <div class="form-group" id="sesiones_programa" style="display:none">
                                    <label class="floating-label">Nº de Sesiones</label>
                                    <input name="n_sesiones" id="n_sesiones" type="number" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group text-center my-2 pb-2">
                                    <button type="submit" class="btn btn-success">Recepcionar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Modal Venta de Bonos API-->
    <div id="modal_venta_bonos_api" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_pago_consulta_0" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Pago de Atención Médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="pago_atencion_medica">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut" id="rut">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nº de serie</label>
                                    <input type="text" class="form-control" name="serie" id="serie">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor de la Consulta</label>
                                    <input name="valor_consulta" id="valor_consulta" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Previsión</label>
                                    <select id="prevision" name="previsioon" class="form-control"  >
                                        <option value="0">Selecione una opción</option>
                                        <option value="particular">Particular</option>
                                        <option value="fonasa">Fonasa</option>
                                        <option value="banmedica">Banmedica</option>
                                        <option value="colmena">Colmena</option>
                                        <option value="cruz verde">Cruz Verde</option>
                                        <option value="nueva masvida">Nueva MasVida</option>
                                        <option value="consalud">Consalud</option>
                                        <option value="control sin costo">Control sin costo</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="floating-label">Folio</label>
                                    <input type="number" class="form-control" name="folio" id="folio">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor Consulta</label>
                                    <input type="number" class="form-control" name="valor_consulta" id="valor_consulta">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor Pagar</label>
                                    <input type="number" class="form-control" name="valor_pagar" id="valor_pagar">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor Seguro</label>
                                    <input type="number" class="form-control" name="valor_seguro" id="valor_seguro">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor Copago</label>
                                    <input type="number" class="form-control" name="valor_copago" id="valor_copagp">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer py-1">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Pagar Atención Médica</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Modal Boleta electronica-->
    <div id="modal_boleta_electronica" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_pago_consulta_0" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white">Boleta electrónica (Servicios de Impuestos Internos)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
         $(document).ready(function()
        {
             $("#boton_pago").tooltip();
        });

    </script>

@endsection
