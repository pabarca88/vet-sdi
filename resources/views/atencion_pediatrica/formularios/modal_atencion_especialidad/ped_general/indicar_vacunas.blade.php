<div id="indicar_vacunas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_vacunas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar Vacunas Programa MINSAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="floating-label-activo-sm">Estado de vacunación</label>
                        <select class="form-control form-control-sm" id="id_estado_vacuna_minsal" name="id_estado_vacuna_minsal">
                            <option value="">Seleccione</option>
                            <option value="AD">Al día</option>
                            <option value="AT">Atrasado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Vacuna</label>
                            <select class="form-control form-control-sm" id="id_vac_minsal" name="id_vac_minsal">
                                <option value="">Seleccione</option>
                                <optgroup label="Recién Nacido">
                                    <option value="BCG" data-periodo="Recién Nacido" data-dosis="UNICA">BCG</option>
                                    <option value="HP-B" data-periodo="Recién Nacido" data-dosis="1">Hepatitis B</option>
                                </optgroup>
                                <optgroup label="2° mes , 4° mes , 6° mes">
                                    <option value="HV" data-periodo="2,4 ó 6 mes" data-dosis="1">Hexavalente</option>
                                    <option value="NC" data-periodo="2,4 ó 6 mes" data-dosis="1">Neumocócica Conjugada (prematuros)</option>
                                </optgroup>
                                <optgroup label="12 meses">
                                    <option value="TV-1D" data-periodo="12 mes" data-dosis="1">Tres Vírica 1ª Dosis</option>
                                    <option value="MC-C" data-periodo="12 mes" data-dosis="1">Meningocócica Conjugada</option>
                                    <option value="NC-C" data-periodo="12 mes" data-dosis="1">Neumocócica Conjugada</option>
                                </optgroup>
                                <optgroup label="18 meses">
                                    <option value="HV" data-periodo="18 mes" data-dosis="2">Hexavalente</option>
                                    <option value="HP-A" data-periodo="18 mes" data-dosis="1">Hepatitis A</option>
                                    <option value="VA-1D" data-periodo="18 mes" data-dosis="1">Varícela 1ª Dosis</option>
                                    <option value="FA" data-periodo="18 mes" data-dosis="UNICA">Fiebre Amarilla(Isla de Pascua)</option>
                                </optgroup>
                                <optgroup label="Pre-escolar">
                                    <option value="TV-2D" data-parent="Pre-escolar" data-dosis="2">Tres Vírica 2ª Dosis</option>
                                    <option value="VA-2D" data-parent="Pre-escolar" data-dosis="2">Varícela 2ª Dosis</option>
                                </optgroup>
                                <optgroup label="Escolar">
                                    <option value="dTp" data-periodo="Escolar 1º Básico" data-dosis="1">1º Básico dTp (acelular)</option>
                                    <option value="VPH-1D" data-periodo="Escolar 4º Básico" data-dosis="1">4º Básico VPH 1ª Dosis</option>
                                    <option value="VPH-2D" data-periodo="Escolar 5º Básico" data-dosis="2">5º Básico VPH 2ª Dosis</option>
                                    <option value="dTp" data-periodo="Escolar 8º Básico" data-dosis="2">8º Básico dTp (acelular)</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Observaciones</label>
                        <input type="text" class="form-control form-control-sm" name="observacion_vacuna_minsal" id="observacion_vacuna_minsal">
                    </div>
                        <div class="col-sm-12 col-md-12">

                    </div>
                    <br>
                    <div class="col-sm-12 col-md-12">
                        <button type="button" class="btn btn-success btn-sm float-right" onclick="registrar_vacuna_minsal('2', 'MINSAL');"><i class="fa fa-plus"></i> Agregar Vacuna</button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%" id="pediatria_vacunas_minsal">
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
                        <!--Cierre: Tabla-->
                    </div>
                    <div class="col-sm-12 mt-3 mb-2">
                        <div class="custom-control custom-switch">

                            <input type="checkbox" class="custom-control-input" name="check" id="check" value="1" onchange="javascript:showContent()" />
                            <label class="custom-control-label text-primary" for="check"><strong><u>La Vacuna no está en la lista</u></strong></label>
                        </div>

                    </div>
                    <div class="row" id="content" style="display:none">
                        <div class="col-sm-12 col-md-12">
                            <p>Ayudanos a mejorar nuestro módulo de Vacunas ingresando el nombre de la Vacuna faltante</p>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control form-control-sm" type="text" placeholder="Vacuna faltante">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /** Indicar vacunas MINSAL **/
    function i_vacunas() {
        $('#indicar_vacunas').modal('show');
        cargar_vacunas_minsal();
    }

    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

    function registrar_vacuna_minsal(id_tipo, tipo)
    {
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_responsable = $('#id_responsable_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var id_estado_vacuna = $('#id_estado_vacuna_minsal').val();
        var text_estado_vacuna = $('#id_estado_vacuna_minsal option:selected').text();

        var id_vacuna = $('#id_vac_minsal').val();
        var text_vacuna = $('#id_vac_minsal option:selected').text();
        var periodo = $('#id_vac_minsal option:selected').attr('data-periodo');
        var dosis = $('#id_vac_minsal option:selected').attr('data-dosis');
        var indicaciones_vacuna = '';
        var observacion_vacuna = $('#observacion_vacuna_minsal').val();

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
                id_dosis : '',
                texto_dosis : dosis,
                periodo : periodo,
                indicaciones_vacuna : indicaciones_vacuna,
                observacion_vacuna : observacion_vacuna,
                id_institucion : '',
                nombre_institucion : '',
                id_servicio : '',
                nombre_servicio : '',
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
                        title: "Registro de Vacuna MINSAL",
                        text: "Registro Exitoso.",
                        icon: "success",
                    });

                    cargar_vacunas_minsal();

                    $('#id_estado_vacuna_minsal').val('');
                    $('#id_vac_minsal').val('');
                    $('#observacion_vacuna_minsal').val('');

                }
                else
                {
                    swal({
                        title: "Registro de Vacuna MINSAL",
                        text: "Falla en Registro\nIntente nuevamente.",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Registro de Vacuna MINSAL",
                    text: "Falla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_vacunas_minsal()
    {
        let url = "{{ route('ficha.ver.registros.vacuna') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var id_tipo_vacuna = '2';
        var tipo_vacuna = 'MINSAL';

        var _token = CSRF_TOKEN;

        $('#pediatria_vacunas_minsal tbody').html('');

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
                        html += '        <span>'+value.texto_dosis+'</span>';
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

                        $('#pediatria_vacunas_minsal tbody').append(html);
                    });

                }
                else
                {
                    $('#pediatria_vacunas_minsal tbody').append('');
                }
            }
            else
            {
                $('#pediatria_vacunas_minsal tbody').append('');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
