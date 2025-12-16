<div id="ingreso_sol_pab_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ingreso_sol_pab_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Solicitar pabellón - <script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                        var f=new Date();
                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                        </script></h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarspab();"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="sol_pab_info-ingreso-tab" data-toggle="tab" href="#sol_pab_info-ingreso" role="tab" aria-controls="sol_pab_info-ingreso" aria-selected="true">Info. Ingreso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="sol_pab_cirugia-pab-tab" data-toggle="tab" href="#sol_pab_cirugia-pab" role="tab" aria-controls="sol_pab_cirugia-pab" aria-selected="false">Cirugía</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="sol_pab_equipo-pab-tab" data-toggle="tab" href="#sol_pab_equipo-pab" role="tab" aria-controls="sol_pab_equipo-pab" aria-selected="false">Equipo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="sol_pab_comentarios-pab-tab" data-toggle="tab" href="#sol_pab_comentarios-pab" role="tab" aria-controls="sol_pab_comentarios-pab" aria-selected="false">Comentarios</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-nutricional">
                            <!--INFO. INGRESO-->
                            <div class="tab-pane fade show active" id="sol_pab_info-ingreso" role="tabpanel" aria-labelledby="sol_pab_info-ingreso-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue mb-2">INFORMACIÓN DE PACIENTE</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                		<div class="card-informacion mb-4">
                                			<div class="card-body pb-1">
                                				<div class="form-row">
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0">Nombre</label>
				                                        <label class="label ml-0">{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0">Edad</label>
				                                        <label class="label ml-0">{{ \Carbon\Carbon::createFromDate($paciente->fecha_nac)->age; }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0">Previsión</label>
				                                        <label class="label ml-0">{{ $paciente->Prevision->first()->nombre }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0">Teléfono</label>
				                                        <label class="label ml-0">{{ $paciente->telefono_uno }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0">Email</label>
				                                        <label class="label ml-0">{{ $paciente->email }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-0">
				                                        <label class="label font-weight-bold ml-0"><span class="text-danger">Enfermedades Crónicas:</span>

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
				                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 mt-2">
				                                        <label class="floating-label-activo-sm">Otros Antecedentes Médicos</label>
				                                        <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_otros_antecedentes_m" id="ingreso_sol_pab_modal_otros_antecedentes_m" value="">
				                                        <input type="hidden" name="ingreso_sol_pab_modal_patalogias_cronicas" id="ingreso_sol_pab_modal_patalogias_cronicas" value="{{ $patalogias_cronicas }}">
				                                    </div>
				                                 </div>
			                                </div>
			                            </div>
			                        </div>
                                </div>

 								 <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue mb-2">INFORMACIÓN DEL PROFESIONAL SOLICITANTE</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                		<div class="card-informacion mb-4">
                                			<div class="card-body pb-0">
                                				<div class="form-row">
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 pl-0">
				                                        <label class="label"><strong>Nombre: </strong></label>
				                                        <label class="label">{{ $profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos }}</label>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 pl-0">
				                                        <label class="label"><strong>Especialidad: </strong></label>
				                                        <label class="label">
				                                            @if($profesional->SubTipoEspecialidad()->first())
				                                                {{ $profesional->SubTipoEspecialidad()->first()->nombre }}
				                                            @else
				                                                {{ $profesional->TipoEspecialidad()->first()->nombre }}
				                                            @endif
				                                        </label>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
                                </div>

                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue mb-2">INFORMACIÓN DE INGRESO</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                		<div class="card-informacion mb-4">
                                			<div class="card-body pb-0">
                                				<div class="form-row">
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
				                                        <label class="floating-label-activo-sm">Clínica - Hospital</label>
				                                        <input type="text" class="form-control form-control-sm" id="ingreso_sol_pab_modal_hospital" name="ingreso_sol_pab_modal_hospital" value="{{ $lugar_atencion->nombre }}" placeholder="Ingrese Email o WhatsApp">
				                                        <input type="hidden" name="ingreso_sol_pab_modal_id_hospital" id="ingreso_sol_pab_modal_id_hospital" value="">
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
				                                        <label class="floating-label-activo-sm">Diagnósticos </label>
				                                        <textarea class="form-control caja-texto form-control-sm " rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="ingreso_sol_pab_modal_diagnostico_preoperatorio" id="ingreso_sol_pab_modal_diagnostico_preoperatorio"></textarea>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
				                                        <div class="form-group">
				                                            <label class="floating-label-activo-sm">Tipo pabellón</label>
				                                            <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_tipo_cirugia" id="ingreso_sol_pab_modal_tipo_cirugia">
				                                        </div>
				                                    </div>
			                                    </div>
			                                 </div>
			                            </div>
			                        </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue mb-2">CONSENTIMIENTO INFORMADO</h6>
                                    </div>
                                </div>

                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                		<div class="card-informacion mb-4">
                                			<div class="card-body pb-0">
			                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 pl-0">
			                                        @if ($paciente->ConConsentimientoPctActiva()->get())
			                                            @foreach ( $paciente->ConConsentimientoPctActiva()->get() as $consentimiento)
			                                                @if($consentimiento->id_fc == $id_ficha_atencion)
			                                                    <button class="btn btn-danger m-1" onclick="ver_pdf_consentimiento('{{ $consentimiento->id }}', '{{ $id_ficha_atencion }}');">Descargar PDF - {{ $consentimiento->Consentimiento()->first()->nombre }}</button>
			                                                 @endif
			                                            @endforeach
                                                    @else
			                                                 <span class="badge badge-warning f-16">No disponible</span>
			                                        @endif
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
                                </div>
                            </div>
                            <!--CIRUGIA-->
                            <div class="tab-pane fade show" id="sol_pab_cirugia-pab" role="tabpanel" aria-labelledby="sol_pab_cirugia-pab-tab">

                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen mb-2">CIRUGÍA</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                                	<div class="card-informacion">
	                                		<div class="card-body">
	                                			<div class="form-row">
				                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-3">
				                                        <label class="floating-label-activo-sm">Urgencia Quirúrgica</label>
				                                        <select class="form-control form-control-sm" name="ingreso_sol_pab_modal_grado_urgencia" id="ingreso_sol_pab_modal_grado_urgencia">
				                                            <option value="1">Electiva</option>
				                                            <option value="2">Urgencia Quirúrgica</option>
				                                        </select>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-6">
				                                        <label class="floating-label-activo-sm">Tipo de cirugía (Nombre)</label>
				                                        <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_operacion" id="ingreso_sol_pab_modal_operacion">
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-3">
				                                        <label class="floating-label-activo-sm">Código Cirugia</label>
				                                        <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_cirugia" id="ingreso_sol_pab_modal_cirugia" readonly>
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6">
				                                        <label class="floating-label-activo-sm">Anestésia</label>
				                                        <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_anestesia" id="ingreso_sol_pab_modal_anestesia">
				                                    </div>
				                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-6">
				                                        <label class="floating-label-activo-sm">Fecha y hora solicitada</label>
				                                        <input type="datetime-local" class="form-control form-control-sm" name="ingreso_sol_pab_modal_fecha_hora_operacion" id="ingreso_sol_pab_modal_fecha_hora_operacion">
				                                    </div>
				                                </div>
			                                </div>
			                            </div>
			                        </div>
                                </div>
                            </div>

                            <!--EQUIPO-->
                            <div class="tab-pane fade show" id="sol_pab_equipo-pab" role="tabpanel" aria-labelledby="sol_pab_equipo-pab-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="tit-gen mb-3">EQUIPO</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                	<div class="card-informacion">
                                		<div class="card-body">
                                			<div class="form-row">
			                                    <div class="form-group col-md-6 col-lg-6 col-xl-5">
			                                        <label class="floating-label-activo-sm">Cargar Equipo</label>
			                                        <select class="form-control form-control-sm" name="ingreso_sol_pab_modal_mi_equipo" id="ingreso_sol_pab_modal_mi_equipo" onchange="cargar_mi_equipo('ingreso_sol_pab_modal_mi_equipo','lista_profesionales');">
			                                            <option value="0">Seleccione</option>
			                                        </select>
			                                        <input type="hidden" name="ingreso_sol_pab_modal_lista_profesionales" id="ingreso_sol_pab_modal_lista_profesionales" value="">
			                                    </div>
			                                    <div class="col-md-12 mb-2">
			                                        <div class="form-row lista_profesionales">

			                                        </div>
			                                    </div>
			                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
			                                        <label class="floating-label-activo-sm">Instrumental especial</label>
			                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ingreso_sol_pab_modal_equipamiento_especial" id="ingreso_sol_pab_modal_equipamiento_especial"></textarea>
			                                    </div>
			                                </div>
			                            </div>
                                	</div>
                                	</div>
                            	</div>
                            </div>
                            <!--COMENTARIOS-->
                            <div class="tab-pane fade show" id="sol_pab_comentarios-pab" role="tabpanel" aria-labelledby="sol_pab_comentarios-pab-tab">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                    	<h6 class="mb-3 tit-gen">OTROS</h6>
                                	</div>
                                </div>
                            	<div class="form-row">
                                	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
	                                	<div class="card-informacion">
	                                		<div class="card-body">
	                                			<div class="form-row">
				                                    <div class="col-sm-12 col-md-12 col-lg-12 form-group">
				                                    	<label class="floating-label-activo-sm">Comentarios</label>
				                                    	<textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ingreso_sol_pab_modal_comentarios" id="ingreso_sol_pab_modal_comentarios"></textarea>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_pabellon()"><i class="feather icon-file"></i> PDF</button>
                <button type="button" class="btn btn-sm btn-info" onclick="registrar_solicitud_pabellon();"><i class="feather icon-save" ></i> Guardar y enviar solicitud</button>
            </div>
        </div>
    </div>
</div>


<script>

/*CERRAR MODAL*/
    function cerrarspab()
    {
        $('#ingreso_sol_pab_modal').modal('show');
    }
    function cerrarspab() {
        $('#ingreso_sol_pab_modal').modal ('hide');
      }
/*CIERRE: CERRAR MODAL*/



    $(document).ready(function ()
    {
        /** autocomplete de tipo cirugia */
        $("#ingreso_sol_pab_modal_operacion").autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('fonasa.buscar.por.nombre.autocomplete') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        console.log(data.length);
                        if( data.length == 0 )
                        {
                            $('#ingreso_sol_pab_modal_cirugia').val('');
                        }
                        else
                        {
                            $('#ingreso_sol_pab_modal_cirugia').val('');
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#ingreso_sol_pab_modal_operacion').val(ui.item.label); // display the selected text
                $('#ingreso_sol_pab_modal_cirugia').val(ui.item.codigo); // save selected id to input

                return false;
            }
        });
    });

    function sol_pabellon() {
        $('#ingreso_sol_pab_modal').modal('show');
        cargar_lista_equipos('ingreso_sol_pab_modal_mi_equipo');
    }

    function cargar_lista_equipos(input_select)
    {
        $('#'+input_select).html('');
        $('#'+input_select).append('<option value="0">Seleccione</option><option value="nuevo">Nuevo Equipo</option>');
        let url = "{{ route('profesional.equipo.ver') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_profesional: $('#id_profesional_fc').val(),
            },
        })
        .done(function(resp) {
            console.log(resp);
            if (resp.estado == 1)
            {
                $.each(resp.registros, function(index, value)
                {
                    console.log(value);
                    html = '';
                    html = '<option value="'+value.id+'">'+value.nombre+'</option>';
                    $('#'+input_select).append(html);
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }


    function cargar_mi_equipo(input_select, div_destino)
    {
        lista_profesionales_eq_nuevo = [];
        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        var valor = $('#'+input_select).val();
        if(valor == 'nuevo')
        {
            $('.'+div_destino).html('');

            var html = '';

            html += '<!-- info equipo -->';
            html += '<div class="form-group col-md-5 col-lg-5 col-xl-5">';
            html += '    <label class="floating-label-activo-sm">Nombre Equipo</label>';
            html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_nombre_equipo" id="ingreso_sol_pab_modal_nombre_equipo">';
            html += '</div>';
            html += '<div class="form-group col-md-5 col-lg-5 col-xl-5">';
            html += '    <label class="floating-label-activo-sm">Descripción Equipo</label>';
            html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_descripcion_equipo" id="ingreso_sol_pab_modal_descripcion_equipo">';
            html += '</div>';
            html += '<div class="form-group col-md-2 col-lg-2 col-xl-2">';
            html += '    <button type="button" class="btn btn-info btn-block btn-sm" onclick="crear_nuevo_equipo()"><i class="feather icon-save"></i> Equipo </button>';
            html += '</div>';

            // html += '<!-- header -->';
            // html += '<div class="form-group col-md-5">Posición</div>';
            // html += '<div class="form-group col-md-5">Profesional</div>';
            // html += '<div class="form-group col-md-2">Agregar</div>';

            html += '<!-- fromulario -->';
            html += '<div class="form-group col-md-5">';
            html += '<label class="floating-label-activo-sm">Posición </label>';
            html += '    <select class="form-control form-control-sm equipo_posicion" name="equipo_posicion_1" id="equipo_posicion_1">';
            html += '        <option value="">Seleccione</option>';
            html += '        <option value="CIRUJANO">CIRUJANO</option>';
            html += '        <option value="AYUDANTE">AYUDANTE</option>';
            html += '        <option value="ARSENALERO">ARSENALERO</option>';
            html += '        <option value="ANESTESISTA">ANESTESISTA</option>';
            html += '    </select>';
            html += '</div>';
            html += '<div class="form-group col-md-5">';
            html += '<label class="floating-label-activo-sm">Profesional </label>';
            html += '    <input class="form-control form-control-sm equipo_profesional" type="text" name="equipo_profesional_1" id="equipo_profesional_1">';
            html += '    <input class="form-control form-control-sm equipo_profesional" type="hidden" name="equipo_profesional_id_1" id="equipo_profesional_id_1">';
            html += '</div>';
            html += '<div class="form-group col-md-2">';
            html += '    <button class="btn btn-xs btn-info btn-block" id="btn_registrar_profesional" onclick="guardar_profesional_equipo();"><i class="fa fa-check" aria-hidden="true"></i> Registrar</button>';
            html += '</div>';

            html += '<!-- formulario de nuevo profesional -->';
            html += '<div class="form-row col-md-12" id="equipo_nuevo" style="display:none">';
            html += '   <div class="form-group col-md-12">';
            html += '       <span style="color:red; fond-size:10px">Profesional no registrado, Ingrese inforación:</span>';
            html += '   </div>';

            html += '   <div class="form-group col-md-3">Posición</div>';
            html += '   <div class="form-group col-md-3">Nombre</div>';
            html += '   <div class="form-group col-md-3">Apellido</div>';
            html += '   <div class="form-group col-md-3">Email</div>';

            html += '   <div class="form-group col-md-3">';
            html += '       <select class="form-control form-control-sm equipo_nuevo_posicion" name="equipo_nuevo_posicion_1" id="equipo_nuevo_posicion_1">';
            html += '           <option value="">Seleccione</option>';
            html += '           <option value="CIRUJANO">CIRUJANO</option>';
            html += '           <option value="AYUDANTE">AYUDANTE</option>';
            html += '           <option value="ARSENALERO">ARSENALERO</option>';
            html += '           <option value="ANESTESISTA">ANESTESISTA</option>';
            html += '       </select>';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_nombre" type="text" name="equipo_nuevo_profesional_nombre_1" id="equipo_nuevo_profesional_nombre_1">';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_apellido" type="text" name="equipo_nuevo_profesional_apellido_1" id="equipo_nuevo_profesional_apellido_1">';
            html += '   </div>';
            html += '   <div class="form-group col-md-3">';
            html += '       <input class="form-control form-control-sm equipo_nuevo_profesional_email" type="text" name="equipo_nuevo_profesional_email_1" id="equipo_nuevo_profesional_email_1">';
            html += '   </div>';
            html += '</div>';

            html += '<div class="form-row col-md-12" id="lista_equipo_nuevo" style="display:none">';
            html += '</div>';

            $('.'+div_destino).html(html);

            // $('.solo-texto').keyup(function (){
            //     this.value = (this.value + '').replace(/^[a-zA-Z ]+$/g, '');
            // });

            profesional_autocomplete('equipo_profesional_1', 'equipo_profesional_id_1','equipo_nuevo');
        }
        else if(valor == '0')
        {
            $('.'+div_destino).html('');
            $('#ingreso_sol_pab_modal_lista_profesionales').val('');
            $('#lista_profesionales').val('');
        }
        else
        {
            $('#lista_profesionales').val('');
            var html = '';
            $('.'+div_destino).html(html);
            let url = "{{ route('profesional.equipo.ver.profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional_mi_equipo: valor,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp.estado == 1)
                {
                    var lista_id_profesionales = '';
                    $.each(resp.registros, function(index, value)
                    {
                        html = '';
                        html += '<div class="form-group col-md-6 col-lg-6 col-xl-6">';
                        html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                        html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional.nombre+' '+value.profesional.apellido_uno+'">';
                        html += '</div>';
                        lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                        $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
                        $('.'+div_destino).append(html);
                    });

                }
                else
                {
                    $('.'+div_destino).append('<h5>Sin registro de equipo</h5>');
                    $('#ingreso_sol_pab_modal_lista_profesionales').val('');
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    }

    function crear_nuevo_equipo(){
        let nombre = $('#ingreso_sol_pab_modal_nombre_equipo').val();
        let descripcion = $('#ingreso_sol_pab_modal_descripcion_equipo').val();
        let url = "{{ ROUTE('profesional.equipo.crear') }}";

        let valido = 1;
        let mensaje = '';

        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Nombre del equipo</li>';
        }
        if(descripcion == ''){
            valido = 0;
            mensaje += '<li>Descripción</li>';
        }

        if(lista_profesionales_eq_nuevo.length == 0){
            valido = 0;
            mensaje += '<li>Profesionales</li>';
        }

        if(valido == 0){
            swal({
                title:'Error',
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    },
                },
                icon:'error'
            });

            return;
        }

        let data = {
            nombre: nombre,
            descripcion: descripcion,
            id_profesional: $('#id_profesional_fc').val(),
            profesionales: lista_profesionales_eq_nuevo,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        $.ajax({
            type:'post',
            url: url,
            data:data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon:'success',
                        title:'Exito',
                        text:'Equipo creado, ahora debe seleccionarlo',
                    });
                    $('#ingreso_sol_pab_modal_lista_profesionales').val('');
                    $('.lista_profesionales').html('');
                    cargar_lista_equipos('ingreso_sol_pab_modal_mi_equipo');
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function profesional_autocomplete(select, input_id, div_nuevo)
    {
        $("#"+select).autocomplete({
            source: function(request, response) {
                // Fetch data
                $.ajax({
                    url: "{{ route('profesional.buscar.por.nombre.autocomplete') }}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function(data) {
                        $('#'+div_nuevo).hide();
                        $('#'+input_id).val('')
                        $('#equipo_nuevo_posicion_1').val('');
                        $('#equipo_nuevo_profesional_nombre_1').val('');
                        $('#equipo_nuevo_profesional_apellido_1').val('');
                        $('#equipo_nuevo_profesional_email_1').val('');
                        if(data.length == 0 && request.term.length>0)
                        {
                            $('#'+div_nuevo).show();
                        }
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                // Set selection
                $('#'+select).val(ui.item.label); // display the selected text
                $('#'+input_id).val(ui.item.value); // save selected id to input
                return false;
            }
        });
    }

    var lista_profesionales_eq_nuevo = [];
    function guardar_profesional_equipo()
    {
        if($('#equipo_profesional_id_1').val() != '')
        {
            var posicion_profesional = $('#equipo_posicion_1').val();
            var nombre_profesional = $('#equipo_profesional_1').val();
            var id_profesional = $('#equipo_profesional_id_1').val();

            var temp_profesional = {
                    tipo: 'existente',
                    posicion: posicion_profesional,
                    profesional_nombre: nombre_profesional,
                    profesional_apellido: '',
                    profesional_email: '',
                    profesional_id: id_profesional,
                }

            lista_profesionales_eq_nuevo.push(temp_profesional);
            mostrar_tabla_nuevos_profesionales();
            $('#equipo_posicion_1').val('');
            $('#equipo_profesional_1').val('');
            $('#equipo_profesional_id_1').val('');
        }
        else
        {
            var nuevo_posicion = $('#equipo_nuevo_posicion_1').val();
            var nuevo_profesional_nombre = $('#equipo_nuevo_profesional_nombre_1').val();
            var nuevo_profesional_apellido = $('#equipo_nuevo_profesional_apellido_1').val();
            var nuevo_profesional_email = $('#equipo_nuevo_profesional_email_1').val();
            var mensaje = '';
            var valido = 1;
            if(nuevo_posicion == '')
            {
                mensaje += 'Posicion - Campo requerido\n';
                $('#equipo_nuevo_posicion_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_nombre == '')
            {
                mensaje += 'Nombre Profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_nombre_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_apellido == '')
            {
                mensaje += 'Apellido Profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_apellido_1').focus();
                valido = 0;
            }
            if(nuevo_profesional_email == '')
            {
                mensaje += 'Email profesional - Campo requerido\n';
                $('#equipo_nuevo_profesional_email_1').focus();
                valido = 0;
            }
            if(valido == 1)
            {
                var temp_profesional = {
                    tipo: 'nuevo',
                    posicion: nuevo_posicion,
                    profesional_nombre: nuevo_profesional_nombre,
                    profesional_apellido: nuevo_profesional_apellido,
                    profesional_email: nuevo_profesional_email,
                }

                lista_profesionales_eq_nuevo.push(temp_profesional);

                mostrar_tabla_nuevos_profesionales();

                $('#equipo_nuevo_posicion_1').val('');
                $('#equipo_nuevo_profesional_nombre_1').val('');
                $('#equipo_nuevo_profesional_apellido_1').val('');
                $('#equipo_nuevo_profesional_email_1').val('');
            }
            else
            {
                swal({
					title: "Registro de Equipo.",
					text: mensaje,
					icon: "error",
				});
            }
        }
    }

    function mostrar_tabla_nuevos_profesionales()
    {
        $('#lista_equipo_nuevo').hide();
        $('#ingreso_sol_pab_modal_lista_profesionales').val('');
        var html = '';
        $('#lista_equipo_nuevo').html(html);
        if(lista_profesionales_eq_nuevo.length>0)
        {
            $('#lista_equipo_nuevo').show();
            $.each(lista_profesionales_eq_nuevo, function (index, value)
            {
                var lista_id_profesionales = '';
                html = '';
                html += '<div class="form-group col-md-5 col-lg-5 col-xl-5" >';
                html += '    <label class="floating-label-activo-sm">'+value.posicion+'</label>';
                html += '    <input type="text" class="form-control form-control-sm" name="ingreso_sol_pab_modal_'+index+'" id="ingreso_sol_pab_modal_'+index+'" value="'+value.profesional_nombre+' '+value.profesional_apellido+'" />';
                html += '</div>';
                html += '<div class="form-group col-md-1 col-lg-1 col-xl-1" >';
                html += '<button type="button" class="btn btn-xs btn-danger has-ripple aling-right" style="" onclick="eliminar_nuevo_profesional('+index+')"><i class="feather icon-x" aria-hidden="true"></i><span class="ripple ripple-animate"></span></button>';
                html += '</div>';
                $('#lista_equipo_nuevo').append(html);
                lista_id_profesionales += value.id_tipo_especialidad+','+value.id_sub_tipo_especialidad+','+value.posicion+','+value.id_profesional+'|';
                $('#ingreso_sol_pab_modal_lista_profesionales').val(lista_id_profesionales);
            });
        }
    }

    function eliminar_nuevo_profesional(index)
    {
        lista_profesionales_eq_nuevo.splice(index, 1);
        mostrar_tabla_nuevos_profesionales()
    }

    // function sonLetrasSolamente(texto) {
    //     var regex = /^[a-zA-Z ]+$/;
    //     return regex.test(texto);
    // }

    function registrar_solicitud_pabellon()
    {
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes_m').val();
        var patalogias_cronicas = $('#ingreso_sol_pab_modal_patalogias_cronicas').val();
        var hospital = $('#ingreso_sol_pab_modal_hospital').val();
        var id_hospita = $('#ingreso_sol_pab_modal_id_hospita').val();
        var diagnostico_preoperatorio = $('#ingreso_sol_pab_modal_diagnostico_preoperatorio').val();
        var tipo_cirugia = $('#ingreso_sol_pab_modal_tipo_cirugia').val();
        var grado_urgencia = $('#ingreso_sol_pab_modal_grado_urgencia').val();
        var operacion = $('#ingreso_sol_pab_modal_operacion').val();
        var cirugia = $('#ingreso_sol_pab_modal_cirugia').val();
        var anestesia = $('#ingreso_sol_pab_modal_anestesia').val();
        var fecha_hora_operacion = $('#ingreso_sol_pab_modal_fecha_hora_operacion').val();
        var mi_equipo = $('#ingreso_sol_pab_modal_mi_equipo').val();
        var lista_profesionales = $('#ingreso_sol_pab_modal_lista_profesionales').val();

        var nombre_equipo = '';
        if($('#ingreso_sol_pab_modal_nombre_equipo').length > 0 )
            nombre_equipo = $('#ingreso_sol_pab_modal_nombre_equipo').val();

        var descripcion_equipo = '';
        if($('#ingreso_sol_pab_modal_descripcion_equipo').length > 0 )
            descripcion_equipo = $('#ingreso_sol_pab_modal_descripcion_equipo').val();

        var equipamiento_especial = $('#ingreso_sol_pab_modal_equipamiento_especial').val();
        var comentarios = $('#ingreso_sol_pab_modal_comentarios').val();
        var _token = CSRF_TOKEN;

        var especialidad = '';
        especialidad = '{{ $profesional->TipoEspecialidad->first()->nombre }}';
        @if(!empty($profesional->SubTipoEspecialidad) )
            especialidad += ' {{ $profesional->SubTipoEspecialidad->first()->nombre }}';
        @endif

        var valido = 1;
        var mensaje = '';

        if(fecha_hora_operacion == ''){
            valido = 0;
            mensaje += '<li>Fecha y hora operación</li>';
        }

        if(operacion == ''){
            valido = 0;
            mensaje += '<li>Operación</li>';
        }

        if(diagnostico_preoperatorio == ''){
            valido = 0;
            mensaje += '<li>Diagnóstico</li>';
        }

        if(equipamiento_especial == ''){
            valido = 0;
            mensaje += '<li>Equipamento especial</li>';
        }

        if(comentarios == ''){
            valido = 0;
            mensaje += '<li>Comentarios</li>';
        }

        if(tipo_cirugia == ''){
            valido = 0;
            mensaje += '<li>Tipo cirugía</li>';
        }

        if(otros_antecedentes == ''){
            valido = 0;
            mensaje += '<li>Otros antecedentes</li>';
        }

        if(valido == 1){
            let url = "{{ route('solicitud.pabellon.registrar') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token : _token,
                    grado_urgencia : grado_urgencia,
                    id_hospital : id_hospita,
                    hospital : hospital ,
                    fecha_hora_operacion : fecha_hora_operacion,
                    operacion : operacion,
                    codigo_cirugia : cirugia,
                    equipamiento_especial : equipamiento_especial,
                    especialidad_1 : especialidad,
                    comentarios : comentarios,
                    tipo_cirugia : tipo_cirugia,
                    patalogias_cronicas : patalogias_cronicas,
                    otros_antecedentes : otros_antecedentes,
                    diagnostico_preoperatorio : diagnostico_preoperatorio,
                    tipo_hospitalizacion : '',
                    // cirujano,
                    instrumental_especial : '',
                    insumos_especiales : '',
                    id_paciente : id_paciente,
                    id_profesional : id_profesional,
                    id_ficha_atencion : id_ficha_atencion,
                    id_lugar_atencion : id_lugar_atencion,
                    nombre_equipo: nombre_equipo,
                    descripcion_equipo: descripcion_equipo,
                    lista_profesionales_eq_nuevo : JSON.stringify(lista_profesionales_eq_nuevo),
                    lista_profesionales : lista_profesionales,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp.estado == 1)
                {
                    console.log('registro');
                    $('#ingreso_sol_pab_modal_otros_antecedentes_m').val();
                    $('#ingreso_sol_pab_modal_patalogias_cronicas').val();
                    $('#ingreso_sol_pab_modal_hospital').val();
                    $('#ingreso_sol_pab_modal_id_hospita').val();
                    $('#ingreso_sol_pab_modal_diagnostico_preoperatorio').val();
                    $('#ingreso_sol_pab_modal_tipo_cirugia').val();
                    $('#ingreso_sol_pab_modal_grado_urgencia').val();
                    $('#ingreso_sol_pab_modal_operacion').val();
                    $('#ingreso_sol_pab_modal_cirugia').val();
                    $('#ingreso_sol_pab_modal_anestesia').val();
                    $('#ingreso_sol_pab_modal_fecha_hora_operacion').val();
                    $('#ingreso_sol_pab_modal_mi_equipo').val();
                    $('#ingreso_sol_pab_modal_lista_profesionales').val();
                    $('#ingreso_sol_pab_modal_nombre_equipo').val();
                    $('#ingreso_sol_pab_modal_descripcion_equipo').val();
                    $('#ingreso_sol_pab_modal_equipamiento_especial').val();
                    $('#ingreso_sol_pab_modal_comentarios').val();
                    lista_profesionales_eq_nuevo = [];

                    $('#ingreso_sol_pab_modal').modal('hide');
                    swal({
                        title: "Solicitud de Pabellon.",
                        text: 'Solicitud Exitosa',
                        icon: "success",
                    });


                }
                else
                {
                    console.log('falla registro');
                    swal({
                        title: "Solicitud de Pabellon.",
                        text: 'Solicitud con problema intente de nuevo',
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }else{
            swal({
                title: "Solicitud de Pabellon.",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
            });
        }



    }

    function generar_pdf_pabellon(){
        console.log('generar pdf pabellon');
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_ficha_atencion = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var otros_antecedentes = $('#ingreso_sol_pab_modal_otros_antecedentes_m').val();
        var patalogias_cronicas = $('#ingreso_sol_pab_modal_patalogias_cronicas').val();
        var hospital = $('#ingreso_sol_pab_modal_hospital').val();
        var id_hospita = $('#ingreso_sol_pab_modal_id_hospita').val();
        var diagnostico_preoperatorio = $('#ingreso_sol_pab_modal_diagnostico_preoperatorio').val();
        var tipo_cirugia = $('#ingreso_sol_pab_modal_tipo_cirugia').val();
        var grado_urgencia = $('#ingreso_sol_pab_modal_grado_urgencia').val();
        var operacion = $('#ingreso_sol_pab_modal_operacion').val();
        var cirugia = $('#ingreso_sol_pab_modal_cirugia').val();
        var anestesia = $('#ingreso_sol_pab_modal_anestesia').val();
        var fecha_hora_operacion = $('#ingreso_sol_pab_modal_fecha_hora_operacion').val();
        var mi_equipo = $('#ingreso_sol_pab_modal_mi_equipo').val();
        var lista_profesionales = $('#ingreso_sol_pab_modal_lista_profesionales').val();

        var nombre_equipo = '';
        if($('#ingreso_sol_pab_modal_nombre_equipo').length > 0 )
            nombre_equipo = $('#ingreso_sol_pab_modal_nombre_equipo').val();

        var descripcion_equipo = '';
        if($('#ingreso_sol_pab_modal_descripcion_equipo').length > 0 )
            descripcion_equipo = $('#ingreso_sol_pab_modal_descripcion_equipo').val();

        var equipamiento_especial = $('#ingreso_sol_pab_modal_equipamiento_especial').val();
        var comentarios = $('#ingreso_sol_pab_modal_comentarios').val();
        var _token = CSRF_TOKEN;

        var especialidad = '';
        especialidad = '{{ $profesional->TipoEspecialidad->first()->nombre }}';
        @if(!empty($profesional->SubTipoEspecialidad) )
            especialidad += ' {{ $profesional->SubTipoEspecialidad->first()->nombre }}';
        @endif

        var valido = 1;
        var mensaje = '';

        if(fecha_hora_operacion == ''){
            valido = 0;
            mensaje += '<li>Fecha y hora operación</li>';
        }

        if(operacion == ''){
            valido = 0;
            mensaje += '<li>Operación</li>';
        }

        if(diagnostico_preoperatorio == ''){
            valido = 0;
            mensaje += '<li>Diagnóstico</li>';
        }

        if(equipamiento_especial == ''){
            valido = 0;
            mensaje += '<li>Equipamento especial</li>';
        }

        if(comentarios == ''){
            valido = 0;
            mensaje += '<li>Comentarios</li>';
        }

        if(tipo_cirugia == ''){
            valido = 0;
            mensaje += '<li>Tipo cirugía</li>';
        }

        // if(otros_antecedentes == ''){
        //     valido = 0;
        //     mensaje += '<li>Otros antecedentes</li>';
        // }

        let data = {
                _token : _token,
                grado_urgencia : grado_urgencia,
                id_hospital : id_hospita,
                hospital : hospital ,
                fecha_hora_operacion : fecha_hora_operacion,
                operacion : operacion,
                codigo_cirugia : cirugia,
                equipamiento_especial : equipamiento_especial,
                especialidad_1 : especialidad,
                comentarios : comentarios,
                tipo_cirugia : tipo_cirugia,
                patalogias_cronicas : patalogias_cronicas,
                otros_antecedentes : otros_antecedentes,
                diagnostico_preoperatorio : diagnostico_preoperatorio,
                tipo_hospitalizacion : '',
                // cirujano,
                instrumental_especial : '',
                insumos_especiales : '',
                id_paciente : id_paciente,
                id_profesional : id_profesional,
                id_ficha_atencion : id_ficha_atencion,
                id_lugar_atencion : id_lugar_atencion,
                nombre_equipo: nombre_equipo,
                descripcion_equipo: descripcion_equipo,
                lista_profesionales_eq_nuevo : JSON.stringify(lista_profesionales_eq_nuevo),
                lista_profesionales : lista_profesionales,
        }
        if(valido == 1){
            console.log(data);
            let url = "{{ route('solicitud.pabellon.pdf') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token : _token,
                    grado_urgencia : grado_urgencia,
                    id_hospital : id_hospita,
                    hospital : hospital ,
                    fecha_hora_operacion : fecha_hora_operacion,
                    operacion : operacion,
                    codigo_cirugia : cirugia,
                    equipamiento_especial : equipamiento_especial,
                    especialidad_1 : especialidad,
                    comentarios : comentarios,
                    tipo_cirugia : tipo_cirugia,
                    patalogias_cronicas : patalogias_cronicas,
                    otros_antecedentes : otros_antecedentes,
                    diagnostico_preoperatorio : diagnostico_preoperatorio,
                    tipo_hospitalizacion : '',
                    // cirujano,
                    instrumental_especial : '',
                    insumos_especiales : '',
                    id_paciente : id_paciente,
                    id_profesional : id_profesional,
                    id_ficha_atencion : id_ficha_atencion,
                    id_lugar_atencion : id_lugar_atencion,
                    nombre_equipo: nombre_equipo,
                    descripcion_equipo: descripcion_equipo,
                    lista_profesionales_eq_nuevo : JSON.stringify(lista_profesionales_eq_nuevo),
                    lista_profesionales : lista_profesionales,
                },
            })
            .done(function(resp) {
                console.log(resp);

                if (resp.estado == 1)
                {
                    console.log('registro');
                    let width = 800;
                    let height = 600;
                    let left = (screen.width - width) / 2;
                    let top = (screen.height - height) / 2;
                    window.open(resp.response.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    swal({
                        title: "PDF generado",
                        text: "El PDF ha sido generado correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                    lista_profesionales_eq_nuevo = [];
                }else{
                    console.log('falla registro');
                    // ocultamos el modal
                    $('#ingreso_sol_pab_modal').modal('hide');
                    swal({
                        title: "Solicitud de Pabellon.",
                        text: 'Solicitud con problema intente de nuevo',
                        icon: "error",
                    })
                    .then(function(){
                        $('#ingreso_sol_pab_modal').modal('show');
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }else{
            console.log('falla registro');
            // ocultamos el modal
            $('#ingreso_sol_pab_modal').modal('hide');
            swal({
                title: "Solicitud de Pabellon.",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
            })
            .then(function(){
                $('#ingreso_sol_pab_modal').modal('show');
            });
        }

    }

</script>
