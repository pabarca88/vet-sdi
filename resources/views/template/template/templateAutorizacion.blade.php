{{--  @include('atencion_medica.formularios.modal_atencion_general.modal_autorizacion')  --}}

<!-- TEMPLATE AUTORIZACION -->
<script>
    $(document).ready(function() {
        /* formatear rut */
        $("#rut_acompanante").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
        });
        /** fin formulario pestaña 1 */
    })
    /** Autorización examen menor de edad **/
    function solicitar_autorizacion ()
    {

        let url = "{{ route('cod_autorizacion.agregar') }}";

        var _token = CSRF_TOKEN;
        var id_profesional = 0;
        var id_ficha_atencion = 0;

        if($('#id_tipo_autorizacion_acompanante').val() == 1){// permiso acompañante control
            id_profesional = $('#id_profesional_fc').val();
            id_ficha_atencion = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 2){ //Autoriza FMU
            id_profesional = $('#id_profesional_fc').val();
            id_ficha_atencion = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 3){ //Autoriza Examen Especifico
            id_profesional = $('#id_profesional_fc').val();
            id_ficha_atencion = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 4){//Autoriza Consentimiento Informado
            id_profesional = $('#id_profesional_fc').val();
            id_ficha_atencion = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 5){ // autorizacion edicion paciente
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_control').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 6){ // Notificaciones desde Ficha de Atencion
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 7){ // Autorizacion Licencia
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_fc').val();
        }
        else{
            id_profesional = $('#id_profesional_fc').val();
            id_ficha_atencion = $('#id_fc').val();
        }

        var id_tipo_autorizacion_acompanante = $('#id_tipo_autorizacion_acompanante').val();
        var rut_acompanante = $('#rut_acompanante').val();
        var nombre_acompanante = $('#nombre_acompanante').val();
        var apell_acompanante = $('#apell_acompanante').val();
        var relacion_acompanante = $('#relacion_acompanante').val();
        var tipo_medio_acompanante = $('#tipo_medio_acompanante').val();
        var tel_acompanante = $('#tel_acompanante').val();
        var email_acompanante = $('#email_acompanante').val();
        var medio = '';
        if(tipo_medio_acompanante == 1)
            medio = tel_acompanante;
        else
            medio = email_acompanante;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,

                id_tipo_autorizacion:id_tipo_autorizacion_acompanante,
                id_profesional:id_profesional,
                id_control:id_ficha_atencion,
                id_tipo_medio:tipo_medio_acompanante,
                medio:medio,
                nombre_autoriza:nombre_acompanante,
                apellido_autoriza:apell_acompanante,
                rut_autoriza:rut_acompanante,
                id_parentezco_autoriza:relacion_acompanante,
                telefono_autoriza:tel_acompanante,
                email_autoriza:email_acompanante,
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('-----------------------');
                console.log(data);
                console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#m_acomp1').modal('show');
                }
                else{

                    swal({
                        title: "Problema al Registrar Codigo de autorizacion.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function recibir_codigo_autorizacion()
    {
        var id_control = 0;
        if($('#id_tipo_autorizacion_acompanante').val() == 1){
            id_control = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 2){
            id_control = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 3){
            id_control = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 4){
            id_control = $('#id_fc').val();
        }
        else if($('#id_tipo_autorizacion_acompanante').val() == 5){
            id_control = $('#id_control').val();
        }
        else{
            id_control = $('#id_fc').val();
        }

        var valido = 1;
        var mensaje = '';

        if($('codigo_autorizacion').val() == '')
        {
            valido = 0;
            $('codigo_autorizacion').focus();
            mensaje = 'Campo Codigo Requerido\n';
        }
        if(valido == 1)
        {
            let url = "{{ route('cod_autorizacion.validar_codigo') }}";

            var _token = CSRF_TOKEN;
            var codigo = $('#codigo_autorizacion').val();
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    codigo:codigo,
                    id_control:id_control,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Usted ha sido Autorizado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        $('#m_acomp1').modal('hide');
                        $('.div_autorizacion').hide();
                        $('.div_data').show();
                    }
                    else{

                        swal({
                            title: "Problema solicitar Autorizacion.",
                            text: data.msj,
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Campo requerido.",
                text: mensaje,
                icon: "warning",
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
        }
    }

</script>
