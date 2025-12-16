$('#ficha_atencion').on("submit", function (e) {
    e.preventDefault();

    url = $('#url_ficha').val();
    motivo_consulta = $('#motivo_consulta').val();
    antecedentes = $('#antecedentes').val();
    examen_fisico = $('#examen_fisico').val();
    hipotesis_diagnostico = $('#hipotesis_diagnostico').val();
    diagnostico = $('#diagnostico').val();
    cronico = $('#cronico').val();
    ges = $('#ges').val();
    medicamentos = $('#medicamentos').val();
    examen = $('#examen').val();
    confidencial = $('#confidencial').val();


    $.ajax({
            url: url,
            type: "get",
            data: {
                motivo_consulta: motivo_consulta,
                antecedentes: antecedentes,
                examen_fisico: examen_fisico,
                hipotesis_diagnostico: hipotesis_diagnostico,
                diagnostico: diagnostico,
                cronico: cronico,
                ges: ges,
                medicamentos: medicamentos,
                examen: examen,
                confidencial: confidencial,
            },
            success: function (data) {
                //return 'hola';
                $("#ajaxResponse").append(data.msg);
                console.log(data);
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });


});
