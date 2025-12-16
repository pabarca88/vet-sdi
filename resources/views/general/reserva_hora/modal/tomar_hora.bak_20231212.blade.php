
    <style>
        .titulos_tarjetas {
            font-size: 20px!important;
        }
        .btn.btn-icon {
            width: 35px!important;
            height: 35px!important;
            font-size: 15px!important;
        }
    </style>




    
    <!--Modals buscador -->
    <div class="modal fade" id="ficha_profesional" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ficha_profesional" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <!--Cargar foto del profesional-->
                <img class="img-radius img-fluid wid-50 mr-2" id="modal_info_pro_foto" src="{{ asset('images/img_perfil/6187674.png') }}" alt="Nombre del Médico">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="modal-title text-primary my-auto" id="modal_info_pro_nombre">Jaime Kriman Astorga</h5>
                        <h6 class="modal-title text-primary my-auto" id="modal_info_pro_especialidad"><span id="modal_info_pro_tipo_especialidad">Especialidad</span><span id="modalinfo_pro_sub_tipo_especialidad">: Otorrinolaringología</span></h6>
                    </div>
                </div>

                <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close" onclick="$('#ficha_profesional').modal('hide')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ficha_profesional">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row" id="modal_info_pro_academicos">
                                {{--    --}}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="bg-info p-15" style="text-align:center">
                        <h5 class="modal-title text-white">Lugares de Atención</h5>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="display table table-striped table-hover dt-responsive table-sm" style="width:100%" id="modal_info_pro_lugar_atencion">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Nombre</th>
                                        <th style="text-align:center">Convenios</th>
                                        <th style="text-align:center">Contacto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--    --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#ficha_profesional').modal('hide')">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!--Modal reservar hora -->
<div class="modal fade" id="reservar_hora" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reservar_hora" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h6 class="modal-title text-primary f-18">Reservar hora médica</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#reservar_hora').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
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
                        <label class="mt-4">El Profesional atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                        {{--  <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                            </div>
                        </div>  --}}
                    </div>

                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12 mb-2 mt-0">
                                {{--  <input type="date" id="calendario" name="calendario">  --}}
                                {{--  <div id="calendario_reserva_buscador" name="calendario_reserva_buscador" class="calendar fc fc-unthemed fc-ltr"></div>  --}}
                                <label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
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

{{--  MODAL INFORMACION DE PACIENTE PARA AGENDA  --}}
<!-- MODAL AGREGAR HORA MEDICA -->
<div id="agenda_agregar_paciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_paciente_asistente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info pt-3 pb-2">
                <h5 class="modal-title text-white text-center">Tomar hora</h5>
                <button id="cerrar_tomar_hora" type="button" class="close text-white close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                {{--  BUSCADOR DE RUT  --}}
                <div class="row div_rut_buscar">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <h6 class="text-c-blue ml-2 mb-3">Ingrese el rut del paciente</h6>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8 mb-3">
                        <form id="validacion_rut_form">
                            <div class="form-group" id="validacion_rut_div">
                                <input type="text" id="rut_paciente_reserva" name="rut_paciente_reserva" class="form-control" placeholder="Rut del paciente" aria-label="Rut del paciente" aria-describedby="button-addon2" required oninput="formatoRut(this)">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-4 mb-3">
                        <button class="btn btn-info" onclick="buscar_paciente();" type="button" id="button-addon2">
                            Buscar
                        </button>
                    </div>
                </div>



                <form id="form_reseva_de_horas">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="reserva_hora_id_profesional" name="reserva_hora_id_profesional" value="">
                    <input type="hidden" id="reserva_hora_id_paciente" name="reserva_hora_id_paciente" value="">
                    <input type="hidden" id="reserva_hora_id_lugar_atencion" name="reserva_hora_id_lugar_atencion" value="">
                    <input type="hidden" id="reserva_hora_fecha_consulta" name="reserva_hora_fecha_consulta" value="">
                    <input type="hidden" id="reserva_hora_hora_consulta" name="reserva_hora_hora_consulta" value="">
                    <input type="hidden" id="reserva_hora_origen" name="reserva_hora_origen" value="escritorio_paciente">
                    <input type="hidden" id="reserva_hora_id_asistente" name="reserva_hora_id_asistente" value="2">

                    {{--  VISUALIZACION DE DATOS DEL PACIENTE  --}}
                    <div id="reserva_datos_paciente" class="row mx-3">
                        <table class="table table-borderless table-xs">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <strong>Rut</strong>
                                    </th>
                                    <td><span id="reserva_rut_paciente"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Nombre</strong>
                                    </th>
                                    <td><span id="reserva_hora_nombre"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Fecha Nacimiento</strong>
                                    </th>
                                    <td><span id="reserva_fecha_nacimiento"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Sexo</strong>
                                    </th>
                                    <td><span id="reserva_sexo"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Convenio</strong>
                                    </th>
                                    <td><span id="reserva_convenio"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Dirección</strong>
                                    </th>
                                    <td><span id="reserva_direccion"></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Correo Electrónico</strong>
                                    </th>
                                    <td id="reserva_hora_email"></td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <strong>Teléfono</strong>
                                    </th>
                                    <td><span id="reserva_hora_telefono"></span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Descripción Reserva</label>
                                <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente" onclick="$('#agenda_agregar_paciente').modal('hide');" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="agendar_hora();" class="btn btn-info">Agendar Hora</button>

                        </div>
                    </div>

                    {{--  FORMULARIO DE PACIENTE NUEVO  --}}
                    <div id="reserva_agregar_paciente_hora">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    Paciente no registrado, complete los datos para registrar al paciente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombres</label>
                                    <input type="text" required class="form-control form-control-sm" name="reserva_hora_nombres_paciente" id="reserva_hora_nombres_paciente">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Primer Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_uno" id="reserva_hora_apellido_uno">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Segundo Apellido</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_apellido_dos" id="reserva_hora_apellido_dos">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">F. Nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="reserva_hora_fecha_nac" id="reserva_hora_fecha_nac">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sexo</label>
                                    <select id="reserva_hora_sexo" name="reserva_hora_sexo" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Profesión u Oficio</label>
                                    <select id="reserva_hora_profesion" name="reserva_hora_profesion" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($profesion_oficio))
                                            @foreach ($profesion_oficio as $prof_ofic)
                                                <option value="{{ $prof_ofic->id }}">{{ $prof_ofic->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Previsi&oacute;n</label>
                                    <select id="reserva_hora_convenio" name="reserva_hora_convenio" class="form-control form-control-sm">
                                        <option value="0">Selecione una opci&oacute;n</option>
                                        @if (isset($prevision))
                                            @foreach ($prevision as $p)
                                                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 col-md-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_direccion" id="reserva_hora_direccion">
                                </div>
                            </div>

                            <div class="col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N&uacute;mero</label>
                                    <input type="address" class="form-control form-control-sm" name="reserva_hora_numero_dir" id="reserva_hora_numero_dir">
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Region</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control" required>
                                        <option value="0">Seleccione Regi&oacute;n</option>
                                        @if (isset($region))
                                            @foreach ($region as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control" required>
                                        <option value="0">Seleccione Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input type="text" class="form-control form-control-sm" onblur="validar_email_agenda()" name="reserva_hora_correo" id="reserva_hora_correo">
                                    <span id="mensaje_email_reserva" style="display:none"></span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input type="tel" class="form-control form-control-sm" name="reserva_hora_telefono_uno" id="reserva_hora_telefono_uno">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Descrici&oacute;n Reserva</label>
                                    <input type="text" class="form-control form-control-sm" name="reserva_hora_descripcion" id="reserva_hora_descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <h6 class="text-c-blue ml-2 mb-3">Enviar confirmaci&oacute;n</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_confirmacion" name="reserva_hora_confirmacion">
                                        <label class="custom-control-label" for="reserva_hora_confirmacion">Correo electr&oacute;nico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="reserva_hora_sms" name="reserva_hora_sms">
                                        <label class="custom-control-label" for="sms">SMS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger close_agenda_agregar_paciente"  onclick="$('#agenda_agregar_paciente').modal('hide');">Cancelar</button>
                            <button type="button" id="guardar_reserva_paciente" onclick="agendar_hora_paciente_nuevo();" class="btn btn-info">
                                Tomar Hora
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR HORA MEDICA -->

   
 <!-- TEMPLATE BUSCADOR DE PROFESIONAL -->
 <script>

/*-Buscador profesional-*/
/*-Ficha profesional-*/
function f_profesional (id_profesional)
{
    let url = "{{ route('profesional.informacionProfesional') }}";
    $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
            },
    })
    .done(function(data) {
        {{--  console.log(data);  --}}
        if (data.estado == 1) {
            $('#modal_info_pro_foto').attr('src',data.profesional.img_profesional );
            $('#modal_info_pro_nombre').html(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
            $('#modal_info_pro_tipo_especialidad').html(data.profesional.tipo_especialidad.nombre);
            if(data.profesional.id_sub_tipo_especialidad != 0)
                $('#modalinfo_pro_sub_tipo_especialidad').html(': '+data.profesional.sub_tipo_especialidad.nombre);
            else
                $('#modalinfo_pro_sub_tipo_especialidad').html('');


            $('#modal_info_pro_academicos').html('');
            $(data.profesional.antecedente_academico).each(function(index, value){
                var html_academicos ='';
                html_academicos += '    <div class="col-md-3" align="left">'+value.tipo_antecedente_academico.nombre+'</div>';
                html_academicos += '    <div class="col-md-4"><b>'+value.nombre+'</b></div>';
                html_academicos += '    <div class="col-md-5"><b>'+value.ciudad_pais+' '+value.universidad+'</b>'+value.anio+'</div>';
                $('#modal_info_pro_academicos').append(html_academicos);
            });

            $('#modal_info_pro_lugar_atencion').dataTable().fnClearTable();
            $('#modal_info_pro_lugar_atencion').dataTable().fnDestroy();

            $('#modal_info_pro_lugar_atencion tbody').html('');
            $.each(data.lugares_atencion,function(index, value){
                {{--  console.log($(value.convenio).length);  --}}

                var html_Lugares_atencion = '';
                html_Lugares_atencion += '<tr>';
                html_Lugares_atencion += '    <td><span><strong>'+value.nombre+':</strong></span><br> '+value.direccion.direccion+' #'+value.direccion.numero_dir+', '+value.direccion.ciudad.nombre+'</td>';
                if(value.convenio == '')
                    html_Lugares_atencion += '    <td style="color:#666666;text-align:center">No informado</td>';
                else
                    html_Lugares_atencion += '    <td style="color:#666666;text-align:center">'+value.convenio.convenios+'</td>';
                html_Lugares_atencion += '    <td style="text-align:center"><img src="{{ asset('images/iconos/iphone.svg') }}" style="width: 10%;">'+value.telefono+'</td>';
                html_Lugares_atencion += '</tr>';



                $('#modal_info_pro_lugar_atencion tbody').append(html_Lugares_atencion);
            });

            $('#modal_info_pro_lugar_atencion').DataTable({
                responsive: true,
            });
            $('#ficha_profesional').modal('show');

        } else {
            swal({
                title: "Informacion del Profesional",
                text: 'Problema al cargar Informacion del Profesional.',
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
}

/*-Agendar hora medica-*/
function hora_medica (id_profesional, id_lugar_atencion){

    $('#modal_reserva_hora_lugar_atencion').val('');
    $('#modal_reserva_dias_atencion').val('');
    $('#modal_reserva_fecha').val('');
    $('#modal_reserva_hora_lista_horas').html('');
    // asigno id profesioanl
    $('#modal_reserva_hora_id_profesional').val(id_profesional);

    // cargo lugares de atencion  y asigno lugar con hora mas proxima
    lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)

    $('#reservar_hora').modal('show');
}

function buscar_ciudad(element)
{

    let region = $(element).val();

    let url = "{{ route('home.buscar_ciudad_region') }}";
    $.ajax({

            url: url,
            type: "get",
            data: {
                //_token: _token,
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                {{--  console.log(data);  --}}
                let ciudades = $('#buscar_especialidad_comuna');
                let ciudades_prof = $('#buscar_profesional_comuna');

                ciudades.find('option').remove();
                ciudades.append('<option value="">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })
                ciudades_prof.find('option').remove();
                ciudades_prof.append('<option value="">Seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades_prof.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

            } else {
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

}

function buscar_tipo_especialidad(element)
{

    let tipo_especialidad_registro_1 = $('#buscar_especialidad_especialidad');
    tipo_especialidad_registro_1.find('option').remove();
    let tipo_especialidad_registro_2 = $('#buscar_profesional_especialidad');
    tipo_especialidad_registro_2.find('option').remove();
    let tipo_especialidad_registro_3 = $('#buscar_videoconsulta_especialidad');
    tipo_especialidad_registro_3.find('option').remove();

    let sub_tipo_especialidad_registro_1 = $('#buscar_especialidad_subespec');
    sub_tipo_especialidad_registro_1.find('option').remove();
    let sub_tipo_especialidad_registro_2 = $('#buscar_profesional_subespec');
    sub_tipo_especialidad_registro_2.find('option').remove();
    let sub_tipo_especialidad_registro_3 = $('#buscar_videoconsulta_subespec');
    sub_tipo_especialidad_registro_3.find('option').remove();

    let especialidad = $(element).val();

    let url = "{{ route('home.buscar_especialidad') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            especialidad: especialidad,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);
            {{--  console.log(data);  --}}
            let especialidades_1 = $('#buscar_especialidad_especialidad');
            let especialidades_2 = $('#buscar_profesional_especialidad');
            let especialidades_3 = $('#buscar_videoconsulta_especialidad');

            especialidades_1.find('option').remove();
            especialidades_1.append('<option value="">Seleccione</option>');
            especialidades_2.find('option').remove();
            especialidades_2.append('<option value="">Seleccione</option>');
            especialidades_3.find('option').remove();
            especialidades_3.append('<option value="">Seleccione</option>');
            if(data.length > 0)
            {
                $(data).each(function(i, v) { // indice, valor
                    especialidades_1.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    especialidades_2.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    especialidades_3.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })
            }
            else
            {
                especialidades_1.append('<option value="0">No Aplica</option>');
                especialidades_1.val(0);
                especialidades_2.append('<option value="0">No Aplica</option>');
                especialidades_2.val(0);
                especialidades_3.append('<option value="0">No Aplica</option>');
                especialidades_3.val(0);

                let sub_especialidades_1 = $('#buscar_especialidad_subespec');
                sub_especialidades_1.append('<option value="0">No Aplica</option>');
                sub_especialidades_1.val(0);
                let sub_especialidades_2 = $('#buscar_profesional_subespec');
                sub_especialidades_2.append('<option value="0">No Aplica</option>');
                sub_especialidades_2.val(0);
                let sub_especialidades_3 = $('#buscar_videoconsulta_subespec');
                sub_especialidades_3.append('<option value="0">No Aplica</option>');
                sub_especialidades_3.val(0);
            }


        } else {
            alert('No se pudo Cargar los tipos de especialidad');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });

}

function buscar_sub_tipo_especialidad(element)
{
    let sub_tipo_especialidad_registro_1 = $('#buscar_especialidad_subespec');
    sub_tipo_especialidad_registro_1.find('option').remove();
    let sub_tipo_especialidad_registro_2 = $('#buscar_profesional_subespec');
    sub_tipo_especialidad_registro_2.find('option').remove();
    let sub_tipo_especialidad_registro_3 = $('#buscar_videoconsulta_subespec');
    sub_tipo_especialidad_registro_3.find('option').remove();


    let especialidad = $(element).val();

    let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            especialidad: especialidad,
        },
    })
    .done(function(data) {
        if (data != null) {
            data = JSON.parse(data);
            {{--  console.log(data);  --}}
            {{--  console.log(data.length);  --}}
            let sub_especialidades_1 = $('#buscar_especialidad_subespec');
            let sub_especialidades_2 = $('#buscar_profesional_subespec');
            let sub_especialidades_3 = $('#buscar_videoconsulta_subespec');

            sub_especialidades_1.find('option').remove();
            sub_especialidades_1.append('<option value="">Seleccione</option>');
            sub_especialidades_2.find('option').remove();
            sub_especialidades_2.append('<option value="">Seleccione</option>');
            sub_especialidades_3.find('option').remove();
            sub_especialidades_3.append('<option value="">Seleccione</option>');
            if(data.length > 0)
            {
                $(data).each(function(i, v) { // indice, valor
                    sub_especialidades_1.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    sub_especialidades_2.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    sub_especialidades_3.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })
            }
            else
            {
                sub_especialidades_1.append('<option value="0">No Aplica</option>');
                sub_especialidades_1.val(0);
                sub_especialidades_2.append('<option value="0">No Aplica</option>');
                sub_especialidades_2.val(0);
                sub_especialidades_3.append('<option value="0">No Aplica</option>');
                sub_especialidades_3.val(0);
            }


        } else {
            alert('No se pudo Cargar los tipos de especialidad');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
}

function buscar_profesional_especialidad()
{
    var requerido = 0;
    var error = '';

    let buscar_especialidad_profesion = $('#buscar_especialidad_profesion').val();
    let buscar_especialidad_especialidad = $('#buscar_especialidad_especialidad').val();
    let buscar_especialidad_subespec = $('#buscar_especialidad_subespec').val();
    let buscar_especialidad_region = $('#buscar_especialidad_region').val();
    let buscar_especialidad_comuna = $('#buscar_especialidad_comuna').val();
    let buscar_especialidad_hora24 = 0;
    if($('#buscar_especialidad_hora24').prop('checked'))
        buscar_especialidad_hora24 = 1;

    if(buscar_especialidad_profesion == '') {
        requerido = 1;
        error += 'Campo requerido Profesión\n';
    }
    if(buscar_especialidad_especialidad == '') {
        requerido = 1;
        error += 'Campo requerido Especialidad\n';
    }

    if(requerido == 0)
    {

        let url = "{{ route('profesional.buscador') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    id_especialidad : buscar_especialidad_profesion,
                    id_tipo_especialidad : buscar_especialidad_especialidad,
                    id_sub_tipo_especialidad : buscar_especialidad_subespec,
                    id_region : buscar_especialidad_region,
                    id_ciudad : buscar_especialidad_comuna,
                    buscar_especialidad_hora24 : buscar_especialidad_hora24,
                },
            })
            .done(function(data) {
                {{--  console.log(data);  --}}
                if (data.estado == 1)
                {
                    $('#div_resultado_busqueda').html('');
                    $(data.registros).each(function(key_registro, value_registro) {
                        {{--  console.log(value_registro);  --}}
                        var html = '';
                        html += '<div class="col-sm-12 col-md-4">';
                        html += '    <div class="card user-card user-card-1 mt-4">';
                        html += '        <div class="card-body pt-0">';
                        html += '            <div class="user-about-block text-center">';
                        html += '                <div class="row align-items-end">';
                        html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="'+value_registro.img_profesional+'" alt="'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'"></div>';
                        html += '                </div>';
                        html += '            </div>';
                        html += '            <div class="text-center">';
                        html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
                        html += '                    <span class="badge badge-primary mt-2">';
                        {{--  html +=                         value_registro.especialidades_nombre;  --}}
                        if(value_registro.tipos_especialidad_nombre != null)
                            html +=                         value_registro.tipos_especialidad_nombre+'<br>';
                        if(value_registro.sub_tipo_especialidad_nombre != null)
                            html +=                         value_registro.sub_tipo_especialidad_nombre;
                        html += '                    </span>';
                        html += '                    <h6 class="mb-1 mt-2">'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'</h6>';
                        html += '                </a>';

                        if($(value_registro.profesional_hora_mas_proxima).length > 0)
                            html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora '+value_registro.profesional_hora_mas_proxima['dia']+' '+value_registro.profesional_hora_mas_proxima['hora']+'</p>';
                        else
                            html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora Sin Agenda</p>';

                        html += '                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional('+value_registro.profesionales_id+');"><i class="feather icon-file-plus"></i> Ver ficha</button>';
                        html += '                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica('+value_registro.profesionales_id+','+value_registro.profesional_hora_mas_proxima.id_lugar_atencion+');"><i class="feather icon-calendar"></i> Reservar hora</button>';
                        html += '            </div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                        $('#div_resultado_busqueda').append(html);
                    });

                    {{--  console.log(data);  --}}
                } else {
                    $('#div_resultado_busqueda').html('<h2>Sin registros</h2>');
                    {{--  console.log(data);  --}}
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }
    else
    {
        swal({
            title: "Busqueda por especialidad, campos Minimos Requeridos",
            text: error,
            icon: "error",
            // buttons: "Aceptar",
            //SuccessMode: true,
        });
    }

}

function lugar_atencion_profesional(element, div_destino, value_init = '')
{
    let id_profesional = $(element).val();
    let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
    $.ajax({

            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
            },
        })
        .done(function(data) {
            if (data.estado == 1) {
                {{--  console.log(data);  --}}
                let input_lugar_atencion = $('#'+div_destino);

                input_lugar_atencion.find('option').remove();
                input_lugar_atencion.append('<option value="">Seleccione</option>');
                $(data.registros).each(function(i, v) { // indice, valor
                    input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(value_init != '')
                {
                    input_lugar_atencion.val(value_init);
                    carga_calendario_profesional();
                }

            } else {
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
}

function carga_calendario_profesional()
{
    let id_profesional = $('#modal_reserva_hora_id_profesional').val();
    let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
    console.log('cargando calendario');
    let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";
    $.ajax({

            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_profesional: id_profesional,
                lugar_atencion: id_lugar_atencion,
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {
                {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                if(data.registros.horario_agenda_laboral != '')
                {
                    console.log(data);
                    let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                    var dias_activos = data.registros.horario_agenda_laboral.split(',');
                    var dias_texto = '';
                    var cant = 0;

                    $.each(dias_activos, function(index, value)
                    {
                        if(cant>0)
                            dias_texto += ' - '+dias[value];
                        else
                            dias_texto += dias[value];

                        cant++;
                    });

                    $('#modal_reserva_dias_atencion').html(dias_texto);

                }
                else
                {
                    $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                }

            } else {
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

}

function calendario(dias_laborales, dias_no_laborales)
{
    {{--  console.log(dias_no_laborales);  --}}
    var date = new Date();
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
    var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();


    var calendarEl = document.getElementById('calendario_reserva_buscador');
    var calendarEl = new FullCalendar.Calendar(calendarEl, {
        navLinks: false,
        droppable: false,
        editable: false,
        locale: "es",
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        headerToolbar: {
            start: 'title',
            center: 'today',
            right: 'next'
        },
        businessHours: {
            daysOfWeek: dias_laborales.split(','), // Monday - Thursday

        },

        weekends: true,
        {{--  nowIndicator: true,  --}}
        {{--  selectable: true,  --}}
        titleFormat: {
            year: 'numeric',
            month: 'numeric',
        },
        allDaySlot: false,
        {{--  expandRows: true,  --}}
        slotEventOverlap: false,
        selectConstraint: "businessHours",
        selectOverlap: function(event) {
            console.log('selectOverlap');
            console.log(event);
            return event.rendering === 'background';
        },


        dateClick: function(info) {
            {{--  console.log('dateClick');  --}}
            {{--  console.log(info);  --}}
            {{--  console.log(info.date);  --}}
            {{--  console.log(info.dateStr);  --}}
            {{--  console.log(info.jsEvent.path);  --}}

            var valido = 1;
            $.each(info.jsEvent.path, function(index, value)
            {
                if(value.className == 'fc-non-business')
                {
                    swal({
                        title: "Toma de Hora",
                        text: "Dia No disponible para toma de Hora",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    valido = 0;
                }

            });


            if(valido == 1)
            {
                var fechainicial = new Date();
                fechainicial = fechainicial.getFullYear()+'-'+(fechainicial.getMonth()+1)+'-'+fechainicial.getDate()

                if(Date.parse(info.dateStr) > Date.parse(fechainicial))
                {
                    var dia_seleccionado = info.date;
                    var dia_semana = ( dia_seleccionado.getDay() ).toString();
                    var dias_laborales_array =  dias_laborales.split(',')

                    if( $.inArray(dia_semana,dias_laborales_array) != -1)
                    {
                        console.log('dia valido');
                        cargar_horas_disponibles_calendario_profesion(info.dateStr);
                    }
                    else
                    {
                        swal({
                            title: "Toma de Hora",
                            text: "Dia No disponible para toma de Hora",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Toma de Hora",
                        text: "No se puede tomar Hora para Dias previos.",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }

        },
        eventDrop: function(info) {
            console.log(info);
            return false;
        },
    });
    calendarEl.render();
}

function cargar_horas_disponibles_calendario_profesion(dia)
{

    let id_profesional = $('#modal_reserva_hora_id_profesional').val();
    let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
    console.log('cargar_horas_disponibles_calendario_profesion');
    console.log(dia);

    let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
    $.ajax({
        url: url,
        type: "get",
        data: {
            //_token: _token,
            id_profesional: id_profesional,
            id_lugar_atencion: id_lugar_atencion,
            dia: dia,
        },
    })
    .done(function(data) {
        console.log(data);
        if (data.estado == 1) {
            $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

            $('#modal_reserva_hora_lista_horas').html('');
            $.each(data.registros, function(index, value)
            {
                var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                var html = '';
                html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                html += ''+hr1;
                html += '</div>';

                $('#modal_reserva_hora_lista_horas').append(html);
            });

        } else {
            // alert('No se pudo Cargar las ciudades');
            $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });

}

function generar_reserva_cita(hora)
{
    console.log('generar_reserva_cita');
    $('.div_rut_buscar').hide();
    $('#form_reseva_de_horas').hide();
    $('#reserva_datos_paciente').hide();
    $('#reserva_agregar_paciente_hora').hide();

    $('#reservar_hora').modal('hide');

    let id_profesional = $('#modal_reserva_hora_id_profesional').val();
    let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
    let fecha_consulta = $('#modal_reserva_fecha').val();
    $('#reserva_hora_id_profesional').val('');
    $('#reserva_hora_id_lugar_atencion').val('');
    $('#reserva_hora_fecha_consulta').val('');
    $('#reserva_hora_hora_consulta').val('');

    let url = "{{ route('paciente.get.informacion') }}";
    var datos = {};
    var id_dependiente_activo = '{{ $paciente->id }}';

    if(id_dependiente_activo != '')
        datos.id_dependiente_activo = id_dependiente_activo;

    $.ajax({
        url: url,
        type: "get",
        data: datos,
    })
    .done(function(data) {
        console.log(data);
        if (data.estado == 1)
        {

            $('.div_rut_buscar').hide();
            $('#form_reseva_de_horas').show();
            $('#reserva_datos_paciente').show();
            $('#reserva_agregar_paciente_hora').hide();

            $('#agenda_agregar_paciente').modal('show');

            $('#reserva_hora_id_profesional').val(id_profesional);
            $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
            $('#reserva_hora_fecha_consulta').val(fecha_consulta);
            $('#reserva_hora_hora_consulta').val(hora);

            $('#reserva_hora_id_paciente').val(data.registro.id);

            $('#reserva_rut_paciente').html(data.registro.rut);
            $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
            $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
            if (data.registro.sexo == 'M') {
                $('#reserva_sexo').text('Masculino');
            } else {
                $('#reserva_sexo').text('Femenino');
            }
            $('#reserva_convenio').html(data.registro.prevision.nombre);
            $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
            $('#reserva_hora_email').html(data.registro.email);
            $('#reserva_hora_telefono').html(data.registro.telefono_uno);



        }
        else
        {
            swal({
                title: "Debe completar los datos de Inscripción",
                text: error,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }

    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });
}

{{--  GENERAR HORA USUARIO EXISTENTE  --}}
function agendar_hora() {

    let url = "{{ route('paciente.solicitar.hora') }}";
    let _token = $('#_token').val();
    let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
    let reserva_hora_id = $('#reserva_hora_id_paciente').val();
    let id_profesional = $('#reserva_hora_id_profesional').val();
    let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
    let id_asistente = $('#reserva_hora_id_asistente').val();
    let origen = $('#reserva_hora_origen').val();


    $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                fecha_consulta: fecha_consulta,
                reserva_hora_id: reserva_hora_id,
                id_lugar_atencion: id_lugar_atencion,
                id_profesional: id_profesional,
                id_asistente: id_asistente,
                origen: origen,
            }
        })
        .done(function(data) {
            if (data != null) {

                data = JSON.parse(data);
                if(data.estado == 'error')
                {
                    swal({
                        title: "Error!",
                        text: data.msj,
                        icon: "error",
                        type: "error",
                        buttons: "Cerrar",
                    });
                }
                else
                {
                    swal({
                        title: "Hora Agendada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                }
                $('#agenda_agregar_paciente').modal('hide');

                    $('#reserva_hora_id_profesional').val('');
                    $('#reserva_hora_id_lugar_atencion').val('');
                    $('#reserva_hora_fecha_consulta').val('');
                    $('#reserva_hora_hora_consulta').val('');
                    $('#reserva_hora_id_paciente').val('');
                    $('#reserva_rut_paciente').html('');
                    $('#reserva_hora_nombre').html('');
                    $('#reserva_fecha_nacimiento').html('');
                    $('#reserva_sexo').text('');
                    $('#reserva_convenio').html('');
                    $('#reserva_direccion').html('');
                    $('#reserva_hora_email').html('');
                    $('#reserva_hora_telefono').html('');


            } else {

                swal({
                    title: "Error!",
                    text: "Problema en la solicitud de la hora",
                    icon: "error",
                    type: "error",
                    buttons: "Cerrar",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};


$(document).ready(function() {
    $('#modal_info_pro_lugar_atencion').DataTable({
        responsive: true,
    })
});

</script>
    