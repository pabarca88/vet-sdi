<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="exam_esp">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#exam_esp_c" aria-expanded="false" aria-controls="exam_esp_c">
                Examen Odontológico General
            </button>
        </div>
        <div id="exam_esp_c" class="collapse" aria-labelledby="exam_esp" data-parent="#exam_esp">
            <div class="card-body-aten-a shadow-none">
                <div id="form-endo-adulto">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill" id="orl_adulto" role="tablist">

                                
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="ex_oral-tab" data-toggle="tab" href="#ex_oral" role="tab" aria-controls="ex_oral" aria-selected="true">Examen Oral</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="endo_pieza-tab" onclick="mostrar_pieza_dental_examen(1000);" data-toggle="tab" href="#endo_pieza" role="tab" aria-controls="orl_flaringe" aria-selected="true">Examen Por Pieza</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="examen_general_tab" onclick="mostrar_nueva_pieza_dental(1000);" data-toggle="tab" href="#examen_general" role="tab" aria-controls="examen_general" aria-selected="true">Dolor</a>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="endo_boca_gral-tab" data-toggle="tab" href="#endo_boca_gral" role="tab" aria-controls="endo_boca_gral" aria-selected="true">Examen Boca General</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="plan_endo-tab" data-toggle="tab" href="#plan_endo" role="tab" aria-controls="cuello" aria-selected="true">Planificación de tratamiento</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="odogeneral">
                                <!--DOLOR-->
                                <div class="tab-pane fade show" id="examen_general" role="tabpanel" aria-labelledby="examen_general_tab">
                                    <div class="form-row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="tit-gen d-inline">Dolor</h6>
                                            {{-- <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-1" onclick="mostrar_nueva_pieza_dental(1000)"><i class="fas fa-plus"></i> Añadir pieza</button> --}}
                                        </div>
                                    </div>
                                    
                                    <div id="contenedor_pieza_dental_odontodolor">
                                        @php $count = 1; @endphp

                                        @foreach ($examenes_dental as $examen)
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <div id="h_dental" class="row my-2">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="form-row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Derivado por:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="ex_grl_deriv{{ $count }}" id="ex_grl_deriv{{ $count }}" value="{{ $examen->derivado_por }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Zona de Dolor</label>
                                                                    <input type="text" class="form-control form-control-sm" name="ex_grl_zdolor{{ $count }}" id="ex_grl_zdolor{{ $count }}" value="{{ $examen->zona_dolor }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="floating-label-activo-sm">Historia Anterior</label>
                                                                    <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_grl_hp{{ $count }}" id="ex_grl_hp{{ $count }}">{{ $examen->historia_anterior }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div >
                                                    <div id="pieza_dental_dolor" class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                                                        <input type="text" class="form-control form-control-sm" name="ex_grl_dol_pi_n{{ $count }}" id="ex_grl_dol_pi_n{{ $count }}" value="{{ $examen->numero_pieza }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Tipo de Dolor</label>
                                                                        <select name="tipo_dolor{{ $count }}" id="tipo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tipo_dolor','div_tipo_dolor','obs_tipo_dolor',3);">
                                                                            <option @if($examen->tipo_dolor == 1) selected @endif value="1">Espontáneo</option>
                                                                            <option @if($examen->tipo_dolor == 2) selected @endif value="2">Provocado</option>
                                                                            <option @if($examen->tipo_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tipo_dolor" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Tipo de dolor</label>
                                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tipo_dolor{{ $count }}" id="obs_tipo_dolor{{ $count }}">{{ $examen->observacion }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Intensidad</label>
                                                                        <select name="intensidad{{ $count }}" id="intensidad{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad','div_intensidad','obs_intensidad',4);">
                                                                            <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                                                            <option @if($examen->intensidad == 2) selected @endif value="2">Moderado</option>
                                                                            <option @if($examen->intensidad == 3) selected @endif value="3">Intenso</option>
                                                                            <option @if($examen->intensidad == 4) selected @endif value="4">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_intensidad" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Intensidad</label>
                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $count }}" id="obs_intensidad{{ $count }}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Modo dolor</label>
                                                                        <select name="modo_dolor{{ $count }}"  id="modo_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor','div_modo_dolor','obs_modo_dolor',3);">
                                                                            <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                                                            <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                                                            <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_modo_dolor" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Modo dolor</label>
                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $count }}" id="obs_modo_dolor{{ $count }}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                        <select name="loc_dolor{{ $count }}" id="loc_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor','div_loc_dolor','obs_loc_dolor',3);">
                                                                            <option selected  value="1">Localizado</option>
                                                                            <option value="2">Referido</option>
                                                                            <option value="3">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_loc_dolor" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Localización</label>
                                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $count }}" id="obs_loc_dolor{{ $count }}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                        <select name="provocacion_dolor" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor','div_provocacion_dolor','obs_provocacion_dolor',5);">
                                                                            <option selected  value="1">Frío</option>
                                                                            <option value="2">Calor</option>
                                                                            <option value="3">Actividad</option>
                                                                            <option value="4">Masticación</option>
                                                                            <option value="5">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_provocacion_dolor" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                        <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $count }}" id="obs_provocacion_dolor{{ $count }}"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Cuando duele</label>
                                                                        <select name="cdo_duele{{ $count }}"  id="cdo_duele{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cdo_duele','div_cdo_duele','obs_cdo_duele',3);">
                                                                            <option selected  value="1">Palpación</option>
                                                                            <option value="2">Decubito</option>
                                                                            <option value="3">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_cdo_duele" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Cuando duele</label>
                                                                        <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cdo_duele{{ $count}}" id="obs_cdo_duele{{ $count}}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Tipo Evolución</label>
                                                                        <select name="tpo_evolucion{{ $count }}"  id="tpo_evolucion{{ $count }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_evolucion','div_tpo_evolucion','obs_tpo_evolucion',3);">
                                                                            <option selected  value="1">Menos de 1 Semana</option>
                                                                            <option value="2">Más de 1 Semana</option>
                                                                            <option value="3">Otro (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_tpo_evolucion" style="display:none;">
                                                                        <label class="floating-label-activo-sm">Tipo Evolución</label>
                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_evolucion{{ $count }}" id="obs_tpo_evolucion{{ $count }}"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Efecto Analgésicos</label>
                                                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anal_dolor{{ $count }}" id="obs_anal_dolor{{ $count }}">{{ $examen->observaciones }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                                    <button type="button" class="btn btn-icon btn-danger"
                                                                        onclick="eliminarExamenAgregado({{ $examen->id }})"><i class="feather icon-x"></i>
                                                                    </button>
                                                                    {{-- <button type="button" class="btn btn-icon btn-info" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @php $count++; @endphp
                                        @endforeach
                                    </div>
                                    <div id="nueva_pieza_dental_odontodolor"></div>
                                    {{-- <div class="row">
                                        <div class="col-sm-4 col-md-4 mb-3">
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="guardar_pieza_dental_dolor(1000)" ><i class="fas fa-save"></i>Guardar</button>
                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_nueva_pieza_dental({{ $count }})">MOSTRAR NUEVA PIEZA</button>
                                        </div>
                                    </div> --}}
                                </div>

                                <!--EXAMEN  ORAL-->
                                <div class="tab-pane fade show active" id="ex_oral" role="tabpanel" aria-labelledby="ex_oral_tab">
                                    <div class="form-row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="nav flex-column nav-pills mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link-aten text-reset active" id="intraoral_tab" data-toggle="tab" href="#intraoral" role="tab" aria-controls="intraoral" aria-selected="true">Intra-Oral</a>
                                                <a class="nav-link-aten text-reset" id="extra_oral_tab" data-toggle="tab" href="#extra_oral" role="tab" aria-controls="extra_oral" aria-selected="false">Extra Oral</a>
                                                <a class="nav-link-aten text-reset" id="radiologia_endo_tab" onclick="recargar_imagenes_od_gral();mostrar_nueva_pieza_ex_radio();" data-toggle="tab" href="#radiologia_endo" role="tab" aria-controls="radiologia_endo" aria-selected="false">Ex. Radiológico</a>
                                                <a class="nav-link-aten text-reset" id="imagenes_dent_tab" data-toggle="tab" href="#imagenes_dent" role="tab" aria-controls="imagenes_dent" aria-selected="false" onclick="mostrar_nuevas_imagenes_dent()">Imagenes</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <!--INTRAORAL-->
                                                <div class="tab-pane fade show active" id="intraoral" role="tabpanel" aria-labelledby="intraoral_tab">

                                                    <div class="form-row mb-3">
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                                onclick="maxilar_superior()";><i class="feather icon-edit-1"></i> Maxilar superior</button>

                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                                onclick="maxilar_inferior()";><i class="feather icon-edit-1"></i> Maxilar  inferior</button>

                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                                onclick="boca_completa()";><i class="feather icon-edit-1"></i> Boca  Completa</button>

                                                        </div>
                                                        {{-- <div class="col-md-3 px-1 py-1">
                                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                                onclick="prest_lab();"><i class="feather icon-edit-1"></i>Solicitud de laboratorio</button>

                                                        </div> --}}
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-xs" id="table_tto_boca_gral">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Fecha</th>
                                                                            <th>Lugar</th>
                                                                            <th>Diagnóstico</th>
                                                                            <th>Tratamiento</th>
                                                                            <th>Comentarios</th>
                                                                            <th>Valor</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody >
                                                                        @foreach($todos as $diagnostico)
                                                                            <tr>
                                                                                <td>{{ $diagnostico->fecha }}</td>
                                                                                <td>{{ $diagnostico->localizacion }}</td>
                                                                                <td>{{ $diagnostico->descripcion}}</td>
                                                                                <td>{{ $diagnostico->diagnostico_tratamiento}}</td>
                                                                                <td>{{ $diagnostico->comentario }}</td>
                                                                                <td>${{ number_format($diagnostico->valor, 0, ',', '.') }}</td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico({{ $diagnostico->id }},'gral')">
                                                                                        <i class="feather icon-x"></i>
                                                                                    </button>
                                                                                    @if($diagnostico->presupuesto == 0)
                                                                                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                                            <i class="feather icon-shopping-cart"></i>
                                                                                        </button>
                                                                                    @else
                                                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                                            <i class="feather icon-log-out"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Aspecto General</label>
                                                                        <select name="intra_general" id="intra_general" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intra_general','div_detalle_intra_general','det_intra_general',2)">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">Aceptable</option>
                                                                            <option value="2">Deficiente</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_detalle_intra_general" style="display:none">
                                                                        <label class="floating-label-activo-sm">Detalle Aspecto General (Describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_intra_general" id="det_intra_general"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Periodonto</label>
                                                                        <select name="periodonto" id="periodonto"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('periodonto','div_detalle_periodonto','aprec_periodonto',2)">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">Aceptable</option>
                                                                            <option value="2">Deficiente</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group"  id="div_detalle_periodonto" style="display:none">
                                                                        <label class="floating-label-activo-sm">Periodonto (Describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_periodonto" id="aprec_periodonto"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--EXTRA ORAL-->
                                                <div class="tab-pane fade show" id="extra_oral" role="tabpanel" aria-labelledby="extra_oral_tab">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen">Extra oral</h6>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12">
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Aumento de Volumen</label>
                                                                        <select name="aum_vol" id="aum_vol" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('aum_vol','div_detalle_aum_vol','ex_aum_vol',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">No</option>
                                                                            <option value="2">Si (Describir)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group" id="div_detalle_aum_vol" style="display:none">
                                                                        <label class="floating-label-activo-sm">Aumento de Volumen (Describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_aum_vol" id="ex_aum_vol"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Fístula</label>
                                                                        <select name="fistula_endo" id="fistula_endo"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('fistula_endo','div_detalle_fistula_endo','ex_fistula_endo',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">No</option>
                                                                            <option value="2">Si</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group"  id="div_detalle_fistula_endo" style="display:none">
                                                                        <label class="floating-label-activo-sm">Fístula (Describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_fistula_endo" id="ex_fistula_endo"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Adenopatías</label>
                                                                        <select name="adenopatias" id="adenopatias"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('adenopatias','div_detalle_adenopatias','ex_adenopatias',2);">
                                                                            <option value="0">Seleccione</option>
                                                                            <option value="1">Normal</option>
                                                                            <option value="2">Anormal</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group"  id="div_detalle_adenopatias" style="display:none">
                                                                        <label class="floating-label-activo-sm">Adenopatías (Describir)</label>
                                                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ex_adenopatias" id="ex_adenopatias"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--EX. RADIOLÓGICO-->
                                                <div class="tab-pane fade show" id="radiologia_endo" role="tabpanel" aria-labelledby="radiologia_endo_tab">
                                                    {{-- <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <h6 class="tit-gen d-inline">Examen radiológico</h6>
                                                            <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-1" onclick="mostrar_nueva_pieza_ex_radio(1000)"><i class="fas fa-plus"></i> Añadir pieza</button>


                                                        </div>
                                                    </div> --}}

                                                    <div id="contenedor_pieza_dental_endorx">
                                                        

                                                    </div>
                                                    <div id="pieza_dentalrx" class="form-row">
                                                            
                                                        </div>
                                                        <div class="form-row" id="contenedor_examenes_oral_rx"></div>

                                                </div>
                                                <!--IMÁGENES-->
                                                <div class="tab-pane fade show" id="imagenes_dent" role="tabpanel" aria-labelledby="imagenes_dent_tab">
                                                    
                                                    <div id="contenedor_imagenes_dent">
                                                        @php $count = 1; @endphp
                                                        @foreach ($imagenes as $imagen)
                                                            <div class="row mb-1">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-row">
                                                                        <div class="col-sm-4 mt-2">
                                                                            <div class="card-informacion">
                                                                                <div class="card-top text-center" id="img">
                                                                                <h6 class="text-c-blue">Imagenes Pre</h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <!-- Contenedor de Imágenes -->
                                                                                    <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                        @php
                                                                                            $imagenes_pre = collect($imagen->paths_imagenes)->filter(function ($item) {
                                                                                                return isset($item['momento']) && $item['momento'] === 'Pre';
                                                                                            });
                                                                                        @endphp

                                                                                        @if ($imagenes_pre->isNotEmpty())
                                                                                            @foreach ($imagenes_pre as $path)
                                                                                                <div>
                                                                                                    <!-- Botón para ampliar imagen -->
                                                                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                            alt="Imagen del examen"
                                                                                                            class="img-fluid mx-2 imagen_rx">
                                                                                                    </a>
                                                                                                    <!-- Mostrar ID asociado a la imagen Pre -->
                                                                                                    @if (!empty($path['id_image_pre']))
                                                                                                    <div class="mt-1 text-muted small">
                                                                                                        ID Pre: {{ $path['id_image_pre'] }}
                                                                                                    </div>
                                                                                                    @endif
                                                                                                    <!-- Botón para eliminar imagen -->
                                                                                                    <button type="button"
                                                                                                            class="btn btn-danger btn-sm my-2"
                                                                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                        <i class="feather icon-x"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        @else
                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                        @endif

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 mt-2">
                                                                            <div class="card-informacion">
                                                                                <div class="card-top text-center" id="img">
                                                                                    <h6 class="text-c-blue">Imágenes Post</h6>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <!-- Contenedor de Imágenes -->
                                                                                    <div class="form-row" id="contenedor_piezas_ex_oral">
                                                                                        @php
                                                                                            $imagenes_post = collect($imagen->paths_imagenes ?? [])->filter(function ($item) {
                                                                                                return isset($item['momento']) && $item['momento'] === 'Post';
                                                                                            });
                                                                                        @endphp

                                                                                        @if ($imagenes_post->isNotEmpty())
                                                                                            @foreach ($imagenes_post as $path)
                                                                                            <hr>
                                                                                                <div>
                                                                                                    <!-- Botón para ampliar imagen -->
                                                                                                    <a href="javascript:void(0)" onclick="amplificar_imagen('{{ $path['path'] }}')">
                                                                                                        <img src="{{ asset('storage/' . ltrim($path['path'], '/')) }}"
                                                                                                            alt="Imagen del examen"
                                                                                                            class="img-fluid mx-2 imagen_rx">
                                                                                                    </a>

                                                                                                    <!-- Mostrar ID asociado a la imagen Post -->
                                                                                                    @if (!empty($path['id_image_post']))
                                                                                                        <div class="mt-1 text-muted small">
                                                                                                            ID Post: {{ $path['id_image_post'] }}
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    <!-- Botón para eliminar imagen -->
                                                                                                    <button type="button"
                                                                                                            class="btn btn-danger btn-sm my-2"
                                                                                                            onclick="eliminar_imagen_dental({{ $imagen->id }}, '{{ $path['path'] }}')">
                                                                                                        <i class="feather icon-x"></i>
                                                                                                    </button>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        @else
                                                                                            <p>No hay imágenes disponibles para este examen.</p>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-4 mt-2">
                                                                            <div class="form-group fill">
                                                                                <input type="hidden" name="biopsia_odont{{ $count }}" id="biopsia_odont{{ $count }}" value="">
                                                                                <div class="form-group fill">
                                                                                    <label id="" name="" class="floating-label-activo-sm">Observaciones / Comentarios</label>
                                                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 mt-2">
                                                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
                                                                </div>
                                                            </div>
                                                        @php $count++; @endphp
                                                        @endforeach
                                                    </div>

                                                    <div id="contenedor_nueva_imagen_dent">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--EXAMEN  POR PIEZA-->
                                <div class="tab-pane fade show" id="endo_pieza" role="tabpanel" aria-labelledby="endo_pieza-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                            <h6 class="t-aten d-inline">Examen por pieza</h6>
                                            {{-- <button type="button" class="btn btn-info btn-sm  d-inline float-md-right mt-n2 mb-1" onclick="mostrar_pieza_dental_examen(1000)"><i class="fas fa-plus"></i> Añadir pieza</button> --}}
                                        </div>
                                    </div>

                                    <div id="contenedor_pieza_dental_endo_gral" class="mb-3">
                                        @php $counter = 1; @endphp
                                        @foreach ($examenes_pieza as $examen)
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp_gral{{ $counter }}" id="n_pieza_ex_pp_gral{{ $counter }}" value="{{ $examen->numero_pieza }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Historia Anterior</label>
                                                                <input type="text" class="form-control form-control-sm" name="ex_grl_hp{{ $counter }}" id="ex_grl_hp{{ $counter }}" value="{{ $examen->historia_anterior }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Zona de Dolor</label>
                                                                <input type="text" class="form-control form-control-sm" name="zona_dolor{{ $counter }}" id="zona_dolor{{ $counter }}" value="{{ $examen->zona_dolor }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row my-2">
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                <select name="intensidad{{ $counter }}" id="intensidad{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('intensidad{{ $counter }}','div_intensidad{{ $counter }}','obs_intensidad{{ $counter }}',4);">
                                                                    <option @if($examen->intensidad == 1) selected @endif value="1">Leve</option>
                                                                    <option @if($examen->intensidad == 2) selected @endif value="2">Moderada</option>
                                                                    <option @if($examen->intensidad == 3) selected @endif value="3">Severa</option>
                                                                    <option @if($examen->intensidad == 4) selected @endif value="4">Intensa</option>
                                                                    <option @if($examen->intensidad == 5) selected @endif value="5">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_intensidad{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Intensidad</label>
                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_intensidad{{ $counter }}" id="obs_intensidad{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                <select name="modo_dolor{{ $counter }}"  id="modo_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('modo_dolor{{ $counter }}','div_modo_dolor{{ $counter }}','obs_modo_dolor{{ $counter }}',3);">
                                                                    <option @if($examen->modo_dolor == 1) selected @endif value="1">Pulsátil</option>
                                                                    <option @if($examen->modo_dolor == 2) selected @endif value="2">Permanente</option>
                                                                    <option @if($examen->modo_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_modo_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Modo dolor</label>
                                                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_modo_dolor{{ $counter }}" id="obs_modo_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                <select name="loc_dolor{{ $counter }}" id="loc_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('loc_dolor{{ $counter }}','div_loc_dolor{{ $counter }}','obs_loc_dolor{{ $counter }}',3);">
                                                                    <option @if($examen->loc_dolor == 1) selected @endif value="1">Localizado</option>
                                                                    <option @if($examen->loc_dolor == 2) selected @endif value="2">Referido</option>
                                                                    <option @if($examen->loc_dolor == 3) selected @endif value="3">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_loc_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Localización</label>
                                                                <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_loc_dolor{{ $counter }}" id="obs_loc_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                <select name="provocacion_dolor{{ $counter }}" data-titulo="General_endodoncia" data-seccion="General_endodoncia"  id="provocacion_dolor{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('provocacion_dolor{{ $counter }}','div_provocacion_dolor{{ $counter }}','obs_provocacion_dolor{{ $counter }}',5);">
                                                                    <option @if($examen->provocacion_dolor == 1) selected @endif value="1">Frío</option>
                                                                    <option @if($examen->provocacion_dolor == 2) selected @endif value="2">Calor</option>
                                                                    <option @if($examen->provocacion_dolor == 3) selected @endif value="3">Actividad</option>
                                                                    <option @if($examen->provocacion_dolor == 4) selected @endif value="4">Masticación</option>
                                                                    <option @if($examen->provocacion_dolor == 5) selected @endif value="5">Otro (Describir)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="div_provocacion_dolor{{ $counter }}" style="display:none;">
                                                                <label class="floating-label-activo-sm">Provocación del Dolor</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_provocacion_dolor{{ $counter }}" id="obs_provocacion_dolor{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control form-control-sm" data-titulo="General_endodoncia"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_observaciones{{ $counter }}" id="obs_observaciones{{ $counter }}"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Resp.Calor</label>
                                                                <select id="sel_endo_resp_calor{{ $counter }}" name="sel_endo_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->resp_calor == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->resp_calor == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->resp_calor == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->resp_calor == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->resp_calor == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Resp.Frio</label>
                                                                <select id="sel_endo_resp_frio{{ $counter }}" name="sel_endo_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->resp_frio == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->resp_frio == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->resp_frio == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->resp_frio == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->resp_frio == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Eléctrico</label>
                                                                <select id="sel_endo_resp_elect{{ $counter }}" name="sel_endo_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->electrico == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->electrico == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                                                                    <option @if($examen->electrico == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                                                                    <option @if($examen->electrico == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->electrico == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Percusión</label>
                                                                <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->percusion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->percusion == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->percusion == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->percusion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->percusion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Exploración</label>
                                                                <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->exploracion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->exploracion == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->exploracion == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->exploracion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->exploracion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Cavitaria</label>
                                                                <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                                                                    <option @if($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                                                                    <option @if($examen->cavitaria == '↑ Positiva') selected @endif><span>↑ </span> Positiva</option>
                                                                    <option @if($examen->cavitaria == '↓ Negativa') selected @endif><span>↓ </span> Negativa</option>
                                                                    <option @if($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                                                                    <option @if($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'gral')"><i class="feather icon-x"></i></button>
                                            </div>
                                        </div>
                                        @php $counter++; @endphp
                                        @endforeach
                                    </div>
                                    <div id="pieza_dental_examen" class="form-row">
                                    </div>
                                    <div id="contenedor_nueva_pieza_dental"></div>


                                </div>

                                <!--EXAMEN  BOCA GENERAL-->
                                <div class="tab-pane fade show " id="endo_boca_gral" role="tabpanel" aria-labelledby="endo_boca_gral-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                                            <h6 class="t-aten">Examen boca general</h6>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                onclick="maxilar_superior()";><i class="feather icon-edit-1"></i> Maxilar superior</button>

                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                onclick="maxilar_inferior()";><i class="feather icon-edit-1"></i> Maxilar  inferior</button>

                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                onclick="boca_completa()";><i class="feather icon-edit-1"></i> Boca  Completa</button>

                                        </div>
                                        {{-- <div class="col-md-3 px-1 py-1">
                                            <button type="button" class="btn btn-outline-primary btn-sm btn-block"
                                                onclick="prest_lab();"><i class="feather icon-edit-1"></i>Solicitud de laboratorio</button>

                                        </div> --}}
                                    </div>
                                     <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-xs" id="table_tto_boca_gral">
                                                    <thead>
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Lugar</th>
                                                            <th>Diagnóstico</th>
                                                            <th>Tratamiento</th>
                                                            <th>Comentarios</th>
                                                            <th>Valor</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody >
                                                        @foreach($todos as $diagnostico)
                                                            <tr>
                                                                <td>{{ $diagnostico->fecha }}</td>
                                                                <td>{{ $diagnostico->localizacion }}</td>
                                                                <td>{{ $diagnostico->descripcion}}</td>
                                                                <td>{{ $diagnostico->diagnostico_tratamiento}}</td>
                                                                <td>{{ $diagnostico->comentario }}</td>
                                                                <td>${{ number_format($diagnostico->valor, 0, ',', '.') }}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico({{ $diagnostico->id }},'gral')">
                                                                        <i class="feather icon-x"></i>
                                                                    </button>
                                                                    @if($diagnostico->presupuesto == 0)
                                                                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                            <i class="feather icon-shopping-cart"></i>
                                                                        </button>
                                                                    @else
                                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)">
                                                                            <i class="feather icon-log-out"></i>
                                                                        </button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--PLANIFICACION TRATAMIENTO-->
                                {{-- <div class="tab-pane fade show" id="plan_endo" role="tabpanel" aria-labelledby="plan_endo-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="contenedor_pieza_plan_gral">
                                                        <div id="pieza_dental" class="row">
                                                            <div class="col-sm-12 col-md-12 col-xl-12">
                                                                <div class="tab-content" id="v-pills-tabContent">
                                                                    <div class="tab-pane fade show active" id="faringe" role="tabpanel" aria-labelledby="faringe-tab"><br>
                                                                        <div class="col-sm-12 col-md-12" >
                                                                            <div id="planificacion_examenes_gral">
                                                                                @foreach($examenes_pieza as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Pieza N°</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->numero_pieza }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_sup_tratamientos_gral">
                                                                                @foreach($maxilar_superior_gral_tratamientos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_sup_diagnosticos_gral">
                                                                                @foreach($maxilar_superior_gral_diagnosticos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_inf_tratamientos_gral">
                                                                                @foreach($maxilar_inferior_gral_tratamientos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_max_inf_diagnosticos_gral">
                                                                                @foreach($maxilar_inferior_gral_diagnosticos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_boca_completa_tratamientos_gral">
                                                                                @foreach($boca_completa_gral_tratamientos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <div id="planificacion_boca_completa_diagnosticos_gral">
                                                                                @foreach($boca_completa_gral_diagnosticos as $e)
                                                                                    <div class="form-row">
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">{{ $e->localizacion }}</label>
                                                                                                <input type="text" class="form-control form-control-sm" value="{{ $e->especialidad_examen }} {{ $e->diagnostico_tratamiento }}">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                                                                                    <option selected  value="1">Uniradicular</option>
                                                                                                    <option value="2">Biradicular</option>
                                                                                                    <option value="2">Triradicular</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                                                                                <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                                                                                <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                                                            <div class="form-group">
                                                                                                <label class="floating-label-activo-sm">Convenio</label>
                                                                                                <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                                                                                    <option selected  value="1">Convenio</option>
                                                                                                    <option value="2">Sin Convenio</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12 col-md-12 d-flex justify-content-center">
                                                                            <button type="button" class="btn btn-primary btn-sm mr-2" onclick="cargar_a_presupuesto('gral')">Cargar a presupuesto</button>
                                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="abrir_modal_insumos()"><i class="fas fa-plus"></i> Agregar Insumos</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table id="table_insumos_odon_gral" class="display table table-striped table-hover dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2 table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <td>Insumo</td>
                                                                    <td>Cantidad</td>
                                                                    <td>Valor</td>
                                                                    <td>Total</td>
                                                                    <td>Acciones</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($insumos_tratamientos as $t)
                                                                    @php $total = $t->cantidad * $t->valor @endphp
                                                                    <tr>
                                                                        <td>{{ $t->insumos }} {{ $t->nombre_marca }}</td>
                                                                        <td>{{ $t->cantidad }}</td>
                                                                        <td>{{ number_format($t->valor)  }}</td>
                                                                        <td>{{ number_format($total)  }}</td>
                                                                        <td>
                                                                            @if($t->presupuesto == 0 || $t->presupuesto == null)
                                                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i class="fas fa-save"></i></button>
                                                                            @else
                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i class="fas fa-save"></i></button>
                                                                            @endif
                                                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_insumo({{ $t->id }})"><i class="feather icon-x"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!--PLANIFICACION TRATAMIENT ODONTO GENERAL-->
                                <div class="tab-pane fade show" id="plan_endo" role="tabpanel" aria-labelledby="plan_endo">
                                    <div class="form-row mt-3">
                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue">Tratamientos en piezas o grupos</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="table_piezas_presupuesto_odonto" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Pieza o Grupo</th>
                                                                            <th>Diagnóstico</th>
                                                                            <th>Tratamiento</th>
                                                                            <th>Valor</th>
                                                                           
                                                                            <th>Accion</th>
                                                                             <th>Estado</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($odontograma as $o)
                                                                        @if($o->urgencia == 0 && $o->presupuesto == 1)
                                                                            <tr>
                                                                                <td>{{ $o->pieza }}</td>
                                                                                <td class="text-uppercase">{{ $o->diagnostico }}</td>
                                                                                <td>{{ $o->descripcion }}</td>
                                                                                <td>${{ number_format($o->valor,0,',','.') }}</td>
                                                                                
                                                                                <td>
                                                                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma({{ $o->id }})"><i class="feather icon-x"></i></button>
                                                                                    <button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza({{ $o->id }})"><i class="feather icon-repeat"></i> </button>
                                                                                </td>
                                                                                <td>
                                                                                    @if($o->estado == 0)
                                                                                        <span class="text-uppercase">Pendiente</span>
                                                                                    @elseif($o->estado == 1)
                                                                                        <span class="text-uppercase">Realizado</span>
                                                                                    @elseif($o->estado == 2)
                                                                                        <span class="text-uppercase">Cancelado</span>
                                                                                    @elseif($o->estado == 3)
                                                                                        <span class="text-uppercase">Citado a Control</span>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--SELECCION PIEZAS O GRUPOS-->
                                    <div class="form-row">
                                        <!--TABLA SELECCION DE PIEZAS O GRUPOS DE PIEZAS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue">Seleccione por pieza o grupo de piezas</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="row my-2">
                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="max_sup" onclick="seleccionar_maxilar_superior()">
                                                                        <label class="custom-control-label" for="max_sup">Seleccione maxilar superior</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="max_inf" onclick="seleccionar_maxilar_inferior()">
                                                                        <label class="custom-control-label" for="max_inf">Seleccione maxilar inferior</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="piezas_presup" onclick="seleccionar_piezas_presup()" checked>
                                                                        <label class="custom-control-label" for="piezas_presup">Piezas presupuesto</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                                                                    @include('atencion_odontologica.generales.odontograma_adulto_grupos')
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 mt-2">
                                                                    <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label for="" class="floating-label-activo-sm">Grupos</label>
                                                                        <select class="js-example-basic-multiple" name="paciente_piezas_dentales_ex" id="paciente_piezas_dentales_ex" multiple="multiple">
                                                                            <option value="1.1">1.1</option>
                                                                            <option value="1.2">1.2</option>
                                                                            <option value="1.3">1.3</option>
                                                                            <option value="1.4">1.4</option>
                                                                            <option value="1.5">1.5</option>
                                                                            <option value="1.6">1.6</option>
                                                                            <option value="1.7">1.7</option>
                                                                            <option value="1.8">1.8</option>
                                                                            <option value="2.1">2.1</option>
                                                                            <option value="2.2">2.2</option>
                                                                            <option value="2.3">2.3</option>
                                                                            <option value="2.4">2.4</option>
                                                                            <option value="2.5">2.5</option>
                                                                            <option value="2.6">2.6</option>
                                                                            <option value="2.7">2.7</option>
                                                                            <option value="2.8">2.8</option>
                                                                            <option value="3.1">3.1</option>
                                                                            <option value="3.2">3.2</option>
                                                                            <option value="3.3">3.3</option>
                                                                            <option value="3.4">3.4</option>
                                                                            <option value="3.5">3.5</option>
                                                                            <option value="3.6">3.6</option>
                                                                            <option value="3.7">3.7</option>
                                                                            <option value="3.8">3.8</option>
                                                                            <option value="4.1">4.1</option>
                                                                            <option value="4.2">4.2</option>
                                                                            <option value="4.3">4.3</option>
                                                                            <option value="4.4">4.4</option>
                                                                            <option value="4.5">4.5</option>
                                                                            <option value="4.6">4.6</option>
                                                                            <option value="4.7">4.7</option>
                                                                            <option value="4.8">4.8</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                                                        <select class="form-control form-control-sm" id="diagnostico_combo_g_od_gral">
                                                                            <option value="0">Seleccione</option>
                                                                            @foreach ($diagnosticos as $d)
                                                                                <option value="{{ $d->id }}">{{ $d->descripcion }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label-activo-sm">Tratamiento</label>
                                                                        <input type="text" name="diag_presupuesto_pieza_g" id="diag_presupuesto_pieza_g" placeholder="DESCRIBA EL TRATAMIENTO POR PIEZA O GRUPO DE PIEZAS" class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input" autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="cargar_a_presupuesto_impl_g()"><i class="feather icon-save"></i> Guardar piezas</button>
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

                                    <div class="form-row">
                                        <!--TABLA INSUMOS-->
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <div class="card-informacion">
                                                <div class="card-top">
                                                    <h6 class="text-uppercase text-c-blue d-inline">Insumos</h6>
                                                    <button type="button" class="btn btn-info btn-xxs float-md-right d-inline d-inline"  onclick="abrir_modal_insumos()"><i class="fas fa-plus"></i> Agregar Insumos</button>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="table-responsive">
                                                                <table id="table_insumos_odon_gral" class="display table table-striped dt-responsive nowrap table-sm dataTable no-footer dtr-inline w-100 mt-2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Insumo</th>
                                                                            <th>Observaciones</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Valor</th>
                                                                            <th>Total</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($insumos_tratamientos as $t)
                                                                        @if($t->urgencia == 0)
                                                                            @php $total = $t->cantidad * $t->valor @endphp
                                                                            <tr>
                                                                                <td>{{ $t->insumos }} {{ $t->nombre_marca }}</td>
                                                                                <td>{{ $t->observaciones }}</td>
                                                                                <td>{{ $t->cantidad }}</td>
                                                                                <td>{{ number_format($t->valor)  }}</td>
                                                                                <td>{{ number_format($total)  }}</td>
                                                                                <td>
                                                                                    @if($t->presupuesto == 0 || $t->presupuesto == null)
                                                                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo({{ $t->id }})"><i class="feather icon-shopping-cart"></i></button>
                                                                                    @else
                                                                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo({{ $t->id }})"><i class="fas fa-minus"></i></button>
                                                                                    @endif
                                                                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo({{ $t->id }})"><i class="feather icon-edit"></i></button>
                                                                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo({{ $t->id }})"><i class="feather icon-x"></i></button>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row mt-2">
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-success btn-xxs" onclick="abrirModalCorreo()"><i class="fas fa-email"></i> Enviar por correo</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--HOSPITALIZACION-->
                                {{--  <div class="tab-pane fade show" id="hosp_endodoncia" role="tabpanel" aria-labelledby="hosp_endodoncia-tab">
                                    @include('general.hospitalizacion.hospitalizar')
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('atencion_odontologica.modals.odontograma.modal_insumos')
@include('atencion_odontologica.modals.odontograma.modal_insumos_editar')
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_insumo_editar" id="id_insumo_editar" value="">

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Supongamos que ya tienes este JSON cargado
        const odontograma = @json($odontograma);

       // Filtrar solo las piezas donde urgencia es igual a 0 y obtener piezas únicas
        const piezasTto = odontograma.filter(item => item.urgencia == 0);
        const piezasUnicas = [...new Set(piezasTto.map(item => item.pieza))];

        // Seleccionar el <select> y actualizar sus valores
        const piezasSelect = $('#paciente_piezas_dentales_ex');
        piezasSelect.val(piezasUnicas).trigger('change');

        // Marcar visualmente las piezas en el odontograma
        piezasUnicas.forEach(pieza => {
            $(`.pieza[data-pieza="${pieza}"]`).addClass('seleccionada');
        });
        // Escuchar cambios en el Select2 para actualizar el odontograma visual
        piezasSelect.on('change', function () {
            const piezasSeleccionadas = $(this).val() || [];

            // Recorre todas las piezas visuales
            $('.pieza').each(function () {
                const piezaNumero = $(this).data('pieza').toString();

                if (piezasSeleccionadas.includes(piezaNumero)) {
                    $(this).addClass('seleccionada');
                } else {
                    $(this).removeClass('seleccionada');
                }
            });
        });
        $('#selectDestinatarios').select2({
            tags: true,
            width: '100%',
            placeholder: 'Selecciona o ingresa correos',
            dropdownParent: $('#modalEnviarPresupuesto')
        });
    });

    function dame_insumo(id){
        $('#id_insumo_editar').val(id);
        let url = '{{ ROUTE("dental.dame_insumo_tto") }}';
        let data = {
            id: id,
            _token: CSRF_TOKEN
        };
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            beforeSend: function(){
                swal({
                    title: "Cargando insumo...",
                    text: "Por favor, espere.",
                    icon: "info",
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });
            },
            success: function(resp){
                console.log(resp);
                swal.close();
                if(resp.mensaje == 'ok'){
                    $('#modal_insumos_editar').modal('show');
                    let insumo = resp.insumo;
                    $('#id_insumo_editar').val(insumo.id);
                    $('#tipoInsumo_editar').val(insumo.id_tipo_insumo);
                    
                    $('#cantidad_editar').val(insumo.cantidad);
                    $('#precio_editar').val(insumo.valor);
                    $('#total_editar').val(insumo.total);
                    $('#insumos_obs_tto_editar').val(insumo.observaciones);
                    let total = insumo.cantidad * insumo.valor;
                    $('#total_editar').val(total);
                    dame_marcas_implantes_editar(insumo.id_tipo_insumo, insumo.insumos, insumo.id_marca);
                }else{
                    swal({
                        title: "Error al cargar el insumo",
                        text: resp.detalle,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.error("Error al cargar el insumo:", error);
                swal({
                    title: "Error al cargar el insumo",
                    text: "Por favor, intente nuevamente.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }

    function dame_marcas_implantes_editar(id, nombreInsumoSeleccionado = null, idMarcaSeleccionada = null){
        console.log(idMarcaSeleccionada);
        let url = '{{ ROUTE("dental.dame_implantes_dental") }}';
        if(id == 1){
            $('#marcas_implantes_select_editar').removeClass('d-none');
            $('#insumos_select_editar').addClass('d-none');
        }else{
            $('#marcas_implantes_select_editar').addClass('d-none');
            $('#insumos_select_editar').removeClass('d-none');
        }
        let data = {
            id_tipo_insumo: id,
            _token: CSRF_TOKEN
        }
    
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                $('#nombreInsumo_editar').empty();
                let insumos = resp;
                
                insumos.forEach(e => {
                    $('#nombreInsumo_editar').append(`
                        <option value="${e.id}" ${nombreInsumoSeleccionado === e.descripcion ? 'selected' : ''}> ${e.descripcion} </option>
                    `);
                });
                if(idMarcaSeleccionada){
                    $('#marcasImplantes_editar').val(idMarcaSeleccionada);
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function editar_insumo_confirmar(){
        let id_tipo_insumo = $('#tipoInsumo_editar').val();
        if(id_tipo_insumo == 1){
            var marcaInsumo = $('#marcasImplantes_editar option:selected').text();
        }else{
            var marcaInsumo = '';
        }
        let data = {
            id: $('#id_insumo_editar').val(),
            id_tipo_insumo: $('#tipoInsumo_editar').val(),
            id_insumo: $('#nombreInsumo_editar').val(),
            insumos: $('#nombreInsumo_editar option:selected').text(),
            id_marca: $('#marcasImplantes_editar').val(),
            observaciones: $('#insumos_obs_tto_editar').val(),
            marca_insumo: marcaInsumo,
            cantidad: $('#cantidad_editar').val(),
            precio: $('#precio_editar').val(),
            id_paciente: $('#id_paciente_fc').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            id_presupuesto: $('#id_presupuesto').val(),
            _token: CSRF_TOKEN
        }
        let url = '{{ ROUTE("dental.editar_insumos_tto") }}';
        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'ok'){
                    swal({
                        icon:'success',
                        text:'Se a editado insumos correctamente',
                        title:'Exito'
                    });
                    $('#modal_insumos_editar').modal('hide');
                    // Actualiza la tabla o realiza otras acciones necesarias
                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                    $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                    $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto').val(formatoMoneda(total_general));
                    $('#total_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto_dental').val(total_general);
                    $('#subtotal_presup').val(formatoMoneda);
                    $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                    $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                    let insumos = resp.insumos;
                    console.log(insumos);
                    let table = $('#table_insumos_odon_gral').DataTable();
                    let table_urg = $('#table_insumos_urg').DataTable();
                    let table_urg_odped = $('#table_insumos_odped_urg').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table.clear();
                    table_urg.clear();
                    table_urg_odped.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                            // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="feather icon-shopping-cart"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }else{
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }
                        if(insumo.urgencia == 0){
                            let total = insumo.cantidad * insumo.valor;
                            
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.observaciones,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        }else{
                            let total = insumo.cantidad * insumo.valor;
                            table_urg.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.observaciones,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                            table_urg_odped.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                insumo.observaciones,
                                insumo.cantidad,       // Cantidad utilizada
                                formatoMoneda(insumo.valor),         // Unidad de medida
                                formatoMoneda(total),
                                botones
                            ]);
                        }
                        
                    });

                    //Dibujar la tabla nuevamente con los nuevos datos
                    table.draw();
                    table_urg.draw();
                    table_urg_odped.draw();

                    $('#contenedor_insumos').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1){
                            let total = insumo.cantidad * insumo.valor;
                            $('#contenedor_insumos').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 col-lg-4 fill">
                                                    <label class="floating-label-activo-sm">Insumo</label>
                                                    <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-1 fill">
                                                    <label class="floating-label-activo-sm">Cantidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-2 fill">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-2 fill">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-1 col-lg-1 d-flex">

                                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }

                    });

                    let table_insumos = $('#presup_insumos_pago').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table_insumos.clear();

                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if(insumo.presupuesto == 1){
                            if(insumo.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(insumo.estado_pago == 'intermedio'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos.row.add([
                            `${insumo.insumos} ${insumo.nombre_marca}`,
                            insumo.observaciones,
                            insumo.cantidad,         // Nombre del insumo
                            formatoMoneda(insumo.valor),       // Cantidad utilizada
                            0,         // Unidad de medida
                            formatoMoneda(total),
                            ' <div class="circle '+clase+'"></div>',
                            ''

                        ]).draw(false).node();
                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });

                    table_insumos.draw();

                    $('#table_pagos_reasignar_insumos tbody').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1){
                            let total = insumo.cantidad * insumo.valor;
                            $('#table_pagos_reasignar_insumos tbody').append(`
                            <tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                <td>${insumo.cantidad}</td>
                                <td>${formatoMoneda(insumo.valor)}</td>
                                <td>${formatoMoneda(total)}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                        }

                    });
                    let $select = $('#prot_implante_man');

                    // Limpiar opciones actuales
                    $select.empty();

                    // Agregar nuevas opciones desde resp.insumos
                    resp.insumos.forEach(insumo => {
                        let text = insumo.insumos + ' ' + insumo.nombre_marca;
                        let option = new Option(text, insumo.id, false, false); // false para no seleccionar
                        $select.append(option);
                    });

                    // Refrescar Select2
                    $select.trigger('change');
                    //dame_insumos_tratamiento();
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }


    function eliminar_insumo(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el insumo dental?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                confirmar_eliminar_insumo(id);
            }
        });
    }

    function confirmar_eliminar_insumo(id){
        console.log(id);
        let data = {
            id: id,
            id_paciente: $('#id_paciente').val(),
            id_ficha_atencion: $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN
        }
        let url = '{{ ROUTE("dental.eliminar_insumos_tto") }}';
        $.ajax({
            url: url,
            type:'post',
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.mensaje == 'ok'){
                    swal({
                        icon:'success',
                        text:'Se a eliminado insumos correctamente',
                        title:'Exito'
                    });
                    let valores_boca_general = resp.valores[0];
                    let valores_odontograma = resp.valores[1];
                    let valores_insumos = resp.valores[2];
                    let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                    $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                    $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                    $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                    $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                    $('#valores_insumos_presupuesto').html(formatoMoneda(valores_insumos));
                    $('#valores_insumos_presupuesto_conf').html(formatoMoneda(valores_insumos));
                    $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                    $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                    $('#subtotal_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto').val(formatoMoneda(total_general));
                    $('#total_insumos').val(formatoMoneda(valores_insumos));
                    $('#total_presupuesto_dental').val(total_general);
                    $('#subtotal_presup').val(formatoMoneda);
                    $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));
                    $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));


                    let insumos = resp.insumos;
                    console.log(insumos);
                    let table = $('#table_insumos_preimplante').DataTable();
                    let table_urg = $('#table_insumos_urg').DataTable();
                    //Limpiar la tabla sin perder la configuración de DataTables
                    table.clear();
                    table_urg.clear();

                    //Recorrer el array de insumos y agregarlos a la tabla
                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                // Botones de acción
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id})">
                                        <i class="feather icon-shopping-cart"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }else{
                            var botones = `
                                <td>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id})">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>`;
                        }
                        if(insumo.urgencia == 1){
                            table_urg.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad,
                                formatoMoneda(insumo.valor),
                                formatoMoneda(total),
                                botones
                            ]);
                        }else{
                            table.row.add([
                                insumo.insumos + ' ' + insumo.nombre_marca,
                                insumo.observaciones,
                                insumo.cantidad,
                                formatoMoneda(insumo.valor),
                                formatoMoneda(total),
                                botones
                            ]);
                        }
                    });

                    //Dibujar la tabla nuevamente con los nuevos datos
                    table.draw();
                    table_urg.draw();

                    $('#contenedor_insumos').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1){
                            let total = insumo.cantidad * insumo.valor;
                            $('#contenedor_insumos').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-12 col-lg-4 fill">
                                                    <label class="floating-label-activo-sm">Insumo</label>
                                                    <input type="text" class="form-control form-control-sm" name="insumo_pres" id="insumo_pres" value="${insumo.insumos} ${insumo.nombre_marca}">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-1 fill">
                                                    <label class="floating-label-activo-sm">Cantidad</label>
                                                    <input type="text" class="form-control form-control-sm" name="cantidad_pres" id="cantidad_pres" value="${insumo.cantidad}">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-2 fill">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-2 col-lg-2">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="">
                                                </div>
                                                <div class="form-group col-md-3 col-lg-2 fill">
                                                    <label class="floating-label-activo-sm">Total Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(total)}">
                                                </div>
                                                <div class="form-group col-md-1 col-lg-1 d-flex">

                                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_insumo(${insumo.id})"><i class="feather icon-x"> </i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }

                    });

                    let table_insumos = $('#presup_insumos_pago').DataTable();

                    //Limpiar la tabla sin perder la configuración de DataTables
                    table_insumos.clear();

                    insumos.forEach(insumo => {
                        let total = insumo.cantidad * insumo.valor;
                        if(insumo.presupuesto == 1){
                            if(insumo.estado_pago == 'ok'){
                                var clase = 'bg-success';
                            }else if(insumo.estado_pago == 'intermedio'){
                                var clase = 'bg-warning';
                            }else{
                                var clase = 'bg-danger';
                            }
                            let rowNode = table_insumos.row.add([
                            `${insumo.insumos} ${insumo.nombre_marca}`,
                            insumo.observaciones,
                            insumo.cantidad,         // Nombre del insumo
                            formatoMoneda(insumo.valor),       // Cantidad utilizada
                            0,         // Unidad de medida
                            formatoMoneda(total),
                            ' <div class="circle '+clase+'"></div>',
                            ''

                        ]).draw(false).node();
                            // Agregar clases a la fila
                            $(rowNode).addClass('text-center align-middle status-circle');
                        }

                    });

                    table_insumos.draw();

                    $('#table_pagos_reasignar_insumos tbody').empty();
                    insumos.forEach(insumo => {
                        if(insumo.presupuesto == 1){
                            let total = insumo.cantidad * insumo.valor;
                            $('#table_pagos_reasignar_insumos tbody').append(`
                            <tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${total}" data-id="${insumo.id}" data-info="insumo"></td>
                                <td>${insumo.insumos} ${insumo.nombre_marca}</td>
                                <td>${insumo.cantidad}</td>
                                <td>${formatoMoneda(insumo.valor)}</td>
                                <td>${formatoMoneda(total)}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_insumo(${insumo.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                        }

                    });
                    let $select = $('#prot_implante_man');

                    // Limpiar opciones actuales
                    $select.empty();

                    // Agregar nuevas opciones desde resp.insumos
                    resp.insumos.forEach(insumo => {
                        let text = insumo.insumos + ' ' + insumo.nombre_marca;
                        let option = new Option(text, insumo.id, false, false); // false para no seleccionar
                        $select.append(option);
                    });

                    // Refrescar Select2
                    $select.trigger('change');
                    dame_insumos_tratamiento();
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function recargar_imagenes_od_gral() {
        // Aquí puedes implementar la lógica para recargar las imágenes de odontología general
        console.log("Recargando imágenes de odontología general...");
        // Por ejemplo, podrías hacer una llamada AJAX para obtener las imágenes actualizadas
        $.ajax({
            url: '{{ route("profesional.recargar_imagenes_dental_general_paciente") }}',
            type: 'POST',
            data:{
                id_paciente: $('#id_paciente_fc').val(),
                seccion: "gral",
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                console.log("Imágenes recargadas correctamente.");
                // Aquí podrías actualizar el DOM si es necesario
                $('#pieza_dentalrx').html(response.v);
                
            },
            error: function(error) {
                console.error("Error al recargar imágenes:", error);
            }
        })
    }
    
    function enviar_email_presupuesto_insumos(){
        let destinatarios = $('#selectDestinatarios').val();
        let correoLibre = $('#correoLibre').val();
        let idPaciente = $('#id_paciente_fc').val();
        let idFichaAtencion = $('#id_fc').val();

        if(destinatarios.length == 0 && correoLibre == ''){
            swal({
                title: "Debe seleccionar al menos un destinatario",
                icon: "warning",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }

        let data = {
            destinatarios: destinatarios,
            correoLibre: correoLibre,
            idPaciente: idPaciente,
            idFichaAtencion: idFichaAtencion,
            _token: CSRF_TOKEN
        };

        $.ajax({
            url: '{{ ROUTE("enviar.presupuesto.insumos.email") }}',
            type: 'POST',
            data: data,
            success: function(response) {
                console.log(response);
                if(response.mensaje == 'ok'){
                    swal({
                        title: "Presupuesto enviado correctamente",
                        icon: "success",
                        buttons: "Aceptar"
                    });
                    $('#modalEnviarPresupuesto').modal('hide');
                }else{
                    swal({
                        title: "Error al enviar el presupuesto",
                        text: response.detalle,
                        icon: "error",
                        buttons: "Aceptar"
                    });
                }
            },
            error: function(error) {
                console.error("Error al enviar el presupuesto:", error);
                swal({
                    title: "Error al enviar el presupuesto",
                    text: "Por favor, intente nuevamente.",
                    icon: "error",
                    buttons: "Aceptar"
                });
            }
        });
    }
</script>
<!-- Modal Enviar Presupuesto -->
<div class="modal fade" id="modalEnviarPresupuesto" tabindex="-1" role="dialog" aria-labelledby="modalEnviarPresupuestoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEnviarPresupuesto">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEnviarPresupuestoLabel">Enviar presupuesto de insumos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="floating-label-activo-sm" for="selectDestinatarios">Selecciona destinatarios:</label>
                <select id="selectDestinatarios" class="form-control form-control-sm" multiple="multiple" style="width:100%">
                    
                    <option value="{{ $paciente->email }}">{{$paciente->nombres}} {{ $paciente->apellido_uno }} (Paciente)</option>  
                    <option value="{{ $profesional->email }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} (Profesional)</option>
                    <option value="bodega@gmail.com">Bodega</option>
                    <option value="ejemplo@gmail.com">Dirección de presupuestos</option>
                </select>
            </div>
          
          
          <small class="text-muted">Puedes seleccionar varios o escribir correos manualmente.</small>
          <hr>
          <div class="form-group">
            <label class="floating-label-activo-sm">Correo adicional (opcional):</label>
            <input type="email" class="form-control form-control-sm" id="correoLibre" placeholder="ejemplo@correo.com">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="enviar_email_presupuesto_insumos()" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
    function abrirModalCorreo() {
        $('#modalEnviarPresupuesto').modal('show');
    }
    function seleccionar_maxilar_superior() {
        const superiorActivo = document.getElementById("max_sup").checked;
        const piezas = document.querySelectorAll('.pieza');
        const select = $('#paciente_piezas_dentales_ex');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza');

            if (codigo.startsWith('1.') || codigo.startsWith('2.')) {
                if (superiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }
    function seleccionar_maxilar_inferior(){
        const superiorActivo = document.getElementById("max_inf").checked;
        const piezas = document.querySelectorAll('.pieza');
        const select = $('#paciente_piezas_dentales_ex');

        piezas.forEach(pieza => {
            const codigo = pieza.getAttribute('data-pieza');

            if (codigo.startsWith('3.') || codigo.startsWith('4.')) {
                if (superiorActivo) {
                    pieza.classList.add('seleccionada');

                    // Selecciona en el Select2 si existe la opción
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", true);
                    }
                } else {
                    pieza.classList.remove('seleccionada');

                    // Deselecciona en el Select2
                    if (select.find("option[value='" + codigo + "']").length > 0) {
                        select.find("option[value='" + codigo + "']").prop("selected", false);
                    }
                }
            }
        });

        // Refresca el select2 para que se vea reflejado el cambio
        select.trigger('change');
    }

        var odontograma_global = @json($odontograma);

    function seleccionar_piezas_presup() {
        const checkbox = document.getElementById('piezas_presup');
        // Seleccionar el <select> y actualizar sus valores
        const piezasSelect = $('#paciente_piezas_dentales_ex');
        // Si está desmarcado
        if (!checkbox.checked) {
            // 1. Limpiar select2
            piezasSelect.val(null).trigger('change');

            // 2. Quitar clase seleccionada a todas las piezas
            $('.pieza').removeClass('seleccionada');

            return; // Salimos de la función
        }
        // Desmarcar los switches de maxilares
        document.getElementById('max_sup').checked = false;
        document.getElementById('max_inf').checked = false;



        // Aquí puedes agregar lógica para seleccionar solo piezas de presupuesto si lo necesitas
        // Supongamos que ya tienes este JSON cargado
        const odontograma = odontograma_global;

         // Filtrar solo las piezas donde urgencia es igual a 0 y obtener piezas únicas
        const piezasTto = odontograma.filter(item => item.urgencia == 0);
        const piezasUnicas = [...new Set(piezasTto.map(item => item.pieza))];


        piezasSelect.val(piezasUnicas).trigger('change');

        // Marcar visualmente las piezas en el odontograma
        piezasUnicas.forEach(pieza => {
            $(`.pieza[data-pieza="${pieza}"]`).addClass('seleccionada');
        });
        // Escuchar cambios en el Select2 para actualizar el odontograma visual
        piezasSelect.on('change', function () {
            const piezasSeleccionadas = $(this).val() || [];

            // Recorre todas las piezas visuales
            $('.pieza').each(function () {
                const piezaNumero = $(this).data('pieza').toString();

                if (piezasSeleccionadas.includes(piezaNumero)) {
                    $(this).addClass('seleccionada');
                } else {
                    $(this).removeClass('seleccionada');
                }
            });
        });
    }
    function abrir_modal_insumos() {
            $('#modal_insumos').modal('show');
        }
</script>
