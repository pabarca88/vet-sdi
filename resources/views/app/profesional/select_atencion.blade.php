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
                                <h5 class="m-b-10 font-weight-bold">Escritorio Profesional</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="/configurar_lugar_atencion">Configuración de Mis Lugares de Atención</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Botones-->
            <div class="row m-b-12">
                <div class="col-md-12">
                    <div class="card-deck">
                        <div class="card subir py-12">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CIERRE:Botones-->
        </div>
    </div>
    <!--Cierre: Container Completo-->
    <div id="reserva" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="reserva" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_paciente_reserva_title">Reserva de Horas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_reseva_de_horas" action="#">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion">
                        <input type="hidden" name="fecha" id="fecha">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                <h6 class="text-c-blue">Información del Paciente</h6>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input name="dni" id="dni" type="text" class="form-control">
                                </div>
                            </div>
                            <!--registrados -->
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input name="reserva_hora_nombre" id="reserva_hora_nombre" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Primer Apellido</label>
                                    <input name="reserva_hora_primer_apellido" id="reserva_hora_primer_apellido" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Segundo Apellido</label>
                                    <input name="reserva_hora_segundo_apellido" id="reserva_hora_segundo_apellido"
                                        type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo Electrónico</label>
                                    <input name="reserva_hora_email" id="reserva_hora_email" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input name="reserva_hora_telefono" id="reserva_hora_telefono" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <h6 class="text-c-blue">
                                    Enviar Confirmación
                                </h6>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="switch-s-1" checked>
                                        <label for="switch-s-1" class="cr"></label>
                                    </div>
                                    <label>Correo Electrónico</label>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="switch-s-2" checked>
                                        <label for="switch-s-2" class="cr"></label>
                                    </div>
                                    <label>SMS</label>
                                </div>
                            </div>
                            <!--Cierre: Datos para pacientes no registrados -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-info">Reservar Hora</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="confirmar_hora" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmar_hora"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Confirmación de Atención Médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="form_confirmacion"">
              <input type=" hidden" name="id_hora_medica" id="id_hora_medica">
                        <div class="form-row">
                            Confirmar la hora del paciente
                            <span id="confirmacion_nombre"></span>
                            <br>
                            <span id="confirmacion_fecha"></span>
                            <br>
                            <span id="confirmacion_hora"></span>
                        </div>
                        <div class="modal-footer py-1">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-info">Confirmar Atención Médica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="pago_consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pago_consulta"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Pago de Atención Médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="pago_atencion_medica">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label class="floating-label">Rut</label>
                                    <input type="person" class="form-control" name="rut" id="rut"
                                        placeholder="7.727.734-0 (bloqueado)">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nº de serie</label>
                                    <input type="text" class="form-control" name="serie" id="serie">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        placeholder="Carlos Arturo Vegas Montenegro (bloqueado)">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Valor de la Consulta</label>
                                    <input name="valor_consulta" id="valor_consulta" type="number" class="form-control"
                                        placeholder="$5.000">
                                </div>
                                <div class="form-group">
                                    <label class="floating-label">Previsión</label>
                                    <select id="prevision" name="previsioon" class="form-control">
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
                                <div class="form-group mb-0">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="aporte_previsional" checked>
                                        <label for="aporte_previsional" class="cr"></label>
                                    </div>
                                    <label>Aporte Previsional</label>
                                </div>
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="trae_bono" checked>
                                        <label for="trae_bono" class="cr"></label>
                                    </div>
                                    <label>Trae Bono</label>
                                </div>
                                <div class="form-group text-center mt-1">
                                    <button type="button" class="btn btn-success">Ingresar Pago</button>
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
                                    <input type="number" class="form-control" name="valor_copagp" id="valor_copagp">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer py-1">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-info">Pagar Atención Médica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="ver_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ver_atencion"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Ver de Atención Médica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="pago_atencion_medica">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                Ver de Atención Médica
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer py-1">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Ver Atención Médica</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="atender_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="atender_paciente"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal_pago_consulta_title">Atender paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <form id="pago_atencion_medica">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                Atender paciente
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer py-1">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Comenzar atención</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
