<!DOCTYPE html>
<html lang="es">

<head>
	@include('auth/include/head')

	<link rel="stylesheet" href="{{ asset('css/form-registro.css') }}">
	<link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
</head>

<body>
    <style type="text/css">
        .auth-wrapper {
            background-size: cover;
            background-image: url("{{ asset('images/background_1.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .es-invalido {
            border-color: #ff5252;
            padding-right: calc(1.5em + 1.25rem);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.3125rem) center;
            background-size: calc(0.75em + 0.625rem) calc(0.75em + 0.625rem);
        }

        .error {
            color: red;
        }
    </style>

    <!--Formulario-->
    <div class="auth-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-6 mx-auto py-2">
					<div class="card">
						<div class="card-top pt-2">
							<h5>Registro de Institución</h5>
							<p class="p-18">Complete los datos para finalizar el registro</p>
						</div>
						<div class="card-body">

		                        <div class="progress" id="js-progress">
		                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
		                                <span class="progress-val">40%</span>
		                            </div>
		                        </div>
		                        <ul class="nav nav-tab">
		                        	<li class="active">
		                                <a href="#tab1" data-toggle="tab">1</a>
		                            </li>
		                            <li>
		                                <a href="#tab2" data-toggle="tab">2</a>
		                            </li>
		                            <li>
		                                <a href="#tab3" data-toggle="tab">3</a>
		                            </li>
		                        </ul>
		                        <div class="tab-content">
		                        	<!--INFORMACIÓN INSTITUCIÓN-->
                                    <div class="tab-pane active" id="tab1">
                                        <form class="wizard-container" id="js-wizard-form">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Información Intitucional</h5>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <span class="alert alert-success" id="texto_verificacion" style="display: none"></span>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Rut Institución</label>
                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut" >
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Nombre Institución</label>
                                                    <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">

                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Tipo Institucion</label>
                                                    <select class="form-control form-control-sm" id="id_tipo_institucion" name="id_tipo_institucion">
                                                        <option selected value="0">Seleccione</option>
                                                        @if (isset($tipo_institucion))
                                                            @foreach ($tipo_institucion as $t_inst)
                                                                <option value="{{ $t_inst->id }}">{{ $t_inst->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Dirección</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-8">
                                                    <label class="floating-label-activo-sm">Dirección</label>
                                                    <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                    <i class="zmdi zmdi-card input-icon"></i>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Nº</label>
                                                    <input type="number" class="form-control form-control-sm" name="numero" id="numero">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" id="region" name="region" onchange="buscar_ciudad();">
                                                        <option selected value="0" selected>Seleccione</option>
                                                        @if (isset($region))
                                                            @foreach ($region as $reg)
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" id="ciudad" name="ciudad">
                                                        <option selected value="0">Seleccione</option>
                                                        <option>-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Teléfono</label>
                                                    <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="btn-next-con">
                                                        <div class="btn-next" id="boton_siguiente">Siguiente</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- INFORMACIÓN RESPONSABLE -->
                                    <div class="tab-pane" id="tab2">
                                        <form class="wizard-container" id="js-wizard-form2">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Información Responsable</h5>
                                                    <p>Ingrese la información del responsable de la institución</p>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <span class="alert alert-success" id="texto_verificacion" style="display: none"></span>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Rut responsable</label>
                                                    <input type="text" class="form-control form-control-sm" name="responsable_rut" id="responsable_rut">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Nombre responsable</label>
                                                    <input type="text" class="form-control form-control-sm" name="responsable_nombre" id="responsable_nombre">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Primer apellido responsable</label>
                                                    <input type="text" class="form-control form-control-sm" name="responsable_apellido_uno" id="responsable_apellido_uno">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Segundo apellido responsable</label>
                                                    <input type="text" class="form-control form-control-sm" name="responsable_apellido_dos" id="responsable_apellido_dos">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Información de contacto del responsable</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-8">
                                                    <label class="floating-label-activo-sm">Dirección</label>
                                                    <input type="text" class="form-control form-control-sm" name="responsable_direccion" id="responsable_direccion">
                                                    <i class="zmdi zmdi-card input-icon"></i>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label class="floating-label-activo-sm">Nº.</label>
                                                    <input type="number" class="form-control form-control-sm" name="responsable_numero" id="responsable_numero">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" id="responsable_region" name="responsable_region" onchange="buscar_ciudad_responsable();">
                                                        <option selected value="0" selected>Seleccione</option>
                                                        @if (isset($region))
                                                            @foreach ($region as $reg)
                                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" id="responsable_ciudad" name="responsable_ciudad">
                                                        <option selected value="0">Seleccione</option>
                                                        <option>-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Celular</label>
                                                    <input type="tel" class="form-control form-control-sm" name="responsable_celular" id="responsable_celular" placeholder="+569">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Teléfono</label>
                                                    <input type="tel" class="form-control form-control-sm" name="responsable_telefono" id="responsable_telefono">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                                    <input type="email" class="form-control form-control-sm" name="responsable_email_registro" id="responsable_email_registro">
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 text-center mb-3">
                                                    <h5>Constraseña para el usuario del responsable</h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Contraseña</label>
                                                    <input type="password" class="form-control form-control-sm" name="responsable_password_registro" id="responsable_password_registro">
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <label class="floating-label-activo-sm">Confirme su contraseña</label>
                                                    <input type="password" class="form-control form-control-sm" name="responsable_password_confirmacion_registro" id="responsable_password_confirmacion_registro">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="btn-next-con">
                                                        <a class="btn-back" href="#">Atrás</a>
                                                        <a class="btn-next" href="#">Siguiente</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

									<!--ACTIVAR CUENTA-->
									<div class="tab-pane" id="tab3">
										<div class="row">
											<div class="col-sm-12 col-md-12 text-center mb-3 pt-3 mb-3">
												<form class="text-center">
													<i class="feather icon-mail display-4 text-info"></i>
													<h5 class="mt-3">Activar cuenta</h5>
													<p>Hemos enviado un mensaje de activación al email <b id="email_envio">profesional@gmail.com</b>
													</p>
												</form>
											</div>
										</div>
										{{-- <div class="form-row">
											<div class="col-md-12">
									            <div class="btn-next-con">
									            	<a class="btn-back" href="#">Atrás</a>
									            </div>
									        </div>
										</div> --}}
									</div>
		                        </div>

                        </div>
                	</div>
				</div>
			</div>
		</div>
	</div>
    <!--Cierre de Formulario-->

    @include('auth/include/nocomplatible')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/rut.js') }}"></script>
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/login/registro.js') }}"></script>

    <script>

        function buscar_ciudad()
        {

            let region = $('#region').val();
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        let ciudades = $('#ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value=""></option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function buscar_ciudad_responsable()
        {

            let region = $('#responsable_region').val();
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        let ciudades = $('#responsable_ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value=""></option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function registrar_datos()
        {
            // Institución
            var rut = $('#rut').val();
            var nombre = $('#nombre').val();
            var id_tipo_institucion = $('#id_tipo_institucion').val();
            var direccion = $('#direccion').val();
            var numero = $('#numero').val();
            var region = $('#region').val();
            var ciudad = $('#ciudad').val();
            var telefono = $('#telefono').val();
            // Responsable
            var responsable_rut = $('#responsable_rut').val();
            var responsable_nombre = $('#responsable_nombre').val();
            var responsable_apellido_uno = $('#responsable_apellido_uno').val();
            var responsable_apellido_dos = $('#responsable_apellido_dos').val();
            var responsable_direccion = $('#responsable_direccion').val();
            var responsable_numero = $('#responsable_numero').val();
            var responsable_region = $('#responsable_region').val();
            var responsable_ciudad = $('#responsable_ciudad').val();
            var responsable_celular = $('#responsable_celular').val();
            var responsable_telefono = $('#responsable_telefono').val();
            var responsable_email_registro = $('#responsable_email_registro').val();
            var responsable_password_registro = $('#responsable_password_registro').val();
            var responsable_password_confirmacion_registro = $('#responsable_password_confirmacion_registro').val();

            let url = "{{ route('home.registro_institucion') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        // _token: _token,
                        institucion_rut : rut,
                        institucion_nombre : nombre,
                        institucion_id_tipo_institucion : id_tipo_institucion,
                        institucion_direccion : direccion,
                        institucion_numero : numero,
                        institucion_region : region,
                        institucion_ciudad : ciudad,
                        institucion_telefono : telefono,
                        responsable_rut : responsable_rut,
                        responsable_nombre : responsable_nombre,
                        responsable_apellido_uno : responsable_apellido_uno,
                        responsable_apellido_dos : responsable_apellido_dos,
                        responsable_direccion : responsable_direccion,
                        responsable_numero : responsable_numero,
                        responsable_region : responsable_region,
                        responsable_ciudad : responsable_ciudad,
                        responsable_celular : responsable_celular,
                        responsable_telefono : responsable_telefono,
                        responsable_email_registro : responsable_email_registro,
                        responsable_password_registro : responsable_password_registro,
                        responsable_password_confirmacion_registro : responsable_password_confirmacion_registro,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        // data = JSON.parse(data);
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#email_envio').html(data.email);
                            setTimeout(function() {
                                location.reload()
                            }, 4000);
                            return true;
                        }
                        else
                        {
                            swal({
                                title: "Registro de Institucion.",
                                text:"Problemas al realizar el registro.",
                                icon: "warning",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            return false
                        }


                    } else {
                        return false
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                    return false
                });
        }


        $(document).ready(function() {

            /** formulario pestaña 1 */
            var $validacion = $("#js-wizard-form").validate({
                rules: {
                    rut: {
                        required: true,
                        rut:true
                    },
                    nombre: {
                        required: true,
                        minlength: 3
                    },
                    id_tipo_institucion: {
                        required: true,
                        id_tipo_institucion: true
                    },
                    direccion: {
                        required: true,
                        minlength:6
                    },
                    numero: {
                        required: false,
                        minlength: 1
                    },
                    region: {
                        required: true,
                        region: true

                    },
                    ciudad: {
                        required: true,
                        comuna: true

                    },
                    telefono: {
                        required: true,
                        // telefono: true,
                        minlength:12,
                        maxlength:13
                    },
                },
                messages: {
                    rut: {
                        required: "Ingrese rut Institución",
                        rut:'Revise que esté bien escrito'
                    },
                    nombre: {
                        required: "Ingrese nombre Institución",
                        minlength: "Debe poseer por lo menos 4 caracteres"
                    },
                    id_tipo_institucion: {
                        required: "Ingrese tipo Institución",
                    },
                    direccion: {
                        required: "Ingrese dirección de Institución",
                        minlength: "Debe poseer por lo menos 6 caracteres"
                    },
                    numero: {
                        required: "Ingrese nombre de Institución",
                        minlength: "Debe poseer por lo menos 1 caracteres"
                    },
                    region: {
                        required: "Seleccione region de Institución",
                    },
                    ciudad: {
                        required: "Seleccione comuna de Institución",
                    },
                    telefono: {
                        required: "Ingrese telefono de Institución",
                        minlength: "Debe ingresar 12 caracteres, Ejemplo: +56212341234"
                    }
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                        //
                }
            });

            /** llamdo de metodo para validacion de rut */
            $.validator.addMethod("rut", function(value, element) {
                    return this.optional(element) || $.validateRut(value);
            }, "Revise el RUT");

            $.validator.addMethod("id_tipo_institucion", function(value, element) {
                if(value == 0)
                    return false;
                else
                     return true;
            }, "Seleccione servicio a prestar");

            // $.validator.addMethod( "telefono",function(value, element, pattern) {
            //         var re = new RegExp(/^\x2b56[2-99][0-9]{8}$/i);//+565112341234
            //         return re.test(value);
            //     },"Numero no valido. Ejemplo: +56212341234"
            // );

            $.validator.addMethod( "region",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar region"
            );

            $.validator.addMethod( "comuna",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar comuna"
            );

            /* formatear rut */
            $("#rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });
            /** fin formulario pestaña 1 */

            /** formulario pestaña 2 */
            var $validacion2 = $("#js-wizard-form2").validate({
                rules: {
                    responsable_rut:{
                        required:true,
                        responsable_rut:true
                    },
                    responsable_nombre:{
                        required:true,
                        minlength: 2
                    },
                    responsable_apellido_uno:{
                        required:true,
                        minlength: 2
                    },
                    responsable_apellido_dos:{
                        required:true,
                        minlength: 2
                    },
                    responsable_direccion:{
                        required:true,
                        minlength:6
                    },
                    responsable_numero:{
                        required: false,
                        minlength: 1
                    },
                    responsable_region:{
                        required: true,
                        region: true
                    },
                    responsable_ciudad:{
                        required: true,
                        comuna: true
                    },
                    responsable_celular:{
                        required: true,
                        responsable_celular: true,
                        minlength:12,
                        maxlength:12
                    },
                    responsable_telefono:{
                        required: false,
                        // responsable_telefono: true,
                        minlength:12,
                        maxlength:13
                    },
                    responsable_email_registro: {
                        required: true,
                        email: true,
                        // responsable_email_registro: true
                    },
                    responsable_password_registro: {
                        required: true,
                        minlength: 3
                    },
                    responsable_password_confirmacion_registro: {
                        required: true,
                        minlength: 3,
                        equalTo: "#responsable_password_registro"
                    },
                },
                messages: {
                    responsable_rut:{
                        required: "Ingrese rut Responsable",
                        responsable_rut:'Revise que esté bien escrito'
                    },
                    responsable_nombre:{
                        required: "Ingrese nombre Responsable",
                        minlength: "Debe poseer por lo menos 2 caracteres"
                    },
                    responsable_apellido_uno:{
                        required: "Ingrese nombre Responsable",
                        minlength: "Debe poseer por lo menos 2 caracteres"
                    },
                    responsable_apellido_dos:{
                        required: "Ingrese nombre Responsable",
                        minlength: "Debe poseer por lo menos 2 caracteres"
                    },
                    responsable_direccion:{
                        required: "Ingrese dirección de Responsable",
                        minlength: "Debe poseer por lo menos 6 caracteres"
                    },
                    responsable_numero:{
                        required: "Ingrese numero direccion de Responsable",
                        minlength: "Debe poseer por lo menos 1 caracteres"
                    },
                    responsable_region:{
                        required: "Seleccione region de Responsable",
                    },
                    responsable_ciudad:{
                        required: "Seleccione comuna de Responsable",
                    },
                    responsable_celular:{
                        required: "Ingrese celular de Responsable",
                        minlength: "Debe ingresar 12 caracteres, Ejemplo: +56912341234"
                    },
                    responsable_telefono:{
                        required: "Ingrese telefono de Responsable",
                        minlength: "Debe ingresar 12 caracteres, Ejemplo: +56212341234"
                    },
                    responsable_email_registro: {
                        required: "Ingrese su email",
                        email: "Cuenta de correo no es Valida.",
                        // responsable_email_registro: 'Debe ingresar un correo valido'
                    },
                    responsable_password_registro: {
                        required: "Ingrese su contraseña",
                        minlength: "Debe poseer por lo menos 3 caracteres"

                    },
                    responsable_password_confirmacion_registro: {
                        required: "Ingrese su confirmacion de contraseña",
                        minlength: "Debe poseer por lo menos 3 caracteres",
                        equalTo: "Las Contraseñas no son iguales"
                    }

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    //
                }
            });

            /** llamdo de metodo para validacion de rut */
            $.validator.addMethod("responsable_rut", function(value, element) {
                    return this.optional(element) || $.validateRut(value);
            }, "Revise el RUT");

            $("#responsable_rut").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $.validator.addMethod( "responsable_celular",function(value, element, pattern) {
                    var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                    return re.test(value);
                },"Numero no valido. Ejemplo: +56912341234"
            );

            // $.validator.addMethod( "responsable_telefono",function(value, element, pattern) {
            //         var re = new RegExp(/^\x2b56[2-99][0-9]{8}$/i);//+565112341234
            //         return re.test(value);
            //     },"Numero no valido. Ejemplo: +56212341234"
            // );

            $.validator.addMethod( "responsable_region",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar region"
            );

            $.validator.addMethod( "responsable_comuna",function(value, element, pattern) {
                    if(value == 0)
                    return false;
                else
                     return true;
                },"Debe seleccionar comuna"
            );

            // $.validator.addMethod("responsable_email_registro",function(value, element) {
            //         var re = new RegExp(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/);
            //         return re.test(value);
            //     }, "Debe ingresar Correo valido."
            // );
            /** fin formulario pestaña 2 */


            $(".card-body").bootstrapWizard({
                'tabClass' : 'nav-tab',
                'nextSelector': '.btn-next',
                'previousSelector' : '.btn-back',
                'lastSelector': '.btn-last',
                'onNext': function(tab, navigation, index) {

                    if(index == 1)
                    {
                        /** validacion de fromulario 1 */
                        var $valid = $('#js-wizard-form').valid();;
                        if(!$valid) {
                            $validacion.focusInvalid();
                            return false;
                        }
                    }
                    else if(index == 2)
                    {
                        /** validacion de fromulario 2 */
                        var $valid = $('#js-wizard-form2').valid();
                        if(!$valid) {
                            $validacion2.focusInvalid();
                            return false;
                        }

                        if(registrar_datos() == false)
                        {
                            console.log('error en registro');
                            return false;
                        }

                    }
                    var progressBar = $('#js-progress').find('.progress-bar');
                    var progressVal = $('#js-progress').find('.progress-val');
                    var current = index + 1;
                    if (current > 1) {
                        var val = parseInt(progressBar.text());
                        val += 30;
                        progressBar.css('width', val+ '%');
                        progressVal.text(val+'%');
                    }
                },
                'onPrevious' : function(tab, navigation, index) {
                    var progressBar = $('#js-progress').find('.progress-bar');
                    var progressVal = $('#js-progress').find('.progress-val');
                    var current = index - 1;
                    if (current !== 1) {
                        var val = parseInt(progressBar.text());
                        val -= 30;
                        progressBar.css('width', val+ '%');
                        progressVal.text(val+'%');
                    }

                }

            });

            $("#id_comuna").select2();


            /* pareche botones */
            $(".button-previous").hide();
            $(".button-end").hide();

            $(".button-previous").click(function() {
                $(".button-next").show();
                $(".button-previous").hide();
                $(".button-end").hide();
            });

            /* enviar */
            // $(".button-end").click(function() {
            //     console.log("clickeado");
            //     $("#completar_registro").submit();
            // });

            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        });


    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
