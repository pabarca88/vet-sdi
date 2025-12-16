<!--Signos vitales-->
<div id="formularios_signos_vitales" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 "
    data-width="300px" data-offset="true">
    <header class="bs-canvas-header p-3 d-flex justify-content-between bg-info overflow-auto">
        <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">Formularios Signos Vitales</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordionExample">
            <div class="card-sidebar mb-0 rounded-0">
                <div class="card-header-sidebar" id="headingOne">
                    <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i  class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Temperatura - Pulso
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <div class="form-row pt-3 px-2">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Tº</label>
                                <input type="text" class="form-control form-control-sm" name="temperatura_sig_vit" id="temperatura_sig_vit" value="{{ isset($fichaAtencion) ? $fichaAtencion->temperatura : '' }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm">Pulso</label>
                                <input type="text" class="form-control form-control-sm" name="pulso_sig_vit" id="pulso_sig_vit" value="{{ isset($fichaAtencion) ? $fichaAtencion->pulso : ''}}">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Frec. Reposo</label>
                                <input type="text" class="form-control form-control-sm" name="frec_reposo_sig_vit" id="frec_reposo_sig_vit" value="{{ isset($fichaAtencion) ? $fichaAtencion->frecuencia_reposo : '' }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-xxs btn-success-light-c" onclick="guardar_signos_vitales_sidebar()"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_utilidades">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Estado Nutricional
                    </button>
                    </h2>
                </div>
                <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <div class="form-row pt-3 px-2">
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">Peso</label>
                               <input type="text" class="form-control form-control-sm" name="peso_sidebar" id="peso_sidebar" value="{{ isset($fichaAtencion) ? $fichaAtencion->peso : '' }}" onkeydown="calcularIMC_sidebar()">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">Talla</label>
                                <input type="text" class="form-control form-control-sm" name="talla_sidebar" id="talla_sidebar" value="{{ isset($fichaAtencion) ? $fichaAtencion->talla : '' }}" onkeydown="calcularIMC_sidebar()">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm">IMC</label>
                                <input type="text" class="form-control form-control-sm" name="imc_sidebar" id="imc_sidebar" value="{{ isset($fichaAtencion) ? $fichaAtencion->imc : '' }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Est. Nutricional</label>
                                <input type="text" class="form-control form-control-sm" name="estado_nutri_sidebar" id="estado_nutri_sidebar" value="{{ isset($fichaAtencion) ? $fichaAtencion->estado_nutricional : '' }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-xxs btn-success-light-c" onclick="guardar_estado_nutri_sidebar()"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_recom">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        Presión Arterial
                    </button>
                    </h2>
                </div>
                <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <div class="form-row pt-3 px-2">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">BI</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi_sidebar" id="presion_bi_sidebar" value="">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">BD</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bd_sidebar" id="presion_bd_sidebar" value="">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Pié</label>
                                <input type="text" class="form-control form-control-sm" name="presion_pie_sidebar" id="presion_pie_sidebar" value="">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="floating-label-activo-sm">Sentado</label>
                                <input type="text" class="form-control form-control-sm" name="presion_sentado_sidebar" id="presion_sentado_sidebar" value="">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-xxs btn-success-light-c" onclick="guardar_presion_arterial_sidebar()"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_hosp">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_hosp" aria-expanded="false" aria-controls="collapse_hosp"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                    Comunicación y Conciencia
                    </button>
                    </h2>
                </div>
                <div id="collapse_hosp" class="collapse" aria-labelledby="headinghospm" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <div class="form-row pt-3 px-2">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Conciencia</label>
                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="conciencia_sidebar" name="conciencia_sidebar"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Lenguaje</label>
                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="lenguaje_sidebar" name="lenguaje_sidebar"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm">Traslado</label>
                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="traslado_sidebar" name="traslado_sidebar"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-xxs btn-success-light-c" onclick="guardar_comunicacion_conciencia()"><i class="feather icon-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    });

     function calcularIMC_sidebar() {
        setTimeout(function () {
            const peso = parseFloat(document.getElementById('peso_sidebar').value.replace(',', '.'));
            const talla_cm = parseFloat(document.getElementById('talla_sidebar').value.replace(',', '.'));
            const imcInput = document.getElementById('imc_sidebar');
            const estadoInput = document.getElementById('estado_nutri_sidebar');

            if (!isNaN(peso) && !isNaN(talla_cm) && talla_cm > 0) {
                const talla_m = talla_cm / 100;
                const imc = peso / (talla_m * talla_m);
                imcInput.value = imc.toFixed(2);

                let estado = '';
                if (imc < 18.5) estado = 'Bajo peso';
                else if (imc < 25) estado = 'Normal';
                else if (imc < 30) estado = 'Sobrepeso';
                else if (imc < 35) estado = 'Obesidad grado I';
                else if (imc < 40) estado = 'Obesidad grado II';
                else estado = 'Obesidad grado III';

                estadoInput.value = estado;
            } else {
                imcInput.value = '';
                estadoInput.value = '';
            }
        }, 50);
    }

    function guardar_signos_vitales_sidebar() {
        let temperatura = $('#temperatura_sig_vit').val();
        let pulso = $('#pulso_sig_vit').val();
        let frec_reposo = $('#frec_reposo_sig_vit').val();

        let valido = 1;
        let mensaje = '';

        if (temperatura == '') {
            mensaje += 'Debe ingresar la temperatura.\n';
            valido = 0;
        }
        if (pulso == '') {
            mensaje += 'Debe ingresar el pulso.\n';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('profesional.guardar_signos_vitales_sidebar') }}";
        let data = {
            temperatura: temperatura,
            pulso: pulso,
            frec_reposo: frec_reposo,
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);
                if (response.mensaje == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "Signos vitales guardados correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                    // Aquí puedes agregar lógica adicional si es necesario
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al guardar los signos vitales.",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function guardar_estado_nutri_sidebar(){
        let peso = $('#peso_sidebar').val();
        let talla = $('#talla_sidebar').val();
        let imc = $('#imc_sidebar').val();
        let estado_nutri = $('#estado_nutri_sidebar').val();


        let valido = 1;
        let mensaje = '';

        if (peso == '') {
            mensaje += 'Debe ingresar el peso.\n';
            valido = 0;
        }
        if (talla == '') {
            mensaje += 'Debe ingresar la talla.\n';
            valido = 0;
        }
        if (imc == '') {
            mensaje += 'Debe ingresar el IMC.\n';
            valido = 0;
        }
        if (estado_nutri == '') {
            mensaje += 'Debe ingresar el estado nutricional.\n';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            })
            return;
        }

        let url = "{{ route('profesional.guardar_estado_nutricional_sidebar') }}";
        let data = {
            peso: peso,
            talla: talla,
            imc: imc,
            estado_nutri: estado_nutri,
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);
                if (response.mensaje == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "Estado nutricional guardado correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                    // Aquí puedes agregar lógica adicional si es necesario
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al guardar el estado nutricional.",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

    function guardar_presion_arterial_sidebar(){
        let presion_bi = $('#presion_bi_sidebar').val();
        let presion_bd = $('#presion_bd_sidebar').val();
        let presion_pie = $('#presion_pie_sidebar').val();
        let presion_sentado = $('#presion_sentado_sidebar').val();

        let valido = 1;
        let mensaje = '';

        if (presion_bi == '') {
            mensaje += 'Debe ingresar la presión arterial BI.\n';
            valido = 0;
        }
        if (presion_bd == '') {
            mensaje += 'Debe ingresar la presión arterial BD.\n';
            valido = 0;
        }
        if (presion_pie == '') {
            mensaje += 'Debe ingresar la presión arterial Pié.\n';
            valido = 0;
        }
        if (presion_sentado == '') {
            mensaje += 'Debe ingresar la presión arterial Sentado.\n';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('profesional.guardar_presion_arterial_sidebar') }}";
        let data = {
            presion_bi: presion_bi,
            presion_bd: presion_bd,
            presion_pie: presion_pie,
            presion_sentado: presion_sentado,
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);
                if (response.mensaje == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "Presión arterial guardada correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                    // Aquí puedes agregar lógica adicional si es necesario
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al guardar la presión arterial.",
                    icon: "error",
                });

            }
        });
    }

    function guardar_comunicacion_conciencia(){
        let conciencia = $('#conciencia_sidebar').val();
        let lenguaje = $('#lenguaje_sidebar').val();
        let traslado = $('#traslado_sidebar').val();

        let valido = 1;
        let mensaje = '';

        if (conciencia == '') {
            mensaje += 'Debe ingresar la conciencia.\n';
            valido = 0;
        }
        if (lenguaje == '') {
            mensaje += 'Debe ingresar el lenguaje.\n';
            valido = 0;
        }
        if (traslado == '') {
            mensaje += 'Debe ingresar el traslado.\n';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title: "Error",
                text: mensaje,
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        let url = "{{ route('profesional.guardar_comunicacion_conciencia_sidebar') }}";
        let data = {
            conciencia: conciencia,
            lenguaje: lenguaje,
            traslado: traslado,
            id_ficha_atencion: $('#id_fc').val(),
            _token: CSRF_TOKEN
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);
                if (response.mensaje == 'ok') {
                    swal({
                        title: "Éxito",
                        text: "Comunicación y conciencia guardadas correctamente.",
                        icon: "success",
                        button: "Aceptar",
                    });
                    // Aquí puedes agregar lógica adicional si es necesario
                } else {
                    swal({
                        title: "Error",
                        text: response.message,
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            },
            error: function(xhr, status, error) {
                swal({
                    title: "Error",
                    text: "Ocurrió un error al guardar la comunicación y conciencia.",
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    }

</script>
