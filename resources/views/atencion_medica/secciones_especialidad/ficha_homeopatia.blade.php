<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="atencion_cirugia_gen-tab" data-toggle="tab" href="#atencion_cirugia_gen" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención Especialidad</a>
                    </li>
				</ul>
            </div>
           <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row mb-1">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                        <div class="alert-atencion alert alert-success-b alert-dismissible fade show"  role="alert" id="mensaje_historias"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="{{ route('fichaAtencion.registrar_ficha_cg') }}" method="POST">
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
                    <div class="tab-content" id="orl-contenido">
                        <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                        <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <!--FORMULARIOS-->
                                    <div class="row">
                                                                                
                                        <!--Formulario / Menor de edad-->
                                        @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
                                        <!--Cierre: Formulario / Menor de edad-->

                                        <!--Motivo consulta-->
                                        @include('general.secciones_ficha.motivo')

										<!--CIRUGIA GENERAL-->
                                        {{--  @include('general.secciones_ficha.cirugia_general.cirugia_adulto')  --}}

                                        <!-- hospitalizar -->
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

                                     

                                        <!-- control post qx -->
                                        @include('general.secciones_ficha.control_cirugia_gen')
                                        <!-- cierre control post qx -->

                                        <!-- ges -->
                                        @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                        <!-- cierre ges -->
                                        <hr>

                                        <!-- Diagnóstico -->
                                        @include('general.secciones_ficha.diagnostico')
                                        <!-- cierre Diagnóstico -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                    </div>

                    {{--  div de botones  --}}
                    <div class="card">
                        <div class="card-body">
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                            @include('general.secciones_ficha.seccion_receta_examen_comunes')
                            <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                        </div>
                    </div>

                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-info mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar ficha e ir a su agenda">
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@section('page-script-ficha-atencion')
    <script>
         /** MENSAJE*/
            /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es opcional.');
            $('#mensaje_ficha').show();
            setTimeout(function(){
                $('#mensaje_ficha').hide();
            }, 5000);

            @if($fichas->count()>0)
                $('#mensaje_historias').html(' El paciente posee historia medica previa. ');
            @else
                $('#mensaje_historias').html(' Primera consulta del paciente. ');
            @endif
                $('#mensaje_historias').show();
                setTimeout(function(){
                    $('#mensaje_historias').hide();
                }, 6000);

        $(document).ready(function() {

            /** fin formulario pestaña 1 */
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

        });
        function showContentTmhomeo() {
            element = document.getElementById("contentTto_homeo");
            check = document.getElementById("tto_med_homeo");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
                 /** accion check sol Pabellon */
         $('#cirug_cda').change(function() {
            if ($('#cirug_cda').is(':checked')) {
                $('#ingreso_sol_pab_modal').modal('show');
            } else {
                $('#ingreso_sol_pab_modal').modal('hide');
            }
        });


        function showContentProc_homeo(){
             element = document.getElementById("contentProc_homeo");
            check = document.getElementById("pr_homeo");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
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

    </script>
@endsection


