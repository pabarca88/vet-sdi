<div class="card-informacion">
    <div class="card-header">
        <h5 class="card-title">Nuevo examen radiológico</h5>
    </div>
    <div class="card-body">
        <div id="pieza_dentalrx{{ $counter }}" class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="odontop_numero_pieza_{{ $counter }}" class="floating-label-activo-sm">Pieza N°</label>
                            <select class="form-control form-control-sm" name="odontop_numero_pieza_{{ $counter }}" id="odontop_numero_pieza_{{ $counter }}">
                                <option value="0">Seleccione</option>
                                @foreach (['5.1', '5.2', '5.3', '5.4', '5.5', '6.1', '6.2', '6.3', '6.4', '6.5', '7.1', '7.2', '7.3', '7.4', '7.5', '8.1', '8.2', '8.3', '8.4', '8.5'] as $pieza)
                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                            <select name="odontop_rx_esp_peri_apical{{ $counter }}" id="odontop_rx_esp_peri_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_rx_esp_peri_apical','odontop_div_detalle_rx_esp_peri_apical','odontop_det_rx_esp_peri_apical',4)">
                                <option value="0">Seleccione</option>
                                <option value="1">Normal</option>
                                <option value="2">Engrosado</option>
                                <option value="3">Ausente</option>
                                <option value="4">Otro</option>
                            </select>
                        </div>
                        <div class="form-group"   id="odontop_div_detalle_rx_esp_peri_apical" style="display:none">
                            <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="odontop_det_rx_esp_peri_apical" id="odontop_det_rx_esp_peri_apical"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                            <select name="odontop_h_apical{{ $counter }}" id="odontop_h_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_h_apical','odontop_div_detalle_h_apical','odontop_aprec_h_apical',5)">
                                <option value="0">Seleccione</option>
                                <option value="1">Normal</option>
                                <option value="2">Zona apical Difusa</option>
                                <option value="3">Zona apical Corticalizada</option>
                                <option value="4">Osteítis Condensante</option>
                                <option value="5">Otro<i>(describir)</i></option>
                            </select>
                        </div>
                        <div class="form-group"  id="div_detalle_h_apical" style="display:none">
                            <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="card-body-aten-a">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-imagenes-imagenes-rx-dental_end" action="{{ route('profesional.imagen.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="odontop_obs_ex_oral{{ $counter }}" id="odontop_obs_ex_oral{{ $counter }}"></textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-icon btn-success-light-c" onclick="guardar_nueva_pieza_ex_radio_odontop({{ $counter }})"><i class="fas fa-save"></i></button>
    </div>
</div>



<script>
if (typeof dropzoneOdontop === 'undefined') {
    var dropzoneOdontop;
}

// Función para inicializar Dropzone que se ejecutará inmediatamente y también en document.ready
function initializeDropzonesOnLoad() {
    console.log("Inicializando Dropzone para vista cargada dinámicamente...");

    // Esperar un momento para que el DOM se renderice completamente
    setTimeout(function() {
        initDropzoneOdontop();
    }, 100);
}

// Ejecutar inmediatamente para vistas cargadas dinámicamente
initializeDropzonesOnLoad();

// También ejecutar en document.ready para vistas cargadas normalmente
$(document).ready(function(){
    console.log("Document ready - verificando Dropzone...");
    if (!dropzoneOdontop) {
        initDropzoneOdontop();
    }
});

function initDropzoneOdontop() {
    // Verificar que el elemento existe antes de inicializar
    const dropzoneElement = document.querySelector("#mis-imagenes-imagenes-rx-dental_end");
    if (!dropzoneElement) {
        console.warn("Elemento Dropzone #mis-imagenes-imagenes-rx-dental_end no encontrado. Reintentando...");
        // Reintentar después de un momento
        setTimeout(function() {
            const retryElement = document.querySelector("#mis-imagenes-imagenes-rx-dental_end");
            if (retryElement) {
                console.log("Elemento Dropzone encontrado en el reintento. Inicializando...");
                initDropzoneOdontop();
            } else {
                console.error("Elemento Dropzone no se pudo encontrar después del reintento.");
            }
        }, 500);
        return;
    }

    console.log("Elemento Dropzone encontrado. Inicializando...");

    // Destruir instancia anterior si existe
    if (dropzoneOdontop) {
        console.log("Destruyendo instancia anterior de Dropzone...");
        dropzoneOdontop.destroy();
        dropzoneOdontop = null;
    }

    // Verificar que Dropzone está disponible
    if (typeof Dropzone === 'undefined') {
        console.error("Dropzone library no está cargada.");
        return;
    }

    dropzoneOdontop = new Dropzone("#mis-imagenes-imagenes-rx-dental_end", {
        url: "{{ route('profesional.imagenes.guardar_rx_end_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        uploadMultiple: true,  // Permitir subida múltiple
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: "file",  // Dropzone agregará [] automáticamente con uploadMultiple
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
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
        sendingmultiple: function (files, xhr, formData) {
            // Verifica si formData es válido antes de agregar los datos
            if (formData) {
                console.log("Enviando", files.length, "archivos:", files.map(f => f.name));

                // Agregar parámetros adicionales a formData
                const idPaciente = $('#id_paciente').val();
                const idLugarAtencion = $('#id_lugar_atencion').val();
                const idEspecialidad = $('#id_especialidad').val();
                const idProfesional = $('#id_profesional_fc').val();
                const idExamenRx = $('#id_examen_oral_rx').val();
                const tipo_examen = 'odontop';

                // Validar que los campos requeridos tengan valor
                if (!idPaciente) {
                    console.error("ID del paciente no encontrado");
                    xhr.abort();
                    return;
                }
                if (!idLugarAtencion) {
                    console.error("ID lugar atención no encontrado");
                    xhr.abort();
                    return;
                }
                if (!idEspecialidad) {
                    console.error("ID especialidad no encontrado");
                    xhr.abort();
                    return;
                }
                if (!idProfesional) {
                    console.error("ID profesional no encontrado");
                    xhr.abort();
                    return;
                }
                if (!idExamenRx) {
                    console.error("ID examen no encontrado - debe guardarse primero la pieza dental");
                    xhr.abort();
                    return;
                }

                formData.append("id_paciente", idPaciente);
                formData.append("id_lugar_atencion", idLugarAtencion);
                formData.append("id_especialidad", idEspecialidad);
                formData.append("id_profesional", idProfesional);
                formData.append("id_examen", idExamenRx);
                formData.append("tipo_examen", tipo_examen);

                console.log("Datos adicionales enviados:", {
                    id_paciente: idPaciente,
                    id_lugar_atencion: idLugarAtencion,
                    id_especialidad: idEspecialidad,
                    id_profesional: idProfesional,
                    id_examen: idExamenRx,
                    tipo_examen: tipo_examen
                });
            } else {
                console.error("formData no está disponible");
                xhr.abort();
            }
        },
        errormultiple: function(files, message, xhr) {
            console.error("Error al subir múltiples archivos:", message);
            console.error("Status:", xhr ? xhr.status : 'desconocido');
            console.error("Response:", xhr ? xhr.responseText : 'sin respuesta');
        },
        successmultiple: function(files, response) {
            console.log("Múltiples archivos subidos exitosamente:", response);
        }
    });
}

function guardar_nueva_pieza_ex_radio(counter){
    // Verifica los datos antes de procesar la cola de imágenes
    let numero_pieza = $('#rx_numero_pieza'+counter).val();
    let espacio_periodontal_aplical = $('#rx_esp_peri_apical'+counter).val();
    let hueso_alveolar_apical = $('#h_apical'+counter).val();
    let obs = $('#obs_ex_oral'+counter).val();
    let id_paciente = $('#id_paciente').val();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();

    let valido = 1;
    let mensaje = '';

    // Realiza la validación de los campos requeridos
    if(numero_pieza == ''){
        valido = 0;
        mensaje += '<li>numero de pieza </li>';
    }
    if(espacio_periodontal_aplical == 0){
        valido = 0;
        mensaje += '<li>Espacio periodontal </li>';
    }
    if(hueso_alveolar_apical == 0){
        valido = 0;
        mensaje += '<li>Hueso alveolar </li>';
    }

    // Si hay algún campo vacío o inválido, muestra un mensaje de error y no procesa las imágenes
    if(valido == 0){
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje,
                },
            },
            icon: "error",
            buttons: "Aceptar",
            DangerMode: true,
        });
        return false;  // Detiene el proceso si la validación falla
    }

    // Si la validación es exitosa, realizamos el envío de los datos a través de AJAX
    let data = {
        _token: CSRF_TOKEN,
        numero_pieza: numero_pieza,
        espacio_periodontal_aplical: espacio_periodontal_aplical,
        hueso_alveolar_apical: hueso_alveolar_apical,
        obs: obs,
        id_paciente: id_paciente,
        id_lugar_atencion: id_lugar_atencion,
        id_especialidad: id_especialidad,
        id_profesional: id_profesional,
        id_fc: id_ficha_atencion
    };

    let url = "{{ ROUTE('profesional.guardar_pieza_dental_examen_oral_rx') }}";

    $.ajax({
        type: 'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
                swal({
                    icon:'success',
                    title:'Exito',
                    text:'Pieza agregada correctamente'
                });
            } else {
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
            $('#contenedor_examenes_oral_rx').empty();

            $('#id_examen_oral_rx').val(resp.rx.id);

            // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
            if (dropzoneOdontop.getQueuedFiles().length > 0) {
                console.log("Iniciando carga de imágenes...");
                // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                dropzoneOdontop.off("queuecomplete");

                // Procesar la cola de imágenes
                dropzoneOdontop.processQueue();  // Esto procesará la cola y subirá las imágenes

                // Usamos un evento para esperar a que se complete la carga de imágenes
                dropzoneOdontop.on("queuecomplete", function() {
                    // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                    console.log("Carga de imágenes completada.");
                });
            } else {
                console.log("No hay imágenes para cargar.");
                swal({
                    title: "No hay imágenes",
                    text: "Se guardó correctamente, sin imágenes.",
                    icon: "warning",
                    button: "Aceptar",
                });

                // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                if (dropzoneOdontop) {
                    // Destruir la instancia actual de Dropzone
                    dropzoneOdontop.destroy();
                }

                // Re-inicializar el Dropzone nuevamente
                initDropzoneOdontop();  // Asegúrate de que la función initDropzone esté disponible
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}




function ocultar_nueva_pieza_dental_rx_odontop(){
    $('#nueva_pieza_dental_odontop_').empty();
}

function guardar_nueva_pieza_ex_radio_odontop(count){
    let numero_pieza = $('#odontop_numero_pieza_'+count).val();
    let espacio_periodontal_aplical = $('#odontop_rx_esp_peri_apical'+count).val();
    let hueso_alveolar_apical = $('#odontop_h_apical'+count).val();
    let obs = $('#odontop_obs_ex_oral'+count).val();
    let id_paciente = $('#id_paciente').val();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();

    let valido = 1;
    let mensaje = '';

    if(numero_pieza == '' || numero_pieza == 0){
        valido = 0;
        mensaje += '<li>numero de pieza </li>';
    }
    if(espacio_periodontal_aplical == 0){
        valido = 0;
        mensaje += '<li>Espacio periodontal </li>';
    }
    if(hueso_alveolar_apical == 0){
        valido = 0;
        mensaje += '<li>Hueso alveolar </li>';
    }
    if(valido == 0){
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje,
                },
            },
            icon: "error",
            buttons: "Aceptar",
            DangerMode: true,
        });
        return false;
    }

    let data = {
        numero_pieza: numero_pieza,
        espacio_periodontal_aplical: espacio_periodontal_aplical,
        hueso_alveolar_apical: hueso_alveolar_apical,
        obs: obs,
        id_paciente: id_paciente,
        id_lugar_atencion: id_lugar_atencion,
        id_especialidad: id_especialidad,
        id_profesional: id_profesional,
        id_fc: id_ficha_atencion,
        tipo_examen: 'odontop'
    }

    console.log(data);


    let url = "{{ ROUTE('profesional.guardar_pieza_dental_examen_oral_rx_end') }}";

    $.ajax({
        type: 'post',
        data: {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            espacio_periodontal_aplical: espacio_periodontal_aplical,
            hueso_alveolar_apical: hueso_alveolar_apical,
            obs: obs,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_especialidad: id_especialidad,
            id_profesional: id_profesional,
            id_fc: id_ficha_atencion,
            tipo_examen: 'odontop'
        },
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_odontop').empty();
                $('#contenedor_pieza_dental_odontop').append(resp.v);

                $('#id_examen_oral_rx').val(resp.rx.id);
                mostrar_nueva_pieza_oral_rx_odontop()
                $('#nueva_pieza_dental_odontop_').empty();

                // procesar cola del dropzone
                if (dropzoneOdontop.getQueuedFiles().length > 0) {
                    console.log("Iniciando carga de imágenes...");
                    // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                    dropzoneOdontop.off("queuecomplete");

                    // Procesar la cola de imágenes
                    dropzoneOdontop.processQueue();  // Esto procesará la cola y subirá las imágenes

                    // Usamos un evento para esperar a que se complete la carga de imágenes
                    dropzoneOdontop.on("queuecomplete", function() {
                        // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                        console.log("Carga de imágenes completada.");
                    });
                } else {
                    console.log("No hay imágenes para cargar.");
                    alert("No has seleccionado imágenes para subir.");

                    // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                    if (dropzoneOdontop) {
                        // Destruir la instancia actual de Dropzone
                        dropzoneOdontop.destroy();
                    }

                    // Re-inicializar el Dropzone nuevamente
                    initDropzoneOdontop();  // Asegúrate de que la función initDropzone esté disponible
                }
            }
        },
        error: function(error){
            console.log(error);
        }
    })

}

</script>
