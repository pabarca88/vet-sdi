<div class="row mb-1">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                     <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                         <div class="card-informacion p-2">
                            <div class="card-top" id="img">
                                <h6 class="text-c-blue">Imagenes Pre</h6>
                                <div class="dropzone" id="mis-imagenes-dentales" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div class="form-group fill mt-3">
                                <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="iden_image_pre{{ $counter }}" id="iden_image_pre{{ $counter }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="card-informacion p-2">
                            <div class="card-top" id="img">
                                <h6 class="text-c-blue">Imagenes Post</h6>
                                <div class="dropzone" id="mis-imagenes-dentales-post" action="{{ route('profesional.imagen.carga') }}"></div>
                            </div>
                            <div>
                                <div class="form-group fill mt-3">
                                    <label for="" class="floating-label-activo-sm">Identificación de imagen</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="iden_image_post{{ $counter }}" id="iden_image_post{{ $counter }}"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mt-2">
                        <div class="form-group fill">
                            <input type="hidden" name="biopsia_odont{{ $counter }}" id="biopsia_odont{{ $counter }}" value="">

                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones / Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $counter }}" id="obs_result_biopsia{{ $counter }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-icon btn-info" onclick="guardar_pieza_imagenes_rx({{ $counter }})" ><i class="feather icon-save"></i></button>
                        <button type="button" class="btn btn-icon btn-danger" onclick="ocultar_pieza_imagenes_rx()"><i class="feather icon-x"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    if (typeof dropzone_pre === 'undefined') {
        var dropzone_pre;
    }
    if(typeof dropzone_post == 'undefined'){
        var dropzone_post;
    }

    if(typeof dropzone_files_odonto == 'undefined'){
        var dropzone_files_odonto;
    }

    $(document).ready(function(){
        // Configuración de Dropzone
        init_dropzone_imagenes();
        init_dropzone_files_odonto();
    });

    function init_dropzone_imagenes()
    {
        // Inicializa Dropzone sobre el nuevo elemento
        dropzone_pre = new Dropzone("#mis-imagenes-dentales", {
            url: "{{ ROUTE('profesional.imagenes.guardar_dental')  }}",
            method: 'post',
            autoProcessQueue: false,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: function() { return "file[]"; },
            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
            dictRemoveFile: "Eliminar archivo",
            success: function (file, response) {
                console.log("Imagen subida con éxito:", response);
            },
            error: function (file, message) {
                console.error("Error al subir imagen:", message);
            },
            sending: function (file, xhr, formData) {
                const idExamenRx = document.querySelector('#id_imagenes_dental')?.value;
                const idImagePre = document.querySelector('#id_image_pre')?.value;
                const detalle = "Pre";

                if (idExamenRx) {
                    formData.append("id_examen", idExamenRx);
                    formData.append("id_image_pre", idImagePre);
                    formData.append("detalle", detalle);

                    console.log("Datos adicionales enviados:", {
                        id_examen: idExamenRx,
                        id_image_pre: idImagePre,
                        detalle: detalle
                    });
                } else {
                    console.error("id_imagenes_dental no encontrado en el DOM.");
                }
            }
        });


        dropzone_post = new Dropzone("#mis-imagenes-dentales-post", {
            url: "{{ ROUTE('profesional.imagenes.guardar_dental')  }}",
            method: 'post',
            autoProcessQueue: false, // Desactiva el procesamiento automático
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: function() { return "file[]"; },
            acceptedFiles: "image/*",
            maxFilesize: 4, // Tamaño máximo en MB
            maxFiles: 12,
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
            dictRemoveFile: "Eliminar archivo",
            success: function (file, response) {
                console.log("Imagen subida con éxito:", response);
            },
            error: function (file, message) {
                console.error("Error al subir imagen:", message);
            },
            sending: function (file, xhr, formData) {
                const idExamenRx = document.querySelector('#id_imagenes_dental')?.value;
                const idImagePre = document.querySelector('#id_image_post')?.value;
                const detalle = "Post";

                if (idExamenRx) {
                    formData.append("id_examen", idExamenRx);
                    formData.append("id_image_post", idImagePre);
                    formData.append("detalle", detalle);

                    console.log("Datos adicionales enviados:", {
                        id_examen: idExamenRx,
                        id_image_pre: idImagePre,
                        detalle: detalle
                    });
                } else {
                    console.error("id_imagenes_dental no encontrado en el DOM.");
                }
            },
            init: function () {
                console.log("Dropzone inicializado dinámicamente");
            }
        });
    }

    function init_dropzone_files_odonto(){
        // Inicializa Dropzone sobre el nuevo elemento
        dropzone_files_odonto = new Dropzone("#mis-imagenes", {
            url: "{{ ROUTE('profesional.imagenes.guardar_dental')  }}",
            method: 'post',
            autoProcessQueue: false,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            paramName: "file[]",
            acceptedFiles: "image/*,application/pdf",
            maxFilesize: 4,
            maxFiles: 12,
            addRemoveLinks: true,
            dictDefaultMessage: "Arrastra un archivo aquí o haz clic para subirlo.",
            dictRemoveFile: "Eliminar archivo",
            success: function (file, response) {
                console.log("Archivo subido con éxito:", response);
            },
            error: function (file, message) {
                console.error("Error al subir archivo:", message);
            }
        });
    }

    function guardar_pieza_imagenes_rx(counter){
        let biopsia = $('#biopsia_check_odont'+counter).is(':checked');
        let zona_motivo = $('#od_biop_zona'+counter).val();
        let observaciones = $('#obs_result_biopsia'+counter).val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let id_image_pre = $('#iden_image_pre'+counter).val();
        let id_image_post = $('#iden_image_post'+counter).val();
        let seccion = 'gral';

        let data = {
            _token: CSRF_TOKEN,
            biopsia: biopsia,
            zona_motivo: zona_motivo,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            id_image_pre: id_image_pre,
            id_image_post: id_image_post,
            seccion: seccion
        }

        let url = "{{ ROUTE('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_imagenes_dent').empty();
                    $('#contenedor_imagenes_dent').append(resp.v);
                    $('#contenedor_nueva_imagen_dent').empty();
                    $('#id_imagenes_dental').val(resp.rx.id);
                    $('#id_image_pre').val(id_image_pre);
                    $('#id_image_post').val(id_image_post);

                    // Verificar qué Dropzones tienen archivos
                    const hasPre = dropzone_pre && dropzone_pre.getQueuedFiles().length > 0;
                    const hasPost = dropzone_post && dropzone_post.getQueuedFiles().length > 0;

                    console.log("📊 Estado Dropzones:", {
                        pre: hasPre ? dropzone_pre.getQueuedFiles().length : 0,
                        post: hasPost ? dropzone_post.getQueuedFiles().length : 0
                    });

                    // Función para finalizar la carga
                    function finalizarCarga() {
                        setTimeout(() => {
                            recargar_imagenes_rx('gral');
                        }, 1000);
                    }

                    // Función para procesar dropzone_post
                    function procesarPost() {
                        if (hasPost) {
                            console.log("🚀 Procesando POST...");
                            dropzone_post.off("queuecomplete");
                            dropzone_post.processQueue();

                            dropzone_post.on("queuecomplete", function() {
                                console.log("✅ POST completado");
                                finalizarCarga();
                            });
                        } else {
                            console.log("ℹ️ Sin imágenes POST");
                            finalizarCarga();
                        }
                    }

                    // Procesar PRE primero, luego POST
                    if (hasPre) {
                        console.log("🚀 Procesando PRE...");
                        dropzone_pre.off("queuecomplete");
                        dropzone_pre.processQueue();

                        dropzone_pre.on("queuecomplete", function() {
                            console.log("✅ PRE completado");
                            procesarPost();
                        });
                    } else {
                        console.log("ℹ️ Sin imágenes PRE");
                        procesarPost();
                    }

                    // Si no hay ninguna imagen
                    if (!hasPre && !hasPost) {
                        console.warn("⚠️ Sin imágenes");
                        finalizarCarga();
                    }

                }
            },
            error: function(error){
                console.log(error);
            }
        })


    }

    function recargar_imagenes_rx(seccion){
        let url = "{{ ROUTE('profesional.recargar_imagenes_dental_paciente') }}";
        let id_paciente = $('#id_paciente_fc').val();

        let data = {
            _token: CSRF_TOKEN,
            id_paciente: id_paciente,
            seccion: seccion
        }

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
                $('#contenedor_imagenes_dent').empty();
                $('#contenedor_imagenes_dent').append(resp.v);
                if(seccion == 'gral'){
                    $('#contenedor_pieza_dental_endorx').empty();
                    $('#contenedor_pieza_dental_endorx').append(resp.v);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function biopsia(alias_examen, counter)
    {

        console.log(alias_examen);
        if($('#biopsia_check_'+alias_examen+''+counter).prop('checked'))
        {
            $('#m_biopsia_cir').modal('show');
            $('#biopsia_'+alias_examen+''+counter).val(1);
        }
        else
        {
            $('#biopsia_'+alias_examen+''+counter).val(0);
            $('#m_biopsia_cir').modal('hide');
        }
    }
</script>
