<div id="indicar_lente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_lente" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Receta de lentes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<form>
								<div class="form-row">
									<div class="col-md-3">
	                                    <label class="col-form-label font-weight-bolder text-c-blue">Tipo de lentes</label>
	                                </div>
	                                <div class="col-md-9">
										<select class="form-control form-control-sm" name="tipo_lentes" id="tipo_lentes">
											<option value="0" selected>Seleccione</option>
                                            <option value="1">Opticos monofocales</option>
                                            <option value="2">Opticos bifocales</option>
                                            <option value="3">Opticos trifocales</option>
                                            <option value="3">Progresivos</option>
                                            <option value="4">Opticos de sol</option>
                                            <option value="5">Contacto</option>
										</select>
	                                </div>
								</div>
							</form>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bolder text-c-blue">Recetas</label>
						</div>
					    <div class="col-md-9">
                            <input type="hidden" name="lentes_para" id="lentes_para" value="">
                            <input type="hidden" name="lentes_para_texto" id="lentes_para_texto" value="">
					        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
					            <li class="nav-item">
                                    <div class="btn btn-sm btn-info-light btn_tipo" style="margin: 0 5px;" onclick="activar_lente_para('cerca', '1','Lentes de cerca');" id="btn_cerca" data-id="1">Lentes de cerca</div>
					            </li>
					            <li class="nav-item">
                                    <div class="btn btn-sm btn-info-light btn_tipo" style="margin: 0 5px;" onclick="activar_lente_para('intermedio', '2','Lentes intermedios');" id="btn_intermedio" data-id="2">Lentes intermedios</div>
					            </li>
					            <li class="nav-item">
                                    <div class="btn btn-sm btn-info-light btn_tipo" style="margin: 0 5px;" onclick="activar_lente_para('lejos', '3','Lentes ópticos');" id="btn_lejos" data-id="3">Lentes ópticos</div>
					            </li>
					        </ul>
					    </div>
					</div>
					<div class="row">
					    <div class="col-md-12">
                            <div class="row">
                                {{-- izquierda --}}
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <h6 style="text-align: center;color:rgb(34, 40, 215)" >OJO IZQUIERDO</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Esfera</label>
                                            <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_oi_esfera" id="r_oi_esfera">
                                                <option value="+4"> +4</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3"> +3</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2"> +2</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+1"> +1</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="0" selected>N</option>
                                                <option value="-0.25"> -0.25</option>
                                                <option value="-0.5"> -0.5</option>
                                                <option value="-0.75"> -0.75</option>
                                                <option value="-1"> -1</option>
                                                <option value="-1.25"> -1.25</option>
                                                <option value="-1.50"> -1.50</option>
                                                <option value="-1.75"> -1.75</option>
                                                <option value="-2"> -2</option>
                                                <option value="-2.25"> -2.25</option>
                                                <option value="-2.5"> -2.5</option>
                                                <option value="-2.75"> -2.75</option>
                                                <option value="-3"> -3</option>
                                                <option value="-3.25"> -3.25</option>
                                                <option value="-3.5"> -3.5</option>
                                                <option value="-3.75"> -3.75</option>
                                                <option value="-4"> -4</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Cilindro</label>
                                            <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_oi_cilindro" id="r_oi_cilindro">
                                                <option value="+4"> +4</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3"> +3</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2"> +2</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+1"> +1</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="0" selected>N</option>
                                                <option value="-0.25"> -0.25</option>
                                                <option value="-0.5"> -0.5</option>
                                                <option value="-0.75"> -0.75</option>
                                                <option value="-1"> -1</option>
                                                <option value="-1.25"> -1.25</option>
                                                <option value="-1.50"> -1.50</option>
                                                <option value="-1.75"> -1.75</option>
                                                <option value="-2"> -2</option>
                                                <option value="-2.25"> -2.25</option>
                                                <option value="-2.5"> -2.5</option>
                                                <option value="-2.75"> -2.75</option>
                                                <option value="-3"> -3</option>
                                                <option value="-3.25"> -3.25</option>
                                                <option value="-3.5"> -3.5</option>
                                                <option value="-3.75"> -3.75</option>
                                                <option value="-4"> -4</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Valor eje</label>
                                            <input type="text" class="form-control form-control-sm" name="r_oi_valor_eje" id="r_oi_valor_eje">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">ADD</label>
                                            <select class="form-control form-control-sm" style="color:rgb(34, 40, 215)" name="r_oi_add" id="r_oi_add">
                                                <option value="0" selected>0</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+1"> +1</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+2"> +2</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+3"> +3</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+4"> +4</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Prisma</label>
                                            <input type="text" class="form-control form-control-sm" name="r_oi_prisma" id="r_oi_prisma">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">DIP</label>
                                            <input type="text" class="form-control form-control-sm" name="r_oi_dip" id="r_oi_dip">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <input type="text" class="form-control form-control-sm" name="r_oi_obs" id="r_oi_obs">
                                        </div>
                                    </div>
                                </div>

                                {{-- derecha --}}
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <h6 style="text-align: center;color:rgb(205, 36, 36)" >OJO DERECHO</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Esfera</label>
                                            <select class="form-control form-control-sm" style="color:red" name="r_od_esfera" id="r_od_esfera">
                                                <option value="+4"> +4</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3"> +3</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2"> +2</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+1"> +1</option>
                                                <option value="0" selected> N</option>
                                                <option value="-0.25"> -0.25</option>
                                                <option value="-0.5"> -0.5</option>
                                                <option value="-0.75"> -0.75</option>
                                                <option value="-1"> -1</option>
                                                <option value="-1.25"> -1.25</option>
                                                <option value="-1.50"> -1.50</option>
                                                <option value="-1.75"> -1.75</option>
                                                <option value="-2"> -2</option>
                                                <option value="-2.25"> -2.25</option>
                                                <option value="-2.5"> -2.5</option>
                                                <option value="-2.75"> -2.75</option>
                                                <option value="-3"> -3</option>
                                                <option value="-3.25"> -3.25</option>
                                                <option value="-3.5"> -3.5</option>
                                                <option value="-3.75"> -3.75</option>
                                                <option value="-4"> -4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Cilindro</label>
                                            <select class="form-control form-control-sm" style="color:red" name="r_od_cilindro" id="r_od_cilindro">
                                                <option value="+4"> +4</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3"> +3</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2"> +2</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+1"> +1</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="0" selected> N</option>
                                                <option value="-0.25"> -0.25</option>
                                                <option value="-0.5"> -0.5</option>
                                                <option value="-0.75"> -0.75</option>
                                                <option value="-1"> -1</option>
                                                <option value="-1.25"> -1.25</option>
                                                <option value="-1.50"> -1.50</option>
                                                <option value="-1.75"> -1.75</option>
                                                <option value="-2"> -2</option>
                                                <option value="-2.25"> -2.25</option>
                                                <option value="-2.5"> -2.5</option>
                                                <option value="-2.75"> -2.75</option>
                                                <option value="-3"> -3</option>
                                                <option value="-3.25"> -3.25</option>
                                                <option value="-3.5"> -3.5</option>
                                                <option value="-3.75"> -3.75</option>
                                                <option value="-4"> -4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Valor eje</label>
                                            <input type="text" class="form-control form-control-sm" name="r_od_valor_eje" id="r_od_valor_eje">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">ADD</label>
                                            <select class="form-control form-control-sm" style="color:red" name="r_od_add" id="r_od_add">
                                                <option value="0" selected>0</option>
                                                <option value="+0.25"> +0.25</option>
                                                <option value="+0.5"> +0.5</option>
                                                <option value="+0.75"> +0.75</option>
                                                <option value="+1"> +1</option>
                                                <option value="+1.25"> +1.25</option>
                                                <option value="+1.50"> +1.50</option>
                                                <option value="+1.75"> +1.75</option>
                                                <option value="+2"> +2</option>
                                                <option value="+2.25"> +2.25</option>
                                                <option value="+2.5"> +2.5</option>
                                                <option value="+2.75"> +2.75</option>
                                                <option value="+3"> +3</option>
                                                <option value="+3.25"> +3.25</option>
                                                <option value="+3.5"> +3.5</option>
                                                <option value="+3.75"> +3.75</option>
                                                <option value="+4"> +4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">Prisma</label>
                                            <input type="text" class="form-control form-control-sm" name="r_od_prisma" id="r_od_prisma">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label class="floating-label-activo-sm">DIP</label>
                                            <input type="text" class="form-control form-control-sm" name="r_od_dip" id="r_od_dip">
                                        </div>

                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Observaciones</label>
                                            <input type="text" class="form-control form-control-sm" name="r_od_obs" id="r_od_obs">
                                        </div>
                                    </div>
                                </div>
                            </div>
					    </div>
					</div>
					<hr class="mt-1">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<form>
								<div class="form-group">
                                    <label class="floating-label">Comentarios General</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="r_obs" id="r_obs"></textarea>
                                </div>
							</form>
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success btn-info btn-sm" onclick="guardar_receta_lentes();">Agregar Receta</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-xs" id='tabla_receta_lentes'>
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Para</th>
                                        <th>Esfera</th>
                                        <th>Cilindro</th>
                                        <th>Valor eje</th>
                                        <th>ADD</th>
                                        <th>Prisma</th>
                                        <th>DIP</th>
                                        <th>Observaciones</th>
                                        <th>Obs. General</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">


    function i_lente() {
        activar_lente_para('cerca', '1','Lentes de cerca');
        cargar_receta_lentes();
        $('#indicar_lente').modal('show');
    }

    function activar_lente_para(tipo, id, nombre)
    {
        $('.btn_tipo').removeClass('btn-info');
        $('.btn_tipo').addClass('btn-info-light');
        $('.btn_tipo').removeClass('active');

        $('#btn_'+tipo).addClass('btn-info');
        $('#btn_'+tipo).addClass('active');
        $('#lentes_para').val(id);
        $('#lentes_para_texto').val(nombre);
    }

    function guardar_receta_lentes()
    {
        var id_ficha_atencion = $('#id_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var tipo_lentes = $('#tipo_lentes').val();
        var lentes_para = $('#lentes_para').val();
        var lentes_para_texto = $('#lentes_para_texto').val();

        var r_oi_esfera = $('#r_oi_esfera').val();
        var r_oi_cilindro = $('#r_oi_cilindro').val();
        var r_oi_valor_eje = $('#r_oi_valor_eje').val();
        var r_oi_add = $('#r_oi_add').val();
        var r_oi_prisma = $('#r_oi_prisma').val();
        var r_oi_dip = $('#r_oi_dip').val();
        var r_oi_obs = $('#r_oi_obs').val();

        var r_od_esfera = $('#r_od_esfera').val();
        var r_od_cilindro = $('#r_od_cilindro').val();
        var r_od_valor_eje = $('#r_od_valor_eje').val();
        var r_od_add = $('#r_od_add').val();
        var r_od_prisma = $('#r_od_prisma').val();
        var r_od_dip = $('#r_od_dip').val();
        var r_od_obs = $('#r_od_obs').val();

        var r_obs = $('#r_obs').val();

        let url = "{{ route('receta.oftalmo.lente.registrar') }}";
        var _token = CSRF_TOKEN;
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token:_token,
                id_ficha_atencion: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                tipo_lentes: tipo_lentes,
                lentes_para: lentes_para,
                lentes_para_texto: lentes_para_texto,
                r_oi_esfera: r_oi_esfera,
                r_oi_cilindro: r_oi_cilindro,
                r_oi_valor_eje: r_oi_valor_eje,
                r_oi_add: r_oi_add,
                r_oi_prisma: r_oi_prisma,
                r_oi_dip: r_oi_dip,
                r_oi_obs: r_oi_obs,
                r_od_esfera: r_od_esfera,
                r_od_cilindro: r_od_cilindro,
                r_od_valor_eje: r_od_valor_eje,
                r_od_add: r_od_add,
                r_od_prisma: r_od_prisma,
                r_od_dip: r_od_dip,
                r_od_obs: r_od_obs,
                r_obs: r_obs,
            },
        })
        .done(function(resp)
        {
            if(resp.estado==1)
            {
                swal({
                    title: "Registro Receta Lentes",
                    text: "Registro exitoso",
                    icon: "success",
                });
                cargar_receta_lentes();

                $('#tipo_lentes').val(1);
                activar_lente_para('cerca', '1','Lentes de cerca');
                $('#r_oi_esfera').val(0);
                $('#r_oi_cilindro').val(0);
                $('#r_oi_valor_eje').val('');
                $('#r_oi_add').val(0);
                $('#r_oi_prisma').val('');
                $('#r_oi_dip').val('');
                $('#r_oi_obs').val('');
                $('#r_od_esfera').val(0);
                $('#r_od_cilindro').val(0);
                $('#r_od_valor_eje').val('');
                $('#r_od_add').val(0);
                $('#r_od_prisma').val('');
                $('#r_od_dip').val('');
                $('#r_od_obs').val('');
                $('#r_obs').val('');
            }
            else
            {
                var mensaje = '';
                if(resp.error)
                {
                    $.each(resp.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Registro Receta Lentes",
                    text: mensaje,
                    icon: "error"
                });
                cargar_receta_lentes();
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_receta_lentes()
    {
        $('#tabla_receta_lentes tbody').html('');
        var id_ficha_atencion = $('#id_fc').val();
        let url = "{{ route('receta.oftalmo.lente.ver') }}";
        var _token = CSRF_TOKEN;
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_ficha_atencion: id_ficha_atencion,
            },
        })
        .done(function(resp)
        {
            if(resp.estado==1)
            {
                var array_tipo = ['', 'Opticos monofocales', 'Opticos bifocales', 'Opticos trifocales', 'Progresivos', 'Opticos de sol', 'Contacto'];
                $.each(resp.registro, function (key, value) {
                    var html = '';
                    html += '<tr>';
                    html += '   <td style="font-size: 14px;">'+array_tipo[value.tipo_lentes]+'</td>';
                    html += '   <td style="font-size: 14px;">'+value.lentes_para_texto+'</td>';
                    html += '   <td>';//Esfera
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_esfera+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_esfera+'</div>';
                    html += '   </td>';
                    html += '   <td>';//Cilindro
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_cilindro+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_cilindro+'</div>';
                    html += '   </td>';
                    html += '   <td>';//Valor
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_valor_eje+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_valor_eje+'</div>';
                    html += '   </td>';
                    html += '   <td>';//ADD
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_add+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_add+'</div>';
                    html += '   </td>';
                    html += '   <td>';//Prisma
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_prisma+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_prisma+'</div>';
                    html += '   </td>';
                    html += '   <td>';//DIP
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: '+value.r_od_dip+'</div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: '+value.r_oi_dip+'</div>';
                    html += '   </td>';
                    html += '   <td>';//Observaciones
                    html += '       <div style="font-size: 14px;color:rgb(34, 40, 215)">OD: <span style="font-size: 14px;">'+value.r_od_obs+'</span></div>';
                    html += '       <div style="font-size: 14px;color:rgb(205, 36, 36)">OI: <span style="font-size: 14px;">'+value.r_oi_obs+'</span></div>';
                    html += '   </td>';
                    html += '   <td style="font-size: 14px;">'+value.r_obs+'</td>';
                    html += '</tr>     ';
                    $('#tabla_receta_lentes tbody').append(html);
                });
            }
            else
            {
                $('#tabla_receta_lentes tbody').html('');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }


</script>

