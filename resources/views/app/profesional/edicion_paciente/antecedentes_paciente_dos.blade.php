<!--nav azul sm-->
<link rel="stylesheet" href="{{ asset('css/nav_azul_sm.css') }}">
<style>
.ui-widget-content {
    z-index: 1100;
}
</style>
<script>

	{{--  MEDICAMENTOS AUTOCOMPLETE --}}
	const activarMedicamentos = (input) => {
		$("#"+input).autocomplete({
			source: function(request, response) {
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
				$('#'+input).val(ui.item.label);
				return false;
			}
		});
	}


    const verModalDesactivar = (fun,tipo,id) => {
        $('#id-antecedente-m-desactivar').val(id);
        $('#tipo-antecedente-m-desactivar').val(tipo);
        $('#modal-confirmar').modal(fun);
    }

    const verModalAgregar = (fun,tipo,id)=>{

        $('#agregar-antecedente').show();
        $('#modificar-antecedente').hide();

        var html = '';

        // 1	Antecedentes Anestesias Pacientes
        // 2	Patologías Crónicas
        // 3	Antecedentes Cirugias y Procedimientos
        // 4	Antecedentes Hemorragias Pacientes
        // 5	Solicitud de Antecedentes a servicios asistenciales
        // 6	Antecedentes de Alergias
        // 7	Antecedentes de Medicamento Crónico
        // 8	Presenta alguna discapacidad ?

        switch(tipo){
            case 1: // 1    Antecedentes Anestesias Pacientes
                // Procedimiento
                // Incidentes
                // Profesional
                // Fecha
                html+=`
                    <table>
						<tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
            break;

            case 2: // 2    Patologías Crónicas
                // Nombre
                // Comentario
                // Profesional
                // Fecha
                html+=`
                    <table>
                        <tr>
                            <td>Nombre</td>
                            <td><input class="form-control" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Comentario</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 3: // 3    Antecedentes Cirugias y Procedimientos
                // Fecha
                // Procedimiento
                // Incidente
                // Profesional
                // Fecha data
                html+=`
                    <table>
						<tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Procedimiento</td>
                            <td><input class="form-control" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 4: // 4    Antecedentes Hemorragias Pacientes
                // Fecha
                // Incidente
                // Detalle
                html+=`
                    <table>
                        <tr>
                            <td>Fecha Cirugía</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                        <tr>
                            <td>Incidente</td>
                            <td><textarea class="form-control" id="incidene"></textarea></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control" id="detalle"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 5: // 5    Solicitud de Antecedentes a servicios asistenciales
                // Patología
                // Clínica o servicio
                // Fecha Aproximada
                html+=`
                    <table>
                        <tr>
                            <td>Nombre antecedente</td>
                            <td><input class="form-control form-control-sm" type="text" id="procedimiento"></td>
                        </tr>
                        <tr>
                            <td>Institución</td>
                            <td><textarea class="form-control form-control-sm" id="institucion"></textarea></td>
                        </tr>
						<tr>
                            <td>Fecha Evento</td>
                            <td><input class="form-control" type="date" id="fecha"></td>
                        </tr>
                    </table>
                `;
            break;

            case 6: // 6    Antecedentes de Alergias
                html+=`
                    <table>
                        <tr>
                            <td>Nombre alergia</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre"></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><textarea class="form-control form-control-sm" id="comentario"></textarea></td>
                        </tr>
                    </table>
                `;
            break;

            case 7: // 7    Antecedentes de Medicamento Crónico
                html+=`
                    <table>
                        <tr>
                            <td>Nombre Medicamento</td>
                            <td><input class="form-control form-control-sm" type="text" id="nombre_medicamento_cronico"></td>
                        </tr>
                        <tr>
                            <td>Dosis</td>
                            <td><textarea class="form-control" id="dosis"></textarea></td>
                        </tr>

                    </table>
                `;
            break;

		    case 8: // 8    Presenta alguna discapacidad ?
                html+=`
                    <table>
                        <tr>
                            <td>Tipo de Discapacidad</td>
                            <td>
								<select class="form-control form-control-sm" name="discapacidad_tipo" id="discapacidad_tipo">
									<option value="Auditíva">Auditíva</option>
									<option value="Visual">Visual</option>
									<option value="Locomotora">Locomotora </option>
									<option value="Neurológica">Neurológica</option>
									<option value="Fonoarticulatoria">Fonoarticulatoria</option>
									<option value="Cognitiva">Cognitiva</option>
								</select>
							</td>
                        </tr>
                        <tr>
                            <td>Grado</td>
                            <td>
								<input class="form-control form-control-sm" type="text" id="discapacidad_grado">
							</td>
                        </tr>
						<tr>
                            <td>Permanente</td>
                            <td>
								<select class="form-control form-control-sm" name="discapacidad_permanente" id="discapacidad_permanente">
									<option value="si">SI</option>
									<option value="no">NO</option>
								</select>
							</td>
                        </tr>

                    </table>
                `;
            break;
        }

        $('#body-modal-inputs').html(html);
		if( tipo == 7)
			activarMedicamentos('nombre_medicamento_cronico');
        $('#tipo-antecedente-m').val(tipo);
        $('#modal-ingreso').modal(fun);

        if(id!=0)
        {
            $('#agregar-antecedente').hide();
            $('#modificar-antecedente').show();
            $('#id-antecedente-m').val(id);
            cargarDatosAntecedente(id);
        }

    }

    const cargarDatosAntecedente = (id) => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registro';

        data.id = id;

        $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: (resp)=>{
            if(resp.estado==1)
            {
                $('#procedimiento').val(resp.registros.antecedente_data.procedimiento);
                $('#comentario').val(resp.registros.antecedente_data.comentario);
                $('#nombre').val(resp.registros.antecedente_data.nombre);
                $('#fecha').val(resp.registros.antecedente_data.fecha);
                $('#nombre_medicamento_cronico').val(resp.registros.antecedente_data.nombre_medicamento_cronico);
                $('#dosis').val(resp.registros.antecedente_data.dosis);
                $('#institucion').val(resp.registros.antecedente_data.institucion);
                $('#discapacidad_tipo').val(resp.registros.antecedente_data.discapacidad_tipo);
                $('#discapacidad_grado').val(resp.registros.antecedente_data.discapacidad_grado);
                $('#discapacidad_permanente').val(resp.registros.antecedente_data.discapacidad_permanente);
            }
        },
        error: (resp)=>{
            console.warn(resp);
        }
    });

    }

    const agregarAntecedente = () => {

        $('#title-antecedente').html('Agregar Antecedente');

        var data = {};
        var url = '{{ url("/api/antecedente/registrar") }}';
        var tipo = $('#tipo-antecedente-m').val();

        /* CAMPOS */
        data.nombre = $('#nombre').val();
        data.comentario = $('#comentario').val();
        data.procedimiento = $('#procedimiento').val();
        data.nombre_medicamento_cronico = $('#nombre_medicamento_cronico').val();
        data.fecha = $('#fecha').val();
        data.dosis = $('#dosis').val();
        data.institucion = $('#institucion').val();
        data.discapacidad_tipo = $('#discapacidad_tipo').val();
        data.discapacidad_grado = $('#discapacidad_grado').val();
        data.discapacidad_permanente = $('#discapacidad_permanente').val();



        data.id_paciente = $('#id_paciente').val();
        data.id_tipo_antecedente = $('#tipo-antecedente-m').val();
        data.id_users = $('#user-id').val();
        data.rut_responsable =$('#user-rut').val();
        data.profesion = $('#user-profesion').val();
        data.profesional = $('#user-profesional').val();
        data.estado = 1;


        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    cargarRegistrosAntecedentes(parseInt(tipo));
                    msg('Antecedente','Registro Ingresado.','success');
                    $('#modal-ingreso').modal('hide');

                }else{
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    const modificarAntecedente = () =>
    {

        $('#title-antecedente').html('Modificar Antecedente');

        var data = {};
        var url = '{{ url("api/antecedente/modificar") }}';
        var tipo = $('#tipo-antecedente-m').val();

        /* CAMPOS */
        data.id = $('#id-antecedente-m').val();
        data.nombre = $('#nombre').val();
        data.comentario = $('#comentario').val();
        data.procedimiento = $('#procedimiento').val();
        data.nombre_medicamento_cronico = $('#nombre_medicamento_cronico').val();
        data.fecha = $('#fecha').val();
        data.dosis = $('#dosis').val();
        data.institucion = $('#institucion').val();
        data.discapacidad_tipo = $('#discapacidad_tipo').val();
        data.discapacidad_grado = $('#discapacidad_grado').val();
        data.discapacidad_permanente = $('#discapacidad_permanente').val();


        data.id_paciente = $('#id_paciente').val();
        data.id_tipo_antecedente = $('#tipo-antecedente-m').val();
        data.id_users = $('#user-id').val();
        data.rut_responsable =$('#user-rut').val();
        data.profesion = $('#user-profesion').val();
        data.profesional = $('#user-profesional').val();
        data.estado = 1;


        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    cargarRegistrosAntecedentes(parseInt(tipo));
                    msg('Antecedente','Registro Modificado.','success');
                    $('#modal-ingreso').modal('hide');

                }else{
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }


    const eliminarAntecedente = () => {

        var data = {};
        var url = '{{ url("/api/antecedente/estado") }}';
        var tipo =   $('#tipo-antecedente-m-desactivar').val();

        /* CAMPOS */
        data.id = $('#id-antecedente-m-desactivar').val();
        data.estado = 0;


        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    cargarRegistrosAntecedentes(parseInt(tipo));
                    msg('Antecedente','Registro Desactivado.','success');
                    $('#modal-confirmar').modal('hide');

                }else{
                    msg('Antecedente','Campo Obligatorio: '+JSON.stringify(resp.error),'danger');
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

    const msg = (title,text,icon) => {
        swal({
                title: title,
                text: text,
                icon: icon,
                // buttons: "Aceptar",
                //SuccessMode: true,
            })
    }

    const cargarRegistrosAntecedentes = (tipo) => {

        var data = {};
        var url = '{{Request::root()}}/api/antecedente/ver_registros';

        data.id_tipo_antecedente = tipo;
        data.estado = 1;


        $.ajax({
            url: url,
            type: "GET",
            data: data,
            success: (resp)=>{
                if(resp.estado==1)
                {
                    var html_ = '';
                    var permiso_ = '';
                    var id_users = parseInt($('#user-id').val());

                    resp.registros.forEach(e => {

                        permiso_ = '';
                        if(e.id_users == id_users)
                        permiso_ = `
                            <buttom class="btn btn-icon btn-info feather icon-edit-2" onclick="verModalAgregar('show',${tipo},${e.id})"></buttom>
                            <buttom class="btn btn-icon btn-danger feather icon-x-square" onclick="verModalDesactivar('show',${tipo},${e.id})"></buttom>
                        `;


                        switch(tipo)
                        {
                            case 1:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional}<br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 2:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 3:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.profesional} <br/>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 4:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.rut_responsable}</td>
                                        <td>${e.antecedente_data.profesional}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 5:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.procedimiento}</td>
                                        <td>${e.antecedente_data.institucion}</td>
                                        <td>${e.antecedente_data.fecha}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 6:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre}</td>
                                        <td>${e.antecedente_data.comentario}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 7:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.nombre_medicamento_cronico}</td>
                                        <td>${e.antecedente_data.dosis}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                            case 8:
                                html_ +=`
                                    <tr>
                                        <td>${e.antecedente_data.discapacidad_tipo}</td>
                                        <td>${e.antecedente_data.discapacidad_grado}</td>
                                        <td>${e.antecedente_data.discapacidad_permanente}</td>
                                        <td>${e.antecedente_data.fecha_regitro}</td>
                                        <td>${permiso_}</td>
                                    </tr>
                                `;
                            break;
                        }

                    });

                $('#bloque-registros-'+tipo).html(html_);
                }
            },
            error: (resp)=>{
                console.warn(resp);
            }
        });
    }

</script>


        <!--Card Datos medicos generales-->
         <h5 class="text-c-blue f-22 mb-2">2. Antecedentes médicos generales</h5>
        <div class="card">
             <div class="card-body info_antecedentes_patologicos">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-crec_des_trauma" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="anest-pac-tab" data-toggle="tab" href="#anest-pac" role="tab" aria-controls="anest-pac" aria-selected="true">Anestesias paciente</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link-aten text-reset" id="fractu-tab" data-toggle="tab" href="#fractu" role="tab" aria-controls="fractu" aria-selected="false">Fracturas</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cirug-proce-tab" data-toggle="tab" href="#cirug-proce" role="tab" aria-controls="cirug-proce" aria-selected="false">Cirugías y procedimientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="pat-cro-tab" data-toggle="tab" href="#pat-cro" role="tab" aria-controls="pat-cro" aria-selected="false">Patologías crónicos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="med-cro-tab" data-toggle="tab" href="#med-cro" role="tab" aria-control="med-cro" aria-selected="false">Medicamentos crónicos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="alergias-tab" data-toggle="tab" href="#alergias" role="tab" aria-control="alergias" aria-selected="false">Alergias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="ant-serv-asistenciales-tab" data-toggle="tab" href="#ant-serv-asistenciales" role="tab" aria-control="ant-serv-asistenciales" aria-selected="false">Solic. de antecedentes de servicios asistenciales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="discapacidad-tab" data-toggle="tab" href="#discapacidad" role="tab" aria-control="discapacidad" aria-selected="false">Discapacidades</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="trauma">
                            <!--ANESTESIAS PACIENTE-->
                            <div class="tab-pane fade show active" id="anest-pac" role="tabpanel" aria-labelledby="anest-pac-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline mb-2">
                                        <h6 class="text-c-blue d-inline float-left pt-3 f-16">ANESTESIAS PACIENTE</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button type="button" class="btn btn-info btn-sm float-right d-inline" onclick="verModalAgregar('show',1,0)"><i class="fas fa-plus"></i> Añadir antecedente</button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Procedimiento</th>
                                                        <th>Incidentes</th>
                                                        <th>Profesional</th>
                                                        <th>Fecha</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-1">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--PATOLOGÍAS CRÓNICAS-->
                            <div class="tab-pane fade show" id="pat-cro" role="tabpanel" aria-labelledby="pat-cro-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue d-inline">PATOLOGÍAS CRÓNICAS</h6>
                                         @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',2,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Comentario</th>
                                                        <th>Profesional</th>
                                                        <th>Fecha</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-2">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--CIRUGÍAS Y PROCEDIMIENTOS-->
                            <div class="tab-pane fade show" id="cirug-proce" role="tabpanel" aria-labelledby="cirug-proce-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="text-c-blue d-inline">CIRUGÍAS Y PROCEDIMIENTOS</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',3,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Procedimiento</th>
                                                        <th>Incidente</th>
                                                        <th>Profesional</th>
                                                        <th>Fecha data</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-3">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--HEMORAGIAS-->
                            <div class="tab-pane fade show" id="cirug-proce" role="tabpanel" aria-labelledby="cirug-proce-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                        <h6 class="text-c-blue d-inline">HEMORAGIAS</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',4,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Fecha</th>
                                                        <th>Incidente</th>
                                                        <th>Detalle</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-3">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--SOLICITUDES DE ANTECEDENTES DE SERVICIOS ASISTENCIALES-->
                            <div class="tab-pane fade show" id="ant-serv-asistenciales" role="tabpanel" aria-labelledby="ant-serv-asistenciales-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue d-inline">SOLICITUDES DE ANTECEDENTES DE SERVICIOS ASISTENCIALES</h6>
                                         @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',5,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Patología</th>
                                                        <th>Clínica o servicio</th>
                                                        <th>Fecha Aproximada</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-5">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--ALERGIAS-->
                            <div class="tab-pane fade show" id="alergias" role="tabpanel" aria-labelledby="alergias-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue d-inline">ALERGIAS</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs  feather icon-plus d-inline" onclick="verModalAgregar('show',6,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre Alergia</th>
                                                        <th>Comentario</th>
                                                        <th>Fecha</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-6">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--MEDICAMENTOS CRÓNICOS-->
                            <div class="tab-pane fade show" id="med-cro" role="tabpanel" aria-labelledby="med-cro-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue d-inline">MEDICAMENTOS CRÓNICOS</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',7,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre Medicamento Crónico</th>
                                                        <th>Dosis</th>
                                                        <th>Fecha</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-7">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--DISCAPACIDADES-->
                            <div class="tab-pane fade show" id="discapacidad" role="tabpanel" aria-labelledby="discapacidad-tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-c-blue d-inline">DISCAPACIDADES</h6>
                                        @if(Auth::user()->hasRole('Profesional'))
                                        <button class="btn btn-info btn-xxs feather icon-plus d-inline" onclick="verModalAgregar('show',8,0)"></button>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Discapacidad</th>
                                                        <th>Grado</th>
                                                        <th>Reversibilidad</th>
                                                        <th>Fecha</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bloque-registros-8">
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    <!--MODAL-->
    <div class="modal" id="modal-ingreso" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-antecedente">Agregar antecedente</h5>
                <button type="button" class="close" onclick="verModalAgregar('hide')" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body-modal-inputs">

            </div>
            <div class="modal-footer">
                <input type="hidden" value="" id="id-antecedente-m">
                <input type="hidden" value="" id="tipo-antecedente-m">
                <input type="hidden" value="{{$userData['rut']}}" id="user-rut">
                <input type="hidden" value="{{$userData['profesion']}}" id="user-profesion">
                <input type="hidden" value="{{$userData['nombre']}} {{$userData['apellido_uno']}} {{$userData['apellido_dos']}}" id="user-profesional">
                <input type="hidden" value="{{Auth::user()->id}}" id="user-id">
                <button type="button" class="btn btn-sm btn-primary-light-c" id="agregar-antecedente" onclick="agregarAntecedente()"><i class="feather icon-save"></i> Agregar antecedentes</button>
                <button type="button" class="btn btn-sm btn-primary-light-c" id="modificar-antecedente" onclick="modificarAntecedente()"><i class="feather icon-edit"></i> Modificar antecedentes</button>
                <button type="button" class="btn btn-sm btn-danger-light-c" onclick="verModalAgregar('hide')"><i class="feather icon-x"></i> Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-confirmar" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Desactivar Antecedente</h5>
                    <button type="button" class="close" onclick="verModalDesactivar('hide')" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Desea desactivar el antecedente ingresado.</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="id-antecedente-m-desactivar">
                    <input type="hidden" value="" id="tipo-antecedente-m-desactivar">
                    <button type="button" class="btn  btn-danger mr-0" onclick="eliminarAntecedente()">Desactivar</button>
                    <button type="button" class="btn  btn-primary" onclick="verModalDesactivar('hide')">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('atencion_medica.formularios.modal_atencion_general.modal_autorizacion') --}}

<script>
    setTimeout(() => {
        for (let index = 1; index <= 8; index++)
        {
            cargarRegistrosAntecedentes(index);
        }
    }, 2000);
</script>
