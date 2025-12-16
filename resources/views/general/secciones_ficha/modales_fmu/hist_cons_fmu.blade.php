<div id="m_consultaant_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaant_fmuLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_consultaant_fmuLabel" onclick="('#m_consultaant_fmu').modal('hide'); ">Datos de consulta de: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h6 class="t-aten">Anamnesis</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <table class="table table-xs table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Motivo de consulta</th>
                                <td class="text-wrap" id="texto_motivo_fmu">-</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr class="mt-0 mb-3">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h6 class="t-aten">Exámen físico</h6>
                    </div>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <table class="table table-xs table-borderless">
                            <tbody>
                            <tr>
                                <td class="text-wrap text-justify" id="texto_ficha_fmu">-</td>
                            </tr>
                            <tr>
                                <td class="text-wrap text-justify" id="texto_ficha_esp_fmu">-</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row" id="ficha_imagenes_fmu">
                </div>
                <div class="row" id="ficha_examenes_espec_fmu">
                </div>

                <hr class="mt-0 mb-3">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h6 class="t-aten">Diagnóstico</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-xs table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Diagnóstico</th>
                                <td class="text-wrap text-justify" id="texto_diagnostico_fmu">-</td>
                            </tr>
                            <tr>
                                <th scope="row">Diagnóstico CIE-10</th>
                                <td class="text-wrap text-justify" id="texto_cie_10_fmu">-</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr class="mt-0 mb-3">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h6 class="t-aten">Indicaciones</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-xs table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row">Indicaciones</th>
                                <td class="text-wrap text-justify" id="texto_indicaciones_fmu">-</td>
                            </tr>
                            {{-- <tr>
                                <th scope="row">Próximo control</th>
                                <td class="text-wrap">11/09/2023</td>
                            </tr> --}}
                            <tr>
                                <th scope="row">Recetas</th>
                                <td class="text-wrap" id="texto_receta_fmu">Si</td>
                            </tr>
                            <tr>
                                <th scope="row">Exámenes</th>
                                <td class="text-wrap" id="texto_examen_fmu">Si</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" onclick="$('#m_consultaant_fmu').modal('hide'); "><i class="feather icon-x"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function  buscar_ficha_atencion_atencion_previa_fmu(id_ficha_atencion)
    {
        let url = "{{ route('ficha_clinica.get_ficha') }}";


        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id_ficha_atencion: id_ficha_atencion,
            },
        })
        .done(function(data) {

            if (data != '') {

                if (data['estado'] == '1')
                {
                    if(data['html_base'] == '')
                    {
                        // CARGA DINAMICA
                        carga_dinamica_fmu(data);
                    }
                    else
                    {
                        // CARGA CON HTML DE ESPECIALDIAD
                        carga_html_base_fmu(data);
                    }
                }
                else
                {
                    $('#label_motivo').html('');
                    $('#label_examen_fisico').html('');
                    $('#label_antecedentes').html('');
                    $('#label_diagnostico').html('');
                }
                $('#m_consultaant_fmu').modal('show');
            }
        })
        .fail(function(e) {
            console.log("error");
            console.log(e);
        });
    }

    function carga_dinamica_fmu(data)
    {
        console.log('carga_dinamica_fmu');
        console.log(data);
        // PACIENTE
        var paciente_id = data.paciente.id;
        var paciente_nombre = data.paciente.nombre;

        // PROFESIONAL
        var profesional_id = data.profesional.id;
        var profesional_nombre = data.profesional.nombre;
        var profesional_apellido_uno = data.profesional.apellido_uno;
        var profesional_apellido_dos = data.profesional.apellido_dos;
        var profesional_rut = data.profesional.rut;
        var profesional_email = data.profesional.email;
        var profesional_id_especialidad = data.profesional.id_especialidad;
        var profesional_especialidad_nombre = data.profesional.especialidad.nombre;
        var profesional_id_tipo_especialidad = data.profesional.id_tipo_especialidad;
        var profesional_tipo_especialidad_nombre = data.profesional.tipo_especialidad.nombre;
        var profesional_id_sub_tipo_especialidad = data.profesional.id_sub_tipo_especialidad;
        var profesional_sub_tipo_especialidad_nombre = data.profesional.sub_tipo_especialidad.nombre;

        // FICHA DE ATENCION
        $('#texto_ficha_fmu').html('');
        var ficha_id = data.registros.id;
        var ficha_id_lugar_atencion = data.registros.id_lugar_atencion;

        var ficha_motivo = data.registros.motivo;
        $('#texto_motivo_fmu').html('');
        if(ficha_motivo != '' && ficha_motivo != '0' && ficha_motivo != 'null' && ficha_motivo != null)
        {
            $('#texto_motivo_fmu').html(''+ficha_motivo+'')
        }


        var ficha_hipotesis_diagnostico = data.registros.hipotesis_diagnostico;
        if(ficha_hipotesis_diagnostico != '' && ficha_hipotesis_diagnostico != '0' && ficha_hipotesis_diagnostico != 'null' && ficha_hipotesis_diagnostico != null)
        {
            $('#texto_diagnostico_fmu').html(''+ficha_hipotesis_diagnostico+'')
        }

        var ficha_diagnostico_ce10 = data.registros.diagnostico_ce10;
        if(ficha_diagnostico_ce10 != '' && ficha_diagnostico_ce10 != '0' && ficha_diagnostico_ce10 != 'null' && ficha_diagnostico_ce10 != null)
        {
            $('#texto_cie_10_fmu').html(''+ficha_diagnostico_ce10+'')
        }

        var indicaciones = data.registros.indicaciones;
        if(indicaciones != '' && indicaciones != '0' && indicaciones != 'null' && indicaciones != null)
        {
            $('#texto_indicaciones_fmu').html(''+indicaciones+'')
        }

        var receta = 'NO';
        if(data.cant_recetas>0)
            $('#texto_receta_fmu').html('SI');
        else
            $('#texto_receta_fmu').html('NO');


        var examen = 'NO';
        if(data.cant_examen_ppf>0)
            $('#texto_examen_fmu').html('SI');
        else
            $('#texto_examen_fmu').html('NO');


        var ficha_antecedentes = data.registros.antecedentes;
        if(ficha_antecedentes != '' && ficha_antecedentes != '0' && ficha_antecedentes != 'null' && ficha_antecedentes != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Antecedentes:</span> '+ficha_antecedentes+',  ')
        }

        var ficha_examen_fisico = data.registros.examen_fisico;
        if(ficha_examen_fisico != '' && ficha_examen_fisico != '0' && ficha_examen_fisico != 'null' && ficha_examen_fisico != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Examen Fisico:</span> '+ficha_examen_fisico+',  ')
        }


        var ficha_cronico = data.registros.cronico;
        if(ficha_cronico != '' && ficha_cronico != '0' && ficha_cronico != 'null' && ficha_cronico != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Cronico:</span> '+ficha_cronico+',  ')
        }

        var ficha_ges = data.registros.ges;
        if(ficha_ges != '' && ficha_ges != '0' && ficha_ges != 'null' && ficha_ges != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">GES:</span> '+ficha_ges+',  ')
        }

        // var ficha_confidencial = data.registros.confidencial;
        // if(ficha_confidencial != '' && ficha_confidencial != '0' && ficha_confidencial != 'null' && ficha_confidencial != null)
        // {
        //     $('#texto_ficha_fmu').append('confidencial: '+ficha_confidencial+',  ')
        // }

        // var ficha_profesional_visible = data.registros.profesional_visible;
        // if(ficha_profesional_visible != '' && ficha_profesional_visible != '0' && ficha_profesional_visible != 'null' && ficha_profesional_visible != null)
        // {
        //     $('#texto_ficha_fmu').append('Profesional Visible: '+ficha_profesional_visible+',  ')
        // }

        var ficha_temperatura = data.registros.temperatura;
        if(ficha_temperatura != '' && ficha_temperatura != '0' && ficha_temperatura != 'null' && ficha_temperatura != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Temperatura:</span> '+ficha_temperatura+',  ')
        }

        var ficha_pulso = data.registros.pulso;
        if(ficha_pulso != '' && ficha_pulso != '0' && ficha_pulso != 'null' && ficha_pulso != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Pulso:</span> '+ficha_pulso+',  ')
        }

        var ficha_frecuencia_reposo = data.registros.frecuencia_reposo;
        if(ficha_frecuencia_reposo != '' && ficha_frecuencia_reposo != '0' && ficha_frecuencia_reposo != 'null' && ficha_frecuencia_reposo != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Frecuencia Reposo:</span> '+ficha_frecuencia_reposo+',  ')
        }

        var ficha_peso = data.registros.peso;
        if(ficha_peso != '' && ficha_peso != '0' && ficha_peso != 'null' && ficha_peso != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Peso:</span> '+ficha_peso+',  ')
        }

        var ficha_talla = data.registros.talla;
        if(ficha_talla != '' && ficha_talla != '0' && ficha_talla != 'null' && ficha_talla != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Talla:</span> '+ficha_talla+',  ')
        }

        var ficha_imc = data.registros.imc;
        if(ficha_imc != '' && ficha_imc != '0' && ficha_imc != 'null' && ficha_imc != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">IMC:</span> '+ficha_imc+',  ')
        }

        var ficha_estado_nutricional = data.registros.estado_nutricional;
        if(ficha_estado_nutricional != '' && ficha_estado_nutricional != '0' && ficha_estado_nutricional != 'null' && ficha_estado_nutricional != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Estado Nutricional:</span> '+ficha_estado_nutricional+',  ')
        }

        var ficha_presion_bi = data.registros.presion_bi;
        if(ficha_presion_bi != '' && ficha_presion_bi != '0' && ficha_presion_bi != 'null' && ficha_presion_bi != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Presion BI:</span> '+ficha_presion_bi+',  ')
        }

        var ficha_presion_bd = data.registros.presion_bd;
        if(ficha_presion_bd != '' && ficha_presion_bd != '0' && ficha_presion_bd != 'null' && ficha_presion_bd != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Presion BD:</span> '+ficha_presion_bd+',  ')
        }

        var ficha_presion_de_pie = data.registros.presion_de_pie;
        if(ficha_presion_de_pie != '' && ficha_presion_de_pie != '0' && ficha_presion_de_pie != 'null' && ficha_presion_de_pie != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Presion de pie:</span> '+ficha_presion_de_pie+',  ')
        }

        var ficha_presion_sentado = data.registros.presion_sentado;
        if(ficha_presion_sentado != '' && ficha_presion_sentado != '0' && ficha_presion_sentado != 'null' && ficha_presion_sentado != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Presion sentado:</span> '+ficha_presion_sentado+',  ')
        }

        var ficha_ct_estado_conciencia = data.registros.ct_estado_conciencia;
        if(ficha_ct_estado_conciencia != '' && ficha_ct_estado_conciencia != '0' && ficha_ct_estado_conciencia != 'null' && ficha_ct_estado_conciencia != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Estado Conciencia:</span> '+ficha_ct_estado_conciencia+',  ')
        }

        var ficha_ct_lenguaje = data.registros.ct_lenguaje;
        if(ficha_ct_lenguaje != '' && ficha_ct_lenguaje != '0' && ficha_ct_lenguaje != 'null' && ficha_ct_lenguaje != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Lenguaje:</span> '+ficha_ct_lenguaje+',  ')
        }

        var ficha_ct_traslado = data.registros.ct_traslado;
        if(ficha_ct_traslado != '' && ficha_ct_traslado != '0' && ficha_ct_traslado != 'null' && ficha_ct_traslado != null)
        {
            $('#texto_ficha_fmu').append('<span style="color: #4984f1;">Traslado:</span> '+ficha_ct_traslado+',  ')
        }


        $('#texto_ficha_esp_fmu').html('');
        var no_mostrar = ['id','id_fichas_atenciones','id_paciente','id_profesional','img','estado','created_at', 'updated_at','examen_especial']

        /** POST QUIRURGICO */
        if(Object.keys(data.registros.post_quirurgico).length>0)
        {
            $.each(data.registros.post_quirurgico, function (key, post_q)
            {
                console.log(post_q);

                $.each(post_q, function (keyq, value_q)
                {
                    /** INFORMACION */
                    if(jQuery.inArray( keyq, no_mostrar ) == -1)
                    {
                        if(value_q != '' && value_q != '0' && value_q != 'null' && value_q != null)
                        {
                            // validar si es checkbox
                            if($('#'+value_q).prop('type') == 'checkbox')
                            {
                                if(value_q == 1)
                                    value_q = 'SI';
                                else
                                    value_q = 'NO';
                            }

                            // validar si es select
                            if($('#'+value_q).prop('nodeName') == 'SELECT')
                            {
                                value_q = $('#'+keyq+' option[value=2]').text();
                            }
                            // var temp_key = keyq.replaceAll('_', ' ');
                            // $('#texto_ficha_esp_fmu').append('<span style="color: #4984f1;">'+toTitleCase(temp_key)+':</span> '+value_q+',  ');
                            var titulo = $('label[for="' + $('#'+keyq).attr('id') + '"]').text();
                            if(titulo != '' && value_q != '')
                                $('#texto_ficha_esp_fmu').append('<span style="color: #4984f1;">'+titulo+':</span> '+value_q+',  ');
                        }
                    }
                });
            });
        }

        /** FICHAS EXTRAS */
        if(Object.keys(data.registros.fichas).length>0)
        {
            $.each(data.registros.fichas, function (key, ficha_esp)
            {
                console.log(ficha_esp);

                $.each(ficha_esp, function (key2, value)
                {
                    /** INFORMACION DE FICHA ESPECIALIDAD */
                    if(jQuery.inArray( key2, no_mostrar ) == -1)
                    {
                        if(value != '' && value != '0' && value != 'null' && value != null)
                        {
                            // validar si es checkbox
                            if($('#'+key2).prop('type') == 'checkbox')
                            {
                                if(value == 1)
                                    value = 'SI';
                                else
                                    value = 'NO';
                            }

                            // validar si es select
                            if($('#'+key2).prop('nodeName') == 'SELECT')
                            {
                                value = $('#'+key2+' option[value=2]').text();
                            }

                            // var temp_key = key2.replaceAll('_', ' ');
                            // $('#texto_ficha_esp_fmu').append('<span style="color: #4984f1;">'+toTitleCase(temp_key)+':</span> '+value+',  ');
                            var titulo = $('label[for="' + $('#'+key2).attr('id') + '"]').text();
                            if(titulo != '')
                                $('#texto_ficha_esp_fmu').append('<span style="color: #4984f1;">'+titulo+':</span> '+value+',  ');
                        }
                    }

                    /** IMAGENES */
                    $('#ficha_imagenes_fmu').html('');
                    if(key2 == 'img')
                    {
                        /** TITULO */
                        $('#ficha_imagenes_fmu').html('<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"><h6 class="t-aten">Imagenes</h6></div>');

                        /** IMAGENES */
                        $.each(value, function (key_img, value_img)
                        {
                            console.log(value_img);
                            var html = '';
                            html += '<div class="col-sm-3">';
                            html += '   <a data-fancybox="gallery" data-src="'+value_img.url+'" data-caption="'+value_img.nombre+'" >';
                            html += '       <img src="'+value_img.url+'" class="img-fluid" alt="'+value_img.nombre+'" />';
                            html += '   </a>';
                            html += '</div>';
                            $('#ficha_imagenes_fmu').append(html);
                        });
                    }

                    /** EXAMENES ESPECIALES */
                    $('#ficha_examenes_espec_fmu').html('');
                    if(key2 == 'examen_especial')
                    {
                        $.each(value, function (key_exa, value_exa)
                        {
                            console.log(value_exa);
                            var html = '';
                            /** TITULO */
                            $('#ficha_examenes_espec_fmu').append('<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"><span class="t-aten">'+value_exa.nombre+'</span> SI</div><div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-justify">');
                            // var info = $.parseJSON(value_exa.cuerpo);
                            // $.each(info, function (key_ex_det, value_ex_det) {
                            //     console.log(key_ex_det);
                            //     console.log(value_ex_det);
                            //     var titulo = $('label[for="' + $('#'+key_ex_det).attr('id') + '"]').text();
                            //     if(titulo != '')
                            //     {
                            //         var temp_key = key2.replaceAll('_', ' ');
                            //         titulo = toTitleCase(temp_key);
                            //     }

                            //     if(titulo != '' && value_ex_det != '')
                            //         $('#ficha_examenes_espec_fmu').append('<span style="color: #4984f1;">'+titulo+': </span> '+value_ex_det+',  ');
                            //     // $('#ficha_examenes_espec_fmu').append(html);
                            // });
                            $('#ficha_examenes_espec_fmu').append('</div>');

                        });
                    }
                });
            });
        }
    }

    function carga_html_base_fmu(data)
    {
        $('#m_consultaant_fmu .modal-body').html('');
        $('#m_consultaant_fmu .modal-body').html(data.html_base);

        $.each(data.registros, function (index, value)
        {
            if(index == 'post_quirurgico')
            {
                /** POST QUIRURGICO */
                if(value.length>0)
                {
                    $.each(value, function (key, post_q)
                    {
                        $.each(post_q, function (keyq, value_q)
                        {
                            /** INFORMACION */
                            if(value_q != '' && value_q != '0' && value_q != 'null' && value_q != null)
                            {
                                $('#'+keyq+'_ver').val(value_q);
                            }
                        });
                    });
                }
            }
            else if(index == 'fichas')
            {
                /** FICHAS EXTRAS */
                if(Object.keys(value).length>0)
                {
                    $.each(value, function (key, ficha_esp)
                    {
                        $.each(ficha_esp, function (key2, value)
                        {
                            /** INFORMACION DE FICHA ESPECIALIDAD */
                            // validar si es checkbox
                            if($('#'+key2+'_ver').prop('type') == 'checkbox')
                            {
                                if(value == 1)
                                {
                                    $('#'+key2+'_ver').prop( "checked", true );
                                    if($('#div_'+key2+'_ver'))  $('#div_'+key2+'_ver').show();
                                }
                                else
                                {
                                    $('#'+key2+'_ver').prop( "checked", false );
                                    if($('#div_'+key2+'_ver'))  $('#div_'+key2+'_ver').hide();
                                }
                            }
                            else
                            {
                                $('#'+key2+'_ver').val(value);

                                if(key2.includes('obs_'))
                                {
                                    if($('#'+key2+'_ver').val()!='')
                                    {
                                        var key2_temp = key2.replace('obs_','div_');
                                        $('#'+key2_temp+'_ver').show();
                                    }
                                    else
                                    {
                                        var key2_temp = key2.replace('obs_','div_');
                                        $('#'+key2_temp+'_ver').hide();
                                    }
                                }
                            }

                            /** IMAGENES */
                            // $('#ficha_imagenes_fmu').html('');
                            // if(key2 == 'img')
                            // {
                            //     /** TITULO */
                            //     $('#ficha_imagenes_fmu').html('<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"><h6 class="t-aten">Imagenes</h6></div>');

                            //     /** IMAGENES */
                            //     $.each(value, function (key_img, value_img)
                            //     {
                            //         console.log(value_img);
                            //         var html = '';
                            //         html += '<div class="col-sm-3">';
                            //         html += '   <a data-fancybox="gallery" data-src="'+value_img.url+'" data-caption="'+value_img.nombre+'" >';
                            //         html += '       <img src="'+value_img.url+'" class="img-fluid" alt="'+value_img.nombre+'" />';
                            //         html += '   </a>';
                            //         html += '</div>';
                            //         $('#ficha_imagenes_fmu').append(html);
                            //     });
                            // }

                            // /** EXAMENES ESPECIALES */
                            // $('#ficha_examenes_espec_fmu').html('');
                            // if(key2 == 'examen_especial')
                            // {
                            //     $.each(value, function (key_exa, value_exa)
                            //     {
                            //         console.log(value_exa);
                            //         var html = '';
                            //         /** TITULO */
                            //         $('#ficha_examenes_espec_fmu').append('<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"><span class="t-aten">'+value_exa.nombre+'</span> SI</div><div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-justify">');
                            //         // var info = $.parseJSON(value_exa.cuerpo);
                            //         // $.each(info, function (key_ex_det, value_ex_det) {
                            //         //     console.log(key_ex_det);
                            //         //     console.log(value_ex_det);
                            //         //     var titulo = $('label[for="' + $('#'+key_ex_det).attr('id') + '"]').text();
                            //         //     if(titulo != '')
                            //         //     {
                            //         //         var temp_key = key2.replaceAll('_', ' ');
                            //         //         titulo = toTitleCase(temp_key);
                            //         //     }

                            //         //     if(titulo != '' && value_ex_det != '')
                            //         //         $('#ficha_examenes_espec_fmu').append('<span style="color: #4984f1;">'+titulo+': </span> '+value_ex_det+',  ');
                            //         //     // $('#ficha_examenes_espec_fmu').append(html);
                            //         // });
                            //         $('#ficha_examenes_espec_fmu').append('</div>');

                            //     });
                            // }
                        });
                    });
                }
            }
            else
            {
                // console.log('asignacion');
                if( index == 'cronico' || index == 'ges' || index == 'confidencial' )
                {
                    if(value == 1)  $('#'+index+'_ver').prop( "checked", true );
                    else            $('#'+index+'_ver').prop( "checked", false );
                }
                else
                {
                    $('#'+index+'_ver').val(value);
                }
            }
        });

    }

    function toTitleCase(str)
    {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

</script>
