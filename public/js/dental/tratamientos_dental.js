$(document).ready(function() {
    const getDiagnosticoDentalUrl = window.getDiagnosticoDentalUrl;

$('#diag_seleccionado_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);
                if( data.length == 0 )
                {
                    $('.diagnostico_activo').hide();
                    $('.diagnostico_inactivo').show();
                }
                else
                {
                    $('.diagnostico_activo').show();
                    $('.diagnostico_inactivo').hide();
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_gral_autocomplete').val(ui.item.label);
        $('#id_medicamento_cronico').val(ui.item.value);
        return false;
    }
});

$('.tratamiento-autocomplete').each(function() {
    $(this).autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    } else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $(this).val(ui.item.label);
            $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
            return false;
        }
    });
});


$('#proc_seleccionado_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_gral_autocomplete').val(ui.item.label);
        $('#id_medicamento_cronico').val(ui.item.value);

        return false;
    }
});

$('#diag_seleccionado_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                if( data.length == 0 )
                {
                    $('.diagnostico_activo').hide();
                    $('.diagnostico_inactivo').show();
                }
                else
                {
                    $('.diagnostico_activo').show();
                    $('.diagnostico_inactivo').hide();
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_endo_autocomplete').val(ui.item.label);
        return false;
    }
});

$('#proc_seleccionado_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_endo_autocomplete').val(ui.item.label);

        return false;
    }
});


$('#diag_seleccionado_max_inf_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);
        return false;
    }
});

$('#proc_seleccionado_max_inf_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);

        return false;
    }
});
$('#diag_seleccionado_max_inf_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                if( data.length == 0 )
                {
                    $('.diagnostico_activo').hide();
                    $('.diagnostico_inactivo').show();
                }
                else
                {
                    $('.diagnostico_activo').show();
                    $('.diagnostico_inactivo').hide();
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_max_inf_endo_autocomplete').val(ui.item.label);
        return false;
    }
});

$('#proc_seleccionado_max_inf_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_max_inf_endo_autocomplete').val(ui.item.label);

        return false;
    }
});

$('#diag_seleccionado_boca_compl_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                if( data.length == 0 )
                {
                    $('.diagnostico_activo').hide();
                    $('.diagnostico_inactivo').show();
                }
                else
                {
                    $('.diagnostico_activo').show();
                    $('.diagnostico_inactivo').hide();
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);
        return false;
    }
});

$('#proc_seleccionado_boca_compl_gral_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);

        return false;
    }
});

$('#diag_seleccionado_boca_compl_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                if( data.length == 0 )
                {
                    $('.diagnostico_activo').hide();
                    $('.diagnostico_inactivo').show();
                }
                else
                {
                    $('.diagnostico_activo').show();
                    $('.diagnostico_inactivo').hide();
                }
                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#diag_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);
        return false;
    }
});

$('#proc_seleccionado_boca_compl_endo_autocomplete').autocomplete({
    source: function(request, response) {
        // Fetch data
        $.ajax({
            url: getDiagnosticoDentalUrl,
            type: 'post',
            dataType: "json",
            data: {
                _token: CSRF_TOKEN,
                search: request.term
            },
            success: function(data) {
                console.log(data);

                response(data);
            }
        });
    },
    select: function(event, ui) {
        $('#proc_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);

        return false;
    }
});



function editarInformacionPaciente(){
    $('#modal_editar_paciente').modal('show');
    $('#info_paciente').css('display', 'none');
    $('#info_paciente-edit').css('display', 'block');
}

function cancelarInformacionPaciente(){
    $('#info_paciente').css('display', 'block');
    $('#info_paciente-edit').css('display', 'none');
}

function guardarInformacionPaciente(){
    let id_paciente = $('#id_paciente').val();
    let nombres = $('#paciente_nombre_edit').val();
    let apellido_uno = $('#paciente_apellido_uno_edit').val();
    let apellido_dos = $('#paciente_apellido_dos_edit').val();
    let fecha_nac = $('#paciente_fn_edit').val();
    let sexo = $('#paciente_sexo_edit').val();
    let direccion = $('#paciente_dir_edit').val();
    let region = $('#paciente_region_edit').val();
    let comuna = $('#paciente_comuna_edit').val();
    let email = $('#paciente_email_edit').val();
    let telefono = $('#paciente_telefono_edit').val();

    let data = {
        id: id_paciente,
        nombre: nombres,
        apellido_uno: apellido_uno,
        apellido_dos: apellido_dos,
        fecha_nacimiento: fecha_nac,
        sexo: sexo,
        direccion: direccion,
        region: region,
        ciudad: comuna,
        email: email,
        telefono: telefono,
        _token: CSRF_TOKEN
    }

    console.log(data);
    let url = "{{ route('asistente.paciente.modificar') }}";

    $.ajax({

        url: url,
        type: "get",
        data: data,
        })
        .done(function(data) {
        console.log(data);
        if (data.estado == 1)
        {
            if (data.estado == 1)
            {
                let paciente = data.paciente;
                $('#nombre_completo_paciente').text(paciente.nombres + ' ' + paciente.apellido_uno + ' ' + paciente.apellido_dos);
                $('#fecha_nac_paciente').text(paciente.fecha_nac);
                if (paciente.sexo == 'M') {
                    $('#sexo_paciente').text('Masculino');
                } else {
                    $('#sexo_paciente').text('Femenino');
                }
                $('#email_paciente_').text(paciente.email);
                $('#telefono_paciente').text(paciente.telefono_uno);
                $('#comuna_region_paciente').html(paciente.ciudad + '<br> ' + paciente.region);

                // $('.paciente_view_asistente').show();
                // $('.paciente_edit_asistente').hide();
                // $('#modificando_paciente_asistente').val(0);

                swal({
                    title: "Actualización de Paciente",
                    text: "Actualización Exitosa",
                    icon: "success",
                });
                cancelarInformacionPaciente();
            }
            else
            {
                swal({
                    title: "Actualización de Paciente",
                    text: "Falla en Actualización.\nIntente de nuevo.",
                    icon: "error",
                });
            }
        }
        else
        {
            swal({
                title: "Actualización de Paciente",
                text: "Falla en Actualización.\nIntente de nuevo.",
                icon: "error",
            });
        }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR, ajaxOptions, thrownError)
        });
}

function buscar_ciudad_paciente(id_ciudad = 0) {

    let region = $('#paciente_region_edit').val();
    let url = "{{ route('profesional.buscar_ciudad_region') }}";
    $.ajax({

            url: url,
            type: "get",
            data: {
                //_token: _token,
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);

                let ciudades = $('#paciente_comuna_edit');

                ciudades.find('option').remove();
                ciudades.append('<option value="0">seleccione</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre +
                        '</option>');
                })

                if (id_ciudad != 0)
                    ciudades.val(id_ciudad);

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });


};
});

