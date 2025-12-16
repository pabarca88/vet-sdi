<div id="asist_agenda_examen_eda" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="asist_agenda_examen_eda" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
          <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">  --}}
          <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
          <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
          <input type="hidden" name="email_paciente_fc" value="{{ $paciente->email }}" id="email_paciente_fc">
          <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
          <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
          <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
          <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="apellido_uno_profesional_fc">
          <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">
          <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_uno_profesional_fc">
        @csrf
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Subir datos Examen</h5>
				<button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
                <div class="form-row">
					<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<!-- SOLICITADO POR -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" id="solicitado_por">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#solicitado_por_c" aria-expanded="false" aria-controls="solicitado_por_c">
                                        Solicitado por:
                                    </button>
                                </div>
                                <div id="solicitado_por_c" class="collapse show" aria-labelledby="solicitado_por" data-parent="#solicitado_por">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-md-2" >
                                                <input type="hidden" name="id_profesional_solicitado_por_eda" id="id_profesional_solicitado_por_eda" value="">
                                                <label class="floating-label-activo-sm">RUT</label>
                                                <input type="text" class="form-control form-control-sm" name="solicitado_por_rut_eda" id="solicitado_por_rut_eda"
                                                    onblur="cargar_profesional(this,'solicitado_por_eda', 'id_profesional_solicitado_por_eda', 'div_profesional_no_inscrito_eda', 'solicitado_por_nombre_eda', 'solicitado_por_apellido_eda', 'solicitado_por_telefono_eda', 'solicitado_por_email_eda', 'div_mensaje_eda', 'mensaje_solicitado_por_eda');"
                                                    onchange="cargar_profesional(this,'solicitado_por_eda', 'id_profesional_solicitado_por_eda', 'div_profesional_no_inscrito_eda', 'solicitado_por_nombre_eda', 'solicitado_por_apellido_eda', 'solicitado_por_telefono_eda', 'solicitado_por_email_eda', 'div_mensaje_eda', 'mensaje_solicitado_por_eda');"
                                                    onkeyup="cargar_profesional(this,'solicitado_por_eda', 'id_profesional_solicitado_por_eda', 'div_profesional_no_inscrito_eda', 'solicitado_por_nombre_eda', 'solicitado_por_apellido_eda', 'solicitado_por_telefono_eda', 'solicitado_por_email_eda', 'div_mensaje_eda', 'mensaje_solicitado_por_eda');">
                                            </div>
                                            <div class="form-group col-md-2" >
                                                <label class="floating-label-activo-sm">Solicitado por</label>
                                                <input type="text" class="form-control form-control-sm" name="solicitado_por_eda" id="solicitado_por_eda" readonly="readonly">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">H.Diagnóstica</label>
                                                <input type="text" class="form-control form-control-sm" data-input_igual="hip_diag_spec" name="sospecha_diagnostica_eda" id="sospecha_diagnostica_eda" onchange="cargarIgual('sospecha_diagnostica_eda')">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Premedicación</label>
                                                <input type="text" class="form-control form-control-sm" name="premed_eda" id="premed_eda">
                                            </div>

                                            <div class="form-group col-md-12" id="div_mensaje_eda"  style="display: none;">
                                                <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por_eda"></span>
                                            </div>
                                        </div>
                                        <div class="row" id="div_profesional_no_inscrito_eda" style="display: none;">

                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Nombre</label>
                                                <input type="text" class="form-control form-control-sm"  name="solicitado_por_nombre_eda" id="solicitado_por_nombre_eda" onchange="actualizar_solicitado_por('solicitado_por_eda', 'solicitado_por_nombre_eda', 'solicitado_por_apellido_eda');">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Apellido</label>
                                                <input type="text" class="form-control form-control-sm"  name="solicitado_por_apellido_eda" id="solicitado_por_apellido_eda" onchange="actualizar_solicitado_por('solicitado_por_eda', 'solicitado_por_nombre_eda','solicitado_por_apellido_eda');">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Telefono</label>
                                                <input type="text" class="form-control form-control-sm"  name="solicitado_por_telefono_eda" id="solicitado_por_telefono_eda" >
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Email</label>
                                                <input type="text" class="form-control form-control-sm"  name="solicitado_por_email_eda" id="solicitado_por_email_eda" >
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--ANTECEDENTES-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="antec_gastro">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antec_endosc_gastro" aria-expanded="false" aria-controls="antec_endosc_gastro">
                                        Antecedentes
                                    </button>
                                </div>
                                <div id="antec_endosc_gastro" class="collapse show" aria-labelledby="antec_gastro" data-parent="#antec_gastro">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mx-auto">
                                                <label class="floating-label-activo-sm">Antecedentes Generales</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_gen_eda" id="antec_endo_gastrica_gen_eda"></textarea>
                                            </div>
                                            <div class="form-group col-md-12 mx-auto">
                                                <label class="floating-label-activo-sm">Antecedentes Gastroenterológicos</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="antec_endo_gastrica_go_eda" id="antec_endo_gastrica_go_eda"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--TRAYECTO ESOFAGO-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="esof_endoscopia">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#esof_endoscopia_c" aria-expanded="false" aria-controls="esof_endoscopia_c"">
                                    Trayecto y Esófago
                                    </button>
                                </div>
                                <div  id="esof_endoscopia_c"  class="collapse show" aria-labelledby="esof_endoscopia" data-parent="#esof_endoscopia">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mx-auto">
                                                <label class="floating-label-activo-sm">Trayecto</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="esof_trayecto_eda" id="esof_trayecto_eda"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 mx-auto">
                                                <label class="floating-label-activo-sm">Esófago</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="esof_esofago_eda" id="esof_esofago_eda"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--ESTOMAGO-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="orofar">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#orofar-c" aria-expanded="false" aria-controls="orofar-c">
                                        Estómago
                                    </button>
                                </div>
                                <div id="orofar-c" class="collapse show" aria-labelledby="orofar" data-parent="#orofar">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form group row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Cardias</label>
                                                        <input id="cardias_eda" name="cardias_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Contenido y Pliegues </label>
                                                        <input id="cont_pliegues_eda" name="cont_pliegues_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Mucosa</label>
                                                        <input id="mucosa_eda" name="mucosa_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Ángulo</label>
                                                        <input id="angulo_eda" name="angulo_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Antro</label>
                                                        <input id="antro_eda" name="antro_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-active-sm" for="name">Píloro</label>
                                                        <input id="piloro_eda" name="piloro_eda" type="text" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" id="biopsia_eda" name="biopsia_eda" value="0">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" onchange="biopsia('eda');" id="biopsia_check_eda" name="biopsia_check_eda" value="">
                                                            <label for="biopsia_check_eda" class="cr"></label>
                                                        </div>
                                                        <label>biopsia</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="hidden" id="muestra_hp_eda" name="muestra_hp_eda" value="0">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" onchange="muestra_hp_abrir_div('eda');" id="muestra_hp_check_eda" name="muestra_hp_check_eda" data-diagnostico="diag_endos_eda" data-select="muestra_hp_resultado_eda" value="">
                                                            <label for="muestra_hp_check_eda" class="cr"></label>
                                                        </div>
                                                        <label>Muestra H.P</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="div_select_muestra_hp_eda" style="display:none;">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="name">Resultado</label>
                                                        <select id="muestra_hp_resultado_eda" name="muestra_hp_resultado_eda" class="form-control control-sm" onchange="cambio_muestra_hp_resultado('muestra_hp_resultado_eda','diag_endos_eda')">
                                                            <option value="1">Positivo</option>
                                                            <option value="0" selected="selected">Negativo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Descripción Examen</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="desc_endo_gast_eda" id="desc_endo_gast_eda"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--DUODENO-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="duodeno">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#duodeno-c" aria-expanded="false" aria-controls="duodeno-c">
                                        Duodéno
                                    </button>
                                </div>
                                <div id="duodeno-c" class="collapse show" aria-labelledby="duodeno" data-parent="#duodeno">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Descripción</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="duodeno_eda" id="duodeno_eda"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--IMAGENES-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="img_edga">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#img_eda" aria-expanded="false" aria-controls="img_eda">
                                        Imagenes.
                                    </button>
                                </div>
                                <div id="img_edga-c" class="collapse show" aria-labelledby="img_edga" data-parent="#img_edga">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <!-- [ Main Content ] start -->
                                                <div class="dropzone" id="mis-imagenes-eda" action="{{ route('profesional.imagen.carga') }}">
                                                <!-- <div class="dropzone" id="mis-imagenes" action="{{ route('profesional.imagen.carga') }}" method="post"  > -->
                                                </div>
                                                <!-- [ file-upload ] end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--DIAGNÓSTICO-->
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header" id="diag-endosc_alto">
                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diag-endosc_alto-c" aria-expanded="false" aria-controls="diag-endosc_alto-c">
                                        Diagnóstico
                                    </button>
                                </div>
                                <div id="diag-endosc_alto-c" class="collapse show" aria-labelledby="diag-endosc_alto" data-parent="#diag-endosc_alto">
                                    <div class="card-body-aten shadow-none">
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label class="floating-label-activo-sm">Diagnóstico endoscópico</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" data-input_seccion="Diagnóstico endoscópico" data-input_igual="hip_diag_spec" name="diag_endos_eda" id="diag_endos_eda" onchange="cargarCompletar('diag_endos_eda')">Test de ureasa No tomado</textarea>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6">
                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_eda" id="observaciones_eda"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-sucess btn-sm btn-block">Enviar a Paciente</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Cerrar</button>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">

</script>
