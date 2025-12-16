<!-- Modal consulta agenda profesional-->
<div id="consulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="consulta" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <input type="hidden" name="estado_id_profesional" id="estado_id_profesional" value="">
            <input type="hidden" name="estado_id_paciente" id="estado_id_paciente" value="">
            <input type="hidden" name="id_hora_medica" id="id_hora_medica" value="">
            <div class="modal-header bg-info pt-3 pb-3">
                <h6 id="cabecera_hora_medica" class="text-white f-16 mb-0 mt-0">Información del paciente</h6>
            </div>
            <div class="modal-body">

                <form id="datos_hora_medica">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" onclick="editar_info_paciente_asistente();" class="btn btn-sm btn-info-light-c float-right d-inline paciente_view_asistente has-ripple" style="">
                                <i class="feather icon-edit"></i> Editar
                            <span class="ripple ripple-animate"></span></button>
                        </div>
                        <input type="hidden" name="modificando_paciente_asistente" id="modificando_paciente_asistente" value="0">
                    </div>
                    <div class="row">
                        {{-- datos paciente --}}
                        <div class="col-sm-6 col-md-6">
                            <table class="table table-borderless table-xs text-break table-responsive modal-agenda">
                                <tbody>
                                    <!-- Fila RUT -->
                                    <tr>
                                        <th scope="row"><strong>Rut</strong></th>
                                        <td><span id="datos_consulta_rut"></span></td>
                                    </tr>

                                    <!-- Fila Nombre -->
                                    <tr>
                                        <th scope="row"><strong>Nombre</strong></th>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_nombre"></span>
                                            </div>

                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_nombre_asistente" value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_uno_asistente" value="">
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_apellido_dos_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Fecha Nacimiento -->
                                    <tr>
                                        <th scope="row"><strong>Fecha Nacimiento</strong></th>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_edad"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <input type="text"
                                                    class="mask_date form-control form-control-sm"
                                                    name="input_reserva_fecha_nacimiento_asistente"
                                                    id="input_reserva_fecha_nacimiento_asistente"
                                                    onchange="evaluar_edad();"
                                                    maxlength="10"
                                                    placeholder="dd/mm/aaaa"
                                                    autocomplete="off"
                                                    data-mask="00/00/0000" />
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Sexo -->
                                    <tr>
                                        <th scope="row"><strong>Sexo</strong></th>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_sexo"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <select id="input_reserva_sexo_asistente" class="form-control form-control-sm">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Email -->
                                    <tr>
                                        <th scope="row"><strong>Email</strong></th>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_email"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_email_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Teléfono -->
                                    <tr>
                                        <th scope="row"><strong>Telefono</strong></th>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_telefono"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control form-control-sm" id="input_reserva_hora_telefono_asistente" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Botones (solo en modo edición) -->
                                    <tr class="paciente_edit_asistente" style="display:none">
                                        <td colspan="2" class="text-right">
                                            <div class="d-flex justify-content-end">
                                                <button type="button" id="cancelar_modifcar_paciente" onclick="cancelar_modificacion_paciente_asistente();" class="btn btn-sm btn-danger mr-2">
                                                    <i class="feather icon-x"></i> Cancelar actualización
                                                </button>
                                                <button type="button" id="actualizar_modificar_paciente" onclick="actualizar_paciente_asistente();" class="btn btn-sm btn-info">
                                                    <i class="feather icon-check"></i> Actualizar paciente
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Fila Observaciones -->
                                    <tr>
                                        <th scope="row"><strong>Observaciones</strong></th>
                                        <td><span id="datos_consulta_observaciones"></span></td>
                                    </tr>

                                    <!-- Fila Fecha última consulta -->
                                    <tr>
                                        <th scope="row"><strong>Fecha última consulta</strong></th>
                                        <td><span id="datos_consulta_fecha_ultima"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- procedimientos --}}
                        <div class="col-sm-6 col-md-6" id="seccion_examenes">

                        </div>
                    </div>
                </form>

                <form id="cancelacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">

                            <div class="form-group ">
                                <label class="floating-label">Comentarios</label>
                                <input type="text" class="form-control" id="cancelar_hora_comentario" name="cancelar_hora_comentario">
                            </div>

                        </div>
                    </div>
                </form>

                <form id="confirmacion_hora_medica">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group ">
                                <label class="floating-label-activo-sm">Vía de Confirmación</label>
                                {{--  <input type="text" class="form-control" id="confirmar_hora_comentario" name="confirmar_hora_comentario">  --}}
                                <select class="form-control" name="confirmar_hora_comentario" id="confirmar_hora_comentario">
                                    @if (isset($reg_confirmacion_hora))
                                        @foreach ($reg_confirmacion_hora as $reg)
                                            <option value="{{ $reg->nombre }}">
                                                {{ $reg->nombre }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="0">Seleccione</option>
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">

                <div>
                    <button type="button" onclick="opcion_cancelar_hora();" id="hm_anular_hora"
                        class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i>  Anular
                        Hora
                    </button>
                </div>
                <div>
                    <button type="submit" onclick="opcion_confirmar_hora()" id="hm_confirmar_hora" class="btn btn-success btn-sm"><i class="feather icon-check"></i> Confirmar
                        Hora
                    </button>
                </div>
                <div>
                    <button type="submit" id="hm_ver_hora" class="btn btn-info btn-sm"><i class="feather icon-file"></i> Ver Atención</button>
                </div>

                <div>
                    {{-- <form method="get" action="{{ ($lugar_atencion==87)?route('profesional.realizar_consulta_sdi'):route('profesional.realizar_consulta') }}"> --}}
                    <form method="get" action="{{ route('laboratorio.ver.ficha.atencion.orl') }}">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">
                        <input type="hidden" name="lugar_atencion_id" id="lugar_atencion_id" value="">

                        <button type="submit" id="hm_atender_hora" class="btn btn-info btn-sm"><i class="feather icon-check"></i> Atender</button>
                    </form>
                </div>

                <div>
                    <form method="get" action="#">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">

                        <button type="submit" id="hm_espera_paciente_hora" class="btn btn-info btn-sm"
                            onclick="paciente_esperando();">Esperando</button>
                    </form>
                </div>

                <div>
                    <button type="button" id="cerrarModal" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="$('#consulta').modal('hide');"> <i class="feather icon-x"></i> Cerrar
                    </button>
                </div>
                <div>
                    <button type="button" id="confirmar_anulacion_hora" onclick="cancelar_hora();"
                        class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Anular
                        Hora
                    </button>
                </div>
                <div>
                    <button type="button" id="confirmacion_hora" onclick="confirmar_hora();"
                        class="btn btn-success btn-sm"><i class="feather icon-check"></i> Confirmar
                        Hora
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
