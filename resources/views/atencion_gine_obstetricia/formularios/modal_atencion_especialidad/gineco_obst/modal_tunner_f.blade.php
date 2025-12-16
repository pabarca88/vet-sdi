<div id="tunner_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tunner_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Grados de desarrollo Tunner Femenino</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Grados de desarrollo Tunner-->
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h5 Grados de desarrollo Tunner  onclick="abrir_div('tunner_fem')" Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></i></h5>
                    </div>
                    <div class="col-md-12" id="tunner_fem" style="display:none;">
                        <form>
                            <div class="form-row">
                                <div class="form-group fill col-sm-4">
                                    <label class="floating-label">Grado Tanner</label>
                                    {{-- <input type="text" class="form-control form-control-sm" name="tanner" id="tanner"> --}}
                                    <select class="form-control form-control-sm" name="f_tanner" id="f_tanner">
                                        <option value="I" data-edad_biologica="Menor de 10 Años 6 Meses">I - Edad Bio.: Menor de 10 Años 6 Meses</option>
                                        <option value="II" data-edad_biologica="10 Años 6 Meses">II - Edad Bio.: 10 Años 6 Meses</option>
                                        <option value="III" data-edad_biologica="11 Años">III - Edad Bio.: 11 Años</option>
                                        <option value="IV" data-edad_biologica="12 Años (sin Menarquia)">IV - Edad Bio.: 12 Años (sin Menarquia)</option>
                                        <option value="V" data-edad_biologica="12 años y 8 meses o mayor">V - Edad Bio.: 12 años y 8 meses o mayor</option>
                                    </select>
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <label class="floating-label">Edad cronológica</label>
                                    <input type="text" class="form-control form-control-sm" name="f_edad" id="f_edad">
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="button" class="btn btn-success btn-sm btn-block" onclick="registrar_tunner('f');">Añadir</button>
                                </div>
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label">Comentarios sobre el desarrollo</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="f_cometarios_tanner" id="f_cometarios_tanner"></textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="fracturas_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Tanner</th>
                                        <th class="text-center align-middle">Figura</th>
                                        <th class="text-center align-middle">Signos</th>
                                        <th class="text-center align-middle">Edad Biológica</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">I</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_1.png') }}" style="width:50%"></td>
                                        <td class="text-center align-middle">No Hay tejido Mamario Solo <br>el Pezón protruye Areola sin Pigmentar</td>
                                        <td class="text-center align-middle">Menor de 10 Años 6 Meses</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">II</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_2.png') }}" style="width:50%"></td>
                                        <td class="text-center align-middle">Se palpa tejido Mamario bajo la<br> areola aumentada de diámetro sin sobrepasarla</td>
                                        <td class="text-center align-middle">10 Años 6 Meses</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">III</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_3.png') }}" style="width:50%"></td>
                                        <td class="text-center align-middle">Crecimiento de la mama <br>Pigmentación de la Areola </td>
                                        <td class="text-center align-middle">11 Años</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">IV</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_4.png') }}" style="width:50%"></td>
                                        <td class="text-center align-middle">Mayor aumento de la mama <br> Areola más Pigmentada y solevantada</td>
                                        <td class="text-center align-middle">12 Años (sin Menarquia)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">V</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_5.png') }}" style="width:50%"></td>
                                        <td class="text-center align-middle">La mama es de tipo adulto <br>el Pezón protruye Areola se retrae</td>
                                        <td class="text-center align-middle">12 años y 8 meses o mayor</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <hr>
                        <h5>Controles de evolución</h5>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="table_tunner_f" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha Registro</th>
                                        <th class="text-center align-middle">Tanner</th>
                                        <th class="text-center align-middle">Edad Cronológica</th>
                                        <th class="text-center align-middle">Edad Biológica</th>
                                        <th class="text-center align-middle">Comentarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- datos de tabla --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function tunner() {
        $('#tunner_modal').modal('show');
        cargar_tunner('f');
    }
    function registrar_tunner(sexo)
    {
        url = "{{ route('ped.tunner.agregar') }}";
        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token : CSRF_TOKEN,
                id_ficha_atencion : $('#id_fc').val(),
                id_paciente : $('#id_paciente_fc').val(),
                id_profesional : $('#id_profesional_fc').val(),
                sexo : sexo,
                tanner : $('#'+sexo+'_tanner').val(),
                edad_biologica : $("#"+sexo+"_tanner option:selected").attr('data-edad_biologica'),
                edad_cronologica : $('#'+sexo+'_edad').val(),
                comentario : $('#'+sexo+'_cometarios_tanner').val(),
                // fecha : m_fecha,

            },
        })
        .done(function(data)
        {

            if(data.estado == 1)
            {
                if($('#id_tunner').length > 0)
                    $('#id_tunner').val(data.last_id);
                else
                    $('#id_tunner').val('');
                // $('#tunner_modal_'+sexo).modal('hide');
                cargar_tunner(sexo);
                $('#'+sexo+'_tanner').val('I');
                $('#'+sexo+'_edad').val('');
                $('#'+sexo+'_cometarios_tanner').val('');
            }
            else
            {
                swal({
                    title: "Problema al Cargar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });

                $('#id_tunner').val('');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_tunner(sexo)
    {
        url = "{{ route('ped.tunner.ver') }}";
        $.ajax({

            url: url,
            type: "GET",
            data: {
                id_paciente : $('#id_paciente_fc').val(),
                sexo : sexo,
            },
        })
        .done(function(data)
        {

            if(data.estado == 1)
            {

                $('#table_tunner_'+sexo+' tbody').html('');

                var html = '';
                $.each(data.registros, function(index, value)
                {
                    var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                    var fecha = new Date(f_temp);
                    fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                    html += '<tr>';
                    html += '    <td class="text-center align-middle">'+fecha+'</td>';
                    html += '    <td class="text-center align-middle">'+value.tanner+'</td>';
                    html += '    <td class="text-center align-middle">'+value.edad_cronologica+'</td>';
                    html += '    <td class="text-center align-middle">'+value.edad_biologica+'</td>';
                    html += '    <td class="text-center align-middle">'+value.comentario+'</td>';
                    html += '</tr>';
                });
                $('#table_tunner_'+sexo+' tbody').html(html);
            }
            else{

                swal({
                    title: "Problema al Cargar Tipo Ficha.",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>

