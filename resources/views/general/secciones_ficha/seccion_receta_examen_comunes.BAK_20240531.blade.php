<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <!--INDICACIONES-->
    <div class="row">
        <div class="col-sm-12 col-md-12 text-center">
            <p class="my-0">Completar diagnóstico para activar botones</p>
        </div>
    </div>
    <div class="row">
        @if(!empty(session('lic_token')) && session('lic_estado') == 1)
            @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                <div class="col-sm-12 col-md-6 text-center">
                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                        <button type="button" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info-light btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                        <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i>PDF Receta</button>
                        {{-- <button type="button" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn btn-warning-light btn-xs mt-1" id=""><i class="feather icon-file"></i> PDF Retenida</button> --}}
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                        <button type="button" id="btn_agregar_examen" class="btn_agregar_examen btn btn-info btn-sm mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                        <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i>Ver Receta</button>
                    </div>
                </div>
            @else
                <div class="col-sm-12 col-md-6 text-center">
                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                        <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                        <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i> Ver Receta</button>
                        {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf btn btn-warning-light btn-xs mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> PDF Retenida</button> --}}
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                        <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-xs mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                        <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                    </div>
                </div>
            @endif
        @else
            <div class="col-sm-12 col-md-6 text-center">
                <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                    <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-xs mt-1" onclick="i_medicamento();"><i class="feather icon-plus"></i> Indicar medicamento</button>
                    <button type="button" disabled="disabled" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-primary-light  btn-xs mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i> Ver Receta</button>
                    {{-- <button type="button" disabled="disabled" onclick="ver_pdf_receta_retenido($('#id_fc').val());" class="btn_medicamento_pdf btn btn-warning-light btn-xs mt-1" id="btn_medicamento_retenida_pdf"><i class="feather icon-file"></i> PDF Retenida</button> --}}
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="btn-group btn-group-xs w-100" data-toggle="buttons">
                    <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-xs mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="feather icon-plus"></i> Indicar examen</button>
                    <button type="button" disabled="disabled" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-primary-light  btn-xs mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i> Ver PDF</button>
                </div>
            </div>
        @endif

    </div>
</div>


@section('modals-med-exa')
    @include('general.secciones_ficha.receta_examen.modal_recetario_sdi')
    @include('app.cirugia.modals.modals_cesarea.modal_indicar_examenes')
@endsection

@section('page-script-med-exa')
    {{--  SCRIPT MEDICAMENTOS EXAMENES COMUNES  --}}
    <script>
        var creatinina = 0;
        $(document).ready(function() {
            {{--  EXAMENES  --}}
            {{--  funcion para capturar el tipo de examen y buscar los subtipo que estan relacionados con el  --}}
            $('#tipo_examen').change(function(e) {
                console.log('tipo examen examen comun');
                e.preventDefault();
                tipo_examen = $('#tipo_examen').val();

                $("#sub_tipo_examen").empty();
                $("#examen").empty();
                $.ajax({
                        url: '{{ route('listar.sub_tipo_examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            tipo_examen: tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#sub_tipo_examen').append(
                            `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }

                        /** ACTIVAR CHECHBOK DE CON  CONTRASTE */
                        if($('#tipo_examen').val() == 354) $('#imagenologia_con_contraste').removeAttr('disabled');
                        else  $('#imagenologia_con_contraste').attr('disabled','disabled');
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  buscar examenes por el sub tipo de examen  --}}
            $('#sub_tipo_examen').change(function(e) {

                e.preventDefault();
                sub_tipo_examen = $('#sub_tipo_examen').val();

                $("#examen").empty();
                $.ajax({
                        url: '{{ route('listar.examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            sub_tipo_examen: sub_tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#examen').append( `<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            {{--  mostrar ocultar mensaje de examenes de radiologia con contraste --}}
            $('#imagenologia_con_contraste').change(function(){
                if($('#imagenologia_con_contraste').is(':checked') )
                {
                    $('#mensaje_imagenologia_con_contraste').show();
                }
                else
                {
                    $('#mensaje_imagenologia_con_contraste').hide();
                }

            });

        });

        {{--  METODOS DE RECETA  --}}
        // function i_medicamento() {
        //     {{--  $('#indicar_medicamentos').modal('show');  --}}
        //     ver_medicamento_ficha_medica();
        //     $('#indicar_medicamentos').modal({backdrop: 'static', keyboard: false});
        // }

        // function cerrarModalMedicamentosFicha()
        // {
        //     swal({
        //         title: "Ingreso de medicamento(s).",
        //         text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Receta" para guardar cambios.',
        //         icon: "warning",
        //         buttons: ["Aceptar", 'Cancelar'],
        //     }).then((result) => {
        //         if (result == true)
        //         {
        //             console.log('regresar');
        //         } else {

        //             $('#indicar_medicamentos').modal('hide');
        //         }
        //     })
        // }

        // function getDosis() {

        //     let id_medicamento = $('#id_medicamento_ficha_dental').val();
        //     console.log(id_medicamento);

        //     let url = "{{ route('dental.getDosis') }}";
        //     $.ajax({

        //             url: url,
        //             type: "get",
        //             data: {

        //                 id_medicamento: id_medicamento,

        //             },
        //         })
        //         .done(function(data) {
        //             console.log(data)

        //             if (data != null) {

        //                 data = JSON.parse(data);
        //                 console.log(data)
        //                 let dosis = $('#dosis_medicamento_ficha_dental');

        //                 dosis.find('option').remove();
        //                 dosis.append('<option value="0">Seleccione</option>');
        //                 $(data).each(function(i, v) { // indice, valor
        //                     dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
        //                         '</option>');
        //                 })

        //             } else {



        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });
        // };


        // function getFrecuencia() {

        //     let id_dosis = $('#dosis_medicamento_ficha_dental').val();
        //     //console.log(dosis);

        //     let url = "{{ route('dental.getFrecuencia') }}";
        //     $.ajax({

        //             url: url,
        //             type: "get",
        //             data: {

        //                 id_dosis: id_dosis,

        //             },
        //         })
        //         .done(function(data) {
        //             console.log(data)

        //             if (data != null) {

        //                 data = JSON.parse(data);
        //                 console.log(data)
        //                 let dosis = $('#frecuencia_medicamento_ficha_dental');

        //                 dosis.find('option').remove();
        //                 dosis.append('<option value="0">Seleccione</option>');
        //                 $(data).each(function(i, v) { // indice, valor
        //                     dosis.append('<option value="' + v.id + '">' + v.indic +
        //                         '</option>');
        //                 })

        //             } else {



        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });
        // };

        // function getCantComp() {

        //     var cant_comp = $('#dosis_medicamento_ficha_dental option:selected').attr('data-cant_comp');
        //     console.log(cant_comp);

        //     let url = "{{ route('presentacion.getCantComp') }}";
        //     $.ajax({

        //             url: url,
        //             type: "get",
        //             data: {

        //                 cant_comp: cant_comp,

        //             },
        //         })
        //         .done(function(data) {
        //             console.log(data)

        //             if (data != null) {

        //                 data = JSON.parse(data);
        //                 console.log(data)
        //                 let select_cant_comp = $('#cantidad_comprar');
        //                 let select_cant_comp2 = $('#med_cronicomes');

        //                 select_cant_comp.find('option').remove();
        //                 select_cant_comp.append('<option value="0">Seleccione</option>');
        //                 $(data).each(function(i, v) { // indice, valor
        //                     select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
        //                 })
        //                 select_cant_comp.append('<option value="999">Otra Cantidad</option>');
        //             } else {



        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });

        // };

        // function validar_via_administracion()
        // {
        //     if($('#via_administracion_ficha_dental').val() == 11)
        //     {
        //         $('#div_observaciones_medicamento_ficha_dental').show();
        //         $('#observaciones_medicamento_ficha_dental').removeAttr('disabled');
        //     }
        //     else
        //     {
        //         $('#div_observaciones_medicamento_ficha_dental').hide();
        //         $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');
        //         $('#observaciones_medicamento_ficha_dental').val('');
        //     }
        // }

        // function validar_periodo()
        // {
        //     if($('#periodo_ficha_dental').val() == 11)
        //     {
        //         $('#div_observaciones_periodo_ficha_dental').show();
        //         $('#observaciones_periodo_ficha_dental').removeAttr('disabled');
        //     }
        //     else
        //     {
        //         $('#div_observaciones_periodo_ficha_dental').hide();
        //         $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');
        //         $('#observaciones_periodo_ficha_dental').val('');
        //     }
        // }

        // function validar_cantidad_comprar()
        // {
        //     if($('#cantidad_comprar').val() == 999)
        //     {
        //         $('#div_otra_cantidad_a_comprar').show();
        //         $('#otra_cantidad_a_comprar').removeAttr('disabled');
        //     }
        //     else
        //     {
        //         $('#div_otra_cantidad_a_comprar').hide();
        //         $('#otra_cantidad_a_comprar').attr('disabled','disabled');
        //         $('#otra_cantidad_a_comprar').val('');
        //     }
        // }

        // function indicar_medicamento_cirugia() {

        //     let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
        //     let id_medicamento = $('#id_medicamento_ficha_dental').val();
        //     let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();
        //     let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();
        //     let dosis_medicamento_ficha_dental_2 = $('#dosis_medicamento_ficha_dental_2').val();
        //     let frecuencia_medicamento_ficha_dental_2 = $('#frecuencia_medicamento_ficha_dental_2').val();
        //     let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();
        //     let observaciones_medicamento_ficha_dental = $('#observaciones_medicamento_ficha_dental').val();
        //     let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();
        //     let observaciones_periodo_ficha_dental = $('#observaciones_periodo_ficha_dental').val();
        //     let cantidad_comprar = $('#cantidad_comprar option:selected').text();
        //     let otra_cantidad_a_comprar = $('#otra_cantidad_a_comprar').val();


        //     var lista_med = [];
        //     $('#tabla_medicamento_cirugia tr').each(function(i, n) {
        //         if (i > 0) {
        //             rol = {};
        //             var data = $(this).find("td");
        //             lista_med.push($.trim($(data[0]).text().split("\n").join("")));
        //         }
        //     });

        //     if($.inArray(id_medicamento,lista_med) == -1)
        //     {

        //         var medicamento_uso_cronico = 0;
        //         if($('#medicamento_uso_cronico').is(':checked'))
        //             medicamento_uso_cronico = 1;

        //         var valido = 0;
        //         var mensaje = '';

        //         if($.trim(nombre_medicamento_ficha_dental) == '')
        //         {
        //             valido = 1;
        //             mensaje += 'Debe completar el campo Medicamento.\n';
        //         }

        //         if($('#id_medicamento_ficha_dental').val() != '')
        //         {
        //             if($.trim(dosis_medicamento_ficha_dental) == '' || dosis_medicamento_ficha_dental == 0 || dosis_medicamento_ficha_dental == 'Seleccione una opción' || dosis_medicamento_ficha_dental == 'Seleccione' || dosis_medicamento_ficha_dental == 'Seleccione')
        //             {
        //                 valido = 1;
        //                 mensaje += 'Debe completar el campo Presentación.\n';
        //             }
        //             if($.trim(frecuencia_medicamento_ficha_dental) == '' || frecuencia_medicamento_ficha_dental == 0 || frecuencia_medicamento_ficha_dental == 'Seleccione una opción' || frecuencia_medicamento_ficha_dental == 'Seleccione' || frecuencia_medicamento_ficha_dental == 'Seleccione')
        //             {
        //                 valido = 1;
        //                 mensaje += 'Debe completar el campo Posología.\n';
        //             }
        //         }
        //         else
        //         {
        //             if( dosis_medicamento_ficha_dental_2 == '')
        //             {
        //                 valido = 1;mensaje += 'Debe completar el campo Dosis\n';
        //             }
        //             else
        //             {
        //                 dosis_medicamento_ficha_dental = dosis_medicamento_ficha_dental_2;
        //             }
        //             if( frecuencia_medicamento_ficha_dental_2 == '')
        //             {
        //                 valido = 1;mensaje += 'Debe completar el campo Frecuencia\n';
        //             }
        //             else
        //             {
        //                 frecuencia_medicamento_ficha_dental = frecuencia_medicamento_ficha_dental_2;
        //             }
        //         }

        //         if($.trim(via_administracion_ficha_dental) == '' || via_administracion_ficha_dental == 0 || $.trim(via_administracion_ficha_dental) == 'Seleccione')
        //         {
        //             valido = 1;
        //             mensaje += 'Debe completar el campo Via de Administración.\n';
        //         }
        //         else if($('#via_administracion_ficha_dental').val() == 11)
        //         {
        //             if( $.trim(observaciones_medicamento_ficha_dental) == '')
        //             {
        //                 valido = 1;
        //                 mensaje += 'Debe ingresar Otra Vía Administración\n';
        //             }
        //             else
        //             {
        //                 via_administracion_ficha_dental = observaciones_medicamento_ficha_dental;
        //             }
        //         }

        //         if($.trim(periodo_ficha_dental) == '' || periodo_ficha_dental == 0 || $.trim(periodo_ficha_dental) == 'Seleccione')
        //         {
        //             valido = 1;
        //             mensaje += 'Debe completar el campo Periodo.\n';
        //         }
        //         else if($('#periodo_ficha_dental').val() == 11)
        //         {
        //             if( $.trim(observaciones_periodo_ficha_dental) == '')
        //             {
        //                 valido = 1;
        //                 mensaje += 'Debe ingresar Otro Periodo\n';
        //             }
        //             else
        //             {
        //                 periodo_ficha_dental = observaciones_periodo_ficha_dental;
        //             }
        //         }

        //         if($.trim(cantidad_comprar) == '' || cantidad_comprar == 0 || $.trim(cantidad_comprar) == 'Seleccione')
        //         {
        //             valido = 1;
        //             mensaje += 'Debe completar el campo Cantidad a Comprar.\n';
        //         }
        //         else if($('#cantidad_comprar').val() == '999')
        //         {
        //             if( $.trim(otra_cantidad_a_comprar) == '')
        //             {
        //                 valido = 1;
        //                 mensaje += 'Debe ingresar Cantidad a Comprar\n';
        //             }
        //             else
        //             {
        //                 cantidad_comprar = otra_cantidad_a_comprar;
        //             }
        //         }

        //         if(valido == 0)
        //         {
        //             $('.medicamentos_sin_registros').remove()

        //             var i = $('#tabla_medicamento_cirugia tr').length; //contador para asignar id al boton que borrara la fila
        //             var fila = '<tr class="tabla_medicamento_cirugia" id="row' + i + '">' +
        //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + id_medicamento + '</td>' +
        //                             '<td class="text-center align-middle text-wrap hidden" hidden="hidden">' + medicamento_uso_cronico + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + nombre_medicamento_ficha_dental + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + dosis_medicamento_ficha_dental + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + frecuencia_medicamento_ficha_dental + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + via_administracion_ficha_dental + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + periodo_ficha_dental + '</td>' +
        //                             '<td class="text-center align-middle text-wrap">' + cantidad_comprar + '</td>' +
        //                             '<td class="text-center align-middle text-wrap"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento(\'row' + i + '\');">Quitar</div></td>'+
        //                         '</tr>'; //esto seria lo que contendria la fila

        //             i++;

        //             $('#tabla_medicamento_cirugia tr:first').after(fila);

        //             /** enviando a table de medicamento faltante */
        //             if($('#id_medicamento_ficha_dental').val() == '')
        //             {
        //                 $('#med_faltante').val(nombre_medicamento_ficha_dental);
        //                 enviar_medicamento_faltante();
        //             }

        //             //$("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
        //             {{--  var nFilas = $("#tabla_medicamento_cirugia tr").length;  --}}
        //             $('#nombre_medicamento_ficha_dental').val('');
        //             $('id_medicamento_ficha_dental').val('');

        //             $('#nombre_composicion_farmaco').html('');

        //             {{--  $('#dosis_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
        //             $('#dosis_medicamento_ficha_dental').val(0);

        //             {{--  $('#frecuencia_medicamento_ficha_dental').html('<option value="0">Seleccione</option>');  --}}
        //             $('#frecuencia_medicamento_ficha_dental').val(0);

        //             $('#dosis_medicamento_ficha_dental_2').val('');
        //             $('#frecuencia_medicamento_ficha_dental_2').val('');

        //             $('#via_administracion_ficha_dental').val(0);
        //             $('#observaciones_medicamento_ficha_dental').val('');
        //             $('#observaciones_medicamento_ficha_dental').attr('disabled','disabled');

        //             $('#periodo_ficha_dental').val(0);
        //             $('#observaciones_periodo_ficha_dental').val('');
        //             $('#observaciones_periodo_ficha_dental').attr('disabled','disabled');



        //             $('#cantidad_comprar').val(0);
        //             $('#otra_cantidad_a_comprar').val('');
        //             $('#otra_cantidad_a_comprar').attr('disabled','disabled');


        //             $( "#medicamento_uso_cronico" ).prop( "checked", false ).change();
        //             //$("#adicionados").append(nFilas - 1);
        //             //$("#sub_tipo_examen").empty();
        //             //$("#nro_orden").disabled();

        //         }
        //         else
        //         {
        //             swal({
        //                 title: "Ingreso de medicamento(s).",
        //                 text:mensaje,
        //                 icon: "error",
        //                 // buttons: "Aceptar",
        //                 //SuccessMode: true,
        //             });
        //         }
        //     }
        //     else
        //     {
        //         swal({
        //             title: "Ingreso de medicamento(s).",
        //             text:'El medicamento está Recetado',
        //             icon: "warning",
        //             // buttons: "Aceptar",
        //             //SuccessMode: true,
        //         });
        //     }
        // }

        // function eliminar_medicamento(id_row)
        // {
        //     $('#tabla_medicamento_cirugia [id='+id_row+']').remove();
        // }

        // function enviar_medicamento_faltante()
        // {
        //     var med_faltante = $.trim($('#med_faltante').val());
        //     if(med_faltante != ''){
        //         /** registro */
        //         let url = "{{ route('medicamentoFaltante.registro')}}";


        //         var _token = CSRF_TOKEN;
        //         var id_profesional = $('#id_profesional').val();

        //         $.ajax({

        //             url: url,
        //             type: "POST",
        //             data: {
        //                 _token: _token,
        //                 id_profesional: id_profesional,
        //                 nombre: med_faltante,
        //             },
        //         })
        //         .done(function(data)
        //         {

        //             if (data !== 'null')
        //             {
        //                 //data = JSON.parse(data);
        //                 console.log('-----------------------');
        //                 console.log(data);
        //                 console.log('-----------------------');
        //                 if(data.estado == 1)
        //                 {
        //                     swal({
        //                         title: "Medicamento/Dispositivo Faltante enviado.\n Proximamente se agregará el Medicamento/Dispositivo Faltante en los registros",
        //                         icon: "success",
        //                         // buttons: "Aceptar",
        //                         //SuccessMode: true,
        //                     });
        //                     $('#med_faltante').val('');
        //                     $('#no_existe_switch').prop( "checked", false );
        //                     $('#no_existe').hide();

        //                 }
        //                 else{

        //                     swal({
        //                         title: "Problema al Enviar solicitud.",
        //                         icon: "warning",
        //                         // buttons: "Aceptar",
        //                         //SuccessMode: true,
        //                     })
        //                 }
        //             }
        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });

        //     }
        //     else
        //     {
        //         swal({
        //             title: "Debe Indicar el nombre del Medicamento/Dispositivo Faltante.",
        //             icon: "error",
        //             // buttons: "Aceptar",
        //             //SuccessMode: true,
        //         })
        //     }

        // }

        function ver_pdf_receta(id_ficha_atencion)
        {

            let url = "{{ route('pdf.receta_medicamentos') }}";
            Fancybox.show(
                [
                    {
                    src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        function ver_pdf_receta_retenido(id_ficha_atencion)
        {

            let url = "{{ route('pdf.receta_medicamentos') }}";
            Fancybox.show(
                [
                    {
                    src: "{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion="+id_ficha_atencion+'&tipo_control=1',
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
        {{--  METODOS DE RECETA  FIN --}}

        {{--  METODOS DE EXAMENES  --}}
        function mostrar_modal_examen_cirguria() {

            {{--  $("#indicar_examenes").modal("show");  --}}
            ver_examenes_ficha_medica();
            ver_examenes_ficha_medica_esp();
            $('#indicar_examenes').modal({backdrop: 'static', keyboard: false});

        }

        // function ver_examenes_ficha_medica_esp() {

        // }

        function cerrarModalExamenesFicha()
        {
            swal({
                title: "Ingreso de examen(es).",
                text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Orden de Examen" para guardar cambios.',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                } else {

                    $('#indicar_examenes').modal('hide');
                }
            })
        }


        function indicar_examen_cirugia()
        {
            var tipo_examen = $("#tipo_examen option:selected").text();
            var id_tipo_examen = $("#tipo_examen").val();
            var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
            var examen = $("#examen option:selected").text();
            var id_examen = $("#examen").val();
            var prioridad = $("#prioridad option:selected").text();
            var lado = $("#lado option:selected").text();

            // var imagenologia_con_contraste = 'N/C';
            // if($('#imagenologia_con_contraste').is(':checked'))
            //     imagenologia_con_contraste = 'Con Contraste';

            var valido = 0;
            var mensaje = '';

            if( $.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione' ){
                valido = 1;
                mensaje += ' Debe seleccionar Tipo Examen\n';
            }
            // if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' ){
            //     valido = 1;
            //     mensaje += ' Debe seleccionar Sub Tipo Examen\n';
            // }
            if( $.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione' ){
                valido = 1;
                mensaje += ' Debe seleccionar Examen\n';
            }
            if( $.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione' ){
                valido = 1;
                mensaje += ' Debe seleccionar Prioridad\n';
            }


            if(valido == 0)
            {
                $('.examenes_sin_registros').remove();

                var i = $('#tabla_examen_cirugia tr').length; //contador para asignar id al boton que borrara la fila
                var fila = '';
                    fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + id_examen + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + examen + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen + '</td>';
                    if(lado == 'Seleccione')
                        fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                    else
                        fila +=     '<td class="text-center align-middle text-wrap">' + lado + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + tipo_examen + '</td>';
                    //fila =     '<td>' + sub_tipo_examen + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + prioridad + '</td>';
                    var text_con_contraste = 'N/C';
                    if($('#imagenologia_con_contraste').prop('checked'))
                        text_con_contraste = 'Con Contraste';
                    fila +=     '<td class="text-center align-middle text-wrap">' + text_con_contraste + '</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                i++;
                $('#tabla_examen_cirugia tr:first').after(fila);

                if($('#imagenologia_con_contraste').prop('checked'))
                {
                    $('#tabla_examen_cirugia tr').each(function(key, value)
                    {
                        $(value).find('td').each(function(key_td, value_td)
                        {
                            if(key_td == 0)
                            {
                                if($(value_td).text() == 'CREATININA EN SANGRE')
                                {
                                    creatinina = 1;
                                }
                            }
                        });
                    });
                    if(creatinina == 0)
                    {
                        fila = '';
                        fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                        fila +=     '<td class="text-center align-middle text-wrap" style="display:none">78</td>';
                        fila +=     '<td class="text-center align-middle text-wrap" style="display:none">CREATININA EN SANGRE</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
                        fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                        fila +=     '<td class="text-center align-middle text-wrap">SANGRE</td>';
                        //fila =     '<td>' + sub_tipo_examen + '</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">Media</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                        fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_contraste(\'row' + i + '\');">Quitar</div></td>';
                        fila += '</tr>';
                        $('#tabla_examen_cirugia tr:first').after(fila);
                        i++;
                        creatinina = 1;
                    }
                }




                $("#tipo_examen").val('');
                $("#sub_tipo_examen").val('');
                $("#examen").val('');
                $("#lado").val(0);
                $("#prioridad").val(2);
                $('#imagenologia_con_contraste').prop('checked', false);
                $('#mensaje_imagenologia_con_contraste').hide();

                {{--  $("#adicionados1").text(""); --}}//esta instruccion limpia el div adicioandos para que no se vayan acumulando
                {{--  var nFilas = $("#tabla_examen_cirugia tr").length;  --}}
                {{--  $("#adicionados1").append(nFilas - 1);  --}}
                {{--  $("#sub_tipo_examen").empty();  --}}
                {{--  $("#examen").empty();  --}}
                //$("#frecuencia").empty();
                //$("#periodo").empty();
                //$("#prioridad").empty();
            }
            else
            {
                swal({
                    title: "Ingreso de examen(es).",
                    text:mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        function eliminar_examen(id_row){
            $('#tabla_examen_cirugia [id='+id_row+']').remove();
        }

        function eliminar_examen_contraste(id_row)
        {
            swal({
                title: "Eliminar Examen relacionado con contraste.",
                text: 'Al "Aceptar" Elimina el examen relacionado con contraste.\n',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                }
                else
                {
                    $('#tabla_examen_cirugia [id='+id_row+']').remove();
                    creatinina = 0;
                }
            });
        }


        function registro_examen_ficha() {
            var rows1 = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["nombre_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["lado"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["nombre_examen_especialidad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[4]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[6]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#examenes').val(JSON.stringify(rows1));

            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();
            let tipo_ficha = 1;
            var _token = CSRF_TOKEN;


            let url = "{{ route('examenes.registro_examenes') }}";
            $.ajax({

                    url: url,
                    type: "post",
                    data: {
                        _token: _token,
                        examenes: JSON.stringify(rows1),
                        id_ficha_atencion: id_ficha_atencion,
                        id_profesional: id_profesional,
                        id_paciente: id_paciente,
                        tipo_ficha: tipo_ficha,
                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        {{--  data = JSON.parse(data);  --}}
                        console.log(data)

                        if(data.falla == '0'){
                            swal({
                                title: "Ingreso de examen(es).",
                                text: 'Examenes registrados con Exito.',
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                        else
                        {
                            swal({
                                title: "Ingreso de examen(es).",
                                text: 'Falla en el registro, Intente nuevamente.',
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }



                    } else {

                        swal({
                            title: "Ingreso de examen(es).",
                            text: 'Sin Retorno de Registro, Intente nuevamente.',
                            icon: "error",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }


        function ver_pdf_orden_examenes(id_ficha_atencion)
        {

            let url = "{{ route('pdf.orden_examenes') }}";
            Fancybox.show(
                [
                    {
                    src: url+'?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }
        {{--  METODOS DE EXAMENES FIN  --}}


        {{--  CARGAR MEDICAMENTOS DE FICHA MEDICA  --}}
        // function ver_medicamento_ficha_medica()
        // {

        //     let url = "{{ route('detalle_receta.ver_medicamentos') }}";


        //     var _token = CSRF_TOKEN;
        //     var id_ficha = $('#id_fc').val();
        //     $('#tabla_medicamento_cirugia').html('');

        //     $.ajax({

        //         url: url,
        //         type: "GET",
        //         data: {
        //             _token: _token,
        //             id_ficha:id_ficha
        //         },
        //     })
        //     .done(function(data)
        //     {

        //         if (data !== 'null')
        //         {
        //             //data = JSON.parse(data);
        //             console.log('----------ver_medicamento_ficha_medica-------------');
        //             console.log(data);
        //             console.log('-----------------------');
        //             var html = '';

        //             html += '<thead>';
        //             html += '    <tr>';
        //             html += '        <th class="text-center align-middle hidden" hidden="hidden">id_producto</th>';
        //             html += '        <th class="text-center align-middle hidden" hidden="hidden">uso_cronico</th>';
        //             html += '        <th class="text-center align-middle">Medicamento</th>';
        //             html += '        <th class="text-center align-middle">Presentación</th>';
        //             html += '        <th class="text-center align-middle">Posología</th>';
        //             html += '        <th class="text-center align-middle">Vía Adm.</th>';
        //             html += '        <th class="text-center align-middle">Periodo</th>';
        //             html += '        <th class="text-center align-middle">Comprar</th>';
        //             html += '        <th class="text-center align-middle">Eliminar</th>';
        //             html += '    </tr>';
        //             html += '</thead>';
        //             html += '<tbody>';
        //             if(data.estado == 1)
        //             {

        //                 $.each(data.registros, function(index, value)
        //                 {
        //                     {{--  var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
        //                     var fecha = new Date(f_temp);
        //                     fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();  --}}

        //                     html += '<tr class="tabla_medicamento_cirugia" id="row' + index + '">';
        //                     html += '    <td class="text-center align-middle text-wrap hidden" hidden="hidden">'+value.id_articulo+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap hidden" hidden="hidden">'+value.uso_cronico+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.producto+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.presentacion+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.posologia+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.via_administracion+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.periodo+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap">'+value.cantidad_compra+'</td>';
        //                     html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_medicamento(\'row' + index + '\');">Quitar</div></td>';
        //                     html += '</tr>';
        //                 });

        //             }
        //             else
        //             {

        //                 html += '<tr class="medicamentos_sin_registros">';
        //                 html += '    <td class="text-center align-middle " colspan="9">'+data.msj+'</td>';
        //                 html += '</tr>';

        //             }
        //             html += '</tbody>';
        //             $('#tabla_medicamento_cirugia').html(html);
        //         }
        //     })
        //     .fail(function(jqXHR, ajaxOptions, thrownError) {
        //         console.log(jqXHR, ajaxOptions, thrownError)
        //     });

        // }

        {{--  CARGAR EXAMENES DE FICHA MEDICA  --}}
        function ver_examenes_ficha_medica()
        {

            let url = "{{ route('examenes.ver_examenes') }}";


            var _token = CSRF_TOKEN;
            var id_ficha = $('#id_fc').val();
            var id_hora_medica = $('#hora_medica').val();
            $('#tabla_examen_cirugia').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_ficha_atencion:id_ficha,
                    id_hora_medica:id_hora_medica
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_examenes_ficha_medica-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';

                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle" style="display:none">ID</th>';
                    html += '        <th class="text-center align-middle" style="display:none">NOMBRE</th>';
                    html += '        <th class="text-center align-middle">Nombre Examen</th>';
                    html += '        <th class="text-center align-middle">Lado</th>';
                    html += '        <th class="text-center align-middle">Tipo</th>';
                    {{--  html += '        <th class="text-center align-middle">Sub-Tipo</th>';  --}}
                    html += '        <th class="text-center align-middle">Prioridad</th>';
                    html += '        <th class="text-center align-middle">Con Contraste</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';

                    if(data.estado == 1)
                    {
                        let prioridad = ['', 'Baja', 'Media','Alta','Urgente'];
                        $.each(data.registros, function(index, value)
                        {

                            if(value.examen == 'CREATININA EN SANGRE')
                            {
                                html += '<tr class="tr_examen_cirugia" id="row' + index + '">';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.id_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.examen+'</td>';
                                if(value.otro == 0 || value.otro == 'null' || value.otro == ' ')
                                    html += '    <td class="text-center align-middle text-wrap"> </td>';
                                else
                                    html += '    <td class="text-center align-middle text-wrap">'+value.otro+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_contraste(\'row' + index + '\');">Quitar</div></td>';
                                html += '</tr>';
                            }
                            else
                            {
                                html += '<tr class="tr_examen_cirugia" id="row' + index + '">';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.id_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.examen+'</td>';
                                if(value.otro == 0 || value.otro == 'null' || value.otro == ' ')
                                    html += '    <td class="text-center align-middle text-wrap"> </td>';
                                else
                                    html += '    <td class="text-center align-middle text-wrap">'+value.otro+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen(\'row' + index + '\');">Quitar</div></td>';
                                html += '</tr>';
                            }
                        });

                    }
                    else
                    {

                        html += '<tr class="examenes_sin_registros">';
                        html += '    <td class="text-center align-middle " colspan="6">'+data.msj+'</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_examen_cirugia').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        // function alerta_registro_medicamento() {

        //     swal({
        //         title: "Ingreso de medicamento(s) exitoso.",
        //         text: "Recuerde 'Guardar Ficha Clínica' para finalizar el proceso.",
        //         icon: "success",
        //         // buttons: "Aceptar",
        //         //SuccessMode: true,
        //     });
        //     //alert("ingreso de medicamento(s) exitoso, favor terminar el registro.");
        //     $('#nombre_medicamento_ficha_dental').val('');
        //     $('#dosis_medicamento_ficha_dental').val('');
        //     $('#frecuencia_medicamento_ficha_dental').val('');
        //     $('#via_administracion_ficha_dental').val('0');
        //     $('#periodo_ficha_dental').val('0');
        // }

        // function registrar_medicamentos_ficha()
        // {
        //     var rows1 = [];
        //     $('#tabla_medicamento_cirugia tr').each(function(i, n) {
        //         if (i > 0) {
        //             rol = {};
        //             var data = $(this).find("td");
        //             rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
        //             rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
        //             rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
        //             rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
        //             rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
        //             rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
        //             rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
        //             rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
        //             rows1.push(rol);
        //         }
        //     });

        //     $('#medicamentos').val(JSON.stringify(rows1));

        //     let id_profesional = $('#id_profesional_fc').val();
        //     let id_lugar_atencion = $('#id_lugar_atencion').val();
        //     let id_paciente = $('#id_paciente_fc').val();
        //     let id_ficha_atencion = $('#id_fc').val();
        //     var _token = CSRF_TOKEN;


        //     let url = "{{ route('detalle_receta.registro_medicamentos') }}";
        //     $.ajax({

        //             url: url,
        //             type: "post",
        //             data: {
        //                 _token: _token,
        //                 medicamentos: JSON.stringify(rows1),
        //                 id_ficha: id_ficha_atencion,
        //                 id_ingreso_paciente: '0',
        //                 id_recuperacion: '0',
        //                 id_sala: '0',
        //                 id_profesional: id_profesional,
        //                 id_paciente: id_paciente,
        //                 id_lugar_atencion: id_lugar_atencion,
        //             },
        //         })
        //         .done(function(data) {
        //             console.log(data)

        //             if (data != null) {

        //                 {{--  data = JSON.parse(data);  --}}
        //                 console.log(data)

        //                 if(data.falla == '0'){
        //                     swal({
        //                         title: "Ingreso de medicamento(s).",
        //                         text: 'Medicamentos registrados con Exito.',
        //                         icon: "success",
        //                         // buttons: "Aceptar",
        //                         //SuccessMode: true,
        //                     });
        //                 }
        //                 else
        //                 {
        //                     swal({
        //                         title: "Ingreso de medicamento(s).",
        //                         text: 'Falla en el registro, Intente nuevamente.',
        //                         icon: "warning",
        //                         // buttons: "Aceptar",
        //                         //SuccessMode: true,
        //                     });
        //                 }



        //             } else {

        //                 swal({
        //                     title: "Ingreso de medicamento(s).",
        //                     text: 'Sin Retorno de Registro, Intente nuevamente.',
        //                     icon: "error",
        //                     // buttons: "Aceptar",
        //                     //SuccessMode: true,
        //                 });

        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });

        // }

    </script>
@endsection
