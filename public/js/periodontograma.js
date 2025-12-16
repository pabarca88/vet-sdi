
function guardar_pieza(pieza){
    let movilidad = $('#m'+pieza).val();
    let pronostico = $('#pi'+pieza).val();
    let furca = $('#f'+pieza).val();
    let plataforma_vestibular = $('#ae'+pieza).val();
    let vest_altura_mg_a = $('#mg'+pieza+'-a').val();
    let vest_altura_mg_b = $('#mg'+pieza+'-b').val();
    let vest_altura_mg_c = $('#mg'+pieza+'-c').val();
    let vest_psondaje_a = $('#ps'+pieza+'-a').val();
    let vest_psondaje_b = $('#ps'+pieza+'-b').val();
    let vest_psondaje_c = $('#ps'+pieza+'-c').val();

    let pala_altura_mg_a = $('#mg'+pieza+'b-a').val();
    let pala_altura_mg_b = $('#mg'+pieza+'b-b').val();
    let pala_altura_mg_c = $('#mg'+pieza+'b-c').val();
    let pala_psondaje_a = $('#ps'+pieza+'b-a').val();
    let pala_psondaje_b = $('#ps'+pieza+'b-b').val();
    let pala_psondaje_c = $('#ps'+pieza+'b-c').val();

    let observaciones = $('#obs_'+pieza).val();

    let data = {
        id_ficha_atencion: $('#id_fc').val(),
        pieza: pieza,
        movilidad: movilidad,
        pronostico: pronostico,
        furca: furca,
        plataforma_vestibular: plataforma_vestibular,
        vest_altura_mg_a: vest_altura_mg_a,
        vest_altura_mg_b: vest_altura_mg_b,
        vest_altura_mg_c: vest_altura_mg_c,
        vest_psondaje_a: vest_psondaje_a,
        vest_psondaje_b: vest_psondaje_b,
        vest_psondaje_c: vest_psondaje_c,
        pala_altura_mg_a: pala_altura_mg_a,
        pala_altura_mg_b: pala_altura_mg_b,
        pala_altura_mg_c: pala_altura_mg_c,
        pala_psondaje_a: pala_psondaje_a,
        pala_psondaje_b: pala_psondaje_b,
        pala_psondaje_c: pala_psondaje_c,
        observaciones: observaciones,
        _token: CSRF_TOKEN
    }

    let url = GUARDAR_PIEZA_URL;

    $.ajax({
        type:'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.success){
                swal({
                    title: "Pieza guardada",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                // Marcar pestaña como seleccionada
                const tab = $('#eval_' + pieza + '_tab');

                // Agrega clase si no está
                if (!tab.hasClass('pieza_seleccionada')) {
                    tab.addClass('pieza_seleccionada');
                }

                // Si no tiene el ícono, lo añadimos
                if (tab.find('.fa-check-circle').length === 0) {
                    tab.append('<i class="fas fa-check-circle text-success"></i>');
                }
            }else{
                swal({
                    title:'Ha ocurrido un error',
                    icon:'error'
                });
            }
        },
        error: function(error){
            console.log(error.responseText);

            let errorMsg = "Error inesperado.";
            try {
                let json = JSON.parse(error.responseText);
                if(json.message){
                    errorMsg = json.message;
                }
            } catch (e) {
                console.error("No se pudo parsear JSON:", e);
            }

            swal({
                title: 'Ha ocurrido un error',
                text: errorMsg,
                icon: 'error'
            });
        }
    })
}

function guardar_json_period(){
    var registro_temp = {};
    $('#'+seccion).find('input, textarea, select').each(function(key, element)
        {
            temp = {};
            var tipo_campo = $(element).prop('nodeName');
            var id_campo = $(element).attr('id');
            var valor_campo = $(element).val();

            registro_temp[id_campo] = valor_campo;
        });
    var ficha_atencion = $('#id_fc').val();
    var id_profesional = $('#id_profesional_fc').val();
    var id_lugar_atencion = $('#id_lugar_atencion').val();
    var id_paciente = $('#id_paciente_fc').val();
    var id_cns_tipo = $('#'+seccion+'_id_cns_tipo').val();
    var id_cns_template = $('#'+seccion+'_id_cns_template').val();
    var nombre = $('#'+seccion+'_nombre').val();
    var id_responsable = $('#id_responsable_fc').val();
    let url = "{{ route('ficha.registro.cns') }}";

    var _token = CSRF_TOKEN;

    $.ajax({

        url: url,
        type: "POST",
        data: {
            _token: _token,
            id_cns_tipo : id_cns_tipo,
            id_cns_template : id_cns_template,
            id_ficha_atencion : ficha_atencion,
            id_lugar_atencion : id_lugar_atencion,
            id_responsable : id_responsable,
            id_paciente : id_paciente,
            id_profesional : id_profesional,
            nombre : nombre,
            cuerpo : JSON.stringify(registro_temp),

        },
    })
    .done(function(data)
    {
        console.log(data);

        if (data !== 'null')
        {
            if(data.estado == 1)
            {
                swal({
                    title: "Registro Control Niño Sano.",
                    text: nombre+"\nRegistro Exitoso.",
                    icon: "success",
                });
            }
            else
            {
                swal({
                    title: "Registro Control Niño Sano.",
                    text: nombre+"\nFalla en Registro\nIntente nuevamente.",
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Registro Control Niño Sano.",
                text: nombre+"\nFalla en Registro\nIntente nuevamente.",
                icon: "error",
            });
        }
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
    });

}


