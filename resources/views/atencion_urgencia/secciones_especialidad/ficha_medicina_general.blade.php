<!-- FICHA ATENCION GENERAL -->
<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-2 pt-1 mt-2">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha') }}" method="POST">
                    <div class="col-sm-12 col-md-12">
                        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        @csrf

                        <div class="tab-content" id="med-contenido">
                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                            <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!--Formulario / Menor de edad-->
                                            @include('general.secciones_ficha.seccion_menor')
                                            <!--Cierre: Formulario / Menor de edad-->

                                            <!--Motivo consulta-->
                                            @include('general.secciones_ficha.motivo')
                                            <!--Cierre: Formulario /Motivo de la Consulta-->

                                            <!--Formulario / Antecedentes-->
                                            {{--  <div class="col-sm-12 col-md-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="antecedentes">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                            Antecedentes
                                                        </button>
                                                    </div>
                                                    <div id="antecedentes-c" class="collapse show" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                        <div class="card-body-aten-a">
                                                            <div class="form-row">
                                                                @if (isset($fichaAtencion) && $fichaAtencion->antecedentes != null)
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Antecedentes</label>
                                                                    <input type="text" class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes" value="{{ $fichaAtencion->antecedentes }}">
                                                                </div>
                                                                @else
                                                                <div class="form-group col-md-12">
                                                                    <label class="floating-label-activo-sm">Antecedentes</label>
                                                                    <textarea class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes">{!! old('descripcion_antecedentes') !!}</textarea>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  --}}
                                            <!--Cierre: Formulario / Antecedentes-->

                                            <!--Formulario / Examen Físico-->
                                            {{--  <div class="col-sm-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-a">
                                                        <div class="card-header-a" id="examen-fisico">
                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#examen-fisico-c" aria-expanded="false" aria-controls="examen-fisico-c">
                                                                Examen físico
                                                            </button>
                                                        </div>
                                                        <div id="examen-fisico-c" class="collapse show" aria-labelledby="examen-fisico" data-parent="#examen-fisico">
                                                            <div class="card-body-aten-a">
                                                                <div class="form-row">
                                                                    @if (isset($fichaAtencion) && $fichaAtencion->examen_fisico !=
                                                                    null)
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Descripción</label>
                                                                        <input class="form-control caja-texto form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico" value="{{ $fichaAtencion->examen_fisico }}">
                                                                    </div>
                                                                    @else
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Descripción</label>
                                                                        <textarea class="form-control form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico">{!! old('descripcion_examen_fisico') !!}</textarea>
                                                                    </div>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  --}}
                                            <!--Cierre: Formulario / Examen Físico-->

                                            <!--Formulario / Signos vitales y otros-->
                                            @include('general.secciones_ficha.signos_vitales')
                                            <!--Cierre: Formulario / Signos vitales y otros-->
                                            {{--  @include('atencion_medica.generales.seccion_cronicos_ges_confidencial')  --}}
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="hospitalizar_paciente">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                            Hospitalizar Paciente
                                                        </button>
                                                    </div>
                                                    <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                                        <div class="card-body-aten-a shadow-none">
                                                            @include('general.hospitalizacion.hospitalizar')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Diagnóstico-->
                                            @include('general.secciones_ficha.diagnostico')
                                            <!--Cierre: Formulario / Diagnóstico-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                    {{--  @include('general.secciones_ficha.seccion_receta_examen_comunes')  --}}
                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                </form>
            </div>
        </div>
    </div>
</div>
                        <!--CIERRE: FICHA ATENCION GENERAL-->

@section('modal-ficha-general-espc')
    @include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')
    {{--  modal de ges en resources\views\atencion_medica\modales.blade.php  --}}
@endsection

@section('js-ficha-general-espc')
    <script>
         /** MENSAJE*/
			    /** CARGAR mensaje */
				$('#mensaje_ficha').html('<strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>');
				$('#mensaje_ficha').show();
				setTimeout(function(){
					$('#mensaje_ficha').hide();
				}, 5000);
        $(document).ready(function() {
            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != ''){
                    $('.btn_agregar_medicamento').removeAttr("disabled");
                    $('.btn_medicamento_pdf').removeAttr("disabled");
                    $('.btn_agregar_examen').removeAttr("disabled");
                    $('.btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('.btn_agregar_medicamento').attr('disabled','disabled');
                    $('.btn_medicamento_pdf').attr('disabled','disabled');
                    $('.btn_agregar_examen').attr('disabled','disabled');
                    $('.btn_examenes_pdf').attr('disabled','disabled');
                }
            });

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** autocomplete nombre GES */
            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    envio_codigo_validacion_ges();
                    return false;
                }
            });

            /** abril modal de ges */
            $('#modal_ges').change(function()
            {
                if ($('#modal_ges').is(':checked'))
                {
                    $('#form_ges').modal('show');
                }
                else
                {
                    $('#form_ges').modal('hide');
                }
            });

            $('#confidencial').change(function()
            {
                if ($('#confidencial').is(':checked'))
                {
                    $('#confidencial_descripcion').show();
                }
                else
                {
                    $('#confidencial_descripcion').hide();
                }

            });
        });

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
        }

        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#'+div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        /** GES */
        function registrar_ges_ficha() {

            var validar = 0;
            var mensaje ='';
            let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();
            let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();
            let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();
            let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();
            let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();
            let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();
            let nombre_ges = $('#nombre_ges').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let hora_medica = $('#hora_medica').val();
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();


            {{--  if(nombre_institucion_ficha_ges == '')
            {
                $('#nombre_institucion_ficha_ges').focus();
                validar = 1;

            }
            if(direccion_institucion_ficha_ges == '')
            {
                $('#direccion_institucion_ficha_ges').focus();
                validar = 1;

            }  --}}
            {{--
            if(nombre_responsable_ficha_ges == '')
            {
                $('#nombre_responsable_ficha_ges').focus();
                validar = 1;

            }
            if(rut_responsable_ficha_ges == '')
            {
                $('#rut_responsable_ficha_ges').focus();
                validar = 1;

            }
            --}}
            if(confirmacion_diagnostica_ficha_ges == '')
            {
                $('#confirmacion_diagnostica_ficha_ges').focus();
                mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;
                validar = 1;

            }
            if(paciente_tratamiento_ficha_ges == '')
            {
                $('#paciente_tratamiento_ficha_ges').focus();
                mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;
                validar = 1;

            }
            if(nombre_ges == '')
            {
                $('#nombre_ges').focus();
                mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;
                validar = 1;
            }
            {{--  if(id_paciente == '')
            {
                $('#id_paciente').focus();
                validar = 1;

            }
            if(id_profesional == '')
            {
                $('#id_profesional').focus();
                validar = 1;

            }
            if(id_ficha_atencion == '')
            {
                $('#id_ficha_atencion').focus();
                validar = 1;

            }
            if(id_lugar_atencion == '')
            {
                $('#id_lugar_atencion').focus();
                validar = 1;

            }
            if(hora_medica == '')
            {
                $('#hora_medica').focus();
                validar = 1;

            }  --}}

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {

                $.ajax({
                    url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {

                        nombre_institucion_ficha_ges :nombre_institucion_ficha_ges,
                        direccion_institucion_ficha_ges :direccion_institucion_ficha_ges,
                        nombre_responsable_ficha_ges :nombre_responsable_ficha_ges,
                        rut_responsable_ficha_ges :rut_responsable_ficha_ges,
                        confirmacion_diagnostica_ficha_ges :confirmacion_diagnostica_ficha_ges,
                        paciente_tratamiento_ficha_ges :paciente_tratamiento_ficha_ges,
                        nombre_ges :nombre_ges,
                        id_paciente :id_paciente,
                        id_profesional :id_profesional,
                        id_ficha_atencion :id_ficha_atencion,
                        id_lugar_atencion :id_lugar_atencion,
                        hora_medica :hora_medica,
                        codigo_verificacion :codigo_validacion_informe_ges,

                    },
                })
                .done(function(response) {
                    console.log(response);

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');
                        $('#mensaje').show();
                        $('#form_ges').modal('hide');


                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Exitoso.\n El paciente ha sido Notificado\n La constancia puede ser recuperada desde su escritorio (Documentos).',
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })

            }



        };

        function validar_codigo_ges(){
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();
            if(codigo_validacion_informe_ges!='')
            {
                var id_ficha_atencion = $('#id_fc').val();

                var valido = 1;
                var mensaje = '';


                let url = "{{ route('cod_autorizacion.validar_codigo') }}";

                var _token = CSRF_TOKEN;
                $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: _token,
                        codigo:codigo_validacion_informe_ges,
                        id_control:id_ficha_atencion,
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
                            registrar_ges_ficha();
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
					title: "Constancia GES (Artículo 24 Ley 19.966).",
					text:"Debe ingresar Código de notificación entrago por el Paciente.",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
            }
        }

        function envio_codigo_validacion_ges()
        {
            let url = "{{ route('cod_autorizacion.agregar') }}";

            var _token = CSRF_TOKEN;
            var id_profesional = 0;
            var id_ficha_atencion = 0;

            // Autorizacion Licencia
            id_profesional = '{{ Auth::user()->id }}';
            id_ficha_atencion = $('#id_fc').val();

            var id_tipo_autorizacion_acompanante = 7;
            @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
                var rut_acompanante = $('#rut_acompanante').val();
                var nombre_acompanante = $('#nombre_acompanante').val();
                var apell_acompanante = $('#apell_acompanante').val();
                var relacion_acompanante = $('#relacion_acompanante').val();
                var tipo_medio_acompanante = $('#tipo_medio_acompanante').val();
                var tel_acompanante = $('#tel_acompanante').val();
                var email_acompanante = $('#email_acompanante').val();
            @else
                var rut_acompanante = '{{ $paciente->rut }}';
                var nombre_acompanante = '{{ $paciente->nombres }}';
                var apell_acompanante = '{{ $paciente->apellido_uno }}';
                var relacion_acompanante = '99';
                var tipo_medio_acompanante = 3;
                var tel_acompanante = '{{ $paciente->telefono_uno}}';
                var email_acompanante = '{{ $paciente->email }}';
            @endif
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
                        swal({
                            title: "Código Autorizacion enviado al Paciente.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
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

        function agregar_medicamentos_ficha()
        {
            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));
        }

        function agregar_examenes_ficha()
        {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }



    </script>
@endsection
