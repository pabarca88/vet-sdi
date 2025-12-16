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

                <div class="form-group row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Controles de enfermedades crónicas</label>
                            <select class="form-control form-control-sm" onchange="cambiar_enfermedad_cronica();"
                                id="cronicos" name="cronicos" onchange="mostrar(this.value);">
                                <option value="n_C">Seleccione una opción</option>
                                <!--<option value="nc">NO CRÓNICO</option>-->
                                <option value="cpeso">OBESIDAD</option>
                                <option value="chipertension">HIPERTENSIÓN ARTERIAL</option>
                                <option value="cdiabet">DIABETES</option>
                                <!--<option value="cinsufren">INSUFICIENCIA RENAL</option>
                                <option value="cmtumorales">MARCADORES TUMORALES</option>
                                <option value="creumato">REUMATOLOGÍA</option>
                                <option value="clitemia">LITEMIA</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <label class="floating-label-activo-sm">Fecha</label>
                        <input type="date" class="form-control form-control-sm" name="fecha_control" id="fecha_control">
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
                                    <input type="text" class="form-control form-control-sm" name="registro_peso"
                                        id="registro_peso">
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
                                    <button onclick="registrar_control_obesidad_dental();"
                                        class="btn btn-success btn-sm float-right"><i
                                            class="feather icon-plus"></i>Guardar Control</button>
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
                            <form>

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
                                        <button onclick="registrar_hipertension();"
                                            class="btn btn-success btn-sm float-right"><i
                                                class="feather icon-plus"></i>Guardar Control</button>
                                    </div>
                                </div>
                            </form>
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
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($hipertension))
                                        @foreach ($hipertension as $h)
                                            <tr>
                                                <td class="text-center align-middle">{{ $h->id }}</td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($h->created_at)->format('d-m-Y') }}
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
            </div>
            <!--Cierre modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
