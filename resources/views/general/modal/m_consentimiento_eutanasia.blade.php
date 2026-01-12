<div id="m_aconsenteutanasia" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsenteutanasia" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">

        <div class="modal-content">

			<div class="modal-header bg-info">

				<h5 class="modal-title text-white text-center">Consentimiento informado para eutanasia</h5>

				<button type="button" class="close"  data-dismiss="modal"  aria-label="Close" onclick="$('#m_aconsenteutanasia').modal('hide');">

				<span aria-hidden="true">&times;</span>

				</button>

            </div>

			<div class="modal-body px-4">

                <div id="div_informacion_pasos_cons">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="alert alert-primary text-c-blue" role="alert">

                                 Complete el Diagnóstico, motivo de la eutanasia y luego los datos antes de enviar el formulario.

                            </div>

                        </div>

                    </div>

                </div>

                <input type="hidden" name="id_consentimiento_eut" id="id_consentimiento_eut" value="">

                <div class="form-row">

                    <div class="col-12">

                    <div class="card-informacion">

                        <div class="card-body">

                                <div class="form-row">

                					<div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">

                						<label class="floating-label-activo-sm">Diagnóstico</label>

                						<input type="text" class="form-control form-control-sm" data-input_igual="lic_descripcion_hipotesis,descripcion_hipotesis" id="diagnostico_cons" name="diagnostico_cons" value="" onchange="validarDiagnostico('diagnostico_cons','consentimiento');cargarIgual('diagnostico_cons');" >

                					</div>

                                    <div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">

                						<label class="floating-label-activo-sm">Motivo del procedimiento</label>

                						<input type="text" class="form-control form-control-sm" id="cirugia_cons" name="cirugia_cons" value="">

                					</div>
                				</div>
                                <div class="alert alert-secondary">

                                                <div class="form-row">

                                                    <div class="col-md-12">
                                                        <h5> CONSENTIMIENTO INFORMADO VETERINARIO PARA EUTANASIA DE MASCOTAS</h5>
                                                        <p>1. He consultado con el profesional veterinario <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong> quien me ha explicado e informado, sobre el motivo, los objetivos , que este procedimiento conlleva.</p>
                                                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12">
                                                                    <strong>DECLARO:</strong>
                                                                    <p class="p_ley">
                                                                        Que el Dr/a. Me ha explicado que es conveniente proceder, en la situación de mi mascota, a realizar LA EUTANASIA, que por razones humanitarias, esta puede llevarse a cabo con anestesia.
                                                                    </p>

                                                                    <p class="p_ley">
                                                                       Declaro que he sido informado y he entendido el procedimiento que se va a realizar con la
                                                                        técnica profesional habitual, siendo igualmente informado/a del destino del cadáver, así mismo
                                                                        declaro bajo mi propia responsabilidad la veracidad que el animal no está involucrado en
                                                                        procedimiento legal alguno, así como no ha intervenido en ninguna agresión en los últimos 20
                                                                        días desde la fecha presente.
                                                                    </p><br>




                                                                    <p class="p_ley">
                                                                        <strong>CONSIENTE DE FORMA LIBRE Y EXPRESA QUE DA SU APROBACIÓN PARA QUE: </strong><br>

                                                                        Raza ............... especie …................ microchip...................se le realice la eutanasia<br>
                                                                        bajo  las condiciones que me han sido propuestas.
                                                                        <br>
                                                                    </p>
                                                                    <p class="p_ley">
                                                                        Que ha sido informado/a por el profesional veterinario, acerca de la intervención
                                                                        arriba descrita habiéndo realizado las preguntas oportunas.<br> Ha sido debidamente
                                                                        informado/a de las ventajas y que este tiene carácter de irreversible.
                                                                        <br>
                                                                    </p>
                                                                    <p class="p_ley">

                                                                    Manifiesto también que me hare cargo de todos los gastos siendo consciente de que
                                                                    tengo que abonar los servicios el mismo día de la intervención.<br>
                                                                    Tengo claro, que este consentimiento lo podré revocar en cualquier momento antes de la realización
                                                                    de la intervención.<br>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <br>
                                                   <div class="div_cont1">

                                                    </div>
                                                </div>


                                <div id="div_informacion_general_cons_eut" style="display: none;">

                                    <div class="form-row">

                                        <div class="col-12">







                                                <div class="form-row mt-3">

                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <label class="floating-label-activo-sm">Situaciones especiales del paciente</label>

                                                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="situaciones_especiales_del_paciente" id="situaciones_especiales_del_paciente"></textarea>

                                                    </div>

                                                </div>

                                                <input type="hidden" name="esperando_aprobacion" id="esperando_aprobacion" value="0">



                                                <div class="form-row" id="div_btn_aprobacion_solicitud" style="display:;">

                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6" >

                                                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="registar_solicitar_autorizacion_cons();"><i class="feather icon-check"></i> Solicitar autorización</button>

                                                    </div>

                                                     <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">

                                                        <button type="button" class="btn btn-success btn-sm btn-block" onclick="registar_solicitar_autorizacion_cons()"><i class="feather icon-check"></i> Enviar</button>

                                                    </div>

                                                </div>



                                                <div class="form-row" id="div_btn_aprobacion_espera" style="display: none;">

                                                    <div class="d-flex justify-content-center">

                                                        <div class="spinner-border text-c-blue mt-1 mb-3 mr-3," role="status">

                                                            <span class="sr-only"> </span>

                                                        </div>

                                                        <h5 class="tit-gen pt-2"> Solicitando Autorización</h5>

                                                    </div>

                                                </div>



                                                <div class="form-row" id="div_btn_aprobacion_ok" style="display: none;">

                                                    <div class="form-group col-sm-6">

                                                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_ver_pdf_cons_activa">Ver PDF</button>

                                                    </div>



                                                   <div class="form-group col-sm-6">

                                                        <button type="button" class="btn btn-danger-light btn-sm btn-block" id="btn_enviar_cons_activa">Ver PDF</button>

                                                    </div>



                                                    <div class="form-group col-sm-12">

                                                        <button type="button" class="btn btn-info btn-sm btn-block" onclick="limpiar_consentimiento_informado()">Crear nuevo Consentimiento</button>

                                                    </div>

                                                </div>



                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                                        <p>2. Al autorizar mediante email o por la app, me doy por informado y doy mi consentimiento para el procedimiento enunciado precedentemente.</p>

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



                <!--TABLA-->

                <h6 class="tit-gen mt-3">Consentimientos informados</h6>

                <div class="form-row">

                    <div class="col-12">

                        <div class="card-informacion">

                            <div class="card-body">

                                 <div class="form-row">

                                    <div class="col-12">

                                        <table class="display table table-striped table-xs dt-responsive datatable" style="width:100%" id="m_aconsenteutanasia_table">

                                            <thead>

                                                <tr>

                                                    <th>ID</th>

                                                    <th>Sol. por</th>

                                                    <th>Consentimiento</th>

                                                    <th>Diagnóstico</th>

                                                    <th>Cirugía</th>

                                                    <th>F. Creación</th>

                                                    <th>F. Aprobación</th>

                                                    <th>Estado</th>

                                                    <th>PDF</th>

                                                </tr>

                                            </thead>

                                            <tbody>



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
<script>

    $(document).ready(function () {



        $("#consentimiento").autocomplete({

            source: function(request, response) {

                // console.log(request);

                var longitud = request.term.length;

                if(longitud>2)

                {

                    // Fetch data

                    $.ajax({

                        url: "{{ route('consentimiento.ver_autocomplete') }}",

                        type: 'get',

                        dataType: "json",

                        data: {

                            search: request.term

                        },

                        success: function(data) {

                            // console.log(data);

                            response(data);

                        }

                    });

                }

            },

            select: function(event, ui) {



                // console.log(ui);

                $('#consentimiento').val(ui.item.label);

                $('#id_consentimiento_eut').val(ui.item.value);

                // Set selection

                $.ajax({

                    url: "{{ route('consentimiento.cargar_consentimiento') }}",

                    type: 'get',

                    dataType: "json",

                    data: {

                        id: ui.item.value

                    },

                    success: function(data) {

                        // console.log(data);

                        if(data.estado == 1)

                        {

                            // console.log(data.registro.texto);

                            var texto = data.registro.texto;

                            texto = texto.replace('{diagnostico}', '<span style="font-size: 15px;font-weight: bold;">'+$('#diagnostico_cons').val()+'</span>');

                            texto = texto.replace('{cirugia}', '<span style="font-size: 15px;font-weight: bold;">'+$('#cirugia_cons').val()+'</span>');

                            texto = texto.replace('{nombre_dependiente}', '<span style="font-size: 15px;font-weight: bold;">'+$('#cirugia_cons').val()+'</span>');

                            $('#m_aconsenteutanasia_contenido').html('');

                            $('#m_aconsenteutanasia_contenido').html(texto);



                            $('#div_informacion_pasos_cons').hide();

                            $('#div_informacion_general_cons_eut').show();

                        }

                        else

                        {

                            swal({

                                title: "Problema al Cargar Información de Consentimiento.",

                                text: data.msj,

                                icon: "warning",

                            })

                            $('#div_informacion_pasos_cons').show();

                            $('#div_informacion_general_cons_eut').hide();

                        }

                    }

                });



                return false;

            }

        });



    });



    /** consentimientos informados**/

    function cons_eutan() {

        $('#m_aconsenteutanasia').modal('show');

        validarDiagnostico('diagnostico_cons','consentimiento');

        mostrar_consentimientos_paciente();

        $('#div_informacion_pasos_cons').show();

        $('#div_informacion_general_cons_eut').hide();

    }

    function validarDiagnostico(diagnostico_cons,consentimiento)

    {

        if($('#'+diagnostico_cons).val() == '')

        {

            $('#'+consentimiento).attr('disabled', true);

            // $('#msj_consentimiento').html('Debe ingresar Diagnostico en la Ficha.');

        }

        else

        {

            $('#'+consentimiento).attr('disabled', false);

            // $('#msj_consentimiento').html('');

        }

    }



    function registar_solicitar_autorizacion_cons()

    {



        var id_ficha_atencion = $('#id_fc').val();

        var id_profesional = $('#id_profesional_fc').val();

        var id_paciente = $('#id_paciente_fc').val();

        var diagnostico_cons = $('#diagnostico_cons').val();

        var cirugia_cons = $('#cirugia_cons').val();

        var consentimiento = $('#consentimiento').val();

        var id_consentimiento = $('#id_consentimiento_eut').val();

        var num_consentimiento = 0;

        var observaciones_con = $('#situaciones_especiales_del_paciente').val();

        var otro = '';

        var token = CSRF_TOKEN;



        var datos = {};

        datos._token = token;

        datos.id_ficha_atencion = id_ficha_atencion;

        datos.id_profesional = id_profesional;

        datos.id_paciente = id_paciente;

        datos.diagnostico_cons = diagnostico_cons;

        datos.cirugia_cons = cirugia_cons;

        datos.consentimiento = consentimiento;

        datos.id_consentimiento = id_consentimiento;

        datos.num_consentimiento = num_consentimiento;

        datos.observaciones_con = observaciones_con;

        datos.otro = otro;



        $.ajax({

            url: "{{ route('consentimiento.registrar.autorizacion') }}",

            type: 'post',

            dataType: "json",

            data: datos,

            success: function(data) {

                console.log(data);

                if(data.estado == 1)

                {

                    swal({

                        title: "Consentimiento Informado.",

                        text: 'Generado de forma exitosa.\n solicitud de aprobacion enviada.\n En Espera de aprobación.',

                        icon: "warning",

                    });

                    $('#div_btn_aprobacion_solicitud').hide();

                    $('#div_btn_aprobacion_espera').show();

                    $('#esperando_aprobacion').val(data.solicitud_autorizacion.registro.token);



                    $('#id_consentimiento_eut').val(data.last_id);



                    checkToken('esperando_aprobacion', 'div_btn_aprobacion_ok', 'div_btn_aprobacion_espera','div_btn_aprobacion_solicitud');

                    enviar_consentimiento($('#id_consentimiento_eut').val(), $('#id_fc').val());

                }

                else

                {

                    swal({

                        title: "Problema al generar Consentimiento Informado.",

                        text: data.msj,

                        icon: "warning",

                    });

                }

            }

        });

    }



    function checkToken(input_token, div_mostrar, div_ocultar, div_solicitud)

    {

        let url = "{{ route('check_sdi_token') }}";

        var _token = $('input[name=_token]').val();

        var token = $('#'+input_token).val();

        $.ajax({

            url: url,

            type: "GET",

            data: {

                _token: _token,

                token:token

            },

            success: (resp)=>{

                if(resp.estado==1)

                {

                    if(resp.registro.estado==1)

                    {

                        $('#'+div_mostrar).show();

                        $('#'+div_ocultar).hide();

                        aceptarAprobacion(resp.registro.estado);

                        $('#btn_ver_pdf_cons_activa').click(function (e) {

                            e.preventDefault();

                            ver_pdf_consentimiento($('#id_consentimiento_eut').val(), $('#id_fc').val());

                        });

                        $('#btn_enviar_cons_activa').click(function (e) {

                            e.preventDefault();

                            enviar_consentimiento($('#id_consentimiento_eut').val(), $('#id_fc').val());

                        });

                        mostrar_consentimientos_paciente();

                        $('#diagnostico_cons').attr('disabled', true);

                        $('#cirugia_cons').attr('disabled', true);

                        $('#consentimiento').attr('disabled', true);

                    }

                    else if(resp.registro.estado==2)

                    {

                        $('#'+div_mostrar).hide();

                        $('#'+div_ocultar).hide();

                        $('#'+div_solicitud).show();

                        aceptarAprobacion(resp.registro.estado);

                        $('#btn_ver_pdf_cons_activa').click(function (e) {

                            e.preventDefault();

                        });

                        $('#btn_enviar_cons_activa').click(function (e) {

                            e.preventDefault();

                            //enviar_consentimiento($('#id_consentimiento_eut').val(), $('#id_fc').val());

                        });



                        swal({

                            title: "Consentimiento Informado.",

                            text: 'Consentimiento Informado Rechazado\n Debe solicitar aprobación.',

                            icon: "warning",

                        });

                    }

                    else

                    {

                        setTimeout(checkToken(input_token, div_mostrar, div_ocultar,div_solicitud),3000);

                    }

                }

                else

                {

                    setTimeout(checkToken(input_token, div_mostrar, div_ocultar,div_solicitud),3000);

                }

            },

            error: (resp)=>{

                console.warn(resp);

            }

        });

    }



    function enviar_consentimiento(id_consentimiento, id_ficha_atencion)

    {

        let url = "{{ route('consentimiento.enviar') }}";

        var _token = $('input[name=_token]').val();

        var token = $('#esperando_aprobacion').val();

        $.ajax({

            url: url,

            type: "POST",

            data: {

                id_consentimiento : id_consentimiento,

                id_ficha_atencion : id_ficha_atencion,

                id_paciente : $('#id_paciente_fc').val(),

                id_lugar_atencion : $('#id_lugar_atencion').val(),

                id_profesional : $('#id_profesional_fc').val(),

                _token : _token,

                token : token,

            },

            success: (resp)=>{

                console.log(resp);

                if(resp.estado==1)

                {

                    console.log('Consentimiento enviado exitosamente');

                    swal({

                        title: "Consentimiento Informado.",

                        text: 'Enviado exitosamente.',

                        icon: "success",

                    });

                }

                else

                {

                    console.log('Falla al enviar consentimiento');

                    swal({

                        title: "Consentimiento Informado.",

                        text: 'Falla al enviar consentimiento.',

                        icon: "error",

                    });

                }

            },

            error: (resp)=>{

                console.warn(resp);

            }

        });

    }



    function aceptarAprobacion(estado)

    {

        var id_consentimiento = $('#id_consentimiento_eut').val();

        var token = $('#esperando_aprobacion').val();

        let url = "{{ route('consentimiento.estado.autorizacion') }}";

        var _token = $('input[name=_token]').val();

        $.ajax({

            url: url,

            type: "POST",

            data: {

                id_consentimiento : id_consentimiento,

                token : token,

                estado : estado,

                _token : _token,



            },

            success: (resp)=>{

                console.log(resp);

                if(resp.estado==1)

                {

                    console.log('registro actualizado');

                }

                else

                {

                    console.log('falla en actualizacion');

                }

            },

            error: (resp)=>{

                console.warn(resp);

            }

        });

    }



    function mostrar_consentimientos_paciente()

    {

        var id_paciente_fc = $('#id_paciente_fc').val();

        var id_lugar_atencion = $('#id_lugar_atencion').val();

        var id_ficha_atencion = $('#id_fc').val();



        let url = "{{ route('consentimiento.paciente.ver') }}";

        var _token = $('input[name=_token]').val();

        $('#m_aconsenteutanasia_table tbody').html('');

        $.ajax({

            url: url,

            type: "GET",

            data: {

                id_paciente : id_paciente_fc,

                id_lugar_atencion : id_lugar_atencion,

                id_ficha_atencion: id_ficha_atencion,

            },

            success: (resp)=>{

                console.log(resp);

                html = '';

                if(resp.estado==1)

                {



                    let estado_log = ['En espera', 'Aprobado', 'Rechazado'];

                    $.each(resp.registros, function (key, value) {



                        var estado_log_valor = 0;

                        var fecha_log = '-';

                        if(value.log_users_devices != null){

                            estado_log_valor = value.log_users_devices.estado;

                            fecha_log = value.log_users_devices.updated_at;

                        }



                        html += '<tr>';

                        html += '    <td>'+value.id+'</td>';

                        html += '    <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+' '+value.profesional.apellido_dos+'</td>';

                        html += '    <td>'+value.consentimiento.nombre+'</td>';

                        html += '    <td>'+value.diagnostico_cons+'</td>';

                        html += '    <td>'+value.cirugia_cons+'</td>';

                        html += '    <td>'+value.fecha_cons+'</td>';

                        html += '    <td>'+fecha_log+'</td>';

                        html += '    <td>'+estado_log[estado_log_valor]+'</td>';

                        html += '    <td><button class="btn btn-danger btn-xs" role="button" onclick="ver_pdf_consentimiento(\''+value.id+'\', \''+$('#id_fc').val()+'\');">Ver PDF</button></td>';

                        html += '</tr>';

                    });

                }



                $('#m_aconsenteutanasia_table').DataTable().destroy();

                $('#m_aconsenteutanasia_table tbody').html(html);

                $('#m_aconsenteutanasia_table').DataTable({

                    responsive: true,

                });



            },

            error: (resp)=>{

                console.warn(resp);

            }

        });

    }



    function ver_pdf_consentimiento(id_consentimiento_pcte, id_ficha_atencion)

    {

        Fancybox.close();

        Fancybox.show(

            [

                {

                src: '{{ route("consentimiento.pdf") }}?id_consentimiento='+id_consentimiento_pcte+'&id_ficha_atencion='+id_ficha_atencion,

                type: "iframe",

                preload: false,

                },

            ]

        );

        // cerrar modal

        $('#m_aconsenteutanasia').modal('hide');

    }





    function limpiar_consentimiento_informado()

    {

        mostrar_consentimientos_paciente();



        $('#diagnostico_cons').attr('disabled', false);

        $('#cirugia_cons').attr('disabled', false);

        $('#consentimiento').attr('disabled', false);



        $('#div_informacion_pasos_cons').show();

        $('#div_informacion_general_cons_eut').hide();



        $('#diagnostico_cons').val($('#descripcion_hipotesis').val());

        $('#id_consentimiento_eut').val('');

        $('#cirugia_cons').val('');

        $('#consentimiento').val('');

        $('#id_consentimiento_eut').val('');

        $('#m_aconsenteutanasia_contenido').html('');

        $('#situaciones_especiales_del_paciente').val('');

        $('#esperando_aprobacion').val('');

        $('#div_btn_aprobacion_solicitud').show();

        $('#div_btn_aprobacion_espera').hide();

        $('#div_btn_aprobacion_ok').hide();

    }

</script>
