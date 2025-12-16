<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a" style=" border: 1px solid #6c9bd5;">
        <div class="card-header-a" id="cgc" >
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open" type="button" data-toggle="collapse" data-target="#cgc-c" aria-expanded="false" aria-controls="cgc-c">
              Crónicos / GES / Confidencial
            </button>
        </div>
        <div id="cgc-c" class="collapse show" aria-labelledby="cgc" data-parent="#cgc">
            <div class="card-body-aten-a">
                <div class="row">
                    {{-- CRONICO --}}
                    <div class="col-md-4 mx-auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                        <label class="custom-control-label" for="enf_cronico">¿Es enfermo crónico?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row " hidden>
                            <div class="col-sm-12">
                                <div class="alert alert-warning mx-auto" role="alert">
                                    <table class="table table-borderless mt-0 mb-0">
                                        <tbody>
                                            <tr id="tr_obesidad">
                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_diabetes">
                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr id="tr_hipertesion">
                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                <td class="align-middle pb-1 pt-1">
                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                        <i class="feather icon-x"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- GES --}}
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                        {{-- <label for="modal_ges" class="cr" data-toggle="modal"
                                                data-target="#form_ges"></label> --}}
                                        <label class="custom-control-label" for="modal_ges">GES</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" hidden>
                            <div class="alert alert-warning mx-auto my-0" role="alert">
                                <table class="table table-borderless mt-0 mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                            </td>
                                            <td class="align-middle pb-1 pt-1">
                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                    <i class="feather icon-x"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" >
                                    <label class="custom-control-label" for="confidencial">Confidencial</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="confidencial_descripcion" style="display: none">
                            <div class="col-sm-12">
                                <div class="alert alert-warning mx-auto" role="alert">
                                    <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                        de atención médica es confidencial
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL CRONICO -->
<!--******* Modal: ¿Enfermo crónico? *******-->
<div id="form_enfermedad_cronica" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="form_enfermedad_cronica" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Controles de enfermedades crónicas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="medicamento_cronico">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0" onclick="mostrar_div('medicamento_cronico_div');">Agregar/Consultar Medicamentos de Uso Crónico <i class="fas fa-angle-down" id="senal_med_cronico"></i></h5>
                        </div>
                    </div>
                    <hr>

                    <div class="medicamento_cronico_div" style="display:block">
                        <div class="form-row">
                            <div class="col-sm-10 col-md-10 div_contenedor_medicamento_cronico">
                                <div class="row ">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre medicamento</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_medicamentocron" id="nombre_medicamentocron">
                                        <input type="hidden" name="id_medicamento_cronico" id="id_medicamento_cronico" value=""/>
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Presentación</label>
                                        <select class="form-control form-control-sm" id="dosis_cronicomes" name="dosis_cronicomes" onchange="getCantCompCronica('dosis_cronicomes', 'med_cronicomes');">
                                            <option>Seleccione una opción</option>
                                        </select>

                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Cantidad mensual</label>
                                        <select class="form-control form-control-sm" id="med_cronicomes" name="med_cronicomes" >
                                            <option value="0">Seleccione</option>
                                            <option value="999">Otra Cantidad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-2 p-0">
                                <button class="btn btn-primary" type="button" onclick="agregar_medicamento_cronico();"><i class="fa fa-plus"></i>Registrar</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="tabla_medicamento_cronico" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nombre Medicamento</th>
                                            <th class="text-center align-middle">Cantidad Mensual</th>
                                            <th class="text-center align-middle">Acción</th>
                                            <th class="text-center align-middle">Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($medicamentos_cronicos))
                                            @foreach ($medicamentos_cronicos as $med_cronicos)
                                                <tr><td class="align-left align-middle">{{ $med_cronicos->nombre }}</td>
                                                    <td class="text-center align-middle">{{ $med_cronicos->cantidad }}</td>
                                                    <td class="text-center align-middle">
                                                        <button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i></button>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_{{ $med_cronicos->id }}">
                                                    </td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <span>NO EXISTEN REGISTROS</span>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-success" type="button" onclick="">Generar Receta medicamentos</button>
                            </div>
                        </div>
                    </div>


                </div>


                <hr>

                {{--  seleccion de patoliga  --}}
                <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Controles de enfermedades crónicas</label>
                            <select class="form-control form-control-sm" onchange="cambiar_enfermedad_cronica();" id="cronicos" name="cronicos" onchange="mostrar(this.value);">
                                <option value="n_C">Seleccione una opción</option>
                                <option value="cpeso">OBESIDAD</option>
                                <option value="chipertension">HIPERTENSIÓN ARTERIAL</option>
                                <option value="cdiabet">DIABETES</option>
                                <option value="cinsufren">INSUFICIENCIA RENAL</option>
                                <option value="cmtumorales">MARCADORES TUMORALES</option>
                                <option value="creumato">REUMATOLOGÍA</option>
                                <option value="clitemia">LITEMIA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-2 floating right">
                        <div class="form-group fill">
                            <script>
                                var f = new Date();
                                document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
                            </script>
                        </div>
                    </div>
                </div>

                {{--  medicamentos de patologia  --}}
                <div class="medicamento_patologia" style="display:none;">
                    {{--  titulo  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0" id="titulo_med_patologia">Medicamentos Patologia</h5>
                        </div>
                    </div>
                    <hr>
                    {{--  formulario  --}}
                    <div class="form-row">
                        <div class="col-sm-10 col-md-10 div_contenedor_medicamento_cronico_patologia">
                            <div class="row ">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Nombre medicamento</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre_medicamentocron_patologia" id="nombre_medicamentocron_patologia">
                                    <input type="hidden" name="id_medicamentocron_patologia" id="id_medicamentocron_patologia" value=""/>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Presentación</label>
                                    <select class="form-control form-control-sm" id="dosis_medicamentocron_patologia" name="dosis_medicamentocron_patologia" onchange="getCantCompCronica('dosis_medicamentocron_patologia', 'med_cronicomes_patologia');">
                                        <option>Seleccione</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Cantidad mensual</label>
                                    <select class="form-control form-control-sm" id="med_cronicomes_patologia" name="med_cronicomes_patologia" >
                                        <option value="0">Seleccione</option>
                                        <option value="999">Otra Cantidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 p-0">
                            <button class="btn btn-primary" type="button" onclick="" id="btn_registro_med_patologia"><i class="fa fa-plus"></i>Registrar</button>
                        </div>
                    </div>

                    {{--  tabla  --}}
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabla_med_patologia" class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nombre Medicamento</th>
                                        <th class="text-center align-middle">Cantidad Mensual</th>
                                        <th class="text-center align-middle">Acción</th>
                                        <th class="text-center align-middle">Check</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-success" type="button" onclick="">Generar Receta medicamentos Patologia</button>
                        </div>
                    </div>
                </div>

                <div id="control_peso_div" class="card-row" style="display: ">
                    <!--CONTROL DE OBESIDAD-->
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de obesidad</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="registro_peso" id="registro_peso">
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Variación</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="registro_peso_variacion" id="registro_peso_variacion">
                                </div>
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Peso Ideal</label>
                                    <input type="text" class="form-control form-control-sm" name="registro_peso_ideal"
                                        id="registro_peso_ideal">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <button type="button" onclick="registrar_control_obesidad();"
									class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de obesidad</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="control_obesidad"
                                class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Control</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Peso</th>
                                        <th class="text-center align-middle">Variación</th>
                                        <th class="text-center align-middle">Peso Ideal</th>
                                        <!-- <th class="text-center align-middle">Acción</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($control_peso))
                                        @foreach ($control_peso as $cp)
                                            <tr>
                                                <td class="text-center align-middle">{{ $cp->id }}</td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($cp->created_at)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center align-middle">{{ $cp->peso }}</td>
                                                <td class="text-center align-middle">{{ $cp->variacion }}
                                                </td>
                                                <td class="text-center align-middle">{{ $cp->ideal }}</td>
                                                <!--<td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x"></i> Eliminar</button>
                                                </td>-->
                                            </tr>

                                        @endforeach
                                    @else
                                        <span>NO EXISTEN REGISTROS</span>

                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="hipertension_div" class="card-row" style="display: none">
                    <!--CONTROL DE HIPERTENSIÓN-->
					<div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de hipertensi&oacute;n</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Presión Sistólica</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presion_sistolica_hipertension" id="presion_sistolica_hipertension">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Presión Diastólica</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presion_diastolica_hipertension" id="presion_diastolica_hipertension">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Presión Ideal</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="ideal_hipertension" id="ideal_hipertension">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <button type="button" onclick="registrar_hipertension();" class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de hipertensión</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="control_hipertension"
                                class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Control</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Presión Sistólica</th>
                                        <th class="text-center align-middle">Presión Diastólica</th>
                                        <th class="text-center align-middle">Presión Ideal</th>
                                        <!-- <th class="text-center align-middle">Acción</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($hipertension))
                                        @foreach ($hipertension as $h)
                                            <tr>
                                                <td class="text-center align-middle">{{ $h->id }}</td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($h->created_at)->format('d-m-Y H:i') }}
                                                </td>
                                                <td class="text-center align-middle">{{ $h->sistolica }}</td>
                                                <td class="text-center align-middle">{{ $h->diastolica }}
                                                </td>
                                                <td class="text-center align-middle">{{ $h->ideal }}</td>
                                                <!--<td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x"></i> Eliminar</button>
                                                </td>-->
                                            </tr>

                                        @endforeach
                                    @else
                                        <span>NO EXISTEN REGISTROS</span>

                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="diabetes_div" class="card-row" style="display: none">
                    <!--CONTROL DE DIABETES-->
					<div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de diabetes</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="peso_diabetes"
                                        id="peso_diabetes">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Piés</label>
                                    <input type="text" class="form-control form-control-sm" name="pies_diabetes"
                                        id="pies_diabetes">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Hg A1c</label>
                                    <input type="text" class="form-control form-control-sm" name="hga1c_diabetes"
                                        id="hga1c_diabetes">
                                </div>
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Colesterol</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="colesterol_diabetes" id="colesterol_diabetes">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Creatina</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="creatina_diabetes" id="creatina_diabetes">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Glicosilada postprandial</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="glicosilada_postprandial_diabetes"
                                        id="glicosilada_postprandial_diabetes">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <label class="floating-label-activo-sm">Glicosilada ayuno</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="glicosilada_ayuno_diabetes" id="glicosilada_ayuno_diabetes">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <button type="button" onclick="registrar_diabetes();"
                                        class="btn btn-success btn-sm float-right"><i
                                            class="feather icon-plus"></i>Guardar Control</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de diabetes</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-x:auto;">
                                <table id="control_diabetes"
                                    class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nº Control</th>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Peso</th>
                                            <th class="text-center align-middle">Piés</th>
                                            <th class="text-center align-middle">Hg A1c</th>
                                            <th class="text-center align-middle">Colesterol</th>
                                            <th class="text-center align-middle">Creatina</th>
                                            <th class="text-center align-middle">Glicosilada ayuno</th>
                                            <th class="text-center align-middle">Glicosilada postprandial</th>
                                            <th class="text-center align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($diabetes))
                                            @foreach ($diabetes as $d)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $d->id }}</td>
                                                    <td class="text-center align-middle">
                                                        {{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}
                                                    </td>
                                                    <td class="text-center align-middle">{{ $d->peso }}</td>
                                                    <td class="text-center align-middle">{{ $d->pies }}</td>
                                                    <td class="text-center align-middle">{{ $d->hgac1 }}</td>
                                                    <td class="text-center align-middle">{{ $d->colesterol }}</td>
                                                    <td class="text-center align-middle">{{ $d->creatina }}</td>
                                                    <td class="text-center align-middle">
                                                        {{ $d->glicosilada_postprandial }}</td>
                                                    <td class="text-center align-middle">{{ $d->glicosinada_ayuno }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <button href="#!" class="btn btn-danger btn-sm">
                                                            <i class="feather icon-x"></i>
                                                            Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <span>NO EXISTEN REGISTROS</span>

                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cinsufren" style="display:none;">
                    <!--CONTROL DE insuficiencia renal-->
                    {{--  titulo  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue text-center mt-1 mb-0">Control de insuficiencia renal</h5>
                        </div>
                    </div>
                    <hr>

                    {{--  fromulario  --}}
                    <div class="row bg-light mb-4 pt-4">
                        <div class="col-md-12">

                            <div class="form-row">
                                <div class="form-group col-sm-2 col-md-2">
                                    <label class="floating-label-activo-sm">Peso</label>
                                    <input type="text" class="form-control form-control-sm" name="registro_peso" id="registro_peso">
                                </div>
                                <div class="form-group col-sm-4 col-md-4">
                                    <button type="button" onclick="registrar_control_insuficiencia_renal();"
									class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--  tabla de control  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-c-blue mt-2 mb-0">Controles previos de obesidad</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="control_obesidad"
                                class="display table table-striped table-hover dt-responsive nowrap pb-4 table-sm"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Control</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <!-- <th class="text-center align-middle">Acción</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($contro))
                                        @foreach ($contro as $cp)
                                            <tr>
                                                <td class="text-center align-middle">{{ $cp->id }}</td>
                                                <!--<td class="text-center align-middle">
                                                    <button href="#!" class="btn btn-danger btn-sm">
                                                        <i class="feather icon-x"></i> Eliminar</button>
                                                </td>-->
                                            </tr>

                                        @endforeach
                                    @else
                                        <span>NO EXISTEN REGISTROS</span>

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{--  <div class="cmtumorales" style="display:none;">

                </div>  --}}

                {{--  <div class="creumato" style="display:none;">

                </div>  --}}

                {{--  <div class="clitemia" style="display:none;">

                </div>  --}}


            </div>
            <!--Cierre modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- CIERRE MODAL CRONICO -->

<script>

    $(document).ready(function () {
        /** cronico */
            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

            /** autocomplete de medicamentos patologia */
            $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            /** accion check confidencial */
            $('#confidencial').change(function() {
                if ($('#confidencial').is(':checked')) {
                    $('#confidencial_descripcion').show();
                } else {
                    $('#confidencial_descripcion').hide();
                }
            });

            /** accion check ges */
            $('#modal_ges').change(function() {
                if ($('#modal_ges').is(':checked')) {
                    $('#form_ges').modal('show');
                } else {
                    $('#form_ges').modal('hide');
                }
            });

            /** busqueda de diagnostico GES */
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
                    return false;
                }
            });
    });

    /** CRONICO */
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

    function getCantCompCronica(div_dosis, div_comp) {

        var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
        console.log(cant_comp);

        let url = "{{ route('presentacion.getCantComp') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {

                    cant_comp: cant_comp,

                },
            })
            .done(function(data) {
                console.log(data)

                if (data != null) {

                    data = JSON.parse(data);
                    console.log(data)
                    let select_cant_comp = $('#'+div_comp);

                    select_cant_comp.find('option').remove();
                    select_cant_comp.append('<option value="0">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                    })
                    select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                } else {



                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function es_cronico() {
        if ($('#enf_cronico').prop('checked')) {
            $('#form_enfermedad_cronica').modal('show');
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#cronicos').val('n_C');
            ver_medicamento_cronico();
            $('.medicamento_cronico_div').show();
            $('#senal_med_cronico').removeClass('fa-angle-down');
            $('#senal_med_cronico').addClass('fa-angle-up');

            cambiar_enfermedad_cronica();

        }

    }

    function cambiar_enfermedad_cronica() {

        if($('#cronicos').val() != 'n_C')
        {
            var nombre_enfermedad = $("#cronicos option:selected").text();
            $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
            $('.medicamento_patologia').show();
            $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
            ver_medicamento_cronico_patologia();

            $('.medicamento_cronico_div').hide();
            $('#senal_med_cronico').addClass('fa-angle-down');
            $('#senal_med_cronico').removeClass('fa-angle-up');

            switch ($('#cronicos').val()) {
                case 'cpeso':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').show();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'chipertension':
                    $('#hipertension_div').show();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                    // ver_control_hipertension();

                break;
                case 'cdiabet':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').show();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;

                case 'cinsufren':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').show();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'cmtumorales':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').show();
                    $('#creumato').hide();
                    $('#clitemia').hide();
                break;
                case 'creumato':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').show();
                    $('#clitemia').hide();
                break;
                case 'clitemia':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();
                    $('#cinsufren').hide();
                    $('#cmtumorales').hide();
                    $('#creumato').hide();
                    $('#clitemia').show();
                break;

                default:
                    break;
            }
        }
        else
        {
            $('.medicamento_patologia').hide();
            $('#hipertension_div').hide();
            $('#control_peso_div').hide();
            $('#diabetes_div').hide();

            $('#titulo_med_patologia').html( 'Medicamentos' );
        }
    }

    function registrar_control_obesidad() {

        let peso = $('#registro_peso').val();
        let variacion = $('#registro_peso_variacion').val();
        let ideal = $('#registro_peso_ideal').val();
        let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
        let hora_medica = $('#hora_medica').val();
        var validar = 0;
        var mensaje ='';

        if( peso == '' )
        {
            $('#registro_peso').focus();
            mensaje += 'Debe ingresar el Peso del Control Actual.\n';
            validar = 1;
        }
        if( variacion == '' )
        {
            $('#registro_peso_variacion').focus();
            mensaje += 'Debe ingresar la Variación.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#registro_peso_ideal').focus();
            mensaje += 'Debe ingresar el Peso Ideal.\n';
            validar = 1;
        }

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
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    variacion: variacion,
                    ideal: ideal,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    {{--  location.reload();  --}}
                    $('#registro_peso').val('');
                    $('#registro_peso_variacion').val('');
                    $('#registro_peso_ideal').val('');
                    ver_control_obesidad();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_hipertension() {

        let sistolica = $('#presion_sistolica_hipertension').val();
        let diastolica = $('#presion_diastolica_hipertension').val();
        let ideal = $('#ideal_hipertension').val();
        let url = "{{ route('ficha_medica.registrar_hipertension') }}";
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        var validar = 0;
        var mensaje ='';

        if( sistolica == '' )
        {
            $('#presion_sistolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( diastolica == '' )
        {
            $('#presion_diastolica_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Diastólica.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#ideal_hipertension').focus();
            mensaje += 'Debe ingresar el Presión Ideal.\n';
            validar = 1;
        }

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
                url: url,
                type: 'GET',
                data: {
                    sistolica: sistolica,
                    diastolica: diastolica,
                    ideal: ideal,
                    hora_medica: hora_medica,
                    id_lugar_atencion: id_lugar_atencion
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                    $('#mensaje').show();
                    {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                    $('#presion_sistolica_hipertension').val('');
                    $('#presion_diastolica_hipertension').val('');
                    $('#ideal_hipertension').val('');
                    ver_control_hipertension();

                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
        }
    };

    function registrar_diabetes() {

        let peso = $('#peso_diabetes').val();
        let pies = $('#pies_diabetes').val();
        let hgac1 = $('#hga1c_diabetes').val();
        let colesterol = $('#colesterol_diabetes').val();
        let creatina = $('#creatina_diabetes').val();
        let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
        let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
        let url = "{{ route('ficha_medica.registrar_diabetes') }}";
        let hora_medica = $('#hora_medica').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    peso: peso,
                    pies: pies,
                    hgac1: hgac1,
                    colesterol: colesterol,
                    creatina: creatina,
                    glicosilada_postprandial: glicosilada_postprandial,
                    glicosinada_ayuno: glicosinada_ayuno,
                    hora_medica: hora_medica
                },
            })
            .done(function(response) {

                if (response != '') {
                    console.log(response);
                    //$('#form_control_obesidad').trigger("reset");
                    $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                    $('#mensaje').show();
                    $('#form_enfermedad_cronica').modal('hide');
                    location.reload();
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    };

    function agregar_medicamento_cronico()
    {

        let url = "{{ route('medicamento_cronico.registrar') }}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var nombre_medicamento = $('#nombre_medicamentocron').val();
        var id_medicamento = $('#id_medicamentocron').val();
        var cantidad = $('#med_cronicomes option:selected').text()
        var tipo_enfermedad = 'cronico';

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                id_medicamento:id_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
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
                        title: "Medicamento Cronico.",
                        text: "Medicamento Registrado con exito.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    $('#nombre_medicamentocron').val('');

                    $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                    $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                    ver_medicamento_cronico();


                }
                else{

                    swal({
                        title: "Problema al Registrar Medicamento Cronico.",
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

    function ver_medicamento_cronico()
    {

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";


        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                tipo_enfermedad:'cronico'
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
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                html += '        <th class="text-center align-middle">Acción</th>';
                html += '        <th class="text-center align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#tabla_medicamento_cronico').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
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
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico();
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al Eliminar Registro de Medicamento Cronico.",
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

    {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
    function agregar_medicamento_cronico_patologia(tipo)
    {

        let url = "{{ route('medicamento_cronico.registrar') }}";


        var _token = CSRF_TOKEN;
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
        var cantidad = $('#med_cronicomes_patologia option:selected').text();
        var tipo_enfermedad = tipo;

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_profesional:id_profesional,
                id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                nombre_medicamento:nombre_medicamento,
                cantidad:cantidad,
                tipo_enfermedad:tipo_enfermedad,
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
                        title: "Medicamento Cronico.",
                        text: "Medicamento Registrado con exito.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    $('#nombre_medicamentocron_patologia').val('');
                    $('#id_medicamentocron_patologia').val('');

                    $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                    $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                    ver_medicamento_cronico_patologia()
                }
                else{

                    swal({
                        title: "Problema al Registrar Medicamento Cronico.",
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

    function ver_medicamento_cronico_patologia()
    {

        let url = "{{ route('medicamento_cronico.getRegsitros') }}";


        var _token = CSRF_TOKEN;
        var id_ficha_atencion = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var tipo_enfermedad = $('#cronicos').val();
        $('#tabla_med_patologia').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                // id_ficha_atencion:id_ficha_atencion,
                id_paciente:id_paciente,
                tipo_enfermedad:tipo_enfermedad
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
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                html += '        <th class="text-center align-middle">Acción</th>';
                html += '        <th class="text-center align-middle">Check</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr>';
                        html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                        html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                        html += '    </td>';
                        html += '    <td class="text-center align-middle">';
                        html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                        html += '    </td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#tabla_med_patologia').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function eliminar_med_cronico_patologia(id)
    {
        let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


        var _token = CSRF_TOKEN;
        var id =id;
        var tipo_enfermedad = $('#cronicos').val();

        $.ajax({

            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id
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
                        title: "Medicamento Cronico.",
                        text: "Medicamento Eliminado.",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    ver_medicamento_cronico_patologia(tipo_enfermedad);
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            }
            else{

                swal({
                    title: "Problema al Eliminar Registro de Medicamento Cronico.",
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


    {{--  mostrar div   --}}
    function mostrar_div(div)
    {
        if ($('.'+div).is(':visible')) {
            $('.'+div).hide();
            $('#senal_med_cronico').addClass('fa-angle-down');
            $('#senal_med_cronico').removeClass('fa-angle-up');
        } else {
            $('.'+div).show();
            $('#senal_med_cronico').removeClass('fa-angle-down');
            $('#senal_med_cronico').addClass('fa-angle-up');
        }
    }


    {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
    function ver_control_hipertension()
    {

        let url = "{{ route('hipertension.getHipertension') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_hipertension').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '         <th class="text-center align-middle">Nº Control</th>';
                html += '         <th class="text-center align-middle">Fecha</th>';
                html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                html += '         <th class="text-center align-middle">Presión Ideal</th>';
                html += '    </tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_hipertension').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
    function ver_control_obesidad()
    {

        let url = "{{ route('control_obesidad.getControlObesidad') }}";


        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#control_obesidad').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_control_hipertension-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                html += '<thead>';
                html += '    <tr>';
                html += '    <th class="text-center align-middle">Nº Control</th>';
                html += '    <th class="text-center align-middle">Fecha</th>';
                html += '    <th class="text-center align-middle">Peso</th>';
                html += '    <th class="text-center align-middle">Variación</th>';
                html += '    <th class="text-center align-middle">Peso Ideal</th>';
                html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody>';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+value.id+'</td>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                        html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                        html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                        html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                    html += '</tr>';

                }
                html += '</tbody>';
                $('#control_obesidad').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
    /** FIN CRONICO */
</script>

