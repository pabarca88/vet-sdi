<div id="m_aconsentcirm" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_aconsentcirm" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        {{--  <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">  --}}
        {{--  <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">  --}}
        {{--  <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">  --}}
        {{--  <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">  --}}
        {{--  <input type="hidden" name="email_paciente_fc" value="{{ $paciente->email }}" id="email_paciente_fc">  --}}
        {{--  <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">  --}}
        {{--  <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->nombre }}" id="apellido_uno_profesional_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_uno }}" id="apellido_uno_profesional_fc">  --}}
        {{--  <input type="hidden" name="id_profesional_fc" value="{{ $profesional->apellido_dos }}" id="apellido_uno_profesional_fc">  --}}


        @csrf
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Consentimiento informado </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
            </div>
			<div class="modal-body">
				<div class="form-row"hidden >
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Rut</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="rut">
			        </div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Nombre del paciente</label>
			            <input type="text" class="form-control form-control-sm" name="nom_pcte" id="nom_pcte">
			        </div>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">Edad</label>
			            <input type="text" class="form-control form-control-sm" name="edad_pcte" id="edad_pcte">
			        </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
			            <label class="floating-label-activo-sm">N°</label>
			            <input type="text" class="form-control form-control-sm" name="edad_pcte" id="edad_pcte">
			        </div>
				</div>
                <!--Formulario / Menor de edad-->

                <!--Cierre: Formulario / Menor de edad-->
				<h6 class="mb-2" hidden>Paciente menor de edad o imposibilitado/a</h6>
				<div class="form-row">
                    @include('atencion_medica.generales.seccion_menor')
				</div>
				<div class="form-row" hidden>
					<div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Nombre del profesional</label>
						<input type="text" class="form-control form-control-sm" id="prof"name="prof" value="{{ $profesional->apellido_uno }}">
					</div>
				</div>
                <div class="form-row">
					<div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Diagnóstico</label>
						<input type="text" class="form-control form-control-sm" id="diagnostico_pre"name="diagnostico_pre" value="">
					</div>
                    <div class="form-group fill col-sm-12 col-md-6 col-lg-6 col-xl-6">
						<label class="floating-label-activo-sm">Cirugía o Procedimiento</label>
						<input type="text" class="form-control form-control-sm" id="cirugia"name="cirugia" value="">
					</div>
                    <div class="form-group fill col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<label class="floating-label-activo-sm">Nombre del consentimiento</label>
						<input  type="text" class="form-control form-control-sm" id="consentimiento"name="consentimiento" value="autocomplete">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<p>1. He consultado con el profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong> quien me ha explicado e informado,sobre el motivo, los objetivos y potenciales riesgos para mi salud , que este procedimiento conlleva.</p>
					</div>
				</div>
                <div class="row">
					<div class="div_cont1">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <strong>DECLARO:</strong>
                            <p class="p_ley">
                                1. Mediante este procedimiento se pretende resecar la parte de la vía aérea afecta para posteriormente realizar la unión de la tráquea a un bronquio principal. Para ello, se hace una intervención quirúrgica a través de una incisión por toracotomía o esternotomía.

                                La realización del procedimiento puede ser filmada con fines científicos o didácticos.
                                </p>

                                <p class="p_ley">
                                2. El médico me ha advertido que el procedimiento requiere la administración de anestesia y que es posible (excepcionalmente) que durante o después de la intervención sea necesaria la administración de sangre y/o hemoderivados, de cuyos riesgos me informarán los servicios de hematología y anestesiología.
                                </p>
                                <p class="p_ley">
                                3. Comprendo que a pesar de la adecuada elección de la técnica y de su correcta realización pueden presentarse efectos indeseables, tanto los comunes derivados de toda intervención y que pueden afectar a todos los órganos y sistemas, como otros específicos, sobre todo la fístula o dehiscencia de la anastomosis que cuando aparece en el inmediato postoperatorio obliga a una reintervención quirúrgica; sangrado en el postoperatorio inmediato que obligue a la revisión de la intervención; infección superficial de las heridas, persistencia de fugas aéreas por el drenaje pleural, dolor prolongado en la zona de la operación, infección de la cavidad pleural o del pulmón y persistencia del colapso pulmonar.
                                </p>
                                <p class="p_ley">
                                4. El médico me ha explicado que estas complicaciones habitualmente se resuelven con tratamiento médico, pero pueden llegar a requerir una reintervención, generalmente de urgencia, incluyendo un riesgo mínimo de mortalidad.

                                También sé que cabe la posibilidad que durante la cirugía haya que realizar modificaciones del procedimiento por los hallazgos intra operatorios para proporcionarme el tratamiento más adecuado.
                                </p>
                                <p class="p_ley">
                                5. Se me ha indicado la necesidad de advertir de mis posibles alergias medicamentosas, alteraciones de la coagulación, existencia de prótesis, marcapasos, medicaciones actuales o cualquier otra circunstancia.

                                Por mi situación vital actual (diabetes, obesidad, hipertensión, anemia, edad avanzada) puede aumentar la frecuencia o la gravedad de riesgos o complicaciones como: $codigo32.</p>

                                <p class="p_ley">He comprendido las explicaciones que se me han facilitado en un lenguaje claro y sencillo, y el facultativo que me ha atendido me ha permitido realizar todas las observaciones y me ha aclarado todas las dudas que le he planteado.

                                <p class="p_ley">También entiendo que, en cualquier momento y sin necesidad de dar ninguna explicación, puedo revocar el consentimiento que ahora presto.

                                <p class="p_ley">Por ello manifiesto que estoy complacido con la información recibida y que comprendo el alcance y los riesgos del tratamiento.

                                <p class="p_ley">Y en tales condiciones:</p>
                            <p class="p_ley">
                                CONSIENTO que se me realice este Procedimiento Quirúrgico.
                            </p>
                        </div>
                    </div>
		        </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm">Situaciones especiales del paciente</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="situaciones Especiales del paciente" id="situaciones Especiales del paciente"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Ver PDF</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-info btn-sm btn-block">Solicitar autorización</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-info btn-sm btn-block">Enviar</button>
                    </div>
                </div>
				<div class="row">
					<div class="col-sm-12col-md-12 col-lg-12 col-xl-12">
						<p>2. Al autorizar mediante email o por la app.,Me doy por informado y doy mi consentimiento para el procedimiento enunciado precedentemente</p>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>

