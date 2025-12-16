
{{--  @if(isset($fade))
    <div class="tab-pane fade-in" id="pills-atencion-previas" role="tabpanel" aria-labelledby="pills-atencion-previas-tab">
@else
    <div class="tab-pane fade" id="pills-atencion-previas" role="tabpanel" aria-labelledby="pills-atencion-previas-tab">
@endif  --}}

<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-sm-12 col-md-12">
                @if(isset($titulo) && $titulo == 'NO')
                {{--  nada  --}}
                @else
                <div class="row">
                    <div class="col-md-12 mb-0 pt-3">
                        <h6 class="f-16 text-c-blue">Historial de Atenciones</h6>
                        <hr>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 pb-4">
                        <table id="table_atenciones_profesional" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Diagnóstico</th>
                                    <th class="text-center align-middle">Recetas</th>
                                    <th class="text-center align-middle">Exámenes</th>
                                    <th class="text-center align-middle">Archivos </th>
                                    <th class="text-center align-middle">Ficha</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (isset($fichas) && $fichas->count() > 0)
                                    @foreach ($fichas as $f)
                                        <tr>

                                            <td class="text-center align-middle">
                                                {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                            </td>

                                            <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                            <td class="text-center align-middle">
                                                <!--<button type="button" class="badge badge-info btn-link"  data-toggle="tooltip" data-placement="top" title="ver Receta"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="#">Ver</i></button>-->
                                                <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>


                                            </td>

                                            <td class="text-center align-middle">
												<!-- <button type="button" class="btn btn-danger btn-sm btn-icon"  data-toggle="tooltip" data-placement="top" title="ver examenes" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-edit"></i></button>-->
												<a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                            </td>

                                            <td class="text-center align-middle">
												<!--<button type="button" class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="ver archivos" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif> <i class="feather icon-edit"></i> </button>-->
												<a class="badge badge-light-purple" @if (isset($f->id)) onclick="buscar_archivos({{ $f->id }});" @endif><i class="feather icon-folder"></i> Ver</a>

                                            </td>

                                            <form action="route()"></form>
                                            <td class="text-center align-middle">
                                                {{--  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_consultaant">  --}}
                                                <!--<button type="button" style="border-radius: 15px;" class="btn btn-info btn-sm"  @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</button>-->
												<a class="badge badge-light-info" @if (isset($f->id)) onclick="buscar_ficha_atencion({{ $f->id }});" @endif><i class="feather icon-file-text"></i> Ver</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <span>
                                        <h5>no existen registros</h5>
                                    </span>
                                @endif

                            </tbody>
                        </table>

                        <div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="m_consultaantLabel" style="font-size: 1.3rem; color: #3366CC;" onclick="$('#m_consultaant').modal('hide'); ">Datos de Consulta de: </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class=" form-group row">
                                                <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                                                    Datos Generales
                                                </h5>

                                                <div class="row col-md-12">
                                                    <div class="row col-md-5">
                                                        <label for="ExFísico">
                                                            <h5><b>Motivo de Consulta: </b></h5>
                                                        </label>
                                                    </div>
                                                    <div class="row col-md-7">
                                                        <span>
                                                            <h6 id="label_motivo"></h6>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="row col-md-5">
                                                        <label for="ExFísico">
                                                            <h5><b>Examen Físico: </b></h5>
                                                        </label>
                                                    </div>
                                                    <div class="row col-md-7">
                                                        <span>
                                                            <h6 id="label_examen_fisico"></h6>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="row col-md-5">
                                                        <label for="ExFísico">
                                                            <h5><b>Antecedentes de Consulta: </b></h5>
                                                        </label>
                                                    </div>
                                                    <div class="row col-md-7">
                                                        <span>
                                                            <h6 id="label_antecedentes"></h6>
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="row col-md-5">
                                                        <label for="ExFísico">
                                                            <h5><b>Diagnostico de Consulta: </b></h5>
                                                        </label>
                                                    </div>
                                                    <div class="row col-md-7">
                                                        <span>
                                                            <h6 id="label_diagnostico"></h6>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class=" form-group row">

                                            </div>

                                        </div>
                                        {{-- <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="MotConsulta">Motivo
                                                            de Consulta</label>
                                                        <!--fin autollenado-->
                                                        <input id="MotConsulta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                        {{-- <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="AntConsulta">Antecedentes</label>
                                                        <!--fin autollenado-->
                                                        <input id="AntConsulta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                        {{-- <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="ExFísico">Examen
                                                            Físico</label>
                                                        <!--fin autollenado-->
                                                        <input id="ExFísico" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                        {{-- <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Dignóstico">Dignóstico</label>
                                                        <!--fin autollenado-->
                                                        <input id="Dignóstico" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                        {{-- <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Receta">Receta</label>
                                                        <!--fin autollenado-->
                                                        <input id="Receta" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="form-group fill">
                                                        <label class="floating-label" for="Examenes">Examenes</label>
                                                        <!--fin autollenado-->
                                                        <input id="Examenes" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </form> --}}
                                        <!--fin autollenado-->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_consultaant').modal('hide'); ">Cerrar</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="m_cons_exLabel"
                                            style="font-size: 1.3rem; color: #3366CC;">Examenes Solicitados
                                            el.... </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="tabla-1"
                                                class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Urgencia</th>
                                                        <th class="text-center align-middle">Nombre</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">Sangre</td>
                                                        <td class="text-center align-middle">Normal</td>
                                                        <td class="text-center align-middle">Hemograma y vhs
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">
                                                            Otorrinolaríngologico</td>
                                                        <td class="text-center align-middle">Normal</td>
                                                        <td class="text-center align-middle">Rinomanometría
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">27/07/2021</td>
                                                        <td class="text-center align-middle">Sangre</td>
                                                        <td class="text-center align-middle">Urgente</td>
                                                        <td class="text-center align-middle">Grupo Sanguíneo
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- recetas --}}
                        <div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="id_ficha_receta"
                                            style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_receta').modal('hide'); ">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="tabla_atenciones_previas_receta" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Medicamento</th>
                                                        <th class="text-center align-middle">Presentacion</th>
                                                        <th class="text-center align-middle">Posología</th>
                                                        <th class="text-center align-middle">Vía</th>
                                                        <th class="text-center align-middle">Periodo</th>
                                                        <th class="text-center align-middle">Uso Crónico</th>
                                                        <th class="text-center align-middle">Cantidad</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_receta').modal('hide'); ">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- examenes --}}
                        <div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="m_cons_examenLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="id_ficha_examen" style="font-size: 1.3rem; color: #3366CC;"> </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_examen').modal('hide'); ">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <table id="table_atecion_previa_tabla_examen_paciente" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Nombre</th>
                                                        <th class="text-center align-middle">Prioridad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </form>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_examen').modal('hide'); ">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- archivos --}}
                        <div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-white" id="m_cons_archivosLabel">Documentos de esta consulta del Paciente:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_archivos').modal('hide');" >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="table_atenciones_previas_archivos"class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Tipo</th>
                                                    <th class="text-center align-middle">Ver</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <!--fin autollenado-->
                                        <div class="modal-footer">
                                            <button type="button mt-5" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_archivos').modal('hide');">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
