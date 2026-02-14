<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Vacunas y desparasitación</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="registros_vac_des" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="vac-tab" data-toggle="tab" href="#vac" role="tab" aria-controls="vac" aria-selected="true">Vacunas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="desparasita-tab" data-toggle="tab" href="#desparasita" role="tab" aria-controls="desparasita" aria-selected="false">Desparasitación</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="registros_vac_desp">
                            <!--REGISTRO DE VACUNAS-->
                            <div class="tab-pane fade show active" id="vac" role="tabpanel" aria-labelledby="vac-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
	                                    <h6 class="t-aten">Registro de vacunas</h6>
                                	</div>
                                </div>
                                <div class="form-row">
                                	<div class="col-12">
	                                	<div class="card-lineal">
	                                		<div class="card-body-lineal">
	                                			<div class="form-row">
				                                	<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm">Edad</label>
								                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm">Fecha dosis</label>
								                        <input type="date" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Vacuna</label>
								                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Prox. Dosis</label>
								                        <input type="date" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="col-12 text-right">
								                    	<button type="button" class="btn btn-xs btn-info">+ Añadir</button>
								                    </div>
					                    		</div>
				                    		</div>
					                    </div>
					                </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsible">
                                            <table id="tabla_vacunas_mascotas"
                                                class="display table table-striped dt-responsive nowrap table-sm"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Edad</th>
                                                        <th class="align-middle">Fecha dosis</th>
                                                        <th class="align-middle">Vacuna</th>
                                                        <th class="align-middle">Próx.Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                           1 mes y 5 días
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge badge-secondary">00-00-2025</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            Triplefelina
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge badge-info">11-12-2025</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                           2 meses y 15 días
                                                        </td> 
                                                        <td class="align-middle">
                                                            <span class="badge badge-secondary">00-00-2025</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            Triplefelina
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge badge-info">11-12-2025</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">
                                                           4 meses y 19 días
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge badge-secondary">00-00-2025</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            Rabia
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="badge badge-info">11-12-2025</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                  	</div>
                                </div>
                            </div>

                            <!--REGISTRO DESPARACITACIÓN-->
                            <div class="tab-pane fade show" id="desparasita" role="tabpanel" aria-labelledby="desparasita-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <h6 class="t-aten">Registro de Desparasitaciones</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-12">
	                                	<div class="card-lineal">
	                                		<div class="card-body-lineal">
				                                <div class="form-row">
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Fecha dosis</label>
								                        <input type="date" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Antiparasitario</label>
								                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Tipo</label>
								                        <select class="form-control form-control-sm" name="esterilizado" id="esterilizado" value="">
								                            <option value="">Seleccione</option>
								                            <option value="">Externo</option>
								                            <option value="">Interno</option>
								                            <option value="">Interno y Externo</option>
								                        </select>
								                    </div>
								                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
								                        <label class="floating-label-activo-sm" for="motivo">Prox. Dosis</label>
								                        <input type="date" class="form-control form-control-sm" name="pulso" id="pulso" value="">
								                    </div>
								                    <div class="col-12 text-right">
								                    	<button type="button" class="btn btn-xs btn-info">+ Añadir</button>
								                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>



                                <div class="form-row">
                                	<div class="col-12">
	                                     <table id="tabla_desparacitacion"
	                                    class="display table table-striped dt-responsive nowrap table-sm"
	                                    style="width:100%">
	                                        <thead>
	                                            <tr>
	                                                <th class="align-middle">Fecha dosis</th>
	                                                <th class="align-middle">Antiparasitario</th>
	                                                <th class="align-middle">Tipo</th>
	                                                <th class="align-middle">Próx.Dosis</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                            <tr>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-secondary">00-00-2025</span>
	                                                </td>
	                                                <td class="align-middle">
	                                                    Milpro
	                                                </td>
	                                                <td class="align-middle">
	                                                    Interno
	                                                </td>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-info">11-12-2025</span>
	                                                </td>
	                                            </tr>
	                                             <tr>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-secondary">00-00-2025</span>
	                                                </td>
	                                                <td class="align-middle">
	                                                    Nextgard Combo
	                                                </td>
	                                                <td class="align-middle">
	                                                    Interno y Externo
	                                                </td>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-info">11-12-2025</span>
	                                                </td>
	                                            </tr>
	                                             <tr>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-secondary">00-00-2025</span>
	                                                </td>
	                                                <td class="align-middle">
	                                                    Frontlin
	                                                </td>
	                                                <td class="align-middle">
	                                                    Externo
	                                                </td>
	                                                <td class="align-middle">
	                                                    <span class="badge badge-info">11-12-2025</span>
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
    </div>
</div>



<script>



    /** MANEJO DE IMAGENES GES */

    var lista_archivo_ges = {};

    function cargar_lista_archivo_ges(obj_dropzone, alias_examen)

    {

        // console.log('--------------cargar_lista_archivo_ges----------------------');

        lista_archivo_ges[alias_examen] = [];

        let temp  = obj_dropzone.getAcceptedFiles();

        $.each(temp, function( index, value )

        {

            if(value.status == "success")

            {

                if(value.xhr !== undefined)

                {

                    var archivo_temp = JSON.parse(value.xhr.response);

                    lista_archivo_ges[alias_examen][index] = [

                        url=archivo_temp.archivo.url,

                        nombre_origian= archivo_temp.archivo.original_file_name,

                        nombre_archivo = archivo_temp.archivo.nombre_archivo,

                        file_extension = archivo_temp.archivo.file_extension,

                    ];

                    $('#input_lista_archivo_ges').val('');

                    $('#input_lista_archivo_ges').val(JSON.stringify(lista_archivo_ges));

                }

            }

        });

    }

    /** CIERRE MANEJO DE IMAGENES */



    function registrar_ges_ficha()

    {

        var validar = 0;

        var mensaje ='';



        let nombre_ges = $('#nombre_ges').val();

        let id_ges = $('#id_ges').val();



        let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();

        let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();

        let id_profesional = $('#id_profesional').val();

        let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();

        let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();



        let id_paciente = $('#id_paciente_fc').val();



        let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();

        let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();



        // lista_archivo_ges

        let lista_archivo_ges = $('#input_lista_archivo_ges').val();



        let id_ficha_atencion = $('#id_fc').val();

        let id_lugar_atencion = $('#id_lugar_atencion').val();

        let hora_medica = $('#hora_medica').val();

        // let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();





        // if(nombre_institucion_ficha_ges == '')

        // {

        //     $('#nombre_institucion_ficha_ges').focus();

        //     validar = 1;



        // }

        // if(direccion_institucion_ficha_ges == '')

        // {

        //     $('#direccion_institucion_ficha_ges').focus();

        //     validar = 1;



        // }



        // if(nombre_responsable_ficha_ges == '')

        // {

        //     $('#nombre_responsable_ficha_ges').focus();

        //     validar = 1;



        // }

        // if(rut_responsable_ficha_ges == '')

        // {

        //     $('#rut_responsable_ficha_ges').focus();

        //     validar = 1;



        // }



        if(confirmacion_diagnostica_ficha_ges == '')

        {

            $('#confirmacion_diagnostica_ficha_ges').focus();

            mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;

            validar = 1;



        }

        if(paciente_tratamiento_ficha_ges == '')

        {

            $('#paciente_tratamiento_ficha_ges').focus();

            mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;

            validar = 1;



        }

        if(nombre_ges == '')

        {

            $('#nombre_ges').focus();

            mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;

            validar = 1;

        }

        // if(id_paciente == '')

        // {

        //     $('#id_paciente').focus();

        //     validar = 1;

        // }

        // if(id_profesional == '')

        // {

        //     $('#id_profesional').focus();

        //     validar = 1;

        // }

        // if(id_ficha_atencion == '')

        // {

        //     $('#id_ficha_atencion').focus();

        //     validar = 1;

        // }

        // if(id_lugar_atencion == '')

        // {

        //     $('#id_lugar_atencion').focus();

        //     validar = 1;

        // }

        // if(hora_medica == '')

        // {

        //     $('#hora_medica').focus();

        //     validar = 1;

        // }



        if(validar == 1)

        {

            swal({

                title: "Debe ingresar todos los datos requeridos." ,

                text: mensaje,

                icon: "error",

            })

            return false;

        }

        else

        {



            $.ajax({

                url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",

                type: 'GET',

                dataType: 'json',

                data: {

                    nombre_institucion_ficha_ges : nombre_institucion_ficha_ges,

                    direccion_institucion_ficha_ges : direccion_institucion_ficha_ges,

                    nombre_responsable_ficha_ges : nombre_responsable_ficha_ges,

                    rut_responsable_ficha_ges : rut_responsable_ficha_ges,

                    confirmacion_diagnostica_ficha_ges : confirmacion_diagnostica_ficha_ges,

                    paciente_tratamiento_ficha_ges : paciente_tratamiento_ficha_ges,

                    id_ges : id_ges,

                    nombre_ges : nombre_ges,

                    id_paciente : id_paciente,

                    id_profesional : id_profesional,

                    id_ficha_atencion : id_ficha_atencion,

                    id_lugar_atencion : id_lugar_atencion,

                    hora_medica : hora_medica,

                    // codigo_verificacion : codigo_validacion_informe_ges,

                    codigo_verificacion : '',

                    lista_archivo_ges : lista_archivo_ges,

                },

            })

            .done(function(resp) {

                console.log(resp);



                if (resp != '')

                {

                    if(resp.estado == 1)

                    {

                        console.log(resp);

                        //$('#form_control_obesidad').trigger("reset");

                        $('#nombre_ges').val('');

                        $('#id_ges').val('');



                        $('#nombre_responsable_ficha_ges').val('');

                        $('#rut_responsable_ficha_ges').val('');

                        $('#confirmacion_diagnostica_ficha_ges').val('');

                        $('#paciente_tratamiento_ficha_ges').val('');

                        $('#input_lista_archivo_ges').val('');

                        $('#codigo_validacion_informe_ges').val('');



                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');

                        $('#mensaje').show();

                        $('#form_ges').modal('hide');



                        swal({

                            title: "Constancia GES (Artículo 24 Ley 19.966).",

                            text: 'Registro Exitoso.\n El paciente ha sido Notificado\n La constancia puede ser recuperada desde su escritorio (Documentos).',

                            icon: "success",

                        });

                    }

                    else

                    {

                        swal({

                            title: "Constancia GES (Artículo 24 Ley 19.966).",

                            text: 'Registro Fallido.',

                            icon: "error",

                        });

                    }

                }

                else

                {

                    swal({

                        title: "Constancia GES (Artículo 24 Ley 19.966).",

                        text: 'Registro Fallido.',

                        icon: "error",

                    });

                }

            })

            .fail(function(e) {

                console.log("error");

                console.log(e);

            })

        }

    };



    function ver_pdf_constancia_ges(id_ficha_atencion)

    {



        var variables = '';

        variables += '?id_ficha_atencion='+$('#id_fc').val();

        variables += '&nombre_institucion_ficha_ges='+$('#nombre_institucion_ficha_ges').val();

        variables += '&direccion_institucion_ficha_ges='+$('#direccion_institucion_ficha_ges').val();

        variables += '&nombre_responsable_ficha_ges='+$('#nombre_responsable_ficha_ges').val();

        variables += '&rut_responsable_ficha_ges='+$('#rut_responsable_ficha_ges').val();

        variables += '&confirmacion_diagnostica_ficha_ges='+$('#confirmacion_diagnostica_ficha_ges').val();

        variables += '&paciente_tratamiento_ficha_ges='+$('#paciente_tratamiento_ficha_ges').val();

        variables += '&fecha_ficha_ges='+$('#fecha_ficha_ges').val();

        variables += '&hora_ficha_ges='+$('#hora_ficha_ges').val();

        variables += '&id_ges_diagnostico='+$('#id_ges_diagnostico').val();

        variables += '&nombre_ges='+$('#nombre_ges').val();

        variables += '&funcionalidad='+$('#funcionalidad').val();



        Fancybox.show(

            [

                {

                src: '{{ route("ficha_atencion.vista.previa.pdf.ges") }}'+variables,

                type: "iframe",

                preload: false,

                },

            ]

        );

    }



</script>

