<div id="indicar_examen_est_ven" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_est_ven" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen para estudio Enf Venéreas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Tipo de Examen </label>
                            <select class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                <option value="AL">Seleccione</option>
                                <optgroup label="SIFILIS">
                                    <option value="246">VDRL</option>
                                    <option value="245">TREPONEMA PALLIDUM FTA - ABS, MHA-TP </option>
                                </optgroup>
                                <optgroup label="VIH">
                                    <option value="???">VIH, anticuerpos y antígenos virales, determ. de H.I.V.</option>
                                    <option value="???">VIH, reacción de polimerasa en cadena (P.C.R.) en líquido cefaloraquídeo</option>
                                </optgroup>
                                <optgroup label="Flujo">
                                    <option value="229">Cultivo Corriente</option>
                                    <option value="235">Cultivo y Antibiograma Neisseria Gonorrohoeae</option>
                                    <option value="235">CHLAMYDIA TRACHOMATIS Y NEISSERIA GONORRHOEAE DETECCION</option>
                                    <option value="271">INMUNOFLUORESCENCIA INDIRECTA</option>
                                        <option value="359">FLUJO VAGINAL</option>
                                        <option value="359">FLUJO SECRECION URETRAL</option>
                                        <option value="359">Técnicas de Amplificación de Ácidos Nucleicos (TAAN)</option>
                                </optgroup>
                                <optgroup label="HEPATITIS-B">
                                    <option value="281">VIRUS HEPATITIS B, ANTICUERPO DEL ANTIGENO</option>
                                    <option value="282">VIRUS HEPATITIS B, ANTICORE TOTAL DEL (ANTI HBC TOTAL) </option>
                                    <option value="283">VIRUS HEPATITIS B, ANTIGENO E DEL (HBEAG)</option>
                                    <option value="284">VIRUS HEPATITIS B, ANTIGENO DE SUPERFICIE (HBSAG) </option>
                                    <option value="285">VIRUS HEPATITIS B, ANTICORE IGM DEL (ANTI HBC IGM)  </option>
                                </optgroup>
                                <optgroup label="HEPATITIS-C">
                                    <option value="286">VIRUS HEPATITIS C, ANTICUERPOS DE (ANTI HCV) </option>
                                </optgroup>
                                <optgroup label="PAPILOMAS">
                                    <option value="???">Virus Papiloma Humano por PCR </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2" selected>Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" onclick="indicar_examen_cirugia();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_examen_cirugia" class="table table-bordered table-sm tabla_examenes_ficha">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="display:none">id</th>
                                        <th class="text-center align-middle" style="display:none">Nombre Examen</th>
                                        <th class="text-center align-middle">Nombre Examen</th>
                                        {{--  <th class="text-center align-middle">Lado</th>
                                        <th class="text-center align-middle">Tipo</th>  --}}
                                        {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                        <th class="text-center align-middle">Prioridad</th>
                                        {{--  <th class="text-center align-middle">Con Contraste</th>  --}}
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_esp_est_ven();" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function sol_examen_esp_est_ven()
    {
        $('#indicar_examen_est_ven').modal('show');
    }

    function cerrarsol_examen_esp_est_ven()
    {
        $('#indicar_examen_est_ven').modal ('hide');
    }

    {{--  METODOS DE EXAMENES --}}
    // function mostrar_modal_examen_cirguria() {
    //     $("#indicar_examenes").modal("show");
    //     ver_examenes_ficha_medica();
    //     ver_examenes_ficha_medica_esp();
    //     $('#indicar_examenes').modal({backdrop: 'static', keyboard: false});
    // }

    // function cerrarModalExamenesFicha()
    // {
    //     swal({
    //         title: "Ingreso de examen(es).",
    //         text: 'Al "Aceptar" cierra la ventana sin aplicar cambios.\n Debe "Generar Orden de Examen" para guardar cambios.',
    //         icon: "warning",
    //         buttons: ["Aceptar", 'Cancelar'],
    //     }).then((result) => {
    //         if (result == true)
    //         {
    //             console.log('regresar');
    //         }
    //         else
    //         {
    //             $('#indicar_examenes').modal('hide');
    //         }
    //     })
    // }

    function indicar_examen_cirugia()
    {
        var tipo_examen = $("#tipo_examen option:selected").text();
        var id_tipo_examen = $("#tipo_examen").val();
        // var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
        // var examen = $("#examen option:selected").text();
        var prioridad = $("#prioridad option:selected").text();

        // var imagenologia_con_contraste = 'N/C';
        // if($('#imagenologia_con_contraste').is(':checked'))
        //     imagenologia_con_contraste = 'Con Contraste';

        var valido = 0;
        var mensaje = '';

        if( $.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione' )
        {
            valido = 1;
            mensaje += ' Debe seleccionar Tipo Examen\n';
        }
        // if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' )
        // {
        //     valido = 1;
        //     mensaje += ' Debe seleccionar Sub Tipo Examen\n';
        // }
        // if( $.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione' )
        // {
        //     valido = 1;
        //     mensaje += ' Debe seleccionar Examen\n';
        // }
        if( $.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione' )
        {
            valido = 1;
            mensaje += ' Debe seleccionar Prioridad\n';
        }

        if(valido == 0)
        {
            $('.examenes_sin_registros').remove();
            // var i = 1; //contador para asignar id al boton que borrara la fila
            var i = $('#tabla_examen_cirugia tr').length; //contador para asignar id al boton que borrara la fila
            var fila = '';
                fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                fila +=     '<td class="text-center align-middle text-wrap">' + examen + '</td>';
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

            // if($('#imagenologia_con_contraste').prop('checked'))
            // {
            //     $('#tabla_examen_cirugia tr').each(function(key, value)
            //     {
            //         $(value).find('td').each(function(key_td, value_td)
            //         {
            //             if(key_td == 0)
            //             {
            //                 if($(value_td).text() == 'CREATININA EN SANGRE')
            //                 {
            //                     creatinina = 1;
            //                 }
            //             }
            //         });
            //     });
            //     if(creatinina == 0)
            //     {
            //         fila = '';
            //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
            //         fila +=     '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
            //         fila +=     '<td class="text-center align-middle text-wrap">SANGRE</td>';
            //         //fila =     '<td>' + sub_tipo_examen + '</td>';
            //         fila +=     '<td class="text-center align-middle text-wrap">Media</td>';
            //         fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
            //         fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_contraste(\'row' + i + '\');">Quitar</div></td>';
            //         fila += '</tr>';
            //         $('#tabla_examen_cirugia tr:first').after(fila);
            //         i++;
            //         creatinina = 1;
            //     }
            // }

            $("#tipo_examen").val('');
            // $("#sub_tipo_examen").val('');
            // $("#examen").val('');
            $("#prioridad").val(2);
            $('#imagenologia_con_contraste').prop('checked', false);
            $('#mensaje_imagenologia_con_contraste').hide();

            // $("#adicionados1").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            // var nFilas = $("#tabla_examen_cirugia tr").length;
            // $("#adicionados1").append(nFilas - 1);
            // $("#sub_tipo_examen").empty();
            // $("#examen").empty();
            // $("#frecuencia").empty();
            // $("#periodo").empty();
            // $("#prioridad").empty();
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

    function eliminar_examen(id_row)
    {
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


    function registro_examen_ficha()
    {
        var rows1 = [];
        $('#tabla_examen_cirugia tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
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
</script>
