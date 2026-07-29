

<div style=" display: flex; flex-direction: row;">

    @include('general.secciones_ficha.video_llamada.seccion_jaas_container')

    <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
        <div class="col-md-12 py-0 px-2">
            <div class="row mx-0">
                <div class="col-sm-12 col-md-12">
                    <ul class="nav nav-tabs-secciones mb-3 mt-3" id="orl" role="tablist">
                        <li class="nav-item-secciones">
                            <a class="nav-secciones active text-uppercase" id="atencion_orl-tab" data-toggle="tab" href="#atencion_orl" role="tab" aria-controls="atencion_orl" aria-selected="true">Atención especialidad</a>
                        </li>
                       {{-- <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="rinofibro-tab" data-toggle="tab" href="#rinofibro" role="tab" aria-controls="rinofibro" aria-selected="false">Rinofibrolaringoscopía</a>
                        </li>--}}
                        <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="presupuesto-mascota-tab" data-toggle="tab" href="#presupuesto-mascota" role="tab" aria-controls="presupuesto-mascota" aria-selected="false">Presupuestos</a>
                        </li>
                        {{--  <li class="nav-item-secciones">
                            <a class="nav-secciones text-uppercase" id="ocho_par-tab" data-toggle="tab" href="#ocho_par" role="tab" aria-controls="ocho_par" aria-selected="false">8° par</a>
                        </li>  --}}
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
                    <form action="{{ route('fichaAtencion.registrar_ficha_vet_general') }}" method="POST">
                        <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="id_mascota_fc" value="{{ request('id_mascota') }}" id="id_mascota_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="mostrarpdf" id="mostrarpdf" value="0">
                        <input type="hidden" name="tipopdf" id="tipopdf" value="0">
                        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        @csrf
                        <div class="tab-content" id="orl-contenido">
                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                            <div class="tab-pane fade show active" id="atencion_orl" role="tabpanel" aria-labelledby="atencion_orl-tab">
                             
                                <div class="row">
                                    <!--FORMULARIOS-->

                                    <!--Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])
                                    <!--Cierre: Formulario / Menor de edad-->
                                    @include('general.secciones_ficha.motivo')
                                        @include('general.secciones_ficha.examenfisico')
                                   

                                     <!--CRONICOS / GES / CONFIDENCIAL -->
                                    @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')
                                    <!--Diagnóstico-->

                                    <!--HOSPITALIZACION-->
                                    {{--<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-a">
                                            <div class="card-header-a" id="hospitalizar_paciente">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#hospitalizar_paciente-c" aria-expanded="false" aria-controls="hospitalizar_paciente-c">
                                                   Hospitalizar paciente y Control post quirúrgico
                                                </button>
                                            </div>
                                            <div id="hospitalizar_paciente-c" class="collapse" aria-labelledby="hospitalizar_paciente" data-parent="#hospitalizar_paciente">
                                                <div class="card-body-aten-a shadow-none">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="pcte_qx" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset active" id="hosp_pcte_tab" data-toggle="tab" href="#hosp_pcte" role="tab" aria-controls="hosp_pcte" aria-selected="true">Hospitalizar</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link-aten text-reset" id="cont_operatorio-tab" data-toggle="tab" href="#cont_operatorio" role="tab" aria-controls="cont_operatorio" aria-selected="true">Control Post Quirúrgico</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <div class="tab-content" id="pcte_qx">
                                                                <div class="tab-pane fade show active" id="hosp_pcte" role="tabpanel" aria-labelledby="hosp_pcte_tab">
                                                                    @include('general.hospitalizacion.hospitalizar')
                                                                </div>
                                                                <div class="tab-pane fade show" id="cont_operatorio" role="tabpanel" aria-labelledby="cont_operatorio_tab">
                                                                    @include('general.secciones_ficha.cirugia_control.control_cirugia_general1')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}

                                    <!--Diagnóstico-->
                                    @include('general.secciones_ficha.diagnostico')
                                    <!--Diagnóstico-->

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                                    @include('general.secciones_ficha.seccion_receta_examen_comunes')
                                                    <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--GUARDAR O IMPRIMIR FICHA-->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="row mb-3">
                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn btn-purple mt-1" onclick="return validar_guardar_ficha_vet_general(true);" value="Guardar Ficha y Finalizar su Consulta">
                                                <input type="submit" class="btn btn-success mt-1" onclick="return validar_guardar_ficha_vet_general(false);" value="Guardar Ficha e ir a su Agenda">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->

                            </div>
                            <!--INFORME RINOFIBROLARINGOSCOPÍA-->
                         
                            <!--PRESUPUESTO CLINICO MASCOTA-->
                            <div class="tab-pane fade" id="presupuesto-mascota" role="tabpanel" aria-labelledby="presupuesto-mascota-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-0">
                                        <h6 class="f-18 text-c-blue mb-2">Presupuesto Clínico N° 33</h6>
                                    </div>
                                </div>
                                <input type="hidden" id="presupuesto_mascota_id_paciente" value="{{ $paciente->id }}">
                                <input type="hidden" id="presupuesto_mascota_id_profesional" value="{{ $profesional->id }}">
                                <input type="hidden" id="presupuesto_mascota_id_ficha_atencion" value="{{ $id_ficha_atencion }}">
                                <input type="hidden" id="presupuesto_mascota_id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                                <!--<div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" id="presupuesto_mascota_fecha">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Fecha control</label>
                                        <input type="date" class="form-control form-control-sm" id="presupuesto_mascota_fecha_control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Estado</label>
                                        <input type="number" class="form-control form-control-sm" id="presupuesto_mascota_estado">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Aprobado</label>
                                        <input type="number" class="form-control form-control-sm" id="presupuesto_mascota_aprobado">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="floating-label-activo-sm">Datos de atención</label>
                                        <textarea class="form-control form-control-sm" rows="3" id="presupuesto_mascota_datos"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_otros">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_observaciones">
                                    </div>
                                    <div class="col-md-12 text-center mb-3">
                                        <button type="button" class="btn btn-info" id="btn_guardar_presupuesto_mascota">Guardar presupuesto</button>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="presupuesto_mascota_resultado" class="text-center"></div>
                                    </div>
                                </div>-->
                                <!--NUEVO PRESUPUESTO-->
                                <div class="row">
                                    <div class="col-md-12 mb-0">
		                                <div class="card">
		                                    <div class="card-body">
		                                        <input type="hidden" id="presupuesto_mascota_id_paciente" value="{{ $paciente->id }}">
		                                        <input type="hidden" id="presupuesto_mascota_id_profesional" value="{{ $profesional->id }}">
		                                        <input type="hidden" id="presupuesto_mascota_id_ficha_atencion" value="{{ $id_ficha_atencion }}">
		                                        <input type="hidden" id="presupuesto_mascota_id_lugar_atencion" value="{{ $id_lugar_atencion }}">
		                                        <div class="form-row">
		                                        	<div class="form-group col-md-4">
		                                                <label class="floating-label-activo-sm">Nombre del presupuesto</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_nombre">
		                                            </div>
		                                        	<div class="form-group col-md-6">
		                                                <label class="floating-label-activo-sm">Clínica</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_clinica">
		                                            </div>
		                                            <div class="form-group col-md-2">
		                                                <label class="floating-label-activo-sm">Fecha</label>
		                                                <input type="date" class="form-control form-control-sm" id="presupuesto_mascota_fecha">
		                                            </div>
		                                            <div class="form-group col-md-4">
		                                                <label class="floating-label-activo-sm">Animal</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_animal">
		                                            </div>
		                                            <div class="form-group col-md-4">
		                                                <label class="floating-label-activo-sm">Especie</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_especie">
		                                            </div>
		                                            <div class="form-group col-md-4">
		                                                <label class="floating-label-activo-sm">Identificación</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_identificacion" placeholder="Microchip u otra documentación acreditativa">
		                                            </div>
		                                            <div class="form-group col-md-12">
		                                                <label class="floating-label-activo-sm">Observaciones</label>
		                                                <input type="text" class="form-control form-control-sm" id="presupuesto_mascota_observaciones">
		                                            </div>
		                                        </div>
		                                   </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
                                    <div class="col-md-12 mb-0">
	                                    <div class="card">
		                                    <div class="card-body">
		                                           <div class="form-row align-items-end">
		                                           	<div class="form-group col-md-6">
		                                           		<label class="floating-label-activo-sm">Diagnóstico</label>
		                                           		<select class="form-control form-control-sm" id="presupuesto_vet_diagnostico">
		                                           			<option value="">Seleccione</option>
		                                           			@foreach ($diagnosticos_vet as $diagnostico_vet)
		                                           				<option value="{{ $diagnostico_vet->id }}">{{ $diagnostico_vet->descripcion }}</option>
		                                           			@endforeach
		                                           		</select>
		                                           	</div>
		                                           	<div class="form-group col-md-4">
		                                           		<label class="floating-label-activo-sm">Tratamiento</label>
		                                           		<select class="form-control form-control-sm" id="presupuesto_vet_tratamiento">
		                                           			<option value="">Seleccione</option>
		                                           			@foreach ($tratamientos_vet as $tratamiento_vet)
		                                           				<option value="{{ $tratamiento_vet->id }}" data-valor="{{ $tratamiento_vet->valor ?? 0 }}">{{ $tratamiento_vet->descripcion }}</option>
		                                           			@endforeach
		                                           		</select>
		                                           	</div>
		                                           	<div class="form-group col-md-2">
		                                           		<button type="button" class="btn btn-sm btn-info btn-block" id="btn_agregar_presupuesto_vet">
		                                           			<i class="feather icon-plus"></i>Añadir a presupuesto
		                                           		</button>
		                                           	</div>
		                                           </div>
		                                           <div class="form-row">
		                                           		<div class="col-12">
		                                           			<div class="table-responsive">
		                                           				<table class="table table-sm table-bordered">
																  <thead>
																    <tr>
																      <th scope="col">Item</th>
																      <th scope="col">Descripción</th>
																      <th scope="col">Valor Unitario</th>
																      <th scope="col">Cantidad</th>
																      <th scope="col">Valor Total</th>
																      <th scope="col">Descuento</th>
																      <th scope="col">Acciones</th>
																    </tr>
																  </thead>
																  <tbody id="presupuesto_vet_items">
																  	@foreach ($presupuestos_vet as $presupuesto_vet)
																  		@php
																  			$valor_unitario = $presupuesto_vet->valor_tratamiento ?? $presupuesto_vet->valor ?? 0;
																  			$cantidad = $presupuesto_vet->cantidad ?? 1;
																  			$valor_total = $valor_unitario * $cantidad;
																  		@endphp
																  		<tr data-id="{{ $presupuesto_vet->id }}">
																  			<td>{{ $loop->iteration }}</td>
																  			<td>{{ $presupuesto_vet->diagnostico }} / {{ $presupuesto_vet->tratamiento }}</td>
																  			<td>${{ number_format($valor_unitario, 0, ',', '.') }}</td>
																  			<td>{{ $cantidad }}</td>
																  			<td>${{ number_format($valor_total, 0, ',', '.') }}</td>
																  			<td>0%</td>
																  			<td>
																  				<button type="button" class="btn btn-icon btn-danger btn-eliminar-presupuesto-vet" data-id="{{ $presupuesto_vet->id }}">
																  					<i class="feather icon-x"></i>
																  				</button>
																  			</td>
																  		</tr>
																  	@endforeach
																  </tbody>
																</table>
		                                           			</div>
		                                           		</div>
		                                           		<div class="col-12">
		                                           			<div class="table-responsive float-md-right" style="width: 300px">
		                                           				<table class="table table-sm table-bordered">
																  <tbody>
																	@php
																		$subtotal_presupuesto_vet = 0;
																		foreach ($presupuestos_vet as $presupuesto_vet) {
																			$valor_unitario = $presupuesto_vet->valor_tratamiento ?? $presupuesto_vet->valor ?? 0;
																			$cantidad = $presupuesto_vet->cantidad ?? 1;
																			$subtotal_presupuesto_vet += ($valor_unitario * $cantidad);
																		}
																		$iva_presupuesto_vet = $subtotal_presupuesto_vet * 0.19;
																		$total_presupuesto_vet = $subtotal_presupuesto_vet + $iva_presupuesto_vet;
																	@endphp
																    <tr>
																      <th class="bg-light">Descuento</th>
																      <td>0%</td>
																    </tr>
																    <tr>
																      <th class="bg-light">Subtotal </th>
																      <td id="presupuesto_vet_subtotal">${{ number_format($subtotal_presupuesto_vet, 0, ',', '.') }}</td>
																    </tr>
																    <tr>
																      <th class="bg-light">IVA (19%)</th>
																      <td id="presupuesto_vet_iva">${{ number_format($iva_presupuesto_vet, 0, ',', '.') }}</td>
																    </tr>
																    <tr>
																      <th class="bg-purple text-white">TOTAL</th>
																      <th class="text-purple" id="presupuesto_vet_total">${{ number_format($total_presupuesto_vet, 0, ',', '.') }}</th>
																    </tr>
																  </tbody>
																</table>
		                                           			</div>
		                                           		</div>
		                                           </div>
		                                           <hr>
		                                           <div class="form-row">
		                                            <div class="col-md-12 text-center mb-3">
		                                            	<button type="button" class="btn btn-sm btn-danger" id="btn_pdf_presupuesto_mascota"><i class="fas fa-file-pdf"></i> Generar PDF</button>
		                                            	<button type="button" class="btn btn-sm btn-primary" id="btn_envia_email_presupuesto_mascota"><i class="feather icon-mail"></i> Enviar a email</button>
		                                                <button type="button" onclick="window.print()" class="btn btn-sm btn-secondary" id="btn_imprimir_presupuesto_mascota"><i class="feather icon-printer"></i> Imprimir</button>
		                                                <button type="button" class="btn btn-sm btn-info" id="btn_guardar_presupuesto_mascota"><i class="feather icon-save"></i> Guardar presupuesto</button>
		                                            </div>
		                                            <div class="col-md-12">
		                                                <div id="presupuesto_mascota_resultado" class="text-center"></div>
		                                            </div>
		                                        </div>
		                                    </div>
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

</div>

@section('page-script-ficha-atencion')
    <script>
        $(document).ready(function() {
            $('#btn_guardar_presupuesto_mascota').on('click', function() {
                var payload = {
                    _token: '{{ csrf_token() }}',
                    id_paciente: $('#presupuesto_mascota_id_paciente').val(),
                    id_profesional: $('#presupuesto_mascota_id_profesional').val(),
                    id_ficha_atencion: $('#presupuesto_mascota_id_ficha_atencion').val(),
                    id_lugar_atencion: $('#presupuesto_mascota_id_lugar_atencion').val(),
                    fecha: $('#presupuesto_mascota_fecha').val(),
                    fecha_control: $('#presupuesto_mascota_fecha_control').val(),
                    estado: $('#presupuesto_mascota_estado').val(),
                    aprobado: $('#presupuesto_mascota_aprobado').val(),
                    datos_atencion: $('#presupuesto_mascota_datos').val(),
                    otros: $('#presupuesto_mascota_otros').val(),
                    observaciones: $('#presupuesto_mascota_observaciones').val()
                };

                $.ajax({
                    url: '{{ route('profesional.presupuesto_mascota.guardar') }}',
                    type: 'POST',
                    data: payload
                })
                .done(function(resp) {
                    $('#presupuesto_mascota_resultado')
                        .removeClass('text-danger')
                        .addClass('text-success')
                        .text(resp.msj || 'Presupuesto guardado.');
                })
                .fail(function(xhr) {
                    var mensaje = 'Error al guardar presupuesto.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    $('#presupuesto_mascota_resultado')
                        .removeClass('text-success')
                        .addClass('text-danger')
                        .text(mensaje);
                });
            });

            function formatearMoneda(valor) {
                if (valor === null || valor === undefined) return '-';
                var numero = Number(valor);
                if (Number.isNaN(numero)) return '-';
                return '$' + numero.toLocaleString('es-CL');
            }

            function actualizarCorrelativoPresupuesto() {
                $('#presupuesto_vet_items tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            function parsearMoneda(texto) {
                if (!texto) return 0;
                var limpio = texto.replace(/[^0-9]/g, '');
                return limpio ? Number(limpio) : 0;
            }

            function actualizarTotalesPresupuesto() {
                var subtotal = 0;
                $('#presupuesto_vet_items tr').each(function() {
                    var valorTotal = parsearMoneda($(this).find('td').eq(4).text());
                    subtotal += valorTotal;
                });
                var iva = Math.round(subtotal * 0.19);
                var total = subtotal + iva;

                $('#presupuesto_vet_subtotal').text(formatearMoneda(subtotal));
                $('#presupuesto_vet_iva').text(formatearMoneda(iva));
                $('#presupuesto_vet_total').text(formatearMoneda(total));
            }

            $('#btn_agregar_presupuesto_vet').on('click', function() {
                var diagnosticoId = $('#presupuesto_vet_diagnostico').val();
                var tratamientoId = $('#presupuesto_vet_tratamiento').val();

                if (!diagnosticoId || !tratamientoId) {
                    swal({
                        title: 'Aviso',
                        text: 'Seleccione diagnostico y tratamiento.',
                        icon: 'warning',
                    });
                    return;
                }

                var payload = {
                    _token: '{{ csrf_token() }}',
                    id_paciente: $('#presupuesto_mascota_id_paciente').val(),
                    id_profesional: $('#presupuesto_mascota_id_profesional').val(),
                    id_ficha_atencion: $('#presupuesto_mascota_id_ficha_atencion').val(),
                    id_lugar_atencion: $('#presupuesto_mascota_id_lugar_atencion').val(),
                    id_diagnostico: diagnosticoId,
                    id_tratamiento: tratamientoId
                };

                $.ajax({
                    url: '{{ route('profesional.presupuesto_vet.guardar_item') }}',
                    type: 'POST',
                    data: payload
                })
                .done(function(resp) {
                    if (!resp || resp.estado !== 1 || !resp.item) {
                        return;
                    }
                    var item = resp.item;
                    var valor = item.valor || 0;
                    var cantidad = item.cantidad || 1;
                    var total = valor * cantidad;

                    $('#presupuesto_vet_items').append(
                        '<tr data-id="' + item.id + '">' +
                        '<td></td>' +
                        '<td>' + item.diagnostico + ' / ' + item.tratamiento + '</td>' +
                        '<td>' + formatearMoneda(valor) + '</td>' +
                        '<td>' + cantidad + '</td>' +
                        '<td>' + formatearMoneda(total) + '</td>' +
                        '<td>0%</td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-icon btn-danger btn-eliminar-presupuesto-vet" data-id="' + item.id + '">' +
                        '<i class="feather icon-x"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>'
                    );

                    $('#presupuesto_vet_diagnostico').val('');
                    $('#presupuesto_vet_tratamiento').val('');
                    actualizarCorrelativoPresupuesto();
                    actualizarTotalesPresupuesto();
                    swal({
                        title: 'Agregado',
                        text: 'Tratamiento agregado al presupuesto.',
                        icon: 'success',
                    });
                })
                .fail(function(xhr) {
                    var mensaje = 'Error al agregar item.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                    });
                });
            });

            $('#presupuesto_vet_items').on('click', '.btn-eliminar-presupuesto-vet', function() {
                var id = $(this).data('id');
                if (!id) return;

                $.ajax({
                    url: '{{ route('profesional.presupuesto_vet.eliminar_item') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    }
                })
                .done(function(resp) {
                    if (!resp || resp.estado !== 1) {
                        return;
                    }
                    $('#presupuesto_vet_items').find('tr[data-id="' + id + '"]').remove();
                    actualizarCorrelativoPresupuesto();
                    actualizarTotalesPresupuesto();
                })
                .fail(function(xhr) {
                    var mensaje = 'Error al eliminar item.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                    });
                });
            });

            $('#btn_pdf_presupuesto_mascota').on('click', function() {
                var payload = {
                    _token: '{{ csrf_token() }}',
                    id_paciente: $('#presupuesto_mascota_id_paciente').val(),
                    id_ficha_atencion: $('#presupuesto_mascota_id_ficha_atencion').val(),
                    id_lugar_atencion: $('#presupuesto_mascota_id_lugar_atencion').val()
                };

                $.ajax({
                    url: '{{ route('profesional.generar_pdf_presupuesto_vet') }}',
                    type: 'POST',
                    data: payload
                })
                .done(function(resp) {
                    if (resp && resp.ruta) {
                        swal({
                            title: 'Reporte generado',
                            text: 'El reporte se ha generado correctamente.',
                            icon: 'success',
                            button: 'Aceptar'
                        }).then(function() {
                            var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(resp.ruta, 'Presupuesto veterinario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        });
                        return;
                    }

                    swal({
                        title: 'Error',
                        text: 'Ha ocurrido un error al generar el reporte.',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                })
                .fail(function(xhr) {
                    var mensaje = 'Error al generar PDF.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                });
            });

            $('#btn_envia_email_presupuesto_mascota').on('click', function() {
                var $btn = $(this);
                var payload = {
                    _token: '{{ csrf_token() }}',
                    id_paciente: $('#presupuesto_mascota_id_paciente').val(),
                    id_ficha_atencion: $('#presupuesto_mascota_id_ficha_atencion').val(),
                    id_lugar_atencion: $('#presupuesto_mascota_id_lugar_atencion').val()
                };

                $btn.prop('disabled', true);
                swal({
                    title: 'Enviando...',
                    text: 'Por favor espere.',
                    icon: 'info',
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });

                $.ajax({
                    url: '{{ route('profesional.enviar_presupuesto_vet_email') }}',
                    type: 'POST',
                    data: payload
                })
                .done(function(resp) {
                    $btn.prop('disabled', false);
                    swal.close();
                    if (resp && resp.estado === 1) {
                        swal({
                            title: 'Presupuesto enviado',
                            text: resp.msj || 'El presupuesto se envió correctamente.',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        return;
                    }

                    swal({
                        title: 'Error',
                        text: (resp && resp.msj) ? resp.msj : 'No fue posible enviar el presupuesto.',
                        icon: 'error',
                        button: 'Aceptar'
                    });
                })
                .fail(function(xhr) {
                    $btn.prop('disabled', false);
                    swal.close();
                    var mensaje = 'Error al enviar presupuesto.';
                    if (xhr.responseJSON && xhr.responseJSON.msj) {
                        mensaje = xhr.responseJSON.msj;
                    }
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                });
            });
            actualizarTotalesPresupuesto();
                     /** MENSAJE*/
       /** CARGAR mensaje */
            $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es opcional.');
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
            /* formatear rut */
            $("#solicitado_por_rut_rfl").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

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
                    $('#id_descripcion_cie').trigger('onchange');
                    return false;
                }
            });

            $("#lic_descripcion_cie").autocomplete({
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
                    $('#lic_descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_lic_descripcion_cie').val(ui.item.value); // save selected id to input
                    $('#id_lic_descripcion_cie').trigger('onchange');
                    return false;
                }
            });
			

           




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
        })

        /** MANEJO DE IMAGENES */
        var myDropzone ;
        Dropzone.options.misImagenes = {
            init:function()
            {
                myDropzone = this;
            },
            url: "{{ route('profesional.imagen.carga') }}",
            method: 'post',
            createImageThumbnails: true,
            addRemoveLinks: true,
            headers:{
                'X-CSRF-TOKEN' : CSRF_TOKEN,
                // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            },

            acceptedFiles: "image/*",
            maxFilesize: 4,
            maxFiles: 12,
            /** El texto utilizado antes de que se eliminen los archivos. */
            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo.",

            /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

            /**
             * El texto que se agregará antes del formulario alternativo.
             * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
             * ser ignorado.
             */
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

            /**
             * Si el tamaño del archivo es demasiado grande.
             * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
             */
             dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

            /** Si el archivo no coincide con el tipo de archivo. */
            dictInvalidFileType: "No puedes subir archivos de este tipo.",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
            dictCancelUpload: "Cancelar carga",

            /** El texto que se muestra si una carga se canceló manualmente */
            dictUploadCanceled: "Subida cancelada.",

            /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

            /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
            dictRemoveFile: "Eliminar archivo",

            /**
             * Se muestra si `maxFiles` es st y se excede.
             */
            dictMaxFilesExceeded: "No puede cargar más archivos.",

            // accept(file, done) {
            //     console.log('-------------accept-----------------------');
            //     cargar_lista_imagenes();
            //     return done();
            // },
            success: function(file, response){
                // console.log('-------------success-----------------------');
                registrar_imagen_respuesta(response);

                if (file.previewElement) {
                    return file.previewElement.classList.add("dz-success");
                }
            },
            error(file, message) {
                // console.log('-------------error-----------------------');
                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");
                    if (typeof message !== "string" && message.error)
                    {
                        message = message.error;
                    }
                    else
                    {
                        message = message.message;
                    }
                    for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                        node.textContent = message;
                    }
                }
            },
            removedfile(file) {
                // console.log('-------------removedfile-----------------------');
                eliminar_imagen_archivo(file);
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }
                return this._updateMaxFilesReachedClass();
            },
            canceled: function canceled(file) {
                cargar_lista_imagenes();
                return this.emit("error", file, this.options.dictUploadCanceled);
            },
        };



        var lista_imagenes = [];
        function actualizar_input_lista_imagenes() {
            $('#input_lista_imagenes').val(JSON.stringify(lista_imagenes));
        }

        function registrar_imagen_respuesta(response) {
            if (!response) {
                return;
            }
            var img_temp = typeof response === 'string' ? JSON.parse(response) : response;
            if (!img_temp || !img_temp.img) {
                return;
            }

            lista_imagenes.push([
                url = img_temp.img.url,
                nombre_origian = img_temp.img.original_file_name,
                nombre_img = img_temp.img.nombre_img,
                file_extension = img_temp.img.file_extension,
            ]);
            actualizar_input_lista_imagenes();
        }

        function eliminar_imagen_archivo(file) {
            var raw_response = file && (file.xhr ? file.xhr.response : file.response);
            if (!raw_response) {
                actualizar_input_lista_imagenes();
                return;
            }

            var img_temp = typeof raw_response === 'string' ? JSON.parse(raw_response) : raw_response;
            if (!img_temp || !img_temp.img || !img_temp.img.nombre_img) {
                actualizar_input_lista_imagenes();
                return;
            }

            lista_imagenes = lista_imagenes.filter(function (item) {
                return item[2] !== img_temp.img.nombre_img;
            });
            actualizar_input_lista_imagenes();
        }

        function cargar_lista_imagenes()
        {
            // console.log('--------------cargar_lista_imagenes----------------------');
            lista_imagenes = [];
            let temp  = myDropzone.getAcceptedFiles();
            $.each(temp, function( index, value )
            {
                if(value.status == "success")
                {
                    if(value.xhr !== undefined || value.response !== undefined)
                    {
                        var raw_response = value.xhr !== undefined ? value.xhr.response : value.response;
                        var img_temp = typeof raw_response === 'string' ? JSON.parse(raw_response) : raw_response;
                        lista_imagenes[index] = [
                            url=img_temp.img.url,
                            nombre_origian= img_temp.img.original_file_name,
                            nombre_img = img_temp.img.nombre_img,
                            file_extension = img_temp.img.file_extension,
                        ];
                        actualizar_input_lista_imagenes();
                    }
                }
            });


        }

        /** MANEJO DE IMAGENES */

        /** REGISTO ANTECEDENTES */
        function carga_campos_antecedente_nuevo()
        {
            if($('#tipo_antecedente').val()!='')
            {
                $('#div_campos_antecedente_nuevo').html('');
                var html = '';
                if($('#tipo_antecedente').val() == 'alergia')
                {
                    html +='';

                    html += '<div class="form-row">';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Seleccione</label>';
                    html += '        <input type="text" id="alergia_paciente" name="alergia_paciente" class="form-control form-control-sm"  value="">';
                    html += '        <input type="hidden" name="id_alergia_paciente" id="id_alergia_paciente" value=""/>';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '        <label class="floating-label-activo-sm">Detalle</label>';
                    html += '        <input type="text" name="alergia_comentario_paciente" id="alergia_comentario_paciente"  class="form-control form-control-sm"  value="">';
                    html += '    </div>';
                    html += '    <div class="form-group col-sm-6 col-md-6">';
                    html += '       <button type="button" class="btn btn-success btn-sm" onclick="agregar_alergia_paciente();">Guardar</button>';
                    html += '    </div>';
                    html += '</div>';

                    $('#div_campos_antecedente_nuevo').show();
                    $('#div_campos_antecedente_nuevo').html(html);

                     /** autocompletado de alergias */
                    $("#alergia_paciente").autocomplete({
                        source: function(request, response) {
                            // Fetch data
                            $.ajax({
                                url: "{{ route('alergias.ver_autocomplete') }}",
                                type: 'get',
                                dataType: "json",
                                data: {
                                    search: request.term
                                },
                                success: function(data) {
                                    console.log(data);
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            // Set selection
                            $('#alergia_paciente').val(ui.item.label); // display the selected text
                            $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                            return false;
                        }
                    });

                }
                if($('#tipo_antecedente').val() == 'enfermedades_cronicas')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'anestesias')
                {
                    html +='';
                }
                if($('#tipo_antecedente').val() == 'cirugia')
                {
                    html +='';
                }
            }
            else
            {
                $('#div_campos_antecedente_nuevo').hide();
                $('#div_campos_antecedente_nuevo').html('');
            }
        }

        function agregar_alergia_paciente() {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = $('#id_paciente_fc').val();
            let token = CSRF_TOKEN;
            var mensaje = '';
            var valido = 0;

            if(alergia=="")
            {
                mensaje +='Campo requerido alergia\n';
                valido = 1;
            }
            // if(id_alergia=="")
            // {
            //     mensaje +='Campo requerido id alergia\n';
            //     valido = 1;
            // }
            if(comentario=="")
            {
                mensaje +='Campo requerido Detalle\n';
                valido = 1;
            }
            if(paciente=="")
            {
                mensaje +='Campo requerido paciente\n';
                valido = 1;
            }

            if(valido == 0)
            {
                swal({
                    title: "Alergia agregada correctamente. ***PENDIDENTE POR HACER***",
                    icon: "success",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
            else
            {
                swal({
                    title: "Campo Requerido en registro de Alergia. ***PENDIDENTE POR HACER***",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }


            // let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: CSRF_TOKEN,
            //         alergia: alergia,
            //         id_alergia: id_alergia,
            //         comentario: comentario,
            //         paciente: paciente
            //     },
            // })
            // .done(function(response) {

            //     if (response.success) {
            //         swal({
            //             title: "Alergia agregada correctamente",
            //             icon: "success",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });

            //         $('#alergia_paciente').val('');
            //         $('#id_alergia_paciente').val('');

            //     }
            //     else
            //     {
            //         swal({
            //             title: "Error al agregar alergia",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         })
            //     }

            //     return response;
            // })
            // .fail(function() {
            //     console.log("error");
            // });

        }
        /** FIN REGISTRO ANTECEDENTES  */


        function cargarIgual(input)
        {

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                console.log(value);
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });

            // let actual = $('#'+input);
            // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            // equivalente.val(actual.val());

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

        // function abrir_modal_guardar_tipo()
        // {
        //     $('#modal_registrar_ficha_tipo_orl').modal('show');
        //     cargarSeccion('registro_f_t_orl_detalle');
        // }

        function abrir_modal_guardar_tipo(div_id_data, div_id_detalle, tipo)
        {
            $('#f_t_orl_tipo').val(tipo);
            $("#btn_modal_registrar_ficha_tipo_orl").unbind();

            $('#modal_registrar_ficha_tipo_orl').modal('show');

            cargarSeccion(div_id_detalle, div_id_data);
        }

        function cargarSeccion(div_destino, div_id_data)
        {
            // var tipo = $('#'+select+'').val();
            $('#'+div_destino).html('');
            var seccion_actual = '';
            var seccion_previa = '';
            $('#'+div_id_data).find('select,textarea').each(function(key, elemento)
            {
                html ='';
                // if(seccion_previa == '' && seccion_actual == '')
                if(key == 0)
                {
                    seccion_actual = $(elemento).data('seccion').trim();
                    seccion_previa = $(elemento).data('seccion').trim();

                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }
                else
                {
                    if($(elemento).data('seccion'))
                        seccion_actual = $(elemento).data('seccion').trim();
                }

                if(seccion_actual !== seccion_previa)
                {
                    html +='<hr>';
                    html +='<div class="row"><div class="col-md-12 text-center"><h6 style="color: #3e55c3;">'+seccion_actual+'</h6></div></div>';
                    html +='<hr>';
                }

                html +='<div class="row" style="margin-top:10px;">';
                if($(elemento).prop('nodeName') == 'SELECT')
                {
                    if($(elemento).val() == 0)
                        $(elemento).val(1)

                    html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    html +='<div class="col-md-5">';
                    html +='    '+$('#'+$(elemento).attr('id')+' option:selected').text()+'';
                    html +='    <input type="hidden" name="modal_agregar_tipo_'+$(elemento).attr('id')+'" id="modal_agregar_tipo_'+$(elemento).attr('id')+'" value="'+$(elemento).val()+'">';
                    html +='</div>';
                    html +='<div class="col-md-2"></div>';
                }
                else if($(elemento).prop('nodeName') == 'TEXTAREA')
                {
                    if($(elemento).data('tipo'))
                        html +='<div class="col-md-5">'+$(elemento).data('titulo')+'</div>';
                    else
                        html +='<div class="col-md-5">Detalle</div>';
                    html +='<div class="col-md-5">';
                    html +='    <textarea class="form-control caja-texto form-control-sm '+$(elemento).attr('id')+'_editar" style="display:none;" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="observaciones_'+$(elemento).attr('id')+'" id="observaciones_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</textarea>';
                    html +='    <label class="'+$(elemento).attr('id')+'_mostrar" id="label_observacion_'+$(elemento).attr('id')+'">'+$(elemento).val()+'</label>';
                    html +='</div>';
                    html +='<div class="col-md-2">';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_mostrar"  onclick="cambiar_div(\''+$(elemento).attr('id')+'_editar'+'\',\''+$(elemento).attr('id')+'_mostrar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Editar</button>';
                    html +='    <button class="btn btn-sm btn-success '+$(elemento).attr('id')+'_editar" style="display:none;" onclick="cambiar_div(\''+$(elemento).attr('id')+'_mostrar'+'\',\''+$(elemento).attr('id')+'_editar'+'\',\'label_observacion_'+$(elemento).attr('id')+'\',\'observaciones_'+$(elemento).attr('id')+'\')">Guardar</button>';
                    html +='</div>';
                }
                html +='</div>';
                $('#'+div_destino).append(html);
                seccion_previa = $(elemento).data('seccion');
            });
        }

        function cambiar_div(mostrar, ocultar, label, textarea)
        {
            $('.'+mostrar).show();
            $('.'+ocultar).hide();
            $('#'+label).html( $('#'+textarea).val() );
        }

        function guardar_tipo_ficha_otorrino()
        {
            var f_t_orl_tipo = $('#f_t_orl_tipo').val();
            var registro_f_t_orl_nombre = $('#registro_f_t_orl_nombre').val();
            var registro_f_t_orl_descripcion = $('#registro_f_t_orl_descripcion').val();
            var _token = CSRF_TOKEN;
            if(registro_f_t_orl_nombre == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Nombre",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }
            if(registro_f_t_orl_descripcion == ''){
                swal({
                        title: "Problema al Registrar Tipo Ficha.\n Campo requedido Descripcion",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                    return false;
            }


            var data = [];
            data.registro_f_t_orl_nombre = registro_f_t_orl_nombre;
            data.registro_f_t_orl_descripcion = registro_f_t_orl_descripcion;

            $('#registro_f_t_orl_detalle').find('input,textarea').each(function(key, elemento){
                //console.log($(elemento).attr('id'));
                //console.log($(elemento).val());
                //console.log($(elemento).prop('nodeName'));
                //console.log('*******');

                data[$(elemento).attr('id')] = $(elemento).val();

            });

            console.log(data);

            url = "{{ route('profesional.ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional : $('#id_profesional').val(),

                    tipo : f_t_orl_tipo,

                    modal_agregar_tipo_apreciacion_auditiva :  data.modal_agregar_tipo_apreciacion_auditiva,
                    modal_agregar_tipo_apreciacion_resp :  data.modal_agregar_tipo_apreciacion_resp,
                    modal_agregar_tipo_disfonia :  data.modal_agregar_tipo_disfonia,
                    modal_agregar_tipo_ex_boca :  data.modal_agregar_tipo_ex_boca,
                    modal_agregar_tipo_examen_bio_od :  data.modal_agregar_tipo_examen_bio_od,
                    modal_agregar_tipo_examen_bio_oi :  data.modal_agregar_tipo_examen_bio_oi,
                    modal_agregar_tipo_examen_faringe :  data.modal_agregar_tipo_examen_faringe,
                    modal_agregar_tipo_examen_fnd :  data.modal_agregar_tipo_examen_fnd,
                    modal_agregar_tipo_examen_fni :  data.modal_agregar_tipo_examen_fni,
                    modal_agregar_tipo_examen_laringe :  data.modal_agregar_tipo_examen_laringe,
                    modal_agregar_tipo_examen_od :  data.modal_agregar_tipo_examen_od,
                    modal_agregar_tipo_examen_oi :  data.modal_agregar_tipo_examen_oi,
                    modal_agregar_tipo_nariz_general :  data.modal_agregar_tipo_nariz_general,
                    modal_agregar_tipo_usa_audifono :  data.modal_agregar_tipo_usa_audifono,
                    observaciones_aprec_auditiva_def :  data.observaciones_aprec_auditiva_def,
                    observaciones_aprec_resp_def :  data.observaciones_aprec_resp_def,
                    observaciones_audifono :  data.observaciones_audifono,
                    observaciones_det_disfonia :  data.observaciones_det_disfonia,
                    observaciones_det_nariz_general :  data.observaciones_det_nariz_general,
                    observaciones_detalle_ex_boca :  data.observaciones_detalle_ex_boca,
                    observaciones_ex_farige_anormal :  data.observaciones_ex_farige_anormal,
                    observaciones_ex_fnd_anormal :  data.observaciones_ex_fnd_anormal,
                    observaciones_ex_fni_anormal :  data.observaciones_ex_fni_anormal,
                    observaciones_ex_larige_anormal :  data.observaciones_ex_larige_anormal,
                    observaciones_ex_od_anormal :  data.observaciones_ex_od_anormal,
                    observaciones_ex_oi_anormal :  data.observaciones_ex_oi_anormal,
                    observaciones_obs_ex_biom :  data.observaciones_obs_ex_biom,
                    observaciones_obs_ex_nasal :  data.observaciones_obs_ex_nasal,
                    observaciones_obs_ex_oidos :  data.observaciones_obs_ex_oidos,
                    observaciones_obs_ex_orl :  data.observaciones_obs_ex_orl,
                    observaciones_obs_examen_bio_od :  data.observaciones_obs_examen_bio_od,
                    observaciones_obs_examen_bio_oi :  data.observaciones_obs_examen_bio_oi,
                    observaciones_obs_examen_laringe :  data.observaciones_obs_examen_laringe,
                    registro_f_t_orl_descripcion :  data.registro_f_t_orl_descripcion,
                    registro_f_t_orl_nombre :  data.registro_f_t_orl_nombre,

                    modal_agregar_tipo_episodios: data.modal_agregar_tipo_episodios,
                    observaciones_detalle_episodios: data.observaciones_detalle_episodios,
                    modal_agregar_tipo_equilibrio: data.modal_agregar_tipo_equilibrio,
                    observaciones_detalle_equilibrio: data.observaciones_detalle_equilibrio,
                    modal_agregar_tipo_ng: data.modal_agregar_tipo_ng,
                    observaciones_detalle_ng: data.observaciones_detalle_ng,
                    modal_agregar_tipo_sint_acomp: data.modal_agregar_tipo_sint_acomp,
                    observaciones_detalle_sint_acompanantes: data.observaciones_detalle_sint_acompanantes,
                    modal_agregar_tipo_vertigo: data.modal_agregar_tipo_tipo_vertigo,
                    observaciones_detalle_tipo_vertigo: data.observaciones_detalle_tipo_vertigo,
                    observaciones_vestibular: data.observaciones_obs_vestibular,

                    modal_agregar_tipo_piel_tegumnto: data.modal_agregar_tipo_piel_tegumnto,
                    observaciones_obs_piel_tegumnto: data.observaciones_obs_piel_tegumnto,
                    modal_agregar_tipo_adenopatias: data.modal_agregar_tipo_adenopatias,
                    observaciones_obs_adenopatias: data.observaciones_obs_adenopatias,
                    modal_agregar_tipo_tumores_masas: data.modal_agregar_tipo_tumores_masas,
                    observaciones_obs_tumores_masas: data.observaciones_obs_tumores_masas,
                    modal_agregar_tipo_gland_anexas: data.modal_agregar_tipo_gland_anexas,
                    observaciones_obs_gland_anexas: data.observaciones_obs_gland_anexas,
                },
            })
            .done(function(data)
            {
                // console.log('-----------------------');
                // console.log(data);
                // console.log('-----------------------');
                if(data.estado == 1)
                {
                    $('#modal_registrar_ficha_tipo_orl').modal('hide');
                    swal({
                        title: "Tipo Ficha Registrado",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
                else{

                    swal({
                        title: "Problema al Registrar Tipo Ficha.",
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

        function cargar_info_ficha_tipo_orl(select, div_descripcion, seccion)
        {
            let id_ft = $('#'+select).val();
            if(id_ft == '')
            {
                $('#'+div_descripcion).html('');
                $('#'+seccion).find('select,textarea').each(function(key, elemento){
                    if($(elemento).prop('nodeName') == 'SELECT')
                    {
                        $(elemento).val(0);
                    }
                    else
                    {
                        $(elemento).val('');
                    }
                });

                evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

                evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);
                return false;
            }
            $('#'+div_descripcion).html($('#'+select+' option:selected').attr('data-descripcion'));

            url = "{{ route('profesional.buscar_ficha_tipo_otorrino') }}";
            $.ajax({

                url: url,
                type: "GET",
                data: {
                    id_profesional : $('#id_profesional').val(),
                    id_ficha_tipo :  id_ft,
                },
            })
            .done(function(data)
            {
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        if(index == 'id_usa_audifono')
                            index = 'usa_audifono';

                        if(index == 'id_tipo_episodios')
                            index = 'episodios';

                        if(index == 'id_tipo_equilibrio')
                            index = 'equilibrio';

                        if(index == 'id_tipo_ng')
                            index = 'ng';

                        if(index == 'id_tipo_sint_acomp')
                            index = 'sint_acomp';

                        if(index == 'id_tipo_vertigo')
                            index = 'tipo_vertigo';

                        if(index == 'obs_tipo_vertigo')
                            index = 'detalle_tipo_vertigo';

                        if(index == 'obs_sint_acomp')
                            index = 'detalle_sint_acompanantes';

                        if(index == 'obs_ng')
                            index = 'detalle_ng';

                        if(index == 'obs_episodios')
                            index = 'detalle_episodios';

                        if(index == 'obs_equilibrio')
                            index = 'detalle_equilibrio';

                        $('#'+index).val(value);
                    });

                    evaluar_para_carga_detalle('usa_audifono','div_detalle_usa_audifono','audifono',5);
                    evaluar_para_carga_detalle('apreciacion_auditiva','div_detalle_apreciacion_auditiva','aprec_auditiva_def',2);
                    evaluar_para_carga_detalle('examen_oi','div_detalle_examen_oi','ex_oi_anormal',2);
                    evaluar_para_carga_detalle('examen_od','div_detalle_examen_od','ex_od_anormal',2);
                    evaluar_para_carga_detalle('examen_bio_oi','div_obs_examen_bio_oi','obs_examen_bio_oi',2);
                    evaluar_para_carga_detalle('examen_bio_od','div_obs_examen_bio_od','obs_examen_bio_od',2);
                    evaluar_para_carga_detalle('tipo_vertigo','div_detalle_tipo_vertigo','detalle_tipo_vertigo',3);
                    evaluar_para_carga_detalle('sint_acomp','div_detalle_sintomas_acompanantes','detalle_sint_acompanantes',3);
                    evaluar_para_carga_detalle('ng','div_detalle_ng','detalle_ng',2);
                    evaluar_para_carga_detalle('episodios','div_detalle_episodios','detalle_episodios',3);
                    evaluar_para_carga_detalle('equilibrio','div_detalle_equilibrio','detalle_equilibrio',2);
                    evaluar_para_carga_detalle('nariz_general','div_detalle_nariz_gen','det_nariz_general',2);
                    evaluar_para_carga_detalle('apreciacion_resp','div_detalle_nariz_resp','aprec_resp_def',2);
                    evaluar_para_carga_detalle('examen_fni','div_detalle_examen_fni','ex_fni_anormal',2);
                    evaluar_para_carga_detalle('examen_fnd','div_detalle_examen_fnd','ex_fnd_anormal',2);
                    evaluar_para_carga_detalle('disfonia','div_disfonia','det_disfonia',2);
                    evaluar_para_carga_detalle('ex_boca','div_detalle_ex_boca','detalle_ex_boca',2);
                    evaluar_para_carga_detalle('examen_faringe','div_detalle_examen_faringe','ex_farige_anormal',2);
                    evaluar_para_carga_detalle('examen_laringe','div_detalle_examen_laringe','ex_larige_anormal',2);

                    evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);
                    evaluar_para_carga_detalle('adenopatias','div_adenopatias','obs_adenopatias',2);
                    evaluar_para_carga_detalle('tumores_masas','div_tumores_masas','obs_tumores_masas',2);
                    evaluar_para_carga_detalle('gland_anexas','div_gland_anexas','obs_gland_anexas',2);

                }
                else{

                    swal({
                        title: "Problema al Cargar Tipo Ficha.",
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

        function validar_guardar_ficha_vet_general(cerrarSesion) {
            var motivo = $.trim($('[name="motivo"]').first().val() || '');
            var diagnostico = $.trim($('[name="descripcion_hipotesis"]').first().val() || '');

            if (motivo === '' || diagnostico === '') {
                swal({
                    title: "Registro de Ficha Clínica.",
                    text: "El Motivo y el Diagnóstico son requeridos.\n Su Ficha Clínica NO ha sido guardada aún.",
                    icon: "error",
                });
                return false;
            }

            if (cerrarSesion) {
                $('#cerrarsession').val('1');
            } else {
                $('#cerrarsession').val('0');
            }

            agregar_medicamentos_ficha();
            agregar_examenes_ficha();
            return true;
        }

        $(function () {
            if (typeof Dropzone === 'undefined') {
                return;
            }

            var dropzoneElement = document.getElementById('mis-imagenes');
            if (!dropzoneElement) {
                return;
            }

            var existing = null;
            if (Dropzone.instances && Dropzone.instances.length) {
                Dropzone.instances.forEach(function (instance) {
                    if (instance.element && instance.element.id === 'mis-imagenes') {
                        existing = instance;
                    }
                });
            }

            if (existing) {
                myDropzone = existing;
            } else {
                myDropzone = new Dropzone('#mis-imagenes', Dropzone.options.misImagenes);
            }
        });

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_por_nombre_rfl').val('');
                            $('#solicitado_por_apellido_rfl').val('');
                            $('#solicitado_por_telefono_rfl').val('');
                            $('#solicitado_por_email_rfl').val('');
                            // $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        // $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
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

        // ALERTA DE ATENCION
        // window.setTimeout(function() {
        //     $(".alert-atencion").fadeTo(500, 0).slideUp(600, function(){
        //         $(this).remove();
        //     });
        // }, 5000);

         /** PERVISUALIZACION DE EXAMEN */
        function visualizar_pdf_examen(tipo_examen)
        {
            if(tipo_examen!='')
            {
                var array_datos = {};
                $('.div_form_examen_'+tipo_examen).find('input,textarea,select').each(function (key, element){
                    var key_temp = element.id.replace('_'+tipo_examen,'');

                    if(key_temp == 'biopsia')
                    {
                        if(element.value == 1)
                        {
                            array_datos[key_temp] = 'SI';
                        }
                        else
                        {
                            array_datos[key_temp] = 'NO';
                        }
                    }
                    else
                    {
                        array_datos[key_temp] = element.value;
                    }
                });

                var imagenes = $('#input_lista_imagenes').val();
                if(imagenes != '')
                {
                    imagenes = JSON.parse(imagenes);
                    imagenes = JSON.stringify(JSON.stringify(imagenes[tipo_examen]));
                    console.log(imagenes );
                }

                var data ='id_ficha='+$('#id_fc').val()+'&contenido='+JSON.stringify(array_datos)+'&imagenes='+imagenes;
                Fancybox.show(
                    [
                        {
                        src: '{{ route("pdf.visualizar.examen") }}?'+data,
                        type: "iframe",
                        preload: false,
                        },
                    ]
                );
            }
            else
            {
                console.log('tipo examen no especificado');
            }
        }

        function aplicar_datos_formulario(data) {
            if (!data || Object.keys(data).length === 0) {
                return;
            }

            Object.keys(data).forEach(function (key) {
                if (key === '_token') {
                    return;
                }

                var value = data[key];
                if (value === null || value === '') {
                    return;
                }

                var $fields = $('[name="' + key + '"]');
                if ($fields.length === 0) {
                    return;
                }

                $fields.each(function () {
                    var $field = $(this);
                    if ($field.is(':checkbox')) {
                        if (Array.isArray(value)) {
                            $field.prop('checked', value.indexOf($field.val()) !== -1);
                        } else {
                            $field.prop('checked', $field.val() == value || value === true);
                        }
                        return;
                    }

                    if ($field.is(':radio')) {
                        $field.prop('checked', $field.val() == value);
                        return;
                    }

                    $field.val(value);
                    $field.trigger('change');
                });
            });
        }

        function cargar_ficha_vet_general() {
            var data = @json($fichaVeterinariaGeneralData ?? []);
            aplicar_datos_formulario(data);

            var oldData = @json(session()->getOldInput() ?? []);
            aplicar_datos_formulario(oldData);
        }

        $(function () {
            cargar_ficha_vet_general();
        });

    </script>
@endsection
