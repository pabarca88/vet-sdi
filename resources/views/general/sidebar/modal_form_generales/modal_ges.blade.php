<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Vacunas y desparasitación</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                            <div class="tab-pane fade show active" id="vac" role="tabpanel" aria-labelledby="vac-tab">
                                <div class="form-row">
                                    <div class="col-12 mb-2">
                                        <h6 class="t-aten">Registro de vacunas</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card-lineal">
                                            <div class="card-body-lineal">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Edad</label>
                                                        <input type="text" class="form-control form-control-sm" id="vac_edad_modal">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Fecha dosis</label>
                                                        <input type="date" class="form-control form-control-sm" id="vac_fecha_dosis_modal">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Vacuna</label>
                                                        <input type="text" class="form-control form-control-sm" id="vac_nombre_modal">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Prox. Dosis</label>
                                                        <input type="date" class="form-control form-control-sm" id="vac_proxima_dosis_modal">
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="button" class="btn btn-xs btn-info" id="btn_add_vacuna_modal">+ Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabla_vacunas_mascotas" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Edad</th>
                                                        <th class="align-middle">Fecha dosis</th>
                                                        <th class="align-middle">Vacuna</th>
                                                        <th class="align-middle">Próx.Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_vacunas_mascotas_body"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="desparasita" role="tabpanel" aria-labelledby="desparasita-tab">
                                <div class="form-row">
                                    <div class="col-12 mb-2">
                                        <h6 class="t-aten">Registro de Desparasitaciones</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card-lineal">
                                            <div class="card-body-lineal">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Fecha dosis</label>
                                                        <input type="date" class="form-control form-control-sm" id="des_fecha_dosis_modal">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Antiparasitario</label>
                                                        <input type="text" class="form-control form-control-sm" id="des_antiparasitario_modal">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Tipo</label>
                                                        <select class="form-control form-control-sm" id="des_tipo_modal">
                                                            <option value="">Seleccione</option>
                                                            <option value="Externo">Externo</option>
                                                            <option value="Interno">Interno</option>
                                                            <option value="Interno y Externo">Interno y Externo</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-3">
                                                        <label class="floating-label-activo-sm">Prox. Dosis</label>
                                                        <input type="date" class="form-control form-control-sm" id="des_proxima_dosis_modal">
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        <button type="button" class="btn btn-xs btn-info" id="btn_add_desparasitacion_modal">+ Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table id="tabla_desparacitacion" class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Fecha dosis</th>
                                                        <th class="align-middle">Antiparasitario</th>
                                                        <th class="align-middle">Tipo</th>
                                                        <th class="align-middle">Próx.Dosis</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_desparasitacion_body"></tbody>
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
</div>


<script>

    function formatoFechaCorta(fecha) {
        if (!fecha) {
            return '-';
        }
        var partes = fecha.split('-');
        if (partes.length !== 3) {
            return fecha;
        }
        return partes[2] + '-' + partes[1] + '-' + partes[0];
    }

    function obtenerIdMascotaModalGes() {
        var params = new URLSearchParams(window.location.search || '');
        var idMascotaUrl = params.get('id_mascota') || params.get('id_dependiente_activo');
        if (idMascotaUrl) {
            return idMascotaUrl;
        }

        if ($('#id_mascota_fc').length && $('#id_mascota_fc').val()) {
            return $('#id_mascota_fc').val();
        }

        return $('#id_paciente_fc').val() || '';
    }

    function urlConId(baseUrl, idMascota) {
        return baseUrl.replace('__ID__', idMascota);
    }

    function tokenCsrfModalGes() {
        if (typeof CSRF_TOKEN !== 'undefined' && CSRF_TOKEN) {
            return CSRF_TOKEN;
        }
        return $('meta[name="csrf-token"]').attr('content');
    }

    function renderTablaVacunasModal(vacunas) {
        var $tbody = $('#tabla_vacunas_mascotas_body');
        $tbody.html('');
        if (!Array.isArray(vacunas) || vacunas.length === 0) {
            $tbody.append('<tr><td colspan="4" class="text-center text-muted">Sin registros</td></tr>');
            return;
        }

        vacunas.forEach(function (item) {
            var html = '<tr>' +
                '<td class="align-middle">' + (item.edad || '-') + '</td>' +
                '<td class="align-middle"><span class="badge badge-secondary">' + formatoFechaCorta(item.fecha_dosis) + '</span></td>' +
                '<td class="align-middle">' + (item.vacuna || '-') + '</td>' +
                '<td class="align-middle"><span class="badge badge-info">' + formatoFechaCorta(item.proxima_dosis) + '</span></td>' +
                '</tr>';
            $tbody.append(html);
        });
    }

    function renderTablaDesparasitacionModal(desparasitaciones) {
        var $tbody = $('#tabla_desparasitacion_body');
        $tbody.html('');
        if (!Array.isArray(desparasitaciones) || desparasitaciones.length === 0) {
            $tbody.append('<tr><td colspan="4" class="text-center text-muted">Sin registros</td></tr>');
            return;
        }

        desparasitaciones.forEach(function (item) {
            var html = '<tr>' +
                '<td class="align-middle"><span class="badge badge-secondary">' + formatoFechaCorta(item.fecha_dosis) + '</span></td>' +
                '<td class="align-middle">' + (item.antiparasitario || '-') + '</td>' +
                '<td class="align-middle">' + (item.tipo || '-') + '</td>' +
                '<td class="align-middle"><span class="badge badge-info">' + formatoFechaCorta(item.proxima_dosis) + '</span></td>' +
                '</tr>';
            $tbody.append(html);
        });
    }

    function limpiarFormularioVacunaModal() {
        $('#vac_edad_modal').val('');
        $('#vac_fecha_dosis_modal').val('');
        $('#vac_nombre_modal').val('');
        $('#vac_proxima_dosis_modal').val('');
    }

    function limpiarFormularioDesparasitacionModal() {
        $('#des_fecha_dosis_modal').val('');
        $('#des_antiparasitario_modal').val('');
        $('#des_tipo_modal').val('');
        $('#des_proxima_dosis_modal').val('');
    }

    function cargarRegistrosSanitariosModal() {
        var idMascota = obtenerIdMascotaModalGes();
        if (!idMascota) {
            renderTablaVacunasModal([]);
            renderTablaDesparasitacionModal([]);
            return;
        }

        var url = urlConId("{{ route('paciente.mascotas.registros_sanitarios', ['mascotaId' => '__ID__']) }}", idMascota);
        $.get(url)
            .done(function (resp) {
                renderTablaVacunasModal(resp.vacunas || []);
                renderTablaDesparasitacionModal(resp.desparasitaciones || []);
            })
            .fail(function () {
                renderTablaVacunasModal([]);
                renderTablaDesparasitacionModal([]);
            });
    }

    function agregarVacunaDesdeModal() {
        var idMascota = obtenerIdMascotaModalGes();
        if (!idMascota) {
            swal({ title: 'No se encontró la mascota', icon: 'warning' });
            return;
        }

        var data = {
            _token: tokenCsrfModalGes(),
            edad: $('#vac_edad_modal').val(),
            fecha_dosis: $('#vac_fecha_dosis_modal').val(),
            vacuna: $('#vac_nombre_modal').val(),
            proxima_dosis: $('#vac_proxima_dosis_modal').val(),
        };

        var url = urlConId("{{ route('paciente.mascotas.vacunas.guardar', ['mascotaId' => '__ID__']) }}", idMascota);
        $.post(url, data)
            .done(function (resp) {
                renderTablaVacunasModal(resp.vacunas || []);
                limpiarFormularioVacunaModal();
            })
            .fail(function (xhr) {
                var msj = 'No se pudo guardar la vacuna';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    var primerCampo = Object.keys(xhr.responseJSON.error)[0];
                    if (primerCampo && xhr.responseJSON.error[primerCampo][0]) {
                        msj = xhr.responseJSON.error[primerCampo][0];
                    }
                }
                swal({ title: msj, icon: 'warning' });
            });
    }

    function agregarDesparasitacionDesdeModal() {
        var idMascota = obtenerIdMascotaModalGes();
        if (!idMascota) {
            swal({ title: 'No se encontró la mascota', icon: 'warning' });
            return;
        }

        var data = {
            _token: tokenCsrfModalGes(),
            fecha_dosis: $('#des_fecha_dosis_modal').val(),
            antiparasitario: $('#des_antiparasitario_modal').val(),
            tipo: $('#des_tipo_modal').val(),
            proxima_dosis: $('#des_proxima_dosis_modal').val(),
        };

        var url = urlConId("{{ route('paciente.mascotas.desparasitaciones.guardar', ['mascotaId' => '__ID__']) }}", idMascota);
        $.post(url, data)
            .done(function (resp) {
                renderTablaDesparasitacionModal(resp.desparasitaciones || []);
                limpiarFormularioDesparasitacionModal();
            })
            .fail(function (xhr) {
                var msj = 'No se pudo guardar la desparasitación';
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    var primerCampo = Object.keys(xhr.responseJSON.error)[0];
                    if (primerCampo && xhr.responseJSON.error[primerCampo][0]) {
                        msj = xhr.responseJSON.error[primerCampo][0];
                    }
                }
                swal({ title: msj, icon: 'warning' });
            });
    }

    $(document).ready(function () {
        $(document).on('shown.bs.modal', '#form_ges', function () {
            cargarRegistrosSanitariosModal();
        });

        $(document).on('click', '#btn_add_vacuna_modal', function () {
            agregarVacunaDesdeModal();
        });

        $(document).on('click', '#btn_add_desparasitacion_modal', function () {
            agregarDesparasitacionDesdeModal();
        });
    });


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
