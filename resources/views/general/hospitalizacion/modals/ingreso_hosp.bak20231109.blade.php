<div id="ingreso_m_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_m_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Solicitud de hospitalización</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <script>
                            var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                            var f=new Date();
                            document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                            </script>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="info_hospitalizacion-tab" data-toggle="tab" href="#info_hospitalizacion" role="tab" aria-controls="info_hospitalizacion" aria-selected="true">Info. Hospitalización</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset active" id="info-ingreso-hosp-tab" data-toggle="tab" href="#info-ingreso-hosp" role="tab" aria-controls="info-ingreso-hosp" aria-selected="true">Info. Ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="indicaciones-hosp-tab" data-toggle="tab" href="#indicaciones-hosp" role="tab" aria-controls="indicaciones-hosp" aria-selected="false">Indicaciones ingreso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="archivos-hosp-pab-tab" data-toggle="tab" href="#archivos-hosp-pab" role="tab" aria-controls="archivos-hosp-pab" aria-selected="false">Archivos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-aten text-reset" id="comentarios-hosp-pab-tab" data-toggle="tab" href="#comentarios-hosp-pab" role="tab" aria-controls="comentarios-hosp-pab" aria-selected="false">Comentarios</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="tab-content" id="info-ingreso">
                                <!--INFO HOSPITALIZACIÓN-->
                                <div class="tab-pane fade show" id="info_hospitalizacion" role="tabpanel" aria-labelledby="info_hospitalizacion-tab">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-16 text-c-blue mb-3">Detalle hospitalización</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Hospitalizar En:</label>
                                                <select name="hospen" id="hospen" data-titulo="Hospitalización" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);">
                                                    <option value="1" selected>Clínica</option>
                                                    <option value="2">Hospital</option>
                                                    <option value="3">Otro Describir</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hospen" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Lugar Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hospen" id="obs_hospen"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Nombre de La institución</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <select name="hosp_enserv" id="hosp_enserv" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                                    <option value="1" selected>Servicio Urgencia</option>
                                                    <option value="2">Sala</option>
                                                    <option value="3">UTI</option>
                                                    <option value="4">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_detalle_hosp_enserv" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Servicio Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Motivo</label>
                                                <select name="motivo_hosp" id="motivo_hosp" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);">
                                                    <option value="1" selected>Cirugía</option>
                                                    <option value="2">Tratamiento Médico</option>
                                                    <option value="3">Estudio Clínico</option>
                                                    <option value="4">Observación</option>
                                                    <option value="5">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12" id="div_motivo_hosp" style="display:none">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_motivo_hosp" id="obs_motivo_hosp"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Observaciones a la Hospitalización</label>
                                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--INFO. INGRESO-->
                                <div class="tab-pane fade show active" id="info-ingreso-hosp" role="tabpanel" aria-labelledby="info-ingreso-hosp-tab">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">INFORMACIÓN DE PACIENTE</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Nombre: </strong></label>
                                            <label class="label">{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>FN: </strong></label>
                                            <label class="label">{{ $paciente->fecha_naciemiento }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Prevision: </strong></label>
                                            <label class="label">{{ $paciente->Prevision->first()->nombre }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Teléfono: </strong></label>
                                            <label class="label">{{ $paciente->telefono_uno }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                            <label class="label"><strong>Email: </strong></label>
                                            <label class="label">{{ $paciente->email }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                           <label class="label"><strong>Enfermedades Cronicas: </strong></label>

                                                @php
                                                    $patalogias_cronicas = '';
                                                @endphp
                                                @foreach ($patoligias_cronicas as $patologia_cronica)
                                                    @php
                                                        $temp = json_decode($patologia_cronica->data);
                                                        echo $temp->nombre;
                                                        $patalogias_cronicas .= $temp->nombre;
                                                    @endphp
                                                    @if($patologia_cronica->comentario)
                                                        ,{{ $patologia_cronica->comentario }}
                                                        @php
                                                            $patalogias_cronicas .= ', '.$patologia_cronica->comentario;
                                                        @endphp
                                                    @endif
                                                    ;
                                                    @php
                                                            $patalogias_cronicas .= ';';
                                                    @endphp
                                                @endforeach
                                            </label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                            <label class="floating-label-activo-sm">Otros Antecedentes Medicos</label>
                                            <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_otros_antecedentes" id="ingreso_sol_pab_modal_otros_antecedentes" value="">
                                            <input type="hidden" name="ingreso_sol_pab_modal_patalogias_cronicas" id="ingreso_sol_pab_modal_patalogias_cronicas" value="{{ $patalogias_cronicas }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 mb-2">
                                            <h6 class="text-c-blue">MÉDICO  TRATANTE</h6>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="label"><strong>Nombre: </strong></label>
                                            <label class="label">{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}</label>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="label"><strong>Especialidad: </strong></label>
                                            <label class="label">@if($profesional->SubTipoEspecialidad()->first()) {{ $profesional->SubTipoEspecialidad()->first()->nombre }} @else {{ $profesional->TipoEspecialidad()->first()->nombre }}  @endif </label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Clínica - Hospital</label>
                                            <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en" value="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <label class="floating-label-activo-sm">Diagnósticos </label>
                                            <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="dg_ingreso" id="dg_ingreso" value=""> </textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Servicio</label>
                                                <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp" value="">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="esp-3">
                                                    <label class="custom-control-label" for="esp-3">Preparar para Cirugía?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!--INDICACIONES INGRESO-->
                                <div class="tab-pane fade show" id="indicaciones-hosp" role="tabpanel" aria-labelledby="indicaciones-hosp-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-md-12 mb-2">
                                                <h6 class="text-c-blue">INDICACIONES DE INGRESO</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Indicaciones Médicas de ingreso<i> (Medicamentos)</i></label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Indicaciones Exámenes de ingreso</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                                <label class="floating-label-activo-sm">Otras Indicaciones  de ingreso</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ind_ingreso" id="ind_ingreso"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--ARCHIVO-->
                                <div class="tab-pane fade show" id="archivos-hosp-pab" role="tabpanel" aria-labelledby="archivos-hosp-pab-tab">

                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-2 text-c-blue">ARCHIVOS</h6>
                                                <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                                <br>

                                                <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                    <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> CONSENTIMIENTO</a>
                                                    <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                                    <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                                                    <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--COMENTARIOS-->
                                <div class="tab-pane fade show" id="comentarios-hosp-pab" role="tabpanel" aria-labelledby="comentarios-hosp-pab-tab">
                                    <form>
                                        <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h6 class="mb-3 text-c-blue">COMENTARIOS</h6>
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comentarios</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info">Guardar y enviar</button>
                <button type="button" class="btn btn-primary">Ver formulario (PDF)</button>

            </div>
        </div>
    </div>
</div>
<script>

    function ingresohosp() {

        console.log($('#in_hosp_nom_inst').val());

        if($('#in_hosp_hospen').length > 0)
            $('#hospen').val($('#in_hosp_hospen').val());

        if($('#in_hosp_obs_hospen').length > 0)
            $('#obs_hospen').val($('#in_hosp_obs_hospen').val());

        if($('#in_hosp_nom_inst').length > 0)
            $('#nom_inst').val($('#in_hosp_nom_inst').val());

        if($('#in_hosp_hosp_enserv').length > 0)
            $('#hosp_enserv').val($('#in_hosp_hosp_enserv').val());

        if($('#in_hosp_obs_hosp_enserv').length > 0)
            $('#obs_hosp_enserv').val($('#in_hosp_obs_hosp_enserv').val());

        if($('#in_hosp_motivo_hosp').length > 0)
            $('#motivo_hosp').val($('#in_hosp_motivo_hosp').val());

        if($('#in_hosp_obs_motivo_hosp').length > 0)
            $('#obs_motivo_hosp').val($('#in_hosp_obs_motivo_hosp').val());

        if($('#in_hosp_obs_hospitalizar').length > 0)
            $('#obs_hospitalizar').val($('#in_hosp_obs_hospitalizar').val());


        evaluar_para_carga_detalle('hospen','div_detalle_hospen','obs_hospen',3);
        evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);
        evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);

        $('#ingreso_m_modal').modal('show');

    }
</script>
