/* Formularios generales */
/* Formularios generales */
/* Formulario certificado de reposo */
$('#formularios_atencion').on('click', ".accion_modal_certificado_reposo", function() {
    console.log("abrir modal accion_modal_certificado_reposo");
    $('#modal_certificado_reposo').modal('show');
});

/* Formulario de interconsulta */
$('#formularios_atencion').on('click', ".accion_modal_interconsulta", function() {
    console.log("abrir modal accion_modal_interconsulta");
    $('#hipotesis_interconsulta').val($('#descripcion_hipotesis').val());
    $('#modal_interconsulta').modal('show');
});

$('.accion_modal_certificado_reposo').click(function() {
    console.log("abrir modal accion_modal_certificado_reposo");
    $('#modal_certificado_reposo').modal('show');
});

$('.accion_modal_interconsulta').click(function() {
    console.log("abrir modal accion_modal_interconsulta");
    $('#modal_interconsulta').modal('show');
});

$('#formularios_atencion').on('click', ".accion_modal_interconsulta_respuesta", function() {
    console.log("abrir modal accion_modal_interconsulta_respuesta");
    $('#modal_interconsulta_respuesta').modal('show');
});
$('.accion_modal_interconsulta_respuesta').click(function() {
    console.log("abrir modal accion_modal_interconsulta_respuesta");
    $('#modal_interconsulta_respuesta').modal('show');
});


/* Formulario de informe médico */
$('#formularios_atencion').on('click', ".accion_modal_inf_medico", function() {
    console.log("abrir modal accion_modal_inf_medico");
    $('#modal_inf_medico').modal('show');
});

$('.accion_modal_inf_medico').click(function() {
    console.log("abrir modal accion_modal_inf_medico");
    $('#modal_inf_medico').modal('show');
});

/* Formulario de uso personal */
$('#formularios_atencion').on('click', ".accion_modal_uso_personal", function() {
    console.log("abrir modal accion_modal_uso_personal");
    $('#modal_uso_personal').modal('show');
});

$('.accion_modal_uso_personal').click(function() {
    console.log("abrir modal accion_modal_uso_personal");
    $('#modal_uso_personal').modal('show');
});

/* Formularios de notificacion */
/* Constancia GES */
$('#formularios_atencion').on('click', ".accion_modal_constancia_ges", function() {
    console.log("abrir modal accion_modal_constancia_ges");
    $('#form_ges').modal('show');
});

$('.accion_modal_constancia_ges').click(function() {
    console.log("abrir modal accion_modal_constancia_ges");
    $('#form_ges').modal('show');
});

/* Enfermedades enfermedades_declaracion obligatoria */
$('#formularios_atencion').on('click', ".accion_modal_enfermedades_declaracion_obligatoria", function() {
    console.log("abrir modal accion_modal_enfermedades_declaracion_obligatoria");
    // cargar_tabla_eno();
    $('#modal_enfermedades_declaracion_obligatoria').modal('show');
});

$('.accion_modal_enfermedades_declaracion_obligatoria').click(function() {
    console.log("abrir modal accion_modal_enfermedades_declaracion_obligatoria");
    cargar_tabla_eno();
    $('#modal_enfermedades_declaracion_obligatoria').modal('show');
});

/* Reembolso Médico */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_medico", function() {
    console.log("abrir modal accion_modal_reembolso_medico");
    $('#modal_reembolso_medico').modal('show');
});
/* Reembolso dentales */
$('#formularios_atencion').on('click', ".accion_modal_reembolso_dental", function() {
    console.log("abrir modal accion_modal_reembolso_dental");
    $('#modal_reembolso_dental').modal('show');
});

/* Consentimientos informados */
/* Anestesia */
$('#formularios_atencion').on('click', ".accion_modal_anestesia", function() {
    console.log("abrir modal accion_modal_anestesia");
    $('#modal_anestesia').modal('show');
});

/* Indicaciones*/
/* Indicar Médicamento*/
$('#formularios_atencion').on('click', ".accion_modal_medicamentos", function() {
    console.log("abrir modal accion_modal_medicamentos");
    $('#modal_indicar_medicamentos').modal('show');
});

/* Indicar Exámen*/
$('#formularios_atencion').on('click', ".accion_modal_examenes", function() {
    console.log("abrir modal accion_modal_examenes");
    $('#modal_indicar_examen').modal('show');
});

/* Indicar Audifonos*/
$('#formularios_atencion').on('click', ".accion_modal_audifonos", function() {
    console.log("abrir modal accion_modal_audifonos");
    $('#modal_audifonos').modal('show');
});

/* Indicar Reflujo Gastroesofagico*/
$('#formularios_atencion').on('click', ".accion_modal_reflujo_gastro", function() {
    console.log("abrir modal accion_modal_eflujo_gastro");
    $('#modal_reflujo_gastro').modal('show');
});

/* Modal añadir_examenes*/
function añadir_examen() {
    $('#añadir_examen_modal').modal('show');
}

function dame_id_paciente(){
    let params = new URLSearchParams(location.search);
    let id_paciente = params.get('id_paciente');
    return id_paciente;
}

function cargar_tabla_eno()
    {

        $('#tabla_registros_eno tbody').html('');
        var id_paciente = dame_id_paciente();
        var url = '/Ficha_medica/cargar/eno';
        console.log(url);
        var _token = CSRF_TOKEN;

        $.ajax({
            url: url,
            type: "get",
            data: {
                _token: _token,
                id_paciente : id_paciente,
            },
        })
        .done(function(data)
        {
            console.log(data);
            if(data.estado == 1)
            {
                $('#tabla_registros_eno tbody').html('');
                $.each(data.registros, function (key, value)
                {
                    var boton_estado = '<button type="button" class="btn btn-warning">En resolucion</button>';
                    // if(value.estado == 1) /** En resolucion */
                    //     boton_estado = '<button type="button" class="btn btn-info">En resolucion</button>';
                    // else if(value.estado == 2) /** resuelto */
                    //     boton_estado = '<button type="button" class="btn btn-success">Resuelto</button>';

                    var html = '';
                    html += '<tr>';
                    html += '   <td>'+value.fecha_notificacion+'</td>';
                    html += '   <td>'+value.diagnositico_confirmado+'</td>';
                    html += '   <td>'+value.profesional.nombre+' '+value.profesional.apellido_uno+'</td>';
                    html += '   <td>'+boton_estado+'</td>';
                    html += '</tr>';

                    $('#tabla_registros_eno tbody').append(html);
                });
            }
            else
            {
                var html = '';
                $('#tabla_registros_eno tbody').append(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
