{{-- modal trascribir examen --}}
<div class="modal fade" id="m_transcripcion_examen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_transcripcion_examen" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Transcribir Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_m_transcripcion_examen();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="m_transcripcion_examen_examen_especialidad_id" id="m_transcripcion_examen_examen_especialidad_id" value="">
                <input type="hidden" name="m_transcripcion_examen_id_ficha_atencion" id="m_transcripcion_examen_id_ficha_atencion" value="">
                <input type="hidden" name="m_transcripcion_examen_id_ficha_otorrino" id="m_transcripcion_examen_id_ficha_otorrino" value="">
                <input type="hidden" name="m_transcripcion_examen_id_ficha_especialidad" id="m_transcripcion_examen_id_ficha_especialidad" value="">
                <input type="hidden" name="m_transcripcion_examen_id_examen_tipo" id="m_transcripcion_examen_id_examen_tipo" value="">
                <input type="hidden" name="m_transcripcion_examen_id_paciente" id="m_transcripcion_examen_id_paciente" value="">
                <input type="hidden" name="m_transcripcion_examen_id_profesional" id="m_transcripcion_examen_id_profesional" value="">
                <input type="hidden" name="m_transcripcion_examen_id_tipo" id="m_transcripcion_examen_id_tipo" value="">
                <input type="hidden" name="m_transcripcion_examen_alias" id="m_transcripcion_examen_alias" value="">
                <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                <div id="m_transcripcion_examen_contenido">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="cerrar_m_transcripcion_examen()"; data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success align-middle" onclick="registrat_transcripcion()"; data-dismiss="modal">Registras</button>
            </div>
        </div>
    </div>
</div>

@include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_biopsia_cirugia')
@include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.modal_clasif_colon')

<script>

    /** CERRAR MODAL */
    function cerrar_m_transcripcion_examen()
    {
        $('#m_transcripcion_examen').modal('hide');
        $('#m_transcripcion_examen_id_hora_medica').val('');
        $('#m_transcripcion_examen_id_paciente').val('');
    }

    /** ABRIR MODAL */
    function abrir_transcripcion_examen(id_hora_medica)
    {
        $('#m_transcripcion_examen_id_hora_medica').val(id_hora_medica);
        // let _token = $('#_token').val();
        $('#m_transcripcion_examen_examen_especialidad_id').val('');
        $('#m_transcripcion_examen_id_ficha_atencion').val('');
        $('#m_transcripcion_examen_id_ficha_otorrino').val('');
        $('#m_transcripcion_examen_id_ficha_especialidad').val('');
        $('#m_transcripcion_examen_id_examen_tipo').val('');
        $('#m_transcripcion_examen_id_paciente').val('');
        $('#m_transcripcion_examen_id_profesional').val('');
        $('#m_transcripcion_examen_id_tipo').val('');
        $('#m_transcripcion_examen_alias').val('');
        $('#input_lista_imagenes').val('');

        myDropzone = 'null';
        myDropzone_eda = 'null';
        myDropzone_edb = 'null';
        lista_imagenes = {};

        if(id_hora_medica!=='')
        {
            // $('#m_transcripcion_examen').modal('show');
            let url = '{{ route('asisten.cargar.examen.transcripcion') }}';
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    // _token: _token,
                    id_hora_medica: id_hora_medica,
                },
            })
            .done(function(data)
            {
                console.log(data);

                if (data != null)
                {
                    if(data.estado == 1)
                    {
                        $('#m_transcripcion_examen').modal('show');

                        /** formulario */
                        $('#m_transcripcion_examen_contenido').html(data.tipo_examen.formulario);


                        /** data base */
                        var info_ficha = $.parseJSON(data.ficha_examen.cuerpo);
                        var alias_examen = data.tipo_examen.alias;
                        console.log(info_ficha);
                        $.each(info_ficha, function (key, value)
                        {
                            $('#'+key+'_'+alias_examen).val(value);
                            $('#'+key).val(value);

                            if(key == 'motivo')
                            {
                                $('#descripcion_examen_rfl').val(value);
                            }

                            if(key == 'biopsia')
                            {
                                if(value == 1)
                                    $('#biopsia_check_'+alias_examen).prop('checked', true);
                                else
                                    $('#biopsia_check_'+alias_examen).prop('checked', false);

                                // biopsia(data.tipo_examen.alias);
                            }

                            if(key == 'muestra_hp')
                            {
                                if(value == 1)
                                    $('#muestra_hp_check_'+alias_examen).prop('checked', true);
                                else
                                    $('#muestra_hp_check_'+alias_examen).prop('checked', false);

                                muestra_hp_abrir_div(data.tipo_examen.alias);
                            }



                        });

                        /** carga de imagenes */
                        if(lista_imagenes[data.tipo_examen.alias] == null)
                        {
                            lista_imagenes[data.tipo_examen.alias] = [];
                        }
                        if(data.ficha_examen.examen_especialidad_img != null)
                        {
                            $.each(data.ficha_examen.examen_especialidad_img, function (indexInArray, valueOfElement)
                            {
                                var ext = valueOfElement.nombre.split('.');
                                lista_imagenes[data.tipo_examen.alias][indexInArray] = [
                                    url = valueOfElement.url,
                                    nombre_origian = valueOfElement.nombre,
                                    nombre_img = valueOfElement.nombre,
                                    file_extension = ext[1]
                                ];
                                $('#input_lista_imagenes').val('');
                                $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                            });
                        }

                        init_dropzone();

                        /** carga profesional solicitante */
                        if(data.tipo_examen.alias == 'rfl')
                        {
                            cargar_profesional($('#solicitado_rut_'+data.tipo_examen.alias),'solicitado_por_'+data.tipo_examen.alias, 'solicitado_id_profesional_'+data.tipo_examen.alias, 'div_profesional_no_inscrito');
                        }
                        else
                        {
                            cargar_profesional($('#solicitado_por_rut_'+data.tipo_examen.alias),'solicitado_por_'+data.tipo_examen.alias, 'solicitado_id_profesional_'+data.tipo_examen.alias, 'div_profesional_no_inscrito_'+data.tipo_examen.alias, 'solicitado_por_nombre_'+data.tipo_examen.alias, 'solicitado_por_apellido_'+data.tipo_examen.alias, 'solicitado_por_telefono_'+data.tipo_examen.alias, 'solicitado_por_email_'+data.tipo_examen.alias, 'div_mensaje_'+data.tipo_examen.alias, 'mensaje_solicitado_por_'+data.tipo_examen.alias);
                        }

                        $('#m_transcripcion_examen_examen_especialidad_id').val(data.ficha_examen.id);
                        $('#m_transcripcion_examen_id_ficha_atencion').val(data.ficha_examen.id_ficha_atencion);
                        $('#m_transcripcion_examen_id_ficha_especialidad').val(data.ficha_examen.id_ficha_especialidad);
                        $('#m_transcripcion_examen_id_examen_tipo').val(data.ficha_examen.id_examen_tipo);
                        $('#m_transcripcion_examen_id_paciente').val(data.ficha_examen.id_paciente);
                        $('#m_transcripcion_examen_id_profesional').val(data.ficha_examen.id_profesional);
                        $('#m_transcripcion_examen_id_tipo').val(data.ficha_examen.id_template);
                        $('#m_transcripcion_examen_alias').val(data.tipo_examen.alias);

                    }
                    else
                    {
                        swal({
                            title: "Transcripción de Examen",
                            text: "Falla en la carga",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }

                }
                else
                {
                    swal({
                        title: "Paciente",
                        text: "Falla en el registo",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }
        else
        {
            swal({
                title: "Transcripción de Examen",
                text: "Falla de Hora medica",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function registrat_transcripcion()
    {
        var _token = $('#_token').val();
        var examen_especialidad_id = $('#m_transcripcion_examen_examen_especialidad_id').val();
        var id_ficha_atencion = $('#m_transcripcion_examen_id_ficha_atencion').val();
        var id_ficha_otorrino = $('#m_transcripcion_examen_id_ficha_otorrino').val();
        var id_ficha_especialidad = $('#m_transcripcion_examen_id_ficha_especialidad').val();
        var id_examen_tipo = $('#m_transcripcion_examen_id_examen_tipo').val();
        var id_paciente = $('#m_transcripcion_examen_id_paciente').val();
        var id_profesional = $('#m_transcripcion_examen_id_profesional').val();
        var id_tipo = $('#m_transcripcion_examen_id_tipo').val();
        var alias = $('#m_transcripcion_examen_alias').val();
        var input_lista_imagenes = $('#input_lista_imagenes').val();

        var data = {};
        data._token = _token;
        data.examen_especialidad_id = examen_especialidad_id;
        data.id_ficha_atencion = id_ficha_atencion;
        data.id_ficha_especialidad = id_ficha_especialidad;
        data.id_examen_tipo = id_examen_tipo;
        data.id_paciente = id_paciente;
        data.id_profesional = id_profesional;
        data.id_tipo = id_tipo;
        data.alias = alias;
        data.input_lista_imagenes = input_lista_imagenes;

        $('#m_transcripcion_examen_contenido').find('input,textarea').each(function(key, element){
            console.log(key);
            console.log($(element).attr('id'));
            console.log($(element).val());
            data[$(element).attr('id')] = $(element).val();
        });

        console.log(data);

        let url = "{{ route('asisten.registro.examen.transcripcion') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#m_transcripcion_examen').modal('hide');
                swal({
                    title: "Transcripción de Examen",
                    text: "Registro Exitoso",
                    icon: "success",
                    buttons: "Aceptar",
                });
            }
            else
            {
                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Edicion de Personal",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(e) {
            console.log("error");
            console.log(e);
        });

    }

    /** RFL */
    function cargar_profesional(rut, input_nombre_completo, input_id, div_solicitar,
                            input_nombre='solicitado_por_nombre_rfl', input_apellido='solicitado_por_apellido_rfl',
                            input_tel='solicitado_por_telefono_rfl', input_email='solicitado_por_email_rfl',
                            div_mensaje="div_mensaje", text_mensaje='mensaje_solicitado_por')
    {
        console.log(rut);
        console.log($(rut).val());

        rut = $(rut).val();

        if(rut.length>5)
        {
            url = "{{ route('profesional.buscar') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    rut : rut,
                },
            })
            .done(function(data)
            {
                if(data.estado == 1)
                {

                    if(data.registros.length>0)
                    {
                        var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                        var id = data.registros[0].id;
                        // $('#'+input_nombre_completo).attr('readonly', true);
                        $('#'+input_nombre_completo).val(nombre);
                        $('#'+input_id).val(id);
                        $('#'+div_solicitar).hide();
                        mensaje = '';
                        $('#'+div_mensaje).hide();
                        $('#'+text_mensaje).html(mensaje);
                        $('#'+input_nombre).val('');
                        $('#'+input_apellido).val('');
                        $('#'+input_tel).val('');
                        $('#'+input_email).val('');
                    }
                    else
                    {
                        mensaje = 'Profesional no encontrato, debe ingresar datos.';
                        $('#'+input_nombre_completo).val('');
                        $('#'+input_id).val('');
                        $('#'+div_solicitar).show();
                        $('#'+div_mensaje).show();
                        $('#'+text_mensaje).html(mensaje);
                        $('#'+input_nombre).val('');
                        $('#'+input_apellido).val('');
                        $('#'+input_tel).val('');
                        $('#'+input_email).val('');
                        // $('#'+input_nombre_completo).attr('readonly', true);
                    }
                }
                else
                {
                    mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                    $('#'+div_mensaje).show();
                    $('#'+text_mensaje).html(mensaje);
                    // $('#'+input_nombre_completo).attr('readonly', false);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else if(rut.length==0)
        {
            $('#'+input_nombre_completo).val('');
            // $('#'+input_nombre_completo).attr('readonly', true);
            $('#'+input_id).val('');
            $('#'+div_solicitar).hide();
            $('#'+div_mensaje).hide();
            $('#'+text_mensaje).html('');
        }
    }
    /** CIERRE RFL */


    /** MANEJO DE IMAGENES */
    var myDropzone;
    var myDropzone_eda ;
    var myDropzone_edb ;
    function init_dropzone()
    {
        console.log('init_dropzone');
        if($('#mis-imagenes'))
        {
            Dropzone.options.misImagenes = {
                init:function()
                {
                    myDropzone = this;
                    /** carga de imagenes existentes */
                    if(lista_imagenes['rfl'].length != 0)
                    {
                        $.each(lista_imagenes['rfl'], function (index, value)
                        {
                            let mockFile = { name: value[1], size: 1000 };
                            myDropzone.displayExistingFile(mockFile, value[0]);
                        });
                    }
                },
                url: "{{ route('asistente.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "image/*",
                maxFilesize: 4,
                maxFiles: 12,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

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
                //     cargar_lista_imagenes();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    // cargar_lista_imagenes();
                    cargar_lista_imagenes2(myDropzone, 'rfl');

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
                    cargar_lista_imagenes2(myDropzone, 'rfl');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_imagenes2(myDropzone, 'rfl');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };
        }

        if($('#mis-imagenes-eda'))
        {
            Dropzone.options.misImagenesEda = {
                init:function()
                {
                    myDropzone_eda = this;
                    /** carga de imagenes existentes */
                    if(lista_imagenes['eda'].length != 0)
                    {
                        $.each(lista_imagenes['eda'], function (index, value)
                        {
                            let mockFile = { name: value[1], size: 1000 };
                            myDropzone_eda.displayExistingFile(mockFile, value[0]);
                        });
                    }
                },
                url: "{{ route('asistente.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "image/*",
                maxFilesize: 4,
                maxFiles: 12,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

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
                //     cargar_lista_imagenes2();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_imagenes2(myDropzone_eda,'eda');

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
                    cargar_lista_imagenes2(myDropzone_eda,'eda');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_imagenes2(myDropzone_eda,'eda');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };
        }

        if($('#mis-imagenes-edb'))
        {
            Dropzone.options.misImagenesEdb = {
                init:function()
                {
                    myDropzone_edb = this;
                    /** carga de imagenes existentes */
                    if(lista_imagenes['edb'].length != 0)
                    {
                        $.each(lista_imagenes['edb'], function (index, value)
                        {
                            let mockFile = { name: value[1], size: 1000 };
                            myDropzone_edb.displayExistingFile(mockFile, value[0]);
                        });
                    }
                },
                url: "{{ route('asistente.imagen.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "image/*",
                maxFilesize: 4,
                maxFiles: 12,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

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
                //     cargar_lista_imagenes();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_imagenes2(myDropzone_edb, 'edb');

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
                    cargar_lista_imagenes2(myDropzone_edb, 'edb');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_imagenes2(myDropzone_edb, 'edb');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };
        }

        Dropzone.discover();
    }


    var lista_imagenes = [];
    function cargar_lista_imagenes()
    {
        // console.log('--------------cargar_lista_imagenes----------------------');
        lista_imagenes = [];
        let temp  = myDropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var img_temp = JSON.parse(value.xhr.response);
                    lista_imagenes[index] = [
                        url=img_temp.img.url,
                        nombre_origian= img_temp.img.original_file_name,
                        nombre_img = img_temp.img.nombre_img,
                        file_extension = img_temp.img.file_extension,
                    ];
                    $('#input_lista_imagenes').val('');
                    $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                }
            }
        });
    }

    var lista_imagenes = {};
    function cargar_lista_imagenes2(obj_dropzone, alias_examen)
    {
        // console.log('--------------cargar_lista_imagenes----------------------');
        lista_imagenes[alias_examen] = [];
        let temp  = obj_dropzone.getAcceptedFiles();
        $.each(temp, function( index, value )
        {
            if(value.status == "success")
            {
                if(value.xhr !== undefined)
                {
                    var img_temp = JSON.parse(value.xhr.response);
                    lista_imagenes[alias_examen][index] = [
                        url=img_temp.img.url,
                        nombre_origian= img_temp.img.original_file_name,
                        nombre_img = img_temp.img.nombre_img,
                        file_extension = img_temp.img.file_extension,
                    ];
                    $('#input_lista_imagenes').val('');
                    $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
                }
            }
        });


    }
    /** MANEJO DE IMAGENES */

    function biopsia(alias_examen)
    {
        if($('#biopsia_check_'+alias_examen).prop('checked'))
        {
            $('#m_biopsia_cir').modal('show');
            $('#biopsia_'+alias_examen).val(1);
        }
        else
        {
            $('#biopsia_'+alias_examen).val(0);
            $('#m_biopsia_cir').modal('hide');
        }
    }

    function muestra_hp_abrir_div(alias_examen)
    {
        console.log('muestra_hp_abrir_div');
        var mensaje = ['Test de ureasa No tomado', 'Test de ureasa Negativo', 'Test de ureasa Positivo'];

        var texto_diag_2 = '';

        if($('#muestra_hp_check_'+alias_examen).prop('checked'))
        {
            $('#div_select_muestra_hp_'+alias_examen).show();
            $('#muestra_hp_'+alias_examen).val(1);

            var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
            var texto_diag = $('#'+input_diagnostico).val();


            var input_select = $('#muestra_hp_check_'+alias_examen).attr('data-select');
            var value_selct = $('#'+input_select).val();


            if(value_selct == 0)
                texto_diag_2 = texto_diag.replace(mensaje[0], mensaje[1]);
            else
                texto_diag_2 = texto_diag.replace(mensaje[0], mensaje[2]);

            $('#'+input_diagnostico).val(texto_diag_2);
        }
        else
        {
            $('#div_select_muestra_hp_'+alias_examen).hide();
            $('#muestra_hp_'+alias_examen).val(0);
            $('#muestra_hp_resultado_'+alias_examen).val('');

            var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
            var texto_diag = $('#'+input_diagnostico).val();

            texto_diag_2 = texto_diag.replace('Test de ureasa Negativo', 'Test de ureasa No tomado');
            texto_diag_2 = texto_diag_2.replace('Test de ureasa Positivo', 'Test de ureasa No tomado');

            var input_diagnostico = $('#muestra_hp_check_'+alias_examen).attr('data-diagnostico');
            $('#'+input_diagnostico).val(texto_diag_2);
        }
    }

    function cambio_muestra_hp_resultado(select, input)
    {
        var mensaje = ['Test de ureasa No tomado', 'Test de ureasa Negativo', 'Test de ureasa Positivo'];

        var value_selct = $('#'+select).val();
        var texto_diag = $('#'+input).val();
        var texto_diag_2 = '';

        if(value_selct == 0)
        {
            texto_diag_2 = texto_diag.replace('Test de ureasa No tomado', 'Test de ureasa Negativo');
            texto_diag_2 = texto_diag_2.replace('Test de ureasa Positivo', 'Test de ureasa Negativo');
        }
        else
        {
            texto_diag_2 = texto_diag.replace('Test de ureasa No tomado', 'Test de ureasa Positivo');
            texto_diag_2 = texto_diag_2.replace('Test de ureasa Negativo', 'Test de ureasa Positivo');
        }

        $('#'+input).val(texto_diag_2);
    }

    function abrir_modal_clasificacion_colon(){
        $('#m_clasificacion').modal('show');
    }


</script>
