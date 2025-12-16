    <!--***************MODALS*******************-->


<!---******* Modal Formulario certificado de reposo ********-->
@include('general.sidebar.modal_form_generales.modal_reposo')

<!---******* Modal Formulario de interconsulta ********-->
@include('general.sidebar.modal_form_generales.modal_interconsulta')

<!---******* Modal Formulario de responder interconsulta ********-->
@include('general.sidebar.modal_form_generales.modal_interconsulta_respuesta')

<!---******* Modal Formulario informe médico ********-->
@include('general.sidebar.modal_form_generales.modal_informe_medico')

<!---******* Modal Formulario uso personal ********-->
@include('general.sidebar.modal_form_generales.modal_uso_personal')

<!---******* Modal Formulario enfermedades de declaración obligatoria ********-->
 @include('general.sidebar.modal_form_generales.modal_declaraciones_eno')

<!---******* Modal Formulario Reembolso gastos médicos ********-->
@include('general.sidebar.modal_form_generales.modal_form_reembolso_medico')

<!---******* Modal Formulario Reembolso gastos dentales ********-->
@include('general.sidebar.modal_form_generales.modal_form_reembolso_dental')


<!--Modals Formularios de Consentimientos informados generales-->
 @include('general.sidebar.modal_form_generales.modal_ges')


<!--Botón Flotante-->
<div class="row">
    <div class="col-sm-12">
        <div class="boton-formularios">
            <input type="checkbox" id="btn-mas">
            <div class="redes">
                <a id="boton_1" class="fas fa-user fa-2x" data-toggle="canvas" data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right" title="Antecedentes del paciente" data-placement="left" style="cursor:pointer;"> </a>
                <a id="boton_2" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios de atención" data-placement="left" style="cursor:pointer;"></a>

                @if($profesional->SubTipoEspecialidad()->first())

                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Otorrinolaringología' )
                        <a id="boton_3" class="fas fa-deaf fa-2x" data-toggle="canvas" data-target="#formularios_orl" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Otorrinolaringología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Oftalmología' )
                        <a id="boton_3" class="fas fa-eye-slash fa-2x" data-toggle="canvas" data-target="#formularios_ojo" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Oftalmología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Cirugía Gástrica' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_cirugia" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Cirugia" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Cirugía Coloproctológica' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_colon" aria-expanded="false" aria-controls="bs-canvas-right" title="Coloproctología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Cirugía y Traumatología Pediatrica' )
                        <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_cir_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="formularios_cir_pediatria" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Pediatría General' )
                        <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Pediatria" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Urología' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_uro" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Urología" data-placement="left"></a>
                    @endif

                @elseif($profesional->TipoEspecialidad()->first() && !$profesional->SubTipoEspecialidad()->first())
					{{--
                    @if($profesional->TipoEspecialidad()->first()->nombre == 'PEDIATRÍA' )
                        <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Pediatria" data-placement="left"></a>
                    @endif--}}

                @else

                    {{--  otros profesionales  --}}
                    @if($profesional->Especialidad()->first()->nombre == 'ENFERMERA UNIVERSITARIA' )
                        <a id="boton_3" class="fas fa-bezier-curve fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Enfermera Universitaria" data-placement="left"></a>
                    @endif
                    @if($profesional->Especialidad()->first()->nombre == 'ENFERMERÍA CONTROL NIÑO SANO' )
                        <a id="boton_3" class="fas fa-bezier-curve fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Enfermera Universitaria" data-placement="left"></a>
                    @endif
                    @if($profesional->Especialidad()->first()->nombre == 'MATRÓN/A' )
                        <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Matrón/a" data-placement="left"></a>
                    @endif

                @endif


            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="fa fa-plus"></label>
            </div>
        </div>
    </div>
</div>


@include('atencion_medica.sidebars.antecedentes_paciente')
@include('atencion_medica.sidebars.formularios_atencion')

@section('js-sidebar')
    <script>

        $(document).ready(function(){
            var bsDefaults = {
                offset: false,
                overlay: true,
                width: '330px'
            },
            bsMain = $('.bs-offset-main'),
            bsOverlay = $('.bs-canvas-overlay');

            $('[data-toggle="canvas"][aria-expanded="false"]').on('click', function() {
                var canvas = $(this).data('target'),
                    opts = $.extend({}, bsDefaults, $(canvas).data()),
                    prop = $(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left';

                if (opts.width === '100%')
                    opts.offset = false;

                $(canvas).css('width', opts.width);
                if (opts.offset && bsMain.length)
                    bsMain.css(prop, opts.width);

                $(canvas + ' .bs-canvas-close').attr('aria-expanded', "true");
                $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr('aria-expanded', "true");
                if (opts.overlay && bsOverlay.length)
                    bsOverlay.addClass('show');
                return false;
            });

            $('.bs-canvas-close, .bs-canvas-overlay').on('click', function() {
                var canvas, aria;
                if ($(this).hasClass('bs-canvas-close')) {
                    canvas = $(this).closest('.bs-canvas');
                    aria = $(this).add($('[data-toggle="canvas"][data-target="#' + canvas.attr('id') +
                        '"]'));
                    if (bsMain.length)
                        bsMain.css(($(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left'),
                            '');
                } else {
                    canvas = $('.bs-canvas');
                    aria = $('.bs-canvas-close, [data-toggle="canvas"]');
                    if (bsMain.length)
                        bsMain.css({
                            'margin-left': '',
                            'margin-right': ''
                        });
                }
                canvas.css('width', '');
                aria.attr('aria-expanded', "false");
                if (bsOverlay.length)
                    bsOverlay.removeClass('show');
                return false;
            });

            $('#wizard_constancia_ges').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });

            $('#enfermedades_declaracion_obligatoria').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });

            $('#reembolso_gastos_medicos').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#reembolso_gastos_dentales').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
        });

        /************** GES **************/
        var myDropzone_ges ;
        Dropzone.options.misArchivosGes = {
            init:function()
            {
                myDropzone_ges = this;
            },
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
            },

            acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
            maxFilesize: 4,
            maxFiles: 4,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
            dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_archivo();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                cargar_lista_archivo(myDropzone_ges,'ges');

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                cargar_lista_archivo(myDropzone_ges,'ges');
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_archivo(myDropzone_ges,'ges');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };
        /************** GES **************/

        function registrar_cetificado_reposo() {

            let fecha_inicio_certificado = $('#fecha_inicio_certificado').val();
            let fecha_termino_certificado = $('#fecha_termino_certificado').val();
            let hipotesis_certificado = $('#hipotesis_certificado').val();
            let comentarios_certificado = $('#comentarios_certificado').val();
            let url = "{{ route('ficha_medica.registrar_certificado_reposo') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        fecha_inicio_certificado: fecha_inicio_certificado,
                        fecha_termino_certificado: fecha_termino_certificado,
                        hipotesis_certificado: hipotesis_certificado,
                        comentarios_certificado: comentarios_certificado,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();
                        if(response['estado'] == '1')
                        {
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Certificado de reposo.<i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_certificado_reposo').modal('hide');
                            ver_pdf_certificado_reposo($('#id_fc').val());

                        }
                        else
                        {
                            {{--  $('#mensaje').removeClass('alert-success');
                            $('#mensaje').addClass('alert-danger');
                            $('#mensaje').html('Certificado de reposo. Intente nuevamente<i class="fas fa-times"></i>');
                            $('#mensaje').show();  --}}

                            swal({
                                title: "Registro de Certificado de Reposo." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function ver_pdf_certificado_reposo(id_ficha_atencion)
        {

            let url = "{{ route('pdf.certificado_reposo') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.certificado_reposo") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        function registrar_interconsulta()
        {
            var  mensaje = '';
            var valido = 1;

            let profesion = $('#profesion').val();
            let especialidad = $('#especialidad').val();
            let sub_tipo_especialidad = $('#sub_tipo_especialidad').val();
            let profesional_inter = $('#profesional_inter').val();
            let nombre_profesional_inter = $('#nombre_profesional_inter').val();
            let hipotesis_interconsulta = $('#hipotesis_interconsulta').val();
            let comentarios_interconsulta = $('#comentarios_interconsulta').val();
            let id_fc = $('#id_fc').val();
            let url = "{{ route('ficha_medica.registrar_interconsulta') }}";
            let hora_medica = $('#hora_medica').val();

            if(profesion == '') {
                mensaje += 'Debe ingresar Profesión\n';
                valido = 0;
            }

            if(especialidad == '') {
                mensaje += 'Debe ingresar Especialidad\n';
                valido = 0;
            }

            // if(sub_tipo_especialidad == '') {
            //     mensaje += 'Debe ingresar Sub Tipo Especialidad\n';
            //     valido = 0;
            // }
            // if(profesional_inter == '') {
            //     mensaje += 'Debe ingresar profesional_inter\n';
            //     valido = 0;
            // }
            // if(nombre_profesional_inter == '') {
            //     mensaje += 'Debe ingresar nombre_profesional_inter\n';
            //     valido = 0;
            // }

            if(hipotesis_interconsulta == '') {
                mensaje += 'Debe ingresar Hipótesis diagnóstica\n';
                valido = 0;
            }
            if(comentarios_interconsulta == '') {
                mensaje += 'Debe ingresar que desea saber\n';
                valido = 0;
            }

            if(valido == 1)
            {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            profesion: profesion,
                            especialidad: especialidad,
                            sub_tipo_especialidad: sub_tipo_especialidad,
                            profesional_inter: profesional_inter,
                            nombre_profesional_inter: nombre_profesional_inter,
                            hipotesis_interconsulta: hipotesis_interconsulta,
                            comentarios_interconsulta: comentarios_interconsulta,
                            id_fc: id_fc,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha creado la interconsulta de forma correcta');
                            $('#mensaje').show();
                            $('#modal_interconsulta').modal('hide');
                            ver_pdf_interconsulta(response.id_last);
                        }
                        else
                        {
                            swal({
                                title: "Se ha presentado un problema al registrar." ,
                                icon: "error",
                            })
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);

                    })

            }
            else
            {
                swal({
                    title: "Complete los datos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        };

        function enviar_respuesta_interconsulta()
        {
            var  mensaje = '';
            var valido = 1;

            let inter_id = $('#inter_id').val();
            let inter_resp_diagnostico = $('#inter_resp_diagnostico').val();
            let inter_resp_tratamiento = $('#inter_resp_tratamiento').val();
            let inter_resp_comentario = $('#inter_resp_comentario').val();
            let requiere_control = $('#requiere_control').prop('checked');
            let id_fc = $('#id_fc').val();
            let url = "{{ route('ficha_medica.registrar_interconsulta_respuesta') }}";


            if(inter_resp_diagnostico == '') {
                mensaje += 'Debe ingresar Diagnostico\n';
                valido = 0;
            }
            if(inter_resp_tratamiento == '') {
                mensaje += 'Debe ingresar Tratamiento\n';
                valido = 0;
            }


            if(valido == 1)
            {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            inter_id : inter_id,
                            inter_resp_diagnostico : inter_resp_diagnostico,
                            inter_resp_tratamiento : inter_resp_tratamiento,
                            inter_resp_comentario : inter_resp_comentario,
                            requiere_control : requiere_control,
                            id_fc : id_fc,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha enviado la respuesta de la interconsulta de forma correcta');
                            $('#mensaje').show();
                            $('#modal_interconsulta_respuesta').modal('hide');
                            ver_pdf_interconsulta(inter_id);
                        }
                        else
                        {
                            swal({
                                title: "Se ha presentado un problema al registrar." ,
                                icon: "error",
                            })
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);

                    })

            }
            else
            {
                swal({
                    title: "Complete los datos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        }

        function ver_pdf_interconsulta(id_interconsulta)
        {

            let url = "{{ route('pdf.interconsulta') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.interconsulta") }}?id_interconsulta='+id_interconsulta,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }


        function registrar_informe_medico() {

            {{-- let fecha_informe_medico = $('#fecha_informe_medico').val(); --}}
            let comentarios_informe_medico = $('textarea#comentarios_informe_medico').val();
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('ficha_medica.registrar_informe_medico') }}";

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        comentarios_informe_medico: comentarios_informe_medico,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);

                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();

                        if(response['estado'] == '1')
                        {
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Informe medico. <i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_inf_medico').modal('hide');

                            ver_pdf_informe_medico($('#id_fc').val());
                        }
                        else
                        {
                            swal({
                                title: "Registro de Informe Medico." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }


                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);

                })
        };

        function ver_pdf_informe_medico(id_ficha_atencion)
        {

            let url = "{{ route('pdf.informe_medico') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.informe_medico") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        function registrar_uso_personal() {


            let dirigido_a = $('#uso_personal_dirigido_a').val();
            let cargo = $('#uso_personal_cargo').val();
            let mensaje = $('textarea#uso_personal_mensaje').val();
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('ficha_medica.registrar_uso_personal') }}";

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        dirigido_a : dirigido_a,
                        cargo : cargo,
                        mensaje : mensaje,
                        hora_medica : hora_medica,
                        id_lugar_atencion : id_lugar_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);

                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();

                        if(response['estado'] == '1')
                        {
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Uso Personal. <i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_uso_personal').modal('hide');

                            ver_pdf_uso_personal($('#id_fc').val());
                        }
                        else
                        {
                            swal({
                                title: "Registro de Uso Personal." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }


                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);

                })
        };

        function ver_pdf_uso_personal(id_ficha_atencion)
        {

            let url = "{{ route('pdf.uso_personal') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.uso_personal") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        {{--  ESPECIALIDADES Y SUB_ESPECIALIDAD  --}}
        function buscar_tipo_especialidad()
        {

            let tipo_especialidad_registro = $('#especialidad');
            tipo_especialidad_registro.find('option').remove();

            let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#profesion').val();
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
                    console.log(data);
                    let especialidades = $('#especialidad');

                    especialidades.find('option').remove();
                    especialidades.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        especialidades.append('<option value="0">No Aplica</option>');
                        especialidades.val(0);

                        let sub_especialidades = $('#sub_tipo_especialidad');
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function buscar_sub_tipo_especialidad()
        {
            let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#especialidad').val();
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
                    console.log(data);
                    console.log(data.length);
                    let sub_especialidades = $('#sub_tipo_especialidad');

                    sub_especialidades.find('option').remove();
                    sub_especialidades.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_profesional()
        {
            let profesional_inter = $('#profesional_inter');
            profesional_inter.find('option').remove();

            let profesion = $('#profesion').val();
            let especialidad = $('#especialidad').val();
            let sub_tipo_especialidad = $('#sub_tipo_especialidad').val();
            let url = "{{ route('profesional.buscar') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_especialidad: profesion,
                    id_tipo_especialidad: especialidad,
                    id_sub_tipo_especialidad: sub_tipo_especialidad,
                },
            })
            .done(function(data) {
                if (data.estado = 1) {

                    console.log(data);
                    console.log(data.registros.length);


                    profesional_inter.find('option').remove();
                    profesional_inter.append('<option value="">Seleccione</option>');
                    if(data.registros.length > 0)
                    {
                        $(data.registros).each(function(i, v) { // indice, valor
                            profesional_inter.append('<option value="' + v.id + '">' + v.nombre + ' ' + v.apellido_uno + ' ' + v.apellido_dos + '</option>');
                        })
                        profesional_inter.append('<option value="OTRO">Otro</option>');
                    }
                    else
                    {
                        profesional_inter.append('<option value="0">Sin Especialista</option>');
                        profesional_inter.append('<option value="OTRO">Otro</option>');
                        profesional_inter.val(0);
                    }

                    $('#profesional_inter').change(function(){
                        var id_actual  = $('#profesional_inter option:selected').val();
                        var text_actual  = $('#profesional_inter option:selected').text();
                        if(id_actual == 'OTRO'){
                            $('.nombre_profesional_inter').show();
                            $('#nombre_profesional_inter').val('Ingrese nombre del profesional');
                        }
                        else
                        {
                            $('.nombre_profesional_inter').hide();
                            $('#nombre_profesional_inter').val(text_actual);
                        }

                    });

                } else {
                    console.log('No se encontro profesional');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_receta(id_ficha_clinica) {

            {{--  url = '{{ route('buscar.recetas') }}';  --}}
            url = '{{ route('detalle_receta.ver_medicamentos') }}';
            id_ficha = id_ficha_clinica;
            $('#tabla_receta tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombre_paciente);

                        if(data.estado == 1)
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var medicamento = value.producto;
                                var presentacion = value.presentacion;
                                var posologia = value.posologia;
                                var via_administracion = value.via_administracion;
                                var periodo = value.periodo;
                                var uso_cronico = value.uso_cronico;
                                var cantidad_compr = value.cantidad_compra;

                                if(uso_cronico == 1)
                                    uso_cronico = 'USO CRONICO';
                                else
                                    uso_cronico = 'NORMAL';

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila =  '<tr class="tr_receta" id="row' + j + '">'+
                                                '<td>' + fecha + '</td>'+
                                                '<td>' + medicamento + '</td>'+
                                                '<td>' + presentacion + '</td>'+
                                                '<td>' + posologia + '</td>'+
                                                '<td>' + via_administracion + '</td>'+
                                                '<td>' + periodo + '</td>'+
                                                '<td>' + uso_cronico + '</td>'+
                                                '<td>' + cantidad_compr + '</td>'+
                                            '</tr>';
                                            //esto seria lo que contendria la fila

                                $('#tabla_atenciones_previas_receta tbody').append(fila);
                            });
                        }
                        else
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#tabla_atenciones_previas_receta tbody').append(fila);
                        }

                    } else {
                        $('#tabla_atenciones_previas_receta tbody').html('');
                        var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#tabla_atenciones_previas_receta tbody').append(fila);
                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#tabla_atenciones_previas_receta').dataTable().fnClearTable();
                $('#tabla_atenciones_previas_receta').dataTable().fnDestroy();
                $('#tabla_atenciones_previas_receta').DataTable({
                    responsive: true,
                    "bPaginate": false,
                    "searching": false
                });

        }

        function buscar_examenes(id_ficha_clinica)
        {

            {{-- url = "{{ route('buscar.examenes_ficha') }}"; --}}
            url = "{{ route('examenes.ver_examenes') }}";
            id_ficha = id_ficha_clinica;
            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_examen').text('Exámenes de: ' + data.paciente.nombre_paciente);
                        if(data.estado == 1)
                        {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var examen = value.examen;
                                var tipo_examen = value.tipo_examen;
                                var prioridad = value.id_prioridad;

                                switch (prioridad) {
                                    case 1:
                                        prioridad = 'Baja';
                                        break;
                                    case 2:
                                        prioridad = 'Media';
                                        break;
                                    case 3:
                                        prioridad = 'Alta';
                                        break;
                                    case 4:
                                        prioridad = 'Urgente';
                                        break;

                                    default:
                                        prioridad = 'Sin Prioridad';
                                        break;
                                }

                                var fila = '';
                                fila += '<tr class="tr_examen" id="row' + j + '">';
                                fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                fila += '    <td class="text-center align-middle">' + examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + tipo_examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + prioridad + '</td>';
                                fila += '</tr>'; //esto seria lo que contendria la fila

                                j++;

                                $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);

                            });
                        }
                        else
                        {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                    }
                    $('#m_cons_examen').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnClearTable();
                $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnDestroy();
                $('#table_atecion_previa_tabla_examen_paciente').DataTable({
                    responsive: true,
                    "bPaginate": false,
                });

        }

        function buscar_archivos(id_ficha_clinica)
        {

            let url = "{{ route('ficha_atencion.ver_archivos') }}";
            let id_ficha = id_ficha_clinica;
            $('#table_atenciones_previas_archivos tbody').html('');

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion_soli: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                        if(data.estado == 1)
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.fecha);
                                var tipo = value.tipo;
                                var id = value.id;
                                var id_ficha_archivo = value.id_ficha;
                                var url = value.url;

                                var metodo='';
                                switch (tipo) {
                                    case 'Certificado de Reposo':
                                        metodo = 'ver_pdf_certificado_reposo'+'('+id_ficha_archivo+')';
                                        break;
                                    case 'Interconsulta':
                                        metodo = 'ver_pdf_interconsulta'+'('+id+')';
                                        break;
                                    case 'Informen Medico':
                                        metodo = 'ver_pdf_informe_medico'+'('+id_ficha_archivo+')';
                                        break;
                                    case 'Uso Personal':
                                        metodo = 'ver_pdf_uso_personal'+'('+id_ficha_archivo+')';
                                        break;

                                    default:
                                        metodo = '';
                                        break;
                                }

                                var fila = '';
                                fila += '<tr class="tr_examen" id="row' + j + '">';
                                fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                fila += '    <td class="text-center align-middle">' + tipo + '</td>';
                                if(metodo != '')
                                    fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'; $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                else
                                    fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                fila += '</tr>';

                                j++;

                                $('#table_atenciones_previas_archivos tbody').append(fila);

                            });
                        }
                        else
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
                            var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atenciones_previas_archivos tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atenciones_previas_archivos tbody').html('');
                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atenciones_previas_archivos tbody').append(fila);
                    }
                    $('#m_cons_archivos').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
                $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
                $('#table_atenciones_previas_archivos').DataTable({
                    responsive: true,
                    "bPaginate": false,
                    "searching": false
                });

        }

        function buscar_receta_ficha(id) {
            console.log(id);
        };

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

        function  buscar_ficha_atencion(id_ficha_atencion)
        {
            let url = "{{ route('ficha_clinica.get_ficha') }}";


            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_ficha_atencion: id_ficha_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {

                        if (response['estado'] == '1')
                        {
                            $('#m_consultaantLabel').html( 'Datos de Consulta de: '+response.paciente.nombre);
                            $('#label_motivo').html(response.registros.motivo);
                            $('#label_examen_fisico').html(response.registros.examen_fisico);
                            $('#label_antecedentes').html(response.registros.antecedentes);
                            $('#label_diagnostico').html(response.registros.hipotesis_diagnostico);


                        } else {
                            $('#label_motivo').html('');
                            $('#label_examen_fisico').html('');
                            $('#label_antecedentes').html('');
                            $('#label_diagnostico').html('');
                        }
                        $('#m_consultaant').modal('show');
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
        }

    </script>
@endsection
