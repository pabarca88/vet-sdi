<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDI | Flujo Caja</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"> </script>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }} /">
    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/plugins/lightbox.min.css') }}"/>

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/pills_modals.css') }}"/>

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />


    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" />


    @yield('page-styles')
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRole('Profesional'))
        @include('template.profesional.menu')
        @include('template.profesional.header')
    @elseif(Auth::user()->hasRole('Asistente'))
        @include('template.asistente.menu')
        @include('template.asistente.header')
    @elseif(Auth::user()->hasRole('Institucion'))
        @include('template.administracion.menu')
        @include('template.administracion.header')
    @elseif(Auth::user()->hasRole('Servicio'))
        @include('template.administracion.menu')
        @include('template.administracion.header')
    @elseif(Auth::user()->hasRole('AsistenCaja'))
        @include('template.asistente.menu')
        @include('template.asistente.header')
    @endif



    @yield('content')

    <footer>
        {{--  @include('template.include.footer')  --}}
    </footer>

    @include('template.include.nocomplatible')

    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- ekko-lightbox Js -->
	<script src="{{ asset('js/plugins/ekko-lightbox.min.js') }}"></script>
	<script src="{{ asset('js/plugins/lightbox.min.js') }}"></script>
	<script src="{{ asset('js/pages/ac-lightbox.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

    <!-- mensajes -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <!-- fancy box -->
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


    <!-- TEMPLATE FLUJO DE CAJA -->
    <script>

        function cargar_flujo_caja() {
            var fecha = $('#rinde_fecha').val();
            var asistente = $('#rinde_asistente').val();
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja') }}";


            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        asistente : asistente,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#tabla_rendir_caja tbody').html('');
                        for (i = 0; i < data.registros.length; i++) {

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr >';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].tipo_bono.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].convenio.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].fecha_atencion+'</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>'+ data.registros[i].paciente.nombres+' '+ data.registros[i].paciente.apellido_uno+' '+ data.registros[i].paciente.apellido_dos+'</span><br>';
                            fila += '        <span>'+ data.registros[i].paciente.rut +'</span>';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">$'+ data.registros[i].valor_atencion +'</td>';
                            fila += '    <td class="align-middle text-center">'+ data.registros[i].parametro.valor +'</td>';
                            fila += '    {{--  <td class="align-middle text-center">{{ $value_b->observaciones }}</td>  --}}';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <div class="form-group">';
                            fila += '            <div class="switch switch-success d-inline m-r-10">';
                            fila += '                <input type="checkbox" id="rendir_caja_'+ data.registros[i].id +'">';
                            fila += '                <label for="rendir_caja_'+ data.registros[i].id +'"';
                            fila += '                    class="cr"></label>';
                            fila += '            </div>';
                            fila += '        </div>';
                            fila += '    </td>';
                            fila += '</tr>';
                            j++;

                            $('#tabla_rendir_caja tbody').append(fila);

                        }
                    }
                    else
                    {
                        $('#tabla_rendir_caja tbody').html('');
                        $('#tabla_rendir_caja tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_flujo_caja_programa() {
            var fecha = $('#rinde_fecha').val();
            var asistente = $('#rinde_asistente').val();
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja_programa') }}";


            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        asistente : asistente,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {

                    if (data.estado == 1) {

                    }
                    else
                    {

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_flujo_caja_rendicion() {
            var fecha = $('#rinde_fecha').val();
            var asistente = $('#rinde_asistente').val();
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja_rendidos') }}";


            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        asistente : asistente,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {

                    if (data.estado == 1) {

                    }
                    else
                    {

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_flujo_caja_rendicion_programa() {
            var fecha = $('#rinde_fecha').val();
            var asistente = $('#rinde_asistente').val();
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja_rendidos_programa') }}";


            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        asistente : asistente,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {

                    if (data.estado == 1) {

                    }
                    else
                    {

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function seleccionar_bonos_rendicion(){
            var estado  = $('#enviar_todos').is(':checked')
            $("input:checkbox").each(function() {
                if($(this).attr('id') != 'enviar_todos')
                {
                    if(estado != $(this).is(':checked'))
                    {
                        $(this).trigger('click');
                    }
                }
            });
        }

    </script>
    <script>
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
    </script>
    @yield('page-script')
</body>
</html>



