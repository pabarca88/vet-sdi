
<!--Modal reservar hora -->
<div class="modal fade" id="indicar_terapia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="indicar_terapia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Plan de tratamiento</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#indicar_terapia').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
                <input type="hidden" name="modal_reserva_hora_tipo_agenda" id="modal_reserva_hora_tipo_agenda" value="1">
                <form id="form_plan_nutri">
                    <div id="planificacion" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill d-flex justify-content-between">
                                <h6 class="form_fono">INDICACIONES AL PACIENTE</h6>
                                <span id="numero_sesion" class="badge badge-warning" style="font-size: 15px;"></span>
                            </div><br>
                            <span id="consulta" class="badge badge-warning float-right mb-4" style="font-size: 15px;"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        {{-- <div class="col-sm-4 mt-2">
                            <label class="floating-label-activo-sm">Fecha Inicio Tratamiento</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_tratamiento" id="fecha_inicio_tratamiento">
                        </div> --}}
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text" class="form-control form-control-sm" data-input_igual="hipotesis" name="diagnostico_tratamiento" id="diagnostico_tratamiento" onchange="cargarIgual('diagnostico_tratamiento')">
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm">Tratamiento a seguir</label>
                            <input type="text" class="form-control form-control-sm" name="tratamiento_seguir" id="tratamiento_seguir">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-3 mt-2">
                            <label class="floating-label-activo-sm">Número de Sesiones</label>
                            <input type="number" class="form-control form-control-sm" name="numero_sesiones" id="numero_sesiones">
                        </div>
                        <div class="col-sm-3 mt-2">
                            <label class="floating-label-activo-sm">Tipo de sesiones</label>
                            <select name="tipo_sesiones" id="tipo_sesiones" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Solo control</option>
                                <option value="2">Terapia individual</option>
                                <option value="3">Terapia grupal</option>
                            </select>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <label class="floating-label-activo-sm">Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="objetivos" id="objetivos"></textarea>
                        </div>
                        <br>
                    </div>

                    <div class="form-row mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm" for="obs_plan_tratamiento">Obs. Plan de tratamiento</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Plan de tratamiento" data-seccion=" Plan de tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_plan_tratamiento" id="obs_plan_tratamiento"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="contenedor_agendar_hora">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-active-sm mb-0">Lugar de atención</label>
                                    <select class="form-control form-control-sm" id="modal_reserva_hora_lugar_atencion" name="modal_reserva_hora_lugar_atencion" onchange="carga_calendario_profesional();">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="mt-4">Usted atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                            {{--  <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                </div>
                            </div>  --}}
                        </div>

                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-2 mt-0">
                                    <label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
                                    {{-- <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  disabled="disabled"/> --}}
                                    <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
                                </div>
                                <div class="col-md-12 mx-auto" >
                                    <div class="row" id="modal_reserva_hora_lista_horas">
                                        {{--  <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
                                            8:00
                                        </div>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
                                Reservar hora</button>  --}}
                            <label class="label">Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function ind_terapia() {
        limpiar_ind_terapia();
        $('#indicar_terapia').modal('show');
    }
    $(document).ready(function() {
        $('#select_1_psi_vidadiaria_1').select2();
        $('#select_2_psi_ant_cond_1').select2();
        $('#select_3_psi_laboral_1').select2();
        $('#select_4_psi_autoestima_1').select2();

        $('#select_1_psi_vidadiaria_2').select2();
        $('#select_2_psi_ant_cond_2').select2();
        $('#select_3_psi_laboral_2').select2();
        $('#select_4_psi_autoestima_2').select2();

        $('#select_1_psi_vidadiaria_3').select2();
        $('#select_2_psi_ant_cond_3').select2();
        $('#select_3_psi_laboral_3').select2();
        $('#select_4_psi_autoestima_3').select2();
    });

    function registrar_ind_terapia()
    {

        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var psi_vidadiaria_1 = $('#select_1_psi_vidadiaria_1').val();
        var psi_ant_cond_1 = $('#select_2_psi_ant_cond_1').val();
        var psi_laboral_1 = $('#select_3_psi_laboral_1').val();
        var psi_autoestima_1 = $('#select_4_psi_autoestima_1').val();
        var obs_ind_terapia_psi_1 = $('#obs_ind_terapia_psi_1').val();

        var psi_vidadiaria_2 = $('#select_1_psi_vidadiaria_2').val();
        var psi_ant_cond_2 = $('#select_2_psi_ant_cond_2').val();
        var psi_laboral_2 = $('#select_3_psi_laboral_2').val();
        var psi_autoestima_2 = $('#select_4_psi_autoestima_2').val();
        var obs_ind_terapia_psi_2 = $('#obs_ind_terapia_psi_2').val();

        var psi_vidadiaria_3 = $('#select_1_psi_vidadiaria_3').val();
        var psi_ant_cond_3 = $('#select_2_psi_ant_cond_3').val();
        var psi_laboral_3 = $('#select_3_psi_laboral_3').val();
        var psi_autoestima_3 = $('#select_4_psi_autoestima_3').val();
        var obs_ind_terapia_psi_3 = $('#obs_ind_terapia_psi_3').val();

        var mensaje_registros = '';
        var error_en_proceso = 0;

        var url = '{{ route("ficha.otro.prof.plan_tratamiento.registro") }}';

        var token = CSRF_TOKEN;

        if( psi_vidadiaria_1 != '' || psi_ant_cond_1 != '' || psi_laboral_1 != '' || psi_autoestima_1 != '' || obs_ind_terapia_psi_1 != ''
            || psi_vidadiaria_2 != '' || psi_ant_cond_2 != '' || psi_laboral_2 != '' || psi_autoestima_2 != '' || obs_ind_terapia_psi_2 != ''
            || psi_vidadiaria_3 != '' || psi_ant_cond_3 != '' || psi_laboral_3 != '' || psi_autoestima_3 != '' || obs_ind_terapia_psi_3 != ''
        )
        {
            if( psi_vidadiaria_1 != '' || psi_ant_cond_1 != '' || psi_laboral_1 != '' || psi_autoestima_1 != '' || obs_ind_terapia_psi_1 != '' )
            {
                /** terapia 1 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:1,
                        psi_vidadiaria:psi_vidadiaria_1.join(", "),
                        psi_ant_cond:psi_ant_cond_1.join(", "),
                        psi_laboral:psi_laboral_1.join(", "),
                        psi_autoestima:psi_autoestima_1.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_1,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1)
                    {
                        $('#select_1_psi_vidadiaria_1').val('').select2();
                        $('#select_2_psi_ant_cond_1').val('').select2();
                        $('#select_3_psi_laboral_1').val('').select2();
                        $('#select_4_psi_autoestima_1').val('');
                        $('#obs_ind_terapia_psi_1').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 1, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 1, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 1 sin valores.\n';
            }

            if( psi_vidadiaria_2 != '' || psi_ant_cond_2 != '' || psi_laboral_2 != '' || psi_autoestima_2 != '' || obs_ind_terapia_psi_2 != '' )
            {
                /** terapia 2 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:2,
                        psi_vidadiaria:psi_vidadiaria_2.join(", "),
                        psi_ant_cond:psi_ant_cond_2.join(", "),
                        psi_laboral:psi_laboral_2.join(", "),
                        psi_autoestima:psi_autoestima_2.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_2,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1) {

                        $('#select_1_psi_vidadiaria_2').val('').select2();
                        $('#select_2_psi_ant_cond_2').val('').select2();
                        $('#select_3_psi_laboral_2').val('').select2();
                        $('#select_4_psi_autoestima_2').val('');
                        $('#obs_ind_terapia_psi_2').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 2, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 2, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 2 sin valores.\n';
            }

            if( psi_vidadiaria_3 != '' || psi_ant_cond_3 != '' || psi_laboral_3 != '' || psi_autoestima_3 != '' || obs_ind_terapia_psi_3 != '' )
            {
                /** terapia 3 */
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token:token,
                        id_ficha_otros_prof:id_ficha_atencion,
                        id_paciente:id_paciente,
                        id_profesional:id_profesional,
                        terapia:3,
                        psi_vidadiaria:psi_vidadiaria_3.join(", "),
                        psi_ant_cond:psi_ant_cond_3.join(", "),
                        psi_laboral:psi_laboral_3.join(", "),
                        psi_autoestima:psi_autoestima_3.join(", "),
                        obs_ind_terapia_psi:obs_ind_terapia_psi_3,
                    },
                })
                .done(function(response) {

                    if (response.estado == 1) {

                        $('#select_1_psi_vidadiaria_3').val('').select2();
                        $('#select_2_psi_ant_cond_3').val('').select2();
                        $('#select_3_psi_laboral_3').val('').select2();
                        $('#select_4_psi_autoestima_3').val('');
                        $('#obs_ind_terapia_psi_3').val('');

                        mensaje_registros += 'Plan de tratamiento terapia sicológica 3, registrado con exito. \n';
                    }
                    else
                    {
                        mensaje_registros += 'Plan de tratamiento terapia sicológica 3, registrado con falla. \n';
                        error_en_proceso++;
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
            }
            else
            {
                // mensaje_registros += 'Tratamiento 3 sin valores.\n';
            }
        }
        else
        {
            mensaje_registros = 'Debe ingresar valores a registrar. ';
            error_en_proceso++
        }


        swal({
            title: "Registro de Plan de tratamiento terapia sicológica",
            text: mensaje_registros,
            icon: "info",
        });

        if(error_en_proceso == 0)
        {
            $('#indicar_terapia').modal('hide');
        }
    }

    function limpiar_ind_terapia()
    {
        $('#rec_auto_1_tab').trigger('click')
        $('#select_1_psi_vidadiaria_1').val('').select2();
        $('#select_2_psi_ant_cond_1').val('').select2();
        $('#select_3_psi_laboral_1').val('').select2();
        $('#select_4_psi_autoestima_1').val('').select2();
        $('#obs_ind_terapia_psi_1').val('');

        $('#select_1_psi_vidadiaria_2').val('').select2();
        $('#select_2_psi_ant_cond_2').val('').select2();
        $('#select_3_psi_laboral_2').val('').select2();
        $('#select_4_psi_autoestima_2').val('').select2();
        $('#obs_ind_terapia_psi_2').val('');

        $('#select_1_psi_vidadiaria_3').val('').select2();
        $('#select_2_psi_ant_cond_3').val('').select2();
        $('#select_3_psi_laboral_3').val('').select2();
        $('#select_4_psi_autoestima_3').val('').select2();
        $('#obs_ind_terapia_psi_3').val('');
    }
</script>

