$(document).ready(function () {
    const getDiagnosticoDentalUrl = window.getDiagnosticoDentalUrl;

    $('#diag_seleccionado_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    }
                    else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_gral_autocomplete').val(ui.item.label);
            $('#id_medicamento_cronico').val(ui.item.value);
            return false;
        }
    });

    $('.tratamiento-autocomplete').each(function () {
        $(this).autocomplete({
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: getDiagnosticoDentalUrl,
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function (data) {
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
            select: function (event, ui) {
                $(this).val(ui.item.label);
                $(this).next('input[type="hidden"]').val(ui.item.value); // Asigna el valor al input hidden correspondiente
                return false;
            }
        });
    });


    $('#proc_seleccionado_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_gral_autocomplete').val(ui.item.label);
            $('#id_medicamento_cronico').val(ui.item.value);

            return false;
        }
    });

    $('#diag_seleccionado_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    }
                    else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_endo_autocomplete').val(ui.item.label);
            return false;
        }
    });

    $('#proc_seleccionado_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_endo_autocomplete').val(ui.item.label);

            return false;
        }
    });


    $('#diag_seleccionado_max_inf_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);
            return false;
        }
    });

    $('#proc_seleccionado_max_inf_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_max_inf_gral_autocomplete').val(ui.item.label);

            return false;
        }
    });
    $('#diag_seleccionado_max_inf_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    }
                    else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_max_inf_endo_autocomplete').val(ui.item.label);
            return false;
        }
    });

    $('#proc_seleccionado_max_inf_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_max_inf_endo_autocomplete').val(ui.item.label);

            return false;
        }
    });

    $('#diag_seleccionado_boca_compl_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    }
                    else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);
            return false;
        }
    });

    $('#proc_seleccionado_boca_compl_gral_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_boca_compl_gral_autocomplete').val(ui.item.label);

            return false;
        }
    });

    $('#diag_seleccionado_boca_compl_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    if (data.length == 0) {
                        $('.diagnostico_activo').hide();
                        $('.diagnostico_inactivo').show();
                    }
                    else {
                        $('.diagnostico_activo').show();
                        $('.diagnostico_inactivo').hide();
                    }
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#diag_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);
            return false;
        }
    });

    $('#proc_seleccionado_boca_compl_endo_autocomplete').autocomplete({
        source: function (request, response) {
            // Fetch data
            $.ajax({
                url: getDiagnosticoDentalUrl,
                type: 'post',
                dataType: "json",
                data: {
                    _token: CSRF_TOKEN,
                    search: request.term
                },
                success: function (data) {
                    console.log(data);

                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $('#proc_seleccionado_boca_compl_endo_autocomplete').val(ui.item.label);

            return false;
        }
    });

});

