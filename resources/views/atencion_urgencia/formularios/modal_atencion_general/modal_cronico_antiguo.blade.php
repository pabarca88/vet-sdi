<!--******* Modal: ¿Enfermo crónico? *******-->
<div id="form_enfermedad_cronica_ant" class="modal fade" tabindex="-1" role="dialog"
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
                                    <button onclick="registrar_control_obesidad();"
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
                                        <button onclick="registrar_hipertension();" class="btn btn-success btn-sm float-right"><i class="feather icon-plus"></i>Guardar Control</button>
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
                            <form>

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
                                        <button onclick="registrar_diabetes();"
                                            class="btn btn-success btn-sm float-right"><i
                                                class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                            </form>
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
                                    <button onclick="registrar_control_insuficiencia_renal();"
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
<script>
    function modal(){
        $('#form_enfermedad_cronica_ant').modal('show');
    }
</script>
