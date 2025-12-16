<div id="tunner_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tunner_modal_m" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_titulo"> Grados de desarrollo Tunner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Grados de desarrollo Tunner-->
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h5 onclick="$('#form_11_ped').toggle();">Grados de desarrollo Tunner <i id="grado_tunner_ped" class="fas fa-plus-circle text-primary tooltip-test" title="Añadir antecedente" style="cursor:pointer;"></i></h5>
                    </div>
                    <div class="col-md-12" id="form_tunner_ped" style="display:none;">
                        <input type="hidden" name="tipo_tunner" id="tipo_tunner" value="">
                        <div class="form-row">
                            <div class="form-group fill col-sm-4">
                                <label class="floating-label">Grado Tanner</label>
                                {{-- <input type="text" class="form-control form-control-sm" name="tanner" id="tanner"> --}}
                                <select class="form-control form-control-sm" name="tanner" id="tanner">
                                    <option value="I" data-edad_biologica="Menor de 12 Años">I - Edad Bio.: Menor de 12 Años</option>
                                    <option value="II" data-edad_biologica="12 Años">II - Edad Bio.: 12 Años</option>
                                    <option value="III" data-edad_biologica="12 Años 6 meses">III - Edad Bio.: 12 Años 6 meses</option>
                                    <option value="IV" data-edad_biologica="13 Años 6 meses ">IV - Edad Bio.: 13 Años 6 meses </option>
                                    <option value="V" data-edad_biologica="14 años y 6 meses o mayor">V - Edad Bio.: 14 años y 6 meses o mayor</option>
                                </select>
                            </div>
                            <div class="form-group fill col-sm-4">
                                <label class="floating-label">Edad cronológica</label>
                                <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                            </div>
                            <div class="form-group fill col-sm-4">
                                <button type="button" class="btn btn-success btn-sm btn-block" onclick="registrar_tunner();">Añadir</button>
                            </div>
                            <div class="form-group fill col-sm-8">
                                <label class="floating-label">Comentarios sobre el desarrollo</label>
                                <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="cometarios_tanner" id="cometarios_tanner"></textarea>
                            </div>
                        </div>
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
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_1_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Los Testículos tienen un Volumen menor a 4 cc<br>Escroto y pene con características Infantiles</td>
                                        <td class="text-center align-middle">Menor de 12 Años</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">II</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_2_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">El Pene no se modifica,los testículos aumentan su tamaño de 4 a 8 cc.<br> La piél del escrotose enrojece y se hace mas laxa</td>
                                        <td class="text-center align-middle">12 Años</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">III</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_3_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Crecimiento del pene en longitud Volumen testicular entre 6 y 12 cc <br>El escroto está aún mas laxo </td>
                                        <td class="text-center align-middle">12 Años 6 meses</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">IV</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_4_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Mayor crecimiento del peney aumento de su diametro con desarrollo del glande <br> Los testículos tienen entre 15 y 20 cc escroto mas desarrollado y pigmentado</td>
                                        <td class="text-center align-middle">13 Años 6 meses </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center align-middle">V</td>
                                        <td class="text-center align-middle"> <img src="{{ asset('images\imagenes_ped\tanner_5_m.png') }}" style="width:100%"></td>
                                        <td class="text-center align-middle">Los genitales tienen forma y tamaño adulto <br>Volumen testicular aprox 25 cc.</td>
                                        <td class="text-center align-middle">14 años y 6 meses o mayor</td>
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
                            <table id="table_tunner_m" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
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
    function tunner(sexo) {
        $('#tunner_modal').modal('show');
        $('#tipo_tunner').val(sexo);
        if(sexo == 'f')
        {
            $('#modal_titulo').html('Grados de desarrollo Tunner Femenino');
        }
        else id(sexo = 'm')
        {
            $('#modal_titulo').html('Grados de desarrollo Tunner ');
        }
        cargar_tunner('f');
    }
    function registrar_tunner()
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
                sexo : $('#tipo_tunner').val(),
                tanner : $('#tanner').val(),
                edad_biologica : $("#"+sexo+"_tanner option:selected").attr('data-edad_biologica'),
                edad_cronologica : $('#edad').val(),
                comentario : $('#cometarios_tanner').val(),
                // fecha : fecha,

            },
        })
        .done(function(data)
        {

            if(data.estado == 1)
            {
                // $('#tunner_modal_'+sexo).modal('hide');
                cargar_tunner(sexo);
                $('#tanner').val('I');
                $('#edad').val('');
                $('#cometarios_tanner').val('');
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
                    html += '<tr>';
                    html += '    <td class="text-center align-middle">'+moment(value.fecha).format('DD-MM-YYYY, H:mm:ss')+'</td>';
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

