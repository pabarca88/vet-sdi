<div id="ingreso_m_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_m_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Solicitud de hospitalización - <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                            "Octubre", "Noviembre", "Diciembre");

                        var f = new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarihosp();"><span aria-hidden="true">×</span></button>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_hospitalizacion-tab" data-toggle="tab"
                                        href="#info_hospitalizacion" role="tab" aria-controls="info_hospitalizacion"
                                        aria-selected="true">Info. Hospitalización</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-hosp-tab"
                                        data-toggle="tab" href="#info-ingreso-hosp" role="tab"
                                        aria-controls="info-ingreso-hosp" aria-selected="true">Info. Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-hosp-tab" data-toggle="tab"
                                        href="#indicaciones-hosp" role="tab" aria-controls="indicaciones-hosp"
                                        aria-selected="false" onclick="dame_examenes_hosp()">Indicaciones ingreso</a>
                                </li>
                                {{--  <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="archivos-hosp-pab-tab" data-toggle="tab"
                                        href="#archivos-hosp-pab" role="tab" aria-controls="archivos-hosp-pab"
                                        aria-selected="false">Archivos</a>
                                </li>  --}}

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!--INFO HOSPITALIZACIÓN-->
                                <div class="tab-pane fade show" id="info_hospitalizacion" role="tabpanel"
                                    aria-labelledby="info_hospitalizacion-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Detalle hospitalización</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Hospitalizar en:</label>
                                                                <select name="hospen" id="hospen" data-titulo="Hospitalización"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);">
                                                                    <option value="1" selected>Clínica</option>
                                                                    <option value="2">Hospital</option>
                                                                    <option value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_hospen" style="display:none">
                                                                <label class="floating-label-activo-sm">Otro lugar (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"
                                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen" id="obs_hospen"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Nombre de la
                                                                    Institución</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                                    onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Servicio</label>
                                                                <select name="hosp_enserv" id="hosp_enserv"
                                                                    data-titulo="Es Urgencia Qx.?"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                                                    <option value="1" selected>Servicio Urgencia</option>
                                                                    <option value="2">Sala</option>
                                                                    <option value="3">UTI</option>
                                                                    <option value="4">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_detalle_hosp_enserv" style="display:none">
                                                                <label class="floating-label-activo-sm">Otro Servicio
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1"
                                                                    onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Motivo</label>
                                                                <select name="motivo_hosp" id="motivo_hosp"
                                                                    data-titulo="Otro Tratamiento"
                                                                    data-input_igual="motivo_hosp_indicaciones"
                                                                    class="form-control form-control-sm"
                                                                    onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);" onblur="cargarIgualSelect('motivo_hosp')">
                                                                    <option value="0">Seleccione</option>
                                                                    <option value="1">Cirugía</option>
                                                                    <option value="2">Tratamiento Médico</option>
                                                                    <option value="3">Estudio Clínico</option>
                                                                    <option value="4">Observación</option>
                                                                    <option value="5">Otro</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_motivo_hosp" style="display:none">
                                                                <label class="floating-label-activo-sm">Otro tratamiento
                                                                    (Describir)</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"
                                                                    onfocus="this.rows=3" onblur="this.rows=1;" data-input_igual="motivo_hosp_indicaciones" name="obs_motivo_hosp" id="obs_motivo_hosp" onchange="cargarIgual('obs_motivo_hosp')"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Obs. a la
                                                                    Hospitalización</label>
                                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"
                                                                    onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO. INGRESO-->
                                <div class="tab-pane fade show active" id="info-ingreso-hosp" role="tabpanel"
                                    aria-labelledby="info-ingreso-hosp-tab">
                                     <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Información paciente</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-4 mb-0">
                                                            <label class="font-weight-bold ml-0"><strong>Nombre: </strong></label>
                                                            <label class="ml-0">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-3 col-xl-2 mb-0">
                                                            <label class="font-weight-bold ml-0"><strong>Edad: </strong></label>
                                                            <label class="ml-0">{{ \Carbon\Carbon::createFromDate($paciente->fecha_nac)->age; }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-0">
                                                            <label class="font-weight-bold ml-0"><strong>Previsión: </strong></label>
                                                            <label class="ml-0">{{ $paciente->Prevision->first()->nombre }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-2 mb-0">
                                                            <label class="font-weight-bold ml-0"><strong>Teléfono: </strong></label>
                                                            <label class="ml-0">{{ $paciente->telefono_uno }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-0">
                                                            <label class="font-weight-bold ml-0"><strong>Email: </strong></label>
                                                            <label class="ml-0">{{ $paciente->email }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-0">
                                                            <label class="font-weight-bold ml-0 text-danger">Enfermedades Crónicas:</label>
                                                            <label class="ml-0">
                                                            @php
                                                                $patalogias_cronicas = '';
                                                            @endphp
                                                            @foreach ($patoligias_cronicas as $patologia_cronica)
                                                                @php
                                                                    $temp = json_decode($patologia_cronica->data);
                                                                    echo $temp->nombre;
                                                                    $patalogias_cronicas .= $temp->nombre;
                                                                @endphp
                                                                @if ($patologia_cronica->comentario)
                                                                    ,{{ $patologia_cronica->comentario }}
                                                                    @php
                                                                        $patalogias_cronicas .= ', ' . $patologia_cronica->comentario;
                                                                    @endphp
                                                                @endif
                                                                ;
                                                                @php
                                                                    $patalogias_cronicas .= ';';
                                                                @endphp
                                                            @endforeach
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 mb-0">
                                                            <label class="floating-label-activo-sm">Otros antecedentes médicos</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="ingreso_sol_pab_modal_otros_antecedentes"
                                                                id="ingreso_sol_pab_modal_otros_antecedentes" value="">
                                                            <input type="hidden" name="ingreso_sol_pab_modal_patalogias_cronicas"
                                                                id="ingreso_sol_pab_modal_patalogias_cronicas"
                                                                value="{{ $patalogias_cronicas }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Médico tratante</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <label class="font-weight-bold ml-0">Nombre:</label>
                                                            <label
                                                                class="ml-0">{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</label>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <label class="font-weight-bold ml-0">Especialidad:</label>
                                                            <label class="ml-0">
                                                                @if ($profesional->SubTipoEspecialidad()->first())
                                                                    {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
                                                                @else
                                                                    {{ $profesional->TipoEspecialidad()->first()->nombre }}
                                                                @endif
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                                            <input type="text" class="form-control form-control-sm" id="hosp_en"
                                                                name="hosp_en" value="{{ $lugar_atencion->nombre }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <label class="floating-label-activo-sm">Diagnósticos </label>
                                                            <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=8"
                                                                onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso" value=""> </textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Servicio</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    name="serv_hosp" id="serv_hosp" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="esp-3">
                                                                    <label class="custom-control-label" for="esp-3">¿Preparar para
                                                                        Cirugía?</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INDICACIONES INGRESO-->
                                <div class="tab-pane fade show" id="indicaciones-hosp" role="tabpanel"  aria-labelledby="indicaciones-hosp-tab">
                                    <div id="evol_med_urgencia" class="open" aria-labelledby="med_urgen"   data-parent="#med_urgen">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <h6 class="t-aten">Indicaciones de ingreso</h6>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body">
                                                         <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <ul class="nav nav-tabs-aten nav-fill mb-3" id="ingreso-hosp" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset active" id="ingreso-examenes-tab" data-toggle="tab"
                                                                            href="#ingreso-examenes" role="tab" aria-controls="ingreso-examenes"
                                                                            aria-selected="true">Exámenes</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="medicamentos-ingreso-hosp-tab"
                                                                            data-toggle="tab" href="#medicamentos-ingreso-hosp" role="tab"
                                                                            aria-controls="medicamentos-ingreso-hosp" aria-selected="true">Medicamentos</a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link-aten text-reset" id="ctrl-enfermeria-tab"
                                                                            data-toggle="tab" href="#ctrl-enfermeria" role="tab"
                                                                            aria-controls="ctrl-enfermeria" aria-selected="true">Control enfermería</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                <div class="tab-content" id="ingreso-hosp">
                                                                    <!--EXAMENES-->
                                                                    <div class="tab-pane fade show active" id="ingreso-examenes" role="tabpanel"
                                                                        aria-labelledby="ingreso-examenes-tab">
                                                                        <div class="form-row">
                                                                        <div class="col-md-12 d-none">
                                                                            <div class="form-group">
                                                                                <label for="" class="floating-label-activo-sm">Motivo</label>
                                                                                <input type="text" name="motivo_hosp_indicaciones" id="motivo_hosp_indicaciones" class="form-control form-control-sm" value="Cirugía">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <button type="button" class="btn btn-info
                                                                             btn-sm float-right mb-2" onclick="mostrar_nuevo_examen(1000)"><i class="fas fa-plus"></i> Nuevo examen</button>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <div id="contenedor_examenes_hosp" class="d-none">
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Tipo Examen</label>
                                                                                            <select class="form-control form-control-sm" name="tipo_examen_hosp" id="tipo_examen_hosp">
                                                                                                <option value="0">Seleccione</option>
                                                                                                @foreach ($examenMedico as $exa)
                                                                                                    <option value="{{ $exa->cod_examen }}">
                                                                                                        {{ $exa->nombre_examen }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                                                                                            <select class="form-control form-control-sm" name="sub_tipo_examen_hosp" id="sub_tipo_examen_hosp">
                                                                                                <option value="">Seleccione</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Examen</label>
                                                                                            <select class="form-control form-control-sm" name="examen_hosp" id="examen_hosp">
                                                                                                <option value="">Seleccione</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group fill">
                                                                                            <label class="floating-label-activo-sm">Prioridad</label>
                                                                                            <select class="form-control form-control-sm" id="prioridad_hosp" name="prioridad_hosp">
                                                                                                <option value="0">Seleccione</option>
                                                                                                <option value="1">Baja</option>
                                                                                                <option value="2" selected>Media</option>
                                                                                                <option value="3">Alta</option>
                                                                                                <option value="4">Urgente</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-12 text-center mb-3">
                                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="$('#contenedor_examenes_hosp').addClass('d-none')"><i class="feather icon-x"></i> Ocultar</button>
                                                                                        <button type="button" onclick="indicar_examen_ficha();" id="agregar_examen_tabla" class="btn btn-info btn-sm">
                                                                                            <i class="feather icon-plus"></i>
                                                                                            Añadir Examen
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                                                            <!--Tabla-->
                                                                            <div class="table-responsive">
                                                                                <table id="tabla_examen_ficha_hosp" class="table table-bordered table-xs">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="align-middle">Nombre
                                                                                                Examen</th>
                                                                                            <th class="align-middle">Tipo</th>
                                                                                            <th class="align-middle">Sub-Tipo</th>

                                                                                            <th class="align-middle">Prioridad
                                                                                            </th>
                                                                                            <th class="align-middle">Acción
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--MEDICAMENTOS-->
                                                                    <div class="tab-pane fade show" id="medicamentos-ingreso-hosp" role="tabpanel"
                                                                        aria-labelledby="medicamentos-ingreso-hosp-tab">
                                                                       <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <button type="button" class="btn btn-info btn-sm float-right mb-2" onclick="mostrar_nuevo_medicamento(1000)"><i class="feather icon-plus"></i> Nuevo medicamento</button>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="contenedor_nuevo_medicamento">

                                                                            </div>

                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <table class="table table-bordered table-xs" id="tabla_medicamentos">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Nombre</th>
                                                                                            <th>Dosis</th>
                                                                                            <th>Frecuencia</th>
                                                                                            <th>Acción</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <!-- Aquí se insertarán los medicamentos -->
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--CONTROL ENFERMERIA-->
                                                                    <div class="tab-pane fade show" id="ctrl-enfermeria" role="tabpanel" aria-labelledby="ctrl-enfermeria-tab">
                                                                        <div class="form-row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label class="floating-label-activo-sm">Control enfermería</label>
                                                                                    <select name="control_enfermeria_hosp" id="control_enfermeria_hosp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('control_enfermeria_hosp','div_control_enfermeria_hosp','obs_control_enfermeria',4);">
                                                                                        <option value="0">Seleccione</option>
                                                                                        <option value="1">Cada media hora</option>
                                                                                        <option value="2">Cada 1 hora</option>
                                                                                        <option value="3">Cada 6 hora</option>
                                                                                        <option value="4">Otro</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div id="div_control_enfermeria_hosp" style="display: none">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label for="otras_ind_hosp" class="floating-label-activo-sm">Otras indicaciones</label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otras_ind_hosp" id="otras_ind_hosp"></textarea>
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
                                    </div>
                                </div>
                                <!--ARCHIVO-->
                                <div class="tab-pane fade show" id="archivos-hosp-pab" role="tabpanel"
                                    aria-labelledby="archivos-hosp-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <div class="card-informacion">
                                                    <div class="card-body">
                                                        <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                                        <div class="dropzone dz-clickable" id="" action="">
                                                            <div class="dropzone" id="misArchivosHosp" action="{{ route('profesional.archivo.carga') }}"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#ingreso_m_modal').modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_hospitalizacion()"><i class="feather icon-save"></i> Guardar y enviar</button>
                <button type="button" class="btn btn-primary" onclick="generar_pdf_hospitalizacion()"><i class="feather icon-file"></i> Ver formulario (PDF)</button>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {
    Dropzone.autoDiscover = false;

    var myDropzone_hosp = new Dropzone("#misArchivosHosp", {
        url: "{{ route('profesional.archivo.carga') }}",
        method: 'post',
        createImageThumbnails: true,
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN,
        },
        acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
        maxFilesize: 4,
        maxFiles: 4,
        dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
        dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
        dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
        dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
        dictInvalidFileType: "No puedes subir archivos de este tipo.",
        dictCancelUpload: "Cancelar carga",
        dictUploadCanceled: "Subida cancelada.",
        dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
        dictRemoveFile: "Eliminar archivo",
        dictMaxFilesExceeded: "No puede cargar más archivos.",
        init: function() {
            myDropzone_hosp = this;
        },
        success: function(file, response) {
            cargar_lista_archivo_ges(myDropzone_hosp, 'ges');
            if (file.previewElement) {
                return file.previewElement.classList.add("dz-success");
            }
        },
        error: function(file, message) {
            if (file.previewElement) {
                file.previewElement.classList.add("dz-error");
                if (typeof message !== "string" && message.error) {
                    message = message.error;
                } else if (typeof message === "object" && message.message) {
                    message = message.message;
                }
                for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                    node.textContent = message;
                }
            }
        },
        removedfile: function(file) {
            cargar_lista_archivo_ges(myDropzone_hosp, 'ges');
            if (file.previewElement != null && file.previewElement.parentNode != null) {
                file.previewElement.parentNode.removeChild(file.previewElement);
            }
            return this._updateMaxFilesReachedClass();
        },
        canceled: function(file) {
            cargar_lista_archivo_ges(myDropzone_hosp, 'ges');
            return this.emit("error", file, this.options.dictUploadCanceled);
        }
    });
});
    $(document).ready(function(){
        mostrar_nuevo_examen(1000);
        mostrar_nuevo_medicamento(1000);
        $('#tabla_examen_ficha_hosp').DataTable({searching: false, paging: false, info: false});
        $('#tabla_medicamentos').DataTable({searching: false, paging: false, info: false});
    });



    function cargarIgualSelect(input) {
        console.log(input);
        let actual = $('#' + input);
        let textoSeleccionado = actual.find('option:selected').text(); // Aquí capturas el texto
        let equivalentes = actual.attr('data-input_igual').split(',');

        $.each(equivalentes, function(index, value) {
            var equivalente = $('#' + value);
            equivalente.val(textoSeleccionado);
        });
    }


    /*CERRAR MODAL*/

    function cerrarihosp() {
        $('#ingreso_m_modal').modal ('hide');
      }

    /* Definimos una variable global para los IDs */
    var idCounter = 2;

    function ingresohosp(seccion) {

        console.log($('#in_hosp_nom_inst' + seccion).val());

        if ($('#in_hosp_hospen' + seccion).length > 0)
            $('#hospen').val($('#in_hosp_hospen' + seccion).val());

        if ($('#in_hosp_obs_hospen' + seccion).length > 0)
            $('#obs_hospen').val($('#in_hosp_obs_hospen' + seccion).val());

        if ($('#in_hosp_nom_inst' + seccion).length > 0)
            $('#nom_inst').val($('#in_hosp_nom_inst' + seccion).val());

        if ($('#in_hosp_hosp_enserv' + seccion).length > 0)
            $('#hosp_enserv').val($('#in_hosp_hosp_enserv' + seccion).val());

        if ($('#in_hosp_obs_hosp_enserv' + seccion).length > 0)
            $('#obs_hosp_enserv').val($('#in_hosp_obs_hosp_enserv' + seccion).val());

        if ($('#in_hosp_motivo_hosp' + seccion).length > 0)
            $('#motivo_hosp').val($('#in_hosp_motivo_hosp' + seccion).val());

        if ($('#in_hosp_obs_motivo_hosp' + seccion).length > 0)
            $('#obs_motivo_hosp').val($('#in_hosp_obs_motivo_hosp' + seccion).val());

        if ($('#in_hosp_obs_hospitalizar' + seccion).length > 0)
            $('#obs_hospitalizar').val($('#in_hosp_obs_hospitalizar' + seccion).val());


        evaluar_para_carga_detalle('hospen', 'div_detalle_hospen', 'obs_hospen', 3);
        evaluar_para_carga_detalle('hosp_enserv', 'div_detalle_hosp_enserv', 'obs_hosp_enserv', 4);
        evaluar_para_carga_detalle('motivo_hosp', 'div_motivo_hosp', 'obs_motivo_hosp', 5);

        $('#ingreso_m_modal').modal('show');

    }

    function indicar_procedimiento_sdi() {
        var ind_med = $('#ind_med').val();
        var ind_cur = $('#ind_cur').val();
        var ind_proc = $('#ind_proc').val();
        var ind_inmmed = $('#ind_inmmed').val();
        var ind_cc = $('#ind_cv_inmmed_urg').val();
        var ind_pp = $('#ind_pp').val();
        var ind_vig_sig = $('#ind_vig_sig').val();

        var obs_ind_med = $('#obs_ind_med_servicio').val();
        var obs_detalle_ind_med = $('#obs_detalle_ind_med').val();

        var params = new URLSearchParams(location.search);
        var id_paciente = $('#id_paciente').val();

        var valido = 0;
        var mensaje = '';

        // if ($.trim(ind_med) == '' || ind_med == 0 || $.trim(ind_med) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vias y Cateter.\n';
        // }

        // if ($.trim(ind_cur) == '' || ind_cur == 0 || $.trim(ind_cur) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Curaciones.\n';
        // }

        // if ($.trim(ind_proc) == '' || ind_proc == 0 || $.trim(ind_proc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Sondas y procedimientos.\n';
        // }

        // if ($.trim(ind_inmmed) == '' || ind_inmmed == 0 || $.trim(ind_inmmed) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Inmovilizacion.\n';
        // }

        // if ($.trim(ind_cc) == '' || ind_cc == 0 || $.trim(ind_cc) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Control de ciclo.\n';
        // }

        // if ($.trim(ind_pp) == '' || ind_pp == 0 || $.trim(ind_pp) == 'Seleccione') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Preparar para.\n';
        // }

        // if ($.trim(ind_vig_sig) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Vigilar signos de alerta.\n';
        // }

        // if ($.trim(obs_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Observaciones.\n';
        // }

        // if ($.trim(obs_detalle_ind_med) == '') {
        //     valido = 1;
        //     mensaje += 'Debe completar el campo Detalle de Observaciones.\n';
        // }


        if (valido == 0) {
            let data = {
                ind_med: ind_med,
                ind_cur: ind_cur,
                ind_proc: ind_proc,
                ind_inmmed: ind_inmmed,
                ind_cc: ind_cc,
                ind_pp: ind_pp,
                ind_vig_sig: ind_vig_sig,
                id_paciente: id_paciente,
                obs_ind_med: obs_ind_med,
                obs_detalle_ind_med: obs_detalle_ind_med,
                _token: "{{ csrf_token() }}"
            };

            console.log(data);
            var url = "{{ route('indicar_procedimiento_sdi') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    dataType: "json",
                })
                .done(function(data) {
                    if (data.status == 1) {
                        let procedimientos = data.procedimientos;
                        let curaciones = data.curaciones;

                        $('#tabla_procedimientos_servicio tbody').empty();
                        $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        procedimientos.forEach(function(procedimiento) {
                            console.log(procedimiento.id);
                            let datos = JSON.parse(procedimiento.datos_procedimiento);
                            // Ahora puedes trabajar con datos como un objeto JSON

                            $('#tabla_procedimientos_servicio tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-icon" onclick="eliminar_procedimiento_sdi(${procedimiento.id})"><i class="feather icon-x"></i></button></td>
                                </tr>
                            `);

                            $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                        });
                        if (curaciones.length > 0) {
                            curaciones.forEach(function(curacion) {
                                let datos = curacion.datos_curacion;
                                // Ahora puedes trabajar con datos como un objeto JSON
                                console.log(curacion);
                                $('#tabla_curaciones_servicio tbody').append(`
                                    <tr>
                                        <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                        <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                        <td class="text-center align-middle">
                                            <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="switch switch-success d-inline">
                                                <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                                <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                                Insumos
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-outline-warning btn-sm" >
                                                <i class="fas fa-edit"></i>

                                            </button>
                                        </td>
                                    </tr>
                                `);

                                $('#tabla_curaciones_procedimientos tbody').append(`
                                <tr>
                                    <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                    <td class="text-center align-middle text-wrap"><button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(${curacion.id})"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                `);
                            });
                        }

                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    } else {
                        swal({
                            title: "Indicación de Procedimiento.",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        } else {
            swal({
                title: "Indicación de Procedimiento.",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    }

    function eliminar_procedimiento_sdi(id) {
        swal({
            title: "Eliminar Procedimiento.",
            text: 'Al "Aceptar" Elimina el procedimiento.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            console.log(result);
            if (result == true) {
                eliminar_procedimiento_sdi_ajax(id);
            } else {
                console.log('regresar');
            }
        });
    }

    function suspender_procedimiento_sdi(id) {
        var url = "{{ route('suspender_procedimiento_sdi') }}";
        var id_paciente = $('#id_paciente').val();
        if(id_paciente == '' || id_paciente == null){
            id_paciente = dame_id_paciente();
        }
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let procedimientos = data.procedimientos;
                    let curaciones = data.curaciones;
                    console.log(curaciones);
                    $('#tabla_procedimientos_servicio tbody').empty();
                    $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                    $('#tabla_curaciones_servicio tbody').empty();
                    procedimientos.forEach(function(procedimiento) {
                        if (procedimiento.estado == 0) {
                            var html = '<span class="badge badge-warning">Suspendido </span>';
                        } else {
                            var html = '';
                        }
                        let datos = JSON.parse(procedimiento.datos_procedimiento);
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(datos);
                        $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento} ${html}</td>
                                <td class="text-center align-middle text-wrap">
                                    <input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm">
                                </td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_procedimiento_sdi(${procedimiento.id})">
                                        <i class="feather icon-x"></i>Eliminar
                                    </button>
                                    <button type="button"
                                        class="btn btn-${procedimiento.estado === 0 ? 'success' : 'warning'} btn-sm"
                                        onclick="${procedimiento.estado === 0 ? 'suspender_procedimiento_sdi' : 'suspender_procedimiento_sdi'}(${procedimiento.id})">
                                        <i class="fas ${procedimiento.estado === 0 ? 'fa-check' : 'fa-ban'}"></i>
                                        ${procedimiento.estado === 0 ? 'Reponer' : 'Suspender'}
                                    </button>
                                </td>
                            </tr>
                        `);


                        $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                    });

                    curaciones.forEach(function(curacion) {
                        let datos = curacion.datos_curacion;
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(curacion);
                        $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" >
                                        <i class="fas fa-edit"></i>

                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function eliminar_procedimiento_sdi_ajax(id) {
        var url = "{{ route('eliminar_procedimiento_sdi') }}";
        var id_paciente = $('#id_paciente').val();
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let procedimientos = data.procedimientos;
                    let curaciones = data.curaciones;
                    console.log(curaciones);
                    $('#tabla_procedimientos_servicio tbody').empty();
                    $('#tabla_procedimientos_servicio_enfermera tbody').empty();
                    $('#tabla_curaciones_servicio tbody').empty();
                    procedimientos.forEach(function(procedimiento) {
                        let datos = JSON.parse(procedimiento.datos_procedimiento);
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(datos);
                        $('#tabla_procedimientos_servicio tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig${datos.id}" name="ind_vig_sig${datos.id}" class="form-control form-control-sm"></td>
                                <td class="text-center align-middle text-wrap">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_procedimiento_sdi(${procedimiento.id})"><i class="fas fa-trash"></i></button>
                                    <button type="button" class="btn btn-warning btn-sm" onclick="suspender_procedimiento_sdi(${procedimiento.id})"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        `);

                        $('#tabla_procedimientos_servicio_enfermera tbody').append(`
                            <tr>
                                                <td>${procedimiento.fecha} ${procedimiento.hora} <br> ${procedimiento.responsable}</td>
                                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">
                                                    ${procedimiento.id}</td>
                                                <td class="text-center align-middle text-wrap">
                                                    ${datos.nombre_procedimiento}
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="ind_vig_sig${procedimiento.id}"
                                                        name="ind_vig_sig${procedimiento.id}"
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td class="text-center align-middle text-wrap">
                                                    <input type="text" id="obs${procedimiento.id}" name="obs${procedimiento.id}""
                                                        class="form-control form-control-sm">
                                                </td>
                                                <td>
                                                    <div class="switch switch-success d-inline">
                                                        <input type="checkbox" id="procedimiento_servicio_listo${procedimiento.id}" checked="">
                                                        <label for="procedimiento_servicio_listo${procedimiento.id}" class="cr"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modalAgregarInsumos">Insumos</button>
                                                </td>
                                            </tr>
                            `);
                    });

                    curaciones.forEach(function(curacion) {
                        let datos = curacion.datos_curacion;
                        // Ahora puedes trabajar con datos como un objeto JSON
                        console.log(curacion);
                        $('#tabla_curaciones_servicio tbody').append(`
                            <tr>
                                <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                <td class="text-center align-middle">
                                    <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                </td>
                                <td class="text-center align-middle">
                                    <div class="switch switch-success d-inline">
                                        <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                        <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                    </div>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                        Insumos
                                    </button>
                                </td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-outline-warning btn-sm" >
                                        <i class="fas fa-edit"></i>

                                    </button>
                                </td>
                            </tr>
                        `);
                    });

                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Indicación de Procedimiento.",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }



    // function agregarEvolucionPaciente(idEvolucion = null) {
    //     var id = idEvolucion ? idEvolucion : '';
    //     var fecha = $('#fecha' + id).val();
    //     var hora = $('#hora' + id).val();
    //     var temperatura = $('#temperatura' + id).val();
    //     var pulso = $('#pulso' + id).val();
    //     var pas = $('#pas' + id).val();
    //     var pad = $('#pad' + id).val();
    //     var pam = $('#pam' + id).val();
    //     var frec_resp = $('#fr' + id).val();
    //     var peso = $('#peso' + id).val();
    //     var talla = $('#talla' + id).val();
    //     var imc = $('#imc' + id).val();
    //     var tipo_respiracion_servicio = $('#tipo_respiracion_servicio' + id).val();
    //     var sat_fio2 = $('#saturacion_fio2' + id).val();
    //     var sat_o2 = $('#saturacion_oxigeno' + id).val();
    //     var dispositivo_servicio = $('#dispositivo_servicio' + id).val();
    //     var hemoglucotest = $('#hemoglucotest' + id).val();
    //     var glasgow = $('#glasgow' + id).val();
    //     var c_eva = $('#c_eva' + id).val();
    //     var otras_pruebas = $('#otras_pruebas' + id).val();
    //     var gravedad_e_conc = $('#gravedad_e_conc' + id).val();

    //     var idPaciente = $('#id_paciente').val();

    //     var valido = 1;
    //     var mensaje = '';

    //     if (temperatura == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido Temperatura\n';
    //     }
    //     if (pulso == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido Pulso\n';
    //     }
    //     if (imc == '') {
    //         valido = 0;
    //         mensaje += 'Campo requerido IMC\n';
    //     }


    //     var data = {
    //         id_paciente: idPaciente,
    //         fecha: fecha,
    //         hora: hora,
    //         temperatura: temperatura,
    //         pulso: pulso,
    //         pas: pas,
    //         pad: pad,
    //         pam: pam,
    //         frec_resp: frec_resp,
    //         peso: peso,
    //         talla: talla,
    //         imc: imc,
    //         tipo_respiracion_servicio: tipo_respiracion_servicio,
    //         sat_fio2: sat_fio2,
    //         sat_o2: sat_o2,
    //         dispositivo_servicio: dispositivo_servicio,
    //         hemoglucotest: hemoglucotest,
    //         glasgow: glasgow,
    //         c_eva: c_eva,
    //         otras_pruebas: otras_pruebas,
    //         gravedad_e_conc: gravedad_e_conc,
    //         idCounter: idCounter,
    //         idEvolucion: idEvolucion,
    //         _token: '{{ csrf_token() }}'
    //     }

    //     console.log(data);

    //     let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
    //     $.ajax({
    //         url: url,
    //         type: 'POST',
    //         data: data,
    //         success: function(resp) {
    //             console.log(resp);
    //             let mensaje = resp.mensaje;
    //             let vista = resp.vista;
    //             if (mensaje == 'OK') {
    //                 swal({
    //                     title: 'Éxito',
    //                     text: 'Evolución agregada correctamente',
    //                     icon: 'success',
    //                     button: 'Aceptar'
    //                 });
    //                 $('#contenedor_evoluciones_paciente').empty();
    //                 $('#contenedor_evoluciones_paciente').html(vista);
    //                 $('#contenedor_nueva_evolucion').empty();
    //                 idCounter++;
    //             } else {
    //                 swal({
    //                     title: 'Error',
    //                     text: mensaje,
    //                     icon: 'error',
    //                     button: 'Aceptar'
    //                 })
    //             }

    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // }

    function agregarEvolucionPacienteHospital(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var evolucion = $('#evolucion' + id).val();
        var resumen = $('#resumen_evolucion' + id).val();

        var idPaciente = $('#id_paciente').val();

        var valido = 1;
        var mensaje = '';

        if (evolucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Evolucion\n';
        }
        if (resumen == '') {
            valido = 0;
            mensaje += 'Campo requerido Resumen\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var data = {
            id_paciente: idPaciente,
            evolucion: evolucion,
            resumen: resumen,
            _token: '{{ csrf_token() }}'
        }

        console.log(data);

        let url = "{{ route('profesional.agregar_evolucion_paciente_hosp') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución agregada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').html(vista);
                    $('#contenedor_nueva_evolucion').empty();
                    idCounter++;
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function eliminarEvolucionPacienteHospital(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function registrar_salida_paciente(){
        var destino = $('#dest').val();
        var medio_traslado = $('#trasl_en').val();
        var condiciones = $('#cond_alt').val();
        var indicaciones_medicas = $('#obs_hospitalizar').val();
        var resultado_examenes = $('#fl_resultado_ex').val();

        var valido = 1;
        var mensaje = '';

        if(destino == 0){
            valido = 0;
            mensaje += 'Campo requerido Destino\n';
        }
        if(medio_traslado == 0){
            valido = 0;
            mensaje += 'Campo requerido Medio de traslado\n';
        }
        if(condiciones == 0){
            valido = 0;
            mensaje += 'Campo requerido Condiciones\n';
        }
        if(indicaciones_medicas == ''){
            valido = 0;
            mensaje += 'Campo requerido Indicaciones médicas\n';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }
    }

    function guardar_evolucion_hospital(){
        let evolucion = $('#evolucion1').val();
        let resumen = $('#resumen_evolucion').val();
        let id_paciente = $('#id_paciente').val();

        let valido = 1;
        let mensaje = '';

        if(evolucion == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Evolución</li>';
        }
        if(resumen == ''){
            valido = 0;
            mensaje += '<li>Campo requerido Resumen</li>';
        }

        if(valido == 0){
           return swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

        let data = {
            evolucion: evolucion,
            resumen: resumen,
            id_paciente: id_paciente,
            _token: CSRF_TOKEN
        }

        let url = '{{ ROUTE("adm_hospital.registrar_evolucion_paciente_hosp") }}';
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });

    }

    function generar_pdf_hospitalizacion() {
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        let hospen = $('#hospen').val();
        let hospen_text = $('#hospen option:selected').text();
        let nom_inst = $('#nom_inst').val();
        let hosp_enserv = $('#hosp_enserv').val();
        let hos_enserv_text = $('#hosp_enserv option:selected').text();
        let motivo_hosp = $('#motivo_hosp').val();
        let motivo_hosp_text = $('#motivo_hosp option:selected').text();
        let obs_hospitalizar = $('#obs_hospitalizar').val();
        let ingreso_sol_pab_modal_otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes').val();
        let ingreso_sol_pab_modal_otros_antecedentes_text = $('#ingreso_sol_pab_modal_otros_antecedentes option:selected').text();

        // Nuevos campos
        let hosp_origen = $('#hosp_en').val();
        let diagn_ingreso = $('#dg_ingreso').val();
        let serv_hosp = $('#serv_hosp').val();
        let prepararCirugia = $('#esp-3').is(':checked') ? 1 : 0;
        let otras_ind = $('#otras_ind').val();

        let motivo_hosp_indicaciones = $('#motivo_hosp_indicaciones').val();
        let ind_grales_hosp = $('#ind_grales_hosp').val();
        let nombre_medicamento_indicaciones = $('#nombre_medicamento_indicaciones').val();
        let dosis_medicamento_indicaciones = $('#dosis_medicamento_indicaciones').val();
        let frecuencia_medicamento_indicaciones = $('#frecuencia_medicamento_indicaciones').val();
        let control_enfermeria_hosp = $('#control_enfermeria_hosp').val();
        let control_enfermeria_hosp_text = $('#control_enfermeria_hosp option:selected').text();

        let otras_ind_hosp = $('#otras_ind_hosp').val();

        // Validación
        let valido = 1;
        let mensaje = '';
        if (motivo_hosp == 0) {
            valido = 0;
            mensaje += '<li>Motivo de hospitalización</li>';
        }

        if (nom_inst == '') {
            valido = 0;
            mensaje += '<li>Nombre de la institución</li>';
        }

        if(ind_grales_hosp == ''){
            valido = 0;
            mensaje += '<li>Indicaciones examenes preparación</li>';
        }

        if(control_enfermeria_hosp == 0){
            valido = 0;
            mensaje += '<li>Control de enfermería</li>';

        }

        // if (ingreso_sol_pab_modal_otros_antecedentes == '') {
        //     valido = 0;
        //     mensaje += '<li>Observaciones antecedentes médicos</li>';
        // }

        if (valido == 0) {
            $('#ingreso_m_modal').modal('hide');
            return swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            }).then(() => {
                $('#ingreso_m_modal').modal('show');
            });
        }

            let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                hospen: hospen,
                hospen_text: hospen_text,
                nom_inst: nom_inst,
                hosp_enserv: hosp_enserv,
                hosp_enserv_text: hos_enserv_text,
                motivo_hosp: motivo_hosp,
                motivo_hosp_text: motivo_hosp_text,
                obs_hospitalizar: obs_hospitalizar,
                ingreso_sol_pab_modal_otros_antecedentes: ingreso_sol_pab_modal_otros_antecedentes,
                ingreso_sol_pab_modal_otros_antecedentes_text: ingreso_sol_pab_modal_otros_antecedentes_text,
                hosp_origen: hosp_origen,
                diagn_ingreso: diagn_ingreso,
                serv_hosp: serv_hosp,
                preparar_cirugia: prepararCirugia,
                otras_ind: otras_ind,
                motivo_hosp_indicaciones: motivo_hosp_indicaciones,
                ind_grales_hosp: ind_grales_hosp,
                nombre_medicamento: nombre_medicamento_indicaciones,
                dosis_medicamento: dosis_medicamento_indicaciones,
                frecuencia_medicamento: frecuencia_medicamento_indicaciones,
                control_enfermeria: control_enfermeria_hosp,
                control_enfermeria_text: control_enfermeria_hosp_text,
                otras_indicaciones: otras_ind,
                medicamentos: JSON.stringify(
                    (typeof medicamentos_hospitalizacion !== 'undefined' && Array.isArray(medicamentos_hospitalizacion))
                        ? medicamentos_hospitalizacion
                        : []
                ),
                _token: CSRF_TOKEN
            };

            let url = '{{ route("profesional.paciente.orden_hospitalizacion") }}';
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function (resp) {
                    console.log(resp);
                    if (resp.success) {
                        let width = 800;
                        let height = 600;
                        let left = (screen.width - width) / 2;
                        let top = (screen.height - height) / 2;
                        window.open(resp.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        swal({
                            title: "PDF generado",
                            text: "El PDF ha sido generado correctamente.",
                            icon: "success",
                            buttons: "Aceptar",
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: resp.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function (error) {
                    console.log(error.responseText);
                }
            });
    }

    function guardar_hospitalizacion() {
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        let hospen = $('#hospen').val();
        let hospen_text = $('#hospen option:selected').text();
        let nom_inst = $('#nom_inst').val();
        let hosp_enserv = $('#hosp_enserv').val();
        let hos_enserv_text = $('#hosp_enserv option:selected').text();
        let motivo_hosp = $('#motivo_hosp').val();
        let motivo_hosp_text = $('#motivo_hosp option:selected').text();
        let obs_hospitalizar = $('#obs_hospitalizar').val();
        let ingreso_sol_pab_modal_otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes').val();
        let ingreso_sol_pab_modal_otros_antecedentes_text = $('#ingreso_sol_pab_modal_otros_antecedentes option:selected').text();

        // Nuevos campos
        let hosp_origen = $('#hosp_en').val();
        let diagn_ingreso = $('#dg_ingreso').val();
        let serv_hosp = $('#serv_hosp').val();
        let prepararCirugia = $('#esp-3').is(':checked') ? 1 : 0;
        let otras_ind = $('#otras_ind').val();

        let motivo_hosp_indicaciones = $('#motivo_hosp_indicaciones').val();
        let ind_grales_hosp = $('#ind_grales_hosp').val();
        let nombre_medicamento_indicaciones = $('#nombre_medicamento_indicaciones').val();
        let dosis_medicamento_indicaciones = $('#dosis_medicamento_indicaciones').val();
        let frecuencia_medicamento_indicaciones = $('#frecuencia_medicamento_indicaciones').val();
        let control_enfermeria_hosp = $('#control_enfermeria_hosp').val();
        let control_enfermeria_hosp_text = $('#control_enfermeria_hosp option:selected').text();

        let otras_ind_hosp = $('#otras_ind_hosp').val();


        let valido = 1;
        let mensaje = '';


        if (nom_inst == '') {
            valido = 0;
            mensaje += "<li>Debe ingresar el nombre de la institución.</li>";
        }

        if (motivo_hosp == '') {
            valido = 0;
            mensaje += "<li>Debe seleccionar un motivo de hospitalización.</li>";
        }


         if (valido == 0) {
            $('#ingreso_m_modal').modal('hide');
            return swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                dangerMode: true,
            }).then(() => {
                $('#ingreso_m_modal').modal('show');
            });
        }

        let data = {
                id_ficha_atencion: id_ficha_atencion,
                id_paciente: id_paciente,
                hospen: hospen,
                hospen_text: hospen_text,
                nom_inst: nom_inst,
                hosp_enserv: hosp_enserv,
                hosp_enserv_text: hos_enserv_text,
                motivo_hosp: motivo_hosp,
                motivo_hosp_text: motivo_hosp_text,
                obs_hospitalizar: obs_hospitalizar,
                ingreso_sol_pab_modal_otros_antecedentes: ingreso_sol_pab_modal_otros_antecedentes,
                ingreso_sol_pab_modal_otros_antecedentes_text: ingreso_sol_pab_modal_otros_antecedentes_text,
                hosp_origen: hosp_origen,
                diagn_ingreso: diagn_ingreso,
                serv_hosp: serv_hosp,
                preparar_cirugia: prepararCirugia,
                otras_ind: otras_ind,
                motivo_hosp_indicaciones: motivo_hosp_indicaciones,
                ind_grales_hosp: ind_grales_hosp,
                nombre_medicamento: nombre_medicamento_indicaciones,
                dosis_medicamento: dosis_medicamento_indicaciones,
                frecuencia_medicamento: frecuencia_medicamento_indicaciones,
                control_enfermeria: control_enfermeria_hosp,
                otras_indicaciones: otras_ind,
                medicamentos: JSON.stringify(
                    (typeof medicamentos_hospitalizacion !== 'undefined' && Array.isArray(medicamentos_hospitalizacion))
                        ? medicamentos_hospitalizacion
                        : []
                ),
                _token: CSRF_TOKEN
        };

        console.log(data);

        $.ajax({
            url: '{{ route("profesional.paciente.guardar_hospitalizacion") }}',
            type: 'POST',
            data: data,
            success: function (resp) {
                console.log(resp);
                if (resp.success) {
                    swal({
                        title: "Guardado",
                        text: "La solicitud de hospitalización se guardó correctamente.",
                        icon: "success",
                        buttons: "Aceptar"
                    });
                } else {
                    swal({
                        title: "Error",
                        text: resp.mensaje || "Ocurrió un error al guardar.",
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                swal({
                    title: "Error",
                    text: "Ocurrió un error inesperado.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function mostrar_nuevo_medicamento(counter){
        let url = "{{ ROUTE('profesional.mostrar_nuevo_medicamento_hosp') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                console.log(resp);
                $('#contenedor_nuevo_medicamento').empty();
                $('#contenedor_nuevo_medicamento').append(resp.v);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

</script>


@section('js_inferior')

    <script>
        //funcion para capturar el tipo de examen y buscar los subtipo que estan relacionados con el
        $('#tipo_examen_hosp').change(function(e) {
            e.preventDefault();
            tipo_examen = $('#tipo_examen_hosp').val();

            $("#sub_tipo_examen_hosp").empty();
            $("#examen_hosp").empty();
            $.ajax({
                    url: '{{ route('listar.sub_tipo_examen') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        tipo_examen: tipo_examen
                    },
                })
                .done(function(response) {
                    console.log(response);
                    $('#sub_tipo_examen_hosp').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#sub_tipo_examen_hosp').append(`<option value="${response[i].id}">
                                       ${response[i].nombre_examen}
                                  </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });

        //funcion para capturar el sub tipo de examen y buscar los examenes que estan relacionados con el
        $('#sub_tipo_examen_hosp').change(function(e) {
            e.preventDefault();
            sub_tipo_examen = $('#sub_tipo_examen_hosp').val();
            $.ajax({
                    url: '{{ route('listar.examen') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        sub_tipo_examen: sub_tipo_examen
                    },
                })
                .done(function(response) {
                    $('#examen_hosp').append(`<option value="0">Seleccione... </option>`);
                    for (var i = 0; i < response.length; i++) {
                        $('#examen_hosp').append(`<option value="${response[i].id}">
                                       ${response[i].nombre_examen}
                                  </option>`);
                    }
                })
                .fail(function() {
                    console.log("error");
                })

        });

        function indicar_examen_ficha_hosp() {
            var id_tipo_examen = $("#tipo_examen_hosp").val();
            var tipo_examen = $("#tipo_examen_hosp option:selected").text();
            var id_sub_tipo_examen = $("#sub_tipo_examen_hosp").val();
            var sub_tipo_examen = $("#sub_tipo_examen_hosp option:selected").text();
            var id_examen = $('#examen_hosp').val();
            var examen = $("#examen_hosp option:selected").text();
            var id_prioridad = $("#prioridad_hosp").val();
            var prioridad = $("#prioridad_hosp option:selected").text();

            var valido = 1;
            var mensaje = '';

            if(id_tipo_examen == 0){
                valido = 0;
                mensaje += '<li>Tipo examen</li>';
            }

            if(id_sub_tipo_examen == 0){
                valido = 0;
                mensaje += '<li>Sub tipo examen</li>';
            }

             if(examen == 0){
                valido = 0;
                mensaje += '<li>Examen</li>';
            }

            if(id_prioridad == 0){
                valido = 0;
                mensaje += '<li>Prioridad</li>';
            }

            if(valido == 0){
                swal({
                    title: 'Error',
                    content: {
                        element: 'div',
                        attributes: {
                            innerHTML: mensaje
                        }
                    },
                    icon: 'error'
                });
                return false;
            }

            var data = {
                tipo_examen: tipo_examen,
                sub_tipo_examen: sub_tipo_examen,
                examen: examen,
                prioridad: prioridad,
                id_paciente: $('#id_paciente_fc').val(),
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                _token: CSRF_TOKEN
            }

            var url = "{{ ROUTE('examen.indicar_examen_hosp') }}";

            $.ajax({
                type:'post',
                url: url,
                data: data,
                success: function(resp){
                    console.log(resp);
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Se ha indicado examen correctamente',
                    });
                    let examenes = resp.examenes;
                    let table = $('#tabla_examen_ficha_hosp').DataTable();
                    // Limpiar la tabla
                    table.clear();

                    // Agregar cada fila
                    examenes.forEach(examen => {
                        table.row.add([
                            examen.datos_examen.examen,
                            examen.datos_examen.tipo_examen,
                            examen.datos_examen.sub_tipo_examen,
                            examen.datos_examen.prioridad,
                            `<button type="button" onclick="eliminar_examen_hosp(${examen.id})" class="btn btn-danger btn-icon"><i class="feather icon-x"></i></button>`
                        ]);
                    });

                    // Dibujar la tabla con los nuevos datos
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function mostrar_nuevo_examen(counter){
            $('#contenedor_examenes_hosp').toggleClass('d-none');
        }

        function dame_examenes_hosp(){
            let id_ficha_atencion = $('#id_fc').val();
            let url = "{{ ROUTE('examen.dame_examenes_hosp') }}";

            $.ajax({
                type:'get',
                url: url,
                data:{
                    id_ficha_atencion: id_ficha_atencion,
                    id_paciente: $('#id_paciente_fc').val(),
                },
                success: function(examenes){
                    console.log(examenes);
                    let table = $('#tabla_examen_ficha_hosp').DataTable();
                    // Limpiar la tabla
                    table.clear();

                    // Agregar cada fila
                    examenes.forEach(examen => {
                        table.row.add([
                            examen.datos_examen.examen,
                            examen.datos_examen.tipo_examen,
                            examen.datos_examen.sub_tipo_examen,
                            examen.datos_examen.prioridad,
                            `<button type="button" onclick="eliminar_examen_hosp(${examen.id})" class="btn btn-danger btn-icon"><i class="feather icon-x"></i></button>`
                        ]);
                    });

                    // Dibujar la tabla con los nuevos datos
                    table.draw();
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }

        function eliminar_examen_hosp(id_examen){
                swal({
                    title: "Eliminar Examen",
                    text: "¿Está seguro que desea eliminar el examen?",
                    icon: "warning",
                    buttons: ["Cancelar", "Aceptar"],
                    DangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        eliminar_examen_hosp_confirmar(id_examen);
                    }
                });
        }

        function eliminar_examen_hosp_confirmar(id_examen){
            console.log(id_examen);
            let url ="{{ ROUTE('examen.eliminar_examen_hosp') }}"
            $.ajax({
                type:'get',
                url: url,
                data:{
                    id: id_examen
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.estado == 1){
                        swal({
                            icon:'success',
                            text: resp.mensaje,
                        });
                        dame_examenes_hosp();
                    }
                },
                error: function(error){
                    console.log(error.responseText);
                }
            });
        }
    </script>

@endsection
