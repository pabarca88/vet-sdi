<div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
            <h6 class="t-aten d-inline">Estudio de Imágenes Dentales</h6>
        </div>
    <div class="col-sm-8 mt-2">
        <div class="card-informacion" id="img">
            <div class="card-body">
            <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="sub-aten">Imagen</h6>
                    </div>
                </div>
                <div class="form-row" id="contenedor_piezas_ex_oral">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <div id="img">

                        </div>
                        <div class="aten-a">
                            <div class="dropzone" id="misImagenesDentalesPreimplante"></div>

                            <!-- Botones de diagnóstico (quitar en producción) -->
                            <div class="mt-2" style="border-top: 1px dashed #ccc; padding-top: 10px;">
                                <small class="text-muted">Herramientas de diagnóstico:</small><br>
                                <button type="button" class="btn btn-sm btn-info mr-1" onclick="diagnosticar_dropzone()">
                                    <i class="fas fa-info-circle"></i> Diagnóstico
                                </button>
                                <button type="button" class="btn btn-sm btn-warning mr-1" onclick="probar_subida_directa()">
                                    <i class="fas fa-upload"></i> Probar Subida
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" onclick="reinicializar_dropzone()">
                                    <i class="fas fa-redo"></i> Reiniciar
                                </button>
                            </div>
                        </div>
                    </div>
                    @if($opt == 'preimplante')
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                        <div class="form-group">
                            <label for="numero_pieza_ex_impl{{ $count }}" class="floating-label-activo-sm">N° Pieza</label>
                            <input type="text" class="form-control form-control-sm" id="numero_pieza_ex_impl{{ $count }}">
                        </div>
                        <div class="form-group">
                            <label for="observaciones_ex_impl" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" id="observaciones_ex_impl{{ $count }}" name="observaciones_ex_impl{{ $count }}" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                        </div>
                    </div>
                    @else
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                        <div class="form-group">
                            <label for="numero_pieza_ex_period" class="floating-label-activo-sm">N° Pieza</label>
                            <select name="numero_pieza_ex_period{{ $count }}" id="numero_pieza_ex_period{{ $count }}" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach (['1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '2.1', '2.2', '2.3', '2.4', '2.5', '2.6', '2.7', '2.8','3.1', '3.2', '3.3', '3.4', '3.5', '3.6', '3.7', '3.8', '4.1', '4.2', '4.3', '4.4', '4.5', '4.6', '4.7', '4.8'] as $pieza)
                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                @endforeach
                            </select >
                        </div>
                        <div class="form-group">
                            <label for="observaciones_ex_period" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm" name="observaciones_ex_period{{ $count }}" onfocus="this.rows=4" onblur="this.rows=1;"></textarea>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @if($opt == 'preimplante' || $opt == 'periodoncica')
        <div class="col-sm-4" >
            <div class="card-informacion">
                <div class="card-body">
                    <div class="form-group">
                        @if($opt == 'preimplante')
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" onchange="biopsia_check_implantologia({{ $count }})" id="biopsia_check_implantologia{{ $count }}" name="biopsia_check_implantologia{{ $count }}" value=""  >
                                <label for="biopsia_check_implantologia{{ $count }}" class="cr"></label>
                            </div>
                        @else
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" onchange="biopsia_check_period({{ $count }})" id="biopsia_check_period{{ $count }}" name="biopsia_check_period{{ $count }}" value="" >
                                <label for="biopsia_check_period{{ $count }}" class="cr"></label>
                            </div>
                        @endif
                        <label>Biopsia</label>
                        @if($opt == 'preimplante')
                            <div class="form-group mt-3">
                                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="im_biop_zona{{ $count }}" id="im_biop_zona{{ $count }}" disabled></textarea>
                            </div>
                        @else
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="period_biop_zona{{ $count }}" id="period_biop_zona{{ $count }}" disabled></textarea>
                            </div>
                        @endif
                        @if($opt == 'preimplante')
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="im_obs_result_biopsia{{ $count }}" id="im_obs_result_biopsia{{ $count }}" disabled></textarea>
                            </div>
                        @else
                        <div class="form-group fill">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="period_obs_result_biopsia{{ $count }}" id="period_obs_result_biopsia{{ $count }}" disabled></textarea>
                        </div>
                        @endif
                        <hr>
                            <h6 style="subt-aten">Estado general del periodonto</h6>
                        <hr>
                        <div class="form-group text-center">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="solicitar_ic_periodoncia()"><i class="feather icon-check"></i> Solicitar Interconsulta Peridóncia</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


<div class="form-row">
    <div class="col-sm-12 mt-2">
        @if($opt == 'preimplante')
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_imagen_implantologia({{ $count }})"><i class="fas fa-save" aria-hidden="true"></i></button>
                {{-- <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_imagen_implantologia()">X</button> --}}
        @elseif($opt == 'periodoncica')
                <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_imagenes_periodoncica({{ $count }})"><i class="fas fa-save" aria-hidden="true"></i></button>
                {{-- <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_imagen_periodoncica()">X</button> --}}
        @endif

    </div>
</div>

<input type="hidden" name="id_imagenes_dental" id="id_imagenes_dental" value="">

<script>
    // Variables globales para Dropzone
    if (typeof window.dropzone_preimpl === 'undefined') {
        window.dropzone_preimpl = null;
    }
    if (typeof window.dropzone_post === 'undefined') {
        window.dropzone_post = null;
    }

    $(document).ready(function(){
        Dropzone.autoDiscover = false;
        // Configuración de Dropzone
        init_dropzone_imagenes_preimplante();
        $('#descripcion_hipotesis').trigger('keyup');
        $('#numero_pieza_ex_period{{ $count }},#numero_pieza_ex_impl{{ $count }}').select2({
            placeholder: "Seleccione",
        });
    });

    function init_dropzone_imagenes_preimplante()
    {
        // Destruir instancia existente si existe
        if (window.dropzone_preimpl) {
            window.dropzone_preimpl.destroy();
        }

        // Inicializa Dropzone solo si el elemento existe
        if ($('#misImagenesDentalesPreimplante').length) {
            try {
                window.dropzone_preimpl = new Dropzone("#misImagenesDentalesPreimplante", {
                    url: "{{ route('profesional.imagenes.guardar_dental') }}",
                    method: 'post',
                    autoProcessQueue: false, // Desactiva el procesamiento automático
                    uploadMultiple: true, // Subir múltiples archivos en una sola petición
                    parallelUploads: 12, // Número máximo de uploads paralelos
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    paramName: "file",
                    acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
                    maxFilesize: 4, // Tamaño máximo en MB
                    maxFiles: 12,
                    addRemoveLinks: true,
                    dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
                    dictRemoveFile: "Eliminar archivo",
                    dictFileTooBig: "El archivo es muy grande. Máximo permitido: 4MB.",
                    dictInvalidFileType: "No puedes subir archivos de este tipo.",
                    dictMaxFilesExceeded: "No puedes subir más de 12 archivos.",

                    init: function() {
                        console.log("Dropzone inicializado correctamente");

                        // Manejar validación de archivos añadidos
                        this.on("addedfile", function(file) {
                            console.log("Archivo añadido:", file.name);
                        });

                        // Manejar archivos rechazados
                        this.on("error", function(file, message) {
                            console.error("Error en dropzone:", message);
                            if (typeof message === 'object') {
                                if (message.message) {
                                    alert("Error: " + message.message);
                                } else {
                                    alert("Error al procesar el archivo: " + JSON.stringify(message));
                                }
                            } else {
                                alert("Error: " + message);
                            }
                        });

                        // Manejar éxito en la subida
                        this.on("success", function(file, response) {
                            console.log("Imagen subida con éxito:", response);
                            if (response && response.mensaje === 'OK') {
                                console.log("Respuesta exitosa del servidor");
                            }
                        });

                        // Antes de enviar cada archivo
                        this.on("sending", function(file, xhr, formData) {
                            console.log("Enviando archivo:", file.name);

                            // Verificar que el campo id_imagenes_dental existe y tiene valor
                            const idExamenElement = document.querySelector('#id_imagenes_dental');
                            if (!idExamenElement) {
                                console.error("Campo #id_imagenes_dental no encontrado");
                                alert("Error: No se puede obtener el ID del examen. Asegúrate de guardar los datos primero.");
                                return false;
                            }

                            const idExamenRx = idExamenElement.value;
                            if (!idExamenRx || idExamenRx === '') {
                                console.error("Campo #id_imagenes_dental está vacío");
                                alert("Error: Debes guardar los datos del examen antes de subir imágenes.");
                                return false;
                            }

                            const detalle = "Pre";
                            formData.append("id_examen", idExamenRx);
                            formData.append("detalle", detalle);

                            console.log("Datos adicionales enviados:", {
                                id_examen: idExamenRx,
                                detalle: detalle
                            });
                        });

                        // Cuando se complete la cola de archivos
                        this.on("queuecomplete", function() {
                            console.log("Cola de subida completada");
                        });
                    }
                });

                console.log("Dropzone configurado para procesar la cola manualmente.");

            } catch (error) {
                console.error("Error al inicializar Dropzone:", error);
                alert("Error al inicializar el sistema de carga de imágenes: " + error.message);
            }
        } else {
            console.error("Elemento #misImagenesDentalesPreimplante no encontrado");
        }

        if ($('#mis-imagenes-dentales-post').length) {
            window.dropzone_post = new Dropzone("#mis-imagenes-dentales-post", {
                url: "{{ route('profesional.imagenes.guardar_dental') }}",
                method: 'post',
                autoProcessQueue: false, // Desactiva el procesamiento automático
                uploadMultiple: true, // Subir múltiples archivos en una sola petición
                parallelUploads: 12, // Número máximo de uploads paralelos
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                paramName: "file",
                acceptedFiles: "image/jpeg,image/jpg,image/png,image/gif",
                maxFilesize: 4, // Tamaño máximo en MB
                maxFiles: 12,
                addRemoveLinks: true,
                dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
                dictRemoveFile: "Eliminar archivo",
                dictFileTooBig: "El archivo es muy grande. Máximo permitido: 4MB.",
                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                dictMaxFilesExceeded: "No puedes subir más de 12 archivos.",

                init: function() {
                    console.log("Dropzone POST inicializado correctamente");

                    // Manejar éxito en la subida
                    this.on("success", function(file, response) {
                        console.log("Imagen POST subida con éxito:", response);
                        if (response && response.success) {
                            console.log("Respuesta exitosa del servidor POST");
                        }
                    });

                    // Manejar errores
                    this.on("error", function(file, message) {
                        console.error("Error al subir imagen POST:", message);
                        if (typeof message === 'object') {
                            if (message.message) {
                                alert("Error: " + message.message);
                            } else {
                                alert("Error al procesar el archivo: " + JSON.stringify(message));
                            }
                        } else {
                            alert("Error: " + message);
                        }
                    });

                    // Antes de enviar cada archivo
                    this.on("sending", function(file, xhr, formData) {
                        console.log("Enviando archivo POST:", file.name);

                        // Verificar que el campo id_imagenes_dental existe y tiene valor
                        const idExamenElement = document.querySelector('#id_imagenes_dental');
                        if (!idExamenElement) {
                            console.error("Campo #id_imagenes_dental no encontrado para POST");
                            alert("Error: No se puede obtener el ID del examen para imágenes POST.");
                            return false;
                        }

                        const idExamenRx = idExamenElement.value;
                        if (!idExamenRx || idExamenRx === '') {
                            console.error("Campo #id_imagenes_dental está vacío para POST");
                            alert("Error: Debes guardar los datos del examen antes de subir imágenes POST.");
                            return false;
                        }

                        const detalle = "Post";
                        formData.append("id_examen", idExamenRx);
                        formData.append("detalle", detalle);

                        console.log("Datos adicionales enviados POST:", {
                            id_examen: idExamenRx,
                            detalle: detalle
                        });
                    });

                    // Cuando se complete la cola de archivos
                    this.on("queuecomplete", function() {
                        console.log("Cola de subida POST completada");
                    });
                }
            });
        }
    }
    function ocultar_pieza_imagen_implantologia(){
        $('#contenedor_nueva_imagen_dent_estudio').empty();
    }

    function ocultar_pieza_imagen_periodoncica(){
        $('#contenedor_nueva_imagen_dent_period').empty();
    }

    function recargar_imagenes_rx(seccion){
        let url = "{{ route('profesional.recargar_imagenes_dental_paciente') }}";
        let id_paciente = $('#id_paciente_fc').val();

        let data = {
            _token: CSRF_TOKEN,
            id_paciente: id_paciente,
            id_ficha_atencion: $('#id_fc').val(),
            seccion: seccion
        }

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
                $('#contenedor_imagenes_dent_estudio').empty();
                $('#contenedor_imagenes_dent_estudio').append(resp.v);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function guardar_pieza_imagen_implantologia(counter){

        let biopsia = $('#biopsia_check_implantologia'+counter).is(':checked');
        let zona_motivo = $('#im_biop_zona'+counter).val();
        let observaciones = $('#im_obs_result_biopsia'+counter).val();
        let numero_pieza = $('#numero_pieza_ex_impl'+counter).val();
        let observaciones_ex = $('#observaciones_ex_impl'+counter).val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let seccion = 'implantologia';

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje += 'El campo N° Pieza es obligatorio.';
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            observaciones_ex: observaciones_ex,
            biopsia: biopsia,
            zona_motivo: zona_motivo,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            seccion: seccion
        }

        let url = "{{ route('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    mostrar_nuevas_imagenes_dent_estudio(1000);
                    $('#contenedor_imagenes_dent_estudio').empty();
                    $('#contenedor_imagenes_dent_estudio').append(resp.v);
                    $('#contenedor_nueva_imagen_dent_estudio').empty();
                    $('#id_imagenes_dental').val(resp.rx.id);

                    // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
                    if (window.dropzone_preimpl && window.dropzone_preimpl.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...", window.dropzone_preimpl.getQueuedFiles().length, "archivos en cola");

                        // Desvinculamos eventos previos para evitar duplicados
                        window.dropzone_preimpl.off("queuecomplete");
                        window.dropzone_preimpl.off("error");
                        window.dropzone_preimpl.off("success");

                        // Configurar eventos para el procesamiento
                        window.dropzone_preimpl.on("success", function(file, response) {
                            console.log("Imagen procesada exitosamente:", file.name, response);
                        });

                        window.dropzone_preimpl.on("error", function(file, message) {
                            console.error("Error al procesar imagen:", file.name, message);
                        });

                        // Procesar la cola de imágenes
                        window.dropzone_preimpl.processQueue();

                        // Evento cuando se complete toda la cola
                        window.dropzone_preimpl.on("queuecomplete", function() {
                            console.log("Carga de imágenes completada.");

                            // Recargar las imágenes después de un pequeño delay
                            setTimeout(() => {
                                recargar_imagenes_rx('implantologia');
                            }, 1000);
                        });

                    } else {
                        console.log("No hay imágenes para cargar o dropzone no está disponible.");

                        // Verificar si dropzone existe pero no hay archivos
                        if (window.dropzone_preimpl) {
                            console.log("Dropzone existe pero no hay archivos en cola");
                        } else {
                            console.error("Dropzone no está inicializado");
                            // Intentar reinicializar dropzone
                            init_dropzone_imagenes_preimplante();
                        }

                        // Recargar las imágenes
                        setTimeout(() => {
                            recargar_imagenes_rx('implantologia');
                        }, 1000);
                    }

                }
            },
            error: function(error){
                console.log(error);
            }
        })


    }

    function guardar_pieza_imagenes_periodoncica(counter){

        let biopsia = $('#biopsia_check_period'+counter).is(':checked');
        let zona_motivo = $('#period_biop_zona'+counter).val();
        let observaciones = $('#period_obs_result_biopsia'+counter).val();
        let numero_pieza = $('#numero_pieza_ex_period'+counter).val();
        let observaciones_ex = $('#observaciones_ex_period'+counter).val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_profesional = $('#id_profesional').val();
        let id_especialidad = $('#id_especialidad').val();
        let id_ficha_atencion = $('#id_fc').val();
        let seccion = 'periodoncica';

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == '' || numero_pieza == 0){
            valido = 0;
            mensaje += 'El campo N° Pieza es obligatorio. <br>';
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        let data = {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            observaciones_ex: observaciones_ex,
            biopsia: biopsia,
            zona_motivo: zona_motivo,
            observaciones:observaciones,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_profesional: id_profesional,
            id_especialidad: id_especialidad,
            id_ficha_atencion: id_ficha_atencion,
            counter: counter,
            seccion: seccion
        }

        console.log(data);

        let url = "{{ route('profesional.guardar_imagenes_dental_paciente') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'OK'){
                    $('#contenedor_imagenes_dent_period').empty();
                    $('#contenedor_imagenes_dent_period').append(resp.v);
                    $('#contenedor_nueva_imagen_dent_period').empty();
                    $('#id_imagenes_dental').val(resp.rx.id);

                    // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
                    if (window.dropzone_preimpl && window.dropzone_preimpl.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...", window.dropzone_preimpl.getQueuedFiles().length, "archivos en cola");

                        // Desvinculamos eventos previos para evitar duplicados
                        window.dropzone_preimpl.off("queuecomplete");
                        window.dropzone_preimpl.off("error");
                        window.dropzone_preimpl.off("success");

                        // Configurar eventos para el procesamiento
                        window.dropzone_preimpl.on("success", function(file, response) {
                            console.log("Imagen procesada exitosamente:", file.name, response);
                        });

                        window.dropzone_preimpl.on("error", function(file, message) {
                            console.error("Error al procesar imagen:", file.name, message);
                        });

                        // Procesar la cola de imágenes
                        window.dropzone_preimpl.processQueue();

                        // Evento cuando se complete toda la cola
                        window.dropzone_preimpl.on("queuecomplete", function() {
                            console.log("Carga de imágenes completada.");

                            // Recargar las imágenes después de un pequeño delay
                            setTimeout(() => {
                                recargar_imagenes_rx('periodoncica');
                            }, 1000);
                        });

                    } else {
                        console.log("No hay imágenes para cargar o dropzone no está disponible.");

                        // Verificar si dropzone existe pero no hay archivos
                        if (window.dropzone_preimpl) {
                            console.log("Dropzone existe pero no hay archivos en cola");
                        } else {
                            console.error("Dropzone no está inicializado");
                            // Intentar reinicializar dropzone
                            init_dropzone_imagenes_preimplante();
                        }

                        // Recargar las imágenes
                        setTimeout(() => {
                            recargar_imagenes_rx('periodoncica');
                        }, 1000);
                    }

                    // Re-inicializar el Dropzone nuevamente
                    //init_dropzone_imagenes();  // Asegúrate de que la función initDropzone esté disponible
                }
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    // Función de diagnóstico para Dropzone
    function diagnosticar_dropzone() {
        console.log("=== DIAGNÓSTICO DROPZONE ===");
        console.log("Dropzone disponible:", typeof Dropzone !== 'undefined');
        console.log("jQuery disponible:", typeof $ !== 'undefined');
        console.log("Elemento dropzone existe:", $('#misImagenesDentalesPreimplante').length > 0);
        console.log("Variable window.dropzone_preimpl:", typeof window.dropzone_preimpl);
        console.log("Variable window.dropzone_post:", typeof window.dropzone_post);
        console.log("CSRF Token:", document.querySelector('meta[name="csrf-token"]') ? 'Encontrado' : 'No encontrado');
        console.log("Campo id_imagenes_dental:", $('#id_imagenes_dental').length > 0 ? 'Existe' : 'No existe');
        console.log("Valor id_imagenes_dental:", $('#id_imagenes_dental').val());

        if (window.dropzone_preimpl) {
            console.log("Estado Dropzone Pre:", {
                files: window.dropzone_preimpl.files.length,
                queuedFiles: window.dropzone_preimpl.getQueuedFiles().length,
                uploadingFiles: window.dropzone_preimpl.getUploadingFiles().length,
                acceptedFiles: window.dropzone_preimpl.getAcceptedFiles().length
            });
        } else {
            console.log("window.dropzone_preimpl no está inicializado");
        }

        if (window.dropzone_post) {
            console.log("Estado Dropzone Post:", {
                files: window.dropzone_post.files.length,
                queuedFiles: window.dropzone_post.getQueuedFiles().length,
                uploadingFiles: window.dropzone_post.getUploadingFiles().length,
                acceptedFiles: window.dropzone_post.getAcceptedFiles().length
            });
        } else {
            console.log("window.dropzone_post no está inicializado");
        }

        console.log("=== FIN DIAGNÓSTICO ===");
    }    // Función para probar la subida directa (para diagnóstico)
    function probar_subida_directa() {
        if (!window.dropzone_preimpl) {
            alert("Dropzone no está inicializado");
            return;
        }

        // Verificar si hay archivos en cola
        if (window.dropzone_preimpl.getQueuedFiles().length === 0) {
            alert("No hay archivos para subir. Arrastra o selecciona una imagen primero.");
            return;
        }

        // Verificar ID del examen
        const idExamen = $('#id_imagenes_dental').val();
        if (!idExamen) {
            alert("Debes guardar los datos del examen primero para obtener un ID válido.");
            return;
        }

        console.log("Iniciando subida directa con ID examen:", idExamen);
        window.dropzone_preimpl.processQueue();
    }

    // Función para reinicializar Dropzone (para diagnóstico)
    function reinicializar_dropzone() {
        console.log("Reinicializando Dropzone...");
        init_dropzone_imagenes_preimplante();
        console.log("Dropzone reinicializado");
    }

    // Exponer funciones de diagnóstico globalmente
    window.diagnosticar_dropzone = diagnosticar_dropzone;
    window.probar_subida_directa = probar_subida_directa;
    window.reinicializar_dropzone = reinicializar_dropzone;

</script>

