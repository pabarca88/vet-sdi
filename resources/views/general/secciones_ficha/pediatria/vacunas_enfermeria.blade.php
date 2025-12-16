<div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 py-3">
            <h6 class="t-aten d-inline mb-2">Estado de vacunación del menor</h6>
            <span class="badge badge-sub d-inline">VACUNAS</span>
        </div>
    </div>
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Estado de vacunación</label>
                    <select class="form-control form-control-sm" id="id_estado_vacuna" name="id_estado_vacuna">
                        <option value="">Seleccione</option>
                        <option value="AD">Al día</option>
                        <option value="AT">Atrasado</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Vacuna correspondiente a edad</label>
                    <select class="form-control form-control-sm" id="id_vacuna" name="id_vacuna">
                        <option>Seleccione</option>
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
                <div class="form-group col-md-12">
                    <label class="floating-label-activo-sm">Incidentes con la vacuna</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="indicaciones_vacuna" id="indicaciones_vacuna"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary-light-c btn-xs btn-block" onclick="registrar_vacuna('1','GEN')"><i class="feather icon-plus"></i> Añadir</button>
                </div>
            </div>   
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        
            <div class="form-row" id="formulario_vac">
                <div class="btn-group btn-block btn-xs mb-3" role="group">
                    <button type="button" class="btn btn-primary-light-c btn-block btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="feather icon-file-text"></i> Indicaciones
                    </button>
                    <div class="dropdown-menu position-absolute" style="z-index: 2000;">
                      <a class="dropdown-item" onclick="i_vacunas();"><i class="feather icon-plus"></i> Indicar Vacunas Programa MINSAL</a>
                      <a class="dropdown-item" onclick="i_vacunas_otras();"><i class="feather icon-plus"></i> Indicar Otras Vacunas</a>
                      <a class="dropdown-item" onclick="inter();"><i class="feather icon-plus"></i> Interconsulta</a>
                      {{-- <a class="dropdown-item" onclick="carnet_vac();"><i class="feather icon-plus"></i> Carne de vacunas generales</a> --}}
                      {{-- <a class="dropdown-item" onclick="otras_vac();"><i class="feather icon-plus"></i> Carne de vacunas especiales</a> --}}
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul>
                        <li><i class="feather icon-check text-info"></i> Se añadio vacuna programa MINSAL</li>
                    </ul>
                    <ul>
                        <li><i class="feather icon-check text-info"></i> Se añadio otras vacunas</li>
                    </ul>
                    {{-- <ul>
                        <li><i class="feather icon-check text-info"></i> Se modificó carne vacunas generales</li>
                    </ul>--}}
                   {{--  <ul>
                        <li><i class="feather icon-check text-info"></i> Se modificó carne vacunas especiales</li>
                    </ul>--}}
                    <ul>
                        <li><i class="feather icon-check text-info"></i> Se añadió Interconsulta</li>
                    </ul>
                </div>
            </div>
            </div>
           
    </div>
    <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <hr>
            <div class="row">
                <div class="col-md-8 d-inline">
                    <h6 class="t-aten">Estado de Vacunación</h6>
                </div>
				<div class="col-md-4 d-inline mb-3">
                    <button type="button" class="btn btn-xs btn-info-light-c float-right mr-2" onclick="carnet_pdf();"><i class="feather icon-file-text"></i> VER CARNE DE VACUNACIÓN</button>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                    <table  class="display table table-striped dt-responsive nowrap table-xs" style="width:100%" id="pediatria_vacunas_generales">
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
                            <tr>
                                <td class="align-middle text-center">
                                    <span><strong>RN</strong></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>BCG</span><br>
                                    <span>Hepatitis B</span>
                                </td>
                                <td class="align-middle text-center">
                                   <span>SI</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>20/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>ERITEMA LOCAL</span>
                                </td>
                                {{-- <td class="align-middle text-center">
                                    <button type="button" class="btn btn-info-light btn-xs">
                                    <i class="feather feather icon-check"></i> Indicar</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!--<div class="row mb-3">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-info">Guardar</button>
                    <button type="button" class="btn btn-success">Imprimir</button>
                </div>
            </div>-->
        </div>
    </div>
</div>

@include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.indicar_vacunas")<!-- MINSAL -->
@include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.otras_vacunas")<!-- OTRAS VACUNAS -->
{{-- @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_otras_vacunas") --}}
{{-- @include("atencion_pediatrica.formularios.modal_atencion_especialidad.ped_general.carne_vacuna") --}}

<script>
    $(document).ready(function () {
        $('#pediatria_vacunas_generales').dataTable({
            responsive: true,
        });
        cargar_vacunas_generales();
    });

    function registrar_vacuna(id_tipo, tipo)
    {
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_responsable = $('#id_responsable_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        var id_estado_vacuna = $('#id_estado_vacuna').val();
        var text_estado_vacuna = $('#id_estado_vacuna option:selected').text();
        var id_vacuna = $('#id_vacuna').val();
        var text_vacuna = $('#id_vacuna option:selected').text();
        var periodo = $('#id_vacuna option:selected').attr('data-periodo');
        var dosis = $('#id_vacuna option:selected').attr('data-dosis');
        var indicaciones_vacuna = $('#indicaciones_vacuna').val();

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
                observacion_vacuna : '',
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
                        title: "Registro de Vacuna General",
                        text: "Registro Exitoso.",
                        icon: "success",
                    });
                    $('#id_estado_vacuna').val('');
                    $('#id_vacuna').val('');
                    $('#indicaciones_vacuna').val('');
                    cargar_vacunas_generales();
                }
                else
                {
                    swal({
                        title: "Registro de Vacuna General",
                        text: "Falla en Registro\nIntente nuevamente.",
                        icon: "error",
                    });
                }
            }
            else
            {
                swal({
                    title: "Registro de Vacuna General",
                    text: "Falla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_vacunas_generales()
    {
        let url = "{{ route('ficha.ver.registros.vacuna') }}";
        var id_paciente = $('#id_paciente_fc').val();
        var id_tipo_vacuna = '1';
        var tipo_vacuna = 'GEN';

        var _token = CSRF_TOKEN;

        $('#pediatria_vacunas_generales tbody').html('');

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

                        $('#pediatria_vacunas_generales tbody').append(html);
                    });

                }
                else
                {
                    $('#pediatria_vacunas_generales tbody').append('');
                }
            }
            else
            {
                $('#pediatria_vacunas_generales tbody').append('');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function carnet_pdf()
    {
        var id_paciente = $('#id_paciente_fc').val();
        let url = "{{ route('ficha.pdf.vacuna') }}";
        Fancybox.show(
            [
                {
                src: '{{ route('ficha.pdf.vacuna') }}?id_paciente='+id_paciente,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }
</script>
