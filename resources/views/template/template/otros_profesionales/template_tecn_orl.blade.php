<!DOCTYPE html>
<html lang="es">
    <head>
        @include('atencion_otros_prof.include.head_lab_orl')

        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
        <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Links del REG-->
        <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?t={{ time() }}">
        <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">
        <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
        <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">
        <!-- data tables css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
        <!-- fileupload-custom css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}?t={{ time() }}">

        <!--Accordion-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">

        <!--Card Sidebar-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">

        <!--Pills Modals-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">

        <!--Tab wizard_formularios-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">

        <!--Bs-Canvas-->
        <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">

        <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?t=<?= time() ?>">

        <!-- fancy box -->
        <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />


        <!--Estilo tab secciones -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

        <!--formulario sm-->
        <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
        <!--audiometria-->
        <link rel="stylesheet" href="{{ asset('css/roboto.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dhtmlxchart.css') }}">



        <!--Estilos escritorios-->
        <link rel="stylesheet"  href="{{ asset('css/escritorios.css') }}">
        <!-- SERLECT2-->
        <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
        <style>
            canvas{
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }

            .Text_box_datos {width: 130px;}
            .text_v1 {height: 23px;}
            .xx {height: 26px;}
            .caja_conc {width: 600px;}
            .tcaj_vert {width: 55px;}.tcaj_coment {width: 804px;height: 43px;}
            .td_ngesp {width: 127px;text-align: center;}
            .td_dng {width: 127px;height: 26px;text-align: center;}
            .txt_der {text-align: right;}
            .Text_teie1 {width: 153px;}
            .Text_rut {width: 61px;}
            .Body_ocho {width: 1100px;margin-left:270px;border: 1px solid #C0C0C0;background-color:#FFFFFF}
            .barra_tit {text-align: center;background-color: #D6D6D6;height:30px}
            .tib_pcned {text-align: left;}
            .Text_teie {width: 370px;}
            .tcaj_tit {text-align: left;height: 22px;padding-top:10px}
            .tcaj_tel {text-align: right;height: 22px;}
            .tab_pc {width: 1100px;height: 340px;}
            .Text_teie1 {
            /* Common */
            font : 13px 'Arial', Helvetica, sans-serif;color :#C0C0C0 ;padding : 2px;width: 77px;}
            .tib_pcnnom {width: 216px;}
            .Text_teant {width: 230px;text-align: center;}
            .text_antec {width: 230px;height: 39px;}
            .tit3 {height: 23px;text-align: center;}
            .tit2 {text-align: center;background-color: #D6D6D6;height: 28px}
            .caja_vac1 {width: 137px;height: 35px;}
            .text_PC {height: 34px;width: 137px;}
            .tib_pc {height: 34px;width: 138px;text-align: center;}
            .caja_comentario {height: 35px;}
            .caja_vac {width: 138px;height: 35px;}
            .text_dur {width: 84px;}
            .tcaj_nau {height: 34px;width: 137px;text-align: center;}
            .caja_resp {height: 26px;text-align: center;}
            .text_center {text-align: center;}
        .ng_esp {
            /* Common */
	        font : 13px 'Wingdings 3';text-align: center;padding:1px; margin-left:5px;margin-right:5px;margin-top: 5px;


            width:85px; height:25px;    background-color: #CFD6D5; color: #FF0000; font-weight: bold; font-size: 1.2rem;
        }

        .subtitOD{text-align:left; font-family: Arial, Helvetica, sans-serif; color: #FF0000;}
        .subtitOD1{text-align:left; font-family: Arial, Helvetica, sans-serif; color: #FF0000;padding-left:10px}
        .subtitOI{font-family: Arial, Helvetica, sans-serif; color: #007EFD}
        .subtitOI1{font-family: Arial, Helvetica, sans-serif; color: #007EFD;padding-left:10px}
        .tit{
            text-align: center;
            color: #666666;
            height: 23px;
        }





            .impWidh{
                width: 33px;color: #FF0000;text-align:center;margin-left:10px
            }
            .impWidhOI{
                width: 33px;color: #007EFD;text-align:center;margin-left:10px
            }
            .pad_caj1 {
                width: 80%;border: 1px solid #999999; margin-left:20px;margin-top:20px
            }
            .pad_caj {
                width: 80%;border: 2px solid #FF0000; margin-left:20px;margin-top:20px
            }
            .td_subtit {
                text-align: center;
                height: 23px;
            }
            .tab_disc1 {border: 2px solid #0066FF; width:80%;margin-left:20px;margin-top:20px}
            .txt_ptp {
                text-align: center;
                height: 26px;
            }



            .ptp {
                width: 20%;
                height: 155px;
            }
            .toned {
                width: 30%;
                height: 155px;
            }
            .disc {
                width: 25%;
            }
            .txt_obs {
                width: 412px;
            }
            .auto-style1 {
                text-align: left;
                font-family: Arial, Helvetica, sans-serif;
                color: #FF0000;
                padding-left: 10px;
                height: 26px;
            }
            .auto-style2 {
                width: 306px;
            }
            .auto-style5 {
                text-align: center;
                width: 37px;
            }
            .auto-style6 {
                text-align: center;
                width: 38px;
            }

            .auto-style9 {
                width: 225px;
                height: 155px;
            }

            .auto-style11 {
                text-align: left;
                height: 26px;
            }
            .auto-style12 {
                text-align: left;
            }
            .auto-style14 {
                height: 155px;
            }

            .auto-style15 {
                width: 85px;
                color: #FF0000;
                text-align: center;
                margin-left: 10px;
            }

            .auto-style16 {
                width: 179px;
                color: #FF0000;
                text-align: center;
                margin-left: 10px;
            }

            .auto-style17 {
                width: 478px;
            }

            .chart1 {
              width:900px;height:380px;border:1px solid #c0c0c0;
            }
                  .diapa {
             border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px;
            }

            .button {
                text-align: center;
                color: #666666;  width: 130px;
                height: 99px;padding-right:20px
            }
            .body_aud {
               border: 1px solid #C0C0C0;width:900px
            }
            .diapa {
             border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px;
            }

            </style>













        {{--  /** agregar css */  --}}
        <style>
            .ui-front {
                position: absolute;
                z-index: 2006;
                overflow: auto;
            }
        </style>
    </head>
    <body>
        @include('template.pediatria.header')
        @include('template.profesional.menu')

        @yield('Content')

        <!-- Modal de la vista -->
        @yield('Modals')
        @yield('Modals-med-exa')
        @yield('Modals-med-exa-esp')
        @yield('modal-ficha-general-espc')
        @include('atencion_pediatrica.secciones_especialidad.ficha_pediatria_tipo')
        <!-- Modal de la vista fin -->


        <!-- codigo audiometria -->

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('js/examenes_orl.js') }}"></script>
        <script src="{{ asset('js/dhtmlxchart.js') }}"></script>
        <!-- codigo audiometria -->
        <!-- Required Js -->
        <script src="{{ asset('js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/ripple.js') }}"></script>
        <script src="{{ asset('js/pcoded.min.js') }}"></script>
        <script src="{{ asset('js/documentos.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!-- datatable Js -->
        <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
        {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

        <script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

        <!--Accordion-->
        <script src="{{ asset('js/accordion.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Tablas-->
        <script src="{{ asset('js/tablas_fmu.js') }}?upd={{ random_int(1111,9999) }}"></script>
        <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}?upd={{ random_int(1111,9999) }}"></script>
        <script src="{{ asset('js/tablas_control_cronicos.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <script src="{{ asset('js/recetas_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>
        <script src="{{ asset('js/licencias_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Sidebars-->
        <script src="{{ asset('js/bs_canvas.js') }}"></script>
        <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

        <!--Formularios Modals-->
        <script src="{{ asset('js/modals_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Form wizard-->
        <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!-- datepicker js -->
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

        <!--Tooltips-->
        <script src="{{ asset('js/tooltip_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Check-->
        <script src="{{ asset('js/check_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!-- file-upload Js -->
        <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script>

        <!-- mensajes -->
        <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

      {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


        <!-- select2 Js -->
        <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
        <!-- form-select-custom Js -->
        <script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
        <!-- select2 css -->



        <!--Tablas y Toggle atención ginecobstetrica-->
        <script src="{{ asset('js/atencion_especialidades.js') }}"></script>



        <!--Form wizard-->

        <script>
            editable = '$_GET["editable"])'
            guardar = function(idcaja) {
                if (editable=="0") {
                    return;
                }
                d = idcaja.split("_");
                idcampo = d[1];
                vcod_con = d[2];
                var valor = document.getElementById('campo_'+idcampo+'_'+vcod_con).value;
                var postForm = {
                    'valor':valor,
                    'cod_con':vcod_con,
                    'idcampo':idcampo,
                    'tipo':'guardar'
                };
                $.ajax({
                    type: "POST",
                    url: "examenes_db.php",
                    data: postForm,
                    cache: false,
                    success: function(result){

                    }
                });
            }
        </script>

        <script>
            actualiza_datos = function ()
            {
                multiple_dataset[0]["oseaOD"] = document.getElementById("txtc1").value *-1;
                multiple_dataset[1]["oseaOD"] = document.getElementById("txtc2").value*-1;
                multiple_dataset[2]["oseaOD"] = document.getElementById("txtc3").value*-1;
                multiple_dataset[3]["oseaOD"] = document.getElementById("txtc4").value*-1;
                multiple_dataset[4]["oseaOD"] = document.getElementById("txtc5").value*-1;
                multiple_dataset[5]["oseaOD"] = document.getElementById("txtc6").value*-1;
                multiple_dataset[6]["oseaOD"] = document.getElementById("txtc7").value*-1;
                multiple_dataset[7]["oseaOD"] = document.getElementById("txtc8").value*-1;
                multiple_dataset[0]["oseaOI"] = document.getElementById("txtc9").value*-1;
                multiple_dataset[1]["oseaOI"] = document.getElementById("txtc10").value*-1;
                multiple_dataset[2]["oseaOI"] = document.getElementById("txtc11").value*-1;
                multiple_dataset[3]["oseaOI"] = document.getElementById("txtc12").value*-1;
                multiple_dataset[4]["oseaOI"] = document.getElementById("txtc13").value*-1;
                multiple_dataset[5]["oseaOI"] = document.getElementById("txtc14").value*-1;
                multiple_dataset[6]["oseaOI"] = document.getElementById("txtc15").value*-1;
                multiple_dataset[7]["oseaOI"] = document.getElementById("txtc16").value*-1;
                multiple_dataset[0]["aereaOD"] = document.getElementById("txtc17").value*-1;
                multiple_dataset[1]["aereaOD"] = document.getElementById("txtc18").value*-1;
                multiple_dataset[2]["aereaOD"] = document.getElementById("txtc19").value*-1;
                multiple_dataset[3]["aereaOD"] = document.getElementById("txtc20").value*-1;
                multiple_dataset[4]["aereaOD"] = document.getElementById("txtc21").value*-1;
                multiple_dataset[5]["aereaOD"] = document.getElementById("txtc22").value*-1;
                multiple_dataset[6]["aereaOD"] = document.getElementById("txtc23").value*-1;
                multiple_dataset[7]["aereaOD"] = document.getElementById("txtc24").value*-1;
                multiple_dataset[0]["aereaOI"] = document.getElementById("txtc25").value*-1;
                multiple_dataset[1]["aereaOI"] = document.getElementById("txtc26").value*-1;
                multiple_dataset[2]["aereaOI"] = document.getElementById("txtc27").value*-1;
                multiple_dataset[3]["aereaOI"] = document.getElementById("txtc28").value*-1;
                multiple_dataset[4]["aereaOI"] = document.getElementById("txtc29").value*-1;
                multiple_dataset[5]["aereaOI"] = document.getElementById("txtc30").value*-1;
                multiple_dataset[6]["aereaOI"] = document.getElementById("txtc31").value*-1;
                multiple_dataset[7]["aereaOI"] = document.getElementById("txtc32").value*-1;
                document.getElementById("chart1").innerHTML = "";
                doOnLoad();
            }


            var multiple_dataset = [
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "125" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "250" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "500" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "1000" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "2000" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "3000" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "4000" },
                { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "6000" }
            ];
            var myLineChart;
            function doOnLoad() {
                                    myLineChart = new dhtmlXChart({
                                        view: "line",
                                        container: "chart1",
                                        value: "#oseaOD#",
                                        item: {
                                            borderColor: "#FF0000",
                                            color: "#FF0000",
                                        },
                                        line: {
                                            color: "#FF0000",
                                            width: 2
                                        },
                                        tooltip: {
                                            template: "#oseaOD#"
                                        },
                                        offset: 0,
                                        xAxis: {
                                            template: "#frecuencia#"
                                        },
                                        yAxis: {
                                            end: 10,

                                            step: 10,
                                            start:-110 ,
                                        },
                                        padding: {
                                            left: 35,
                                            bottom: 50
                                        },
                                        origin: 0,
                                        legend: {
                                            values: [{ text: "Osea OD" }, { text: "Aerea OD" }, { text: "Osea OI" }, { text: "Aerea OI" }],
                                            align: "right",
                                            valign: "middle",
                                            layout: "y",
                                            width: 100,
                                            margin: 8,
                                            marker: {
                                                type: "item"
                                            }
                                        }
                                    });
                                    myLineChart.addSeries({
                                        value: "#aereaOD#",
                                        item: {
                                                borderColor: "#FF0000",
                                            color: "#FF0000",
                                            type: "s",
                                            radius: 4
                                        },

                                        line: {

                                            color: "#FF0000",
                                            width: 2
                                        },
                                        tooltip: {
                                            template: "#aereaOD#"
                                        }
                                    });
                                    myLineChart.addSeries({
                                        value: "#oseaOI#",
                                        item: {
                                            borderColor: "#007EFD",
                                            color: "#007EFD",
                                            type: "t",
                                            radius: 4
                                        },
                                        line: {
                                            color: "#007EFD",
                                            width: 2,
                                        },
                                        tooltip: {
                                            template: "#oseaOI#"
                                        }
                                    });
                                    myLineChart.addSeries({
                                        value: "#aereaOI#",
                                        item: {
                                            borderColor: "#007EFD",
                                            color: "#007EFD",
                                            type: "s",
                                            radius: 4
                                        },
                                        line: {
                                            color: "#007EFD",
                                            width: 2
                                        },
                                        tooltip: {
                                            template: "#aereaOI#"
                                        }
                                    });
                                    myLineChart.parse(multiple_dataset, "json");
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


        <!--Tooltips-->
        <script src="{{ asset('js/tooltip_atencion_medica.js') }}"></script>



        {{--  @include('template.templateAutorizacion')  --}}


        <!-- form-advance custom js -->
        {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}

        <!--Apgar-->
        <script src="{{ asset('js/aicalc2.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Botón cards-->
        <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <!--Modals Sidebar derecho-->
        <script src="{{ asset('js/modals_sidebar_esp.js') }}?upd={{ random_int(1111,9999) }}"></script>
        <!--Tablas y Toggle atención PEDIATRIA-->

        <script src="{{ asset('js/atencion_pediatria.js') }}?upd={{ random_int(1111,9999) }}"></script>

        <script>
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        </script>

        @yield('js_inferior')
        @yield('page-script')
        @yield('page-script-ficha-atencion'){{-- ficha_orl.blade --}}
        @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
        @yield('page-script-med-exa') {{--  seccion receta y exmaenes --}}
        @yield('page-script-med-exa-esp') {{-- seccion receta y exmaenes especiales --}}
        @yield('js-sidebar') {{-- seccion js side bar --}}
    </body>
</html>
