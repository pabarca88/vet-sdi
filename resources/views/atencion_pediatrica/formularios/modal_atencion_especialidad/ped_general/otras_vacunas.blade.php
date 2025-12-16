<div id="otras_vacunas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otras_vacunas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Otras vacunas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <h6 class="mb-3">I.- Datos del lugar vacunación ( Hospital, Clínica o Consultorio)</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="floating-label-activo-sm">Estado de vacunación</label>
                            <select class="form-control form-control-sm" id="otras_vac_id_estado_vacuna" name="otras_vac_id_estado_vacuna">
                                <option value="">Seleccione</option>
                                <option value="AD">Al día</option>
                                <option value="AT">Atrasado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="floating-label">Establecimiento</label>
                            @if ($institucion)
                                <input type="text" class="form-control form-control-sm" name="otras_vac_nombre_institucion" id="otras_vac_nombre_institucion" value="{{ $institucion->nombre }}" readonly>
                                <input type="hidden" class="form-control form-control-sm" name="otras_vac_id_institucion" id="otras_vac_id_institucion" value="{{ $institucion->id }}">
                            @else
                                <input type="text" class="form-control form-control-sm" name="otras_vac_nombre_institucion" id="otras_vac_nombre_institucion" value="{{ $lugar_atencion->nombre }}" readonly>
                                <input type="hidden" class="form-control form-control-sm" name="otras_vac_id_institucion" id="otras_vac_id_institucion" value="">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Servicio</label>
                            <input type="text" class="form-control form-control-sm" name="otras_vac_nombre_servicio" id="otras_vac_nombre_servicio">
                            <input type="hidden" class="form-control form-control-sm" name="otras_vac_id_servicio" id="otras_vac_id_servicio">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Rut paciente</label>
                            <input type="text" class="form-control form-control-sm" name="otras_vac_rut" id="otras_vac_rut" value="{{ $paciente->rut }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Edad paciente</label>
                            <input type="text" class="form-control form-control-sm" name="otras_vac_periodo" id="otras_vac_periodo" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                        </div><!--Bloquear la vacuna si no corresponde a la edad-->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut responsable</label>
                            <input type="text" class="form-control form-control-sm" name="otras_vac_rut_resp" id="otras_vac_rut_resp" value="{{ $profesional->rut }}" readonly>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="floating-label">Observaciones </label>
                            <input type="text" class="form-control form-control-sm" name="otras_vac_observacion_vacuna" id="otras_vac_observacion_vacuna" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Vacuna</label>
                            <select class="form-control form-control-sm" name="vacuna_vacuna" id="vacuna_vacuna" onchange="activar_select_vacuna('vacuna_vacuna','vacuna_covid');">
                                <option value="">Seleccione</option>
                                <optgroup label="Haemophilus Influenza ">
                                    <option value="ACT-HIB">ACT-HIB</option>
                                    <option value="IH-C">INFANRIX HEXA (Combinada)</option>
                                </optgroup>
                                <optgroup label="Hepatitis A y B">
                                    <option value="TW">TWINRIX (Desde los 15 Años)</option>
                                </optgroup>
                                <optgroup label="Hepatitis A">
                                    <option value="AVAXIM">AVAXIM Adulto y Pediátrico (< 1 año) </option>
                                    <option value="HAVRIX">HAVRIX Adulto y Junior (< 1 año)</option>
                                    <option value="VAQTA">VAQTA Adulto y Pediátrico (< 1 año)</option>
                                </optgroup>
                                <optgroup label="Hepatitis B">
                                    <option value="ENGERIX-B">ENGERIX B Adulto (Desde los 15 Años)</option>
                                </optgroup>
                                <optgroup label="Difteria Tétanos,Tos Convulsiva">
                                    <option value="BOOSTRIX">BOOSTRIX (< 4 años)</option>
                                </optgroup>
                                <optgroup label="Virus Papiloma Humano">
                                    <option value="CERVARIX">CERVARIX (< 9 años)</option>
                                    <option value="GARDASIL">GARDASIL (< 9 años)</option>
                                </optgroup>
                                <optgroup label="Influenza Tetravalente">
                                    <option value="FLUQUADRI">FLUQUADRI</option>
                                </optgroup>
                                <optgroup label="Difteria Tétanos,Tos Convulsiva,Haemophilus;hepatitis A y B ">
                                    <option value="IH">INFANRIX HEXA < (2 meses)</option>
                                </optgroup>
                                <optgroup label="Meningitis A, C, Y, W-135">
                                    <option value="MENVEO">MENVEO (< 2 años)</option>
                                    <option value="MENACTRA">MENACTRA (< 2 años)</option>
                                    <option value="NIMENRIX">NIMENRIX (< 2 años)</option>
                                </optgroup>
                                <optgroup label="Poliomielitis">
                                    <option value="PI">POLIO INYECTABLE (Adultos)</option>
                                </optgroup>
                                <optgroup label="Neumonía">
                                    <option value="NP">NEUMONÍA	PREVENAR 13 ( >2 años)</option>
                                </optgroup>
                                <optgroup label="Rotavirus (Oral)">
                                    <option value="ROTARIX">ROTARIX (entre 2 y 6 meses)</option>
                                    <option value="ROTATEQ">ROTATEQ (entre 2 y 6 meses)</option>
                                </optgroup>
                                <optgroup label="Fiebre Amarilla (10 días antes de viaje)">
                                    <option value="STAMARIL">STAMARIL (9 meses a 60 años)</option>
                                </optgroup>
                                <optgroup label="Fiebre Tifoidea">
                                    <option value="TYPHIM">TYPHIM VI ANTITÍFICA (desde los 2 años)</option>
                                </optgroup>
                                <optgroup label="Tétanos">
                                    <option value="TETAVAX">TETAVAX (Adultos)</option>
                                </optgroup>
                                <optgroup label="Varicela">
                                    <option value="VARILRIX">VARILRIX (< 1 años)</option>
                                    <option value="VARIVAX">VARIVAX  (< 1 años)</option>
                                </optgroup>
                                <optgroup label="Rabia">
                                    <option value="VERORAB">VERORAB (solo receta médica)</option>
                                </optgroup>
                                <optgroup label="Herpes Zoster">
                                    <option value="ZOSTAVAX">ZOSTAVAX (solo receta médica)</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Vacuna Covid</label>
                            <select class="form-control form-control-sm" name="vacuna_covid" id="vacuna_covid" onchange="activar_select_vacuna('vacuna_vacuna','vacuna_covid');">
                                <option value="">Seleccione</option>
                                <optgroup label="Sinovac">
                                    <option value="SINOVAC" data-dosis="1">1° Dosis</option>
                                    <option value="SINOVAC" data-dosis="2">2° Dosis</option>
                                    <option value="SINOVAC" data-dosis="3">3° Dosis</option>
                                    <option value="SINOVAC" data-dosis="4">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Astraseneca">
                                    <option value="ASTRASENECA" data-dosis="1">1° Dosis</option>
                                    <option value="ASTRASENECA" data-dosis="2">2° Dosis</option>
                                    <option value="ASTRASENECA" data-dosis="3">3° Dosis</option>
                                    <option value="ASTRASENECA" data-dosis="4">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Pfizer">
                                    <option value="PFIZER" data-dosis="1">1° Dosis</option>
                                    <option value="PFIZER" data-dosis="2">2° Dosis</option>
                                    <option value="PFIZER" data-dosis="3">3° Dosis</option>
                                    <option value="PFIZER" data-dosis="4">4° Dosis</option>
                                </optgroup>
                                <optgroup label="Otra">
                                    <option value="OTRA" data-dosis="1">1° Dosis</option>
                                    <option value="OTRA" data-dosis="2">2° Dosis</option>
                                    <option value="OTRA" data-dosis="3">3° Dosis</option>
                                    <option value="OTRA" data-dosis="4">4° Dosis</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="registrar_vacuna_otro('4', 'OTRA');"><i class="fa fa-plus"></i> Agregar vacuna</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%" id="pediatria_vacunas_otras">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">FECHA</th>
                                            <th class="text-center align-middle">VACUNAS</th>
                                            <th class="text-center align-middle">DOSIS</th>
                                            <th class="text-center align-middle">EDAD</th>
                                            <th class="text-center align-middle">OBSERVACION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!--Ojo pdf con codigo QR mas autentificación sdi-->
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                {{-- <button type="submit" class="btn btn-info btn-sm">Guardar</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>


<script>

    /** Indicar otras vacunas **/
    function i_vacunas_otras() {
        $('#otras_vacunas').modal('show');
        cargar_vacunas_otras();
    }

    function registrar_vacuna_otro(id_tipo, tipo)
    {
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_responsable = $('#id_responsable_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var id_estado_vacuna = $('#otras_vac_id_estado_vacuna').val();
        var text_estado_vacuna = $('#otras_vac_id_estado_vacuna option:selected').text();

        var vacuna = $('#vacuna_vacuna').val();
        var covid = $('#vacuna_covid').val();

        var id_vacuna = '';
        var text_vacuna = '';

        var periodo = $('#otras_vac_periodo').val();

        var dosis = '';

        if(vacuna!= '')
        {
            id_vacuna = vacuna;
            text_vacuna = $('#vacuna_vacuna option:selected').text();
            dosis = '';
            id_dosis = '';
        }
        else if(covid)
        {
            id_vacuna = covid;
            text_vacuna = covid;
            id_dosis = $('#vacuna_covid option:selected').attr('data-dosis')
            dosis = $('#vacuna_covid option:selected').text();
        }


        var indicaciones_vacuna = '';
        var observacion_vacuna = $('#otras_vac_observacion_vacuna').val();

        var id_institucion = $('#otras_vac_id_institucion').val();
        var nombre_institucion = $('#otras_vac_nombre_institucion').val();
        var id_servicio = $('#otras_vac_id_servicio').val();
        var nombre_servicio = $('#otras_vac_nombre_servicio').val();



        let url = "{{ route('ficha.registro.vacuna') }}";

        var _token = CSRF_TOKEN;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_lugar_atencion : id_lugar_atencion,
                id_ficha_atencion : id_ficha_atencion,
                id_ficha_pediatria : '',
                id_paciente : id_paciente,
                id_responsable : id_responsable,
                id_profesional : id_profesional,
                id_tipo_vacuna : id_tipo,
                tipo_vacuna : tipo,
                id_estado_vacuna : id_estado_vacuna,
                texto_estado_vacuna : text_estado_vacuna,
                id_vacuna : id_vacuna,
                nombre_vacuna : text_vacuna,
                id_dosis : id_dosis,
                texto_dosis : dosis,
                periodo : periodo,
                indicaciones_vacuna : indicaciones_vacuna,
                observacion_vacuna : observacion_vacuna,
                id_institucion : id_institucion,
                nombre_institucion : nombre_institucion,
                id_servicio : id_servicio,
                nombre_servicio : nombre_servicio,
            },
        })
        .done(function(data)
        {
            console.log(data);

            if (data !== 'null')
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de Otras Vacunas",
                        text: "Registro Exitoso.",
                        icon: "success",
                    });
                    cargar_vacunas_otras();
                    $('#otras_vac_id_estado_vacuna').val('');
                    $('#otras_vac_nombre_servicio').val('');
                    $('#otras_vac_observacion_vacuna').val('');
                    $('#vacuna_vacuna').val('');
                    $('#vacuna_covid').val('');
                    activar_select_vacuna('vacuna_vacuna','vacuna_covid');
                }
                else
                {
                    swal({
                        title: "Registro de Otras Vacunas",
                        text: "Falla en Registro\nIntente nuevamente.",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Registro de Otras Vacunas",
                    text: "Falla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function activar_select_vacuna(select_1, select_2)
    {
        var vacuna_1 = $('#'+select_1).val();
        var vacuna_2 = $('#'+select_2).val();
        if(vacuna_1 == '' && vacuna_2 == '')
        {
            $('#'+select_1).attr('disabled', false);
            $('#'+select_2).attr('disabled', false);
        }
        else
        {
            if(vacuna_1 != '')
            {
                $('#'+select_1).attr('disabled', false);
                $('#'+select_2).attr('disabled', true);
                $('#'+select_2).val('');
            }
            else
            {
                $('#'+select_1).attr('disabled', false);
                $('#'+select_2).attr('disabled', false);
                if(vacuna_2 != '')
                {
                    $('#'+select_1).attr('disabled', true);
                    $('#'+select_1).val('');
                    $('#'+select_2).attr('disabled', false);
                }
            }
        }

    }


    function cargar_vacunas_otras()
    {
        let url = "{{ route('ficha.ver.registros.vacuna') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var id_tipo_vacuna = '4';
        var tipo_vacuna = 'OTRA';

        var _token = CSRF_TOKEN;

        $('#pediatria_vacunas_otras tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : id_paciente,
                id_tipo_vacuna : id_tipo_vacuna,
                tipo_vacuna : tipo_vacuna,
            },
        })
        .done(function(data)
        {
            console.log(data);

            if (data !== 'null')
            {
                if(data.estado == 1)
                {
                    // FECHA
                    // VACUNAS
                    // DOSIS
                    // EDAD
                    // OBSERVACION
                    $.each(data.registros, function (key, value) {
                        var html = '';
                        html += '<tr>';
                        html += '    <td class="align-middle text-center">';
                        html += '        <span><strong>'+value.fecha+'</strong></span>';
                        html += '    </td>';
                        html += '    <td class="align-middle text-center">';
                        html += '        <span>'+value.nombre_vacuna+'</span>';
                        html += '    </td>';
                        html += '    <td class="align-middle text-center">';
                        if(value.texto_dosis != null)
                            html += '        <span>'+value.texto_dosis+'</span>';
                        else
                            html += '        <span>NO ESPECIFICADA</span>';
                        html += '    </td>';
                        html += '    <td class="align-middle text-center">';
                        html += '        <span>'+value.edad+'</span><br/>';
                        // if(value.periodo != null)
                        //     html += '        <span>'+value.periodo+'</span>';
                        html += '    </td>';
                        html += '    <td class="align-middle text-center">';
                        if(value.observacion_vacuna != null)
                            html += '        <span>'+value.observacion_vacuna+'</span><br/>';
                        if(value.indicaciones_vacuna != null)
                            html += '        <span>'+value.indicaciones_vacuna+'</span>';
                        html += '    </td>';
                        html += '</tr>';

                        $('#pediatria_vacunas_otras tbody').append(html);
                    });

                }
                else
                {
                    $('#pediatria_vacunas_otras tbody').append('');
                }
            }
            else
            {
                $('#pediatria_vacunas_otras tbody').append('');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
