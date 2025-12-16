<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Constancia GES (Artículo 24 Ley 19.966)</h5>
                <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Seleccione Patología Ges</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_ges" id="nombre_ges">
                            <input type="hidden" class="form-control form-control-sm" name="id_ges" id="id_ges">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                        <ul class="nav nav-tabs-aten nav-fill" id="form-ges" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="inf-prestador-tab" data-toggle="tab" href="#inf-prestador" role="tab" aria-controls="inf-prestador" aria-selected="true">Info. del prestador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="inf-pcte-tab" data-toggle="tab" href="#inf-pcte" role="tab" aria-controls="inf-pcte" aria-selected="true">Info. del Paciente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="inf-med-tab" data-toggle="tab" href="#inf-med" role="tab" aria-controls="info-med" aria-selected="true">Info. Médica</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="const-tab" data-toggle="tab" href="#const" role="tab" aria-controls="const" aria-selected="true">Constancia</a>
                            </li>
                        </ul>
                    </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="form-ges">
                                <!--INFO PRESTADOR-->
                                <div class="tab-pane fade show active" id="inf-prestador" role="tabpanel" aria-labelledby="inf-prestador-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten-dos">Información del Prestador</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            @if(isset($lugar_atencion))
                                            <ul>
                                                <li><strong>Nombre Institución:  </strong><span>{{ $lugar_atencion->nombre }}</span>
                                                    <input type="hidden" name="nombre_institucion_ficha_ges" id="nombre_institucion_ficha_ges" value="{{ $lugar_atencion->nombre }}"></li>
                                                <li><strong>Profesional:  </strong><span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span></li>
                                                <li><strong>Teléfono:  </strong><span>{{ $profesional->telefono_uno }}</span></li>
                                                <li><strong>Dirección:  </strong>{{--  <span>{{ $profesional->Direccion()->first()->direccion .' ' .$profesional->Direccion()->first()->numero_dir .', Región de ' .$profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$profesional->Direccion()->first()->Ciudad()->first()->nombre }}</span>  --}}
                                                    <span>{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                    <input type="hidden" name="direccion_institucion_ficha_ges" id="direccion_institucion_ficha_ges" value="{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}">
                                                </li>
                                            </ul>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <!--INFO PACIENTE-->
                                <div class="tab-pane fade show" id="inf-pcte" role="tabpanel" aria-labelledby="inf-pcte-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten-dos">Información del Paciente</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <ul>
                                                <li><strong>Nombre:  </strong><span>{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos  }}</span>
                                                    <input type="hidden" name="nombre_paciente_ficha_ges" id="nombre_paciente_ficha_ges" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" >
                                                </li>
                                                <li>
                                                    <strong>Rut:  </strong><span>{{ $paciente->rut }}</span>
                                                    <input type="hidden" name="rut_paciente_ficha_ges" id="rut_paciente_ficha_ges" value="{{ $paciente->rut }}" >
                                                </li>
                                                <li>
                                                    <strong>Previsión:  </strong>
                                                    <span>
                                                        @if(isset($prevision))
                                                        @foreach ($prevision as $previ)
                                                            @if ($previ->id == $paciente->Prevision()->first()->id)
                                                                {{ $previ->nombre }}
                                                                <input type="hidden" name="prevision_ficha_ges" id="prevision_ficha_ges" value="{{ $paciente->Prevision()->first()->id }}">
                                                            @endif
                                                        @endforeach
                                                        @endif
                                                    </span>
                                                </li>
                                                <li>
													<strong>Dirección:  </strong>
													@if( $paciente->id_direccion )
														<span>{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}</span>
														<input type="hidden" name="direccion_paciente" id="direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" ></li>
													@else
														<span></span>
														<input type="hidden" name="direccion_paciente" id="direccion_paciente" value="" ></li>
													@endif
                                                <li><strong>Correo electrónico:  </strong><span>{{ $paciente->email }}</span>
                                                    <input type="hidden" name="email_paciente" value="{{ $paciente->email }}" id="email_paciente" >
                                                </li>
                                                <li><strong>Teléfono:  </strong><span>{{ $paciente->telefono_uno }}</span>
                                                    <input type="hidden" name="telefono_paciente" value="{{ $paciente->telefono_uno }}" id="telefono_paciente" >
                                                </li>
                                            <ul>
                                        </div>
                                    </div>
                               </div>
                               <!--INFO MEDICA-->
                               <div class="tab-pane fade show" id="inf-med" role="tabpanel" aria-labelledby="inf-med-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                        <h6 class="t-aten-dos">Información Médica</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Confirmación diagnóstica GES</label>
                                        <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_ficha_ges" id="confirmacion_diagnostica_ficha_ges">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">¿Paciente con tratamiento?</label>
                                        <input type="text" class="form-control form-control-sm" name="paciente_tratamiento_ficha_ges" id="paciente_tratamiento_ficha_ges">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="t-aten-dos">Fecha Notificación</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <span>
                                            <h5>
                                                {{ Carbon\Carbon::now()->timezone('America/Santiago')->format('d-m-Y H:i') }}
                                            </h5>
                                        </span>
                                    </div>
                                </div>
                                </div>
                                <!--CONSTANCIA-->
                               <div class="tab-pane fade show" id="const" role="tabpanel" aria-labelledby="const-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="text-c-blue text-center t-aten-dos">Constancia</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="alert alert-warning mb-1" role="alert">
                                                Si desea adjuntar un documento arrastre el archivo en el recuadro.
                                              </div>
                                            <div class=" text-justify pt-3 pb-1" role="alert">
                                                <input type="hidden" name="input_lista_archivo_ges" id="input_lista_archivo_ges" value="">
                                                <!-- [ Main Content ] start -->
                                                <div class="dropzone" id="mis-archivos-ges" action="{{ route('profesional.imagen.carga') }}"></div>
                                                <!-- [ file-upload ] end -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-danger-light-c mt-2 mb-2" onclick="ver_pdf_constancia_ges();"><i class="feather icon-file"></i> Ver PDF</button>
                                        </div>
                                        <div class="col-sm-6 col-md-6 text-center">
                                            <button type="button" class="btn btn-info-light-c mt-2 mb-2" onclick="registrar_ges_ficha();"><i class="feather icon-save"></i> Guardar / Enviar Notificación</button>
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
