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
};

function enviar_email(id) {
    let id_paciente = id;
    let titulo_email = $('#titulo_email').val();
    let mensaje_email = $('#mensaje_email').val();
    let url = "{{ route('profesional.enviar_email') }}";

    $.ajax({

        url: url,
        type: "get",
        data: {
            titulo_email: titulo_email,
            mensaje_email: mensaje_email,
            id_paciente: id_paciente
        },
    })
        .done(function (data) {


            if (data == 'ok') {

                $('#modal_correo').modal('hide');
                //$('#modal_correo').hide();

            } else {

                console.log('error');

            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function buscar_asistente() {

    let rut_asistente = $('#rut_asistente').val();
    let url = "{{ route('profesional.buscar_asistente') }}";

    $.ajax({

        url: url,
        type: "get",
        data: {
            rut_asistente: rut_asistente,
        },
    })
        .done(function (data) {


            if (data !== 'null') {

                data = JSON.parse(data);


                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_asistente" id="row' + i + '"><td>' + i + '</td><td>' +
                    data.rut +
                    '</td><td>' +
                    data.nombres + ' ' + data.apellido_uno + ' ' +
                    data.apellido_dos + '</td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#mi_asistente_table tr:first').after(fila);
                //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#mi_asistente_table tr").length;




            } else {

                console.log('error');

            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function ver_lugar_atencion(id) {

    let lugar_atencion = id;
    let url = '{{ route('profesional.ver_lugar_atencion') }}';

    $.ajax({

        url: url,
        type: "get",
        data: {
            lugar_atencion: lugar_atencion,
        },
    })
        .done(function (data) {


            if (data !== 'null') {

                data = JSON.parse(data);
                //$('#reserva_datos_paciente').show();

                $('#editar_nombre_lugar_atencion').val(data.nombre);
                $('#editar_email_lugar_atencion').val(data.email);
                $('#editar_direccion_lugar_atencion').val(data.direccion);
                $('#editar_numero_lugar_atencion').val(data.numero_dir);
                $('#editar_telefono_lugar_atencion').val(data.telefono);


            } else {

                console.log('error');

            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

}

function buscar_examen_ficha(id) {

    let url = '{{ route('profesional.buscar_examenes') }}';
    $('#table_examenes tbody').empty();

    $.ajax({
        url: url,
        type: "get",
        data: {
            id_ficha: id
        },
        dataType: "json",
    })
        .done(function (data) {
            if (data != null) {

                console.log(data);

                $('#ape_ficha_id').text('Examenes de Ficha Clinica Nro: ' + id);
                for (i = 0; i < data.length; i++) {

                    var fecha = formatDate(data[i].created_at);
                    //var salida = formato(fecha);
                    var examen = data[i].examen;
                    var tipo = data[i].tipo_examen;
                    var prioridad = data[i].id_prioridad;

                    var j = 1; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr class="tr_examen" id="row' + j + '"><td>' +
                        fecha + '</td><td>' +
                        tipo +
                        '</td><td>' +
                        prioridad +
                        '</td><td>' +
                        examen +
                        '</td><td>'; //esto seria lo que contendria la fila

                    j++;

                    $('#table_examenes tbody').append(fila);

                }

            } else {
                //var fila = '<span><h5>no existen registros</h5></span>'
                //$('#tabla_receta tbody').append(fila);
            }
            $('#m_cons_ex').modal('show');
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};


function buscar_paciente() {
    $('#form_reseva_de_horas').submit(function (e) {
        e.preventDefault();
    });
    let rut = $('#rut_paciente_reserva').val();
    $('#reserva_agregar_paciente_hora').hide();
    $('#reserva_datos_paciente').hide();
    let url = "{{ route('profesional.buscar_rut_paciente') }}";

    $.ajax({

        url: url,
        type: "get",
        data: {
            rut: rut,
        },
    })
        .done(function (data) {


            if (data !== 'null') {

                data = JSON.parse(data);
                $('#reserva_datos_paciente').show();
                $('#reserva_hora_id_paciente').val(data.id);
                $('#reserva_rut_paciente').text(data.rut);
                $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data
                    .apellido_dos);
                $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                if (data.sexo == 'M') {
                    $('#reserva_sexo').text('Masculino');
                } else {
                    $('#reserva_sexo').text('Femenino');
                }
                $('#reserva_hora_email').text(data.email);
                $('#reserva_hora_telefono').text(data.telefono_uno);

                $('#rut_paciente_reserva').val('');

            } else {
                $('#reserva_datos_paciente').hide();
                $('#reserva_agregar_paciente_hora').show();

            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};


function buscar_receta_ficha(id) {

    let url = '{{ route('profesional.buscar_recetas') }}';
    $('#atenciones_previas_2 tbody').empty();

    $.ajax({
        url: url,
        type: "get",
        data: {
            id_ficha: id
        },
        dataType: "json",
    })
        .done(function (data) {
            if (data != null) {

                console.log(data);

                $('#ap_ficha_id').text('Receta de Ficha Clinica Nro: ' + id);
                for (i = 0; i < data.length; i++) {

                    var fecha = formatDate(data[i].created_at);
                    //var salida = formato(fecha);
                    var medicamento = data[i].producto;
                    var dosis = data[i].dosis;
                    var frecuencia = data[i].frecuencia;
                    var presentacion = data[i].presentacion;
                    var j = 1; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr class="tr_receta" id="row' + j + '"><td>' +
                        fecha + '</td><td>' +
                        medicamento +
                        '</td><td>' +
                        dosis +
                        '</td><td>' +
                        frecuencia +
                        '</td><td>' +
                        presentacion + '</td></tr>'; //esto seria lo que contendria la fila

                    j++;

                    $('#atenciones_previas_2 tbody').append(fila);

                }

            } else {
                //var fila = '<span><h5>no existen registros</h5></span>'
                //$('#tabla_receta tbody').append(fila);
            }
            $('#m_cons_receta').modal('show');
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};

function buscar_hora_medica() {
    let buscar_horas = $('#buscar_horas').val();
    let url = "{{ route('profesional.buscar_horas_medicas') }}";
    $('#simpletable tbody').empty();

    $.ajax({
        url: url,
        type: "get",
        data: {
            buscar_horas: buscar_horas
        },
    })
        .done(function (data) {
            if (data != null) {

                console.log(data);
                data = JSON.parse(data);
                for (i = 0; i < data.length; i++) {

                    var hora_inicio = data[i].hora_inicio;
                    //var salida = formato(fecha);
                    var paciente = data[i].id_paciente.nombres + ' ' + data[i].id_paciente.apellido_uno + ' ' +
                        data[i].id_paciente.apellido_dos;

                    var j = 1; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr class="tr_horas" id="row' + j + '"><td>' +
                        hora_inicio + '</td><td>' +
                        paciente +
                        '</td><td class="text-center align-middle"><button href="' +
                        '" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip"' +
                        ' data-placement="top" title="Atender Paciente">' +
                        '<i class="feather icon-check"></i> </button>' +
                        '<button href="#!" class="btn btn-danger btn-sm btn-icon"' +
                        'data-toggle="tooltip" data-placement="top" title="Anular Hora">' +
                        '<i class="feather icon-x"></i> </button>' +
                        '</td></tr>'; //esto seria lo que contendria la fila

                    j++;

                    $('#simpletable tbody').append(fila);

                }


            } else {
                //var fila = '<span><h5>no existen registros</h5></span>'
                //$('#tabla_receta tbody').append(fila);
            }
            $('#m_cons_receta').modal('show');
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function agendar_hora() {

    let url = "{{ route('profesional.agendar_hora') }}";
    let _token = $('#_token').val();
    let fecha_consulta = $('#fecha_consulta').val();
    let reserva_hora_id = $('#reserva_hora_id_paciente').val();
    let id_lugar_atencion = $('#id_lugar_atencion').val();


    $.ajax({

        url: url,
        type: "get",
        data: {
            _token: _token,
            fecha_consulta: fecha_consulta,
            reserva_hora_id: reserva_hora_id

        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                $('#reservar_hora').modal('hide');
                location.reload();

            } else {
                alert('Paciente no encontrado en el sistema');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });



};

// function agendar_hora_paciente_nuevo() {

//     let url = "{{ route('profesional.agendar_hora_nuevo_paciente') }}";
//     let _token = $('#_token').val();
//     let fecha_consulta = $('#fecha_consulta').val();
//     let id_lugar_atencion = $('#id_lugar_atencion').val();
//     let reserva_hora_primer_apellido = $('#reserva_hora_apellido_uno').val();
//     let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
//     let rut_paciente_reserva = $('#rut_paciente_reserva').val();
//     let reserva_hora_nombre = $('#reserva_hora_nombres_paciente').val();
//     let reserva_hora_fecha_nac = $('#reserva_hora_fecha_nac').val();
//     let reserva_hora_sexo = $('#reserva_hora_sexo').val();
//     let reserva_hora_convenio = $('#reserva_hora_convenio').val();
//     let reserva_hora_direccion = $('#reserva_hora_direccion').val();
//     let reserva_hora_comuna = $('#ciudad_agregar').val();
//     let reserva_hora_email = $('#reserva_hora_correo').val();
//     let reserva_hora_telefono = $('#reserva_hora_telefono_uno').val();
//     let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
//     let reserva_hora_sms = $('#reserva_hora_sms').val();

//     $.ajax({

//         url: url,
//         type: "get",
//         data: {
//             _token: _token,
//             fecha_consulta: fecha_consulta,
//             rut_paciente_reserva: rut_paciente_reserva,
//             reserva_hora_nombre: reserva_hora_nombre,
//             reserva_hora_primer_apellido: reserva_hora_primer_apellido,
//             reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
//             reserva_hora_fecha_nac: reserva_hora_fecha_nac,
//             reserva_hora_sexo: reserva_hora_sexo,
//             reserva_hora_convenio: reserva_hora_convenio,
//             reserva_hora_direccion: reserva_hora_direccion,
//             reserva_hora_comuna: reserva_hora_comuna,
//             reserva_hora_email: reserva_hora_email,
//             reserva_hora_telefono: reserva_hora_telefono,
//             reserva_hora_confirmacion: reserva_hora_confirmacion,
//             reserva_hora_sms: reserva_hora_sms
//         },
//     })
//         .done(function (data) {
//             if (data != null) {
//                 data = JSON.parse(data);
//                 console.log(data);
//                 $('#reservar_hora').modal('hide');
//                 location.reload();

//             } else {
//                 alert('Paciente no encontrado en el sistema');
//             }

//         })
//         .fail(function (jqXHR, ajaxOptions, thrownError) {
//             console.log(jqXHR, ajaxOptions, thrownError)
//         });
// };

function opcion_confirmar_hora() {


    $('#datos_hora_medica').hide();
    $('#cancelacion_hora_medica').hide();
    $('#cabecera_hora_medica').text('Confirmar Hora Medica');
    $('#hm_anular_hora').hide();
    $('#hm_atender_hora').hide();
    $('#hm_confirmar_hora').hide();
    $('#hm_ver_hora').hide();
    $('#confirmacion_hora').show();
    $('#confirmacion_hora_medica').show();


};

function opcion_cancelar_hora() {

    $('#datos_hora_medica').hide();
    $('#cancelacion_hora_medica').show();
    $('#cabecera_hora_medica').text('Cancelar Hora Medica');
    $('#hm_anular_hora').hide();
    $('#hm_atender_hora').hide();
    $('#hm_confirmar_hora').hide();
    $('#hm_ver_hora').hide();
    $('#confirmar_anulacion_hora').show();

};

function cancelar_hora() {

    let url = "{{ route('profesional.cancelar_hora') }}";
    let comentario = $('#cancelar_hora_comentario').val();
    let id_hora_medica = $('#id_hora_medica').val();

    $.ajax({

        url: url,
        type: "get",
        data: {
            //_token: _token,
            comentario: comentario,
            id_hora_medica: id_hora_medica
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                $('#consulta').modal('hide');
                location.reload();

            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function confirmar_hora() {

    let url = "{{ route('profesional.confirmar_hora') }}";
    let comentario = $('#confirmar_hora_comentario').val();
    let id_hora_medica = $('#id_hora_medica').val();

    $.ajax({

        url: url,
        type: "get",
        data: {
            //_token: _token,
            comentario: comentario,
            id_hora_medica: id_hora_medica
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                $('#opciones_reserva').modal('hide');
                location.reload();

            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function mi_horario_lugar_atencion(id) {

    let id_lugar_atencion = id;
    let url = "{{ route('profesional.mi_horario_lugar_atencion') }}";
    $('#mi_horario_table tbody').empty();
    $.ajax({

        url: url,
        type: "get",
        data: {
            //_token: _token,
            id_lugar_atencion: id_lugar_atencion,
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);

                $('#modal_editar_horario_atencion').modal('show');
                $('#mi_horario_id_lugar_atencion').val(id);
                for (i = 0; i < data.length; i++) {


                    var hora_inicio = data[i].hora_inicio;
                    var hora_termino = data[i].hora_termino;
                    var dia = data[i].dia;


                    var j = 1; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr class="tr_horario" id="row' + j + '"><td>' +
                        hora_inicio + '</td><td>' +
                        hora_termino + '</td><td>' +
                        dia + '</td><td>' +
                        '</tr>'; //esto seria lo que contendria la fila

                    j++;

                    $('#mi_horario_table tbody').append(fila);

                }


            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function mi_asistente_lugar_atencion(id) {


    let id_lugar_atencion = id;
    let url = "{{ route('profesional.mi_asistente_lugar_atencion') }}";
    $('#mi_asistente_table tbody').empty();

    $.ajax({

        url: url,
        type: "get",
        data: {
            id_lugar_atencion: id_lugar_atencion,
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);

                $('#editar_asistentes').modal('show');
                $('#mi_asistente_id_lugar_atencion').val(id);
                for (i = 0; i < data.length; i++) {


                    var nombres = data[i].nombres + ' ' +
                        data[i].apellido_uno + ' ' + data[i].apellido_dos;
                    var rut = data[i].rut;



                    var j = 1; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr class="tr_asistente" id="row' + j + '"><td>' +
                        '<div class="form-group"><div class="switch switch-success d-inline m-r-10">' +
                        ' <input type = "checkbox" id = "asistentes_editar-1" checked = "" > ' +
                        '<label for = "asistentes_editar-1" class = "cr"> </label> </div> ' +
                        '</div>' + '</td> <td> ' +
                        rut + '</td><td>' +
                        nombres + '</td><td>' +
                        '</tr>'; //esto seria lo que contendria la fila

                    j++;

                    $('#mi_asistente_table tbody').append(fila);

                }


            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

};

function mi_horario_agregar() {

    let id_lugar_atencion = $('#mi_horario_id_lugar_atencion').val();
    let url = "{{ route('profesional.mi_horario_lugar_atencion_agregar') }}";
    let duracion = $('#duracion_horario').val();
    let dia = $('#dia_horario').val();
    let hora_inicio = $('#hora_inicio_horario').val();
    let hora_termino = $('#hora_termino_horario').val();

    $.ajax({

        url: url,
        type: "get",
        data: {
            //_token: _token,
            id_lugar_atencion: id_lugar_atencion,
            duracion: duracion,
            dia: dia,
            hora_inicio: hora_inicio,
            hora_termino: hora_termino
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);

                $('#modal_editar_horario_atencion').modal('hide');
                mi_horario_lugar_atencion(id_lugar_atencion);


            } else {
                alert('No se pudo Confirmar Reserva');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
};

function buscar_ciudad() {

    let region = $('#region_agregar').val();
    let url = "{{ route('profesional.buscar_ciudad_region') }}";
    $.ajax({

        url: url,
        type: "get",
        data: {
            //_token: _token,
            region: region,
        },
    })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                let ciudades = $('#ciudad_agregar');

                ciudades.find('option').remove();
                ciudades.append('<option value=""></option>');
                $(data).each(function (i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

            } else {
                alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

}

$(document).ready(function () {

    $("#cerrar_registro_paciente_hora").click(function () {
        $("#agenda_agregar_paciente").modal('hide');
        $('#rut_paciente_reserva').val('');
    });

    $("#cerrar_tomar_hora").click(function () {
        $("#agenda_agregar_paciente").modal('hide');
        $('#rut_paciente_reserva').val('');
    });
    $("#cerrarModal").click(function () {
        $("#consulta").modal('hide')
    });
    //Primer modal//
    $("#form_nuevo_lugar_atencion").validate({
        rules: {
            //primer modal//
            nombre_lugar_atencion: {
                required: true,
                minlength: 4
            },
            direccion_lugar_atencion: {
                required: true,
                minlength: 4
            },
            numero_lugar_atencion: {
                required: true,
                minlength: 4
            },
            email_lugar_atencion: {
                required: true,
                email: true
            },
            telefono_lugar_atencion: {
                required: true,
                minlength: 4
            },
        },
        messages: {
            //primer modal//
            nombre_lugar_atencion: {
                required: "Ingrese Nombre",
                minlength: "Por favor ingrese un Nombre vÃ¡lido"
            },
            direccion_lugar_atencion: {
                required: "Ingrese DirecciÃ³n",
                minlength: "Por favor ingrese un DirecciÃ³n vÃ¡lido"
            },
            numero_lugar_atencion: {
                required: "Ingrese NÃºmero",
                minlength: "Por favor ingrese un NÃºmero vÃ¡lido"
            },
            email_lugar_atencion: {
                required: "Ingrese Correo ElectrÃ³nico",
                email: "Por favor ingrese un Correo ElectrÃ³nico vÃ¡lido"
            },
            telefono_lugar_atencion: {
                required: "Ingrese TelÃ©fono",
                minlength: "Por favor ingrese un TelÃ©fono vÃ¡lido"
            },
        },
        highlight: function (element) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");

            $el.addClass("es-invalido");

            // Select2 and Tagsinput
            if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                "tagsinput") {
                $el.parent().addClass("es-invalido");
            }
        },
        unhighlight: function (element) {
            $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
        },
        submitHandler: function (form) {
            console.log("AJAX");
        }
    });

    //Segundo modal//
    $("#form_editar_lugar_atencion").validate({
        // 113-313
        rules: {
            //primer modal//
            editar_nombre_lugar_atencion: {
                required: true,
                minlength: 4
            },
            editar_direccion_lugar_atencion: {
                required: true,
                minlength: 4
            },
            editar_numero_lugar_atencion: {
                required: true,
                minlength: 4
            },
            editar_email_lugar_atencion: {
                required: true,
                email: true
            },
            editar_telefono_lugar_atencion: {
                required: true,
                minlength: 4
            },
        },
        messages: {
            //primer modal//
            editar_nombre_lugar_atencion: {
                required: "Ingrese Nombre",
                minlength: "Por favor ingrese un Nombre vÃ¡lido"
            },
            editar_direccion_lugar_atencion: {
                required: "Ingrese DirecciÃ³n",
                minlength: "Por favor ingrese una DirecciÃ³n vÃ¡lida"
            },
            editar_numero_lugar_atencion: {
                required: "Ingrese NÃºmero",
                minlength: "Por favor ingrese un NÃºmero vÃ¡lido"
            },
            editar_email_lugar_atencion: {
                required: "Ingrese Correo ElectrÃ³nico",
                email: "Por favor ingrese un Correo ElectrÃ³nico vÃ¡lido"
            },
            editar_telefono_lugar_atencion: {
                required: "Ingrese TelÃ©fono",
                minlength: "Por favor ingrese un TelÃ©fono vÃ¡lido"
            },
        },

        highlight: function (element) {
            var $el = $(element);
            var $parent = $el.parents(".form-group");

            $el.addClass("es-invalido");

            // Select2 and Tagsinput
            if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                "tagsinput") {
                $el.parent().addClass("es-invalido");
            }
        },
        unhighlight: function (element) {
            $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
        },
        submitHandler: function (form) {
            console.log("AJAX");
        }
    });

    $('#res-config').on('click', ".accion_editar_lugar_atencion", function () {
        console.log("abrir modal accion_editar_lugar_atencion");
        $('#editar_lugar_atencion').modal();
    });

    $('#res-config').on('click', ".desasociar_lugar_existente", function () {
        console.log("abrir modal desasociar_lugar_existente");
        $('#modal_desasociar_lugar_existente').modal();
    });

    $('#res-config').on('click', ".accion_asistentes", function () {
        console.log("abrir modal accion_asistentes");
        $('#editar_asistentes').modal();
    });

    $('#res-config').on('click', ".accion_editar_lugar_atencion", function () {
        console.log("abrir modal accion_editar_lugar_atencion");
        $('#editar_lugar_atencion').modal();
    });

    $('#res-config').on('click', ".accion_editar_horarios", function () {
        console.log("abrir modal accion_editar_horarios");
        $('#modal_editar_horario_atencion').modal();
    });
    $('#res-config').on('click', ".accion_editar_valores", function () {
        console.log("abrir modal accion_editar_valores");
        $('#modal_editar_valor_atencion').modal();
    });

    $('#res-config-1').DataTable({
        responsive: true,
    });
});

