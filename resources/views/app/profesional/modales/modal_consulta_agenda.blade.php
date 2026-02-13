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
                        <div class="col-sm-12 col-md-12">
                            <table class="table table-borderless table-xs text-break table-responsive modal-agenda">
                                <tbody>
                                    <tr>
                                        <th><strong class="f-18 text-purple">Información de la mascota</strong></th>
                                    </tr>
                                     <tr>
                                        <th scope="row">
                                            <strong>Nombre mascota</strong>
                                        <td>
                                            <span id="datos_consulta_mascota_nombre"></span>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Especie</strong>
                                        <td>
                                            <span id="datos_consulta_mascota_raza"></span>
                                        </td>
                                        </th>
                                    </tr>
                                     <tr>
                                        <th scope="row">
                                            <strong>Estirilizado</strong>
                                        <td>
                                            <span id="datos_consulta_mascota_esterilizado"></span>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Última consulta</strong>
                                        <td>
                                            <span id="datos_consulta_mascota_ultima_consulta"></span>
                                        </td>
                                        </th>
                                    </tr>
                                     <!-- <tr>
                                        <th scope="row">
                                            <strong class="f-18 text-purple">Fecha última consulta</strong>
                                        <td>
                                            <span id="datos_consulta_mascota_fecha_ultima"></span>
                                        </td>
                                        </th>
                                    </tr> -->

                                    <tr>
                                        <th><strong class="f-18 text-purple">Información del responsable</strong></th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Rut</strong>
                                            <td>
                                                <span id="datos_consulta_rut"></span>
                                            </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Nombre</strong>
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
                                        </th>
                                    </tr>
                                    <!--<tr>
                                        <th scope="row">
                                            <strong>Fecha Nacimiento</strong>
                                        <td>
                                            <div class="paciente_view_asistente">
                                                <span id="datos_consulta_edad"></span>
                                            </div>
                                            <div class="paciente_edit_asistente" style="display:none">
                                                <input type="text" class="mask_date form-control form-control-sm"
                                                    name="input_reserva_fecha_nacimiento_asistente" id="input_reserva_fecha_nacimiento_asistente"
                                                    onchange="evaluar_edad();"
                                                    maxlength="10" placeholder="dd/mm/aaaa"
                                                    autocomplete="off"
                                                    data-mask="00/00/0000"
                                                />
                                            </div>

                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Sexo</strong>
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
                                        </th>
                                    </tr>-->
                                    <tr>
                                        <th scope="row">
                                            <strong>Email</strong>
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
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <strong>Telefono</strong>
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
                                        </th>
                                    </tr>
                                    {{-- direccion --}}
                                     <tr>
                                        <th scope="row">
                                            <strong>Dirección</strong>
                                        </th>
                                        <td>
                                            Marcela Paz 1520, Los Andes. Región de Valparaíso. <!--QUE LA DIRECCION APAREZCA EN UNA O MAXIMO DOS LINEAS PERO TODA JUNTA NO POR SEPARADO-->
                                        </td>
                                    </tr>
                                    <tr class="paciente_edit_asistente" style="display:none">

                                        <td>
                                            <button type="button" id="cancelar_modifcar_paciente" onclick="cancelar_modificacion_paciente_asistente();" class="btn btn-sm btn-danger has-ripple">
                                                <i class="feather icon-x"></i> Cancelar actualización
                                            <span class="ripple ripple-animate" style="height: 181.038px; width: 181.038px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -74.4315px; left: 20.481px;"></span></button>
                                        </td>
                                        <td>
                                            <button type="button" id="actualizar_modificar_paciente" onclick="actualizar_paciente_asistente();" class="btn btn-sm btn-info">
                                                <i class="feather icon-check"></i> Actualizar paciente
                                            </button>

                                        </td>
                                    </tr>
                                    <!--<tr>
                                        <th scope="row">
                                            <strong>Observaciones</strong>
                                        <td>
                                            <span id="datos_consulta_observaciones"></span>
                                        </td>
                                        </th>
                                    </tr>-->
                                   
                                </tbody>
                            </table>
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
                    <form method="get" action="{{ ($lugar_atencion==87)?route('profesional.realizar_consulta_sdi'):route('profesional.realizar_consulta') }}">
                        @csrf
                        <input type="hidden" name="id_hora_realizar" id="id_hora_realizar" val="">
                        <input type="hidden" name="lugar_atencion_id" id="lugar_atencion_id" value="{{ $lugar_atencion }}">
                        <input type="hidden" name="id_mascota" id="id_mascota" value="">

                        <button type="submit" id="hm_atender_hora" class="btn btn-info btn-sm"><i class="feather icon-check"></i> Atender</button>
                    </form>
                </div>
                <div>
                    <button type="button" id="hm_registrar_mascota" class="btn btn-warning btn-sm" style="display:none;" onclick="abrirModalRegistroMascotaAgenda();">
                        <i class="feather icon-plus"></i> Registrar mascota
                    </button>
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
                    <button type="submit" onclick="opcion_revisar_ficha()" id="hm_revisar_ficha" class="btn btn-success btn-sm"><i class="feather icon-check"></i> Revisar ficha
                        Hora
                    </button>
                    <button type="button" id="cerrarModal" class="btn btn-secondary btn-sm" data-dismiss="modal"> <i class="feather icon-x"></i> Cerrar
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

<div id="modal_registrar_mascota_agenda" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarMascotaAgendaLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modalRegistrarMascotaAgendaLabel">Agregar Mascota no registrada</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="agenda_mascota_id_paciente" value="">
                <input type="hidden" id="agenda_mascota_id_hora_medica" value="">

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">¿Tiene chip?</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_tiene_chip">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6" id="agenda_contenedor_chip" style="display:none;">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ingrese N° chip</label>
                            <input type="text" class="form-control form-control-sm" id="agenda_mascota_chip">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre Mascota</label>
                            <input type="text" class="form-control form-control-sm" id="agenda_mascota_nombre">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Especie</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_especie"></select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Raza</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_raza">
                                <option value="">Seleccione</option>
                                <option value="sin">Sin raza</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo de mascota (Tamaño)</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_tamano"></select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">¿Esterilizado?</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_esterilizado">
                                <option value="">Seleccione</option>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6" id="agenda_contenedor_fecha_esterilizacion" style="display:none;">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha de esterilización</label>
                            <input type="date" class="form-control form-control-sm" id="agenda_mascota_fecha_esterilizacion" max="{{ date('Y-m-d') }}">
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" id="agenda_mascota_fecha_esterilizacion_desconocida">
                                <label class="form-check-label" for="agenda_mascota_fecha_esterilizacion_desconocida">No se conoce</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">F. Nacimiento</label>
                            <input type="date" class="form-control form-control-sm" id="agenda_mascota_fecha_nacimiento" max="{{ date('Y-m-d') }}">
                            <div class="form-check mt-1">
                                <input class="form-check-input" type="checkbox" id="agenda_mascota_fecha_nacimiento_desconocida">
                                <label class="form-check-label" for="agenda_mascota_fecha_nacimiento_desconocida">No se conoce</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Sexo</label>
                            <select class="form-control form-control-sm" id="agenda_mascota_sexo">
                                <option value="0">Selecione una opción</option>
                                <option value="M">Macho</option>
                                <option value="F">Hembra</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Enfermedad crónica o frecuente</label>
                            <textarea class="form-control form-control-sm" id="agenda_mascota_enfermedad_cronica" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" id="btn_guardar_mascota_agenda"><i class="feather icon-check"></i> Registrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var agendaEspeciesMascotas = @json($especiesMascotas ?? []);
    var agendaTamanosMascotas = @json($tamanosMascotas ?? []);
    var agendaEspecieTamanosMascotas = @json($especieTamanosMascotas ?? []);
    var agendaRazasMascotasCache = {};

    function abrirModalRegistroMascotaAgenda() {
        let idPaciente = $('#estado_id_paciente').val();
        let idHoraMedica = $('#id_hora_medica').val();
        if (!idPaciente) {
            swal({
                title: "Registro de mascota",
                text: "No se encontró el responsable para registrar la mascota.",
                icon: "error",
                buttons: "Aceptar",
            });
            return;
        }

        limpiarFormularioMascotaAgenda();
        $('#agenda_mascota_id_paciente').val(idPaciente);
        $('#agenda_mascota_id_hora_medica').val(idHoraMedica || '');
        $('#consulta').modal('hide');
        $('#modal_registrar_mascota_agenda').modal('show');
    }

    function mostrarAlertaSinMascotaAgenda() {
        swal({
            title: "Mascota no registrada",
            text: "Este responsable no tiene mascotas registradas. Debe registrar una mascota antes de atender la hora.",
            icon: "warning",
            buttons: {
                cancel: "Cerrar",
                confirm: {
                    text: "Registrar mascota",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }
        }).then(function(confirmado) {
            if (confirmado) {
                abrirModalRegistroMascotaAgenda();
            }
        });
    }

    function actualizarEstadoMascotaAgenda() {
        let idMascota = $.trim($('#id_mascota').val());
        let atenderVisible = $('#hm_atender_hora').is(':visible');
        let registrarVisible = $('#hm_registrar_mascota').is(':visible');

        if ((atenderVisible || registrarVisible) && idMascota === '') {
            $('#hm_atender_hora').hide();
            $('#hm_registrar_mascota').show();
            return true;
        }

        if (idMascota !== '' && registrarVisible) {
            $('#hm_registrar_mascota').hide();
            $('#hm_atender_hora').show();
            return false;
        }

        $('#hm_registrar_mascota').hide();
        return false;
    }

    $(document).on('click', '#hm_atender_hora', function(e) {
        let idMascota = $.trim($('#id_mascota').val());
        if (idMascota === '') {
            e.preventDefault();
            mostrarAlertaSinMascotaAgenda();
        }
    });

    function limpiarFormularioMascotaAgenda() {
        $('#agenda_mascota_tiene_chip').val('0');
        $('#agenda_mascota_chip').val('');
        $('#agenda_mascota_nombre').val('');
        $('#agenda_mascota_raza').html('<option value="">Seleccione</option><option value="sin">Sin raza</option>');
        $('#agenda_mascota_esterilizado').val('');
        $('#agenda_mascota_fecha_esterilizacion').val('');
        $('#agenda_mascota_fecha_esterilizacion_desconocida').prop('checked', false);
        $('#agenda_mascota_fecha_nacimiento').val('');
        $('#agenda_mascota_fecha_nacimiento_desconocida').prop('checked', false);
        $('#agenda_mascota_sexo').val('0');
        $('#agenda_mascota_enfermedad_cronica').val('');

        renderSelectEspeciesAgenda();
        actualizarTamanoSegunEspecieAgenda();
        toggleChipAgenda();
        toggleEsterilizacionAgenda();
        toggleFechaNacimientoDesconocidaAgenda();
    }

    function renderSelectEspeciesAgenda() {
        var html = '<option value="0">Seleccione</option>';
        (agendaEspeciesMascotas || []).forEach(function(item) {
            html += '<option value="' + item.id + '">' + item.nombre + '</option>';
        });
        $('#agenda_mascota_especie').html(html);
    }

    function actualizarTamanoSegunEspecieAgenda() {
        var especieId = parseInt($('#agenda_mascota_especie').val(), 10);
        var permitidos = (agendaEspecieTamanosMascotas || [])
            .filter(function(item) { return parseInt(item.especie_id, 10) === especieId; })
            .map(function(item) { return parseInt(item.tamano_id, 10); });
        var html = '<option value="">Seleccione</option>';
        (agendaTamanosMascotas || []).forEach(function(item) {
            if (!permitidos.length || permitidos.indexOf(parseInt(item.id, 10)) >= 0) {
                html += '<option value="' + item.id + '">' + item.nombre + '</option>';
            }
        });
        $('#agenda_mascota_tamano').html(html);
    }

    function actualizarRazaSegunEspecieAgenda() {
        var especieId = $('#agenda_mascota_especie').val();
        var $select = $('#agenda_mascota_raza');
        $select.html('<option value="">Seleccione</option><option value="sin">Sin raza</option>');

        if (!especieId || especieId === '0') {
            return;
        }

        if (agendaRazasMascotasCache[especieId]) {
            agendaRazasMascotasCache[especieId].forEach(function(raza) {
                $select.append('<option value="' + raza.id + '">' + raza.nombre + '</option>');
            });
            return;
        }

        $.get("{{ route('paciente.mascotas.razas', ['especie' => '__id__']) }}".replace('__id__', especieId))
            .done(function(data) {
                var razas = (data && data.razas) ? data.razas : [];
                agendaRazasMascotasCache[especieId] = razas;
                razas.forEach(function(raza) {
                    $select.append('<option value="' + raza.id + '">' + raza.nombre + '</option>');
                });
            });
    }

    function toggleChipAgenda() {
        var mostrar = $('#agenda_mascota_tiene_chip').val() === '1';
        $('#agenda_contenedor_chip').toggle(mostrar);
        if (!mostrar) {
            $('#agenda_mascota_chip').val('');
        }
    }

    function toggleEsterilizacionAgenda() {
        var mostrar = $('#agenda_mascota_esterilizado').val() === '1';
        $('#agenda_contenedor_fecha_esterilizacion').toggle(mostrar);
        if (!mostrar) {
            $('#agenda_mascota_fecha_esterilizacion').val('');
            $('#agenda_mascota_fecha_esterilizacion_desconocida').prop('checked', false);
        }
        toggleFechaEsterilizacionDesconocidaAgenda();
    }

    function toggleFechaNacimientoDesconocidaAgenda() {
        var desconocida = $('#agenda_mascota_fecha_nacimiento_desconocida').is(':checked');
        $('#agenda_mascota_fecha_nacimiento').prop('disabled', desconocida);
        if (desconocida) {
            $('#agenda_mascota_fecha_nacimiento').val('');
        }
    }

    function toggleFechaEsterilizacionDesconocidaAgenda() {
        var mostrar = $('#agenda_mascota_esterilizado').val() === '1';
        var desconocida = $('#agenda_mascota_fecha_esterilizacion_desconocida').is(':checked');
        $('#agenda_mascota_fecha_esterilizacion').prop('disabled', mostrar && desconocida);
        if (mostrar && desconocida) {
            $('#agenda_mascota_fecha_esterilizacion').val('');
        }
    }

    function guardarMascotaAgenda() {
        var tieneChip = $('#agenda_mascota_tiene_chip').val();
        var chip = $('#agenda_mascota_chip').val();
        var nombre = $('#agenda_mascota_nombre').val();
        var especie = $('#agenda_mascota_especie').val();
        var razaSeleccionada = $('#agenda_mascota_raza').val();
        var raza = (razaSeleccionada === 'sin') ? '' : razaSeleccionada;
        var tamano = $('#agenda_mascota_tamano').val();
        var esterilizado = $('#agenda_mascota_esterilizado').val();
        var fechaEsterilizacion = $('#agenda_mascota_fecha_esterilizacion').val();
        var fechaEsterilizacionDesconocida = $('#agenda_mascota_fecha_esterilizacion_desconocida').is(':checked');
        var fechaNacimiento = $('#agenda_mascota_fecha_nacimiento').val();
        var fechaNacimientoDesconocida = $('#agenda_mascota_fecha_nacimiento_desconocida').is(':checked');
        var sexo = $('#agenda_mascota_sexo').val();
        var enfermedadCronica = $('#agenda_mascota_enfermedad_cronica').val();

        var mensaje = '';
        if (!nombre) mensaje += 'Nombre Mascota: requerido\n';
        if (!especie || especie === '0') mensaje += 'Especie: requerido\n';
        if (!tamano) mensaje += 'Tipo de mascota (Tamaño): requerido\n';
        if (!esterilizado && esterilizado !== '0') mensaje += 'Esterilizado: requerido\n';
        if (esterilizado === '1' && !fechaEsterilizacion && !fechaEsterilizacionDesconocida) mensaje += 'Fecha de esterilización: requerido\n';
        if (!fechaNacimiento && !fechaNacimientoDesconocida) mensaje += 'Fecha de nacimiento: requerido\n';
        if (!sexo || sexo === '0') mensaje += 'Sexo: requerido\n';
        if (tieneChip === '1' && !chip) mensaje += 'N° chip: requerido\n';

        if (mensaje) {
            swal({
                title: "Registro de Mascota. Campos Requeridos",
                text: mensaje,
                icon: "error",
            });
            return;
        }

        $.ajax({
            url: "{{ route('profesional.registrar_mascota_agenda') }}",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_paciente: $('#agenda_mascota_id_paciente').val(),
                id_hora_medica: $('#agenda_mascota_id_hora_medica').val(),
                tiene_chip: tieneChip,
                chip: (tieneChip === '1') ? chip : '',
                nombre: nombre,
                especie_id: especie,
                raza_id: raza,
                tamano_id: tamano,
                esterilizado: esterilizado,
                fecha_esterilizacion: (esterilizado === '1' && !fechaEsterilizacionDesconocida) ? fechaEsterilizacion : '',
                fecha_esterilizacion_desconocida: fechaEsterilizacionDesconocida ? 1 : 0,
                fecha_nacimiento: fechaNacimientoDesconocida ? '' : fechaNacimiento,
                fecha_nacimiento_desconocida: fechaNacimientoDesconocida ? 1 : 0,
                sexo: sexo,
                enfermedad_cronica: enfermedadCronica
            },
        }).done(function(data) {
            if (data.estado == 1 && data.registro) {
                var mascota = data.registro;
                var especieTexto = mascota.especieMascota && mascota.especieMascota.nombre ? mascota.especieMascota.nombre : '';
                $('#id_mascota').val(mascota.id);
                $('#datos_consulta_mascota_nombre').text(mascota.nombre || '');
                $('#datos_consulta_mascota_raza').text(especieTexto || '');
                $('#datos_consulta_mascota_esterilizado').text(mascota.esterilizado ? 'SI' : 'NO');
                actualizarEstadoMascotaAgenda();

                $('#modal_registrar_mascota_agenda').modal('hide');
                $('#consulta').modal('show');

                swal({
                    title: "Registro de Mascota.",
                    text: "Mascota registrada con éxito.",
                    icon: "success",
                });
            } else {
                var textoError = data.msj || 'Problemas al realizar el registro.';
                if (data.error) textoError += '\n' + JSON.stringify(data.error);
                swal({
                    title: "Registro de Mascota.",
                    text: textoError,
                    icon: "error",
                });
            }
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    }

    $(document).on('change', '#agenda_mascota_tiene_chip', toggleChipAgenda);
    $(document).on('change', '#agenda_mascota_especie', function() {
        actualizarTamanoSegunEspecieAgenda();
        actualizarRazaSegunEspecieAgenda();
    });
    $(document).on('change', '#agenda_mascota_esterilizado', toggleEsterilizacionAgenda);
    $(document).on('change', '#agenda_mascota_fecha_nacimiento_desconocida', toggleFechaNacimientoDesconocidaAgenda);
    $(document).on('change', '#agenda_mascota_fecha_esterilizacion_desconocida', toggleFechaEsterilizacionDesconocidaAgenda);
    $(document).on('click', '#btn_guardar_mascota_agenda', guardarMascotaAgenda);

    $('#modal_registrar_mascota_agenda').on('hidden.bs.modal', function () {
        if ($.trim($('#id_mascota').val()) === '') {
            $('#consulta').modal('show');
        }
    });

    function opcion_revisar_ficha() {
        let id_hora_medica = $('#id_hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let csrfToken = $('meta[name="csrf-token"]').attr('content'); // Obtener el token CSRF

        // Construir la URL con los parámetros
        let url = `/Profesional/Paciente/Ficha_consulta?_token=${csrfToken}&id_hora_realizar=${id_hora_medica}&lugar_atencion_id=${id_lugar_atencion}`;

        // Redirigir a la URL
        window.location.href = url;
    }

</script>
