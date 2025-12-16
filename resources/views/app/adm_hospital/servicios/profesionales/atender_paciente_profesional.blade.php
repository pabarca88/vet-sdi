
    <!--ATENCION ENFERMERA-->
    <form action="" method="POST">
        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
        {{-- <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}"> --}}
        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">

        {{--  @csrf  --}}
        <div class="tab-content" id="orl-contenido">
            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
            <div class="tab-pane fade show active" id="atencion_enfermeria" role="tabpanel" aria-labelledby="atencion_enfermeria-tab">
                <!--FORMULARIOS-->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                    </div>
                </div>
				<!--ATENCION ENFERMERIA-->
				@include('app.adm_hospital.servicios.profesionales.control_enfermeria')
				@include('app.adm_hospital.servicios.profesionales.evolucion_medica_urg')
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
						{{-- @include('page.general.hospitalizacion.hospitalizar_urgencia') --}}
					</div>
				</div>
				<div class="row">
					{{-- @include('page.general.secciones_ficha.diagnostico') --}}
				</div>
                   

            </div>

        </div>
    </form>

    <!--GUARDAR ATENCIÓN O CERRAR FICHA ATENCIÓN-->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar  y finalizar atención de paciente">
                    <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Atención">
                </div>
            </div>
        </div>
    </div>



@section('page-script-ficha-atencion')
    <script>
        			/** MENSAJE*/
			    /** CARGAR mensaje */
				$('#mensaje_ficha').html(' Usted puede guardar la evolución solo guarde la ficha cuando el paciente es dado de alta o se traslade ');
				$('#mensaje_ficha').show();
				setTimeout(function(){
					$('#mensaje_ficha').hide();
				}, 5000);
        $(document).ready(function() {
            /* formatear rut */
            $("#solicitado_por_rut_eda").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
             /* formatear rut */
             $("#solicitado_por_rut_edb").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */
            $('#hip_diag_spec').keyup(function(){
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



        })
        // function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        // {
        //     rut = $(rut).val();

        //     // console.log('------------------------------------');
        //     // console.log(rut.length);
        //     // console.log(rut);
        //     // console.log('------------------------------------');

        //     if(rut.length>5)
        //     {
        //         url = "{{ route('profesional.buscar') }}";
        //         $.ajax({

        //             url: url,
        //             type: "GET",
        //             data: {
        //                 rut : rut,
        //             },
        //         })
        //         .done(function(data)
        //         {
        //             // console.log('-----------------------');
        //             // console.log(data);
        //             // console.log('-----------------------');
        //             if(data.estado == 1)
        //             {

        //                 if(data.registros.length>0)
        //                 {
        //                     var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
        //                     var id = data.registros[0].id;
        //                     // $('#'+input_nombre).attr('readonly', true);
        //                     $('#'+input_nombre).val(nombre);
        //                     $('#'+input_id).val(id);
        //                     $('#'+div_solicitar).hide();
        //                     mensaje = '';
        //                     $('#div_mensaje').hide();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_eda').val('');
        //                     $('#solicitado_por_apellido_eda').val('');
        //                     $('#solicitado_por_telefono_eda').val('');
        //                     $('#solicitado_por_email_eda').val('');
        //                 }
        //                 else
        //                 {
        //                     mensaje = 'Profesional no encontrato, debe ingresar datos.';
        //                     $('#'+input_nombre).val('');
        //                     $('#'+input_id).val('');
        //                     $('#'+div_solicitar).show();
        //                     $('#div_mensaje').show();
        //                     $('#mensaje_solicitado_por').html(mensaje);
        //                     $('#solicitado_por_nombre_eda').val('');
        //                     $('#solicitado_por_apellido_eda').val('');
        //                     $('#solicitado_por_telefono_eda').val('');
        //                     $('#solicitado_por_email_eda').val('');
        //                     // $('#'+input_nombre).attr('readonly', true);
        //                 }
        //             }
        //             else
        //             {
        //                 mensaje = 'Se presento un problema en la busqueda intente nuevamente';
        //                 $('#div_mensaje').show();
        //                 $('#mensaje_solicitado_por').html(mensaje);
        //                 // $('#'+input_nombre).attr('readonly', false);
        //             }
        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });
        //     }
        //     else if(rut.length==0)
        //     {
        //         $('#'+input_nombre).val('');
        //         // $('#'+input_nombre).attr('readonly', true);
        //         $('#'+input_id).val('');
        //         $('#'+div_solicitar).hide();
        //         $('#div_mensaje').hide();
        //         $('#mensaje_solicitado_por').html('');
        //     }
        // }
        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
        }

        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

        function cambiar_div(mostrar, ocultar, label, textarea){
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }





        function agregar_medicamentos_ficha() {


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

        function agregar_examenes_ficha() {
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


		function biopsia_endo_gas() {
            if($('#biopsia_end_gast').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }

        function biopsia_endo_colon() {
            if($('#biopsia_colon').prop('checked'))
			{
				$('#m_biopsia_cir').modal('show');
			}
        }

		function muestra_hp_abrir_div()
		{
			if($('#muestra_hp').prop('checked'))
			{
				$('#div_select_muestra_hp').show();
			}
			else
			{
				$('#div_select_muestra_hp').hide();
				$('#muestra_hp_resultado').val('');
			}

		}



        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_cda').val('');
                            $('#solicitado_por_apellido_cda').val('');
                            $('#solicitado_por_telefono_cda').val('');
                            $('#solicitado_por_email_cda').val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        // $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }


    </script>
@endsection


